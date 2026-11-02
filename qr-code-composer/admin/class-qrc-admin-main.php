<?php


class QRCAdminMain{


  public function __construct()
  {
    add_action( 'admin_menu', array($this, 'admin_menu_define' ));  

    include_once plugin_dir_path(dirname(__FILE__)) . 'vendor/wordpress-plugin-installer-main/class-connekt-plugin-installer.php';

  }

/**
 * This function is Add Menu page call back function.
 */

public function admin_menu_define()
{

    $icon_url = QRC_COMPOSER_URL . 'admin/img/logo-mini.png';

    add_menu_page(esc_html__('QR Composer', 'qr-code-composer') , esc_html__('QR Composer', 'qr-code-composer') , 'manage_options', 'qr_composer', array(
        $this,
        'qrc_option_func'
    ) , $icon_url,70);



    add_submenu_page('qr_composer', esc_html__('Auto Generate QR Code', 'qr-code-composer'), esc_html__('Auto Generate QR Code', 'qr-code-composer'), 'manage_options', 'admin.php?page=qr_composer#tab2');



    add_submenu_page('qr_composer', esc_html__('Custom QR Code', 'qr-code-composer'), esc_html__('Custom QR Code', 'qr-code-composer'), 'manage_options', 'admin.php?page=qr_composer#tab3');

    add_submenu_page('qr_composer', esc_html__('vCard QR Code', 'qr-code-composer'), esc_html__('vCard QR Code', 'qr-code-composer'), 'manage_options', 'admin.php?page=qr_composer#tab4');

    add_submenu_page('qr_composer', esc_html__('Integration', 'qr-code-composer'), esc_html__('Integration', 'qr-code-composer'), 'manage_options', 'admin.php?page=qr_composer#tab5');

    
    add_submenu_page('qr_composer', esc_html__('Shortcode Generator(PRO)', 'qr-code-composer'), esc_html__('Shortcode Generator(PRO)', 'qr-code-composer'), 'manage_options', 'qrc_shortcode', array(
        $this,
        'qrc_shortcode'
    ));
    
    add_submenu_page('qr_composer', esc_html__('Dynamic QR Code(PRO)', 'qr-code-composer'), esc_html__('Dynamic QR Code(PRO)', 'qr-code-composer'), 'manage_options', 'qrc_dynamic_links', array(
        $this,
        'qrc_dynamicqr'
    ));
    add_submenu_page('qr_composer', esc_html__('Order QR Code (PRO)', 'qr-code-composer'), esc_html__('Order QR Code (PRO)', 'qr-code-composer'), 'manage_options', 'qrc_ordermail', array(
        $this,
        'qrc_ordermail'
    ));
    add_submenu_page('qr_composer', esc_html__('Download Vcard (PRO)', 'qr-code-composer'), esc_html__('Download Vcard (PRO)', 'qr-code-composer'), 'manage_options', 'qrc_vcardlist', array(
        $this,
        'qrc_vcardlist'
    ));


    add_submenu_page('qr_composer', esc_html__('Download QR Code(PRO)', 'qr-code-composer'), esc_html__('Download QR Code(PRO)', 'qr-code-composer'), 'manage_options', 'qrc_list_view', array(
        $this,
        'qrc_list_view'
    ));


    add_submenu_page('qr_composer', esc_html__('Bulk Print(PRO)', 'qr-code-composer'), esc_html__(' Bulk Print (PRO)', 'qr-code-composer'), 'manage_options', 'qrc_print_pdf', array(
        $this,
        'qrc_print_pdf'
    ));

    add_submenu_page('qr_composer', esc_html__('Upgrade to PRO', 'qr-code-composer'), esc_html__('Upgrade to PRO', 'qr-code-composer'), 'manage_options', 'https://sharabindu.com/plugins/wordpress-qr-code-generator/');
}
/**
 * This function is Qr Code Composer Pro Features Field
 */

function qrc_pro_func(){ 


}
   function qrc_shortcode(){ 


          ?>
                <div class="qrcodewrap">
                  <div class="qr_wp_admin">
                      <ul class="qrc_nav_bar">
                          <li><a href="https://qrcode.woocommercebarcode.com/wp-admin/admin.php?page=qrc_shortcode" target="_blank"><?php echo esc_html('Pro Dashbord demo', 'qr-code-composer') ?></a></li>

                          <li><a href="https://wordpressqrcode.com/" target="_blank"><?php echo esc_html('PRO Demo Page', 'qr-code-composer') ?></a></li>
                          <li><a href="https://wordpressqrcode.com/docs/introduction/" target="_blank"><?php echo esc_html('Docs', 'qr-code-composer') ?></a></li>

                          <li><a href="https://sharabindu.com/contact-us/" target="_blank"><?php echo esc_html('Support', 'qr-code-composer') ?></a></li>
                          <li><a href="https://sharabindu.com/plugins/" target="_blank"><?php echo esc_html('More Plugin', 'qr-code-composer') ?></a></li>
                      </ul>
                      <ul  class="qrc_hdaer_cnt">
                          <li> <img src=" <?php echo esc_url( QRC_COMPOSER_URL . '/admin/img/prot.png') ?>" alt="qr logo"></li>

                          <li  class="qrc_fd_cnt"> 
                              <h3><?php echo esc_html('Shortcode Generator', 'qr-code-composer')?> </h3>
                      <small><?php echo esc_html('Create multiple shortcodes for each element. Also can do different QR design, logo change etc', 'qr-code-composer') ?></small></li>
                      </ul>

                  </div>

               <div class="tirmoof">
                       <div class="tirmoof_box">
                                         
                    <div id="tirmoof_djkfh">
    
            <div class="qrc_print_pro_demo"  style="background:url(<?php echo esc_attr( QRC_COMPOSER_URL .'/admin/img/shortcodedemo-min.png') ; ?>);min-height:1767px;width:100%;height:100%"></div>

<div class="bulptinyprowarp">
<div class="bulptinypro">
            <h3><?php esc_html_e('Shortcode Generator (Premium)', 'qr-code-composer'); ?>
</h3>
<p><?php esc_html_e('Create multiple shortcodes for each element. Also can do different QR design, logo change etc', 'qr-code-composer'); ?></p>

<div class="mqrfeatures">

<a href="https://sharabindu.com/plugins/wordpress-qr-code-generator/#pricing" target="_blank" class="mqrlocout"><?php esc_html_e('Upgrade to PRO', 'qr-code-composer'); ?><span class="dashicons dashicons-unlock"></span></a>
<a href="https://qrcode.woocommercebarcode.com/wp-admin/admin.php?page=qrc_shortcode" target="_blank"><?php esc_html_e('Backend Demo for Pro', 'qr-code-composer'); ?></a>
</div>
<div class="mediumbonus-alert"> <img src="<?php echo esc_url( QRC_COMPOSER_URL .'/admin/img/bonus.png') ;?>" alt="bonus"> <span><strong>Bonus:</strong> You can upgrade to the Pro plan today and <strong>save 24% off</strong> </span><!----></div>
        </div>
        </div>
                    
              </div>
            </div>
          </div>
         </div>

         <?php

     }
   function qrc_dynamicqr(){ 


          ?>
    
            <div class="qrc_print_pro_demo"  style="background:url(<?php echo esc_attr( QRC_COMPOSER_URL .'/admin/img/dyna.png') ; ?>);min-height:574px;width:100%;height:100%"></div>
<div class="bulptinyprowarp">
<div class="bulptinypro">
            <h3><?php esc_html_e('Dynamic QR Code Generator (Premium)', 'qr-code-composer'); ?>
</h3>
<p><?php esc_html_e('Unlimited Dynamic QR Codes with Full Customization, Scan Limits, Analytics, Fallback Redirects, and Seamless Gutenberg Support.', 'qr-code-composer'); ?></p>

<div class="mqrfeatures">

<a href="https://sharabindu.com/plugins/wordpress-qr-code-generator/#pricing" target="_blank" class="mqrlocout"><?php esc_html_e('Upgrade to PRO', 'qr-code-composer'); ?><span class="dashicons dashicons-unlock"></span></a>
<a href="https://qrcode.woocommercebarcode.com/wp-admin/admin.php?page=qrc_dynamic_links" target="_blank"><?php esc_html_e('Backend Demo for Pro', 'qr-code-composer'); ?></a>
</div>
<div class="mediumbonus-alert"> <img src="<?php echo esc_url( QRC_COMPOSER_URL .'/admin/img/bonus.png') ;?>" alt="bonus"> <span><strong>Bonus:</strong> You can upgrade to the Pro plan today and <strong>save 24% off</strong> </span><!----></div>
        </div>
        </div>

                    


         <?php

     }
   function qrc_ordermail(){ 


          ?>
                <div class="qrcodewrap">
                  <div class="qr_wp_admin">
                      <ul class="qrc_nav_bar">
                          <li><a href="https://qrcode.woocommercebarcode.com/wp-admin/admin.php?page=qrc_ordermail" target="_blank"><?php echo esc_html('Pro Dashbord demo', 'qr-code-composer') ?></a></li>
                         <li><a href="https://wordpressqrcode.com/" target="_blank"><?php echo esc_html('PRO Demo Page', 'qr-code-composer') ?></a></li>
                          <li><a href="https://wordpressqrcode.com/docs/introduction/" target="_blank"><?php echo esc_html('Docs', 'qr-code-composer') ?></a></li>

                          <li><a href="https://sharabindu.com/contact-us/" target="_blank"><?php echo esc_html('Support', 'qr-code-composer') ?></a></li>
                          <li><a href="https://sharabindu.com/plugins/" target="_blank"><?php echo esc_html('More Plugin', 'qr-code-composer') ?></a></li>
                      </ul>
                      <ul  class="qrc_hdaer_cnt">
                          <li> <img src=" <?php echo esc_url(QRC_COMPOSER_URL . '/admin/img/prot.png') ?>" alt="qr logo"></li>

                          <li  class="qrc_fd_cnt"> 
                              <h3><?php echo esc_html('Order QR code (Premium)', 'qr-code-composer')?> </h3>
                      <small><?php echo esc_html('The order QR code is displayed on the order dashboard and it will print in the order email', 'qr-code-composer') ?></small></li>
                      </ul>

                  </div>

               <div class="tirmoof">
                       <div class="tirmoof_menu" id="qrccomposerprowraper">
  <div class="qrc-tab-nav">
    <ul>
      <li class="active"><a href="#tab1"><?php echo esc_html__('Order QR code', 'qr-code-composer') ?></a></li>
      <li class=""><a href="#tab2"><?php echo esc_html__('QR Code on Invoice', 'qr-code-composer') ?></a></li>
    </ul> <!-- END tabs-nav -->
  </div>


<div class="qrctab-content">
  
  <div class="qrctab1-tab active">
    <div class="bulptiblur">
    <img src="<?php echo esc_url( QRC_COMPOSER_URL .'/admin/img/orderpage-min.png') ; ?>" alt="order QR demo" class="qrcpreiumversion">
    </div>
<div class="bulptinyprowarp">
<div class="bulptinypro">
            <h3>WooCommerce Order QR Code</h3>
<p>The QR code is included in the order email. order QR code a unique Benefit in management of sales process. Order QR Code can be created from  Order ID, Transaction ID, Billing Address, Order Amount, Order Date, Shipping Cost, and more.</p>

<div class="mqrfeatures">

<a href="https://sharabindu.com/plugins/wordpress-qr-code-generator/#pricing" target="_blank" class="mqrlocout">Upgrade to PRO<span class="dashicons dashicons-unlock"></span></a>
<a href="https://qrcode.woocommercebarcode.com/wp-admin/admin.php?page=qrc_ordermail" target="_blank">Backend Demo for Pro</a>
</div>
<div class="mediumbonus-alert"> <img src="<?php echo esc_url( QRC_COMPOSER_URL .'/admin/img/bonus.png') ;?>" alt="bonus"> <span><strong>Bonus:</strong> You can upgrade to the Pro plan today and <strong>save 24% off</strong> </span><!----></div>
        </div>
        </div>
</div>
  <div class="tab2-tab">
    <img src="<?php echo esc_url( QRC_COMPOSER_URL .'/admin/img/rderpage-min.png') ; ?>" alt="order QR demoo"  class="qrcpreiumversion">
  </div>

         </div>
</div>
</div>
</div>


         <?php

     }
   function qrc_vcardlist(){ 


          ?>
                <div class="qrcodewrap">
                  <div class="qr_wp_admin">
                      <ul class="qrc_nav_bar">
                          <li><a href="https://qrcode.woocommercebarcode.com/wp-admin/admin.php?page=qrc_vcardlist&tab=vcardsettings" target="_blank"><?php echo esc_html('Pro Dashbord demo', 'qr-code-composer') ?></a></li>

                          <li><a href="https://sharabindu.com/plugins/wordpress-qr-code-generator/" target="_blank"><?php echo esc_html('Upgrade to PRO', 'qr-code-composer') ?></a></li>
                          <li><a href="https://wordpressqrcode.com/docs/introduction/" target="_blank"><?php echo esc_html('Docs', 'qr-code-composer') ?></a></li>

                          <li><a href="https://sharabindu.com/contact-us/" target="_blank"><?php echo esc_html('Support', 'qr-code-composer') ?></a></li>
                          <li><a href="https://sharabindu.com/plugins/" target="_blank"><?php echo esc_html('More Plugin', 'qr-code-composer') ?></a></li>
                      </ul>
                      <ul  class="qrc_hdaer_cnt">
                          <li> <img src=" <?php echo esc_url(QRC_COMPOSER_URL . '/admin/img/prot.png') ?>" alt="qr logo"></li>

                          <li  class="qrc_fd_cnt"> 
                              <h3><?php echo esc_html('Download All vCard QR code from one page', 'qr-code-composer')?> </h3>
                      <small><?php echo esc_html('Download all Post type vCard QR Code Images from One Page', 'qr-code-composer') ?></small></li>
                      </ul>

                  </div>

               <div class="tirmoof">
                       <div class="tirmoof_box">
                                         
                    <div id="tirmoof_djkfh">
    
            <div class="qrc_print_pro_demo"  style="background:url(<?php echo esc_url( QRC_COMPOSER_URL .'/admin/img/vcardlist-min.PNG') ; ?>);min-height:600px;width:100%;height:100%"></div>

<div class="bulptinyprowarp">
<div class="bulptinypro">
            <h3>Download vCard QR Code is a PRO Feature</h3>
<p>The plugin allows the download of all  Post type vCard QR Code Images from One Page</p>

<div class="mqrfeatures">

<a href="https://sharabindu.com/plugins/wordpress-qr-code-generator/#pricing" target="_blank" class="mqrlocout">Upgrade to PRO <span class="dashicons dashicons-unlock"></span></a>
<a href="https://qrcode.woocommercebarcode.com/wp-admin/admin.php?page=qrc_vcardlist&tab=vcardlist" target="_blank">Backend Demo for Pro</a>
</div>
<div class="mediumbonus-alert"><img src="<?php echo esc_url( QRC_COMPOSER_URL .'/admin/img/bonus.png') ;?>" alt="bonus"> <span><strong>Bonus:</strong> You can upgrade to the Pro plan today and <strong>save 24% off</strong> </span><!----></div>
        </div>
        </div>
                    
              </div>
            </div>
          </div>
         </div>

         <?php

     }
    function qrc_list_view(){ 

          ?>
        <div class="qrcodewrap">
                  <div class="qr_wp_admin">
                      <ul class="qrc_nav_bar">
                          <li><a href="https://wordpressqrcode.com/qr-code-download/" target="_blank"><?php echo esc_html('Live demo', 'qr-code-composer') ?></a></li>

                          <li><a href="https://sharabindu.com/plugins/wordpress-qr-code-generator/" target="_blank"><?php echo esc_html('Upgrade to PRO', 'qr-code-composer') ?></a></li>
                          <li><a href="https://wordpressqrcode.com/docs/introduction/" target="_blank"><?php echo esc_html('Docs', 'qr-code-composer') ?></a></li>

                          <li><a href="https://sharabindu.com/contact-us/" target="_blank"><?php echo esc_html('Support', 'qr-code-composer') ?></a></li>
                          <li><a href="https://sharabindu.com/plugins/" target="_blank"><?php echo esc_html('More Plugin', 'qr-code-composer') ?></a></li>
                      </ul>
                      <ul  class="qrc_hdaer_cnt">
                          <li> <img src=" <?php echo esc_url(QRC_COMPOSER_URL . '/admin/img/prot.png') ?>" alt="qr logo"></li>

                          <li  class="qrc_fd_cnt"> 
                              <h3><?php echo esc_html('Download QR code from one page', 'qr-code-composer')?> </h3>
                      <small><?php echo esc_html('Download all Post type QR Codes from One Page', 'qr-code-composer') ?></small></li>
                      </ul>

                  </div>

               <div class="tirmoof">
                       <div class="tirmoof_menu" id="qrccomposerprowraper">
  <div class="qrc-tab-nav">
    <ul>
      <li class="active"><a href="#tab1"><?php echo esc_html__('Settings', 'qr-code-composer') ?></a></li>
      <li class=""><a href="#tab2"><?php echo esc_html__('Download Page', 'qr-code-composer') ?></a></li>
    </ul> <!-- END tabs-nav -->
  </div>

<div class="qrctab-content">
  
  <div class="qrctab1-tab active">
    <div class='qrcprosd'>
    <?php 
                 settings_fields("qrc_list_view_option");

                 do_settings_sections('qrc_list_setting');

     ?>
<div class="bulptinyprowarp">
<div class="bulptinypro">
            <h3>Download all QR Code is a PRO Feature</h3>
<p>The plugin allows the download of all QR codes based on Post type . and it is from one page.</p>

<div class="mqrfeatures">

<a href="https://sharabindu.com/plugins/wordpress-qr-code-generator/#pricing" target="_blank" class="mqrlocout">Upgrade to PRO <span class="dashicons dashicons-unlock"></span></a>
<a href="https://qrcode.woocommercebarcode.com/wp-admin/admin.php?page=qrc_list_view" target="_blank">Backend Demo for Pro</a>
</div>
<div class="mediumbonus-alert"> <img src="<?php echo esc_url( QRC_COMPOSER_URL .'/admin/img/bonus.png') ;?>" alt="bonus"><span><strong>Bonus:</strong> You can upgrade to the Pro plan today and <strong>save 24% off</strong> </span><!----></div>
        </div>
        </div>
        </div>
  </div> 

    <div class="tab2-tab">
            <div class="qrc_print_pro_demo"  style="background:url(<?php echo esc_url( QRC_COMPOSER_URL .'/admin/img/download.PNG') ; ?>);min-height:596px;width:100%;height:100%"></div>
<div class="bulptinyprowarp">
<div class="bulptinypro">
            <h3>Download all QR Code is a PRO Feature</h3>
<p>The plugin allows the download of all QR codes based on Post type . and it is from one page.</p>

<div class="mqrfeatures">

<a href="https://sharabindu.com/plugins/wordpress-qr-code-generator/#pricing" target="_blank" class="mqrlocout">Upgrade to PRO <span class="dashicons dashicons-unlock"></span></a>
<a href="https://qrcode.woocommercebarcode.com/wp-admin/admin.php?page=qrc_list_view&tab=qrc_list_page" target="_blank">Backend Demo for Pro</a>
</div>
<div class="mediumbonus-alert"> <img src="<?php echo esc_url( QRC_COMPOSER_URL .'/admin/img/bonus.png') ;?>" alt="bonus"><span><strong>Bonus:</strong> You can upgrade to the Pro plan today and <strong>save 24% off</strong> </span><!----></div>
        </div>
        </div>


    </div>
</div>




                       </div>
          </div>
         </div>

         <?php

     }


function qrc_print_pdf()
{ 
     ?>
                <div class="qrcodewrap">
                  <div class="qr_wp_admin">
                      <ul class="qrc_nav_bar">
                          <li><a href="https://wordpressqrcode.com/qr-code-print-demo/" target="_blank"><?php echo esc_html('Bulk Print demo', 'qr-code-composer') ?></a></li>
                          <li><a href="https://sharabindu.com/plugins/wordpress-qr-code-generator/" target="_blank"><?php echo esc_html('Upgrade to PRO', 'qr-code-composer') ?></a></li>
                          <li><a href="https://wordpressqrcode.com/docs/introduction/" target="_blank"><?php echo esc_html('Docs', 'qr-code-composer') ?></a></li>

                          <li><a href="https://sharabindu.com/contact-us/" target="_blank"><?php echo esc_html('Support', 'qr-code-composer') ?></a></li>
                          <li><a href="https://sharabindu.com/plugins/" target="_blank"><?php echo esc_html('More Plugin', 'qr-code-composer') ?></a></li>
                      </ul>
                      <ul  class="qrc_hdaer_cnt">
                          <li> <img src=" <?php echo esc_url(QRC_COMPOSER_URL . '/admin/img/prot.png') ?>" alt="qr logo"></li>

                              <li  class="qrc_fd_cnt"> 
                                  <h3><?php echo esc_html('QR Code Bulk Print(Pro)', 'qr-code-composer');?> </h3>
                          <small><?php echo esc_html('Print QR Code In Bulk Qty based on Post type', 'qr-code-composer') ?></small></li>
                      </ul>

                  </div>

               <div class="tirmoof">
                       <div class="tirmoof_menu" id="qrccomposerprowraper">
  <div class="qrc-tab-nav">
    <ul>
      <li class="active"><a href="#tab1"><?php echo esc_html__('Settings', 'qr-code-composer') ?></a></li>
      <li class=""><a href="#tab2"><?php echo esc_html__('Print Page', 'qr-code-composer') ?></a></li>
    </ul> <!-- END tabs-nav -->
  </div>


<div class="qrctab-content">
  
  <div class="qrctab1-tab active">

<div class='qrcprosd'>
                    <?php
                               settings_fields("qrc_print_option");

                 do_settings_sections('qrc_print_setting')
?>
</div><div class="bulptinyprowarp">
<div class="bulptinypro">
            <h3>Bulk print is a PRO Feature</h3>
<p>Bulk QR codes can be printed from the plugin’s dashboard or from the front end via built-in shortcodes. You can use filter by category. This will printout as a PDF</p>

<div class="mqrfeatures">

<a href="https://sharabindu.com/plugins/wordpress-qr-code-generator/#pricing" target="_blank" class="mqrlocout">Upgrade to PRO</a>
<a href="https://qrcode.woocommercebarcode.com/wp-admin/admin.php?page=qrc_print_pdf" target="_blank"> Live demo of Bulk Print QR code</a>
</div>
<div class="mediumbonus-alert"><img src="<?php echo esc_url( QRC_COMPOSER_URL .'/admin/img/bonus.png') ;?>" alt="bonus"><span><strong>Bonus:</strong> You can upgrade to the Pro plan today and <strong>save 24% off</strong> </span><!----></div>
        </div>
        </div>
      </div>
  <div class="tab2-tab">

        <div class="qrc_print_pro_demo"  style="background:url(<?php echo esc_url( QRC_COMPOSER_URL .'/admin/img/printpage-min.png') ; ?>);min-height: 675px;width:100%"></div> 

<div class="bulptinyprowarp">
<div class="bulptinypro">
            <h3>Bulk print is a PRO Feature</h3>
<p>Bulk QR codes can be printed from the plugin’s dashboard or from the front end via built-in shortcodes. You can use filter by category. This will printout as a PDF</p>

<div class="mqrfeatures">

<a href="https://sharabindu.com/plugins/wordpress-qr-code-generator/#pricing" target="_blank" class="mqrlocout">Upgrade to PRO</a>
<a href="https://qrcode.woocommercebarcode.com/wp-admin/admin.php?page=qrc_print_pdf&tab=qrc_print_page" target="_blank"> Live demo of Bulk Print QR code</a>
</div>
<div class="mediumbonus-alert"><img src="<?php echo esc_url( QRC_COMPOSER_URL .'/admin/img/bonus.png') ;?>" alt="bonus"><span><strong>Bonus:</strong> You can upgrade to the Pro plan today and <strong>save 24% off</strong> </span><!----></div>
        </div>
        </div>
</div>


                        
              </div>
            </div>
          </div>
         </div>

         <?php
          }


