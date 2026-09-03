<?php
/**
 * =====================================================================
 *  PARÇA: Kontrol panelinde dil durumu
 * ---------------------------------------------------------------------
 *  views/dashboard/index.php bu dosyayı VARSA basar.
 * =====================================================================
 */

use App\Core\Translator;

$current = Translator::locale();
$hasIntl = class_exists(\NumberFormatter::class);
?>
<div class="cy-card mt-3">
    <div class="cy-card__head">
        <h2 class="cy-section-title">
            <?= icon('activity', 'cy-icon cy-icon--sm') ?> <?= te('common.nav.language') ?>
        </h2>

        <a class="btn cy-btn cy-btn--sm cy-btn--ghost" href="<?= e(url('i18n')) ?>">
            <?= te('common.demo.title') ?> →
        </a>
    </div>

    <div class="cy-card__body">
        <?php if (!$hasIntl): ?>
            <div class="cy-setup-note mb-3">
                <?= icon('alert', 'cy-icon cy-icon--sm') ?>
                <span>
                    <?= te('common.demo.intl_missing') ?>
                    XAMPP'ta açmak için <code>php.ini</code> içindeki
                    <code>;extension=intl</code> satırının başındaki noktalı virgülü silin.
                </span>
            </div>
        <?php endif; ?>

        <dl class="cy-detail mb-3">
            <dt><?= te('common.demo.current') ?></dt>
            <dd>
                <span dir="<?= e(Translator::direction()) ?>">
                    <strong><?= e(Translator::LOCALES[$current]['native']) ?></strong>
                </span>
                <code><?= e($current) ?></code>
            </dd>

            <dt><?= te('common.demo.direction') ?></dt>
            <dd><code><?= e(Translator::direction()) ?></code></dd>

            <dt>intl</dt>
            <dd><?= $hasIntl ? te('common.demo.intl_ok') : te('common.demo.intl_missing') ?></dd>
        </dl>

        <p class="cy-muted mb-0" style="font-size:.8125rem">
            Dil sırası: <code>?lang=</code> → hesap tercihi → çerez →
            tarayıcı (<code>Accept-Language</code>) → varsayılan.
            Üst çubuktaki seçiciden değiştirin; bulunduğunuz sayfada kalırsınız.
        </p>
    </div>
</div>
