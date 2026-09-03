<?php
/**
 * =====================================================================
 *  SOL MENÜ TANIMI
 * ---------------------------------------------------------------------
 *  DİKKAT: "label" ve "short" alanları DÜZ METİN DEĞİL, ÇEVİRİ
 *  ANAHTARIDIR. Menü de dil değiştiğinde birlikte değişmelidir;
 *  yarısı çevrilmiş bir arayüz, hiç çevrilmemiş olandan kötü görünür.
 *
 *  Karşılıkları lang/{dil}/common.php içindeki "nav" bölümündedir.
 * =====================================================================
 */

declare(strict_types=1);

return [
    [
        'label' => 'common.nav.general',
        'items' => [
            ['route' => 'dashboard', 'icon' => 'dashboard', 'label' => 'common.nav.dashboard', 'short' => 'common.nav.dashboard_short'],
            ['route' => 'i18n',      'icon' => 'activity',  'label' => 'common.nav.demo',      'short' => 'common.nav.demo_short'],
        ],
    ],
    [
        'label' => 'common.nav.data',
        'items' => [
            ['route' => 'users', 'icon' => 'users', 'label' => 'common.nav.users', 'short' => 'common.nav.users_short'],
        ],
    ],
];
