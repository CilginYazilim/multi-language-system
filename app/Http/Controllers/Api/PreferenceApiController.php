<?php
/**
 * =====================================================================
 *  PreferenceApiController – Kişisel arayüz tercihleri
 * ---------------------------------------------------------------------
 *  İki tercih var: TEMA ve DİL.
 *
 *  İKİSİ DE NEDEN HESABA KAYDEDİLİYOR?
 *  Yalnızca çerezde tutulsalardı, kullanıcı işten eve geçtiğinde,
 *  başka bir tarayıcı açtığında veya çerezleri temizlediğinde
 *  tercihleri kaybolurdu. Hesaba bağlayınca nereden girerse girsin
 *  kendi düzenini bulur.
 *
 *  Çerez yine de yazılır ama artık farklı bir işi vardır: sunucu,
 *  sayfanın İLK HTML'ini doğru tema ve dille üretebilsin diye.
 *
 *  GÜVENLİK: Kullanıcı yalnızca KENDİ tercihini değiştirebilir.
 *  Hedef ID istekten okunmaz, oturumdan alınır (IDOR koruması).
 * =====================================================================
 */

declare(strict_types=1);

namespace App\Http\Controllers\Api;

use App\Core\Auth;
use App\Core\Request;
use App\Core\Response;
use App\Core\Session;
use App\Core\Translator;
use App\Http\Controller;
use App\Models\User;

final class PreferenceApiController extends Controller
{
    /** Tema tercihini kaydeder. Rota: POST api/preferences/theme */
    public function theme(Request $request): void
    {
        $theme  = User::normalizeTheme($request->input('theme'));
        $userId = Auth::id();

        if ($userId === null) {
            Response::error('Oturumunuz sonlandı. Lütfen tekrar giriş yapın.', 401);
        }

        $this->users()->updateTheme($userId, $theme);

        Session::set('_theme', $theme);

        Response::json(['success' => true, 'theme' => $theme]);
    }

    /**
     * Dil tercihini kaydeder. Rota: POST api/preferences/locale
     *
     * Sayfa zaten "?lang=" bağlantısıyla o dilde açılmıştır; bu uç
     * nokta yalnızca tercihi KALICI hale getirir. İkisini ayırmak,
     * JavaScript kapalıyken de dil değiştirmeyi mümkün kılar.
     */
    public function locale(Request $request): void
    {
        $userId = Auth::id();

        if ($userId === null) {
            Response::error('Oturumunuz sonlandı. Lütfen tekrar giriş yapın.', 401);
        }

        /* Beyaz listeden geçer: desteklenmeyen bir kod veritabanına
         * yazılırsa, o kullanıcı her girişinde bulunamayan bir
         * sözlük arar ve arayüz ham anahtarlarla dolar. */
        $locale = User::normalizeLocale($request->input('locale'));

        $this->users()->updateLocale($userId, $locale);

        Response::json([
            'success'   => true,
            'locale'    => $locale,
            'direction' => Translator::direction($locale),
        ]);
    }
}
