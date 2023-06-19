<?php if ( ! defined( 'ABSPATH' ) ) exit; 

if (isset( $_GET['thisPostID'] )) {
  $postId = sanitize_text_field($_GET['thisPostID']);
  $post = get_post($postId);
}elseif(isset( $_GET['post'] )) {
  $postId = sanitize_text_field($_GET['post']);
}else{
  if (isset($post)) {
    $postId = $post->ID;
  }else{
    $postId = false;
  }
}

if (isset( $_GET['thisPostType'] )) {
  $thisPostType = sanitize_text_field($_GET['thisPostType']);
}else{
  $thisPostType = get_post_type($postId);
}

$post_slug = $post->post_name;

if ($post_slug == '') {
  $hidePermalink = 'display:none !important;';
}else{
  $hidePermalink = '';
}

$ULPB_CurrentStep = get_post_meta($post->ID, 'ULPB_CurrentStep', true );
$is_front_page = get_post_meta($post->ID, 'ULPB_FrontPage', true );
$loadWpHead = get_post_meta($post->ID, 'ULPB_loadWpHead', true );
$loadWpFooter = get_post_meta($post->ID, 'ULPB_loadWpFooter', true );
$pbPP_iconFolderURL = SMFB_PLUGIN_URL.'/images/icons/';
$ppb_post_status = get_post_status( $post->ID );
$currentStep = '';

$landingPageSafeModeFeature = get_option( 'landingPageSafeModeFeature', false );

$landingPageSafeModeFeature = sanitize_text_field( $landingPageSafeModeFeature );

if (isset($ULPB_CurrentStep)) {
  $currentStep = $ULPB_CurrentStep;
}

if ($currentStep == '3' || $ppb_post_status == 'draft' || $ppb_post_status == 'publish') {
}else{
?>
  <div id="initializeCampaignSetup" class='stepModal'  style="display: none;">
    <!-- <h1 style="text-align: center;" class="stepCount"> 1 <br>Step</h1> 
    <div class="stepModalContent stepOneContent" >
      <input type="text" class="campaignNameField  stepDataField" placeholder="Enter Campaign Name"> <br> <br>
      <div class="setCampaignName nxtStepBtn"> Next </div>
    </div>
    -->
    <div class="stepModalContent stepTwoContent" style="display: block;">
      <h2>Select Campaign Type</h2>
      <br><br>
      <div class="stepCard" data-OptinType='Inline'>
        <img src="<?php echo $pbPP_iconFolderURL.'optin-types-icon-inline.png'; ?>">
        <br>
        <p>Inline</p>
      </div>
      <div class="stepCard" data-OptinType='PopUp'>
        <img src="<?php echo $pbPP_iconFolderURL.'optin-types-icon-popup.png'; ?>">
        <br>
        <p>PopUp</p>
      </div>
      <div class="stepCard" data-OptinType='Bar'>
        <img src="<?php echo $pbPP_iconFolderURL.'optin-types-icon-bar.png'; ?>">
        <br>
        <p>Bar</p>
      </div>
      <div class="stepCard" data-OptinType='Fly In'>
        <img src="<?php echo $pbPP_iconFolderURL.'optin-types-icon-flyIn.png'; ?>">
        <br>
        <p>FlyIn</p>
      </div>
      <div class="stepCard" data-OptinType='Full Page'>
        <img src="<?php echo $pbPP_iconFolderURL.'optin-types-icon-fullpage.png'; ?>">
        <br>
        <p>Full Page</p>
      </div>
      <div class="stepCard" data-OptinType='Side'>
        <img src="<?php echo $pbPP_iconFolderURL.'optin-types-icon-sidebar.png'; ?>">
        <br>
        <p>Side Bar</p>
      </div>
      <br><br>
      <div class="setCampaignType nxtStepBtn"> Next </div>
      <input type="hidden" class="selectedOptinType">
      <br><br>
    </div>
    <div class="stepThreeContent" style="display: none; margin: 0 auto;height: 1200px; text-align: center;">
      <br><h2 style="font-size: 24px;"> Select A Template </h2><br>
      <div id='templatesInstallDiv' class="templatesInstallDivOne" style="display: none; ">
        <i class='fa fa-circle-o-notch'></i> Get All These Templates <a href='https://pluginops.com/optin-builder/?ref=Optin_templates' target='_blank'>Unlock Premium Templates</a>
      </div>
      <br>
      <?php include(SMFB_PLUGIN_PATH.'admin/views/UI/tabs/templates-tab.php'); ?>
      <br>
      <br>
      <div style="padding: 10px 10px 20px 10px; position: fixed; bottom: 0; left:0; right: 0;  width: 100vw; background: #fff;">
        <div class="setTemplateStepPrev prevStepBtn"> Previous </div>
        <div class="setTemplateStep nxtStepBtn updateTemplate"> Next </div>
      </div>
      <br><br><br><br>
    </div>
  </div>
<?php } 


