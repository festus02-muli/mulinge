<div id="cont" class="wrap">

    <div id="logo">
        <img src="<?php echo esc_url( plugins_url('../imgs/optin-builder-logo.png', __FILE__ ) ) ?>" />
    </div>
    
    <div id="cols">
        
        <div id="optin-forms" class="col col-1">

            <div class="heading"><h3>Forms</h3></div>

            <div class="optin-content">

        <?php $forms = array_slice( $forms, 0, 5 );
	            $even_odd = true; ?>
        <?php if ( ! empty( $forms ) ): ?>  
                
        <table border="0" id="smf_forms_table">
		
		<tr>
			<th>Title</th>
			<th>Created</th>
			<th>Options</th>
		</tr>

		<?php  ?>
			
		<?php foreach ( $forms as $form  ): ?>

			<tr class='<?php if ( $even_odd ) echo 'even'; else echo 'odd';  ?>'>
            
				<td><a class="formtitle_link" href="<?php echo admin_url('post.php?post=' . $form->ID . '&action=edit' ) ?>"><strong><?php echo mb_strimwidth(get_the_title( $form->ID ), 0, 30, '...') ?></strong></a></td>
				
				
				<td><?php echo get_the_date( 'l, F j, Y', $form->ID  ); ?></td>
				<td class="wp_smf_options_width">
				<a id="slr_edit_form" href="#">
					<img alt="Edit" onclick="window.location='<?php echo admin_url('post.php?post=' . $form->ID . '&action=edit' ) ?>'" class="wp_smf_edit_img" src="<?php echo esc_url( plugins_url('../imgs/edit-form.png', __FILE__ ) ) ?>" />
				</a>/ 
				<a id="slr_delete_form" href="#">
					
					<img alt="Delete" class="wp_smf_delete_img" data-id="<?php echo intval($form->ID) ?>" src="<?php echo esc_url( plugins_url('../imgs/delete-form.png', __FILE__ ) ) ?>" />
				</a>
				
				</td>
			</tr>

		<?php if ( $even_odd ) $even_odd = false; else $even_odd = true; 
		endforeach; ?>
	
    </table>

	<p id="linkallforms"><a href="<?php echo admin_url('edit.php?post_type=pluginops_forms') ?>"><strong>View All forms</strong></a></p>

            <?php else: ?>
                
                <div id="noFormsMessage" style="text-align: center; margin-top: 20%">
				<h3>
					No forms. Click the + <a href="<?php echo admin_url('post-new.php?post_type=pluginops_forms') ?>">Add New</a> to create your first form.
				</h3>
			</div>

            <?php endif; ?>


            </div>

        </div>

        <div id="form-submissions" class="col col-2">

            <div class="heading"><h3>New Submissions<span class="counter"></span></h3></div>

			

			<?php if ( empty( $recentEntries ) ): ?>
				<div id="noFormsMessage" style="text-align: center; margin-top: 20%">
					<h3>

						No recent submissions or entries exist. 
					</h3>
			
				</div>
			
			<?php else: ?>

			<?php foreach ( $recentEntries as $entry ): ?>
				<div class="support-content">

				<p><a target="_blank" href="<?php echo admin_url('edit.php?post_type=pluginops_forms&page=page-builder-smfb-form-submissions&selectedPostID='.$entry['post_id']) ?>"><?php echo $entry["Form_Name"] . " - " . $entry["date"] ?></a></p>

				</div>

			<?php endforeach; ?>

			<?php endif; ?>
			

        </div>

        <div id="support-help" class="col col-3">

            <div class="heading"><h3>Support & Help</h3></div>

			<div class="support-content">

				<p><a target="_blank" href="http://bit.ly/2GoU5hr">PluginOps Optin Builder - Getting Started Basic Usage Guide</a></p>
				
				<p><a target="_blank" href="https://pluginops.com/docs/optin-builder-docs/">PluginOps Optin Builder - Documentation</a></p>

				<p><a target="_blank" href="https://www.youtube.com/watch?v=tL_x25OQ8Vg&feature=emb_title">[Video]How to create a custom popup with optin form</a></p>

				<p class="prem-notice"><a href="https://pluginops.com/optin-builder/" style="color: #e92868;font-size: large">Upgrade to Premium Version and Unlock Features & Top Priority Support</a></p>


			</div>

        </div>

    </div>

    <div id="ad">
        <a href="https://pluginops.com/optin-builder/"><img src="<?php echo esc_url( plugins_url('../imgs/banner.png', __FILE__ ) ) ?>" /></a>
    </div>

</div>

<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600&display=swap" rel="stylesheet">


<script>

	jQuery(document).ready(function($) {

		jQuery("a[href='edit.php?post_type=pluginops_forms']").hide();
		
		jQuery('.wp_smf_delete_img').click( function(e) {
			
			e.preventDefault();
			
			var id = jQuery(this).data('id');

			if ( confirm( "Click OK to delete this form" ) ) {
				
				jQuery.get( ajaxurl + "?action=pluginops_sm_delete_form&formId=" + id, function( data ) {
					location.reload();
				});

			}


		});

		

	})
		

</script>


<style>
	
	<?php

		if (function_exists('smfb_available_pro_widgets') || function_exists('ulpb_available_pro_widgets')) {
			
			echo "

				#ad{ display:none; }

				.prem-notice{ display:none; }

			";

		}

	?>


</style>
