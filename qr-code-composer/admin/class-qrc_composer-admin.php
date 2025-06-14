<?php
/**
 * The admin-specific functionality of the plugin.
 *
 * @link       https://sharabindu.com
 * @since      3.0.0
 *
 * @package    Qrc_composer
 * @subpackage Qrc_composer/admin
 */

/**
 * The admin-specific functionality of the plugin.
 *
 * Defines the plugin name, version, and two examples hooks for how to
 * enqueue the admin-specific stylesheet and JavaScript.
 *
 * @package    Qrc_composer
 * @subpackage Qrc_composer/admin
 * @author     Sharabindu Bakshi <sharabindu86@gmail.com>
 */
class Qrc_composer_Admin
{



    /**
     * The ID of this plugin.
     *
     * @since    3.0.0
     * @access   private
     * @var      string    $plugin_name    The ID of this plugin.
     */
    private $plugin_name;

    /**
     * The version of this plugin.
     *
     * @since    3.0.0
     * @access   private
     * @var      string    $version    The current version of this plugin.
     */
    private $version;

    /**
     * Initialize the class and set its properties.
     *
     * @since    3.0.0
     * @param      string    $plugin_name       The name of this plugin.
     * @param      string    $version    The version of this plugin.
     */
    public function __construct($plugin_name, $version)
    {

        $this->plugin_name = $plugin_name;
        $this->version = $version;

        require_once plugin_dir_path(dirname(__FILE__)) . 'admin/class_qr_code_print.php';

        require_once plugin_dir_path(dirname(__FILE__)) . 'admin/class_qrc_code_autogenertae.php';

        require_once plugin_dir_path(dirname(__FILE__)) . 'admin/class_qr_code_list_view.php';
        
        require_once plugin_dir_path(dirname(__FILE__)) . 'admin/class-qrc_composer_settings.php';

        require_once plugin_dir_path(dirname(__FILE__)) . 'admin/class_qrc_code_vcard.php';

        require_once plugin_dir_path(dirname(__FILE__)) . 'admin/class-qrc-admin-main.php';
        require_once plugin_dir_path(dirname(__FILE__)) . 'admin/extra/qrrcode_shortcode_func.php';
        require_once plugin_dir_path(dirname(__FILE__)) . 'admin/class_qrc_shortcode.php';
        require_once plugin_dir_path(dirname(__FILE__)) . 'admin/class-qrc-plugin-redirect.php';
        require_once plugin_dir_path(dirname(__FILE__)) . 'admin/class_qrc_code_logo_generator.php';
        require_once plugin_dir_path(dirname(__FILE__)) . 'admin/class_qrc_admin_integration.php';
        
        require_once plugin_dir_path(dirname(__FILE__)) . 'includes/metadata/class-qrc-filed-data.php';
        require_once plugin_dir_path(dirname(__FILE__)) . 'includes/metadata/class_qrc_defaultmeta.php';

        $plugin_name = new QR_code_Print_light();
        $plugin_name = new QR_code_List_View_Light();
        $plugin_name = new QR_code_Admin_settings();
        $plugin_name = new QRCLigt_CustomQr();
        $plugin_name = new QRC_VcardLight();

    }


    /**
     * Register the stylesheets for the admin area.
     *
     * @since    3.0.0
     */
    public function enqueue_styles()
    {

        /**
         * This function is provided for demonstration purposes only.
         *
         * An instance of this class should be passed to the run() function
         * defined in Qrc_composer_Loader as all of the hooks are defined
         * in that particular class.
         *
         * The Qrc_composer_Loader will then create the relationship
         * between the defined hooks and the functions defined in this
         * class.
         */
    $nonce = wp_create_nonce( 'qrc-nonce' );
    if ( ! wp_verify_nonce( $nonce, 'qrc-nonce' ) ) return;

        wp_register_style('qrc-admin-css', QRC_COMPOSER_URL . 'admin/css/qrc_composer-admin.css', array() ,$this->version, 'all');
        wp_enqueue_style('wp-color-picker');

        wp_enqueue_style('qrc-admin-css');
        wp_enqueue_style('datetimepicker', QRC_COMPOSER_URL . 'admin/css/jquery.datetimepicker.css', array() , $this->version, 'all');


    }

