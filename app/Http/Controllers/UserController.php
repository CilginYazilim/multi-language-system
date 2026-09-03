<?php
/**
 * =====================================================================
 *  UserController – Sayfalanmış kullanıcı listesi
 * ---------------------------------------------------------------------
 *  Sayfalama akışı diğer örneklerle birebir aynıdır:
 *      1. İstekten sayfa ve filtreleri OKU
 *      2. Filtreye uyan TOPLAM kaydı say
 *      3. Paginator'ı kur
 *      4. Yalnızca o sayfanın satırlarını çek
 *
 *  Buradaki tek fark, başlıkların çeviriden gelmesidir.
 * =====================================================================
 */

declare(strict_types=1);

namespace App\Http\Controllers;

use App\Core\Paginator;
use App\Core\Request;
use App\Http\Controller;

final class UserController extends Controller
{
    public function index(Request $request): void
    {
        $search  = trim($request->input('q'));
        $perPage = Paginator::perPageFromRequest($request);
        $page    = Paginator::pageFromRequest($request);

        $status     = $request->input('status');
        $activeOnly = match ($status) {
            'active'  => true,
            'passive' => false,
            default   => null,
        };

        $total     = $this->users()->countAll($search, $activeOnly);
        $paginator = new Paginator($total, $page, $perPage);

        $rows = $this->users()->page(
            $paginator->offset(),
            $paginator->perPage(),
            $search,
            $activeOnly
        );

        $this->view('users/index', [
            'title'     => t('common.users.title'),
            'subtitle'  => t('common.users.subtitle'),
            'rows'      => $rows,
            'paginator' => $paginator,
            'search'    => $search,
            'status'    => $status,
            'perPage'   => $perPage,
        ]);
    }
}
