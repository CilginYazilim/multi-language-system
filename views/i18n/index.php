<?php
/**
 * =====================================================================
 *  GÖRÜNÜM: Dil örnekleri (i18n oyun alanı)
 * ---------------------------------------------------------------------
 *  Bu sayfanın amacı, çoklu dil altyapısının DÖRT ayrı işini aynı
 *  ekranda yan yana göstermektir. Üst çubuktan dili değiştirip
 *  farkları anında görebilirsiniz.
 * =====================================================================
 */

use App\Core\Translator;

$current = Translator::locale();

// intl eklentisi açık mı? Sayı ve tarih biçimleri buna göre değişir.
$hasIntl = class_exists(\NumberFormatter::class);
?>

<!-- ==============================================================
     ŞU ANKİ DİL
============================================================== -->
<div class="cy-card">
    <div class="cy-card__body cy-i18n-current">
        <div>
            <span class="cy-muted"><?= te('common.demo.current') ?></span>
            <h2 class="cy-i18n-current__name" dir="<?= e(Translator::direction()) ?>">
                <?= e(Translator::LOCALES[$current]['native']) ?>
            </h2>
        </div>

        <div class="cy-i18n-current__tags">
            <span class="cy-badge cy-badge--brand"><?= e($current) ?></span>
            <span class="cy-badge"><?= e(Translator::direction()) ?></span>
            <span class="cy-badge"><?= $hasIntl ? 'intl ✓' : 'intl ✗' ?></span>
        </div>
    </div>
</div>

<!-- ==============================================================
     1) METİN ÇEVİRİSİ
============================================================== -->
<div class="cy-card mt-3">
    <div class="cy-card__head">
        <h2 class="cy-section-title">1 · <?= te('common.demo.text') ?></h2>
    </div>

    <div class="cy-card__body">
        <p class="cy-muted"><?= te('common.demo.text_lead') ?></p>

        <div class="cy-table-wrap">
            <table class="table cy-table w-100 cy-i18n-table">
                <thead>
                    <tr>
                        <th scope="col">Kod</th>
                        <th scope="col">Sonuç</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach (['common.save', 'common.cancel', 'common.search', 'common.nav.users'] as $key): ?>
                        <tr>
                            <td><code>t('<?= e($key) ?>')</code></td>
                            <td dir="<?= e(Translator::direction()) ?>"><strong><?= te($key) ?></strong></td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>

<!-- ==============================================================
     2) YER TUTUCULAR
============================================================== -->
<div class="cy-card mt-3">
    <div class="cy-card__head">
        <h2 class="cy-section-title">2 · <?= te('common.demo.placeholder') ?></h2>
    </div>

    <div class="cy-card__body">
        <p class="cy-muted"><?= te('common.demo.placeholder_lead') ?></p>

        <code class="cy-code">t('common.auth.welcome', ['name' => $user->name])</code>

        <p class="cy-i18n-result mt-2" dir="<?= e(Translator::direction()) ?>">
            <?= te('common.auth.welcome', ['name' => $currentUser?->name ?? 'Evren']) ?>
        </p>

        <p class="cy-muted mb-0" style="font-size:.8125rem">
            Cümleyi <code>'Hoş geldin, ' . $ad . '!'</code> gibi parçalayıp birleştirmek
            çeviri için ölümcüldür: her dilde sözcük sırası farklıdır ve çevirmen
            parçaları yeniden dizemez. Arapça’ya geçip aynı cümlenin nasıl kurulduğuna bakın.
        </p>
    </div>
</div>

<!-- ==============================================================
     3) ÇOĞUL KURALLARI
============================================================== -->
<div class="cy-card mt-3">
    <div class="cy-card__head">
        <h2 class="cy-section-title">3 · <?= te('common.demo.plural') ?></h2>
    </div>

    <div class="cy-card__body">
        <p class="cy-muted"><?= te('common.demo.plural_lead') ?></p>

        <code class="cy-code">n('common.records', $count)</code>

        <div class="cy-table-wrap mt-2">
            <table class="table cy-table w-100 cy-i18n-table">
                <thead>
                    <tr>
                        <th scope="col">count</th>
                        <?php foreach (Translator::LOCALES as $code => $meta): ?>
                            <th scope="col"><?= e($meta['flag']) ?></th>
                        <?php endforeach; ?>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    /* Bu sayılar özellikle seçildi: Arapçanın altı
                       biçiminin hepsini tetikliyorlar. */
                    $counts = [0, 1, 2, 5, 11, 100];
                    ?>
                    <?php foreach ($counts as $count): ?>
                        <tr>
                            <td><strong><?= (int) $count ?></strong></td>

                            <?php foreach (Translator::LOCALES as $code => $meta): ?>
                                <?php /* Her dili AYNI ANDA gösteriyoruz; farkı
                                         görmek için dil değiştirmek gerekmiyor. */ ?>
                                <td dir="<?= e($meta['dir']) ?>">
                                    <?= e(Translator::choice('common.records', $count, [], $code)) ?>
                                </td>
                            <?php endforeach; ?>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>

        <p class="cy-muted mt-3 mb-0" style="font-size:.8125rem">
            <strong>Türkçe</strong> tek biçim kullanır — sayıdan sonra isim çoğul eki almaz
            ("5 kayıt", "5 kayıtlar" değil). <strong>İngilizce</strong> iki,
            <strong>Arapça</strong> altı biçim kullanır. Uygulamaya
            <code>if ($n == 1)</code> yazmak İngilizce için doğru, Türkçe için gereksiz,
            Arapça için tamamen yanlıştır; kural dilin kendisine bırakılmalıdır.
        </p>
    </div>
