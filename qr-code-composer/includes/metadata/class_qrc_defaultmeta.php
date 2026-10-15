<?php
if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

/**
 * QR Code meta box (classic editor) + QR Code sidebar (Gutenberg).
 */
class QRCDefaultmeta
{
    public function __construct()
    {
        // FIX: add_meta_box() must run on "add_meta_boxes" (not admin_init).
        add_action( 'add_meta_boxes', array( $this, 'qcr_metabox_page' ) );
        add_action( 'save_post', array( $this, 'qrc_save_post_meta' ) );

        $options = get_option( 'qrc_autogenerate' );
        $is_gutenberg_hidden = ! empty( $options['qrchidegutenberg'] );

        if ( ! $is_gutenberg_hidden ) {
            add_action( 'init', array( $this, 'qrc_register_meta_for_gutenberg' ) );
            add_action( 'enqueue_block_editor_assets', array( $this, 'qrc_gutenberg_sidebar_assets' ) );
        }
    }

    public function qrc_register_meta_for_gutenberg()
    {
        register_meta( 'post', 'qrc_metabox', array(
            'show_in_rest'      => true,
            'single'            => true,
            'type'              => 'string',
            'default'           => '1',
            'sanitize_callback' => function ( $value ) {
                return in_array( (string) $value, array( '1', '2' ), true ) ? (string) $value : '1';
            },
            'auth_callback'     => function ( $allowed, $meta_key, $post_id ) {
                return current_user_can( 'edit_post', $post_id );
            },
        ) );
    }

    public function qrc_gutenberg_sidebar_assets()
    {
        // FIX: only on the post editor screen (this hook also fires in the
        // site editor / widgets editor where there is no $post).
        $screen = function_exists( 'get_current_screen' ) ? get_current_screen() : null;
        if ( ! $screen || 'post' !== $screen->base ) {
            return;
        }

        global $post;
        if ( ! $post ) {
            return;
        }

        wp_enqueue_script( 'qrccreateqr' );

        require QRC_COMPOSER_PATH . 'includes/data/data.php';

        // FIX: always use the real permalink of the post being edited, and
        // keep the QR inside the narrow sidebar (max 240px).
        $current_id_link = get_permalink( $post->ID );
        $qrc_size        = ! empty( $qrc_size ) ? min( absint( $qrc_size ), 240 ) : 200;
        $download_qr     = esc_html__( 'Download QR', 'qrc_composer_pro' );
        $current_title   = $post->post_title ? $post->post_title : 'qr_code';

        $qr_html = '<div class="qrcswholewtapper"><div class="qrcprowrapper"><div class="qrc_canvass" id="qrc_cuurentlinks" data-text="' . esc_attr( $current_id_link ) . '" style="width:' . esc_attr( $qrc_size ) . 'px;display:inline-block"></div><div><a class="qrcdownloads" download="' . esc_attr( $current_title ) . '.png"><button type="button" style="min-width:' . esc_attr( $qrc_size ) . 'px;" class="button button-secondary is-button is-default is-large">' . esc_html( $download_qr ) . '</button></a></div></div></div>';

        wp_enqueue_script(
            'admin-sidebar.js',
            QRC_COMPOSER_URL . 'admin/js/admin-sidebar.js',
            array( 'wp-plugins', 'wp-edit-post', 'wp-editor', 'wp-element', 'wp-components', 'wp-data', 'wp-core-data' ),
            QRC_COMPOSER_VERSION,
            true
        );
        wp_localize_script( 'admin-sidebar.js', 'qrcSidebarData', array(
            'qrHtml' => $qr_html,
        ) );
    }

