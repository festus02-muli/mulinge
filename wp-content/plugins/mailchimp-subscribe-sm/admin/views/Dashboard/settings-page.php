<?php if ( ! defined( 'ABSPATH' ) ) exit; 

?>

<h2> PluginOps Settings </h2>

<div class="settings-page-wrapper">
	<div class="pbp_form">
		<form id="ulpb_settings_form">
			<div style="display: inline-block; width:20%;">
				<h4>Select Supported Post Types </h4>
				<br>
			</div>
			<div style="display: inline-block; width:45%;">
			<br>
			<?php
				$selectedPostTypes = get_option( 'page_builder_SupportedPostTypes' );
				if (!is_array($selectedPostTypes)) {
					$selectedPostTypes = array();
				}
				$isChecked = ' ';
				foreach ( get_post_types( '', 'names' ) as $post_type ) {
					if ($post_type == 'ulpb_post' || $post_type == 'ulpb_global_rows' || $post_type == 'attachment' || $post_type == 'revision' || $post_type == 'nav_menu_item' || $post_type == 'customize_changeset' || $post_type == 'custom_css') {
					}else{
						if (in_array($post_type, $selectedPostTypes)) {
							$isChecked = 'checked';
						}
						echo '<label>  <input type="checkbox" name="selectedPostTypes[]" value="'.$post_type.'"  '.$isChecked.' class="checkboxInput  '.$isChecked.'">  '.$post_type .'<br>';

						$isChecked = ' ';
					}
				}

				$plugOps_pageBuilder_settings_nonce = wp_create_nonce( 'POPB_settings_nonce' );
			?>
			</div>
			<br>
			<br>
			<br>
			<br>
		</form>
		<button id="ulpb_settings_form_submit"  style="margin-left: 20%;">Save Changes</button>

		<p id="response"></p>
	</div>
	
</div>

<script type="text/javascript">
	(function($){

    $('#ulpb_settings_form_submit').on('click',function(){
         
        $('#response').text('Processing'); 
         
        var form = $('#ulpb_settings_form');
        $.ajax({
            url: "<?php echo admin_url('admin-ajax.php?action=smfb_settings_data&POPB_settings_page_nonce='.$plugOps_pageBuilder_settings_nonce ); ?>",
            method: 'post',
            data: form.serialize(),
            success: function(result){
                if (result == 'Success'){
                    $('#response').text(result);  
                }else {
                    $('#response').text(result);
                }
            }
        });
         
        return false;   
    });

})(jQuery);
</script>