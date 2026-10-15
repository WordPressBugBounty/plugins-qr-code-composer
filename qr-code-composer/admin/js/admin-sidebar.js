( function ( wp ) {
    const { registerPlugin } = wp.plugins;
    // FIX: wp.editPost.PluginSidebar is deprecated (WP 6.6+); prefer wp.editor.
    const PluginSidebar = ( wp.editor && wp.editor.PluginSidebar ) || wp.editPost.PluginSidebar;
    const PluginSidebarMoreMenuItem = ( wp.editor && wp.editor.PluginSidebarMoreMenuItem ) || wp.editPost.PluginSidebarMoreMenuItem;
    const { PanelBody, SelectControl } = wp.components;
    const { createElement, Fragment, RawHTML, useEffect } = wp.element;
    const { useSelect } = wp.data;
    const { useEntityProp } = wp.coreData;

    const qrIcon = createElement( 'svg', { width: 20, height: 20, viewBox: '0 0 24 24' },
        createElement( 'path', { d: 'M3 3h8v8H3zm2 2v4h4V5zm8-2h8v8h-8zm2 2v4h4V5zM3 13h8v8H3zm2 2v4h4v-4zm13-2h3v2h-3zm-3 2h3v3h-3zm3 3h3v3h-3zm-3 0h3v-3h-3zm0-3h3v-3h-3z' } )
    );

    function triggerQr() {
        if ( window.jQuery ) {
            window.jQuery( document ).trigger( 'qrc_sidebar_loaded' );
        }
    }

    const QRCSidebar = function () {
        const postType = useSelect( function ( select ) {
            return select( 'core/editor' ).getCurrentPostType();
        }, [] );

        // meta is undefined for post types without "custom-fields" support.
        const [ meta, setMeta ] = useEntityProp( 'postType', postType || 'post', 'meta' );

        // FIX: draw the QR whenever the sidebar is opened (it mounts on open).
        // Retry a few times because the panel DOM may not be ready on first try.
        useEffect( function () {
            const timers = [ 200, 700, 1500, 3000 ].map( function ( ms ) {
                return setTimeout( triggerQr, ms );
            } );
            return function () {
                timers.forEach( clearTimeout );
            };
        }, [] );

        // FIX: QR is always rendered. Before, a missing meta object kept a
        // Spinner on screen forever and the QR never appeared.
        const hasMeta = !! meta && typeof setMeta === 'function';
        const metaValue = hasMeta && meta.qrc_metabox ? meta.qrc_metabox : '1';

        return createElement(
            Fragment,
            null,
            createElement(
                PluginSidebarMoreMenuItem,
                { target: 'qrc-sidebar', icon: qrIcon },
                'WordPress QR Code'
            ),
            createElement(
                PluginSidebar,
                { name: 'qrc-sidebar', title: 'QR Code Generator', icon: qrIcon },
                createElement(
                    PanelBody,
                    { title: 'QR Code Settings', initialOpen: true },
                    createElement( RawHTML, null, ( window.qrcSidebarData && window.qrcSidebarData.qrHtml ) || '' ),
                    hasMeta ? createElement( SelectControl, {
                        label: 'Remove QR Code from Frontend',
                        value: metaValue,
                        options: [
                            { label: 'No', value: '1' },
                            { label: 'Yes', value: '2' }
                        ],
                        onChange: function ( newValue ) {
                            setMeta( Object.assign( {}, meta, { qrc_metabox: newValue } ) );
                        },
                        help: 'When you select Yes, the QR code will be removed from the frontend display of this page, but it will remain available in the backend for your reference.'
                    } ) : null
                )
            )
        );
    };

    registerPlugin( 'qrc-gutenberg-sidebar', { render: QRCSidebar } );
} )( window.wp );