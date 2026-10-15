(function ($) {
    'use strict';

    $(document).ready(function () {

        // Roots to search: main document + Gutenberg's editor iframe (WP 6.3+/7.0).
        function getRoots() {
            var roots = [ document ];
            $('iframe[name="editor-canvas"]').each(function () {
                try {
                    var doc = this.contentDocument || (this.contentWindow && this.contentWindow.document);
                    if (doc && doc.body) { roots.push(doc); }
                } catch (e) {}
            });
            return roots;
        }

        function QRCShortcode() {
            if (typeof QRCodeStyling === 'undefined' || typeof datas === 'undefined') { return; }

            getRoots().forEach(function (root) {
                // FIX: skip canvases already drawn. Before, every call appended
                // another QR on top of the old one (duplicates after retries).
                $('.qrc_canvass', root).not('[data-qrc-rendered="1"]').each(function () {

                    var $el = $(this);
                    $el.attr('data-qrc-rendered', '1');
                    $el.empty();

                    // Per-element overrides (Gutenberg block); fall back to global settings.
                    var size = parseInt($el.data('size'), 10) || datas.size;
                    var options = {
                        shape: $el.data('shape') || datas.shape,
                        width: size,
                        height: size,
                        data: $el.data('text'),
                        dotsOptions: {
                            type:  $el.data('dotstyle') || datas.dotstyle,
                            color: $el.data('color') || datas.color
                        },
                        backgroundOptions: {
                            color: $el.data('background') || datas.background
                        }
                    };

                    // FIX: use the element itself, not document.querySelector('#id')
                    // (breaks with duplicate ids and inside the editor iframe).
                    var qrcode = new QRCodeStyling(options);
                    qrcode.append(this);
                });
            });
        }

        // FIX: one delegated handler (bound once) instead of binding on every
        // QRCShortcodeButon() call, which stacked duplicate click handlers.
        $(document).on('click', '.qrcdownloads', function (e) {
            var canvas = $(this).closest('.qrcprowrapper').find('.qrc_canvass canvas')[0];
            if (!canvas) { return; }
            e.preventDefault();

            // File name from the link; fall back when the page has no title
            // (an empty title used to produce a file literally called "png").
            var name = ($(this).attr('download') || '').replace(/\.png$/i, '').trim();
            name = name.replace(/[\\\/:*?"<>|]+/g, '-').trim();
            if (!name) { name = 'qr-code'; }
            name += '.png';

            canvas.toBlob(function (blob) {
                if (!blob) { return; }
                var url = URL.createObjectURL(blob);
                var a = document.createElement('a');
                a.href = url;
                a.download = name;
                document.body.appendChild(a);
                a.click();
                document.body.removeChild(a);
                setTimeout(function () { URL.revokeObjectURL(url); }, 1500);
            }, 'image/png');
        });

        // FIX: bound once, delegated.
        $(document).on('click', '.qrcpromodalwrapper .qrc-modal-toggle', function (e) {
            e.preventDefault();
            $(this).closest('.qrcpromodalwrapper').find('.qrc_modal').toggleClass('is-visible');
        });

        QRCShortcode();

        // Gutenberg sidebar: wait for #qrc_cuurentlinks, then draw.
        $(document).on('qrc_sidebar_loaded', function () {
            var attempts = 0;
            var qrcInterval = setInterval(function () {
                attempts++;
                var $canvas = $('#qrc_cuurentlinks');
                if ($canvas.length > 0) {
                    clearInterval(qrcInterval);
                    QRCShortcode();
                    return;
                }
                if (attempts > 20) { clearInterval(qrcInterval); }
            }, 250);
        });

        // Gutenberg block preview: redraw after ServerSideRender updates.
        $(document).on('qrc_block_refresh', QRCShortcode);

        // Safety net: draw any new, not-yet-rendered canvas that appears
        // later (sidebar reopened, block re-rendered).
        if (window.MutationObserver) {
            var timer = null;
            new MutationObserver(function () {
                clearTimeout(timer);
                timer = setTimeout(function () {
                    var pending = getRoots().some(function (root) {
                        return $('.qrc_canvass', root).not('[data-qrc-rendered="1"]').length > 0;
                    });
                    if (pending) { QRCShortcode(); }
                }, 150);
            }).observe(document.body, { childList: true, subtree: true });
        }
    });

}(jQuery));