<?php
/**
 * Registers the "QR Code Composer" Gutenberg block (free version).
 *
 * The editor preview is drawn in the browser by the same QRCodeStyling
 * library the front-end uses, so it works inside the block editor without
 * any server-side-render request.
 *
 * @package qr-code-composer
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

add_action(
	'init',
	function () {

		// Same handle the public/admin classes use. wp_register_script() ignores
		// a second registration of the same handle, so this is safe.
		wp_register_script(
			'qr-code-styling',
			QRC_COMPOSER_URL . 'admin/js/qr-code-styling.js',
			array( 'jquery' ),
			QRC_COMPOSER_VERSION,
			true
		);

		wp_register_script(
			'qrc-qrcode-block-editor-script',
			QRC_COMPOSER_URL . 'blocks/qrc-qrcode-block/index.js',
			array(
				'wp-blocks',
				'wp-element',
				'wp-block-editor',
				'wp-components',
				'wp-data',
				'wp-i18n',
				'qr-code-styling',
			),
			QRC_COMPOSER_VERSION,
			true
		);

		register_block_type(
			QRC_COMPOSER_PATH . 'blocks/qrc-qrcode-block',
			array(
				'render_callback' => 'qrc_qrcode_block_render',
				'editor_script'   => 'qrc-qrcode-block-editor-script',
			)
		);
	}
);

/**
 * Pass the admin's global design settings to the editor preview so it looks
 * like the front-end when a block setting is left on "Default".
 */
add_action(
	'enqueue_block_editor_assets',
	function () {
		$options = get_option( 'qrc_composer_settings' );
		$options = is_array( $options ) ? $options : array();

		$data = array(
			'size'       => isset( $options['qr_code_picture_size_width'] ) ? absint( $options['qr_code_picture_size_width'] ) : 200,
			'shape'      => isset( $options['qrc_codeshape'] ) ? $options['qrc_codeshape'] : 'square',
			'color'      => isset( $options['qr_color'] ) ? $options['qr_color'] : '#000000',
			'background' => isset( $options['background'] ) ? $options['background'] : 'transparent',
			'dotstyle'   => isset( $options['qrc_dot_style'] ) ? $options['qrc_dot_style'] : 'classy-rounded',
			'quiet'      => isset( $options['quiet'] ) ? absint( $options['quiet'] ) : 0,
			// Download button defaults (same fallbacks as includes/data/data.php).
			'dlHide'     => isset( $options['qr_download_hide'] ) ? $options['qr_download_hide'] : 'no',
			'dlText'     => isset( $options['qr_download_text'] ) ? $options['qr_download_text'] : 'Download QR',
			'dlBg'       => isset( $options['qr_dwnbtnbg_color'] ) ? $options['qr_dwnbtnbg_color'] : '#e8e8e8',
			'dlColor'    => isset( $options['qr_dwnbtn_color'] ) ? $options['qr_dwnbtn_color'] : '#4c4c4c',
			'dlBorder'   => isset( $options['qr_download_brclr'] ) ? $options['qr_download_brclr'] : '#c4c4c4',
			'dlRadius'   => isset( $options['qrc_dwnbtn_brdius'] ) ? absint( $options['qrc_dwnbtn_brdius'] ) : 4,
			'dlFont'     => isset( $options['qr_download_fntsz'] ) ? absint( $options['qr_download_fntsz'] ) : 15,
			'siteUrl'    => home_url( '/' ),
			'proUrl'     => 'https://sharabindu.com/plugins/wordpress-qr-code-generator/',
		);

		wp_add_inline_script(
			'qrc-qrcode-block-editor-script',
			'window.qrcBlockData = ' . wp_json_encode( $data ) . ';',
			'before'
		);
	}
);

function qrc_qrcode_block_render( $attributes, $content, $block ) {
	ob_start();
	include QRC_COMPOSER_PATH . 'blocks/qrc-qrcode-block/render.php';
	return ob_get_clean();
}
