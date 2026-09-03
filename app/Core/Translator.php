<?php
/**
 * =====================================================================
 *  Translator – Çoklu dil (i18n) altyapısı
 * ---------------------------------------------------------------------
 *  ÇEVİRİ, "METİNLERİ BAŞKA DİLE ÇEVİRMEK" DEĞİLDİR.
 *  Dört ayrı iş vardır ve üçü çoğu projede atlanır:
 *
 *    1. METİN     → "Kaydet" / "Save" / "حفظ"
 *    2. ÇOĞUL     → "1 kayıt" / "5 kayıt" ama İngilizcede
 *                   "1 record" / "5 records"; Arapçada ALTI biçim
 *    3. BİÇİM     → 1.234,56 (TR) · 1,234.56 (EN) · tarih sırası
 *    4. YÖN       → Arapça ve İbranice SAĞDAN SOLA akar
 *
 *  Yalnızca 1'i yapan bir sistem, İngilizce arayüzde "5 kayıt bulundu"
 *  yerine "5 record found" yazar ve amatör görünür.
 *
 *  ---------------------------------------------------------------
 *  NEDEN gettext DEĞİL?
 *  PHP'nin yerleşik gettext eklentisi güçlüdür ama .po/.mo dosyaları
 *  derlemek gerekir, sunucuda eklenti şartı vardır ve çeviri
 *  eklemek "dosyayı düzenle" kadar basit değildir. Dizi tabanlı
 *  sözlük, küçük ve orta projelerde hem yeterli hem de her yerde
 *  çalışır.
 *
 *  ---------------------------------------------------------------
 *  DOSYA DÜZENİ
 *      lang/tr/common.php   →  ['save' => 'Kaydet', ...]
 *      lang/en/common.php   →  ['save' => 'Save', ...]
 *
 *  Anahtar:  t('common.save')
 *            └──────┘ └──┘
 *             dosya   anahtar
 * =====================================================================
 */

declare(strict_types=1);

namespace App\Core;

final class Translator
{
    /**
     * Desteklenen diller.
     *
     * BEYAZ LİSTEDİR ve öyle olmak zorundadır: dil kodu adres
     * çubuğundan gelir ve doğrudan dosya yoluna girer. Serbest
     * bıraksaydık "?lang=../../etc/passwd" bir dosya okuma açığı
     * olurdu.
     *
     * @var array<string,array{name:string,native:string,dir:string,flag:string}>
     */
    public const LOCALES = [
        'tr' => ['name' => 'Türkçe',  'native' => 'Türkçe',   'dir' => 'ltr', 'flag' => 'TR'],
        'en' => ['name' => 'English', 'native' => 'English',  'dir' => 'ltr', 'flag' => 'EN'],
        'ar' => ['name' => 'Arapça',  'native' => 'العربية',  'dir' => 'rtl', 'flag' => 'AR'],
    ];

    public const DEFAULT_LOCALE = 'tr';

    /**
     * Yedek dil.
     *
     * Bir anahtar seçili dilde YOKSA buraya düşeriz. Alternatif,
     * ham anahtarı ("common.save") ekrana basmaktır — kullanıcı için
     * bozuk bir arayüz demektir. Yedek dilde de yoksa anahtarın
     * kendisi görünür ve bu, eksik çeviriyi test sırasında hemen
     * fark ettirir.
     */
    public const FALLBACK_LOCALE = 'tr';

    private static string $locale = self::DEFAULT_LOCALE;

    /** @var array<string,array<string,mixed>> Yüklenmiş sözlükler: "tr.common" => [...] */
    private static array $loaded = [];

    /* =================================================================
     *  DİL SEÇİMİ
     * ============================================================== */

