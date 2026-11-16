/**
 * Free version: max N items per content type in the "Automatic QR Code" settings.
 * The server also enforces the limit when saving.
 */
jQuery(function ($) {
    $('.qrc-free-box').each(function () {
        var $box = $(this);
        var limit = parseInt($box.data('limit'), 10) || 3;
        var $count = $box.find('.qrc-free-count');
        var $boxes = $box.find('.qrc-free-cb');

        function refresh() {
            var checked = $boxes.filter(':checked').length;
            $count.text(checked + ' / ' + limit);
            $box.toggleClass('qrc-free-full', checked >= limit);
            // Lock the unchecked ones once the limit is reached.
            $boxes.not(':checked').prop('disabled', checked >= limit);
        }

        $boxes.on('change', refresh);
        refresh();
    });
});
