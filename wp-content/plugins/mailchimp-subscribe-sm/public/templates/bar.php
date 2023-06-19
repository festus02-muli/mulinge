<?php if ( ! defined( 'ABSPATH' ) ) exit;


$topPostionPx = '0';
if (is_user_logged_in() ) {
  $topPostionPx = '32px';
}

$this_popup_unique_Id = '';
if (isset($isPopUpBarTemplate) || $selectedOptinType == 'Bar') {


  $pageMaxWidth = '100';
  $pageMaxWidthU = 'vw';
  if ( isset( $data['pageOptions']['pageMaxWidth'] )) {
    if ($data['pageOptions']['pageMaxWidth'] != '' && $data['pageOptions']['pageMaxWidth'] != '0') {
      $pageMaxWidth = $data['pageOptions']['pageMaxWidth'];
      $pageMaxWidthU = $data['pageOptions']['pageMaxWidthU'];
    }
  }
  $pageMaxWidthT = '100';
  $pageMaxWidthUT = 'vw';
  if ( isset( $data['pageOptions']['pageMaxWidthT'] )) {
    if ($data['pageOptions']['pageMaxWidthT'] != '' && $data['pageOptions']['pageMaxWidthT'] != '0') {
      $pageMaxWidthT = $data['pageOptions']['pageMaxWidthT'];
      $pageMaxWidthUT = $data['pageOptions']['pageMaxWidthUT'];
    }
    
  }
  $pageMaxWidthM = '100';
  $pageMaxWidthUM = 'vw';
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



  if (!isset($isPopUpBarTemplate)) {
    $isPopUpBarTemplate = '';
  }

  if ($isPopUpBarTemplate == true || $selectedOptinType == 'Bar') {
    
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
        left: 17px;
        height: 18px;
        top: 10px;
        width: 2px;
      }

      #popb_popup_close_<?php echo($this_popup_unique_Id); ?> {
        width: 35px;
        height: 35px;
        background-color: #fff;
        border-radius: 100%;
        box-shadow: 0px 2px 2px 0px rgba(0,0,0,0.2);
        cursor: pointer;
        position: absolute;
        right: 5%;
        z-index: 3;
        position: absolute;
        top: 50%;
        transform: translateY(-100%);
        -ms-transform: translateY(-100%);
        -webkit-transform: translateY(-100%);
        -moz-transform: translateY(-100%);
        -o-transform: translateY(-100%);
      }

      @media screen and (max-width: 2920px) and (min-width: 1280px) {
        #POPB-modal-overlay_<?php echo($this_popup_unique_Id); ?> {
          max-width: <?php echo $pageMaxWidth.$pageMaxWidthU; ?> !important;
        }
      }
      @media screen and (max-width: 1275px) and (min-width: 1024px)  {
        #POPB-modal-overlay_<?php echo($this_popup_unique_Id); ?> {
          width: <?php echo $pageMaxWidthT.$pageMaxWidthUT; ?> !important;
          max-width: <?php echo $pageMaxWidthT.$pageMaxWidthUT; ?> !important;
        }
      }
      @media screen and (max-width: 1023px) and (min-width: 668px)  {
        #POPB-modal-overlay_<?php echo($this_popup_unique_Id); ?> {
          width: <?php echo $pageMaxWidthT.$pageMaxWidthUT; ?> !important;
          max-width: <?php echo $pageMaxWidthT.$pageMaxWidthUT; ?> !important;
        }
      }
      @media screen and (max-width: 667px) and (min-width: 280px)  {
        #POPB-modal-overlay_<?php echo($this_popup_unique_Id); ?> {
          max-width: <?php echo $pageMaxWidthM.$pageMaxWidthUM; ?> !important;
          width: <?php echo $pageMaxWidthM.$pageMaxWidthUM; ?> !important;
        }
      }

      
      <?php
        if (!isset($popupPosition)) {
          $popupPosition = $campaignPlacement['barPositioning'];
        }
        
        if (isset($popupPosition)) {
          if ($popupPosition == 'top') {
            echo "#POPB-modal-overlay_$this_popup_unique_Id {
              top: $topPostionPx !important;
              overflow: visible !important;
            }
            #pluginops-modal-content_$this_popup_unique_Id {
              box-shadow: 0 0px 20px #4a4a4a;
            }
            #popb_popup_close_$this_popup_unique_Id {
              margin-top: -8px;
            }
            @media screen and (max-width: 975px) and (min-width: 280px)  {
              #popb_popup_close_$this_popup_unique_Id {
                    right: 5px !important;
                    top: 50px !important;
              }
            }

            #wpadminbar {z-index: 99999999999 !important;}
            #wpadminbar .ab-sub-wrapper, #wpadminbar ul, #wpadminbar ul li {z-index: 99999999999 !important;}
            
            ";
          } elseif ($popupPosition == 'bottom') {
            echo "#POPB-modal-overlay_$this_popup_unique_Id {
              bottom: 0 !important;
              padding:0 0px 0px 0px;
              overflow: visible !important;
            }
            #pluginops-modal-content_$this_popup_unique_Id {
              box-shadow: 0 8px 31px #929292;
            }
            #popb_popup_close_$this_popup_unique_Id {
              margin-top: 8px;
              transform : translateY(-50%) !important;
              -ms-transform: translateY(-50%) !important;
              -webkit-transform: translateY(-50%) !important;
              -moz-transform: translateY(-50%) !important;
              -o-transform: translateY(-50%) !important;
            }

            @media screen and (max-width: 975px) and (min-width: 280px)  {
              #popb_popup_close_$this_popup_unique_Id {
                    position: relative !important;
                    float: right !important;
                    top: 35px !important;
                    right: 5px !important;
              }
            }
            ";
          }else{
            echo "#POPB-modal-overlay_$this_popup_unique_Id {
                bottom: 0 !important;
              }";
          }

        } else {
          echo "#POPB-modal-overlay_$this_popup_unique_Id {
              bottom: 0 !important;
              padding:0 0px 0px 0px;
              box-shadow: 0 8px 31px #929292;
            }
            #pluginops-modal-content_$this_popup_unique_Id {
            }
            #popb_popup_close_$this_popup_unique_Id {
              margin-top: 8px;
              transform : translateY(-50%) !important;
              -ms-transform: translateY(-50%) !important;
              -webkit-transform: translateY(-50%) !important;
              -moz-transform: translateY(-50%) !important;
              -o-transform: translateY(-50%) !important;
            }
            ";
            $popupPosition = 'bottom';
        }

      ?>
    </style>

      <div class="pluginops-modal" id="POPB-modal-overlay_<?php echo($this_popup_unique_Id); ?>" style=" position: fixed; z-index: 999999999; overflow: hidden;  max-width: 100vw; max-height:50vh !important;  display: none; left: 0; right: 0; margin:0 auto;">
        
        <div class="pluginops-modal-content" id="pluginops-modal-content_<?php echo($this_popup_unique_Id); ?>" style='width:100%;'>
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