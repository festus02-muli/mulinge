<?php if ( ! defined( 'ABSPATH' ) ) exit; 
$pbPP_imgFolderURL = SMFB_PLUGIN_URL.'/images/templates/thumbs/';

$loadProTemplate = false;
if ( is_plugin_active('PluginOps-Optin-Builder-Extensions-Pack/extension-pack.php') ) {
    if ( function_exists('smfb_load_templates_pro') ) {
        //smfb_load_templates_pro($pbPP_imgFolderURL);
        //$loadProTemplate = true;
    }
}

if ($loadProTemplate == false){
?>
<div id="mainTemplatesContianer"></div>

<script type="text/javascript">
    ( function( $ ) {
        

            var rowBlockNames = {
                'temp12':{
                    tempname : 12,
                    tempCat:'Side , PopUp , Fly In',
                    isPro:true,
                },
                'temp14':{
                    tempname : 14,
                    tempCat:'Inline , PopUp , Full Page',
                    isPro:true,
                },
                'temp15':{
                    tempname : 15,
                    tempCat:'Inline , PopUp ',
                    isPro:true,
                },
                'temp16':{
                    tempname : 16,
                    tempCat:'Inline , PopUp , Full Page',
                    isPro:true,
                },
                'temp17':{
                    tempname : 17,
                    tempCat:'Inline , PopUp ',
                    isPro:true,
                },
                'temp18':{
                    tempname : 18,
                    tempCat:'Inline , PopUp ',
                    isPro:true,
                },
                'temp19':{
                    tempname : 19,
                    tempCat:'Inline , PopUp ',
                    isPro:true,
                },
                'temp20':{
                    tempname : 20,
                    tempCat:'Inline , PopUp ',
                    isPro:true,
                },
                'temp21':{
                    tempname : 21,
                    tempCat:'Side , PopUp , Fly In',
                    isPro:true,
                },
                'temp22':{
                    tempname : 22,
                    tempCat:'PopUp',
                    isPro:true,
                },
                'temp23':{
                    tempname : 23,
                    tempCat:'Inline , PopUp ',
                    isPro:true,
                },
                'temp25':{
                    tempname : 25,
                    tempCat:'Inline , PopUp ',
                    isPro:true,
                },
                'temp27':{
                    tempname : 27,
                    tempCat:'Bar',
                    isPro:true,
                },
                'temp28':{
                    tempname : 28,
                    tempCat:'Side , PopUp , Fly In',
                    isPro:true,
                },
                'temp29':{
                    tempname : 29,
                    tempCat:'Bar',
                    isPro:true,
                },
                'temp31':{
                    tempname : 31,
                    tempCat:'Bar',
                    isPro:true,
                },
                'temp33':{
                    tempname : 33,
                    tempCat:'Full Page',
                    isPro:true,
                },
                'temp34':{
                    tempname : 34,
                    tempCat:' Full Page',
                    isPro:true,
                },
                'temp36':{
                    tempname : 36,
                    tempCat:'Side , PopUp , Fly In',
                    isPro:true,
                },
                'temp37':{
                    tempname : 37,
                    tempCat:'Bar',
                    isPro:true,
                },
                'temp38':{
                    tempname : 38,
                    tempCat:'Inline',
                    isPro:true,
                },
                'temp39':{
                    tempname : 39,
                    tempCat:'Bar',
                    isPro:true,
                },
                'temp40':{
                    tempname : 40,
                    tempCat:'Side',
                    isPro:true,
                },
                'temp60':{
                    tempname : 60,
                    tempCat:'PopUp, Inline',
                    isPro:true,
                },
                'temp62':{
                    tempname : 62,
                    tempCat:'PopUp, Inline , Fly In , Side',
                    isPro:true,
                },
                'temp63':{
                    tempname : 63,
                    tempCat:'PopUp, Inline',
                    isPro:true,
                },
                'temp42':{
                    tempname : 42,
                    tempCat:'Inline , PopUp',
                    isPro:true,
                },
                'temp43':{
                    tempname : 43,
                    tempCat:'Inline , PopUp',
                    isPro:true,
                },
                'temp44':{
                    tempname : 44,
                    tempCat:'Inline , PopUp',
                    isPro:true,
                },
                'temp45':{
                    tempname : 45,
                    tempCat:'Full Page',
                    isPro:true,
                },
                'temp46':{
                    tempname : 47,
                    tempCat:'Full Page',
                    isPro:true,
                },
                'temp47':{
                    tempname : 46,
                    tempCat:'Full Page',
                    isPro:true,
                },
                'temp48':{
                    tempname : 48,
                    tempCat:'Inline , PopUp',
                    isPro:true,
                },
                'temp50':{
                    tempname : 50,
                    tempCat:'PopUp , Fly In',
                    isPro:true,
                },
                'temp51':{
                    tempname : 51,
                    tempCat:'PopUp , Fly In',
                    isPro:true,
                },
                'temp52':{
                    tempname : 52,
                    tempCat:'Bar',
                    isPro:true,
                },
                'temp53':{
                    tempname : 53,
                    tempCat:'Full Page',
                    isPro:true,
                },
                'temp54':{
                    tempname : 54,
                    tempCat:'Full Page',
                    isPro:true,
                },
                'temp55':{
                    tempname : 55,
                    tempCat:'PopUp',
                    isPro:true,
                },
                'temp56':{
                    tempname : 56,
                    tempCat:'PopUp',
                    isPro:true,
                },
                'temp61':{
                    tempname : 61,
                    tempCat:'PopUp, Inline , Fly In',
                    isPro:true,
                },
                'temp57':{
                    tempname : 57,
                    tempCat:'Side',
                    isPro:true,
                },
                'temp58':{
                    tempname : 58,
                    tempCat:'Fly In , Side',
                    isPro:true,
                },
                'temp59':{
                    tempname : 59,
                    tempCat:'Side',
                    isPro:true,
                },
                'temp41':{
                    tempname : 41,
                    tempCat:' PopUp , Fly In',
                    isPro:false,
                },
                'temp35':{
                    tempname : 35,
                    tempCat:'Side , PopUp , Fly In',
                    isPro:false,
                },
                'temp32':{
                    tempname : 32,
                    tempCat:' Full Page',
                    isPro:false,
                },
                'temp26':{
                    tempname : 26,
                    tempCat:'Bar',
                    isPro:false,
                },
                'temp30':{
                    tempname : 30,
                    tempCat:'Bar',
                    isPro:false,
                },
                'temp24':{
                    tempname : 24,
                    tempCat:' Bar ',
                    isPro:false,
                },
                'temp11':{
                    tempname : 11,
                    tempCat:'Side , PopUp , Fly In',
                    isPro:false,
                },
                'temp49':{
                    tempname : 49,
                    tempCat:'Inline , PopUp',
                    isPro:false,
                },
                'temp13':{
                    tempname : 13,
                    tempCat:'Inline , PopUp',
                    isPro:false,
                },
                'temp10':{
                    tempname : 10,
                    tempCat:'Inline , PopUp , Full Page',
                    isPro:false,
                },
                'temp00':{
                    tempname : 0,
                    tempCat:'Inline , PopUp , Full Page , Bar , Fly In',
                    isPro:false,
                },
            };
            $.each(rowBlockNames, function(index,val){

                val['isPro'] = false;

                if (val['isPro'] == true  && popb_admin_vars_data.isPremActive == 'false') {

                    var insertBtn = '<input disabled="disabled" type="radio" class="template_select" id="temp-'+val['tempname']+'" name="template_select" value="tempna">'
                        +'<label for="temp-'+val['tempname']+'"> <strike> Select </strike> <b>Pro Only</b> </label>';
                        var premTempClass = 'prem-temp';
                }else{
                    var insertBtn = '<input type="radio" class="template_select" id="temp-'+val['tempname']+'" name="template_select" value="temp'+val['tempname']+'">'
                        +'<label for="temp-'+val['tempname']+'"> Select </label>';
                        var premTempClass = ' ';
                }


                $('#mainTemplatesContianer').prepend(
                    '<div id="card" class="temp-prev-'+val['tempname']+' card template-card '+premTempClass+'">'
                      +'<div id="temp-prev-'+val['tempname']+'" class="tempPrev"> <p id="temp-prev-'+val['tempname']+'"><b>Preview</b></p></div>'
                        +'<label for="temp-'+val['tempname']+'"> <img src="<?php echo $pbPP_imgFolderURL.'template-'; ?>'+val['tempname']+'.png" data-img_src="https://ps.w.org/mailchimp-subscribe-sm/assets/screenshot-'+val['tempname']+'.png" class="card-img temp-prev-'+val['tempname']+'">'
                        +'<p class="card-desc"></p> </label>'
                        +insertBtn
                        +'<br><br>'
                        +'<span class="temp-cats-displayed">'+val['tempCat']+'</span>'
                    +'</div>'
                );

            });


          $('.card-img').mouseover(function(ev) {
            var tempprevbtn = $(ev.target).attr('class').split(' ')[1];
            $('#'+tempprevbtn).width($(ev.target).width());
            $('#'+tempprevbtn).height($(ev.target).height());
            var tempPhieght = $(ev.target).height();
            $('.tempPrev p').css('margin-top',tempPhieght/2);
            $('#'+tempprevbtn).slideDown(100);
          });

          $('.card').mouseleave(function(ev){
            $('.tempPrev').slideUp('100');
          });

          $('.tempPrev').click(function(ev) {
            var ths_tempprev = $(ev.target).attr('id');
            if (typeof(ths_tempprev) == 'undefined') {
                var ths_tempprev = $(ev.target).parent().attr('id');
            }
            $('.pb_preview_container').attr('style','display:block;overflow:auto; z-index:99999;');
            $('.pb_temp_prev').append('<img src='+$('img.'+ths_tempprev).attr('data-img_src')+' class="pb_temp_prev_img" >');
          });

          if (popb_admin_vars_data.isPremActive == 'true') {
            $('#templatesInstallDiv').css('display','none');
            $('#templatesInstallDiv').css('opacity','0');
          }
    }( jQuery ) );
</script>

<?php
} // end If
?>

<!-- 
 <script type="text/javascript">
        (function($){
            $(document).ready(function(){

                $('.card input').click(function(){

                  $('.card').children('.updateTemplate').remove();
                  $('.card').css('background-color','#f0f0f0');
                  $(this).parent('.card').css('background-color','#89d8fb');
                  if ($(this).parent('.card').hasClass('tempPack1')) {
                  }else{
                    $(this).parent('.card').append('<div id="updateTemplate" class="btn-green  updateTemplate" style=" margin-left:70px;">Update Template</div>');
                  }
                  
                  $('.updateTemplate').effect( "shake",{
                    distance:10,
                    times:2
                  } );
                });
            });
        })(jQuery);
    </script>

-->