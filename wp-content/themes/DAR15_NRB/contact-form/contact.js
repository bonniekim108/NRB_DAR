(function($){

	$(document).ready(function(){

		$('.contact-button').on('click', function(){
			$('.contact-modal').toggleClass('open');
		});

		$('.contact-modal .close').on('click', function(){
			$('.contact-modal').removeClass('open');
		})

	});

})(jQuery);