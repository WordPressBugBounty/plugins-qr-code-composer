<?php
/**
 * The file that defines the bulk print admin area
 *
 * public-facing side of the site and the admin area.
 *
 * @link       https://sharabindu.com
 * @since      1.0.9
 *
 * @package    qr-code-composer
 * @subpackage qr-code-composer/admin
 */

class QR_code_Admin_settings{

        public function __construct()
        {
        add_action('admin_init', array($this ,'qcr_settings_page'));

       // add_action( 'init', array( $this, 'save_default_settings' ) );

    }

    public function qcr_settings_page()
    {
    register_setting("qrc_composer_settings", "qrc_composer_settings", array(
        $this,'qrc_design_sanitize'
    ));

    
    add_settings_section("qrc_design_section", " ", array($this ,'settting_sec_desfifn'), 'qrc_design_sec');

    add_settings_field("qrc_bodyshape", esc_html__("bodyshape", "qrc_composer_pro"), array($this, "qrc_bodyshape"), 'qrc_design_sec', "qrc_design_section", array('class' => 'qrcpro_nav2'));

    add_settings_field("qrc_eyeshape", esc_html__("EYEshape", "qrc_composer_pro"), array($this, "qrc_eyeshape"), 'qrc_design_sec', "qrc_design_section", array('class' => 'qrcpro_nav3'));

    add_settings_field("qrc_eyeboll", esc_html__("EYEBALL", "qrc_composer_pro"), array($this, "qrc_eyeboll"), 'qrc_design_sec', "qrc_design_section", array('class' => 'qrcpro_nav4'));


    
    add_settings_field("qrc_designsettings", esc_html__("QR code design", "qrc_composer_pro"), array($this, "qrc_designsettings"), 'qrc_design_sec', "qrc_design_section",['class' => 'qrc_newShape qrcpro_nav1']);
    

    add_settings_field("qrc_qrcsize", esc_html__("Size", "qrc_composer_pro"), array($this, "qrc_qrcsize"), 'qrc_design_sec', "qrc_design_section", array('class' => 'qrcpro_nav5'));

    add_settings_field("qrc_qldof", esc_html__("Logo", "qrc_composer_pro"), array($this, "qrc_qldof"), 'qrc_design_sec', "qrc_design_section", array('class' => 'qrcpro_nav6'));

   add_settings_field("qrc_dwnloadbtndfyuytu", esc_html__("Download Buttonn", "qrc_composer_pro"), array($this, "qrc_dwnloadbtndfyuytu"), 'qrc_design_sec', "qrc_design_section", array('class' => 'qrcpro_nav7'));

    add_settings_field("qrc_Miscellaneous", esc_html__("Miscellaneous", "qrc_composer_pro"), array($this, "qrc_Miscellaneous"), 'qrc_design_sec', "qrc_design_section", array('class' => 'qrcpro_nav8'));
    add_settings_field("qrc_prset", esc_html__("Preset", "qrc_composer_pro"), array($this, "qrc_prset"), 'qrc_design_sec', "qrc_design_section", array('class' => 'qrcpro_nav9'));









    }
  
function qrc_prset(){
    ?>
          <div class="panel panellast pbarcode_borderradius" id="qrcMiscellaneous">

         <h3 class="fqr_section_title"><?php echo esc_html__('Preset', 'qrc_composer_pro'); ?><span class="qrcprofetdisbd">PRO</span></h3>

    <p class=" sectiondecation"><?php echo esc_html__('Presets are ready-made QR code designs that combine professionally selected colors, shapes, gradients, and styling options into a single click. Simply choose a preset to instantly apply a complete design without manually configuring each setting.
', 'qrc_composer_pro') ?></p>
    <p class=" sectiondecation"><?php echo esc_html__('After applying a preset, you can fully customize the QR code to match your brand or personal preferences. Adjust colors, gradients, dot styles, eye shapes, logos, borders, and other design settings as needed.
', 'qrc_composer_pro') ?></p>

<div class="qrc_preset_checkboxeswrap">
<div id="qrc_preset_checkboxes" class="qrc_preset_checkboxes">
<label title="QR Preset 64">
    <input type="radio" name="qrc_preset" value="64">
    <img src="<?php echo QRC_COMPOSER_URL ?>admin/img/presets/qr-code (66).png">
</label>

<label title="QR Preset 0">
    <input type="radio" name="qrc_preset" value="0">
    <img src="<?php echo QRC_COMPOSER_URL ?>admin/img/presets/qr-code.png">
</label>
<label title="QR Preset 67">
    <input type="radio" name="qrc_preset" value="67">
    <img src="<?php echo QRC_COMPOSER_URL ?>admin/img/presets/qr-code (81).png">
</label>
<label title="QR Preset 68">
    <input type="radio" name="qrc_preset" value="68">
    <img src="<?php echo QRC_COMPOSER_URL ?>admin/img/presets/qr-code (80).png">
</label>
<label title="QR Preset 69">
    <input type="radio" name="qrc_preset" value="69">
    <img src="<?php echo QRC_COMPOSER_URL ?>admin/img/presets/qr-code (79).png">
</label>

<label title="QR Preset 51">
    <input type="radio" name="qrc_preset" value="51">
    <img src="<?php echo QRC_COMPOSER_URL ?>admin/img/presets/qr-code (50).png">
</label>

<label title="QR Preset 52">
    <input type="radio" name="qrc_preset" value="52">
    <img src="<?php echo QRC_COMPOSER_URL ?>admin/img/presets/qr-code (51).png">
</label>

<label title="QR Preset 53">
    <input type="radio" name="qrc_preset" value="53">
    <img src="<?php echo QRC_COMPOSER_URL ?>admin/img/presets/qr-code (52).png">
</label>

<label title="QR Preset 54">
    <input type="radio" name="qrc_preset" value="54">
    <img src="<?php echo QRC_COMPOSER_URL ?>admin/img/presets/qr-code (53).png">
</label>

<label title="QR Preset 55">
    <input type="radio" name="qrc_preset" value="55">
    <img src="<?php echo QRC_COMPOSER_URL ?>admin/img/presets/qr-code (54).png">
</label>

<label title="QR Preset 56">
    <input type="radio" name="qrc_preset" value="56">
    <img src="<?php echo QRC_COMPOSER_URL ?>admin/img/presets/qr-code (55).png">
</label>

<label title="QR Preset 57">
    <input type="radio" name="qrc_preset" value="57">
    <img src="<?php echo QRC_COMPOSER_URL ?>admin/img/presets/qr-code (56).png">
</label>

<label title="QR Preset 58">
    <input type="radio" name="qrc_preset" value="58">
    <img src="<?php echo QRC_COMPOSER_URL ?>admin/img/presets/qr-code (57).png">
</label>

<label title="QR Preset 59">
    <input type="radio" name="qrc_preset" value="59">
    <img src="<?php echo QRC_COMPOSER_URL ?>admin/img/presets/qr-code (58).png">
</label>

<label title="QR Preset 60">
    <input type="radio" name="qrc_preset" value="60">
    <img src="<?php echo QRC_COMPOSER_URL ?>admin/img/presets/qr-code (59).png">
</label>

<label title="QR Preset 61">
    <input type="radio" name="qrc_preset" value="61">
    <img src="<?php echo QRC_COMPOSER_URL ?>admin/img/presets/qr-code (60).png">
</label>

<label title="QR Preset 62">
    <input type="radio" name="qrc_preset" value="62">
    <img src="<?php echo QRC_COMPOSER_URL ?>admin/img/presets/qr-code (61).png">
</label>
<label title="QR Preset 63">
    <input type="radio" name="qrc_preset" value="63">
    <img src="<?php echo QRC_COMPOSER_URL ?>admin/img/presets/qr-code (67).png">
</label>

<label title="QR Preset 65">
    <input type="radio" name="qrc_preset" value="65">
    <img src="<?php echo QRC_COMPOSER_URL ?>admin/img/presets/qr-code (68).png">
</label>
<label title="QR Preset 50">
    <input type="radio" name="qrc_preset" value="50">
    <img src="<?php echo QRC_COMPOSER_URL ?>admin/img/presets/qr-code (69).png">
</label>


<label title="QR Preset 2">
    <input type="radio" name="qrc_preset" value="2">
    <img src="<?php echo QRC_COMPOSER_URL ?>admin/img/presets/qr-code (2).png">
</label>

<label title="QR Preset 3">
    <input type="radio" name="qrc_preset" value="3">
    <img src="<?php echo QRC_COMPOSER_URL ?>admin/img/presets/qr-code (3).png">
</label>

<label title="QR Preset 4">
    <input type="radio" name="qrc_preset" value="4">
    <img src="<?php echo QRC_COMPOSER_URL ?>admin/img/presets/qr-code (4).png">
</label>


<label title="QR Preset 6">
    <input type="radio" name="qrc_preset" value="6">
    <img src="<?php echo QRC_COMPOSER_URL ?>admin/img/presets/qr-code (6).png">
</label>

<label title="QR Preset 7">
    <input type="radio" name="qrc_preset" value="7">
    <img src="<?php echo QRC_COMPOSER_URL ?>admin/img/presets/qr-code (7).png">
</label>

<label title="QR Preset 8">
    <input type="radio" name="qrc_preset" value="8">
    <img src="<?php echo QRC_COMPOSER_URL ?>admin/img/presets/qr-code (8).png">
</label>


<label title="QR Preset 10">
    <input type="radio" name="qrc_preset" value="10">
    <img src="<?php echo QRC_COMPOSER_URL ?>admin/img/presets/qr-code (10).png">
</label>


<label title="QR Preset 13">
    <input type="radio" name="qrc_preset" value="13">
    <img src="<?php echo QRC_COMPOSER_URL ?>admin/img/presets/qr-code (13).png">
</label>


<label title="QR Preset 15">
    <input type="radio" name="qrc_preset" value="15">
    <img src="<?php echo QRC_COMPOSER_URL ?>admin/img/presets/qr-code (15).png">
</label>

<label title="QR Preset 16">
    <input type="radio" name="qrc_preset" value="16">
    <img src="<?php echo QRC_COMPOSER_URL ?>admin/img/presets/qr-code (16).png">
</label>


<label title="QR Preset 18">
    <input type="radio" name="qrc_preset" value="18">
    <img src="<?php echo QRC_COMPOSER_URL ?>admin/img/presets/qr-code (18).png">
</label>


<label title="QR Preset 20">
    <input type="radio" name="qrc_preset" value="20">
    <img src="<?php echo QRC_COMPOSER_URL ?>admin/img/presets/qr-code (20).png">
</label>


<label title="QR Preset 22">
    <input type="radio" name="qrc_preset" value="22">
    <img src="<?php echo QRC_COMPOSER_URL ?>admin/img/presets/qr-code (22).png">
</label>

<label title="QR Preset 23">
    <input type="radio" name="qrc_preset" value="23">
    <img src="<?php echo QRC_COMPOSER_URL ?>admin/img/presets/qr-code (23).png">
</label>

<label title="QR Preset 24">
    <input type="radio" name="qrc_preset" value="24">
    <img src="<?php echo QRC_COMPOSER_URL ?>admin/img/presets/qr-code (24).png">
</label>


<label title="QR Preset 26">
    <input type="radio" name="qrc_preset" value="26">
    <img src="<?php echo QRC_COMPOSER_URL ?>admin/img/presets/qr-code (26).png">
</label>


<label title="QR Preset 28">
    <input type="radio" name="qrc_preset" value="28">
    <img src="<?php echo QRC_COMPOSER_URL ?>admin/img/presets/qr-code (28).png">
</label>

<label title="QR Preset 30">
    <input type="radio" name="qrc_preset" value="30">
    <img src="<?php echo QRC_COMPOSER_URL ?>admin/img/presets/qr-code (30).png">
</label>


<label title="QR Preset 32">
    <input type="radio" name="qrc_preset" value="32">
    <img src="<?php echo QRC_COMPOSER_URL ?>admin/img/presets/qr-code (32).png">
</label>

<label title="QR Preset 33">
    <input type="radio" name="qrc_preset" value="33">
    <img src="<?php echo QRC_COMPOSER_URL ?>admin/img/presets/qr-code (33).png">
</label>

<label title="QR Preset 35">
    <input type="radio" name="qrc_preset" value="35">
    <img src="<?php echo QRC_COMPOSER_URL ?>admin/img/presets/qr-code (35).png">
</label>

<label title="QR Preset 36">
    <input type="radio" name="qrc_preset" value="36">
    <img src="<?php echo QRC_COMPOSER_URL ?>admin/img/presets/qr-code (36).png">
</label>


<label title="QR Preset 38">
    <input type="radio" name="qrc_preset" value="38">
    <img src="<?php echo QRC_COMPOSER_URL ?>admin/img/presets/qr-code (38).png">
</label>


<label title="QR Preset 40">
    <input type="radio" name="qrc_preset" value="40">
    <img src="<?php echo QRC_COMPOSER_URL ?>admin/img/presets/qr-code (40).png">
</label>
<label title="QR Preset 1">
    <input type="radio" name="qrc_preset" value="1">
    <img src="<?php echo QRC_COMPOSER_URL ?>admin/img/presets/qr-code (1).png">
</label>

<label title="QR Preset 14">
    <input type="radio" name="qrc_preset" value="14">
    <img src="<?php echo QRC_COMPOSER_URL ?>admin/img/presets/qr-code (14).png">
</label>
<label title="QR Preset 5">
    <input type="radio" name="qrc_preset" value="5">
    <img src="<?php echo QRC_COMPOSER_URL ?>admin/img/presets/qr-code (5).png">
</label>

<label title="QR Preset 17">
    <input type="radio" name="qrc_preset" value="17">
    <img src="<?php echo QRC_COMPOSER_URL ?>admin/img/presets/qr-code (17).png">
</label>

<label title="QR Preset 9">
    <input type="radio" name="qrc_preset" value="9">
    <img src="<?php echo QRC_COMPOSER_URL ?>admin/img/presets/qr-code (9).png">
</label>
<label title="QR Preset 11">
    <input type="radio" name="qrc_preset" value="11">
    <img src="<?php echo QRC_COMPOSER_URL ?>admin/img/presets/qr-code (11).png">
</label>
<label title="QR Preset 66">
    <input type="radio" name="qrc_preset" value="66">
    <img src="<?php echo QRC_COMPOSER_URL ?>admin/img/presets/qr-code (70).png">
</label>

<label title="QR Preset 19">
    <input type="radio" name="qrc_preset" value="19">
    <img src="<?php echo QRC_COMPOSER_URL ?>admin/img/presets/qr-code (19).png">
</label>

<label title="QR Preset 21">
    <input type="radio" name="qrc_preset" value="21">
    <img src="<?php echo QRC_COMPOSER_URL ?>admin/img/presets/qr-code (21).png">
</label>

<label title="QR Preset 25">
    <input type="radio" name="qrc_preset" value="25">
    <img src="<?php echo QRC_COMPOSER_URL ?>admin/img/presets/qr-code (25).png">
</label>

<label title="QR Preset 27">
    <input type="radio" name="qrc_preset" value="27">
    <img src="<?php echo QRC_COMPOSER_URL ?>admin/img/presets/qr-code (27).png">
</label>

<label title="QR Preset 29">
    <input type="radio" name="qrc_preset" value="29">
    <img src="<?php echo QRC_COMPOSER_URL ?>admin/img/presets/qr-code (29).png">
</label>


<label title="QR Preset 31">
    <input type="radio" name="qrc_preset" value="31">
    <img src="<?php echo QRC_COMPOSER_URL ?>admin/img/presets/qr-code (31).png">
</label>

<label title="QR Preset 34">
    <input type="radio" name="qrc_preset" value="34">
    <img src="<?php echo QRC_COMPOSER_URL ?>admin/img/presets/qr-code (34).png">
</label>


<label title="QR Preset 37">
    <input type="radio" name="qrc_preset" value="37">
    <img src="<?php echo QRC_COMPOSER_URL ?>admin/img/presets/qr-code (37).png">
</label>

<label title="QR Preset 39">
    <input type="radio" name="qrc_preset" value="39">
    <img src="<?php echo QRC_COMPOSER_URL ?>admin/img/presets/qr-code (39).png">
</label>
<label title="Custom Design">
    <input type="radio" name="qrc_preset" value="001">
    <div class="designyourown">Design Your Own</div>
</label>
</div>
    <p class="qrprest">Border + Label</p>
    <div id="qrc_preset_checkboxes1" class="qrc_preset_checkboxes" style="padding-bottom:36px;">
<label title="QR Preset 41"><input type="radio" name="qrc_preset" value="41"> <img src="<?php echo QRC_COMPOSER_URL ?>admin/img/presets/qr-code (41).png"></label>
<label title="QR Preset 42"><input type="radio" name="qrc_preset" value="42"> <img src="<?php echo QRC_COMPOSER_URL ?>admin/img/presets/qr-code (42).png"></label>
<label title="QR Preset 43"><input type="radio" name="qrc_preset" value="43"> <img src="<?php echo QRC_COMPOSER_URL ?>admin/img/presets/qr-code (43).png"></label>
<label title="QR Preset 44"><input type="radio" name="qrc_preset" value="44"> <img src="<?php echo QRC_COMPOSER_URL ?>admin/img/presets/qr-code (44).png"></label>
<label title="QR Preset 45"><input type="radio" name="qrc_preset" value="45"> <img src="<?php echo QRC_COMPOSER_URL ?>admin/img/presets/qr-code (45).png"></label>
<label title="QR Preset 46"><input type="radio" name="qrc_preset" value="46"> <img src="<?php echo QRC_COMPOSER_URL ?>admin/img/presets/qr-code (46).png"></label>
<label title="QR Preset 47"><input type="radio" name="qrc_preset" value="47"> <img src="<?php echo QRC_COMPOSER_URL ?>admin/img/presets/qr-code (47).png"></label>

    </div>
    </div>
    </div>

    <?php
}
    
function settting_sec_desfifn(){
    return true;
}
    /**
     * This function is a callback function of  add seeting section
     */
    function qrc_designsettings()
    {  

      include QRC_COMPOSER_PATH . 'includes/data/data.php';?>


    <div class="panel qrcpro_choosebalabel">
                  <h3 class="fqr_section_title"><?php echo esc_html('QR Code Shape + Border + Label','qrc_composer_pro'); ?></h3>

                  <p class=" sectiondecation"><?php echo esc_html__('Select the shape style for your QR code. Choose between a classic square design or a modern circular design to match your branding or visual preferences.', 'qrc_composer_pro') ?></p>
                  <div class="quickcolorwrapper">
                     <span class="quilclcoroption"><?php echo esc_html__('Choose Shape', 'qrc_composer_pro'); ?></span> 
                     <select class="select"  name="qrc_composer_settings[qrc_codeshape]" id="qrc_codeshape">
                    <option value="square" <?php echo esc_attr($qrc_codeshape) == 'square' ? 'selected' : '' ?>><?php echo esc_html__('Square', 'qrc_composer_pro'); ?></option>
                    <option value="circle" <?php echo esc_attr($qrc_codeshape) == 'circle' ? 'selected' : '' ?>><?php echo esc_html__('circle', 'qrc_composer_pro'); ?></option>
                
                     </select></div>
 
    <div class="quickcolorwrapper">
   <ul class="dkfjkjdjTwpfui">
    <li><span class="quilclcoroption"><?php echo esc_html__('Add Border Or Label?', 'qrc_composer_pro'); ?>

                     <select class="select"  id="qrcborder">
                        <option value="1" ><?php echo esc_html__('Yes', 'qrc_composer_pro'); ?></option>

                        <option value="0" selected><?php echo esc_html__('No', 'qrc_composer_pro'); ?></option>

                     </select><span class="qrcprofetdisbd">PRO</span></li>  
                                  
                </ul></div>

    <div class="quickcolorwrapper adbrlbel">
        <span class="quilclcoroption"><?php echo esc_html__('Border Round:', 'qrc_composer_pro'); ?></span>  <?php 
         printf('<input class="qrcranges" id="qrcbround" type="range" min="0" max="1" step="0.1"   oninput="qrcbroundnum.value = this.value"><input type="number" id="qrcbroundnum" min="0" max="1" step="0.1" oninput="qrcbround.value = this.value">');?></div>

    <div class="quickcolorwrapper adbrlbel profetures">
        <span class="quilclcoroption"><?php echo esc_html__('Thickness of Border:', 'qrc_composer_pro'); ?></span>  <?php 
         printf('<input class="qrcranges" id="qrcbthikns" type="range" min="0" max="100"  oninput="qrcbthiknsnum.value = this.value"><input type="number" id="qrcbthiknsnum"  min="0" max="100" oninput="qrcbthikns.value = this.value">');?>
     <p style="margin-bottom:20px;margin-top:10px;color: #838383;"><em><?php echo esc_html__('It is recommended to keep the Margin value equal to or greater than the Thickness value.', 'qrc_composer_pro'); ?></em></p>

     </div>


        <div class="quickcolorwrapper profetures"> <span class="quilclcoroption"><?php echo esc_html__('Margin:', 'qrc_composer_pro'); ?></span> <span class="qrcprofetdisbd">PRO</span>
                     <?php   
        printf('<input class="qrcranges"   id="qrmargin" type="range" min="0" step="1" max="100" "oninput="num6.value = this.value"><input type="number" id="num6"  min="0" step="1" max="100" oninput="qrmargin.value = this.value">'); ?>

     <p style="margin-bottom:20px;margin-top:10px;color: #838383;"><em><?php echo esc_html__('The clear, empty space surrounding a QR Code on all sides.', 'qrc_composer_pro'); ?></em></p>
              </div>


    <div class="quickcolorwrapper adbrlbel profetures">
        <span class="quilclcoroption"><?php echo esc_html__('Dasharray:', 'qrc_composer_pro'); ?></span>  <?php 
         printf('<input id="qrcdasharray1" type="number" min="0" max="20" name="qrc_composer_settings[qrcdasharray1]" value="%s"><input id="qrcdasharray2" type="number" min="0" max="20" name="qrc_composer_settings[qrcdasharray2]" value="%s">', $qrcdasharray1,$qrcdasharray2);?>

    <p style="margin-bottom:20px;margin-top:10px;color: #838383;"> <em><?php echo esc_html__('This setting allows a dashed border. The first field controls dash width, the second controls dash count. Set the first to 0 and the second to 1 to remove the border, or both to 0 for a solid border.', 'qrc_composer_pro'); ?></em></p>
     </div>    

         <div class="quickcolorwrapper adbrlbel profetures"><div class="colorcodes">
            <span class="quilclcoroption"><?php echo esc_html__('Border Color', 'qrc_composer_pro'); ?></span>      
       <?php
        printf('<input type="text" name="qrc_composer_settings[qrcbordercolor]" value="%s" id="qrcbordercolor" class="qrcolor">', $qrcbordercolor); ?> </div></div>

    <div class=" quickcolorwrapper adbrlbel">
   <ul class="dkfjkjdjTwpfui hideshcode">
    <li><span class="quilclcoroption"><?php echo esc_html__('Enable Label for Top ?', 'qrc_composer_pro'); ?></span></li>

     <li class="qrcprojkffkjf">
        <select class="select" id="qrccstlabelactive">
        <option value="1" selected><?php echo esc_html__('Yes', 'qrc_composer_pro'); ?></option>

        <option value="0"><?php echo esc_html__('No', 'qrc_composer_pro'); ?></option>

        </select></li>               
                </ul>



         <div class="quickcolorwrapper adbrlbel1 profetures">
            <span class="quilclcoroption"><?php echo esc_html__('Input Text', 'qrc_composer_pro'); ?></span>  
            <?php     
        printf('<input type="text" placeholder="Sharabindu" id="qrccustomlabel">');  ?> 
     </div>

         <div class="quickcolorwrapper adbrlbel1 profetures">
            <span class="quilclcoroption"><?php echo esc_html__('Font Size', 'qrc_composer_pro'); ?></span>  
            <?php     
        printf('<input type="number" name="qrc_composer_settings[qrccuslabfnt]" value="%s" placeholder="20" id="qrccuslabfnt" min="10" max="100">', $qrccuslabfnt);  ?> </div>
         <div class="quickcolorwrapper adbrlbel1 profetures"><div class="colorcodes">
            <span class="quilclcoroption"><?php echo esc_html__('Text Color', 'qrc_composer_pro'); ?></span>  
            <?php     
        printf('<input type="text" name="qrc_composer_settings[qrccuslabclr]" value="%s" id="qrccuslabclr" class="qrcolor">', $qrccuslabclr);  ?> </div></div> 
        </div> 

    <div class="quickcolorwrapper adbrlbel">
   <ul class="dkfjkjdjTwpfui">
    <li><span class="quilclcoroption"><?php echo esc_html__('Enable Label for Bottom ?', 'qrc_composer_pro'); ?></span></li>

     <li class="qrcprojkffkjf">

        <select class="select"  name="qrc_composer_settings[qrccstlabel2active]" id="qrccstlabel2active">
        <option value="1"><?php echo esc_html__('Yes', 'qrc_composer_pro'); ?></option>

        <option value="0"><?php echo esc_html__('No', 'qrc_composer_pro'); ?></option>

        </select></li>               
                </ul>

         <div class="quickcolorwrapper adbrlbel2 hideshcode">
            <span class="quilclcoroption"><?php echo esc_html__('Input Text', 'qrc_composer_pro'); ?></span>  
            <?php     
        printf('<input type="text" name="qrc_composer_settings[qrccustomlabel2]" value="%s" placeholder="Sharabindu" id="qrccustomlabel2">', $qrccustomlabel2);  ?> </div>     

         <div class="quickcolorwrapper adbrlbel2 hideshcode">
            <span class="quilclcoroption"><?php echo esc_html__('Font Size', 'qrc_composer_pro'); ?></span>  
            <?php     
        printf('<input type="number" name="qrc_composer_settings[qrccuslabfnt2]" value="%s" placeholder="20" id="qrccuslabfnt2" min="10" max="100">', $qrccuslabfnt2);  ?> </div>

         <div class="quickcolorwrapper adbrlbel2 hideshcode">

            <div class="colorcodes">
            <span class="quilclcoroption"><?php echo esc_html__('Text Color', 'qrc_composer_pro'); ?></span>  
            <?php     
        printf('<input type="text" name="qrc_composer_settings[qrccuslabclr2]" value="%s" id="qrccuslabclr2" class="qrcolor">', $qrccuslabclr2);  ?> </div> </div>
        </div>
              </div>
 <?php 
  }


    /**
     * This function is a callback function of  add seeting section
     */
    function qrc_bodyshape(){  
      include QRC_COMPOSER_PATH . 'includes/data/data.php';?>

                <div class="panel qrcpro_titcolor">
                  <h3 class="fqr_section_title"><?php echo esc_html('Body Dot Shape','qrc_composer_pro'); ?></h3>

                  <p class=" sectiondecation"><?php echo esc_html__('This feature allows you to customize the dot design of the QR code. Choose your preferred style, and for gradient colors, select two complementary colors. For a solid color, use the same color code for both.', 'qrc_composer_pro') ?></p>
                  <div class="quickcolorwrapper">
                     <span class="quilclcoroption"><?php echo esc_html__('Choose Design', 'qrc_composer_pro'); ?></span> 
                     <select class="select"  name="qrc_composer_settings[qrc_dot_style]" id="qrc_dot_style">
                        <option value="square" <?php echo esc_attr($qrc_dot_style) == 'square' ? 'selected' : '' ?>><?php echo esc_html__('Square', 'qrc_composer_pro'); ?></option>
                        <option value="dots" <?php echo esc_attr($qrc_dot_style) == 'dots' ? 'selected' : '' ?>><?php echo esc_html__('Dots', 'qrc_composer_pro'); ?></option>
                        <option value="rounded" <?php echo esc_attr($qrc_dot_style) == 'rounded' ? 'selected' : '' ?>><?php echo esc_html__('Rounded', 'qrc_composer_pro'); ?></option>
                        <option value="extra-rounded" <?php echo esc_attr($qrc_dot_style) == 'extra-rounded' ? 'selected' : '' ?>><?php echo esc_html__('Extra Rounded', 'qrc_composer_pro'); ?></option>
                        <option value="classy" <?php echo esc_attr($qrc_dot_style) == 'classy' ? 'selected' : '' ?>><?php echo esc_html__('Classy', 'qrc_composer_pro'); ?></option>
                        <option value="classy-rounded" <?php echo esc_attr($qrc_dot_style) == 'classy-rounded' ? 'selected' : '' ?>><?php echo esc_html__('Classy Rounded', 'qrc_composer_pro'); ?></option>
                     </select>
                  </div>
                  <div class="quickcolorwrapper"><?php
       printf('<div class="colorcodes"><span class="quilclcoroption">'.esc_html__('First Color', 'qrc_composer_pro').'</span><input  class="qrcolor" type="text" id="colors1" name="qrc_composer_settings[qr_color]" value="%s" ></div>', $qr_color);

    echo '<div class="colorcodes"><span class="quilclcoroption">'.esc_html__('Second Color', 'qrc_composer_pro').'</span>
<div class="qrc-color-picker-btn qrc-pro-trigger" 
         data-title="Upgrade to Pro!" 
         data-message="Upgrade to Pro to unlock gradient colors.">
        <span class="qrc-color-preview" style="background-color:#ffffff;"></span>
        <span class="qrc-btn-text">Select Color</span>
    </div>
    <span class="qrcprofetdisbd">PRO</span>
</div>

';                  
?><!-- Example 1: Custom Logo Upload Button -->

                  </div>
        <div class="quickcolorwrapper hideshcode">
                     <span class="quilclcoroption"><?php echo esc_html__('Type:', 'qrc_composer_pro'); ?></span>
    <select class="select"  id="qrc_dot_type">
        <option value="linear" ><?php echo esc_html__('linear', 'qrc_composer_pro'); ?></option>
    <option value="radial"><?php echo esc_html__('Radial', 'qrc_composer_pro'); ?></option>
    </select><span class="qrcprofetdisbd">PRO</span>
          </div>
    <div class="quickcolorwrapper hideshcode">
        <span class="quilclcoroption"><?php echo esc_html__('Rotation:', 'qrc_composer_pro'); ?></span>  <?php 
         printf('<input class="qrcranges" id="dotrotation" type="range" min="0" max="360"  oninput="dotrotationnum.value = this.value"><input type="number" id="dotrotationnum" min="0" max="360" oninput="dotrotation.value = this.value"><span class="qrcprofetdisbd">PRO</span>');?>
  
               
                  </div>
       <div class="quickcolorwrapper hideshcode">
        <span class="quilclcoroption"><?php echo esc_html__('Error Correction Level:', 'qrc_composer_pro'); ?></span> <span class="qrcprofetdisbd">PRO</span>                 
        <select class="select" name="qrc_composer_settings[ecLevel]"  id="qrdotlevel">
         <option value="L"><?php echo esc_html__('L - low (7%)', 'qrc_composer_pro'); ?></option>
         <option value="M"><?php echo esc_html__('M - medium (15%)', 'qrc_composer_pro'); ?></option>
         <option value="Q"><?php echo esc_html__('Q - quartile (25%)', 'qrc_composer_pro'); ?></option>
         <option value="H"><?php echo esc_html__('H - high (30%)', 'qrc_composer_pro'); ?></option>
           </select>
<p style="padding-bottom: 20px;padding-top: 20px;"><em><?php echo esc_html__('Defines how much of the QR code can be recovered if damaged. Higher levels offer more recovery but reduce capacity.', 'qrc_composer_pro'); ?></em></p>

                  </div>
               </div>

    <?php
    }
    /**
     * This function is a callback function of  add seeting section
     */
    function qrc_eyeshape(){  

      include QRC_COMPOSER_PATH . 'includes/data/data.php';?>

   <div class="panel qrcpro_pricecolor">
                  <h3 class="fqr_section_title"><?php echo esc_html__('Eye Frame Shape', 'qrc_composer_pro'); ?><span class="qrcprofetdisbd">PRO</span></h3>
                  <div class="quickcolorwrapper">
            <span class="quilclcoroption"><?php echo esc_html__('Choose Design', 'qrc_composer_pro'); ?></span>  
        <select  class="select">
        <option value="square"><?php echo esc_html__('Square', 'qrc_composer_pro'); ?></option>
          <option value="dot"><?php echo esc_html__('Circle', 'qrc_composer_pro'); ?></option>
        <option value=""><?php echo esc_html__('Classy', 'qrc_composer_pro'); ?></option>
           <option value="extra-rounded"><?php echo esc_html__('Classy rounded', 'qrc_composer_pro'); ?></option>
                     </select>
                  </div>
        <div class="quickcolorwrapper">
                     <?php 
        printf('<div class="colorcodes"><span class="quilclcoroption">'.esc_html__('First Color', 'qrc_composer_pro').'</span><input type="text" class="qrcolor" id="colors3" ></div>'); 
                                      
        printf('<div class="colorcodes"><span class="quilclcoroption">'.esc_html__('Second Color', 'qrc_composer_pro').'</span><input type="text"  class="qrcolor"  id="colors4"> <p class="description">'.esc_html__('To create a single color, enter the same color code for both fields.', 'qrc_composer_pro').'</p></div>'); ?>
                  </div>
        <div class="quickcolorwrapper hideshcode">
         <span class="quilclcoroption"><?php echo esc_html__('Type:', 'qrc_composer_pro'); ?></span>
       <select class="select" id="qrc_ccsq_style">
      <option value="linear"><?php echo esc_html__('Linear', 'qrc_composer_pro'); ?></option>
      <option value="radial"><?php echo esc_html__('Radial', 'qrc_composer_pro'); ?></option>
                     </select>
                  </div>
                  <div class="quickcolorwrapper hideshcode">
        <span class="quilclcoroption"><?php echo esc_html__('Rotation:', 'qrc_composer_pro'); ?></span>  
     <?php 
      printf('<input class="qrcranges"   id="qrsqrote" type="range" min="0" max="360"  oninput="num1.value = this.value"><input type="number" id="num1"  min="0" max="360"oninput="qrsqrote.value = this.value">');
        ?>                                      

                  </div>
               </div>
               <?php

           }
    /**
     * This function is a callback function of  add seeting section
     */
    function qrc_eyeboll(){  
      include QRC_COMPOSER_PATH . 'includes/data/data.php';?>
               <div class="panel qrcpro_madeby">
                  <h3 class="fqr_section_title"><?php echo esc_html__('Eye Ball Shape', 'qrc_composer_pro'); ?><span class="qrcprofetdisbd">PRO</span></h3>
                  <div class="quickcolorwrapper">
                     <span class="quilclcoroption"><?php echo esc_html__('Choose Design:', 'qrc_composer_pro'); ?></span>  
                     <select>
                        <option value="square"><?php echo esc_html__('Square', 'qrc_composer_pro'); ?></option>
                        <option value="dot"><?php echo esc_html__('Circle', 'qrc_composer_pro'); ?></option>
                        <option value=""><?php echo esc_html__('Classy', 'qrc_composer_pro'); ?></option>
                     </select>
                  </div>
                  <div class="quickcolorwrapper"><?php 
        printf('<div class="colorcodes"><span class="quilclcoroption">'.esc_html__('First Color', 'qrc_composer_pro').'</span><input type="text"  class="qrcolor" id="colors5"></div>');
                                  
        printf('<div class="colorcodes"><span class="quilclcoroption">'.esc_html__('Second Color', 'qrc_composer_pro').'</span><input  type="text"   class="qrcolor" id="colors6"><p class="description">'.esc_html__('To create a single color, enter the same color code for both fields.', 'qrc_composer_pro').'</p></div>');?>
            </div>
     <div class="quickcolorwrapper hideshcode">
        <span class="quilclcoroption"> <?php echo esc_html__('Type:', 'qrc_composer_pro') ?> </span>   
    <select class="select">
                        <option value="linear"><?php echo esc_html__('Linear', 'qrc_composer_pro'); ?></option>
                        <option value="radial"><?php echo esc_html__('Radial', 'qrc_composer_pro'); ?></option>
                     </select>
                  </div>
                  <div class="quickcolorwrapper hideshcode">
             <span class="quilclcoroption"> <?php echo esc_html__('Rotation:', 'qrc_composer_pro') ?> </span>
            <?php 
        printf('<input class="qrcranges"  id="cordotrotae" type="range" min="0" max="360" oninput="num3.value = this.value"><input type="number" id="num3" min="0" max="360" oninput="cordotrotae.value = this.value">');?>
                  </div>
               </div>


 <?php
}

    /**
     * This function is a callback function of  add seeting section
     */
    function qrc_qrcsize(){  

      include QRC_COMPOSER_PATH . 'includes/data/data.php';?>


               <div class="panel qrcpro_barnd">
                  <h3 class="fqr_section_title" style='margin-top:0'><?php echo esc_html('QR Code Size, Background, Loader','qrc_composer_pro'); ?></h3>
            <div class="quickcolorwrapper">

                  <p>
        <p class="labelmargin"><span class="quilclcoroption"><?php echo esc_html__('QR Code Frontend Size:', 'qrc_composer_pro'); ?></span></p>  
            <?php
        printf('<input type="range" class="qrcranges"  name="qrc_composer_settings[qr_code_picture_size_width]"  id="qwe_sizw" min="50" step="1" max="600" value="%s" oninput="num7.value = this.value"><input type="number" id="num7" value="%s" min="50" step="1" max="600" oninput="qwe_sizw.value = this.value">', $qrc_size, $qrc_size);
                                     
                                     ?>
                  </p>
    <p style="margin-bottom:20px;margin-top:10px;color: #838383;"><em><?php echo esc_html__('Set the display size of the QR code as it appears on the frontend of your website', 'qrc_composer_pro'); ?></em></p>


                  <div class="hideshcode profetures">

        <p class="labelmargin"><span class="quilclcoroption" ><?php echo esc_html__('Download QR Code Size:', 'qrc_composer_pro'); ?></span><span class="qrcprofetdisbd">PRO</span> </p>  
            <?php
        printf('<input type="range" min="100" max="1000" step="50" class="qrcranges"   id="qrsize"  oninput="numdo.value = this.value"><input type="number" id="numdo" value="1000"  min="100" max="1000" step="50" oninput="qrsize.value = this.value">');
                                     
                                     ?>
    <p style="margin-bottom:20px;margin-top:10px;max-width:80%;color: #838383;"><em><?php echo esc_html__('Set the size and resolution of the QR code for download to ensure high-quality results.', 'qrc_composer_pro'); ?></em></p>

                  </div>


    <p>
      <?php
      printf('<span class="quilclcoroption" style="margin-right:20px">'.esc_html__('Background Color: ', 'qrc_composer_pro').'</span> <input class="qrcolor" id="colors7" type="text" value="%s"   name="qrc_composer_settings[background]">', $background); ?>
                  </p>    
    <p style="margin-bottom:20px;margin-top:10px;color: #838383;"><em>
    <?php echo esc_html__('Select a background color. For best scanning results, use a light color with a dark QR code.', 'qrc_composer_pro'); ?></em></p>
           

        </div>
               </div>

               <?php
                }
    /**
     * This function is a callback function of  add seeting section
     */
    function qrc_qldof(){  
      include QRC_COMPOSER_PATH . 'includes/data/data.php';?>
               <div class="panel pbar_pricetilrloc">
                  <h3 class="fqr_section_title"><?php echo esc_html__('Upload a Logo to Display Inside the QR Code', 'qrc_composer_pro'); ?><span class="qrcprofetdisbd">PRO</span></h3>
            <div class="quickcolorwrapper">
                     <p>
        <span class="quilclcoroption"><?php echo esc_html__('Upload:', 'qrc_composer_pro'); ?></span>  

        <button type="button" 
                class="button qrc-pro-trigger" 
                data-title="Custom Logo Feature" 
                data-message="Upgrade to Pro to add your own logo inside the QR Code.">
            Upload Logo
        </button>
                    </p>
    <p style="margin-bottom:20px;margin-top:10px;color: #838383;"><em><?php echo esc_html__('Add your custom logo or brand image to appear at the center of the QR code', 'qrc_composer_pro'); ?></em></p>


                     <p  class="hideshcode profetures">
            <span class="quilclcoroption"><?php echo esc_html__('Logo Size:', 'qrc_composer_pro'); ?></span>  
            <?php     
     printf('<input id="logosize" class="qrcranges" type="range" min="0.1" max="1" step="0.1"  name="qrc_composer_settings[qrc_msize]" oninput="num4.value = this.value"><input type="number" id="num4"  min="0.1" max="1" step="0.1" oninput="logosize.value = this.value">'); ?> 

                     </p>
     <p class="hideshcode profetures" style="margin-bottom:20px;margin-top:10px;color: #838383;"><em><?php echo esc_html__('For optimal QR code scanning performance, it is recommended to keep the logo image size minimal.', 'qrc_composer_pro'); ?></em></p>

       <p  class="hideshcode profetures">
       <span class="quilclcoroption"><?php echo esc_html__('Margin:', 'qrc_composer_pro'); ?></span>  
     <?php
      printf('<input class="qrcranges"  id="logomargin" type="range" min="0" max="10" step="0.5" oninput="num5.value = this.value"><input type="number" id="num5"  min="0" max="10" step="0.5" oninput="logomargin.value = this.value">'); ?> 
                     </p>
     <p class="hideshcode" style="margin-bottom:20px;margin-top:10px;color: #838383;"><em><?php echo esc_html__('The clear, empty space surrounding Logo on all sides.', 'qrc_composer_pro'); ?></em></p>

                  </div>
               </div>

<?php
}

    /**
     * This function is a callback function of  add seeting section
     */
    function qrc_dwnloadbtndfyuytu(){  

      include QRC_COMPOSER_PATH . 'includes/data/data.php';?>
          <div class="panel panellast qrcpro_hidemobi">
                  <h3 class="fqr_section_title"><?php echo esc_html__('Download Button', 'qrc_composer_pro'); ?></h3>
            <div class="quickcolorwrapper">

    <span class="quilclcoroption"><?php echo esc_html__('Show/Hide:', 'qrc_composer_pro'); ?></span> 

     <select name="qrc_composer_settings[qr_download_hide]" class="select" id="keepdownlaod">
            
        <option value="yes" <?php echo esc_attr($qr_download_hide) == 'yes' ? 'selected' : '' ?>><?php echo esc_html__('Remove Download Button', 'qrc_composer_pro'); ?></option>
        <option value="no" <?php echo esc_attr($qr_download_hide) == 'no' ? 'selected' : '' ?>><?php echo esc_html__('Keep Download Button', 'qrc_composer_pro'); ?></option>    
    </select>             

      <div class="removealsscolors">
        <ul> 


<li>
    <span class="quilclcoroption"><?php echo esc_html__('Available Formats:', 'qrc_composer_pro'); ?></span>

  <label style="margin-right:14px;display:inline-block;">
        <input type="checkbox" checked disabled>PNG
    </label>

    <?php
    $formats = array('jpeg' => 'JPEG', 'svg' => 'SVG', 'pdf'  => 'PDF');


    $selected_formats = (!empty($qr_download_formats) && is_array($qr_download_formats)) ? $qr_download_formats : array('png');
    foreach ($formats as $key => $label) :
    ?>
    <label style="margin-right:14px;display:inline-block;"  class="qrc-pro-trigger" 
                data-title="Upgrade to Pro!" 
                data-message="Upgrade to Pro to add <?php echo esc_html($label); ?> Download Features">
        <input type="checkbox"  class="qrc-pro-trigger" 
                data-title="<?php echo esc_html($label); ?>" 
                data-message="Upgrade to Pro to add <?php echo esc_html($label); ?> Download Features" >
        <?php echo esc_html($label); ?>
    </label>
    <?php endforeach; ?><span class="qrcprofetdisbd">PRO</span>
</li>



            <li>                  
            <span class="quilclcoroption"><?php echo esc_html__('Button Label:', 'qrc_composer_pro'); ?></span>  
            <?php     
        printf('<input type="text" name="qrc_composer_settings[qr_download_text]" value="%s" placeholder="Download QR" id="inputetxtas"></li>', $download_qr);  ?> 

            <li><span class="quilclcoroption"><?php echo esc_html__('Font Size:', 'qrc_composer_pro'); ?></span>
        <?php
        printf('<input type="number" name="qrc_composer_settings[qr_download_fntsz]" value="%s"  id="qr_download_fntsz" min="10" max="30">', esc_attr($qr_download_fntsz)); ?>

        </li><li>
        <span class="quilclcoroption"><?php echo esc_html__('Download File', 'qrc_composer_pro'); ?></span>
         <select  id="qrcdwnfilename" name="qrc_composer_settings[qrc_downlofile]" class="select"  >
         <option value="default"  <?php echo esc_attr($qrc_downlofile) == 'default' ? 'selected' : '' ?>><?php echo esc_html__('Default', 'qrc_composer_pro'); ?></option>
         <option value="custom" <?php echo esc_attr($qrc_downlofile) == 'custom' ? 'selected' : '' ?>><?php echo esc_html__('Custom', 'qrc_composer_pro'); ?></option>
          </select>
      </li>

       <li class="qrccusdnwfile"><span class="quilclcoroption"><?php echo esc_html__('Input File name', 'qrc_composer_pro'); ?></span>  
     <?php
        printf('<input type="text" id="qrccusdnwfileval" name="qrc_composer_settings[qrccusdnwfile]" value="%s" placeholder="e.g: Sharabindu">.png',$qrccusdnwfile); ?> 

       </li><li><span class="quilclcoroption"><?php echo esc_html__('Text Color:', 'qrc_composer_pro'); ?></span>  
     <?php
        printf('<input type="text" name="qrc_composer_settings[qr_dwnbtn_color]" value="%s" class="qrc-btn-color-picker">', $qr_dwnbtn_color); ?> 
        </li>
       <li><span class="quilclcoroption"><?php echo esc_html__('Background:', 'qrc_composer_pro'); ?></span>  
     <?php
        printf('<input type="text" name="qrc_composer_settings[qr_dwnbtnbg_color]" value="%s" class="qrc-btn-bg-picker">', $qr_dwnbtnbg_color) ?> 

       </li><li><span class="quilclcoroption"><?php echo esc_html__('Border Color:', 'qrc_composer_pro'); ?></span> 
        <?php printf('<input type="text" name="qrc_composer_settings[qr_download_brclr]" value="%s"  id="qr_download_brclr">', esc_attr($qr_download_brclr)); ?>

       </li><li><span class="quilclcoroption"><?php echo esc_html__('Border Radius:', 'qrc_composer_pro'); ?></span> 
        <?php printf('<input type="number" name="qrc_composer_settings[qrc_dwnbtn_brdius]" value="%s"  id="qrc_dwnbtn_brdius" min="0" max="50">', esc_attr($qrc_dwnbtn_brdius)); ?>
    </li>
</ul>

    </div>
</div>
</div>

    <?php 

    }

    /**
     * This function is a callback function of  add seeting section
     */
    function qrc_Miscellaneous(){  

      include QRC_COMPOSER_PATH . 'includes/data/data.php';?>

          <div class="panel panellast pbarcode_borderradius" id="qrcMiscellaneous">

         <h3 class="fqr_section_title"><?php echo esc_html__('Miscellaneous', 'qrc_composer_pro'); ?></h3>
            <div class="quickcolorwrapper">


   <ul class="dkfjkjdjTwpf">
                    <li><span class="quilclcoroption"><?php echo esc_html__('QR Code Visibility', 'qrc_composer_pro'); ?></span></li>

     <li class="qrcprojkffkjf"> <?php  printf('<div class="onoffswitch"><input type="checkbox" value="qrchidefrontend" class="onoffswitch-checkbox" id="qrchidefrontend"  name="qrc_composer_settings[qrchidefrontend]" %s><label class="onoffswitch-label" for="qrchidefrontend">
        <span class="onoffswitch-inner"></span>
        <span class="onoffswitch-switch"></span></label></div>',$qrchidefrontend);?></li>               
                </ul>             
     <p style="margin-bottom:20px;margin-top:10px;color: #838383;"><em><?php echo esc_html__('When the switcher is enabled, the QR code will be hidden on the frontend, displaying only the download button. Clicking the download button will immediately download the QR code', 'qrc_composer_pro'); ?></em></p>

   <ul class="dkfjkjdjTwpfpopup">
                    <li><span class="qrcpeoquilclcoroption"><?php echo esc_html__('QR Code in Popup', 'qrc_composer_pro'); ?></span></li>

     <li class="qrcprojkffkjf"> 
    <?php
        printf('<div class="onoffswitch"><input type="checkbox" value="qrcpopupenbl" class="onoffswitch-checkbox" id="qrcpopupenbl"  name="qrc_composer_settings[qrcpopupenbl]" %s tabindex="0"><label class="onoffswitch-label" for="qrcpopupenbl">
        <span class="onoffswitch-inner"></span>
        <span class="onoffswitch-switch"></span></label></div>',$qrcpopupenbl);

        ?>
      </li>               
                </ul> 

     <p style="margin-bottom:20px;margin-top:10px;color: #838383;"><em><?php echo esc_html__('When the switcher is enabled, the popup button will replace the QR code image on the frontend. Clicking the popup button will display the QR code in a popup window.', 'qrc_composer_pro'); ?></em></p>
   <ul class="qrcprodkfjkjdjTwpf">
                    <li><span class="qrcpeoquilclcoroption"><?php echo esc_html__('Popup button design', 'qrc_composer_pro'); ?></span></li>

     <li class="qrcprojkffkjf"> 
    <?php
    printf('<p><strong>
    <label class="qrc_dwnbtnlabel" for="qrcpopuptext">'.esc_html("Label", "qrc_composer_pro").'</label></strong><input type="text" name="qrc_composer_settings[qrcpopuptext]" value="%s" placeholder="View QR code" id="qrcpopuptext"></p>', esc_attr($qrcpopuptext)); 

        printf('<p><strong>
    <label class="qrc_dwnbtnlabel" for="qrcpopup_fntsize">'.esc_html("Font Size", "qrc_composer_pro").'</label></strong><input type="number" name="qrc_composer_settings[qrcpopup_fntsize]" value="%s"  id="qrcpopup_fntsize" min="10" max="30"></p>', esc_attr($qrcpopup_fntsize)); 

    printf('<p><strong>
    <label class="qrc_dwnbtnlabel" for="qrcpopup_color">'.esc_html("Color", "qrc_composer_pro").'</label></strong><input type="text" name="qrc_composer_settings[qrcpopup_color]" value="%s" id="qrcpopup_color"></p>', esc_attr($qrcpopup_color));
    printf('<p><strong>
    <label class="qrc_dwnbtnlabel" for="qrcpopup_bg">'.esc_html("Background", "qrc_composer_pro").'</label></strong><input type="text" name="qrc_composer_settings[qrcpopup_bg]" value="%s" id="qrcpopup_bg"></p>', esc_attr($qrcpopup_bg));

    printf('<p><strong>
    <label class="qrc_dwnbtnlabel" for="qrcpopup_brclr">'.esc_html("Border Color", "qrc_composer_pro").'</label></strong><input type="text" name="qrc_composer_settings[qrcpopup_brclr]" value="%s"  id="qrcpopup_brclr"></p>', esc_attr($qrcpopup_brclr));

        printf('<p><strong>
    <label class="qrc_dwnbtnlabel" for="qrcpopup_brdius">'.esc_html("Border Radius", "qrc_composer_pro").'</label></strong><input type="number" name="qrc_composer_settings[qrcpopup_brdius]" value="%s"  id="qrcpopup_brdius"  min="0" max="50"></p></li></ul>', esc_attr($qrcpopup_brdius)); ?>
   <ul class="qrcprodkfjkjdjTwpf">
                    <li><span class="qrcpeoquilclcoroption"><?php echo esc_html__('Popup Enable For', 'qrc_composer_pro'); ?></span></li>

     <li class="qrcprojkffkjf"> 
        <div class="popupqrdefine">

    <?php

        printf('<p><input type="checkbox"  checked  id="popupcuurent">
    <label class="qrc_dwnbtnlabel" for="popupcuurent">'.esc_html("Auto Generate QR + Shortcode for Current Page URL", "qrc_composer_pro").'</label></p>');

        printf('<p><input type="checkbox" name="qrc_composer_settings[popupcustomqr]" %s  id="popupcustomqr">
    <label class="qrc_dwnbtnlabel" for="popupcustomqr">'.esc_html("Various Components QR", "qrc_composer_pro").'</label></p>', esc_attr($popupcustomqr)); 

        printf('<p><input type="checkbox" name="qrc_composer_settings[popupvcardqr]" %s  id="popupvcardqr">
    <label class="qrc_dwnbtnlabel" for="popupvcardqr">'.esc_html("vCard QR", "qrc_composer_pro").'</label></p>', esc_attr($popupvcardqr));

        printf('<p><input type="checkbox" name="qrc_composer_settings[popintegrateqr]" %s  id="popintegrateqr">
    <label class="qrc_dwnbtnlabel"  for="popintegrateqr">'.esc_html("Integration QR", "qrc_composer_pro").'</label></p>', esc_attr($popintegrateqr));

        printf('<p><input type="checkbox" name="qrc_composer_settings[popwidgets]" %s  id="popwidgets">
    <label class="qrc_dwnbtnlabel"  for="popwidgets">'.esc_html("Widgets QR", "qrc_composer_pro").'</label></p><p style="margin-bottom:20px;margin-top:10px;color: #838383;"><em>'.esc_html('When the "Popup" option is checked, the associated shortcode will also enable the popup behavior.', 'qrc_composer_pro').'</em></p>', esc_attr($popwidgets)); ?>
    </div>
</li>
</ul>
        </div>

    </div>

        <?php 
 

    }
    

/**
 * admin form field validation
 */

function qrc_design_sanitize($input) {
    $sanitary_values = [];

    $absint_fields = ['qr_code_picture_size_width'];
    $wp_kses_fields = ['qr_download_text', 'qrcpopuptext'];
    $esc_url_fields = ['qrc_logo_image'];
    $raw_fields = ['qr_color']; // Skip sanitization for specific fields if needed
    $text_fields = array_diff(array_keys($input), array_merge($absint_fields, $wp_kses_fields, $esc_url_fields, $raw_fields));

    foreach ($input as $key => $value) {
        if (in_array($key, $absint_fields)) {
            $sanitary_values[$key] = absint($value);
        } elseif (in_array($key, $wp_kses_fields)) {
            $sanitary_values[$key] = wp_kses_post($value);
        } elseif (in_array($key, $esc_url_fields)) {
            $sanitary_values[$key] = esc_url_raw($value);
        } elseif (in_array($key, $raw_fields)) {
            $sanitary_values[$key] = $value;
        } elseif (in_array($key, $text_fields)) {
            $sanitary_values[$key] = sanitize_text_field($value);
        }
    }

    return $sanitary_values;
}

}