     public function qrc_option_func()
     {
         $options1 = get_option('qrc_composer_settings');
    $qr_download_text = isset($options1['qr_download_text']) ? $options1['qr_download_text'] : 'Download QR';
    $valuebg = (isset($options1['qr_dwnbtnbg_color'])) ? $options1['qr_dwnbtnbg_color'] : '#dddddd';
    $value = (isset($options1['qr_dwnbtn_color'])) ? $options1['qr_dwnbtn_color'] : '#000';
    $qrcpopuptext = isset($options1['qrcpopuptext']) ? $options1['qrcpopuptext'] : 'View To Click';
    $qrcpopup_bg = (isset($options1['qrcpopup_bg'])) ? $options1['qrcpopup_bg'] : '#dddddd';
    $qrcpopup_color = (isset($options1['qrcpopup_color'])) ? $options1['qrcpopup_color'] : '#000';
    $qrcpopup_brclr = (isset($options1['qrcpopup_brclr'])) ? $options1['qrcpopup_brclr'] : '#32a518';
    $qrcpopup_brdius = (isset($options1['qrcpopup_brdius'])) ? $options1['qrcpopup_brdius'] : '20';
    $qrcpopup_fntsize = isset($options1['qrcpopup_fntsize']) ? $options1['qrcpopup_fntsize'] : '12';

        $qr_download_fntsz = isset($options1['qr_download_fntsz']) ? $options1['qr_download_fntsz'] : '12';
        $qr_download_brclr = isset($options1['qr_download_brclr']) ? $options1['qr_download_brclr'] : '#dddddd';
        $qrc_dwnbtn_brdius = isset($options1['qrc_dwnbtn_brdius']) ? $options1['qrc_dwnbtn_brdius'] : '4';



        ?>
         <div class="qrcodewrap">
<div class="qr_wp_admin">
    <ul class="qrc_nav_bar">
        <li>
            <a href="https://wordpressqrcode.com/" target="_blank">
                <span class="dashicons dashicons-external"></span>
                <?php echo esc_html__('PRO Demo Page', 'qr-code-composer'); ?>
            </a>
        </li>
        <li>
            <a href="https://qrcode.woocommercebarcode.com/wp-admin/admin.php?page=qr_composer">
                <span class="dashicons dashicons-dashboard"></span>
                <?php echo esc_html__('PRO Dashboard', 'qr-code-composer'); ?>
            </a>
        </li>
        <li>
            <a href="https://wordpressqrcode.com/docs/introduction/">
                <span class="dashicons dashicons-book"></span>
                <?php echo esc_html__('Documentation', 'qr-code-composer'); ?>
            </a>
        </li>
        <li>
            <a href="https://wordpress.org/support/plugin/qr-code-composer/">
                <span class="dashicons dashicons-sos"></span>
                <?php echo esc_html__('Support', 'qr-code-composer'); ?>
            </a>
        </li>
    </ul>

    <ul class="qrc_hdaer_cnt">
        <li><img src="<?php echo esc_url(QRC_COMPOSER_URL . '/admin/img/prot.png'); ?>" alt="qr logo"></li>

        <li class="qrc_fd_cnt"> 
            <h3>
                <?php echo esc_html__('QR Code Composer', 'qr-code-composer'); ?> 
                <sup><?php echo esc_html(QRC_COMPOSER_VERSION); ?></sup>
            </h3>
            <small><?php echo esc_html__('Next-Gen QR Code Builder for WordPress Block Editor & WooCommerce.', 'qr-code-composer'); ?></small>
        </li>
        <li>
          <div class="pvgw-header-right" style="text-align: right; border-left: 1px solid #f1f5f9; padding-left: 24px; display: flex; flex-direction: column; align-items: flex-end;">
    <span style="font-size: 10px; text-transform: uppercase; color: #94a3b8; font-weight: 700; letter-spacing: 0.5px; margin-bottom: 6px;">POWERED BY</span>
    
    <a href="https://sharabindu.com" target="_blank" style="text-decoration: none; font-size: 16px; font-weight: 800; color: #0f172a; display: flex; align-items: center; gap: 6px;">
        <!-- Sharabindu Icon -->
        <img src="<?php echo esc_url( QRC_COMPOSER_URL . 'admin/img/sharabindu-icon.png' ); ?>" alt="Sharabindu" style="height: 24px; width: auto;"> <span>↗</span>
    </a>
</div>

        </li>
    </ul>
</div>
    <div class="qrcodewrap" id="qrccomposerprowraper">
<div class="qrc-tab-nav">
  <ul>
    <li class="active"><a href="#tab1"><?php echo esc_html("Design QR code", "qr-code-composer") ?></a></li>
    <li><a href="#tab2"><?php echo esc_html("Auto Generate QR Code", "qr-code-composer") ?></a></li>
    <li><a href="#tab3"><?php echo esc_html("Various Components QR", "qr-code-composer") ?></a></li>
    <li><a href="#tab4"><?php echo esc_html("vCard QR Code", "qr-code-composer") ?></a></li>
    <li><a href="#tab5"><?php echo esc_html("Integration", "qr-code-composer") ?></a></li>

    <li> <a href="#tab7"> <?php echo esc_html("Why Upgrade to Pro", "qr-code-composer") ?> </a></li>

  </ul> <!-- END tabs-nav -->
</div>

    <div id="qrc-pro-modal" class="qrc-modal-overlay">
    <div class="qrc-modal-content">
        <button class="qrc-modal-close" id="qrc-modal-close-btn">&times;</button>
        <div class="qrc-modal-icon">⭐</div>
        <h3 id="qrc-modal-title">Upgrade to Pro</h3>
        <p id="qrc-modal-message">Unlock premium features.</p>
        <a href="https://sharabindu.com/plugins/wordpress-qr-code-generator/#pricing" class="qrc-modal-btn">Upgrade Now</a>
    </div>
</div>
<!-- Loader Element -->
<div class="qrc_tab_loader">
    <div class="qrc_spinner"></div>
</div>
  <div class="qrctab-content">

    <div  class="qrctab1-tab active">

            <div class="qrc-desingwrapper">

            <div class="qrc-leftside-off">

    <ul class="qrcprofixnabev">
<li class="qrcpro_nav2"  data-tab="dot-shape"><span class="gg-shape-square"></span> <?php echo esc_html('Dot Shape'); ?></li>

<li class="qrcpro_nav1"  data-tab="qr-code-shape"><span class="gg-shape-hexagon"></span> <?php echo esc_html('QR Code Shape'); ?></li>

<li class="qrcpro_nav5"  data-tab="size-background"><span class="gg-size"></span> <?php echo esc_html('Size & Background'); ?></li>

<li class="qrcpro_nav7"  data-tab="download-button"><span class="gg-software-download"></span> <?php echo esc_html('Download Button'); ?></li>

<li class="qrcpro_nav8"  data-tab="miscellaneous"><span class="gg-atlasian"></span> <?php echo esc_html('Miscellaneous'); ?></li>
<li class="qrcpro_nav3"  data-tab="eye-frame-shape"><span class="gg-eye Frame"></span> <?php echo esc_html('Eye Frame Shape'); ?><span class="qrcprofetdisb">PRO</span></li>

<li class="qrcpro_nav4"  data-tab="eye-ball-shape"><span class="gg-eye eyeball"></span> <?php echo esc_html('Eye Ball Shape'); ?><span class="qrcprofetdisb">PRO</span></li>
<li class="qrcpro_nav6"  data-tab="logo"><span class="gg-image"></span> <?php echo esc_html('Logo'); ?><span class="qrcprofetdisb">PRO</span></li>
<li class="qrcpro_nav9"  data-tab="preset"><span class="gg-qr"></span> <?php echo esc_html('Preset'); ?> <span class="qrcprofetdisb">PRO</span></li>
    </ul>
 </div>
            <div class="qrc-leftside">
            <form method="post" action="options.php" class="qrcdesings">
            <?php
            settings_errors();           
            settings_fields("qrc_composer_settings");
             do_settings_sections('qrc_design_sec'); ?>
             <div class="qrcsubmits">
             <button type ="submit" id="qrc-osiudi" class="button button-primary"><?php echo esc_html('Save Changes','qr-code-composer') ?> <span class="qrcs_desingcrt"></span></button>
         <span class="qrcsdhicr_dsigns"></span>
         </div>
       </form>
         </div>
         <div class="qrc-rightside">
          <div class="qrc-rightsidesticky">
           <div class="qrc-prbloth"><?php echo esc_html('Live Preview','qr-code-composer') ?></div>
         <div class="qrc_prev_manage">
         
            <div id="qrccomsposerprviewss" class="qrc_canvas"></div> 
        <div>
       <a class="qrdemodownload">
           <button type="button" style="color:<?php echo esc_attr($value);?>;background:<?php echo esc_attr($valuebg);?>;font-weight: 600;border: 1px solid <?php echo esc_attr($qr_download_brclr)?>;padding: 6px 0;margin-top: 5px;border-radius:<?php echo esc_attr($qrc_dwnbtn_brdius);?>px; font-size:<?php echo esc_attr($qr_download_fntsz);?>px;" id="result"><?php echo esc_html($qr_download_text); ?></button>
           </a>
      </div>
        </div>    
         <div class="qrc_popup_preview">

<div class="qrcpromodalwrapper">
<?php  
  echo '<button type="button" class="qrc-modal-toggle" id="popModal_ex2" style="background:'.esc_attr($qrcpopup_bg).';color:'. esc_attr($qrcpopup_color).';border: 1px solid '.esc_attr($qrcpopup_brclr).';border-radius:'.esc_attr($qrcpopup_brdius).'px;padding: 6px 14px;font-size:'.esc_attr($qrcpopup_fntsize).'px">'.esc_html($qrcpopuptext).'</button>';
?>
  <div class="qrc_modal">
    <div class="qrc-overlay qrc-modal-toggle"></div>
    <div class="qrc-modal-wrapper qrc-modal-transition">
                <span class="qrc-modal-toggle">&times;</span>
<div id="qrccomsposerprview"></div> 

       <a class="qrdemodownload">
           <button type="button" style="color:<?php echo esc_attr($value);?>;background:<?php echo esc_attr($valuebg);?>;font-weight: 600;border: 1px solid <?php echo esc_attr($qr_download_brclr)?>;padding: 6px 0;margin-top: 5px;border-radius:<?php echo esc_attr($qrc_dwnbtn_brdius);?>px; font-size:<?php echo esc_attr($qr_download_fntsz);?>px;" id="result"><?php echo esc_html($qr_download_text); ?></button>
           </a>

        </div>
      </div>
</div>


         </div>
<div class="qrc-gutenberg-badge">
    <span class="qrc-badge-dot"></span>
    <span class="qrc-badge-text"><strong>New:</strong> Gutenberg Block Supported!</span>
</div>

<iframe width="100%" height="250" src="https://www.youtube.com/embed/mJx9vUU7930?si=fna4PDeIq0oC14b2" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" referrerpolicy="strict-origin-when-cross-origin" allowfullscreen></iframe>


        </div> 

      </div>

         </div>
    </div>
    <div  class="tab2-tab">
        <div id="qrc-dynamic-qr">
    <div class="qrc_wrap-md-7">
      <form method="post" action="options.php"  class="qrcdesings" > 
        <?php 


            settings_fields("qrc_autogenerate");
             do_settings_sections('qrc_admin_sec'); ?>

             <div class="qrcsubmits">
             <button type ="submit" id="qrc-osiudi" class="button button-primary"><?php echo esc_html('Save Changes','qr-code-composer') ?> <span class="qrcs_desingcrt"></span></button>
         <span class="qrcsdhicr_dsigns"></span>
        </div>



             
           </form>
         </div>
        <div class="qrc_wrap-md-5 lksfuieusb">
         

<?php
/**
 * Sidebar "Upgrade to Pro" cards - QR Code Composer (free).
 * Replaces the 4 old templates (the duplicate Order QR card is removed).
 */
if ( ! defined( 'ABSPATH' ) ) {
  exit;
}

$qrc_pricing_url = 'https://sharabindu.com/plugins/wordpress-qr-code-generator/#pricing';

// Link to the new "Why upgrade to Pro" tab. Change the page slug to match your settings page.
$qrc_why_url = admin_url( 'admin.php?page=qr-code-composer#why-pro' );
?>

<!-- Card 1: Dynamic QR + analytics (the main reason to upgrade) -->
<div class="qrc_pro_ftcs_cont">
  <h4 class="pro_ftcs_qrch"><?php esc_html_e( 'Upgrade to Pro', 'qr-code-composer' ); ?></h4>
  <p><em><?php esc_html_e( 'Free creates QR codes. Pro lets you change, schedule and measure them.', 'qr-code-composer' ); ?></em></p>

  <h3 class="orderqrpro"><?php esc_html_e( 'Dynamic QR codes with scan analytics', 'qr-code-composer' ); ?></h3>
  <iframe width="100%" height="250" src="https://www.youtube.com/embed/-psUDqpnBlk?si=EyGOD8UQOoQ5zs6U" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" referrerpolicy="strict-origin-when-cross-origin" allowfullscreen></iframe>
  <p><?php esc_html_e( 'Change where a printed QR code points without reprinting it, and see how many people scan it.', 'qr-code-composer' ); ?></p>
  <ul class="qrc_pro_points">
    <li><?php esc_html_e( 'Editable short links', 'qr-code-composer' ); ?></li>
    <li><?php esc_html_e( 'Start and expiry dates, and a maximum scan limit', 'qr-code-composer' ); ?></li>
    <li><?php esc_html_e( 'Fallback pages for invalid, inactive, expired and limit-reached links', 'qr-code-composer' ); ?></li>
    <li><?php esc_html_e( 'Scans by day, device, city, country and referrer', 'qr-code-composer' ); ?></li>
    <li><?php esc_html_e( 'Native Gutenberg block', 'qr-code-composer' ); ?></li>
  </ul>

  <a class="qrc_gtnow" href="<?php echo esc_url( $qrc_pricing_url ); ?>"><?php esc_html_e( 'Unlock PRO →', 'qr-code-composer' ); ?></a>
</div>

<!-- Card 2: Design -->
<div class="qrc_pro_ftcs_cont">
  <h4 class="pro_ftcs_qrch"><?php esc_html_e( 'Upgrade to Pro', 'qr-code-composer' ); ?></h4>

  <h3 class="orderqrpro"><?php esc_html_e( 'QR codes that match your brand', 'qr-code-composer' ); ?></h3>
  <p><?php esc_html_e( 'Pick the shape, colors and label so every QR code looks like it belongs on your site.', 'qr-code-composer' ); ?></p>

  <iframe width="100%" height="250" src="https://www.youtube.com/embed/nkqmE_jWycI?si=xaM9SXeSjkgSRZNh" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" referrerpolicy="strict-origin-when-cross-origin" allowfullscreen></iframe>

  <ul class="qrc_pro_points">
    <li><?php esc_html_e( 'Circular, dotted, square and framed shapes', 'qr-code-composer' ); ?></li>
    <li><?php esc_html_e( 'Custom colors and borders', 'qr-code-composer' ); ?></li>
    <li><?php esc_html_e( 'Label text and logo inside the QR code', 'qr-code-composer' ); ?></li>
    <li><?php esc_html_e( 'Download as PNG, SVG or PDF', 'qr-code-composer' ); ?></li>
  </ul>

  <a class="qrc_gtnow" href="<?php echo esc_url( $qrc_pricing_url ); ?>"><?php esc_html_e( 'Unlock PRO →', 'qr-code-composer' ); ?></a>
</div>


         </div> 
        </div>
    </div>

    <div  class="tab3-tab">
    <div id="qrc-dynamic-qr">
          <div class="qrc_wrap-md-7">
        <form method="post" action="options.php" class="qrcdesings" id="qrcdesings">
         <?php  

            settings_fields("qrc_custom_link_generator");
             do_settings_sections('qrc_logo_admin_sec');
         ?> 
             <div class="qrcsubmits">
             <button type ="submit" id="qrc-osiudi" class="button button-primary"><?php echo esc_html('Save Changes','qr-code-composer') ?> <span class="qrcs_desingcrt"></span></button>
         <span class="qrcsdhicr_dsigns"></span>
        </div>
      </form>  

  </div> 
        <div class="qrc_wrap-md-5 lksfuieusb">
<div class="qrc_pro_ftcs_cont">
  <h4 class="pro_ftcs_qrch"><?php esc_html_e( 'Upgrade to Pro', 'qr-code-composer' ); ?></h4>

  <h3 class="orderqrpro"><?php esc_html_e( 'Order QR code', 'qr-code-composer' ); ?></h3>
  <p><?php esc_html_e( 'A QR code for every new and existing WooCommerce order, shown in the order dashboard and the order email.', 'qr-code-composer' ); ?></p>
  <img src="<?php echo esc_url( QRC_COMPOSER_URL . '/admin/img/order-qr-code.png' ); ?>" alt="<?php esc_attr_e( 'Order QR code in a WooCommerce order email', 'qr-code-composer' ); ?>">

  <h3 class="orderqrpro"><?php esc_html_e( 'Invoice QR code', 'qr-code-composer' ); ?></h3>
  <p><?php esc_html_e( 'Add a QR code to PDF invoices. Works with PDF Invoices & Packing Slips, Print Invoice & Delivery Notes and WebToffee PDF Invoices.', 'qr-code-composer' ); ?></p>
  <img src="<?php echo esc_url( QRC_COMPOSER_URL . '/admin/img/pdf-min.png' ); ?>" alt="<?php esc_attr_e( 'QR code on a PDF invoice', 'qr-code-composer' ); ?>">

  <a class="qrc_gtnow" href="<?php echo esc_url( $qrc_pricing_url ); ?>"><?php esc_html_e( 'Unlock PRO →', 'qr-code-composer' ); ?></a>
</div>


        </div>  
        </div> 
    </div>
    <div  class="tab4-tab">
        <div id="qrc-dynamic-qr">
        <div class="qrc_wrap-md-7">            
        <div>
        <form method="post" action="options.php" class="qrcpro_vacradsubmits" >              

         <?php  

             settings_fields("qrc_vcard_generator");
             do_settings_sections('qrc_vacrd_admin_sec');
         ?>                <div class="qrcsubmits">
           <button type ="submit" id="qrc-osiudi" class="button button-primary"><?php echo esc_html('Save Changes','qr-code-composer') ?> <span class="qrcvcard_sdhi"></span></button>
           <span class="qrcvcard_djkfhjhj"></span>    </div>
         </form>
         </div>
        
    </div>
<div class="qrc_wrap-md-5 lksfuieusb">
             <div>
<div class="qrc_pro_ftcs_cont">
  <h4 class="pro_ftcs_qrch"><?php esc_html_e( 'Upgrade to Pro', 'qr-code-composer' ); ?></h4>

  <h3 class="orderqrpro"><?php esc_html_e( 'Bulk vCard QR code generator', 'qr-code-composer' ); ?></h3>
  <p><?php esc_html_e( 'Create vCard QR codes for your whole team or customer list at once, instead of one by one.', 'qr-code-composer' ); ?></p>
  <img class="varcdemos" src="<?php echo esc_url( QRC_COMPOSER_URL . '/admin/img/vcarddemo-min.png' ); ?>" alt="<?php esc_attr_e( 'Bulk vCard QR code generator', 'qr-code-composer' ); ?>">

  <h3 class="orderqrpro"><?php esc_html_e( 'Download vCard QR code images', 'qr-code-composer' ); ?></h3>
  <p><?php esc_html_e( 'Download every vCard QR code image from one page, with filtering by post type and pagination.', 'qr-code-composer' ); ?></p>
  <img class="varcdemos" src="<?php echo esc_url( QRC_COMPOSER_URL . '/admin/img/downlaod-vcard-min.png' ); ?>" alt="<?php esc_attr_e( 'Download vCard QR code images page', 'qr-code-composer' ); ?>">

  <a class="qrc_gtnow" href="<?php echo esc_url( $qrc_pricing_url ); ?>"><?php esc_html_e( 'Unlock PRO →', 'qr-code-composer' ); ?></a>
</div>

<p class="qrc_pro_more">
  <a href="<?php echo esc_url( $qrc_why_url ); ?>"><?php esc_html_e( 'See everything included in Pro', 'qr-code-composer' ); ?></a>
</p>
             </div>
         </div>

            </div>
            </div>
    <div  class="tab5-tab">
        <div id="qrc-dynamic-qr">
        <div class="qrc_wrap-md-7">             
        <form method="post" action="options.php" class="qrcpro_integration">              

         <?php  

             settings_fields("qrc_admin_integrate");
             do_settings_sections('qrc_admin_integrate_sec');
         ?>
 

  <div class="qrcsubmits">
                  <button type ="submit" id="qrc-osiudi" class="button button-primary"><?php echo esc_html('Save Changes','qr-code-composer') ?> <span class="qrcintegrates"></span></button>
         <span class="qrcintegrates_djkfhjhj"></span>
            </div>



         </form>
</div>
  <div class="qrc_wrap-md-5 lksfuieusb">
<div class="qrc_pro_ftcs_cont">
  <h4 class="pro_ftcs_qrch"><?php esc_html_e( 'Upgrade to Pro', 'qr-code-composer' ); ?></h4>

  <h3 class="orderqrpro"><?php esc_html_e( 'Order QR code', 'qr-code-composer' ); ?></h3>
  <p><?php esc_html_e( 'A QR code for every new and existing WooCommerce order, shown in the order dashboard and the order email.', 'qr-code-composer' ); ?></p>
  <img src="<?php echo esc_url( QRC_COMPOSER_URL . '/admin/img/order-qr-code.png' ); ?>" alt="<?php esc_attr_e( 'Order QR code in a WooCommerce order email', 'qr-code-composer' ); ?>">

  <h3 class="orderqrpro"><?php esc_html_e( 'Invoice QR code', 'qr-code-composer' ); ?></h3>
  <p><?php esc_html_e( 'Add a QR code to PDF invoices. Works with PDF Invoices & Packing Slips, Print Invoice & Delivery Notes and WebToffee PDF Invoices.', 'qr-code-composer' ); ?></p>
  <img src="<?php echo esc_url( QRC_COMPOSER_URL . '/admin/img/pdf-min.png' ); ?>" alt="<?php esc_attr_e( 'QR code on a PDF invoice', 'qr-code-composer' ); ?>">

  <a class="qrc_gtnow" href="<?php echo esc_url( $qrc_pricing_url ); ?>"><?php esc_html_e( 'Unlock PRO →', 'qr-code-composer' ); ?></a>
</div>
  </div>
         </div>  
         </div> 


    <div  class="tab7-tab">



  <section class="qrc-pro-section">
    <div class="qrc-pro-header">
      <h2>Unlock the Full Power with Pro</h2>
      <p>Compare Free vs. Pro features and see how QR Code Composer Pro can grow your website.</p>
    </div>

    <div class="qrc-table-wrapper">
      <table class="qrc-comparison-table">
        <thead>
          <tr>
            <th class="qrc-col-feature">Features</th>
            <th class="qrc-col-free">Free Version</th>
            <th class="qrc-col-pro">PRO Version</th>
          </tr>
        </thead>
        <tbody>
          <tr>
            <td>
              <span class="qrc-feature-title">Static QR Codes</span>
              <span class="qrc-feature-desc">Generate static codes for links, plain text, and basic content.</span>
            </td>
            <td class="qrc-center"><span class="qrc-status-icon qrc-status-check">✓</span></td>
            <td class="qrc-center"><span class="qrc-status-icon qrc-status-check">✓</span></td>
          </tr>
          <tr>
            <td>
              <span class="qrc-feature-title">Dynamic QR Codes &amp; Edit Destination</span>
              <span class="qrc-feature-desc">Change destination links anytime without reprinting the QR code.</span>
            </td>
            <td class="qrc-center"><span class="qrc-status-icon qrc-status-cross">✕</span></td>
            <td class="qrc-center"><span class="qrc-status-icon qrc-status-check">✓</span></td>
          </tr>
          <tr>
            <td>
              <span class="qrc-feature-title">Scan Analytics &amp; Tracking</span>
              <span class="qrc-feature-desc">Track daily scans, top links, locations, and device types.</span>
            </td>
            <td class="qrc-center"><span class="qrc-status-icon qrc-status-cross">✕</span></td>
            <td class="qrc-center"><span class="qrc-status-icon qrc-status-check">✓</span></td>
          </tr>
          <tr>
            <td>
              <span class="qrc-feature-title">WooCommerce Order &amp; Invoice QR</span>
              <span class="qrc-feature-desc">Add QR codes on order emails and top 3 PDF invoice plugins.</span>
            </td>
            <td class="qrc-center"><span class="qrc-status-icon qrc-status-cross">✕</span></td>
            <td class="qrc-center"><span class="qrc-status-icon qrc-status-check">✓</span></td>
          </tr>
          <tr>
            <td>
              <span class="qrc-feature-title">Gutenberg Block &amp; Elementor Live Editor</span>
              <span class="qrc-feature-desc">Native block editor controls and live Elementor sidebar editing.</span>
            </td>
            <td class="qrc-center">Basic Addon</td>
            <td class="qrc-center"><span class="qrc-status-icon qrc-status-check">✓ (Full Controls)</span></td>
          </tr>
          <tr>
            <td>
              <span class="qrc-feature-title">Custom Styling &amp; Logo Inside QR</span>
              <span class="qrc-feature-desc">Add center logos, custom dot styles, frame shapes, and colors.</span>
            </td>
            <td class="qrc-center"><span class="qrc-tag-limited">Basic Colors</span></td>
            <td class="qrc-center"><span class="qrc-status-icon qrc-status-check">✓ (Full Styling)</span></td>
          </tr>
          <tr>
            <td>
              <span class="qrc-feature-title">Bulk Export &amp; High-Res Downloads</span>
              <span class="qrc-feature-desc">Export all post types or vCards in bulk. Download SVG/PDF formats.</span>
            </td>
            <td class="qrc-center"><span class="qrc-tag-limited">PNG Only</span></td>
            <td class="qrc-center"><span class="qrc-tag-pro">PNG, SVG &amp; PDF</span></td>
          </tr>
          <tr>
            <td>
              <span class="qrc-feature-title">Advanced Access &amp; Integrations</span>
              <span class="qrc-feature-desc">Dokan vendor stores, BuddyPress profiles, and link scheduling.</span>
            </td>
            <td class="qrc-center"><span class="qrc-status-icon qrc-status-cross">✕</span></td>
            <td class="qrc-center"><span class="qrc-status-icon qrc-status-check">✓</span></td>
          </tr>
          <tr>
            <td>
              <span class="qrc-feature-title">Bulk vCard QR Code Generator</span>
              <span class="qrc-feature-desc">Generate contact card (vCard) QR codes in bulk for team members, employee directories, or customer lists instantly without manual entry.</span>
            </td>
            <td class="qrc-center"><span class="qrc-status-icon qrc-status-cross">✕</span></td>
            <td class="qrc-center"><span class="qrc-status-icon qrc-status-check">✓</span></td>
          </tr>
        </tbody>
      </table>
    </div>

    <div class="qrc-pro-cta-box">
      <h3 style="color:#fff">Ready to Boost Your Website with Dynamic QR Codes?</h3>
      <p>Upgrade today to access dynamic tracking, custom designs, WooCommerce invoice integration, and priority support.</p>
      <a href="https://sharabindu.com/plugins/wordpress-qr-code-generator/" class="qrc-btn-upgrade" target="_blank" rel="noopener">Upgrade to Pro Now</a>
    </div>
  </section>

 <section class="qrc-pro-section">
      <div class="qrc-pro-header">
      <h2>Our All Plugins</h2>
      <p>Explore our full collection of plugins to add powerful features and grow your WordPress website.</p>
    </div> 
<div class="poytgwbemfn">


       
<?php 


$plugins = [
  [
    'slug' => 'qr-code-composer',
  ],
  [
    'slug' => 'barcode-generator-for-woocommerce',
  ],
  [
    'slug' => 'mini-cart-for-woocommerce',
  ],
  [
    'slug' => 'elfi-masonry-addon'
  ],
  [
    'slug' => 'yoo-bar'
  ],
  [
    'slug' => 'fancy-fiter'
  ],
  [
    'slug' => 'master-qr-generator'
  ]
]; 

if( class_exists( 'Connekt_Plugin_Installer' ) ) {
  Connekt_Plugin_Installer::init( $plugins );
}
 ?>
        </div>
      </section>
        <section class="qrc-pro-section">

      <div class="qrc-pro-header">
      <h2>Useful Videos</h2>
      <p>Watch quick video guides to learn how to create, customize, and display QR codes on your site.</p>
    </div> 
      <ul>
        <li>
<iframe width="560" height="315" src="https://www.youtube.com/embed/mJx9vUU7930?si=dNaIB-VS1_CU-JWc" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" referrerpolicy="strict-origin-when-cross-origin" allowfullscreen></iframe>  
        </li>
        <li>
<iframe width="560" height="315" src="https://www.youtube.com/embed/-psUDqpnBlk?si=B5lV5nV0tf7FR0NY" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" referrerpolicy="strict-origin-when-cross-origin" allowfullscreen></iframe>   
        </li>
        
      </ul>
      </section>
    </div>

  </div> <!-- END tabs-content -->
  </div>

     </div>


    <?php
     }


}
if(class_exists('QRCAdminMain')){

  new QRCAdminMain();
}