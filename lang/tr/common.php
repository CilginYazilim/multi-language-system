<?php
/**
 * =====================================================================
 *  TÜRKÇE SÖZLÜK
 * ---------------------------------------------------------------------
 *  Anahtar düzeni:   t('common.save')
 *                       └────┘ └──┘
 *                      dosya   anahtar
 *
 *  ÜÇ KURAL
 *
 *  1. TAM CÜMLE SAKLAYIN, PARÇA DEĞİL.
 *     'welcome' => 'Hoş geldin, :name!'   ✔
 *     'welcome_prefix' => 'Hoş geldin, '  ✘
 *     Parçaları kodda birleştirmek, sözcük sırası farklı olan
 *     dillerde düzgün cümle kurmayı imkânsız kılar.
 *
 *  2. ÇOĞUL BİÇİMLERİ "|" İLE AYIRIN.
 *     '{0}' ile başlayan biçim, sayı tam olarak sıfırken kullanılır.
 *
 *  3. ANAHTARLAR TÜM DİLLERDE AYNI OLMALI.
 *     Bir dilde eksik anahtar, yedek dile (tr) düşer; her ikisinde
 *     de yoksa ham anahtar ekrana basılır ve hemen göze çarpar.
 * =====================================================================
 */

declare(strict_types=1);

return [

    /* ----------------------------------------------------------------
     *  GENEL
     * ------------------------------------------------------------- */
    'app_name'    => 'CY Çoklu Dil',
    'save'        => 'Kaydet',
    'cancel'      => 'Vazgeç',
    'delete'      => 'Sil',
    'search'      => 'Ara',
    'apply'       => 'Uygula',
    'clear'       => 'Temizle',
    'close'       => 'Kapat',
    'back'        => 'Geri',
    'yes'         => 'Evet',
    'no'          => 'Hayır',
    'loading'     => 'Yükleniyor…',
    'none'        => 'Yok',

    /* ----------------------------------------------------------------
     *  GEZİNME
     * ------------------------------------------------------------- */
    'nav' => [
        'general'   => 'Genel',
        'data'      => 'Veri',
        'dashboard' => 'Kontrol Paneli',
        'dashboard_short' => 'Panel',
        'users'     => 'Kullanıcılar',
        'users_short' => 'Kullanıcı',
        'demo'      => 'Dil Örnekleri',
        'demo_short' => 'Örnekler',
        'logout'    => 'Çıkış Yap',
        'theme'     => 'Açık/koyu tema',
        'menu'      => 'Menü',
        'language'  => 'Dil',
    ],

    /* ----------------------------------------------------------------
     *  GİRİŞ
     * ------------------------------------------------------------- */
    'auth' => [
        'title'       => 'Giriş yapın',
        'subtitle'    => 'Devam etmek için hesap bilgilerinizi girin.',
        'email'       => 'E-posta',
        'password'    => 'Parola',
        'remember'    => 'Beni hatırla',
        'remember_hint' => '30 gün açık kalır',
        'submit'      => 'Giriş Yap',
        'demo_accounts' => 'Demo hesaplar · tıklayarak doldurun',
        'welcome'     => 'Hoş geldiniz, :name!',
    ],

    /* ----------------------------------------------------------------
     *  KULLANICILAR
     * ------------------------------------------------------------- */
    'users' => [
        'title'       => 'Kullanıcılar',
        'subtitle'    => 'Sunucu taraflı sayfalama örneği',
        'user'        => 'Kullanıcı',
        'email'       => 'E-posta',
        'last_login'  => 'Son Giriş',
        'status'      => 'Durum',
        'active'      => 'Aktif',
        'passive'     => 'Pasif',
        'all_status'  => 'Tüm durumlar',
        'search_hint' => 'Ad, soyad veya e-posta ara…',
        'per_page'    => ':count kayıt',
        'empty'       => 'Aramanıza uyan kayıt bulunamadı.',
    ],

    /* ----------------------------------------------------------------
     *  SAYFALAMA
     * ------------------------------------------------------------- */
    'pagination' => [
        'summary'  => ':from–:to arası, toplam :total kayıt',
        'empty'    => 'Kayıt bulunamadı',
        'previous' => 'Önceki sayfa',
        'next'     => 'Sonraki sayfa',
        'page'     => ':page. sayfa',
    ],

    /* ----------------------------------------------------------------
     *  ÇOĞUL ÖRNEKLERİ
     * ----------------------------------------------------------------
     *  Türkçede sayıdan sonra isim ÇOĞUL EKİ ALMAZ:
     *      "5 kayıt"      ✔
     *      "5 kayıtlar"   ✘
     *  Bu yüzden tek biçim yeterlidir. İngilizce ve Arapça
     *  sözlüklerine bakarsanız oradaki farkı görürsünüz.
     * ------------------------------------------------------------- */
    'records'  => '{0} Kayıt yok|:count kayıt',
    'messages' => '{0} Mesaj yok|:count mesaj',
    'minutes'  => ':count dakika',
    'items'    => '{0} Liste boş|:count öğe seçildi',

    /* ----------------------------------------------------------------
     *  DİL ÖRNEKLERİ SAYFASI
     * ------------------------------------------------------------- */
    'demo' => [
        'title'        => 'Dil Örnekleri',
        'subtitle'     => 'Çeviri, çoğul, biçim ve yön',
        'text'         => 'Metin çevirisi',
        'text_lead'    => 'En basit hâli: anahtar ver, çevrilmiş metni al.',
        'placeholder'  => 'Yer tutucular',
        'placeholder_lead' => 'Cümleyi parçalamak yerine yer tutucu kullanın; çevirmen sözcük sırasını değiştirebilsin.',
        'plural'       => 'Çoğul kuralları',
        'plural_lead'  => 'Her dilin kuralı farklıdır. Türkçe tek biçim, İngilizce iki, Arapça altı biçim kullanır.',
        'format'       => 'Sayı, tarih ve para',
        'format_lead'  => 'Aynı değer, dile göre farklı yazılır.',
        'direction'    => 'Metin yönü',
        'direction_lead' => 'Arapça sağdan sola akar; yerleşimin tamamı aynalanır.',
        'current'      => 'Şu anki dil',
        'try_arabic'   => 'Yön değişimini görmek için Arapça’yı deneyin.',
        'intl_missing' => 'intl eklentisi kapalı; sayı ve tarih biçimleri yedek yönteme düşüyor.',
        'intl_ok'      => 'intl eklentisi açık; yerel biçimler eksiksiz uygulanıyor.',
    ],

    /* ----------------------------------------------------------------
     *  MESAJLAR
     * ------------------------------------------------------------- */
    'flash' => [
        'language_changed' => 'Dil değiştirildi: :language',
        'logout'           => 'Oturumunuz güvenli bir şekilde kapatıldı.',
    ],
];
