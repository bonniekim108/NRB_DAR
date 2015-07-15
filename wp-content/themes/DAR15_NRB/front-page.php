<?php
/**
 * @package WordPress
 * @subpackage Base_Theme
 */
	$page_on_front = get_option('page_on_front');
	$front_page_thumbnail_id = get_post_thumbnail_id( $page_on_front );
	$front_page_thumbnail = wp_get_attachment_image_src($front_page_thumbnail_id, 'full');
	$scroll_icon = get_field("scroll_icon", "option");
?>
<?php get_header(); ?>
<div class="page-home-wrap" <?php if(!empty($front_page_thumbnail[0])) echo 'style="background-image: url('.$front_page_thumbnail[0].');"'; ?>>
	<div class="center-wrap dt">
		<div class="dtc">
			<nav class="main-menu">
				<a href="#">menu</a>
				<?php wp_nav_menu( array(
				'container' => false,
				'theme_location' => 'primary_nav'
				)); ?>
			</nav>
			<div class="text-center">
				<strong class="logo"><a href="<?php echo home_url('/'); ?>" title="<?php echo esc_attr(get_bloginfo('name', 'display')); ?>" rel="home"><img src="<?php echo TDU; ?>/images/placeholderlogo.png" alt="<?php bloginfo('name'); ?>"></a></strong>
			</div>
			<?php if ( have_posts() ) : the_post(); ?>
			<?php the_content(); ?>
			<?php endif; ?>
			
			<div class="btn-scroll-holder">
				<a href="#" class="btn-scroll">
					<?php if(!empty($scroll_icon)){?><img src="<?php echo $scroll_icon; ?>" alt="scroll"><?php } ?>
				</a>
			</div>
		</div>
	</div>
</div>
<?php
	$intro_page_id = 14;
	$intro_page = get_page($intro_page_id);
	$intro_page_thumbnail_id = get_post_thumbnail_id( $intro_page_id );
	$intro_page_thumbnail = wp_get_attachment_image_src($intro_page_thumbnail_id, 'full');
	$introductory_text = get_field("introductory_text", $intro_page_id);
?>	
<div id="page-intro">
	<header id="header">
		<div class="center-wrap cf">
			<strong class="logo"><a href="<?php echo home_url('/'); ?>" title="<?php echo esc_attr(get_bloginfo('name', 'display')); ?>" rel="home"><img src="<?php echo TDU; ?>/images/placeholderlogo.png" alt="<?php bloginfo('name'); ?>"></a></strong>
			<?php wp_nav_menu( array(
			'container' => 'nav',
			'container_class' => 'main-nav',
			'theme_location' => 'primary_nav',
			'menu_id' => 'nav'
			)); ?>
		</div>
	</header>
	<section class="visual" <? if(!empty($intro_page_thumbnail[0])){ echo 'style="background-image: url('.$intro_page_thumbnail[0].')"'; } ?>>
		<div class="center-wrap">
			<?php/* if(!empty($intro_page_thumbnail[0])){?>
			<img src="<?php echo $intro_page_thumbnail[0]; ?>" alt="">
			<?php }*/ ?>
			<div class="dt">
				<div class="dtc">
					<h2><?php echo $introductory_text; ?></h2>
					<span class="contact-button customize-report">Customize Your Report</span>
				</div>
			</div>
		</div>
	</section>
	<div class="twocolumns center-wrap width-940 cf">
		<div class="aside-column v1">
		<?php
		$team_list = get_field('team_list', $intro_page_id);
		$signature = get_field('signature', $intro_page_id);
		if(!empty($team_list)){
		?>
			<div class="team-list-widget">
				<ul class="team-list">
					<?php foreach($team_list as $item){?>
					<li>
						<div class="photo">
							<img src="<?php echo $item['photo']; ?>" height="158" width="158" alt="<?php echo $item['name']; ?>">
						</div>
						<h3><?php echo $item['name']; ?></h3>
						<h4><?php echo $item['position']; ?></h4>
					</li>
					<?php } ?>
				</ul>
			</div>
		<?php } ?>	
		</div>
		<article class="aside-content v1 intro content-style">
			
			<?php
			$video_code = get_field('video_code', $intro_page_id);
			if(!empty($video_code)){?>
			<div class="media-block v1">
				<?php echo $video_code; ?>
			</div>
			<?php } ?>
			
			<?php echo $intro_page->post_content; ?>
			
			<?php if(!empty($team_list)){ ?>
			<div class="team-columns cf">
				<?php foreach($team_list as $item){?>
				<div class="column">
					<?php if(!empty($item['signature'])){?>
					<img src="<?php echo $item['signature']; ?>" alt="">
					<?php } ?>				
					<h3><?php echo $item['name']; ?></h3>
					<h4><?php echo $item['position']; ?></h4>
				</div>
				<?php } ?>
			</div>
			<?php } ?>
		</article>
	</div>
	<?php include('footer-nav.php'); ?>
	<?php include('footer-block.php'); ?>
</div>
<script>
	(function($){
	$(function(){
		window_height = $(window).height();
		front_page_scrolled = false;
		
		$('.page-home-wrap').css({height: window_height});

		$('.btn-scroll, .main-menu .intro > a').click(function(){
			front_page_scroll();
			return false;
		});

		$(window).on('mousewheel', function() {
			if(!front_page_scrolled){
				$(window).scrollTop(0);
				setTimeout(function(){front_page_scroll();},100);
			}
			front_page_scrolled = true;
		});

		$(window).resize(function() {
			window_height = $(window).height();
			$('.page-home-wrap').css({height: window_height});
			$('.home-intro .page-home-wrap').css({'margin-top': -window_height});
		});
	});
	function front_page_scroll(){
		$('#page-intro').show();
		$('.page-home-wrap').animate({'margin-top': -window_height}, {duration: 1200, easing: "easeInOutExpo", complete: function(){
				$('#header').css({position:'fixed'});
				$('#page-intro').css({'padding-top':$('#header').height()});
			}
		});
		$('#wrapper').addClass('home-intro');
		$('#nav .intro').addClass('active');
	}
	})(jQuery);
</script>
<?php get_footer(); ?>