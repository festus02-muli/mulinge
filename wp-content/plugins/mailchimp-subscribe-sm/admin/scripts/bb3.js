pageBuilderApp.isEditingPanelOpen = false;
function convertToCamelCase(str) {
    return str.replace(/(?:^|\s)\w/g, function(match) {
        return match.toUpperCase();
    });
}



function enabledraggableWidgets(){

  jQuery('.widget-Draggable').draggable({
    helper: function(event){
      var thisELE  = jQuery(event.currentTarget);
          
      var elMarigns  = thisELE.css('margin-top') + ' ' + thisELE.css('margin-right') + ' ' +thisELE.css('margin-bottom') + ' ' +thisELE.css('margin-left');

      return jQuery("<div class='widgetDragHelper' style=' padding: 15px; background: #95CDF8; border-radius: 100px; z-index:9998;'> <span class='dashicons dashicons-move' style='color:#fff;' title='Move'></span> </div>");
    }, 
    cursor: "move",
    appendTo: "#container",
    handle:'.widgetMoveHandle',
    start: function(event,ui){
      jQuery(this).draggable('instance').offset.click = {
        left: Math.floor(ui.helper.width() / 2) +15,
        top: Math.floor(ui.helper.height() / 2) +15
      }; 

      jQuery(event.target).attr('style','display:none;');
      jQuery('.isDroppedOnDroppable').val('false');
      jQuery(this).children('.draggableWidgets').trigger('click');
    },
    stop: function(event,ui){
      jQuery('.droppableBelowWidget').css('display','none');

      var isDroppedOnDroppable = jQuery('.isDroppedOnDroppable').val();

      if (isDroppedOnDroppable != 'true') {
        jQuery(event.target).attr('style','display:block;');
      }
    },

  });

}


function enableColumnDroppable(rowColContainerID){
  jQuery('#'+rowColContainerID+' .column').droppable({
    accept: ".widget-Draggable",
    snap:'.column',
    drop: function(){
      var curr_droppable = jQuery(this).attr('id');
      jQuery('.widgetDroppedAtIndex').val('');
      jQuery('.isDroppedOnDroppable').val('true');
      jQuery('#'+curr_droppable +' .wdgt-dropped').trigger('click');
    },
    over: function(){
      var curr_droppable = jQuery(this).attr('id');
      jQuery('#'+curr_droppable+ " .droppableEmptyColumn").slideDown(250);
    },
    out: function(){
      var curr_droppable = jQuery(this).attr('id');
      jQuery('#'+curr_droppable+ " .droppableEmptyColumn").css('display','none');
    }

  });
  
}

function resizeWindowOpen(){

  var selectedOptinType = pageBuilderApp.PageBuilderModel.get('optinType');
  tab1WidthL = {
      'width':'calc(65%)',
      'margin-left':'516px',
  };
  

  if (selectedOptinType == 'Fly In') {
    tab1WidthL = {
      'width':'calc(350px)',
    };
  }

  if (jQuery('.pageMaxWidth').val() != '' && jQuery('.pageMaxWidthU').val() != '') {
    tab1WidthL = {
      'width':jQuery('.pageMaxWidth').val()+jQuery('.pageMaxWidthU').val(),
      'margin-left':'516px',
    };
  }

  if (selectedOptinType == 'Bar' || selectedOptinType == 'Full Page') {
    tab1WidthL = {
      'width':'calc(100% - 416px)',
      'float':'right',
    };
  }
  
  var windowWidthMSF = jQuery( window ).width();
  var currentVPSPageOps = jQuery('.currentViewPortSize').val();
  var pageMaxWidth = parseInt(jQuery('.pageMaxWidth').val() ) ;
  var editorPanelWidth = 516; 
  pageMaxWidth = pageMaxWidth+editorPanelWidth;
  if (currentVPSPageOps == 'rbt-l') {

    if(windowWidthMSF > 1030){
      if(windowWidthMSF > pageMaxWidth ){
        jQuery('.pb_editor_tab_content #tab1').css(tab1WidthL);
      }

    }
    
  }

  pageBuilderApp.isEditingPanelOpen = true;
}

function resizeWindowClose(){

  var selectedOptinType = pageBuilderApp.PageBuilderModel.get('optinType');
  tab1WidthL = '65%';

  if (jQuery('.pageMaxWidth').val() != '' && jQuery('.pageMaxWidthU').val() != '') {

    tab1WidthL = jQuery('.pageMaxWidth').val()+jQuery('.pageMaxWidthU').val();

  }

  if (selectedOptinType == 'Fly In') {
    tab1WidthL = '350px';
  }
  if (selectedOptinType == 'Bar' || selectedOptinType == 'Full Page') {
    tab1WidthL = '100%';
  }

  var currentVPSPageOps = jQuery('.currentViewPortSize').val();
  if (currentVPSPageOps == 'rbt-l') {
    jQuery('.pb_editor_tab_content #tab1').css({
      width:tab1WidthL,
    });
    jQuery('.pb_editor_tab_content #tab1').css({
      'float':'unset'
    });

    jQuery('.pb_editor_tab_content #tab1').css({
      'margin':'0 auto'
    });
  }

  pageBuilderApp.isEditingPanelOpen = false;
}


function showWidgetOpsPanel(){
  jQuery('.columnWidgetPopup').show(50);
  jQuery('.editWidgetSaveButton').css('display','block');
  jQuery('.edit_row').hide(0);
  jQuery('.ulpb_row_controls').css('display','none');
}

function hideWidgetOpsPanel(){
  jQuery('.columnWidgetPopup').hide(50);
  jQuery('.editWidgetSaveButton').css('display','none');
}

