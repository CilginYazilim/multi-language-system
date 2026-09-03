<?php
/**
 * =====================================================================
 *  ENGLISH DICTIONARY
 * ---------------------------------------------------------------------
 *  Keys MUST match lang/tr/common.php exactly. A missing key falls
 *  back to Turkish (FALLBACK_LOCALE); if it is missing there too,
 *  the raw key is printed — which makes the gap obvious during
 *  testing rather than silently shipping a half-translated screen.
 *
 *  PLURALS: English uses TWO forms (singular | plural), unlike
 *  Turkish which needs only one. Compare the 'records' key below
 *  with its Turkish counterpart.
 * =====================================================================
 */

declare(strict_types=1);

return [

    /* ---------------------------------------------------------------- */
    'app_name'    => 'CY Multi-language',
    'save'        => 'Save',
    'cancel'      => 'Cancel',
    'delete'      => 'Delete',
    'search'      => 'Search',
    'apply'       => 'Apply',
    'clear'       => 'Clear',
    'close'       => 'Close',
    'back'        => 'Back',
    'yes'         => 'Yes',
    'no'          => 'No',
    'loading'     => 'Loading…',
    'none'        => 'None',

    /* ---------------------------------------------------------------- */
    'nav' => [
        'general'   => 'General',
        'data'      => 'Data',
        'dashboard' => 'Dashboard',
        'dashboard_short' => 'Home',
        'users'     => 'Users',
        'users_short' => 'Users',
        'demo'      => 'i18n Playground',
        'demo_short' => 'i18n',
        'logout'    => 'Sign out',
        'theme'     => 'Light/dark theme',
        'menu'      => 'Menu',
        'language'  => 'Language',
    ],

    /* ---------------------------------------------------------------- */
    'auth' => [
        'title'       => 'Sign in',
        'subtitle'    => 'Enter your account details to continue.',
        'email'       => 'Email',
        'password'    => 'Password',
        'remember'    => 'Remember me',
        'remember_hint' => 'Stays signed in for 30 days',
        'submit'      => 'Sign in',
        'demo_accounts' => 'Demo accounts · click to fill',
        'welcome'     => 'Welcome back, :name!',
    ],

    /* ---------------------------------------------------------------- */
    'users' => [
        'title'       => 'Users',
        'subtitle'    => 'Server-side pagination example',
        'user'        => 'User',
        'email'       => 'Email',
        'last_login'  => 'Last sign-in',
        'status'      => 'Status',
        'active'      => 'Active',
        'passive'     => 'Inactive',
        'all_status'  => 'All statuses',
        'search_hint' => 'Search name, surname or email…',
        'per_page'    => ':count per page',
        'empty'       => 'No records match your search.',
    ],

    /* ---------------------------------------------------------------- */
    'pagination' => [
        'summary'  => 'Showing :from–:to of :total',
        'empty'    => 'No records found',
        'previous' => 'Previous page',
        'next'     => 'Next page',
        'page'     => 'Page :page',
    ],

    /* ----------------------------------------------------------------
     *  PLURALS — two forms, separated by "|"
     *
     *  Turkish needs a single form ("5 kayıt"); English needs two
     *  ("1 record" / "5 records"). Hard-coding `if ($n == 1)` in the
     *  application would be right for English, pointless for Turkish
     *  and plain wrong for Arabic — which is why the rule lives in
     *  Translator::pluralIndex(), keyed by locale.
     * ------------------------------------------------------------- */
    'records'  => '{0} No records|:count record|:count records',
    'messages' => '{0} No messages|:count message|:count messages',
    'minutes'  => ':count minute|:count minutes',
    'items'    => '{0} List is empty|:count item selected|:count items selected',

    /* ---------------------------------------------------------------- */
    'demo' => [
        'title'        => 'i18n Playground',
        'subtitle'     => 'Text, plurals, formatting and direction',
        'text'         => 'Text translation',
        'text_lead'    => 'The simplest case: pass a key, get the translated string.',
        'placeholder'  => 'Placeholders',
        'placeholder_lead' => 'Use placeholders instead of splitting sentences, so translators can reorder words freely.',
        'plural'       => 'Plural rules',
        'plural_lead'  => 'Every language differs. Turkish uses one form, English two, Arabic six.',
        'format'       => 'Numbers, dates and money',
        'format_lead'  => 'The same value is written differently per locale.',
        'direction'    => 'Text direction',
        'direction_lead' => 'Arabic flows right to left; the entire layout mirrors.',
        'current'      => 'Current language',
        'try_arabic'   => 'Switch to Arabic to see the direction flip.',
        'intl_missing' => 'The intl extension is disabled; number and date formatting falls back to a manual table.',
        'intl_ok'      => 'The intl extension is enabled; locale formats are applied in full.',
    ],

    /* ---------------------------------------------------------------- */
    'flash' => [
        'language_changed' => 'Language changed to :language',
        'logout'           => 'You have been signed out securely.',
    ],
];
