<?php
/**
 * =====================================================================
 *  GÖRÜNÜM: Kullanıcılar (sayfalama örneği)
 * ---------------------------------------------------------------------
 *  FİLTRE FORMU NEDEN "GET"?
 *  Sonuç sayfası PAYLAŞILABİLİR ve YER İMİNE EKLENEBİLİR olmalıdır.
 *  POST kullansaydık adres hep aynı kalır, "şu aramanın 3. sayfası"
 *  diye bir bağlantı gönderilemez, geri tuşu form yeniden gönderme
 *  uyarısı verirdi. GET, listeleme için doğru yöntemdir.
 *
 *  Ayrıca CSRF anahtarı GEREKMEZ: bu istek hiçbir veriyi değiştirmez.
 *
 *  @var array<int,App\Models\User> $rows
 *  @var App\Core\Paginator         $paginator
 * =====================================================================
 */

use App\Core\Paginator;
use App\Core\View;

/* Sayfa bağlantılarına taşınacak filtreler. per=20 varsayılan olduğu
 * için adrese yazmıyoruz; adres gereksiz uzamasın. */
$query = [
    'q'      => $search,
    'status' => $status,
    'per'    => $perPage === Paginator::DEFAULT_PER_PAGE ? '' : $perPage,
];
?>
<div class="cy-card">

    <!-- ==============================================================
         FİLTRE ÇUBUĞU
         --------------------------------------------------------------
         Arama + durum + sayfa boyutu. Üçü de TEK formda: kullanıcı
         hangisini değiştirirse değiştirsin diğerleri korunur.

         page alanı BİLEREK YOKTUR: filtre değişince 1. sayfaya dönmek
         gerekir. 5. sayfada arama yapıp 5. sayfada kalmak, çoğu zaman
         boş bir tablo demektir.
    ============================================================== -->
    <form class="cy-toolbar" method="get" action="<?= e(url('users')) ?>">

        <?php /* pretty_urls kapalıyken rota "r" parametresiyle taşınır.
                 Form GET ile gönderildiğinde adresteki mevcut sorgu
                 silinir; bu gizli alan olmadan rota kaybolur ve
                 kullanıcı tanıtım sayfasına düşer. */ ?>
        <?php if (!App\Core\Config::get('app.pretty_urls', false)): ?>
            <input type="hidden" name="r" value="users">
        <?php endif; ?>

        <div class="cy-toolbar__search">
            <div class="cy-input-icon">
                <?= icon('search', 'cy-icon cy-icon--sm') ?>
                <input type="search" class="form-control form-control-sm"
                       name="q" value="<?= e($search) ?>"
                       placeholder="<?= te('common.users.search_hint') ?>"
                       aria-label="<?= te('common.search') ?>" autocomplete="off">
            </div>
        </div>

        <select class="form-select form-select-sm cy-filter-select" name="status"
                aria-label="<?= te('common.users.status') ?>">
            <option value=""><?= te('common.users.all_status') ?></option>
            <option value="active"  <?= $status === 'active'  ? 'selected' : '' ?>><?= te('common.users.active') ?></option>
            <option value="passive" <?= $status === 'passive' ? 'selected' : '' ?>><?= te('common.users.passive') ?></option>
        </select>

        <?php /* Sayfa boyutu: Paginator'ın beyaz listesinden üretilir.
                 Listeyi tek yerde tutmak, "arayüzde 200 seçeneği var
                 ama sunucu kabul etmiyor" tutarsızlığını engeller. */ ?>
        <select class="form-select form-select-sm cy-filter-select" name="per"
                aria-label="<?= te('common.users.per_page', ['count' => '']) ?>">
            <?php foreach (Paginator::PER_PAGE_OPTIONS as $option): ?>
                <option value="<?= $option ?>" <?= $perPage === $option ? 'selected' : '' ?>>
                    <?= te('common.users.per_page', ['count' => $option]) ?>
                </option>
            <?php endforeach; ?>
        </select>

        <button type="submit" class="btn cy-btn cy-btn--primary cy-btn--sm">
            <?= icon('search', 'cy-icon cy-icon--sm') ?>
            <span><?= te('common.apply') ?></span>
        </button>

        <?php /* Temizle: yalnızca bir filtre etkinken görünür. Hep
                 görünse, çoğu zaman işlevsiz bir buton olarak yer
                 kaplardı. */ ?>
        <?php if ($search !== '' || $status !== ''): ?>
            <a class="cy-filter-clear" href="<?= e(url('users')) ?>">
                <?= icon('close', 'cy-icon cy-icon--sm') ?>
                <span><?= te('common.clear') ?></span>
            </a>
        <?php endif; ?>
    </form>

    <!-- ---------- Tablo ---------- -->
    <div class="cy-card__body cy-card__body--flush">
        <div class="cy-table-wrap">
            <table class="table cy-table w-100">
                <thead>
                    <tr>
                        <th scope="col"><?= te('common.users.user') ?></th>
                        <th scope="col" class="cy-hide-sm"><?= te('common.users.email') ?></th>
                        <th scope="col" class="cy-hide-sm"><?= te('common.users.last_login') ?></th>
                        <th scope="col"><?= te('common.users.status') ?></th>
                    </tr>
                </thead>
                <tbody>
                    <?php if ($rows === []): ?>
                        <tr>
                            <td colspan="4" class="text-center py-5 text-muted">
                                <?= icon('search', 'cy-icon mb-2 d-block mx-auto') ?>
                                <?= te('common.users.empty') ?>
                            </td>
                        </tr>
                    <?php endif; ?>

                    <?php foreach ($rows as $row): ?>
                        <tr>
                            <td>
                                <div class="cy-user-cell">
                                    <span class="cy-user-cell__name"><?= e($row->fullName()) ?></span>
                                    <?php /* Dar ekranda e-posta sütunu gizlenir; bilgi
                                             kaybolmasın diye buraya düşer. */ ?>
                                    <span class="cy-user-cell__meta"><?= e($row->email) ?></span>
                                </div>
                            </td>
                            <td class="cy-hide-sm"><?= e($row->email) ?></td>
                            <td class="cy-hide-sm"><?= e(local_date($row->lastLoginAt, true)) ?></td>
                            <td>
                                <span class="cy-status <?= $row->isActive ? 'is-active' : 'is-passive' ?>">
                                    <span class="cy-status__dot"></span>
                                    <?= te($row->isActive ? 'common.users.active' : 'common.users.passive') ?>
                                </span>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>

        <?php /* SAYFALAMA ÇUBUĞU – tek satır. Tüm hesaplama
                 Paginator'da, tüm görünüm partial'da. */ ?>
        <?php View::partial('partials/pagination', [
            'paginator' => $paginator,
            'route'     => 'users',
            'query'     => $query,
        ]); ?>
    </div>
</div>
