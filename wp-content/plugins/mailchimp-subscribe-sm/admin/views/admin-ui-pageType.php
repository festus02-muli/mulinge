	<?php
	$checkPBactive = get_post_meta( $post->ID, 'ulpb_page_builder_active', 'true');
    $plugOps_pageBuilder_switch_nonce = wp_create_nonce( 'POPB_switch_nonce' );

	if ($checkPBactive === 'true') {
		echo '<div class="tab-editor switch_button">Switch to Editor</div>';
		?>
		<style type="text/css">
			#submitdiv,.wp-editor-expand,.fl-builder-admin{
				display: none !important;
			}
            .AdvancedOption{
                display: none;
            }
		</style>
		<?php 
	} else{
		echo '<div class="tab-pagebuilder switch_button">Switch to PluginOps Page Builder</div>';
	}
	?>
	<br><br><br> <br>
<script type="text/javascript">
    (function($){

    jQuery('.tab-pagebuilder').on('click', function(e)  {
        var submit_URl = "<?php echo admin_url('admin-ajax.php?action=smfb_activate_pb_request&page_id='.get_the_id().'&ulpbActivate=ActivatePB').'&POPB_Switch_Nonce='.$plugOps_pageBuilder_switch_nonce; ?>";
        var PBadmURL = "<?php echo admin_url(); ?>";
        var PB_ID = "<?php echo get_the_id(); ?>";
        var result = " ";
        $.ajax({
            url: submit_URl,
            method: 'get',
            data: '',
            success: function(result){
                if (result == 'Switched'){
                    window.location.href = PBadmURL+'post.php?post='+PB_ID+'&action=edit'; 
                }
            }
        });
         
        // Prevents default submission of the form after clicking on the submit button. 
        return false;   
    });

    jQuery('.tab-editor').on('click', function(e)  {

    	$('#SavePageOther').trigger('click');
        var submit_URl = "<?php echo admin_url('admin-ajax.php?action=smfb_activate_pb_request&page_id='.get_the_id().'ulpbActivate=DeactivatePB').'&POPB_Switch_Nonce='.$plugOps_pageBuilder_switch_nonce; ?>";
        var result = " ";
        $.ajax({
            url: submit_URl,
            method: 'get',
            data: '',
            success: function(result){
            	setTimeout(function(){
            		 location.reload();
            	}, 1600);
            }
        });
         
        // Prevents default submission of the form after clicking on the submit button. 
        return false;   
    });

})(jQuery);
</script>
<style type="text/css">
	.switch_button{
		margin-top:20px;
		text-decoration: none;
		background-color: #333;
	    border-radius: 3px;
	    border: none;
	    padding: 10px 20px 10px 20px;
	    color: #FFF;
	    font-size: 16px;
	    float: left;
	    cursor: pointer;
	}
</style>