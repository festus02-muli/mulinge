( function( $ ) {

if (isPub == "publish") { 
  var btn_text = "Update"; 
} else {var btn_text = "Update"; }

var PageStatus  = '<div style="margin:-35px 0 25px 0;"><label>Status :</label><select class="PbPageStatus"><option value="draft">Draft</option><option value="publish">Publish</option></select></div>';

$('#side-sortables').append('<div id="savePageSide">'+PageStatus+' <div id="SavePageOther" class="btn-green aligncenter large-btn">'+btn_text+'</div></div>');

$sideOptions = $('#sideOptions').html();
$('#side-sortables').append('<div style="min-height:275px; background:#fff; margin-top:25px; border: 3px dashed #7fc9fb;" class="AdvancedOption">'+$sideOptions+'</div>');


$('#side-sortables').append('<br><span style="font-size:15px"> Don\'t like this plugin ? Tell lazy developers to fix it :   <a href="https://wordpress.org/support/plugin/mailchimp-subscribe-sm" target="_blank"> Report an Issue </a></span>');

$('#side-sortables').append('<br> <br><span style="font-size:15px"> Love this plugin ? Post your love here :   <a href="https://wordpress.org/support/plugin/mailchimp-subscribe-sm/reviews/" target="_blank"> Send Some Love </a></span>');


$('#sideOptions').html(' ');

$('.switch').on('click',function(ev){
  var thisSwitch = $(ev.target).attr('class');
  var checkSwitch = $('.'+thisSwitch).attr('checked');
  if (checkSwitch == 'checked') {
  	$('.'+thisSwitch).removeAttr('checked');
  } else{
    $('.'+thisSwitch).attr('checked','checked');
  }
});

$(document).on('click','#SavePageOther',function(){
  $('.SavePage').trigger('click');
});




// $('body').append('<img class="SPopen-btn animated bounce" src="'+pluginURL+'/images/icons/play-left.png" title="Open Side Panel">');
// $('body').append('<img class="SPclose-btn" src="'+pluginURL+'/images/icons/play-right.png" title="Close Side Panel" >');

$('.SPopen-btn').on('click',function(){
	$('#postbox-container-1').removeClass('slideOutRight');
	$('#postbox-container-1').show(250);
	$('#postbox-container-1').show(100);
	$('.SPopen-btn').hide();
	$('.SPclose-btn').show();
	$('#postbox-container-1').one('webkitAnimationEnd mozAnimationEnd MSAnimationEnd oanimationend animationend', function(){
		$('#postbox-container-1').removeClass('slideInRight');
	} );
});

$('.SPclose-btn').on('click',function(){
	$('#postbox-container-1').hide(250);
	$('.SPclose-btn').hide();
	$('.SPopen-btn').show();
	$('#postbox-container-1').one('webkitAnimationEnd mozAnimationEnd MSAnimationEnd oanimationend animationend', function(){
		$('#postbox-container-1').removeClass('slideOutRight');
	} );
	$('#postbox-container-1').hide(1200);
});


$('#collapse-menu').trigger('click');



function stripHTMLFromShortCode(html) {
        html = html.replace(/<br>/g, "$br$");
        
        html = html.replace(/<div>/g, "$br$");
        
        html = html.replace(/(?:\r\n|\r|\n)/g, '$br$');
        
        var tmp = document.createElement("DIV");
        tmp.innerHTML = html;
        html = tmp.textContent || tmp.innerText;
        
        html = html.replace(/\$br\$/g, "<br>");
        
        return html;
}

$('.displayOn').on('change',function(){

  var displayOn = $('input[class="displayOn"]:checked').serialize();
  selectCategories = false;
  selectPages = displayOn.includes("selectPages");
  selectCategories = displayOn.includes("selectCategories");
  if (selectPages == true) {
    $('.selectedPagesDiv').css('display','block');
    $('.selectedPostsDiv').css('display','block');
  }else if(selectCategories == true){
    $('.selectedCatsDiv').css('display','block');
  }else{
    $('.selectedPagesDiv').css('display','none');
    $('.selectedPostsDiv').css('display','none');
    $('.selectedCatsDiv').css('display','none');
  }

});

var generatedcode = $('.generated_shortcode').html();
$('.generated_shortcode_displayed').text( stripHTMLFromShortCode(generatedcode) );
$('.shortcode_creator_form select').on('change',function(){
  var formType = $('.selectFormType').val();
  var hideCampaignOn = $('.hideCampaignOn').val();
  var formDisplayAction = $('.displayAction').val();
  var flyInPosition = $('.flyInPositioning').val();
  var barPosition = $('.barPositioning').val();

  var popUpEntranceAnimation = $('.popUpEntranceAnimation').val();
  var popUpExitAnimation = $('.popUpExitAnimation').val();

  $('.generated_shortcode_type').text(formType);
  $('.showFormOnAttr').text(hideCampaignOn);

  if (formType =='pluginops_form') {
    jQuery('.inlineSpecificOptions').css('display','block');
    jQuery('.hideOnInline').css('display','none');
  }else{
    jQuery('.inlineSpecificOptions').css('display','none');
    jQuery('.hideOnInline').css('display','block');
  }

  if (formType == 'pluginops_popup_form' || formType =='pluginops_flyin_form' || formType =='pluginops_bar_form' || formType =='pluginops_full_page_form') {
    $('.popupRelatedOptions').show();
    $('.shortcode_popup_action_attrs').text(shortcode_popup_action_attrs);
    $('.popUpAnimationsContainer').show();
    $('.animationsAttr').text("entranceanimation='"+popUpEntranceAnimation+"' " + "exitanimation='"+popUpExitAnimation+"'");
  }else{
    $('.popupRelatedOptions').hide();
    $('.shortcode_popup_action_attrs').text('');
    $('.popUpAnimationsContainer').hide();
    $('.animationsAttr').text(" ");
  }

  if (formType =='pluginops_flyin_form') {
    $('.flyInPositionContainer').show();
    $('.flyInPositionAttr').text("position='"+flyInPosition+"'");
  }else{
    $('.flyInPositionContainer').hide();
    $('.flyInPositionAttr').text(" ");
  }

  if (formType =='pluginops_bar_form') {
    $('.barPositionContainer').show();
    $('.barPositionAttr').text("position='"+barPosition+"'");
  }else{
    $('.barPositionContainer').hide();
    $('.barPositionAttr').text(" ");
  }



  if (formDisplayAction == 'delay') {
    $('.popupActionLabel').html('Popup Delay <span style="font-size:10px;">(Seconds)</span>');
    var displayActionValue = $('.displayActionValue').val();
    var shortcode_popup_action_attrs = " delay='"+displayActionValue+"' ";
    $('.actionTypeValue').show();
    $('.shortcode_popup_action_attrs').text(shortcode_popup_action_attrs);
    $('.displayActionValue').attr('type','number');
  }else if(formDisplayAction == 'scroll'){
    $('.popupActionLabel').html('Scroll Value <span style="font-size:10px;">(Percentage)</span>');
    var displayActionValue = $('.displayActionValue').val();
    var shortcode_popup_action_attrs = " onscroll='"+displayActionValue+"' ";
    $('.actionTypeValue').show();
    $('.shortcode_popup_action_attrs').text(shortcode_popup_action_attrs);
    $('.displayActionValue').attr('type','number');
  } else if(formDisplayAction == 'exit'){
    $('.popupActionLabel').html('Scroll Value <span style="font-size:10px;">(Percentage)</span>');
    var displayActionValue = $('.displayActionValue').val();
    var shortcode_popup_action_attrs = " onexit='true' ";
    $('.actionTypeValue').hide();
    $('.shortcode_popup_action_attrs').text(shortcode_popup_action_attrs);
  } else if(formDisplayAction == 'onClick'){
    $('.popupActionLabel').html('Element Id/Class');
    var displayActionValue = $('.displayActionValue').val();
    var shortcode_popup_action_attrs = " onclick='"+displayActionValue+"' ";
    $('.actionTypeValue').show();
    $('.shortcode_popup_action_attrs').text(shortcode_popup_action_attrs);
    $('.displayActionValue').attr('type','text');
  }
  else{
    $('.actionTypeValue').hide();
    $('.shortcode_popup_action_attrs').text('');
  }


  var generatedcode = $('.generated_shortcode').html();
  $('.generated_shortcode_displayed').text( stripHTMLFromShortCode(generatedcode) );
});

$(document).on('change','.shortcode_creator_form input',function(){
  var formType = $('.selectFormType').val();
  var displayActionValue = $('.displayActionValue').val();
  var formDisplayAction = $('.displayAction').val();

  if (formDisplayAction == 'delay') {
    formDisplayActionType = "delay"+"='"+displayActionValue+"' ";
  }else if(formDisplayAction == 'scroll'){
    formDisplayActionType = "onscroll"+"='"+displayActionValue+"' ";
  } else if(formDisplayAction == 'exit'){
    formDisplayActionType = "onexit"+"='true' ";
  } else if(formDisplayAction == 'onClick'){
    formDisplayActionType = "onclick"+"='"+displayActionValue+"' ";
  }
  else{
    formDisplayActionType = ' ';
  }

  var shortcode_popup_action_attrs = formDisplayActionType;
  if (formType !== 'pluginops_form') {
    $('.shortcode_popup_action_attrs').text(shortcode_popup_action_attrs);
  }else{
    $('.shortcode_popup_action_attrs').text('');
  }

  var generatedcode = $('.generated_shortcode').html();

  $('.generated_shortcode_displayed').text( stripHTMLFromShortCode(generatedcode) );

});

  
  $(document).ready(function(){
    try {

          function split( val ) {
            return val.split( /,\s*/ );
          }
          function extractLast( term ) {
            return split( term ).pop();
          }
       
          $( ".selectCustomPages" )
            .on( "keydown", function( event ) {
              if ( event.keyCode === $.ui.keyCode.TAB &&
                  $( this ).autocomplete( "instance" ).menu.active ) {
                event.preventDefault();
              }
            })
            .autocomplete({
              minLength: 0,
              source: function( request, response ) {
                response( $.ui.autocomplete.filter(
                  availablePages, extractLast( request.term ) ) );
              },
              focus: function() {
                return false;
              },
              select: function( event, ui ) {
                var terms = split( this.value );
                terms.pop();
                terms.push( ui.item.value );
                terms.push( "" );
                this.value = terms.join( ", " );
                return false;
              }
          });
          $( ".selectCustomPosts" )
            .on( "keydown", function( event ) {
              if ( event.keyCode === $.ui.keyCode.TAB &&
                  $( this ).autocomplete( "instance" ).menu.active ) {
                event.preventDefault();
              }
            })
            .autocomplete({
              minLength: 0,
              source: function( request, response ) {
                response( $.ui.autocomplete.filter(
                  availablePosts, extractLast( request.term ) ) );
              },
              focus: function() {
                return false;
              },
              select: function( event, ui ) {
                var terms = split( this.value );
                terms.pop();
                terms.push( ui.item.value );
                terms.push( "" );
                this.value = terms.join( ", " );
                return false;
              }
          });
          $( ".selectCustomCats" )
            .on( "keydown", function( event ) {
              if ( event.keyCode === $.ui.keyCode.TAB &&
                  $( this ).autocomplete( "instance" ).menu.active ) {
                event.preventDefault();
              }
            })
            .autocomplete({
              minLength: 0,
              source: function( request, response ) {
                response( $.ui.autocomplete.filter(
                  availableCats, extractLast( request.term ) ) );
              },
              focus: function() {
                return false;
              },
              select: function( event, ui ) {
                var terms = split( this.value );
                terms.pop();
                terms.push( ui.item.value );
                terms.push( "" );
                this.value = terms.join( ", " );
                return false;
              }
          });
      
      
    } catch(error) {
          console.log(error);
    }
    
  });
    

  $('#side-sortables').css({'width':'295px','margin':'0 auto'});
  
}( jQuery ) );