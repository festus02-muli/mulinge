<?php if ( ! defined( 'ABSPATH' ) ) exit; ?>
<div id="ulpb_dash_container">
	<h2 style="font-size:20px; font-weight: normal;"> <?php _e( 'PluginOps Optin Builder Dashboard', 'mailchimp-subscribe-sm' ); ?>  </h2>

	<div class="pluginops-tabs">
		<ul class="pluginops-tab-links">
		    <li class="active"><a href="#tab1" class="tab_link"> <?php _e( 'Welcome', 'mailchimp-subscribe-sm' ); ?> </a></li>
		    
        <!--<li><a href="#tabUpdates" class="tab_link">Update Log</a></li> -->
	  </ul>

		<div class="pluginops-tab-content" style="min-height: 930px;">
			<div id="tab1" class="pluginops-tab pluginops-active" > 
				<h2> <?php _e( 'Welcome to PluginOps Optin Builder', 'mailchimp-subscribe-sm' ); ?>  </h2>
				<p> <?php _e( 'Thank you for choosing the PluginOps Optin Builder plugin and welcome to the community. Find some useful information below and learn how to create beautiful forms, popups & flyin forms in minutes.', 'mailchimp-subscribe-sm' ); ?>  </p>
				<br>
				<h3> <?php _e( 'Getting Started - Build Your First  Optin Form', 'mailchimp-subscribe-sm' ); ?> </h3>
        <br>
        <a href="<?php echo admin_url('post-new.php?post_type=pluginops_forms'); ?>" target="_blank" style="font-size:14px; font-weight: bold;"><?php _e( 'Optin Builder - Add New Optin Form', 'mailchimp-subscribe-sm' ); ?></a>
        <p> <?php _e( 'Ready to start creating forms ? Jump into the form builder by clicking the Add new form button under the Subscribe Form builder menu.', 'mailchimp-subscribe-sm' ); ?> </p>
        <br>
        <br>
        <h3><?php _e( 'PluginOps Optin Builder - Getting Started Basic Usage Guide', 'mailchimp-subscribe-sm' ); ?> </h3>
        <a href="http://bit.ly/2GoU5hr" target="_blank" style="font-size:14px; font-weight: bold;"> <?php _e( 'PluginOps Optin Builder - Getting Started', 'mailchimp-subscribe-sm' ); ?>  </a>
        <br><br>
        <br>
        <div style="float: left; width: 100%;">
          <hr>
          <br>
          <h2><?php _e( 'User Guide', 'mailchimp-subscribe-sm' ); ?> </h2>
          <br>
          <h3><?php _e( 'PluginOps Optin Builder - Full Documentation', 'mailchimp-subscribe-sm' ); ?> </h3>
          <a href="https://pluginops.com/docs/optin-builder-docs/" target="_blank" style="font-size:14px; font-weight: bold;"> <?php _e( 'PluginOps Optin Builder - Documentation', 'mailchimp-subscribe-sm' ); ?>  </a>
        </div>
      </div>
      <div id="tab2" class="pluginops-tab" style="background: #F3F6F8;">
        <div class="video-card">
          <iframe width="460" height="255" src="https://www.youtube.com/embed/or8liQOYCLs" frameborder="0" allowfullscreen></iframe>
          <h3>Quick Tour</h3>
        </div>
        <div class="video-card">
          <iframe width="460" height="255" src="https://www.youtube.com/embed/VozvCV-xLro" frameborder="0" allowfullscreen></iframe>
          <h3>Intro to Rows, Columns & Widgets</h3>
        </div>
        <div class="video-card">
          <iframe width="460" height="255" src="https://www.youtube.com/embed/YX7aQW47Nkk" frameborder="0" allowfullscreen></iframe>
          <h3>How To Add Forms</h3>
        </div>
        <div class="video-card">
          <iframe width="460" height="255" src="https://www.youtube.com/embed/a0yb1Ce2ac8" frameborder="0" allowfullscreen></iframe>
          <h3>How To Add Pricing Table</h3>
        </div>
        <div class="video-card">
          <iframe width="460" height="255" src="https://www.youtube.com/embed/6tHjM3SxDa8" frameborder="0" allowfullscreen></iframe>
          <h3>How to use templates</h3>
        </div>
        <div class="video-card">
          <iframe width="460" height="255" src="https://www.youtube.com/embed/5oRCB-7dZkY" frameborder="0" allowfullscreen></iframe>
          <h3>What is Margin & Padding</h3>
        </div>
        <div class="video-card">
          <iframe width="460" height="255" src="https://www.youtube.com/embed/3rK4jL3oTRs" frameborder="0" allowfullscreen></iframe>
          <h3> Design A Landing Page</h3>
        </div>
        <div class="video-card">
          <iframe width="460" height="255" src="https://www.youtube.com/embed/6W42KjrxM58" frameborder="0" allowfullscreen></iframe>
          <h3> Fix WordPress Page Not Found Error </h3>
        </div>
        <div class="video-card">
          <iframe width="460" height="255" src="https://www.youtube.com/embed/39oK8mFVMnA" frameborder="0" allowfullscreen></iframe>
          <h3> How To Create Full Page Slider </h3>
        </div>
      </div>
      <div id="tabUpdates" class="pluginops-tab">
        <h3>V. 1.5.4</h3> 
        <li>Whole New UI With Live Changes Preview</li>
        <li>Added WooCommerce Widget</li>
        <br>
        <br>
        <hr>

        <h3>V. 1.4.2</h3> 
        <li>Body Padding bug fixed.</li>
        <li>Added Two new Templates</li>
        <li>Added Icons, Cards & Audio widget.</li>
        <li>Editor Bug fixes.</li>
        <br>
        <br>
        <hr>
        <h3>V. 1.3.1</h3> 
        <li>Duplicate and insert other page templates (With Same Content)</li>
        <li>Side Panel Moved in collapsible container.</li>
        <li>Duplicate Row Bug Fix</li>
        <br>
        <br>
        <hr>
        <h3>V. 1.2.8</h3>
        <li> Drag and drop Widgets.</li>
        <li> Duplicate and delete widgets from front panel.</li>
        <li> New templates.</li>
        <br>
        <br>
        <hr>
        <h3>V. 1.2.6</h3>
        <li> Set Video as background of rows.</li>
        <li> Set the opacity of colors.</li>
        <li> Page duplication Bug Fixed.</li>
        <br>
        <br>
        <hr>
        <h3>V. 1.2.5</h3>
        <li>4 New Templates Added.</li>
        <li>Video Widget Added.</li>
        <li>Responsive Navigations.</li>
        <br>
        <br>
        <h3>V. 1.2.3</h3>
        <li>Added Subscribe Form Widget.</li>
        <li>Fixed Responsiveness of templates.</li>
        <br>
        <br>
        <hr>
      </div>
		</div>
	</div>
