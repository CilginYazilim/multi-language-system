<?php
/**
 * =====================================================================
 *  ROTA TABLOSU
 * ---------------------------------------------------------------------
 *  DİL ROTALARDA GÖRÜNMEZ.
 *  Dil, adres YOLUNDA değil sorgu parametresinde taşınır ("?lang=en")
 *  ve index.php'de rotalardan ÖNCE çözülür. Böylece her rotayı üç
 *  kez tanımlamak gerekmez.
 *
 *  Alternatif, dili yola koymaktır ("/en/users"). Herkese açık,
 *  SEO'nun önemli olduğu sitelerde o yöntem daha iyidir; bir yönetim
 *  panelinde ise gereksiz karmaşıklıktır.
 * =====================================================================
 */

declare(strict_types=1);

use App\Core\Request;
use App\Core\Router;
use App\Core\View;
use App\Http\Controllers\Api\PreferenceApiController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\I18nController;
use App\Http\Controllers\UserController;

$router = new Router();

/* ---------------------------------------------------------------------
 *  KİMLİK DOĞRULAMA
 * ------------------------------------------------------------------ */
$router->get('',        AuthController::class, 'showLogin', ['guest']);
$router->get('home',    AuthController::class, 'showLogin', ['guest']);
$router->get('login',   AuthController::class, 'showLogin', ['guest']);
$router->post('login',  AuthController::class, 'login',     ['guest', 'csrf']);
$router->post('logout', AuthController::class, 'logout',    ['auth', 'csrf']);

/* ---------------------------------------------------------------------
 *  PANEL
 * ------------------------------------------------------------------ */
$router->get('dashboard', DashboardController::class, 'index', ['auth']);

// Çeviri, çoğul, biçim ve yön örneklerinin bir arada olduğu sayfa.
$router->get('i18n', I18nController::class, 'index', ['auth']);

// SAYFALAMA ÖRNEĞİ: filtreler ve sayfa numarası adres çubuğunda taşınır.
$router->get('users', UserController::class, 'index', ['auth']);

/* ---------------------------------------------------------------------
 *  AJAX UÇ NOKTALARI (hepsi POST + CSRF)
 * ------------------------------------------------------------------ */
$router->post('api/preferences/theme',  PreferenceApiController::class, 'theme',  ['auth', 'csrf']);
$router->post('api/preferences/locale', PreferenceApiController::class, 'locale', ['auth', 'csrf']);

/* ---------------------------------------------------------------------
 *  BULUNAMAYAN ADRESLER
 * ------------------------------------------------------------------ */
$router->fallback(static function (Request $request, string $path): void {
    if ($request->isAjax()) {
        App\Core\Response::error('İstenen uç nokta bulunamadı.', 404);
    }

    http_response_code(404);

    View::render('errors/404', [
        'title' => 'Sayfa Bulunamadı',
        'path'  => $path,
    ], App\Core\Auth::check() ? 'layouts/admin' : 'layouts/plain');
});

return $router;
