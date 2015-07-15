(function($){
$(function(){
	$('.main-menu > a').click(function(){
		$(this).parent().toggleClass('open');
		return false;
	});
	setTimeout(function(){$('.data-boxes .data-box').equalHeightColumns();},3000)
});

})(jQuery);

function fixed_aside_nav(){
	var nav_aside = $('.aside-column');
	var nav_aside_top = nav_aside.offset().top;
	var window_scroll_top = $(window).scrollTop();
	var header_height = $('#header').height()+$('#wpadminbar').height();
	var s_story = $('.s-story');
	
	var footer_event = 10355;
	//var footer_event = 0;
	var padding_menu = 0;
	var aside_content = 0;

	/*
	setTimeout(function() { 	
		var footer_height = $('#footer').height() + $('.nav-section').height();
		aside_content = $('.aside-content').height();
		footer_event = aside_content + footer_height + window.screen.height;
		var nav_aside_height = $("#nav-aside").height();
		var quote_height = $(".s-aside-quote").last().height();
		padding_menu = footer_event - nav_aside_height - quote_height - 300;	
	}, 5000);
	*/
	
	if(window_scroll_top+header_height >= nav_aside_top){
		nav_aside.css({position:'fixed', top:header_height});
	}
	//---
	s_story.each(function(){
		if(window_scroll_top+header_height+100 >= $(this).offset().top){
			$('#nav-aside li').removeClass('active');
			$('#nav-aside a[data-story="'+$(this).attr("id")+'"]').parent().addClass('active');
		}
	});
	//---
	$(window).scroll(function() {
		window_scroll_top = $(window).scrollTop();

		/*	
		if(window_scroll_top+header_height >= nav_aside_top){
			nav_aside.css({position:'fixed', top:header_height});
		}
		else{
			nav_aside.css({position:'static'});
		}
		*/
		
		//jQuery("#scroll").html(window_scroll_top+' '+footer_event+'  aside_content:'+aside_content);
		
		if(window_scroll_top+header_height < nav_aside_top){
			nav_aside.css({position:'static'});
			jQuery("#nav-aside").css("padding-top", "0px");
		}else if(window_scroll_top+header_height >= nav_aside_top && window_scroll_top+header_height < footer_event){
			nav_aside.css({position:'fixed', top:header_height});
			jQuery("#nav-aside").css("padding-top", "0px");
		}else{
			nav_aside.css({position:'static'});
			jQuery("#nav-aside").css("padding-top", padding_menu+"px");	
		}
		
		
		

		//---
		s_story.each(function(){
			if(window_scroll_top+header_height+100 >= $(this).offset().top){
				$('#nav-aside li').removeClass('active');
				$('#nav-aside a[data-story="'+$(this).attr("id")+'"]').parent().addClass('active');
			}
		});
		//---
	});
}
function fixed_aside_quote(){
	if(data_attr = $('#nav-aside .active a').attr('data-story')){
		var aside_quote = $('#s-quote-'+data_attr);
		aside_quote.fadeIn();
	}
	$(window).scroll(function() {
		if(data_attr = $('#nav-aside .active a').attr('data-story')){
			$('.s-aside-quote').not('#s-quote-'+data_attr).hide();
			var aside_quote = $('#s-quote-'+data_attr);
			aside_quote.fadeIn();
		}
	});
}
$.fn.equalHeightColumns = function() {
	var tallest = 0;
	
	$(this).each(function() {
		if ($(this).outerHeight(true) > tallest) {
			tallest = $(this).outerHeight(true);
		}
	});
	
	$(this).each(function() {
		var diff = 0;
		diff = tallest - $(this).outerHeight(true);
		$(this).height($(this).height() + diff);
	});
};