<?php
/*
 * @package WordPress
 * Template Name: Stories Page
*/
?>
<?php get_header(); ?>
<?php if ( have_posts() ){ the_post(); 
$sections = get_field("sections");
$introductory_text = get_field("introductory_text");
$bottom_text = get_field("bottom_text");
$page_thumbnail_id = get_post_thumbnail_id($post->ID);
$page_thumbnail = wp_get_attachment_image_src($page_thumbnail_id, 'full');


$ChildPages = get_posts(array('post_type'=>'page', 'post_parent'=>$post->ID, 'orderby'=>'menu_order', 'order'=>'ASC'));

			//echo '<!--';
			//echo '<pre>';
			//print_r($ChildPages);
			//echo '</pre>';
			//echo '-->';
?>
<script type="text/javascript">
jQuery(document).ready(function(){
	fixed_aside_nav();
});
</script>	
<section class="visual">
	<div class="center-wrap">
		<?php if(!empty($page_thumbnail[0])){?>
		<img src="<?php echo $page_thumbnail[0]; ?>" alt="">
		<?php } ?>
		<div class="dt">
			<div class="dtc">
				<h2><?php echo $introductory_text; ?></h2>
			</div>
		</div>
		<div class="bottom-text">
			<p><?php echo $bottom_text; ?></p>
		</div>
	</div>
</section>
<div class="twocolumns center-wrap cf">
	<div class="aside-column">
	<?php if(!empty($ChildPages)){  $active = 'class="active"'; ?>
		<ul id="nav-aside">
			<?php foreach($ChildPages as $pid=>$ch_page){ 
					$short_title = get_field('short_title', $ch_page->ID);
					$icon = get_field('icon', $ch_page->ID);
					if($pid > 0) $active = ''; 
				?>
			<li <?php echo $active; ?>><a href="#" class="cf" data-story="story-<?php echo $pid+1; ?>"><?php if(!empty($icon)){ ?><img src="<?php echo $icon; ?>" height="64" width="64" alt=""/><?php }?><span><i><?php echo $short_title;?></i></span></a></li>
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
			var headerH = jQuery('#header').height()+jQuery('#wpadminbar').height();
			jQuery("html, body").animate({scrollTop: jQuery("#"+block).offset().top - (headerH) + "px"}, {duration: 1200, easing: "easeInOutExpo"});
		}		
		</script>
	<?php }?>	
	</div>
	<div class="aside-content content-style">
		<?php
			/*
			echo '<!--';
			echo '<pre>';
			print_r($sections);
			echo '</pre>';
			echo '-->';
			*/
		?>
	
		<?php the_content(); ?>
	
		<div class="separator"></div>
	
	<?php  if(!empty($ChildPages)){ 
			foreach($ChildPages as $pid=>$ch_page){	?>
			
		<div id="story-<?php echo $pid+1; ?>" class="s-story">
			
			<h2><?php echo $ch_page->post_title; ?></h2>
				
				<?php
				$flexible_content = get_field('flexible_content', $ch_page->ID);
			
			//echo '<pre>';
			//print_r($flexible_content);
			//echo '</pre>';
			
				/* Sub page Featured Image */
				$page_thumbnail_id = get_post_thumbnail_id($ch_page->ID);
				
				if(!empty($page_thumbnail_id)){
					
					$page_thumbnail = wp_get_attachment_image_src($page_thumbnail_id, 'full');	
					$thumbnail_post = get_post($page_thumbnail_id);		
					
					echo '<figure class="featured-image-block">';
					echo '<img src="'.$page_thumbnail[0].'" alt="">';
					if(!empty($thumbnail_post->post_excerpt)) echo '<figcaption>'.$thumbnail_post->post_excerpt.'</figcaption>';
					echo '</figure>';
				}
			
				if(!empty($flexible_content)){
					foreach($flexible_content as $layout){
					
						if($layout['acf_fc_layout'] == 'text'){

							echo $layout['text'];

						}elseif($layout['acf_fc_layout'] == 'photo_gallery'){		
						
							if(!empty($layout['headline'])) echo '<h3>'.$layout['headline'].'</h3>';

							if(!empty($layout['images'])){

								

								$ul_slides = '<ul class="slides">';

								foreach($layout['images'] as $slide){	
									$mid_image = get_thumb($slide['image'], 640, 386, true);								
									$ul_slides .= '<li><a class="fancybox" href="'.$slide['image'].'" data-fancybox-group="gallery">';
									$ul_slides .= '<img src="'.$mid_image.'" height="386" width="640" alt="">';
									$ul_slides .= '</a></li>';
								}

								$ul_slides .= '</ul>';

								$ul_slides2 = '<ul class="slides">';

								foreach($layout['images'] as $slide){
								
									$thumb = get_thumb($slide['image'], 90, 54, true);
									$ul_slides2 .= '<li><img src="'.$thumb.'" alt=""></li>';

								}

								$ul_slides2 .= '</ul>';								
								
								
								echo '<div class="slider">'.$ul_slides.'</div>';
								echo '<div class="slider-carousel">'.$ul_slides2.'</div>';
								
								?>
								<script src="<?php echo TDU; ?>/js/jquery.flexslider-min.js"></script>
								<script>

									(function($){

									$(function(){
										$('.slider-carousel').flexslider({
											animation: "slide",
											controlNav: false,
											animationLoop: false,
											slideshow: false,
											itemWidth: 90,
											itemMargin: 3,
											asNavFor: '.slider'
										});

										$('.slider').flexslider({
											animation: "slide",
											controlNav: false,
											animationLoop: false,
											slideshow: false,
											sync: ".slider-carousel"
										});

									});
									})(jQuery);

								</script>	

								<?php	

							}						
						
						
						}elseif($layout['acf_fc_layout'] == 'two_column_layout'){
						
							if(!empty($layout['headline'])) echo '<h3>'.$layout['headline'].'</h3>';
							
							echo '<div class="two-cols-text v1 cf">';
							
							echo '<div class="col">'.$layout['left_column'].'</div>';
							
							echo '<div class="col">'.$layout['right_column'].'</div>';
							
							echo '<div>';
						
						}elseif($layout['acf_fc_layout'] == 'icon_columns_layout'){
						
						//echo '<pre>';
						//print_r($layout);
						//echo '</pre>';						
						
							$div_class = array('cf');
							if($layout['num_columns'] == 'two'){ $div_class[] = 'two-cols';
							}elseif($layout['num_columns'] == 'three'){ $div_class[] = 'three-cols'; }
						
							if(!empty($layout['headline'])) echo '<h3>'.$layout['headline'].'</h3>';
						
							if($layout['top_horizontal_rules'] == 1) echo '<div class="separator"></div>';						
							echo '<div class="'.implode(" ", $div_class).'">';
								
								if(!empty($layout['columns'])){								
									foreach($layout['columns'] as $col){
							
										echo '<div class="col">';
										if(!empty($col['image'])){
										echo '<img src="'.$col['image'].'" class="icon" alt="">';
										}	
										//	<strong class="num">1,417</strong>
										echo '<p>'.$col['text'].'</p>';
										echo '</div>';
							
									}
								}
								
							echo '</div>';
							if($layout['bottom_top_horizontal_rules'] == 1) echo '<div class="separator"></div>';
							
						}elseif($layout['acf_fc_layout'] == 'three_column_layout'){
						
							if(!empty($layout['headline'])) echo '<h3>'.$layout['headline'].'</h3>';
							if(!empty($layout['columns'])){
								echo '<div class="team-items">';
								foreach($layout['columns'] as $col){
									echo '<div class="item">';
									if(!empty($col['photo'])) echo '<div class="photo"><img src="'.$col['photo'].'" alt=""></div>';
									echo $col['text'];
									echo '</div>';	
								}		
								echo '</div>';
							}
						
						}elseif($layout['acf_fc_layout'] == 'block_quote'){
						
							echo '<div class="mark-text">';
							if(!empty($layout['headline'])) echo '<h3>'.$layout['headline'].'</h3>';
							echo $layout['text'];
							echo '</div>';
							
						}
						
					}
				}	

				
				$thank_you_footer = get_field('thank_you_footer', $ch_page->ID);
				if(!empty($thank_you_footer)) echo '<div class="data-text-row">'.$thank_you_footer.'</div>';

								
				?>	
				<?php //include('layouts.php');	 ?>	
		
		</div>				
		<?php } }  ?>
	
	</div>
</div>

<?php include('footer-nav.php'); ?>

<?php } ?>
<?php get_footer(); ?>