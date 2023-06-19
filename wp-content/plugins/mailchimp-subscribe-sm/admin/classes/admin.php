<?php
if ( ! defined( 'ABSPATH' ) ) exit;
class MSFPluginOps_AdminClass {

	function __construct(){

		$this->_init();
		$this->_hooks();
		$this->_filters();
	}

	function _init(){

	}

	function _hooks(){
		
		add_action( 'init', array( $this, 'ulpb_register_subs_form_builder_post_types' ) );
		
		add_action( 'admin_enqueue_scripts', array( $this, 'msf_load_admin_scripts' ));

		$landingPageSafeModeFeature = get_option( 'landingPageSafeModeFeature', false );
		if ($landingPageSafeModeFeature == 'enabled') {
			# code...
		}else{
			add_action( 'admin_enqueue_scripts', array( $this, 'deregister_unwanted_forced_scripts' ), 9999);
		}


		add_action('edit_form_after_title' ,array( $this, 'wssf_custom_UI_without_metabox' ));

		add_action('admin_print_scripts', array($this,'ulpb_disable_autosave_cpt') );


		
		//add_filter( 'get_pages', array($this,'add_pbp_tabs_to_dropdown') );
		add_filter( 'hidden_meta_boxes',array($this,'remove_meta_boxes_all'),10, 3 );

		add_filter('manage_pluginops_forms_posts_columns', array($this,'ulpb_columns_admin') );

		add_action('manage_pluginops_forms_posts_custom_column',array($this,'ulpb_column_visitors_data'),10, 2);
		add_action('manage_pluginops_forms_posts_custom_column',array($this,'ulpb_global_rows_template_shortcode_column'),10, 2);

		add_shortcode( 'pluginops_form', array($this, 'smfb_template_shortcode') ) ;

		add_shortcode( 'pluginops_popup_form', array($this, 'ulpb_template_popup_shortcode') ) ;
		add_shortcode( 'pluginops_flyin_form', array($this, 'ulpb_template_popup_flyin_shortcode') ) ;
		add_shortcode( 'pluginops_bar_form', array($this, 'ulpb_template_popup_bar_shortcode') ) ;
		add_shortcode( 'pluginops_full_page_form', array($this, 'ulpb_template_popup_full_page_shortcode') ) ;
		

		add_action('admin_menu',array($this,'ulpb_menupages_add') );

		add_shortcode( 'pb_samlple_nav', array($this,'pb_shortcode_sample_nav' ) );

	}