    /**
     * Bu istekte hangi dil kullanılacak?
     *
     * SIRALAMA VE NEDENİ:
     *
     *  1) ADRESTEKİ ?lang=  → En açık niyet. Kullanıcı bağlantıya
     *     tıklayarak "şu dili istiyorum" demiştir. Ayrıca paylaşılan
     *     bir bağlantının dilini de belirler.
     *
     *  2) HESAP TERCİHİ     → Giriş yapmışsa kendi seçtiği dil.
     *     Hangi cihazdan girerse girsin aynı dili bulur.
     *
     *  3) ÇEREZ             → Giriş yapmamış ziyaretçinin son seçimi.
     *
     *  4) Accept-Language   → Tarayıcının bildirdiği tercih. Kullanıcı
     *     hiçbir şey seçmediyse en makul tahmin budur.
     *
     *  5) Varsayılan.
     *
     * Sıra tersine dönerse can sıkıcı olur: tarayıcı dili hesap
     * tercihini ezerse, kullanıcı her ziyarette dili yeniden
     * seçmek zorunda kalır.
     */
    public static function resolve(Request $request): string
    {
        // 1) Adres
        $fromUrl = (string) $request->input('lang');

        if (self::supports($fromUrl)) {
            return $fromUrl;
        }

        // 2) Hesap
        try {
            $user = Auth::user();

            if ($user !== null && self::supports($user->locale)) {
                return $user->locale;
            }
        } catch (\Throwable) {
            /* Veritabanı erişilemez olabilir (hata sayfası). Dil
             * seçimi uğruna hata sayfasını kaybetmeye değmez. */
        }

        // 3) Çerez
        $fromCookie = (string) ($_COOKIE['cy_locale'] ?? '');

        if (self::supports($fromCookie)) {
            return $fromCookie;
        }

        // 4) Tarayıcı
        $fromBrowser = self::fromAcceptLanguage((string) ($_SERVER['HTTP_ACCEPT_LANGUAGE'] ?? ''));

        if ($fromBrowser !== null) {
            return $fromBrowser;
        }

        // 5) Varsayılan
        return self::DEFAULT_LOCALE;
    }

    /**
     * Accept-Language başlığından desteklenen ilk dili seçer.
     *
     * Başlık şöyle gelir:
     *     tr-TR,tr;q=0.9,en-US;q=0.8,en;q=0.7
     *
     * "q" değeri tercih ağırlığıdır (1.0 en yüksek). Sıralamayı
     * ona göre yapmak gerekir; başlıktaki yazım sırasına güvenmek
     * yanlış dili seçtirebilir.
     *
     * "tr-TR" gibi bölge ekli kodları ana dile indiriyoruz: ayrı
     * bir "tr-TR" sözlüğü tutmuyoruz.
     */
    private static function fromAcceptLanguage(string $header): ?string
    {
        if (trim($header) === '') {
            return null;
        }

        $candidates = [];

        foreach (explode(',', $header) as $part) {
            $pieces = explode(';', trim($part));
            $code   = strtolower(trim($pieces[0]));

            // Ağırlık belirtilmemişse 1.0 kabul edilir.
            $quality = 1.0;

            if (isset($pieces[1]) && str_starts_with(trim($pieces[1]), 'q=')) {
                $quality = (float) substr(trim($pieces[1]), 2);
            }

            // "tr-TR" → "tr"
            $code = explode('-', $code)[0];

            if (self::supports($code)) {
                // Aynı dil birden çok kez geçebilir; en yükseği kalsın.
                $candidates[$code] = max($candidates[$code] ?? 0.0, $quality);
            }
        }

        if ($candidates === []) {
            return null;
        }

        arsort($candidates);

        return (string) array_key_first($candidates);
    }

    public static function supports(string $locale): bool
    {
        return isset(self::LOCALES[$locale]);
    }

    public static function setLocale(string $locale): void
    {
        self::$locale = self::supports($locale) ? $locale : self::DEFAULT_LOCALE;
    }

    public static function locale(): string
    {
        return self::$locale;
    }

    /** Metin yönü: "ltr" veya "rtl". */
    public static function direction(?string $locale = null): string
    {
        return self::LOCALES[$locale ?? self::$locale]['dir'] ?? 'ltr';
    }

