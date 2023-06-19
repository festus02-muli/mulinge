<script>
            var thisOptinType_<?php echo "$this_popup_unique_Id = '$selectedOptinType'" ?>;
            var popUpPosition_<?php echo "$this_popup_unique_Id = '$popupPosition'" ?>;
          </script>
          <script>
            ( function( $ ) {

              function pluginOpsModalScript_<?php echo $this_popup_unique_Id; ?>(popUpDisplayActionType){

              

                function checkPopupHeightAndAdjustPosition(){

                  var windowHeight = window.innerHeight;
                  var popupHeight = $('.pluginops-modal-content').innerHeight();
                  var calculatedHeight = windowHeight - (windowHeight * .20);

                  if(popupHeight > calculatedHeight){ 

                    $('#pluginops-modal-content_<?php echo($this_popup_unique_Id); ?>').css('height','100vh');
                    $('#pluginops-modal-content_<?php echo($this_popup_unique_Id); ?>').css('margin-top','15vh');

                  }

                }

                function adjustBodyPaddingWhenBarOptinShow(popUpPosition){
                    var popUpHeight = $('#POPB-modal-overlay_<?php echo($this_popup_unique_Id); ?>').height();
                    if (popUpPosition == 'top') {
                            $('body').animate({'padding-top':popUpHeight+'px'});
                          }
                          if (popUpPosition == 'bottom') {
                            $('body').animate({'padding-bottom':popUpHeight+'px'});
                          }
                }

                function adjustBodyPaddingWhenBarOptinHide(popUpPosition){
                    if (popUpPosition == 'top') {
                      $('body').animate({'padding-top':'0px'});
                    }
                    if (popUpPosition == 'bottom') {
                      $('body').animate({'padding-bottom':'0px'});
                    }
                }

                function showPopUp(){

                    $('#POPB-modal-overlay_<?php echo($this_popup_unique_Id); ?>').addClass(' animated  <?php echo($popUpEntranceAnimation); ?>');
                    $('#POPB-modal-overlay_<?php echo($this_popup_unique_Id); ?>').css('display','block');

                    if(thisOptinType_<?php echo "$this_popup_unique_Id" ?> == 'PopUp'){
                      checkPopupHeightAndAdjustPosition();
                    }

                    if(thisOptinType_<?php echo "$this_popup_unique_Id" ?> == 'Bar'){
                        adjustBodyPaddingWhenBarOptinShow(popUpPosition_<?php echo "$this_popup_unique_Id" ?>);
                    }
                    
                }

                if ($.cookie) {
                  var testUserSubscribed = $.cookie("pluginops_user_subscribed_form<?php echo $current_pageID; ?>");
                  var testPopUpClosed = $.cookie("pluginops_user_closed_form<?php echo $current_pageID; ?>");
                }else{
                  var testUserSubscribed = '';
                  var testPopUpClosed = '';
                }
                if (typeof(testUserSubscribed) == 'undefined') {
                  testUserSubscribed = '';
                }
                if (typeof(testPopUpClosed) == 'undefined') {
                  testPopUpClosed = '';
                }

                var <?php echo "popupClosed_$current_pageID"; ?> = 'false';
                <?php if (current_user_can('publish_pages')) {
                  echo "var testUserSubscribed = 'false'; ";
                  echo "var testPopUpClosed = 'false';";
                } 
                if ($hideAfterCampaignClosed !== 'true') {
                  echo "var testPopUpClosed = 'false'; ";
                }

                ?>

                if(typeof(popUpDisplayActionType) == 'undefined'){
                  popUpDisplayActionType = "delay";
                }
              
                if (testUserSubscribed == 'yes' || testPopUpClosed == 'yes') {
                  $('#POPB-modal-overlay_<?php echo($this_popup_unique_Id); ?>').css('display','none');
                  $('#POPB-modal-overlay_<?php echo($this_popup_unique_Id); ?>').hide('slow');
                }else{

                  if (popUpDisplayActionType == 'delay') {
                    setTimeout(function(){
                      showPopUp();

                    }, <?php echo $popupDisplayDelay.'000'; ?>);
                  }

                  if (popUpDisplayActionType == 'onscroll') {
                    $(window).on('scroll', function(){
                      var s = $(window).scrollTop(),
                          d = $(document).height(),
                          c = $(window).height();
                      var PoPb_scrollTopPercentage = (s / (d - c)) * 100;
                      var popUpOnScroll = parseInt(<?php echo $popupDisplayOnScroll; ?>);

                      if ( PoPb_scrollTopPercentage > popUpOnScroll && <?php echo "popupClosed_$current_pageID"; ?> != 'closed') {
                        showPopUp();
                      }
                    });
                  }

                  if (popUpDisplayActionType == 'onexit') {
                    
                    window.addEventListener("mouseout", function(ev) {
                          ev = ev ? ev : window.event;
                          var from = ev.relatedTarget || ev.toElement;
                          if (!from || from.nodeName == "HTML") {
                            if ( <?php echo "popupClosed_$current_pageID"; ?> != 'closed') {
                              showPopUp();
                            }
                          }
                      });
                  }
                  if (popUpDisplayActionType == 'onclick') {
                    var onclickElId = '<?php echo "$popupDisplayOnClick"; ?>';

                    $('#'+onclickElId).on('click', function(){
                      showPopUp();
                    });
                    $('.'+onclickElId).on('click', function(){
                      showPopUp();
                    });

                  }

                }


                $(document).ready(function(){
                  if (popUpDisplayActionType == 'onclick') {
                      var onclickElId = '<?php echo "$popupDisplayOnClick"; ?>';
                      if (onclickElId != '') {
                        $('#'+onclickElId).on('click', function(){
                          showPopUp();
                        });
                        $('.'+onclickElId).on('click', function(){
                          showPopUp();
                        });
                      }
                  }
                  $('#popb_popup_close_<?php echo($this_popup_unique_Id); ?>').on('click',function(){

                    $('#POPB-modal-overlay_<?php echo($this_popup_unique_Id); ?>').removeClass(' animated  <?php echo($popUpEntranceAnimation); ?>');
                    $('#POPB-modal-overlay_<?php echo($this_popup_unique_Id); ?>').addClass(' animated  <?php echo($popUpExitAnimation); ?>').one('animationend oAnimationEnd mozAnimationEnd webkitAnimationEnd', function(){
                        $('#POPB-modal-overlay_<?php echo($this_popup_unique_Id); ?>').removeClass(' animated  <?php echo($popUpExitAnimation); ?>');
                        $('#POPB-modal-overlay_<?php echo($this_popup_unique_Id); ?>').css('display','none');
                        $('#POPB-modal-overlay_<?php echo($this_popup_unique_Id); ?>').unbind('animationend oAnimationEnd mozAnimationEnd webkitAnimationEnd');
                      });
                    <?php echo "popupClosed_$current_pageID"; ?> = 'closed';

                    if(thisOptinType_<?php echo "$this_popup_unique_Id" ?> == 'Bar'){
                        adjustBodyPaddingWhenBarOptinHide(popUpPosition_<?php echo "$this_popup_unique_Id" ?>);
                    }

                    console.log(<?php echo "popupClosed_$current_pageID"; ?>);

                  });

                  $('.popb_popup_close_<?php echo($this_popup_unique_Id); ?>').on('click',function(){
                    $('#POPB-modal-overlay_<?php echo($this_popup_unique_Id); ?>').removeClass(' animated  <?php echo($popUpEntranceAnimation); ?>');
                    $('#POPB-modal-overlay_<?php echo($this_popup_unique_Id); ?>').addClass(' animated  <?php echo($popUpExitAnimation); ?>').one('animationend oAnimationEnd mozAnimationEnd webkitAnimationEnd', function(){
                        $('#POPB-modal-overlay_<?php echo($this_popup_unique_Id); ?>').removeClass(' animated  <?php echo($popUpExitAnimation); ?>');
                        $('#POPB-modal-overlay_<?php echo($this_popup_unique_Id); ?>').css('display','none');
                        $('#POPB-modal-overlay_<?php echo($this_popup_unique_Id); ?>').unbind('animationend oAnimationEnd mozAnimationEnd webkitAnimationEnd');
                      });
                    <?php echo "popupClosed_$current_pageID"; ?> = 'closed';

                    if(thisOptinType_<?php echo "$this_popup_unique_Id" ?> == 'Bar'){
                        adjustBodyPaddingWhenBarOptinHide(popUpPosition_<?php echo "$this_popup_unique_Id" ?>);
                    }

                    console.log(<?php echo "popupClosed_$current_pageID"; ?>);

                  });
                });

              }


              pluginOpsModalScript_<?php echo $this_popup_unique_Id; ?>( <?php echo "popUpDisplayActionType_$this_popup_unique_Id" ?>);
                
            })(jQuery);
          </script>