<?php
/**
 * Front-end render for the qrc-composer-pro/qr-code block (free version).
 *
 * Free version supports: current page link, custom link/text, phone number.
 * Design overrides are passed to public/js/qrcode.js through data-* attributes;
 * anything left empty falls back to the admin's global settings.
 *
 * @var array    $attributes Block attributes.
 * @var string   $content    Unused.
 * @var WP_Block $block      Unused.
 *
 * @package qr-code-composer
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

// Global settings + helper variables ($qrc_size, $qr_download_hide, $qrcpopupenbl ...).
require QRC_COMPOSER_PATH . 'includes/data/data.php';

static $qrc_block_i = 0;
++$qrc_block_i;

$qrc_source = isset( $attributes['sourceType'] ) ? $attributes['sourceType'] : 'current';
$qrc_text   = '';
$qrc_name   = trim( wp_strip_all_tags( get_the_title() ) );
if ( '' === $qrc_name ) {
	$qrc_name = 'qr-code';
}

switch ( $qrc_source ) {
	case 'link':
		$qrc_text = isset( $attributes['link'] ) ? trim( $attributes['link'] ) : '';
		break;

	case 'phone':
		$qrc_number = isset( $attributes['number'] ) ? preg_replace( '/[^0-9+]/', '', $attributes['number'] ) : '';
		$qrc_text   = $qrc_number ? 'tel:' . $qrc_number : '';
		break;

	case 'current':
		$qrc_link = get_permalink();
		$qrc_text = $qrc_link ? $qrc_link : $current_id_link;
		break;

	default:
		// A Pro-only source type (WhatsApp, WiFi, Maps, Event, vCard) is not available here.
		if ( current_user_can( 'edit_posts' ) ) {
			echo '<p>' . esc_html__( 'This QR code type is available in QR Code Composer Pro.', 'qr-code-composer' ) . '</p>';
		}
		return;
}

if ( '' === $qrc_text ) {
	if ( current_user_can( 'edit_posts' ) ) {
		echo '<p>' . esc_html__( 'Fill in the block settings to generate a QR code.', 'qr-code-composer' ) . '</p>';
	}
	return;
}

wp_enqueue_script( 'qrccreateqr' );

// Design overrides (free): shape, size, body dot style, body color, background, corner radius.
$qrc_allowed_shapes = array( 'square', 'circle' );
$qrc_allowed_dots   = array( 'square', 'dots', 'rounded', 'extra-rounded', 'classy', 'classy-rounded' );

$qrc_data_atts = '';

$qrc_b_size = isset( $attributes['size'] ) ? absint( $attributes['size'] ) : 0;
$qrc_b_size = $qrc_b_size ? min( max( $qrc_b_size, 80 ), 1000 ) : 0;
if ( $qrc_b_size ) {
	$qrc_data_atts .= ' data-size="' . esc_attr( $qrc_b_size ) . '"';
}
if ( ! empty( $attributes['shape'] ) && in_array( $attributes['shape'], $qrc_allowed_shapes, true ) ) {
	$qrc_data_atts .= ' data-shape="' . esc_attr( $attributes['shape'] ) . '"';
}
if ( ! empty( $attributes['bodystyle'] ) && in_array( $attributes['bodystyle'], $qrc_allowed_dots, true ) ) {
	$qrc_data_atts .= ' data-dotstyle="' . esc_attr( $attributes['bodystyle'] ) . '"';
}
$qrc_b_color = ! empty( $attributes['color'] ) ? sanitize_hex_color( $attributes['color'] ) : '';
if ( $qrc_b_color ) {
	$qrc_data_atts .= ' data-color="' . esc_attr( $qrc_b_color ) . '"';
}
$qrc_b_bg = ! empty( $attributes['background'] ) ? sanitize_hex_color( $attributes['background'] ) : '';
if ( $qrc_b_bg ) {
	$qrc_data_atts .= ' data-background="' . esc_attr( $qrc_b_bg ) . '"';
}

$qrc_b_radius = isset( $attributes['qrcbround'] ) ? absint( $attributes['qrcbround'] ) : 0;
$qrc_b_radius = min( $qrc_b_radius, 50 );
$qrc_canvas_style = 'display:' . $displayblock . ';';
if ( $qrc_b_radius ) {
	$qrc_canvas_style .= 'border-radius:' . $qrc_b_radius . 'px;overflow:hidden;';
}

// Download button: block value wins, otherwise the admin setting.
$qrc_dbtn = isset( $attributes['dbtn'] ) ? $attributes['dbtn'] : '';
$qrc_show_download = ( '' === $qrc_dbtn ) ? ( 'no' === $qr_download_hide ) : ( 'no' === $qrc_dbtn );

$qrc_btn_label  = ! empty( $attributes['label'] ) ? $attributes['label'] : $download_qr;
$qrc_btn_color  = ! empty( $attributes['dbtcolor'] ) ? sanitize_hex_color( $attributes['dbtcolor'] ) : '';
$qrc_btn_bg     = ! empty( $attributes['dbtbg'] ) ? sanitize_hex_color( $attributes['dbtbg'] ) : '';
$qrc_btn_border = ! empty( $attributes['dbborder'] ) ? sanitize_hex_color( $attributes['dbborder'] ) : '';
$qrc_btn_color  = $qrc_btn_color ? $qrc_btn_color : $qr_dwnbtn_color;
$qrc_btn_bg     = $qrc_btn_bg ? $qrc_btn_bg : $qr_dwnbtnbg_color;
$qrc_btn_border = $qrc_btn_border ? $qrc_btn_border : $qr_download_brclr;
$qrc_btn_radius = ( isset( $attributes['brdius'] ) && '' !== $attributes['brdius'] ) ? absint( $attributes['brdius'] ) : absint( $qrc_dwnbtn_brdius );
$qrc_btn_font   = ( isset( $attributes['fntsz'] ) && '' !== $attributes['fntsz'] ) ? absint( $attributes['fntsz'] ) : absint( $qr_download_fntsz );
$qrc_btn_width  = $qrc_b_size ? $qrc_b_size : absint( $qrc_size );

$qrc_btn_style = sprintf(
	'min-width:%dpx;background:%s;color:%s;font-weight:600;border:1px solid %s;border-radius:%dpx;font-size:%dpx;padding:6px 0;',
	$qrc_btn_width,
	$qrc_btn_bg,
	$qrc_btn_color,
	$qrc_btn_border,
	$qrc_btn_radius,
	$qrc_btn_font
);

$qrc_use_popup = ( 'checked' === $qrcpopupenbl && ( 'current' === $qrc_source || $popupcustomqr ) );
?>
<div <?php echo get_block_wrapper_attributes(); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped -- escaped by core. ?>>
<?php if ( $qrc_use_popup ) : ?>
	<div class="qrcpromodalwrapper" style="margin: 20px 0;">
		<button type="button" class="qrc-modal-toggle" style="background:<?php echo esc_attr( $qrcpopup_bg ); ?>;color:<?php echo esc_attr( $qrcpopup_color ); ?>;border:1px solid <?php echo esc_attr( $qrcpopup_brclr ); ?>;border-radius:<?php echo esc_attr( $qrcpopup_brdius ); ?>px;padding:6px 14px;font-size:<?php echo esc_attr( $qrcpopup_fntsize ); ?>px"><?php echo esc_html( $qrcpopuptext ); ?></button>
		<div class="qrc_modal">
			<div class="qrc-overlay qrc-modal-toggle"></div>
			<div class="qrc-modal-wrapper qrc-modal-transition"><span class="qrc-modal-toggle">&times;</span>
<?php else : ?>
	<div style="margin: 20px 0;">
<?php endif; ?>
				<div class="qrcswholewtapper">
					<div class="qrcprowrapper">
						<div class="qrc_canvass" id="qrc_block_<?php echo esc_attr( $qrc_block_i ); ?>" style="<?php echo esc_attr( $qrc_canvas_style ); ?>" data-text="<?php echo esc_attr( $qrc_text ); ?>"<?php echo $qrc_data_atts; // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped -- each attribute is escaped above. ?>></div>
<?php if ( $qrc_show_download ) : ?>
						<div><a download="<?php echo esc_attr( $qrc_name ); ?>.png" class="qrcdownloads"><button type="button" class="uqr_code_btn" style="<?php echo esc_attr( $qrc_btn_style ); ?>"><?php echo esc_html( $qrc_btn_label ); ?></button></a></div>
<?php endif; ?>
					</div>
				</div>
<?php if ( $qrc_use_popup ) : ?>
			</div>
		</div>
	</div>
<?php else : ?>
	</div>
<?php endif; ?>
</div>
