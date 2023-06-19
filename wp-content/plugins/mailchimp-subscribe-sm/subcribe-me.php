<?php
/*
Plugin Name: PluginOps Optin Builder
Description: The easy to use tool for creating highly attractive optin popups, bars and email capture forms on your website to increase converions.
Author: PluginOps
Plugin URI: https://pluginops.com/optin-builder/
Author URI: https://pluginops.com/optin-builder/
Version: 4.0.9.3
Donate link: https://pluginops.com/optin-builder/
License: GPL V2
*/


/*
Used code & libraries from PluginOps Page Builder Plugin.
https://wordpress.org/plugins/page-builder-add/
*/

if ( ! defined( 'ABSPATH' ) ) exit;
include 'config.php';
include 'includes.php';
include 'ask-review.php';


function msfpluginops_plugin_add_settings_link( $links ) {
    $settings_link = '<a href="edit.php?post_type=pluginops_forms&page=page-builder-dashboard-smfb">' . __( 'Dashboard','page-builder-add' ) . '</a>';
    $support_link = '<a href="http://pluginops.com/support/">' . __( 'Support','page-builder-add' ) . '</a>';

    $links['deactivate'] = str_replace( '<a', '<a id="msfsm-plugin-deactivate-link"', $links['deactivate'] );
    
    array_push( $links, $settings_link );
    array_push( $links, $support_link );
    return $links;
}
$plugin = plugin_basename( __FILE__ );
add_filter( "plugin_action_links_$plugin", 'msfpluginops_plugin_add_settings_link' );



register_activation_hook(__FILE__, 'msfpluginops_plugin_activation');
add_action('admin_init', 'msfpluginops_plugin_redirect_activation');

function msfpluginops_plugin_activation() {
flush_rewrite_rules();
    
    $now = strtotime( "now" );
    add_option( 'msfpluginops_activation_date', $now );

    add_option('msfpluginops_plugin_activation_check_option', true);

    update_option('msfpluginops_prem_plugin_ver', 1.4);

}

function msfpluginops_plugin_redirect_activation() {
if (get_option('msfpluginops_plugin_activation_check_option', false)) {
    delete_option('msfpluginops_plugin_activation_check_option');
    if(!isset($_GET['activate-multi']))
    {
        wp_redirect("edit.php?post_type=pluginops_forms&page=page-builder-dashboard-smfb");
        exit();
    }
 }

  if ( is_plugin_active( 'PluginOps-Optin-Builder-Extensions-Pack/extension-pack.php' ) || is_plugin_active( 'PluginOps-S-Builder-Extensions-Pack/extension-pack.php' ) ) {
    if (!get_option( 'smfb_prem_activated') || get_option( 'smfb_prem_activated') == false ) {
      update_option( 'smfb_prem_activated', true );
    }
  }

}

//add_action( 'upgrader_process_complete', 'msfPluginOps_update_function',10, 2);

function msfPluginOps_update_function( $upgrader_object, $options ) {
    $current_plugin_path_name = plugin_basename( __FILE__ );

    if ($options['action'] == 'update' && $options['type'] == 'plugin' ){
       foreach($options['plugins'] as $each_plugin){
          if ($each_plugin==$current_plugin_path_name){
             update_option('msfpluginops_prem_plugin_ver', 1.4);
          }
       }
    }
}


function msf_plugin_deactivation_pluginops() {
    delete_option( 'cpt_reset_msf_pluginops' );
}

register_deactivation_hook( __FILE__, 'msf_plugin_deactivation_pluginops' );


include SMFB_PLUGIN_PATH.'/BC/subcribe-me.php';

//include SMFB_PLUGIN_PATH. '/mun/inc/class-pluginops-form-loader.php';

///$pluginOpsLoader = PluginOpsFormLoader::getInstance();