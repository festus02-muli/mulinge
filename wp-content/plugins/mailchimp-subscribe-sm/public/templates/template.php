<?php if ( ! defined( 'ABSPATH' ) ) exit;

error_reporting(0);

if ( isset($_GET['popb_track_url']) && isset($_GET['popb_pID']) ) {
  $popb_track_url = sanitize_text_field( $_GET['popb_track_url'] );
  $post_id = sanitize_text_field( $_GET['popb_pID'] );

  if (!empty($popb_track_url) && !empty($post_id)) {
    $postStatus = get_post_status( $post_id );
    if ($postStatus == 'publish') {

      $allowed = array();
      $pluginOpsUserTimeZone = get_option('timezone_string');
      date_default_timezone_set($pluginOpsUserTimeZone);
      $todaysDate = date('d-m-Y');

      $ctnTotal = get_post_meta($post_id,'ctnTotal',true);
      $ctnTotal++;
      $updateResultConversionCount = update_post_meta( $post_id, 'ctnTotal', $ctnTotal, $unique = false);
      $ctrLinks = get_post_meta($post_id,'ctrTpLinks',true);

      if (! is_array($ctrLinks)) {
        $ctrLinks = array();
      }

      if (!isset($ctrLinks[$popb_track_url])) {
        $ctrLinks[$popb_track_url] = array();
      }

      if (!isset( $ctrLinks[$popb_track_url][$todaysDate] )) {
        $ctrLinks[$popb_track_url][$todaysDate] = 0;
      }

      $ctrLinks[$popb_track_url][$todaysDate]++;
      update_post_meta( $post_id, 'ctrTpLinks', $ctrLinks, $unique = false);

    }
    
    if ( headers_sent() ) {
      echo "<script> location.href = '$popb_track_url' </script>";
    }else{
      header('Location: ' . $popb_track_url, true, 302);
    }
    
    exit();
  }
}


if (isset($isShortCodeTemplate)) {
  if ($isShortCodeTemplate == true) {
    $current_pageID = $template_id;
  }
} else{ 
  $isShortCodeTemplate = '';
  $current_pageID = $post->ID;
}

$data = get_post_meta( $current_pageID, 'ULPB_DATA', true );

if ($data == '') {
}else{


if (isset($data['pageOptions']['MultiVariantTesting']) && $data['pageOptions']['MultiVariantTesting'] != null ) {

  $VariantB_ID = $data['pageOptions']['MultiVariantTesting']['VariantB'];
  $VariantC_ID = $data['pageOptions']['MultiVariantTesting']['VariantC'];
  $VariantD_ID = $data['pageOptions']['MultiVariantTesting']['VariantD'];
  
  if ( ($VariantB_ID != 'none' && $VariantB_ID != null && $VariantB_ID != '') || ($VariantC_ID != 'none' && $VariantC_ID != null && $VariantC_ID != '') || ($VariantD_ID != 'none' && $VariantD_ID != null && $VariantD_ID != '') ) {
    include 'ab-lib/phpab.php';
    $startAbTest = new phpab('AbTestOne');

    if ($VariantB_ID != 'none' && $VariantB_ID != null && $VariantB_ID != '') {
      $startAbTest->add_variation('variantb');
    }
    if ($VariantC_ID != 'none' && $VariantC_ID != null && $VariantC_ID != '') {
      $startAbTest->add_variation('variantc');
    }
    if ($VariantD_ID != 'none' && $VariantD_ID != null && $VariantD_ID != '') {
      $startAbTest->add_variation('variantd');
    }
   // var_dump($startAbTest->get_user_segment());

    if ($startAbTest->get_user_segment() == 'variantb') {
      $data = get_post_meta( $VariantB_ID, 'ULPB_DATA', true );
      $current_pageID = $VariantB_ID;
    }else if ($startAbTest->get_user_segment() == 'variantc') {
      $data = get_post_meta( $VariantC_ID, 'ULPB_DATA', true );
      $current_pageID = $VariantC_ID;
    }else if ($startAbTest->get_user_segment() == 'variantd') {
      $data = get_post_meta( $VariantD_ID, 'ULPB_DATA', true );
      $current_pageID = $VariantD_ID;
    }else{
      $data = get_post_meta( $current_pageID, 'ULPB_DATA', true );
    }
  }
}

$selectedOptinType = $data['optinType'];
$campaignPlacement = $data['campaignPlacement'];

$current_postType = get_post_type( $current_pageID );


$tablet_browser = 0;
$mobile_browser = 0;
 
if (preg_match('/(tablet|ipad|playbook)|(android(?!.*(mobi|opera mini)))/i', strtolower($_SERVER['HTTP_USER_AGENT']))) {
    $tablet_browser++;
}
 
if (preg_match('/(up.browser|up.link|mmp|symbian|smartphone|midp|wap|phone|android|iemobile)/i', strtolower($_SERVER['HTTP_USER_AGENT']))) {
    $mobile_browser++;
}
 
if ((strpos(strtolower($_SERVER['HTTP_ACCEPT']),'application/vnd.wap.xhtml+xml') > 0) or ((isset($_SERVER['HTTP_X_WAP_PROFILE']) or isset($_SERVER['HTTP_PROFILE'])))) {
    $mobile_browser++;
}
 
$mobile_ua = strtolower(substr($_SERVER['HTTP_USER_AGENT'], 0, 4));
$mobile_agents = array(
    'w3c ','acs-','alav','alca','amoi','audi','avan','benq','bird','blac',
    'blaz','brew','cell','cldc','cmd-','dang','doco','eric','hipt','inno',
    'ipaq','java','jigs','kddi','keji','leno','lg-c','lg-d','lg-g','lge-',
    'maui','maxo','midp','mits','mmef','mobi','mot-','moto','mwbp','nec-',
    'newt','noki','palm','pana','pant','phil','play','port','prox',
    'qwap','sage','sams','sany','sch-','sec-','send','seri','sgh-','shar',
    'sie-','siem','smal','smar','sony','sph-','symb','t-mo','teli','tim-',
    'tosh','tsm-','upg1','upsi','vk-v','voda','wap-','wapa','wapi','wapp',
    'wapr','webc','winw','winw','xda ','xda-');
 
if (in_array($mobile_ua,$mobile_agents)) {
    $mobile_browser++;
}
 
if (strpos(strtolower($_SERVER['HTTP_USER_AGENT']),'opera mini') > 0) {
    $mobile_browser++;
    $stock_ua = strtolower(isset($_SERVER['HTTP_X_OPERAMINI_PHONE_UA'])?$_SERVER['HTTP_X_OPERAMINI_PHONE_UA']:(isset($_SERVER['HTTP_DEVICE_STOCK_UA'])?$_SERVER['HTTP_DEVICE_STOCK_UA']:''));
    if (preg_match('/(tablet|ipad|playbook)|(android(?!.*mobile))/i', $stock_ua)) {
      $tablet_browser++;
    }
}
 
if ($tablet_browser > 0) {
   $ulpb_currentDevice = 'tablet';
}
else if ($mobile_browser > 0) {
   $ulpb_currentDevice = 'phone';
}
else {
   $ulpb_currentDevice = 'desktop';
}

  $widgetAnimationTriggerScript = '';
  if (!isset($widgetCounterLoadScripts)) {
    $widgetCounterLoadScripts = false;
    $widgetCountDownLoadScripts = false;
    $widgetSliderLoadScripts = false;
    $widgetFALoadScripts = false;
    $widgetVideoLoadScripts = false;
    $widgetOwlLoadScripts = false;
    $widgetWooCommLoadScripts = false;
    $widgetPostsSliderExternalScripts = false;
    $widgetSubscribeFormWidget = false;
    $shapesinluded = false;
    $widgetMasonryLoadScripts = false;
    $widgetJQueryLoadScripts = false;
    $widget_postsSliderLibrary = false;
    
    $SMFB_visitsCounted = false;
  }
  

  $POPBNallRowStyles = array();
  $POPBNallRowStylesResponsiveTablet = array();
  $POPBNallRowStylesResponsiveMobile = array();
  $POPBallColumnStylesArray = array();
  $POPBallWidgetsStylesArray = array();
  $POPBallWidgetsScriptsArray = array();
  $POPBallWidgetsScriptsFilesArray = array();
  $POPBallWidgetsStylesFilesArray = array();
  $thisColFontsToLoad = array();
  $POPB_popups_loaded = array();
  $widgetTextFontsBulk = array();
  $OptinCurrent_pageID = $current_pageID;
  $popupClosedVarUinqueName = "popupClosed_$current_pageID";

$hideOnDesktop = false; $hideOnTablet = false; $hideOnMobile = false;
if ( is_array($campaignPlacement['hideCampaignOn']) || is_object($campaignPlacement['hideCampaignOn']) ) {
  $hideCampaignOn = $campaignPlacement['hideCampaignOn'];
  foreach ($hideCampaignOn as $value) {
    if ($value['value'] == 'desktop') {
      $hideOnDesktop = true;
    }
    if ($value['value'] == 'tablet') {
      $hideOnTablet = true;
    }
    if ($value['value'] == 'phone') {
      $hideOnMobile = true;
    }
  }
}
  

$ulpb_blockedDevice = false;
if ($hideOnDesktop == true && $ulpb_currentDevice == 'desktop') {
  $ulpb_blockedDevice = true;
}
if ($hideOnTablet == true && $ulpb_currentDevice == 'tablet') {
  $ulpb_blockedDevice = true;
}
if ($hideOnMobile == true && $ulpb_currentDevice == 'phone') {
  $ulpb_blockedDevice = true;
}

if ($ulpb_blockedDevice == true) {
  $data = '';
}

if (!empty($data)) {


$lp_thisPostType = get_post_type( $current_pageID );
if ($lp_thisPostType == 'pluginops_forms') {
  if ($SMFB_visitsCounted != true) {
    include 'counter.php';
  }
}


if (isset($hideOnDesktop)) {
  if ($hideOnDesktop == true || $hideOnTablet == true || $hideOnMobile == true) {
    echo "<div id='plugionops_form_uni_device_wrapper_$current_pageID'> <style>";
    
    
    if ($hideOnDesktop == true) {
      echo "@media only screen and (min-device-width : 1085px) and (max-device-width : 3924px) {
          #plugionops_form_uni_device_wrapper_".$current_pageID." {
            display: none;
          }
        }";
    }
    if ($hideOnTablet == true) {
      echo '@media only screen and (min-device-width : 768px) and (max-device-width : 1085px) {
          #plugionops_form_uni_device_wrapper_'.$current_pageID.' {
            display: none;
          }
        }';
    }
    if ($hideOnMobile == true) {
      echo '@media only screen and (min-device-width : 320px) and (max-device-width : 480px) {
          #plugionops_form_uni_device_wrapper_'.$current_pageID.' {
            display: none;
          }
        }
        </style>
        ';
    }
  }
}

