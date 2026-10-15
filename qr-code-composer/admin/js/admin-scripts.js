(function ($) {
   var win = window;
   var FR = win.FileReader;
   var doc = win.document;
   var kjua = win.kjua;
   var gui_val_pairs = [
      ['size', 'px'],
      ['minversion', ''],
      ['quiet', ' modules'],
      ['rounded', '%'],
      ['msize', '%'],
      ['mposx', '%'],
      ['mposy', '%']
   ];


   function el_by_id(id) { return document.getElementById(id); }
   function val_by_id(id) { var el = el_by_id(id); return el ? el.value : ''; }

   function int_by_id(id) {
      return parseInt(val_by_id(id), 10)
   }

   function on_event(el, type, fn) {
      el.addEventListener(type, fn)
   }

   function on_ready(fn) {
      on_event(doc, 'DOMContentLoaded', fn)
   }

   function for_each(list, fn) {
      Array.prototype.forEach.call(list, fn)
   }

   function all(query, fn) {
      var els = doc.querySelectorAll(query);
      if (fn) {
         for_each(els, fn)
      }
      return els
   }
   function render(containerId, options) {
      var container = el_by_id(containerId);
      if (!container) return;               // element na thakle skip
      container.innerHTML = '';             // safe clear
      var qr = new QRCodeStyling(options);
      qr.append(container);
   }
 function update_qrcode() {
      if (typeof QRCodeStyling === 'undefined') {
         console.error('QRCodeStyling library load hoyni');
         return;
      }
      var size = parseInt(val_by_id('qrsize'), 10) || 200;
      var options = {
         shape: val_by_id('qrc_codeshape') || 'square',
         width: size,
         height: size,
         data: 'QR Code Composer',
         dotsOptions: {
            type: val_by_id('qrc_dot_style') || 'square',
            color: val_by_id('colors1') || '#000000'
         },
         backgroundOptions: {
            color: val_by_id('colors7') || '#ffffff'
         }
      };
      render('qrccomsposerprviewss', options);
      render('qrccomsposerprview', options);
   }

   $(document).ready(function () {
      $('.qrcolor').wpColorPicker({
         change: function (event, ui) {
            $(event.target).val(ui.color.toString());  // value age set
            update_qrcode();
         },
         clear: function () {
            setTimeout(update_qrcode, 50);
         }
      });

      // size, shape, dot style change holeo update
      $('#qrsize, #qrc_codeshape, #qrc_dot_style').on('change input', update_qrcode);

      update_qrcode();   // page load e prothombar render
   });
}(jQuery));
(function ($) {
   $(document).ready(function () {
      "use strict";

      function qrcpromodalwrapperQRSsdh() {
         $(".qrc-modal-toggle").on("click", function () {
            $(".qrc_modal").toggleClass("is-visible")
         })
      }
      qrcpromodalwrapperQRSsdh();
      $("#qrcauto").videoPopup();
      $("#qclinks").videoPopup();
      $("#qcphone").videoPopup();
      $("#qcwhatapp").videoPopup();
      $("#qcwifi").videoPopup();
      $("#qrcmap").videoPopup();
      $("#qrcevent").videoPopup();
      $("#qrcbbpress").videoPopup();
      $("#qrcbdypress").videoPopup();
      $("#qrcdokan").videoPopup();
      $("#qrcvcardfs").videoPopup();
      $('.qrcdesings').submit(function () {
         $('.qrcs_desingcrt').addClass("fancyLoaderCss");
         $('.qrcsdhicr_dsigns').hide();
         var b = $(this).serialize();
         $.post('options.php', b).error(function () {
            alert('error')
         }).success(function () {
            $(".qrcs_desingcrt").removeClass("fancyLoaderCss");
            $('.qrcsdhicr_dsigns').show();
            $('.qrcsdhicr_dsigns').html('<span class="dashicons dashicons-saved"></span>')
         });
         return !1
      });
      $('.qrccurrentqrcs').submit(function () {
         $('.qrcs_sdhicrt').addClass("fancyLoaderCss");
         $('.qrcsdhicr_djkfhjhj').hide();
         var b = $(this).serialize();
         $.post('options.php', b).error(function () {
            alert('error')
         }).success(function () {
            $(".qrcs_sdhicrt").removeClass("fancyLoaderCss");
            $('.qrcsdhicr_djkfhjhj').show();
            $('.qrcsdhicr_djkfhjhj').html('<span class="dashicons dashicons-saved"></span>')
         });
         return !1
      });
      $('.qrc_customqrpros').submit(function () {
         $('.qrcs_sdhi').addClass("fancyLoaderCss");
         $('.qrccomposer_djkfhjhj').hide();
         var b = $(this).serialize();
         $.post('options.php', b).error(function () {
            alert('error')
         }).success(function () {
            $(".qrcs_sdhi").removeClass("fancyLoaderCss");
            $('.qrccomposer_djkfhjhj').show();
            $('.qrccomposer_djkfhjhj').html('<span class="dashicons dashicons-saved"></span>')
         });
         return !1
      });
      $('.qrc_composer_settings_save').submit(function () {
         $('.qrc_composer_sdhi').addClass("fancyLoaderCss");
         $('.qrc_composer_djkfhjhj').hide();
         var b = $(this).serialize();
         $.post('options.php', b).error(function () {
            alert('error')
         }).success(function () {
            $(".qrc_composer_sdhi").removeClass("fancyLoaderCss");
            $('.qrc_composer_djkfhjhj').show();
            $('.qrc_composer_djkfhjhj').html('<span class="dashicons dashicons-saved"></span>')
         });
         return !1
      });
      $('.qrcpro_vacradsubmits').submit(function () {
         $('.qrcvcard_sdhi').addClass("fancyLoaderCss");
         $('.qrcvcard_djkfhjhj').hide();
         var b = $(this).serialize();
         $.post('options.php', b).error(function () {
            alert('error')
         }).success(function () {
            $(".qrcvcard_sdhi").removeClass("fancyLoaderCss");
            $('.qrcvcard_djkfhjhj').show();
            $('.qrcvcard_djkfhjhj').html('<span class="dashicons dashicons-saved"></span>')
         });
         return !1
      });
      $('.qrcpro_integration').submit(function () {
         $('.qrcintegrates').addClass("fancyLoaderCss");
         $('.qrcintegrates_djkfhjhj').hide();
         var b = $(this).serialize();
         $.post('options.php', b).error(function () {
            alert('error')
         }).success(function () {
            $(".qrcintegrates").removeClass("fancyLoaderCss");
            $('.qrcintegrates_djkfhjhj').show();
            $('.qrcintegrates_djkfhjhj').html('<span class="dashicons dashicons-saved"></span>')
         });
         return !1
      });
      $('.qrcprodemo').datetimepicker({
         timepicker: !1,
         format: 'Y/m/d'
      });
      $('.qrcprodemo1').datetimepicker({
         datepicker: !1,
         format: 'H:i'
      });
      $('.qrcprodemo2').datetimepicker({
         timepicker: !1,
         format: 'Y/m/d'
      });
      $('.qrcprodemo3').datetimepicker({
         datepicker: !1,
         format: 'H:i'
      });

      function bbpressoptions() {
         $('.bbpressoptions').on('change', function () {
            if ($(this).val() == 'none' || $(this).val() == 'url') {
               $('.bbpressremovefiled').hide()
            } else {
               $('.bbpressremovefiled').show()
            }
            if ($(this).val() == 'shortcode') {
               $('.shortcodes').show()
            } else {
               $('.shortcodes').hide()
            }
         });
         if ($('.bbpressoptions').val() == 'none' || $('.bbpressoptions').val() == 'url') {
            $('.bbpressremovefiled').hide()
         } else {
            $('.bbpressremovefiled').show()
         }
         if ($('.bbpressoptions').val() == 'shortcode') {
            $('.shortcodes').show()
         } else {
            $('.shortcodes').hide()
         }
      }
      bbpressoptions();

      function qrbudypressoptions() {
         $('.qrbudypressoptions').on('change', function () {
            if ($(this).val() == 'none' || $(this).val() == 'url') {
               $('.budypressremovefiled').hide()
            } else {
               $('.budypressremovefiled').show()
            }
            if ($(this).val() == 'shortcode') {
               $('.shortcodesr').show()
            } else {
               $('.shortcodesr').hide()
            }
         });
         if ($('.qrbudypressoptions').val() == 'none' || $('.qrbudypressoptions').val() == 'url') {
            $('.budypressremovefiled').hide()
         } else {
            $('.budypressremovefiled').show()
         }
         if ($('.qrbudypressoptions').val() == 'shortcode') {
            $('.shortcodesr').show()
         } else {
            $('.shortcodesr').hide()
         }
      }
      qrbudypressoptions();

      function qrcdokhanoptions() {
         $('.dokanqrc').on('change', function () {
            if ($(this).val() == 'none' || $(this).val() == 'url') {
               $('.dokanremovefiled').hide()
            } else {
               $('.dokanremovefiled').show()
            }
            if ($(this).val() == 'shortcode') {
               $('.shortcodesdokan').show()
            } else {
               $('.shortcodesdokan').hide()
            }
         });
         if ($('.dokanqrc').val() == 'none' || $('.dokanqrc').val() == 'url') {
            $('.dokanremovefiled').hide()
         } else {
            $('.dokanremovefiled').show()
         }
         if ($('.dokanqrc').val() == 'shortcode') {
            $('.shortcodesdokan').show()
         } else {
            $('.shortcodesdokan').hide()
         }
      }
      qrcdokhanoptions()
   });
   $(document).ready(function () {
      setTimeout(function () {
         $(".qrcadminprevbuttin").show()
      }, 1000);
      $('#qrcdwnfilename').on('change', function () {
         if ($(this).val() == 'custom') {
            $('.qrccusdnwfile').show()
         } else {
            $('.qrccusdnwfile').hide()
         }
      })
      if ($('#qrcdwnfilename').val() == 'custom') {
         $('.qrccusdnwfile').show()
      } else {
         $('.qrccusdnwfile').hide()
      }
      $("#inputetxtas").on("input", function () {
         $("#result").text($(this).val())
      });
      $('#keepdownlaod').on('change', function () {
         if ($(this).val() == 'yes') {
            $('.qrdemodownload').hide();
            $('.removealsscolors').hide()
         } else {
            $('.qrdemodownload').show();
            $('.removealsscolors').show()
         }
      });
      if ($('#keepdownlaod').val() == 'yes') {
         $('.qrdemodownload').hide();
         $('.removealsscolors').hide()
      } else {
         $('.qrdemodownload').show();
         $('.removealsscolors').show()
      }
      $('.qrc-btn-color-picker').wpColorPicker({
         change: function (event, ui) {
            var theColor = ui.color.toString();
            $('#result2').css("color", theColor)
         }
      });
      $('.qrc-btn-bg-picker').wpColorPicker({
         change: function (event, ui) {
            var theColor = ui.color.toString();
            $('#result2').css("background", theColor)
         }
      })
   });
   $("#qecloaders").css('opacity', 0);
   $(document).ready(function () {
      $('input:radio[name="qrc_composer_settings[qrcloaders]"]').on('click', function () {
         $('#qecloaders').attr('class', $(this).val());
         $("#loaderprebisdqrc").css('opacity', 0);
         $("#qecloaders").css('opacity', 1);
         setTimeout(function () {
            $("#loaderprebisdqrc").css('opacity', 1)
         }, 1000);
         setTimeout(function () {
            $("#qecloaders").css('opacity', 0)
         }, 1000)
      })
      $('#qr_print_tzx_ty').on('change', function () {
         $('#qr_print_product_ty').hide();
         if ($(this).val() == 'product_cat') {
            $('#qr_print_product_ty').show();
            $('#qr_print_cat_ty').hide()
         } else {
            $('#qr_print_product_ty').hide();
            $('#qr_print_cat_ty').show()
         }
      })
      $('.alignme th').append("<p>Choose the alignment of the QR code, by default it will be on the left</p>");

      $('.removeautodisplay th').append("<p>Disable QR Code automatically displayed on the frontend after the content.</p>");

      $('.removemetabox th').append("<p>Disable QR Code From Backend Metabox </p>");

      $('.wcalignme th').append("<p>Select where you want to see the QR code on the WooCommerce product page</p>");
      $('.ptab_name th').append("<p>The QR code is located in the tab called QR Code on the product page. Rename tab name</p>");
      $('.qr_checkbox th').append("<p>Disable the QR code for specific post type that you wish to prevent the QR code on.</p>");
      $('.qr_checkbox_page th').append("<p>Disable the QR code for specific pages that you wish to prevent the QR code on. Also can remove QR code from page, post, product, custom post using meta field</p>");
      $('.qr_stcode_management th').append("<p>This is the shortcode for generating QR code of current page, current page url will be used as content of QR code.</p>");
      $('.qr_code_custom_text th').append("<p>Creating QR codes with custom links, static text or numbers as QR code content.</p>");
      $('.qr_code_phonenumber th').append("<p>Creating QR codes with Phone or Mobile number as QR code content.</p>");
      $('.qr_code_mail_text th').append("<p>Creating QR codes with WhatsApp Number as QR code content.</p>");
      $('.qr_code_wifi_text th').append("<p>Creating QR codes with WIFI Access as QR code content.</p>");
      $('.qr_code_event_text th').append("<p>Creating QR codes with Event Management as QR code content.</p>");
      $('.qr_code_maps_text th').append("<p>Creating QR codes with Google Map Location as QR code content.</p>");
      $('.qrc_metavcard_display th').append("<p>Automatically displaying QR Code for WooCommerce customers. Use this option to remove WooCommerce Customer Dashboard, Shipping, Billing Address QR Code</p>");
      $('.qrc_vacrdauodisplay th').append("<p>Meta vCard QR code will be automatically displayed on the frontend after the content.</p>");
      $('.qrc_vacrdtempe th').append("<p>vCard Templates is a feature for displaying vCard information on the frontend. <a href='https://wordpressqrcode.com/card/elizabeth-i-brown/'>View Demo</a></p>");
      $('.qr_code_vcard th').append("<p>A simple vCard QR code based on the information on the side. If you want to generate more, use the  <a href='admin.php?page=qrc_shortcode'> shortcode generator for vCard</a></p>");
      $('.qr_checkbox_vcrad th').append("<p>Clicking the switcher button next to the post type name will enable the vCard meta field for that post type<a href='https://wordpressqrcode.com/docs/automatically-display-vcard/' target='_blank'> Read Docs</a></p>");
      $('.qrc_userdsiplay th').append("<p>The plugin generates auto QR codes for user profiles, vCard QR code are generated from user profile information, If you want to close <a href='profile.php/#qrcuserQRcode'>Look Profile Page</a></p>");
      $('.qrc_bbpress_display th').append("<p>Forum Memeber QR Code Generator for BB Press. QR code of memeber's profile URL and memeber's vCard QR code. <a href='https://wordpressqrcode.com/forums/users/dipashi/'> View Demo</a></p>");
      $('.qrc_bdypress_display th').append("<p>  Profile QR Code Generator for Buddy Press. QR code of user's profile URL and user's vCard QR code. <a href='https://wordpressqrcode.com/members/dipashi/profile/qr-code/'> View Demo</a></p>");
      $('.qrc_dokan_display th').append("<p>Vendor QR code generator for Dokan. QR code of vendor's profile URL and vendor's vCard QR code. <a href='https://wordpressqrcode.com/members/dipashi/profile/qr-code/'> View Demo</a></p>")
   })
   $(document).ready(function () {
      $("#removeautodisplay").on("click", function () {
         if ($(this).is(":checked")) {
            $("tr.wcalignme,tr.qrcchangeprodtab,.qr_checkbox,.qr_checkbox_page").hide();
         } else {
            $("tr.wcalignme,tr.qrcchangeprodtab,.qr_checkbox,.qr_checkbox_page").show();
         }
      });
         if ($("#removeautodisplay").is(":checked")) {
            $("tr.wcalignme,tr.qrcchangeprodtab,.qr_checkbox,.qr_checkbox_page").hide();
         } else {
            $("tr.wcalignme,tr.qrcchangeprodtab,.qr_checkbox,.qr_checkbox_page").show();
         }
   });
   $(document).ready(function () {
      $("#qrccstlabel2active").on("change", function () {
         if ($(this).val() == '1') {
            $(".adbrlbel2").show();
         } else {
            $(".adbrlbel2").hide();
         }
      });
         if ($("#qrccstlabel2active").val() == '1') {
            $(".adbrlbel2").show();
         } else {
            $(".adbrlbel2").hide();
         }
   });
   $(document).ready(function () {
      $("#qrccstlabelactive").on("change", function () {
         if ($(this).val() == '1') {
            $(".adbrlbel1").show();
         } else {
            $(".adbrlbel1").hide();
         }
      });
   });
   $(document).ready(function () {
      $("#qrcborder").on("change", function () {
         if ($(this).val() == '1') {
            $(".adbrlbel").show();
         } else {
            $(".adbrlbel").hide();
         }
      });
   });
   $(document).ready(function () {

         if ($("#qrcborder").val() == '1') {
            $(".adbrlbel").show();
         } else {
            $(".adbrlbel").hide();
         }
   });
   $(document).ready(function () {
      $("#qrchidefrontend").on("click", function () {
         if ($(this).is(":checked")) {
            $("div#quickqrdemos").css('opacity', '0.3')
         } else {
            $("div#quickqrdemos").css('opacity', '1')
         }
      });
      if ($("#qrchidefrontend").is(":checked")) {
         $("div#quickqrdemos").css('opacity', '0.3')
      } else {
         $("div#quickqrdemos").css('opacity', '1')
      }
   });
   $(document).ready(function () {
      $("input[name='qrc_autogenerate[page]']").on("click", function () {
         if ($(this).is(":checked")) {
            $(".qr_checkbox_page").hide();
         } else {
            $(".qr_checkbox_page").show();
         }
      });
      if ($("input[name='qrc_autogenerate[page]']").is(":checked")) {
            $(".qr_checkbox_page").hide();
      } else {
            $(".qr_checkbox_page").show();
      }
      $("#qrcpopupenbl").on("click", function () {
         if ($(this).is(":checked")) {
            $(".qrc_popup_preview").show();
            $(".qrcprodkfjkjdjTwpf").show();
            $(".dkfjkjdjTwpf,.qrcodevsbity,.qrc_prev_manage").css({
               'pointer-events': 'none',
               'opacity': 0.3
            })
         } else {
            $(".qrc_popup_preview").hide();
            $(".qrcprodkfjkjdjTwpf").hide();
            $(".dkfjkjdjTwpf,.qrcodevsbity,.qrc_prev_manage").css({
               'pointer-events': 'all',
               'opacity': 1
            })
         }
      });
      if ($("#qrcpopupenbl").is(":checked")) {
         $(".qrc_popup_preview").show();
         $(".qrcprodkfjkjdjTwpf").show();
         $(".dkfjkjdjTwpf,.qrcodevsbity,.qrc_prev_manage").css({
            'pointer-events': 'none',
            'opacity': 0.3
         })
      } else {
         $(".qrc_popup_preview").hide();
         $(".qrcprodkfjkjdjTwpf").hide();
         $(".dkfjkjdjTwpf,.qrcodevsbity,.qrc_prev_manage").css({
            'pointer-events': 'all',
            'opacity': 1
         })
      }
      $('#qrc_design_type').on('change', function () {
         if ($(this).val() == 'tooltip') {
            $('#qrc_tooltipdesignwrap').show();
            $('#qrc_popupdesignwrap').hide();
            $('#popModal_ex2').hide()
         }
         if ($(this).val() == 'popup') {
            $('#qrc_tooltipdesignwrap').hide();
            $('#qrc_popupdesignwrap').show();
            $('#popModal_ex2').show()
         }
      });
      if ($('#qrc_design_type').val() == 'tooltip') {
         $('#popModal_ex2').hide();
         $('#qrc_tooltipdesignwrap').show();
         $('#qrc_popupdesignwrap').hide()
      }
      if ($('#qrc_design_type').val() == 'popup') {
         $('#popModal_ex2').show();
         $('#qrc_tooltipdesignwrap').hide();
         $('#qrc_popupdesignwrap').show()
      }
   })
})(jQuery);
(function ($) {
   $(document).ready(function () {
      $('#qrcppagelocation').on('change', function () {
         if ($(this).val() == 'inatab') {
            $('.ptab_name').css('opacity', '1');
         } else {
            $('.ptab_name').css('opacity', '0.2');
         }
      });
      if ($('#qrcppagelocation').val() == 'inatab') {
            $('.ptab_name').css('opacity', '1');
      } else {
            $('.ptab_name').css('opacity', '0.2');
      }
      $("#qr_download_fntsz").on("input", function () {
         $("#result,#result2").css('font-size', $(this).val() + 'px')
      });
      $("#qrcpopup_fntsize").on("input", function () {
         $('#popModal_ex2').css('font-size', $(this).val() + 'px')
      });
      $("#qrc_dwnbtn_brdius").on("input", function () {
         $("#result,#result2").css('border-radius', $(this).val() + 'px')
      });
      $("#qrcpopup_brdius").on("input", function () {
         $('#popModal_ex2').css('border-radius', $(this).val() + 'px')
      });
      $("#qrcpopuptext").on("input", function () {
         $("#popModal_ex2").text($(this).val())
      });
      $("#inputetxtas").on("input", function () {
         $("#result,#result2").text($(this).val())
      });
/*      $('.qrcremovedownlaod').on('change', function () {
         if ($(this).val() == 'yes') {
            $('.qrdemodownload').hide();
            $('.removealsscolors').hide()
         } else {
            $('.qrdemodownload').show();
            $('.removealsscolors').show()
         }
      });
      if ($('.qrcremovedownlaod').val() == 'yes') {
         $('.qrdemodownload').hide();
         $('.removealsscolors').hide()
      } else {
         $('.qrdemodownload').show();
         $('.removealsscolors').show()
      }*/
      $('#qrcpopup_bg').wpColorPicker({
         change: function (event, ui) {
            var theColor = ui.color.toString();
            $('#popModal_ex2').css("background", theColor)
         },
         clear: function (event) {
            document.getElementById('qrcpopup_bg').value = 'transparent';
            $('#popModal_ex2').css("background", 'transparent')
         }
      });
      $('#qrcpopup_color').wpColorPicker({
         change: function (event, ui) {
            var theColor = ui.color.toString();
            $('#popModal_ex2').css("color", theColor)
         }
      });
      $('#qrcpopup_brclr').wpColorPicker({
         change: function (event, ui) {
            var theColor = ui.color.toString();
            $('#popModal_ex2').css("border-color", theColor)
         },
         clear: function (event) {
            document.getElementById('qrcpopup_brclr').value = 'transparent';
            $('#popModal_ex2').css("border-color", 'transparent')
         }
      });
      $('#qr_download_brclr').wpColorPicker({
         change: function (event, ui) {
            var theColor = ui.color.toString();
            $('#result,#result2').css("border-color", theColor)
         },
         clear: function (event) {
            document.getElementById('qr_download_brclr').value = 'transparent';
            $('#result,#result2').css("border-color", 'transparent')
         }
      })
   });

   
   
   
   
   jQuery(document).ready(function ($) {
      var tab_suffix = '-tab';

      function escape_regexp(str) {
         return str.replace(/[\-\[\]\/\{\}\(\)\*\+\?\.\\\^\$\|]/g, "\\$&")
      }

      function get_tab_name_from_class(el) {
         var tab_class_pattern = new RegExp('\\S*' + escape_regexp(tab_suffix));
         if ($(el) && $(el).attr('class')) {
            return $(el).attr('class').match(tab_class_pattern)[0]
         }
      }

      function hash_content_update() {
         var active_section, tab_names;
         tab_names = $('div.qrcprotab-content > div').map(function () {
            var tab_name = get_tab_name_from_class($(this));
            if (tab_name) {
               return tab_name.split(tab_suffix)[0]
            }
         }).get();
         if (tab_names.length > 0) {
            active_section = tab_names[0];
            if (document.location.href.split('#')[1] && tab_names.indexOf(document.location.href.split('#')[1]) > -1) {
               active_section = document.location.href.split('#')[1]
            }
            $('div.qrcprotab-content div.active').removeClass('active');
            $('div.qrcprotab-content div.' + active_section + tab_suffix).addClass('active');
            $('div.qrcprotab-nav ul li.active').removeClass('active');
            $('div.qrcprotab-nav ul li a[href="#' + active_section + '"]').closest('li').addClass('active')
         }
      }
      $(window).bind('hashchange', function () {
         hash_content_update()
      });
      hash_content_update()
   })
   
 jQuery(document).ready(function ($) {

    function setColor(id,val){
        $(id).wpColorPicker('color',val);
    }
jQuery(document).ready(function ($) {

    $('.qrc_preset_checkboxes label').on('click', function () {

        // remove active from all labels
        $('.qrc_preset_checkboxes label').removeClass('active');

        // add active to clicked label
        $(this).addClass('active');

    });

});
jQuery(document).ready(function ($) {

    $('body').append('<div class="qrc-tooltip"></div>');
    var tooltip = $('.qrc-tooltip');

    $('.qrc-info').on('mouseenter', function (e) {
        var text = $(this).data('tooltip');

        tooltip.text(text).fadeIn(150);

        var offset = $(this).offset();
        tooltip.css({
            top: offset.top - tooltip.outerHeight() - 10,
            left: offset.left + ($(this).outerWidth() / 2) - (tooltip.outerWidth() / 2)
        });
    });

    $('.qrc-info').on('mouseleave', function () {
        tooltip.fadeOut(150);
    });

});

jQuery(document).ready(function($){

    function activateTab(tabClass){

        $('.qrcprofixnabev li').removeClass('active');
        $('.qrcprofixnabev li.' + tabClass).addClass('active');

        $('.qrc-leftside table tr').hide();
        $('.qrc-leftside table tr.' + tabClass).show();
    }

    // Default tab
    let activeClass = 'qrcpro_nav2';

    // Load from hash
    let hash = window.location.hash.replace('#', '');

    if(hash){
        let $tab = $('.qrcprofixnabev li[data-tab="' + hash + '"]');

        if($tab.length){
            activeClass = $tab.attr('class').split(' ')[0];
        }
    }

    activateTab(activeClass);

    // Click tab
    $('.qrcprofixnabev li').on('click', function(){

        let tabClass = $(this).attr('class').split(' ')[0];
        let tabHash  = $(this).data('tab');

        activateTab(tabClass);

        // Update URL without reloading
        history.replaceState(
            null,
            null,
            window.location.pathname +
            window.location.search +
            '#' + tabHash
        );
    });

});
	
	
	
jQuery(document).ready(function($){

    $('#result2').on('click', function(e){

        e.preventDefault();

        const canvas = $('#quickqrdemos canvas')[0];

        if (!canvas) {
            alert('QR Code not found!');
            return;
        }

        const image = canvas.toDataURL('image/png');

        const link = document.createElement('a');
        link.href = image;
        link.download = 'qr-code.png';

        document.body.appendChild(link);
        link.click();
        document.body.removeChild(link);

    });

});	
	
	
	

});



   
   
jQuery(document).ready(function($) {
    var autoHideTimer = null;

    // Event Delegation: Je kono element-e class 'qrc-pro-trigger' thaklei kaj korbe
    $(document).on('click', '.qrc-pro-trigger', function(e) {
        e.preventDefault();

        // Attribute theke Title abong Message read kora
        var title = $(this).attr('data-title') || 'Upgrade to Pro';
        var message = $(this).attr('data-message') || 'Upgrade to Pro to unlock premium features.';

        // Modal Content Set Kora
        $('#qrc-modal-title').text(title);
        $('#qrc-modal-message').text(message);

        // Modal Active Kora
        $('#qrc-pro-modal').addClass('active');

        // Age thaka timer clear kora
        if (autoHideTimer) {
            clearTimeout(autoHideTimer);
        }

        // 3.5 Seconds পর Popup Auto Hide hobe

    });

    // Modal Close Function
    function closeQRCProModal() {
        $('#qrc-pro-modal').removeClass('active');
        if (autoHideTimer) {
            clearTimeout(autoHideTimer);
        }
    }

    // Close Button Click Event
    $(document).on('click', '#qrc-modal-close-btn', function(e) {
        e.preventDefault();
        closeQRCProModal();
    });

    // Popup Border-er baire (Overlay) Click korle close hobe
    $(document).on('click', '#qrc-pro-modal', function(e) {
        if ($(e.target).is('#qrc-pro-modal')) {
            closeQRCProModal();
        }
    });
});
   
   
   
jQuery(function ($) {
    $('.qrc-page-search').on('input', function () {
        var term = $(this).val().toLowerCase();
        $('.qrc-page-list .qrccheckboxwrap').each(function () {
            $(this).toggle($(this).data('title').indexOf(term) !== -1);
        });
    });
});
   
jQuery(document).ready(function($) {
    // Loader hide hobe ebong Tab Content show hobe
    $('.qrc_tab_loader').fadeOut(200, function() {
        $('.qrctab-content').fadeIn(300);
    });
});
   
}(jQuery))


