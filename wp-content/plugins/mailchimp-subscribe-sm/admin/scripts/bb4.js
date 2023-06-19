( function( $ ) {
var pbWrapperHeight  = '';
var notemplate = '';

//$('.templatesInstallDivOne').hide();
// $('.prem-temp input:disabled').prop('disabled',false);
// $('.prem-temp input').next('label').html(' Select ');

// $('.prem-temp').removeClass('prem-temp');

$(document).on('click','.updateTemplate',function () {


	$('.popb_confirm_action_popup').css('display','block');

	$('.popb_confirm_subMessage').text('This template will replace all your exisiting page content.');

	$('.confirm_no').click(function(){
		isConfirmTrue_c = false;
		$('.popb_confirm_action_popup').css('display','none');
	});

		$('.popb_confirm_action_popup').css('display','none');
		$('.pb_loader_container').slideDown(200);
		isConfirmTrue_c = true;

	   var popb_selected_template = $('input[name=template_select]:checked').val();
	   var pageOptions = "";
	   if (isConfirmTrue_c == true) {
	   	var pageSeoName = $('#title').val();
	   	var PbPageStatus = $('.PbPageStatus').val();
	   	var pageLink = $('#editable-post-name-full').html();

	   	if (pageSeoName == '') {
	   		$('#title').val('PluginOps Form  - '+P_ID);
	   		pageSeoName = $('#title').val();
	   	}
	   	switch (popb_selected_template){
	   		case 'temp15':
	   		var pageOptions = '{"setFrontPage":"false","loadWpHead":"false","loadWpFooter":"false","pageBgImage":"","pageBgColor":"#ffffff","pageLink":"'+pageLink+'","pagePadding":{"pagePaddingTop":"","pagePaddingBottom":"","pagePaddingLeft":"","pagePaddingRight":""},"pagePaddingTablet":{"pagePaddingTopTablet":"","pagePaddingBottomTablet":"","pagePaddingLeftTablet":"","pagePaddingRightTablet":""},"pagePaddingMobile":{"pagePaddingTopMobile":"","pagePaddingBottomMobile":"","pagePaddingLeftMobile":"","pagePaddingRightMobile":""},"pageSeoName":"'+pageSeoName+'","POcustomCSS":"#pbWrapper{\\n    \\n    max-width:700px;\\n    margin:0 auto;\\n}","POcustomJS":"\\/* Add your custom Javascript here.*\\/","POPBDefaults":{"POPBDefaultsEnable":"false","POPB_typefaces":{"typefaceHOne":"Arial","typefaceHTwo":"Arial","typefaceParagraph":"Arial","typefaceButton":"Arial","typefaceAnchorLink":"Arial"},"POPB_typeSizes":{"typeSizeHOne":"45","typeSizeHTwo":"29","typeSizeParagraph":"15","typeSizeButton":"16","typeSizeAnchorLink":"15","typeSizeHOneTablet":"","typeSizeHOneMobile":"","typeSizeHTwoTablet":"","typeSizeHTwoMobile":"","typeSizeParagraphTablet":"","typeSizeParagraphMobile":"","typeSizeButtonTablet":"","typeSizeButtonMobile":"","typeSizeAnchorLinkTablet":"","typeSizeAnchorLinkMobile":""}}}';
	   		break;
	   		case 'temp16':
	   		var pageOptions = '{"setFrontPage":"false","loadWpHead":"false","loadWpFooter":"false","pageBgImage":"","pageBgColor":"#ea5b53","pageLink":"'+pageLink+'","pagePadding":{"pagePaddingTop":"","pagePaddingBottom":"","pagePaddingLeft":"","pagePaddingRight":""},"pagePaddingTablet":{"pagePaddingTopTablet":"","pagePaddingBottomTablet":"","pagePaddingLeftTablet":"","pagePaddingRightTablet":""},"pagePaddingMobile":{"pagePaddingTopMobile":"","pagePaddingBottomMobile":"","pagePaddingLeftMobile":"","pagePaddingRightMobile":""},"pageSeoName":"'+pageSeoName+'","POcustomCSS":"\\/* Add your custom CSS here.*\\/","POcustomJS":"\\/* Add your custom Javascript here.*\\/","POPBDefaults":{"POPBDefaultsEnable":"false","POPB_typefaces":{"typefaceHOne":"Arial","typefaceHTwo":"Arial","typefaceParagraph":"Arial","typefaceButton":"Arial","typefaceAnchorLink":"Arial"},"POPB_typeSizes":{"typeSizeHOne":"45","typeSizeHTwo":"29","typeSizeParagraph":"15","typeSizeButton":"16","typeSizeAnchorLink":"15","typeSizeHOneTablet":"","typeSizeHOneMobile":"","typeSizeHTwoTablet":"","typeSizeHTwoMobile":"","typeSizeParagraphTablet":"","typeSizeParagraphMobile":"","typeSizeButtonTablet":"","typeSizeButtonMobile":"","typeSizeAnchorLinkTablet":"","typeSizeAnchorLinkMobile":""}}}';
	   		break;
	   		case 'temp17':
	   		var pageOptions = '{"setFrontPage":"false","loadWpHead":"false","loadWpFooter":"false","pageBgImage":"","pageBgColor":"transparent","pageLink":"'+pageLink+'","pagePadding":{"pagePaddingTop":"","pagePaddingBottom":"","pagePaddingLeft":"","pagePaddingRight":""},"pagePaddingTablet":{"pagePaddingTopTablet":"","pagePaddingBottomTablet":"","pagePaddingLeftTablet":"","pagePaddingRightTablet":""},"pagePaddingMobile":{"pagePaddingTopMobile":"","pagePaddingBottomMobile":"","pagePaddingLeftMobile":"","pagePaddingRightMobile":""},"pageSeoName":"'+pageSeoName+'","POcustomCSS":".pluginops-countdown-timer p{ line-height: 0.5em !important; }\\n\\n@media screen and (min-width: 1180px) {\\n    .ulpb_PageBody{ min-width:900px; }\\n}","POcustomJS":"\\/* Add your custom Javascript here.*\\/","POPBDefaults":{"POPBDefaultsEnable":"false","POPB_typefaces":{"typefaceHOne":"Arial","typefaceHTwo":"Arial","typefaceParagraph":"Arial","typefaceButton":"Arial","typefaceAnchorLink":"Arial"},"POPB_typeSizes":{"typeSizeHOne":"45","typeSizeHTwo":"29","typeSizeParagraph":"15","typeSizeButton":"16","typeSizeAnchorLink":"15","typeSizeHOneTablet":"","typeSizeHOneMobile":"","typeSizeHTwoTablet":"","typeSizeHTwoMobile":"","typeSizeParagraphTablet":"","typeSizeParagraphMobile":"","typeSizeButtonTablet":"","typeSizeButtonMobile":"","typeSizeAnchorLinkTablet":"","typeSizeAnchorLinkMobile":""}}}';
	   		break;
	   		case 'temp21':
	   		var pageOptions = '{"setFrontPage":"false","loadWpHead":"false","loadWpFooter":"false","pageBgImage":"","pageBgColor":"rgba(255,255,255,0)","pageLink":"'+pageLink+'","pagePadding":{"pagePaddingTop":"","pagePaddingBottom":"","pagePaddingLeft":"","pagePaddingRight":""},"pagePaddingTablet":{"pagePaddingTopTablet":"","pagePaddingBottomTablet":"","pagePaddingLeftTablet":"","pagePaddingRightTablet":""},"pagePaddingMobile":{"pagePaddingTopMobile":"","pagePaddingBottomMobile":"","pagePaddingLeftMobile":"","pagePaddingRightMobile":""},"pageSeoName":"'+pageSeoName+'","POcustomCSS":".sidebar-form-row{\\nmax-width:400px;\\nmargin:0 auto !important;\\n}\\n\\n.template-10-form input{\\n    border-radius:50px ;\\n}\\n","POcustomJS":"\\/* Add your custom Javascript here.*\\/","POPBDefaults":{"POPBDefaultsEnable":"false","POPB_typefaces":{"typefaceHOne":"Arial","typefaceHTwo":"Arial","typefaceParagraph":"Arial","typefaceButton":"Arial","typefaceAnchorLink":"Arial"},"POPB_typeSizes":{"typeSizeHOne":"45","typeSizeHTwo":"29","typeSizeParagraph":"15","typeSizeButton":"16","typeSizeAnchorLink":"15","typeSizeHOneTablet":"","typeSizeHOneMobile":"","typeSizeHTwoTablet":"","typeSizeHTwoMobile":"","typeSizeParagraphTablet":"","typeSizeParagraphMobile":"","typeSizeButtonTablet":"","typeSizeButtonMobile":"","typeSizeAnchorLinkTablet":"","typeSizeAnchorLinkMobile":""}}}';
	   		break;
	   		case 'temp26':
		   		var pageOptions = '{"setFrontPage":"false","loadWpHead":"false","loadWpFooter":"false","pageBgImage":"","pageBgColor":"rgba(0,0,0,0)","pageLink":"'+pageLink+'","pagePadding":{"pagePaddingTop":"0","pagePaddingBottom":"0","pagePaddingLeft":"0","pagePaddingRight":"0"},"pagePaddingTablet":{"pagePaddingTopTablet":"","pagePaddingBottomTablet":"","pagePaddingLeftTablet":"5","pagePaddingRightTablet":"5"},"pagePaddingMobile":{"pagePaddingTopMobile":"","pagePaddingBottomMobile":"","pagePaddingLeftMobile":"5","pagePaddingRightMobile":"5"},"pageSeoName":"'+pageSeoName+'","POcustomCSS":"\\/* Add your custom CSS here.*\\/","POcustomJS":"\\/* Add your custom Javascript here.*\\/","POPBDefaults":{"POPBDefaultsEnable":"false","POPB_typefaces":{"typefaceHOne":"Arial","typefaceHTwo":"Arial","typefaceParagraph":"Arial","typefaceButton":"Arial","typefaceAnchorLink":"Arial"},"POPB_typeSizes":{"typeSizeHOne":"45","typeSizeHTwo":"29","typeSizeParagraph":"15","typeSizeButton":"16","typeSizeAnchorLink":"15","typeSizeHOneTablet":"","typeSizeHOneMobile":"","typeSizeHTwoTablet":"","typeSizeHTwoMobile":"","typeSizeParagraphTablet":"","typeSizeParagraphMobile":"","typeSizeButtonTablet":"","typeSizeButtonMobile":"","typeSizeAnchorLinkTablet":"","typeSizeAnchorLinkMobile":""}}}';
	   		break;
	   		case 'temp27':
		   		var pageOptions = '{"setFrontPage":"false","loadWpHead":"false","loadWpFooter":"false","pageBgImage":"","pageBgColor":"transparent","pageLink":"'+pageLink+'","pagePadding":{"pagePaddingTop":"","pagePaddingBottom":"","pagePaddingLeft":"","pagePaddingRight":""},"pagePaddingTablet":{"pagePaddingTopTablet":"","pagePaddingBottomTablet":"","pagePaddingLeftTablet":"","pagePaddingRightTablet":""},"pagePaddingMobile":{"pagePaddingTopMobile":"","pagePaddingBottomMobile":"","pagePaddingLeftMobile":"","pagePaddingRightMobile":""},"pageSeoName":"'+pageSeoName+'","POcustomCSS":"\\/* Add your custom CSS here.*\\/","POcustomJS":"\\/* Add your custom Javascript here.*\\/","POPBDefaults":{"POPBDefaultsEnable":"false","POPB_typefaces":{"typefaceHOne":"Arial","typefaceHTwo":"Arial","typefaceParagraph":"Arial","typefaceButton":"Arial","typefaceAnchorLink":"Arial"},"POPB_typeSizes":{"typeSizeHOne":"45","typeSizeHTwo":"29","typeSizeParagraph":"15","typeSizeButton":"16","typeSizeAnchorLink":"15","typeSizeHOneTablet":"","typeSizeHOneMobile":"","typeSizeHTwoTablet":"","typeSizeHTwoMobile":"","typeSizeParagraphTablet":"","typeSizeParagraphMobile":"","typeSizeButtonTablet":"","typeSizeButtonMobile":"","typeSizeAnchorLinkTablet":"","typeSizeAnchorLinkMobile":""}}}';
	   		break;
	   		case 'temp28':
		   		var pageOptions = '{"setFrontPage":"false","loadWpHead":"false","loadWpFooter":"false","pageBgImage":"","pageBgColor":"#ffffff","pageLink":"'+pageLink+'","pagePadding":{"pagePaddingTop":"2","pagePaddingBottom":"0","pagePaddingLeft":"2","pagePaddingRight":"2"},"pagePaddingTablet":{"pagePaddingTopTablet":"","pagePaddingBottomTablet":"","pagePaddingLeftTablet":"","pagePaddingRightTablet":""},"pagePaddingMobile":{"pagePaddingTopMobile":"","pagePaddingBottomMobile":"","pagePaddingLeftMobile":"","pagePaddingRightMobile":""},"pageSeoName":"'+pageSeoName+'","POcustomCSS":".sidebar-form-row_16{\\nmax-width:350px;\\nmargin:0 auto !important;\\n}","POcustomJS":"\\/* Add your custom Javascript here.*\\/","POPBDefaults":{"POPBDefaultsEnable":"false","POPB_typefaces":{"typefaceHOne":"","typefaceHTwo":"","typefaceParagraph":"","typefaceButton":"","typefaceAnchorLink":""},"POPB_typeSizes":{"typeSizeHOne":"","typeSizeHTwo":"","typeSizeParagraph":"","typeSizeButton":"","typeSizeAnchorLink":"","typeSizeHOneTablet":"","typeSizeHOneMobile":"","typeSizeHTwoTablet":"","typeSizeHTwoMobile":"","typeSizeParagraphTablet":"","typeSizeParagraphMobile":"","typeSizeButtonTablet":"","typeSizeButtonMobile":"","typeSizeAnchorLinkTablet":"","typeSizeAnchorLinkMobile":""}}}';
	   		break;
	   		case 'temp29':
		   		var pageOptions = '{"setFrontPage":"false","loadWpHead":"false","loadWpFooter":"false","pageBgImage":"https:\\/\\/hdwallsource.com\\/img\\/2015\\/9\\/gradient-background-46249-47587-hd-wallpapers.jpg","pageBgColor":"#ffffff","pageLink":"'+pageLink+'","pagePadding":{"pagePaddingTop":"0","pagePaddingBottom":"0","pagePaddingLeft":"10","pagePaddingRight":"10"},"pagePaddingTablet":{"pagePaddingTopTablet":"","pagePaddingBottomTablet":"","pagePaddingLeftTablet":"5","pagePaddingRightTablet":"5"},"pagePaddingMobile":{"pagePaddingTopMobile":"","pagePaddingBottomMobile":"","pagePaddingLeftMobile":"5","pagePaddingRightMobile":"5"},"pageSeoName":"'+pageSeoName+'","POcustomCSS":"\\/* Add your custom CSS here.*\\/","POcustomJS":"\\/* Add your custom Javascript here.*\\/","POPBDefaults":{"POPBDefaultsEnable":"false","POPB_typefaces":{"typefaceHOne":"Arial","typefaceHTwo":"Arial","typefaceParagraph":"Arial","typefaceButton":"Arial","typefaceAnchorLink":"Arial"},"POPB_typeSizes":{"typeSizeHOne":"45","typeSizeHTwo":"29","typeSizeParagraph":"15","typeSizeButton":"16","typeSizeAnchorLink":"15","typeSizeHOneTablet":"","typeSizeHOneMobile":"","typeSizeHTwoTablet":"","typeSizeHTwoMobile":"","typeSizeParagraphTablet":"","typeSizeParagraphMobile":"","typeSizeButtonTablet":"","typeSizeButtonMobile":"","typeSizeAnchorLinkTablet":"","typeSizeAnchorLinkMobile":""}}}';
	   		break;
	   		case 'temp30':
		   		var pageOptions = '{"setFrontPage":"false","loadWpHead":"false","loadWpFooter":"false","pageBgImage":"","pageBgColor":"rgba(0,0,0,0)","pageLink":"'+pageLink+'","pagePadding":{"pagePaddingTop":"0","pagePaddingBottom":"0","pagePaddingLeft":"0","pagePaddingRight":"0"},"pagePaddingTablet":{"pagePaddingTopTablet":"","pagePaddingBottomTablet":"","pagePaddingLeftTablet":"5","pagePaddingRightTablet":"5"},"pagePaddingMobile":{"pagePaddingTopMobile":"","pagePaddingBottomMobile":"","pagePaddingLeftMobile":"5","pagePaddingRightMobile":"5"},"pageSeoName":"'+pageSeoName+'","POcustomCSS":"\\/* Add your custom CSS here.*\\/","POcustomJS":"\\/* Add your custom Javascript here.*\\/","POPBDefaults":{"POPBDefaultsEnable":"false","POPB_typefaces":{"typefaceHOne":"Arial","typefaceHTwo":"Arial","typefaceParagraph":"Arial","typefaceButton":"Arial","typefaceAnchorLink":"Arial"},"POPB_typeSizes":{"typeSizeHOne":"45","typeSizeHTwo":"29","typeSizeParagraph":"15","typeSizeButton":"16","typeSizeAnchorLink":"15","typeSizeHOneTablet":"","typeSizeHOneMobile":"","typeSizeHTwoTablet":"","typeSizeHTwoMobile":"","typeSizeParagraphTablet":"","typeSizeParagraphMobile":"","typeSizeButtonTablet":"","typeSizeButtonMobile":"","typeSizeAnchorLinkTablet":"","typeSizeAnchorLinkMobile":""}}}';
	   		break;
	   		case 'temp31':
		   		var pageOptions = '{"setFrontPage":"false","loadWpHead":"false","loadWpFooter":"false","pageBgImage":"","pageBgColor":"rgba(0,0,0,0)","pageLink":"'+pageLink+'","pagePadding":{"pagePaddingTop":"0","pagePaddingBottom":"0","pagePaddingLeft":"0","pagePaddingRight":"0"},"pagePaddingTablet":{"pagePaddingTopTablet":"","pagePaddingBottomTablet":"","pagePaddingLeftTablet":"5","pagePaddingRightTablet":"5"},"pagePaddingMobile":{"pagePaddingTopMobile":"","pagePaddingBottomMobile":"","pagePaddingLeftMobile":"5","pagePaddingRightMobile":"5"},"pageSeoName":"'+pageSeoName+'","POcustomCSS":"\\/* Add your custom CSS here.*\\/","POcustomJS":"\\/* Add your custom Javascript here.*\\/","POPBDefaults":{"POPBDefaultsEnable":"false","POPB_typefaces":{"typefaceHOne":"Arial","typefaceHTwo":"Arial","typefaceParagraph":"Arial","typefaceButton":"Arial","typefaceAnchorLink":"Arial"},"POPB_typeSizes":{"typeSizeHOne":"45","typeSizeHTwo":"29","typeSizeParagraph":"15","typeSizeButton":"16","typeSizeAnchorLink":"15","typeSizeHOneTablet":"","typeSizeHOneMobile":"","typeSizeHTwoTablet":"","typeSizeHTwoMobile":"","typeSizeParagraphTablet":"","typeSizeParagraphMobile":"","typeSizeButtonTablet":"","typeSizeButtonMobile":"","typeSizeAnchorLinkTablet":"","typeSizeAnchorLinkMobile":""}}}';
	   		break;
	   		case 'temp33':
		   		var pageOptions = '{"setFrontPage":"false","loadWpHead":"false","loadWpFooter":"false","pageBgImage":"","pageBgColor":"rgba(0,0,0,0.9)","pageLink":"'+pageLink+'","pagePadding":{"pagePaddingTop":"","pagePaddingBottom":"","pagePaddingLeft":"","pagePaddingRight":""},"pagePaddingTablet":{"pagePaddingTopTablet":"","pagePaddingBottomTablet":"","pagePaddingLeftTablet":"","pagePaddingRightTablet":""},"pagePaddingMobile":{"pagePaddingTopMobile":"","pagePaddingBottomMobile":"","pagePaddingLeftMobile":"","pagePaddingRightMobile":""},"pageSeoName":"'+pageSeoName+'","POcustomCSS":".pluginops-form-3 input[type=\'text\'], .pluginops-form-3 input[type=\'email\'] {\\n    background:transparent !important;\\n    border:none;\\n    border-bottom:1px solid #fff;\\n}\\n","POcustomJS":"\\/* Add your custom Javascript here.*\\/","POPBDefaults":{"POPBDefaultsEnable":"false","POPB_typefaces":{"typefaceHOne":"Arial","typefaceHTwo":"Arial","typefaceParagraph":"Arial","typefaceButton":"Arial","typefaceAnchorLink":"Arial"},"POPB_typeSizes":{"typeSizeHOne":"45","typeSizeHTwo":"29","typeSizeParagraph":"15","typeSizeButton":"16","typeSizeAnchorLink":"15","typeSizeHOneTablet":"","typeSizeHOneMobile":"","typeSizeHTwoTablet":"","typeSizeHTwoMobile":"","typeSizeParagraphTablet":"","typeSizeParagraphMobile":"","typeSizeButtonTablet":"","typeSizeButtonMobile":"","typeSizeAnchorLinkTablet":"","typeSizeAnchorLinkMobile":""}}}';
	   		break;
	   		case 'temp35':
		   		var pageOptions = '{"setFrontPage":"false","loadWpHead":"false","loadWpFooter":"false","pageBgImage":"","pageBgColor":"rgba(255,255,255,0)","pageLink":"'+pageLink+'","pagePadding":{"pagePaddingTop":"","pagePaddingBottom":"","pagePaddingLeft":"","pagePaddingRight":""},"pagePaddingTablet":{"pagePaddingTopTablet":"","pagePaddingBottomTablet":"","pagePaddingLeftTablet":"","pagePaddingRightTablet":""},"pagePaddingMobile":{"pagePaddingTopMobile":"","pagePaddingBottomMobile":"","pagePaddingLeftMobile":"","pagePaddingRightMobile":""},"pageSeoName":"'+pageSeoName+'","POcustomCSS":".sidebar-form-row-23{\\nmax-width:500px;\\nmargin:0 auto !important;\\n}\\n\\n.template-10-form input{\\n    border-radius:50px ;\\n}\\n","POcustomJS":"\\/* Add your custom Javascript here.*\\/","POPBDefaults":{"POPBDefaultsEnable":"false","POPB_typefaces":{"typefaceHOne":"Arial","typefaceHTwo":"Arial","typefaceParagraph":"Arial","typefaceButton":"Arial","typefaceAnchorLink":"Arial"},"POPB_typeSizes":{"typeSizeHOne":"45","typeSizeHTwo":"29","typeSizeParagraph":"15","typeSizeButton":"16","typeSizeAnchorLink":"15","typeSizeHOneTablet":"","typeSizeHOneMobile":"","typeSizeHTwoTablet":"","typeSizeHTwoMobile":"","typeSizeParagraphTablet":"","typeSizeParagraphMobile":"","typeSizeButtonTablet":"","typeSizeButtonMobile":"","typeSizeAnchorLinkTablet":"","typeSizeAnchorLinkMobile":""}}}';
	   		break;
	   		case 'temp36':
		   		var pageOptions = '{"setFrontPage":"false","loadWpHead":"false","loadWpFooter":"false","pageBgImage":"","pageBgColor":"rgba(255,255,255,0)","pageLink":"'+pageLink+'","pagePadding":{"pagePaddingTop":"","pagePaddingBottom":"","pagePaddingLeft":"","pagePaddingRight":""},"pagePaddingTablet":{"pagePaddingTopTablet":"","pagePaddingBottomTablet":"","pagePaddingLeftTablet":"","pagePaddingRightTablet":""},"pagePaddingMobile":{"pagePaddingTopMobile":"","pagePaddingBottomMobile":"","pagePaddingLeftMobile":"","pagePaddingRightMobile":""},"pageSeoName":"'+pageSeoName+'","POcustomCSS":".sidebar-form-row-24{\\nmax-width:400px;\\nmargin:0 auto !important;\\n}","POcustomJS":"/* Add your custom Javascript here.*/","POPBDefaults":{"POPBDefaultsEnable":"false","POPB_typefaces":{"typefaceHOne":"Arial","typefaceHTwo":"Arial","typefaceParagraph":"Arial","typefaceButton":"Arial","typefaceAnchorLink":"Arial"},"POPB_typeSizes":{"typeSizeHOne":"45","typeSizeHTwo":"29","typeSizeParagraph":"15","typeSizeButton":"16","typeSizeAnchorLink":"15","typeSizeHOneTablet":"","typeSizeHOneMobile":"","typeSizeHTwoTablet":"","typeSizeHTwoMobile":"","typeSizeParagraphTablet":"","typeSizeParagraphMobile":"","typeSizeButtonTablet":"","typeSizeButtonMobile":"","typeSizeAnchorLinkTablet":"","typeSizeAnchorLinkMobile":""}},"bodyBackgroundType":"solid","bodyGradient":{"bodyGradientColorFirst":"","bodyGradientLocationFirst":"","bodyGradientColorSecond":"","bodyGradientLocationSecond":"","bodyGradientType":null,"bodyGradientPosition":null,"bodyGradientAngle":""},"bodyHoverOptions":{"bodyBgColorHover":"","bodyHoverTransitionDuration":"","bodyGradientHover":{"bodyGradientColorFirstHover":"","bodyGradientLocationFirstHover":"","bodyGradientColorSecondHover":"","bodyGradientLocationSecondHover":"","bodyGradientTypeHover":null,"bodyGradientPositionHover":null,"bodyGradientAngleHover":""}},"bodyOverlayGradient":{"bodyOverlayGradientColorFirst":"","bodyOverlayGradientLocationFirst":"","bodyOverlayGradientColorSecond":"","bodyOverlayGradientLocationSecond":"","bodyOverlayGradientType":null,"bodyOverlayGradientPosition":null,"bodyOverlayGradientAngle":""},"bodyBgOverlayColor":"","bodyBorderType":"Solid","bodyBorderWidth":"","bodyBorderColor":"none","bodyBorderRadius":""}';
	   		break;
	   		case 'temp37':
		   		var pageOptions = '{"setFrontPage":"false","loadWpHead":"false","loadWpFooter":"false","pageBgImage":"","pageBgColor":"#111d33","pageLink":"'+pageLink+'","pagePadding":{"pagePaddingTop":"0","pagePaddingBottom":"0","pagePaddingLeft":"0","pagePaddingRight":"0"},"pagePaddingTablet":{"pagePaddingTopTablet":"","pagePaddingBottomTablet":"","pagePaddingLeftTablet":"0","pagePaddingRightTablet":"0"},"pagePaddingMobile":{"pagePaddingTopMobile":"","pagePaddingBottomMobile":"","pagePaddingLeftMobile":"","pagePaddingRightMobile":""},"pageSeoName":"'+pageSeoName+'","pageSeoDescription":"","pageSeoKeywords":"","pageLogoUrl":"","pageFavIconUrl":"","POcustomCSS":"/* Add your custom CSS here.*/","POcustomJS":"/* Add your custom Javascript here.*/","POPBDefaults":{"POPBDefaultsEnable":"false","POPB_typefaces":{"typefaceHOne":"Arial","typefaceHTwo":"Arial","typefaceParagraph":"Arial","typefaceButton":"Arial","typefaceAnchorLink":"Arial"},"POPB_typeSizes":{"typeSizeHOne":"45","typeSizeHTwo":"29","typeSizeParagraph":"15","typeSizeButton":"16","typeSizeAnchorLink":"15","typeSizeHOneTablet":"","typeSizeHOneMobile":"","typeSizeHTwoTablet":"","typeSizeHTwoMobile":"","typeSizeParagraphTablet":"","typeSizeParagraphMobile":"","typeSizeButtonTablet":"","typeSizeButtonMobile":"","typeSizeAnchorLinkTablet":"","typeSizeAnchorLinkMobile":""}}}';
	   		break;
	   		case 'temp38':
		   		var pageOptions = '{"setFrontPage":"false","loadWpHead":"false","loadWpFooter":"false","pageBgImage":"","pageBgColor":"#ffffff","pageLink":"'+pageLink+'","pagePadding":{"pagePaddingTop":"0","pagePaddingBottom":"3","pagePaddingLeft":"2","pagePaddingRight":"2"},"pagePaddingTablet":{"pagePaddingTopTablet":"","pagePaddingBottomTablet":"","pagePaddingLeftTablet":"","pagePaddingRightTablet":""},"pagePaddingMobile":{"pagePaddingTopMobile":"","pagePaddingBottomMobile":"","pagePaddingLeftMobile":"","pagePaddingRightMobile":""},"pageSeoName":"'+pageSeoName+'","POcustomCSS":"/* Add your custom CSS here.*/","POcustomJS":"/* Add your custom Javascript here.*/","POPBDefaults":{"POPBDefaultsEnable":"false","POPB_typefaces":{"typefaceHOne":"Arial","typefaceHTwo":"Arial","typefaceParagraph":"Arial","typefaceButton":"Arial","typefaceAnchorLink":"Arial"},"POPB_typeSizes":{"typeSizeHOne":"45","typeSizeHTwo":"29","typeSizeParagraph":"15","typeSizeButton":"16","typeSizeAnchorLink":"15","typeSizeHOneTablet":"","typeSizeHOneMobile":"","typeSizeHTwoTablet":"","typeSizeHTwoMobile":"","typeSizeParagraphTablet":"","typeSizeParagraphMobile":"","typeSizeButtonTablet":"","typeSizeButtonMobile":"","typeSizeAnchorLinkTablet":"","typeSizeAnchorLinkMobile":""}},"bodyBackgroundType":"solid","bodyGradient":{"bodyGradientColorFirst":"","bodyGradientLocationFirst":"","bodyGradientColorSecond":"","bodyGradientLocationSecond":"","bodyGradientType":null,"bodyGradientPosition":null,"bodyGradientAngle":""},"bodyHoverOptions":{"bodyBgColorHover":"","bodyHoverTransitionDuration":"","bodyGradientHover":{"bodyGradientColorFirstHover":"","bodyGradientLocationFirstHover":"","bodyGradientColorSecondHover":"","bodyGradientLocationSecondHover":"","bodyGradientTypeHover":null,"bodyGradientPositionHover":null,"bodyGradientAngleHover":""}},"bodyOverlayBackgroundType":"solid","bodyOverlayGradient":{"bodyOverlayGradientColorFirst":"","bodyOverlayGradientLocationFirst":"","bodyOverlayGradientColorSecond":"","bodyOverlayGradientLocationSecond":"","bodyOverlayGradientType":null,"bodyOverlayGradientPosition":null,"bodyOverlayGradientAngle":""},"bodyBgOverlayColor":"","bodyBorderType":"Dashed","bodyBorderWidth":"5","bodyBorderColor":"#7db32e","bodyBorderRadius":"5"}';
	   		break;
	   		case 'temp39':
		   		var pageOptions = '{"setFrontPage":"false","loadWpHead":"false","loadWpFooter":"false","pageBgImage":"","pageBgColor":"#2047f8","pageLink":"'+pageLink+'","pagePadding":{"pagePaddingTop":"0.5","pagePaddingBottom":"0.5","pagePaddingLeft":"5","pagePaddingRight":"5"},"pagePaddingTablet":{"pagePaddingTopTablet":"0","pagePaddingBottomTablet":"2","pagePaddingLeftTablet":"5","pagePaddingRightTablet":"5"},"pagePaddingMobile":{"pagePaddingTopMobile":"","pagePaddingBottomMobile":"2","pagePaddingLeftMobile":"5","pagePaddingRightMobile":"5"},"pageSeoName":"'+pageSeoName+'","POcustomCSS":"/* Add your custom CSS here.*/","POcustomJS":"/* Add your custom Javascript here.*/","POPBDefaults":{"POPBDefaultsEnable":"false","POPB_typefaces":{"typefaceHOne":"Arial","typefaceHTwo":"Arial","typefaceParagraph":"Arial","typefaceButton":"Arial","typefaceAnchorLink":"Arial"},"POPB_typeSizes":{"typeSizeHOne":"45","typeSizeHTwo":"29","typeSizeParagraph":"15","typeSizeButton":"16","typeSizeAnchorLink":"15","typeSizeHOneTablet":"","typeSizeHOneMobile":"","typeSizeHTwoTablet":"","typeSizeHTwoMobile":"","typeSizeParagraphTablet":"","typeSizeParagraphMobile":"","typeSizeButtonTablet":"","typeSizeButtonMobile":"","typeSizeAnchorLinkTablet":"","typeSizeAnchorLinkMobile":""}},"bodyBackgroundType":"solid","bodyGradient":{"bodyGradientColorFirst":"","bodyGradientLocationFirst":"","bodyGradientColorSecond":"","bodyGradientLocationSecond":"","bodyGradientType":null,"bodyGradientPosition":null,"bodyGradientAngle":""},"bodyHoverOptions":{"bodyBgColorHover":"","bodyHoverTransitionDuration":"","bodyGradientHover":{"bodyGradientColorFirstHover":"","bodyGradientLocationFirstHover":"","bodyGradientColorSecondHover":"","bodyGradientLocationSecondHover":"","bodyGradientTypeHover":null,"bodyGradientPositionHover":null,"bodyGradientAngleHover":""}},"bodyOverlayGradient":{"bodyOverlayGradientColorFirst":"","bodyOverlayGradientLocationFirst":"","bodyOverlayGradientColorSecond":"","bodyOverlayGradientLocationSecond":"","bodyOverlayGradientType":null,"bodyOverlayGradientPosition":null,"bodyOverlayGradientAngle":""},"bodyBgOverlayColor":"","bodyBorderType":"Solid","bodyBorderWidth":"","bodyBorderColor":"none","bodyBorderRadius":""}';
	   		break;
	   		case 'temp40':
		   		var pageOptions = '{"setFrontPage":"false","loadWpHead":"false","loadWpFooter":"false","pageBgImage":"","pageBgColor":"transparent","pageLink":"'+pageLink+'","pagePadding":{"pagePaddingTop":"3","pagePaddingBottom":"3","pagePaddingLeft":"3","pagePaddingRight":"3"},"pagePaddingTablet":{"pagePaddingTopTablet":"","pagePaddingBottomTablet":"","pagePaddingLeftTablet":"","pagePaddingRightTablet":""},"pagePaddingMobile":{"pagePaddingTopMobile":"","pagePaddingBottomMobile":"","pagePaddingLeftMobile":"","pagePaddingRightMobile":""},"pageSeoName":"'+pageSeoName+'","POcustomCSS":".sidebar-row-28{\\n    max-width:350px;\\n    margin:0 auto !important;\\n}","POcustomJS":"/* Add your custom Javascript here.*/","POPBDefaults":{"POPBDefaultsEnable":"false","POPB_typefaces":{"typefaceHOne":"Arial","typefaceHTwo":"Arial","typefaceParagraph":"Arial","typefaceButton":"Arial","typefaceAnchorLink":"Arial"},"POPB_typeSizes":{"typeSizeHOne":"45","typeSizeHTwo":"29","typeSizeParagraph":"15","typeSizeButton":"16","typeSizeAnchorLink":"15","typeSizeHOneTablet":"","typeSizeHOneMobile":"","typeSizeHTwoTablet":"","typeSizeHTwoMobile":"","typeSizeParagraphTablet":"","typeSizeParagraphMobile":"","typeSizeButtonTablet":"","typeSizeButtonMobile":"","typeSizeAnchorLinkTablet":"","typeSizeAnchorLinkMobile":""}},"bodyBackgroundType":"solid","bodyGradient":{"bodyGradientColorFirst":"","bodyGradientLocationFirst":"","bodyGradientColorSecond":"","bodyGradientLocationSecond":"","bodyGradientType":null,"bodyGradientPosition":null,"bodyGradientAngle":""},"bodyHoverOptions":{"bodyBgColorHover":"","bodyHoverTransitionDuration":"","bodyGradientHover":{"bodyGradientColorFirstHover":"","bodyGradientLocationFirstHover":"","bodyGradientColorSecondHover":"","bodyGradientLocationSecondHover":"","bodyGradientTypeHover":null,"bodyGradientPositionHover":null,"bodyGradientAngleHover":""}},"bodyOverlayGradient":{"bodyOverlayGradientColorFirst":"","bodyOverlayGradientLocationFirst":"","bodyOverlayGradientColorSecond":"","bodyOverlayGradientLocationSecond":"","bodyOverlayGradientType":null,"bodyOverlayGradientPosition":null,"bodyOverlayGradientAngle":""},"bodyBgOverlayColor":"","bodyBorderType":"Solid","bodyBorderWidth":"","bodyBorderColor":"none","bodyBorderRadius":""}';
	   		break;
	   		case 'temp41':
		   		var pageOptions = '{"setFrontPage":"false","loadWpHead":"false","loadWpFooter":"false","pageBgImage":"","pageBgColor":"transparent","pageLink":"'+pageLink+'","pagePadding":{"pagePaddingTop":"","pagePaddingBottom":"","pagePaddingLeft":"","pagePaddingRight":""},"pagePaddingTablet":{"pagePaddingTopTablet":"","pagePaddingBottomTablet":"","pagePaddingLeftTablet":"","pagePaddingRightTablet":""},"pagePaddingMobile":{"pagePaddingTopMobile":"","pagePaddingBottomMobile":"","pagePaddingLeftMobile":"","pagePaddingRightMobile":""},"pageSeoName":"'+pageSeoName+'","POcustomCSS":".sidebar-row-28{\\n    max-width:400px;\\n    margin:0 auto !important;\\n}","POcustomJS":"/* Add your custom Javascript here.*/","POPBDefaults":{"POPBDefaultsEnable":"false","POPB_typefaces":{"typefaceHOne":"Arial","typefaceHTwo":"Arial","typefaceParagraph":"Arial","typefaceButton":"Arial","typefaceAnchorLink":"Arial"},"POPB_typeSizes":{"typeSizeHOne":"45","typeSizeHTwo":"29","typeSizeParagraph":"15","typeSizeButton":"16","typeSizeAnchorLink":"15","typeSizeHOneTablet":"","typeSizeHOneMobile":"","typeSizeHTwoTablet":"","typeSizeHTwoMobile":"","typeSizeParagraphTablet":"","typeSizeParagraphMobile":"","typeSizeButtonTablet":"","typeSizeButtonMobile":"","typeSizeAnchorLinkTablet":"","typeSizeAnchorLinkMobile":""}},"bodyBackgroundType":"solid","bodyGradient":{"bodyGradientColorFirst":"","bodyGradientLocationFirst":"","bodyGradientColorSecond":"","bodyGradientLocationSecond":"","bodyGradientType":null,"bodyGradientPosition":null,"bodyGradientAngle":""},"bodyHoverOptions":{"bodyBgColorHover":"","bodyHoverTransitionDuration":"","bodyGradientHover":{"bodyGradientColorFirstHover":"","bodyGradientLocationFirstHover":"","bodyGradientColorSecondHover":"","bodyGradientLocationSecondHover":"","bodyGradientTypeHover":null,"bodyGradientPositionHover":null,"bodyGradientAngleHover":""}},"bodyOverlayGradient":{"bodyOverlayGradientColorFirst":"","bodyOverlayGradientLocationFirst":"","bodyOverlayGradientColorSecond":"","bodyOverlayGradientLocationSecond":"","bodyOverlayGradientType":null,"bodyOverlayGradientPosition":null,"bodyOverlayGradientAngle":""},"bodyBgOverlayColor":"","bodyBorderType":"Solid","bodyBorderWidth":"","bodyBorderColor":"none","bodyBorderRadius":""}';
	   		break;
	   		case 'temp42':
		   		var pageOptions = '{"setFrontPage":"false","loadWpHead":"false","loadWpFooter":"false","pageBgImage":"","pageBgColor":"#ffffff","pageLink":"'+pageLink+'","pagePadding":{"pagePaddingTop":"2","pagePaddingBottom":"2","pagePaddingLeft":"2","pagePaddingRight":"2"},"pagePaddingTablet":{"pagePaddingTopTablet":"","pagePaddingBottomTablet":"","pagePaddingLeftTablet":"","pagePaddingRightTablet":""},"pagePaddingMobile":{"pagePaddingTopMobile":"","pagePaddingBottomMobile":"","pagePaddingLeftMobile":"","pagePaddingRightMobile":""},"pageSeoName":"'+pageSeoName+'","POcustomCSS":"/* Add your custom CSS here.*/","POcustomJS":"/* Add your custom Javascript here.*/","POPBDefaults":{"POPBDefaultsEnable":"false","POPB_typefaces":{"typefaceHOne":"Arial","typefaceHTwo":"Arial","typefaceParagraph":"Arial","typefaceButton":"Arial","typefaceAnchorLink":"Arial"},"POPB_typeSizes":{"typeSizeHOne":"45","typeSizeHTwo":"29","typeSizeParagraph":"15","typeSizeButton":"16","typeSizeAnchorLink":"15","typeSizeHOneTablet":"","typeSizeHOneMobile":"","typeSizeHTwoTablet":"","typeSizeHTwoMobile":"","typeSizeParagraphTablet":"","typeSizeParagraphMobile":"","typeSizeButtonTablet":"","typeSizeButtonMobile":"","typeSizeAnchorLinkTablet":"","typeSizeAnchorLinkMobile":""}},"bodyBackgroundType":"solid","bodyGradient":{"bodyGradientColorFirst":"","bodyGradientLocationFirst":"","bodyGradientColorSecond":"","bodyGradientLocationSecond":"","bodyGradientType":null,"bodyGradientPosition":null,"bodyGradientAngle":""},"bodyHoverOptions":{"bodyBgColorHover":"","bodyHoverTransitionDuration":"","bodyGradientHover":{"bodyGradientColorFirstHover":"","bodyGradientLocationFirstHover":"","bodyGradientColorSecondHover":"","bodyGradientLocationSecondHover":"","bodyGradientTypeHover":null,"bodyGradientPositionHover":null,"bodyGradientAngleHover":""}},"bodyOverlayGradient":{"bodyOverlayGradientColorFirst":"","bodyOverlayGradientLocationFirst":"","bodyOverlayGradientColorSecond":"","bodyOverlayGradientLocationSecond":"","bodyOverlayGradientType":null,"bodyOverlayGradientPosition":null,"bodyOverlayGradientAngle":""},"bodyBgOverlayColor":"","bodyBorderType":"Solid","bodyBorderWidth":"","bodyBorderColor":"none","bodyBorderRadius":"10"}';
	   		break;
	   		case 'temp43':
		   		var pageOptions = '{"setFrontPage":"false","loadWpHead":"false","loadWpFooter":"false","pageBgImage":"","pageBgColor":"#ffffff","pageLink":"'+pageLink+'","pagePadding":{"pagePaddingTop":"","pagePaddingBottom":"","pagePaddingLeft":"","pagePaddingRight":""},"pagePaddingTablet":{"pagePaddingTopTablet":"","pagePaddingBottomTablet":"","pagePaddingLeftTablet":"","pagePaddingRightTablet":""},"pagePaddingMobile":{"pagePaddingTopMobile":"","pagePaddingBottomMobile":"","pagePaddingLeftMobile":"","pagePaddingRightMobile":""},"pageSeoName":"'+pageSeoName+'","POcustomCSS":"/* Add your custom CSS here.*/","POcustomJS":"/* Add your custom Javascript here.*/","POPBDefaults":{"POPBDefaultsEnable":"false","POPB_typefaces":{"typefaceHOne":"Arial","typefaceHTwo":"Arial","typefaceParagraph":"Arial","typefaceButton":"Arial","typefaceAnchorLink":"Arial"},"POPB_typeSizes":{"typeSizeHOne":"45","typeSizeHTwo":"29","typeSizeParagraph":"15","typeSizeButton":"16","typeSizeAnchorLink":"15","typeSizeHOneTablet":"","typeSizeHOneMobile":"","typeSizeHTwoTablet":"","typeSizeHTwoMobile":"","typeSizeParagraphTablet":"","typeSizeParagraphMobile":"","typeSizeButtonTablet":"","typeSizeButtonMobile":"","typeSizeAnchorLinkTablet":"","typeSizeAnchorLinkMobile":""}},"bodyBackgroundType":"solid","bodyGradient":{"bodyGradientColorFirst":"","bodyGradientLocationFirst":"","bodyGradientColorSecond":"","bodyGradientLocationSecond":"","bodyGradientType":null,"bodyGradientPosition":null,"bodyGradientAngle":""},"bodyHoverOptions":{"bodyBgColorHover":"","bodyHoverTransitionDuration":"","bodyGradientHover":{"bodyGradientColorFirstHover":"","bodyGradientLocationFirstHover":"","bodyGradientColorSecondHover":"","bodyGradientLocationSecondHover":"","bodyGradientTypeHover":null,"bodyGradientPositionHover":null,"bodyGradientAngleHover":""}},"bodyOverlayGradient":{"bodyOverlayGradientColorFirst":"","bodyOverlayGradientLocationFirst":"","bodyOverlayGradientColorSecond":"","bodyOverlayGradientLocationSecond":"","bodyOverlayGradientType":null,"bodyOverlayGradientPosition":null,"bodyOverlayGradientAngle":""},"bodyBgOverlayColor":"","bodyBorderType":"Solid","bodyBorderWidth":"","bodyBorderColor":"none","bodyBorderRadius":"5"}';
	   		break;
	   		case 'temp44':
		   		var pageOptions = '{"setFrontPage":"false","loadWpHead":"false","loadWpFooter":"false","pageBgImage":"","pageBgColor":"#ffffff","pageLink":"'+pageLink+'","pagePadding":{"pagePaddingTop":"","pagePaddingBottom":"","pagePaddingLeft":"","pagePaddingRight":""},"pagePaddingTablet":{"pagePaddingTopTablet":"","pagePaddingBottomTablet":"","pagePaddingLeftTablet":"","pagePaddingRightTablet":""},"pagePaddingMobile":{"pagePaddingTopMobile":"","pagePaddingBottomMobile":"","pagePaddingLeftMobile":"","pagePaddingRightMobile":""},"pageSeoName":"'+pageSeoName+'","POcustomCSS":"/* Add your custom CSS here.*/","POcustomJS":"/* Add your custom Javascript here.*/","POPBDefaults":{"POPBDefaultsEnable":"false","POPB_typefaces":{"typefaceHOne":"Arial","typefaceHTwo":"Arial","typefaceParagraph":"Arial","typefaceButton":"Arial","typefaceAnchorLink":"Arial"},"POPB_typeSizes":{"typeSizeHOne":"45","typeSizeHTwo":"29","typeSizeParagraph":"15","typeSizeButton":"16","typeSizeAnchorLink":"15","typeSizeHOneTablet":"","typeSizeHOneMobile":"","typeSizeHTwoTablet":"","typeSizeHTwoMobile":"","typeSizeParagraphTablet":"","typeSizeParagraphMobile":"","typeSizeButtonTablet":"","typeSizeButtonMobile":"","typeSizeAnchorLinkTablet":"","typeSizeAnchorLinkMobile":""}},"bodyBackgroundType":"solid","bodyGradient":{"bodyGradientColorFirst":"","bodyGradientLocationFirst":"","bodyGradientColorSecond":"","bodyGradientLocationSecond":"","bodyGradientType":null,"bodyGradientPosition":null,"bodyGradientAngle":""},"bodyHoverOptions":{"bodyBgColorHover":"","bodyHoverTransitionDuration":"","bodyGradientHover":{"bodyGradientColorFirstHover":"","bodyGradientLocationFirstHover":"","bodyGradientColorSecondHover":"","bodyGradientLocationSecondHover":"","bodyGradientTypeHover":null,"bodyGradientPositionHover":null,"bodyGradientAngleHover":""}},"bodyOverlayGradient":{"bodyOverlayGradientColorFirst":"","bodyOverlayGradientLocationFirst":"","bodyOverlayGradientColorSecond":"","bodyOverlayGradientLocationSecond":"","bodyOverlayGradientType":null,"bodyOverlayGradientPosition":null,"bodyOverlayGradientAngle":""},"bodyBgOverlayColor":"","bodyBorderType":"Solid","bodyBorderWidth":"","bodyBorderColor":"none","bodyBorderRadius":""}';
	   		break;
	   		default:
	   		var notemplate = " ";
	   		break;
	   	}

	   	pageOptionsNeedToParse = 'true';
	   	var model = '';
	   	if (notemplate == "Template Not Found!") {
	   		$('.pb_loader_container').slideUp(200);
	   	}else{
	   		$.ajax({
			  type: 'GET',
			  dataType: "json",
			  url: bbfourLinks.templatesFolder+popb_selected_template+".json",
			  data: { get_param: 'value' },
			  success: function( data ) {
		   		model = data;
		   			if ( typeof(model['pageOptions']) != 'undefined' ) {
		   				pageOptions = model['pageOptions'];
		   				pageOptionsNeedToParse = 'false';
		   			}
		   			if ( typeof(model['Rows']) != 'undefined' ) {
		   				model = model['Rows'];
		   			}
			  },
			  error: function( xhr, ajaxOptions, thrownError ) {
		   		notemplate = 'Template not found';
		   		$('.pb_loader_container').slideUp(200);
			  },
			  async:false
			});
	   	}

		if (model == '') {
			alert(notemplate);
		}else{
			pageBuilderApp.rowList.reset();
		   	pageBuilderApp.rowList.add( model );

		   	var selectedOptinType = $('.selectedOptinType').val();
		   	
		   	pageBuilderApp.PageBuilderModel.set( 'currentStep', 3);
		   	pageBuilderApp.PageBuilderModel.set( 'optinType', selectedOptinType );
		    pageBuilderApp.PageBuilderModel.set( 'Rows', model );
		    pageBuilderApp.PageBuilderModel.set( 'pageStatus', PbPageStatus );

		    if (selectedOptinType != '') {
		        $('.stepTwoContent').css('display','none');
		        $('.template-card:contains("'+selectedOptinType+'")').show();
		        $('.stepThreeContent').css('display','block');

		        if (selectedOptinType == 'Inline') {
		          $('.selectFormType').val('pluginops_form');
		          $('.selectFormType').trigger('change');
		        }
		        if (selectedOptinType == 'Bar') {
		          $('.pb_editor_tab_content #tab1').css({
		            'width':'100%'
		          });
		          $('.selectFormType').val('pluginops_bar_form');
		          $('.selectFormType').trigger('change');
		        }
		        if (selectedOptinType == 'Fly In') {
		          $('.pb_editor_tab_content #tab1').css({
		          'width':'350px'
		          });
		          $('.selectFormType').val('pluginops_flyin_form');
		          $('.selectFormType').trigger('change');
		        }
		        if (selectedOptinType == 'PopUp') {
		          $('.selectFormType').val('pluginops_popup_form');
		          $('.selectFormType').trigger('change');
		        }
		        
		        if (selectedOptinType == 'Full Page') {
		          $('.pb_editor_tab_content #tab1').css({
		          'width':'100%'
		          });
		          $('#pbWrapper ul').css({
		          'max-width':'80%'
		          });
		          $('#pbWrapper').css({
		          'height':'90vh'
		          });
		          pbWrapperHeight = 'height: 95vh !important;';
		          $('.selectFormType').val('pluginops_full_page_form');
		          $('.selectFormType').trigger('change');
		        }

		    }

		    var pageStatus = PbPageStatus;
		    if (pageOptions !== "") {

		    	if (pageOptionsNeedToParse == 'true') {
		    		pageOptions = JSON.parse(pageOptions);
		    	}else{
		    		pageOptions = pageOptions;
		    	}
		    	
		    	pageOptions['pageLink'] = pageLink;
		    	pageOptions['pageSeoName'] = pageSeoName;

		      pageBuilderApp.PageBuilderModel.set( 'pageOptions', pageOptions );
		      
		      renderPageOps();
		    }

		    var savedPageID = pageBuilderApp.PageBuilderModel.get('pageID');
		    if (P_ID !== savedPageID ) {
		    	pageBuilderApp.PageBuilderModel.set('pageID', P_ID );
		    	var savedPageID = pageBuilderApp.PageBuilderModel.get('pageID');
		    }
		
			
			$('.pb_loader_container').slideUp(200);
			/*
			pageBuilderApp.PageBuilderModel.save({ wait:true }).success(function(response){

		    	setTimeout(function(){
			      $('.pb_loader_container').slideUp(200);
			      $('#initializeCampaignSetup').slideUp(200);
			      $('.pb_fullScreenEditorButton').trigger('click');

			        //window.location.href = admURL+'post.php?post='+P_ID+'&action=edit'; 
			    }, 1000);
			    console.log('Saved');

		    }).error(function(response){

			    alert('Page Not Saved - Some Error Occurred! ');
			    $('.pb_loader_container').slideUp(200);
		    });
		    */

		}
		    
	}

});

}( jQuery ) );