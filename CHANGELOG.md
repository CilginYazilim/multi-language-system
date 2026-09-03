# Değişiklik Günlüğü

Bu dosyanın biçimi [Keep a Changelog](https://keepachangelog.com/tr/1.1.0/)
kalıbını izler ve proje [Semantic Versioning](https://semver.org/lang/tr/)
kurallarına uyar.

---

## [1.0.0] — 2026-09-03

İlk yayın. Çoklu Dil (i18n) Sistemi, Çılgın Yazılım Kaynak Kütüphanesi'nde yayınlandı.

### Eklendi

- `Translator` sınıfı: çeviri, yer tutucu, çoğul kuralları, biçimlendirme, RTL
- `intl` ile ICU çoğul kuralları; eklenti yoksa sade yedeğe otomatik düşüş
- `NumberFormatter` ve `IntlDateFormatter` ile yerelleştirilmiş sayı, tarih ve para
- Üç dil: Türkçe, İngilizce, Arapça — üçünde de tam 73 anahtar
- Dil çözümleme sırası: `?lang=` → hesap → çerez → tarayıcı → varsayılan
- Dil tercihinin hem çerezde hem hesapta saklanması (`users.locale`)
- Mantıksal CSS özellikleriyle RTL desteği — ayrı `rtl.css` yok
- Dil değiştirirken bulunulan sayfada kalma (`lang_url()`)
- "Dil Örnekleri" sayfası: çeviri, yer tutucu, çoğul ve biçim tablolarıyla

**Ortak altyapı (bütün panelli örneklerde aynı)**

- Oturum girişi, "beni hatırla" jetonu ve giriş denemesi hız sınırı
- CSRF koruması (`hash_equals` ile karşılaştırma)
- Sertleştirilmiş oturum: `HttpOnly`, `SameSite`, girişte kimlik yenileme
- Güvenlik başlıkları: CSP (`script-src 'self'`), `X-Frame-Options: DENY`,
  `X-Content-Type-Options: nosniff`, `Referrer-Policy`
- Tüm sorgular hazır ifade; `ATTR_EMULATE_PREPARES = false`
- Sunucu tarafında sayfalama ve arama; sıralama sütunu beyaz listeden
- Açık / koyu tema, kullanıcı hesabına kayıtlı
- Mobilde alt navigasyon; sayfa gövdesinde yatay kaydırma yok
- Türkçe ve İngilizce belgeler, ekran görüntüleriyle
- Sıfır bağımlılık: Composer yok, npm yok, CDN yok

### Güvenlik

- `APP_DEBUG` **ortamdan türetiliyor**: `.env` dosyası olmadan canlıya
  alınsa bile hata yığını ziyaretçiye görünmez (`Env::isLocalHost()`)
- `json_encode()` çağrılarında `JSON_INVALID_UTF8_SUBSTITUTE`; bozuk tek
  bir bayt yanıtın tamamını yutmuyor
- Komut satırı betikleri hem `.htaccess` ile hem `PHP_SAPI` kontrolüyle
  web erişimine kapalı

### Düzeltildi

- Koyu temada tablo hücrelerinin kontrastı 1,10:1 idi (okunamıyordu).
  Bootstrap'in `--bs-table-color` değişkeni markanın metin rengine
  bağlandı; ölçülen kontrast **14,48:1**
- `--cy-primary` ve `--cy-surface-2` CSS değişkenleri hiçbir yerde
  tanımlı değildi; tanımsız değişken sessizce başarısız olduğu için aktif
  menü rengi ve mobil alt çubuk renksiz kalıyordu
- "Son İşlemler" listesi `id DESC` ile sıralanıyordu; başlık zamana işaret
  ettiği hâlde sıra tarihle uyuşmuyordu. Artık `created_at DESC, id DESC`

[1.0.0]: https://github.com/CilginYazilim/PHP-MySQL-Coklu-Dil-i18n-Cogul-Kurallari-RTL-Panel/releases/tag/v1.0.0
