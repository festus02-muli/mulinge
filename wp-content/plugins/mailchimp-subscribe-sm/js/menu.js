(function($){


	var elToAppendTo = jQuery('#menu-posts-pluginops_forms').children('.wp-submenu-wrap');

	var newElToAppendTo = jQuery('#menu-posts-subscribe_me_forms').children('.wp-submenu-wrap');

	jQuery('<li><a href="'+smfb_oldf_site_url.newformsurl+'">Campagins</a></li>').appendTo(newElToAppendTo);

	$(elToAppendTo).children('li:contains("Blank Page")').children().css({'display':'none'} );

	$(elToAppendTo).children('li:contains("Go Pro")').children().css({'color':'#fff', 'background':'#8BC34A' } );


	if (smfb_oldf_site_url.premActive == 'true') {
		$(elToAppendTo).children('li:contains("Go Pro")').css('display','none');
	}

})(jQuery);