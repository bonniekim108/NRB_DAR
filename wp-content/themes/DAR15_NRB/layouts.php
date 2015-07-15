<?php			if(!empty($section['content_section'])){

					

					foreach($section['content_section'] as $layout){

				

						if($layout['acf_fc_layout'] == 'text_block'){

						

							echo $layout['text'];

						



						}elseif($layout['acf_fc_layout'] == 'two-cols-block'){

						

							if($layout['gray_line_position'] == 'above' || $layout['gray_line_position'] == 'bouth') echo '<div class="separator"></div>';

							

							$col_class = ''; $strong_class = '';

							if( $layout['divided_vertical'] != 1){ $col_class = 'v2'; $strong_class = 'v1'; }

							

							echo '<div class="two-cols cf '.$col_class.'">';

																

								if(!empty($layout['col'])){

									foreach($layout['col'] as $col){

										echo '<div class="col">';										

										if(!empty($col['icon'])) echo '<img src="'.$col['icon'].'" class="icon" height="95" width="95" alt="" >';										

										if(!empty($col['strong_text'])) echo '<strong class="num '.$strong_class.'">'.$col['strong_text'].'</strong>';

										if(!empty($col['text'])) echo '<p>'.$col['text'].'</p>';

										echo '</div>';

									}

								}

						

							echo '</div>';

							

							if($layout['gray_line_position'] == 'below' || $layout['gray_line_position'] == 'bouth') echo '<div class="separator"></div>';

							

							

						}elseif($layout['acf_fc_layout'] == 'quote_block'){

						

							if(count($layout['quote']) == 1){

								if(!empty($layout['quote'][0]['text']))	echo '<blockquote>'.$layout['quote'][0]['text'].'</blockquote>';

							}elseif(count($layout['quote']) > 1){	

								echo '<div class="blockquotes-list">';

								foreach($layout['quote'] as $quote){

									echo '<blockquote>'.$quote['text'].'</blockquote>';

								}

								echo '</div>';

							}	

													

					

						}elseif($layout['acf_fc_layout'] == 'outcomes_block'){

						

							echo '<div class="data-row cf">';

								if(!empty($layout['block_title'])){

								echo '<strong class="title">'.$layout['block_title'].'</strong>';

								}

								if(!empty($layout['text'])){

								echo '<div class="data">';

									echo '<p>';

									echo $layout['text'];

									if(!empty($layout['interest']))	echo '<strong class="num">'.$layout['interest'].'</strong>';

									echo '</p>';

								echo '</div>';

								}

							echo '</div>';

						

						

						}elseif($layout['acf_fc_layout'] == 'boxes_block'){

													

							if(!empty($layout['block_title'])) echo '<h4>'.$layout['block_title'].'</h4>';

							echo '<div class="data-boxes cf">';								

								if(!empty($layout['boxes'])){

									foreach($layout['boxes'] as $box){

										echo '<div class="data-box">';										

										if(!empty($box['icon']))  echo '<img src="'.$box['icon'].'" class="icon" height="95" width="95" alt="" >';										

										if(!empty($box['title'])) echo '<h5>'.$box['title'].'</h5>';

										if(!empty($box['text']))  echo '<p>'.$box['text'].'</p>';

										echo '</div>';

									}

								}

							echo '</div>';

												

						}elseif($layout['acf_fc_layout'] == 'separator'){

						

							echo '<div class="separator"></div>';

						

						}elseif($layout['acf_fc_layout'] == 'text_boxes_block'){

						

							if(!empty($layout['block_title'])) echo '<h4>'.$layout['block_title'].'</h4>';

								if(!empty($layout['boxes'])){

								echo '<div class="two-cols-text cf">';								

									foreach($layout['boxes'] as $k=>$box){

										if($k==0) echo '<div class="col">';

										if($k%2 == 0 && $k>0)  echo '</div><div class="col">';										

											echo '<div class="block"><p>'.$box['text'].'</p></div>';										

										if($k== count($layout['boxes'])-1) echo '</div>';

									}	

								echo '</div>';	

								}	

								

						}elseif($layout['acf_fc_layout'] == 'thank_you_line'){

							

							if(!empty($layout['text']))

								echo '<div class="data-text-row">';

								echo $layout['text'];

								echo '</div>';

												

						}elseif($layout['acf_fc_layout'] == 'image_slider'){

						

							if(!empty($layout['slide'])){

								

								$ul_slides = '<ul class="slides">';

								foreach($layout['slide'] as $slide){

								$ul_slides .= '<li><img src="'.$slide['image'].'" height="386" width="640" alt=""></li>';

								}

								$ul_slides .= '</ul>';

								

								echo '<div class="slider">'.$ul_slides.'</div>';

								echo '<div class="slider-carousel">'.$ul_slides.'</div>';

													

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

												

						}elseif($layout['acf_fc_layout'] == 'embed_video'){

							

							if(!empty($layout['embed_code'])) echo '<div class="media-block">'.$layout['embed_code'].'</div>';

							

						}elseif($layout['acf_fc_layout'] == 'big_text_line'){

						

							echo '<div class="data-row v1 cf"><div class="data"><p>';

							echo '<strong class="num">'.$layout['big_text'].'</strong>'.$layout['next_text'];

							echo '</p></div></div>';

												

						}elseif($layout['acf_fc_layout'] == 'organizations_block'){

						

							if(!empty($layout['organizations'])){

							

								echo '<div class="two-cols-text v1 cf">';

								

								$in_col = ceil(count($layout['organizations'])/2);

								

									$col_1 = '';

									$col_2 = '';

									foreach($layout['organizations'] as $n=>$org){

									

										if($n<$in_col){

											$col_1 .= '<div class="block"><p>'.$org['title'].'</p><a href="'.$org['website'].'" class="web-link" title="'.$org['title'].'">website</a></div>';										

										}else{

											$col_2 .= '<div class="block"><p>'.$org['title'].'</p><a href="'.$org['website'].'" class="web-link" title="'.$org['title'].'">website</a></div>';

										}

									

									}

																

									echo '<div class="col">'.$col_1.'</div>';

									echo '<div class="col">'.$col_2.'</div>';

									

								echo '</div>';

						

							}

						

						}elseif($layout['acf_fc_layout'] == 'two_columns_table'){

						

						

								if(!empty($layout['row'])){

									$list_items = '<ul class="list-items">';

									$list_numbers = '<ul class="list-numbers">';								

									foreach($layout['row'] as $row){

										$list_items .= '<li>'.$row['left_cel'].'</li>';

										$list_numbers .= '<li>'.$row['right_cel'].'</li>';							

									}

									$list_items .= '</ul>';

									$list_numbers .= '</ul">';									

									

									

									echo '<div class="two-cols-info cf">';

									echo '  <div class="col">';

									echo '	  <div class="title">';

									echo '		<h3>'.$layout['left_header'].'</h3>';

									echo '	   </div>';

									echo 	   $list_items;

									echo '  </div>';

									echo '  <div class="col">';

									echo '	  <div class="title">';

									echo '		<h3>'.$layout['right_header'].'</h3>';

									echo '	   </div>';

									echo 	   $list_numbers;

									echo '  </div>';

									echo '</div>';									



								}

											

						}elseif($layout['acf_fc_layout'] == 'vertical_logo_carousel'){

						

							echo '<div class="field-container" >';

							if(!empty($layout['logos'])){ ?>

														

								<div class="logos-slider">

							

									<script src="<?php echo TDU; ?>/js/jquery.cycle2.min.js"></script>

									<script src="<?php echo TDU; ?>/js/jquery.cycle2.carousel.min.js"></script>

									<script>$.fn.cycle.defaults.autoSelector = '.slideshow';</script>

							

									<div class="slideshow vertical" 

											data-cycle-fx=carousel

											data-cycle-timeout=0

											data-cycle-next="#scroll-bottom"

											data-cycle-prev="#scroll-top"

											data-cycle-carousel-visible=4

											data-cycle-slides="> a"

											data-cycle-carousel-vertical=true">

										<?php foreach($layout['logos'] as $logo){?>	

										<a href="<?php echo $logo['link']; ?>"><img src="<?php echo $logo['image']; ?>" height="54" width="108" alt=""></a>

										<?php } ?>					

									</div>

									

									

									<div class="logos-control">

										<a href="#" id="scroll-top" class="scroll-top">scroll top</a>

										<a href="#" id="scroll-bottom" class="scroll-bottom">scroll bottom</a>

									</div>

								</div>	

							<?php 

							}

							

							if(!empty($layout['content_with_scrolling'])){

							

									echo '<div class="content content-style" id="scroll_area">';

									echo $layout['content_with_scrolling'];	

									echo '</div>';

									?>

									<script src="<?php echo TDU; ?>/js/jquery.nicescroll.js"></script>

									<script>

										$(document).ready(function() {    

											$("#scroll_area").niceScroll();

										});

									</script>							

									<?php							

							

							}

							

							echo '</div>';

						

						}elseif($layout['acf_fc_layout'] == 'title_in_the_middle'){

						

							if(!empty($layout['title'])) echo '<h2 class="center-title">'.$layout['title'].'</h2>';



						}elseif($layout['acf_fc_layout'] == 'strong_center_text'){

						

							if(!empty($layout['text'])) echo '<h2 class="center-title-text">'.$layout['text'].'</h2>';



						}elseif($layout['acf_fc_layout'] == 'three_ico_blocks'){

						

							if(!empty($layout['blocks'])){

								echo '<div class="three-ico-blocks cf">';

								foreach($layout['blocks'] as $block){

									echo '<div class="block">';

									if(!empty($block['icon'])) echo '<img src="'.$block['icon'].'" alt="">';

									if(!empty($block['strong_number'])) echo '<strong class="num">'.$block['strong_number'].'</strong>';

									if(!empty($block['text'])) echo '<p>'.$block['text'].'</p>';

									echo '</div>';

								}

								echo '</div>';

						

							}

								

						}elseif($layout['acf_fc_layout'] == 'three_icon_boxes'){

						

							if(!empty($layout['boxes'])){

								echo '<div class="three-ico-boxes cf">';

								foreach($layout['boxes'] as $block){

									echo '<div class="box">';

									if(!empty($block['icon'])) echo '<img src="'.$block['icon'].'" height="96" width="96" alt="">';

									if(!empty($block['title'])) echo '<h4>'.$block['title'].'</h4>';

									if(!empty($block['text'])) echo '<p>'.$block['text'].'</p>';

									if(!empty($block['link'])) echo '<a href="'.$block['link'].'" class="link">link</a>';

									echo '</div>';

								}

								echo '</div>';

						

							}						

						

						}elseif($layout['acf_fc_layout'] == 'square_icon_boxes'){

						

							if(!empty($layout['boxes'])){

								echo '<div class="two-ico-boxes cf">';

								foreach($layout['boxes'] as $block){

									echo '<div class="box '.$block['color'].'">';

									if(!empty($block['icon'])) echo '<img src="'.$block['icon'].'" alt="">';

									if(!empty($block['title'])) echo '<h4>'.$block['title'].'</h4>';

									if(!empty($block['text'])) echo '<p>'.$block['text'].'</p>';

									if(!empty($block['link'])) echo '<a href="'.$block['link'].'" class="link">link</a>';

									echo '</div>';

								}

								echo '</div>';

							}

							

						}elseif($layout['acf_fc_layout'] == 'contact_section'){


								echo '<section class="section-contact content-style">';

								if(!empty($layout['title'])) echo '<h3>'.$layout['title'].'</h3>';

								if(!empty($layout['text'])) echo '<p>'.$layout['text'].'</p>';

								echo '<ul class="contact-info-list">';

								if(!empty($layout['email'])){   echo '<li>';
																if(!empty($layout['email_icon'])) echo '<img src="'.$layout['email_icon'].'" class="icon" alt="">';
																echo '<a href="mailto:'.$layout['email'].'" class="mail">'.$layout['email'].'</a>';
																echo '</li>';
															}

								if(!empty($layout['phone'])){ 	echo '<li>';
																if(!empty($layout['phone_icon'])) echo '<img src="'.$layout['phone_icon'].'" class="icon" alt="">';
																echo '<span class="phone">'.$layout['phone'].'</span>';
																echo '</li>';
																}

								if(!empty($layout['web_site'])){ echo '<li>';
																if(!empty($layout['web_site_icon'])) echo '<img src="'.$layout['web_site_icon'].'" class="icon" alt="">';
																echo '<a href="'.$layout['web_site'].'" class="web">'.str_replace('http://', '', $layout['web_site']).'</a>';
																echo '</li>';
																}

								echo '</ul>';

								echo '</section>';

								

						}elseif($layout['acf_fc_layout'] == 'financial_diagrams_section'){

						

								if(!empty($layout['diagrams'])){

								echo '<div class="f-data-items">';

									foreach($layout['diagrams'] as $diagram){

									if(!empty($diagram['title'])) echo '<h3>'.$diagram['title'].'</h3>';									

									echo '<div class="f-data-item cf">';

									if(!empty($diagram['left_description'])){

										echo '<div class="container">';

										echo $diagram['left_description'];	

										echo '</div>';

									}	

									if(!empty($diagram['right_diagram'])){

										echo '<div class="right-image">';

										echo '<img src="'.$diagram['right_diagram'].'" height="262" width="560" alt="">';

										echo '</div>';

									}	

									echo '</div>';

									}

								echo '</div>';

								}

		

						}elseif($layout['acf_fc_layout'] == 'financial_center_title'){

						

						

								echo '<div class="f-grey-data">';

								if(!empty($layout['strong_number'])) echo '<strong class="num">'.$layout['strong_number'].'</strong>';

								if(!empty($layout['title_text'])) echo '<h4>'.$layout['title_text'].'</h4>';

								echo '</div>';

						

						}elseif($layout['acf_fc_layout'] == 'financial_numeric_block'){

						

						?>

							<div class="three-ico-cols cf">

								<div class="block">

									<img src="<?php echo TDU; ?>/images/ico-assets.png" height="96" width="96" alt="" class="icon">

									<h5>Current Assets</h5>

									<div class="holder">

										<strong class="num">$1,811,159</strong>

										<p>Current: Cash, Investments, <br>other receivables</p>

									</div>

									<div class="holder">

										<strong class="num">$250,994</strong>

										<p>Long-term: Grants, Deposits, Property</p>

									</div>

								</div>

								<div class="block">

									<img src="<?php echo TDU; ?>/images/ico-liabilities.png" height="96" width="96" alt="" class="icon">

									<h5>Liabilities</h5>

									<div class="holder">

										<strong class="num">$139,958</strong>

										<p>Total 2013 Liabilities</p>

									</div>

									<div class="popup open">

										<div class="container">

											<strong class="num">66,423</strong>

											<p>Current</p>

										</div>

										<div class="container">

											<strong class="num">73,535</strong>

											<p>Long-Term</p>

										</div>

									</div>

								</div>

								<div class="block">

									<img src="<?php echo TDU; ?>/images/ico-net-assets.png" height="96" width="96" alt="" class="icon">

									<h5>Net Assets</h5>

									<div class="holder">

										<strong class="num">$1,922,195</strong>

										<p>Current: Cash, Investments, <br>other receivables</p>

									</div>

								</div>

							</div>						

							

						<?php 

						}elseif($layout['acf_fc_layout'] == 'partners_block'){

						

							

							if(!empty($layout['partners'])){ ?>

							

							<div class="field-container" >

								<div class="logos-slider">

							

									<script src="<?php echo TDU; ?>/js/jquery.cycle2.min.js"></script>

									<script src="<?php echo TDU; ?>/js/jquery.cycle2.carousel.min.js"></script>

									<script>$.fn.cycle.defaults.autoSelector = '.slideshow';</script>

									<script>

									jQuery(document).ready(function() { 

											jQuery( '.slideshow' ).on( 'cycle-after', function(e, optionHash, outgoingSlideEl, incomingSlideEl, forwardFlag ) {

												var con = jQuery(".cycle-slide-active").attr("href");

												//alert(con);

												show_partner_description(con);

											});

											jQuery( '.slideshow' ).on( 'cycle-post-initialize', function(event, optionHash) {

												alert('!!!');

												var con = jQuery(".cycle-slide-active").attr("href");

												//alert(con);

												show_partner_description(con);

											});											

																						

											

											jQuery(".partner-link").click(function(){

												var con = jQuery(this).attr("href");

												//alert(con);

												show_partner_description(con);											

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

							

									<div class="slideshow vertical" 

											data-cycle-fx=carousel

											data-cycle-timeout=0

											data-cycle-next="#scroll-bottom"

											data-cycle-prev="#scroll-top"

											data-cycle-carousel-visible=4

											data-cycle-slides="> a"

											data-cycle-carousel-vertical=true">

										<?php foreach($layout['partners'] as $pid=>$partner){?>	

										<a href="#content-<?php echo $pid; ?>" class="partner-link"><img src="<?php echo $partner['logo']; ?>" height="54" width="108" alt=""></a>

										<?php } ?>					

									</div>

									

									

									<div class="logos-control">

										<a href="#" id="scroll-top" class="scroll-top">scroll top</a>

										<a href="#" id="scroll-bottom" class="scroll-bottom">scroll bottom</a>

									</div>

								</div>	

									

									<div class="content content-style" id="scroll_area"><?php echo $layout['partners'][0]['description'];?></div>



									<script src="<?php echo TDU; ?>/js/jquery.nicescroll.js"></script>

									<script>

										$(document).ready(function() {    

											$("#scroll_area").niceScroll();

										});

									</script>							

														

									<div style="display:none">

									<?php foreach($layout['partners'] as $pid=>$partner){?>

										<div id="content-<?php echo $pid; ?>">

										<?php echo $partner['description'];?>

										</div>

									<?php } ?>	

									</div>							

							

								</div>

								<?php } 

								

								

						}elseif($layout['acf_fc_layout'] == 'team_block'){

			

								if(!empty($layout['team_items'])){

									echo '<div class="team-items">';

									foreach($layout['team_items'] as $item){

										echo '<div class="item">';

										if(!empty($item['photo'])) echo '<div class="photo"><img src="'.$item['photo'].'" alt="'.$item['name'].'"></div>';

										if(!empty($item['name'])) echo '<h5>'.$item['name'].'</h5>';

										if(!empty($item['position'])) echo '<p>'.$item['position'].'</p>';

										echo '</div>';

									}		

									echo '</div>';

								}		

						

						}

						

						

					} 

				} ?>