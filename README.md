<div align="center">

<img src="assets/images/logo.png" alt="Çılgın Yazılım" width="90">

# Çoklu Dil (i18n) Sistemi

### PHP 8 · PDO · MySQL · Oturum Girişli Panel · Çoğul Kuralları · RTL · Çılgın Yazılım Tasarım Kalıbı

**Üç dil, üç ayrı çoğul kuralı ve sağdan sola yazılan bir arayüz — kütüphanesiz.**

[![PHP](https://img.shields.io/badge/PHP-8.0%2B-777BB4?style=flat-square&logo=php&logoColor=white)](https://php.net)
[![MySQL](https://img.shields.io/badge/MySQL-5.7%2B-4479A1?style=flat-square&logo=mysql&logoColor=white)](https://mysql.com)
[![Bootstrap](https://img.shields.io/badge/Bootstrap-5.3-7952B3?style=flat-square&logo=bootstrap&logoColor=white)](https://getbootstrap.com)
[![Composer](https://img.shields.io/badge/Composer-gerekmiyor-16a34a?style=flat-square)](#kurulum)
[![License](https://img.shields.io/badge/Lisans-MIT-16a34a?style=flat-square)](LICENSE)

**🇹🇷 Türkçe** · [🇬🇧 English](README.en.md)

[**▶ Canlı Demo**](https://cilginyazilim.com/kutuphane/uygulama/multi-language-system/) · [Kaynak Kütüphanesi](https://cilginyazilim.com/kutuphane/php-multi-language-i18n) · [cilginyazilim.com](https://cilginyazilim.com)

</div>

---

<div align="center">

## Canlı Demo

**Kurulum yok, kayıt yok, indirme yok — tarayıcınızdan 3 saniyede deneyin.**

<a href="https://cilginyazilim.com/kutuphane/uygulama/multi-language-system/"><img src="https://img.shields.io/badge/CANLI_DEMOYU_A%C3%87-0b5cb5?style=for-the-badge&logo=googlechrome&logoColor=white&labelColor=061321" alt="Canlı Demoyu Aç" height="42"></a>
<a href="https://cilginyazilim.com/kutuphane/php-multi-language-i18n"><img src="https://img.shields.io/badge/KAYNAK_KODU_%C4%B0NCELE-0ea5e9?style=for-the-badge&logo=readthedocs&logoColor=white&labelColor=061321" alt="Kaynak Kodu İncele" height="42"></a>
<a href="https://github.com/CilginYazilim/multi-language-system/archive/refs/heads/main.zip"><img src="https://img.shields.io/badge/ZIP_%C4%B0ND%C4%B0R-16a34a?style=for-the-badge&logo=github&logoColor=white&labelColor=061321" alt="ZIP İndir" height="42"></a>

<br><br>

<a href="https://cilginyazilim.com/kutuphane/uygulama/multi-language-system/" title="Canlı demoyu açmak için tıklayın">
  <img src="docs/screenshots/03-dil-ornekleri.png" alt="Çoklu dil sistemi canlı demo önizlemesi" width="860">
</a>

<sub>▲ Görsele tıklayarak demoyu açabilirsiniz</sub>

</div>

<br>

### Demo hesapları

| Rol | E-posta | Parola |
|---|---|---|
| Yönetici | `admin@cilginyazilim.com` | `Admin1234` |
| Kullanıcı | `demo@cilginyazilim.com` | `Demo1234` |

Giriş ekranındaki hazır düğmelerle alanları tek tıkla doldurabilirsiniz.

### Demoda 60 saniyede neleri deneyebilirsiniz?

| # | Şunu deneyin | Perde arkasında ne oluyor? |
|---|---|---|
| **1** | Üst çubuktaki **dil seçicisinden** `EN` seçin | Sayfa yenilenir ama **bulunduğunuz sayfada kalırsınız**. Dil seçici ana sayfaya atmaz; bulunduğunuz adrese `?lang=` ekler |
| **2** | Şimdi `AR` seçin | Bütün düzen **aynalanır**: kenar çubuğu sağa geçer, metin sağa yaslanır, tablo sütunları ters sıraya döner. Tek bir "mobil sürüm" dosyası yok; CSS mantıksal özelliklerle yazıldığı için `dir="rtl"` yetiyor |
| **3** | **Dil Örnekleri** sayfasında "Çoğul kuralları" tablosuna bakın | `0, 1, 2, 5, 11, 100` sayıları için üç dilin **farklı** karşılıkları yan yana durur. Türkçe tek biçim, İngilizce iki, Arapça **altı** biçim kullanır |
| **4** | Aynı tabloda Arapça sütununda `2` satırına bakın | `سجلان` yazar — bu ne tekil ne çoğuldur, Arapça'nın **ikili (dual)** biçimidir. `if ($n == 1)` yazan bir kod bunu asla üretemez |
| **5** | "Yer tutucular" bölümündeki cümleyi Arapça'da okuyun | `Hoş geldiniz, Sistem!` cümlesi Arapça'da **sözcük sırası değişerek** kurulur. Cümleyi `'Hoş geldin, ' . $ad` diye parçalasaydınız bu mümkün olmazdı |
| **6** | "Sayı, tarih ve para" tablosuna bakın | Aynı sayı üç dilde üç farklı biçimde yazılır: binlik ayracı, ondalık ayracı ve para biriminin cümledeki yeri değişir. Bunu `number_format()` değil, **`intl`** yapar |
| **7** | Çıkış yapıp `AR` seçin, sonra **giriş yapın** | Dil seçiminiz giriş ekranından panele **taşınır**; hesabınıza yazılır. Çerezi silseniz bile tercihiniz kaybolmaz |
| **8** | Sağ üstteki **ay/güneş** simgesine basın | Koyu tema açılır ve hesabınıza kaydedilir. Tablo hücrelerinin kontrastı koyu temada da ölçülüdür (14,5:1) |
| **9** | **Kullanıcılar** sayfasında arama kutusuna `ş` yazın | Arama sunucuda çalışır; `LIKE` jokerleri kaçışlanır ve sıralama sütunu **beyaz listeden** doğrulanır |
| **10** | Telefonunuzdan açın | Kenar çubuğu alt navigasyona dönüşür; sayfa gövdesinde **yatay kaydırma yoktur** |

> **İpucu:** Demoyu açıkken adres çubuğuna `?lang=ar` ekleyin. Dilin nasıl seçildiğini görmek için [Dil nasıl seçilir?](#dil-nasıl-seçilir) bölümüne bakın — sıra `?lang=` → hesap → çerez → tarayıcı → varsayılan şeklindedir.

### Demo alanı hakkında bilinmesi gerekenler

| Konu | Durum |
|---|---|
| **Veriler** | `database.sql` içindeki **51 örnek kullanıcı**. Gerçek kişi verisi yoktur; adresler `@ornek.com` uzantılıdır. |
| **Sıfırlama** | Demo veritabanı **düzenli aralıklarla** başlangıç hâline döner; yaptığınız değişiklikler kalıcı değildir. |
| **Kimlik doğrulama** | **Vardır.** Oturum, "beni hatırla" jetonu, hız sınırı ve CSRF korumasıyla birlikte gelir. |
| **`APP_DEBUG`** | Canlıda **kendiliğinden `false`** — sunucu adından türetilir, yerelde `true` kalır. |
| **`intl` eklentisi** | Demo sunucusunda **açıktır**. Kapalı olsaydı uygulama çalışmaya devam eder, yalnızca yerel biçimler sadeleşirdi. |
| **Bağımlılık** | **Sıfır.** Composer yok, npm yok, CDN yok. Demo internetsiz bir sunucuda da aynı çalışır. |

> Demo geçici olarak kapalıysa endişelenmeyin: depoyu klonlayıp `database.sql`'i içe aktarmanız aynı ekranı kendi bilgisayarınızda **2 dakikada** ayağa kaldırır → [Kurulum](#kurulum)

---

## Bu Proje Nedir?

"Siteyi çok dilli yapalım" cümlesi, çoğu projede bir dizi dosyası açıp `$lang['kaydet'] = 'Kaydet';` yazmakla başlar ve orada biter. Sonra ilk gerçek cümle gelir — *"5 kayıt bulundu"* — ve sistem çöker. Çünkü:

- **Türkçe'de** sayıdan sonra çoğul eki gelmez: "5 kayıt", "5 kayıtlar" değil.
- **İngilizce'de** iki biçim vardır: "1 record" / "5 records".
- **Arapça'da altı** biçim vardır ve bunlardan biri **ikili**dir: 2 için ne tekil ne çoğul, bambaşka bir sözcük kullanılır.

`if ($n == 1)` yazan kod İngilizce için doğru, Türkçe için gereksiz, Arapça için **tamamen yanlıştır**. Kural dile aittir; koda değil.

Bu proje o kuralı dilin kendisine bırakan bir i18n katmanı kuruyor: çeviriler PHP dizisi olarak `lang/<dil>/` altında durur, çoğul biçimi **`intl` eklentisinin `MessageFormatter`'ı** seçer, sayı/tarih/para biçimleri **`NumberFormatter` ve `IntlDateFormatter`** ile yerelleştirilir ve arayüz Arapça'ya geçtiğinde **tek bir ek CSS dosyası olmadan** sağdan sola döner.

Dahası, bunların hepsi **oturum girişli, gerçek bir panelin içinde** çalışır: kullanıcının dil tercihi hesabına yazılır, koyu tema tercihiyle birlikte cihazdan cihaza taşınır.

**Kimler için uygun?**

- Projesine ikinci (veya üçüncü) dili eklemek üzere olanlar
- "Çoğul eki nasıl yapılır?" sorusunun cevabının `if` olmadığını öğrenmek isteyenler
- Arapça, Farsça veya İbranice desteği verecek olanlar (RTL)
- Kütüphaneye bağlanmadan, PHP'nin kendi `intl` eklentisiyle iş görmek isteyenler
- Bootstrap 5 üzerine kurulu, tekrar kullanılabilir bir panel kalıbı arayanlar

> **Klonla, `database.sql`'i içe aktar, çalıştır.** Başka hiçbir kurulum adımı yok. Composer yok, npm yok, internet bağlantısı bile gerekmiyor — tüm kütüphaneler proje içinde.

Bu proje, **[Çılgın Yazılım Kütüphanesi](https://cilginyazilim.com/kutuphane)** altında yayınlanan açıklamalı, üretime hazır örneklerden biridir.

---

## İçindekiler

- [Canlı Demo](#canlı-demo)
- [Bu Proje Nedir?](#bu-proje-nedir)
- [Ekran Görüntüleri](#ekran-görüntüleri)
- [Kritik Kararlar](#kritik-kararlar)
- [Neler Var?](#neler-var)
- [Çeviri dört iştir](#çeviri-dört-iştir)
- [Çoğul kuralları](#çoğul-kuralları)
- [Dil nasıl seçilir?](#dil-nasıl-seçilir)
- [RTL desteği](#rtl-desteği)
- [Yeni dil eklemek](#yeni-dil-eklemek)
- [Güvenlik: Neyi, Nasıl Kapattık?](#güvenlik-neyi-nasıl-kapattık)
- [Kurulum](#kurulum)
- [Yapılandırma](#yapılandırma)
- [Kendi Projenize Eklemek](#kendi-projenize-eklemek)
- [Dosya Yapısı](#dosya-yapısı)
- [Nasıl Çalışıyor?](#nasıl-çalışıyor)
- [Veritabanı Şeması](#veritabanı-şeması)
- [SSS](#sss)
- [Canlı Ortama Alırken](#canlı-ortama-alırken)
- [Sorun Giderme](#sorun-giderme)
- [Yol Haritası](#yol-haritası)
- [Katkı](#katkı)
- [Lisans](#lisans)

---

## Ekran Görüntüleri

### Dil örnekleri

Projenin konusu bu sayfada toplanır. Çoğul kuralları tablosunda `0, 1, 2, 5, 11, 100` sayılarının üç dildeki karşılıkları yan yana durur: Türkçe tek biçim, İngilizce iki, Arapça **altı** biçim kullanır. Altında yer tutuculu cümleler, sayı/tarih/para biçimleri ve göreli zaman aynı ekranda görülür — hepsini `intl` üretir, hiçbirini `if` üretmez.

![Dil örnekleri: çoğul kuralları, yer tutucular ve yerelleştirilmiş sayı, tarih, para biçimleri](docs/screenshots/03-dil-ornekleri.png)

### Arapça (RTL)

Dil seçicisinden `AR` seçildiğinde bütün düzen **aynalanır**: kenar çubuğu sağa geçer, metin sağa yaslanır, tablo sütunları ters sıraya döner. Ayrı bir "RTL sürümü" CSS dosyası yoktur; arayüz mantıksal özelliklerle (`margin-inline-start`, `padding-inline`) yazıldığı için `dir="rtl"` tek başına yetiyor.

![Arapça sağdan sola görünüm: kenar çubuğu sağda, metin sağa yaslı, sütunlar ters sırada](docs/screenshots/04-arapca-rtl.png)

### Kullanıcılar

Sunucu taraflı sayfalama ve filtreleme. Arama kutusu ile açılır listeler **"Uygula"ya basmadan** çalışır: listeler anında, arama kutusu 450 ms yazma beklemesiyle. Filtre ve sayfa numarası adres çubuğunda taşındığı için bağlantı paylaşılabilir, geri tuşu ve yenileme aynı sonucu verir.

![Kullanıcı listesi: canlı çalışan arama ve durum filtresi, sunucu taraflı sayfalama](docs/screenshots/05-kullanicilar.png)

### Kontrol paneli

Sayaç şeridi ve dil katmanının özeti. Kullanıcının dil tercihi tarayıcıda değil **hesabında** durur; koyu tema tercihiyle birlikte cihazdan cihaza taşınır.

![Kontrol paneli: sayaç şeridi ve dil katmanının özeti](docs/screenshots/02-kontrol-paneli.png)

### Giriş ekranı

Demo hesapları tek tıkla doldurulur. Giriş denemeleri hız sınırına tabidir; art arda başarısız denemeden sonra hesap geçici olarak kilitlenir. Giriş ekranında seçilen dil, girişten sonra hesaba **taşınır**.

![Giriş ekranı: demo hesapları tek tıkla doldurulur](docs/screenshots/01-giris.png)

### Koyu tema

Tema tarayıcıda değil kullanıcı hesabında saklanır. Tablo hücrelerinin kontrastı koyu temada da ölçülüdür (14,5:1).

![Koyu tema görünümü](docs/screenshots/06-koyu-tema.png)

### Mobil görünüm

390px genişlikte kenar çubuğu alt navigasyona dönüşür. Sayfa gövdesinde yatay kaydırma yoktur; geniş tablolar yalnızca kendi kapsayıcılarında kayar.

<img src="docs/screenshots/07-mobil.png" alt="390px genişlikte mobil görünüm" width="360">

---

## Kritik Kararlar

Bu bölüm, "neden böyle yapılmış?" sorusunun cevabıdır. Her madde bilerek verilmiş bir karardır.

### 1. Çoğul kuralını `if` değil, `intl` belirler

Yanlış olan:

```php
$metin = $n == 1 ? '1 kayıt' : "$n kayıtlar";
```

Bu kod İngilizce'nin kuralını bütün dillere dayatır. Doğrusu, kuralı dile sormaktır:

```php
echo n('common.records', $count);
```

Arka planda `MessageFormatter` çalışır ve çeviri dosyasındaki ICU kalıbını kullanır:

```php
// lang/ar/common.php
'records' => '{n, plural, zero{لا توجد سجلات} one{سجل واحد} two{سجلان} few{# سجلات} many{# سجلاً} other{# سجل}}',
```

Arapça'nın altı kategorisi (`zero`, `one`, `two`, `few`, `many`, `other`) burada görünür. Türkçe dosyasında yalnızca `other` vardır — çünkü Türkçe'nin ihtiyacı odur. **Kod hiçbir dilin kuralını bilmez.**

### 2. Cümle parçalanmaz, yer tutucu kullanılır

Yanlış olan:

```php
echo t('welcome_prefix') . ' ' . $user->name . '!';
```

Bu, sözcük sırasının bütün dillerde aynı olduğunu varsayar. Arapça'da değildir. Doğrusu:

```php
echo t('common.auth.welcome', ['name' => $user->name]);
```

Çevirmen artık cümlenin tamamını görür ve kendi dilinin sırasına göre kurar. Yer tutucu nereye giderse gitsin çalışır.

### 3. Dil seçimi beş kaynaktan, belirli bir sırayla gelir

`Translator::resolve()` şu sırayı izler:

```
?lang=  →  hesap tercihi  →  çerez  →  tarayıcı (Accept-Language)  →  varsayılan
```

Sıra rastgele değildir: en dıştaki **açık** talep (adres), en içteki **tahmin**tir (tarayıcı). Adresteki seçim her şeyi ezer, çünkü kullanıcı o an bilerek istemiştir.

Gelen değer her adımda `Translator::supports()` ile **beyaz listeden** geçer; `Translator::LOCALES` dizisinde tanımlı olmayan bir dil kodu asla kabul edilmez. Aksi hâlde `?lang=../../etc/passwd` bir dosya yolu hâline gelirdi.

### 4. Dil tercihi hem çerezde hem hesapta durur

Yalnızca çerezde tutulsaydı, kullanıcı işten eve geçtiğinde veya çerezleri temizlediğinde tercihi kaybolurdu. Yalnızca hesapta tutulsaydı, **giriş yapmamış** ziyaretçi dil seçemezdi.

İkisi birden: ziyaretçi çerezle, üye hesabıyla taşınır. Giriş anında çerezdeki seçim hesaba yazılır.

### 5. Dil değiştirince bulunduğunuz sayfada kalırsınız

Çoğu örnekte dil seçici sizi ana sayfaya atar. Bu, 8. sayfadaki bir listeyi okurken dili değiştirdiğinizde okuduğunuz yeri kaybetmeniz demektir.

Burada seçici, **bulunduğunuz adrese** `?lang=` ekler. Sorgu dizesindeki diğer parametreler (`page`, `q`, `per`) korunur.

### 6. RTL için ayrı CSS dosyası yok

`left`/`right` yerine **mantıksal özellikler** kullanılır:

```css
/* Yanlış: Arapça'da ters tarafa gider */
.cy-card { padding-left: 1rem; border-left: 3px solid; }

/* Doğru: yön neyse ona uyar */
.cy-card { padding-inline-start: 1rem; border-inline-start: 3px solid; }
```

`<html dir="rtl">` yazıldığı anda düzen kendiliğinden aynalanır. Bakımı iki kat artıran bir `rtl.css` dosyası yoktur.

### 7. `intl` yoksa uygulama çökmez

`intl` eklentisi PHP'de varsayılan olarak açık değildir. Kapalıysa `MessageFormatter` bulunamaz ve uygulama ölürdü.

Bunun yerine `Translator` her yerelleştirme çağrısında eklentinin varlığını denetler ve yoksa sade bir yedeğe düşer: çoğulda `other` biçimi, sayıda `number_format()`, tarihte `date()`. Site **çalışmaya devam eder**, yalnızca biçimler sadeleşir. Kontrol panelindeki "İNTL" satırı hangi modda olduğunuzu söyler.

---

## Neler Var?

<table>
<tr><td valign="top" width="50%">

**Çeviri katmanı**

- `t()` — metin çevirisi, yer tutuculu
- `te()` — çevir ve HTML'e kaçışlayarak bas
- `n()` — çoğul kuralına uyan çeviri
- Nokta notasyonu (`common.nav.users`)
- Eksik anahtarda **anahtarın kendisi** basılır (boş metin değil)
- Çeviri dosyaları düz PHP dizisi — derleme yok
- Üç dil: **Türkçe, İngilizce, Arapça** · 73 anahtar, üçünde de tam

**Yerelleştirme**

- `intl` ile çoğul kuralları (ICU)
- `NumberFormatter` ile sayı ve para
- `IntlDateFormatter` ile tarih ve saat
- `intl` yoksa otomatik sade yedek

</td><td valign="top" width="50%">

**Panel ve güvenlik**

- Oturum girişi, "beni hatırla" jetonu
- Giriş denemesi **hız sınırı** (`login_attempts`)
- CSRF koruması (`hash_equals`)
- Sertleştirilmiş oturum: `HttpOnly`, `SameSite`, kimlik yenileme
- İçerik Güvenlik Politikası (`script-src 'self'`)
- `X-Frame-Options: DENY`, `nosniff`, `Referrer-Policy`

**Arayüz**

- Çılgın Yazılım tasarım kalıbı
- Açık / koyu tema, hesaba kayıtlı
- Sunucu tarafında sayfalama ve arama
- Mobilde alt navigasyon, yatay kaydırma yok
- Kullanıcılar sayfasında canlı filtre (JS kapalıysa da çalışır)
- Sıfır bağımlılık: Composer yok, npm yok, CDN yok

</td></tr>
</table>

---

## Çeviri dört iştir

Çok dillilik tek bir iş değildir; birbirine benzeyen ama farklı kuralları olan dört iştir. Uygulama dördünü de ayrı ayrı ele alır.

**1 · Metin çevirisi.** En basit hâli: anahtar ver, çevrilmiş metni al.

```php
echo t('common.save');        // Kaydet / Save / حفظ
```

**2 · Yer tutucular.** Cümlenin içine değişken girdiğinde.

```php
echo t('common.auth.welcome', ['name' => $user->name]);
```

**3 · Çoğul.** Sayıya göre biçim değiştiğinde. Kuralı dil belirler:

```php
echo n('common.records', $count);
```

**4 · Biçimlendirme.** Sayı, tarih ve para birimi. Aynı değer her dilde farklı yazılır:

```php
echo local_number(1234567.89, 2);  // 1.234.567,89  /  1,234,567.89
echo local_date($tarih);           // 3 Eylül 2026  /  September 3, 2026
echo local_money(199.90, 'TRY');   // ₺199,90       /  ₺199.90
```

---

## Çoğul kuralları

Bir tablo her şeyi anlatır. `n('common.records', $count)` çağrısının üç dildeki çıktısı:

| `$count` | Türkçe | İngilizce | Arapça |
|---|---|---|---|
| 0 | Kayıt yok | No records | لا توجد سجلات |
| 1 | 1 kayıt | 1 record | سجل واحد |
| 2 | 2 kayıt | 2 records | سجلان |
| 5 | 5 kayıt | 5 records | 5 سجلات |
| 11 | 11 kayıt | 11 records | 11 سجلاً |
| 100 | 100 kayıt | 100 records | 100 سجل |

Dikkat edilecek üç nokta:

1. **Türkçe sütunu hiç değişmiyor** (0 hariç). Türkçe'de sayıdan sonra çoğul eki gelmez.
2. **Arapça'da 2 satırı** diğerlerine benzemiyor: `سجلان` ikili biçimdir, tekil de çoğul da değildir.
3. **Arapça'da 5, 11 ve 100** üç farklı biçim kullanıyor (`few`, `many`, `other`).

Bunların hiçbiri PHP kodunda yazılı değildir. Üçü de çeviri dosyasındaki ICU kalıbından gelir.

---

## Dil nasıl seçilir?

```
İstek gelir
   │
   ├── 1) ?lang=en var mı?          → beyaz listede mi? → evet ise KULLAN
   │        (kullanıcı az önce açıkça istedi)
   │
   ├── 2) Giriş yapmış mı?          → users.locale dolu mu? → KULLAN
   │        (hesabına kaydedilmiş tercih)
   │
   ├── 3) cy_locale çerezi var mı?  → beyaz listede mi? → KULLAN
   │        (giriş yapmamış ziyaretçinin önceki seçimi)
   │
   ├── 4) Accept-Language başlığı    → desteklenen bir dille eşleşiyor mu? → KULLAN
   │        (tarayıcının tahmini)
   │
   └── 5) Hiçbiri yoksa             → varsayılan dil (tr)
```

Her adımda gelen değer `Translator::LOCALES` dizisindeki anahtarlarla karşılaştırılır (`Translator::supports()`). Listede olmayan hiçbir değer kabul edilmez — dil kodu bir dosya yoluna dönüştüğü için bu kontrol güvenliğin parçasıdır.

### Dil değiştirince sayfada kalırsınız

Dil seçici, o anki adresi alır ve yalnızca `lang` parametresini değiştirir:

```php
// views/partials/langswitch.php
<a href="<?= e(lang_url($kod)) ?>">…</a>
```

`lang_url()` yardımcısı o anki adresi alır, sorgu dizesindeki diğer parametreleri korur ve yalnızca `lang` değerini değiştirir.

`?page=8&q=ahmet` ile geldiyseniz dili değiştirdikten sonra da 8. sayfada, aynı aramadasınızdır.

---

## RTL desteği

Arapça, Farsça ve İbranice sağdan sola yazılır. Bu, "metni sağa yasla" demek değildir; **bütün düzenin aynalanması** demektir.

`<html>` etiketine `dir` yazılır:

```php
<html lang="<?= e($locale) ?>" dir="<?= e($direction) ?>">
```

`Translator::direction()` dil koduna bakar ve `rtl` veya `ltr` döner. Yön, dilin `Translator::LOCALES` içindeki kaydında durur:

```php
'ar' => ['name' => 'Arapça', 'native' => 'العربية', 'dir' => 'rtl', 'flag' => 'AR'],
```

Gerisi CSS'in işidir.

### Altın kural: mantıksal özellikler kullanın

| Fiziksel (kaçının) | Mantıksal (kullanın) |
|---|---|
| `margin-left` | `margin-inline-start` |
| `padding-right` | `padding-inline-end` |
| `border-left` | `border-inline-start` |
| `text-align: left` | `text-align: start` |
| `left: 0` | `inset-inline-start: 0` |

Mantıksal özellikler "sol/sağ" değil, "başlangıç/bitiş" der. Başlangıç, LTR'de soldur; RTL'de sağdır. Böylece **tek bir kural iki yönde de doğru** çalışır.

Kaçınılmaz istisnalar için (örneğin yön belirten bir ok simgesi) tek satırlık bir kural yeterlidir:

```css
[dir="rtl"] .cy-arrow { transform: scaleX(-1); }
```

---

## Yeni dil eklemek

Üç adım. Kod değişikliği yok.

**1 · Klasörü oluşturun ve çeviriyi kopyalayın**

```bash
mkdir -p lang/de
cp lang/en/common.php lang/de/common.php
```

**2 · Değerleri çevirin.** Anahtarlara dokunmayın; yalnızca sağ tarafı değiştirin.

Çoğul kalıplarında **o dilin** kategorilerini kullanın. Almanca'da İngilizce gibi iki kategori vardır:

```php
'records' => '{n, plural, zero{Keine Einträge} one{1 Eintrag} other{# Einträge}}',
```

**3 · Dili kayıt defterine ekleyin**

Desteklenen diller `Translator::LOCALES` dizisinde durur. Her kayıt dilin
adını, kendi dilindeki adını, **metin yönünü** ve seçicide görünecek kısa
kodunu taşır:

```php
// app/Core/Translator.php
public const LOCALES = [
    'tr' => ['name' => 'Türkçe',  'native' => 'Türkçe',   'dir' => 'ltr', 'flag' => 'TR'],
    'en' => ['name' => 'İngilizce','native' => 'English',  'dir' => 'ltr', 'flag' => 'EN'],
    'ar' => ['name' => 'Arapça',  'native' => 'العربية',  'dir' => 'rtl', 'flag' => 'AR'],
    'de' => ['name' => 'Almanca', 'native' => 'Deutsch',  'dir' => 'ltr', 'flag' => 'DE'],
];
```

Sağdan sola yazılan bir dil ekliyorsanız yalnızca `'dir' => 'rtl'` yazmanız
yeterlidir; ayrı bir liste yoktur. Dil seçici yeni dili kendiliğinden gösterir
ve `Translator::supports()` beyaz listesi de bu diziden türer.

**4 · `users.locale` sütununu genişletin**

Bu adım atlanırsa yeni dil **görünür ama hesaba kaydedilemez**:

```sql
ALTER TABLE `users`
  MODIFY COLUMN `locale` ENUM('tr','en','ar','de') NOT NULL DEFAULT 'tr';
```

Sütunun neden `ENUM` olduğunu ve ödünleşimini
[Veritabanı Şeması](#veritabanı-şeması) bölümünde anlattık.

> **Eksik anahtar bırakırsanız ne olur?** Uygulama çökmez; ekranda **anahtarın kendisi** görünür (`common.save`). Bu bilerek seçilmiştir: boş bir metin sessizce kaybolur, anahtar ise "burada eksik çeviri var" diye bağırır.

---

## Güvenlik: Neyi, Nasıl Kapattık?

| Açık | Tipik hatalı kod | Bu projede |
|---|---|---|
| **Yol geçişi (dil kodu)** | `require "lang/$_GET[lang]/common.php"` | Dil kodu `SUPPORTED` **beyaz listesinden** doğrulanır; listede yoksa varsayılana düşer |
| **SQL enjeksiyonu** | `"... WHERE email = '$email'"` | Tüm sorgular hazır ifade; `ATTR_EMULATE_PREPARES = false` |
| **Sıralama sütunu enjeksiyonu** | `ORDER BY $_GET[sort]` | Sütun adı **beyaz listeden**; yön yalnızca `ASC`/`DESC` |
| **XSS** | `echo $user->name` | Sunucuda `e()`, çeviride `te()`; ayrıca CSP `script-src 'self'` |
| **CSRF** | Gizli alan yok | Her POST'ta jeton; karşılaştırma `hash_equals()` ile (zamanlama saldırısına kapalı) |
| **Parola sızıntısı** | `md5($parola)` | `password_hash()` / `password_verify()`; algoritma eskiyince **otomatik yeniden özetleme** |
| **Kullanıcı sayımı** | "Böyle bir e-posta yok" | Hem yanlış e-postada hem yanlış parolada **aynı** mesaj ve **aynı** süre (sahte özet doğrulaması) |
| **Kaba kuvvet** | Sınırsız deneme | `login_attempts` tablosuyla e-posta + IP başına hız sınırı |
| **Oturum çalma** | Sabit oturum kimliği | Girişte kimlik yenilenir; çerez `HttpOnly` + `SameSite=Lax` + HTTPS'te `Secure` |
| **Hata sızıntısı** | Canlıda `display_errors=On` | `APP_DEBUG` **ortamdan türetilir**; gerçek alan adında kendiliğinden kapanır |
| **Tıklama hırsızlığı** | Başlık yok | `X-Frame-Options: DENY` |
| **Bozuk UTF-8'de sessiz JSON kaybı** | `json_encode($v)` | `JSON_INVALID_UTF8_SUBSTITUTE` — bozuk bayt tüm yanıtı yutmaz |

---

## Kurulum

### Gereksinimler

| | |
|---|---|
| PHP | 8.0 veya üzeri |
| MySQL / MariaDB | 5.7+ / 10.3+ |
| Web sunucusu | Apache (`mod_rewrite`) veya Nginx |
| PHP eklentileri | `pdo_mysql`, `mbstring` · **önerilen:** `intl` |

`intl` zorunlu değildir; yoksa uygulama sade yedeğe düşer (bkz. [Kritik Kararlar #7](#7-intl-yoksa-uygulama-çökmez)).

### Adımlar

**1 · Dosyaları yerleştirin**

```bash
git clone https://github.com/CilginYazilim/multi-language-system.git
cd multi-language-system
```

**2 · Veritabanını içe aktarın**

```bash
mysql -u root -p < database.sql
```

Dosya veritabanını **kendisi oluşturur** (`cy_i18n`), tabloları kurar ve 51 örnek kullanıcı yükler.

**3 · `.env` dosyasını oluşturun**

```bash
cp .env.example .env        # Windows: copy .env.example .env
```

İçindeki veritabanı bilgilerini kendinize göre düzenleyin.

**4 · Açın**

```
http://localhost/multi-language-system/
```

Giriş: `admin@cilginyazilim.com` / `Admin1234`

### `intl` eklentisini açmak

`php.ini` içinde şu satırın başındaki `;` işaretini kaldırın ve sunucuyu yeniden başlatın:

```ini
extension=intl
```

Açık olup olmadığını kontrol panelindeki **İNTL** satırından görebilirsiniz.

---

## Yapılandırma

Bütün ayarlar `config/config.php` içinde tek bir dizide toplanır; hassas değerler `.env` dosyasından okunur.

```env
APP_DEBUG=true          # silerseniz: yerelde açık, canlıda kapalı
APP_URL=                # boş bırakılırsa adres otomatik tespit edilir
APP_PRETTY_URLS=true    # false → /index.php?r=users

DB_HOST=127.0.0.1
DB_PORT=3306
DB_NAME=cy_i18n
DB_USER=root
DB_PASS=
```

> **`.env` dosyası `.gitignore` içindedir.** Parolanız asla depoya gitmez. `APP_DEBUG` satırını tümüyle silerseniz uygulama ortamdan karar verir: `localhost`, `*.test` ve `*.local` adreslerinde açık, gerçek bir alan adında kapalı.

**mod_rewrite yoksa:** `.env` içinde `APP_PRETTY_URLS=false` yapın. Uygulama hiçbir kod değişikliği olmadan `/index.php?r=users` biçimine döner.

---

## Kendi Projenize Eklemek

Çeviri katmanı üç dosyadan ibarettir ve panelden bağımsız çalışır.

**1 · Kopyalayın**

```
app/Core/Translator.php     → çeviri motoru
app/Support/helpers.php     → t() te() n() local_number() local_date() local_money()
lang/                       → çeviri dosyaları
```

**2 · İsteğin başında dili belirleyin.** Bu, **görünümlerden önce** olmalıdır; yoksa ilk basılan metinler varsayılan dilde kalır.

```php
$locale = Translator::resolve($request);
Translator::setLocale($locale);
```

**3 · `<html>` etiketine yön yazın**

```php
<html lang="<?= e($locale) ?>" dir="<?= e(Translator::direction($locale)) ?>">
```

**4 · Metinleri değiştirin**

```php
// önce
<h1>Kullanıcılar</h1>

// sonra
<h1><?= te('common.nav.users') ?></h1>
```

`Translator` sınıfının veritabanına bağımlılığı yoktur; yalnızca dosya okur. Kullanıcının tercihini hesabında saklamak isterseniz `users` tablosuna bir `locale` sütunu ekleyin.

---

## Dosya Yapısı

```
multi-language-system/
│
├── index.php                  Ön denetleyici — TEK giriş noktası
├── database.sql               Şema + 51 örnek kullanıcı
├── .env.example               Ortam değişkeni şablonu
│
├── app/
│   ├── Core/
│   │   ├── Translator.php     ★ Çeviri motoru, çoğul, biçimlendirme, RTL
│   │   ├── Auth.php           Giriş, "beni hatırla", parola doğrulama
│   │   ├── Session.php        Sertleştirilmiş oturum
│   │   ├── Csrf.php           Jeton üretimi ve hash_equals doğrulaması
│   │   ├── RateLimiter.php    Giriş denemesi sınırı
│   │   ├── Router.php         Rota eşleme
│   │   ├── Database.php       PDO bağlantısı (EMULATE_PREPARES = false)
│   │   ├── Paginator.php      Sayfalama hesabı
│   │   ├── Env.php            .env okuyucu + isLocalHost()
│   │   └── ...
│   │
│   ├── Http/Controllers/      Auth · Dashboard · I18n · User · Api
│   ├── Models/User.php
│   ├── Repositories/          Veritabanı sorguları
│   └── Support/helpers.php    t() te() n() local_* lang_url() e() url()
│
├── lang/
│   ├── tr/common.php          73 anahtar
│   ├── en/common.php          73 anahtar
│   └── ar/common.php          73 anahtar (altı çoğul kategorisiyle)
│
├── views/
│   ├── layouts/               admin · auth · plain
│   ├── partials/              topbar · sidebar · bottomnav · langswitch · pagination
│   ├── auth/login.php
│   ├── dashboard/index.php
│   ├── i18n/index.php         ★ Dil örnekleri sayfası
│   ├── users/index.php
│   └── errors/                404 · 500
│
├── assets/
│   ├── css/  cilginyazilim.css (marka) · admin.css · feature.css · bootstrap.min.css
│   └── js/   app.js · lang.js · login.js · users.js · jquery · bootstrap
│
├── config/config.php          Tek merkez ayarlar
├── routes/web.php             Rota tanımları
└── docs/screenshots/          README görselleri
```

---

## Nasıl Çalışıyor?

```
Tarayıcı
   │  GET /multi-language-system/i18n?lang=ar
   ▼
.htaccess ──► index.php  (ön denetleyici)
   │
   ├─ 1. Autoloader        sınıfları yükle
   ├─ 2. .env + config     veritabanı künyesi, hata modu
   ├─ 3. Hata yönetimi     yakalanmamış hata → düzgün 500 sayfası
   ├─ 4. Session::start()  sertleştirilmiş oturum
   ├─ 5. Güvenlik başlıkları  CSP · X-Frame-Options · nosniff
   │
   ├─ 6. DİL SEÇİMİ  ◄── ROTALARDAN ÖNCE OLMALI
   │      Translator::resolve()
   │        ?lang= → hesap → çerez → tarayıcı → varsayılan
   │      Translator::setLocale('ar')
   │        └─ lang/ar/common.php belleğe alınır
   │
   ├─ 7. View::share()     locale + direction bütün görünümlere
   │
   └─ 8. Router::dispatch()
            │
            ▼
         I18nController::index()
            │
            ▼
         views/i18n/index.php
            │  t('...')  n('...', 5)  fmt_money(...)
            ▼
         Translator
            │
            ├─ intl VAR   → MessageFormatter · NumberFormatter · IntlDateFormatter
            └─ intl YOK   → other biçimi · number_format() · date()
            │
            ▼
         layouts/admin.php
            <html lang="ar" dir="rtl">   ◄── düzen aynalanır
```

---

## Veritabanı Şeması

Bu proje **yeni bir tablo eklemez**; var olan `users` tablosuna bir sütun ekler.

```sql
ALTER TABLE `users`
  ADD COLUMN `locale` ENUM('tr','en','ar') NOT NULL DEFAULT 'tr' AFTER `theme`;
```

| Karar | Neden |
|---|---|
| Dil tercihi **hesapta** tutuluyor | Yalnızca çerezde olsaydı kullanıcı başka tarayıcıya geçtiğinde ya da çerezleri temizlediğinde tercihi kaybolurdu |
| Sütun `ENUM`, serbest metin değil | Veritabanı, uygulamanın beyaz listesini **kendisi de** zorlar. Kod bir yerde doğrulamayı atlasa bile desteklenmeyen bir dil kodu tabloya yazılamaz |
| Varsayılan `'tr'`, `NULL` değil | `NULL` "tercih yok" demek olurdu ve her okumada fazladan bir kontrol gerektirirdi |
| Çeviriler **veritabanında değil** | Çeviri metni kod kadar sık değişir ve sürüm kontrolünde durmalıdır; her sayfa açılışında sorgu atmanın da anlamı yok |

> **`ENUM`'un bedeli:** yeni bir dil eklemek `ALTER TABLE` gerektirir. Bu bilinçli
> bir ödünleşimdir — dil listesi yılda birkaç kez değişen, küçük ve kapalı bir
> kümedir; buna karşılık veritabanı ikinci bir doğrulama katmanı olur. Dil
> listeniz sık ve dinamik olarak değişecekse sütunu `CHAR(5)` yapıp doğrulamayı
> tümüyle `Translator::supports()`'a bırakın.

Diğer tablolar panelin ortak altyapısıdır:

| Tablo | İşi |
|---|---|
| `users` | Hesaplar · parola özeti · tema ve dil tercihi |
| `remember_tokens` | "Beni hatırla" jetonları (özetlenmiş) |
| `login_attempts` | Hız sınırı için deneme kayıtları |
| `activity_log` | Panelde gösterilen son işlemler |

---

## SSS

<details>
<summary><b>Çevirileri veritabanında tutsam olmaz mı?</b></summary>

Olur ama önce şunu sorun: çeviri metni **kim** değiştirecek?

Cevap "geliştirici" ise dosya daha iyidir. Çeviri o zaman kodla birlikte sürümlenir, kod incelemesinden geçer, geri alınabilir ve her sayfa açılışında sorgu maliyeti doğurmaz.

Cevap "yönetici panelinden içerik ekibi" ise veritabanı gerekir. O durumda dosyaları önbellek katmanı gibi kullanın: veritabanından okuyup PHP dizisi olarak diske yazın, uygulama diskten okusun.

Bu projede birinci senaryo varsayıldı.
</details>

<details>
<summary><b>`t()` mi `te()` mi kullanmalıyım?</b></summary>

`te()` kullanın — çevirir **ve** HTML'e kaçışlar.

`t()` yalnızca metni döndürür. Bunu doğrudan `echo` ederseniz, çeviri dosyasına HTML girerse (veya yer tutucuya kullanıcı verisi geçerse) XSS açığı doğar.

`t()`'yi metni bir değişkene alıp işlemek gerektiğinde, `te()`'yi ekrana basarken kullanın. Kural basit: **ekrana giden her şey `te()`**.
</details>

<details>
<summary><b>Arapça'nın altı çoğul kategorisi gerçekten gerekli mi?</b></summary>

Evet. Demo sayfasındaki tabloda 0, 1, 2, 5, 11 ve 100 için altı **farklı** karşılık görürsünüz. Bunlar süs değil, dilin dilbilgisi kuralıdır.

`if ($n == 1)` yazan bir kod Arapça'da 2 için tekil, 11 için çoğul üretir — ikisi de yanlıştır. Kuralı bilen tek yer ICU veri tabanıdır ve `intl` ona bakar.
</details>

<details>
<summary><b>`intl` eklentisi olmadan kullanabilir miyim?</b></summary>

Evet. Uygulama her yerelleştirme çağrısında eklentiyi denetler ve yoksa sade yedeğe düşer: çoğulda `other` biçimi, sayıda `number_format()`, tarihte `date()`.

Site çalışır ama Arapça çoğul kuralları ve yerel para/tarih biçimleri doğru olmaz. Üretimde `intl`'i açmanızı öneririz; tek satırlık bir `php.ini` değişikliğidir.
</details>

<details>
<summary><b>Dil kodunu adresin içine koyabilir miyim? (`/en/users`)</b></summary>

Koyabilirsiniz ve SEO açısından genellikle daha iyidir. Bu projede sorgu parametresi seçildi çünkü örneğin odağı yönlendirme değil, çeviri katmanıdır.

Geçmek için: `.htaccess`'te ilk yol parçasını yakalayın, `SUPPORTED` listesindeyse `$_GET['lang']`'e yazıp yoldan düşürün. `Translator::resolve()` hiç değişmeden çalışmaya devam eder.
</details>

<details>
<summary><b>Çeviri anahtarını unutursam ne olur?</b></summary>

Ekranda anahtarın kendisi görünür: `common.save`.

Bu bilerek seçilmiştir. Boş metin dönseydi eksik çeviri **sessizce** kaybolur ve fark edilmezdi. Anahtar ise gözünüze batar. Yayına almadan önce anahtar denkliğini kontrol edin — üç dilde de 73 anahtar vardır.
</details>

---

## Canlı Ortama Alırken

- [ ] `.env` içinde `APP_DEBUG=false` (veya satırı tümüyle silin — ortamdan türetilir)
- [ ] Veritabanı için **root olmayan**, yalnızca gereken yetkilere sahip bir kullanıcı açın
- [ ] HTTPS zorunlu olsun; `Session::isHttps()` çerezi `Secure` yapacaktır
- [ ] `config/`, `app/`, `routes/`, `views/` klasörlerinin `.htaccess` dosyaları yerinde mi?
- [ ] `.env` dosyasının tarayıcıdan erişilemediğini doğrulayın (403 dönmeli)
- [ ] `intl` eklentisini açın
- [ ] Demo hesaplarının parolalarını değiştirin veya hesapları silin
- [ ] Üç dilde de anahtar denkliğini kontrol edin
- [ ] Arapça'ya geçip düzenin aynalandığını gözle doğrulayın

---

## Sorun Giderme

| Belirti | Sebep | Çözüm |
|---|---|---|
| Ekranda `common.save` yazıyor | O anahtar aktif dilde yok | `lang/<dil>/common.php` dosyasına anahtarı ekleyin |
| Çoğul her sayıda aynı çıkıyor | `intl` kapalı | `php.ini` içinde `extension=intl` satırını açın |
| Arapça'da düzen aynalanmıyor | `dir` özniteliği basılmamış | Düzen dosyasında `<html dir="...">` var mı bakın |
| Sayı `1234567.89` görünüyor | `intl` kapalı, yedek biçim çalışıyor | `intl`'i açın |
| Dil değiştirince ana sayfaya atıyor | Dil seçici mevcut adresi korumuyor | `views/partials/langswitch.php` dosyasını kullanın |
| Tüm adresler 404 | `mod_rewrite` kapalı | Açın veya `.env` içinde `APP_PRETTY_URLS=false` yapın |
| Giriş "çok fazla deneme" diyor | Hız sınırı devrede | `login_attempts` tablosunu boşaltın veya süreyi bekleyin |
| Sayfa boş / beyaz | PHP hatası, `display_errors` kapalı | `.env` içinde `APP_DEBUG=true` yapıp tekrar deneyin |

---

## Yol Haritası

- [ ] Adres tabanlı dil yönlendirme (`/en/users`) örneği
- [ ] Eksik çeviri anahtarlarını raporlayan CLI komutu
- [ ] Çeviri dosyaları için `.po` / `.mo` içe aktarma köprüsü
- [ ] Tarayıcı dilini ilk ziyarette öneren bir bildirim şeridi

---

## Katkı

Hata bildirimi ve öneriler için [issue açabilirsiniz](https://github.com/CilginYazilim/multi-language-system/issues). Yeni dil çevirisi gönderirseniz memnun oluruz — anahtar denkliğini koruyun ve çoğul kalıplarında o dilin kendi kategorilerini kullanın.

## Lisans

[MIT](LICENSE) — ticari projelerinizde de özgürce kullanabilirsiniz.

---

<div align="center">

**[Çılgın Yazılım](https://cilginyazilim.com)** · [Kaynak Kütüphanesi](https://cilginyazilim.com/kutuphane) · [Tüm Örnekler](https://github.com/CilginYazilim)

</div>
