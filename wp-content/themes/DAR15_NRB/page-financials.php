<?php
/*
 * @package WordPress
 * Template Name: Financials Page
*/
?>
<?php get_header(); ?>
<?php if ( have_posts() ){ the_post(); 
$sections = get_field("sections");
$introductory_text = get_field("introductory_text");
$bottom_text = get_field("bottom_text");
$page_thumbnail_id = get_post_thumbnail_id($post->ID);
$page_thumbnail = wp_get_attachment_image_src($page_thumbnail_id, 'full');
	
if(!empty($sections)){  $active = 'class="active"';	
?>
<script type="text/javascript">
jQuery(document).ready(function(){
	jQuery("#fnav-top li a").click(function(){
		jQuery("#fnav-top li").removeClass("active");
		jQuery(this).parent().addClass("active");
		var block_id = jQuery(this).attr("data-story");
		scroll_content(block_id);
		return false;
	});
});
function scroll_content(block){
	var headerH = jQuery('#header').height() + 130;
	jQuery("html, body").animate({scrollTop: jQuery("#"+block).offset().top - (headerH) + "px"}, {duration: 1200, easing: "easeInOutExpo"});
}		
</script>
<div class="top-tabs-holder">
	<ul class="top-tabs center-wrap cf" id="fnav-top">
		<?php foreach($sections as $sid=>$section){ ?>
		<?php if($sid > 0) $active = ''; ?>
		<li <?php echo $active; ?>>
			<a href="#" data-story="financial-section-<?php echo $sid+1; ?>">
				<img src="<?php echo $section['left_menu_icon']; ?>" height="64" width="64" alt="">
				<span><?php echo $section['left_menu_title'];?></span>
			</a>
		</li>
		<?php } ?>
	</ul>
</div>
<?php } ?>
<section class="visual black">
	<div class="center-wrap">
		<?php if(!empty($page_thumbnail[0])){?>
		<img src="<?php echo $page_thumbnail[0]; ?>" alt="">
		<?php } ?>	
		<div class="dt">
			<div class="dtc">
				<h2><?php echo $introductory_text; ?></h2>
			</div>
		</div>
	</div>
</section>
<div id="main" class="center-wrap width-860 cf">

		<?php
			/*
			echo '<!--';
			echo '<pre>';
			print_r($sections);
			echo '</pre>';
			echo '-->';
			*/
		?>

	<?php if(!empty($sections)){ 
			foreach($sections as $sid=>$section){	?>
			
			<section id="financial-section-<?php echo $sid+1; ?>">
			<?php if(!empty($section['section_title'])) echo '<h2  class="section-title">'.$section['section_title'].'</h2>'; ?>
			
			<?php include('layouts.php'); ?>
			
			</section>
	<?php	}
		  }
	?>
</div>

<?php include('footer-nav.php'); ?>
<?php } ?>
<?php get_footer(); ?>