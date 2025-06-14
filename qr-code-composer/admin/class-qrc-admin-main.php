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

    $icon_url = QRC_COMPOSER_URL . 'admin/img/mini.png';

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

    add_submenu_page('qr_composer', esc_html__('Get PRO', 'qr-code-composer'), esc_html__('Get PRO', 'qr-code-composer'), 'manage_options', 'https://sharabindu.com/plugins/wordpress-qr-code-generator/');
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
                          <li><a href="https://wordpressqrcode.sharabindu.com/wp-admin/admin.php?page=qrc_shortcode" target="_blank"><?php echo esc_html('Pro Dashbord demo', 'qr-code-composer') ?></a></li>

                          <li><a href="https://sharabindu.com/plugins/wordpress-qr-code-generator/" target="_blank"><?php echo esc_html('Buy Premium', 'qr-code-composer') ?></a></li>
                          <li><a href="https://wordpressqr.sharabindu.com/docs/introduction/" target="_blank"><?php echo esc_html('Docs', 'qr-code-composer') ?></a></li>

                          <li><a href="https://sharabindu.com/contact-us/" target="_blank"><?php echo esc_html('Support', 'qr-code-composer') ?></a></li>
                          <li><a href="https://sharabindu.com/plugins/" target="_blank"><?php echo esc_html('More Plugin', 'qr-code-composer') ?></a></li>
                      </ul>
                      <ul  class="qrc_hdaer_cnt">
                          <li> <img src=" <?php echo esc_url( QRC_COMPOSER_URL . '/admin/img/logo.png') ?>" alt="qr logo"></li>

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

