<?php
/**
 * =====================================================================
 *  PARÇA: Dil seçici
 * ---------------------------------------------------------------------
 *  NEDEN BAĞLANTI (GET), DÜĞME (POST) DEĞİL?
 *  Dil değiştirmek bir GÖRÜNÜM tercihidir, veri değiştirmez. Bağlantı
 *  olması üç şey kazandırır:
 *    - JavaScript kapalıyken de çalışır
 *    - Adres paylaşılabilir ("şu sayfanın İngilizcesi")
 *    - Arama motorları her dili ayrı sayfa olarak indeksleyebilir
 *
 *  Giriş yapmış kullanıcı için tercih ayrıca HESABA kaydedilir
 *  (assets/js/lang.js → api/preferences/locale); böylece başka bir
 *  cihazdan girdiğinde de kendi dilini bulur.
 *
 *  DİL ADLARI KENDİ DİLİNDE YAZILIR ("Deutsch", "العربية").
 *  Türkçe arayüzde "Almanca" yazmak, Almanca bilen ama Türkçe
 *  bilmeyen bir ziyaretçinin kendi dilini bulamaması demektir.
 * =====================================================================
 */

use App\Core\Translator;

$current = Translator::locale();
?>
<div class="dropdown cy-langswitch">
    <button class="cy-topbar__toggle cy-langswitch__button" type="button"
            data-bs-toggle="dropdown" data-bs-display="static"
            aria-expanded="false"
            aria-label="<?= te('common.nav.language') ?>"
            title="<?= te('common.nav.language') ?>">
        <span class="cy-langswitch__code"><?= e(Translator::LOCALES[$current]['flag']) ?></span>
    </button>

    <div class="dropdown-menu dropdown-menu-end cy-dropdown">
        <div class="cy-dropdown__header">
            <strong><?= te('common.nav.language') ?></strong>
        </div>

        <?php foreach (Translator::LOCALES as $code => $meta): ?>
            <?php /* lang_url(): kullanıcıyı ANA SAYFAYA atmıyoruz.
                     Mevcut rota ve tüm sorgu parametreleri korunur;
                     4. sayfadaki bir listede dil değiştiren kişi
                     yine 4. sayfada kalır. */ ?>
            <a class="dropdown-item<?= $code === $current ? ' is-active' : '' ?>"
               href="<?= e(lang_url($code)) ?>"
               data-locale="<?= e($code) ?>"
               <?= $code === $current ? 'aria-current="true"' : '' ?>>

                <span class="cy-langswitch__code"><?= e($meta['flag']) ?></span>

                <?php /* Ad KENDİ DİLİNDE ve kendi yönünde yazılır. */ ?>
                <span dir="<?= e($meta['dir']) ?>"><?= e($meta['native']) ?></span>

                <?php if ($code === $current): ?>
                    <?= icon('check', 'cy-icon cy-icon--sm ms-auto') ?>
                <?php endif; ?>
            </a>
        <?php endforeach; ?>
    </div>
</div>
