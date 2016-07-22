$(document).ready(function () {
    if (!$('html').hasClass('article')) return;

    $('.markdown img.lazy').lazyload({
        data_attribute: 'src'
    });
});