    public static function isRtl(?string $locale = null): bool
    {
        return self::direction($locale) === 'rtl';
    }

    /* =================================================================
     *  ÇEVİRİ
     * ============================================================== */

    /**
     * Anahtarı çevirir.
     *
     *      t('common.welcome', ['name' => 'Evren'])
     *      → "Hoş geldin, Evren!"
     *
     * YER TUTUCULAR NEDEN ":ad" BİÇİMİNDE?
     * Cümleleri parçalayıp birleştirmek ("Hoş geldin, " . $ad . "!")
     * çeviri için ölümcüldür: her dilde sözcük sırası farklıdır ve
     * çevirmen parçaları yeniden dizemez. Tam cümleyi yer tutucuyla
     * vermek, çevirmene cümleyi istediği sıraya sokma özgürlüğü
     * tanır.
     *
     * @param array<string,string|int|float> $replace
     */
    public static function get(string $key, array $replace = [], ?string $locale = null): string
    {
        $locale = $locale ?? self::$locale;

        $line = self::lookup($key, $locale);

        /* Seçili dilde yoksa YEDEK DİLE düş. Ham anahtarı ekrana
         * basmak, kullanıcı için bozuk bir arayüz demektir. */
        if ($line === null && $locale !== self::FALLBACK_LOCALE) {
            $line = self::lookup($key, self::FALLBACK_LOCALE);
        }

        /* Yedekte de yoksa anahtarın kendisini gösteriyoruz.
         * Çirkindir — ve bilerek öyledir: eksik çeviri test
         * sırasında hemen göze çarpar. */
        if ($line === null) {
            return $key;
        }

        return self::replace($line, $replace);
    }

    /**
     * ÇOĞUL BİÇİM SEÇİMİ
     * ---------------------------------------------------------------
     *      n('common.records', 5)  →  "5 kayıt" / "5 records"
     *
     * Sözlükte biçimler "|" ile ayrılır:
     *      'records' => '{0} kayıt yok|:count kayıt'
     *
     * NEDEN DİLE GÖRE FARKLI KURAL?
     *   Türkçe   : tek biçim ("1 kayıt", "5 kayıt")
     *   İngilizce: iki biçim ("1 record", "5 records")
     *   Arapça   : ALTI biçim (sıfır, tekil, ikil, az, çok, diğer)
     *
     * "if ($n == 1)" diye yazılan kod İngilizce için doğru, Türkçe
     * için gereksiz, Arapça için tamamen yanlıştır. Kuralı DİLİN
     * kendisine bırakmak tek doğru yoldur.
     *
     * @param array<string,string|int|float> $replace
     */
    public static function choice(string $key, int $count, array $replace = [], ?string $locale = null): string
    {
        $locale = $locale ?? self::$locale;

        $line = self::lookup($key, $locale)
            ?? self::lookup($key, self::FALLBACK_LOCALE);

        if ($line === null) {
            return $key;
        }

        $forms = explode('|', $line);

        /* ÖZEL DURUM: "{0} ..." ile başlayan biçim, sayı tam olarak
         * sıfırken kullanılır. "0 kayıt bulundu" yerine "Kayıt yok"
         * demek çok daha doğal bir arayüz dilidir. */
        foreach ($forms as $form) {
            if (str_starts_with(trim($form), '{0}') && $count === 0) {
                $line = trim(substr(trim($form), 3));

                return self::replace($line, $replace + ['count' => $count]);
            }
        }

        // {0} biçimlerini ayıklayıp geri kalanlardan seçiyoruz.
        $forms = array_values(array_filter(
            $forms,
            static fn (string $form): bool => !str_starts_with(trim($form), '{0}')
        ));

        $index = self::pluralIndex($locale, $count);

        // Sözlükte o kadar biçim yoksa son biçime düşüyoruz.
        $line = $forms[$index] ?? end($forms);

        return self::replace(trim((string) $line), $replace + ['count' => $count]);
    }

