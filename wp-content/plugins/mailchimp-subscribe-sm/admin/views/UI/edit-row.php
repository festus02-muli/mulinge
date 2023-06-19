<?php if ( ! defined( 'ABSPATH' ) ) exit; ?>
<div class="lpp_modal_row edit_row" style="background: #fff;">
  <div class="lpp_modal_wrapper_row">
  <div class="edit_options_left_row">
      <input type="hidden" class="currentEditingRow" value='' >
      <div class="tabs">
        <ul class="tab-links">
          <li style="margin: 0;"  class="active"><a style="font-size:12px; padding: 10px; text-align: center;" href="#tabRowOptions" class="tab_link"> <i class="fa fa-gears" style="font-size: 20px;"></i> <br> Row Options</a></li>
          <li style="margin: 0;"><a style="font-size:12px; padding: 10px; text-align: center;" href="#tabRowVideo" class="tab_link"> <i class="fab fa-youtube" style="font-size: 20px;"></i> <br> Background Video</a></li>
          <li style="margin: 0;"><a style="font-size:12px; padding: 10px; text-align: center;" href="#tabCustomCss" class="tab_link"> <i class="fa fa-code" style="font-size: 20px;"></i> <br> Custom CSS & JS</a></li>
        </ul>
        <div class="tab-content">
          <div id="tabRowOptions" class="tab active" style="min-height:400px;">
            <form id="rowOpsForm">
            <div class="pbp_form" style="width: 400px; margin: 10px;">
              <div>
                <label>Min Height  
                  <span class="responsiveBtn rbt-l " > <i class="fa fa-desktop"></i> </span>   
                  <span class="responsiveBtn rbt-m " > <i class="fa fa-tablet"></i> </span>
                  <span class="responsiveBtn rbt-s " > <i class="fa fa-mobile-phone"></i> </span>
                </label>
                <div class="responsiveOps responsiveOptionsContainterLarge">
                  <input type="number" name="row_height" id="row_height" placeholder="Set row height" class="edit_fields row_edit_fields" value='200' style="width:60px;" data-optname="rowHeight" >
                  <select class="row_height_unit row_edit_fields" style="width:50px;" data-optname="rowHeightUnit" >
                    <option value="px">px</option>
                    <option value="%">%</option>
                    <option value="vh">vh</option>
                  </select>
                </div>
                <div class="responsiveOps responsiveOptionsContainterMedium" style="display: none;">
                  <input type="number" name="rowHeightTablet" class="rowHeightTablet row_edit_fields" placeholder="Set row height" value='200' style="width:60px;" data-optname="rowHeightTablet">
                  <select class="rowHeightUnitTablet row_edit_fields" style="width:50px;" data-optname="rowHeightUnitTablet" >
                    <option value="px">px</option>
                    <option value="%">%</option>
                    <option value="vh">vh</option>
                  </select>
                </div>
                <div class="responsiveOps responsiveOptionsContainterSmall" style="display: none;">
                  <input type="number" name="rowHeightMobile" class="rowHeightMobile row_edit_fields" placeholder="Set row height" value='200' style="width:60px;" data-optname="rowHeightMobile" >
                  <select class="rowHeightUnitMobile row_edit_fields" style="width:50px;" data-optname="rowHeightUnitMobile" >
                    <option value="px">px</option>
                    <option value="%">%</option>
                    <option value="vh">vh</option>
                  </select>
                </div>
              </div>
              <br>
              <br>
              <br>
              <label>Container Width</label>
              <select data-optname="rowData.conType" class="edit_fields row_edit_fields">
                <option value="">Full Width</option>
                <option value="boxed">Boxed</option>
              </select>
              <br><br><br>
              <div class="boxedWidthOptionContainer" style="display: none;">
                <label>Container Width</label>
                <input type="number" data-optname="rowData.conWidth" class="edit_fields row_edit_fields">
                <br><br><br>
              </div>
              <label>Number of Columns :</label>
              <input type="number" name="number_of_columns" id="number_of_columns" placeholder="Number of columns in row" min="1" max="8"  class="edit_fields row_edit_fields" value='1' data-optname="columns" >
              <br>
              <br>
              <br>
              <hr><br>
              <div class="PB_accordion" style="margin-left: -10px;" >
                <h4>Background</h4>
                <div style="background: #fff;">
                  <div class="tabs">
                    <ul class="tab-links tabEditFields">
                      <li class="active"><a  href="#defaultRowBgOptions" class="tab_link">Default</a></li>
                      <li><a  href="#hoverRowBgOptions" class="tab_link">Hover</a></li>
                    </ul>
                    <div class="tab-content" style="box-shadow: none;">
                      <div id="defaultRowBgOptions" class="tab active">
                        <br><br>
                        <div id="pluginops_input_tabs" class="popbinputTabsWrapper POPBInputNormalRow">
                          <p style="display: inline;"> Background Type </p>
                          <div class="iputTabNav">
                            <div class="popbNavItem" data-inptabID='content_popb_tab_1' title="Simple">
                              <label for="inputID1"> <i class="fa fa-paint-brush"></i></label>
                              <input type="radio" name="rowBackgroundType" id="inputID1" value='solid' class="rowBackgroundType rowBackgroundTypeSolid tabbedInputRadio row_edit_fields" data-optname="rowData.rowBackgroundType" >
                            </div>
                            <div class="popbNavItem" data-inptabID='content_popb_tab_2' title="Gradient">
                              <label for="inputID2 " class="GradientIcon"> <i class="fa fa-square"></i></label>
                              <input type="radio" name="rowBackgroundType" id="inputID2" class="rowBackgroundType rowBackgroundTypeGradient tabbedInputRadio row_edit_fields" value="gradient" data-optname="rowData.rowBackgroundType" >
                            </div>
                          </div>
                          <div class="popb_input_tabContent">
                            <div class="content_popb_tab_1 popb_tab_content">
                              <br><br><br>
                              <label>Color :</label>
                              <input type="text" name="rowBgColor" class="color-picker_btn_two rowBgColor row_edit_fields" data-alpha='true' id="rowBgColor" value='#fff' data-optname="rowData.bg_color" >
                              <br> <br><br>
                              <div>
                                <label> <span title="Background Image">Bg Image</span>
                                  <span class="responsiveBtn rbt-l " > <i class="fa fa-desktop"></i> </span>
                                  <span class="responsiveBtn rbt-m " > <i class="fa fa-tablet"></i> </span>
                                  <span class="responsiveBtn rbt-s " > <i class="fa fa-mobile-phone"></i> </span>
                                </label>
                                <div class="responsiveOps responsiveOptionsContainterLarge">
                                  <input id="image_location1991" type="text" class="rowBgImg upload_image_button1991 row_edit_fields"  name='lpp_add_img_1' value='' placeholder='Insert Image URL here' data-optname="rowData.bg_img" > <br> <br>
                                  <label></label>
                                  <input id="image_location1991" type="button" class="upload_bg pb_upload_btn" data-id="1991" value="Upload"  style="" />
                                </div>
                                <div class="responsiveOps responsiveOptionsContainterMedium" style="display: none;" >
                                  <input id="image_location1992" type="text" class="upload_image_button1992 row_edit_fields"  name='lpp_add_img_1' value='' placeholder='Insert Image URL here' data-optname="rowData.bg_imgT" > <br> <br>
                                  <label></label>
                                  <input id="image_location1992" type="button" class="upload_bg pb_upload_btn" data-id="1992" value="Upload"  style="" />
                                </div>
                                <div class="responsiveOps responsiveOptionsContainterSmall" style="display: none;" >
                                  <input id="image_location1993" type="text" class="upload_image_button1993 row_edit_fields"  name='lpp_add_img_1' value='' placeholder='Insert Image URL here' data-optname="rowData.bg_imgM" > <br> <br>
                                  <label></label>
                                  <input id="image_location1993" type="button" class="upload_bg pb_upload_btn" data-id="1993" value="Upload"  style="" />
                                </div>
                              </div>
                              <br>
                              <br>
                              <br>
                              <br>
                              <div class="imageBackgroundOpsRow" style="display: none;">
                                <div>
                                  <label> Position 
                                    <span class="responsiveBtn rbt-l " > <i class="fa fa-desktop"></i> </span>   
                                    <span class="responsiveBtn rbt-m " > <i class="fa fa-tablet"></i> </span>
                                    <span class="responsiveBtn rbt-s " > <i class="fa fa-mobile-phone"></i> </span>
                                  </label>
                                  <div class="responsiveOps responsiveOptionsContainterLarge">
                                    <select class="row_edit_fields" data-optname="rowData.bgImgOps.pos" >
                                      <option value="">Default</option>
                                      <option value="top left">Top Left</option>
                                      <option value="top center">Top Center</option>
                                      <option value="top right">Top Right</option>
                                      <option value="center left">Center Left</option>
                                      <option value="center center">Center Center</option>
                                      <option value="center right">Center Right</option>
                                      <option value="bottom left">Bottom Left</option>
                                      <option value="bottom center">Bottom Center</option>
                                      <option value="bottom right">Bottom Right</option>
                                      <option value="custom">Custom</option>
                                    </select>
                                  </div>
                                  <div class="responsiveOps responsiveOptionsContainterMedium" style="display: none;">
                                    <select class="row_edit_fields" data-optname="rowData.bgImgOps.posT" >
                                      <option value="">Default</option>
                                      <option value="top left">Top Left</option>
                                      <option value="top center">Top Center</option>
                                      <option value="top right">Top Right</option>
                                      <option value="center left">Center Left</option>
                                      <option value="center center">Center Center</option>
                                      <option value="center right">Center Right</option>
                                      <option value="bottom left">Bottom Left</option>
                                      <option value="bottom center">Bottom Center</option>
                                      <option value="bottom right">Bottom Right</option>
                                      <option value="custom">Custom</option>
                                    </select>
                                  </div>
                                  <div class="responsiveOps responsiveOptionsContainterSmall" style="display: none;">
                                    <select class="row_edit_fields" data-optname="rowData.bgImgOps.posM" >
                                      <option value="">Default</option>
                                      <option value="top left">Top Left</option>
                                      <option value="top center">Top Center</option>
                                      <option value="top right">Top Right</option>
                                      <option value="center left">Center Left</option>
                                      <option value="center center">Center Center</option>
                                      <option value="center right">Center Right</option>
                                      <option value="bottom left">Bottom Left</option>
                                      <option value="bottom center">Bottom Center</option>
                                      <option value="bottom right">Bottom Right</option>
                                      <option value="custom">Custom</option>
                                    </select>
                                  </div>
                                </div>
                                <div class="rowBgImgCustomPositionDiv" style="display: none;">
                                  <br><br><br><br>
                                  <div>
                                    <label>X Position 
                                      <span class="responsiveBtn rbt-l " > <i class="fa fa-desktop"></i> </span>   
                                      <span class="responsiveBtn rbt-m " > <i class="fa fa-tablet"></i> </span>
                                      <span class="responsiveBtn rbt-s " > <i class="fa fa-mobile-phone"></i> </span>
                                    </label>
                                    <div class="responsiveOps responsiveOptionsContainterLarge">
                                      <input type="number" class="row_edit_fields" data-optname="rowData.bgImgOps.xPos" style="width:60px;" >
                                      <select class="row_edit_fields" style="width:50px;" data-optname="rowData.bgImgOps.xPosU" >
                                        <option value="px">px</option>
                                        <option value="%">%</option>
                                        <option value="vw">vw</option>
                                      </select>
                                    </div>
                                    <div class="responsiveOps responsiveOptionsContainterMedium" style="display: none;">
                                      <input type="number" class="row_edit_fields" data-optname="rowData.bgImgOps.xPosT" style="width:60px;" >
                                      <select class="row_edit_fields" style="width:50px;" data-optname="rowData.bgImgOps.xPosUT" >
                                        <option value="px">px</option>
                                        <option value="%">%</option>
                                        <option value="vw">vw</option>
                                      </select>
                                    </div>
                                    <div class="responsiveOps responsiveOptionsContainterSmall" style="display: none;">
                                      <input type="number" class="row_edit_fields" data-optname="rowData.bgImgOps.xPosM" style="width:60px;">
                                      <select class="row_edit_fields" style="width:50px;" data-optname="rowData.bgImgOps.xPosUM" >
                                        <option value="px">px</option>
                                        <option value="%">%</option>
                                        <option value="vw">vw</option>
                                      </select>
                                    </div>
                                  </div>
                                  <br><br><br><br>
                                  <div>
                                    <label>Y Position 
                                      <span class="responsiveBtn rbt-l " > <i class="fa fa-desktop"></i> </span>   
                                      <span class="responsiveBtn rbt-m " > <i class="fa fa-tablet"></i> </span>
                                      <span class="responsiveBtn rbt-s " > <i class="fa fa-mobile-phone"></i> </span>
                                    </label>
                                    <div class="responsiveOps responsiveOptionsContainterLarge">
                                      <input type="number" class="row_edit_fields" data-optname="rowData.bgImgOps.yPos" style="width:60px;" >
                                      <select class="row_edit_fields" style="width:50px;" data-optname="rowData.bgImgOps.yPosU" >
                                        <option value="px">px</option>
                                        <option value="%">%</option>
                                        <option value="vw">vw</option>
                                      </select>
                                    </div>
                                    <div class="responsiveOps responsiveOptionsContainterMedium" style="display: none;">
                                      <input type="number" class="row_edit_fields" data-optname="rowData.bgImgOps.yPosT" style="width:60px;" >
                                      <select class="row_edit_fields" style="width:50px;" data-optname="rowData.bgImgOps.yPosUT" >
                                        <option value="px">px</option>
                                        <option value="%">%</option>
                                        <option value="vw">vw</option>
                                      </select>
                                    </div>
                                    <div class="responsiveOps responsiveOptionsContainterSmall" style="display: none;">
                                      <input type="number" class="row_edit_fields" data-optname="rowData.bgImgOps.yPosM" style="width:60px;" >
                                      <select class="row_edit_fields" style="width:50px;" data-optname="rowData.bgImgOps.yPosUM" >
                                        <option value="px">px</option>
                                        <option value="%">%</option>
                                        <option value="vw">vw</option>
                                      </select>
                                    </div>
                                  </div>
                                </div>
                                <br><br><br><br>
                                <div>
                                  <label>Repeat 
                                    <span class="responsiveBtn rbt-l " > <i class="fa fa-desktop"></i> </span>
                                    <span class="responsiveBtn rbt-m " > <i class="fa fa-tablet"></i> </span>
                                    <span class="responsiveBtn rbt-s " > <i class="fa fa-mobile-phone"></i> </span>
                                  </label>
                                  <div class="responsiveOps responsiveOptionsContainterLarge">
                                    <select class="row_edit_fields" data-optname="rowData.bgImgOps.rep" >
                                      <option value="default">Default</option>
                                      <option value="no-repeat">No-repeat</option>
                                      <option value="repeat">Repeat</option>
                                      <option value="repeat-x">Repeat-x</option>
                                      <option value="repeat-y">Repeat-y</option>
                                    </select>
                                  </div>
                                  <div class="responsiveOps responsiveOptionsContainterMedium" style="display: none;">
                                    <select class="row_edit_fields" data-optname="rowData.bgImgOps.repT" >
                                      <option value="default">Default</option>
                                      <option value="no-repeat">No-repeat</option>
                                      <option value="repeat">Repeat</option>
                                      <option value="repeat-x">Repeat-x</option>
                                      <option value="repeat-y">Repeat-y</option>
                                    </select>
                                  </div>
                                  <div class="responsiveOps responsiveOptionsContainterSmall" style="display: none;">
                                    <select class="row_edit_fields" data-optname="rowData.bgImgOps.repM" >
                                      <option value="default">Default</option>
                                      <option value="no-repeat">No-repeat</option>
                                      <option value="repeat">Repeat</option>
                                      <option value="repeat-x">Repeat-x</option>
                                      <option value="repeat-y">Repeat-y</option>
                                    </select>
                                  </div>
                                </div>
                                <br><br><br><br>
                                <div>
                                  <label>Size 
                                    <span class="responsiveBtn rbt-l " > <i class="fa fa-desktop"></i> </span>   
                                    <span class="responsiveBtn rbt-m " > <i class="fa fa-tablet"></i> </span>
                                    <span class="responsiveBtn rbt-s " > <i class="fa fa-mobile-phone"></i> </span>
                                  </label>
                                  <div class="responsiveOps responsiveOptionsContainterLarge">
                                    <select class="row_edit_fields" data-optname="rowData.bgImgOps.size" >
                                      <option value="">Default</option>
                                      <option value="auto">Auto</option>
                                      <option value="cover">Cover</option>
                                      <option value="contain">Contain</option>
                                      <option value="custom">Custom</option>
                                    </select>
                                  </div>
                                  <div class="responsiveOps responsiveOptionsContainterMedium" style="display: none;">
                                    <select class="row_edit_fields" data-optname="rowData.bgImgOps.sizeT" >
                                      <option value="">Default</option>
                                      <option value="auto">Auto</option>
                                      <option value="cover">Cover</option>
                                      <option value="contain">Contain</option>
                                      <option value="custom">Custom</option>
                                    </select>
                                  </div>
                                  <div class="responsiveOps responsiveOptionsContainterSmall" style="display: none;">
                                    <select class="row_edit_fields" data-optname="rowData.bgImgOps.sizeM" >
                                      <option value="">Default</option>
                                      <option value="auto">Auto</option>
                                      <option value="cover">Cover</option>
                                      <option value="contain">Contain</option>
                                      <option value="custom">Custom</option>
                                    </select>
                                  </div>
                                </div>
                                <div class="rowBgImgCustomSizeDiv" style="display: none;">
                                  <br><br><br><br>
                                  <div>
                                    <label>Width 
                                      <span class="responsiveBtn rbt-l " > <i class="fa fa-desktop"></i> </span>   
                                      <span class="responsiveBtn rbt-m " > <i class="fa fa-tablet"></i> </span>
                                      <span class="responsiveBtn rbt-s " > <i class="fa fa-mobile-phone"></i> </span>
                                    </label>
                                    <div class="responsiveOps responsiveOptionsContainterLarge">
                                      <input class="row_edit_fields" data-optname="rowData.bgImgOps.cWid"  type="number" style="width:60px;" >
                                      <select class="row_edit_fields" style="width:50px;" data-optname="rowData.bgImgOps.widU" >
                                        <option value="px">px</option>
                                        <option value="%">%</option>
                                        <option value="vw">vw</option>
                                      </select>
                                    </div>
                                    <div class="responsiveOps responsiveOptionsContainterMedium" style="display: none;">
                                      <input class="row_edit_fields" data-optname="rowData.bgImgOps.cWidT"  type="number" style="width:60px;" >
                                      <select class="row_edit_fields" style="width:50px;" data-optname="rowData.bgImgOps.widUT" >
                                        <option value="px">px</option>
                                        <option value="%">%</option>
                                        <option value="vw">vw</option>
                                      </select>
                                    </div>
                                    <div class="responsiveOps responsiveOptionsContainterSmall" style="display: none;">
                                      <input class="row_edit_fields" data-optname="rowData.bgImgOps.cWidM"  type="number" style="width:60px;" >
                                      <select class="row_edit_fields" style="width:50px;" data-optname="rowData.bgImgOps.widUM" >
                                        <option value="px">px</option>
                                        <option value="%">%</option>
                                        <option value="vw">vw</option>
                                      </select>
                                    </div>
                                  </div>
                                </div>
                                <br><br><br><br>
                                <div>
                                  <label> <span title="Fixed Background">Fixed Bg</span>
                                    <span class="responsiveBtn rbt-l " > <i class="fa fa-desktop"></i> </span>   
                                    <span class="responsiveBtn rbt-m " > <i class="fa fa-tablet"></i> </span>
                                    <span class="responsiveBtn rbt-s " > <i class="fa fa-mobile-phone"></i> </span>
                                  </label>
                                  <div class="responsiveOps responsiveOptionsContainterLarge">
                                    <select class="rowBackgroundParallax row_edit_fields" id="rowBackgroundParallax" data-optname="rowData.rowBackgroundParallax" >
                                      <option value="">Select</option>
                                      <option value="true">Yes</option>
                                      <option value="false">No</option>
                                    </select>
                                  </div>
                                  <div class="responsiveOps responsiveOptionsContainterMedium" style="display: none;">
                                    <select class="row_edit_fields" data-optname="rowData.bgImgOps.parlxT" >
                                      <option value="">Select</option>
                                      <option value="true">Yes</option>
                                      <option value="false">No</option>
                                    </select>
                                  </div>
                                  <div class="responsiveOps responsiveOptionsContainterSmall" style="display: none;">
                                    <select class="row_edit_fields" data-optname="rowData.bgImgOps.parlxM" >
                                      <option value="">Select</option>
                                      <option value="true">Yes</option>
                                      <option value="false">No</option>
                                    </select>
                                  </div>
                                </div>
                                
                              </div>

                            </div>
                            <div class="content_popb_tab_2 popb_tab_content">
                              <br><br><br>
                              <label>First Color </label>
                              <input type="text" name="rowGradientColorFirst" class="color-picker_btn_two rowGradientColorFirst row_edit_fields" data-alpha='true' id="rowGradientColorFirst" value='#fff' data-optname="rowData.rowGradient.rowGradientColorFirst" >
                              <p>Location</p>
                              <div class="PoPbrangeSlider PoPbnumberSlider" data-targetRangeInput='rowGradientLocationFirst'></div>
                              <input type="number" class="rowGradientLocationFirst row_edit_fields" data-optname="rowData.rowGradient.rowGradientLocationFirst" >
                              <br><br><hr>
                              <br><br>
                              <label>Second Color </label>
                              <input type="text" name="rowGradientColorSecond" class="color-picker_btn_two rowGradientColorSecond row_edit_fields" data-alpha='true' id="rowGradientColorSecond" value='#fff' data-optname="rowData.rowGradient.rowGradientColorSecond" >
                              <p>Location</p>
                              <div class="PoPbrangeSlider PoPbnumberSlider" data-targetRangeInput='rowGradientLocationSecond'></div>
                              <input type="number" class="rowGradientLocationSecond row_edit_fields" data-optname="rowData.rowGradient.rowGradientLocationSecond" >
                              <br><br>
                              <hr>
                              <br>
                              <br>
                              <label>Type </label>
                              <select class="rowGradientType row_edit_fields" data-optname="rowData.rowGradient.rowGradientType" >
                                <option value="linear">Linear</option>
                                <option value="radial">Radial</option>
                              </select>
                              <br>
                              <br>
                              <div class="radialInput" style="display: none;">
                                <br>
                                <label>Position </label>
                                <select class="rowGradientPosition row_edit_fields" data-optname="rowData.rowGradient.rowGradientPosition" >
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
                              <div class="linearInput" style="display: none;">
                              <p>Angle</p>
                                <div class="PoPbrangeSliderAngle PoPbnumberSlider" data-targetRangeInput='rowGradientAngle'></div>
                                <input type="number" class="rowGradientAngle row_edit_fields" data-optname="rowData.rowGradient.rowGradientAngle" >
                              </div>
                              <br>
                              <br>
                            </div>
                          </div>
                        </div>
                      </div>
                      <div id="hoverRowBgOptions" class="tab" >
                        <br><br>
                        <div id="pluginops_input_tabs" class="popbinputTabsWrapper POPBInputNormalRow POPBInputHoverRow">
                          <p style="display: inline;"> Background Type </p>
                          <div class="iputTabNav">
                            <div class="popbNavItem" data-inptabID='content_popb_tab_1' title="Simple">
                              <label for="inputIDHover1"> <i class="fa fa-paint-brush"></i></label>
                              <input type="radio" name="rowBackgroundTypeHover" id="inputIDHover1"  class="rowBackgroundTypeHover rowBackgroundTypeSolidHover tabbedInputRadio row_edit_fields" value='solid' data-optname="rowData.rowHoverOptions.rowBackgroundTypeHover" >
                            </div>
                            <div class="popbNavItem" data-inptabID='content_popb_tab_2' title="Gradient">
                              <label for="inputIDHover2 " class="GradientIcon"> <i class="fa fa-square"></i></label>
                              <input type="radio" name="rowBackgroundTypeHover" id="inputIDHover2" class="rowBackgroundTypeHover rowBackgroundTypeGradientHover tabbedInputRadio row_edit_fields" value="gradient" data-optname="rowData.rowHoverOptions.rowBackgroundTypeHover" >
                            </div>
                          </div>
                          <div class="popb_input_tabContent">
                            <div class="content_popb_tab_1 popb_tab_content">
                              <br><br>
                              <label>Color :</label>
                              <input type="text" name="rowBgColorHover" class="color-picker_btn_two rowBgColorHover row_edit_fields" data-alpha='true' id="rowBgColorHover" value='#fff' data-optname="rowData.rowHoverOptions.rowBgColorHover" >
                              <br>
                            </div>
                            <div class="content_popb_tab_2 popb_tab_content">
                              <br><br><br>
                              <label>First Color </label>
                              <input type="text" name="rowGradientColorFirstHover" class="color-picker_btn_two rowGradientColorFirstHover row_edit_fields" data-alpha='true' id="rowGradientColorFirstHover" value='#fff' data-optname="rowData.rowHoverOptions.rowGradientHover.rowGradientColorFirstHover" >
                              <p>Location</p>
                              <div class="PoPbrangeSlider PoPbnumberSlider" data-targetRangeInput='rowGradientLocationFirstHover'></div>
                              <input type="number" class="rowGradientLocationFirstHover row_edit_fields" data-optname="rowData.rowHoverOptions.rowGradientHover.rowGradientLocationFirstHover" >
                              <br><br><hr>
                              <br><br>
                              <label>Second Color </label>
                              <input type="text" name="rowGradientColorSecondHover" class="color-picker_btn_two rowGradientColorSecondHover row_edit_fields" data-alpha='true' id="rowGradientColorSecondHover" value='#fff' data-optname="rowData.rowHoverOptions.rowGradientHover.rowGradientColorSecondHover" >
                              <p>Location</p>
                              <div class="PoPbrangeSlider PoPbnumberSlider" data-targetRangeInput='rowGradientLocationSecondHover'></div>
                              <input type="number" class="rowGradientLocationSecondHover row_edit_fields" data-optname="rowData.rowHoverOptions.rowGradientHover.rowGradientLocationSecondHover" >
                              <br><br>
                              <hr>
                              <br>
                              <br>
                              <label>Type </label>
                              <select class="rowGradientTypeHover row_edit_fields" data-optname="rowData.rowHoverOptions.rowGradientHover.rowGradientTypeHover" >
                                <option value="linear">Linear</option>
                                <option value="radial">Radial</option>
                              </select>
                              <br>
                              <br>
                              <div class="radialInputHover" style="display: none;">
                                <br>
                                <label>Position </label>
                                <select class="rowGradientPositionHover row_edit_fields" data-optname="rowData.rowHoverOptions.rowGradientHover.rowGradientPositionHover" >
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
                              <div class="linearInputHover" style="display: none;">
                              <p>Angle</p>
                                <div class="PoPbrangeSliderAngle PoPbnumberSlider" data-targetRangeInput='rowGradientAngleHover'></div>
                                <input type="number" class="rowGradientAngleHover row_edit_fields" data-optname="rowData.rowHoverOptions.rowGradientHover.rowGradientAngleHover" >
                              </div>
                              <br>
                              <br>
                            </div>
                          </div>
                        </div>
                        <hr>
                        <br>
                        <p>Transition Duration</p>
                        <div class="PoPbrangeSliderTransition PoPbnumberSlider" data-targetRangeInput='rowHoverTransitionDuration'></div>
                        <input type="number" class="rowHoverTransitionDuration row_edit_fields" data-optname="rowData.rowHoverOptions.rowHoverTransitionDuration" >
                        <br><br>
                      </div>
                    </div>
                  </div> 
                </div>
                <h4>Background Overlay</h4>
                <div style="width: 100%; background: #fff;">
                      <div id="defaultRowBgOverlayOptions">
                        <br><br>
                        <div id="pluginops_input_tabs" class="popbinputTabsWrapper POPBInputNormalRow POPBInputNormalRowOverlay">
                          <p style="display: inline;"> Overlay Type </p>
                          <div class="iputTabNav">
                            <div class="popbNavItem" data-inptabID='content_popb_tab_1' title="Simple">
                              <label for="inputID1"> <i class="fa fa-paint-brush"></i></label>
                              <input type="radio" name="rowOverlayBackgroundType" id="inputID1" value='solid' class="rowOverlayBackgroundType rowOverlayBackgroundTypeSolid tabbedInputRadio row_edit_fields" data-optname="rowData.rowOverlayBackgroundType" >
                            </div>
                            <div class="popbNavItem" data-inptabID='content_popb_tab_2' title="Gradient">
                              <label for="inputID2 " class="GradientIcon"> <i class="fa fa-square"></i></label>
                              <input type="radio" name="rowOverlayBackgroundType" id="inputID2" class="rowOverlayBackgroundType rowOverlayBackgroundTypeGradient tabbedInputRadio row_edit_fields" value="gradient" data-optname="rowData.rowOverlayBackgroundType" >
                            </div>
                          </div>
                          <div class="">
                            <div class="content_popb_tab_1 popb_tab_content">
                              <br><br><br>
                              <label>Color :</label>
                              <input type="text" name="rowBgOverlayColor" class="color-picker_btn_two rowBgOverlayColor row_edit_fields" data-alpha='true' id="rowBgOverlayColor" value='#fff' data-optname="rowData.rowBgOverlayColor" >
                              <br> <br>
                            </div>
                            <div class="content_popb_tab_2 popb_tab_content">
                              <br><br><br>
                              <label>First Color </label>
                              <input type="text" name="rowOverlayGradientColorFirst" class="color-picker_btn_two rowOverlayGradientColorFirst row_edit_fields" data-alpha='true' id="rowOverlayGradientColorFirst" value='#fff' data-optname="rowData.rowOverlayGradient.rowOverlayGradientColorFirst" >
                              <p>Location</p>
                              <div class="PoPbrangeSlider PoPbnumberSlider" data-targetRangeInput='rowOverlayGradientLocationFirst'></div>
                              <input type="number" class="rowOverlayGradientLocationFirst row_edit_fields" data-optname="rowData.rowOverlayGradient.rowOverlayGradientLocationFirst" >
                              <br><br><hr>
                              <br><br>
                              <label>Second Color </label>
                              <input type="text" name="rowOverlayGradientColorSecond" class="color-picker_btn_two rowOverlayGradientColorSecond row_edit_fields" data-alpha='true' id="rowOverlayGradientColorSecond" value='#fff' data-optname="rowData.rowOverlayGradient.rowOverlayGradientColorSecond" >
                              <p>Location</p>
                              <div class="PoPbrangeSlider PoPbnumberSlider" data-targetRangeInput='rowOverlayGradientLocationSecond'></div>
                              <input type="number" class="rowOverlayGradientLocationSecond row_edit_fields" data-optname="rowData.rowOverlayGradient.rowOverlayGradientLocationSecond" >
                              <br><br>
                              <hr>
                              <br>
                              <br>
                              <label>Type </label>
                              <select class="rowOverlayGradientType row_edit_fields" data-optname="rowData.rowOverlayGradient.rowOverlayGradientType" >
                                <option value="linear">Linear</option>
                                <option value="radial">Radial</option>
                              </select>
                              <br>
                              <br>
                              <div class="radialInput" style="display: none;">
                                <br>
                                <label>Position </label>
                                <select class="rowOverlayGradientPosition row_edit_fields" data-optname="rowData.rowOverlayGradient.rowOverlayGradientPosition" >
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
                              <div class="linearInput" style="display: none;">
                              <p>Angle</p>
                                <div class="PoPbrangeSliderAngle PoPbnumberSlider" data-targetRangeInput='rowOverlayGradientAngle'></div>
                                <input type="number" class="rowOverlayGradientAngle row_edit_fields" data-optname="rowData.rowOverlayGradient.rowOverlayGradientAngle" >
                              </div>
                              <br>
                              <br>
                            </div>
                          </div>
                        </div>
                      </div>
                </div>
                <h4>Background Shapes</h4>
                <div style="width: 100%; background: #fff;">
                  <div class="tabs">
                      <ul class="tab-links tabEditFields">
                        <li class="active"><a  href="#bgShapeTop" class="tab_link">Top</a></li>
                        <li><a  href="#bgShapeBottom" class="tab_link">Bottom</a></li>
                      </ul>
                      <div class="tab-content" style="box-shadow: none;">
                        <div id="bgShapeTop" class="tab active">
                          <br>
                          <label>Shape Type </label>
                          <select class="rbgstType row_edit_fields" data-optname="rowData.bgSTop.rbgstType" >
                            <option value="none">none</option>
                            <option value="Mountains">Mountains</option>
                            <option value="Spikes">Spikes</option>
                            <option value="Pyramids">Pyramids</option>
                            <option value="Triangle">Triangle</option>
                            <option value="TriangleInvert">Triangle Inverted</option>
                            <option value="TriangleAssym">Triangle Asymmetrical</option>
                            <option value="TriangleAssymInvert">Triangle Asymmetrical Inverted</option>
                            <option value="Slope">Slope</option>
                            <option value="FanOpaque">Fan Opaque</option>
                            <option value="Curve">Curve</option>
                            <option value="CurveInvert">Curve Inverted</option>
                            <option value="Waves">Waves</option>
                            <option value="Arrow">Arrow</option>
                            <option value="ArrowInvert">Arrow Inverted</option>
                            <option value="Book">Book</option>
                            <option value="BookInvert">Book Inverted</option>
                            <option value="Clouds">Clouds</option>
                            <option value="Skyline">Skyline</option>
                          </select>
                          <br><br><br>
                          <label>Shape Color</label>
                          <input type="text" name="rbgstColor" class="color-picker_btn_two rbgstColor row_edit_fields" data-alpha='true' id="rbgstColor" value='#fff' data-optname="rowData.bgSTop.rbgstColor" >
                          <br><br><br>
                          <div>
                            <h4>Width   
                              <span class="responsiveBtn rbt-l " > <i class="fa fa-desktop"></i> </span>   
                              <span class="responsiveBtn rbt-m " > <i class="fa fa-tablet"></i> </span>
                              <span class="responsiveBtn rbt-s " > <i class="fa fa-mobile-phone"></i> </span>
                            </h4>
                            <div class="responsiveOps responsiveOptionsContainterLarge">
                              <label></label>
                              <input type="number" class="rbgstWidth row_edit_fields" min="100" max="300" data-optname="rowData.bgSTop.rbgstWidth" >
                            </div>
                            <div class="responsiveOps responsiveOptionsContainterMedium" style="display: none;">
                              <label></label>
                              <input type="number" class="rbgstWidtht row_edit_fields" min="100" max="300" data-optname="rowData.bgSTop.rbgstWidtht" >
                            </div>
                            <div class="responsiveOps responsiveOptionsContainterSmall" style="display: none;">
                              <label></label>
                              <input type="number" class="rbgstWidthm row_edit_fields" min="100" max="300" data-optname="rowData.bgSTop.rbgstWidthm" >
                            </div>
                          </div>
                          <br><br><br>
                          <div>
                            <h4>Height   
                              <span class="responsiveBtn rbt-l " > <i class="fa fa-desktop"></i> </span>   
                              <span class="responsiveBtn rbt-m " > <i class="fa fa-tablet"></i> </span>
                              <span class="responsiveBtn rbt-s " > <i class="fa fa-mobile-phone"></i> </span>
                            </h4>
                            <div class="responsiveOps responsiveOptionsContainterLarge">
                              <label></label>
                              <input type="number" class="rbgstHeight row_edit_fields" data-optname="rowData.bgSTop.rbgstHeight" >
                            </div>
                            <div class="responsiveOps responsiveOptionsContainterMedium" style="display: none;">
                              <label></label>
                              <input type="number" class="rbgstHeightt row_edit_fields" data-optname="rowData.bgSTop.rbgstHeightt" >
                            </div>
                            <div class="responsiveOps responsiveOptionsContainterSmall" style="display: none;">
                              <label></label>
                              <input type="number" class="rbgstHeightm row_edit_fields" data-optname="rowData.bgSTop.rbgstHeightm" >
                            </div>
                          </div>
                          <br><br><br>
                          <label>Flipped </label>
                          <select class="rbgstFlipped row_edit_fields" data-optname="rowData.bgSTop.rbgstFlipped" >
                            <option value="false">No</option>
                            <option value="true">Yes</option>
                          </select>
                          <br><br><br>
                          <label>Bring To Front </label>
                          <select class="rbgstFront row_edit_fields" data-optname="rowData.bgSTop.rbgstFront" >
                            <option value="false">No</option>
                            <option value="true">Yes</option>
                          </select>
                          <br><br><br>
                        </div>
                        <div id="bgShapeBottom" class="tab">
                          <br>
                          <label>Shape Type </label>
                          <select class="rbgsbType row_edit_fields" data-optname="rowData.bgSBottom.rbgsbType" >
                            <option value="none">none</option>
                            <option value="Mountains">Mountains</option>
                            <option value="Spikes">Spikes</option>
                            <option value="Pyramids">Pyramids</option>
                            <option value="Triangle">Triangle</option>
                            <option value="TriangleInvert">Triangle Inverted</option>
                            <option value="TriangleAssym">Triangle Asymmetrical</option>
                            <option value="TriangleAssymInvert">Triangle Asymmetrical Inverted</option>
                            <option value="Slope">Slope</option>
                            <option value="FanOpaque">Fan Opaque</option>
                            <option value="Curve">Curve</option>
                            <option value="CurveInvert">Curve Inverted</option>
                            <option value="Waves">Waves</option>
                            <option value="Arrow">Arrow</option>
                            <option value="ArrowInvert">Arrow Inverted</option>
                            <option value="Book">Book</option>
                            <option value="BookInvert">Book Inverted</option>
                            <option value="Clouds">Clouds</option>
                            <option value="Skyline">Skyline</option>
                          </select>
                          <br><br><br>
                          <label>Shape Color</label>
                          <input type="text" name="rbgsbColor" class="color-picker_btn_two rbgsbColor row_edit_fields" data-alpha='true' id="rbgsbColor" value='#fff' data-optname="rowData.bgSBottom.rbgsbColor" >
                          <br><br><br>
                          <div>
                            <h4>Width   
                              <span class="responsiveBtn rbt-l " > <i class="fa fa-desktop"></i> </span>   
                              <span class="responsiveBtn rbt-m " > <i class="fa fa-tablet"></i> </span>
                              <span class="responsiveBtn rbt-s " > <i class="fa fa-mobile-phone"></i> </span>
                            </h4>
                            <div class="responsiveOps responsiveOptionsContainterLarge">
                              <label></label>
                              <input type="number" class="rbgsbWidth row_edit_fields" min="100" max="300" data-optname="rowData.bgSBottom.rbgsbWidth" >
                            </div>
                            <div class="responsiveOps responsiveOptionsContainterMedium" style="display: none;">
                              <label></label>
                              <input type="number" class="rbgsbWidtht row_edit_fields" min="100" max="300" data-optname="rowData.bgSBottom.rbgsbWidtht" >
                            </div>
                            <div class="responsiveOps responsiveOptionsContainterSmall" style="display: none;">
                              <label></label>
                              <input type="number" class="rbgsbWidthm row_edit_fields" min="100" max="300" data-optname="rowData.bgSBottom.rbgsbWidthm" >
                            </div>
                          </div>
                          <br><br><br>
                          <div>
                            <h4>Height   
                              <span class="responsiveBtn rbt-l " > <i class="fa fa-desktop"></i> </span>   
                              <span class="responsiveBtn rbt-m " > <i class="fa fa-tablet"></i> </span>
                              <span class="responsiveBtn rbt-s " > <i class="fa fa-mobile-phone"></i> </span>
                            </h4>
                            <div class="responsiveOps responsiveOptionsContainterLarge">
                              <label></label>
                              <input type="number" class="rbgsbHeight row_edit_fields" data-optname="rowData.bgSBottom.rbgsbHeight" >
                            </div>
                            <div class="responsiveOps responsiveOptionsContainterMedium" style="display: none;">
                              <label></label>
                              <input type="number" class="rbgsbHeightt row_edit_fields" data-optname="rowData.bgSBottom.rbgsbHeightt" >
                            </div>
                            <div class="responsiveOps responsiveOptionsContainterSmall" style="display: none;">
                              <label></label>
                              <input type="number" class="rbgsbHeightm row_edit_fields" data-optname="rowData.bgSBottom.rbgsbHeightm" >
                            </div>
                          </div>
                          <br><br><br>
                          <label>Flipped </label>
                          <select class="rbgsbFlipped row_edit_fields" data-optname="rowData.bgSBottom.rbgsbFlipped" >
                            <option value="false">No</option>
                            <option value="true">Yes</option>
                          </select>
                          <br><br><br>
                          <label>Bring To Front </label>
                          <select class="rbgsbFront row_edit_fields" data-optname="rowData.bgSBottom.rbgsbFront" >
                            <option value="false">No</option>
                            <option value="true">Yes</option>
                          </select>
                          <br><br><br>
                        </div>
                      </div>
                  </div>
                </div>
              </div>
              <br><hr><br>
              <div class="PB_accordion" style="margin-left: -10px;">
                <h4>Margins & Paddings</h4>
                <div style="background: #fff;" >
                  <h4>Row Margin   
                    <span class="responsiveBtn rbt-l " > <i class="fa fa-desktop"></i> </span>   
                    <span class="responsiveBtn rbt-m " > <i class="fa fa-tablet"></i> </span>
                    <span class="responsiveBtn rbt-s " > <i class="fa fa-mobile-phone"></i> </span>
                  </h4>
                  <div class="responsiveOps responsiveOptionsContainterLarge">
                    <input type="number" name="rowMarginTop" class="padding_inline_inp linkedField  rowMarginTop row_edit_fields" id="rowMarginTop"  placeholder="Top"  data-optname="rowData.margin.rowMarginTop" >
                    
                    <input type="number" name="rowMarginBottom" class="padding_inline_inp linkedField  rowMarginBottom row_edit_fields" id="rowMarginBottom"  placeholder="Bottom" data-optname="rowData.margin.rowMarginBottom" >
                    
                    <input type="number" name="rowMarginLeft" class="padding_inline_inp linkedField  rowMarginLeft row_edit_fields" id="rowMarginLeft"  placeholder="Left" data-optname="rowData.margin.rowMarginLeft" >
                    
                    <input type="number" name="rowMarginRight" class="padding_inline_inp linkedField  rowMarginRight row_edit_fields" id="rowMarginRight"  placeholder="Right" data-optname="rowData.margin.rowMarginRight" >

                    <span class="linkfieldBtn rowLinkBtn linkBtn" > <i class="fa fa-link"></i> </span>
                  </div>
                  <div class="responsiveOps responsiveOptionsContainterMedium" style="display: none;">
                    <input type="number" name="rowMarginTopTablet" class="padding_inline_inp linkedField  rowMarginTopTablet row_edit_fields" id="rowMarginTopTablet"  placeholder="Top" data-optname="rowData.marginTablet.rMTT" >
                    
                    <input type="number" name="rowMarginBottomTablet" class="padding_inline_inp linkedField  rowMarginBottomTablet row_edit_fields" id="rowMarginBottomTablet"  placeholder="Bottom" data-optname="rowData.marginTablet.rMBT" >
                    
                    <input type="number" name="rowMarginLeftTablet" class="padding_inline_inp linkedField  rowMarginLeftTablet row_edit_fields" id="rowMarginLeftTablet"  placeholder="Left" data-optname="rowData.marginTablet.rMLT" >
                    
                    <input type="number" name="rowMarginRightTablet" class="padding_inline_inp linkedField  rowMarginRightTablet row_edit_fields" id="rowMarginRightTablet"  placeholder="Right" data-optname="rowData.marginTablet.rMRT" >

                    <span class="linkfieldBtn rowLinkBtn linkBtn" > <i class="fa fa-link"></i> </span>
                  </div>
                  <div class="responsiveOps responsiveOptionsContainterSmall" style="display: none;">
                    <input type="number" name="rowMarginTopMobile" class="padding_inline_inp linkedField  rowMarginTopMobile row_edit_fields" id="rowMarginTopMobile"  placeholder="Top" data-optname="rowData.marginMobile.rMTM" >
                    
                    <input type="number" name="rowMarginBottomMobile" class="padding_inline_inp linkedField  rowMarginBottomMobile row_edit_fields" id="rowMarginBottomMobile"  placeholder="Bottom" data-optname="rowData.marginMobile.rMBM" >
                    
                    <input type="number" name="rowMarginLeftMobile" class="padding_inline_inp linkedField  rowMarginLeftMobile row_edit_fields" id="rowMarginLeftMobile"  placeholder="Left" data-optname="rowData.marginMobile.rMLM" >
                    
                    <input type="number" name="rowMarginRightMobile" class="padding_inline_inp linkedField  rowMarginRightMobile row_edit_fields" id="rowMarginRightMobile"  placeholder="Right" data-optname="rowData.marginMobile.rMRM" >

                    <span class="linkfieldBtn rowLinkBtn linkBtn" > <i class="fa fa-link"></i> </span>
                  </div>
                  <br>
                  <br>
                  <span class="ulp-note">The unit is percentage so set values accordingly.</span>
                  <br><br>
                  <h4>Row Padding
                    <span class="responsiveBtn rbt-l " > <i class="fa fa-desktop"></i> </span>
                    <span class="responsiveBtn rbt-m " > <i class="fa fa-tablet"></i> </span>
                    <span class="responsiveBtn rbt-s " > <i class="fa fa-mobile-phone"></i> </span>
                  </h4>
                  <div class="responsiveOps responsiveOptionsContainterLarge">
                    <input type="number" name="rowPaddingTop" class="padding_inline_inp linkedField  rowPaddingTop row_edit_fields" id="rowPaddingTop"  placeholder="Top" data-optname="rowData.padding.rowPaddingTop" >
                    
                    <input type="number" name="rowPaddingBottom" class="padding_inline_inp linkedField  rowPaddingBottom row_edit_fields" id="rowPaddingBottom"  placeholder="Bottom" data-optname="rowData.padding.rowPaddingBottom" >
                    
                    <input type="number" name="rowPaddingLeft" class="padding_inline_inp linkedField  rowPaddingLeft row_edit_fields" id="rowPaddingLeft"  placeholder="Left" data-optname="rowData.padding.rowPaddingLeft" >
                    
                    <input type="number" name="rowPaddingRight" class="padding_inline_inp linkedField  rowPaddingRight row_edit_fields" id="rowPaddingRight"  placeholder="Right" data-optname="rowData.padding.rowPaddingRight" >

                    <span class="linkfieldBtn rowLinkBtn linkBtn" > <i class="fa fa-link"></i> </span>
                  </div>
                  <div class="responsiveOps responsiveOptionsContainterMedium" style="display: none;">
                    <input type="number" name="rowPaddingTopTablet" class="padding_inline_inp linkedField  rowPaddingTopTablet row_edit_fields" id="rowPaddingTopTablet"  placeholder="Top" data-optname="rowData.paddingTablet.rPTT" >
                    
                    <input type="number" name="rowPaddingBottomTablet" class="padding_inline_inp linkedField  rowPaddingBottomTablet row_edit_fields" id="rowPaddingBottomTablet"  placeholder="Bottom" data-optname="rowData.paddingTablet.rPBT" >
                    
                    <input type="number" name="rowPaddingLeftTablet" class="padding_inline_inp linkedField  rowPaddingLeftTablet row_edit_fields" id="rowPaddingLeftTablet"  placeholder="Left" data-optname="rowData.paddingTablet.rPLT" >
                    
                    <input type="number" name="rowPaddingRightTablet" class="padding_inline_inp linkedField  rowPaddingRightTablet row_edit_fields" id="rowPaddingRightTablet"  placeholder="Right" data-optname="rowData.paddingTablet.rPRT" >

                    <span class="linkfieldBtn rowLinkBtn linkBtn" > <i class="fa fa-link"></i> </span>
                  </div>
                  <div class="responsiveOps responsiveOptionsContainterSmall" style="display: none;">
                    <input type="number" name="rowPaddingTopMobile" class="padding_inline_inp linkedField  rowPaddingTopMobile row_edit_fields" id="rowPaddingTopMobile"  placeholder="Top" data-optname="rowData.paddingMobile.rPTM" >
                    
                    <input type="number" name="rowPaddingBottomMobile" class="padding_inline_inp linkedField  rowPaddingBottomMobile row_edit_fields" id="rowPaddingBottomMobile"  placeholder="Bottom" data-optname="rowData.paddingMobile.rPBM" >
                    
                    <input type="number" name="rowPaddingLeftMobile" class="padding_inline_inp linkedField  rowPaddingLeftMobile row_edit_fields" id="rowPaddingLeftMobile"  placeholder="Left" data-optname="rowData.paddingMobile.rPLM" > 
                    
                    <input type="number" name="rowPaddingRightMobile" class="padding_inline_inp linkedField  rowPaddingRightMobile row_edit_fields" id="rowPaddingRightMobile"  placeholder="Right" data-optname="rowData.paddingMobile.rPRM" >

                    <span class="linkfieldBtn rowLinkBtn linkBtn" > <i class="fa fa-link"></i> </span>
                  </div>
                  <br>
                  <br>
                  <span class="ulp-note">The unit is percentage so set values accordingly.</span>
                </div>
              </div>
              <br>
              <br>
              <hr>
              <br>
              <label>Custom Row Class : </label>
              <input type="text" class="rowCustomClass row_edit_fields" data-optname="rowData.rowCustomClass" >
              <br>
              <br>  
              <br>
              <hr>
              <br>
              <div>
                <h4>Hide Row  
                  <span class="responsiveBtn rbt-l " > <i class="fa fa-desktop"></i> </span>
                  <span class="responsiveBtn rbt-m " > <i class="fa fa-tablet"></i> </span>
                  <span class="responsiveBtn rbt-s " > <i class="fa fa-mobile-phone"></i> </span>
                </h4>
                <div class="responsiveOps responsiveOptionsContainterLarge">
                  <label>DeskTop </label>
                  <select class="row_edit_fields rowHideOnDesktop" data-optname="rowData.rowHideOnDesktop" >
                    <option value="show">Show</option>
                    <option value="hide">Hide</option>
                  </select>
                </div>
                <div class="responsiveOps responsiveOptionsContainterMedium" style="display: none;">
                  <label>Tablet </label>
                  <select class="row_edit_fields rowHideOnTablet" data-optname="rowData.rowHideOnTablet" >
                    <option value="show">Show</option>
                    <option value="hide">Hide</option>
                  </select>
                </div>
                <div class="responsiveOps responsiveOptionsContainterSmall" style="display: none;">
                  <label>Mobile </label>
                  <select class="row_edit_fields rowHideOnMobile" data-optname="rowData.rowHideOnMobile" >
                    <option value="show">Show</option>
                    <option value="hide">Hide</option>
                  </select>
                </div>
              </div>
              </div>
            </div>
            </form>
          <div id="tabRowVideo" class="tab" style="min-height:400px;">
            <div class="pbp_form" style="margin: 10px; width: 400px;">
            <label>Background Video :</label> 
            <select class="row_edit_fields rowBgVideoEnable" data-optname="rowData.video.rowBgVideoEnable" >
              <option value="false">Disable</option>
              <option value="true">Enable</option>
            </select>
            <br>
            <br>
            <label>Loop</label> 
            <select class="row_edit_fields rowBgVideoLoop" data-optname="rowData.video.rowBgVideoLoop" >
              <option value="no">No</option>
              <option value="loop">Yes</option>
            </select>
            <br>
            <br>
            <label>Select Platform</label>
            <select class="row_edit_fields rowVideoType" data-optname="rowData.video.rowVideoType" >
              <option value="mp4">MP4</option>
              <option value="yt">Youtube</option>
            </select>
            <br>
            <br>
            <hr>
            <br>
            <div class=" bgrowmp4" style="display: block;">
              <label>Video (MP4) :</label>
              <input id="image_location9" type="text" class="row_edit_fields rowVideoMpfour upload_image_button9"  name='lpp_add_img_1' value='' placeholder='Insert Video URL here'  data-optname="rowData.video.rowVideoMpfour" > <br> <br>
              <label></label>
              <input id="image_location9" type="button" class="row_edit_fields upload_bg" data-id="9" value="Upload" />
              <br><br> <hr><br>
              <label>Video (WebM) :</label>
              <input id="image_location10" type="text" class="row_edit_fields rowVideoWebM upload_image_button10"  name='lpp_add_img_1' value='' placeholder='Insert Video URL here' data-optname="rowData.video.rowVideoWebM" > <br> <br>
              <label></label>
              <input id="image_location10" type="button" class="row_edit_fields upload_bg" data-id="10" value="Upload" />
              <br><br> <hr><br>
              <label>Video Thumbnail :</label>
              <input id="image_location11" type="text" class="row_edit_fields rowVideoThumb upload_image_button11"  name='lpp_add_img_1' value='' placeholder='Insert Image URL here' data-optname="rowData.video.rowVideoThumb" > <br> <br>
              <label></label>
              <input id="image_location11" type="button" class="row_edit_fields upload_bg" data-id="11" value="Upload" />
            </div>
            <div class=" bgrowyt" style="display: none;">
              <label>Youtube Video URL</label>
              <input type="url" class="row_edit_fields rowVideoYtUrl" data-optname="rowData.video.rowVideoYtUrl" >
            </div>
              
            <br>
            <br>
            <br>
            </div>
          </div>
          <div id="tabCustomCss" class="tab">
            <div class="pbp_form" style="width: 400px; margin: 10px;">
              <h3>Custom CSS</h3>
              <div style="height: 300px; margin-bottom: 50px;">
                <textarea  class="row_edit_fields rowCustomStyling" style="width: 90%; min-height: 280px;" data-optname="rowData.customStyling" > </textarea>
              </div>
              <h3>Custom JS</h3>
              <div style="height: 300px;">
                <textarea  class="row_edit_fields rowCustomJS" style="width: 90%; min-height: 280px;" data-optname="rowData.customJS" > </textarea>
              </div>
            </div>
          </div>
        </div>
      </div>
      <h3 class="nonPremUserNotice"> Tip You can edit your row at one place and changes will appear everywhere : <a href="https://pluginops.com/optin-builder/?ref=GlobalRow" target="_blank"> Learn More </a></h3>
    </div>
  </div>
