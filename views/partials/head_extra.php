<?php
/**
 * =====================================================================
 *  PARÇA: Projeye özel <head> ekleri
 * =====================================================================
 */

use App\Core\Translator;
?>
<link rel="stylesheet" href="<?= e(asset('css/feature.css')) ?>">

<?php
/* ALTERNATİF DİL BAĞLANTILARI (hreflang)
 * -----------------------------------------------------------------
 * Arama motorlarına "bu sayfanın şu dillerde karşılıkları var" der.
 * Olmadığında motorlar aynı içeriğin farklı dillerdeki hâllerini
 * KOPYA İÇERİK sayabilir ve yalnızca birini indeksleyebilir.
 *
 * Panel sayfaları "noindex" olduğu için burada işlevsel bir etkisi
 * yoktur; herkese açık bir sitede ise kritiktir ve doğru yeri tam
 * olarak burasıdır. */
?>
<?php foreach (array_keys(Translator::LOCALES) as $code): ?>
    <link rel="alternate" hreflang="<?= e($code) ?>" href="<?= e(lang_url($code)) ?>">
<?php endforeach; ?>