    /**
     * Dile göre çoğul biçim indeksi.
     *
     * Kurallar CLDR'den (Unicode dil verisi) sadeleştirilmiştir.
     * Yeni bir dil eklerken buraya da bir satır eklemek gerekir —
     * unutmak, o dilde her zaman ilk biçimin kullanılması demektir.
     */
    private static function pluralIndex(string $locale, int $count): int
    {
        $count = abs($count);

        return match ($locale) {
            /* Türkçe'de sayıdan sonra isim ÇOĞUL EKİ ALMAZ:
             * "5 kayıt" doğru, "5 kayıtlar" yanlıştır. Tek biçim
             * yeterlidir. */
            'tr' => 0,

            /* Arapça: sıfır · tekil · ikil · az (3-10) · çok (11-99) · diğer */
            'ar' => match (true) {
                $count === 0 => 0,
                $count === 1 => 1,
                $count === 2 => 2,
                $count % 100 >= 3 && $count % 100 <= 10   => 3,
                $count % 100 >= 11 && $count % 100 <= 99  => 4,
                default => 5,
            },

            // İngilizce ve benzerleri: tekil / çoğul
            default => $count === 1 ? 0 : 1,
        };
    }

    /* =================================================================
     *  BİÇİMLENDİRME
     * ============================================================== */

    /**
     * Sayıyı yerel biçime çevirir.
     *
     *      1234.56  →  "1.234,56"  (tr)
     *                  "1,234.56"  (en)
     *                  "١٬٢٣٤٫٥٦"  (ar — intl eklentisi varsa)
     *
     * intl EKLENTİSİ VARSA onu kullanıyoruz: yerel biçimler
     * (ondalık ayracı, binlik ayracı, hatta rakam karakterleri)
     * orada eksiksiz tanımlıdır. Yoksa elle bir eşleme tablosuna
     * düşüyoruz — kusursuz değil ama çalışır. XAMPP'ta intl
     * genellikle KAPALIDIR; "sayılar neden yanlış biçimde"
     * sorusunun cevabı çoğu zaman budur.
     */
    public static function number(float $value, int $decimals = 0, ?string $locale = null): string
    {
        $locale = $locale ?? self::$locale;

        if (class_exists(\NumberFormatter::class)) {
            $formatter = new \NumberFormatter($locale, \NumberFormatter::DECIMAL);
            $formatter->setAttribute(\NumberFormatter::FRACTION_DIGITS, $decimals);

            $formatted = $formatter->format($value);

            if ($formatted !== false) {
                return $formatted;
            }
        }

        // intl yoksa: ayraçları elle veriyoruz.
        [$decimal, $thousands] = match ($locale) {
            'en'    => ['.', ','],
            default => [',', '.'],
        };

        return number_format($value, $decimals, $decimal, $thousands);
    }

    /**
     * Para birimini yerel biçime çevirir.
     *
     * DİKKAT: Bu YALNIZCA BİÇİMLENDİRMEDİR, çeviri değildir.
     * 100 TL'yi 100 dolar gibi göstermek ciddi bir hatadır; kur
     * dönüşümü ayrı bir iştir ve buraya karıştırılmamalıdır.
     */
    public static function money(float $value, string $currency = 'TRY', ?string $locale = null): string
    {
        $locale = $locale ?? self::$locale;

        if (class_exists(\NumberFormatter::class)) {
            $formatter = new \NumberFormatter($locale, \NumberFormatter::CURRENCY);

            $formatted = $formatter->formatCurrency($value, $currency);

            if ($formatted !== false) {
                return $formatted;
            }
        }

        $symbols = ['TRY' => '₺', 'USD' => '$', 'EUR' => '€'];
        $symbol  = $symbols[$currency] ?? $currency;

        // Türkçede simge sona, İngilizcede başa gelir.
        return $locale === 'tr'
            ? self::number($value, 2, $locale) . ' ' . $symbol
            : $symbol . self::number($value, 2, $locale);
    }

