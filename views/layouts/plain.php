<?php
/**
 * =====================================================================
 *  DÜZEN: Sade sayfa
 * ---------------------------------------------------------------------
 *  Hata sayfaları için kullanılır. Menü ve veritabanı gerektirmez;
 *  bağlantı koptuğunda bile bu düzen çalışabilmelidir.
 * =====================================================================
 */

// Hata sayfası veritabanına ulaşamıyor olabilir; current_theme()
// bu durumda sessizce çereze/varsayılana düşer.
$theme = current_theme();
?>
<!DOCTYPE html>
<?php
/* DİL VE YÖN <html> ETİKETİNDE BİLDİRİLİR.
 *
 *   lang → ekran okuyucular doğru telaffuzu buradan seçer; arama
 *          motorları da sayfanın dilini buradan anlar
 *   dir  → "rtl" verildiğinde tarayıcı TÜM yerleşimi aynalar:
 *          metin sağa yaslanır, kaydırma çubuğu sola geçer,
 *          liste işaretleri sağda görünür
 *
 * dir'i CSS ile taklit etmeye çalışmak (text-align: right) yalnızca
 * metni kaydırır; asıl aynalama tarayıcının işidir. */
?>
<html lang="<?= e($locale ?? 'tr') ?>"
      dir="<?= e($direction ?? 'ltr') ?>"
      data-cy-theme="<?= e($theme) ?>">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, viewport-fit=cover">
    <meta name="robots" content="noindex, nofollow">
    <meta name="theme-color" content="<?= $theme === 'dark' ? '#0f172a' : '#ffffff' ?>">
    <title><?= e($title ?? 'Hata') ?></title>
    <link rel="icon" type="image/png" href="<?= e(asset('images/logo.png')) ?>">
    <link rel="stylesheet" href="<?= e(asset('css/bootstrap.min.css')) ?>">
    <link rel="stylesheet" href="<?= e(asset('css/cilginyazilim.css')) ?>">
    <link rel="stylesheet" href="<?= e(asset('css/admin.css')) ?>">
</head>
<body class="cy-app">
    <div class="container">
        <?= $content ?? '' ?>
    </div>
</body>
</html>