</div>

<!-- ==============================================================
     4) SAYI, TARİH VE PARA
============================================================== -->
<div class="cy-card mt-3">
    <div class="cy-card__head">
        <h2 class="cy-section-title">4 · <?= te('common.demo.format') ?></h2>
    </div>

    <div class="cy-card__body">
        <p class="cy-muted"><?= te('common.demo.format_lead') ?></p>

        <?php if (!$hasIntl): ?>
            <div class="cy-setup-note mb-3">
                <?= icon('alert', 'cy-icon cy-icon--sm') ?>
                <span>
                    <?= te('common.demo.intl_missing') ?>
                    <br>
                    XAMPP'ta açmak için <code>php.ini</code> içindeki
                    <code>;extension=intl</code> satırının başındaki noktalı virgülü
                    silin ve Apache'yi yeniden başlatın.
                </span>
            </div>
        <?php endif; ?>

        <div class="cy-table-wrap">
            <table class="table cy-table w-100 cy-i18n-table">
                <thead>
                    <tr>
                        <th scope="col">Değer</th>
                        <?php foreach (Translator::LOCALES as $code => $meta): ?>
                            <th scope="col"><?= e($meta['flag']) ?></th>
                        <?php endforeach; ?>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td><code>1234567.891</code></td>
                        <?php foreach (array_keys(Translator::LOCALES) as $code): ?>
                            <td><?= e(Translator::number(1234567.891, 2, $code)) ?></td>
                        <?php endforeach; ?>
                    </tr>

                    <tr>
                        <td><code>1299.90 TRY</code></td>
                        <?php foreach (array_keys(Translator::LOCALES) as $code): ?>
                            <td><?= e(Translator::money(1299.90, 'TRY', $code)) ?></td>
                        <?php endforeach; ?>
                    </tr>

                    <tr>
                        <td><code>2026-08-30</code></td>
                        <?php foreach (array_keys(Translator::LOCALES) as $code): ?>
                            <td><?= e(Translator::date('2026-08-30 14:05:00', false, $code)) ?></td>
                        <?php endforeach; ?>
                    </tr>

                    <tr>
                        <td><code>2026-08-30 14:05</code></td>
                        <?php foreach (array_keys(Translator::LOCALES) as $code): ?>
                            <td><?= e(Translator::date('2026-08-30 14:05:00', true, $code)) ?></td>
                        <?php endforeach; ?>
                    </tr>
                </tbody>
            </table>
        </div>

        <p class="cy-muted mt-3 mb-0" style="font-size:.8125rem">
            Tarih sırası dile göre değişir: <code>30.08.2026</code> (tr) ·
            <code>Aug 30, 2026</code> (en). <code>d.m.Y</code> biçimini her dile dayatmak,
            İngilizce arayüzde <code>08.30.2026</code> ile karışan bir tarih üretir.
            <br>
            <strong>Para birimi yalnızca biçimlendirilir, çevrilmez</strong> — kur dönüşümü
            ayrı bir iştir ve buraya karıştırılmamalıdır.
        </p>
    </div>
</div>

<!-- ==============================================================
     5) METİN YÖNÜ
============================================================== -->
<div class="cy-card mt-3">
    <div class="cy-card__head">
        <h2 class="cy-section-title">5 · <?= te('common.demo.direction') ?></h2>
    </div>

    <div class="cy-card__body">
        <p class="cy-muted"><?= te('common.demo.direction_lead') ?></p>

        <div class="cy-i18n-dirdemo">
            <div class="cy-i18n-dirdemo__box" dir="ltr">
                <span class="cy-badge">ltr</span>
                <p>Soldan sağa akan metin. Menü solda, oklar sağa bakar.</p>
            </div>

            <div class="cy-i18n-dirdemo__box" dir="rtl">
                <span class="cy-badge">rtl</span>
                <p>نص يتدفق من اليمين إلى اليسار. القائمة على اليمين.</p>
            </div>
        </div>

        <p class="cy-muted mt-3 mb-0" style="font-size:.8125rem">
            Yön <code>&lt;html dir="rtl"&gt;</code> ile bildirilir; tarayıcı bunu görünce
            <strong>tüm yerleşimi aynalar</strong>. CSS ile taklit etmeye çalışmak
            (<code>text-align: right</code>) yalnızca metni kaydırır.
            <br>
            Kenar boşluklarında <code>margin-left</code> yerine
            <code>margin-inline-start</code> kullanmak, iki yönde de doğru çalışan
            tek yöntemdir.
        </p>
    </div>
</div>