    /**
     * Tarihi yerel biçime çevirir.
     *
     * TARİH SIRASI DİLE GÖRE DEĞİŞİR:
     *      tr → 30.08.2026
     *      en → Aug 30, 2026
     * "d.m.Y" biçimini her dile dayatmak, İngilizce arayüzde
     * 08.30.2026 ile karışan bir tarih üretir.
     */
    public static function date(string $value, bool $withTime = false, ?string $locale = null): string
    {
        $locale = $locale ?? self::$locale;

        $timestamp = strtotime($value);

        if ($timestamp === false) {
            return $value;
        }

        if (class_exists(\IntlDateFormatter::class)) {
            $formatter = new \IntlDateFormatter(
                $locale,
                \IntlDateFormatter::MEDIUM,
                $withTime ? \IntlDateFormatter::SHORT : \IntlDateFormatter::NONE
            );

            $formatted = $formatter->format($timestamp);

            if ($formatted !== false) {
                return $formatted;
            }
        }

        $pattern = match ($locale) {
            'en'    => $withTime ? 'M j, Y H:i' : 'M j, Y',
            default => $withTime ? 'd.m.Y H:i'  : 'd.m.Y',
        };

        return date($pattern, $timestamp);
    }

    /* =================================================================
     *  SÖZLÜK YÜKLEME
     * ============================================================== */

    /**
     * "common.save" anahtarını sözlükte arar.
     *
     * Dosya YALNIZCA BİR KEZ yüklenir ve bellekte tutulur; aynı
     * sayfada yüzlerce çeviri çağrısı yapıldığı için bu fark eder.
     */
    private static function lookup(string $key, string $locale): ?string
    {
        [$file, $path] = array_pad(explode('.', $key, 2), 2, null);

        if ($path === null) {
            return null;
        }

        $dictionary = self::load($locale, (string) $file);

        // "users.title" gibi iç içe anahtarları da destekliyoruz.
        $value = $dictionary;

        foreach (explode('.', $path) as $segment) {
            if (!is_array($value) || !array_key_exists($segment, $value)) {
                return null;
            }

            $value = $value[$segment];
        }

        return is_string($value) ? $value : null;
    }

    /**
     * Sözlük dosyasını yükler.
     *
     * @return array<string,mixed>
     */
    private static function load(string $locale, string $file): array
    {
        $cacheKey = $locale . '.' . $file;

        if (isset(self::$loaded[$cacheKey])) {
            return self::$loaded[$cacheKey];
        }

        /* GÜVENLİK: Dil kodu beyaz listeden geçmiştir; dosya adını da
         * temizliyoruz. İkisi birlikte, "../" ile klasör dışına
         * çıkma ihtimalini tamamen kapatır. */
        $safeFile = preg_replace('/[^a-z0-9_-]/i', '', $file) ?? '';

        $path = CY_BASE . '/lang/' . $locale . '/' . $safeFile . '.php';

        if (!self::supports($locale) || $safeFile === '' || !is_file($path)) {
            return self::$loaded[$cacheKey] = [];
        }

        $data = require $path;

        return self::$loaded[$cacheKey] = is_array($data) ? $data : [];
    }

    /**
     * Yer tutucuları değiştirir: ":name" → "Evren"
     *
     * Anahtarları UZUNDAN KISAYA sıralıyoruz. Aksi halde ":count"
     * yer tutucusu ":count_total" içindeki ":count" parçasını da
     * değiştirir ve ortaya "5_total" gibi bozuk bir metin çıkar.
     *
     * @param array<string,string|int|float> $replace
     */
    private static function replace(string $line, array $replace): string
    {
        if ($replace === []) {
            return $line;
        }

        uksort($replace, static fn (string $a, string $b): int => strlen($b) <=> strlen($a));

        foreach ($replace as $key => $value) {
            $line = str_replace(':' . $key, (string) $value, $line);
        }

        return $line;
    }
}
