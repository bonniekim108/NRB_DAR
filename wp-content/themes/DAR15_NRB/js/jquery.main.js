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
		window_height = $(window).height();
		window_scroll_top = $(window).scrollTop();
		nav_aside_height = nav_aside.height() + header_height;


		if(window_scroll_top+header_height >= nav_aside_top){
			nav_aside.css({position:'fixed',top:header_height});
		}
		else{
			nav_aside.css({position:'static'});
		}

		if(window_scroll_top+window_height > $('#footer').offset().top){
			nav_aside.css({top:-(window_scroll_top+window_height-$('#footer').offset().top)});
		}
		/*console.log('footer_top '+$('#footer').offset().top);
		console.log('window_scroll_top '+(window_scroll_top));
		console.log('nav_aside_bottom '+(nav_aside.offset().top + nav_aside_height));*/

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
/*function fixed_aside_quote(){
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
}*/
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