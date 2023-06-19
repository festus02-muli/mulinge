<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function msfpluginops_check_installation_date() {
 
    $nobug = "";
    $nobug = get_option('msfpluginops_hide_bugsOne');
    if (!$nobug) {

        $install_date = get_option( 'msfpluginops_activation_date' );
        $past_date = strtotime( '-7 days' );
 
        if ( (int)$past_date > (int)$install_date ) {
 
            //add_action( 'admin_notices', 'msfpluginops_display_admin_notice' );
 
        }

    }

    if ( is_plugin_active( 'PluginOps-Optin-Builder-Extensions-Pack/extension-pack.php' ) ){
        $allPlugins = get_plugins();
        $premPluginVer = $allPlugins['PluginOps-Optin-Builder-Extensions-Pack/extension-pack.php']['Version'];
        $premPluginVer = floatval($premPluginVer);
        $msfpluginops_prem_plugin_ver = get_option( 'msfpluginops_prem_plugin_ver');
        $msfpluginops_prem_plugin_ver = floatval($msfpluginops_prem_plugin_ver);

        if ($msfpluginops_prem_plugin_ver > $premPluginVer ) {
            add_action( 'admin_notices', 'msfpluginops_prem_ver_update_notice' );
        }
    }
 
}
add_action( 'admin_init', 'msfpluginops_check_installation_date' );
 
function msfpluginops_display_admin_notice() {
 
    $reviewurl = 'http://bit.ly/2ADqCO4';
 
    $nobugurl = get_admin_url() . '?msfpluginops_hide_bugs=1';

    $install_date = get_option( 'msfpluginops_activation_date' );
 
    echo '<link href="https://fonts.googleapis.com/css?family=Pacifico" rel="stylesheet">
    <div class="psprev-adm-notice psprev-adm-notice-wp-rating notice">';

    echo '<h3> Help Us In Making <span class="specialSpan">PluginOps Page Builder</span> Better For You </h3>';

    echo '<br><p>' . 'Your reviews encourage us to add more amazing features in this plugin and also helps us to find issues with the plugin' . '</p>';

    echo '<a class="psprev-adm-notice-link" href="'.$reviewurl.'" target="_blank">'.'Leave Your Review Now'.'</a>';

    echo '<br><br><br><a href="' . $nobugurl . '"  style="float:right;">'. __( 'Dismiss this notice.', 'page-builder-add' ).'</a>';
 
 
    echo "</div>";

    echo "<style>
    .specialSpan {background:#fff; color:#333; padding:2px 6px; border-radius:2px; font-family: Pacifico, cursive; font-style:italic;}
    .psprev-adm-notice-activation { border-color: #41c4ff; }
    .psprev-adm-notice-activation h4 { font-size: 2em; }
    .psprev-adm-notice-activation p { font-size: 16px; }
    .psprev-adm-notice-activation a { text-decoration: none; }
    .psprev-adm-notice-activation .psprev-adm-notice-link { display: inline-block; padding: 6px 8px; margin-bottom: 10px; color: rgba(52,152,219,1); font-weight: 500; background: #e9e9e9; border-radius: 2px; margin-right: 10px; }
    .psprev-adm-notice-activation .psprev-adm-notice-link span { display: inline-block; text-decoration: none; }
    .psprev-adm-notice-activation .psprev-adm-notice-link:hover { color: #fff; background:#41c4ff; }

    .psprev-adm-notice-wp-rating { background:#333; border-radius:10px; text-align:center; padding:25px 5px; color:#fff;padding-bottom:35px; border:10px solid #9e9e9e; }
    .psprev-adm-notice-wp-rating h3 { font-size: 2em; color:#fff;}
    .psprev-adm-notice-wp-rating p:last-of-type { margin-bottom: 50px; font-size:16px; }
    .psprev-adm-notice-wp-rating a { text-decoration: none; }
    .psprev-adm-notice-wp-rating .psprev-adm-notice-link { padding: 15px 20px; margin-bottom: 10px; color: rgba(52,152,219,1); font-weight: 500; background: #e9e9e9; border-radius: 2px; font-size:19px;  letter-spacing:3px; }
    .psprev-adm-notice-wp-rating .psprev-adm-notice-link span {  text-decoration: none; }
    .psprev-adm-notice-wp-rating .psprev-adm-notice-link:hover { color: #fff; background: rgba(52,152,219,0.75); }

    </style>";

}

function msfpluginops_prem_ver_update_notice() {
 
 
    echo "<div class='update-nag'>
        <p>A new version for PluginOps Optin Builder Premium is available : <a href=".admin_url('update-core.php?force-check=1')."> <button> Update Now </button> </a> </p>
    </div>";

    

}


function msfpluginops_set_no_bug() {
 
    $nobug = "";
 
    if ( isset( $_GET['msfpluginops_hide_bugs'] ) ) {
        $nobug = esc_attr( $_GET['msfpluginops_hide_bugs'] );
    }



    if ( 1 == $nobug ) {
       add_option( 'msfpluginops_hide_bugsOne', TRUE );
    }

    $pluginInstallNoBug = '';
    if ( isset( $_GET['plugOPB_hide_plugin_install_notice'] ) ) {
        if ( 1 == esc_attr( $_GET['plugOPB_hide_plugin_install_notice'] ) ) {
            add_option( 'plugOpB_hide_plugin_install_notice', TRUE );
        }
    }
 
 
} add_action( 'admin_init', 'msfpluginops_set_no_bug', 5 );

?>