include('header.php');


$popUpEntranceAnimation = '';
$popUpExitAnimation = 'SlideOutUp';
if (isset($campaignPlacement['popUpEntranceAnimation'])) {
  $popUpEntranceAnimation = $campaignPlacement['popUpEntranceAnimation'];
  $popUpExitAnimation = $campaignPlacement['popUpExitAnimation'];
}


if (isset($campaignPlacement['hideAfterCampaignClosed']) && !empty($campaignPlacement['hideAfterCampaignClosed']) ) {
  $hideAfterCampaignClosed = $campaignPlacement['hideAfterCampaignClosed'];
}else{
  $hideAfterCampaignClosed = 'true';
}

if (isset($campaignPlacement['cookieConversionTime']) ) {
  $cookieConversionTime = $campaignPlacement['cookieConversionTime'];
  if ($cookieConversionTime == '') {
    $cookieConversionTime = '0';
  }
}else{
  $cookieConversionTime = '30';
}

if (isset($campaignPlacement['cookieCloseTime']) ) {
  $cookieCloseTime = $campaignPlacement['cookieCloseTime'];
  if ($cookieCloseTime == '') {
    $cookieCloseTime = '0';
  }
}else{
  $cookieCloseTime = '1';
}


if ( !isset($data['pageOptions']['hideCloseBtn']) ) {
  $data['pageOptions']['hideCloseBtn'] = 'block';
}
if ( !isset($data['pageOptions']['closeOnOverlay']) ) {
  $data['pageOptions']['closeOnOverlay'] = 'false';
}
if ( !isset($data['pageOptions']['overlayColor']) ) {
  $data['pageOptions']['overlayColor'] = 'rgba(0,0,0,0.6)';
}

if ($popUpExitAnimation == '' || empty($popUpExitAnimation)) {
  $popUpExitAnimation = 'slideOutUp';
}

include 'popup.php';
include 'flyin.php';
include 'bar.php';
include 'fullpage.php';



$this_PopUpClose_unique_Id = 'popup_'.$current_pageID;

