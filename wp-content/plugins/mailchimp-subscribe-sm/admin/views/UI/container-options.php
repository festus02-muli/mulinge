<?php if ( ! defined( 'ABSPATH' ) ) exit; ?>
<div class="lpp_modal_row pageops_modal">
  <div class="lpp_modal_wrapper_row">
    <div class="edit_options_left_row">
      <div class="tabs">
        <ul class="tab-links" style="background: #2fa8f9;">
          <li style="margin: 0;"  class="active"><a style="font-size:12px; padding: 10px; text-align: center;" href="#tabPageOptions" class="tab_link"> <i class="fa fa-gears" style="font-size: 20px;"></i> <br> Container Options</a></li>
          <li style="margin: 0;"><a style="font-size:12px; padding: 10px; text-align: center;" href="#tabPOnewWidget" class="tab_link"> <i class="fa  fa-plus-square" style="font-size: 20px;"></i> <br> New Widget</a></li>
        </ul>
        <div class="tab-content">
          <div id="tabPageOptions" class="tab active" style="min-height:400px;">
            <div class="tabs">
              <ul class="tab-links" style="background: #2fa8f9;">
                <li style="margin: 0;" class="active"><a href="#bodyStyleTab" class="tab_link">Container Style</a></li>
                <li style="margin: 0;"><a href="#PoGlobalStylestab" class="tab_link">Global Styles</a></li>
                <li style="margin: 0;"><a href="#PocustomCSStab" class="tab_link">Custom CSS</a></li>
                <li style="margin: 0;"><a href="#PocustomJStab" class="tab_link">Custom JS</a></li>
              </ul>
              <div class="tab-content" style="overflow: hidden; background: #fff;">
                <div id="bodyStyleTab" class="tab active">
                  <div class="pbp_form" style="min-height: 400px;padding:20px;">
                    <div>
                      <h4>Container Width
                        <span class="responsiveBtn rbt-l " > <i class="fa fa-desktop"></i> </span>   
                        <span class="responsiveBtn rbt-m " > <i class="fa fa-tablet"></i> </span>
                        <span class="responsiveBtn rbt-s " > <i class="fa fa-mobile-phone"></i> </span>
                      </h4>
                      <div class="responsiveOps responsiveOptionsContainterLarge">
                        <div class="pageMaxWidthSlider PoPbnumberSlider" data-targetRangeInput='pageMaxWidth'></div>
                        <input type="number" class="pageMaxWidth pageOpsField" style="width: 55px;">
                        <select class="pageMaxWidthU" style="width: 45px;">
                          <option value="%">%</option>
                          <option value="px">px</option>
                          <option value="vw">vw</option>
                        </select>
                      </div>
                      <div class="responsiveOps responsiveOptionsContainterMedium" style="display: none;">
                        <div class="pageMaxWidthSliderT PoPbnumberSlider" data-targetRangeInput='pageMaxWidthT'></div>
                        <input type="number" class="pageMaxWidthT pageOpsField" style="width: 55px;">
                        <select class="pageMaxWidthUT" style="width: 45px;">
                          <option value="%">%</option>
                          <option value="px">px</option>
                          <option value="vw">vw</option>
                        </select>
                      </div>
                      <div class="responsiveOps responsiveOptionsContainterSmall" style="display: none;">
                        <div class="pageMaxWidthSliderM PoPbnumberSlider" data-targetRangeInput='pageMaxWidthM'></div>
                        <input type="number" class="pageMaxWidthM pageOpsField" style="width: 55px;">
                        <select class="pageMaxWidthUM" style="width: 45px;">
                          <option value="%">%</option>
                          <option value="px">px</option>
                          <option value="vw">vw</option>
                        </select>
                      </div>
                    </div>
                    <br><br><hr><br>
                    
                    <br><br><hr><br>
                    <h4>Background</h4>
                    <div>
                      <div class="tabs">
                        <ul class="tab-links tabEditFields">
                          <li class="active"><a  href="#defaultbodyBgOptions" class="tab_link">Default</a></li>
                          <li><a  href="#hoverbodyBgOptions" class="tab_link">Hover</a></li>
                        </ul>
                        <div class="tab-content" style="box-shadow: none;">
                          <div id="defaultbodyBgOptions" class="tab active">
                            <br><br>
                            <div id="pluginops_input_tabs" class="popbinputTabsWrapper POPBInputNormalbody">
                              <p style="display: inline;"> Background Type </p>
                              <div class="iputTabNav">
                                <div class="popbNavItem" data-inptabID='content_popb_tab_1' title="Simple">
                                  <label for="inputID1"> <i class="fa fa-paint-brush"></i></label>
                                  <input type="radio" name="bodyBackgroundType" id="inputID1" value='solid' class="bodyBackgroundType bodyBackgroundTypeSolid tabbedInputRadio pageOpsField">
                                </div>
                                <div class="popbNavItem" data-inptabID='content_popb_tab_2' title="Gradient">
                                  <label for="inputID2 " class="GradientIcon"> <i class="fa fa-square"></i></label>
                                  <input type="radio" name="bodyBackgroundType" id="inputID2" class="bodyBackgroundType bodyBackgroundTypeGradient tabbedInputRadio pageOpsField" value="gradient">
                                </div>
                              </div>
                              <div class="popb_input_tabContent">
                                <div class="content_popb_tab_1 popb_tab_content">
                                  <br><br><br>
                                  <label>Color :</label>
                                  <input type="text" name="pageBgColor" class="color-picker_btn_two pageBgColor pageOpsField" data-alpha='true' id="pageBgColor" value='#fff'>
                                  <br> <br>
                                  <label>Image :</label>
                                  <input id="image_location_b" type="url" class=" pageBgImage upload_image_button0 pageOpsField"  name='lpp_add_img_0' value=' ' placeholder='Insert Image URL here' style="width:40%;" />
			                      <label></label>
			                      <input id="image_location_b" type="button" class="upload_bg0 pb_upload_btn" data-id="0" value="Upload"  />
                                  <br>
                                </div>
                                <div class="content_popb_tab_2 popb_tab_content">
                                  <br><br><br>
                                  <label>First Color </label>
                                  <input type="text" name="bodyGradientColorFirst" class="color-picker_btn_two bodyGradientColorFirst pageOpsField" data-alpha='true' id="bodyGradientColorFirst" value='#fff'>
                                  <p>Location</p>
                                  <div class="PoPbrangeSlider PoPbnumberSlider" data-targetRangeInput='bodyGradientLocationFirst'></div>
                                  <input type="number" class="bodyGradientLocationFirst pageOpsField">
                                  <br><br><hr>
                                  <br><br>
                                  <label>Second Color </label>
                                  <input type="text" name="bodyGradientColorSecond" class="color-picker_btn_two bodyGradientColorSecond pageOpsField" data-alpha='true' id="bodyGradientColorSecond" value='#fff'>
                                  <p>Location</p>
                                  <div class="PoPbrangeSlider PoPbnumberSlider" data-targetRangeInput='bodyGradientLocationSecond'></div>
                                  <input type="number" class="bodyGradientLocationSecond pageOpsField">
                                  <br><br>
                                  <hr>
                                  <br>
                                  <br>
                                  <label>Type </label>
                                  <select class="bodyGradientType pageOpsField">
                                    <option value="linear">Linear</option>
                                    <option value="radial">Radial</option>
                                  </select>
                                  <br>
                                  <br>
                                  <div class="bodyradialInput" style="">
                                    <br>
                                    <label>Position </label>
                                    <select class="bodyGradientPosition pageOpsField">
                                      <option value="center center">Center Center</option>
                                      <option value="center left">Center Left</option>
                                      <option value="center right">Center Right</option>
                                      <option value="top center">Top Center</option>
                                      <option value="top left">Top Left</option>
                                      <option value="top right">Top Right</option>
                                      <option value="bottom center">Bottom Center</option>
                                      <option value="bottom left">Bottom Left</option>
                                      <option value="bottom right">Bottom Right</option>
                                    </select>
                                    <br><br>
                                  </div>
                                  <div class="bodylinearInput" style="">
                                  <p>Angle</p>
                                    <div class="PoPbrangeSliderAngle PoPbnumberSlider" data-targetRangeInput='bodyGradientAngle'></div>
                                    <input type="number" class="bodyGradientAngle pageOpsField">
                                  </div>
                                  <br>
                                  <br>
                                </div>
                              </div>
                            </div>
                          </div>
                          <div id="hoverbodyBgOptions" class="tab" >
                            <br><br>
                            <div id="pluginops_input_tabs" class="popbinputTabsWrapper POPBInputNormalbody POPBInputHoverbody">
                              <p style="display: inline;"> Background Type </p>
                              <div class="iputTabNav">
                                <div class="popbNavItem" data-inptabID='content_popb_tab_1' title="Simple">
                                  <label for="inputIDHover1"> <i class="fa fa-paint-brush"></i></label>
                                  <input type="radio" name="bodyBackgroundTypeHover" id="inputIDHover1"  class="bodyBackgroundTypeHover bodyBackgroundTypeSolidHover tabbedInputRadio pageOpsField" value='solid'>
                                </div>
                                <div class="popbNavItem" data-inptabID='content_popb_tab_2' title="Gradient">
                                  <label for="inputIDHover2 " class="GradientIcon"> <i class="fa fa-square"></i></label>
                                  <input type="radio" name="bodyBackgroundTypeHover" id="inputIDHover2" class="bodyBackgroundTypeHover bodyBackgroundTypeGradientHover tabbedInputRadio pageOpsField" value="gradient">
                                </div>
                              </div>
                              <div class="popb_input_tabContent">
                                <div class="content_popb_tab_1 popb_tab_content">
                                  <br><br>
                                  <label>Color :</label>
                                  <input type="text" name="bodyBgColorHover" class="color-picker_btn_two bodyBgColorHover pageOpsField" data-alpha='true' id="bodyBgColorHover" value='#fff'>
                                  <br>
                                </div>
                                <div class="content_popb_tab_2 popb_tab_content">
                                  <br><br><br>
                                  <label>First Color </label>
                                  <input type="text" name="bodyGradientColorFirstHover" class="color-picker_btn_two bodyGradientColorFirstHover pageOpsField" data-alpha='true' id="bodyGradientColorFirstHover" value='#fff'>
                                  <p>Location</p>
                                  <div class="PoPbrangeSlider PoPbnumberSlider" data-targetRangeInput='bodyGradientLocationFirstHover'></div>
                                  <input type="number" class="bodyGradientLocationFirstHover pageOpsField">
                                  <br><br><hr>
                                  <br><br>
                                  <label>Second Color </label>
                                  <input type="text" name="bodyGradientColorSecondHover" class="color-picker_btn_two bodyGradientColorSecondHover pageOpsField" data-alpha='true' id="bodyGradientColorSecondHover" value='#fff'>
                                  <p>Location</p>
                                  <div class="PoPbrangeSlider PoPbnumberSlider" data-targetRangeInput='bodyGradientLocationSecondHover'></div>
                                  <input type="number" class="bodyGradientLocationSecondHover pageOpsField">
                                  <br><br>
                                  <hr>
                                  <br>
                                  <br>
                                  <label>Type </label>
                                  <select class="bodyGradientTypeHover pageOpsField">
                                    <option value="linear">Linear</option>
                                    <option value="radial">Radial</option>
                                  </select>
                                  <br>
                                  <br>
                                  <div class="radialInputHover" style="">
                                    <br>
                                    <label>Position </label>
                                    <select class="bodyGradientPositionHover pageOpsField">
                                      <option value="center center">Center Center</option>
                                      <option value="center left">Center Left</option>
                                      <option value="center right">Center Right</option>
                                      <option value="top center">Top Center</option>
                                      <option value="top left">Top Left</option>
                                      <option value="top right">Top Right</option>
                                      <option value="bottom center">Bottom Center</option>
                                      <option value="bottom left">Bottom Left</option>
                                      <option value="bottom right">Bottom Right</option>
                                    </select>
                                    <br><br>
                                  </div>
                                  <div class="linearInputHover" style="">
                                  <p>Angle</p>
                                    <div class="PoPbrangeSliderAngle PoPbnumberSlider" data-targetRangeInput='bodyGradientAngleHover'></div>
                                    <input type="number" class="bodyGradientAngleHover pageOpsField">
                                  </div>
                                  <br>
                                  <br>
                                </div>
                              </div>
                            </div>
                            <hr>
                            <br>
                            <p>Transition Duration</p>
                            <div class="PoPbrangeSliderTransition PoPbnumberSlider" data-targetRangeInput='bodyHoverTransitionDuration'></div>
                            <input type="number" class="bodyHoverTransitionDuration pageOpsField">
                            <br><br>
                          </div>
                        </div>
                      </div> 
                    </div>
                    <br>
                    <hr>
                    <br>
                    <h4>Overlay</h4>
                    <div>
                          <div id="defaultbodyBgOptions">
                            <br><br>
                            <div id="pluginops_input_tabs" class="popbinputTabsWrapper POPBInputNormalbody">
                              <p style="display: inline;"> Overlay Type </p>
                              <div class="iputTabNav">
                                <div class="popbNavItem" data-inptabID='content_popb_tab_1' title="Simple">
                                  <label for="inputID1"> <i class="fa fa-paint-brush"></i></label>
                                  <input type="radio" name="bodyOverlayBackgroundType" id="inputID1" value='solid' class="bodyOverlayBackgroundType bodyOverlayBackgroundTypeSolid tabbedInputRadio pageOpsField">
                                </div>
                                <div class="popbNavItem" data-inptabID='content_popb_tab_2' title="Gradient">
                                  <label for="inputID2 " class="GradientIcon"> <i class="fa fa-square"></i></label>
                                  <input type="radio" name="bodyOverlayBackgroundType" id="inputID2" class="bodyOverlayBackgroundType bodyOverlayBackgroundTypeGradient tabbedInputRadio pageOpsField" value="gradient">
                                </div>
                              </div>
                              <div class="">
                                <div class="content_popb_tab_1 popb_tab_content">
                                  <br><br><br>
                                  <label>Color :</label>
                                  <input type="text" name="bodyBgOverlayColor" class="color-picker_btn_two bodyBgOverlayColor pageOpsField" data-alpha='true' id="bodyBgOverlayColor" value='#fff'>
                                  <br> <br>
                                </div>
                                <div class="content_popb_tab_2 popb_tab_content">
                                  <br><br><br>
                                  <label>First Color </label>
                                  <input type="text" name="bodyOverlayGradientColorFirst" class="color-picker_btn_two bodyOverlayGradientColorFirst pageOpsField" data-alpha='true' id="bodyOverlayGradientColorFirst" value='#fff'>
                                  <p>Location</p>
                                  <div class="PoPbrangeSlider PoPbnumberSlider" data-targetRangeInput='bodyOverlayGradientLocationFirst'></div>
                                  <input type="number" class="bodyOverlayGradientLocationFirst pageOpsField">
                                  <br><br><hr>
                                  <br><br>
                                  <label>Second Color </label>
                                  <input type="text" name="bodyOverlayGradientColorSecond" class="color-picker_btn_two bodyOverlayGradientColorSecond pageOpsField" data-alpha='true' id="bodyOverlayGradientColorSecond" value='#fff'>
                                  <p>Location</p>
                                  <div class="PoPbrangeSlider PoPbnumberSlider" data-targetRangeInput='bodyOverlayGradientLocationSecond'></div>
                                  <input type="number" class="bodyOverlayGradientLocationSecond pageOpsField">
                                  <br><br>
                                  <hr>
                                  <br>
                                  <br>
                                  <label>Type </label>
                                  <select class="bodyOverlayGradientType pageOpsField">
                                    <option value="linear">Linear</option>
                                    <option value="radial">Radial</option>
                                  </select>
                                  <br>
                                  <br>
                                  <div class="radialInput" style="">
                                    <br>
                                    <label>Position </label>
                                    <select class="bodyOverlayGradientPosition pageOpsField">
                                      <option value="center center">Center Center</option>
                                      <option value="center left">Center Left</option>
                                      <option value="center right">Center Right</option>
                                      <option value="top center">Top Center</option>
                                      <option value="top left">Top Left</option>
                                      <option value="top right">Top Right</option>
                                      <option value="bottom center">Bottom Center</option>
                                      <option value="bottom left">Bottom Left</option>
                                      <option value="bottom right">Bottom Right</option>
                                    </select>
                                    <br><br>
                                  </div>
                                  <div class="linearInput" style="">
                                  <p>Angle</p>
                                    <div class="PoPbrangeSliderAngle PoPbnumberSlider" data-targetRangeInput='bodyOverlayGradientAngle'></div>
                                    <input type="number" class="bodyOverlayGradientAngle pageOpsField">
                                  </div>
                                  <br>
                                  <br>
                                </div>
                              </div>
                            </div>
                          </div>
                    </div>
                    <br>
                    <br>
                    <br>
                    <hr>
                    <br>
                    <div>
                      <h4>Container Padding    
                        <span class="responsiveBtn rbt-l " > <i class="fa fa-desktop"></i> </span>   
                        <span class="responsiveBtn rbt-m " > <i class="fa fa-tablet"></i> </span>
                        <span class="responsiveBtn rbt-s " > <i class="fa fa-mobile-phone"></i> </span>
                      </h4>
                      <div class="responsiveOps responsiveOptionsContainterLarge">
                        <input type="number" name="pagePaddingTop" class=" pageOpsField padding_inline_inp linkedField pagePaddingTop" id="pagePaddingTop" value="0"  placeholder="Top">

                        <input type="number" name="pagePaddingBottom" class=" pageOpsField padding_inline_inp linkedField pagePaddingBottom" id="pagePaddingBottom"  value="0" placeholder="Botom">

                        <input type="number" name="pagePaddingLeft" class=" pageOpsField padding_inline_inp linkedField pagePaddingLeft" id="pagePaddingLeft"  value="0" placeholder="Left">
                        
                        <input type="number" name="pagePaddingRight" class=" pageOpsField padding_inline_inp linkedField pagePaddingRight" id="pagePaddingRight"  value="0" placeholder="Right">

                        <span class="linkfieldBtn linkBtn linkedBtn" > <i class="fa fa-link"></i> </span>
                      </div>
                      <div class="responsiveOps responsiveOptionsContainterMedium" style="display: none;">
                        <input type="number" name="pagePaddingTopTablet" class=" pageOpsField padding_inline_inp linkedField  pagePaddingTopTablet " id="pagePaddingTopTablet"  placeholder="Top" >
                        
                        <input type="number" name="pagePaddingBottomTablet" class=" pageOpsField padding_inline_inp linkedField  pagePaddingBottomTablet " id="pagePaddingBottomTablet"  placeholder="Bottom">
                        
                        <input type="number" name="pagePaddingLeftTablet" class=" pageOpsField padding_inline_inp linkedField  pagePaddingLeftTablet " id="pagePaddingLeftTablet"  placeholder="Left">
                        
                        <input type="number" name="pagePaddingRightTablet" class=" pageOpsField padding_inline_inp linkedField  pagePaddingRightTablet " id="pagePaddingRightTablet"  placeholder="Right">

                        <span class="linkfieldBtn linkBtn linkedBtn" > <i class="fa fa-link"></i> </span>
                      </div>
                      <div class="responsiveOps responsiveOptionsContainterSmall" style="display: none;">
                        <input type="number" name="pagePaddingTopMobile" class=" pageOpsField padding_inline_inp linkedField  pagePaddingTopMobile " id="pagePaddingTopMobile"  placeholder="Top" >
                        
                        <input type="number" name="pagePaddingBottomMobile" class=" pageOpsField padding_inline_inp linkedField  pagePaddingBottomMobile " id="pagePaddingBottomMobile"  placeholder="Bottom">
                        
                        <input type="number" name="pagePaddingLeftMobile" class=" pageOpsField padding_inline_inp linkedField  pagePaddingLeftMobile " id="pagePaddingLeftMobile"  placeholder="Left">
                        
                        <input type="number" name="pagePaddingRightMobile" class=" pageOpsField padding_inline_inp linkedField  pagePaddingRightMobile " id="pagePaddingRightMobile"  placeholder="Right">

                        <span class="linkfieldBtn linkBtn linkedBtn" > <i class="fa fa-link"></i> </span>
                      </div>
                    </div>
                    <br>
                    <br>
                    <hr>
                    <br>
                    <br>
                    <label>Border Type </label>
                    <select class="bodyBorderType pageOpsField">
                      <option class="solid">Solid</option>
                      <option class="dashed">Dashed</option>
                      <option class="dotted">Dotted</option>
                      <option class="double">Double</option>
                    </select>
                    <br><br><hr><br><br>
                    <label>Border Width</label>
                    <input type="number" class="bodyBorderWidth pageOpsField">
                    <br><br><hr><br><br>
                    <p>Corner Radius</p>

                    <input type="number" class="bbrt pageOpsField padding_inline_inp linkedField" placeholder="Top Left">

                    <input type="number" class="bbrr pageOpsField padding_inline_inp linkedField" placeholder="Top Right">

                    <input type="number" class="bbrb pageOpsField padding_inline_inp linkedField" placeholder="Bottom Right">

                    <input type="number" class="bbrl pageOpsField padding_inline_inp linkedField" placeholder="Bottom Left">

                    <span class="linkfieldBtn linkBtn linkedBtn" > <i class="fa fa-link"></i> </span>
                    <br><br><hr><br><br>
                    <label>Border Color</label>
                    <input type="text" name="bodyBorderColor" class="color-picker_btn_two bodyBorderColor pageOpsField" data-alpha='true' id="bodyBorderColor" value='none'>
                    <br><br><hr><br><br>
                  </div>
                </div>
                <div id="PocustomCSStab" class="tab">
                  <div class="pbp_form" style="min-height: 400px;padding:20px; width: 100%; min-width: 450px;">
                    <h4>Head Section Custom CSS <span style="font-size:10px;"> Without <\style> tags.</span> </h4>
                    <div style="height: 388px; margin-bottom: 150px; width: 390px;">
                      <div id="PbPOaceEditorCSS"  class="POcustomCSS"></div>
                    </div>
                  </div>
                </div>
                <div id="PocustomJStab" class="tab">
                  <div class="pbp_form" style="min-height: 400px;padding:20px; width: 100%; min-width: 450px;">
                    <h4>Head Section Custom JS <span style="font-size:10px;"> Without <\script> tags.</span> </h4>
                    <div style="height: 388px; margin-bottom: 150px; width: 390px;">
                      <div id="PbPOaceEditorJS"  class="POcustomJS"></div>
                    </div>
                  </div>
                </div>
                <div id="PoGlobalStylestab" class="tab">
                  
                  <div class="pbp_form" style="min-height: 400px;padding:20px; width: 100%; min-width: 450px;">
                    <br>
                    <label>Enable Global Styles</label>
                    <select class="pageOpsField POPBDefaultsEnable">
                      <option value="false">Disable</option>
                      <option value="true">Enable</option>
                    </select>
                    <br><br><br><hr><br>
                    <h4>Font Family</h4>
                    <label>Main Heading Font :</label>
                    <input class="pageOpsField typefaceHOne gFontSelectorulpb" id="typefaceHOne">
                    <br><br><br><hr><br>
                    <label>Sub Heading Font :</label>
                    <input class="pageOpsField typefaceHTwo gFontSelectorulpb" id="typefaceHTwo">
                    <br><br><br><hr><br>
                    <label>Paragraph Font :</label>
                    <input class="pageOpsField typefaceParagraph gFontSelectorulpb" id="typefaceParagraph">
                    <br><br><br><hr><br>
                    <label>Button Font :</label>
                    <input class="pageOpsField typefaceButton gFontSelectorulpb" id="typefaceButton">
                    <br><br><br><hr><br>
                    <label>Anchor Link Font :</label>
                    <input class="pageOpsField typefaceAnchorLink gFontSelectorulpb" id="typefaceAnchorLink">
                    <br><br><br><hr><br>
                    <h4>Global Page Font Sizes</h4>
                    <br><br>
                    <div>
                      <p>Main Heading Size (H1)   
                        <span class="responsiveBtn rbt-l " > <i class="fa fa-desktop"></i> </span>   
                        <span class="responsiveBtn rbt-m " > <i class="fa fa-tablet"></i> </span>
                        <span class="responsiveBtn rbt-s " > <i class="fa fa-mobile-phone"></i> </span>
                      </p>
                      <div class="responsiveOps responsiveOptionsContainterLarge">
                        <label></label>
                        <input type="number" class="pageOpsField typeSizeHOne" id="typeSizeHOne">px
                      </div>
                      <div class="responsiveOps responsiveOptionsContainterMedium" style="display: none;">
                        <label></label>
                        <input type="number" class="pageOpsField typeSizeHOneTablet" id="typeSizeHOneTablet">px
                      </div>
                      <div class="responsiveOps responsiveOptionsContainterSmall" style="display: none;">
                        <label></label>
                        <input type="number" class="pageOpsField typeSizeHOneMobile" id="typeSizeHOneMobile">px
                      </div>
                    </div>
                    <br><br><br><hr>
                    <div>
                      <p>Sub Heading Size   
                        <span class="responsiveBtn rbt-l " > <i class="fa fa-desktop"></i> </span>   
                        <span class="responsiveBtn rbt-m " > <i class="fa fa-tablet"></i> </span>
                        <span class="responsiveBtn rbt-s " > <i class="fa fa-mobile-phone"></i> </span>
                      </p>
                      <div class="responsiveOps responsiveOptionsContainterLarge">
                        <label></label>
                        <input type="number" class="pageOpsField typeSizeHTwo" id="typeSizeHTwo">px
                      </div>
                      <div class="responsiveOps responsiveOptionsContainterMedium" style="display: none;">
                        <label></label>
                        <input type="number" class="pageOpsField typeSizeHTwoTablet" id="typeSizeHTwoTablet">px
                      </div>
                      <div class="responsiveOps responsiveOptionsContainterSmall" style="display: none;">
                        <label></label>
                        <input type="number" class="pageOpsField typeSizeHTwoMobile" id="typeSizeHTwoMobile">px
                      </div>
                    </div>
                    <br><br><br><hr>
                    <div>
                      <p>Paragraph Size
                        <span class="responsiveBtn rbt-l " > <i class="fa fa-desktop"></i> </span>   
                        <span class="responsiveBtn rbt-m " > <i class="fa fa-tablet"></i> </span>
                        <span class="responsiveBtn rbt-s " > <i class="fa fa-mobile-phone"></i> </span>
                      </p>
                      <div class="responsiveOps responsiveOptionsContainterLarge">
                        <label></label>
                        <input type="number" class="pageOpsField typeSizeParagraph" id="typeSizeParagraph">px
                      </div>
                      <div class="responsiveOps responsiveOptionsContainterMedium" style="display: none;">
                        <label></label>
                        <input type="number" class="pageOpsField typeSizeParagraphTablet" id="typeSizeParagraphTablet">px
                      </div>
                      <div class="responsiveOps responsiveOptionsContainterSmall" style="display: none;">
                        <label></label>
                        <input type="number" class="pageOpsField typeSizeParagraphMobile" id="typeSizeParagraphMobile">px
                      </div>
                    </div>
                    <br><br><br><hr>
                    <div>
                      <p>Button Size
                        <span class="responsiveBtn rbt-l " > <i class="fa fa-desktop"></i> </span>   
                        <span class="responsiveBtn rbt-m " > <i class="fa fa-tablet"></i> </span>
                        <span class="responsiveBtn rbt-s " > <i class="fa fa-mobile-phone"></i> </span>
                      </p>
                      <div class="responsiveOps responsiveOptionsContainterLarge">
                        <label></label>
                        <input type="number" class="pageOpsField typeSizeButton" id="typeSizeButton">px
                      </div>
                      <div class="responsiveOps responsiveOptionsContainterMedium" style="display: none;">
                        <label></label>
                        <input type="number" class="pageOpsField typeSizeButtonTablet" id="typeSizeButtonTablet">px
                      </div>
                      <div class="responsiveOps responsiveOptionsContainterSmall" style="display: none;">
                        <label></label>
                        <input type="number" class="pageOpsField typeSizeButtonMobile" id="typeSizeButtonMobile">px
                      </div>
                    </div>
                    <br><br><br><hr>
                    <div>
                      <p>Anchor Link Size
                        <span class="responsiveBtn rbt-l " > <i class="fa fa-desktop"></i> </span>   
                        <span class="responsiveBtn rbt-m " > <i class="fa fa-tablet"></i> </span>
                        <span class="responsiveBtn rbt-s " > <i class="fa fa-mobile-phone"></i> </span>
                      </p>
                      <div class="responsiveOps responsiveOptionsContainterLarge">
                        <label></label>
                        <input type="number" class="pageOpsField typeSizeAnchorLink" id="typefaceAnchorLink">px
                      </div>
                      <div class="responsiveOps responsiveOptionsContainterMedium" style="display: none;">
                        <label></label>
                        <input type="number" class="pageOpsField typeSizeAnchorLinkTablet" id="typeSizeAnchorLinkTablet">px
                      </div>
                      <div class="responsiveOps responsiveOptionsContainterSmall" style="display: none;">
                        <label></label>
                        <input type="number" class="pageOpsField typeSizeAnchorLinkMobile" id="typeSizeAnchorLinkMobile">px
                      </div>
                    </div>
                    <br><br><br><hr><br>
                    <br>
                    <br>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div id="tabPOnewWidget" class="tab" style="min-height:550px;">
            
            <div class="edit_column_widgets">
            <div class="tabs">
              <ul class="tab-links">
              </ul>
              <div class="tab-content" style="padding:10px 0px 15px 15px; background: #fff;">
                <input type="text" class="pbSearchWidget" placeholder="Search a widget" style="width: 90%;">
                <div id="tabFreeWidgets" class="tab active" style="" >
                  <?php

                            $proWidgetLoaded = false;

                            if (is_plugin_active( 'PluginOps-Optin-Builder-Extensions-Pack/extension-pack.php' ) || is_plugin_active( 'PluginOps-Extensions-Pack/extension-pack.php' ) ) {
                                if (function_exists('smfb_available_pro_widgets') ) {
                                  smfb_available_pro_widgets();
                                  $proWidgetLoaded = true;
                                } elseif (function_exists('ulpb_available_pro_widgets') ) {
                                  ulpb_available_pro_widgets();
                                  $proWidgetLoaded = true;
                                }

                                
                            }

                            if($proWidgetLoaded == false) {
                                ?>
                                  <div style="display: inline-block; width: 49%; float: left;">


                                        <div class="widget POPB_widget wdt-draggable" data-type="wigt-pb-liveText"><i class="fa fa-edit"></i> <br>Text Editor</div>

                                        <div class="widget POPB_widget wdt-draggable" data-type="wigt-img"><i class="fa fa-picture-o"></i> <br> Image</div>

                                        <div class="widget POPB_widget wdt-draggable" data-type="wigt-pb-navmenu"><i class="fa fa-navicon"></i> <br>Nav Builder</div>

                                        <div class="widget POPB_widget wdt-draggable" data-type="wigt-menu"><i class="fa fa-navicon"></i> <br> Menu</div>

                                        <div class="widget POPB_widget wdt-draggable" data-type="wigt-pb-formBuilder"> <i class="fa fa-wpforms"></i> <br> Form Builder</div>

                                        <div class="widget POPB_widget" data-type="wigt-video"> <i class="fa fa-video-camera"></i> <br>  Video</div>

                                        <div class="widget POPB_widget wdt-draggable" data-type="wigt-pb-audio"> <i class="fa fa-file-audio-o"></i> <br>  Audio</div>

                                        <div class="widget POPB_widget wdt-draggable" data-type="wigt-pb-anchor"> <i class="fa fa-anchor"></i> <br> Anchor </div>

                                        <div class="widget POPB_widget wdt-draggable" data-type="wigt-pb-break"> <i class="fa fa-ellipsis-h"></i> <br> Break </div>

                                        <div class="widget POPB_widget prem-widget" data-type="wigt-pb-embededVideo"> <i class="fa fa-youtube-play"></i> <br> Embed Video </div>

                                        <div class="widget POPB_widget prem-widget" data-type="wigt-pb-shortcode"><i class="fa fa-code"></i> <br> ShortCode </div>

                                        <div class="widget POPB_widget prem-widget" data-type="wigt-pb-imageSlider"><i class="fa fa-file-image-o"></i> <br> Image Slider </div>

                                        <div class="widget POPB_widget prem-widget" data-type="wigt-pb-pricing"><i class="fa fa-tags"></i> <br> Pricing </div>

                                        <div class="widget POPB_widget prem-widget" data-type="wigt-pb-imgCarousel"><i class="fa fa-image"></i><i class="fa fa-image"></i>  <br> Image Carousel </div>

                                        <div class="widget POPB_widget prem-widget" data-type="wigt-pb-countdown"><i class="fa fa-sort-numeric-desc"></i> <br> Countdown </div>

                                        <div class="widget POPB_widget prem-widget" data-type="wigt-pb-progressBar"><i class="fa fa-align-left"></i> <br> Progress Bar </div>

                                    
                                  </div>

                                  <div style="display: inline-block; width: 49%;">


                                        <div class="widget POPB_widget wdt-draggable" data-type="wigt-pb-text"><i class="fa fa-text-width"></i> <br> Heading </div>

                                        <div class="widget POPB_widget wdt-draggable" data-type="wigt-btn-gen"><i class="fa fa-mouse-pointer"></i> <br> Button</div>

                                        <div class="widget POPB_widget wdt-draggable" data-type="wigt-pb-gallery"><i class="fa fa-image"></i> <i class="fa fa-image"></i> <br>Image Gallery</div>

                                        <div class="widget POPB_widget wdt-draggable" data-type="wigt-pb-postSlider"><i class="fa fa-file-image-o"></i> <br> Posts Slider</div>

                                        <div class="widget POPB_widget wdt-draggable" data-type="wigt-pb-form"> <i class="fa fa-envelope-o" aria-hidden="true"></i> <br> Subscribe Form</div>

                                        <div class="widget POPB_widget wdt-draggable" data-type="wigt-pb-icons"><i class="fa fa-fonticons"></i> <br> Icons</div>

                                        <div class="widget POPB_widget wdt-draggable" data-type="wigt-pb-spacer"> <i class="fa fa-arrows-v"></i> <br> Spacer </div>

                                        <div class="widget POPB_widget wdt-draggable" data-type="wigt-pb-popupClose"><i class="fa fa-remove"></i> <br> PopUp Close</div>

                                        <div class="widget POPB_widget wdt-draggable" data-type="wigt-WYSIWYG"><i class="fa fa-file-text-o"></i> <br> HTML Editor</div>

                                        <div class="widget POPB_widget prem-widget" data-type="wigt-pb-iconList"> <i class="fa fa-list"></i> <br> Icon List</div>

                                        <div class="widget POPB_widget prem-widget" data-type="wigt-pb-testimonialCarousel"><i class="fa fa-quote-left"></i> <br> Testimonial Slider </div>

                                        <div class="widget POPB_widget prem-widget" data-type="wigt-pb-cards"><i class="fa fa-fonticons"></i> <br> Card </div>

                                        <div class="widget POPB_widget prem-widget" data-type="wigt-pb-testimonial"><i class="fa fa fa-quote-left"></i> <br> Testimonial </div>

                                        <div class="widget POPB_widget prem-widget" data-type="wigt-pb-counter"> <i class="fa fa-sort-numeric-desc"></i> <br> Counter </div>

                                        <div class="widget POPB_widget prem-widget" data-type="wigt-pb-wooCommerceProducts"> <i class="fa fa-shopping-cart"></i> <br> WooCommerce Products </div>


                                  </div>
                                  <br><br><br><br><br><br><br><br><br>
                                  <a href="https://pluginops.com/optin-builder/?ref=Optin_widgets" target="_blank" style="padding:8px 10px; text-decoration: none; font-size: 18px; text-align: center; color: #fff; background:#FF9800; border-radius: 3px; width: 90%; display:block; box-shadow: 10px 10px 25px #00000029;"> Unlock All These Amazing Widgets </a> <br><br><br>

                                <?php
                            }

                  ?>
                </div>
                <div id="tabAdvancedWidgets" class="tab">
                  
                  
                  </div>
                </div>
              </div>
              </div>
          </div>
        </div>
      </div>

            



    </div>
    <div  class="closePageOpsBtn" style="">
        <div ><span class="dashicons dashicons-arrow-left editSaveVisibleIcon" ></span></div><p></p><br>
    </div>
  </div>
</div>
<div  class="openPageOpsBtn" style="">
  <div ><span  class="dashicons dashicons-arrow-right editSaveVisibleIcon" ></span></div><p></p><br>
</div>