    /**
     * Register the JavaScript for the admin area.
     *
     * @since    3.0.0
     */
    public function enqueue_scripts()
    {

    $nonce = wp_create_nonce( 'qrc-nonce' );
    if ( ! wp_verify_nonce( $nonce, 'qrc-nonce' ) ) return;
        

        wp_register_script('qr-code-styling', QRC_COMPOSER_URL . 'admin/js/qr-code-styling.js', array(
            'jquery'
        ) , QRC_COMPOSER_VERSION, true);

    if ( sanitize_title(isset($_GET['page'])) && strpos((sanitize_title(wp_unslash($_GET['page']))), QRC_COMPOSER_PLUGIN_ID) !== false) {


        wp_enqueue_script('qr-code-styling');
        wp_enqueue_script('wp-color-picker');

        wp_enqueue_script('admin-scripts', QRC_COMPOSER_URL . 'admin/js/admin-scripts.js', array(
            'jquery' ,'qr-code-styling'
        ) ,$this->version, true);  
     
        wp_enqueue_script('jquery-datepicker', QRC_COMPOSER_URL . 'admin/js/jquery-datepicker.js', array(
            'jquery'
        ) , $this->version, true); 
        wp_enqueue_script('clipboard');
        wp_enqueue_script('clipbord-script', QRC_COMPOSER_URL . 'admin/js/clipbord-script.js', array(
            'clipboard'
        ) , $this->version, true);

        wp_enqueue_script('video-popup', QRC_COMPOSER_URL . 'admin/js/video.popup.js', array() , $this->version, true); 

        wp_enqueue_script('custom', QRC_COMPOSER_URL . 'admin/js/custom.js', array(
            'jquery','wp-color-picker','jquery-datepicker'
        ) , $this->version, true); 
        }
    if ( sanitize_title(isset($_GET['page'])) && strpos((sanitize_title(wp_unslash($_GET['page'])) ), QRC_COMPOSER_DOWNLOAD_ID) !== false || sanitize_title(isset($_GET['page'])) && strpos((sanitize_title(wp_unslash($_GET['page'])) ), QRC_COMPOSER_PRINT_ID ) !== false || sanitize_title(isset($_GET['page'])) && strpos((sanitize_title(wp_unslash($_GET['page'])) ), QRC_COMPOSER_ORDER_MAIL ) !== false || sanitize_title(isset($_GET['page'])) && strpos((sanitize_title(wp_unslash($_GET['page'])) ), QRC_COMPOSER_SHORTCODE ) !== false || sanitize_title(isset($_GET['page'])) && strpos((sanitize_title(wp_unslash($_GET['page'])) ), QRC_COMPOSER_VCARDLIST ) !== false ) {

        wp_enqueue_script('admin-js', QRC_COMPOSER_URL . 'admin/js/admin.js', array(
            'jquery'
        ) , $this->version, true);
    }


        wp_register_script('qrccreateqr', QRC_COMPOSER_URL . 'public/js/qrcode.js', array(
        'jquery','qr-code-styling'
        ) ,$this->version, true);


        $options1 = get_option('qrc_composer_settings');

        $qrc_size = isset($options1['qr_code_picture_size_width']) ? $options1['qr_code_picture_size_width'] : 200;

        $quiet = isset($options1['quiet']) ? $options1['quiet'] : '0';
        $ecLevel = isset($options1['ecLevel']) ? $options1['ecLevel'] : 'L';
        $cuttenttitlr = get_the_title();

        $background = (isset($options1['background'])) ? $options1['background'] : 'transparent';
        $qr_color = (isset($options1['qr_color'])) ? $options1['qr_color'] : '#000';
        $qrcomspoer_options = array(
            'size' => $qrc_size,
            'color' => $qr_color,
            'background' => $background,
            'quiet' => $quiet,
            'ecLevel' => $ecLevel,
        );
        wp_localize_script( 'qrccreateqr', 'datas', $qrcomspoer_options );   

    }

    /**
     * Setting link.
     *
     * @since    3.0.0
     */

    public function plugin_settings_link($links)
    {

        return array_merge(array(
            '<a href="' . admin_url('admin.php?page=qr_composer') . '">' . __('Settings', 'qr-code-composer') . '</a>',
        ) , $links);

    }


   


    public function adminFooterTextQR(){
    $nonce = wp_create_nonce( 'qrc-nonce' );
    if ( ! wp_verify_nonce( $nonce, 'qrc-nonce' ) ) return;
    if ( sanitize_title(isset($_GET['page'])) && strpos((sanitize_title(wp_unslash($_GET['page']))), QRC_COMPOSER_PLUGIN_ID) !== false) {
      ?>

         <div id="footer_contaciner" role="contentinfo">
                 <p id="qr_plg_id"><?php echo esc_html__('We are sincerely grateful for choosing','qr-code-composer') ?> <strong><?php echo esc_html__('QR Code Composer','qr-code-composer') ?></strong> <span class="dashicons dashicons-smiley"></span>. <?php echo esc_html__('A 5-star review from you on','qr-code-composer') ?> <a href="https://wordpress.org/support/plugin/qr-code-composer/reviews/" target="_blank" rel="noopener noreferrer"><?php echo esc_html__('wordpress.org','qr-code-composer') ?></a> <a class="qrc_composer_dash_strat" href="https://wordpress.org/support/plugin/qr-code-composer/reviews/" target="_blank" rel="noopener noreferrer">(<i class="dashicons dashicons-star-filled"></i><i class="dashicons dashicons-star-filled"></i><i class="dashicons dashicons-star-filled"></i><i class="dashicons dashicons-star-filled"></i><i class="dashicons dashicons-star-filled"></i>)</a>  <?php echo esc_html__('will motivate our efforts','qr-code-composer') ?></p>
    
             <div class="clear"></div>
         </div>
     <?php
     }
     }  
}

