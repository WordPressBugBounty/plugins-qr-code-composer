<?php
/**
 * Limits for the automatic QR code feature in the free version.
 *
 * Free: QR codes can be shown on up to 3 pages, 3 posts and 3 products.
 * The same items get the QR panel in the editor (meta box and Gutenberg sidebar).
 * Custom post types are not supported in the free version.
 *
 * @package Qrc_composer
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

class QRC_Free_Limit {

	/** Option that remembers the default picks (latest items) so they do not shift. */
	const DEFAULTS_OPTION = 'qrc_free_default_ids';

	const PRO_URL = 'https://sharabindu.com/plugins/wordpress-qr-code-generator/#pricing';

	/**
	 * Max items per content type. Filterable: add_filter( 'qrc_free_limit', fn() => 5 );
	 */
	public static function limit() {
		return max( 1, (int) apply_filters( 'qrc_free_limit', 3 ) );
	}

	/**
	 * Max user accounts that get a Profile QR Code / My Account vCard QR code.
	 * Filterable: add_filter( 'qrc_free_user_limit', fn() => 5 );
	 */
	public static function user_limit() {
		return max( 1, (int) apply_filters( 'qrc_free_user_limit', 3 ) );
	}

	/**
	 * IDs of the users that may show a Profile / My Account vCard QR code
	 * (the first N accounts by ID, so the list is stable).
	 *
	 * @return int[]
	 */
	public static function allowed_user_ids() {
		return array_map(
			'absint',
			get_users(
				array(
					'orderby' => 'ID',
					'order'   => 'ASC',
					'number'  => self::user_limit(),
					'fields'  => 'ID',
				)
			)
		);
	}

	public static function is_user_allowed( $user_id ) {
		return in_array( absint( $user_id ), self::allowed_user_ids(), true );
	}

	/**
	 * Content types supported by the free version.
	 */
	public static function types() {
		$types = array( 'page', 'post' );
		if ( class_exists( 'WooCommerce' ) ) {
			$types[] = 'product';
		}
		return $types;
	}

	public static function type_supported( $post_type ) {
		return in_array( $post_type, self::types(), true );
	}

	public static function type_label( $type ) {
		$labels = array(
			'page'    => __( 'Pages', 'qr-code-composer' ),
			'post'    => __( 'Posts', 'qr-code-composer' ),
			'product' => __( 'Products', 'qr-code-composer' ),
		);
		return isset( $labels[ $type ] ) ? $labels[ $type ] : $type;
	}

	/**
	 * IDs the person picked for a type. If nothing was ever saved, the latest
	 * published items are used (and remembered), so QR codes work out of the box.
	 *
	 * @param string $type page|post|product
	 * @return int[]
	 */
	public static function get_ids( $type ) {
		if ( ! self::type_supported( $type ) ) {
			return array();
		}

		$options = get_option( 'qrc_autogenerate', array() );
		if ( is_array( $options )
			&& isset( $options['qrc_free_ids'] )
			&& is_array( $options['qrc_free_ids'] )
			&& isset( $options['qrc_free_ids'][ $type ] )
		) {
			return array_slice( array_map( 'absint', (array) $options['qrc_free_ids'][ $type ] ), 0, self::limit() );
		}

		return self::default_ids( $type );
	}

	private static function default_ids( $type ) {
		$store = get_option( self::DEFAULTS_OPTION );
		if ( ! is_array( $store ) ) {
			$store = array();
		}

		if ( ! isset( $store[ $type ] ) ) {
			$store[ $type ] = get_posts(
				array(
					'post_type'      => $type,
					'post_status'    => 'publish',
					'posts_per_page' => self::limit(),
					'orderby'        => 'date',
					'order'          => 'DESC',
					'fields'         => 'ids',
					'no_found_rows'  => true,
				)
			);
			update_option( self::DEFAULTS_OPTION, $store, false );
		}

		return array_slice( array_map( 'absint', (array) $store[ $type ] ), 0, self::limit() );
	}

	/**
	 * Is this page/post/product one of the picked items?
	 *
	 * @param int $post_id Post ID. Defaults to the current post.
	 */
	public static function is_allowed( $post_id = 0 ) {
		$post_id = $post_id ? absint( $post_id ) : absint( get_the_ID() );
		if ( ! $post_id ) {
			return false;
		}

		$type = get_post_type( $post_id );
		if ( ! $type || ! self::type_supported( $type ) ) {
			return false;
		}

		return in_array( $post_id, self::get_ids( $type ), true );
	}

	/**
	 * Small notice shown in the editor (meta box / Gutenberg sidebar) when the
	 * current item is not one of the picked ones. All parts are escaped.
	 *
	 * @param string $type page|post|product
	 */
	public static function locked_notice_html( $type ) {
		$message = sprintf(
			/* translators: 1: number, 2: content type, for example "pages" */
			esc_html__( 'The free version shows a QR code on up to %1$d %2$s. This one is not on your list.', 'qr-code-composer' ),
			self::limit(),
			esc_html( strtolower( self::type_label( $type ) ) )
		);

		$html  = '<div class="qrc-locked-note">';
		$html .= '<p style="margin:0 0 8px"><strong>' . esc_html__( 'Free version limit', 'qr-code-composer' ) . '</strong></p>';
		$html .= '<p style="margin:0 0 8px">' . $message . '</p>';
		$html .= '<p style="margin:0">';
		if ( current_user_can( 'manage_options' ) ) {
			$html .= '<a href="' . esc_url( admin_url( 'admin.php?page=qr_composer' ) ) . '">' . esc_html__( 'Choose your items', 'qr-code-composer' ) . '</a> &middot; ';
		}
		$html .= '<a href="' . esc_url( self::PRO_URL ) . '" target="_blank" rel="noopener">' . esc_html__( 'Upgrade to Pro for unlimited', 'qr-code-composer' ) . '</a>';
		$html .= '</p></div>';

		return $html;
	}
}