</div>








<div class="lpp_modal_row insert_Global_row">
  <div class="lpp_modal_wrapper_row">
    <div class="edit_options_left_row">
      <h1 class="banner-h1">Select Global Row</h1>
      <?php 
        $ULP_GlobalRow_args = array(
          'post_type' => 'ulpb_global_rows',
          'orderby' => 'date',
          'post_status'   => 'any',
          'posts_per_page'    => 100,
        );
        $ULPB_GlobalRow_posts = get_posts( $ULP_GlobalRow_args );

        echo "<br><br><br>
            <label style='margin-right:7%;'> Select a Global Row to Insert </label>
            <select class='selectGlobalRowToInsert' name='selectGlobalRowToInsert'>
            <option value=''  > Select Row </option>
        ";
        foreach ($ULPB_GlobalRow_posts as  $ulpost) {
          $currentPostId = $ulpost->ID;
          $currentPostName = get_the_title( $currentPostId);
          $currentPostLink = get_permalink($currentPostId);
          echo "<option value='$currentPostId' data-pagelink='$currentPostLink' > $currentPostName </option>";
        }

        echo "</select> 
        ";

      ?>
    </div>
    <div  class="addNewGlobalRowClosebutton" style="">
        <div ><span class="dashicons dashicons-arrow-left editSaveVisibleIcon" ></span></div><p></p><br>
    </div>
  </div>
