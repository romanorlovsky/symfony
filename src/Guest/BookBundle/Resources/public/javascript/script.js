(function ($) {
    $('.remove-article').on('click', function (e) {
        if (!confirm('Are you sure?')) e.preventDefault();
    });
})(jQuery);