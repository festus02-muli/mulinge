<?php  if ( ! defined( 'ABSPATH' ) ) exit; 
$redirectLink = admin_url()."edit.php?post_type=pluginops_forms&page=optin-builder-new-optin-page&thisPostID=".$post->ID;
?>

<script type="text/javascript">
	location.href = '<?php echo "$redirectLink"; ?>';
</script>

<a href='<?php echo "$redirectLink"; ?>'> <div class="pb_fullScreenEditorButton" style="padding: 20px; color: rgb(255, 255, 255); background-color: rgb(78, 130, 255); margin: 100px auto 0px; text-align: center; max-width: 175px; font-size: 22px; cursor: pointer; border-bottom: 8px solid rgb(37, 75, 165); display: block;"> Enable Editor </div> </a>