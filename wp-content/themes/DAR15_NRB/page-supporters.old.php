<?php
/*
 * @package WordPress
 * Template Name: Supporters Page
*/
?>
<?php get_header(); ?>
<div id="main" class="center-wrap width-862 cf">
	<h2 class="center-title">THANK YOU TO ALL OUR SUPPORTERS</h2>
	<div class="filter-area">
		<div class="heading">
			<h3>VIEW SUPPORTERS BY TYPE</h3>
			<a href="#" id="view_all">View All</a>
		</div>
		<div class="filters-holder">
			<div class="row">
				<div class="f-item stype"  data-filter="individual">
					<img src="<?php echo TDU; ?>/images/ico-individual.png" height="23" width="23" alt="">
					<span>Individual + Family Foundation Giving</span>
				</div>
				<div class="f-item stype"  data-filter="corporate">
					<img src="<?php echo TDU; ?>/images/ico-corporate.png" height="25" width="24" alt="">
					<span>Corporate + Foundation Giving</span>
				</div>
			</div>
			<div class="row">
				<div class="f-item" data-filter="board-member">
					<i class="ico board-member"></i>
					<span>Board Member</span>
				</div>
				<div class="f-item" data-filter="sponsor">
					<i class="ico sponsor"></i>
					<span>Sponsor</span>
				</div>
				<div class="f-item" data-filter="donor">
					<i class="ico donor"></i>
					<span>Donor</span>
				</div>
				<div class="f-item" data-filter="program-funding">
					<i class="ico program-funding"></i>
					<span>Program Funding</span>
				</div>
				<div class="f-item" data-filter="other">
					<i class="ico other"></i>
					<span>Other</span>
				</div>
			</div>
		</div>
	</div>
	<?php
	
	function get_quality_of_giving(){
		global $wpdb;
		$fields_array = unserialize($wpdb->get_var("SELECT meta_value FROM $wpdb->postmeta WHERE meta_key = 'field_543e85a545b10' "));	
		return $fields_array['sub_fields'][4]['choices'];
	}
	
	function get_type_of_giving(){
		global $wpdb;
		$fields_array = unserialize($wpdb->get_var("SELECT meta_value FROM $wpdb->postmeta WHERE meta_key = 'field_543e85a545b10' "));	
		return $fields_array['sub_fields'][3]['choices'];
	}
	
	$supporters = get_field('supporters');
	$hide_image = get_field('hide_image');
	$quality_of_giving = get_quality_of_giving();
	$type_of_giving = get_type_of_giving();
	
	
	//echo '<pre>';
	//print_r($quality);
	//print_r($supporters);
	//echo '</pre>';

	if(!empty($supporters)){
	$k = 1;
	?>
	
		<script src="<?php echo TDU?>/js/isotope.pkgd.min.js"></script>
		<script type="text/javascript">
		jQuery(document).ready(function(){
			var $container = jQuery('#container');
			// init
			$container.isotope({
			  // options
			  itemSelector: '.s-box',
			  layoutMode: 'fitRows'
			});		
				
			jQuery(document).on("click", ".f-item", function(){
			  var filterValue = '.'+jQuery(this).attr('data-filter');
			  $container.isotope({ filter: filterValue });
			  jQuery(".f-item").removeClass("disabled");
			  jQuery(this).addClass("disabled");
			  //if(jQuery(this).hasClass('stype')){
			  //	jQuery(".stype").remove
			  //}
			});	

			jQuery(document).on("click", "#view_all", function(){
			  $container.isotope({ filter: '*' });
			  jQuery(".f-item").removeClass("disabled");
			  return false;
			});				

			jQuery(document).on("click", "#view-more", function(){

				var n=0;
				jQuery(".s-box").each(function(i){
					if(jQuery(this).hasClass("hidden") && n<2){
						jQuery(this).removeClass("hidden");
						n++;
					}
				});
			  
			  var countc = jQuery("#container div.hidden").length;
			  if(countc == 0){
				jQuery("#view-more").hide();	
			  }	
			  $container.isotope({ filter: '*' });
			  jQuery(".f-item").removeClass("disabled");
			  return false;
			});				
			
			
		});
		</script>
		
	<div class="supporters-main cf" id="container">

		<div class="s-box no-bg">
			<h4><a href="#">DONOR LEVEL</a></h4>
			<p>Donor Level Description (eg. $500–$1,000)</p>
			<a href="#" class="arrow-link">link</a>
		</div>
		
		<?php foreach($supporters as $supp){?>
		
			<div class="s-box <?php if(!$hide_image){ echo 'high '; } echo $supp['quality_of_giving']; echo ' '.$supp['type_of_giving'];?> <?php if($k>4) echo 'hidden'; ?>" >
				<?php if($supp['type_of_giving'] == 'individual'){?>
				<img src="<?php echo TDU; ?>/images/icon-individual.png" height="23" width="23" alt="<?php echo $type_of_giving[$supp['type_of_giving']]; ?>" class="ico">
				<?php }elseif($supp['type_of_giving'] == 'corporate'){?>
				<img src="<?php echo TDU; ?>/images/icon-corporate.png" height="23" width="23" alt="<?php echo $type_of_giving[$supp['type_of_giving']]; ?>" class="ico">
				<?php } ?>
				<h4>
				<?php if(!empty($supp['link']) && $hide_image){ echo '<a href="'.$supp['link'].'" target="_blank" title="'.$supp['name'].'">'; }?>
				<?php if($hide_image){
						echo substr($supp['name'], 0, 40);
					  }else{
						echo $supp['name'];	  
					  }
				?>
				<?php if(!empty($supp['link']) && $hide_image){ echo '</a>'; } ?>
				</h4>
				<em><?php echo $quality_of_giving[$supp['quality_of_giving']];?></em>
				<?php if(!empty($supp['image']) && !$hide_image){?>
				<?php //if(!empty($supp['link'])){ echo '<a href="'.$supp['link'].'" target="_blank">'; }?>
				<img src="<?php echo $supp['image']; ?>" height="135" width="135" alt="" class="photo">
				<?php //if(!empty($supp['link'])){ echo '</a>'; } ?>
				<?php }?>
				
				<?php if(!empty($supp['link']) && !$hide_image){?>
				<div class="link-holder">
					<a href="<?php echo $supp['link']; ?>" class="web-link" target="_blank">Visit Website</a>
				</div>
				<?php }?>
			
			</div>
		<?php $k++; ?>
		<?php } ?>

		<?php /*
		<!--  -->
		<div class="s-box donor">
			<img src="<?php echo TDU; ?>/images/icon-individual.png" height="23" width="23" alt="" class="ico">
			<h4><a href="#">Anonymous</a></h4>
			<em>Donor</em>
		</div>
		<!--  -->
		<div class="s-box donor">
			<img src="<?php echo TDU; ?>/images/icon-individual.png" height="23" width="23" alt="" class="ico">
			<h4><a href="#">Holly Arbeit</a></h4>
			<em>Donor</em>
		</div>
		<div class="s-box donor">
			<img src="<?php echo TDU; ?>/images/icon-individual.png" height="23" width="23" alt="" class="ico">
			<h4><a href="#">Jean Asher</a></h4>
			<em>Donor</em>
		</div>
		<div class="s-box donor">
			<img src="<?php echo TDU; ?>/images/icon-individual.png" height="23" width="23" alt="" class="ico">
			<h4><a href="#">Janice L. Bandrofchak</a></h4>
			<em>Donor</em>
		</div>

		<div class="s-box donor">
			<img src="<?php echo TDU; ?>/images/icon-individual.png" height="23" width="23" alt="" class="ico">
			<h4><a href="#">Donna Barkman</a></h4>
			<em>Donor</em>
		</div>
		<div class="s-box donor">
			<img src="<?php echo TDU; ?>/images/icon-individual.png" height="23" width="23" alt="" class="ico">
			<h4><a href="#">Judy &amp; Ron Bartels</a></h4>
			<em>Donor</em>
		</div>
		<div class="s-box donor">
			<img src="<?php echo TDU; ?>/images/icon-individual.png" height="23" width="23" alt="" class="ico">
			<h4><a href="#">Deepa Bharani</a></h4>
			<em>Donor</em>
		</div>
		<div class="s-box donor">
			<img src="<?php echo TDU; ?>/images/icon-individual.png" height="23" width="23" alt="" class="ico">
			<h4><a href="#">Kaushik Bhatia</a></h4>
			<em>Donor</em>
		</div>
		<div class="s-box board-member">
			<img src="<?php echo TDU; ?>/images/icon-individual.png" height="23" width="23" alt="" class="ico">
			<h4><a href="#">Jim Bildner</a></h4>
			<em>Board Member</em>
		</div>
		<div class="s-box no-bg">
			<h4><a href="#">DONOR LEVEL</a></h4>
			<p>Donor Level Description (eg. $500–$1,000)</p>
			<a href="#" class="arrow-link">link</a>
		</div>
		<div class="s-box high board-member">
			<img src="<?php echo TDU; ?>/images/icon-individual.png" height="23" width="23" alt="" class="ico">
			<h4><a href="#">Cecilia &amp; Garrett Boone of the Boone Family Fund at the Dallas Women's Foundation</a></h4>
			<em>Board Member</em>
			<div class="link-holder">
				<a href="#" class="web-link">Visit Website</a>
			</div>
		</div>
		<div class="s-box donor">
			<img src="<?php echo TDU; ?>/images/icon-individual.png" height="23" width="23" alt="" class="ico">
			<h4><a href="#">Bonnie Broeren</a></h4>
			<em>Donor</em>
		</div>
		<div class="s-box donor">
			<img src="<?php echo TDU; ?>/images/icon-individual.png" height="23" width="23" alt="" class="ico">
			<h4><a href="#">Bonnie Broeren</a></h4>
			<em>Donor</em>
		</div>
		<div class="s-box other">
			<img src="<?php echo TDU; ?>/images/icon-corporate.png" height="23" width="23" alt="" class="ico">
			<h4><a href="#">Care2</a></h4>
			<em>Donor</em>
		</div>
		<div class="s-box high board-member">
			<img src="<?php echo TDU; ?>/images/icon-individual.png" height="23" width="23" alt="" class="ico">
			<h4><a href="#">Angel Buchanan</a></h4>
			<em>Board Member</em>
			<a href="#"><img src="<?php echo TDU; ?>/images/img-support.png" height="135" width="135" alt="" class="photo"></a>
		</div>
		<div class="s-box donor">
			<img src="<?php echo TDU; ?>/images/icon-individual.png" height="23" width="23" alt="" class="ico">
			<h4><a href="#">Lucky Charms</a></h4>
			<em>Donor</em>
		</div>
		<div class="s-box high other">
			<img src="<?php echo TDU; ?>/images/icon-corporate.png" height="23" width="23" alt="" class="ico">
			<h4><a href="#">The California Wellness Foundation</a></h4>
			<em>Matching Gift</em>
			<div class="link-holder">
				<a href="#" class="web-link">Visit Website</a>
			</div>
		</div>
		<div class="s-box program-funding">
			<img src="<?php echo TDU; ?>/images/icon-corporate.png" height="23" width="23" alt="" class="ico">
			<h4><a href="#">Council of Michigan Foundations</a></h4>
		</div>
		*/ ?>
	</div>
	<?php } ?>
	<div class="s-btn-more">
		<a href="#" class="btn-red" id="view-more">View More</a>
	</div>
</div>
<div class="nav-section cf">
	<div class="center-wrap">
		<a href="#" class="link-prev">back</a>
		<a href="#" class="link-next">next: highlights</a>
	</div>
</div>
<?php get_footer(); ?>