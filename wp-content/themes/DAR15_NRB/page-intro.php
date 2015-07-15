<?php
/*
 * @package WordPress
 * Template Name: Intro Page
*/
?>
<?php get_header(); ?>
<?php if ( have_posts() ){ the_post(); 

	$intro_page_id = get_the_ID();
	
	$intro_page_thumbnail_id = get_post_thumbnail_id( $intro_page_id );
	$intro_page_thumbnail = wp_get_attachment_image_src($intro_page_thumbnail_id, 'full');
	$introductory_text = get_field("introductory_text", $intro_page_id);
	$bottom_text = get_field("bottom_text");
	$video_link = get_field("video_link");	
	$video_play_icon = get_field('video_play_icon', 'option');	
?>
<section class="visual" <? if(!empty($intro_page_thumbnail[0])){ echo 'style="background-image: url('.$intro_page_thumbnail[0].')"'; } ?>>
	<div class="center-wrap">
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
		
			<?php the_content();?>
		
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
<?php } ?>
<?php get_footer(); ?>