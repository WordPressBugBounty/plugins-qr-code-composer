<?php
/**
 * The file that defines the bulk qrc_download admin area
 *
 * -facing side of the site and the admin area.
 *
 * @link       https://sharabindu.com
 *
 * @package    qr-code-composer
 * @subpackage qr-code-composer/admin
 */
class QRC_Autogenertae_lite
{
        public function __construct()
        {
    add_action('admin_init', array($this ,'qcr_settings_page'));

    }



function qcr_settings_page()
{

    
    register_setting("qrc_autogenerate", "qrc_autogenerate", array(
        $this,
        'qrc_autogenerate_sanitize'
    ));

    add_settings_section("qrc_download_section", " ", array($this ,'settting_sec_func'), 'qrc_admin_sec');

    add_settings_field("qr_alignment", esc_html__("Alignment", "qr-code-composer") , array($this ,"qr_alignment"), 'qrc_admin_sec', "qrc_download_section",array(
            'class'  =>  'alignme', 
        'label_for' => 'qr_alignment',

    ));

    add_settings_field("removeautodisplay", esc_html__("Disable Auto Display", "qr-code-composer") , array($this ,"removeautodisplay"), 'qrc_admin_sec', "qrc_download_section",array(
            'class'  =>  'removeautodisplay',

    ));
    add_settings_field("removemetabox", esc_html__("Remove QR Code From Meta Box", "qr-code-composer") , array($this ,"removemetabox"), 'qrc_admin_sec', "qrc_download_section",array(
            'class'  =>  'removemetabox',

    ));
    add_settings_field("qrchidegutenberg", esc_html__("Disable QR Sidebar in Gutenberg Editor", "qrc_composer_pro") , array($this ,"qrchidegutenberg"), 'qrc_admin_sec', "qrc_download_section");
    if (class_exists('WooCommerce'))
    {

        add_settings_field("wc_qr_alignment", esc_html__("QR location on product page", "qr-code-composer") , array($this ,"wc_qr_alignment"), 'qrc_admin_sec', "qrc_download_section",array(
            'class'  =>  'wcalignme', 
        'label_for' => 'qrcppagelocation',

    ));

        add_settings_field("qrc_wc_ptab_name", esc_html__("Change Text of Product Tab", "qr-code-composer") ,array($this , "qrc_wc_ptab_name"), 'qrc_admin_sec', "qrc_download_section",array(
            'class'  =>  'ptab_name qrcchangeprodtab', 
        'label_for' => 'qrc_wc_ptab_name',

    ));

    }

    add_settings_field("qrc_free_ids", esc_html__("Show QR code on these items", "qr-code-composer") ,array($this , "qrc_free_picker"), 'qrc_admin_sec', "qrc_download_section" ,array(
            'class'  =>  'qrc_free_ids',

    ));


    add_settings_field("qr_stcode_management", esc_html__("Shortcode for Current Page URL", "qr-code-composer") ,array($this , "qr_stcode_management"), 'qrc_admin_sec', "qrc_download_section",array(
            'class'  =>  'qr_stcode_management',

    ));

}
    function qrchidegutenberg() {
    $options = get_option('qrc_autogenerate');

    $is_checked = isset($options['qrchidegutenberg']) && !empty($options['qrchidegutenberg']);
    $checked_attr = $is_checked ? 'checked' : '';

    printf(
        '<p><input type="checkbox" id="qrchidegutenberg" class="qrc-apple-switch" value="1" name="qrc_autogenerate[qrchidegutenberg]" %s></p>',
        $checked_attr
    );
}   
    function settting_sec_func()
    {   
       ?>
<div class="qrc-box-header" >
            <h3 class="sui-box-title"><?php echo esc_html__('Automatic QR Code Generation ', 'qr-code-composer') ?></h3>
<p><?php echo esc_html__('These QR codes are automatically displayed after the content of the web page. current page url will be used as content of QR code.', 'qr-code-composer') ?></p>
<p><strong><?php
printf(
    /* translators: %d: number of items allowed per content type */
    esc_html__('Free version: up to %d pages, %d posts and %d products. Custom post types and unlimited items are available in Pro.', 'qr-code-composer'),
    absint(QRC_Free_Limit::limit()),
    absint(QRC_Free_Limit::limit()),
    absint(QRC_Free_Limit::limit())
);
?></strong></p>

        </div>

       <?php

    }


/**
 * Picker for the items that get an automatic QR code (free limit per type).
 */
function qrc_free_picker() {

    $limit = QRC_Free_Limit::limit();

    foreach (QRC_Free_Limit::types() as $type) {

        $selected = QRC_Free_Limit::get_ids($type);
        $is_page  = ('page' === $type);

        $items = get_posts(array(
            'post_type'      => $type,
            'post_status'    => 'publish',
            'posts_per_page' => $is_page ? -1 : 200,
            'orderby'        => $is_page ? 'title' : 'date',
            'order'          => $is_page ? 'ASC' : 'DESC',
            'no_found_rows'  => true,
        ));

        // Always list the picked items, even if they are older than the list above.
        $missing = array_diff($selected, wp_list_pluck($items, 'ID'));
        if ($missing) {
            $items = array_merge(get_posts(array(
                'post_type'      => $type,
                'post__in'       => $missing,
                'post_status'    => 'any',
                'posts_per_page' => -1,
                'orderby'        => 'post__in',
            )), $items);
        }

        printf(
            '<div class="qrc-free-box" data-limit="%1$d"><h4>%2$s <span class="qrc-free-count">%3$d / %1$d</span></h4><input type="hidden" name="qrc_autogenerate[qrc_free_present][%4$s]" value="1"><div class="qrc-page-picker">',
            $limit,
            esc_html(QRC_Free_Limit::type_label($type)),
            count($selected),
            esc_attr($type)
        );

        echo '<input type="search" class="qrc-page-search" placeholder="' . esc_attr__('Search...', 'qr-code-composer') . '">';
        echo '<div class="qrc-page-list">';

        if (!$items) {
            echo '<em>' . esc_html__('Nothing published yet.', 'qr-code-composer') . '</em>';
        }

        foreach ($items as $item) {

            $title = ($item->post_title !== '') ? $item->post_title : sprintf('(no title) #%d', $item->ID);

            printf(
                '<label class="qrccheckboxwrap" data-title="%s">
                    <input type="checkbox" class="qrc-free-cb" value="%d" name="qrc_autogenerate[qrc_free_ids][%s][]" %s>
                    <span class="qrccheckmark"></span>%s
                </label>',
                esc_attr(strtolower($title)),
                $item->ID,
                esc_attr($type),
                checked(in_array($item->ID, $selected, true), true, false),
                esc_html($title)
            );
        }

        echo '</div>';
        echo '<p class="qrc-free-full-note">' . sprintf(
            /* translators: %d: limit per content type */
            esc_html__('Limit reached (%d). Uncheck one to pick another. Pro has no limit.', 'qr-code-composer'),
            $limit
        ) . '</p>';
        echo '</div></div>';
    }

    echo '<p class="qrc-free-pro-note"><span class="dashicons dashicons-lock"></span> ' . esc_html__('Custom post types and unlimited items are available in Pro.', 'qr-code-composer') . ' <a href="' . esc_url(QRC_Free_Limit::PRO_URL) . '" target="_blank" rel="noopener">' . esc_html__('Upgrade to Pro', 'qr-code-composer') . '</a></p>';
}
function qrc_wc_ptab_name()
{

    $options = get_option('qrc_autogenerate');
    $qrc_wc_ptab_name = isset($options['qrc_wc_ptab_name']) ? $options['qrc_wc_ptab_name'] : 'QR Code';

    printf('<input type="text" name="qrc_autogenerate[qrc_wc_ptab_name]" value="%s" placeholder="e:g: QR Code" id="qrc_wc_ptab_name">', $qrc_wc_ptab_name); 

}