if (isset($isPopUpFlyInTemplate) || isset($isPopUpTemplate) || isset($isPopUpBarTemplate) || isset($isPopUpFullPageTemplate) || $selectedOptinType == 'PopUp' || $selectedOptinType == 'Full Page' || $selectedOptinType == 'Fly In' || $selectedOptinType == 'Bar') {

  

  $pluginOpsClosePopUpConfirm = wp_create_nonce( 'MSFB_close_confirmation' );
  $closeActionUrl = admin_url("admin-ajax.php?action=smfb_popup_closed&ps_ID=$current_pageID&smfb_close_confirm=$pluginOpsClosePopUpConfirm");

  ob_start();

  ?>
  <script>
    (function($){
      $(document).ready(function() {
        $('#popb_popup_close_<?php echo $this_PopUpClose_unique_Id ?>').on('click',function(){
          var cookieCloseTime = <?php echo "$cookieCloseTime"; ?>;
          if (cookieCloseTime > 0) {
            if ($.cookie) {
              $.cookie("pluginops_user_closed_form<?php echo $current_pageID; ?>", 'yes', {path: '/', expires : cookieCloseTime/24 });
            }
          }

          <?php echo "popupClosed_$current_pageID"; ?> = 'closed';

          var result = " ";
          $.ajax({
            url: '<?php echo $closeActionUrl; ?>',
            method: 'post',
            data: '',
            success: function (result) {
            }
          });
          return false;
        });

        <?php if($data['pageOptions']['closeOnOverlay'] == 'true'){ ?>
            $('#POPB-modal-overlay_<?php echo $this_PopUpClose_unique_Id; ?>').on('click',function(ev){
              if ($(ev.target).hasClass( 'pluginops-modal')) {
                $('#popb_popup_close_<?php echo($this_PopUpClose_unique_Id); ?>').trigger('click');
              }
            });
        <?php } ?>
      });
    })(jQuery);
  </script>
  <?php

  $mainOptinCloseScript = ob_get_contents();
  ob_end_clean();

  $mainOptinCloseScript = str_replace('<script>', ' ',$mainOptinCloseScript);
  $mainOptinCloseScript = str_replace('</script>', ' ',$mainOptinCloseScript);
  array_push($POPBallWidgetsScriptsArray, $mainOptinCloseScript);

}

?>


<?php 
$containerWidthStyles = '';
if ($selectedOptinType == "Inline") {

  $inline_pageMaxWidth = '';
  $inline_pageMaxWidthU = '';
  if ( isset( $data['pageOptions']['pageMaxWidth'] )) {
    if ($data['pageOptions']['pageMaxWidth'] != '' && $data['pageOptions']['pageMaxWidth'] != '0') {
      $inline_pageMaxWidth = $data['pageOptions']['pageMaxWidth'];
      $inline_pageMaxWidthU = $data['pageOptions']['pageMaxWidthU'];
    }
  }
  $inline_pageMaxWidthT = '';
  $inline_pageMaxWidthUT = '';
  if ( isset( $data['pageOptions']['pageMaxWidthT'] )) {
    if ($data['pageOptions']['pageMaxWidthT'] != '' && $data['pageOptions']['pageMaxWidthT'] != '0') {
      $inline_pageMaxWidthT = $data['pageOptions']['pageMaxWidthT'];
      $inline_pageMaxWidthUT = $data['pageOptions']['pageMaxWidthUT'];
    }
    
  }
  $inline_pageMaxWidthM = '';
  $inline_pageMaxWidthUM = '';
  if ( isset( $data['pageOptions']['pageMaxWidthM'] )) {
    if ($data['pageOptions']['pageMaxWidthM'] != '' && $data['pageOptions']['pageMaxWidthM'] != '0') {
      $inline_pageMaxWidthM = $data['pageOptions']['pageMaxWidthM'];
      $inline_pageMaxWidthUM = $data['pageOptions']['pageMaxWidthUM'];
    }
      
  }

  $containerWidthStyles = "
  <style>
    @media screen and (max-width: 2920px) and (min-width: 1280px) {
        .ulpb_PageBody$current_pageID {
          max-width: ".$inline_pageMaxWidth.$inline_pageMaxWidthU."  !important;
        }
      }
      @media screen and (max-width: 1275px) and (min-width: 668px)  {
        .ulpb_PageBody$current_pageID {
          max-width: ".$inline_pageMaxWidthT.$inline_pageMaxWidthUT."  !important;
        }
      }
      @media screen and (max-width: 667px) and (min-width: 280px)  {
        .ulpb_PageBody$current_pageID {
          max-width: ".$inline_pageMaxWidthM.$inline_pageMaxWidthUM."  !important;
        }
      }
  </style>
  ";
}

echo $containerWidthStyles;
if ($current_postType == 'post' || $current_postType == 'pluginops_forms' || $current_postType == 'page' || $isShortCodeTemplate == true ){ echo "<div class='ulpb_PageBody ulpb_PageBody$current_pageID'>";} else{ echo "<body class='ulpb_PageBody ulpb_PageBody$current_pageID''>"; }
if ($selectedOptinType != 'Full Page') {
  echo "<div id='fullPageBgOverlay_$current_pageID' style='height: 100%; top: 0; left: 0; width: 100%; position: absolute;'></div>";
}

