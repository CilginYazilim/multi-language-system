<?php
/**
 * =====================================================================
 *  ARAPÇA SÖZLÜK  (sağdan sola / RTL)
 * ---------------------------------------------------------------------
 *  BU DOSYA NEDEN VAR?
 *  Arapça, çoklu dil altyapısının iki zor sorusunu birden sorar:
 *
 *    1. YÖN: Metin sağdan sola akar. Yalnızca yazı değil, TÜM
 *       yerleşim aynalanır: menü sağa geçer, oklar ters döner,
 *       tablo sütunları sağdan başlar.
 *
 *    2. ÇOĞUL: ALTI biçim vardır — sıfır, tekil, ikil, az (3-10),
 *       çok (11-99), diğer. "if ($n == 1)" mantığı burada tamamen
 *       çöker.
 *
 *  İkisi de yalnızca Türkçe/İngilizce ile test edilen bir sistemde
 *  hiç fark edilmez ve Arapça eklendiği gün her şey dağılır.
 *  Bu yüzden Arapça'yı BAŞTAN ekliyoruz.
 *
 *  NOT: Çeviriler öğretici amaçlıdır; gerçek projede anadili
 *  Arapça olan bir çevirmenle çalışın.
 * =====================================================================
 */

declare(strict_types=1);

return [

    /* ---------------------------------------------------------------- */
    'app_name'    => 'CY متعدد اللغات',
    'save'        => 'حفظ',
    'cancel'      => 'إلغاء',
    'delete'      => 'حذف',
    'search'      => 'بحث',
    'apply'       => 'تطبيق',
    'clear'       => 'مسح',
    'close'       => 'إغلاق',
    'back'        => 'رجوع',
    'yes'         => 'نعم',
    'no'          => 'لا',
    'loading'     => 'جارٍ التحميل…',
    'none'        => 'لا يوجد',

    /* ---------------------------------------------------------------- */
    'nav' => [
        'general'   => 'عام',
        'data'      => 'البيانات',
        'dashboard' => 'لوحة التحكم',
        'dashboard_short' => 'اللوحة',
        'users'     => 'المستخدمون',
        'users_short' => 'المستخدمون',
        'demo'      => 'أمثلة اللغة',
        'demo_short' => 'أمثلة',
        'logout'    => 'تسجيل الخروج',
        'theme'     => 'المظهر الفاتح/الداكن',
        'menu'      => 'القائمة',
        'language'  => 'اللغة',
    ],

    /* ---------------------------------------------------------------- */
    'auth' => [
        'title'       => 'تسجيل الدخول',
        'subtitle'    => 'أدخل بيانات حسابك للمتابعة.',
        'email'       => 'البريد الإلكتروني',
        'password'    => 'كلمة المرور',
        'remember'    => 'تذكرني',
        'remember_hint' => 'يبقى مفتوحًا لمدة 30 يومًا',
        'submit'      => 'دخول',
        'demo_accounts' => 'حسابات تجريبية · اضغط للتعبئة',
        'welcome'     => 'مرحبًا بك، :name!',
    ],

    /* ---------------------------------------------------------------- */
    'users' => [
        'title'       => 'المستخدمون',
        'subtitle'    => 'مثال على التقسيم إلى صفحات من الخادم',
        'user'        => 'المستخدم',
        'email'       => 'البريد الإلكتروني',
        'last_login'  => 'آخر دخول',
        'status'      => 'الحالة',
        'active'      => 'نشط',
        'passive'     => 'غير نشط',
        'all_status'  => 'كل الحالات',
        'search_hint' => 'ابحث بالاسم أو البريد الإلكتروني…',
        'per_page'    => ':count لكل صفحة',
        'empty'       => 'لا توجد سجلات مطابقة لبحثك.',
    ],

    /* ---------------------------------------------------------------- */
    'pagination' => [
        'summary'  => 'عرض :from–:to من :total',
        'empty'    => 'لا توجد سجلات',
        'previous' => 'الصفحة السابقة',
        'next'     => 'الصفحة التالية',
        'page'     => 'صفحة :page',
    ],

    /* ----------------------------------------------------------------
     *  ÇOĞUL — ALTI BİÇİM
     *
     *  Sıra ŞU OLMALIDIR (Translator::pluralIndex ile birebir):
     *      0 sıfır | 1 tekil | 2 ikil | 3 az (3-10) | 4 çok (11-99) | 5 diğer
     *
     *  Sıra bozulursa hata sessizdir: yanlış biçim seçilir ve
     *  yalnızca Arapça bilen biri fark eder.
     * ------------------------------------------------------------- */
    'records'  => 'لا توجد سجلات|سجل واحد|سجلان|:count سجلات|:count سجلاً|:count سجل',
    'messages' => 'لا توجد رسائل|رسالة واحدة|رسالتان|:count رسائل|:count رسالة|:count رسالة',
    'minutes'  => 'أقل من دقيقة|دقيقة واحدة|دقيقتان|:count دقائق|:count دقيقة|:count دقيقة',
    'items'    => 'القائمة فارغة|عنصر واحد محدد|عنصران محددان|:count عناصر محددة|:count عنصرًا محددًا|:count عنصر محدد',

    /* ---------------------------------------------------------------- */
    'demo' => [
        'title'        => 'أمثلة اللغة',
        'subtitle'     => 'الترجمة والجمع والتنسيق والاتجاه',
        'text'         => 'ترجمة النص',
        'text_lead'    => 'أبسط حالة: مرّر مفتاحًا واحصل على النص المترجم.',
        'placeholder'  => 'العناصر النائبة',
        'placeholder_lead' => 'استخدم العناصر النائبة بدل تقسيم الجملة، حتى يتمكن المترجم من إعادة ترتيب الكلمات.',
        'plural'       => 'قواعد الجمع',
        'plural_lead'  => 'تختلف القاعدة بين اللغات. التركية تستخدم صيغة واحدة، والإنجليزية صيغتين، والعربية ست صيغ.',
        'format'       => 'الأرقام والتواريخ والعملة',
        'format_lead'  => 'تُكتب القيمة نفسها بشكل مختلف حسب اللغة.',
        'direction'    => 'اتجاه النص',
        'direction_lead' => 'تتدفق العربية من اليمين إلى اليسار؛ ينعكس التخطيط بالكامل.',
        'current'      => 'اللغة الحالية',
        'try_arabic'   => 'أنت الآن في وضع اليمين إلى اليسار.',
        'intl_missing' => 'إضافة intl غير مفعّلة؛ يتم استخدام تنسيق احتياطي للأرقام والتواريخ.',
        'intl_ok'      => 'إضافة intl مفعّلة؛ يتم تطبيق التنسيقات المحلية بالكامل.',
    ],

    /* ---------------------------------------------------------------- */
    'flash' => [
        'language_changed' => 'تم تغيير اللغة إلى :language',
        'logout'           => 'تم تسجيل خروجك بأمان.',
    ],
];