if (isset( $_GET['thisPostID'] ) ) {
  ?>
  <br><br><br>
  <div id="titlediv">
    <div id="titlewrap">
        <label class="screen-reader-text" id="title-prompt-text" for="title"> </label>
      <input type="text" name="post_title" size="30" value="" id="title" spellcheck="true" autocomplete="off" placeholder="Enter Page Title">
    </div>
    <div class="inside" style="display: none;">
      <div id="edit-slug-box" class="hide-if-no-js" style="<?php echo "$hidePermalink"; ?>">
      <strong>Permalink:</strong>
      <span id="sample-permalink">
        <a href="<?php echo(site_url( ) ); ?>/?post_type=pluginops_forms&amp;p=<?php echo($postId); ?>&amp;preview=true" target="wp-preview-4882"><?php echo(site_url( ) ); ?>/<span id="editable-post-name"><?php echo $post_slug; ?></span>/</a>
      </span>
      ‎<span id="edit-slug-buttons">
        <input type="text" class="editable-post-name-field" style="display: none; width: auto; height:24px; font-size: 13px; ">
        <button type="button" class="edit-slug button button-small hide-if-no-js" aria-label="Edit permalink">Edit</button>
        <button type="button" class="savePermalink  button button-small" style="display: none;">OK</button>
    </span>
      </div>
    </div>
    <span id="editable-post-name-full"><?php echo $post_slug; ?></span>
  </div>
  </div>
  <script type="text/javascript">
    ( function( $ ) {
      $('.edit-slug').click(function(){
          var prevTxt = $('#editable-post-name').text();
          $('.editable-post-name-field').val(prevTxt);
          $('#editable-post-name').css('display','none');
          $('.edit-slug').css('display','none');
          $('.editable-post-name-field').css('display','inline-block');
          $('.savePermalink').css('display','inline-block');
      });

      $('.savePermalink').click(function(){
          $('#editable-post-name').html( $('.editable-post-name-field').val() );
          $('#editable-post-name-full').html( $('.editable-post-name-field').val() );
          $('#editable-post-name').css('display','inline-block');
          $('.edit-slug').css('display','inline-block');
          $('.editable-post-name-field').css('display','none');
          $('.savePermalink').css('display','none');
      });
    })(jQuery);
  </script>
  <?php
}


?>


 <script>
  
  var popb_errorLog = {};
  var landingPageSafeModeFeature = '<?php echo $landingPageSafeModeFeature; ?>';
  var nonInvasveKnownErrors = [
      "Uncaught TypeError: Cannot read property 'hasClass' of undefined",
      "Uncaught TypeError: Cannot read property 'top' of undefined",
      "TypeError: thisColumnData.colWidgets[this_widget].widgetText is undefined",
      "Uncaught TypeError: Cannot read property 'indexOf' of undefined",
      "Uncaught TypeError: Cannot read property 'replace' of undefined",
      "ResizeObserver loop limit exceeded",
      "Uncaught TypeError: Cannot read property 'innerHTML' of undefined",
  ];

  window.onerror = function (msg, url, line) {

    
    if ( nonInvasveKnownErrors.indexOf(msg) == -1 ) {

      /*
      jQuery('.popb_safemode_popup').css('display','block');

      jQuery('.confirm_safemode_no').on('click',function(){
        jQuery('.popb_safemode_popup').css('display','none');
        location.reload();
      });

      popb_errorLog.errorMsg = msg;
      popb_errorLog.errorURL = url;
      popb_errorLog.errorLine = line;


      jQuery('.confirm_safemode_yes').on('click',function(){

          var result = " ";
          var form = jQuery('.insertTemplateForm');
          var errordata = 

          jQuery.ajax({
              url: "",
              method: 'post',
              data:{
                errorMsg : popb_errorLog.errorMsg,
                errorURL : popb_errorLog.errorURL,
                errorLine : popb_errorLog.errorLine
              },
              success: function(result){
                  location.reload();
              }
          });

      });
      */

    }
      

  }

