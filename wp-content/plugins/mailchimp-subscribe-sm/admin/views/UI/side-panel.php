<?php if ( ! defined( 'ABSPATH' ) ) exit; ?>

<div id="postbox-container-1" class="postbox-container" >
  <div id="side-sortables" class="meta-box-sortables ui-sortable">
  </div>
</div>

<div style="display: none;">
<div id="sideOptions">
  <br>
  <h2 style="text-align: center;">Placement</h2>
  <div style="margin: 0 8px;">
    
  </div>
  
  <div style="margin: 0 8px;">
    <div class="pbp_form shortcode_creator_form">
      <label for="selectFormType" style="display: none;">Form Type </label>
      <select class="selectFormType" id="selectFormType" style="display: none;">
        <option value="pluginops_form">Inline</option>
        <option value="pluginops_popup_form">PopUp</option>
        <option value="pluginops_flyin_form">FlyIn</option>
        <option value="pluginops_bar_form">Bar</option>
        <option value="pluginops_full_page_form">Full Page</option>
      </select>
      <div class="displayOnBox">
        <label>Display On </label>
        <br>
        <label class="checkboxLabel hideOnInline"> <input type="checkbox" name="displayOn" class="displayOn" value="entireWebsite">  Entire Website</label>
        <br>
        <label class="checkboxLabel"> <input type="checkbox" name="displayOn" class="displayOn" value="allPages">  All Pages</label>
        <br>
        <label class="checkboxLabel"> <input type="checkbox" name="displayOn" class="displayOn" value="allPosts">  All Posts</label>
        <br>
        <label class="checkboxLabel hideOnInline"> <input type="checkbox" name="displayOn" class="displayOn" value="frontPageOnly">  Home Page</label>
        <br>
        <label class="checkboxLabel"> <input type="checkbox" name="displayOn" class="displayOn" value="selectPages">  Selected Pages & Posts</label>
        <br>
        <label class="checkboxLabel"> <input type="checkbox" name="displayOn" class="displayOn" value="selectCategories">  Selected Categories </label>
        <br><br><br>
      </div>
      <div class="inlineSpecificOptions" style="display: none;">
        <label for='placeOptinAt'>Place At </label>
        <select class="placeOptinAt" id="placeOptinAt">
          <option value="afterPost">After Post</option>
          <option value="beforePost">Before Post</option>
        </select>
      </div>
      <div class="selectedPagesDiv" style="display: none;">
        <br><br>
        <label>Select Pages </label>
        <input type="text" class="selectCustomPages" placeholder="Title of pages">
      </div>
      <div class="selectedPostsDiv" style="display: none;">
        <br><br>
        <label>Select Posts </label>
        <input type="text" class="selectCustomPosts" placeholder="Title of posts">
      </div>
      <div class="selectedCatsDiv" style="display: none;">
        <br><br>
        <label> Categories </label>
        <input type="text" class="selectCustomCats">
      </div>
      <div class="popupRelatedOptions" style="display: none;">
        <br><br>
        <label for="displayAction">Show  </label>
        <select class="displayAction" id="displayAction">
          <option value="none"> None (Instantly)</option>
          <option value="delay"> Delay </option>
          <option value="scroll"> Scroll </option>
          <option value="exit"> Upon Exit </option>
          <option value="onClick"> On Click </option>
        </select>
      </div>
      <br><br>
      <div class="actionTypeValue" style="display: none;">
        <label for='displayActionValue' class="popupActionLabel">Popup Delay <span style="font-size:10px;">(Seconds)</span></label>
        <input type="text" class="displayActionValue" id="displayActionValue">
        <br><br>
      </div>
      <div class="flyInPositionContainer" style="">
        <label for="flyInPositioning">FlyIn Position</label>
        <select class="flyInPositioning" id="flyInPositioning">
          <option value="bRight">Bottom Right</option>
          <option value="bLeft">Bottom Left</option>
          <option value="bCenter">Bottom Center</option>
        </select>
        <br><br>
      </div>
      <div class="barPositionContainer" style="display: none;">
        <label for="barPositioning">Bar Position</label>
        <select class="barPositioning" id="barPositioning">
          <option value="bottom">Bottom</option>
          <option value="top"> Top </option>
        </select>
        <br><br>
      </div>
      <div class="popUpAnimationsContainer">
        <label>Entrance Animation : </label>
        <select class="popUpEntranceAnimation" style="width: 70px">
          <option value="">None</option>
          <optgroup label="Attention Seekers">
            <option value="bounce">bounce</option>
            <option value="flash">flash</option>
            <option value="pulse">pulse</option>
            <option value="rubberBand">rubberBand</option>
            <option value="shake">shake</option>
            <option value="swing">swing</option>
            <option value="tada">tada</option>
            <option value="wobble">wobble</option>
            <option value="jello">jello</option>
          </optgroup>
          <optgroup label="Bouncing Entrances">
            <option value="bounceIn">bounceIn</option>
            <option value="bounceInDown">bounceInDown</option>
            <option value="bounceInLeft">bounceInLeft</option>
            <option value="bounceInRight">bounceInRight</option>
            <option value="bounceInUp">bounceInUp</option>
          </optgroup>
          <optgroup label="Fading Entrances">
            <option value="fadeIn">fadeIn</option>
            <option value="fadeInDown">fadeInDown</option>
            <option value="fadeInDownBig">fadeInDownBig</option>
            <option value="fadeInLeft">fadeInLeft</option>
            <option value="fadeInLeftBig">fadeInLeftBig</option>
            <option value="fadeInRight">fadeInRight</option>
            <option value="fadeInRightBig">fadeInRightBig</option>
            <option value="fadeInUp">fadeInUp</option>
            <option value="fadeInUpBig">fadeInUpBig</option>
          </optgroup>
          <optgroup label="Flippers">
            <option value="flip">flip</option>
            <option value="flipInX">flipInX</option>
            <option value="flipInY">flipInY</option>
          </optgroup>
          <optgroup label="Lightspeed">
            <option value="lightSpeedIn">lightSpeedIn</option>
          </optgroup>
          <optgroup label="Rotating Entrances">
            <option value="rotateIn">rotateIn</option>
            <option value="rotateInDownLeft">rotateInDownLeft</option>
            <option value="rotateInDownRight">rotateInDownRight</option>
            <option value="rotateInUpLeft">rotateInUpLeft</option>
            <option value="rotateInUpRight">rotateInUpRight</option>
          </optgroup>
          <optgroup label="Sliding Entrances">
            <option value="slideInUp">slideInUp</option>
            <option value="slideInDown">slideInDown</option>
            <option value="slideInLeft">slideInLeft</option>
            <option value="slideInRight">slideInRight</option>
          </optgroup>
          <optgroup label="Zoom Entrances">
            <option value="zoomIn">zoomIn</option>
            <option value="zoomInDown">zoomInDown</option>
            <option value="zoomInLeft">zoomInLeft</option>
            <option value="zoomInRight">zoomInRight</option>
            <option value="zoomInUp">zoomInUp</option>
          </optgroup>
          <optgroup label="Specials">
            <option value="rollIn">rollIn</option>
          </optgroup>
        </select>
        <br><br>
        <label>Exit Animation : </label>
        <select class="popUpExitAnimation">
          <option value="">None</option>
          <optgroup label="Bouncing Exits">
            <option value="bounceOut">bounceOut</option>
            <option value="bounceOutDown">bounceOutDown</option>
            <option value="bounceOutLeft">bounceOutLeft</option>
            <option value="bounceOutRight">bounceOutRight</option>
            <option value="bounceOutUp">bounceOutUp</option>
          </optgroup>
          <optgroup label="Fading Exits">
            <option value="fadeOut">fadeOut</option>
            <option value="fadeOutDown">fadeOutDown</option>
            <option value="fadeOutDownBig">fadeOutDownBig</option>
            <option value="fadeOutLeft">fadeOutLeft</option>
            <option value="fadeOutLeftBig">fadeOutLeftBig</option>
            <option value="fadeOutRight">fadeOutRight</option>
            <option value="fadeOutRightBig">fadeOutRightBig</option>
            <option value="fadeOutUp">fadeOutUp</option>
            <option value="fadeOutUpBig">fadeOutUpBig</option>
          </optgroup>
          <optgroup label="Flippers">
            <option value="flipOutX">flipOutX</option>
            <option value="flipOutY">flipOutY</option>
          </optgroup>
          <optgroup label="Lightspeed">
            <option value="lightSpeedOut">lightSpeedOut</option>
          </optgroup>
          <optgroup label="Rotating Exits">
            <option value="rotateOut">rotateOut</option>
            <option value="rotateOutDownLeft">rotateOutDownLeft</option>
            <option value="rotateOutDownRight">rotateOutDownRight</option>
            <option value="rotateOutUpLeft">rotateOutUpLeft</option>
            <option value="rotateOutUpRight">rotateOutUpRight</option>
          </optgroup>
          <optgroup label="Sliding Exits">
            <option value="slideOutUp">slideOutUp</option>
            <option value="slideOutDown">slideOutDown</option>
            <option value="slideOutLeft">slideOutLeft</option>
            <option value="slideOutRight">slideOutRight</option>
          </optgroup>
          <optgroup label="Zoom Exits">
            <option value="zoomOut">zoomOut</option>
            <option value="zoomOutDown">zoomOutDown</option>
            <option value="zoomOutLeft">zoomOutLeft</option>
            <option value="zoomOutRight">zoomOutRight</option>
            <option value="zoomOutUp">zoomOutUp</option>
          </optgroup>
          <optgroup label="Specials">
            <option value="hinge">hinge</option>
            <option value="rollOut">rollOut</option>
          </optgroup>
        </select>
      </div>
      <label>Hide On Devices </label>
      <br>
      <label class="checkboxLabel">
        <input type="checkbox" name="hideCampaignOn" class="hideCampaignOn" value="desktop"> Desktop <span class="responsiveBtn"> <i class="fa fa-desktop"></i> </span>
      </label>
      <br>
      <label class="checkboxLabel">
        <input type="checkbox" name="hideCampaignOn" class="hideCampaignOn" value="tablet"> Tablet <span class="responsiveBtn"> <i class="fa fa-tablet"></i> </span>
      </label>
      <br>
      <label class="checkboxLabel">
        <input type="checkbox" name="hideCampaignOn" class="hideCampaignOn" value="phone">Phone <span class="responsiveBtn"> <i class="fa fa-mobile-phone"></i> </span>
      </label>
      <br><br><hr><br>
    </div>
    <h2 style="text-align: center;">Custom Placement Shortcode</h2>
    <div class='generated_shortcode' style="display: none;">[<span class="generated_shortcode_type">pluginops_form</span> template_id='<?php echo $post->ID; ?>' <span class="shortcode_popup_action_attrs"></span>   <span class="flyInPositionAttr"></span>  <span class="barPositionAttr"></span>  <span class="animationsAttr"></span>]</div>

    <div class="generated_shortcode_displayed"></div>
    <br> <p class="desc"> Copy & paste this shortcode to display the campagin. </p><br>



    <div class="PB_accordion">
      <h3 class="overlayOps">Overlay </h3>
      <div class="accordContentHolder pbp_form overlayOps">
        <label>Overlay Color </label>
        <input type="text" name="overlayColor" class="color-picker_btn_two overlayColor" data-alpha='true' id="overlayColor" >
        <br><br>
        <label>Hide Close Button </label>
        <select class="hideCloseBtn">
          <option value="block">No</option>
          <option value="none">Yes</option>
        </select>
        <br><br><br><br>
        <label>Hide On Overlay Click </label>
        <select class="closeOnOverlay">
          <option value="false">No</option>
          <option value="true">Yes</option>
        </select>
        <br><br><br>
      </div>
      <h3 class="">Cookie Control </h3>
      <div class="accordContentHolder">
        <label>Hide Campaign after visitor closes the optin </label>
        <br><br>
        <select class="hideAfterCampaignClosed">
          <option value="true">Yes</option>
          <option value="false">No</option>
        </select>
        <br><br>
        <label>Hide for "X" days after conversion </label>
        <br><br>
        <input type="number" class="cookieConversionTime">
        <br><br>
        <label>Hide for "X" hours after closing </label>
        <br><br>
        <input type="number" class="cookieCloseTime">
        <br><br>
      </div>
    </div>
      
  </div>

</div>
</div>

<script>
  <?php
  $post_titles_args = array(
  'posts_per_page'   => 500);
    $page_titles = wp_list_pluck( get_pages(), 'post_title' );
    $post_titles = wp_list_pluck( get_posts($post_titles_args), 'post_title' );
    $allCategories = get_categories();

    echo "var availablePages = [";
    foreach ($page_titles as $key => $value) {
      $value = str_replace('"',"&quot",$value);
      echo '"'.$value.'",';
    }
    echo "];";
    echo "\n var availablePosts = [";
    foreach ($post_titles as $key => $value) {
      $value = str_replace('"',"&quot",$value);
      echo '"'.$value.'",';
    }
    echo "];";

    echo "var availableCats = [";
    foreach ($allCategories as $value) {
      echo '"'.$value->name.'",';
    }
    echo "];";
  ?>
</script>