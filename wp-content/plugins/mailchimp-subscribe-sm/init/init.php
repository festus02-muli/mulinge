<?php 
if ( ! defined( 'ABSPATH' ) ) exit;

function msfPluginOps_Load_admin_Class() {
	$msf_pluginops_load_admin_class = new MSFPluginOps_AdminClass();
	$msf_pluginops_load_ajax_requests = new MSFPluginOps_Ajax_Requests();
	$msf_pluginops_feedback_class = new MSFSM_Feedback_Class();
}

msfPluginOps_Load_admin_Class();

?>