</script>



  <?php include('tabs.php'); ?>
  <?php include('edit-column.php'); ?>
  <?php include('edit-row.php'); ?>
  <?php include('edit-widget.php'); ?>
  <?php include('new-row.php'); ?>
  <?php include('side-panel.php'); ?>
  <?php include('container-options.php'); ?>


<style type="text/css" id="PBPO_customCSS"></style>


<script src="<?php echo SMFB_PLUGIN_URL.'/js/aceSRC/ace.js' ?>" type="text/javascript" charset="utf-8"></script>


<script>
  
    var PbPOaceEditorJS = ace.edit("PbPOaceEditorJS");
    PbPOaceEditorJS.setTheme("ace/theme/dawn");
    PbPOaceEditorJS.getSession().setMode("ace/mode/javascript");

    var PbPOaceEditorCSS = ace.edit("PbPOaceEditorCSS");
    PbPOaceEditorCSS.setTheme("ace/theme/dawn");
    PbPOaceEditorCSS.getSession().setMode("ace/mode/css");

</script>

<div class="pb_loader_container">
  <div class="pb_loader"></div>
</div>

<div class="lpp_modal pb_preview_container" style="">
  <div class="pb_temp_prev" style="text-align: center; overflow: visible;" ></div>
</div>

<div class="lpp_modal popb_confirm_action_popup">
  <div class="popb_confirm_container">
    <h2 class="popb_confirm_message">Are you sure you want to do this ? </h2>
    <h4 class="popb_confirm_subMessage">You will lose any unsaved changes.</h4>
    <div class="confirm_btn confirm_btn_green confirm_yes">Yes</div>
    <div class="confirm_btn confirm_btn_grey confirm_no">Cancel</div>
  </div>
</div>


<div class="lpp_modal popb_safemode_popup">
  <div class="popb_confirm_container">
    <div class="popb_popup_close" id="popb_popup_close" style="" ></div>
    <h2 class="popb_confirm_message" style="line-height: 1.3em;">There was some error loading the editor </h2>
    <h4 class="popb_confirm_subMessage">Enable safe mode and send error data to PluginOps and reload the editor page to see if that fixes the error, If error persists please contact support.</h4>
    <div id="confirm_safemode_yes" class="confirm_btn confirm_btn_green confirm_safemode_yes" data-doActionValue='true'>Enable Safe Mode</div>
    <div class="confirm_btn confirm_btn_grey confirm_safemode_no" data-doActionValue='false'>No, Just Reload</div>
    <div class="fullErrorMessage"><p>Click To View Full Error Message</p></div>
    <input type="hidden" class="fullErrorMessageInput">
  </div>
</div>

<div class="lpp_modal pb_preview_fields_container" style="">
  <div class="pb_fields_prev" style="
    overflow: visible;
    background: #fff;
    width: 48%;
    height: 80vh;
    margin: 3% 24% 0 24%;
    position: absolute;
    padding: 10px 40px;
    border-radius: 5px;
    text-align: center;
  " >
    <span class="dashicons dashicons-no formEntriesPreviewClose" style="
      float: right;
      font-size: 21px;
      margin: 5px 10px;
      cursor: pointer;
      background: #dadada;
      padding: 7px 7px;
      text-align: center;
      border-radius: 40px;
    "></span>
    <br><h2 style="text-align: center; color: #333; font-size:24px;">Form Entries</h2>
    <table class='w3-table w3-striped w3-bordered w3-card-4 formFieldsPreviewTable' style="margin-top: 50px;">
    </table>
  </div>
</div>

