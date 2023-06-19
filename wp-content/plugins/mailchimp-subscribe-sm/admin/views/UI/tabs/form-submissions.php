<?php if ( ! defined( 'ABSPATH' ) ) exit;


if (function_exists('ulpb_available_pro_widgets') || function_exists('smfb_available_pro_widgets') ) {
}else {
	?>
	<div  class="abTestNotice" style=""> 
	    <i class='fa fa-circle-o-notch'></i> 
	   	Did you know You can View, Download, Export & Sync your form submissions with your favorite  email marketing services :   
	    <a href='https://pluginops.com/optin-builder/?ref=Optin_formSubmissions' target='_blank' style="padding: 5px 10px;"> Click here to order</a>
	</div>
	<?php
}

?>

<?php

	if (function_exists('smfb_formBuilder_database_renderFormDataTable_extension')) {
	  echo smfb_formBuilder_database_renderFormDataTable_extension($postId);
	}else{
		echo "<h1> Please get Form Builder Database extension to access all the submissions. </h1>";
	}

?>

