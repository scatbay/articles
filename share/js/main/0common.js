(function () {
    $('html').addClass('js')
        .removeClass('no-js');

    $('.markdown a').map(function ($this) {
        $this = $(this);

        if (!$this.hasClass('anchor'))
            $this.attr('target', '_blank');
    });
})();
