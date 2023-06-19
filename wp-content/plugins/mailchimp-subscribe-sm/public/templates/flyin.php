<?php if ( ! defined( 'ABSPATH' ) ) exit;

$this_popup_unique_Id = '';
if (isset($isPopUpFlyInTemplate) || $selectedOptinType == 'Fly In' ) {
  

  $pageMaxWidth = '55';
  $pageMaxWidthU = '%';
  if ( isset( $data['pageOptions']['pageMaxWidth'] )) {
    if ($data['pageOptions']['pageMaxWidth'] != '' && $data['pageOptions']['pageMaxWidth'] != '0') {
      $pageMaxWidth = $data['pageOptions']['pageMaxWidth'];
      $pageMaxWidthU = $data['pageOptions']['pageMaxWidthU'];
    }
  }
  $pageMaxWidthT = '65';
  $pageMaxWidthUT = '%';
  if ( isset( $data['pageOptions']['pageMaxWidthT'] )) {
    if ($data['pageOptions']['pageMaxWidthT'] != '' && $data['pageOptions']['pageMaxWidthT'] != '0') {
      $pageMaxWidthT = $data['pageOptions']['pageMaxWidthT'];
      $pageMaxWidthUT = $data['pageOptions']['pageMaxWidthUT'];
    }
    
  }
  $pageMaxWidthM = '70';
  $pageMaxWidthUM = '%';
  if ( isset( $data['pageOptions']['pageMaxWidthM'] )) {
    if ($data['pageOptions']['pageMaxWidthM'] != '' && $data['pageOptions']['pageMaxWidthM'] != '0') {
      $pageMaxWidthM = $data['pageOptions']['pageMaxWidthM'];
      $pageMaxWidthUM = $data['pageOptions']['pageMaxWidthUM'];
    }
      
  }


  $this_popup_unique_Id = 'popup_'.$current_pageID;

  if(!empty($popupDisplayDelay)){
    echo "<script> var popUpDisplayActionType_$this_popup_unique_Id = 'delay'; </script>";
    $popupDisplayOnScroll = ''; $popupDisplayOnExit = ''; $popupDisplayOnClick = '';
  }else if(!empty($popupDisplayOnScroll)){
    echo "<script> var popUpDisplayActionType_$this_popup_unique_Id = 'onscroll'; </script>";
    $popupDisplayDelay = ''; $popupDisplayOnExit = ''; $popupDisplayOnClick = '';
  }
  else if(!empty($popupDisplayOnExit)){
    echo "<script> var popUpDisplayActionType_$this_popup_unique_Id = 'onexit'; </script>";
    $popupDisplayDelay = ''; $popupDisplayOnScroll = ''; $popupDisplayOnClick = '';
  }
  else if(!empty($popupDisplayOnClick)){
    echo "<script> var popUpDisplayActionType_$this_popup_unique_Id = 'onclick'; </script>";
    $popupDisplayDelay = ''; $popupDisplayOnScroll = ''; $popupDisplayOnExit = '';
  }else{
    echo "<script> var popUpDisplayActionType_$this_popup_unique_Id = 'delay'; </script>";
    $popupDisplayDelay = ''; $popupDisplayOnScroll = ''; $popupDisplayOnExit = ''; $popupDisplayOnClick = '';
  }

  if (!isset($isPopUpFlyInTemplate)) {
    $isPopUpFlyInTemplate = '';
  }

  if ($isPopUpFlyInTemplate == true || $selectedOptinType == 'Fly In') {
    
    if(isset($popupDisplayDelay)){
    }else{
      $popupDisplayDelay = '0';
    }

    ?>
    <style type="text/css">
      #popb_popup_close_<?php echo($this_popup_unique_Id); ?>:before {
        transform: rotate(45deg);
        -ms-transform: rotate(45deg);
        -webkit-transform: rotate(45deg);
        -moz-transform: rotate(45deg);
        -o-transform: rotate(45deg);
      }
      #popb_popup_close_<?php echo($this_popup_unique_Id); ?>:after {
        transform: rotate(-45deg);
        -ms-transform: rotate(-45deg);
        -webkit-transform: rotate(-45deg);
        -moz-transform: rotate(-45deg);
        -o-transform: rotate(-45deg);
      }
      #popb_popup_close_<?php echo($this_popup_unique_Id); ?>:after, #popb_popup_close_<?php echo($this_popup_unique_Id); ?>:before {
        background-color: #414141;
        content: '';
        position: absolute;
        left: 14px;
        height: 14px;
        top: 8px;
        width: 2px;
      }

      #popb_popup_close_<?php echo($this_popup_unique_Id); ?> {
        width: 30px;
        height: 30px;
        background-color: #fff;
        border-radius: 100%;
        box-shadow: 0px 2px 2px 0px rgba(0,0,0,0.2);
        cursor: pointer;
        position: relative;
        right: 15px;
        top: 15px;
        z-index: 2;
        float: left;
      }

      @media screen and (max-width: 1920px) and (min-width: 1280px) {
        #POPB-modal-overlay_<?php echo($this_popup_unique_Id); ?>{
          max-width:<?php echo $pageMaxWidth.$pageMaxWidthU; ?> !important;
        }
        #pluginops-modal-content_<?php echo($this_popup_unique_Id); ?>{
          min-width:90% !important;
        }
      }
      @media screen and (max-width: 1280px) and (min-width: 980px) {
        #POPB-modal-overlay_<?php echo($this_popup_unique_Id); ?>{
          max-width:<?php echo $pageMaxWidthT.$pageMaxWidthUT; ?> !important;
        }
        #pluginops-modal-content_<?php echo($this_popup_unique_Id); ?>{
          min-width:90% !important;
        }
      }
      @media screen and (max-width: 975px) and (min-width: 280px) {
        #POPB-modal-overlay_<?php echo($this_popup_unique_Id); ?>{
          max-width:<?php echo $pageMaxWidthM.$pageMaxWidthUM; ?> !important;
          overflow: visible;
        }
        #pluginops-modal-content_<?php echo($this_popup_unique_Id); ?>{
          min-width:90% !important;
          margin:0 auto;
          padding: 0 !important;
        }
      }

      <?php
        if (isset($popupPosition)) {
          if ($popupPosition == 'bRight') {
            echo "#POPB-modal-overlay_$this_popup_unique_Id {
              right: 0 !important;
              bottom: 0 !important;
            }";
          }
          if ($popupPosition == 'bLeft') {
            echo "#POPB-modal-overlay_$this_popup_unique_Id {
              left: 0 !important;
              bottom: 0 !important;
              padding: 10px 10px 0 0 !important;
            }
            #popb_popup_close_$this_popup_unique_Id {
              float: right !important;
              right: -10px !important;
            }
            ";
          }
          if ($popupPosition == 'bCenter') {
            echo "#POPB-modal-overlay_$this_popup_unique_Id {
              bottom: 0 !important;
            }";
          }
        }else{
          echo "#POPB-modal-overlay_$this_popup_unique_Id {
              right: 0 !important;
              bottom: 0 !important;
            }";
        }
      ?>
    </style>

      <div class="pluginops-modal" id="POPB-modal-overlay_<?php echo($this_popup_unique_Id); ?>" style=" position: fixed; z-index: 999999999999; display: none; padding: 10px 0 0 10px;">
        
        <div class="pluginops-modal-content" id="pluginops-modal-content_<?php echo($this_popup_unique_Id); ?>" style=''>
          <div class="popb_popup_close" id='popb_popup_close_<?php echo($this_popup_unique_Id); ?>' style="display:<?php echo $data['pageOptions']['hideCloseBtn']; ?>;" ></div>


      
      <?php ob_start();
      include 'scripts/optinDisplayScript.php';
      $mainOptinTriggerScript = ob_get_contents();
      ob_end_clean();

      $mainOptinTriggerScript = str_replace('<script>', ' ',$mainOptinTriggerScript);
      $mainOptinTriggerScript = str_replace('</script>', ' ',$mainOptinTriggerScript);
      array_push($POPBallWidgetsScriptsArray, $mainOptinTriggerScript);

  }
}

?>