( function( $ ) {


  jQuery(document).ready(function() {


    $('.tabAdvancedWidgetOptionsTab').on('click',function(){

      var thisWidgetIndex = pageBuilderApp.currentlyEditedWidgId;
      thisWidgetIndex = parseInt(thisWidgetIndex);
      $('#widgets li:nth-child('+(thisWidgetIndex+1)+')').children().children('.wdt-edit-controls').children('#updateWidgetAdvancedOps').trigger('click');

    });

    $('.thisColumnWidgetsTab').on('click',function(){

      $('#'+pageBuilderApp.currentlyEditedColId).children('.thisColumnWidgetsTabTrigger').trigger('click');
      
    });

  });

var liveEditorGlobal = {};
liveEditorGlobal.lastEditedEl = '';
liveEditorGlobal.multiFontArray = [];

$('.linkfieldBtn').on('click',function(ev){
  var clickedEl = $(this);
  if (clickedEl.is('span')) {
    if (clickedEl.hasClass('linkedBtn') ) {
      clickedEl.removeClass('linkedBtn');
    }else{
      clickedEl.addClass('linkedBtn');
    }
  }else{
    clickedEl = $(this).parent('span');
    if (clickedEl.hasClass('linkedBtn') ) {
      clickedEl.removeClass('linkedBtn');
    }else{
      clickedEl.addClass('linkedBtn');
    }
  }
});

$('.linkedField').on('change', function(ev){
  changedField = $(ev.target);
  var changeUpdatedAttr = $(changedField).attr('data-changeupdated');
  if (typeof(changeUpdatedAttr) == 'undefined') {
    changeUpdatedAttr = 'false';
  }
  if (changeUpdatedAttr == 'true') {
  }else{
    linkedBtn = changedField.siblings('.linkfieldBtn');
    if ( linkedBtn.hasClass('linkedBtn') ) {
      changedFieldVal = $(changedField).val();
      changedField.siblings('.linkedField').val(changedFieldVal);

      var siblings = changedField.siblings();
      $.each(siblings,function(i,v){
        $(v).val(changedFieldVal);
        $(v).attr('data-changeupdated','true');
        $(v).trigger('change');
      });
    }
  }
   
  $(changedField).attr('data-changeupdated','false'); 
});



/* ----------- Live Text Editor Starts Here -------------- */

  function getSelectionParentElement() {
      var parentEl = null, sel;
      if (window.getSelection) {
          sel = window.getSelection();
          if (sel.rangeCount) {
              parentEl = sel.getRangeAt(0).commonAncestorContainer;
              if (parentEl.nodeType != 1) {
                  parentEl = parentEl.parentNode;
              }
          }
      } else if ( (sel = document.selection) && sel.type != "Control") {
          parentEl = sel.createRange().parentElement();
      }
      return parentEl;
  }

  function applyStylesOnSelectedEl(action, value , el){

    if (action == 'bold') {
      if (value == true) {
        $(el).css('font-weight', 'bold');
      }else{
        $(el).css('font-weight', '');
      }
    }
    if (action == 'italic') {
      if (value == true) {
        $(el).css('font-style', 'italic');
      }else{
        $(el).css('font-style', '');
      }
    }
    if (action == 'underlined') {
      if (value == true) {
        $(el).css('text-decoration', 'underline');
      }else{
        tagName = $(el).prop('tagName');
        if (tagName == 'a' || tagName == 'A') {
          $(el).css('text-decoration', 'none');
        }else{
          $(el).css('text-decoration', '');
        }
      }
    }
    if (action == 'strike') {
      if (value == true) {
        $(el).css('text-decoration', 'line-through');
      }else{
        tagName = $(el).prop('tagName');
        if (tagName == 'a' || tagName == 'A') {
          $(el).css('text-decoration', 'none');
        }else{
          $(el).css('text-decoration', '');
        }
      }
    }
    parentElAlignment = $(el).parent().css('text-align');
    ispbTextWidget = false;
    if ( $(el).parent().hasClass('pb-text-widget') ) {
      ispbTextWidget = true;
    }
    pageBuilderApp.pbTextAlignment = false;

    if (action == 'alignLeft') {
      if (value == true) {
        $(el).css('text-align', 'left');
        if (ispbTextWidget == true) {
          pageBuilderApp.pbTextAlignment = 'left';
          $(el).parent().css('text-align', 'left');
        }
      }else{
        $(el).css('text-align', '');
      }
    }
    if (action == 'alignCenter') {
      if (value == true) {
        $(el).css('text-align', 'center');
        if (ispbTextWidget == true) {
          pageBuilderApp.pbTextAlignment = 'center';
          $(el).parent().css('text-align', 'center');
        }
      }else{
        $(el).css('text-align', '');
      }
    }
    if (action == 'alignRight') {
      if (value == true) {
        $(el).css('text-align', 'right');
        if (ispbTextWidget == true) {
          pageBuilderApp.pbTextAlignment = 'right';
          $(el).parent().css('text-align', 'right');
        }
      }else{
        $(el).css('text-align', '');
      }
    }

    if (action == 'fontTag') {
      oldStyles = $(el).attr('style');
      if (typeof(oldStyles) == 'undefined') {
        oldStyles = '';
      }
      tagCustomAttr = '';
      var editedElInnerHtml = el.innerHTML;
      if (typeof(editedElInnerHtml) == 'undefined') {
        editedElInnerHtml = $(el).text();
        oldStyles = $(el).html();
        oldStyles = $(oldStyles).attr('style');
        if (typeof(oldStyles) == 'undefined') {
          oldStyles = '';
        }
      }

      if (oldStyles == '' ) {
        if ( $(el).parents('.pb-text-widget').length ) {
           
          oldStyles = 'font-size:inherit; color:inherit; line-height:inherit; font-family:inherit;';
        }
          
      }

      if (value == 'a') { tagCustomAttr = 'href="#" '; }
      oldStyles = oldStyles.replace(/"/g,"");
      $(el).replaceWith( $('<'+value+'  '+tagCustomAttr+'  style="'+oldStyles+'" class="elLtWrapped" >' + editedElInnerHtml + '</'+value+'>') );
      $('.wltControls').html('');
      $('.liveEditorActive').siblings('.inlineEditingSaveTrigger ').trigger('click');
      $('.wltControls').removeClass('liveEditorActive');
    }
    if (action == 'fontSize') {
      if (value == '' || value == '0') {value = ''; }else{ value = value+'px'; }
      $(el).css('font-size', value);
    }
    if (action == 'fontLineHeight') {
      if (value == '' || value == '0') {value = ''; }else{ value = value+'px'; }
      $(el).css('line-height', value);
    }
    if (action == 'fontLSpace') {
      if (value == '' || value == '0') {value = ''; }else{ value = value+'px'; }
      $(el).css('letter-spacing', value);
    }
    if (action == 'fontColor') {
      $(el).css('color', value);
    }
    if (action == 'linkUrl') {
      tagName = $(el).prop('tagName');
      if (value == '') {  value='#'; }
      if (tagName == 'A' || tagName == 'a') {  $(el).attr('href',value);}
    }
    if (action == 'fontFamily') {
      if (value != '' && value != 'Select' && value != 'Arial' && value != 'Arial Black' && value != 'sans-serif' && value != 'Helvetica' && value != 'Serif' && value != 'Tahoma' && value != 'Verdana' && value != 'Monaco') {
        valuefClass = value.replace(/\+/g, '');
        fontScript = "<link rel='stylesheet' href='https://fonts.googleapis.com/css?family="+value+"' class=loadedfont-"+valuefClass+">";
        if ($('.loadedfont-'+valuefClass).length > 0 && value != 'Select') {}else{
          $(el).parents('.liveTextWrap').find('.ltwFontScript').append(fontScript);
        }
      }
      value = value.replace(/\+/g, ' ');
      if (value == 'Select') { value = ''; }
      $(el).css('font-family', value);
    }

  }

  function editSelectedTextHTML(action, value,modeOfChange) {

    var parentOfSelected = getSelectionParentElement();
    var htmlContents = $(parentOfSelected).html();
    
    try{
      var range = getSelection().getRangeAt(0);
      var contents = range.cloneContents();
      var selectionfound = true;
    } catch(err){
      var contents = '';
      var selectionfound = false;
    }

    var testSpanEl = document.createElement("span");
    testSpanEl.appendChild( contents );
    contents = $(testSpanEl).html();

    if ($(parentOfSelected).parents('.eltEditable').length > 0) {
    }else{
      return;
    }

    if ( $(parentOfSelected).hasClass('elLtWrapped') ) {
      
      if (htmlContents != contents) {
        if (contents == '') {
          applyStylesOnSelectedEl(action, value , parentOfSelected);
        }else{
          var childSpanEl = document.createElement("span");
          var range = getSelection().getRangeAt(0);
          childSpanEl.className = 'elLtWrapped';
          childSpanEl.appendChild(range.extractContents());
          range.insertNode(childSpanEl);
          applyStylesOnSelectedEl(action, value , childSpanEl);
          document.getSelection().removeAllRanges();
          $('.wltBold').prop('checked', false);
        }
      }else{
        applyStylesOnSelectedEl(action, value , parentOfSelected);
      }
    }else{
      if (contents == '') {
        $(parentOfSelected).addClass('elLtWrapped');
        applyStylesOnSelectedEl(action, value , parentOfSelected);
      }else{
        var childSpanEl = document.createElement("span");
        var range = getSelection().getRangeAt(0);
        childSpanEl.className = 'elLtWrapped';
        childSpanEl.appendChild(range.extractContents());
        range.insertNode(childSpanEl);
        applyStylesOnSelectedEl(action, value , childSpanEl);
        document.getSelection().removeAllRanges();
        
        if ( $('.wltBold').is(':checked') ) {
          $('.wltBold').trigger('click');
          $('.wltBold').prop('checked', false);
        }
      }
        
    }

  }

  function getSelectedTextHTML() {

    var parentOfSelected = getSelectionParentElement();
    var htmlContents = $(parentOfSelected).html();
    
    try{
      var range = getSelection().getRangeAt(0);
      var contents = range.cloneContents();
      var selectionfound = true;
    } catch(err){
      var contents = '';
      var selectionfound = false;
    }

    var testSpanEl = document.createElement("span");
    testSpanEl.appendChild( contents );
    contents = $(testSpanEl).html();

    if ($(parentOfSelected).parents('.eltEditable').length > 0) {
    }else{
      return;
    }

    if ( $(parentOfSelected).hasClass('elLtWrapped') ) {
      
      if (htmlContents != contents) {
        if (contents == '') {
          
        }else{
          var childSpanEl = document.createElement("span");
          var range = getSelection().getRangeAt(0);
          childSpanEl.className = 'elLtWrapped';
          childSpanEl.appendChild(range.extractContents());
          range.insertNode(childSpanEl);
          var parentOfSelected = childSpanEl;
        }
      }else{
        
      }
    }else{
      if (contents == '') {
        tagName = $(parentOfSelected).prop('tagName');
        tagName = tagName.toLowerCase();

        if (tagName == 'em' || tagName == 'B' || tagName == 'strong') {
          parentOfSelected = $(parentOfSelected).parent();
        }

        secondParentOfEl = $(parentOfSelected).parent();
        secondParenttagName = $(secondParentOfEl).prop('tagName');
        secondParenttagName = secondParenttagName.toLowerCase();

        if (secondParenttagName == 'h1' || secondParenttagName == 'h2' || secondParenttagName == 'h3' || secondParenttagName == 'h4' || secondParenttagName == 'h5' || secondParenttagName == 'h6' || secondParenttagName == 'p' || secondParenttagName == 'a') {
          parentOfSelected = secondParentOfEl;
        }

        $(parentOfSelected).addClass('elLtWrapped');
        
      }else{
        var childSpanEl = document.createElement("span");
        var range = getSelection().getRangeAt(0);
        childSpanEl.className = 'elLtWrapped';
        childSpanEl.appendChild(range.extractContents());
        range.insertNode(childSpanEl);
        var parentOfSelected = childSpanEl;
      }
        
    }


    return parentOfSelected;

  }

  function getStylesSelectedEl(){
    var parentOfSelected = getSelectionParentElement();
    var fontweight = '', fontstyle = '',textdecoration = '', tagName = '';

    if ( $(parentOfSelected).hasClass('elLtWrapped') ) {
      var fontweight = $(parentOfSelected).css('font-weight');
      var fontstyle = $(parentOfSelected).css('font-style');
      var textdecoration = $(parentOfSelected).css('text-decoration');
    }

    var alignmentVal = $(parentOfSelected).css('text-align');
    var tagName = $(parentOfSelected).prop("tagName");
    var fontSize = $(parentOfSelected).css("font-size");
    var lineHeight = $(parentOfSelected).css("line-height");
    var letterSpacing = $(parentOfSelected).css("letter-spacing");
    var fontColor = $(parentOfSelected).css("color");
    var fontFamily = $(parentOfSelected).css("font-family");
    var linkUrl = $(parentOfSelected).attr('href');

    var returnValue  = {
      fontweight : fontweight,
      fontstyle : fontstyle,
      textdecoration : textdecoration,
      tagName : tagName,
      fontSize:fontSize,
      lineHeight: lineHeight,
      letterSpacing: letterSpacing,
      fontColor: fontColor,
      fontFamily: fontFamily,
      alignment: alignmentVal,
      linkUrl: linkUrl
    }

    return returnValue;
  }


  $(document).on('click','.liveTextWrap',function(ev){
    thisControls  =  $(this).prev('.wltControls');
    var parentOfSelected = getSelectedTextHTML();
    liveEditorGlobal.lastEditedEl = parentOfSelected;
    $('.elLtWrapped').removeAttr('data-mce-style');
    $('.liveTextActive').removeClass('liveTextActive');
    $(this).addClass('liveTextActive');
    
    var currentClickedTextELPos = $(ev.target).position();
    $('.wltControls').css('top', currentClickedTextELPos.top - 60 );

    if ( thisControls.children('.wltInnerControls').length > 0 ) {
    }else{
      $('.wltControls').html('');
      $('.wltControls').removeClass('liveEditorActive');
      $(this).prev('.wltControls').append("<div class='wltInnerControls '> "+
        "<label for='wltBold' class='wltControlLabels '> <b>B</b> </label>"+
        "<input type='checkbox' id='wltBold' class='wltBold wlt_checkbox wlt-btn'  >"+
        "<label for='wltItalic' class='wltControlLabels '> <i>I</i> </label>"+
        "<input type='checkbox' id='wltItalic' class='wltItalic wlt_checkbox wlt-btn' >"+
        "<label for='wltUnderlined' class='wltControlLabels '> <span style='text-decoration: underline;'>U</span> </label>"+
        "<input type='checkbox' id='wltUnderlined' class='wltUnderlined wlt_checkbox wlt-btn'  >"+
        "<label for='wltStrike' class='wltControlLabels '> <span style='text-decoration: line-through;'>U</span> </label>"+
        "<input type='checkbox' id='wltStrike' class='wltStrike wlt_checkbox wlt-btn'  >"+
        "<label for='wltAlignLeft' class='wltControlLabels '> <span class='dashicons dashicons-editor-alignleft'></span> </label>"+
        "<input type='checkbox' id='wltAlignLeft' class='wltAlignLeft wlt_checkbox wlt-btn'  >"+
        "<label for='wltAlignCenter' class='wltControlLabels '> <span class='dashicons dashicons-editor-aligncenter'></span> </label>"+
        "<input type='checkbox' id='wltAlignCenter' class='wltAlignCenter wlt_checkbox wlt-btn'  >"+
        "<label for='wltAlignRight' class='wltControlLabels '> <span class='dashicons dashicons-editor-alignright'></span> </label>"+
        "<input type='checkbox' id='wltAlignRight' class='wltAlignRight wlt_checkbox wlt-btn'  >"+
        "<div class='wltDropdown'>"+
          "<div class='wltDTitle'><i class='fa fa-angle-double-down'></i></div>"+
          "<div class='wltDContent'> "+
            "<div class='wltDFields'> "+
              "<div class='wltdropContent-divide'> "+
                "<input class='wltFontFamily wltCInput' id='wltFontFamily'>"+
              "</div>"+
              "<div class='wltdropContent-divide'> "+
                "<label for='wltFontTag'> Typography </label>"+
                "<select class='wltCInput wltcSelect wltFontTag' id='wltFontTag' >"+
                  "<option value='p'>Paragraph</option>"+
                  "<option value='span'>Span (Inline)</option>"+
                  "<option value='a'>Link</option>"+
                  "<option value='h1' style='font-size:2.5em;'>H1 (XX Large)</option>"+
                  "<option value='h2' style='font-size:2em;'>H2 (X Large)</option>"+
                  "<option value='h3' style='font-size:1.7em;'>H3 (Large)</option>"+
                  "<option value='h4' style='font-size:1.5em;'>H4 (Medium)</option>"+
                  "<option value='h5' style='font-size:1.2em;'>H5 (Small)</option>"+
                  "<option value='h6' style='font-size:1em;'>H6 (V Small)</option>"+
                "</select> <br>"+
                "<div class='wltFontLinkContainer' style='display:none;'>"+
                  "<label for='wltFontLink'> Link URL </label>"+
                  "<input id='wltFontLink' class='wltFontLink wltCInput wltcSelect'>"+
                "</div>"+
                "<div class='wltdropContent-divide'>"+
                  "<label for='wltcFsize'> Size </label>"+
                  "<input type='number' class='wltcFsize wltCInput wltCIsmall' id='wltcFsize'> <br>"+
                  "<label for='wltcFcolor'> Color </label>"+
                  "<input type='text' class='color-picker_btn_two wltcFcolor' id='wltcFcolor'>"+
                "</div>"+
                "<div class='wltdropContent-divide'>"+
                  "<label for='wltcFlineHeight'> Line Height </label>"+
                  "<input type='number' class='wltcFlineHeight wltCInput wltCIsmall' id='wltcFlineHeight'><br>"+
                  "<label for='wltcLspacing'> Letter Space </label>"+
                  "<input type='number' class='wltcLspacing wltCInput wltCIsmall' id='wltcLspacing'>"+
                "</div>"+
              " </div>"+
            "</div> "+
          " </div> "+
        "</div>"+
      " </div>");

      $('.wltcFcolor').spectrum({ showButtons: false, showAlpha: false, showInput: true, move: function(tinycolor){ var field_id = $(this).attr('id');  $('#'+field_id).val( tinycolor.toRgbString() );  $('#'+field_id).trigger('change'); }, });

      $('.wltFontFamily').fontselect({
        style: 'font-select',
        placeholder: 'Select a font',
        placeholderSearch: 'Search...',
        lookahead: 1,
        searchable: true,
        localFontsUrl: '/fonts/' // End with a slash!
      });

      $(this).prev('.wltControls').addClass('liveEditorActive');
      $('.wlt_checkbox').checkboxradio({
          icon: false
      });

      $('.widgetHandle').css('display','none');
      $('.editColBtnTop').css('display','none'); 

      $(' .wltControls ').on('mouseover',function(){
        $('.widgetHandle').css('display','none');
        $('.editColBtnTop').css('display','none');
      });

      $('body').on('click', function(evta){

        if ($(evta.target).parents('.liveTextActive').length > 0 || $(evta.target).parents('.wltControls').length > 0){
        }else{
          liveEditorGlobal.lastEditedEl = '';
          $('.wltControls').html('');
          $('.liveEditorActive').siblings('.inlineEditingSaveTrigger ').trigger('click');
          $('.wltControls').removeClass('liveEditorActive');
          $('.liveTextActive').removeClass('liveTextActive');

        }
        
      });

    }

    var thisSelectedStyles = getStylesSelectedEl();
    if (thisSelectedStyles['fontweight'] == '700' && $('.wltBold').is(':checked') != true ) { 
      $('.wltBold').prev('label').addClass('ui-checkboxradio-checked ui-state-active');
      $('.wltBold').prop('checked', true); 
    }else if (thisSelectedStyles['fontweight'] != '700' && $('.wltBold').is(':checked') == true ) {
      $('.wltBold').prev('label').removeClass('ui-checkboxradio-checked ui-state-active');
      $('.wltBold').prop('checked', false);
    }

    if (thisSelectedStyles['fontstyle'] == 'italic' && $('.wltItalic').is(':checked') != true ) { 
      $('.wltItalic').prev('label').addClass('ui-checkboxradio-checked ui-state-active');
      $('.wltItalic').prop('checked', true); 
    }else if (thisSelectedStyles['fontstyle'] != 'italic' && $('.wltItalic').is(':checked') == true ) {
      $('.wltItalic').prev('label').removeClass('ui-checkboxradio-checked ui-state-active');
      $('.wltItalic').prop('checked', false);
    }

    textdecorationvalue = thisSelectedStyles['textdecoration'].indexOf('underline', 0);
    textstrikevalue = thisSelectedStyles['textdecoration'].indexOf('line-through', 0);

    if (textdecorationvalue != -1 && $('.wltUnderlined').is(':checked') != true ) { 
      $('.wltUnderlined').prev('label').addClass('ui-checkboxradio-checked ui-state-active');
      $('.wltUnderlined').prop('checked', true); 
    }else if (textdecorationvalue == -1 && $('.wltUnderlined').is(':checked') == true ) {
      $('.wltUnderlined').prev('label').removeClass('ui-checkboxradio-checked ui-state-active');
      $('.wltUnderlined').prop('checked', false);
    }


    if (textstrikevalue != -1 && $('.wltStrike').is(':checked') != true ) { 
      $('.wltStrike').prev('label').addClass('ui-checkboxradio-checked ui-state-active');
      $('.wltStrike').prop('checked', true); 
    }else if (textstrikevalue == -1 && $('.wltStrike').is(':checked') == true ) {
      $('.wltStrike').prev('label').removeClass('ui-checkboxradio-checked ui-state-active');
      $('.wltStrike').prop('checked', false);
    }

    
    if (thisSelectedStyles['alignment'] != '' && typeof(thisSelectedStyles['alignment']) != 'undefined') {
      $('.wltAlignLeft').prev('label').removeClass('ui-checkboxradio-checked ui-state-active');
      $('.wltAlignLeft').prop('checked', false);
      $('.wltAlignCenter').prev('label').removeClass('ui-checkboxradio-checked ui-state-active');
      $('.wltAlignCenter').prop('checked', false);
      $('.wltAlignRight').prev('label').removeClass('ui-checkboxradio-checked ui-state-active');
      $('.wltAlignRight').prop('checked', false);

      if (thisSelectedStyles['alignment'] == 'left') {
        $('.wltAlignLeft').prev('label').addClass('ui-checkboxradio-checked ui-state-active');
        $('.wltAlignLeft').prop('checked', true);     
      }
      if (thisSelectedStyles['alignment'] == 'center') {
        $('.wltAlignCenter').prev('label').addClass('ui-checkboxradio-checked ui-state-active');
        $('.wltAlignCenter').prop('checked', true);     
      }
      if (thisSelectedStyles['alignment'] == 'right') {
        $('.wltAlignRight').prev('label').addClass('ui-checkboxradio-checked ui-state-active');
        $('.wltAlignRight').prop('checked', true);     
      }
      
    }
    if (thisSelectedStyles['tagName'] != '' && typeof(thisSelectedStyles['tagName']) != 'undefined') {
      $('.wltFontTag').val( thisSelectedStyles['tagName'].toLowerCase() );
      if (thisSelectedStyles['tagName'] == 'a' || thisSelectedStyles['tagName'] == 'A') {
        $('.wltFontLinkContainer').css('display','block');
        if (thisSelectedStyles['linkUrl'] != '' && typeof(thisSelectedStyles['linkUrl']) != 'undefined') {
          $('.wltFontLink').val( thisSelectedStyles['linkUrl'] );
        }
      }else{
        $('.wltFontLinkContainer').css('display','none');
        $('.wltFontLink').val( '' );
      }
    }

    if (thisSelectedStyles['fontSize'] != '' && typeof(thisSelectedStyles['fontSize']) != 'undefined') {
      $('.wltcFsize').val( thisSelectedStyles['fontSize'].replace("px", "") );
    }

    if (thisSelectedStyles['lineHeight'] != '' && typeof(thisSelectedStyles['lineHeight']) != 'undefined') {
      pxLineHeight = parseInt(thisSelectedStyles['lineHeight'] ,10);
      $('.wltcFlineHeight').val( pxLineHeight );
    }
    if (thisSelectedStyles['letterSpacing'] != '' && typeof(thisSelectedStyles['letterSpacing']) != 'undefined') {
      pxletterSpace = parseInt(thisSelectedStyles['letterSpacing'] ,10);
      $('.wltcLspacing').val( pxletterSpace );
    }
    if (thisSelectedStyles['fontColor'] != '' && typeof(thisSelectedStyles['fontColor']) != 'undefined') {
      $('.wltcFcolor').val( thisSelectedStyles['fontColor'] );
      $('.wltcFcolor').spectrum( 'set', $('.wltcFcolor').val() );
    }
    if (thisSelectedStyles['fontFamily'] != '' && typeof(thisSelectedStyles['fontFamily']) != 'undefined') {
      $('.wltFontFamily').val( thisSelectedStyles['fontFamily'] );
      var fontvalue = thisSelectedStyles['fontFamily'].replace(/\+/g, ' ');
      $('.'+'wltFontFamily').siblings('.font-select').children('a').children('.font_select_placeholder').css('font-family','Arial');
      fontvalue = fontvalue.replace(/"/g, '');
      $('.'+'wltFontFamily').siblings('.font-select').children('a').children('.font_select_placeholder').html(fontvalue);

      $('.wltFontFamily').next('.font-select').find('.fs-drop').css('display','block');

      /*
      var thisFsResults = $('.wltFontFamily').next('.font-select').find('.fs-results');
      $(thisFsResults).animate({
        scrollTop: 0
      }, 0);
      $(thisFsResults).find('li:contains("'+fontvalue+'")').addClass('active');
      var scrollToEl = $(thisFsResults).find('li:contains("'+fontvalue+'")');
      if ($(scrollToEl).length > 0 ) {
        var childPos = scrollToEl.offset();
        var parentPos = thisFsResults.parent().offset();
        var childOffset = {
            top: childPos.top - parentPos.top,
            left: childPos.left - parentPos.left
        }
        $(thisFsResults).animate({
          scrollTop: childOffset.top-40
        });
      }
      */
        
    }
  });



  $(document).on('click','.wlt-btn',function(ev){

    if ($(this).hasClass('wltBold')) {  applyStylesOnSelectedEl('bold', $('.wltBold').is(':checked'), liveEditorGlobal.lastEditedEl );  }
    
    if ($(this).hasClass('wltItalic')) { applyStylesOnSelectedEl('italic', $('.wltItalic').is(':checked'), liveEditorGlobal.lastEditedEl ); }

    if ($(this).hasClass('wltUnderlined')) { applyStylesOnSelectedEl('underlined', $('.wltUnderlined').is(':checked'), liveEditorGlobal.lastEditedEl ); }

    if ($(this).hasClass('wltStrike')) { applyStylesOnSelectedEl('strike', $('.wltStrike').is(':checked'), liveEditorGlobal.lastEditedEl ); }

    if ($(this).hasClass('wltAlignLeft')) { 
      applyStylesOnSelectedEl('alignLeft', $('.wltAlignLeft').is(':checked'), liveEditorGlobal.lastEditedEl );
      $('.wltAlignCenter').prev('label').removeClass('ui-checkboxradio-checked ui-state-active');
      $('.wltAlignCenter').prop('checked', false);
      $('.wltAlignRight').prev('label').removeClass('ui-checkboxradio-checked ui-state-active');
      $('.wltAlignRight').prop('checked', false);
    }

    if ($(this).hasClass('wltAlignCenter')) { 
      applyStylesOnSelectedEl('alignCenter', $('.wltAlignCenter').is(':checked'), liveEditorGlobal.lastEditedEl ); 
      $('.wltAlignLeft').prev('label').removeClass('ui-checkboxradio-checked ui-state-active');
      $('.wltAlignLeft').prop('checked', false);
      $('.wltAlignRight').prev('label').removeClass('ui-checkboxradio-checked ui-state-active');
      $('.wltAlignRight').prop('checked', false);
    }

    if ($(this).hasClass('wltAlignRight')) { 
      applyStylesOnSelectedEl('alignRight', $('.wltAlignRight').is(':checked'), liveEditorGlobal.lastEditedEl ); 
      $('.wltAlignLeft').prev('label').removeClass('ui-checkboxradio-checked ui-state-active');
      $('.wltAlignLeft').prop('checked', false);
      $('.wltAlignCenter').prev('label').removeClass('ui-checkboxradio-checked ui-state-active');
      $('.wltAlignCenter').prop('checked', false);
    }
  });

  $(document).on('change','.wltCInput',function(ev){
    if ($(this).hasClass('wltFontTag')) {  applyStylesOnSelectedEl('fontTag', $('.wltFontTag').val() , liveEditorGlobal.lastEditedEl );  }
    if ($(this).hasClass('wltcFsize')) {  applyStylesOnSelectedEl('fontSize', $('.wltcFsize').val(), liveEditorGlobal.lastEditedEl );  }
    if ($(this).hasClass('wltcFlineHeight')) {  applyStylesOnSelectedEl('fontLineHeight', $('.wltcFlineHeight').val(), liveEditorGlobal.lastEditedEl );  }
    if ($(this).hasClass('wltcLspacing')) {  applyStylesOnSelectedEl('fontLSpace', $('.wltcLspacing').val(), liveEditorGlobal.lastEditedEl );  }
    if ($(this).hasClass('wltFontFamily')) {  applyStylesOnSelectedEl('fontFamily', $('.wltFontFamily').val(), liveEditorGlobal.lastEditedEl );  }

    if ($(this).hasClass('wltFontLink')) {  applyStylesOnSelectedEl('linkUrl', $('.wltFontLink').val(), liveEditorGlobal.lastEditedEl );  }
  });


  $(document).on('change','.wltcFcolor',function(ev){
    if ($(this).hasClass('wltcFcolor')) {  applyStylesOnSelectedEl('fontColor', $('.wltcFcolor').val(), liveEditorGlobal.lastEditedEl );  }
  });


  $(document).on('click','.wltDTitle',function(){
    if (  $('.wltDTitle').hasClass('dropdownActive') ) {
      $('.wltDContent').css('display','none');
      $('.wltDTitle').removeClass('dropdownActive');
    }else{
      $('.wltDContent').css('display','block');
      $('.wltDTitle').addClass('dropdownActive');

      var fontvalue = $('.'+'wltFontFamily').siblings('.font-select').children('a').children('.font_select_placeholder').html();
      var thisFsResults = $('.wltFontFamily').next('.font-select').find('.fs-results');
      $(thisFsResults).animate({
        scrollTop: 0
      }, 0);
      $(thisFsResults).find('li:contains("'+fontvalue+'")').addClass('active');
      var scrollToEl = $(thisFsResults).find('li:contains("'+fontvalue+'")');
      if ($(scrollToEl).length > 0 ) {
        var childPos = scrollToEl.offset();
        var parentPos = thisFsResults.parent().offset();
        var childOffset = {
            top: childPos.top - parentPos.top,
            left: childPos.left - parentPos.left
        }
        $(thisFsResults).animate({
          scrollTop: childOffset.top-40
        });
      }

    }
    
  });



  $('.widgetTextTag').on('change',function(){
    if ( $(this).val() == 'a' ) {
      $('.linkOpsDiv').css('display','block');
    }else{
      $('.linkOpsDiv').css('display','none');
    }
  });

/* ----------- Live Text Editor Ends Here -------------- */





$('.widgetAnimateBtn').on('click',function(){
  currentSelectedAnimation = $('.widgetAnimation').val();
  $('#'+pageBuilderApp.currentlyEditedColId+' '+'.widget-'+pageBuilderApp.currentlyEditedWidgId).addClass('animated '+currentSelectedAnimation);
});

$('.openPageOpsBtn').on('click',function(){
  resizeWindowOpen();
  $('.pageops_modal').show(50);
});

$('.closePageOpsBtn').on('click',function(){

  $('.pageBgImage').trigger('change');

  $('.pageops_modal').hide(50);
  resizeWindowClose();
});

$('.pageOpsField').on('change',function(){
  
  var pageBgImage = $('.pageBgImage').val();
  var pageBgColor = $('.pageBgColor').val();
  var pagePaddingTop = $('.pagePaddingTop').val();
  var pagePaddingBottom = $('.pagePaddingBottom').val();
  var pagePaddingLeft = $('.pagePaddingLeft').val();
  var pagePaddingRight = $('.pagePaddingRight').val(); 
  var POPBDefaultsEnable = $('.POPBDefaultsEnable').val(); 
  if ($('.pb_fullScreenEditorButton').hasClass('EditorActive') ) {
    displayEditor = 'display:block;';
  }else{
    displayEditor = 'display:none;';
  }

  var selectedOptinType = pageBuilderApp.PageBuilderModel.get('optinType');
  pbWrapperHeight = '';
  if (selectedOptinType == 'Full Page') {
    pbWrapperHeight = 'height:95vh;';
  }

  $('#pbWrapper').css({
      'padding-top': pagePaddingTop+'%',
      'padding-bottom': pagePaddingBottom+'%',
      'padding-left': pagePaddingLeft+'%',
      'padding-right': pagePaddingRight+'%',
      'background-image' : 'url("'+pageBgImage+'")',
      'background-size': 'cover',
      'background-color' : pageBgColor,
      'display':'block',
      'height':pbWrapperHeight,
  });

  var currentVPSPageOps = $('.currentViewPortSize').val();
    if (currentVPSPageOps == 'rbt-l') {
      $('#pbWrapper').css({
        'padding-top': $('.pagePaddingTop').val()+'%',
        'padding-bottom':$('.pagePaddingBottom').val()+'%',
        'padding-left':$('.pagePaddingLeft').val()+'%',
        'padding-right':$('.pagePaddingRight').val()+'%',
      });

      if ( $('.pageMaxWidth').val() != '' && $('.pageMaxWidthU').val() != '' ) {
        jQuery('.pb_editor_tab_content #tab1').css({
          'width': $('.pageMaxWidth').val() + $('.pageMaxWidthU').val() ,
        });
      }
        
    }

    if (currentVPSPageOps == 'rbt-m') {
      $('#pbWrapper').css({
        'padding-top': $('.pagePaddingTopTablet').val()+'%',
        'padding-bottom':$('.pagePaddingBottomTablet').val()+'%',
        'padding-left':$('.pagePaddingLeftTablet').val()+'%',
        'padding-right':$('.pagePaddingRightTablet').val()+'%',
      });

      if ( $('.pageMaxWidthT').val() != '' && $('.pageMaxWidthUT').val() != '' ) {
        jQuery('.pb_editor_tab_content #tab1').css({
          'width': $('.pageMaxWidthT').val() + $('.pageMaxWidthUT').val() ,
        });
      }

    }

    if (currentVPSPageOps == 'rbt-s') {
      $('#pbWrapper').css({
        'padding-top': $('.pagePaddingTopMobile').val()+'%',
        'padding-bottom':$('.pagePaddingBottomMobile').val()+'%',
        'padding-left':$('.pagePaddingLeftMobile').val()+'%',
        'padding-right':$('.pagePaddingRightMobile').val()+'%',
      });

      if ( $('.pageMaxWidthM').val() != '' && $('.pageMaxWidthUM').val() != '' ) {
        jQuery('.pb_editor_tab_content #tab1').css({
          'width': $('.pageMaxWidthM').val() + $('.pageMaxWidthUM').val() ,
        });
      }

    }



  if (POPBDefaultsEnable == 'true') {

    var POPB_typefaces =  {
      typefaceHOne:$('.typefaceHOne').val(),
      typefaceHTwo:$('.typefaceHTwo').val(),
      typefaceParagraph:$('.typefaceParagraph').val(),
      typefaceButton:$('.typefaceButton').val(),
      typefaceAnchorLink:$('.typefaceAnchorLink').val()
    };

    var POPB_typeSizes = {
      typeSizeHOne:$('.typeSizeHOne').val(),
      typeSizeHTwo:$('.typeSizeHTwo').val(),
      typeSizeParagraph:$('.typeSizeParagraph').val(),
      typeSizeButton:$('.typeSizeButton').val(),
      typeSizeAnchorLink:$('.typeSizeAnchorLink').val(),
    };

    $('#fontLoaderContainer').html('<link rel="stylesheet"href="https://fonts.googleapis.com/css?family='+POPB_typefaces['typefaceHOne']+'|'+POPB_typefaces['typefaceHTwo']+'|'+POPB_typefaces['typefaceParagraph']+'|'+POPB_typefaces['typefaceButton']+'|'+POPB_typefaces['typefaceAnchorLink']+' ">');

          var POPBGlobalStylesTag = '\n'+

            '#pbWrapper h1 { font-family:'+POPB_typefaces['typefaceHOne'].replace(/\+/g, ' ')+'; font-size:'+POPB_typeSizes['typeSizeHOne']+'px; }  \n'+

            '#pbWrapper h2 { font-family:'+POPB_typefaces['typefaceHTwo'].replace(/\+/g, ' ')+'; font-size:'+POPB_typeSizes['typeSizeHTwo']+'px; }  \n'+

            '#pbWrapper p { font-family:'+POPB_typefaces['typefaceParagraph'].replace(/\+/g, ' ')+'; font-size:'+POPB_typeSizes['typeSizeParagraph']+'px; }  \n'+

            '#pbWrapper button { font-family:'+POPB_typefaces['typefaceButton'].replace(/\+/g, ' ')+'; font-size:'+POPB_typeSizes['typeSizeButton']+'px; }  \n'+
            
            '#pbWrapper a { font-family:'+POPB_typefaces['typefaceAnchorLink'].replace(/\+/g, ' ')+'; font-size:'+POPB_typeSizes['typeSizeAnchorLink']+'px; } \n';


          if (currentVPSPageOps == 'rbt-m') {

            var POPBGlobalStylesTag = '\n'+

            '#pbWrapper h1 { font-family:'+POPB_typefaces['typefaceHOne'].replace(/\+/g, ' ')+'; font-size:'+$('.typeSizeHOneTablet').val()+'px !important; }  \n'+

            '#pbWrapper h2 { font-family:'+POPB_typefaces['typefaceHTwo'].replace(/\+/g, ' ')+'; font-size:'+$('.typeSizeHTwoTablet').val()+'px !important; }  \n'+

            '#pbWrapper p { font-family:'+POPB_typefaces['typefaceParagraph'].replace(/\+/g, ' ')+'; font-size:'+$('.typeSizeParagraphTablet').val()+'px !important; }  \n'+

            '#pbWrapper button { font-family:'+POPB_typefaces['typefaceButton'].replace(/\+/g, ' ')+'; font-size:'+$('.typeSizeButtonTablet').val()+'px; }  \n'+
            
            '#pbWrapper a { font-family:'+POPB_typefaces['typefaceAnchorLink'].replace(/\+/g, ' ')+'; font-size:'+$('.typeSizeAnchorLinkTablet').val()+'px !important; } \n';

          }
          if (currentVPSPageOps == 'rbt-s') {

            var POPBGlobalStylesTag = '\n'+

            '#pbWrapper h1 { font-family:'+POPB_typefaces['typefaceHOne'].replace(/\+/g, ' ')+'; font-size:'+$('.typeSizeHOneMobile').val()+'px !important; }  \n'+

            '#pbWrapper h2 { font-family:'+POPB_typefaces['typefaceHTwo'].replace(/\+/g, ' ')+'; font-size:'+$('.typeSizeHTwoMobile').val()+'px !important; }  \n'+

            '#pbWrapper p { font-family:'+POPB_typefaces['typefaceParagraph'].replace(/\+/g, ' ')+'; font-size:'+$('.typeSizeParagraphMobile').val()+'px !important; }  \n'+

            '#pbWrapper button { font-family:'+POPB_typefaces['typefaceButton'].replace(/\+/g, ' ')+'; font-size:'+$('.typeSizeButtonMobile').val()+'px; }  \n'+
            
            '#pbWrapper a { font-family:'+POPB_typefaces['typefaceAnchorLink'].replace(/\+/g, ' ')+'; font-size:'+$('.typeSizeAnchorLinkMobile').val()+'px !important; } \n';

          }
          

          $('#POPBGlobalStylesTag').html(POPBGlobalStylesTag);

  }else{
    $('#POPBGlobalStylesTag').html('');
  }


  var pageOptions = {
    bodyBackgroundType: $('.bodyBackgroundType:checked').val(),
    bodyGradient: {
      bodyGradientColorFirst: $('.bodyGradientColorFirst').val(),
      bodyGradientLocationFirst: $('.bodyGradientLocationFirst').val(),
      bodyGradientColorSecond: $('.bodyGradientColorSecond').val(),
      bodyGradientLocationSecond: $('.bodyGradientLocationSecond').val(),
      bodyGradientType: $('.bodyGradientType').val(),
      bodyGradientPosition: $('.bodyGradientPosition').val(),
      bodyGradientAngle: $('.bodyGradientAngle').val(),
    },
    bodyHoverOptions: {
      bodyBgColorHover: $('.bodyBgColorHover').val(),
      bodyBackgroundTypeHover: $('.bodyBackgroundTypeHover:checked').val(),
      bodyHoverTransitionDuration: $('.bodyHoverTransitionDuration').val(),
      bodyGradientHover: {
        bodyGradientColorFirstHover: $('.bodyGradientColorFirstHover').val(),
        bodyGradientLocationFirstHover: $('.bodyGradientLocationFirstHover').val(),
        bodyGradientColorSecondHover: $('.bodyGradientColorSecondHover').val(),
        bodyGradientLocationSecondHover: $('.bodyGradientLocationSecondHover').val(),
        bodyGradientTypeHover: $('.bodyGradientTypeHover').val(),
        bodyGradientPositionHover: $('.bodyGradientPositionHover').val(),
        bodyGradientAngleHover: $('.bodyGradientAngleHover').val(),
      }
    },
    bodyOverlayBackgroundType: $('.bodyOverlayBackgroundType:checked').val(),
    bodyOverlayGradient: {
      bodyOverlayGradientColorFirst: $('.bodyOverlayGradientColorFirst').val(),
      bodyOverlayGradientLocationFirst: $('.bodyOverlayGradientLocationFirst').val(),
      bodyOverlayGradientColorSecond: $('.bodyOverlayGradientColorSecond').val(),
      bodyOverlayGradientLocationSecond: $('.bodyOverlayGradientLocationSecond').val(),
      bodyOverlayGradientType: $('.bodyOverlayGradientType').val(),
      bodyOverlayGradientPosition: $('.bodyOverlayGradientPosition').val(),
      bodyOverlayGradientAngle: $('.bodyOverlayGradientAngle').val(),
    },
    bodyBgOverlayColor: $('.bodyBgOverlayColor').val(),
    bodyBorderType:$('.bodyBorderType').val(),
    bodyBorderWidth:$('.bodyBorderWidth').val(),
    bodyBorderColor:$('.bodyBorderColor').val(),
    bodyBorderRadius:{
      bbrt:$('.bbrt').val(),
      bbrb:$('.bbrb').val(),
      bbrl:$('.bbrl').val(),
      bbrr:$('.bbrr').val(),
    },
  };
  var bodyID = 'pbWrapper';
  var bodyBackgroundOptions = 'background-color:' + pageBgColor + ';';
  if (pageBgImage != '') {
    bodyBackgroundOptions = 'background: url(' + pageBgImage + '); background-size: cover; ';
  }
  if (typeof (pageOptions['bodyBackgroundType']) !== 'undefined') {
    if (pageOptions['bodyBackgroundType'] == 'gradient') {
      var bodyGradient = pageOptions['bodyGradient'];
      if (bodyGradient['bodyGradientType'] == 'linear') {
        bodyBackgroundOptions = 'background: linear-gradient(' + bodyGradient['bodyGradientAngle'] + 'deg, ' + bodyGradient['bodyGradientColorFirst'] + ' ' + bodyGradient['bodyGradientLocationFirst'] + '%,' + bodyGradient['bodyGradientColorSecond'] + ' ' + bodyGradient['bodyGradientLocationSecond'] + '%);';
      }
      if (bodyGradient['bodyGradientType'] == 'radial') {
        bodyBackgroundOptions = 'background: radial-gradient(at ' + bodyGradient['bodyGradientPosition'] + ', ' + bodyGradient['bodyGradientColorFirst'] + ' ' + bodyGradient['bodyGradientLocationFirst'] + '%,' + bodyGradient['bodyGradientColorSecond'] + ' ' + bodyGradient['bodyGradientLocationSecond'] + '%);';
      }
    }
  }
  var thisbodyHoverStyleTag = '';
  var thisbodyHoverOption = '';
  if (typeof (pageOptions['bodyHoverOptions']) !== 'undefined') {
    var bodyHoverOptions = pageOptions['bodyHoverOptions'];
    if (bodyHoverOptions['bodyBackgroundTypeHover'] == 'solid') {
      var thisbodyHoverOption = ' #' + bodyID + ':hover { background:' + bodyHoverOptions['bodyBgColorHover'] + ' !important; transition: all ' + bodyHoverOptions['bodyHoverTransitionDuration'] + 's; }';
    }
    if (bodyHoverOptions['bodyBackgroundTypeHover'] == 'gradient') {
      var bodyGradientHover = bodyHoverOptions['bodyGradientHover'];
      if (bodyGradientHover['bodyGradientTypeHover'] == 'linear') {
        thisbodyHoverOption = ' #' + bodyID + ':hover { background: linear-gradient(' + bodyGradientHover['bodyGradientAngleHover'] + 'deg, ' + bodyGradientHover['bodyGradientColorFirstHover'] + ' ' + bodyGradientHover['bodyGradientLocationFirstHover'] + '%,' + bodyGradientHover['bodyGradientColorSecondHover'] + ' ' + bodyGradientHover['bodyGradientLocationSecondHover'] + '%) !important; transition: all ' + bodyHoverOptions['bodyHoverTransitionDuration'] + 's; }';
      }
      if (bodyGradientHover['bodyGradientTypeHover'] == 'radial') {
        thisbodyHoverOption = ' #' + bodyID + ':hover { background: radial-gradient(at ' + bodyGradientHover['bodyGradientPositionHover'] + ', ' + bodyGradientHover['bodyGradientColorFirstHover'] + ' ' + bodyGradientHover['bodyGradientLocationFirstHover'] + '%,' + bodyGradientHover['bodyGradientColorSecondHover'] + ' ' + bodyGradientHover['bodyGradientLocationSecondHover'] + '%) !important; transition: all ' + bodyHoverOptions['bodyHoverTransitionDuration'] + 's; }';
      }
    }
    $('#POPBBodyHoverStylesTag').html(thisbodyHoverOption);
  }
  bodyOverlayBackgroundOptions = '';
  if (typeof (pageOptions['bodyBgOverlayColor']) !== 'undefined') {
    var bodyOverlayBackgroundOptions = 'background:' + pageOptions['bodyBgOverlayColor'] + '; background-color:' + pageOptions['bodyBgOverlayColor'] + ';';
  }
  if (typeof (pageOptions['bodyOverlayBackgroundType']) !== 'undefined') {
    if (pageOptions['bodyOverlayBackgroundType'] == 'gradient') {
      var bodyOverlayGradient = pageOptions['bodyOverlayGradient'];
      if (bodyOverlayGradient['bodyOverlayGradientType'] == 'linear') {
        bodyOverlayBackgroundOptions = 'background: linear-gradient(' + bodyOverlayGradient['bodyOverlayGradientAngle'] + 'deg, ' + bodyOverlayGradient['bodyOverlayGradientColorFirst'] + ' ' + bodyOverlayGradient['bodyOverlayGradientLocationFirst'] + '%,' + bodyOverlayGradient['bodyOverlayGradientColorSecond'] + ' ' + bodyOverlayGradient['bodyOverlayGradientLocationSecond'] + '%);';
      }
      if (bodyOverlayGradient['bodyOverlayGradientType'] == 'radial') {
        bodyOverlayBackgroundOptions = 'background: radial-gradient(at ' + bodyOverlayGradient['bodyOverlayGradientPosition'] + ', ' + bodyOverlayGradient['bodyOverlayGradientColorFirst'] + ' ' + bodyOverlayGradient['bodyOverlayGradientLocationFirst'] + '%,' + bodyOverlayGradient['bodyOverlayGradientColorSecond'] + ' ' + bodyOverlayGradient['bodyGradientLocationSecond'] + '%);';
      }
    }
  }
  $('#pbWrapperContainerOverlay').attr('style', bodyOverlayBackgroundOptions);

    if (typeof(bodyBorderRadius)  == 'undefined') { bodyBorderRadius = ''; }
    bodyBorderType = ''; bodyBorderWidth = ''; bodyBorderColor = '';
    if (typeof(pageOptions['bodyBorderType'])  != 'undefined') {
      bodyBorderType = pageOptions['bodyBorderType'];
      bodyBorderWidth = pageOptions['bodyBorderWidth'];
      bodyBorderColor = pageOptions['bodyBorderColor'];
      bodyBorderRadius = pageOptions['bodyBorderRadius'];
      if ( typeof(bodyBorderRadius['bbrt']) != 'undefined') {
      }else{
        bodyBorderRadius['bbrt'] = bodyBorderRadius;
        bodyBorderRadius['bbrb'] = bodyBorderRadius;
        bodyBorderRadius['bbrl'] = bodyBorderRadius;
        bodyBorderRadius['bbrr'] = bodyBorderRadius;
      }
    }

    $('#pbWrapper').css('border',bodyBorderWidth+'px '+bodyBorderType+' '+bodyBorderColor);
    $('#pbWrapper').css('border-top-left-radius',bodyBorderRadius['bbrt']+'px');
    $('#pbWrapper').css('border-top-right-radius',bodyBorderRadius['bbrr']+'px');
    $('#pbWrapper').css('border-bottom-right-radius',bodyBorderRadius['bbrb']+'px');
    $('#pbWrapper').css('border-bottom-left-radius',bodyBorderRadius['bbrl']+'px');

  var pbWrapperExistingStyles = $('#pbWrapper').attr('style');
  $('#pbWrapper').attr('style', pbWrapperExistingStyles+bodyBackgroundOptions);




  $('.isChagesMade').val('true');

});

$('.responsiveBtn').on('click',function(){

  var POPBDeafaultResponsiveStyles = 'h1{font-size:2em ; } h2{ font-size:1.5em ; } h3{ font-size:1.3em ; } h4{ font-size:1em ; } h5{ font-size:1em ; } h6{ font-size:1em ; } p, p span, input, button, label{ font-size: 15px ; } p{  } video{ min-height: auto ; max-width: 100%; } }  .row {width:100% ; padding:30px  0 ; margin: 0 auto ;}  .column {width:99.9% ; margin-bottom: 30px ; } .column > div { padding:20px ; margin: 0 auto ; }';


  if ( $(this).hasClass('rbt-l') ) {
    $('#pbWrapper').css({
      'padding-top': $('.pagePaddingTop').val()+'%',
      'padding-bottom':$('.pagePaddingBottom').val()+'%',
      'padding-left':$('.pagePaddingLeft').val()+'%',
      'padding-right':$('.pagePaddingRight').val()+'%',
    });

    var POPBGlobalStylesTag = '\n'+

      '#pbWrapper h1 { font-family:'+$('.typefaceHOne').val().replace(/\+/g, ' ')+'; font-size:'+$('.typeSizeHOne').val()+'px; }  \n'+

      '#pbWrapper h2 { font-family:'+$('.typefaceHTwo').val().replace(/\+/g, ' ')+'; font-size:'+$('.typeSizeHTwo').val()+'px; }  \n'+

      '#pbWrapper p { font-family:'+$('.typefaceParagraph').val().replace(/\+/g, ' ')+'; font-size:'+$('.typeSizeParagraph').val()+'px; }  \n'+

      '#pbWrapper button { font-family:'+$('.typefaceButton').val().replace(/\+/g, ' ')+'; font-size:'+$('.typeSizeButton').val()+'px; }  \n'+
      
      '#pbWrapper a { font-family:'+$('.typefaceAnchorLink').val().replace(/\+/g, ' ')+'; font-size:'+$('.typeSizeAnchorLink').val()+'px; } \n';

    $('#POPBDeafaultResponsiveStylesTag').html(' ');
  }

  if ($(this).hasClass('rbt-m')) {
    $('#pbWrapper').css({
      'padding-top': $('.pagePaddingTopTablet').val()+'%',
      'padding-bottom':$('.pagePaddingBottomTablet').val()+'%',
      'padding-left':$('.pagePaddingLeftTablet').val()+'%',
      'padding-right':$('.pagePaddingRightTablet').val()+'%',
    });

    if ( $('.pageMaxWidthT').val() != '' && $('.pageMaxWidthUT').val() != '' ) {
      jQuery('.pb_editor_tab_content #tab1').css({
        'width': $('.pageMaxWidthT').val() + $('.pageMaxWidthUT').val() ,
      });
    }

    var POPBGlobalStylesTag = '\n'+

      '#pbWrapper h1 { font-family:'+$('.typefaceHOne').val().replace(/\+/g, ' ')+'; font-size:'+$('.typeSizeHOneTablet').val()+'px !important; }  \n'+

      '#pbWrapper h2 { font-family:'+$('.typefaceHTwo').val().replace(/\+/g, ' ')+'; font-size:'+$('.typeSizeHTwoTablet').val()+'px !important; }  \n'+

      '#pbWrapper p { font-family:'+$('.typefaceParagraph').val().replace(/\+/g, ' ')+'; font-size:'+$('.typeSizeParagraphTablet').val()+'px !important; }  \n'+

      '#pbWrapper button { font-family:'+$('.typefaceButton').val().replace(/\+/g, ' ')+'; font-size:'+$('.typeSizeButtonTablet').val()+'px; }  \n'+
      
      '#pbWrapper a { font-family:'+$('.typefaceAnchorLink').val().replace(/\+/g, ' ')+'; font-size:'+$('.typeSizeAnchorLinkTablet').val()+'px !important; } \n';

    $('#POPBDeafaultResponsiveStylesTag').html(POPBDeafaultResponsiveStyles);
  }

  if ($(this).hasClass('rbt-s')) {
    $('#pbWrapper').css({
      'padding-top': $('.pagePaddingTopMobile').val()+'%',
      'padding-bottom':$('.pagePaddingBottomMobile').val()+'%',
      'padding-left':$('.pagePaddingLeftMobile').val()+'%',
      'padding-right':$('.pagePaddingRightMobile').val()+'%',
    });

    if ( $('.pageMaxWidthM').val() != '' && $('.pageMaxWidthUM').val() != '' ) {
      jQuery('.pb_editor_tab_content #tab1').css({
        'width': $('.pageMaxWidthM').val() + $('.pageMaxWidthUM').val() ,
      });
    }

    var POPBGlobalStylesTag = '\n'+

      '#pbWrapper h1 { font-family:'+$('.typefaceHOne').val().replace(/\+/g, ' ')+'; font-size:'+$('.typeSizeHOneMobile').val()+'px !important; }  \n'+

      '#pbWrapper h2 { font-family:'+$('.typefaceHTwo').val().replace(/\+/g, ' ')+'; font-size:'+$('.typeSizeHTwoMobile').val()+'px !important; }  \n'+

      '#pbWrapper p { font-family:'+$('.typefaceParagraph').val().replace(/\+/g, ' ')+'; font-size:'+$('.typeSizeParagraphMobile').val()+'px !important; }  \n'+

      '#pbWrapper button { font-family:'+$('.typefaceButton').val().replace(/\+/g, ' ')+'; font-size:'+$('.typeSizeButtonMobile').val()+'px; }  \n'+
      
      '#pbWrapper a { font-family:'+$('.typefaceAnchorLink').val().replace(/\+/g, ' ')+'; font-size:'+$('.typeSizeAnchorLinkMobile').val()+'px !important; } \n';
      $('#POPBDeafaultResponsiveStylesTag').html(POPBDeafaultResponsiveStyles);
  }

  $('#POPBGlobalStylesTag').html(POPBGlobalStylesTag);
});


PbPOaceEditorCSS.getSession().on('change',function(e){
  POcustomCSS = PbPOaceEditorCSS.getValue();

  $('#PBPO_customCSS').text(POcustomCSS);
});


$('.checkIfWidgetsAreLoadedInColumn').val('false');





$('.closeWidgetPopup').on('click',function(ev){
  var that = $(ev.target).attr('data-CurrWidget');
  $('div[data-saveCurrWidget="'+that+'"]').trigger('click');

  ColcurrentEditableRowID = jQuery('.ColcurrentEditableRowID').val();
    currentEditableColId = jQuery('.currentEditableColId').val();
    jQuery('section[rowid="'+ColcurrentEditableRowID+'"]').children('.ulpb_column_controls'+currentEditableColId).children('#editColumnSave').trigger('click');
});

$('.closeWidgetPopupIcon').on('click',function(ev){
  var that = $(ev.target).attr('data-CurrWidget');
  $('div[data-saveCurrWidget="'+that+'"]').trigger('click');

  ColcurrentEditableRowID = jQuery('.ColcurrentEditableRowID').val();
  currentEditableColId = jQuery('.currentEditableColId').val();
    jQuery('section[rowid="'+ColcurrentEditableRowID+'"]').children('.ulpb_column_controls'+currentEditableColId).children('#editColumnSave').trigger('click');
});


$('.pageBgImage').on('change',function(){
    var pageBgImage = $('.pageBgImage').val();
    $('#container').attr('style','background-image: url("'+pageBgImage+'"); background-size:cover;');
  });

/*
$('.card-img').mouseover(function(ev) {
  //console.log($(ev.target).children());
  var tempprevbtn = $(ev.target).attr('class').split(' ')[1];
  //console.log(tempprevbtn);
  $('#'+tempprevbtn).width($(ev.target).width());
  $('#'+tempprevbtn).height($(ev.target).height());
  var tempPhieght = $(ev.target).height();
  $('.tempPrev p').css('margin-top',tempPhieght/2);
  $('#'+tempprevbtn).slideDown(100);
});

$('.card').mouseleave(function(ev){
  $('.tempPrev').slideUp('100');
});

*/

$('.card-img').on('mouseover',function(ev) {
  //console.log($(ev.target).children());
  var tempprevbtn = $(ev.target).attr('class').split(' ')[1];
  //console.log(tempprevbtn);
  $('#'+tempprevbtn).width($(ev.target).width());
  $('#'+tempprevbtn).height($(ev.target).height());
  var tempPhieght = $(ev.target).height();
  $('.tempPrev p').css('margin-top',tempPhieght/2);
  $('#'+tempprevbtn).slideDown(100);
});

$('.card').on('mouseleave',function(ev){
  $('.tempPrev').slideUp('100');
});


$('.pb_preview_container').on('click',function(){
  $('.pb_preview_container').attr('style','display:none;');
  $('.pb_temp_prev').html(' ');
});




//Responsive Options Buttons Global Script


$('.responsiveBtn').on('click',function(){
  $('.responsiveBtn').css('background','#a5a5a5');
  
  var selectedOptinType = pageBuilderApp.PageBuilderModel.get('optinType');
  tab1WidthL = '65%';
  tab1WidthM = '768px';
  tab1WidthS = '310px';
  if (selectedOptinType == 'Fly In') {
    tab1WidthL = '350px';
    tab1WidthM = '350px';
    tab1WidthS = '350px';
  }
  if (selectedOptinType == 'Bar' || selectedOptinType == 'Full Page') {
    tab1WidthL = '100%';
    tab1WidthM = '768px';
    tab1WidthS = '310px';
  }
  $('.responsiveOps').css('display','none');

  if ( $('.pageMaxWidth').val() != '' && $('.pageMaxWidthU').val() != '' ) {
    tab1WidthL = $('.pageMaxWidth').val() + $('.pageMaxWidthU').val() ;
  }

  if ($(this).hasClass('rbt-l') ) {
    $('.rbt-l').css('background','#2196F3');
    $('.pb_editor_tab_content #tab1').animate({margin:'0 auto', width:tab1WidthL },500 );
    $('.responsiveOptionsContainterLarge').css('display','block');

    $('.currentViewPortSize').val('rbt-l');
    $('.pb_fullScreenEditorButtonClose').css('display','block');

    $('.formFieldContainer').removeClass('fullWidthFieldContainer');
    
  }

  if ($(this).hasClass('rbt-m') ) {
    $('.rbt-m').css('background','#2196F3');
    if ( $('.pageMaxWidthT').val() != '' && $('.pageMaxWidthUT').val() != '' ) {
        tab1WidthM = $('.pageMaxWidthT').val() + $('.pageMaxWidthUT').val();
    }
    $('.pb_editor_tab_content #tab1').animate({margin:'0 auto', width:tab1WidthM },500 );
    $('.responsiveOptionsContainterMedium').css('display','block');

    $('.currentViewPortSize').val('rbt-m');

    $('.formFieldContainer').removeClass('fullWidthFieldContainer');
    
    
  }

  if ($(this).hasClass('rbt-s') ) {
    $('.rbt-s').css('background','#2196F3');

    if ( $('.pageMaxWidthM').val() != '' && $('.pageMaxWidthUM').val() != '' ) {
        tab1WidthS = $('.pageMaxWidthM').val() + $('.pageMaxWidthUM').val();
    }

    $('.pb_editor_tab_content #tab1').animate({margin:'0 auto', width:tab1WidthS },500 );
    $('.responsiveOptionsContainterSmall').css('display','block');

    $('.currentViewPortSize').val('rbt-s');


    $('.formFieldContainer').addClass('fullWidthFieldContainer');
    
    
  }


});




// POPB Tabs 

$('.popbNavItem').on('click',function(e){
  e.preventDefault();
  
  var clickedPOPBTab = $(this).attr('data-inptabID');
  var currentOptionType = $(this).children('input').attr("name");
  var currentOptionTypeSelected = $(this).children('input').is(':checked');

  if (currentOptionTypeSelected == true) {
    $(this).children('label').css({'background':'#f1f1f1', 'color':'#333'});
    $(this).children('input').prop("checked", false);
    $(this).siblings('.noneValueSelector').children('input').prop("checked", true);
    $(this).children('input').trigger("change");
  }else{
    $(this).siblings('.popbNavItem').children('label').css({'background':'#f1f1f1', 'color':'#333'});
    $(this).children('label').css({'background':'#a5a5a5', 'color':'#fff'});
    $(this).parent().next('.popb_input_tabContent').children('.popb_tab_content').css('display','none');
    $(this).parent().next().children('.'+clickedPOPBTab).css('display','block');
    $("."+currentOptionType).prop("checked", false);
    $(this).children('input').prop("checked", true);
    $(this).children('input').trigger("change");
  }

  e.stopPropagation();
  return;
    
});


try{
  $('.popbinputTabsWrapper').tooltip({
    tooltipClass: "inp-tab-tooltip-styling"
  });
}catch(error) {
  console.log(error);
}

  




// Number Sliders 
$('.rowGradientType').on('change',function(){
  var rowGradientType = $(this).val();
  if (rowGradientType == 'linear') {
    $('.radialInput').css('display','none');
    $('.linearInput').css('display','block');
  }else{
    $('.radialInput').css('display','block');
    $('.linearInput').css('display','none');
  }
});


$('.rowGradientTypeHover').on('change',function(){
  var rowGradientType = $(this).val();
  if (rowGradientType == 'linear') {
    $('.radialInputHover').css('display','none');
    $('.linearInputHover').css('display','block');
  }else{
    $('.radialInputHover').css('display','block');
    $('.linearInputHover').css('display','none');
  }
});


$('.colGradientType').on('change',function(){
  var colGradientType = $(this).val();
  if (colGradientType == 'linear') {
    $('.radialInputCol').css('display','none');
    $('.linearInputCol').css('display','block');
  }else{
    $('.radialInputCol').css('display','block');
    $('.linearInputCol').css('display','none');
  }
});


$('.widgGradientType').on('change',function(){
  var widgGradientType = $(this).val();
  if (widgGradientType == 'linear') {
    $('.radialInputWidg').css('display','none');
    $('.linearInputWidg').css('display','block');
  }else{
    $('.radialInputWidg').css('display','block');
    $('.linearInputWidg').css('display','none');
  }
});


$('.colGradientTypeHover').on('change',function(){
  var colGradientTypeHover = $(this).val();
  if (colGradientTypeHover == 'linear') {
    $('.radialInputColHover').css('display','none');
    $('.linearInputColHover').css('display','block');
  }else{
    $('.radialInputColHover').css('display','block');
    $('.linearInputColHover').css('display','none');
  }
});

$('.widgGradientTypeHover').on('change',function(){
  var widgGradientTypeHover = $(this).val();
  if (widgGradientTypeHover == 'linear') {
    $('.radialInputWidgHover').css('display','none');
    $('.linearInputWidgHover').css('display','block');
  }else{
    $('.radialInputWidgHover').css('display','block');
    $('.linearInputWidgHover').css('display','none');
  }
});


try {
  $( ".PoPbrangeSlider" ).slider({
    value:0,
    min: 0,
    max: 100,
    step: 5,
    slide: function( event, ui ) {
      POPBtagerInput = $(this).attr('data-targetRangeInput');
      $('.'+POPBtagerInput).val(ui.value);
      $('.'+POPBtagerInput).trigger('change');
    }
  });

  $( ".PoPbrangeSliderAngle" ).slider({
    value:0,
    min: 0,
    max: 360,
    step: 5,
    slide: function( event, ui ) {
      POPBtagerInput = $(this).attr('data-targetRangeInput');
      $('.'+POPBtagerInput).val(ui.value);
      $('.'+POPBtagerInput).trigger('change');
    }
  });

  $( ".PoPbrangeSliderTransition" ).slider({
    value:1,
    min: 0.1,
    max: 3,
    step: 0.1,
    slide: function( event, ui ) {
      POPBtagerInput = $(this).attr('data-targetRangeInput');
      $('.'+POPBtagerInput).val(ui.value);
      $('.'+POPBtagerInput).trigger('change');
    }
  });


  jQuery('#pbCountDownDate').datepicker({
    dateFormat: 'yy/mm/dd'
  });

} catch(e) {
  // statements
  console.log(e);
}

  



  $('#pbWrapper').css('display','none');

  jQuery('.pb_fullScreenEditorButton').on('click',function(){
    $('.pb_editor_tab_content').attr('style','overflow: hidden;background:#5d5d5d;position: absolute;width: 100%;left: 0;right: 15;top: 0;');
    $('.pb_editor_tab_content #tab1').css('background', '#5d5d5d');
    $('#adminmenumain, .pb_fullScreenEditorButton, #wpadminbar, #postbox-container-2, .postbox').css('display','none');
    $('#wpcontent').attr('style','margin-left:0; padding-left:0;');
    $('.pb_fullScreenEditorButtonClose').show();
    $('#pbWrapper').css('display','block');

    $(this).addClass('EditorActive');
  });

  jQuery('.pb_fullScreenEditorButtonClose').on('click',function(){
    $('.pb_editor_tab_content').attr('style','overflow: hidden;background: #fff;');
    $('.pb_editor_tab_content #tab1').css('background', '#fff');
    $('.pb_fullScreenEditorButtonClose').css('display','none');
    $('#wpcontent').attr('style','');
    $('#adminmenumain, .pb_fullScreenEditorButton, #wpadminbar, #postbox-container-2 , .postbox').show();

    $('#submitdiv').css('display','none');
    $('#pbWrapper').css('display','none');
    $('.pb_fullScreenEditorButton').removeClass('EditorActive');
      $('.edit_row').hide(50);
        $('.columnWidgetPopup').hide(50);
        $('.pageops_modal').hide(50);
        $('.edit_column').hide(50);
        $('.ulpb_column_controls, .ulpb_row_controls').css('display','none');
  });

  






// Save Triggers Start 

  jQuery('.row_edit_fields').on('change',function(){
    currentEditableRowID = jQuery('.currentEditingRow').val();

    pageBuilderApp.changedRowOpName =  $(this).attr('data-optname');


    jQuery('section[rowid="'+currentEditableRowID+'"]').children('#ulpb_row_controls').children('#editRowSave').trigger('click');
  });
  
  jQuery('.row_edit_fieldBG').on('change',function(){
    currentEditableRowID = jQuery('.currentEditingRow').val();

    pageBuilderApp.changedRowOpName =  $(this).attr('data-optname');

    jQuery('section[rowid="'+currentEditableRowID+'"]').children('#ulpb_row_controls').children('#editRowSave').trigger('click');
  });


  jQuery(document).on('click','#editRowSaveVisible',function(){

    currentEditableRowID = jQuery('.currentEditingRow').val();

    jQuery('section[rowid="'+currentEditableRowID+'"]').children('#ulpb_row_controls').children('#editRowSave').trigger('click');

    jQuery('.edit_row').hide(50);
    jQuery('.ulpb_row_controls').hide();
    resizeWindowClose();
  });

  //col save triggers
  jQuery('.colOptionsFields , .popb_col_fields_container input , .popb_col_fields_container select , #columnBgColor').on('change',function(){
    pageBuilderApp.changedColOpName =  $(this).attr('data-optname');
    ColcurrentEditableRowID = jQuery('.ColcurrentEditableRowID').val();
    currentEditableColId = jQuery('.currentEditableColId').val();
    jQuery('section[rowid="'+ColcurrentEditableRowID+'"]').children('.ulpb_column_controls'+currentEditableColId).children('#editColumnSave').trigger('click');
  });


  jQuery(document).on('click','#editColumnSaveVisible',function(){

    jQuery('.edit_column').hide(50);
    jQuery('.ulpb_column_controls').hide();
    resizeWindowClose();

  });


  // widget save triggers
  function saveWidgetTriggerOffside(thisEl,changedOpType){
    //var tsua0 = performance.now();
    pageBuilderApp.changedOpType = changedOpType;
    pageBuilderApp.changedOpName =  $(thisEl).attr('data-optname');
    var that = jQuery('.closeWidgetPopup').attr('data-CurrWidget');
    
    jQuery('div[data-saveCurrWidget="'+that+'"]').trigger('click');

    ColcurrentEditableRowID = jQuery('.ColcurrentEditableRowID').val();
    currentEditableColId = jQuery('.currentEditableColId').val();
    jQuery('section[rowid="'+ColcurrentEditableRowID+'"]').children('.ulpb_column_controls'+currentEditableColId).children('#editColumnSaveWidget').trigger('click');

    //var tsua1 = performance.now();
    //console.log("Call to pbp-widgets change took " + (tsua1 - tsua0) + " milliseconds.");
  }

  $('.closeWidgetPopup').on('click',function(ev){
    saveWidgetTriggerOffside(this,'specific');
  });

  $('.closeWidgetPopupIcon').on('click',function(ev){
    saveWidgetTriggerOffside(this,'specific');
  });

  jQuery('.pbp-widgets input, .pbp-widgets select, .pbp-widgets textarea').on('change',function(){
    saveWidgetTriggerOffside(this,'specific');
  });

  jQuery('.widgetAnimateBtn').on('click',function(){
    jQuery('.isAnimateTrue').val('animate');
    jQuery('.closeWidgetPopup').trigger('click');
  });

  jQuery('.wdt-fields input , .wdt-fields select, .wdt-fields textarea , #widgetBgColor , .widgetStyling , .wdt-img input, .wdt-img select ').on('change',function(){
    saveWidgetTriggerOffside(this,'general');
  });


  jQuery('.wdt-img input, .wdt-img select').on('change',function(){ 
    saveWidgetTriggerOffside(this,'specific');
  });

  jQuery(document).on('change','.slideImgURL',function(){
    saveWidgetTriggerOffside(this,'specific');
  });

  jQuery(document).on('change','.imageSlideHeading , .imageSlideDesc , .imageSlideButtonText , .imageSlideButtonURL',function(){
    saveWidgetTriggerOffside(this,'specific');
  });

   jQuery(document).on('change','.iconListItemsContainer input , .iconListItemsContainer select ',function(){
    saveWidgetTriggerOffside(this,'specific');
  });
  
  jQuery(document).on('change','.carouselImgURL',function(){
    saveWidgetTriggerOffside(this,'specific');
  });

  jQuery(document).on('change','.formFieldItemsContainer select',function(){
    saveWidgetTriggerOffside(this,'specific');
  });
  jQuery(document).on('change','.formFieldItemsContainer input',function(){
    saveWidgetTriggerOffside(this,'specific');
  });
  jQuery(document).on('change','.formFieldItemsContainer textarea',function(){
    saveWidgetTriggerOffside(this,'specific');
  });

  jQuery(document).on('change','.customImageGalleryItems input',function(){
    saveWidgetTriggerOffside(this,'specific');
  });


  jQuery('.editWidgetSaveButton').on('click',function(){
    // jQuery('.closeWidgetPopup').trigger('click');
    hideWidgetOpsPanel();
    jQuery('.edit_column').hide(50);
    jQuery('.ulpb_column_controls').css('display','none');

    resizeWindowClose();
    
  });

  var widgetDroppedTypeTwo = false;

// Save Triggers End 

jQuery(document).ready(function() {

  $(document).on('click','.fontfamilySearchIcon',function(){
    if ($(this).parents('.font-select').find('.fontSearchField').hasClass('fontSearchHidden') ) {
      $(this).parents('.font-select').find('.fontSearchField').addClass('fontSearchVisible');
      $(this).parents('.font-select').find('.fontSearchField').removeClass('fontSearchHidden');
      $(this).parents('.font-select').find('.fontSearchField').focus();
    }else{
      $(this).parents('.font-select').find('.fontSearchField').addClass('fontSearchHidden');
      $(this).parents('.font-select').find('.fontSearchField').removeClass('fontSearchVisible');
    }
    
  });
  $(document).on('change','.fontSearchField',function(){

      var fontvalue = $(this).val();
      fontvalue = convertToCamelCase(fontvalue);
      var thisFsResults = $(this).parents('.font-select').find('.fs-results');
      $(thisFsResults).scrollTop( 0 );

      var scrollToEl = $(thisFsResults).find('li:contains("'+fontvalue+'")');


      if ($(scrollToEl).length > 0 ) {
        var childPos = scrollToEl.offset();
        var parentPos = thisFsResults.parent().offset();
        var childOffset = {
            top: childPos.top - parentPos.top,
            left: childPos.left - parentPos.left
        }
        $(thisFsResults).scrollTop( childOffset.top-40 );
      }

  });
});


}( jQuery ) ); // main container end






(function ($) {
  $(document).ready(function(){
    $('.pb_fullScreenEditorButton').css('display','block');
    $('.pb_loader_container_pageload').css('display','none');
  });
}( jQuery ) );




(function ($) {
  
  $(document).ready(function(){


    try {
      jQuery( function() {
        jQuery( "#PB_accordion_forms, .PB_accordion_forms" ).accordion({
          collapsible: true,
          heightStyle: "content"
        });
      });
      jQuery( function() {
        jQuery( "#PB_accordion, .PB_accordion" ).accordion({
          collapsible: true,
          heightStyle: "content"
        });
      });

      jQuery( function() {
        jQuery( "#PB_accordion_customHTMlForm, .PB_accordion_customHTMlForm" ).accordion({
          collapsible: true,
          heightStyle: "content",
          active: false
        });
      });

      jQuery( function() {
        jQuery( "#accordion1" ).accordion({
          collapsible: true,
          heightStyle: "content"
        });
      });

      jQuery( ".sortableAccordionWidget" )
      .accordion({
        header: '> li > h3',
        collapsible: true,
        heightStyle: "content"
      })
      .sortable({
            axis: "y",
            handle: ".handleHeader",
            stop: function( event, ui ) {
                // IE doesn't register the blur when sorting
                // so trigger focusout handlers to remove .ui-state-focus
                ui.item.children( ".handleHeader" ).triggerHandler( "focusout" );
                pageBuilderApp.changedOpType = 'specific';
                pageBuilderApp.changedOpName = 'slideListEdit';
                
                var that = jQuery('.closeWidgetPopup').attr('data-CurrWidget');
                jQuery('div[data-saveCurrWidget="'+that+'"]').trigger('click');

                ColcurrentEditableRowID = jQuery('.ColcurrentEditableRowID').val();
                currentEditableColId = jQuery('.currentEditableColId').val();
                jQuery('section[rowid="'+ColcurrentEditableRowID+'"]').children('.ulpb_column_controls'+currentEditableColId).children('#editColumnSaveWidget').trigger('click');
                // Refresh accordion to handle new order
                jQuery( this ).accordion( "refresh" );
            }
      });

      jQuery('.pbicp-auto').iconpicker({ });

      jQuery('.pbicp-auto').on('iconpickerSelected', function(event){
        $(this).trigger('change');
      });

      jQuery('.pbIconListPicker').iconpicker({ });

      jQuery('.pbIconListPicker').on('iconpickerSelected', function(event){
        $(this).trigger('change');
      });

    } catch(e) {
      // statements
      console.log(e);
    }

      
    
    jQuery(document).on('click','.pb_img_thumbnail',function(){
      var clikedElID = jQuery(this).attr('id');
      jQuery('#pb_lightbox'+clikedElID).css('display','block');
    });

    jQuery(document).on('click','.pb_single_img_lightbox',function(){
      jQuery(this).css('display','none');
    });

  });
}( jQuery ) );




(function($){

  $(document).ready(function() {
    

    jQuery('#addNewAccordionItem').on('click',function(){

      var accordionItemsCount = jQuery('.accordionItemsContainer li').length;

      var editorId = 'accordionEditor_'+accordionItemsCount;

      jQuery('.accordionItemsContainer').append(
        '<li>'+
          '<h3 class="handleHeader">Accordion '+
            '<span class="dashicons dashicons-trash slideRemoveButton" style="float: right;"></span>'+
          '</h3>'+
          '<div class="accordContentHolder">'+
              '<label> Title  </label>'+
              '<input style="width:80%;" type="text" class="accoTitle" data-optname="accordionItems.'+accordionItemsCount+'.accoTitle" value="Accordion '+accordionItemsCount+'">'+
              '<br><br><br><br><hr><br>'+
              '<textarea id="'+editorId+'"  class="accContent" data-optname="accordionItems.'+accordionItemsCount+'.accContent"> Accordion '+accordionItemsCount+'</textarea>'+
          '</div>'+
        '</li>'
      );


      pageBuilderApp.changedOpType = 'specific';
      pageBuilderApp.changedOpName = 'slideListEdit';

      var that = jQuery('.closeWidgetPopup').attr('data-CurrWidget');
      jQuery('div[data-saveCurrWidget="'+that+'"]').trigger('click');

      ColcurrentEditableRowID = jQuery('.ColcurrentEditableRowID').val();
      currentEditableColId = jQuery('.currentEditableColId').val();
      jQuery('section[rowid="'+ColcurrentEditableRowID+'"]').children('.ulpb_column_controls'+currentEditableColId).children('#editColumnSaveWidget').trigger('click');

      try {
        wp.editor.initialize(editorId,  { tinymce : pageBuilderApp.tinymce, quicktags: true, mediaButtons: true },  );

        tinymce.editors[editorId].on('change', function (ed, e) {

          pageBuilderApp.changedOpType = 'specific';
          pageBuilderApp.changedOpName =  editorId;
          var that = jQuery('.closeWidgetPopup').attr('data-CurrWidget');
          
          jQuery('div[data-saveCurrWidget="'+that+'"]').trigger('click');

          ColcurrentEditableRowID = jQuery('.ColcurrentEditableRowID').val();
          currentEditableColId = jQuery('.currentEditableColId').val();
          jQuery('section[rowid="'+ColcurrentEditableRowID+'"]').children('.ulpb_column_controls'+currentEditableColId).children('#editColumnSaveWidget').trigger('click');

        });
      } catch(e) {
        console.log(e);
      }

        

      accordionItemsCount++;
      jQuery('.closeWidgetPopup').trigger('click');

    }); // CLICK function ends here.


    $(document).on( 'change','.accoTitle', function(){
      if ($(this).val() == '') {
                
      } else{
        fieldLabel  = $(this).val().slice(0,30);
        $(this).parent().siblings('.handleHeader').html('Accordion - '+fieldLabel + '<span class="dashicons dashicons-trash slideRemoveButton" style="float: right;"></span> <span class="dashicons dashicons-admin-page accordDuplicateButton" style="float: right;" title="Duplicate"></span>');

      }
    });


  });


  $(document).ready(function() {
    

    jQuery('#addNewtabItem').on('click',function(){

      var tabItemsCount = jQuery('.tabItemsContainer li').length;

      var editorId = 'tabEditor_'+tabItemsCount;

      jQuery('.tabItemsContainer').append(
        '<li>'+
          '<h3 class="handleHeader">Tab '+
              '<span class="dashicons dashicons-trash slideRemoveButton" style="float: right;"></span>'+
          '</h3>'+
          '<div class="accordContentHolder">'+
            '<label> Title  </label>'+
            '<input style="width:80%;" type="text" class="title" data-optname="tabItems.'+tabItemsCount+'.title" value="Enter Title Here ">'+
            '<br><br><br><br><hr><br>'+
            '<label> Icon  </label>'+
            '<input  data-placement="bottomRight" class="icp pbIconListPicker tabItemsIcon"  type="text" data-optname="tabItems.'+tabItemsCount+'.icon" style="width:95px;" /> <span class="input-group-addon" style="font-size: 14px !important;"></span> <br> <br> '+
            '<br><hr><br>'+
            '<textarea id="'+editorId+'"  class="content" data-optname="tabItems.'+tabItemsCount+'.content" ></textarea>'+
          '</div>'+
        '</li>'
    );


      pageBuilderApp.changedOpType = 'specific';
      pageBuilderApp.changedOpName = 'slideListEdit';

      var that = jQuery('.closeWidgetPopup').attr('data-CurrWidget');
      jQuery('div[data-saveCurrWidget="'+that+'"]').trigger('click');

      ColcurrentEditableRowID = jQuery('.ColcurrentEditableRowID').val();
      currentEditableColId = jQuery('.currentEditableColId').val();
      jQuery('section[rowid="'+ColcurrentEditableRowID+'"]').children('.ulpb_column_controls'+currentEditableColId).children('#editColumnSaveWidget').trigger('click');


      jQuery( '.tabItemsContainer' ).accordion( "refresh" );

      tabItemsCount++;

    }); // CLICK function ends here.


    $(document).on( 'change','.accTitle', function(){
      if ($(this).val() == '') {
                
      } else{
        fieldLabel  = $(this).val().slice(0,30);
        $(this).parent().siblings('.handleHeader').html('Tab - '+fieldLabel + '<span class="dashicons dashicons-trash slideRemoveButton" style="float: right;"></span> <span class="dashicons dashicons-admin-page accordDuplicateButton" style="float: right;" title="Duplicate"></span>');

      }
    });


  });

})(jQuery);




(function ($) {

  // Detect touch support
  $.support.touch = 'ontouchend' in document;

  // Ignore browsers without touch support
  if (!$.support.touch) {
    return;
  }

  var mouseProto = $.ui.mouse.prototype,
      _mouseInit = mouseProto._mouseInit,
      _mouseDestroy = mouseProto._mouseDestroy,
      touchHandled;

  /**
   * Simulate a mouse event based on a corresponding touch event
   * @param {Object} event A touch event
   * @param {String} simulatedType The corresponding mouse event
   */
  function simulateMouseEvent (event, simulatedType) {

    // Ignore multi-touch events
    if (event.originalEvent.touches.length > 1) {
      return;
    }

    event.preventDefault();

    var touch = event.originalEvent.changedTouches[0],
        simulatedEvent = document.createEvent('MouseEvents');
    
    // Initialize the simulated mouse event using the touch event's coordinates
    simulatedEvent.initMouseEvent(
      simulatedType,    // type
      true,             // bubbles                    
      true,             // cancelable                 
      window,           // view                       
      1,                // detail                     
      touch.screenX,    // screenX                    
      touch.screenY,    // screenY                    
      touch.clientX,    // clientX                    
      touch.clientY,    // clientY                    
      false,            // ctrlKey                    
      false,            // altKey                     
      false,            // shiftKey                   
      false,            // metaKey                    
      0,                // button                     
      null              // relatedTarget              
    );

    // Dispatch the simulated event to the target element
    event.target.dispatchEvent(simulatedEvent);
  }

  /**
   * Handle the jQuery UI widget's touchstart events
   * @param {Object} event The widget element's touchstart event
   */
  mouseProto._touchStart = function (event) {

    var self = this;

    // Ignore the event if another widget is already being handled
    if (touchHandled || !self._mouseCapture(event.originalEvent.changedTouches[0])) {
      return;
    }

    // Set the flag to prevent other widgets from inheriting the touch event
    touchHandled = true;

    // Track movement to determine if interaction was a click
    self._touchMoved = false;

    // Simulate the mouseover event
    simulateMouseEvent(event, 'mouseover');

    // Simulate the mousemove event
    simulateMouseEvent(event, 'mousemove');

    // Simulate the mousedown event
    simulateMouseEvent(event, 'mousedown');
  };

  /**
   * Handle the jQuery UI widget's touchmove events
   * @param {Object} event The document's touchmove event
   */
  mouseProto._touchMove = function (event) {

    // Ignore event if not handled
    if (!touchHandled) {
      return;
    }

    // Interaction was not a click
    this._touchMoved = true;

    // Simulate the mousemove event
    simulateMouseEvent(event, 'mousemove');
  };

  /**
   * Handle the jQuery UI widget's touchend events
   * @param {Object} event The document's touchend event
   */
  mouseProto._touchEnd = function (event) {

    // Ignore event if not handled
    if (!touchHandled) {
      return;
    }

    simulateMouseEvent(event, 'mouseup');

    simulateMouseEvent(event, 'mouseout');

    if (!this._touchMoved) {

      simulateMouseEvent(event, 'click');
    }

    touchHandled = false;
  };

  
  mouseProto._mouseInit = function () {
    
    var self = this;

    self.element.bind({
      touchstart: $.proxy(self, '_touchStart'),
      touchmove: $.proxy(self, '_touchMove'),
      touchend: $.proxy(self, '_touchEnd')
    });

    _mouseInit.call(self);
  };

  
  mouseProto._mouseDestroy = function () {
    
    var self = this;

    // Delegate the touch handlers to the widget's element
    self.element.unbind({
      touchstart: $.proxy(self, '_touchStart'),
      touchmove: $.proxy(self, '_touchMove'),
      touchend: $.proxy(self, '_touchEnd')
    });

    // Call the original $.ui.mouse destroy method
    _mouseDestroy.call(self);
  };

})(jQuery);




(function ($) {


  jQuery(document).ready(function() {

    if (thisPostType == 'pluginops_forms') {

    }

    jQuery('.pluginops-tabs .pluginops-tab-links a').on('click', function(e)  {
        var currentAttrValue = jQuery(this).attr('href');
 
        jQuery('.pluginops-tabs ' + currentAttrValue).show().siblings().hide();
 
        jQuery(this).parent('li').addClass('pluginops-active').siblings().removeClass('pluginops-active');
 
        e.preventDefault();
    });
    jQuery('.tabs .tab-links a').on('click', function(e)  {
        var currentAttrValue = jQuery(this).attr('href');
 
        jQuery('.tabs ' + currentAttrValue).show().siblings().hide();
 
        jQuery(this).parent('li').addClass('active').siblings().removeClass('active');
 
        e.preventDefault();
    });

    jQuery('.TemplateTabs .Templatetab-links a').on('click', function(e)  {
        var currentAttrValue = jQuery(this).attr('href');
 
        jQuery('.TemplateTabs ' + currentAttrValue).show().siblings().hide();
 
        jQuery(this).parent('li').addClass('active').siblings().removeClass('active');
 
        e.preventDefault();
    });





    if (isGlobalRowActive == "true") {
      jQuery('.addNewGlobalRowVisible').parent().css('display','inline-block');
    }


    jQuery('#menuWrap').on('click',function(){return false;});
    jQuery('#lpb_menu_widget').on('click',function(){return false;});


    jQuery('.gFontSelectorulpb').fontselect({
      style: 'font-select',
      placeholder: 'Select a font',
      placeholderSearch: 'Search...',
      lookahead: 1,
      searchable: true,
      localFontsUrl: '/fonts/' // End with a slash!
    });


    String.prototype.PBSearchStrcapitalize = function() {
      return this.charAt(0).toUpperCase() + this.slice(1);
    }
  
    jQuery('.pbSearchWidget').on('keyup', function(){
      var WidgetSearchQuery =  jQuery(this).val().PBSearchStrcapitalize();
      jQuery('.POPB_widget').hide();
      
      jQuery('.POPB_widget:contains("'+WidgetSearchQuery+'")').show();

    });

    jQuery('.templatesFilterSelector').on('change', function(){
      var WidgetSearchQuery =  jQuery(this).val();
      jQuery('.template-card').hide();
      
      jQuery('.template-card:contains("'+WidgetSearchQuery+'")').show();

      if (WidgetSearchQuery == 'All') {
        jQuery('.template-card').show();
      }

    });


    jQuery('.fullErrorMessage p').on('click',function(){
      $(this).html($('.fullErrorMessageInput').val());
    });


    $('.imgUrl').on('change',function(){

      $('.selectImagePreview').attr('src', $(this).val() );

    });
    

  });

})(jQuery);