	function _filters(){

		add_filter('the_content',array($this,'ulpb_pagebuilder_content_filter'), 25 );
		if (has_action( 'wp_body_open', false )) {
			add_action( 'wp_body_open', array($this,'ulpb_pagebuilder_bodyOpen_filter'), 9999 );
		}else{
			add_action( 'wp_footer', array($this,'ulpb_pagebuilder_bodyOpen_filter') );
		}

		if (has_action( 'wp_body_open', false )) {
			add_action( 'wp_body_open', array($this,'ulpb_front_page_content_action'), 9999 );
		}else{
			add_action( 'wp_footer', array($this,'ulpb_front_page_content_action') );
		}
		
	}


function ulpb_register_subs_form_builder_post_types() {

	$labels_one = array(
		'name'                => __( 'Campaigns by PluginOps Optin Builder', 'sub-builder-add' ),
		'singular_name'       => __( 'Optin Forms', 'sub-builder-add' ),
		'all_items'       	  => __( 'Campaigns', 'sub-builder-add' ),
		'add_new'             => _x( 'Add New', 'sub-builder-add' ),
		'add_new_item'        => __( 'Add New', 'sub-builder-add' ),
		'edit_item'           => __( 'Edit', 'sub-builder-add' ),
		'new_item'            => __( 'New Campaign', 'sub-builder-add' ),
		'view_item'           => __( 'View Campaign', 'sub-builder-add' ),
		'search_items'        => __( 'Search Campaign', 'sub-builder-add' ),
		'not_found'           => __( 'No Campaigns found', 'sub-builder-add' ),
		'not_found_in_trash'  => __( 'No Campaigns found in Trash', 'sub-builder-add' ),
		'parent_item_colon'   => __( 'Parent Form:', 'sub-builder-add' ),
		'menu_name'           => __( 'PluginOps Optin Builder', 'sub-builder-add' ),
	);
	$args_one = array(
		'labels'              => $labels_one,
		'hierarchical'        => false,
		'description'         => 'Add Campaigns',
		'taxonomies'          => array(),
		'public'              => true,
		'show_ui'             => true,
		'show_in_menu'        => true,
		'show_in_admin_bar'   => true,
		'menu_position'       => null,
		'menu_icon'           => 'dashicons-email',
		'show_in_nav_menus'   => true,
		'publicly_queryable'  => true,
		'exclude_from_search' => false,
		'has_archive'         => true,
		'query_var'           => true,
		'can_export'          => true,
		'rewrite'             => true,
		'capability_type'     => 'post',
		'supports'            => array(
			'title'
		)
	);

	register_post_type( 'pluginops_forms', $args_one );

	if (! get_option( 'cpt_reset_msf_pluginops', $default = false ) ) {
		add_option( 'cpt_reset_msf_pluginops', $value = true );
		flush_rewrite_rules( $hard = true );
	}
}

function ulpb_disable_autosave_cpt(){
    global $post;
    global $pagenow;

    if ('post.php' == $pagenow || 'post-new.php' == $pagenow ) {
    	
    
	    if(get_post_type($post->ID) === 'pluginops_forms'){
	        wp_deregister_script('autosave');
	    }

	    $selectedPostTypes = get_option( 'page_builder_SupportedPostTypes' );

		if (!is_array($selectedPostTypes)) {
			$selectedPostTypes = array();
		}
		
		if (in_array($post->post_type , $selectedPostTypes, false) ) {

			$ispbactive = get_post_meta( $post->id, 'ulpb_page_builder_active', false );

			if ($ispbactive == true) {
				wp_deregister_script('autosave');
			}
			
		}

	}
}


function msf_load_admin_scripts( ) {

	global $wp_version;

	$screen_id = get_current_screen();

	$PbP_post_id = get_the_ID();

	$screenIDsToShow = array('pluginops_forms');

	$POPB_data_nonce = wp_create_nonce( 'POPB_data_nonce' );

	$thisPostID = get_the_ID();

	if ( isset($_GET['thisPostID']) ) {
		$thisPostID = sanitize_text_field( $_GET['thisPostID'] );
	}


	if ($screen_id->id == "pluginops_forms_page_optin-builder-new-optin-page") {
	
		if (in_array($screen_id->post_type  , $screenIDsToShow, false) ){


			$isPremActive = 'false';
			if ( function_exists('ulpb_available_pro_widgets') || function_exists('smfb_available_pro_widgets') ) {
				$isPremActive = 'true';
			}

			$plugData = get_plugin_data(SMFB_PLUGIN_PATH.'/subcribe-me.php',false,true);

			if (!isset($plugData['Version'])) {
				$plugData['Version'] = '4.0.7.3';
			}

			$popbVersion = $plugData['Version'];

			if (isset( $_GET['thisPostType'] )) {
			  $thisPostType = sanitize_text_field($_GET['thisPostType']);
			}else{
			  $thisPostType = get_post_type($thisPostID);
			}

			$pb_current_user = wp_get_current_user();



			wp_enqueue_script('jquery');

			wp_enqueue_script( 'jquery-ui-core' );

			wp_enqueue_script( 'jquery-ui-tooltip' );

			wp_enqueue_script( 'jquery-ui-slider' );

			wp_enqueue_script( 'jquery-ui-accordion' );

			wp_enqueue_script( 'jquery-ui-datepicker' );

			wp_enqueue_script( 'jquery-ui-button' );

			wp_enqueue_script( 'jquery-ui-tabs' );

			wp_enqueue_script( 'jquery-ui-draggable' );

			wp_enqueue_script( 'jquery-ui-resizable' );

			wp_enqueue_script( 'jquery-ui-droppable' );

			wp_enqueue_script( 'jquery-ui-sortable' );

			wp_enqueue_script( 'jquery-ui-progressbar' );

			wp_enqueue_script( 'jquery-effects-core' );

			wp_enqueue_script( 'jquery-effects-shake' );

			wp_enqueue_script( 'media-upload');

			wp_enqueue_script( 'underscore');

			wp_enqueue_script( 'backbone');




			wp_register_script( 'smfb_landingPage_initjs', SMFB_PLUGIN_URL.'/admin/scripts/init.js', array( ), false, false );

			wp_localize_script(
				'smfb_landingPage_initjs',
				'popb_admin_vars_data',
				array(
					'page_ajax_url' => admin_url('admin-ajax.php'),
					'pluginops_nonce' => $POPB_data_nonce,
					'post_id' => $thisPostID,
					'isPremActive' => $isPremActive,
					'plugin_url' => SMFB_PLUGIN_URL,
					'plugin_version' => $plugData['Version'],
					'admin_url' => admin_url(),
					'site_url' => site_url(),
					'post_status' => get_post_status($thisPostID),
					'post_type' => $thisPostType,
					'user_email' => $pb_current_user->user_email,
				)
			);

			wp_enqueue_script( 'smfb_landingPage_initjs' );



			if (floatval($wp_version) < floatval('5.6') ) {
				wp_enqueue_script( 'popb-ui-checkbox', SMFB_PLUGIN_URL.'/js/Backbone-resources/checkbox.js', array(  ), false, true );
			}

			wp_register_script( 'smfb_ajax_requests', SMFB_PLUGIN_URL.'/admin/scripts/ajax/ajax-requests.js', array( 'jquery' ), false, false );

			wp_localize_script(
				'smfb_ajax_requests',
				'popb_admin_url_data',
				array( 
					'page_ajax_url' => admin_url('admin-ajax.php'),
					'pluginops_nonce' => $POPB_data_nonce,
					'post_id' => $thisPostID
				)
			);

			wp_enqueue_script( 'smfb_ajax_requests' );



			wp_enqueue_script( 'popb-builder-customUndo-script', SMFB_PLUGIN_URL.'/admin/scripts/undo-redo.js', array(), $popbVersion, true );


			wp_enqueue_script( 'smfb-backbone-builder-collectionView', SMFB_PLUGIN_URL.'/js/Backbone-resources/backbone.collectionView.js', array( 'jquery' ), $popbVersion, true );


			wp_enqueue_script( 'smfb-backbone-builder-pbb-model-1', SMFB_PLUGIN_URL.'/admin/scripts/pbb-model-1.js', array( 'jquery' ), $popbVersion, true );


			wp_enqueue_script( 'smfb-backbone-builder-pbb-model-2', SMFB_PLUGIN_URL.'/admin/scripts/pbb-model-2.js', array( 'jquery' ), $popbVersion, true );

			
			wp_enqueue_script( 'smfb-backbone-builder-script-pageops-render', SMFB_PLUGIN_URL.'/admin/scripts/renderPageOps.js', array( 'jquery' ), $popbVersion, true );


			wp_enqueue_script( 'smfb-backbone-builder-script-bb3', SMFB_PLUGIN_URL.'/admin/scripts/bb3.js', array( 'jquery' ), $popbVersion, true );


			wp_enqueue_script( 'smfb-backbone-builder-script-widget-render', SMFB_PLUGIN_URL.'/admin/scripts/widget-render.js', array( 'jquery' ), $popbVersion, true );

			
			wp_enqueue_script( 'smfb-backbone-builder-script-row-view', SMFB_PLUGIN_URL.'/admin/scripts/row-view.js', array( 'jquery' ), $popbVersion, true );


			wp_enqueue_script( 'smfb-backbone-builder-script-widget-view', SMFB_PLUGIN_URL.'/admin/scripts/widget-view.js', array( 'jquery' ), $popbVersion, true );


			wp_localize_script( 'smfb-backbone-builder-script-widget-view', 'widgetViewLinks',array( 'templatesFolder' => SMFB_PLUGIN_URL.'/admin/scripts/templates/', 'pluginsUrl' => SMFB_PLUGIN_URL ) );


			wp_enqueue_script( 'smfb-backbone-builder-script-save-page', SMFB_PLUGIN_URL.'/admin/scripts/save-page.js', array( 'jquery' ), $popbVersion, true );


			wp_enqueue_script( 'smfb-backbone-builder-script-new-row', SMFB_PLUGIN_URL.'/admin/scripts/new-row.js', array( 'jquery' ), $popbVersion, true );


			wp_enqueue_script( 'smfb-backbone-builder-script-side-panel', SMFB_PLUGIN_URL.'/admin/scripts/side-panel.js', array( 'jquery' ), $popbVersion, true );

			
			wp_enqueue_script( 'smfb-backbone-builder-script_collectionView', SMFB_PLUGIN_URL.'/admin/scripts/pbb-CollectionView.js', array( 'jquery' ), $popbVersion, true );


			wp_enqueue_script( 'smfb-builder-script_editor_initalize', SMFB_PLUGIN_URL.'/admin/scripts/editor-initialize.js', array( 'jquery' ), $popbVersion, true );


			$ULPB_CurrentStep = get_post_meta($PbP_post_id, 'ULPB_CurrentStep', true );
		    if ($ULPB_CurrentStep == '3') {
		    }else{

		    	wp_enqueue_script( 'smfb-backbone-builder-script-bb4', SMFB_PLUGIN_URL.'/admin/scripts/bb4.js', array( 'jquery' ), $popbVersion, true );

				wp_localize_script( 'smfb-backbone-builder-script-bb4', 'bbfourLinks',array( 'templatesFolder' => SMFB_PLUGIN_URL.'/admin/scripts/templates/' ) );

		    }
				
			wp_enqueue_script( 'smfb-backbone-builder-script-pbb-drag-n-drop', SMFB_PLUGIN_URL.'/admin/scripts/pbb-drag-n-drop.js', array( 'jquery' ), $popbVersion, true );

			
			wp_enqueue_style( 'smfb-backbone-builder-jqueryUI-style', SMFB_PLUGIN_URL.'/js/Backbone-resources/jquery-ui.css' );


			wp_enqueue_style( 'smfb-adminUI-styling', SMFB_PLUGIN_URL.'/styles/admin-style.css', array(), $popbVersion );


			wp_enqueue_style( 'smfb-adminUI-animations', SMFB_PLUGIN_URL.'/public/templates/animate.min.css' );


		    wp_enqueue_style( 'wssf-iris-picker-style', SMFB_PLUGIN_URL.'/js/color/spectrum.css' );


		    wp_enqueue_script( 'wssf-color-picker-script', SMFB_PLUGIN_URL.'/js/color/alpha-picker.js', array( 'jquery' ), false, true );

		    
		    wp_enqueue_script( 'smfb-imgUpload-script', SMFB_PLUGIN_URL.'/js/image-upload.js', array( 'jquery' ), false, true );


		    wp_enqueue_script( 'smfb-faIconPicker-script', SMFB_PLUGIN_URL.'/js/fontawesome-iconpicker.min.js', array( 'jquery' ), false, true );


		    wp_enqueue_style( 'smfb-faIconPicker-styling', SMFB_PLUGIN_URL.'/js/fontawesome-iconpicker.min.css' );


		    wp_enqueue_script( 'smfb-countdown-script', SMFB_PLUGIN_URL.'/js/countdown.js', array( 'jquery' ), false, true );


		    wp_enqueue_script( 'smfb-countdowntimezone-script', SMFB_PLUGIN_URL.'/js/moment.min.js', array( 'jquery' ), false, true );


		    wp_enqueue_script( 'smfb-countdowntzdata-script', SMFB_PLUGIN_URL.'/js/moment-timezone-with-data-2010-2020.min.js', array( 'jquery' ), false, true );


		    wp_enqueue_script( 'wssf-imageSliderWidget-script', SMFB_PLUGIN_URL.'/js/slider.min.js', array(), false, true );


		    wp_enqueue_script( 'wssf-imageGalleryMasonry-script', SMFB_PLUGIN_URL.'/js/masonry.pkgd.min.js', array(), false, true );


		    wp_enqueue_script( 'wssf-carousel-script', SMFB_PLUGIN_URL.'/public/scripts/owl-carousel/owl.carousel.js', array(), false, true );


		    wp_enqueue_style( 'wssf-carousel-styling', SMFB_PLUGIN_URL.'/public/scripts/owl-carousel/owl.carousel.css' );


		    wp_enqueue_style( 'wssf-carousel-theme', SMFB_PLUGIN_URL.'/public/scripts/owl-carousel/owl.theme.css' );


		    wp_enqueue_style( 'wssf-carousel-transitions', SMFB_PLUGIN_URL.'/public/scripts/owl-carousel/owl.transitions.css' );


		    wp_enqueue_script( 'smfb-g-font-selector', SMFB_PLUGIN_URL.'/js/g-font-family.js', array( 'jquery' ), false, true );


			wp_enqueue_script( 'smfb_pl_formDatabase_extension_script_enqueue', SMFB_PLUGIN_URL.'/integrations/form-builder-database'.'/table.js', array( 'jquery' ), false, true );


		}

	}



	if ($screen_id->id == 'pluginops_forms_page_page-builder-smfb-form-submissions') {

		wp_enqueue_script('jquery');

		wp_enqueue_script( 'jquery-ui-core' );

		wp_enqueue_script( 'jquery-ui-tooltip' );

		wp_enqueue_script( 'jquery-ui-slider' );

		wp_enqueue_script( 'jquery-ui-accordion' );

		wp_enqueue_script( 'jquery-ui-effects' );

		wp_enqueue_script( 'ppb_pl_formDatabase_extension_script_enqueue', SMFB_PLUGIN_URL.'/integrations/form-builder-database'.'/table.js', array( 'jquery' ), false, true );

		wp_enqueue_style( 'wssf-adminUI-styling', SMFB_PLUGIN_URL.'/styles/admin-style.css' );

		wp_enqueue_style( 'wssf-backbone-builder-jqueryUI-style', SMFB_PLUGIN_URL.'/js/Backbone-resources/jquery-ui.css' );

		wp_register_script( 'ppb_formSubmissonssAjaxScript', SMFB_PLUGIN_URL.'/admin/scripts/ajax/form-submissions-ajax.js', array( 'jquery' ), false, true );

		wp_localize_script(
			'ppb_formSubmissonssAjaxScript',
			'popb_admin_url_data',
			array( 
				'form_subbmissions_page' => admin_url().'edit.php?post_type=pluginops_forms&page=page-builder-smfb-form-submissions',
				'form_submissions_ajax_url' => admin_url('admin-ajax.php'),
				'pluginops_nonce' => $POPB_data_nonce
			)
		);

		wp_enqueue_script( 'ppb_formSubmissonssAjaxScript' );

	}




	wp_register_script( 'smfbExt_menu_old_forms_enqueue', SMFB_PLUGIN_URL.'/js/menu.js', array( 'jquery' ), false, true );

	if ( is_plugin_active('PluginOps-Optin-Builder-Extensions-Pack/extension-pack.php') || is_plugin_active('PluginOps-Extensions-Pack/extension-pack.php') ) {
	  	$smfb_extension_pack_active = 'true';
	}else{
		$smfb_extension_pack_active = 'false';
	}

	wp_localize_script( 'smfbExt_menu_old_forms_enqueue', 'smfb_oldf_site_url',  array( 'siteurl' => admin_url().'edit.php?post_type=subscribe_me_forms', 'premActive'=> $smfb_extension_pack_active, 'newformsurl' => admin_url().'edit.php?post_type=pluginops_forms', ) );

	wp_enqueue_script( 'smfbExt_menu_old_forms_enqueue' );

}

function deregister_unwanted_forced_scripts(){

	global $wp_scripts;
 	global $wp_styles;
 	global $pagenow;
	$screen_id = get_current_screen();

	$allowedStyles = array(
		'admin-bar',
		'colors',
		'dashicons',
		'wp-auth-check',
		'ie',
		'media-views',
		'imgareaselect',
		'a8c-wpcom-masterbar',
		'a8c-wpcom-masterbar-overrides',
		'a8c_wpcom_css_override',
		'noticons',
		'jetpack-icons',
		'jetpack-jitm-css',
		'wpcomsh-admin-style',
		'wpcom-notes-admin-bar',
		'colors',
		'smfb-backbone-builder-jqueryUI-style',
		'smfb-adminUI-styling',
		'smfb-adminUI-animations',
		'wssf-iris-picker-style',
		'smfb-faIconPicker-styling',
		'wssf-carousel-styling',
		'wssf-carousel-theme',
		'wssf-carousel-transitions',
		'smfb-pen-editor-js-style',
		'editor-buttons',
		'wp-color-picker',
		'editor-buttons'
	);

	$allowedScripts = array(
		'common',
		'admin-bar',
		'utils',
		'svg-painter',
		'wp-auth-check',
		'smfb_export_template_script_enqueue',
		'ppb_export_template_script_enqueue',
		'smfb_formDatabase_extension_script_enqueue',
		'ppb_pl_mailchimp_extension_script_enqueue',
		'jquery',
		'jquery-ui-core',
		'jquery-ui-tooltip',
		'jquery-ui-slider',
		'jquery-ui-accordion',
		'jquery-ui-autocomplete',
		'jquery-ui-datepicker',
		'jquery-ui-button',
		'jquery-ui-tabs',
		'jquery-ui-draggable',
		'jquery-ui-resizable',
		'jquery-ui-droppable',
		'jquery-ui-sortable',
		'jquery-ui-progressbar',
		'media-upload',
		'underscore',
		'backbone',
		'smfb_landingPage_initjs',
		'smfb_ajax_requests',
		'smfb-ui-checkbox',
		'smfb-backbone-builder-undo-script',
		'popb-ui-checkbox',
		'popb-builder-customUndo-script',
		'smfb-backbone-builder-collectionView',
		'smfb-backbone-builder-pbb-model-1',
		'smfb-backbone-builder-pbb-model-2',
		'smfb-backbone-builder-script-pageops-render',
		'smfb-backbone-builder-script-bb3',
		'smfb-backbone-builder-script-widget-render',
		'smfb-backbone-builder-script-row-view',
		'smfb-backbone-builder-script-widget-view',
		'smfb-backbone-builder-script-save-page',
		'smfb-backbone-builder-script-new-row',
		'smfb-backbone-builder-script-side-panel',
		'smfb-backbone-builder-script_collectionView',
		'smfb-builder-script_editor_initalize',
		'smfb-backbone-builder-script-bb4',
		'smfb_templates_pack_one_script_enqueue',
		'smfb-backbone-builder-script-pbb-drag-n-drop',
		'wssf-color-picker-script',
		'smfb-imgUpload-script',
		'smfb-faIconPicker-script',
		'smfb-countdown-script',
		'smfb-countdowntimezone-script',
		'smfb-countdowntzdata-script',
		'wssf-imageSliderWidget-script',
		'wssf-imageGalleryMasonry-script',
		'wssf-carousel-script',
		'smfb-g-font-selector',
		'smfb_pl_formDatabase_extension_script_enqueue',
		'smfb-pen-editor-js-script',
		'smfb-pen-editor-js-script-markdown',
		'smfbExt_menu_old_forms_enqueue',
		'media-editor',
		'media-audiovideo',
		'mce-view',
		'image-edit',
		'a8c_wpcom_masterbar_tracks_events',
		'a8c_wpcom_masterbar_overrides',
		'jetpack-jitm-new',
		'wpcom-notes-admin-bar',
		'wp-color-picker',
		'editor'
	);

	if ($screen_id->id == 'pluginops_forms_page_optin-builder-new-optin-page') {

	 	foreach ($wp_styles->queue as $key => $value) {

	 		if ( in_array($value, $allowedStyles) ) {
	 		}else{
	 			//wp_deregister_style($value);
	 		}

	 	}

	 	if (is_plugin_active( 'revslider/revslider.php' ) ) {
	 		
	 	}else{
	 		foreach ($wp_scripts->queue as $key => $value) {

		 		if ( in_array($value, $allowedScripts) ) {
		 		}else{
		 			wp_deregister_script($value);
		 		}
		 				
		 	}
	 	}

		 	

	}
}

function wssf_custom_UI_without_metabox($post){
	global $post;

	$screen_id = get_current_screen();
	
	if ($screen_id->post_type === 'pluginops_forms'){
		include_once(SMFB_PLUGIN_PATH.'/admin/views/UI/admin-ui-redirect.php');
	}
	
} /// wssf_custom_UI_without_metabox ends here


function remove_meta_boxes_all( $hidden, $screen, $use_defaults ){
    global $wp_meta_boxes;
    $cpt = 'pluginops_forms'; // Modify this to your needs!

    if( $cpt === $screen->id  && isset( $wp_meta_boxes[$cpt] ) )
    {
        $tmp = array();
        foreach( (array) $wp_meta_boxes[$cpt] as $context_key => $context_item )
        {
            foreach( $context_item as $priority_key => $priority_item )
            {
                foreach( $priority_item as $metabox_key => $metabox_item )
                    $tmp[] = $metabox_key;
            }
        }
        $hidden = $tmp;  // Override the current user option here.
    }
    return $hidden;
}


function ulpb_columns_admin($defaults) {
    $date = $defaults['date'];
    unset($defaults['date']);
    $defaults['ulpb_visitors']  = __('Impressions','mailchimp-subscribe-sm');

    $defaults['smfb_template_shortcode']  = __('Conversion Rate','mailchimp-subscribe-sm');

    $defaults['date'] = $date;

    return $defaults;
}


function ulpb_column_visitors_data($column_name, $post_ID) {
    if ($column_name == 'ulpb_visitors') {
        $current_count = get_post_meta($post_ID,'ulpb_page_views_counter',true);
        if (empty($current_count)) {
            $current_count = 0;
        }

        if ($current_count > 0) {
    		$current_count = $current_count / 2;
    	}

        $current_count = round( $current_count, 0 , PHP_ROUND_HALF_UP);
        echo "<div style='padding: 7px 10px 8px 31px;background: #fff;border: 1px solid #D2D2D2;border-radius: 3px;width: 20%; min-width:100px;font-weight: bold; font-size:12px;' >$current_count - Impressions </div>";
    }
}

function ulpb_global_rows_template_shortcode_column($column_name, $post_ID) {
    if ($column_name == 'smfb_template_shortcode') {
    	$current_count = get_post_meta($post_ID,'ulpb_page_views_counter',true);
    	$ssm_conversion_count = get_post_meta($post_ID,'ssm_conversion_count',true);

    	if ($current_count > 0) {
    		$current_count = $current_count / 2;
    	}
    	
    	
    	$conversionRate = 0;
    	if ($ssm_conversion_count > 0 && $current_count > 0) {
    		$conversionRate = ((int)$ssm_conversion_count / $current_count)*100;
        	$conversionRate =  round( $conversionRate, 2, PHP_ROUND_HALF_UP);
    	}

        echo "<div style='padding: 7px 0 8px 11px;background: #fff;border: 1px solid #D2D2D2;border-radius: 3px;width: 20%; min-width:250px;font-weight: bold; font-size:12px;' >
        		$conversionRate %
        	</div>";
    }
}



function smfb_template_shortcode($atts, $content){
   ob_start();
    
	  extract( shortcode_atts( array(

			'template_id' => '',
		), $atts ) );

	$template_id = $template_id;
	$showFormOn  =  'all';
	
	
	$isShortCodeTemplate = true;

	if (defined('SMFB_PLUGIN_PATH')) {
		
		if (! is_admin()) {
			include SMFB_PLUGIN_PATH.'public/templates/template.php';
		}

	}else{
		echo "PluginOps Optin Builder is not active";
	}
	

   return ob_get_clean();

}

function ulpb_template_popup_shortcode($atts, $content){
   ob_start();
    
	  extract( shortcode_atts( array(

			'template_id' => '',
			'delay'		  => '',
			'onscroll'	  => '',
			'onexit'	  => '',
			'onclick'	  => '',
			
		), $atts ) );

	$template_id = $template_id;
	$showFormOn  =  'all';
	$popupDisplayDelay = $delay;
	$popupDisplayOnScroll = $onscroll;
	$popupDisplayOnExit = $onexit;
	$popupDisplayOnClick = $onclick;
	
	
	$isShortCodeTemplate = true;
	$isPopUpTemplate = true;

	if (defined('SMFB_PLUGIN_PATH')) {
		
		if (! is_admin()) {
			include SMFB_PLUGIN_PATH.'public/templates/template.php';
		}

	}else{
		echo "PluginOps Optin Builder is not active";
	}
	

   return ob_get_clean();

}

function ulpb_template_popup_flyin_shortcode($atts, $content){
   ob_start();
    
	  extract( shortcode_atts( array(

			'template_id' => '',
			'delay'		  => '',
			'onscroll'	  => '',
			'onexit'	  => '',
			'onclick'	  => '',
			'position'	  => 'bRight',
			
		), $atts ) );

	$template_id = $template_id;
	$showFormOn  =  'all';
	$popupDisplayDelay = $delay;
	$popupDisplayOnScroll = $onscroll;
	$popupDisplayOnExit = $onexit;
	$popupDisplayOnClick = $onclick;
	$popupPosition = $position;

	
	
	$isShortCodeTemplate = true;
	$isPopUpFlyInTemplate = true;

	if (defined('SMFB_PLUGIN_PATH')) {
		
		if (! is_admin()) {
			include SMFB_PLUGIN_PATH.'public/templates/template.php';
		}

	}else{
		echo "PluginOps Optin Builder is not active";
	}
	

   return ob_get_clean();

}

function ulpb_template_popup_bar_shortcode($atts, $content){
   ob_start();
    
	  extract( shortcode_atts( array(

			'template_id' => '',
			'show_form_on'=>'all',
			'delay'		  => '',
			'onscroll'	  => '',
			'onexit'	  => '',
			'onclick'	  => '',
			'position'	  => '',
			
		), $atts ) );

	$template_id = $template_id;
	$showFormOn  =  $show_form_on;
	$popupDisplayDelay = $delay;
	$popupDisplayOnScroll = $onscroll;
	$popupDisplayOnExit = $onexit;
	$popupDisplayOnClick = $onclick;
	$popupPosition = $position;

	
	
	$isShortCodeTemplate = true;
	$isPopUpBarTemplate = true;

	if (defined('SMFB_PLUGIN_PATH')) {
		
		if (! is_admin()) {
			include SMFB_PLUGIN_PATH.'public/templates/template.php';
		}

	}else{
		echo "PluginOps Optin Builder is not active";
	}
	

   return ob_get_clean();

}

function ulpb_template_popup_full_page_shortcode($atts, $content){
   ob_start();
    
	  extract( shortcode_atts( array(

			'template_id' => '',
			'show_form_on'=>'all',
			'delay'		  => '',
			'onscroll'	  => '',
			'onexit'	  => '',
			'onclick'	  => '',
			
		), $atts ) );

	$template_id = $template_id;
	$showFormOn  =  $show_form_on;
	$popupDisplayDelay = $delay;
	$popupDisplayOnScroll = $onscroll;
	$popupDisplayOnExit = $onexit;
	$popupDisplayOnClick = $onclick;

	
	
	$isShortCodeTemplate = true;
	$isPopUpFullPageTemplate = true;

	if (defined('SMFB_PLUGIN_PATH')) {
		
		if (! is_admin()) {
			include SMFB_PLUGIN_PATH.'public/templates/template.php';
		}

	}else{
		echo "PluginOps Optin Builder is not active";
	}
	

   return ob_get_clean();

}



function ulpb_menupages_add(){

	//add_menu_page( 'PluginOps', __('PluginOps','mailchimp-subscribe-sm') , 'manage_options', 'pluginops', array($this,'ulpb_pageBuilder_dashboard_page'), $icon_url = SMFB_PLUGIN_URL.'/images/dashboard/page-builder-templates-icon.png', $position = null );


	add_submenu_page(
		'edit.php?post_type=pluginops_forms',
		__('Form Submissions','mailchimp-subscribe-sm'),
		__('Form Submissions','mailchimp-subscribe-sm'),
		'edit_pages',
		'page-builder-smfb-form-submissions',
		array($this,'ulpb_pageBuilder_form_submissions_page')
	);


	add_submenu_page(
			'edit.php?post_type=pluginops_forms',
			__('PluginOps Optin Builder','mailchimp-subscribe-sm'),
			__('Dashboard','mailchimp-subscribe-sm'),
			'manage_options',
			'page-builder-dashboard-smfb',
			array($this,'ulpb_pageBuilder_dashboard_page')
	);

	add_submenu_page(
			'edit.php?post_type=pluginops_forms',
			__('PluginOps Optin Extensions','mailchimp-subscribe-sm'),
			__('Go Pro','mailchimp-subscribe-sm'),
			'manage_options',
			'page-builder-extensions-smfb',
			array($this,'ulpb_pageBuilder_extensions_page')
	);

	add_submenu_page(
			'edit.php?post_type=pluginops_forms',
			__('Edit Optin Form','mailchimp-subscribe-sm'),
			__('Blank Page','mailchimp-subscribe-sm'),
			'manage_options',
			'optin-builder-new-optin-page',
			array($this,'ulpb_pageBuilder_new_landingpage')
	);

}


function ulpb_pageBuilder_new_landingpage(){
	include_once(SMFB_PLUGIN_PATH.'/admin/views/UI/admin-ui.php');
}

function ulpb_pageBuilder_form_submissions_page(){
	include_once(SMFB_PLUGIN_PATH.'/admin/views/Dashboard/form-submissions.php');
}

function ulpb_pageBuilder_dashboard_page(){
	include_once(SMFB_PLUGIN_PATH.'/admin/views/Dashboard/admin-dashboard.php');
}

function ulpb_pageBuilder_extensions_page(){
	include_once(SMFB_PLUGIN_PATH.'/admin/views/Dashboard/admin-extensions.php');
}



function ulpb_pagebuilder_content_filter($content){

	global $post;
	$currentPostType = get_post_type($post->ID);
	if($currentPostType == 'pluginops_formsaaa'){

		$content = '';
		
		$PopupShortcode = get_post_meta($post->ID, 'ULPB_Page_ShortCode', true);
		echo do_shortcode($PopupShortcode);
		
	}else{

		$smfb_auto_placement_data = get_option( 'smfb_autoplacement_options' );
		if (!is_array($smfb_auto_placement_data)) {
			$smfb_auto_placement_data = array();
			return do_shortcode( $content );
		}
		foreach ($smfb_auto_placement_data as $key => $valueA) {
			$campaignId = $key;
			$campaignStatus = get_post_status( $campaignId );
			$selectPages = false; $selectCategories = false; $entireWebsite = false; $allPages = false; $allPosts = false;

			if(!is_array($valueA)){
				continue;
			}

			if ($campaignStatus == 'publish' || $campaignStatus == 'draft' ) {
				if (isset($valueA['displayOn']) && is_array( $valueA['displayOn'] )) {
					foreach ($valueA['displayOn'] as $valueB) {
						switch ($valueB['value']) {
							case 'selectPages':
								$selectPages = true;
							break;
							case 'selectCategories':
								$selectCategories = true;
							break;
							case 'entireWebsite':
								$entireWebsite = true;
							break;
							case 'allPages':
								$allPages = true;
							break;
							case 'allPosts':
								$allPosts = true;
							break;

							default:
								
							break;
						}
					}
				}
				
				$thisOptinType = '';
				if ( isset($valueA['thisOptinType']) ) {
					$thisOptinType = $valueA['thisOptinType'];
				}

				if(is_array($valueA)){
					if (!isset($valueA['placeOptinAt']) || $valueA['placeOptinAt'] == null ) {
						$valueA['placeOptinAt'] = 'afterPost';
					}
				}
				

				if (!empty($valueA['selectCustomPages']) && $selectPages == true && $currentPostType == 'page') {
					$allSelectedPosts = explode(",", $valueA['selectCustomPages']);
					$current_Post_title = trim( get_the_title( $post->ID ) );
					foreach ($allSelectedPosts as $valueB) {
						$valueB = trim($valueB);
						$valueB = str_replace('&quot','"',$valueB);
						if ($valueB == $current_Post_title) {
							if ($thisOptinType == 'Inline') {
								if ( $valueA['placeOptinAt'] == 'afterPost' ) {
									$content = $content . "\n" . $valueA['generatedShortcode']."\n";
								}
								if ( $valueA['placeOptinAt'] == 'beforePost' ) {
									$content = $valueA['generatedShortcode']." <br> \n".$content."\n";
								}
							}

						}
					}
				}
				if (!empty($valueA['selectCustomPosts']) && $selectPages == true && $currentPostType == 'post') {
					$allSelectedPosts = explode(",", $valueA['selectCustomPosts']);
					$current_Post_title = trim( get_the_title( $post->ID ) );
					foreach ($allSelectedPosts as $valueB) {
						$valueB = trim($valueB);
						$valueB = str_replace('&quot','"',$valueB);
						if ($valueB == $current_Post_title) {

							if ($thisOptinType == 'Inline') {
								if ( $valueA['placeOptinAt'] == 'afterPost' ) {
									$content = $content . "\n" . $valueA['generatedShortcode']."\n";
								}
								if ( $valueA['placeOptinAt'] == 'beforePost' ) {
									$content = $valueA['generatedShortcode']." <br> \n".$content."\n";
								}
							}

						}
					}
				}
				if (!empty($valueA['selectCustomCats']) && $selectCategories == true && $currentPostType == 'post') {
					$allSelectedCats = explode(",", $valueA['selectCustomCats']);
					$current_Post_title = trim( get_the_title( $post->ID ) );
					foreach ($allSelectedCats as $valueB) {

						$valueB = trim($valueB);
						if (has_category($valueB, $post)) {

							if ($thisOptinType == 'Inline') {
								if ( $valueA['placeOptinAt'] == 'afterPost' ) {
									$content = $content . "\n" . $valueA['generatedShortcode']."\n";
								}
								if ( $valueA['placeOptinAt'] == 'beforePost' ) {
									$content = $valueA['generatedShortcode']." <br> \n".$content."\n";
								}
							}
							
						}
					}
				}

				if ($entireWebsite == true) {
					if ($thisOptinType == 'Inline') {
						if ( $valueA['placeOptinAt'] == 'afterPost' ) {
							$content = $content . "\n" . $valueA['generatedShortcode']."\n";
						}
						if ( $valueA['placeOptinAt'] == 'beforePost' ) {
							$content = $valueA['generatedShortcode']." <br> \n".$content."\n";
						}
					}
				}
				if ($allPages == true && $currentPostType == 'page') {
					if ($thisOptinType == 'Inline') {
						if ( $valueA['placeOptinAt'] == 'afterPost' ) {
							$content = $content . "\n" . $valueA['generatedShortcode']."\n";
						}
						if ( $valueA['placeOptinAt'] == 'beforePost' ) {
							$content = $valueA['generatedShortcode']." <br> \n".$content."\n";
						}
					}
				}
				if ($allPosts == true && $currentPostType == 'post') {
					if ($thisOptinType == 'Inline') {
						if ( $valueA['placeOptinAt'] == 'afterPost' ) {
							$content = $content . "\n" . $valueA['generatedShortcode']."\n";
						}
						if ( $valueA['placeOptinAt'] == 'beforePost' ) {
							$content = $valueA['generatedShortcode']." <br> \n".$content."\n";
						}
					}
				}

				
			} // Campaign Status Check
				
			
		} // foreach A ends here


		return do_shortcode( $content );
	}

}

function ulpb_pagebuilder_bodyOpen_filter(){

	global $post;

	if(isset($post->ID)){
		$currentPostType = get_post_type($post->ID);
	}else{
		$currentPostType = false;
	}


	if($currentPostType == 'pluginops_forms'){



		$content = '';
		
		$PopupShortcode = get_post_meta($post->ID, 'ULPB_Page_ShortCode', true);
		$PopupShortcode = str_replace("onclick", "onnone", $PopupShortcode);
		echo do_shortcode($PopupShortcode);
		
	}else{
		$content = '';
		$smfb_auto_placement_data = get_option( 'smfb_autoplacement_options' );
		if (!is_array($smfb_auto_placement_data)) {
			$smfb_auto_placement_data = array();
			echo do_shortcode( $content );
		}
		foreach ($smfb_auto_placement_data as $key => $valueA) {
			$campaignId = $key;
			$campaignStatus = get_post_status( $campaignId );
			$selectPages = false; $selectCategories = false; $entireWebsite = false; $allPages = false; $allPosts = false;

			if(!is_array($valueA)){
				continue;
			}

			if ($campaignStatus == 'publish' || $campaignStatus == 'draft' ) {
				if (isset($valueA['displayOn']) && is_array( $valueA['displayOn'] )) {
					foreach ($valueA['displayOn'] as $valueB) {
						switch ($valueB['value']) {
							case 'selectPages':
								$selectPages = true;
							break;
							case 'selectCategories':
								$selectCategories = true;
							break;
							case 'entireWebsite':
								$entireWebsite = true;
							break;
							case 'allPages':
								$allPages = true;
							break;
							case 'allPosts':
								$allPosts = true;
							break;

							default:
								
							break;
						}
					}
				}
				
				$thisOptinType = '';
				if ( isset($valueA['thisOptinType']) ) {
					$thisOptinType = $valueA['thisOptinType'];
				}

				if (!isset($valueA['placeOptinAt']) || $valueA['placeOptinAt'] == null ) {
					$valueA['placeOptinAt'] = 'afterPost';
				}

				if (!empty($valueA['selectCustomPages']) && $selectPages == true && $currentPostType == 'page') {
					$allSelectedPosts = explode(",", $valueA['selectCustomPages']);
					$current_Post_title = trim( get_the_title( $post->ID ) );
					foreach ($allSelectedPosts as $valueB) {
						$valueB = trim($valueB);
						if ($valueB == $current_Post_title) {
							if ($thisOptinType !== 'Inline') {
								$content = $valueA['generatedShortcode']."\n".$content;
							}

						}
					}
				}
				if (!empty($valueA['selectCustomPosts']) && $selectPages == true && $currentPostType == 'post') {
					$allSelectedPosts = explode(",", $valueA['selectCustomPosts']);
					$current_Post_title = trim( get_the_title( $post->ID ) );
					foreach ($allSelectedPosts as $valueB) {

						$valueB = trim($valueB);
						if ($valueB == $current_Post_title) {

							if ($thisOptinType !== 'Inline') {
								$content = $valueA['generatedShortcode']."\n".$content;
							}

						}
					}
				}
				if (!empty($valueA['selectCustomCats']) && $selectCategories == true && $currentPostType == 'post') {
					$allSelectedCats = explode(",", $valueA['selectCustomCats']);
					$current_Post_title = trim( get_the_title( $post->ID ) );
					foreach ($allSelectedCats as $valueB) {

						$valueB = trim($valueB);
						if (has_category($valueB, $post)) {

							if ($thisOptinType !== 'Inline') {
								$content = $valueA['generatedShortcode']."\n".$content;
							}
							
						}
					}
				}

				if ($entireWebsite == true) {

					if ($thisOptinType !== 'Inline') {
						$content = $valueA['generatedShortcode']."\n".$content;
					}

				}
				if ($allPages == true && $currentPostType == 'page') {

					if ($thisOptinType !== 'Inline') {
						$content = $valueA['generatedShortcode']."\n".$content;
					}

				}
				if ($allPosts == true && $currentPostType == 'post') {

					if ($thisOptinType !== 'Inline') {
						$content = $valueA['generatedShortcode']."\n".$content;
					}

				}
				
			} // Campaign Status Check
				

		} // foreach A ends here

		echo do_shortcode( $content );
	}

}


function ulpb_front_page_content_action(){

	global $post;
	if (isset($post)) {
		$currentPostType = get_post_type($post->ID);
	}else{
		$currentPostType = '';
	}
	

	if ( is_front_page() ) {
		$smfb_auto_placement_data = get_option( 'smfb_autoplacement_options' );
		if (!is_array($smfb_auto_placement_data)) {
			$smfb_auto_placement_data = array();
		}
		foreach ($smfb_auto_placement_data as $key => $valueA) {
			$campaignId = $key;
			$campaignStatus = get_post_status( $campaignId );

			if(!is_array($valueA)){
				continue;
			}

			if ($campaignStatus == 'publish' || $campaignStatus == 'draft' ) {
				$frontPageOnly = false;
				if (isset($valueA['displayOn']) && is_array($valueA['displayOn'])) {
					foreach ($valueA['displayOn'] as $valueB) {
						switch ($valueB['value']) {
							case 'frontPageOnly':
								$frontPageOnly = true;
							break;
							default:
								
							break;
						}
					}
				}
					
				$campaignId = $key;
				if ($frontPageOnly == true ) {
					echo do_shortcode( "\n ".$valueA['generatedShortcode']."\n" );
				}
			}
				
		} // foreach A ends here
	}
}













function pb_shortcode_sample_nav($atts, $content){
	if( current_user_can('editor') || current_user_can('administrator') ) {
	   ob_start();
	    
		  extract( shortcode_atts( array(

				'pb_menu' => '',
				'pb_logo_url' => '',
				'menucolor' => '',
				'menu_class' => '',
				'menu_font' => '',
				'menu_fonthovercolor' => '',
				'menu_fonthoverbgcolor' => '',
				'menu_fontsize' => '',
				
			), $atts ) );

		$menuName = $pb_menu;
		$pageLogoUrl = $pb_logo_url;
		$menuColor = $menucolor;
		$menufont = $menu_font;
		$menufontHoverColor = $menu_fonthovercolor;
		$menuFontHoverBgColor = $menu_fonthoverbgcolor;
		$menuFontSize = $menu_fontsize;

		switch ($menu_class) {
			case 'menu-style-1':
				include(SMFB_PLUGIN_PATH.'admin/views/menus/menu-style-1.php');
			break;
			case 'menu-style-2':
				include(SMFB_PLUGIN_PATH.'admin/views/menus/menu-style-2.php');
			break;
			case 'menu-style-3':
				include(SMFB_PLUGIN_PATH.'admin/views/menus/menu-style-3.php');
			break;
			case 'menu-style-4':
				include(SMFB_PLUGIN_PATH.'admin/views/menus/menu-style-4.php');
			break;
			default:
				include(SMFB_PLUGIN_PATH.'admin/views/menus/menu-style-1.php');
			break;
		}
		

		echo $this_widget_menu;
	   return ob_get_clean();

	}

}






} //class ends

?>