<a href="https://sharabindu.com/plugins/wordpress-qr-code-generator/#pricing" target="_blank" class="mqrlocout"><?php esc_html_e('Upgrade and Unlock ', 'qr-code-composer'); ?><span class="dashicons dashicons-unlock"></span></a>
<a href="https://wordpressqrcode.sharabindu.com/wp-admin/admin.php?page=qrc_shortcode" target="_blank"><?php esc_html_e('Backend Demo for Pro', 'qr-code-composer'); ?></a>
</div>
<div class="mediumbonus-alert"> <img src="<?php echo esc_url( QRC_COMPOSER_URL .'/admin/img/bonus.png') ;?>" alt="bonus"> <span><strong>Bonus:</strong> You can upgrade to the Pro plan today and <strong>save 29% off</strong> </span><!----></div>
        </div>
        </div>
                    
              </div>
            </div>
          </div>
         </div>

         <?php

     }
   function qrc_ordermail(){ 


          ?>
                <div class="qrcodewrap">
                  <div class="qr_wp_admin">
                      <ul class="qrc_nav_bar">
                          <li><a href="https://wordpressqrcode.sharabindu.com/wp-admin/admin.php?page=qrc_ordermail" target="_blank"><?php echo esc_html('Pro Dashbord demo', 'qr-code-composer') ?></a></li>

                          <li><a href="https://sharabindu.com/plugins/wordpress-qr-code-generator/" target="_blank"><?php echo esc_html('Buy Premium', 'qr-code-composer') ?></a></li>
                          <li><a href="https://wordpressqr.sharabindu.com/docs/introduction/" target="_blank"><?php echo esc_html('Docs', 'qr-code-composer') ?></a></li>

                          <li><a href="https://sharabindu.com/contact-us/" target="_blank"><?php echo esc_html('Support', 'qr-code-composer') ?></a></li>
                          <li><a href="https://sharabindu.com/plugins/" target="_blank"><?php echo esc_html('More Plugin', 'qr-code-composer') ?></a></li>
                      </ul>
                      <ul  class="qrc_hdaer_cnt">
                          <li> <img src=" <?php echo esc_url(QRC_COMPOSER_URL . '/admin/img/logo.png') ?>" alt="qr logo"></li>

                          <li  class="qrc_fd_cnt"> 
                              <h3><?php echo esc_html('Order QR code (Premium)', 'qr-code-composer')?> </h3>
                      <small><?php echo esc_html('The order QR code is displayed on the order dashboard and it will print in the order email', 'qr-code-composer') ?></small></li>
                      </ul>

                  </div>

               <div class="tirmoof">
                       <div class="tirmoof_menu" id="qrccomposerprowraper">
  <div class="tab-nav">
    <ul>
      <li class="active"><a href="#tab1"><?php echo esc_html__('Order QR code', 'qr-code-composer') ?></a></li>
      <li class=""><a href="#tab2"><?php echo esc_html__('QR Code on Invoice', 'qr-code-composer') ?></a></li>
    </ul> <!-- END tabs-nav -->
  </div>


<div class="qrctab-content">
  
  <div class="tab1-tab active">
    <div class="bulptiblur">
    <img src="<?php echo esc_url( QRC_COMPOSER_URL .'/admin/img/orderpage-min.png') ; ?>" alt="order QR demo" class="qrcpreiumversion">
    </div>
<div class="bulptinyprowarp">
<div class="bulptinypro">
            <h3>WooCommerce Order QR Code</h3>
<p>The QR code is included in the order email. order QR code a unique Benefit in management of sales process. Order QR Code can be created from  Order ID, Transaction ID, Billing Address, Order Amount, Order Date, Shipping Cost, and more.</p>

<div class="mqrfeatures">

<a href="https://sharabindu.com/plugins/wordpress-qr-code-generator/#pricing" target="_blank" class="mqrlocout">Upgrade and Unlock <span class="dashicons dashicons-unlock"></span></a>
<a href="https://wordpressqrcode.sharabindu.com/wp-admin/admin.php?page=qrc_ordermail" target="_blank">Backend Demo for Pro</a>
</div>
<div class="mediumbonus-alert"> <img src="<?php echo esc_url( QRC_COMPOSER_URL .'/admin/img/bonus.png') ;?>" alt="bonus"> <span><strong>Bonus:</strong> You can upgrade to the Pro plan today and <strong>save 29% off</strong> </span><!----></div>
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
                          <li><a href="https://wordpressqrcode.sharabindu.com/wp-admin/admin.php?page=qrc_vcardlist&tab=vcardsettings" target="_blank"><?php echo esc_html('Pro Dashbord demo', 'qr-code-composer') ?></a></li>

                          <li><a href="https://sharabindu.com/plugins/wordpress-qr-code-generator/" target="_blank"><?php echo esc_html('Buy Premium', 'qr-code-composer') ?></a></li>
                          <li><a href="https://wordpressqr.sharabindu.com/docs/introduction/" target="_blank"><?php echo esc_html('Docs', 'qr-code-composer') ?></a></li>

                          <li><a href="https://sharabindu.com/contact-us/" target="_blank"><?php echo esc_html('Support', 'qr-code-composer') ?></a></li>
                          <li><a href="https://sharabindu.com/plugins/" target="_blank"><?php echo esc_html('More Plugin', 'qr-code-composer') ?></a></li>
                      </ul>
                      <ul  class="qrc_hdaer_cnt">
                          <li> <img src=" <?php echo esc_url(QRC_COMPOSER_URL . '/admin/img/logo.png') ?>" alt="qr logo"></li>

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

<a href="https://sharabindu.com/plugins/wordpress-qr-code-generator/#pricing" target="_blank" class="mqrlocout">Upgrade and Unlock <span class="dashicons dashicons-unlock"></span></a>
<a href="https://wordpressqrcode.sharabindu.com/wp-admin/admin.php?page=qrc_vcardlist&tab=vcardlist" target="_blank">Backend Demo for Pro</a>
</div>
<div class="mediumbonus-alert"><img src="<?php echo esc_url( QRC_COMPOSER_URL .'/admin/img/bonus.png') ;?>" alt="bonus"> <span><strong>Bonus:</strong> You can upgrade to the Pro plan today and <strong>save 29% off</strong> </span><!----></div>
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
                          <li><a href="https://wordpressqr.sharabindu.com/qr-code-download/" target="_blank"><?php echo esc_html('Live demo', 'qr-code-composer') ?></a></li>

                          <li><a href="https://sharabindu.com/plugins/wordpress-qr-code-generator/" target="_blank"><?php echo esc_html('Buy Premium', 'qr-code-composer') ?></a></li>
                          <li><a href="https://wordpressqr.sharabindu.com/docs/introduction/" target="_blank"><?php echo esc_html('Docs', 'qr-code-composer') ?></a></li>

                          <li><a href="https://sharabindu.com/contact-us/" target="_blank"><?php echo esc_html('Support', 'qr-code-composer') ?></a></li>
                          <li><a href="https://sharabindu.com/plugins/" target="_blank"><?php echo esc_html('More Plugin', 'qr-code-composer') ?></a></li>
                      </ul>
                      <ul  class="qrc_hdaer_cnt">
                          <li> <img src=" <?php echo esc_url(QRC_COMPOSER_URL . '/admin/img/logo.png') ?>" alt="qr logo"></li>

                          <li  class="qrc_fd_cnt"> 
                              <h3><?php echo esc_html('Download QR code from one page', 'qr-code-composer')?> </h3>
                      <small><?php echo esc_html('Download all Post type QR Codes from One Page', 'qr-code-composer') ?></small></li>
                      </ul>

                  </div>

               <div class="tirmoof">
                       <div class="tirmoof_menu" id="qrccomposerprowraper">
  <div class="tab-nav">
    <ul>
      <li class="active"><a href="#tab1"><?php echo esc_html__('Settings', 'qr-code-composer') ?></a></li>
      <li class=""><a href="#tab2"><?php echo esc_html__('Download Page', 'qr-code-composer') ?></a></li>
    </ul> <!-- END tabs-nav -->
  </div>


<div class="qrctab-content">
  
  <div class="tab1-tab active">
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

<a href="https://sharabindu.com/plugins/wordpress-qr-code-generator/#pricing" target="_blank" class="mqrlocout">Upgrade and Unlock <span class="dashicons dashicons-unlock"></span></a>
<a href="https://wordpressqrcode.sharabindu.com/wp-admin/admin.php?page=qrc_list_view" target="_blank">Backend Demo for Pro</a>
</div>
<div class="mediumbonus-alert"> <img src="<?php echo esc_url( QRC_COMPOSER_URL .'/admin/img/bonus.png') ;?>" alt="bonus"><span><strong>Bonus:</strong> You can upgrade to the Pro plan today and <strong>save 29% off</strong> </span><!----></div>
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

<a href="https://sharabindu.com/plugins/wordpress-qr-code-generator/#pricing" target="_blank" class="mqrlocout">Upgrade and Unlock <span class="dashicons dashicons-unlock"></span></a>
<a href="https://wordpressqrcode.sharabindu.com/wp-admin/admin.php?page=qrc_list_view&tab=qrc_list_page" target="_blank">Backend Demo for Pro</a>
</div>
<div class="mediumbonus-alert"> <img src="<?php echo esc_url( QRC_COMPOSER_URL .'/admin/img/bonus.png') ;?>" alt="bonus"><span><strong>Bonus:</strong> You can upgrade to the Pro plan today and <strong>save 29% off</strong> </span><!----></div>
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
                          <li><a href="https://wordpressqr.sharabindu.com/qr-code-print-demo/" target="_blank"><?php echo esc_html('Bulk Print demo', 'qr-code-composer') ?></a></li>
                          <li><a href="https://sharabindu.com/plugins/wordpress-qr-code-generator/" target="_blank"><?php echo esc_html('Buy premium', 'qr-code-composer') ?></a></li>
                          <li><a href="https://wordpressqr.sharabindu.com/docs/introduction/" target="_blank"><?php echo esc_html('Docs', 'qr-code-composer') ?></a></li>

                          <li><a href="https://sharabindu.com/contact-us/" target="_blank"><?php echo esc_html('Support', 'qr-code-composer') ?></a></li>
                          <li><a href="https://sharabindu.com/plugins/" target="_blank"><?php echo esc_html('More Plugin', 'qr-code-composer') ?></a></li>
                      </ul>
                      <ul  class="qrc_hdaer_cnt">
                          <li> <img src=" <?php echo esc_url(QRC_COMPOSER_URL . '/admin/img/logo.png') ?>" alt="qr logo"></li>

                              <li  class="qrc_fd_cnt"> 
                                  <h3><?php echo esc_html('QR Code Bulk Print(Pro)', 'qr-code-composer');?> </h3>
                          <small><?php echo esc_html('Print QR Code In Bulk Qty based on Post type', 'qr-code-composer') ?></small></li>
                      </ul>

                  </div>

               <div class="tirmoof">
                       <div class="tirmoof_menu" id="qrccomposerprowraper">
  <div class="tab-nav">
    <ul>
      <li class="active"><a href="#tab1"><?php echo esc_html__('Settings', 'qr-code-composer') ?></a></li>
      <li class=""><a href="#tab2"><?php echo esc_html__('Print Page', 'qr-code-composer') ?></a></li>
    </ul> <!-- END tabs-nav -->
  </div>


<div class="qrctab-content">
  
  <div class="tab1-tab active">

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

<a href="https://sharabindu.com/plugins/wordpress-qr-code-generator/#pricing" target="_blank" class="mqrlocout">Unlock Bulk Print</a>
<a href="https://wordpressqrcode.sharabindu.com/wp-admin/admin.php?page=qrc_print_pdf" target="_blank"> Live demo of Bulk Print QR code</a>
</div>
<div class="mediumbonus-alert"><img src="<?php echo esc_url( QRC_COMPOSER_URL .'/admin/img/bonus.png') ;?>" alt="bonus"><span><strong>Bonus:</strong> You can upgrade to the Pro plan today and <strong>save 29% off</strong> </span><!----></div>
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

<a href="https://sharabindu.com/plugins/wordpress-qr-code-generator/#pricing" target="_blank" class="mqrlocout">Unlock Bulk Print</a>
<a href="https://wordpressqrcode.sharabindu.com/wp-admin/admin.php?page=qrc_print_pdf&tab=qrc_print_page" target="_blank"> Live demo of Bulk Print QR code</a>
</div>
<div class="mediumbonus-alert"><img src="<?php echo esc_url( QRC_COMPOSER_URL .'/admin/img/bonus.png') ;?>" alt="bonus"><span><strong>Bonus:</strong> You can upgrade to the Pro plan today and <strong>save 29% off</strong> </span><!----></div>
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
    $valuebg = (isset($options1['qr_dwnbtnbg_color'])) ? $options1['qr_dwnbtnbg_color'] : '#44d813';
    $value = (isset($options1['qr_dwnbtn_color'])) ? $options1['qr_dwnbtn_color'] : '#000';
    $qrcpopuptext = isset($options1['qrcpopuptext']) ? $options1['qrcpopuptext'] : 'View To Click';
    $qrcpopup_bg = (isset($options1['qrcpopup_bg'])) ? $options1['qrcpopup_bg'] : '#44d813';
    $qrcpopup_color = (isset($options1['qrcpopup_color'])) ? $options1['qrcpopup_color'] : '#000';
    $qrcpopup_brclr = (isset($options1['qrcpopup_brclr'])) ? $options1['qrcpopup_brclr'] : '#32a518';
    $qrcpopup_brdius = (isset($options1['qrcpopup_brdius'])) ? $options1['qrcpopup_brdius'] : '20';
    $qrcpopup_fntsize = isset($options1['qrcpopup_fntsize']) ? $options1['qrcpopup_fntsize'] : '12';

        $qr_download_fntsz = isset($options1['qr_download_fntsz']) ? $options1['qr_download_fntsz'] : '12';
        $qr_download_brclr = isset($options1['qr_download_brclr']) ? $options1['qr_download_brclr'] : '#44d813';
        $qrc_dwnbtn_brdius = isset($options1['qrc_dwnbtn_brdius']) ? $options1['qrc_dwnbtn_brdius'] : '20';



        ?>
         <div class="qrcodewrap">
             <div class="qr_wp_admin">
                 <ul class="qrc_nav_bar">
                     <li><a href="https://sharabindu.com/plugins/wordpress-qr-code-generator/"><?php echo esc_html('Premium Upgrade', 'qr-code-composer') ?></a></li>                  
                     <li><a href="https://wordpressqrcode.sharabindu.com/wp-admin/admin.php?page=qr_composer"><?php echo esc_html('Pro dashboard', 'qr-code-composer') ?></a></li>
                     <li><a href="https://wordpressqr.sharabindu.com/"><?php echo esc_html('Pro Demo', 'qr-code-composer') ?></a>
                     </li>
                     <li><a href="https://wordpressqr.sharabindu.com/docs/introduction/"><?php echo esc_html('Docs', 'qr-code-composer') ?></a></li>
                     <li><a href="https://wordpress.org/support/plugin/qr-code-composer/"><?php echo esc_html('Support', 'qr-code-composer') ?></a></li>


                 </ul>
                 <ul  class="qrc_hdaer_cnt">
                     <li> <img src=" <?php echo esc_url(QRC_COMPOSER_URL . '/admin/img/logo.png') ?>" alt="qr logo"></li>

                     <li  class="qrc_fd_cnt"> 
                         <h3><?php echo esc_html('QR Code Composer', 'qr-code-composer') . ' <sup>' .esc_html( QRC_COMPOSER_VERSION); ?></sup> </h3>
                 <small><?php echo esc_html('Generate QR Code instantly', 'qr-code-composer') ?></small></li>
                 </ul>

             </div>
    <div class="qrcodewrap" id="qrccomposerprowraper">
<div class="tab-nav">
  <ul>
    <li class="active"><a href="#tab1"><?php echo esc_html("Design QR code", "qr-code-composer") ?></a></li>
    <li><a href="#tab2"><?php echo esc_html("Auto Generate QR Code", "qr-code-composer") ?></a></li>
    <li><a href="#tab3"><?php echo esc_html("Various Components QR", "qr-code-composer") ?></a></li>
    <li><a href="#tab4"><?php echo esc_html("vCard QR Code", "qr-code-composer") ?></a></li>
    <li><a href="#tab5"><?php echo esc_html("Integration", "qr-code-composer") ?></a></li>
    <li> <a href="#tab6"> <?php echo esc_html("Our All Plugins", "qr-code-composer") ?> </a></li>

  </ul> <!-- END tabs-nav -->
</div>
  <div class="qrctab-content">

    <div  class="tab1-tab active">

            <div class="desingwrapper">
            <div class="leftside">
            <form method="post" action="options.php">
            <?php
            settings_errors();           
            settings_fields("qrc_composer_settings");
             do_settings_sections('qrc_design_sec'); ?>
             <div class="qrcsubmits">
             <button type ="submit" id="osiudi" class="button button-primary"><?php echo esc_html('Save Changes','qr-code-composer') ?> <span class="qrcs_desingcrt"></span></button>
         <span class="qrcsdhicr_dsigns"></span>
         </div>
       </form>
         </div>
         <div class="rightside">
          <div class="rightsidesticky">
           <div class="prbloth"><?php echo esc_html('Live Preview','qr-code-composer') ?></div>
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

    <div class="qrc_proversion" >
    <a href="https://wordpressqr.sharabindu.com/" target="_blank">Frontend Demo (PRO)</a>
    <a href="https://wordpressqrcode.sharabindu.com/wp-admin" target="_blank"> Backend Demo (PRO)</a>
    <a href="https://sharabindu.com/plugins/wordpress-qr-code-generator/#pricing" target="_blank">Premium Upgrade</a>
    <a href="https://wordpressqr.sharabindu.com/docs/introduction/" target="_blank">Documentation</a>
    </div>

        </div> </div>
         <div class="rightsidelast">
                       <div>
                     <div class="qrc_pro_ftcs_cont firstpages">
                     <h4 class="pro_ftcs__h" style="font-size: 90%;"><?php echo esc_html__('Advanced QR Code Designs (PRO)', 'qr-code-composer') ?></h4><a href="https://wordpressqrcode.sharabindu.com/wp-admin/?wtlwp_token=62fc8bc484c0bbc6ddd807f4b374079973d5afb3d92fd3a287f6cb1c5f2af853354fbbb9bad24ca14f7da1ea4acfa257d223d70afa3239febb3fcdac2256ab52" title="Click to view Pro Dashboard">
                     <img src="<?php echo esc_url( QRC_COMPOSER_URL . '/admin/img/custom-label-min.png') ?>" alt="Pro Features"></a>

                     

                 </div>
             </div> 
                  <div class="qrc_prodemos">
               <ul class="qrc_nav_bradnfg">

                        <li><?php echo esc_html__('QR Dot Shape', 'qr-code-composer') ?></li>
                        <li><?php echo esc_html__('Eye Frame Style', 'qr-code-composer') ?></li>
                         <li><?php echo esc_html__('Eyeball Style', 'qr-code-composer') ?></li>
                         <li><?php echo esc_html__('Gradient Colors', 'qr-code-composer') ?></li>
                         <li><?php echo esc_html__('Logo Integration', 'qr-code-composer') ?></li>
                         <li><?php echo esc_html__('Add Beautiful Border', 'qr-code-composer') ?></li>
                         <li><?php echo esc_html__('Custom Label on QR Code', 'qr-code-composer') ?></li>
                     </ul>
                     </div>

         </div>
         </div>
    </div>
    <div  class="tab2-tab">
        <div id="dynamic-qr">
    <div class="qrc_wrap-md-7">
      <form method="post" action="options.php"  class="qrcdesings" > 
        <?php 


            settings_fields("qrc_autogenerate");
             do_settings_sections('qrc_admin_sec'); ?>

             <div class="qrcsubmits">
             <button type ="submit" id="osiudi" class="button button-primary"><?php echo esc_html('Save Changes','qr-code-composer') ?> <span class="qrcs_desingcrt"></span></button>
         <span class="qrcsdhicr_dsigns"></span>
        </div>



             
           </form>
         </div>
        <div class="qrc_wrap-md-5 lksfuieusb">
             <div>
                     <div class="qrc_pro_ftcs_cont">
                     <h4 class="pro_ftcs__h"><?php echo esc_html__('Order Email QR Code (Premium)', 'qr-code-composer') ?></h4>
                    
                     <p><?php echo esc_html__('Automatically generates QR code for every new order and old order. WC order email QR code, can be created from different elements.', 'qr-code-composer') ?></p>
                     <img style="box-shadow: 2px 2px 11px 2px #9f9f9f;" src="<?php echo esc_url(QRC_COMPOSER_URL . '/admin/img/order-qr-code.png') ?>" alt="Pro Features">


                     <a class="qrc_gtnow" href="https://wordpressqrcode.sharabindu.com/wp-admin/admin.php?page=codemanas-woocommerce-preview-emails"><?php echo esc_html__('Order Email Demo', 'qr-code-composer') ?></a>
        <a class="oreremils" id="orderemail" video-url="https://www.youtube.com/watch?v=hSCa9Tz0FZc" style="cursor: pointer;"><span title="Video Documentation" id="qrcdocsides" class="dashicons dashicons-video-alt3"></span></a>
         <h4 class="rotnfjj"><?php echo esc_html__('Order QR code in PDF Invoice', 'qr-code-composer') ?></h4>
 <img style="box-shadow: 2px 2px 11px 2px #9f9f9f;" src="<?php echo esc_url(QRC_COMPOSER_URL . '/admin/img/pdf-min.png') ?>" alt="Pro Features">
                     <a class="qrc_gtnow" href="https://wordpressqrcode.sharabindu.com/wp-admin/edit.php?post_type=shop_order"><?php echo esc_html__('PDF Demo', 'qr-code-composer') ?></a>
                 </div>
             </div>
         </div> 
        </div>
    </div>

    <div  class="tab3-tab">
    <div id="dynamic-qr">
        <div class="qrc_wrap-md-7">
        <form method="post" action="options.php" class="qrcdesings" id="qrcdesings">
         <?php  

            settings_fields("qrc_custom_link_generator");
             do_settings_sections('qrc_logo_admin_sec');
         ?> 
             <div class="qrcsubmits">
             <button type ="submit" id="osiudi" class="button button-primary"><?php echo esc_html('Save Changes','qr-code-composer') ?> <span class="qrcs_desingcrt"></span></button>
         <span class="qrcsdhicr_dsigns"></span>
        </div>
      </form>  
      </div><div class="qrc_wrap-md-4">
                    <div class="qrc_pro_ftcs_cont">
                     <h4 class="pro_ftcs__h"><?php echo esc_html__('Shortcode Generator (Premium)', 'qr-code-composer') ?></h4>
                     <p><?php echo esc_html__('In the premium version, you can create multiple shortcodes for each element. Also can do different QR designs, logo changes etc', 'qr-code-composer') ?></p><a  href="https://wordpressqrcode.sharabindu.com/wp-admin/admin.php?page=qrc_shortcode" title="Click to view Pro Dashboard">
                     <img class="shrycodegenrs" src="<?php echo esc_url(QRC_COMPOSER_URL . '/admin/img/shortcodegene-min.png') ?>" alt="Pro Features"></a>
                     <a class="qrc_gtnow" href="https://wordpressqrcode.sharabindu.com/wp-admin/admin.php?page=qrc_shortcode"><?php echo esc_html__('Pro Backend Demo', 'qr-code-composer') ?></a>

                 </div>

       </div>
  </div>    
    </div>
    <div  class="tab4-tab">
        <div id="dynamic-qr">
            
        <div class="qrc_wrap-md-8">
        <form method="post" action="options.php" class="qrcpro_vacradsubmits" >              

         <?php  

             settings_fields("qrc_vcard_generator");
             do_settings_sections('qrc_vacrd_admin_sec');
         ?>                <div class="qrcsubmits">
           <button type ="submit" id="osiudi" class="button button-primary"><?php echo esc_html('Save Changes','qr-code-composer') ?> <span class="qrcvcard_sdhi"></span></button>
           <span class="qrcvcard_djkfhjhj"></span>    </div>
         </form>
         </div>
<div class="qrc_wrap-md-4">
             <div>
                 <div class="qrc_pro_ftcs_cont">
                     <h4 class="pro_ftcs__h">Bulk vCard (Premium)</h4>
 <img src="<?php echo esc_url(QRC_COMPOSER_URL . '/admin/img/vcarddemo-min.png') ?>" alt="Pro Features" class="varcdemos">
                     
                    <a class="qrc_gtnow" href="https://wordpressqrcode.sharabindu.com/wp-admin/post.php?post=3133&action=edit">Pro Backend Demo</a>
<h4 class="pro_ftcs__h">Downlaod All vCard Images: (Premium)</h4>
 <p>You can download all Meta vCard QR code images from one page. Ability to filter by post type and pagination. </p>                    
 <img src="<?php echo esc_url(QRC_COMPOSER_URL . '/admin/img/downlaod-vcard-min.png') ?>" alt="Pro Features" class="varcdemos">
<a class="qrc_gtnow" href="https://wordpressqrcode.sharabindu.com/wp-admin/admin.php?page=qrc_vcardlist&tab=vcardlist">Backend demo</a>



 
                 </div>
             </div>
         </div>         
    </div>
            </div>
    <div  class="tab5-tab">
        <div id="dynamic-qr">
            
        <div class="qrc_wrap-md-8">
        <form method="post" action="options.php" class="qrcpro_integration">              

         <?php  

             settings_fields("qrc_admin_integrate");
             do_settings_sections('qrc_admin_integrate_sec');
         ?>
 

  <div class="qrcsubmits">
                  <button type ="submit" id="osiudi" class="button button-primary"><?php echo esc_html('Save Changes','qr-code-composer') ?> <span class="qrcintegrates"></span></button>
         <span class="qrcintegrates_djkfhjhj"></span>
            </div>



         </form>
    </div>
<div class="qrc_wrap-md-4">
             <div>
                 <div class="qrc_pro_ftcs_cont">
                     <h4 class="pro_ftcs__h">Widget API Suported (Premium)</h4>
 <p>Users can create and display QR codes using WordPress widgets</p>                    
 <img src="<?php echo esc_url(QRC_COMPOSER_URL . '/admin/img/widget-min.png') ?>" alt="Pro Features" class="varcdemos">
<a class="qrc_gtnow" href="https://wordpressqrcode.sharabindu.com/wp-admin/widgets.php">Widget Backend demo</a>
                     <h4 class="pro_ftcs__h">Elementor Addon: (Premium)</h4>
 <p>We have introduced the “QR Code Composer” addon to generate QR codes with Elementor. With this addon, you can generate QR codes for the current page URL, custom link, custom text, Google map location, Wi-Fi access, WhatsApp access, Vcard, event QR, email, and number.</p>                    
 <img src="<?php echo esc_url(QRC_COMPOSER_URL . '/admin/img/elementor-min.png') ?>" alt="Pro Features" class="varcdemos">
<a class="qrc_gtnow" href="https://wordpressqrcode.sharabindu.com/wp-admin/post.php?post=2984&action=elementor">Elementor Backend demo</a>
<a class="oreremils" id="elemtvide" video-url="https://www.youtube.com/watch?v=USdX-PuPjuU&t=3s" style="cursor: pointer;"><span title="Video Documentation" id="qrcdocsides" class="dashicons dashicons-video-alt3"></span></a>

                 </div>
             </div>
         </div>  
         </div>  
         </div> 
    <div  class="tab6-tab">
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


    </div>


  </div> <!-- END tabs-content -->
  </div>
        <div class="qrcProsoComosebox">
         
                                
         </div>
     </div>


    <?php
     }


}
if(class_exists('QRCAdminMain')){

  new QRCAdminMain();
}