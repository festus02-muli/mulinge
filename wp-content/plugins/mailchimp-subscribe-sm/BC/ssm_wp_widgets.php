<?php
if ( ! defined( 'ABSPATH' ) ) exit;

class SSM_Form_Widget extends WP_Widget {



	function __construct() {
		parent::__construct(
			'ssm_form_widget', 
			__('PluginOps Optins', 'ssm_widget' ),
			array('description' => __( 'Optin Builder Widgets - Select your Optin form.', 'ssm_widget' ), )
		);
	}


	public function widget( $args, $instance ) {

		$title = apply_filters( 'widget_title', empty( $instance['title'] ) ? '' : $instance['title'], $instance, $this->id_base );

		echo $args['before_widget'];
		if ( ! empty( $title ) ) {
			echo $args['before_title'] . $title . $args['after_title'];
		}

		if ( ! empty( $instance['ssm_form_title'] ) ) {
			echo do_shortcode( '<div> [pluginops_form template_id='.$instance['ssm_form_title'].']  </div> ');
		}else{
			echo "Please select an optin from widget.";
		}

		echo $args['after_widget'];

	}


	public function form( $instance ) {
		$args = array(
			'posts_per_page'   => 99,
			'offset'           => 0,
			'orderby'          => 'date',
			'order'            => 'DESC',
			'post_type'        => 'pluginops_forms',
			'post_status'      => 'publish',
		);
		
		$subscribe_forms = get_posts( $args );
		$ssm_fieldname = $this->get_field_name( 'ssm_form_title' );

		if (!isset($instance['title'])) {
			$instance['title'] = '';
		}

		?>
		<p><label for="<?php echo esc_attr( $this->get_field_id( 'title' ) ); ?>"><?php esc_html_e( 'Title:', 'shortcode-widget' ); ?></label>
		<input class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'title' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'title' ) ); ?>" type="text" value="<?php echo esc_attr( $instance['title'] ); ?>" /></p>
		<br>
		<br>
		<label for="<?php echo $this->get_field_id( 'ssm_form_title' ); ?> ">Please select an optin : </label>
		<select  id="<?php echo $this->get_field_id( 'ssm_form_title' ); ?>" name="<?php echo $ssm_fieldname ?>" >
		<?php
		if (!isset($instance['ssm_form_title'])) {
			$instance['ssm_form_title'] = '';
		}
		foreach ($subscribe_forms as $form) {
			$currentID = $form->ID;
			$title = get_the_title($currentID);
		?>
		<option value="<?php echo($currentID); ?>" <?php selected($currentID , $instance['ssm_form_title']); ?>  > <?php echo $title ?> </option>
		<?php
		}
		echo "</select> <br> <br>";
	}


	public function update( $new_instance, $old_instance ) {
		$instance = array();

		$instance['title'] = ( ! empty( $new_instance['title'] ) ) ? strip_tags( $new_instance['title'] ) : '';

		$instance['ssm_form_title'] = ( ! empty( $new_instance['ssm_form_title'] ) ) ? strip_tags( $new_instance['ssm_form_title'] ) : '';

		return $instance;
	}

} 


function register_ssm_form_widget() {
    register_widget( 'SSM_Form_Widget' );
}
add_action( 'widgets_init', 'register_ssm_form_widget' );