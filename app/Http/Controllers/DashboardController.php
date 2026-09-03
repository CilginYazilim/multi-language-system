<?php
/**
 * =====================================================================
 *  DashboardController – Kontrol paneli
 * ---------------------------------------------------------------------
 *  Kart etiketleri de çevrilir. Sayısal değerler yerel biçimde
 *  yazılır (görünümde local_number ile); "1.234" ile "1,234" farkı
 *  küçük görünür ama yanlışı arayüzü amatör gösterir.
 * =====================================================================
 */

declare(strict_types=1);

namespace App\Http\Controllers;

use App\Core\Auth;
use App\Core\Request;
use App\Http\Controller;

final class DashboardController extends Controller
{
    public function index(Request $request): void
    {
        $users = $this->users();

        $total  = $users->countAll();
        $active = $users->countAll('', true);

        $this->view('dashboard/index', [
            'title'    => t('common.nav.dashboard'),
            'subtitle' => t('common.auth.welcome', ['name' => Auth::user()?->name ?? '']),

            'stats' => [
                ['label' => t('common.users.title'),  'value' => $total,           'icon' => 'users'],
                ['label' => t('common.users.active'), 'value' => $active,          'icon' => 'check'],
                ['label' => t('common.users.passive'), 'value' => $total - $active, 'icon' => 'alert'],
            ],

            'activity' => $this->activity()->latest(8),
        ]);
    }
}
