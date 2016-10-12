$(document).ready(function ($html) {
    $html = $('html');

    if (!$html.hasClass('article')) return;

    $('.markdown img.lazy').lazyload({
        data_attribute: 'src'
    });

    (function (appid, conf, prefix) {
        prefix = '//changyan.sohu.com/upload/';
        if (960 > $html.width()) {
            $('head').append('<script id="changyan_mobile_js" src="' + prefix + 'mobile/wap-js/changyan_mobile.js?client_id=' + appid + '&conf=' + conf + '"></script>');
            return;
        }
        $.ajax({
            dataType: "script",
            cache: true,
            url: prefix + 'changyan.js',
            success: function () {
                window.changyan.api.config({
                    appid: appid,
                    conf: conf
                });
            }
        });
    })('cysDTMgzr', 'prod_a34b35ec70fde70be5be1142eae582fa');
});
