( function( $ ) { 

$('.draftBtn, .publishBtn, .SavePage, #SavePageOther').on('click',function() {

  var setFrontPage = '';
  var loadWpHead = $('.loadWpHead').attr('checked');
  var loadWpFooter = $('.loadWpFooter').attr('checked');
  var pageSeoName = $('#title').val();
  var pageLink = $('#editable-post-name-full').html();
  var pageSeoDescription = $('.pageSeoDescription').val();
  var pageSeoKeywords = $('.pageSeoKeywords').val();
  var pageBgImage = $('.pageBgImage').val();
  var pageBgColor = $('.pageBgColor').val();
  var pagePaddingTop = $('.pagePaddingTop').val();
  var pagePaddingBottom = $('.pagePaddingBottom').val();
  var pagePaddingLeft = $('.pagePaddingLeft').val();
  var pagePaddingRight = $('.pagePaddingRight').val(); 
  var pageLogoUrl = $('.pageLogoUrl').val();
  var pageFavIconUrl = $('.pageFavIconUrl').val();
  var VariantB_ID = $('.VariantB_ID').val();

  var PbPageStatus = $('.PbPageStatus').val();
  var checkBtnClickedTypePublish = $(this).hasClass('publishBtn');
  if (checkBtnClickedTypePublish == true) {
    PbPageStatus = 'publish';
  }
  var checkBtnClickedTypeDraft = $(this).hasClass('draftBtn');
  if (checkBtnClickedTypeDraft == true) {
    PbPageStatus = 'draft';
  }

  var POcustomCSS = PbPOaceEditorCSS.getValue();
  var POcustomJS = PbPOaceEditorJS.getValue();

  var mailchimpListIdHolder = $('.mailchimpListIdHolder').val();
  var mailchimpApiKeyHolder = $('.mailchimpApiKeyHolder').val();

  if ($('.setFrontPage').is(':checked')) {
    setFrontPage = "true";
  } else{
    setFrontPage = "false"; 
  }

  if (loadWpHead == 'checked') {
    loadWpHead = "true";
  } else{
    loadWpHead = "false"; 
  }

  if (loadWpFooter == 'checked') {
    loadWpFooter = "true";
  } else{
    loadWpFooter = "false"; 
  }

  var POPBDefaultsEnable = $('.POPBDefaultsEnable').val();

  var POPB_typefaces =  {
    typefaceHOne:$('.typefaceHOne').val() ,
    typefaceHTwo:$('.typefaceHTwo').val(),
    typefaceParagraph:$('.typefaceParagraph').val(),
    typefaceButton:$('.typefaceButton').val(),
    typefaceAnchorLink:$('.typefaceAnchorLink').val()
  };

  var POPB_typeSizes = {
    typeSizeHOne:$('.typeSizeHOne').val(),
    typeSizeHTwo:$('.typeSizeHTwo').val(),
    typeSizeParagraph:$('.typeSizeParagraph').val(),
    typeSizeButton:$('.typeSizeButton').val(),
    typeSizeAnchorLink:$('.typeSizeAnchorLink').val(),
    typeSizeHOneTablet:$('.typeSizeHOneTablet').val(),
    typeSizeHOneMobile:$('.typeSizeHOneMobile').val(),
    typeSizeHTwoTablet:$('.typeSizeHTwoTablet').val(),
    typeSizeHTwoMobile:$('.typeSizeHTwoMobile').val(),
    typeSizeParagraphTablet:$('.typeSizeParagraphTablet').val(),
    typeSizeParagraphMobile:$('.typeSizeParagraphMobile').val(),
    typeSizeButtonTablet:$('.typeSizeButtonTablet').val(),
    typeSizeButtonMobile:$('.typeSizeButtonMobile').val(),
    typeSizeAnchorLinkTablet:$('.typeSizeAnchorLinkTablet').val(),
    typeSizeAnchorLinkMobile:$('.typeSizeAnchorLinkMobile').val(),
  };





  var pageOps = {
    setFrontPage: setFrontPage,
    loadWpHead:loadWpHead,
    loadWpFooter: loadWpFooter,
    pageBgImage: pageBgImage,
    pageBgColor: pageBgColor,
    pageMaxWidth:$('.pageMaxWidth').val(),
    pageMaxWidthT:$('.pageMaxWidthT').val(),
    pageMaxWidthM:$('.pageMaxWidthM').val(),
    pageMaxWidthU:$('.pageMaxWidthU').val(),
    pageMaxWidthUT:$('.pageMaxWidthUT').val(),
    pageMaxWidthUM:$('.pageMaxWidthUM').val(),
    pageLink: pageLink,
    pagePadding: {
      pagePaddingTop : pagePaddingTop,
      pagePaddingBottom : pagePaddingBottom,
      pagePaddingLeft : pagePaddingLeft,
      pagePaddingRight : pagePaddingRight,
    },
    pagePaddingTablet: {
      pagePaddingTopTablet : $('.pagePaddingTopTablet').val(),
      pagePaddingBottomTablet : $('.pagePaddingBottomTablet').val(),
      pagePaddingLeftTablet : $('.pagePaddingLeftTablet').val(),
      pagePaddingRightTablet : $('.pagePaddingRightTablet').val(),
    },
    pagePaddingMobile: {
      pagePaddingTopMobile : $('.pagePaddingTopMobile').val(),
      pagePaddingBottomMobile : $('.pagePaddingBottomMobile').val(),
      pagePaddingLeftMobile : $('.pagePaddingLeftMobile').val(),
      pagePaddingRightMobile : $('.pagePaddingRightMobile').val(),
    },
    pageSeoName: pageSeoName,
    pageSeoDescription: pageSeoDescription,
    pageSeoKeywords: pageSeoKeywords,
    pageLogoUrl: pageLogoUrl,
    pageFavIconUrl: pageFavIconUrl,
    MultiVariantTesting: {
      VariantB: $('.VariantB').val(),
      VariantC:$('.VariantC').val(),
      VariantD:$('.VariantD').val(),
    },
    POcustomCSS:POcustomCSS,
    POcustomJS:POcustomJS,
    POPBDefaults: {
      POPBDefaultsEnable : POPBDefaultsEnable,
      POPB_typefaces:POPB_typefaces ,
      POPB_typeSizes: POPB_typeSizes
    },
    bodyBackgroundType:$('.bodyBackgroundType:checked').val(),
    bodyGradient:{
      bodyGradientColorFirst: $('.bodyGradientColorFirst').val(),
      bodyGradientLocationFirst:$('.bodyGradientLocationFirst').val(),
      bodyGradientColorSecond:$('.bodyGradientColorSecond').val(),
      bodyGradientLocationSecond:$('.bodyGradientLocationSecond').val(),
      bodyGradientType:$('.bodyGradientType').val(),
      bodyGradientPosition:$('.bodyGradientPosition').val(),
      bodyGradientAngle:$('.bodyGradientAngle').val(),
    },
    bodyHoverOptions: {
      bodyBgColorHover:$('.bodyBgColorHover').val(),
      bodyBackgroundTypeHover:$('.bodyBackgroundTypeHover:checked').val(),
      bodyHoverTransitionDuration:$('.bodyHoverTransitionDuration').val(),
      bodyGradientHover:{
        bodyGradientColorFirstHover: $('.bodyGradientColorFirstHover').val(),
        bodyGradientLocationFirstHover:$('.bodyGradientLocationFirstHover').val(),
        bodyGradientColorSecondHover:$('.bodyGradientColorSecondHover').val(),
        bodyGradientLocationSecondHover:$('.bodyGradientLocationSecondHover').val(),
        bodyGradientTypeHover:$('.bodyGradientTypeHover').val(),
        bodyGradientPositionHover:$('.bodyGradientPositionHover').val(),
        bodyGradientAngleHover:$('.bodyGradientAngleHover').val(),
      }
    },
    bodyOverlayBackgroundType: $('.bodyOverlayBackgroundType:checked').val(),
    bodyOverlayGradient:{
      bodyOverlayGradientColorFirst: $('.bodyOverlayGradientColorFirst').val(),
      bodyOverlayGradientLocationFirst:$('.bodyOverlayGradientLocationFirst').val(),
      bodyOverlayGradientColorSecond:$('.bodyOverlayGradientColorSecond').val(),
      bodyOverlayGradientLocationSecond:$('.bodyOverlayGradientLocationSecond').val(),
      bodyOverlayGradientType:$('.bodyOverlayGradientType').val(),
      bodyOverlayGradientPosition:$('.bodyOverlayGradientPosition').val(),
      bodyOverlayGradientAngle:$('.bodyOverlayGradientAngle').val(),
    },
    bodyBgOverlayColor:$('.bodyBgOverlayColor').val(),
    bodyBorderType:$('.bodyBorderType').val(),
    bodyBorderWidth:$('.bodyBorderWidth').val(),
    bodyBorderColor:$('.bodyBorderColor').val(),
    bodyBorderRadius:{
      bbrt:$('.bbrt').val(),
      bbrb:$('.bbrb').val(),
      bbrl:$('.bbrl').val(),
      bbrr:$('.bbrr').val(),
    },
    hideCloseBtn:$('.hideCloseBtn').val(),
    closeOnOverlay:$('.closeOnOverlay').val(),
    overlayColor:$('.overlayColor').val(),
  };

  var displayOn = $('input[class="displayOn"]:checked').serializeArray();
  var hideCampaignOn = $('input[class="hideCampaignOn"]:checked').serializeArray();

  $.each(displayOn,function(index,val){
    delete displayOn[index]['name'];
  });
  $.each(hideCampaignOn,function(index,val){
    delete hideCampaignOn[index]['name'];
  });


  try{

    if (typeof(displayOn[0]) != 'undefined') {
      if (displayOn[0]['value'] == 'entireWebsite') {
        homePageValueIndex = displayOn.length;
        $.each(displayOn,function(index,val){

          if (displayOn[index]['value'] == 'frontPageOnly') {
            homePageValueIndex = index;
          }

        });

        displayOn[homePageValueIndex] = {value:'frontPageOnly'};

      }
      
    }

  }catch(e){
    console.log(e);
  }

    
    

  var campaignPlacementOptions = {
    displayOn: displayOn,
    thisOptinType: pageBuilderApp.PageBuilderModel.get('optinType'),
    selectCustomPages: $('.selectCustomPages').val(),
    selectCustomPosts: $('.selectCustomPosts').val(),
    selectCustomCats: $('.selectCustomCats').val(),
    displayAction: $('.displayAction').val(),
    displayActionValue: $('.displayActionValue').val(),
    barPositioning: $('.barPositioning').val(),
    flyInPositioning: $('.flyInPositioning').val(),
    hideCampaignOn: hideCampaignOn,
    generatedShortcode: $('.generated_shortcode_displayed').text(),
    popUpEntranceAnimation:$('.popUpEntranceAnimation').val(),
    popUpExitAnimation:$('.popUpExitAnimation').val(),
    hideAfterCampaignClosed:$('.hideAfterCampaignClosed').val(),
    cookieConversionTime:$('.cookieConversionTime').val(),
    cookieCloseTime:$('.cookieCloseTime').val(),
    placeOptinAt:$('.placeOptinAt').val(),
  }


  var formMailchimp = {
    listId:mailchimpListIdHolder,
    apiKey:mailchimpApiKeyHolder,
  }

  var newPermalinkUrl = siteURLpb+'/'+pageLink;
  $('#sample-permalink a').attr('href',newPermalinkUrl);

  var isEditorEnabled = $('.pb_fullScreenEditorButton');
  if (isEditorEnabled.hasClass('EditorActive')) {
    displayEditor = 'block';
  } else{
    displayEditor = 'none';
  }

  try{
    rowListModelsString = JSON.stringify(pageBuilderApp.rowList.models);
    rowListModelsString = rowListModelsString.replaceAll('<link ', '<pluginopsfont ');
    rowListModelsString = rowListModelsString.replaceAll('<style>', '<pluginopsstyle>');
    rowListModelsString = rowListModelsString.replaceAll('</style>', '</pluginopsstyle>');
    rowListModelsString = rowListModelsString.replaceAll('<script', '<pluginopsscript');
    rowListModelsString = rowListModelsString.replaceAll('</script>', '</pluginopsscript>');
    rowListModelsParsed = JSON.parse(rowListModelsString);
  }catch(e){
    console.log(e);
  }


  //console.log($('#container').parent('#tab1'));
  $('.pb_loader_container').slideDown(200);
  var PageStatus = pageBuilderApp.PageBuilderModel.get('pageStatus');
  pageBuilderApp.PageBuilderModel.set( 'pageID', P_ID);
  pageBuilderApp.PageBuilderModel.set( 'pageOptions', pageOps);
  pageBuilderApp.PageBuilderModel.set( 'campaignPlacement', campaignPlacementOptions);
  pageBuilderApp.PageBuilderModel.set('pageStatus',PbPageStatus);
  pageBuilderApp.PageBuilderModel.set( 'formMailchimp', formMailchimp);
  pageBuilderApp.PageBuilderModel.set( 'Rows', rowListModelsParsed );


  pageBuilderAppModelToJson = JSON.stringify(  pageBuilderApp.PageBuilderModel.attributes );

  $.ajax({
          url: URLL,
          type: 'post',
          dataType: 'json',
          data: {defaults:pageBuilderAppModelToJson},
  })
  .done(function(result) {

    setTimeout(function(){
      $('.pb_loader_container').slideUp(200);
      if (PageStatus === 'publish' || PageStatus === 'draft' || PageStatus === 'private') {

      }else{
       //window.location.href = admURL+'post.php?post='+P_ID+'&action=edit'; 
      }
    }, 1000);
    window.localStorage.removeItem('ulpbStoreDataObect_'+P_ID);
    console.log('Saved');

  })
  .fail(function(response) {

    console.log(response);


    if (response.status == '403') {
      if (response['responseText'].includes('Wordfence')) {

        try {

          window.localStorage.setItem('ulpbStoreDataObect_'+P_ID, pageBuilderAppModelToJson);
          
          var nDoc = document.createElement('div'), nElem, length, i;
          nDoc.className = 'responseErrorContainer';
          nDoc.innerHTML = response['responseText'];
          sDocEl =  nDoc.querySelectorAll('#whitelist-form');
          sDocElScr =  nDoc.querySelectorAll('script');

          jQuery('.fullErrorMessage').html(sDocEl);
          jQuery('.fullErrorMessage').prepend('<h2 class="popb_confirm_message">Please click on Allowlist this Action to save.</2>');
          //jQuery('.fullErrorMessage').append(sDocElScr);

          jQuery('.fullErrorMessage').find('#verified-false-positive-checkbox').prop("checked", true);

          console.log(jQuery('.fullErrorMessage').find('#verified-false-positive-checkbox').checked);

          jQuery('.fullErrorMessage').find('#whitelist-button').trigger('click');

          //jQuery('.fullErrorMessage p').text('Click To View Full Error Message');
          jQuery('.fullErrorMessageInput').val(popb_errorLog.errorMsg);
        } catch (error) {
          
        }

          popb_errorLog.errorMsg = 'Wordfence Blocked Request - Please disable WordFence firewall. Visit the link below to disable it. <br>  <a href="'+admURL+'admin.php?page=WordfenceWAF&subpage=waf_options" target="_blank">Wordfence Firewall Settings</a>';
          
      }

    }

    
    var result = response;

    if (response['responseText'] != '') {

      jQuery('.popb_safemode_popup').css('display','block');

      jQuery('.confirm_safemode_no').on('click',function(){
        jQuery('.popb_safemode_popup').css('display','none');
        location.reload();
      });

      popb_errorLog.errorMsg = response['responseText'];
      popb_errorLog.errorURL = 'na';


      jQuery('.fullErrorMessage p').text('Click To View Full Error Message');
      jQuery('.fullErrorMessageInput').val(popb_errorLog.errorMsg);


      jQuery('.confirm_safemode_yes').on('click',function(){

        var result = " ";
        var form = jQuery('.insertTemplateForm');
        var errordata = 

        jQuery.ajax({
                  url: admURL+'/admin-ajax.php?action=popb_enable_safe_mode&POPB_nonce='+shortCodeRenderWidgetNO,
                  method: 'post',
                  data:{
                    errorMsg : popb_errorLog.errorMsg,
                    errorURL : popb_errorLog.errorURL,
                  },
                  success: function(result){
                      location.reload();
                  }
        });

      });

    }

    if (response['responseText'] == 'Invalid Nonce') {
      alert('Nonce Expired  - Changes cannot be saved, Please reload the page.');
      $('.pb_loader_container').slideUp(200);
    }else{
      alert('Page Not Saved - Some Error Occurred! ');
      $('.pb_loader_container').slideUp(200);
    }
  })




  /*
  pageBuilderApp.PageBuilderModel.save({ wait:true }).success(function(response){

    setTimeout(function(){
      $('.pb_loader_container').slideUp(200);
      if (PageStatus === 'publish' || PageStatus === 'draft' || PageStatus === 'private') {

      }else{
       //window.location.href = admURL+'post.php?post='+P_ID+'&action=edit'; 
      }
    }, 1000);
    console.log('Saved');

  }).error(function(response){

    console.log(response);
    
    var result = response;

    if (response['responseText'] != '') {

      jQuery('.popb_safemode_popup').css('display','block');

      jQuery('.confirm_safemode_no').on('click',function(){
        jQuery('.popb_safemode_popup').css('display','none');
        location.reload();
      });

      popb_errorLog.errorMsg = response['responseText'];
      popb_errorLog.errorURL = 'na';


      jQuery('.confirm_safemode_yes').on('click',function(){

        var result = " ";
        var form = jQuery('.insertTemplateForm');
        var errordata = 

        jQuery.ajax({
                  url: admURL+'/admin-ajax.php?action=popb_enable_safe_mode&POPB_nonce='+shortCodeRenderWidgetNO,
                  method: 'post',
                  data:{
                    errorMsg : popb_errorLog.errorMsg,
                    errorURL : popb_errorLog.errorURL,
                  },
                  success: function(result){
                      location.reload();
                  }
        });

      });

    }

    if (response['responseText'] == 'Invalid Nonce') {
      alert('Nonce Expired  - Changes cannot be saved, Please reload the page.');
      $('.pb_loader_container').slideUp(200);
    }else{
      alert('Page Not Saved - Some Error Occurred! ');
      $('.pb_loader_container').slideUp(200);
    }

  });

  */




  return false;
  

});

/*
$(document).ready(function(){

  setInterval(function(){

    var isChagesMade = $('.isChagesMade').val();

    if (isChagesMade == 'true') {
      
      pageBuilderApp.PageBuilderModel.set( 'Rows', pageBuilderApp.rowList.models );
      pageBuilderApp.PageBuilderModel.save({ wait:true }).success(function(response){
        console.log('Saved');
      }).error(function(response){
        console.log('Page Not Saved - Some Error Occurred! ');
      });
    } 

     $('.isChagesMade').val('false');
  }, 15000);

});
*/

}( jQuery ) );