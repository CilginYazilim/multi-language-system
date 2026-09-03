<?php
/**
 * =====================================================================
 *  I18nController – Dil örnekleri sayfası
 * ---------------------------------------------------------------------
 *  Tüm işi görünüm yapar; burada yalnızca başlıkları çeviriyoruz.
 *  Başlıkların da çevrilmesi önemlidir: yarısı çevrilmiş bir arayüz,
 *  hiç çevrilmemiş olandan daha kötü görünür.
 * =====================================================================
 */

declare(strict_types=1);

namespace App\Http\Controllers;

use App\Core\Request;
use App\Http\Controller;

final class I18nController extends Controller
{
    public function index(Request $request): void
    {
        $this->view('i18n/index', [
            'title'    => t('common.demo.title'),
            'subtitle' => t('common.demo.subtitle'),
        ]);
    }
}
