<?php
/*
 * @package WordPress
 * Template Name: Supporters Page
*/
?>
<?php get_header(); ?>
<?php if ( have_posts() ){ the_post(); 
$sections = get_field("sections");
$introductory_text = get_field("introductory_text");
$bottom_text = get_field("bottom_text");
$page_thumbnail_id = get_post_thumbnail_id($post->ID);
$page_thumbnail = wp_get_attachment_image_src($page_thumbnail_id, 'full');
	
?>
<!-- <section class="visual" style="background-image: url(<?php echo $page_thumbnail[0]; ?>);">
	<div class="center-wrap">
		<?php/* if(!empty($page_thumbnail[0])){?>
		<img src="<?php echo $page_thumbnail[0]; ?>" alt="">
		<?php }*/ ?>
		<div class="dt">
			<div class="dtc">
				<h2><?php echo $introductory_text; ?></h2>
			</div>
		</div>
	</div>
</section> -->
<div id="main" class="center-wrap width-940 main-supporters content-style cf">

	<?php the_content();?>
	
</div>

<?php include('footer-nav.php'); ?>
<?php } ?>
<?php get_footer(); ?>