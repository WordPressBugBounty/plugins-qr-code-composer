<?php
/**
 * Registers the "Dynamic QR Code" Gutenberg block, plus the small REST
 * API it uses to list existing dynamic links and create new ones from
 * inside the block editor.
 *
 * @package qrc_composer_pro
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

class Qrc_Dynamic_Block {

	const BLOCK_NAME = 'qrc-composer-pro/dynamic-qr';

	public function __construct() {
		add_action( 'init', array( $this, 'register_block' ) );
		add_action( 'rest_api_init', array( $this, 'register_rest_routes' ) );
		add_action( 'enqueue_block_editor_assets', array( $this, 'enqueue_editor_media' ) );
	}

	/**
	 * The block's "custom button image" picker uses the raw wp.media()
	 * frame (same pattern as the plugin's admin settings screen), so the
	 * media modal JS needs to be present on the block editor screen.
	 */
	public function enqueue_editor_media() {
		wp_enqueue_media();
	}

	public function register_block() {
		wp_register_script(
			'qrc-dynamic-block-editor',
			QRC_COMPOSER_URL . 'blocks/js/qrc-dynamic-block.js',
			array(
				'wp-blocks',
				'wp-element',
				'wp-block-editor',
				'wp-components',
				'wp-api-fetch',
				'wp-i18n',
				'wp-server-side-render',
			),
			QRC_COMPOSER_VERSION,
			true
		);

		wp_localize_script(
			'qrc-dynamic-block-editor',
			'qrcDynamicBlock',
			array(
				'restUrl' => esc_url_raw( rest_url( 'qrc/v1/dynamic-links' ) ),
				'nonce'   => wp_create_nonce( 'wp_rest' ),
				'pluginUrl'   => plugin_dir_url( __FILE__ ),
			)
		);

		register_block_type(
			self::BLOCK_NAME,
			array(
				'editor_script'   => 'qrc-dynamic-block-editor',
				'render_callback' => array( $this, 'render_block' ),
				'attributes'      => array(
					'linkId'       => array(
						'type'    => 'number',
						'default' => 0,
					),
					'size'         => array(
						'type'    => 'number',
						'default' => 220,
					),
					'showTitle'    => array(
						'type'    => 'boolean',
						'default' => true,
					),
					'showDownload' => array(
						'type'    => 'boolean',
						'default' => true,
					),
					'downloadBtnBg'      => array(
						'type'    => 'string',
						'default' => '#2563eb',
					),
					'downloadBtnColor'   => array(
						'type'    => 'string',
						'default' => '#ffffff',
					),
					'downloadBtnPadding' => array(
						'type'    => 'number',
						'default' => 10,
					),
					'downloadBtnRadius'  => array(
						'type'    => 'number',
						'default' => 6,
					),
					'downloadBtnImageId'  => array(
						'type'    => 'number',
						'default' => 0,
					),
					'downloadBtnImageUrl' => array(
						'type'    => 'string',
						'default' => '',
					),
					'customLogoId'  => array(
						'type'    => 'number',
						'default' => 0,
					),
					'customLogoUrl' => array(
						'type'    => 'string',
						'default' => '',
					),
				),
			)
		);
	}

	/**
	 * Server-side render — always pulls the live link row, so the QR
	 * image and destination stay in sync even after the destination
	 * changes (that's the whole point of a *dynamic* QR code).
	 */
	public function render_block( $attributes ) {
		$link_id = isset( $attributes['linkId'] ) ? absint( $attributes['linkId'] ) : 0;
		if ( ! $link_id ) {
			return current_user_can( 'edit_posts' )
				? '<p>' . esc_html__( 'Choose or create a dynamic QR code in the block settings.', 'qrc_composer_pro' ) . '</p>'
				: '';
		}

		$link = Qrc_Dynamic_Links_DB::get_link( $link_id );
		if ( ! $link ) {
			return '';
		}

		return Qrc_Dynamic_Public::render_markup(
			$link,
			array(
				'size'        => isset( $attributes['size'] ) ? $attributes['size'] : 220,
				'title'       => ! empty( $attributes['showTitle'] ) ? 'yes' : 'no',
				'download'    => ! empty( $attributes['showDownload'] ) ? 'yes' : 'no',
				'class'       => 'qrc-dynamic-block',
				'btn_bg'      => isset( $attributes['downloadBtnBg'] ) ? $attributes['downloadBtnBg'] : '#2563eb',
				'btn_color'   => isset( $attributes['downloadBtnColor'] ) ? $attributes['downloadBtnColor'] : '#ffffff',
				'btn_padding' => isset( $attributes['downloadBtnPadding'] ) ? $attributes['downloadBtnPadding'] : 10,
				'btn_radius'  => isset( $attributes['downloadBtnRadius'] ) ? $attributes['downloadBtnRadius'] : 6,
				'btn_image'   => ! empty( $attributes['downloadBtnImageUrl'] ) ? $attributes['downloadBtnImageUrl'] : '',
				'logo_id'     => isset( $attributes['customLogoId'] ) ? absint( $attributes['customLogoId'] ) : 0,
			)
		);
	}

	public function register_rest_routes() {
		register_rest_route(
			'qrc/v1',
			'/dynamic-links',
			array(
				array(
					'methods'             => WP_REST_Server::READABLE,
					'callback'            => array( $this, 'rest_list_links' ),
					'permission_callback' => function () {
						return current_user_can( 'edit_posts' );
					},
				),
				array(
					'methods'             => WP_REST_Server::CREATABLE,
					'callback'            => array( $this, 'rest_create_link' ),
					'permission_callback' => function () {
						return current_user_can( 'manage_options' );
					},
					'args'                => array(
						'title'           => array(
							'type'     => 'string',
							'required' => false,
						),
						'destination_url' => array(
							'type'     => 'string',
							'required' => true,
						),
					),
				),
			)
		);
	}

	public function rest_list_links( $request ) {
		$links = Qrc_Dynamic_Links_DB::get_links( array( 'per_page' => 200 ) );
		$out   = array();
		foreach ( $links as $link ) {
			$out[] = array(
				'id'    => (int) $link->id,
				'title' => $link->title ? $link->title : sprintf( '(#%d) %s', $link->id, $link->destination_url ),
			);
		}
		return rest_ensure_response( $out );
	}

	/**
	 * NOTE: assumes Qrc_Dynamic_Links_DB::insert_link() returns the new
	 * row's id. If yours returns a bool instead, adjust this method (or
	 * insert_link itself) to return $wpdb->insert_id.
	 */
	public function rest_create_link( $request ) {
		$title       = sanitize_text_field( $request->get_param( 'title' ) );
		$destination = esc_url_raw( $request->get_param( 'destination_url' ) );

		if ( empty( $destination ) ) {
			return new WP_Error( 'qrc_missing_destination', __( 'A destination URL is required.', 'qrc_composer_pro' ), array( 'status' => 400 ) );
		}

		$id = Qrc_Dynamic_Links_DB::insert_link(
			array(
				'title'           => $title,
				'destination_url' => $destination,
				'status'          => 'active',
				'max_scans'       => 0,
				'qrc_key'         => Qrc_Dynamic_Redirect::generate_key(),
				'created_at'      => current_time( 'mysql' ),
			)
		);

		if ( ! $id ) {
			return new WP_Error( 'qrc_create_failed', __( 'Could not create the dynamic QR code.', 'qrc_composer_pro' ), array( 'status' => 500 ) );
		}

		return rest_ensure_response(
			array(
				'id'    => (int) $id,
				'title' => $title,
			)
		);
	}
}

if ( class_exists( 'Qrc_Dynamic_Block' ) ) {
	new Qrc_Dynamic_Block();
}