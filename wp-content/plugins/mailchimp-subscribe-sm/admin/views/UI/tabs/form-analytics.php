<?php if ( ! defined( 'ABSPATH' ) ) exit; ?>

<div style="background-color: #fff;">

<?php if ( function_exists('ulpb_available_pro_widgets') || function_exists('smfb_available_pro_widgets') ) { ?>

<div style="padding: 0 12.5%;">
	<select class="analyticsDateRange" style="display: inline-block; margin: 15px 15px;">
		<option value="7">Last 7 Days</option>
		<option value="30">Last 30 Days</option>
		<option value="60">Last 60 Days</option>
		<option value="100">Last 100 Days</option>
	</select>

	<div id="resetAnalyticsBtn" class="resetAnalyticsBtn" style="margin: 15px -92px; display: inline-block;"> Reset Analytics </div>
	<p class="analyticsDeleted"></p>
</div>

<div id="mainAnalyticsContainer">
</div>

<?php 
} else {
	?>
	<div  class="abTestNotice" style=""> 
	    <i class='fa fa-circle-o-notch'></i> 
	   	Did you know you can view analytics, track conversion rates and see number of daily subscribers with premium version :   
	    <a href='https://pluginops.com/optin-builder/?ref=Optin_analytics' target='_blank' style="padding: 5px 10px;"> Click here to order</a>
	</div>
	<?php
}

?>

</div>

