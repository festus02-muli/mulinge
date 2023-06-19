function renderPageOps(){
      var pbWrapperHeight = '';
      var pageOptions = pageBuilderApp.PageBuilderModel.get('pageOptions');
      var pageStatus = pageBuilderApp.PageBuilderModel.get('pageStatus');
      if ( typeof(isPub) != 'undefined') {
        var pageStatus = isPub;
      }
      var frontPage = pageOptions['frontPage'];
      var loadWpHead = pageOptions['loadWpHead'];
      var loadWpFooter = pageOptions['loadWpFooter'];
      var pageSeoName = pageOptions['pageSeoName'];
      var pageLink = pageOptions['pageLink'];
      var pageSeoDescription = pageOptions['pageSeoDescription'];
      var pageSeoKeywords = pageOptions['pageSeoKeywords'];
      var pageLogoUrl = pageOptions['pageLogoUrl'];
      var pageFavIconUrl = pageOptions['pageFavIconUrl'];
      var VariantB_ID = pageOptions['VariantB_ID'];

      var pageBgColor = pageOptions['pageBgColor'];
      var pageBgImage = pageOptions['pageBgImage'];
      var pagePadding = pageOptions['pagePadding'];
      var pagePaddingTop = pagePadding['pagePaddingTop'];
      var pagePaddingBottom = pagePadding['pagePaddingBottom'];
      var pagePaddingRight = pagePadding['pagePaddingRight'];
      var pagePaddingLeft = pagePadding['pagePaddingLeft'];

      var POcustomCSS = pageOptions['POcustomCSS'];
      var POcustomJS = pageOptions['POcustomJS'];

      var selectedOptinType = pageBuilderApp.PageBuilderModel.get('optinType');
      var currentStep = pageBuilderApp.PageBuilderModel.get('currentStep');

      if (selectedOptinType != '') {
        jQuery('.stepTwoContent').css('display','none');
        jQuery('.template-card:contains("'+selectedOptinType+'")').show();
        jQuery('.stepThreeContent').css('display','block');

        if (selectedOptinType == 'Inline') {
          jQuery('.selectFormType').trigger('change');
        }
        if (selectedOptinType == 'Inline') {
          jQuery('.inlineSpecificOptions').css('display','block');
          jQuery('.hideOnInline').css('display','none');
        }else{
          jQuery('.inlineSpecificOptions').css('display','none');
        }
        if (selectedOptinType == 'Bar') {
          jQuery('.pb_editor_tab_content #tab1').css({
            'width':'100%'
          });
          
          jQuery('.selectFormType').val('pluginops_bar_form');
          jQuery('.selectFormType').trigger('change');
          jQuery('.hideOnInline').css('display','block');
        }
        if (selectedOptinType == 'Fly In') {
          jQuery('.pb_editor_tab_content #tab1').css({
          'width':'400px'
          });
          
          jQuery('.selectFormType').val('pluginops_flyin_form');
          jQuery('.selectFormType').trigger('change');
          jQuery('.hideOnInline').css('display','block');
        }
        if (selectedOptinType == 'PopUp') {
          jQuery('.selectFormType').val('pluginops_popup_form');
          jQuery('.selectFormType').trigger('change');
          jQuery('.hideOnInline').css('display','block');
        }
        
        if (selectedOptinType == 'Full Page') {
          jQuery('.pb_editor_tab_content #tab1').css({
          'width':'100%'
          });
          jQuery('#pbWrapper').css({
          'height':'90vh'
          });
          pbWrapperHeight = '95vh';
          jQuery('.selectFormType').val('pluginops_full_page_form');
          jQuery('.selectFormType').trigger('change');
          jQuery('.hideOnInline').css('display','block');
        }

        if ( typeof(pageOptions['pageMaxWidth']) != 'undefined' ) {
          jQuery('.pb_editor_tab_content #tab1').css({
            'width': pageOptions['pageMaxWidth']+pageOptions['pageMaxWidthU'],
          });
        }

        if (selectedOptinType == 'Side') {
          jQuery('.displayOnBox').css('display','none');
          jQuery('.inlineSpecificOptions').css('display','none');
          jQuery('.hideOnInline').css('display','none');
        }

      }
      if (currentStep == 3) {
        jQuery('.pb_loader_container').css('display','none');
        jQuery('#initializeCampaignSetup').css('display','none');
      }else{
        jQuery('#initializeCampaignSetup').css('display','block');
      }


      var campaginPlacement = pageBuilderApp.PageBuilderModel.get('campaignPlacement');
      jQuery.each(campaginPlacement['displayOn'],function(index,val){
        jQuery('.displayOn[value="'+val['value']+'"]').prop('checked', "true");
      });
      jQuery.each(campaginPlacement['hideCampaignOn'],function(index,val){
        jQuery('.hideCampaignOn[value="'+val['value']+'"]').prop('checked', "true");
      });

      if (campaginPlacement['displayAction'] == '') {
        campaginPlacement['displayAction'] = 'none';
      }
      jQuery('.selectCustomPages').val( campaginPlacement['selectCustomPages'] );
      jQuery('.selectCustomPosts').val( campaginPlacement['selectCustomPosts'] );
      jQuery('.selectCustomCats').val( campaginPlacement['selectCustomCats'] );
      jQuery('.displayAction').val( campaginPlacement['displayAction'] );
      jQuery('.displayActionValue').val( campaginPlacement['displayActionValue'] );
      jQuery('.barPositioning').val( campaginPlacement['barPositioning'] );
      jQuery('.flyInPositioning').val( campaginPlacement['flyInPositioning'] );
      jQuery('.generatedShortcode').val( campaginPlacement['generatedShortcode'] );
      jQuery('.popUpEntranceAnimation').val( campaginPlacement['popUpEntranceAnimation'] );
      jQuery('.popUpExitAnimation').val( campaginPlacement['popUpExitAnimation'] );
      jQuery('.popUpExitAnimation').val( campaginPlacement['popUpExitAnimation'] );
      jQuery('.hideAfterCampaignClosed').val( campaginPlacement['hideAfterCampaignClosed'] );
      jQuery('.cookieConversionTime').val( campaginPlacement['cookieConversionTime'] );
      jQuery('.cookieCloseTime').val( campaginPlacement['cookieCloseTime'] );
      jQuery('.displayOn').trigger('change');
      jQuery('.popUpEntranceAnimation').trigger('change');

      if (typeof(campaginPlacement['placeOptinAt'] ) != 'undefined' && campaginPlacement['hideAfterCampaignClosed'] != null) {
        jQuery('.placeOptinAt').val(campaginPlacement['placeOptinAt']);
      }
      

      if (campaginPlacement['hideAfterCampaignClosed'] == '') {
        jQuery('.hideAfterCampaignClosed').val('true');
      }
      if (campaginPlacement['cookieConversionTime'] == '') {
        jQuery('.cookieConversionTime').val('30');
      }
      if (campaginPlacement['cookieCloseTime'] == '') {
        jQuery('.cookieCloseTime').val('1');
      }

      POPBDefaults = '';
      if (typeof(pageOptions['POPBDefaults'])  != 'undefined') {
        var POPBDefaults = pageOptions['POPBDefaults'];
      }
      
      POPBDefaultsEnable = '';
      if (typeof(POPBDefaults['POPBDefaultsEnable'])  != 'undefined') {
        var POPBDefaultsEnable = POPBDefaults['POPBDefaultsEnable'];
      }

      POPB_typefaces = '';
      if (typeof(POPBDefaults['POPB_typefaces'])  != 'undefined') {
        var POPB_typefaces = POPBDefaults['POPB_typefaces'];
      }

      POPB_typeSizes = '';
      if (typeof(POPBDefaults['POPB_typeSizes'])  != 'undefined') {
        var POPB_typeSizes = POPBDefaults['POPB_typeSizes'];
      }

      if (typeof(pageOptions['MultiVariantTesting'])  != 'undefined') {
        var MultiVariantTesting = pageOptions['MultiVariantTesting'];
        jQuery('.VariantB').val(MultiVariantTesting['VariantB']);
        jQuery('.VariantC').val(MultiVariantTesting['VariantC']);
        jQuery('.VariantD').val(MultiVariantTesting['VariantD']);
      }

      if (POPB_typefaces != '') {
        
        jQuery.each(POPB_typefaces, function(index,val){


          if (val == '') { val = ' '; }

          jQuery('.'+index).val(val);

          jQuery('.'+index).next('.font-select').children('a').children('.font_select_placeholder').html( val.replace(/\+/g, ' ') );

        });
      }

      jQuery.each(POPB_typeSizes, function(index,val){
        jQuery('.'+index).val(val);
      });


      if (typeof(pageOptions['POPBDefaults'])  != 'undefined') {

        jQuery('.POPBDefaultsEnable').val(POPBDefaultsEnable);

        if (POPBDefaultsEnable == 'true') {

          jQuery('#fontLoaderContainer').html('<link rel="stylesheet"href="https://fonts.googleapis.com/css?family='+POPB_typefaces['typefaceHOne']+'|'+POPB_typefaces['typefaceHTwo']+'|'+POPB_typefaces['typefaceParagraph']+'|'+POPB_typefaces['typefaceButton']+'|'+POPB_typefaces['typefaceAnchorLink']+' ">');

          var POPBGlobalStylesTag = '\n'+

            '#pbWrapper h1 { font-family:'+POPB_typefaces['typefaceHOne'].replace(/\+/g, ' ')+'; font-size:'+POPB_typeSizes['typeSizeHOne']+'px; }  \n'+

            '#pbWrapper h2 { font-family:'+POPB_typefaces['typefaceHTwo'].replace(/\+/g, ' ')+'; font-size:'+POPB_typeSizes['typeSizeHTwo']+'px; }  \n'+

            '#pbWrapper p { font-family:'+POPB_typefaces['typefaceParagraph'].replace(/\+/g, ' ')+'; font-size:'+POPB_typeSizes['typeSizeParagraph']+'px; }  \n'+

            '#pbWrapper button { font-family:'+POPB_typefaces['typefaceButton'].replace(/\+/g, ' ')+'; font-size:'+POPB_typeSizes['typeSizeButton']+'px; }  \n'+
            
            '#pbWrapper a { font-family:'+POPB_typefaces['typefaceAnchorLink'].replace(/\+/g, ' ')+'; font-size:'+POPB_typeSizes['typeSizeAnchorLink']+'px; } \n';

          jQuery('#POPBGlobalStylesTag').html(POPBGlobalStylesTag);
        }else{
          jQuery('#POPBGlobalStylesTag').html('');
        }
      }



      if (typeof(pageOptions['POcustomCSS']) == 'undefined') { POcustomCSS = '/*Add your custom CSS here.*/'}

      jQuery('.POcustomCSS').val(POcustomCSS);
      if (POcustomCSS !== '') {
        PbPOaceEditorCSS.setValue(POcustomCSS);
      } else {
        PbPOaceEditorCSS.setValue('/* Add your custom CSS here.*/');
      }

      if (typeof(pageOptions['POcustomJS']) == 'undefined') { POcustomJS = '/*Add your custom CSS here.*/'}

      jQuery('.POcustomJS').val(POcustomJS);
      if (POcustomJS !== '') {
        PbPOaceEditorJS.setValue(POcustomJS);
      } else {
        PbPOaceEditorJS.setValue('/* Add your custom Javascript here.*/');
      }

      if (typeof(pageOptions['hideCloseBtn'])  != 'undefined') {
        jQuery('.hideCloseBtn').val(pageOptions['hideCloseBtn']);
        jQuery('.closeOnOverlay').val(pageOptions['closeOnOverlay']);
        jQuery('.overlayColor').val(pageOptions['overlayColor']);
      }

      if (pageStatus == 'unpublished') {
        pageStatus = 'draft';
      }
      
      if (pageStatus == 'publish') {
        jQuery('.draftBtn').css('display','none');
        jQuery('#pbbtnRedo').css('margin-right','18%');
        jQuery('.publishBtn').text('Update');
      }else{
        jQuery('#pbbtnRedo').css('margin-right','8.5%');
      }
        
      jQuery('#title').val(pageSeoName);
      jQuery('#new-post-slug').val(pageLink);
      jQuery('#title-prompt-text').html(' ');
      jQuery('.PbPageStatus').val(pageStatus);
      jQuery('.pageSeoDescription').val(pageSeoDescription);
      jQuery('.pageSeoKeywords').val(pageSeoKeywords);
      jQuery('.pageBgImage').val(pageBgImage);
      jQuery('.pageMaxWidth').val( pageOptions['pageMaxWidth'] );
      jQuery('.pageMaxWidthT').val( pageOptions['pageMaxWidthT'] );
      jQuery('.pageMaxWidthM').val( pageOptions['pageMaxWidthM'] );
      jQuery('.pageMaxWidthU').val( pageOptions['pageMaxWidthU'] );
      jQuery('.pageMaxWidthUT').val( pageOptions['pageMaxWidthUT'] );
      jQuery('.pageMaxWidthUM').val( pageOptions['pageMaxWidthUM'] );
      jQuery('.pageBgColor').val(pageBgColor);
      jQuery('.pagePaddingTop').val(pagePaddingTop);
      jQuery('.pagePaddingBottom').val(pagePaddingBottom);
      jQuery('.pagePaddingLeft').val(pagePaddingLeft);
      jQuery('.pagePaddingRight').val(pagePaddingRight); 
      jQuery('.pageLogoUrl').val(pageLogoUrl);
      jQuery('.pageFavIconUrl').val(pageFavIconUrl);
      jQuery('.VariantB_ID').val(VariantB_ID);


     jQuery( ".pageMaxWidthSlider" ).slider({
        value: pageOptions['pageMaxWidth'],
        min: 0,
        max: 100,
        step: 5,
        slide: function( event, ui ) {
          POPBtagerInput =jQuery(this).attr('data-targetRangeInput');
         jQuery('.'+POPBtagerInput).val(ui.value);
         jQuery('.'+POPBtagerInput).trigger('change');
        }
      });
     jQuery( ".pageMaxWidthSliderT" ).slider({
        value: pageOptions['pageMaxWidthT'],
        min: 0,
        max: 100,
        step: 5,
        slide: function( event, ui ) {
          POPBtagerInput =jQuery(this).attr('data-targetRangeInput');
         jQuery('.'+POPBtagerInput).val(ui.value);
         jQuery('.'+POPBtagerInput).trigger('change');
        }
      });
     jQuery( ".pageMaxWidthSliderM" ).slider({
        value: pageOptions['pageMaxWidthM'],
        min: 0,
        max: 100,
        step: 5,
        slide: function( event, ui ) {
          POPBtagerInput =jQuery(this).attr('data-targetRangeInput');
         jQuery('.'+POPBtagerInput).val(ui.value);
         jQuery('.'+POPBtagerInput).trigger('change');
        }
      });

      if (typeof(pageOptions['pagePaddingTablet']) !== 'undefined') {
        pagePaddingTablet = pageOptions['pagePaddingTablet'];
        pagePaddingMobile = pageOptions['pagePaddingMobile'];

        jQuery('.pagePaddingTopTablet').val(pagePaddingTablet['pagePaddingTopTablet']);
        jQuery('.pagePaddingBottomTablet').val(pagePaddingTablet['pagePaddingBottomTablet']);
        jQuery('.pagePaddingLeftTablet').val(pagePaddingTablet['pagePaddingLeftTablet']);
        jQuery('.pagePaddingRightTablet').val(pagePaddingTablet['pagePaddingRightTablet']); 

        jQuery('.pagePaddingTopMobile').val(pagePaddingMobile['pagePaddingTopMobile']);
        jQuery('.pagePaddingBottomMobile').val(pagePaddingMobile['pagePaddingBottomMobile']);
        jQuery('.pagePaddingLeftMobile').val(pagePaddingMobile['pagePaddingLeftMobile']);
        jQuery('.pagePaddingRightMobile').val(pagePaddingMobile['pagePaddingRightMobile']); 

      }

      var bodyID = 'pbWrapper';
      var bodyBackgroundOptions = 'background-color:' + pageBgColor + ';';
      if (pageBgImage != '') {
        bodyBackgroundOptions = 'background: url(' + pageBgImage + '); background-size: cover; ';
      }
      if (typeof (pageOptions['bodyBackgroundType']) !== 'undefined') {
        if (pageOptions['bodyBackgroundType'] == 'gradient') {
          var bodyGradient = pageOptions['bodyGradient'];
          if (bodyGradient['bodyGradientType'] == 'linear') {
            bodyBackgroundOptions = 'background: linear-gradient(' + bodyGradient['bodyGradientAngle'] + 'deg, ' + bodyGradient['bodyGradientColorFirst'] + ' ' + bodyGradient['bodyGradientLocationFirst'] + '%,' + bodyGradient['bodyGradientColorSecond'] + ' ' + bodyGradient['bodyGradientLocationSecond'] + '%);';
          }
          if (bodyGradient['bodyGradientType'] == 'radial') {
            bodyBackgroundOptions = 'background: radial-gradient(at ' + bodyGradient['bodyGradientPosition'] + ', ' + bodyGradient['bodyGradientColorFirst'] + ' ' + bodyGradient['bodyGradientLocationFirst'] + '%,' + bodyGradient['bodyGradientColorSecond'] + ' ' + bodyGradient['bodyGradientLocationSecond'] + '%);';
          }
        }
      }
      var thisbodyHoverStyleTag = '';
      var thisbodyHoverOption = '';
      if (typeof (pageOptions['bodyHoverOptions']) !== 'undefined') {
        var bodyHoverOptions = pageOptions['bodyHoverOptions'];
        if (bodyHoverOptions['bodyBackgroundTypeHover'] == 'solid') {
          var thisbodyHoverOption = ' #' + bodyID + ':hover { background:' + bodyHoverOptions['bodyBgColorHover'] + ' !important; transition: all ' + bodyHoverOptions['bodyHoverTransitionDuration'] + 's; }';
        }
        if (bodyHoverOptions['bodyBackgroundTypeHover'] == 'gradient') {
          var bodyGradientHover = bodyHoverOptions['bodyGradientHover'];
          if (bodyGradientHover['bodyGradientTypeHover'] == 'linear') {
            thisbodyHoverOption = ' #' + bodyID + ':hover { background: linear-gradient(' + bodyGradientHover['bodyGradientAngleHover'] + 'deg, ' + bodyGradientHover['bodyGradientColorFirstHover'] + ' ' + bodyGradientHover['bodyGradientLocationFirstHover'] + '%,' + bodyGradientHover['bodyGradientColorSecondHover'] + ' ' + bodyGradientHover['bodyGradientLocationSecondHover'] + '%) !important; transition: all ' + bodyHoverOptions['bodyHoverTransitionDuration'] + 's; }';
          }
          if (bodyGradientHover['bodyGradientTypeHover'] == 'radial') {
            thisbodyHoverOption = ' #' + bodyID + ':hover { background: radial-gradient(at ' + bodyGradientHover['bodyGradientPositionHover'] + ', ' + bodyGradientHover['bodyGradientColorFirstHover'] + ' ' + bodyGradientHover['bodyGradientLocationFirstHover'] + '%,' + bodyGradientHover['bodyGradientColorSecondHover'] + ' ' + bodyGradientHover['bodyGradientLocationSecondHover'] + '%) !important; transition: all ' + bodyHoverOptions['bodyHoverTransitionDuration'] + 's; }';
          }
        }
        jQuery('#POPBBodyHoverStylesTag').html(thisbodyHoverOption);
      }
      bodyOverlayBackgroundOptions = '';
      if (typeof (pageOptions['bodyBgOverlayColor']) !== 'undefined') {
        var bodyOverlayBackgroundOptions = 'background:' + pageOptions['bodyBgOverlayColor'] + '; background-color:' + pageOptions['bodyBgOverlayColor'] + ';';
      }
      if (typeof (pageOptions['bodyOverlayBackgroundType']) !== 'undefined') {
        if (pageOptions['bodyOverlayBackgroundType'] == 'gradient') {
          var bodyOverlayGradient = pageOptions['bodyOverlayGradient'];
          if (bodyOverlayGradient['bodyOverlayGradientType'] == 'linear') {
            bodyOverlayBackgroundOptions = 'background: linear-gradient(' + bodyOverlayGradient['bodyOverlayGradientAngle'] + 'deg, ' + bodyOverlayGradient['bodyOverlayGradientColorFirst'] + ' ' + bodyOverlayGradient['bodyOverlayGradientLocationFirst'] + '%,' + bodyOverlayGradient['bodyOverlayGradientColorSecond'] + ' ' + bodyOverlayGradient['bodyOverlayGradientLocationSecond'] + '%);';
          }
          if (bodyOverlayGradient['bodyOverlayGradientType'] == 'radial') {
            bodyOverlayBackgroundOptions = 'background: radial-gradient(at ' + bodyOverlayGradient['bodyOverlayGradientPosition'] + ', ' + bodyOverlayGradient['bodyOverlayGradientColorFirst'] + ' ' + bodyOverlayGradient['bodyOverlayGradientLocationFirst'] + '%,' + bodyOverlayGradient['bodyOverlayGradientColorSecond'] + ' ' + bodyOverlayGradient['bodyGradientLocationSecond'] + '%);';
          }
        }
      }

      jQuery('#pbWrapperContainerOverlay').attr('style',bodyOverlayBackgroundOptions);

      // Populate body background Options
      if (typeof (pageOptions['bodyGradient']) !== "undefined") {
        var bodyGradient = pageOptions['bodyGradient'];
        jQuery.each(bodyGradient, function (index, val) {
          jQuery('.' + index).val(val);
          if (index == 'bodyGradientColorFirst') {
            jQuery('.bodyGradientColorFirst').parent().parent().siblings('.wp-color-result').children('.color-alpha').css('background', val);
          }
          if (index == 'bodyGradientColorSecond') {
            jQuery('.bodyGradientColorSecond').parent().parent().siblings('.wp-color-result').children('.color-alpha').css('background', val);
          }
        });
        if (bodyGradient['bodyGradientType'] == 'linear') {
          jQuery('.radialInput').css('display', 'none');
          jQuery('.linearInput').css('display', 'block');
        } else if (bodyGradient['bodyGradientType'] == 'radial') {
          jQuery('.radialInput').css('display', 'block');
          jQuery('.linearInput').css('display', 'none');
        }
      } else {
        jQuery('.bodyGradientColorFirst').val('');
        jQuery('.bodyGradientLocationFirst').val('');
        jQuery('.bodyGradientColorSecond').val('');
        jQuery('.bodyGradientLocationSecond').val('');
        jQuery('.bodyGradientType').val('');
        jQuery('.bodyGradientPosition').val('');
        jQuery('.bodyGradientAngle').val('');
      }
      if (typeof (pageOptions['bodyBackgroundType']) !== "undefined") {
        if (pageOptions['bodyBackgroundType'] == 'solid') {
          jQuery(".POPBInputNormalbody .bodyBackgroundTypeSolid").prop("checked", true);
          jQuery('.POPBInputNormalbody .popbNavItem label').css({
            'background': '#f1f1f1',
            'color': '#333'
          });
          jQuery('.POPBInputNormalbody .bodyBackgroundTypeSolid').prev('label').css({
            'background': '#a5a5a5',
            'color': '#fff'
          });
          jQuery('.POPBInputNormalbody .popb_tab_content').css('display', 'none');
          jQuery('.POPBInputNormalbody .content_popb_tab_1').css('display', 'block');
        }
        if (pageOptions['bodyBackgroundType'] == 'gradient') {
          jQuery(".bodyBackgroundTypeGradient").prop("checked", true);
          jQuery('.POPBInputNormalbody .popbNavItem label').css({
            'background': '#f1f1f1',
            'color': '#333'
          });
          jQuery('.bodyBackgroundTypeGradient').prev('label').css({
            'background': '#a5a5a5',
            'color': '#fff'
          });
          jQuery('.POPBInputNormalbody .popb_tab_content').css('display', 'none');
          jQuery('.POPBInputNormalbody .content_popb_tab_2').css('display', 'block');
        }
      } else {
        jQuery(".POPBInputNormalbody .bodyBackgroundTypeSolid").prop("checked", true);
        jQuery('.popbNavItem label').css({
          'background': '#f1f1f1',
          'color': '#333'
        });
        jQuery('.POPBInputNormalbody .bodyBackgroundTypeSolid').prev('label').css({
          'background': '#a5a5a5',
          'color': '#fff'
        });
        jQuery('.popb_tab_content').css('display', 'none');
        jQuery('.content_popb_tab_1').css('display', 'block');
      }
      if (typeof (pageOptions['bodyHoverOptions']) !== "undefined") {
        var bodyHoverOptions = pageOptions['bodyHoverOptions'];
        if (bodyHoverOptions['bodyBgColorHover'] != '' || typeof (bodyHoverOptions['bodyBgColorHover']) != 'undefined') {
          jQuery('.bodyBgColorHover').val(bodyHoverOptions['bodyBgColorHover']);
          jQuery('.bodyBgColorHover').parent().parent().siblings('.wp-color-result').children('.color-alpha').css('background', bodyHoverOptions['bodyBgColorHover']);
        } else {
          jQuery('.bodyBgColorHover').val('');
        }
        jQuery('.bodyHoverTransitionDuration').val(bodyHoverOptions['bodyHoverTransitionDuration']);
        if (bodyHoverOptions['bodyBackgroundTypeHover'] == 'solid') {
          jQuery(".bodyBackgroundTypeSolidHover").prop("checked", true);
          jQuery('.POPBInputHoverbody .popbNavItem label').css({
            'background': '#f1f1f1',
            'color': '#333'
          });
          jQuery('.bodyBackgroundTypeSolidHover').prev('label').css({
            'background': '#a5a5a5',
            'color': '#fff'
          });
          jQuery('.POPBInputHoverbody .popb_tab_content').css('display', 'none');
          jQuery('.POPBInputHoverbody .content_popb_tab_1').css('display', 'block');
        }
        if (bodyHoverOptions['bodyBackgroundTypeHover'] == 'gradient') {
          jQuery(".bodyBackgroundTypeGradientHover").prop("checked", true);
          jQuery('.POPBInputHoverbody .popbNavItem label').css({
            'background': '#f1f1f1',
            'color': '#333'
          });
          jQuery('.bodyBackgroundTypeGradientHover').prev('label').css({
            'background': '#a5a5a5',
            'color': '#fff'
          });
          jQuery('.POPBInputHoverbody .popb_tab_content').css('display', 'none');
          jQuery('.POPBInputHoverbody .content_popb_tab_2').css('display', 'block');
        }
        if (bodyHoverOptions['bodyBackgroundTypeHover'] == '' || typeof (bodyHoverOptions['bodyBackgroundTypeHover']) == 'undefined') {
          jQuery(".bodyBackgroundTypeSolidHover").prop("checked", false);
          jQuery(".bodyBackgroundTypeGradientHover").prop("checked", false);
          jQuery('.POPBInputHoverbody .popbNavItem label').css({
            'background': '#f1f1f1',
            'color': '#333'
          });
        }
        var bodyGradientHover = bodyHoverOptions['bodyGradientHover'];
        jQuery.each(bodyGradientHover, function (index, val) {
          jQuery('.' + index).val(val);
          if (index == 'bodyGradientColorFirstHover') {
            jQuery('.bodyGradientColorFirstHover').parent().parent().siblings('.wp-color-result').children('.color-alpha').css('background', val);
          }
          if (index == 'bodyGradientColorSecondHover') {
            jQuery('.bodyGradientColorSecondHover').parent().parent().siblings('.wp-color-result').children('.color-alpha').css('background', val);
          }
        });
        if (bodyGradientHover['bodyGradientTypeHover'] == 'linear') {
          jQuery('.radialInputHover').css('display', 'none');
          jQuery('.linearInputHover').css('display', 'block');
        } else if (bodyGradientHover['bodyGradientTypeHover'] == 'radial') {
          jQuery('.radialInputHover').css('display', 'block');
          jQuery('.linearInputHover').css('display', 'none');
        }
      } else {
        jQuery('.bodyBgColorHover').val('');
        jQuery('.bodyGradientColorFirstHover').val('');
        jQuery('.bodyGradientLocationFirstHover').val('');
        jQuery('.bodyGradientColorSecondHover').val('');
        jQuery('.bodyGradientLocationSecondHover').val('');
        jQuery('.bodyGradientTypeHover').val('');
        jQuery('.bodyGradientPositionHover').val('');
        jQuery('.bodyGradientAngleHover').val('');
        jQuery(".bodyBackgroundTypeSolidHover").prop("checked", false);
        jQuery(".bodyBackgroundTypeGradientHover").prop("checked", false);
      }
      if (typeof (pageOptions['bodyBgOverlayColor']) !== "undefined") {
        jQuery('.bodyBgOverlayColor').val(pageOptions['bodyBgOverlayColor']);
        jQuery('.bodyBgOverlayColor').parent().parent().siblings('.wp-color-result').children('.color-alpha').css('background', pageOptions['bodyBgOverlayColor']);
      } else {
        jQuery('.bodyBgOverlayColor').val('');
      }
      if (typeof (pageOptions['bodyOverlayGradient']) !== "undefined") {
        var bodyOverlayGradient = pageOptions['bodyOverlayGradient'];
        jQuery.each(bodyOverlayGradient, function (index, val) {
          jQuery('.' + index).val(val);
          if (index == 'bodyOverlayGradientColorFirst') {
            jQuery('.bodyOverlayGradientColorFirst').parent().parent().siblings('.wp-color-result').children('.color-alpha').css('background', val);
          }
          if (index == 'bodyOverlayGradientColorSecond') {
            jQuery('.bodyOverlayGradientColorSecond').parent().parent().siblings('.wp-color-result').children('.color-alpha').css('background', val);
          }
        });
        if (bodyOverlayGradient['bodyOverlayGradientType'] == 'linear') {
          jQuery('.radialInput').css('display', 'none');
          jQuery('.linearInput').css('display', 'block');
        } else if (bodyOverlayGradient['bodyOverlayGradientType'] == 'radial') {
          jQuery('.radialInput').css('display', 'block');
          jQuery('.linearInput').css('display', 'none');
        }
      } else {
        jQuery('.bodyOverlayGradientColorFirst').val('');
        jQuery('.bodyOverlayGradientLocationFirst').val('');
        jQuery('.bodyOverlayGradientColorSecond').val('');
        jQuery('.bodyOverlayGradientLocationSecond').val('');
        jQuery('.bodyOverlayGradientType').val('');
        jQuery('.bodyOverlayGradientPosition').val('');
        jQuery('.bodyOverlayGradientAngle').val('');
      }
      if (typeof (pageOptions['bodyOverlayBackgroundType']) !== "undefined") {
        if (pageOptions['bodyOverlayBackgroundType'] == 'solid') {
          jQuery(".POPBInputNormalbody .bodyOverlayBackgroundTypeSolid").prop("checked", true);
          jQuery('.POPBInputNormalbody .popbNavItem label').css({
            'background': '#f1f1f1',
            'color': '#333'
          });
          jQuery('.POPBInputNormalbody .bodyOverlayBackgroundTypeSolid').prev('label').css({
            'background': '#a5a5a5',
            'color': '#fff'
          });
          jQuery('.POPBInputNormalbody .popb_tab_content').css('display', 'none');
          jQuery('.POPBInputNormalbody .content_popb_tab_1').css('display', 'block');
        }
        if (pageOptions['bodyOverlayBackgroundType'] == 'gradient') {
          jQuery(".bodyOverlayBackgroundTypeGradient").prop("checked", true);
          jQuery('.POPBInputNormalbody .popbNavItem label').css({
            'background': '#f1f1f1',
            'color': '#333'
          });
          jQuery('.bodyOverlayBackgroundTypeGradient').prev('label').css({
            'background': '#a5a5a5',
            'color': '#fff'
          });
          jQuery('.POPBInputNormalbody .popb_tab_content').css('display', 'none');
          jQuery('.POPBInputNormalbody .content_popb_tab_2').css('display', 'block');
        }
      } else {
        jQuery(".POPBInputNormalbody .bodyOverlayBackgroundTypeSolid").prop("checked", false);
        jQuery(".POPBInputNormalbody .bodyOverlayBackgroundTypeGradient").prop("checked", false);
        jQuery('.popbNavItem label').css({
          'background': '#f1f1f1',
          'color': '#333'
        });
        jQuery('.popb_tab_content').css('display', 'none');
        jQuery('.content_popb_tab_1').css('display', 'block');
      }

      bodyBorderRadius = '';
      bodyBorderType = ''; bodyBorderWidth = ''; bodyBorderColor = '';
      if (typeof(pageOptions['bodyBorderType'])  != 'undefined') {
        bodyBorderType = pageOptions['bodyBorderType'];
        bodyBorderWidth = pageOptions['bodyBorderWidth'];
        bodyBorderColor = pageOptions['bodyBorderColor'];
        
        jQuery('.bodyBorderType').val(bodyBorderType);
        jQuery('.bodyBorderWidth').val(bodyBorderWidth);
        jQuery('.bodyBorderColor').val(bodyBorderColor);
        if (typeof(pageOptions['bodyBorderRadius']) != 'undefined' ) {
          bodyBorderRadius = pageOptions['bodyBorderRadius'];
        }

        if (typeof(bodyBorderRadius['bbrt']) != 'undefined' ) {
          jQuery('.bbrt').val(bodyBorderRadius['bbrt']);
          jQuery('.bbrb').val(bodyBorderRadius['bbrb']);
          jQuery('.bbrl').val(bodyBorderRadius['bbrl']);
          jQuery('.bbrr').val(bodyBorderRadius['bbrr']);
        }else{
          jQuery('.bbrt').val(bodyBorderRadius);
          jQuery('.bbrb').val(bodyBorderRadius);
          jQuery('.bbrl').val(bodyBorderRadius);
          jQuery('.bbrr').val(bodyBorderRadius);

          bodyBorderRadius['bbrt'] = bodyBorderRadius;
          bodyBorderRadius['bbrb'] = bodyBorderRadius;
          bodyBorderRadius['bbrl'] = bodyBorderRadius;
          bodyBorderRadius['bbrr'] = bodyBorderRadius;
        }

      }

      containerBorderRadius = ' '+bodyBorderRadius['bbrt']+'px '+bodyBorderRadius['bbrr']+'px '+bodyBorderRadius['bbrb']+'px '+bodyBorderRadius['bbrl']+'px';
      jQuery('#pbWrapper').css({
        'padding-top': pagePaddingTop+'%',
        'padding-bottom': pagePaddingBottom+'%',
        'padding-left': pagePaddingLeft+'%',
        'padding-right': pagePaddingRight+'%',
        'display':'block',
        'height':pbWrapperHeight,
        'border': bodyBorderWidth+'px '+bodyBorderType+' '+bodyBorderColor,
        'border-radius':containerBorderRadius+' ',
      });

      var pbWrapperExistingStyles = jQuery('#pbWrapper').attr('style');
      jQuery('#pbWrapper').attr('style', pbWrapperExistingStyles+bodyBackgroundOptions);

      jQuery('#pbWrapper').css('display','none');
}