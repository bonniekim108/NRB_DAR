<?php
/*
 * @package WordPress
 * Template Name: Highlights Page
*/
?>
<?php get_header(); ?>
<?php if ( have_posts() ){ the_post(); 
$sections = get_field("sections");
$page_thumbnail_id = get_post_thumbnail_id($post->ID);
$page_thumbnail = wp_get_attachment_image_src($page_thumbnail_id, 'full');
?>
<div class="twocolumns center-wrap cf">
	<div class="aside-column">
	<?php if(!empty($sections)){  $active = 'class="active"'; ?>
		<ul id="nav-aside">
			<?php foreach($sections as $sid=>$section){ ?>
			<?php if($sid > 0) $active = ''; ?>
			<li <?php echo $active; ?>><a href="#" data-story="highlight-<?php echo $sid+1; ?>"><img src="<?php echo $section['left_menu_icon']; ?>" height="64" width="64" alt=""/><span><?php echo $section['left_menu_title'];?></span></a></li>
			<?php }?>
		</ul>
		<script type="text/javascript">
		jQuery(document).ready(function(){
			jQuery("#nav-aside li a").click(function(){
				var block_id = jQuery(this).attr("data-story");
				scroll_content(block_id);
				return false;
			});
		});
		function scroll_content(block){
			var headerH = jQuery('#header').height() + 30;
			jQuery("html, body").animate({scrollTop: jQuery("#"+block).offset().top - (headerH) + "px"}, {duration: 1200, easing: "easeInOutExpo"});
		}		
		</script>
	<?php }?>

	<?php if ( is_active_sidebar('Left Sidebar') ) : ?>
		<?php dynamic_sidebar( 'Left Sidebar' ); ?>
	<?php endif; ?>
	
		<!--
		<div class="widget widget-text">
			<p>Some callout text can go here or we can leave blank. as page scrolls this stat / quote / highlight text could change...</p>
		</div>
		-->
	</div>
	
	<div class="aside-content content-style">
		
		<div class="s-story">	
			<?php the_content(); ?>
			<?php if(!empty($page_thumbnail[0])){?>
				<div class="media-block">
					<img src="<?php echo $page_thumbnail[0]; ?>" height="350" width="640" alt="">
				</div>	
			<?php } ?>			
		</div>
		
	<?php if(!empty($sections)){ 
			foreach($sections as $sid=>$section){	?>
			
		<div id="highlight-<?php echo $sid+1; ?>" class="s-story">
			
			<?php if(!empty($section['section_title'])) echo "<h3>".$section['section_title']."</h3>"; ?>
						
			<?php include('layouts.php');	 ?>	
		
		</div>				
		<?php } } ?>
		
	</div>
</div>
<script type="text/javascript">
jQuery(document).ready(function(){
	fixed_aside_nav();
});
</script>
<?php include('footer-nav.php'); ?>
<?php } ?>
<?php get_footer(); ?>