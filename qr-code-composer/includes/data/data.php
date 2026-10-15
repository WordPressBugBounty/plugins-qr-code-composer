<?php

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly
    $random_id = rand(37684782, 23297323);
    global $wp;
    $current_id = get_the_id();
    $current_title = get_the_title(get_the_id());
    if ( isset( $wp ) && is_object( $wp ) && isset( $wp->request ) ) {
        $current_id_link = home_url( add_query_arg( array(), $wp->request ) );
    } else {
        // fallback when $wp is not ready
        $current_id_link = esc_url_raw( ( is_ssl() ? 'https://' : 'http://' ) . $_SERVER['HTTP_HOST'] . wp_unslash( $_SERVER['REQUEST_URI'] ) );
    }
    $qrc_meta_display = get_post_meta($current_id, 'qrc_metabox', true);

    $options1 = get_option('qrc_composer_settings');
    
    $qrc_dwnbtn_brdius = isset($options1['qrc_dwnbtn_brdius']) ? $options1['qrc_dwnbtn_brdius'] : '4';
    $qrc_codeshape = isset($options1['qrc_codeshape']) ? $options1['qrc_codeshape'] : 'square';
    $qr_download_fntsz = isset($options1['qr_download_fntsz']) ? $options1['qr_download_fntsz'] : '15';

    $qr_download_brclr = isset($options1['qr_download_brclr']) ? $options1['qr_download_brclr'] : '#c4c4c4';

    $qrcpopup_color = (isset($options1['qrcpopup_color'])) ? $options1['qrcpopup_color'] : '#000';
    $qrcpopupenbl = isset($options1['qrcpopupenbl']) ? 'checked' : '';
    $qrc_design_type = isset($options1['qrc_design_type']) ? $options1['qrc_design_type'] : 'popup';
    $qrc_popupdesign = isset($options1['qrc_popupdesign']) ? $options1['qrc_popupdesign'] : 'center';
    $qrc_tooltipdesign = isset($options1['qrc_tooltipdesign']) ? $options1['qrc_tooltipdesign'] : 'leftTop';

    $qrcpopuptext = isset($options1['qrcpopuptext']) ? $options1['qrcpopuptext'] : 'View To Click';
    $qrcpopup_fntsize = isset($options1['qrcpopup_fntsize']) ? $options1['qrcpopup_fntsize'] : '12';

    $qrcpopup_bg = (isset($options1['qrcpopup_bg'])) ? $options1['qrcpopup_bg'] : '#d3d3d3';
    $qrcpopup_brclr = (isset($options1['qrcpopup_brclr'])) ? $options1['qrcpopup_brclr'] : '#848484';
    $qrcpopup_brdius = (isset($options1['qrcpopup_brdius'])) ? $options1['qrcpopup_brdius'] : '4';
    $popupcustomqr = isset($options1['popupcustomqr']) ? 'checked' : '';
    $popupvcardqr = isset($options1['popupvcardqr']) ? 'checked' : '';
    $popintegrateqr = isset($options1['popintegrateqr']) ? 'checked' : '';
    $popwidgets = isset($options1['popwidgets']) ? 'checked' : '';
    $background = isset($options1['background']) ? $options1['background'] : 'transparent';
    $qrc_dot_style = isset($options1['qrc_dot_style']) ? $options1['qrc_dot_style'] : 'classy-rounded';
    $qrchidefrontend = isset($options1['qrchidefrontend']) ? 'checked' : '';
    $qr_color = isset($options1['qr_color']) ? $options1['qr_color'] : '#000000';  
    
    $qrc_size = isset($options1['qr_code_picture_size_width']) ? $options1['qr_code_picture_size_width'] : 250;
          

    $qr_dwnbtnbg_color = (isset($options1['qr_dwnbtnbg_color'])) ? $options1['qr_dwnbtnbg_color'] : '#e8e8e8';
    $qr_dwnbtn_color = (isset($options1['qr_dwnbtn_color'])) ? $options1['qr_dwnbtn_color'] : '#4c4c4c';
    $download_qr = isset($options1['qr_download_text']) ? $options1['qr_download_text'] : 'Download QR';

    $qr_download_hide = isset($options1['qr_download_hide']) ? $options1['qr_download_hide'] : 'no';
    $qr_code_dsize = isset($options1['qr_code_dsize']) ? $options1['qr_code_dsize'] : 250;

    $placeholder = esc_html('Download image Quality of QR; default 300px', 'qrc_composer_pro');

    $qrcloaders = isset($options1['qrcloaders']) ? $options1['qrcloaders'] : '';

    $qrc_downlofile = isset($options1['qrc_downlofile']) ? $options1['qrc_downlofile'] : 'default';

    $qrccusdnwfile  = isset($options1['qrccusdnwfile']) ? $options1['qrccusdnwfile'] : '';

    if($qrc_downlofile == 'custom'){
    $qrcfielsnames = $qrccusdnwfile;
    }else{
    $qrcfielsnames = get_the_title();
    }

    if($qrchidefrontend == 'checked' && $qrcpopupenbl != 'checked'){
    $displayblock = 'none';
    }else{
    $displayblock = 'inline-block'; 
    }

    
