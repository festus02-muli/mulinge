/*
Code Snippet from POST SMTP : https://wordpress.org/plugins/post-smtp/
License : GPL V2
*/
jQuery(document).ready(function($) {

	$( '#msfsm-plugin-deactivate-link' ).click(function(e) {
		e.preventDefault();

		var reason = $( '#MSFSM_feedback_form_container .MSFSM-reason' ),
			deactivateLink = $( this ).attr( 'href' );

	    $( "#MSFSM_feedback_form_container" ).dialog({
	    	title: 'PluginOps Feedback Form',
	    	dialogClass: '#MSFSM_feedback_form-form',
	      	resizable: false,
	      	minWidth: 400,
	      	minHeight: 300,
	      	modal: true,
	      	buttons: {	
	      		'go' : {
		        	text: 'Continue',
		        	id: 'MSFSM_feedback_form_go',
					class: 'button',
		        	click: function() {

		        		var dialog = $(this),
		        			go = $('#MSFSM_feedback_form_go'),
		          			form = dialog.find( 'form' ).serializeArray(),
							result = {};

						$.each( form, function() {
							if ( '' !== this.value )
						    	result[ this.name ] = this.value;										
						});

						if ( ! jQuery.isEmptyObject( result ) ) {
							result.action = 'msfm_send_user_feedback';
						    $.ajax({
						        url: MSFM_feedback_URL.admin_ajax,
						        type: 'POST',
						        data: result,
						        error: function(){},
						        success: function(msg){},
						        beforeSend: function() { 
						        	go.addClass('MSFSM-ajax-progress'); 
						        },
						        complete: function() { 
						        	go.removeClass('MSFSM-ajax-progress'); 
			        	
						        	dialog.dialog( "close" );
						            location.href = deactivateLink;
						        }
						    });		
	
						}


		        	},				      			
	      		},
	      		'cancel' : {
		        	text: 'Cancel',
		        	id: 'MSFSM_feedback_form-cancel',
		        	class: 'button button-primary',
		        	click: function() {
		          		$( this ).dialog( "close" );
		        	}				      			
	      		},
	      		'skip' : {
		        	text: 'Skip',
		        	id: 'MSFSM_feedback_form-skip',
		        	click: function() {
		          		$( this ).dialog( "close" );

		          		location.href = deactivateLink;
		        	}				      			
	      		},		      		
	      	}
	    });

		reason.change(function() {
			$( '.MSFSM-reason-input' ).hide();

			if ( $( this ).hasClass( 'MSFSM-custom-input' ) ) {
				$( '#MSFSM-deactivate-reasons' ).next( '.MSFSM-reason-input' ).show();
			}

			if ( $( this ).hasClass( 'MSFSM-support-input' ) ) {
				$( this ).find( '.MSFSM-reason-input' ).show();
			}			
		});
				    
	});
});