</div>



<div  class="SPopen-btn" style="">
        <div ><span  class="dashicons dashicons-arrow-left editSaveVisibleIcon" ></span></div><p></p><br>
    </div>

    <div  class="SPclose-btn" style="">
        <div ><span  class="dashicons dashicons-arrow-right editSaveVisibleIcon" ></span></div><p></p><br>
    </div>


<script>
  ( function( $ ) {

    $('[data-optname="rowData.bg_img"]').on('change',function(){
      var thisFieldVal = $(this).val();
      if (thisFieldVal != '' && thisFieldVal != ' ') {
        $('.imageBackgroundOpsRow').css('display','block');
      }else{
        $('.imageBackgroundOpsRow').css('display','none');
      }
    });

    $('[data-optname="rowData.bg_imgT"]').on('change',function(){
      var thisFieldVal = $(this).val();
      if (thisFieldVal != '' && thisFieldVal != ' ') {
        $('.imageBackgroundOpsRow').css('display','block');
      }else{
        $('.imageBackgroundOpsRow').css('display','none');
      }
    });

    $('[data-optname="rowData.bg_imgM"]').on('change',function(){
      var thisFieldVal = $(this).val();
      if (thisFieldVal != '' && thisFieldVal != ' ') {
        $('.imageBackgroundOpsRow').css('display','block');
      }else{
        $('.imageBackgroundOpsRow').css('display','none');
      }
    });

    $('[data-optname="rowData.bgImgOps.pos"]').on('change',function(){
      var thisFieldVal = $(this).val();
      if (thisFieldVal == 'custom') {
        $('.rowBgImgCustomPositionDiv').css('display','block');
      }else{
        $('.rowBgImgCustomPositionDiv').css('display','none');
      }
    });
    $('[data-optname="rowData.bgImgOps.posT"]').on('change',function(){
      var thisFieldVal = $(this).val();
      if (thisFieldVal == 'custom') {
        $('.rowBgImgCustomPositionDiv').css('display','block');
      }else{
        $('.rowBgImgCustomPositionDiv').css('display','none');
      }
    });
    $('[data-optname="rowData.bgImgOps.posM"]').on('change',function(){
      var thisFieldVal = $(this).val();
      if (thisFieldVal == 'custom') {
        $('.rowBgImgCustomPositionDiv').css('display','block');
      }else{
        $('.rowBgImgCustomPositionDiv').css('display','none');
      }
    });



    $('[data-optname="rowData.bgImgOps.size"]').on('change',function(){
      var thisFieldVal = $(this).val();
      if (thisFieldVal == 'custom') {
        $('.rowBgImgCustomSizeDiv').css('display','block');
      }else{
        $('.rowBgImgCustomSizeDiv').css('display','none');
      }
    });
    $('[data-optname="rowData.bgImgOps.sizeT"]').on('change',function(){
      var thisFieldVal = $(this).val();
      if (thisFieldVal == 'custom') {
        $('.rowBgImgCustomSizeDiv').css('display','block');
      }else{
        $('.rowBgImgCustomSizeDiv').css('display','none');
      }
    });
    $('[data-optname="rowData.bgImgOps.sizeM"]').on('change',function(){
      var thisFieldVal = $(this).val();
      if (thisFieldVal == 'custom') {
        $('.rowBgImgCustomSizeDiv').css('display','block');
      }else{
        $('.rowBgImgCustomSizeDiv').css('display','none');
      }
    });



    $('[data-optname="rowData.conType"]').on('change',function(){
      var thisFieldVal = $(this).val();
      if (thisFieldVal == 'boxed') {
        $('.boxedWidthOptionContainer').css('display','block');
      }else{
        $('.boxedWidthOptionContainer').css('display','none');
      }
    });

  }( jQuery ) );
</script>