</div>

<style type="text/css">
	.tab_link{
  text-decoration:none;
}
.tabs {
  width:auto;
  display:inline-block;
}
 
   
.tab-links:after {
  display:block;
  clear:both;
  content:'';
}

.video-card{
  display: inline-block;
  max-width:660px;
  max-height:500px;
  background: #fff;
  border:1px solid #d3d3d3;
  text-align: center;
  margin-right: 15px;
  margin-bottom: 40px;
}
.tab-links li {
  margin:0px 5px;
  float:left;
  list-style:none;
}

.tab-links a {
  padding:9px 20px;
  display:inline-block;
  border-radius:7px 7px 0px 0px;
  background:#7fc9fb;
  font-size:16px;
  font-weight:600;
  color:#fff;
  transition:all linear 0.15s;
}
 
.tab-links a:hover {
background:#2fa8f9;
text-decoration:none;
}
 
li.active a, li.active a:hover {
  background:#fff;
  color:#2fa8f9;
}
 

.tab-content {
  border-radius:3px;
  box-shadow:-1px 1px 1px rgba(0,0,0,0.15);
  background:#fff;
}
 
.tab {
	padding: 20px 40px;
  display:none;
  min-width: 60%;
  min-height: 600px
}
 
.tab.active {
  display:block;
}

body{
  background: #F3F6F8 !important;
}

  .pluginops-tab_link{
  text-decoration:none;
}
.pluginops-tabs {
  width:auto;
  display:inline-block;
}
 
   
.pluginops-tab-links:after {
  display:block;
  clear:both;
  content:'';
}

.video-card{
  display: inline-block;
  max-width:660px;
  max-height:500px;
  background: #fff;
  border:1px solid #d3d3d3;
  text-align: center;
  margin-right: 15px;
  margin-bottom: 40px;
}
.pluginops-tab-links li {
  margin:0px 5px;
  float:left;
  list-style:none;
}

.pluginops-tab-links a {
  padding:9px 20px;
  display:inline-block;
  border-radius:7px 7px 0px 0px;
  background:#7fc9fb;
  font-size:16px;
  font-weight:600;
  color:#fff;
  transition:all linear 0.15s;
}
 
.pluginops-tab-links a:hover {
background:#2fa8f9;
text-decoration:none;
}
 
li.pluginops-active a, li.pluginops-active a:hover {
  background:#fff;
  color:#2fa8f9;
}
 

.pluginops-tab-content {
  border-radius:3px;
  box-shadow:-1px 1px 1px rgba(0,0,0,0.15);
  background:#fff;
}
 
.pluginops-tab {
  padding: 20px 40px;
  display:none;
  min-width: 60%;
  min-height: 600px;
}
 
.pluginops-tab.pluginops-active {
  display:block;
}


</style>

<script type="text/javascript">
    jQuery('.tabs .tab-links a').on('click', function(e)  {
        var currentAttrValue = jQuery(this).attr('href');
 
        // Show/Hide Tabs
        jQuery('.tabs ' + currentAttrValue).show().siblings().hide();
 
        // Change/remove current tab to active
        jQuery(this).parent('li').addClass('active').siblings().removeClass('active');
 
        e.preventDefault();
    });

    jQuery('.pluginops-tabs .pluginops-tab-links a').on('click', function(e)  {
        var currentAttrValue = jQuery(this).attr('href');
 
        jQuery('.pluginops-tabs ' + currentAttrValue).show().siblings().hide();
 
        jQuery(this).parent('li').addClass('pluginops-active').siblings().removeClass('pluginops-active');
 
        e.preventDefault();
    });

</script>