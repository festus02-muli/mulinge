<?php if ( ! defined( 'ABSPATH' ) ) exit;

$this_popup_unique_Id = '';
if (isset($isPopUpFullPageTemplate) || $selectedOptinType == 'Full Page') {
  

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

  if (!isset($isPopUpFullPageTemplate)) {
    $isPopUpFullPageTemplate = '';
  }

  if ($isPopUpFullPageTemplate == true || $selectedOptinType == 'Full Page') {
    
    if(!$selectedOptinType){
      $selectedOptinType = 'Full Page';
    }

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
        left: 28px;
        height: 45px;
        top: 7px;
        width: 4px;
        border-radius: 10px;
      }

      #popb_popup_close_<?php echo($this_popup_unique_Id); ?> {
        width: 60px;
        height: 60px;
        border-radius: 100%;
        cursor: pointer;
        position: absolute;
        top:5%;
        right:5%;
        z-index: 2;
        float: right;
        background-color: #fff;
        box-shadow: 0px 2px 2px 0px rgba(0,0,0,0.2);
      }

      .popb_popup_close:hover{
        background-color: #7a7a7a !important;
        transition: all .5s;
      }
      .popb_popup_close:hover::after, .popb_popup_close:hover::before {
        background-color: #fff !important;
        transition: all .5s;
      }

      #pluginops-modal-content_<?php echo($this_popup_unique_Id); ?>{
        width: 100%;  
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

      @media screen and (max-width: 975px) and (min-width: 280px)  {
        
        #POPB-modal-overlay_<?php echo($this_popup_unique_Id); ?>{
          overflow: auto;
        }
      }


      <?php if (!empty($data['pageOptions']['pageBgImage'])) {
        ?>
        #POPB-modal-overlay_<?php echo($this_popup_unique_Id); ?>{
        background:url("<?php echo $data['pageOptions']['pageBgImage']; ?>")no-repeat center center; background-size:cover;
        }
        <?php
      } ?>

        <?php if (!empty($data['pageOptions']['pageBgColor'])){ ?>
          #POPB-modal-overlay_<?php echo($this_popup_unique_Id); ?>{
            background-color: <?php echo $data['pageOptions']['pageBgColor']; ?> ;
          }
        <?php } ?>


      #pluginops-modal-content_<?php echo($this_popup_unique_Id); ?> {
        position: absolute;
        left: 50%;
        transform: translateX(-50%);
        -ms-transform: translateX(-50%);
        -webkit-transform: translateX(-50%);
        -moz-transform: translateX(-50%);
        -o-transform: translateX(-50%);
      }

    </style>

    <div class="pluginops-modal" id="POPB-modal-overlay_<?php echo($this_popup_unique_Id); ?>" style=" position: fixed; z-index: 999999999999; left: 0; right:0; top: 0; width: 100vw; max-width: 100vw;  height: 100%; overflow: none; display: none; overflow: auto; margin:0 auto;">
        <?php echo "<div id='fullPageBgOverlay_$current_pageID' style='height: 100%; top: 0; left: 0; width: 100%; position: absolute;'></div>";  ?>
        <div class="pluginops-modal-content" id="pluginops-modal-content_<?php echo($this_popup_unique_Id); ?>">
          <div class="popb_popup_close" id="popb_popup_close_<?php echo($this_popup_unique_Id); ?>" style="display:<?php echo $data['pageOptions']['hideCloseBtn']; ?>;" ></div>

      
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