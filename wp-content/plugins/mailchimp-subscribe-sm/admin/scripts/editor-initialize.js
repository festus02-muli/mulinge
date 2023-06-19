( function( $ ) {
  
jQuery('.template-card').hide();
$('.campaignNameField').css('border-bottom','2px solid #4CAF50');
var setTitle = $('#title').val();

if (setTitle != '') {
  $('.stepOneContent').css('display','none');
  $('.stepTwoContent').css('display','block');
}

$('.setCampaignName').on('click',function(){
  campaignNameField = $('.campaignNameField').val();
  if (campaignNameField == '') {
    $('.campaignNameField').css('border-bottom','2px solid red');
  }else{
    $('#title').val(campaignNameField);
    $('.stepOneContent').css('display','none');
    $('.stepTwoContent').css('display','block');
    $('.stepCount').html('2 <br>Step');
  }
});

$('.stepCard').on('click',function(){
  $('.stepCard').css({
    'background':'#eaeaea',
    'outline':'none'
  });
  $('.stepCard').css('border','none');
  $(this).css('background','#89d8fb');
  $(this).css('outline','5px solid #89d8fb');

  var selectedOptinType = $(this).attr('data-OptinType');
  $('.selectedOptinType').val(selectedOptinType);
  $('.setCampaignType').trigger('click');
});

$('.setCampaignType').on('click',function(){
  var selectedOptinType = $('.selectedOptinType').val();
  if (selectedOptinType == '') {
  }else{
    pageBuilderApp.PageBuilderModel.set( 'optinType', selectedOptinType );
    $('.template-card').hide();
    $('.stepTwoContent').css('display','none');
    $('.stepThreeContent').css('display','block');
    $('.'+selectedOptinType+'-templates').css('display','block');

    $('.template-card:contains("'+selectedOptinType+'")').show();
    $('.stepCount').html('3 <br>Step<br>');

    if (selectedOptinType =='Side') {
      $('.displayOnBox').css('display','none');
    }else{
      $('.displayOnBox').css('display','block');
    }

    

    if (selectedOptinType == 'PopUp' || selectedOptinType == 'Side' || selectedOptinType =='Inline' || selectedOptinType == 'FlyIn' ) {
      $('#initializeCampaignSetup').css({
        'overflow':'scroll'
      });
    } else{
      $('#initializeCampaignSetup').css({
        'overflow':'scroll'
      });
    }
  }
});


$('.setTemplateStepPrev').on('click',function(){
  $('.stepTwoContent').css('display','block');
  $('.stepThreeContent').css('display','none');
}); 


$('.template-card').on('click',function(){
  $('.template-card').css('background-color','#f0f0f0');
  $('.appendedupdatebtn').remove();
  
  $(this).children('input').prop("checked",true);
  if ($(this).hasClass('prem-temp')) {
    $(this).css('background-color','#ea5b53');
  }else{
    $(this).append(' <div class="nxtStepBtn updateTemplate appendedupdatebtn" style="width:50% !important; background:#4CAF50; color:#fff;"> Next </div> ');
    $(this).css('background-color','#89d8fb');

  }
});

})(jQuery);