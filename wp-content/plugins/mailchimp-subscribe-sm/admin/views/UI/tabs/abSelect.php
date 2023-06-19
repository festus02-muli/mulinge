<?php if ( ! defined( 'ABSPATH' ) ) exit;
if (function_exists('smfb_RenderABTestFeatures')) {
    echo smfb_RenderABTestFeatures($post->ID);
}else if(function_exists('ulpb_RenderABTestFeatures')){
	echo ulpb_RenderABTestFeatures($post->ID,'pluginops_forms');
}else{
	?>
	<h2 class="abTestNotice"> This feature is only available for pro users, Upgrade now and to maximize your lead collection efforts. Our customers achieve an average growth of 68.3% in their leads. <a href="https://pluginops.com/optin-builder/?ref=Optin_abTesting"> Grow Your Leads Faster Than Ever </a>  </h2>
	<?php
}
?>