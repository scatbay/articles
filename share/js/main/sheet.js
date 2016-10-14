(function ($html) {
    $html = $('html');
    if (!$html.hasClass('sheet')) return;

    $('.articles').masonry({
        itemSelector: '.articles-item'
    });
})();