    /**
     * Classic-editor meta box.
     */
    public function qcr_metabox_page( $post_type )
    {
        // FIX: old code used an undefined $post and passed array($post_types)
        // (nested array) to add_meta_box().
        $screen = function_exists( 'get_current_screen' ) ? get_current_screen() : null;
        if ( $screen && method_exists( $screen, 'is_block_editor' ) && $screen->is_block_editor() ) {
            return; // Gutenberg uses the sidebar instead.
        }

        $excluded_posttypes = array( 'attachment', 'revision', 'nav_menu_item', 'custom_css', 'customize_changeset', 'oembed_cache', 'user_request', 'wp_block', 'scheduled-action', 'product_variation', 'shop_order', 'shop_order_refund', 'shop_coupon', 'elementor_library', 'e-landing-page' );
        if ( in_array( $post_type, $excluded_posttypes, true ) ) {
            return;
        }

        $options12 = get_option( 'qrc_autogenerate' );
        if ( isset( $options12['removemetabox'] ) ) {
            return;
        }

        add_meta_box(
            'qrccompoer_metabox',
            esc_html__( 'QR Code Composer', 'qr-code-composer' ),
            array( $this, 'qrc_metabox_func' ),
            $post_type
        );
    }

    public function qrc_metabox_func( $post )
    {
        wp_enqueue_script( 'qrccreateqr' );
        wp_enqueue_style( 'qrc-admin-css' );

        $meta_val = get_post_meta( $post->ID, 'qrc_metabox', true );
        $qrc_meta_check_info = $meta_val ? $meta_val : 1;

        require QRC_COMPOSER_PATH . 'includes/data/data.php';

        $current_id_link = get_permalink( $post->ID );
        $qrc_size        = ! empty( $qrc_size ) ? absint( $qrc_size ) : 200;
        $current_title   = $post->post_title ? $post->post_title : 'qr_code';
        $download_qr     = isset( $download_qr ) ? $download_qr : esc_html__( 'Download QR', 'qr-code-composer' );

        wp_nonce_field( 'qrc-nonce', 'qrc_meta_nonce' );
        ?>
        <ul class="qrcomposeroutput_wrap">
            <li class="qrcmetalintitle">
                <h3><?php esc_html_e( 'Hide QR Code', 'qr-code-composer' ); ?></h3>
                <p><?php esc_html_e( 'Remove QR code from front end. When you select yes the QR code will be removed from the frontend of this page but will remain here', 'qr-code-composer' ); ?></p>
            </li>
            <li class="qrcmetalinkchekc">
                <select name="qrc_select_field" class="qrc_metaoutput">
                    <option value="1" <?php selected( (int) $qrc_meta_check_info, 1 ); ?>><?php esc_html_e( 'No', 'qr-code-composer' ); ?></option>
                    <option value="2" <?php selected( (int) $qrc_meta_check_info, 2 ); ?>><?php esc_html_e( 'Yes', 'qr-code-composer' ); ?></option>
                </select>
            </li>
            <li class="qrcmetaqrcode"><div class="qrcswholewtapper"><div class="qrcprowrapper"><div class="qrc_canvass" id="qrc_cuurentlinks" data-text="<?php echo esc_attr( $current_id_link ); ?>" style="width:<?php echo esc_attr( $qrc_size ); ?>px;display:inline-block"></div><div><a class="qrcdownloads" download="<?php echo esc_attr( $current_title ); ?>.png"><button type="button" style="min-width:<?php echo esc_attr( $qrc_size ); ?>px;" class="button button-secondary is-button is-default is-large"><?php echo esc_html( $download_qr ); ?></button></a></div></div></div></li>
        </ul>
        <?php
    }

    public function qrc_save_post_meta( $post_id )
    {
        // FIX: the old code created a nonce and verified it right away (always
        // true). Verify the nonce that was actually submitted with the form.
        if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) {
            return;
        }
        if ( ! isset( $_POST['qrc_meta_nonce'] ) || ! wp_verify_nonce( sanitize_text_field( wp_unslash( $_POST['qrc_meta_nonce'] ) ), 'qrc-nonce' ) ) {
            return;
        }
        if ( ! current_user_can( 'edit_post', $post_id ) ) {
            return;
        }

        if ( isset( $_POST['qrc_select_field'] ) ) {
            $val = sanitize_text_field( wp_unslash( $_POST['qrc_select_field'] ) );
            update_post_meta( $post_id, 'qrc_metabox', in_array( $val, array( '1', '2' ), true ) ? $val : '1' );
        }
    }
}

if ( class_exists( 'QRCDefaultmeta' ) ) {
    new QRCDefaultmeta();
}