?>

  <?php
  $rows = $data['Rows'];

  $rowCount = 0;

  

  foreach ($rows as $row) {

    if (isset($row['globalRow'])) {

      if (isset($row['globalRow']['globalRowPid'])) {
        $isGlobalRow = $row['globalRow']['isGlobalRow'];
        if ($isGlobalRow == true) {
          $globalRowPostData = get_post_meta( $row['globalRow']['globalRowPid'], 'ULPB_DATA', true );
          $row = $globalRowPostData['Rows'][0]; 
        }
      }
    }
    $randomRowId = rand(10,999)*200+100;
    $row["rowID"] = "ulpb_Row_".$randomRowId;
    $rowID = $row["rowID"];
    $columns = $row['columns'];
    $rowHeight = $row['rowHeight'];
    $rowData = $row['rowData'];
    $rowMargins = $rowData['margin'];
    $rowPadding = $rowData['padding'];
    $rowBgColor = $rowData['bg_color'];
    $rowBgImg = $rowData['bg_img'];
    $currentRowcustomCss = $rowData['customStyling'];
    $currentRowcustomJS = $rowData['customJS'];

    $rowMarginTop = $rowMargins['rowMarginTop'];
    $rowMarginBottom = $rowMargins['rowMarginBottom'];
    $rowMarginLeft = $rowMargins['rowMarginLeft'];
    $rowMarginRight = $rowMargins['rowMarginRight'];

    $rowPaddingTop = $rowPadding['rowPaddingTop'];
    $rowPaddingBottom = $rowPadding['rowPaddingBottom'];
    $rowPaddingLeft = $rowPadding['rowPaddingLeft'];
    $rowPaddingRight = $rowPadding['rowPaddingRight'];

    if (!isset($row['rowHeightUnit']) ) {
      $rowHeightUnit = 'px';
    }else{  
      if ($row['rowHeightUnit'] == '') {
        $rowHeightUnit = 'px';
      } else{
        $rowHeightUnit = $row['rowHeightUnit'];
      }
    }

    if (isset($row['rowHeightTablet']) ) {
      $rowHeightTablet = $row['rowHeightTablet'];
      $rowHeightUnitTablet = $row['rowHeightUnitTablet'];
      $rowHeightMobile = $row['rowHeightMobile'];
      $rowHeightUnitMobile = $row['rowHeightUnitMobile'];
    }else{
      $rowHeightTablet = '';
      $rowHeightUnitTablet = '';
      $rowHeightMobile = '';
      $rowHeightUnitMobile = '';
    }

    $rowBackgroundParallax = '';
    if (isset($rowData['rowBackgroundParallax'])) {
      if ($rowData['rowBackgroundParallax'] == 'true') {
        $rowBackgroundParallax = 'background-attachment:fixed !important;';
      }
    }else{
      $rowData['rowBackgroundParallax'] = '';
    }

    if ($rowBgImg != '' && $rowBgColor == '' ) {
      $rowBgColor = 'transparent';
    }


    $currRowDefaultBackgroundOps = ''; 
    if ( isset($rowData['bg_imgT']) ) {

      $drbgImgOps = $rowData['bgImgOps'];

      $defaultRowBgImg = $rowData['bg_img'];
      $tabletRowBgImg = $rowData['bg_imgT'];
      $mobileRowBgImg = $rowData['bg_imgM'];
      if ($tabletRowBgImg == '') { $tabletRowBgImg = $defaultRowBgImg; }
      if ($mobileRowBgImg == '') { $mobileRowBgImg = $tabletRowBgImg; }


      $defaultRowBgFixed = 'scroll';
      if ($rowData['rowBackgroundParallax'] == 'true') { $defaultRowBgFixed = 'fixed'; }
      $tabletRowBgFixed = $defaultRowBgFixed; $mobileRowBgFixed = $defaultRowBgFixed;
      if ($drbgImgOps['parlxT'] == 'true') { $tabletRowBgFixed = 'fixed'; }
      if ($drbgImgOps['parlxT'] == 'false') { $tabletRowBgFixed = 'scroll'; }
      if ($drbgImgOps['parlxM'] == 'true') { $mobileRowBgFixed = 'fixed'; }
      if ($drbgImgOps['parlxM'] == 'false') { $mobileRowBgFixed = 'scroll'; }

      $drbgImgOpsRep = $drbgImgOps['rep'];
      $drbgImgOpsRepT = $drbgImgOps['repT'];
      $drbgImgOpsRepM = $drbgImgOps['repM'];

      // desktop
      if ($drbgImgOps['pos'] == 'custom') {
        $defaultBgImgPos = 
        "background-position-x: ".$drbgImgOps['xPos'].$drbgImgOps['xPosU']. "; " . 
        "background-position-y: ".$drbgImgOps['yPos'].$drbgImgOps['yPosU']. "; ";
      }else{
        $defaultBgImgPos = "background-position: ".$drbgImgOps['pos']."; ";
      }

      if ( $drbgImgOpsRep == '' || $drbgImgOpsRep == 'default') { $drbgImgOpsRep = 'no-repeat'; }

      if ($drbgImgOps['size'] == 'custom') {
        $defaultBgImgSize = "background-size: ".$drbgImgOps['cWid'].$drbgImgOps['widU']."; ";
      }else{
        $defaultBgImgSize = "background-size: ".$drbgImgOps['size']."; ";
      }
        
      $currRowDefaultBackgroundOps = "
          background-color:$rowBgColor ;
          background-image: url($defaultRowBgImg);
          background-repeat: $drbgImgOpsRep;
          background-attachment: $defaultRowBgFixed;
          $defaultBgImgPos
          $defaultBgImgSize
        
      ";

         



      // Tablet
      if ($drbgImgOps['posT'] == 'custom') {
          $tabletBgImgPos = "background-position-x: ".$drbgImgOps['xPosT'].$drbgImgOps['xPosUT']. "; " .
           "background-position-y: ".$drbgImgOps['yPosT'].$drbgImgOps['yPosUT']. "; ";
      } else if($drbgImgOps['posT'] == ''){
        $tabletBgImgPos = $defaultBgImgPos;
      }else{
        $tabletBgImgPos = "background-position: ".$drbgImgOps['posT']."; ";
      }

      if ($drbgImgOpsRepT == '' || $drbgImgOpsRepT == 'default') { $drbgImgOpsRepT = $drbgImgOpsRep; }


      if ($drbgImgOps['sizeT'] == 'custom') {
        $tabletBgImgSize = "background-size: ".$drbgImgOps['cWidT'].$drbgImgOps['widUT']."; ";
      }else if($drbgImgOps['sizeM'] == ''){
        $tabletBgImgSize = $defaultBgImgSize;
      }else{
        $tabletBgImgSize = "background-size: ".$drbgImgOps['sizeT']."; ";
      }
      
      if($tabletRowBgImg !== ''){
        $currRowtabletBackgroundOps = "
          #".$row["rowID"]." {
            background-image: url($tabletRowBgImg) !important;
            background-repeat: $drbgImgOpsRepT !important;
            background-attachment: $tabletRowBgFixed !important;
            $tabletBgImgPos
            $tabletBgImgSize
          }
        ";
      }
      




      // mobile
      if ($drbgImgOps['posM'] == 'custom') {
        $mobileBgImgPos = 
        "background-position-x: ".$drbgImgOps['xPosM'].$drbgImgOps['xPosUM']. "; " . 
        "background-position-y: ".$drbgImgOps['yPosM'].$drbgImgOps['yPosUM']. "; ";
      }else if($drbgImgOps['posT'] == ''){
        $mobileBgImgPos = $tabletBgImgPos;
      }else{
        $mobileBgImgPos = "background-position: ".$drbgImgOps['posM']."; ";
      }

      if ($drbgImgOpsRepM == '' || $drbgImgOpsRepM == 'default') { $drbgImgOpsRepM = $drbgImgOpsRepT; }

      if ($drbgImgOps['sizeM'] == 'custom') {
        $mobileBgImgSize = "background-size: ".$drbgImgOps['cWidM'].$drbgImgOps['widM']."; ";
      }else if($drbgImgOps['sizeM'] == ''){
        $mobileBgImgSize = $tabletBgImgSize;
      }else{
        $mobileBgImgSize = "background-size: ".$drbgImgOps['sizeM']."; ";
      }

      if($mobileRowBgImg !== ''){
        $currRowmobileBackgroundOps = "
          #".$row["rowID"]." {
            background-image: url($mobileRowBgImg) !important;
            background-repeat: $drbgImgOpsRepM !important;
            background-attachment: $mobileRowBgFixed !important;
            $mobileBgImgPos
            $mobileBgImgSize
          }
        ";
      }

      



      array_push($POPBNallRowStylesResponsiveTablet, $currRowtabletBackgroundOps);
      array_push($POPBNallRowStylesResponsiveMobile, $currRowmobileBackgroundOps);
        
    } // latest row bg options ends 


    $rowBackgroundOptions  = "background-image:url($rowBgImg); background-repeat:no-repeat; background-position:center center; background-size:cover; background-color:$rowBgColor ; "; // old row bg ops

    if ($currRowDefaultBackgroundOps != '') {  $rowBackgroundOptions = $currRowDefaultBackgroundOps;  } // set latest row bg options if available

    if (isset($rowData['rowBackgroundType'])) {
      if ($rowData['rowBackgroundType'] == 'gradient') {
        $rowGradient = $rowData['rowGradient'];
        if ($rowGradient['rowGradientType'] == 'linear') {
          $rowBackgroundOptions = 'background: linear-gradient('.$rowGradient['rowGradientAngle'].'deg, '.$rowGradient['rowGradientColorFirst'].' '.$rowGradient['rowGradientLocationFirst'].'%,'.$rowGradient['rowGradientColorSecond'].' '.$rowGradient['rowGradientLocationSecond'].'%) ;';
        }
        if ($rowGradient['rowGradientType'] == 'radial') {
          $rowBackgroundOptions = 'background: radial-gradient(at '.$rowGradient['rowGradientPosition'].', '.$rowGradient['rowGradientColorFirst'].' '.$rowGradient['rowGradientLocationFirst'].'%,'.$rowGradient['rowGradientColorSecond'].' '.$rowGradient['rowGradientLocationSecond'].'%) ;';
        }
      }
    }

    $rowOverlayBackgroundOptions = '';
    if (isset($rowData['rowBgOverlayColor'])) {
      $rowOverlayBackgroundOptions  = " background:".$rowData['rowBgOverlayColor']." ; background-color:".$rowData['rowBgOverlayColor']." ;";
    }
    if (isset($rowData['rowOverlayBackgroundType'])) {
      if ($rowData['rowOverlayBackgroundType'] == 'gradient') {
        $rowOverlayGradient = $rowData['rowOverlayGradient'];
        if ($rowOverlayGradient['rowOverlayGradientType'] == 'linear') {
          $rowOverlayBackgroundOptions = 'background: linear-gradient('.$rowOverlayGradient['rowOverlayGradientAngle'].'deg, '.$rowOverlayGradient['rowOverlayGradientColorFirst'].' '.$rowOverlayGradient['rowOverlayGradientLocationFirst'].'%,'.$rowOverlayGradient['rowOverlayGradientColorSecond'].' '.$rowOverlayGradient['rowOverlayGradientLocationSecond'].'%) ;';
        }
        if ($rowOverlayGradient['rowOverlayGradientType'] == 'radial') {
          $rowOverlayBackgroundOptions = 'background: radial-gradient(at '.$rowOverlayGradient['rowOverlayGradientPosition'].', '.$rowOverlayGradient['rowOverlayGradientColorFirst'].' '.$rowOverlayGradient['rowOverlayGradientLocationFirst'].'%,'.$rowOverlayGradient['rowOverlayGradientColorSecond'].' '.$rowOverlayGradient['rowOverlayGradientLocationSecond'].'%) ;';
        }
      }
    }


    $thisRowHoverOption = '';
    if (isset($rowData['rowHoverOptions'])) {
        $rowHoverOptions = $rowData['rowHoverOptions'];
        if (isset($rowHoverOptions['rowBackgroundTypeHover'])) {
          if ($rowHoverOptions['rowBackgroundTypeHover'] == 'solid') {
            $thisRowHoverOption = ' #'.$row['rowID'].':hover { background:'.$rowHoverOptions['rowBgColorHover'].' !important; transition: all '.$rowHoverOptions['rowHoverTransitionDuration'].'s; }';
          }
          if ($rowHoverOptions['rowBackgroundTypeHover'] == 'gradient') {
            $rowGradientHover = $rowHoverOptions['rowGradientHover'];

            if ($rowGradientHover['rowGradientTypeHover'] == 'linear') {
              $thisRowHoverOption = ' #'.$row['rowID'].':hover { background: linear-gradient('.$rowGradientHover['rowGradientAngleHover'].'deg, '.$rowGradientHover['rowGradientColorFirstHover'].' '.$rowGradientHover['rowGradientLocationFirstHover'].'%,'.$rowGradientHover['rowGradientColorSecondHover'].' '.$rowGradientHover['rowGradientLocationSecondHover'].'%) !important; transition: all '.$rowHoverOptions['rowHoverTransitionDuration'].'s; }';
            }

            if ($rowGradientHover['rowGradientTypeHover'] == 'radial') {

              $thisRowHoverOption = ' #'.$row['rowID'].':hover { background: radial-gradient(at '.$rowGradientHover['rowGradientPositionHover'].', '.$rowGradientHover['rowGradientColorFirstHover'].' '.$rowGradientHover['rowGradientLocationFirstHover'].'%,'.$rowGradientHover['rowGradientColorSecondHover'].' '.$rowGradientHover['rowGradientLocationSecondHover'].'%) !important; transition: all '.$rowHoverOptions['rowHoverTransitionDuration'].'s; }';
            }
          }
        }

      }


    $rowCustomClass ='';
    if (isset($rowData['rowCustomClass'])) {
      $rowCustomClass = $rowData['rowCustomClass'];
    }

    $rowHideOnDesktop = "display:block"; $rowHideOnTablet = "display:block"; $rowHideOnMobile = "display:block";
    if (isset($rowData['rowHideOnDesktop']) ) {
      if ($rowData['rowHideOnDesktop'] == 'hide') {
        $rowHideOnDesktop ="display:none";
      }
      if ($rowData['rowHideOnTablet'] == 'hide') {
        $rowHideOnTablet ="display:none !important;";
      }
      if ($rowData['rowHideOnMobile'] == 'hide') {
        $rowHideOnMobile ="display:none !important;";
      }
    }
    
    if (isset($rowData['marginTablet'])) {

      $rowMarginTablet = $rowData['marginTablet'];
      $rowMarginMobile = $rowData['marginMobile'];
      $rowPaddingTablet = $rowData['paddingTablet'];
      $rowPaddingMobile = $rowData['paddingMobile'];
      
      $thisRowResponsiveRowStylesTablet = "
        #".$row["rowID"]." {
         margin-top: ".$rowMarginTablet['rMTT']."% !important;
         margin-bottom: ".$rowMarginTablet['rMBT']."% !important;
         margin-left: ".$rowMarginTablet['rMLT']."% !important;
         margin-right: ".$rowMarginTablet['rMRT']."% !important;

         padding-top: ".$rowPaddingTablet['rPTT']."% !important;
         padding-bottom: ".$rowPaddingTablet['rPBT']."% !important;
         padding-left: ".$rowPaddingTablet['rPLT']."% !important;
         padding-right: ".$rowPaddingTablet['rPRT']."% !important;

         min-height:".$rowHeightTablet."$rowHeightUnitTablet !important;
         $rowHideOnTablet
        }
      
      ";
      $thisRowResponsiveRowStylesMobile = "
      
        #".$row["rowID"]." {
         margin-top: ".$rowMarginMobile['rMTM']."% !important;
         margin-bottom: ".$rowMarginMobile['rMBM']."% !important;
         margin-left: ".$rowMarginMobile['rMLM']."% !important;
         margin-right: ".$rowMarginMobile['rMRM']."% !important;

         padding-top: ".$rowPaddingMobile['rPTM']."% !important;
         padding-bottom: ".$rowPaddingMobile['rPBM']."% !important;
         padding-left: ".$rowPaddingMobile['rPLM']."% !important;
         padding-right: ".$rowPaddingMobile['rPRM']."% !important;

         min-height:".$rowHeightMobile."$rowHeightUnitMobile !important;
         $rowHideOnMobile
        }
      ";

      array_push($POPBNallRowStylesResponsiveTablet, $thisRowResponsiveRowStylesTablet);
      array_push($POPBNallRowStylesResponsiveMobile, $thisRowResponsiveRowStylesMobile);
    }

    $rowMarginStyle = "margin:$rowMarginTop"."% $rowMarginRight"."% $rowMarginBottom"."% $rowMarginLeft"."%;";

    $rowPaddingStyle = "padding:$rowPaddingTop"."% $rowPaddingRight"."% $rowPaddingBottom"."% $rowPaddingLeft"."%;";

    $currentRowStyles = "#".$row["rowID"]."{   min-height:$rowHeight"."$rowHeightUnit; $rowPaddingStyle  $rowMarginStyle  $rowBackgroundOptions  $rowBackgroundParallax  $currentRowcustomCss  $rowHideOnDesktop }     $thisRowHoverOption ";

    array_push($POPBNallRowStyles, $currentRowStyles);

    //echo($row['rowID']."<br>");
    

    ?>

    <script type="text/javascript">
      <?php echo $currentRowcustomJS; ?>
    </script>
    <div class='pluginops-optinRow w3-row  <?php echo $rowCustomClass ?>' data-row_id='<?php echo $row["rowID"]; ?>' id='<?php echo $row["rowID"]; ?>'>
      <div class="overlay-row" style="<?php echo "$rowOverlayBackgroundOptions"; ?>"></div>

      <?php

        if (isset($rowData['bgSTop']) ) {
          $bgSTop = $rowData['bgSTop'];
          $bgShapeTop = '';
          $rowID = $row["rowID"];
          $positionID  = 'top';
          $shapeType = $bgSTop['rbgstType'];
          if ($shapesinluded == false) {
            include_once 'svgShapes.php';
            $shapesinluded = true;
          }

          $invertTransform = '';
          if ($shapeType == 'random' ) {
            $invertTransform = 'transform:rotate(180deg);';
          }

          if (function_exists('bgSvgShapesRenderCode') ) {
            $bgShapesArray = bgSvgShapesRenderCode($rowID, $positionID, $shapeType);
            $bgShapeTop = $bgShapesArray['shape'];
            $vieBoxAttr = $bgShapesArray['shapeAttr'];
          }

          $renderredHTML = '';
          $returnScripts = '';

          
          if ($bgSTop != 'false') {
            $isFlipped = '';
            if ($bgSTop['rbgstFlipped'] == 'true') {
              $isFlipped = 'transform:rotateY(180deg);';
            }

            if ($bgSTop['rbgstType'] == 'none') {
              $bgShapeTop = '';
            }
            $onFront = '';
            if ($bgSTop['rbgstFront'] == 'true') {
              $onFront = 'z-index:2;'; 
            }

            if ($bgShapeTop != '') {

              $renderredShapeHTML = 
              '<div class="bgShapes bgShapeTop-'.$row["rowID"].'"  style="overflow: hidden; position: absolute; left: 0; width: 100%; direction: ltr; top: -2px; text-align:center; '.$onFront.' '.$invertTransform.' ">'.
                  '<svg xmlns="http://www.w3.org/2000/svg" viewBox="'.$vieBoxAttr.'" preserveAspectRatio="none" style="width: calc('.$bgSTop['rbgstWidth'].'% + 1.5px); height: '.$bgSTop['rbgstHeight'].'px;  position: relative; '.$isFlipped.'" >'.
                  $bgShapeTop.
                '</svg>'.
              ' <style>  .po-top-path-'.$row["rowID"].' { fill:'.$bgSTop['rbgstColor'].'; } </style> </div>  ';

              echo "$renderredShapeHTML";

              $thisShapeResponsiveTablet = "
                .bgShapeTop-".$row["rowID"]." svg {
                  width: calc(".$bgSTop['rbgstWidtht']."% + 1.5px) !important;
                  height:".$bgSTop['rbgstHeightt']."px !important;
                }
              ";

              $thisShapeResponsiveMobile = "
                .bgShapeTop-".$row["rowID"]." svg {
                  width: calc(".$bgSTop['rbgstWidthm']."% + 1.5px) !important;
                  height:".$bgSTop['rbgstHeightm']."px !important;
                }
              ";
              array_push($POPBNallRowStylesResponsiveTablet, $thisShapeResponsiveTablet);
              array_push($POPBNallRowStylesResponsiveMobile, $thisShapeResponsiveMobile);


            }
          }

        }

        if (isset($rowData['bgSBottom']) ) {
          $bgSBottom = $rowData['bgSBottom'];
          $bgShapeBottom = '';
          $rowID = $row["rowID"];
          $positionID  = 'bottom';
          $shapeType = $bgSBottom['rbgsbType'];
          if ($shapesinluded == false) {
            include_once 'svgShapes.php';
            $shapesinluded = true;
          }

          $invertTransform = '';
          if ($shapeType == 'random' ) {
            $invertTransform = 'transform:rotate(0deg);';
          }

          if (function_exists('bgSvgShapesRenderCode') ) {
            $bgShapesArray = bgSvgShapesRenderCode($rowID, $positionID, $shapeType);
            $bgShapeBottom = $bgShapesArray['shape'];
            $vieBoxAttr = $bgShapesArray['shapeAttr'];
          }

          $renderredHTML = '';
          $returnScripts = '';

          
          if ($bgSBottom != 'false') {
            $isFlipped = '';
            if ($bgSBottom['rbgsbFlipped'] == 'true') {
              $isFlipped = 'transform:rotateY(180deg);';
            }

            if ($bgSBottom['rbgsbType'] == 'none') {
              $bgShapeBottom = '';
            }
            $onFront = '';
            if ($bgSBottom['rbgsbFront'] == 'true') {
              $onFront = 'z-index:2;'; 
            }

            if ($bgShapeBottom != '') {

              $renderredShapeHTML = 
              '<div class="bgShapes bgShapeBottom-'.$row["rowID"].'"  style="overflow: hidden; position: absolute; left: 0; width: 100%; direction: ltr;  bottom: -1px; transform: rotate(180deg); text-align:center; '.$onFront.' '.$invertTransform.' ">'.
                  '<svg xmlns="http://www.w3.org/2000/svg" viewBox="'.$vieBoxAttr.'" preserveAspectRatio="none" style="width: calc('.$bgSBottom['rbgsbWidth'].'% + 1.5px); height: '.$bgSBottom['rbgsbHeight'].'px;  position: relative; '.$isFlipped.'" >'.
                  $bgShapeBottom.
                '</svg>'.
              ' <style>  .po-bottom-path-'.$row["rowID"].' { fill:'.$bgSBottom['rbgsbColor'].'; } </style> </div>  ';

              echo "$renderredShapeHTML";

              $thisShapeResponsiveTablet = "
                .bgShapeBottom-".$row["rowID"]." svg {
                  width: calc(".$bgSBottom['rbgsbWidtht']."% + 1.5px) !important;
                  height:".$bgSBottom['rbgsbHeightt']."px !important;
                }
              ";

              $thisShapeResponsiveMobile = "
                .bgShapeBottom-".$row["rowID"]." svg {
                  width: calc(".$bgSBottom['rbgsbWidthm']."% + 1.5px) !important;
                  height:".$bgSBottom['rbgsbHeightm']."px !important;
                }
              ";
              array_push($POPBNallRowStylesResponsiveTablet, $thisShapeResponsiveTablet);
              array_push($POPBNallRowStylesResponsiveMobile, $thisShapeResponsiveMobile);


            }
          }

        }

      ?>

      

        <?php
          if (isset($rowData['video'])) {
            $rowVideo = $rowData['video'];
            $rowBgVideoEnable = $rowVideo['rowBgVideoEnable'];
            if ($rowBgVideoEnable == 'true') {
              $rowBgVideoLoop = $rowVideo['rowBgVideoLoop'];
              $rowVideoMpfour = $rowVideo['rowVideoMpfour'];
              $rowVideoWebM = $rowVideo['rowVideoWebM'];
              $rowVideoThumb = $rowVideo['rowVideoThumb'];

              if ( !isset($rowVideo['rowVideoType']) ) { $rowVideo['rowVideoType'] = ''; }

              if ($rowVideo['rowVideoType'] == 'yt') {
                 $YtregExp = "/^.*((youtu.be\/)|(v\/)|(\/u\/\w\/)|(embed\/)|(watch\?))\??v?=?([^#\&\?]*).*/";
                 $YTurlMatch = preg_match($YtregExp, $rowVideo['rowVideoYtUrl'],$YTurlMatches);
                 if($YTurlMatch == 1){
                  $ytvidId =  $YTurlMatches[7];
                 }else{
                  $ytvidId = 'false';
                 }
                $VideoBgHtml = '<iframe id="bgVid-'.$row["rowID"].'" width="100%" height="100%" src="https://www.youtube.com/embed/'.$ytvidId.'?rel=0&amp;controls=0&amp;showinfo=0;mute=1;autoplay=1&loop=1&playlist='.$ytvidId.'" frameborder="0" allow="autoplay; encrypted-media" allowfullscreen ></iframe>';
                echo "$VideoBgHtml";
                ?>
                  <style type="text/css">
                    #bgVid-<?php echo $row["rowID"]; ?> { 
                      position: absolute;
                      min-width: 100%;
                      min-height: 100%;
                      width: auto;
                      height: auto;
                      z-index: -100;
                      background: url('<?php echo $rowVideoThumb; ?>') no-repeat;
                      background-size: cover;
                      transition: 1s opacity;
                      left: 0;
                      right: 0;
                      top: 0;
                    }
                    <?php echo '#'.$row["rowID"]; ?> {
                      background: transparent !important;
                      background-color: transparent !important;
                    }
                  </style>
                <?php
              }else{

                ?>
                  <video poster="<?php echo $rowVideoThumb; ?>" id="bgVid-<?php echo $row["rowID"]; ?>" playsinline autoplay muted <?php echo $rowBgVideoLoop; ?> >
                    <source src="<?php echo $rowVideoWebM; ?>" type="video/webm">
                    <source src="<?php echo $rowVideoMpfour; ?>" type="video/mp4">
                  </video>
                  <style type="text/css">
                    #bgVid-<?php echo $row["rowID"]; ?> { 
                      position: absolute;
                      min-width: 100%;
                      min-height: 100%;
                      width: auto;
                      height: auto;
                      z-index: -100;
                      background: url('<?php echo $rowVideoThumb; ?>') no-repeat;
                      background-size: cover;
                      transition: 1s opacity;
                      left: 0; 
                      right: 0;
                      top: 0;
                    }
                    <?php echo '#'.$row["rowID"]; ?> {
                      background: transparent !important;
                      background-color: transparent !important;
                      overflow: hidden;
                      position: relative;
                    }
                  </style>

                <?php
              }

            }
            
          }
        ?>

        <?php
          $columnContainerSetWidth = 'max-width:100% !important;';
          if (isset($rowData['conType'])) {
            if ($rowData['conType'] == 'boxed') {
              if ($rowData['conWidth'] != '') {
                $columnContainerSetWidth = 'max-width:'.$rowData['conWidth'].'px !important;';
              }
            }
          }
        ?>
      
      <div class="rowColumnsContainer" id="rowColCont-<?php echo $rowID; ?>" style="margin:0 auto !important; <?php echo "$columnContainerSetWidth"; ?>">
       <?php include('columns.php'); ?>
      </div>
      
    </div>
    <?php 
    $rowCount++;
  } // ForEach loop for rows ends here


  ob_start();

  foreach ($POPBNallRowStyles as $value) {
    echo $value . "  ";
  }

  foreach ($POPBallColumnStylesArray as $value) {
    echo $value . "  ";
  }

  foreach ($POPBallWidgetsStylesArray as $value) {
    echo $value . "  ";
  }


  echo " \n @media only screen and (min-width : 768px) and (max-width : 1024px) { ";
  foreach ($POPBNallRowStylesResponsiveTablet as $value) {
    echo $value . "  ";
  }
  echo " } ";

  echo " \n @media only screen and (min-width : 320px) and (max-width : 480px) { ";
  foreach ($POPBNallRowStylesResponsiveMobile as $value) {
    echo $value . "  ";
  }
  echo " } ";

  $these_row_styles_inline = ob_get_contents();
  ob_end_clean();


  wp_add_inline_style( 'pluginops-landingpage-style-css', $these_row_styles_inline );



  if ($widgetPostsSliderExternalScripts == true) {
    array_push($POPBallWidgetsScriptsFilesArray, "/public/scripts/owl-carousel/owl.carousel.js" );
  }


  array_push($POPBallWidgetsScriptsFilesArray, "/js/cookie.js" );


  if ($widgetMasonryLoadScripts == true) {
    array_push($POPBallWidgetsScriptsFilesArray, "/js/masonry.pkgd.min.js" );
  }


  if ($widgetCountDownLoadScripts == true) {
    array_push($POPBallWidgetsScriptsFilesArray, "/js/countdown.js" );
    array_push($POPBallWidgetsScriptsFilesArray, "/js/moment.min.js" );
    array_push($POPBallWidgetsScriptsFilesArray, "/js/moment-timezone-with-data-2010-2020.min.js" );
  }


  if ($widgetSliderLoadScripts == true) {
    array_push($POPBallWidgetsScriptsFilesArray, "/js/slider.min.js" );
  }



  if ($widgetFALoadScripts == true) {
    array_push($POPBallWidgetsScriptsFilesArray, "/js/fa.js" );
  } 

  if ($widgetVideoLoadScripts == true) {

    array_push($POPBallWidgetsStylesFilesArray, "/js/videoJS/video-js.css");

    array_push($POPBallWidgetsScriptsFilesArray, "/js/videoJS/video.js" );

  }


  if ($widgetOwlLoadScripts == true) {

    array_push($POPBallWidgetsStylesFilesArray, "/public/scripts/owl-carousel/owl.carousel.css");
    array_push($POPBallWidgetsStylesFilesArray, "/public/scripts/owl-carousel/owl.theme.css");
    array_push($POPBallWidgetsStylesFilesArray, "/public/scripts/owl-carousel/owl.transitions.css");


  } 

  if ($widgetWooCommLoadScripts == true) {
    array_push($POPBallWidgetsStylesFilesArray, "/styles/wooStyles.css");
  } 

  array_push($POPBallWidgetsStylesFilesArray, "/public/templates/animate.css");


  if ($widgetJQueryLoadScripts == true) {

    wp_enqueue_script('jquery');

    wp_enqueue_script( 'jquery-ui-core' );

    wp_enqueue_script( 'jquery-ui-tooltip' );

    wp_enqueue_script( 'jquery-ui-slider' );

    wp_enqueue_script( 'jquery-ui-accordion' );

    wp_enqueue_script( 'jquery-ui-datepicker' );

    wp_enqueue_script( 'jquery-ui-button' );

    wp_enqueue_script( 'jquery-ui-tabs' );

    wp_enqueue_script( 'jquery-ui-draggable' );

    wp_enqueue_script( 'jquery-ui-resizable' );

    wp_enqueue_script( 'jquery-ui-droppable' );

    wp_enqueue_script( 'jquery-ui-sortable' );

    wp_enqueue_script( 'jquery-ui-progressbar' );

    wp_enqueue_script( 'jquery-ui-effects' );

    wp_enqueue_style( 'landing-page-public-jqueryui-styles', SMFB_PLUGIN_URL.'/js/Backbone-resources/jquery-ui.css' , 1.0, $media = 'all' );


    $widgetJQueryLoadScripts = true;

  }

  
  wp_enqueue_script('pluginops-optin-scripts-libs'.$current_pageID,  SMFB_PLUGIN_URL.'/public/scripts/scripts.js', array('jquery'), '1.0', true);

  $landingpageScriptsCounter = 0;
  foreach ($POPBallWidgetsScriptsFilesArray as $value) {

    wp_enqueue_script("pluginops-optin-script-files_$landingpageScriptsCounter", SMFB_PLUGIN_URL.$value , array('pluginops-optin-scripts-libs'.$current_pageID), '1.0', true);

    $landingpageScriptsCounter++;

  }


  $landingpageScriptsCounter = 0;
  foreach ($POPBallWidgetsStylesFilesArray as $value) {

    wp_enqueue_style( 'pluginops-optin-style-css-'.$current_pageID.'-files_'.$landingpageScriptsCounter, SMFB_PLUGIN_URL.$value, array(), '1.0', $media = 'all' );

    $landingpageScriptsCounter++;

  }

  $pluginOpsOptinFooterScriptId = 'pluginops-optin-scripts-inline-js-footer'.$current_pageID;


  wp_enqueue_script($pluginOpsOptinFooterScriptId,  SMFB_PLUGIN_URL.'/public/scripts/scripts.js', array('jquery'), '1.0', true);


  $landingpageScriptsCounter = 0;
  foreach ($POPBallWidgetsScriptsArray as $value) {
    
    wp_add_inline_script($pluginOpsOptinFooterScriptId, $value, 'after');

    $landingpageScriptsCounter++;

  }

  wp_add_inline_script($pluginOpsOptinFooterScriptId, $pluginOpsCheckElViewFrameScript, 'after');


  wp_add_inline_script($pluginOpsOptinFooterScriptId, $widgetAnimationTriggerScript, 'after');


  $thisColFontsToLoadSeparatedValue = 'Allerta';
      foreach ($thisColFontsToLoad as $value) {

        if ($value !== '') {
          $aller = strpos($thisColFontsToLoadSeparatedValue, $value);
        }
        
        if ($value == 'Select' || $value == 'select' || $value == 'Arial' || $value == 'sans-serif' || $value == 'Arial Black' || $value == 'sans' || $value == 'Helvetica' || $value == 'Serif' || $value == 'Tahoma' || $value == 'Verdana' || $value == 'Monaco' || $aller !== false) {
        }else{
          if ($value != '') {
            $thisColFontsToLoadSeparatedValue = $thisColFontsToLoadSeparatedValue . '|' .$value;
          }
        }
        
      }

      echo '<link rel="stylesheet"href="https://fonts.googleapis.com/css?family='.$thisColFontsToLoadSeparatedValue.'">';






