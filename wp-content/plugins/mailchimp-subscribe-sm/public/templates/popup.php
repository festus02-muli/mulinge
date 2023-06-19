<?php if ( ! defined( 'ABSPATH' ) ) exit;

$this_popup_unique_Id = '';
if (isset($isPopUpTemplate) || $selectedOptinType == 'PopUp') {

  $pageMaxWidth = '60';
  $pageMaxWidthU = '%';
  if ( isset( $data['pageOptions']['pageMaxWidth'] )) {
    if ($data['pageOptions']['pageMaxWidth'] != '' && $data['pageOptions']['pageMaxWidth'] != '0') {
      $pageMaxWidth = $data['pageOptions']['pageMaxWidth'];
      $pageMaxWidthU = $data['pageOptions']['pageMaxWidthU'];
    }
  }
  $pageMaxWidthT = '75';
  $pageMaxWidthUT = '%';
  if ( isset( $data['pageOptions']['pageMaxWidthT'] )) {
    if ($data['pageOptions']['pageMaxWidthT'] != '' && $data['pageOptions']['pageMaxWidthT'] != '0') {
      $pageMaxWidthT = $data['pageOptions']['pageMaxWidthT'];
      $pageMaxWidthUT = $data['pageOptions']['pageMaxWidthUT'];
    }
    
  }
  $pageMaxWidthM = '85';
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

  

  if (!isset($isPopUpTemplate)) {
    $isPopUpTemplate = '';
  }

  if ($isPopUpTemplate == true || $selectedOptinType == 'PopUp' || $selectedOptinType == 'PopUp') {
    

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
        right: -15px;
        top: 15px;
        z-index: 2;
        float: right;
        clear: left;
      }
      <?php echo ".ulpb_PageBody$current_pageID"; ?>{
        clear:right;
      }

      .popb_popup_close:hover{
        background-color: #7a7a7a !important;
        transition: all .5s;
      }
      .popb_popup_close:hover::after, .popb_popup_close:hover::before {
        background-color: #fff !important;
        transition: all .5s;
      }

      @media screen and (max-width: 2920px) and (min-width: 1280px) {
        #pluginops-modal-content_<?php echo($this_popup_unique_Id); ?>{
          width: <?php echo $pageMaxWidth.$pageMaxWidthU; ?> !important;
          max-width: <?php echo $pageMaxWidth.$pageMaxWidthU; ?> !important;
        }
      }
      @media screen and (max-width: 1275px) and (min-width: 1024px)  {
        #pluginops-modal-content_<?php echo($this_popup_unique_Id); ?>{
          width: <?php echo $pageMaxWidthT.$pageMaxWidthUT; ?> !important;
          max-width: <?php echo $pageMaxWidthT.$pageMaxWidthUT; ?> !important;
        }
      }
      @media screen and (max-width: 1023px) and (min-width: 668px)  {
        #pluginops-modal-content_<?php echo($this_popup_unique_Id); ?>{
          width: <?php echo $pageMaxWidthT.$pageMaxWidthUT; ?> !important;
          max-width: <?php echo $pageMaxWidthT.$pageMaxWidthUT; ?> !important;
        }
      }
      @media screen and (max-width: 667px) and (min-width: 280px)  {
        #pluginops-modal-content_<?php echo($this_popup_unique_Id); ?>{
          max-width: <?php echo $pageMaxWidthM.$pageMaxWidthUM; ?> !important;
          width: <?php echo $pageMaxWidthM.$pageMaxWidthUM; ?> !important;

          margin-top: 5vh !important;
        }
        #POPB-modal-overlay_<?php echo($this_popup_unique_Id); ?>{
          overflow: auto;
        }

      }

      #pluginops-modal-content_<?php echo($this_popup_unique_Id); ?> {
        position: absolute;
        left: 50%;
        top: 50%;
        transform: translate(-50%, -50%);
        -ms-transform: translate(-50%, -50%);
        -webkit-transform: translate(-50%, -50%);
        -moz-transform: translate(-50%, -50%);
        -o-transform: translate(-50%, -50%);
      }

    </style>

    <div class="pluginops-modal PoParentModal" id="POPB-modal-overlay_<?php echo($this_popup_unique_Id); ?>" style=" position: fixed; z-index: 999999999999; left: 0; top: 0; width: 100vw; max-width: 100vw; height: 100%; overflow: auto; display: none; background:<?php echo $data['pageOptions']['overlayColor']; ?>; ">
        
      <div class="pluginops-modal-content" id="pluginops-modal-content_<?php echo($this_popup_unique_Id); ?>" style='max-width: <?php echo $pageMaxWidth.$pageMaxWidthU; ?> ;'>
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