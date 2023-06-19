<?php

class PluginOpsFormLoader {

    private static $instance = null;

    private function __construct() {
        
        add_action( "admin_menu", function() {
            add_submenu_page( 
                "edit.php?post_type=pluginops_forms",
                 "Dashboard",
                  "Dashboard",
                   "manage_options",
                    "page-builder-dashboard-smfb", array( $this, 'welcomePage' ), 0 );
        });

        add_action( "wp_ajax_pluginops_sm_delete_form", array( $this, "deleteForm" ) );

        add_action( 'init', function() {

            if ( ! is_admin() ) return;

            if ( ! isset( $_GET['page'] ) ) return;

            if ( $_GET['page'] !== 'page-builder-dashboard-smfb' )
                return;

            $url = plugins_url( 'style.css' , SMFB_PLUGIN_PATH. '/mun/style.ss' );
               
            wp_enqueue_style( 'pluginopsform-style1', $url );

        } );

    }
    protected function __clone() {}

    public static function getInstance() {

        if ( self::$instance == null ) {

            self::$instance = new PluginOpsFormLoader();

        }

        return self::$instance;


    }

    function welcomePage() {

        $forms = $this->getForms();

        $recentEntries = $this->getRecentFormSubmissions();

        include SMFB_PLUGIN_PATH . 'mun/views/welcome.php';

    }

    function getForms() {

        $postType = "pluginops_forms";

        $forms = get_posts( array(
            'numberposts' => 0,
            'post_type' => $postType,
            'post_status' => array( 'draft', 'publish' )
        ) );

            
        return $forms;
        
    }

    function deleteForm() {

        $id = intval( $_GET['formId'] );

        wp_delete_post( $id );
    
    }

    function getRecentFormSubmissions() {

        $entries = get_option( "ulpb_formBuilder_subForm_recent_entries" );

        if ( ! $entries )
            return array();

        return array_slice( $entries, 0, 5 );

    }

}