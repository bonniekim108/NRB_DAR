<?php
/*
 * @package WordPress
 * Template Name: Child Page
*/
?>
<?php get_header(); ?>
<?php if ( have_posts() ){ the_post(); 
$sections = get_field("sections");
$introductory_text = get_field("introductory_text");
$bottom_text = get_field("bottom_text");
$video_link = get_field("video_link");
$page_thumbnail_id = get_post_thumbnail_id($post->ID);
$page_thumbnail = wp_get_attachment_image_src($page_thumbnail_id, 'full');
$video_play_icon = get_field('video_play_icon', 'option');

$ChildPages = get_posts(array('post_type'=>'page', 'post_parent'=>$post->ID, 'orderby'=>'menu_order', 'order'=>'ASC'));

			//echo '<!--';
			//echo '<pre>';
			//print_r($ChildPages);
			//echo '</pre>';
			//echo '-->';
?>
<script src="<?php echo TDU; ?>/js/jquery.flexslider-min.js"></script>
<script type="text/javascript">
jQuery(document).ready(function(){
	fixed_aside_nav();
	//fixed_aside_quote();
});
</script>
<?php if(!empty($page_thumbnail[0])){?>	
<section class="visual" style="background-image: url(<?php echo $page_thumbnail[0]; ?>);">
	<div class="center-wrap">
		<!-- <img src="<?php echo $page_thumbnail[0]; ?>" alt=""> -->
		<div class="dt">
			<div class="dtc">
				<?php if(!empty($video_link)){?>
				<script type="text/javascript">
				jQuery(document).ready(function() {				
					jQuery('.fancybox-media')
						.attr('rel', 'media-gallery')
						.fancybox({
							openEffect : 'none',
							closeEffect : 'none',
							prevEffect : 'none',
							nextEffect : 'none',
							padding : 0,
							margin : 0,
							arrows : false,
							helpers : {
								media : {},
								buttons : {}
							}
						});	
				});			
				</script>
				<a href="<?php echo $video_link;?>" class="btn-video fancybox-media"><?php if(!empty($video_play_icon)){?><img src="<?php echo $video_play_icon; ?>" alt="Play"><?php } ?></a><?php } ?>
				<h2><?php echo $introductory_text; ?></h2>
			</div>
		</div>
		<div class="bottom-text">
			<p><?php echo $bottom_text; ?></p>
		</div>
	</div>
</section>
<?php } ?>
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
		
		<?php /* foreach($ChildPages as $pid=>$ch_page){ 
		$flexible_content = get_field('flexible_content', $ch_page->ID);
		if(!empty($flexible_content)){
			foreach($flexible_content as $layout){
				if($layout['acf_fc_layout'] == 'pull_quote'){		
		?>
		<aside id="s-quote-story-<?php echo $pid+1; ?>" class="s-aside-quote">
			<q><?php echo $layout['quote_text']; ?></q>
		</aside>
		<?php 	}
			  }
			}
		} */?>	
		
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
	
		<?php 
		if(!empty($post->post_content)){
			the_content();
			echo '<div class="separator"></div>';
		}
	
	    if(!empty($ChildPages)){ 
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
								<script>

									(function($){

									$(function(){
										$('.slider-carousel').flexslider({
											animation: "slide",
											controlNav: false,
											slideshow: false,
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
							
							echo '</div>';
						
						}elseif($layout['acf_fc_layout'] == 'icon_columns_layout'){
						
						//echo '<pre>';
						//print_r($layout);
						//echo '</pre>';						
						
							$div_class = array('cf');
							
							//if($layout['num_columns'] == 'two'){ $div_class[] = 'two-cols';
							//}elseif($layout['num_columns'] == 'three'){ $div_class[] = 'three-cols'; }
														
							if($layout['num_columns'] == 'two' && $layout['vertical_rules'] != 1){ $div_class[] = 'data-boxes';							
							}elseif($layout['num_columns'] == 'two' && $layout['vertical_rules'] == 1){ $div_class[] = 'two-cols';
							}elseif($layout['num_columns'] == 'three' && $layout['vertical_rules'] != 1){ $div_class[] = 'data-boxes three';
							}elseif($layout['num_columns'] == 'three' && $layout['vertical_rules'] == 1){ $div_class[] = 'three-cols'; }
													
							if(!empty($layout['headline'])) echo '<h3>'.$layout['headline'].'</h3>';
						
							if($layout['top_horizontal_rules'] == 1) echo '<div class="separator"></div>';						
							echo '<div class="'.implode(" ", $div_class).'">';
								
								if(!empty($layout['columns'])){								
									foreach($layout['columns'] as $col){
							
										if($layout['vertical_rules'] == 1){
										echo '<div class="col">';
										}else{
										echo '<div class="data-box">';
										}
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
						
							$border_class = '';
							if(!empty($layout['headline'])) echo '<h3>'.$layout['headline'].'</h3>';
							if($layout['use_round_border']) $border_class = 'team-items';
							if(!empty($layout['columns'])){
								echo '<div class="three-ico-cols '.$border_class.' cf">';
								foreach($layout['columns'] as $col){
									echo '<div class="col">';
									if(!empty($col['photo'])) echo '<div class="photo"><img src="'.$col['photo'].'" alt=""></div>';
									echo $col['text'];
									echo '</div>';	
								}		
								echo '</div>';
							}
						
						}elseif($layout['acf_fc_layout'] == 'block_quote'){
						
							echo '<div class="data-row cf"><div class="data">';
							if(!empty($layout['headline'])) echo '<h3>'.$layout['headline'].'</h3>';
							
							$pos = strpos($layout['text'], '<strong class="num">');
							if($pos === false || $pos > 3) {
								echo $layout['text'];
							}else{
								echo str_replace('</strong>','</strong><div class="ovh">', $layout['text']).'</div>';
							}
							echo '</div></div>';
							
						}elseif($layout['acf_fc_layout'] == 'tabbed_layout'){
						
							/*
							?>
							
									<script>
									jQuery(document).ready(function() { 
											$('.field-container.horizontal .logos-slider').flexslider({
												animation: "slide",
												slideshow: false,
												animationLoop: false,
												itemWidth: 125,
												itemMargin: 10,
												minItems: 2,
												maxItems: 4,
												controlNav: false,
												start: function(){
													var current_li = jQuery(".logos li:first a");
													var prev_con = current_li.parent().prev().find("a").attr("href");
													var next_con = current_li.parent().next().find("a").attr("href");												
													if(prev_con == undefined){
														jQuery("#scroll-prev").addClass('disabled');
														jQuery("#scroll-prev").attr("href", '#');
													} else {
														jQuery("#scroll-prev").removeClass('disabled');
														jQuery("#scroll-prev").attr("href", prev_con);
													}
													if(next_con == undefined){
														jQuery("#scroll-next").addClass('disabled');
														jQuery("#scroll-next").attr("href", '#');
													} else {
														jQuery("#scroll-next").removeClass('disabled');												
														jQuery("#scroll-next").attr("href", next_con);
													}												
												}
											});
									
											
											jQuery(".partner-link").click(function(){
												jQuery(".logos li").removeClass('active');
												jQuery(this).parent().addClass('active');
												var prev_con = jQuery(this).parent().prev().find("a").attr("href");
												var next_con = jQuery(this).parent().next().find("a").attr("href");
												var con = jQuery(this).attr("href");
												
												show_partner_description(con);	
												if(prev_con == undefined){
													jQuery("#scroll-prev").addClass('disabled');
													jQuery("#scroll-prev").attr("href", '#');
												} else {
													jQuery("#scroll-prev").removeClass('disabled');
													jQuery("#scroll-prev").attr("href", prev_con);
												}
												if(next_con == undefined){
													jQuery("#scroll-next").addClass('disabled');
													jQuery("#scroll-next").attr("href", '#');
												} else {
													jQuery("#scroll-next").removeClass('disabled');												
													jQuery("#scroll-next").attr("href", next_con);
												}	
												return false;
											});
											
											jQuery("#scroll-prev, #scroll-next").click(function(){																						
												if(jQuery(this).hasClass("disabled")) return false;
												var con = jQuery(this).attr("href");																
												var current_li = jQuery(".logos li a[href='"+con+"']");
												jQuery(".logos li").removeClass('active');
												current_li.parent().addClass('active');
												//alert(current_li.html());
												var prev_con = current_li.parent().prev().find("a").attr("href");
												var next_con = current_li.parent().next().find("a").attr("href");												
												//alert(prev_con+' '+con+' '+next_con);
												show_partner_description(con);	
												if(prev_con == undefined){
													jQuery("#scroll-prev").addClass('disabled');
													jQuery("#scroll-prev").attr("href", '#');
												} else {
													jQuery("#scroll-prev").removeClass('disabled');
													jQuery("#scroll-prev").attr("href", prev_con);
												}
												if(next_con == undefined){
													jQuery("#scroll-next").addClass('disabled');
													jQuery("#scroll-next").attr("href", '#');
												} else {
													jQuery("#scroll-next").removeClass('disabled');												
													jQuery("#scroll-next").attr("href", next_con);
												}											
												return false;
											});
									});	

									function show_partner_description(con){
										var tab_cont = jQuery(con).html();
										jQuery("#scroll_area" ).fadeTo( "fast" , 0, function() {
												jQuery("#scroll_area").html(tab_cont);
												jQuery("#scroll_area" ).fadeTo( "fast" , 1);												
										});
									}
									
									
									</script>
								
							<?php
							if(!empty($layout['headline'])) echo '<h3>'.$layout['headline'].'</h3>';
							
							if(!empty($layout['tabs'])){

							echo '<div class="field-container horizontal cf">';							
							echo '<div class="logos-slider">';
							echo '<ul class="slides logos">';
								foreach($layout['tabs'] as $pid=>$tab){
									if(empty($tab['image'])) continue;
									if($pid == 0 ){ $active = 'class="active"'; }else{ $active = ''; }
									echo '<li '.$active.'><a href="#content-'.$pid.'" class="partner-link"><img src="'$tab['image', 108, 54, true].'"></a></li>';
								}
							echo '</ul>';								
							echo '</div>';
								
							echo '<div class="content content-style">';
							echo '<div id="scroll_area">'.$layout['tabs'][0]['tab_content'].'</div>';
							echo	'<div class="logos-navigation cf">
										<a href="#" class="prev" id="scroll-prev">&lt; Previous</a>
										<a href="#content-1" class="next" id="scroll-next">Next &gt;</a>
									</div>';
							echo '</div>';
								
							echo '</div>';
							
							echo '<div style="display:none">';
									foreach($layout['tabs'] as $pid=>$tab){
										if(empty($tab['image'])) continue;
										echo '<div id="content-'.$pid.'">';
										echo $tab['tab_content'];
										echo '</div>';
									}	
							echo '</div>';		
									
							}
							*/
							
							
							if(!empty($layout['tabs'])){

								

								$ul_slides = "\r\n".'<ul class="slides">';

								foreach($layout['tabs'] as $pid=>$tab){
									$ul_slides .= "\r\n".'<li>';
									$ul_slides .= $tab['tab_content'];
									$ul_slides .= "\r\n".'</li>';
								}

								$ul_slides .= "\r\n".'</ul>';

								$ul_slides2 = '<ul class="slides logos">';

								foreach($layout['tabs'] as $pid=>$tab){
									$ul_slides2 .= "\r\n".'<li><img src="'.get_thumb($tab['image'], 108, 54, true).'" height="54" width="108" alt=""></li>';
								}

								$ul_slides2 .= '</ul>';								
								
								echo "\r\n".'<div class="field-container horizontal cf">';	
								echo "\r\n".'<div class="logos-slider-carousel" id="logos-carousel">'.$ul_slides2.'</div>';								
								echo "\r\n".'<div class="logos-slider" id="logos">'.$ul_slides.'</div>';
								echo "\r\n".'</div>';
								
								?>
								<script>
									(function($){
									$(function(){
										$('#logos-carousel').flexslider({
											animation: "slide",
											controlNav: false,
											slideshow: false,
											animationLoop: false,
											itemWidth: 125,
											itemMargin: 10,
											//minItems: 4,
											//maxItems: 4,
											asNavFor: '#logos'
										});

										$('#logos').flexslider({
											animation: "slide",
											controlNav: false,
											animationLoop: false,
											slideshow: false,
											smoothHeight: true,
											sync: "#logos-carousel",
											prevText: "&lt; Previous",
											nextText: "Next &gt;"
										});
									});
									})(jQuery);
								</script>	
								<?php	
							}							
							

						}elseif($layout['acf_fc_layout'] == 'video_gallery'){
						
							$randID = randomString(20, TRUE, TRUE, FALSE);
							
							if(!empty($layout['headline'])) echo '<h3>'.$layout['headline'].'</h3>';
							
							if(!empty($layout['videos'])){
							
								echo '<div class="slider-video" id="slider-video-'.$randID.'">';
								echo '<ul class="slides">';
									foreach($layout['videos'] as $vid=>$video){
									$new_width = 640;
									$new_height = 372;
									$embed_code = preg_replace('/width="(\d+)(px)?" height="(\d+)(px)?"/',
															'width="' . $new_width . '" height="' . $new_height . '"',
															$video['embed_code']); 
										echo '<li>'.$embed_code.'</li>';
									}	
									echo '</ul>';
								echo '</div>';
								
								echo '<div class="slider-carousel-video" id="slider-carousel-video-'.$randID.'">';
								echo '<ul class="slides">';
									foreach($layout['videos'] as $vid=>$video){
										echo '<li><img src="'.get_thumb($video['thumbnail'], 162, 98, true).'" height="386" width="640" alt=""></li>';
									}
									echo '</ul>';
								echo '</div>';						
								?>
								<script>
								jQuery(document).ready(function() { 						
									$('#slider-carousel-video-<?php echo $randID;?>').flexslider({
										animation: "slide",
										controlNav: false,
										animationLoop: false,
										slideshow: false,
										itemWidth: 162,
										itemMargin: 5,
										asNavFor: '#slider-video-<?php echo $randID;?>'
									});

									$('#slider-video-<?php echo $randID;?>').flexslider({
										animation: "slide",
										controlNav: false,
										directionNav: false,
										animationLoop: false,
										slideshow: false,
										sync: "#slider-carousel-video-<?php echo $randID;?>"
									});
								});
								</script>
								<?php 
						
							}
						}elseif($layout['acf_fc_layout'] == 'photo_video_gallery'){
						
							$randID = randomString(20, TRUE, TRUE, FALSE);
							//echo $randID;
							if(!empty($layout['headline'])) echo '<h3>'.$layout['headline'].'</h3>';
							
							if(!empty($layout['videos'])){
							
								echo '<div class="slider-video" id="slider-video-'.$randID.'">';
								echo '<ul class="slides">';
									foreach($layout['videos'] as $vid=>$video){
									$new_width = 640;
									$new_height = 372;
									
										if(!empty($video['embed_code'])){
											$embed_code = preg_replace('/width="(\d+)(px)?" height="(\d+)(px)?"/',
															'width="' . $new_width . '" height="' . $new_height . '"',
															$video['embed_code']); 
											echo '<li>'.$embed_code.'</li>';
										}elseif(!empty($video['photo'])){
											$mid_image = get_thumb($slide['image'], $new_width, $new_height, true);
											echo '<li><a class="fancybox" href="'.$slide['image'].'" data-fancybox-group="gallery">';
											echo '<img src="'.$mid_image.'" width="'.$new_width.'" height="'.$new_height.'" alt="">';
											echo '</a></li>';																					
										}
										
										
										
										
									}	
									echo '</ul>';
								echo '</div>';
								
								echo '<div class="slider-carousel-video" id="slider-carousel-video-'.$randID.'">';
								echo '<ul class="slides">';
									foreach($layout['videos'] as $vid=>$video){
										echo '<li><img src="'.get_thumb($video['thumbnail'], 162, 98, true).'" height="386" width="640" alt=""></li>';
									}
									echo '</ul>';
								echo '</div>';						
								?>
								<script>
								jQuery(document).ready(function() { 						
									$('#slider-carousel-video-<?php echo $randID;?>').flexslider({
										animation: "slide",
										controlNav: false,
										animationLoop: false,
										slideshow: false,
										itemWidth: 162,
										itemMargin: 5,
										asNavFor: '#slider-video-<?php echo $randID;?>'
									});

									$('#slider-video-<?php echo $randID;?>').flexslider({
										animation: "slide",
										controlNav: false,
										directionNav: false,
										animationLoop: false,
										slideshow: false,
										sync: "#slider-carousel-video-<?php echo $randID;?>"
									});
								});
								</script>
								<?php 
						
							}
						}elseif($layout['acf_fc_layout'] == 'icon_text_row'){
						
							echo '<div class="icon-text-row dt">';
							if(!empty($layout['icon'])){
							echo '<div class="dtc">';
							echo '<img src="'.$layout['icon'].'" height="64" width="64" alt="">';
							echo '</div>';
							}
							echo '<div class="dtc">'.$layout['text'].'</div>';
							echo '</div>';
						
						}
					}
				}	

				
				$thank_you_footer = get_field('thank_you_footer', $ch_page->ID);
				$heart_icon = get_field('heart_icon', 'option');
				if(!empty($thank_you_footer)) echo '<div class="data-text-row" style="background-image: url('.$heart_icon.');">'.$thank_you_footer.'</div>';

				
				foreach($flexible_content as $layout){
					if($layout['acf_fc_layout'] == 'pull_quote'){		
					?>
					<aside id="s-quote-story-<?php echo $pid+1; ?>" class="s-aside-quote">
						<q><?php echo $layout['quote_text']; ?></q>
					</aside>
					<?php 	}
				}
			  
				?>	
				<?php //include('layouts.php');	 ?>	
		
		</div>				
		<?php } }  ?>
	
	</div>
</div>

<?php include('footer-nav.php'); ?>

<?php } ?>
<?php get_footer(); ?>