//    $options1 = get_option('qrc_autogenerate');

    $optiauto = get_option('qrc_autogenerate');
    $qrc_alignment = isset($optiauto['qrc_select_alignment']) ? $optiauto['qrc_select_alignment'] : 'left';

    $qrcppagelocation = isset($optiauto['qrcppagelocation']) ? $optiauto['qrcppagelocation'] : 'inatab';

    $options = get_option('qrc_custom_link_generator');


    $qrc_event_summary = isset($options['qrc_event_summary']) ? $options['qrc_event_summary'] : '';    
    $qrc_event_des = isset($options['qrc_event_des']) ? $options['qrc_event_des'] : '';
    $qrc_event_loaction = isset($options['qrc_event_loaction']) ? $options['qrc_event_loaction'] : '';
    $qrc_event_start = isset($options['qrc_event_start']) ? $options['qrc_event_start'] : '';
    $qrc_event_starttime = isset($options['qrc_event_starttime']) ? $options['qrc_event_starttime'] : '';
    $qrc_event_end = isset($options['qrc_event_end']) ? $options['qrc_event_end'] : '';
    $qrc_event_endtime = isset($options['qrc_event_endtime']) ? $options['qrc_event_endtime'] : '';


    $qr_code_custom_text = isset($options['qr_code_custom_text']) ? $options['qr_code_custom_text'] : 'https://sharabindu.com';
    $qr_code_phonenumber = isset($options['qr_code_phonenumber']) ? $options['qr_code_phonenumber'] : '+98732382';
    $qr_code_mail_text = isset($options['qr_code_mail_text']) ? $options['qr_code_mail_text'] : '+1895767567';

    $qr_code_wifi_name = isset($options['qr_code_wifi_name']) ? $options['qr_code_wifi_name'] : 'Sharabindu';
    $qr_code_wifi_type = isset($options['qr_code_wifi_type']) ? $options['qr_code_wifi_type'] : 'WPA';
    $qr_code_wifi_password = isset($options['qr_code_wifi_password']) ? $options['qr_code_wifi_password'] : '1234';        
    $qr_code_maps_text = isset($options['qr_code_maps_text']) ? $options['qr_code_maps_text'] : 'Sharabindu Bakshi';
    $qr_code_lati_type = isset($options['qr_code_lati_type']) ? $options['qr_code_lati_type'] : '23.7709135';
    $qr_code_longitude = isset($options['qr_code_longitude']) ? $options['qr_code_longitude'] : '88.6239061';

    $options2 = get_option('qrc_vcard_generator');

    $name = isset($options2['qrcvcardsingle_name']) ? $options2['qrcvcardsingle_name'] : '';    
    $company = isset($options2['qrcvcardsingle_company']) ? $options2['qrcvcardsingle_company'] : '';
    $subtitle = isset($options2['qrcvcardsingle_subtitle']) ? $options2['qrcvcardsingle_subtitle'] : '';
    $mobile = isset($options2['qrcvcardsingle_mbunber']) ? $options2['qrcvcardsingle_mbunber'] : '';
    $phone = isset($options2['qrcvcardsingle_pbunber']) ? $options2['qrcvcardsingle_pbunber'] : '';
    $email = isset($options2['qrcvcardsingle_email']) ? $options2['qrcvcardsingle_email'] : '';
    $address = isset($options2['qrcvcardsingle_address']) ? $options2['qrcvcardsingle_address'] : '';
    $note = isset($options2['qrcvcardsingle_note']) ? $options2['qrcvcardsingle_note'] : '';
    $website = isset($options2['qrcvcardsingle_website']) ? $options2['qrcvcardsingle_website'] : '';
