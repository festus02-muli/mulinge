<?php
if ( ! defined( 'ABSPATH' ) ) exit;

$smfb_phpVersion = phpversion(); 

$smfb_phpVersion = (float)$smfb_phpVersion;

include SMFB_PLUGIN_PATH.'/integrations/form-builder-database/extension.php';

include 'admin/classes/admin.php';

if ($smfb_phpVersion >= 5.5) {
	include 'admin/classes/ajax-requests-class.php';	
}else{
	include 'admin/classes/ajax-requests-class-older-php-version.php';
}

include 'admin/classes/feedback.php';

include 'init/init.php';



?>