<input type="hidden" class="draggedWidgetAttributes" value='' >
<input type="hidden" class="draggedWidgetIndex" value='' >
<input type="hidden" class="widgetDroppedAtIndex" value='' >


<input type="hidden" class="mailchimpListIdHolder" value='' >
<input type="hidden" class="mailchimpApiKeyHolder" value='' >


<input type="hidden" class="globalRowRetrievedPostID" value='' >
<input type="hidden" class="globalRowRetrievedAttributes" value='' >

<input type="hidden" class="insertRowBlockAtIndex" value='' >


<input type="hidden" class="allTextEditableWidgetIds">

<input type="hidden" class="checkIfWidgetsAreLoadedInColumn">

<input type="hidden" class="isChagesMade" value="false">


<input type="hidden" class="currentViewPortSize" value="rbt-l">

<input type="hidden" class="currentResizedRowTarget">
<input type="hidden" class="currentResizedRowColTarget">
<input type="hidden" class="currentResizedRowColTargetNext">
<input type="hidden" class="currentResizedRowHeight">

<input type="hidden" class="isAnimateTrue">
<input type="hidden" class="animateWidgetId">


<input type="hidden" class="widgetDroppedRowId">
<input type="hidden" class="widgetDroppedColIndex">
<input type="hidden" class="widgetDroppedIndex">

<input type="hidden" class="widgetDraggedRowId">
<input type="hidden" class="widgetDraggedIndex">
<input type="hidden" class="widgetDraggedColIndex">

<input type="hidden" class="widgetDeletionCompleted" value="false">

<input type="hidden" class="isDroppedOnDroppable">

<input type="hidden" class="deleteRowIndex">
<input type="hidden" class="widgDeleteColIndex">
<input type="hidden" class="widgDeleteIndex">

<input type="hidden" class="currentlyEditedColId">
<input type="hidden" class="currentlyEditedWidgId">
<input type="hidden" class="currentlyEditedThisCol">
<input type="hidden" class="currentlyEditedThisRow">

<div id="pageStatusHolder" style="display: none;">
</div>

<div style="display: none;" class="rowWithNoColumnContainer">
  <div class="rowWithNoColumn" >
    <h5> SELECT COLUMN STRUCTURE </h5>
    <div class=" setColbtn" data-colNumber="1">
      <img src="<?php echo SMFB_PLUGIN_URL.'/images/icons/1.png' ?>">
    </div>
    <div class=" setColbtn" data-colNumber="2">
      <img src="<?php echo SMFB_PLUGIN_URL.'/images/icons/2.png' ?>">
    </div>
    <div class=" setColbtn" data-colNumber="3">
      <img src="<?php echo SMFB_PLUGIN_URL.'/images/icons/3.png' ?>">
    </div>
    <div class=" setColbtn" data-colNumber="4">
      <img src="<?php echo SMFB_PLUGIN_URL.'/images/icons/4.png' ?>">
    </div>
    
  </div>
</div>

<?php $plugData = get_plugin_data(SMFB_PLUGIN_PATH.'/subcribe-me.php',false,true); ?>
<?php 

$pb_current_user = wp_get_current_user(); 

$plugOps_pageBuilder_data_nonce = wp_create_nonce( 'POPB_data_nonce' );

$mcActive = 'false';  $smfb_extension_pack_active = 'false';
if ( is_plugin_active( 'PluginOps-S-Builder-Extensions-Pack/extension-pack.php' ) || is_plugin_active('PluginOps-Optin-Builder-Extensions-Pack/extension-pack.php') ) {
  $mcActive = 'true';
}

if ( is_plugin_active( 'PluginOps-S-Builder-Extensions-Pack/extension-pack.php' ) || is_plugin_active('PluginOps-Optin-Builder-Extensions-Pack/extension-pack.php') ) {
  $smfb_extension_pack_active = 'true';
}


?>



<div id="fontLoaderContainer"></div>

<div class="SavePage" style="display: none;"></div>




<style type="text/css" id="POPBGlobalStylesTag"></style>

<style type="text/css" id="POPBDeafaultResponsiveStylesTag"></style>

<style type="text/css" id="POPBBodyHoverStylesTag"></style>


<script src="<?php echo SMFB_PLUGIN_URL.'/js/fa.js'; ?>"></script>