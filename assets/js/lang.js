/* ==================================================================
 *  DİL TERCİHİNİ HESABA KAYDET
 *  cilginyazilim.com – Çoklu Dil (i18n) Sistemi
 * ------------------------------------------------------------------
 *  Dil değiştirme İŞİNİ bu dosya yapmaz — onu bağlantının kendisi
 *  yapar ("?lang=en"). Buradaki kod yalnızca tercihi KALICI hale
 *  getirir: giriş yapmış kullanıcının hesabına yazar.
 *
 *  Bu ayrım önemlidir: JavaScript kapalı olsa bile dil değişimi
 *  çalışmaya devam eder, sadece "hatırlanmaz".
 * ================================================================== */

/* global CY, jQuery */
(function ($) {
    'use strict';

    $(document).on('click', '.cy-langswitch [data-locale]', function () {
        var locale = $(this).data('locale');

        /* Sayfa zaten bağlantı yüzünden yenilenecek. İsteği
         * beklemeden gönderiyoruz; başarısız olursa da bir şey
         * bozulmaz — çerez yine yazılmıştır ve kullanıcı istediği
         * dilde sayfayı görür. */
        CY.post('api/preferences/locale', { locale: locale });
    });
})(jQuery);
