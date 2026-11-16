<?php
/**
 * The public-facing functionality of the plugin.
 *
 * @link       https://sharabindu.com
 * @since      4.0.0
 *
 * @package    Qrc_composer
 * @subpackage Qrc_composer/public
 */

/**
 * The public-facing functionality of the plugin.
 *
 * Defines the plugin name, version, and two examples hooks for how to
 * enqueue the public-facing stylesheet and JavaScript.
 *
 * @package    Qrc_composer
 * @subpackage Qrc_composer/public
 * @author     Sharabindu Bakshi <sharabindu86@gmail.com>
 */
class Qrc_composer_Public
{

    /**
     * The ID of this plugin.
     *
     * @since    4.0.0
     * @access   private
     * @var      string    $plugin_name    The ID of this plugin.
     */
    private $plugin_name;

    /**
     * The version of this plugin.
     *
     * @since    4.0.0
     * @access   private
     * @var      string    $version    The current version of this plugin.
     */
    private $version;
    public $subdomain;
    /**
     * Initialize the class and set its properties.
     *
     * @since    4.0.0
     * @param      string    $plugin_name       The name of the plugin.
     * @param      string    $version    The version of this plugin.
     */
    public function __construct($plugin_name, $version)
    {

        $this->plugin_name = plugin_basename(__FILE__);
        $this->version = $version;
    
    }

    /**
     * Register the stylesheets for the public-facing side of the site.
     *
     * @since    4.0.0
     */
    public function enqueue_styles()
    {
         wp_register_style('qrc-css', QRC_COMPOSER_URL . 'public/css/qrc.css', array() ,QRC_COMPOSER_VERSION, 'all');
        wp_enqueue_style('qrc-css');

    }

    /**
     * Register the JavaScript for the public-facing side of the site.
     *
     * @since    4.0.0
     */
    public function enqueue_scripts()
    {

         wp_register_script('qr-code-styling', QRC_COMPOSER_URL . 'admin/js/qr-code-styling.js', array(
            'jquery'
        ) , QRC_COMPOSER_VERSION, true);

        wp_register_script('qrccreateqr', QRC_COMPOSER_URL . 'public/js/qrcode.js', array(
        'jquery','qr-code-styling'
        ) ,QRC_COMPOSER_VERSION, true);

        $options1 = get_option('qrc_composer_settings');

        $qrc_size = isset($options1['qr_code_picture_size_width']) ? $options1['qr_code_picture_size_width'] : 200;

        $quiet = isset($options1['quiet']) ? $options1['quiet'] : '0';
        $ecLevel = isset($options1['ecLevel']) ? $options1['ecLevel'] : 'L';
        $cuttenttitlr = get_the_title();

        $background = (isset($options1['background'])) ? $options1['background'] : 'transparent';
        $qr_color = (isset($options1['qr_color'])) ? $options1['qr_color'] : '#000';
        $qrc_codeshape = isset($options1['qrc_codeshape']) ? $options1['qrc_codeshape'] : 'square'; 
        $qrc_dot_style = isset($options1['qrc_dot_style']) ? $options1['qrc_dot_style'] : 'classy-rounded';

        $qrcomspoer_options = array(
            'size' => $qrc_size,
            'shape' => $qrc_codeshape,
            'color' => $qr_color,
            'background' => $background,
            'dotstyle' => $qrc_dot_style,
        );
        wp_localize_script( 'qrccreateqr', 'datas', $qrcomspoer_options ); 
        add_filter('script_loader_tag', function ($tag, $handle) {

        if (in_array($handle, ['qr-code-styling', 'qrccreateqr'], true)) {
            $tag = str_replace([' defer', ' async'], '', $tag);
            $tag = str_replace(
                '<script ',
                '<script data-no-optimize="1" data-noptimize="1" ',
                $tag
            );
        }

        return $tag;

    }, 999, 2);




    }

    /**
     * This function is display Qr code on frontend.
     */

    public function qcr_code_element($content)
    {
        $options1 = get_option('qrc_autogenerate');

        // "Disable Auto Display" switch.
        if (isset($options1['removeautodisplay'])) {
            return $content;
        }

        if (function_exists('bp_search_is_search') && bp_search_is_search()) {
            return $content;
        }

        // Free version: single pages and posts only. Products use the WooCommerce
        // hooks below, and custom post types are a Pro feature.
        if (!is_singular(array('page', 'post'))) {
            return $content;
        }

        $post_id = get_the_ID();

        // Ignore the_content() calls for other posts (related posts, widgets, ...).
        if (!$post_id || $post_id !== get_queried_object_id()) {
            return $content;
        }

        // Hidden from the meta box / Gutenberg sidebar of this item.
        if (get_post_meta($post_id, 'qrc_metabox', true) == '2') {
            return $content;
        }

        // Free limit: only the picked items.
        if (!QRC_Free_Limit::is_allowed($post_id)) {
            return $content;
        }

        $content .= do_shortcode('[qrc_code_composer]');

        return $content;
    }


    /**
     * This function is Provide for Createing Woocomerce custom product tab for Qr Code
     */

   public function woo_custom_product_tabs($tabs)
    {

        $options1 = get_option('qrc_autogenerate');
        $qrc_wc_ptab_name = isset($options1['qrc_wc_ptab_name']) ? $options1['qrc_wc_ptab_name'] : 'QR Code';

        $tabs['qty_pricing_tab'] = array(
            'title' => $qrc_wc_ptab_name ,
            'priority' => 100,
            'callback' => array(
                $this,
                'woo_qrc_tab_content'
            )
        );

        $qrc_meta_display = get_post_meta(get_the_id() , 'qrc_metabox', true);

        $checked = isset($options1['removeautodisplay']) ? 'checked' : '';

        // Hidden by the person, auto display is off, or not one of the picked products (free limit).
        if ( ( $qrc_meta_display == '2' ) or $checked or ! QRC_Free_Limit::is_allowed( get_the_ID() ) )
        {

            if ( isset($tabs['qty_pricing_tab']) ) {
            unset($tabs['qty_pricing_tab']); // Remove only QR Code tab
        }
        }


    return $tabs;

    }

    public function woo_qrc_tab_content()
    {
        // Same rules for every product QR location (tab, above/below cart, product meta).
        $product_id = get_the_ID();
        if ( ! QRC_Free_Limit::is_allowed( $product_id ) || get_post_meta( $product_id, 'qrc_metabox', true ) == '2' ) {
            return;
        }

       $content = do_shortcode('[qrc_code_composer]');
        return printf('%s', $content);

    }

}