    function removeautodisplay()
    {

        $options = get_option('qrc_autogenerate');

        $checked = isset($options['removeautodisplay']) ? 'checked' : '';

        printf('<p><input type="checkbox" id="removeautodisplay" class="qrc-apple-switch" value="removeautodisplay" name="qrc_autogenerate[removeautodisplay]" %s></p>',$checked);

    }
    function removemetabox()
    {

        $options = get_option('qrc_autogenerate');

        $checked = isset($options['removemetabox']) ? 'checked' : '';

        printf('<p><input type="checkbox" class="qrc-apple-switch" value="removemetabox" name="qrc_autogenerate[removemetabox]" %s></p>',$checked);

    }

function qr_alignment()
{

    $options = get_option('qrc_autogenerate');
    $qrc_alignment = isset($options['qrc_select_alignment']) ? $options['qrc_select_alignment'] : '';

    ?>
    <select class="select"  name="qrc_autogenerate[qrc_select_alignment]" id="qr_alignment">
        
    <option value="left" <?php echo esc_attr($qrc_alignment) == 'left' ? 'selected' : '' ?>><?php echo esc_html__('Left', 'qr-code-composer'); ?></option>
    <option value="right" <?php echo esc_attr($qrc_alignment) == 'right' ? 'selected' : '' ?>><?php echo esc_html__('Right', 'qr-code-composer'); ?></option>   
    <option value="center" <?php echo esc_attr($qrc_alignment) == 'center' ? 'selected' : '' ?>><?php echo esc_html__('Center', 'qr-code-composer'); ?></option>

    </select>

    <?php
}



/**
 * This function is a callback function of  add seeting field
 */

function wc_qr_alignment()
{

    $options = get_option('qrc_autogenerate');
    $qrc_wc_alignment = isset($options['qrcppagelocation']) ? $options['qrcppagelocation'] : 'inatab';

    ?>
    <select class="select"  name="qrc_autogenerate[qrcppagelocation]" id="qrcppagelocation">
        
    <option value="inatab" <?php echo esc_attr($qrc_wc_alignment) == 'inatab' ? 'selected' : '' ?>><?php echo esc_html__('In a tab', 'qr-code-composer'); ?></option>
    <option value="endofpmeta" <?php echo esc_attr($qrc_wc_alignment) == 'endofpmeta' ? 'selected' : '' ?>><?php echo esc_html__('End of Product Meta', 'qr-code-composer'); ?></option>    

    <option value="bellowofcart" <?php echo esc_attr($qrc_wc_alignment) == 'bellowofcart' ? 'selected' : '' ?>><?php echo esc_html__('Below the cart button', 'qr-code-composer'); ?></option>

     <option value="abvofcart" <?php echo esc_attr($qrc_wc_alignment) == 'abvofcart' ? 'selected' : '' ?>><?php echo esc_html__('Above of cart Button', 'qr-code-composer'); ?></option>   

    </select>

    <?php
}


/**
 * Qr background Color field
 */
function qr_bgcolor_management()
{

    $options = get_option('qrc_autogenerate');

    $placeholder = esc_html('Use light color for better QR scanning control', 'qr-code-composer');

    $bg_value = (isset($options['background'])) ? $options['background'] : 'transparent';
    printf('<input type="text" name="qrc_autogenerate[background]" value="%s"  id="qr_bg" class="qrc-color-picker" data-alpha-enabled="true"><p style="color:#0707ff"><em>%s</em></p>', $bg_value, $placeholder);

}

/**
 *  Qr Color field
 */

function qr_color_management()
{

    $options = get_option('qrc_autogenerate');

    $value = (isset($options['qr_color'])) ? $options['qr_color'] : '#07009b';
    
    printf('<input type="text" name="qrc_autogenerate[qr_color]" value="%s" class="qrc-color-picker" id="fill">', $value);

}

function qr_stcode_management()
{

    printf('<p class="qrcshortvar">
            <input id="qr_stcode_management" type="text" class="shortcodereadoly" value="[qrc_code_composer]" readonly >
            <button type="button" class="qrcclipbtns" data-clipboard-demo data-clipboard-target="#qr_stcode_management" title="copy shortcode"><span class="dashicons dashicons-admin-page"></span></button>
            </p>');

    printf('<div style="width:%s; padding:10px 0px"><em>'.esc_html__('For developer: ','qr-code-composer').'<span style="color:#673ab7"><em ><</em>?php echo do_shortcode["qrc_code_composer"];<em>?</em>></<em></span></div>', '90%');

}

function qrc_autogenerate_sanitize($input)
{
    $sanitary_values  = array();
    if (isset($input['qrcppagelocation']))
    {
        $sanitary_values ['qrcppagelocation'] = sanitize_text_field($input['qrcppagelocation']);
    }

    if (isset($input['qrc_select_alignment']))
    {
        $sanitary_values['qrc_select_alignment'] = sanitize_text_field($input['qrc_select_alignment']);
    }

    if (isset($input['qrc_wc_select_alignment']))
    {
        $sanitary_values['qrc_wc_select_alignment'] = sanitize_text_field($input['qrc_wc_select_alignment']);
    }  
    if (isset($input['removemetabox']))
    {
        $sanitary_values['removemetabox'] = sanitize_text_field($input['removemetabox']);
    }    

 
    if (isset($input['removeautodisplay']))
    {
        $sanitary_values['removeautodisplay'] = sanitize_text_field($input['removeautodisplay']);
    }    

    if (isset($input['qrchidegutenberg']))
    {
        $sanitary_values['qrchidegutenberg'] = sanitize_text_field($input['qrchidegutenberg']);
    }
     

    if (isset($input['qrc_wc_ptab_name']))
    {
        $sanitary_values['qrc_wc_ptab_name'] = sanitize_text_field($input['qrc_wc_ptab_name']);
    }
            
    // Free limit: store the picked items per type (max N each).
    $old     = get_option('qrc_autogenerate', array());
    $ids     = (isset($old['qrc_free_ids']) && is_array($old['qrc_free_ids'])) ? $old['qrc_free_ids'] : array();
    $present = (isset($input['qrc_free_present']) && is_array($input['qrc_free_present'])) ? $input['qrc_free_present'] : array();
    $limit   = QRC_Free_Limit::limit();

    foreach (QRC_Free_Limit::types() as $type) {

        if (!isset($present[$type])) {
            continue; // this type was not in the form, keep what is saved.
        }

        $raw   = (isset($input['qrc_free_ids'][$type]) && is_array($input['qrc_free_ids'][$type])) ? $input['qrc_free_ids'][$type] : array();
        $clean = array();

        foreach ($raw as $id) {
            $id = absint($id);
            if ($id && get_post_type($id) === $type && !in_array($id, $clean, true)) {
                $clean[] = $id;
            }
        }

        $ids[$type] = array_slice($clean, 0, $limit);
    }

    $sanitary_values['qrc_free_ids'] = $ids;

    return $sanitary_values;
}
}
if(class_exists("QRC_Autogenertae_lite")){
    new QRC_Autogenertae_lite();
}

