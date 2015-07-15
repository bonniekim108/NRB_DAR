<?php
/**
 * @package WordPress
 * @subpackage Base_Theme
 */
?>
<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>" />
	<!--<title><?php wp_title( '|', true, 'right' ); ?></title>-->
	<title><?php echo (wp_title( ' ', false, 'right' ) == '') ? get_bloginfo('name') : wp_title( ' ', false, 'right' ); ?></title>
	<link rel="profile" href="http://gmpg.org/xfn/11" />
	<link href='http://fonts.googleapis.com/css?family=Open+Sans:400italic,700italic,400,700' rel='stylesheet' type='text/css'>
	<link rel="stylesheet" type="text/css" media="all" href="<?php bloginfo( 'stylesheet_url' ); ?>" />
	<link rel="stylesheet" type="text/css" media="all" href="<?php bloginfo('template_directory');?>/customstyle.css" />
	<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>" />
	<?php if ( is_singular() && get_option( 'thread_comments' ) ) wp_enqueue_script( 'comment-reply' ); 
		wp_head(); ?>
	<script type="text/javascript" src="<?php echo TDU; ?>/js/jquery.main.js" ></script>
	<!--[if lt IE 9]>
		<script type="text/javascript" src="<?php echo TDU; ?>/js/html5.js"></script>
	<![endif]-->
	<!--[if lte IE 9]>
		<script type="text/javascript" src="<?php echo TDU; ?>/js/jquery.placeholder.min.js"></script>
		<script type="text/javascript">
			jQuery(function(){
				jQuery('input, textarea').placeholder();
			});
		</script>
	<![endif]-->
	<script src="<?php echo TDU?>/js/jquery.easing.min.js"></script>
	<script type="text/javascript" src="<?php echo TDU?>/js/jquery.mousewheel-3.0.6.pack.js"></script>
	<script type="text/javascript" src="<?php echo TDU?>/fancybox/jquery.fancybox.js?v=2.1.5"></script>
	<script type="text/javascript" src="<?php echo TDU?>/fancybox/helpers/jquery.fancybox-media.js?v=1.0.6"></script>
	<link rel="stylesheet" type="text/css" href="<?php echo TDU?>/fancybox/jquery.fancybox.css?v=2.1.5" media="screen" />	
	<script type="text/javascript">
		jQuery(document).ready(function() {
			jQuery('.fancybox').fancybox();
		});
	</script>

	<!-- Facebook Conversion Code for Leads - Elefint1 -->
	<script>(function() {
	 			var _fbq = window._fbq || (window._fbq = []);
			  	if (!_fbq.loaded) {
				    var fbds = document.createElement('script');
				    fbds.async = true;
				    fbds.src = '//connect.facebook.net/en_US/fbds.js';
				    var s = document.getElementsByTagName('script')[0];
				    s.parentNode.insertBefore(fbds, s);
				    _fbq.loaded = true;
		 		}
	  		})();
			window._fbq = window._fbq || [];
			window._fbq.push(['track', '6022556716733', {'value':'0.00','currency':'USD'}]);
	</script>
	<noscript><img height="1" width="1" alt="" style="display:none" src="https://www.facebook.com/tr?ev=6022556716733&amp;cd[value]=0.00&amp…" /></noscript>


	
	<?php
	$arrows_photo_slider = get_field('arrows_photo_slider', 'option');
	$arrows_video_slider = get_field('arrows_video_slider', 'option');
	$arrows_logo_slider = get_field('arrows_logo_slider', 'option');
	if(empty($arrows_photo_slider)) $arrows_photo_slider = '/wp-content/themes/womensfunding/images/arrows-slider.png';
	if(empty($arrows_video_slider)) $arrows_video_slider = '/wp-content/themes/womensfunding/images/arrows-slider-video.png';
	if(empty($arrows_logo_slider)) $arrows_logo_slider = '/wp-content/themes/womensfunding/images/arrows-logos.png';
	?>
	<style>
		.slider .flex-prev:before,
		.slider .flex-next:before{
			background: url(<?php echo $arrows_photo_slider; ?>) no-repeat;
		}
		/*---------------*/
		.slider-carousel .flex-prev:before,
		.slider-carousel .flex-next:before{
			background: url(<?php echo $arrows_photo_slider; ?>) no-repeat;
		}
		/*---------------*/
		.slider-carousel-video .flex-prev,
		.slider-carousel-video .flex-next{
			background: url(<?php echo $arrows_video_slider; ?>) no-repeat;
		}
		/*---------------*/
		.logos-slider-carousel .flex-prev,
		.logos-slider-carousel .flex-next{
			background: url(<?php echo $arrows_logo_slider; ?>) no-repeat;
		}
	</style>
</head>
<body <?php body_class(); ?>>
	<div id="wrapper">
	<?php if(!is_front_page()): ?>
		<header id="header">
			<div class="center-wrap cf">
				<strong class="logo"><a href="<?php echo home_url('/'); ?>" title="<?php echo esc_attr(get_bloginfo('name', 'display')); ?>" rel="home"><img src="<?php echo TDU; ?>/images/placeholderlogo.png" alt="<?php bloginfo('name'); ?>"></a></strong>
				<?php wp_nav_menu( array(
				'container' => 'nav',
				'container_class' => 'main-nav',
				'theme_location' => 'primary_nav',
				'menu_id' => 'nav'
				)); ?>
				<span id="scroll" style="color:white"></span>
			</div>
		</header>
	<?php endif; ?>