?>


<?php if ($current_postType == 'post' || $current_postType == 'page' || $isShortCodeTemplate == true ){ echo "</div>";} else{ echo "</body>"; }   ?>

<?php
} else{
}

  if (!isset($isPopUpTemplate)) {
    $isPopUpTemplate = false;
  }
  if (!isset($isPopUpFullPageTemplate)) {
    $isPopUpFullPageTemplate = false;
  }
  if (!isset($isPopUpFlyInTemplate)) {
    $isPopUpFlyInTemplate = false;
  }
  if (!isset($isPopUpBarTemplate)) {
    $isPopUpBarTemplate = false;
  }

  if ($isPopUpTemplate == true || $selectedOptinType == 'PopUp') {
    ?>
      </div></div>
    <?php
  }
  if ($isPopUpFullPageTemplate == true || $selectedOptinType == 'Full Page') {
    ?>
      </div></div>
    <?php
  }

  if ( $isPopUpFlyInTemplate == true || $selectedOptinType == 'Fly In') {
    ?>
      </div></div>
    <?php
  }
  if ( $isPopUpBarTemplate == true || $selectedOptinType == 'Bar') {
    ?>
      </div></div>
    <?php
  }

if (isset($hideOnDesktop)) {
  if ( $hideOnDesktop == true || $hideOnTablet == true || $hideOnMobile == true ) {
    echo "</div>";
  }
}


}
?>