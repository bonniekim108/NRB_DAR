<?php
/*
 * @package WordPress
 * Template Name: Stories Static Page
*/
?>
<?php get_header(); ?>
<section class="visual">
	<div class="center-wrap">
		<img src="<?php echo TDU; ?>/images/img-stories.jpg" alt="">
		<div class="dt">
			<div class="dtc">
				<a href="#" class="btn-video">play</a>
				<h2>In 2013, Women’s Funding Network worked alongside <br>more than 160 members in over 25 countries. Together, <br>we examined the challenges that face women today.</h2>
			</div>
		</div>
		<div class="bottom-text">
			<p>Janet Sape with Jane Sloane, Women’s Funding Network Board Member, Vice President of <br>Programs at Global Fund for Women, and long-time supporter of Janet’s work</p>
		</div>
	</div>
</section>
<script src="<?php echo TDU; ?>/js/jquery.flexslider-min.js"></script>
<script>
	(function($){
	$(function(){
		fixed_aside_nav();

		jQuery("#nav-aside li a").click(function(){
			var block_id = jQuery(this).attr("data-story");
			scroll_content(block_id);
			return false;
		});

		//fixed_aside_quote();

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

		$('.slider-carousel-video').flexslider({
					animation: "slide",
					controlNav: false,
					animationLoop: false,
					slideshow: false,
					itemWidth: 162,
					itemMargin: 5,
					asNavFor: '.slider-video'
				});

				$('.slider-video').flexslider({
					animation: "slide",
					controlNav: false,
					directionNav: false,
					animationLoop: false,
					slideshow: false,
					sync: ".slider-carousel-video"
				});

		$('.field-container.horizontal .logos-slider').flexslider({
			animation: "slide",
			animationLoop: false,
			itemWidth: 125,
			itemMargin: 10,
			minItems: 2,
			maxItems: 4,
			controlNav: false
		});
		
		function scroll_content(block){
			var headerH = jQuery('#header').height()+jQuery('#wpadminbar').height();
			jQuery("html, body").animate({scrollTop: jQuery("#"+block).offset().top - (headerH) + "px"}, {duration: 1200, easing: "easeInOutExpo"});
		}
	});
	})(jQuery);
</script>
<script type="text/javascript">
jQuery(document).ready(function(){
	
});
</script>
<div class="twocolumns center-wrap cf">
	<div class="aside-column">
		<ul id="nav-aside">
			<li><a href="#" data-story="story-1" class="cf"><img src="<?php echo TDU; ?>/images/ico-f-programmatic.png" height="64" width="64" alt=""/><span><i>2013 conference</i></span></a></li>
			<li><a href="#" data-story="story-2" class="cf"><img src="<?php echo TDU; ?>/images/ico-6.png" height="64" width="64" alt=""/><span><i>LEAd award</i></span></a></li>
			<li><a href="#" data-story="story-3" class="cf"><img src="<?php echo TDU; ?>/images/ico-7.png" height="65" width="65" alt=""/><span><i>partnership for women’s prosperity</i></span></a></li>
			<li><a href="#" data-story="story-4" class="cf"><img src="<?php echo TDU; ?>/images/ico-4.png" height="64" width="64" alt=""/><span><i>women &amp; the new economy</i></span></a></li>
			<li><a href="#" data-story="story-5" class="cf"><img src="<?php echo TDU; ?>/images/ico-2.png" height="64" width="64" alt=""/><span><i>raising leaders, raising millions</i></span></a></li>
		</ul>
		<aside id="s-quote-story-1" class="s-aside-quote">
			<q>“It gave me insight into the importance of community organizations working together.”</q>
		</aside>
		<aside id="s-quote-story-2" class="s-aside-quote">
			<q>"We women, we thought we were alone. We thought our problems were our own. Now we know we have a global movement of women's funds supporting us, and that makes all the difference." –  Janet Sape</q>
		</aside>
		<aside id="s-quote-story-3" class="s-aside-quote">
			<q>Current economic indicators show an alarming increase in the percentage of women and children living in poverty. </q>
		</aside>
		<aside id="s-quote-story-4" class="s-aside-quote">
			<q>"It's critical to apply the gender lens in a broader space, beyond ourselves and philanthropy. We must bring that lens to other systems that are influential in the lives of women and girls, in order to create truly systemic change." <br>–  Michele Ozumba, at the Northeast Regional Convening</q>
		</aside>
		<aside id="s-quote-story-5" class="s-aside-quote">
			<q>"Language matters and learning about how to present the issue of reproductive health in ways that would appeal to the broadest possible constituency [were most valuable].”</q>
		</aside>
	</div>
	<div class="aside-content content-style">
		<h2>STORIES OF CHANGE</h2>
		<p>In 2013, Women’s Funding Network worked alongside more than 160 members in over 25 countries. Together, we examined the challenges that face women today and identified ways that women’s funds and foundations can fuel change. We also lifted the voice of our Network, sharing our insights in new spaces and with new partners to strengthen the movement of women-led social change. The following stories are just one look at the impact of our Network – join us on <a href="#">Twitter</a> and <a href="#">Facebook</a> to see our community in action every day.</p>
		<div class="separator"></div>
		<div id="story-1" class="s-story first">
			<h2>connecting for impact: <br>our 2013 Conference</h2>
			<div class="slider">
				<ul class="slides">
					<li><img src="<?php echo TDU; ?>/images/img-1.jpg" height="386" width="640" alt=""></li>
					<li><img src="<?php echo TDU; ?>/images/img-2.jpg" height="386" width="640" alt=""></li>
					<li><img src="<?php echo TDU; ?>/images/img-3.jpg" height="386" width="640" alt=""></li>
					<li><img src="<?php echo TDU; ?>/images/img-4.jpg" height="386" width="640" alt=""></li>
				</ul>
			</div>
			<div class="slider-carousel">
				<ul class="slides">
					<li><img src="<?php echo TDU; ?>/images/img-1.jpg" height="386" width="640" alt=""></li>
					<li><img src="<?php echo TDU; ?>/images/img-2.jpg" height="386" width="640" alt=""></li>
					<li><img src="<?php echo TDU; ?>/images/img-3.jpg" height="386" width="640" alt=""></li>
					<li><img src="<?php echo TDU; ?>/images/img-4.jpg" height="386" width="640" alt=""></li>
				</ul>
			</div>
			<div class="slider-video">
				<ul class="slides">
					<li><img src="<?php echo TDU; ?>/images/temp-video-lightbox.jpg" alt=""></li>
					<li><img src="<?php echo TDU; ?>/images/temp-video-lightbox.jpg" alt=""></li>
					<li><img src="<?php echo TDU; ?>/images/temp-video-lightbox.jpg" alt=""></li>
					<li><img src="<?php echo TDU; ?>/images/temp-video-lightbox.jpg" alt=""></li>
					<li><img src="<?php echo TDU; ?>/images/temp-video-lightbox.jpg" alt=""></li>
					<li><img src="<?php echo TDU; ?>/images/temp-video-lightbox.jpg" alt=""></li>
				</ul>
			</div>
			<div class="slider-carousel-video">
				<ul class="slides">
					<li><img src="<?php echo TDU; ?>/images/img-2.jpg" height="386" width="640" alt=""></li>
					<li><img src="<?php echo TDU; ?>/images/img-3.jpg" height="386" width="640" alt=""></li>
					<li><img src="<?php echo TDU; ?>/images/img-4.jpg" height="386" width="640" alt=""></li>
					<li><img src="<?php echo TDU; ?>/images/img-2.jpg" height="386" width="640" alt=""></li>
					<li><img src="<?php echo TDU; ?>/images/img-3.jpg" height="386" width="640" alt=""></li>
					<li><img src="<?php echo TDU; ?>/images/img-4.jpg" height="386" width="640" alt=""></li>
				</ul>
			</div>
			<p>From April 10 to 12, 2013, more than 225 changemakers from over 15 countries gathered in Detroit, Michigan, USA for the annual conference of Women's Funding Network. Together, we explored new models for giving, impact, and collaboration within and beyond the women's movement.</p>
			<p>Being in Detroit was a symbolic nod to a city that is testing its resilience and innovating to meet new economic realities. In many ways, Women’s Funding Network and our members bear witness to this same test every day, in the innovative ways we invest in change and the people we engage around the world.</p>
			<h3>keynote speakers</h3>
			<div class="team-items">
				<div class="item">
					<div class="photo"><img src="<?php echo TDU; ?>/images/photo-6.jpg" alt=""></div>
					<h5>Lisa Hall</h5>
					<p>CEO, The Calvert Foundation</p>
					<a href="#">www.calavertfoundation.org</a>
					<q>“Beyond Grantmaking: The Power of Impact Investing”</q>
				</div>
				<div class="item">
					<div class="photo"><img src="<?php echo TDU; ?>/images/photo-7.jpg" alt=""></div>
					<h5>Rebecca Sive</h5>
					<p>Political Strategist and Author of “Every Day is Election Day”</p>
					<a href="#">www.rebeccasive.com</a>
					<q>“What’s Next in Women’s Public Leadership”</q>
				</div>
				<div class="item">
					<div class="photo"><img src="<?php echo TDU; ?>/images/photo-8.jpg" alt=""></div>
					<h5>Cecile Richards</h5>
					<p>CEO, Planned <br>Parenthood Federation</p>
					<a href="#">www.plannedparenthood.org</a>
					<q>“The Potential for Progress: Women's Reproductive Health Care in the 21st Century”</q>
				</div>
			</div>
			<h3>memorable moments</h3>
			<div class="twitter-feed-holder">
				<img src="<?php echo TDU; ?>/images/temp-twitter.png" height="583" width="395" alt="">
			</div>
			<h3>member co-hosts</h3>
			<div class="two-cols-text cf">
				<div class="col">
					<ul>
						<li>
							<p>Lovelight Foundation</p>
							<a href="#" class="web-link">www.lovelightfoundation.org</a>
						</li>
						<li>
							<p>Michigan Women’s Foundation</p>
							<a href="#" class="web-link">www.miwf.org</a>
						</li>
						<li>
							<p>Sojourner Foundation</p>
							<a href="#" class="web-link">www.sojournerfoundation.org</a>
						</li>
					</ul>
				</div>
			</div>
		</div>
		<div id="story-2" class="s-story">
			<h2>Lead Award</h2>
			<figure class="featured-image-block">
				<img src="<?php echo TDU; ?>/images/img-5.jpg" alt="">
				<figcaption>Janet Sape with Jane Sloane, Women’s Funding Network Board Member, Vice President of Programs at Global Fund for Women, and long-time supporter of Janet’s work.</figcaption>
			</figure>
			<h3 class="mbn">Honoring Risk-Takers: The Women &amp; Philanthropy LEAD Award </h3>
			<p>When we gather as a community of changemakers, pausing to celebrate our achievements is just as important as the time we spend exploring challenges in our work. The 2013 Women’s Funding Network conference reflected this in a very special way as we recognized the work of Janet Sape of Papua New Guinea.</p>
			<p>Janet was honored with the Women & Philanthropy LEAD Award for pioneering the creation of Women’s Micro Bank, a landmark economic justice initiative in Papua New Guinea. The bank is the first in the Pacific region to be operated solely by and for women. She undertook the ambitious project after a twelve-year banking career, during which she encountered women trapped in extreme poverty and abusive relationships due to the absence of a pathway to financial independence.</p>
			<p>Support from Global Fund for Women, a member of Women’s Funding Network, enabled Janet to travel to Detroit and accept the LEAD Award at our 2013 conference. Following the award ceremony, Janet embarked on a world tour of speaking engagements and diplomatic encounters with world leaders and enlisted a high-powered delegation to attend Papua New Guinea’s first national Women Leaders’ Conference. Perhaps the most significant endorsement of Janet’s work came from the government of Papua New Guinea, which allocated a portion of the national budget to bolstering the Women’s Micro Bank.</p>
			<p>Janet attributes many of the global networking opportunities, and the resulting surge in financial and social capital for Women’s Micro Bank, to the spotlight that Women’s Funding Network shed on her work. Women’s Micro Bank is now 30,000 members strong and continues to grow. Our Network is proud to have played a role in this ongoing story – it is a powerful testament to the economic and social returns of investing in women.</p><br>
			<div class="mark-text">
				<h3 class="mbn">More about the Women &amp; Philanthropy LEAD Award</h3>
				<p>This award celebrates outstanding risk-takers and innovators in the philanthropic community who, through their determination and leadership, have increased funding for programs that promote gender equity and diversity. The LEAD Award seeks to shine a spotlight on bold and inspiring bodies of work marked by significant accomplishments – efforts that not only intentionally benefit diverse women and girls, but also recognize the critical role they play in bringing about broader social change. </p>
			</div>
		</div>
		<div id="story-3" class="s-story">
			<h2>Partnership for Women’s Prosperity</h2>
			<h3 class="mbn">Creating Pathways to Economic Security for 17,000 Women and Girls</h3>
			<p>The Partnership for Women’s Prosperity continued in 2013, building on its successful launch in 2012. This Partnership is a collective effort to unleash the economic power of economically vulnerable women, community by community.</p>
			<p>As part of the initiative, six Women’s Funding Network members are making innovative grants and connecting with new community partners to strengthen women’s economic security. The funds and foundations have invested $3.2 million in more than 75 programs designed to support financial literacy, job training, and increased access to education, credentials, and degrees. As a result, over 17,000 women and girls have been engaged. Of those:</p>
			<div class="separator"></div>
			<div class="three-cols cf">
				<div class="col">
					<img src="<?php echo TDU; ?>/images/ico-8.png" class="icon" alt="">
					<strong class="num v1">2,648</strong>
					<p>Completed Job Training</p>
				</div>
				<div class="col">
					<img src="<?php echo TDU; ?>/images/ico-9.png" class="icon" alt="">
					<strong class="num v1">1,417</strong>
					<p>Secured a Job</p>
				</div>
				<div class="col">
					<img src="<?php echo TDU; ?>/images/ico-10.png" class="icon" alt="">
					<strong class="num v1"> 2,695</strong>
					<p>Completed Leadership Training</p>
				</div>
			</div>
			<div class="separator"></div>
			<div class="two-cols cf">
				<div class="col">
					<img src="<?php echo TDU; ?>/images/ico-11.png" class="icon" alt="">
					<strong class="num v1">5,443</strong>
					<p>Increased Financial Knowledge & Assets</p>
				</div>
				<div class="col">
					<img src="<?php echo TDU; ?>/images/ico-12.png" class="icon" alt="">
					<strong class="num v1">1,066</strong>
					<p>Earned Credits, Credentials, or Degrees</p>
				</div>
			</div>
			<div class="separator"></div>
			<p>As the members learn which programs and resources are most effective to achieve these results, Women’s Funding Network is gathering their knowledge, strategies, and practices to be shared across our movement. By amplifying the successes and lessons of the Partnership, we hope to strengthen the work of any member funds and foundations that is invested in women’s economic security.</p><br>
			<h3>Participating members</h3>
			<div class="two-cols-text v1 cf">
				<div class="col">
					<ul>
						<li>
							<p>New York Women’s Foundation</p>
							<a href="http://www.nywf.org" class="web-link">www.nywf.org</a>
						</li>
						<li>
							<p>Women’s Foundation of Greater Memphis</p>
							<a href="http://www.wfgm.org" class="web-link">www.wfgm.org</a>
						</li>
						<li>
							<p>Washington Area Women’s Foundation</p>
							<a href="http://www.thewomensfoundation.org" class="web-link">www.thewomensfoundation.org</a>
						</li>
					</ul>
				</div>
				<div class="col">
					<ul>
						<li>
							<p>Women’s Foundation of Minnesota</p>
							<a href="http://www.wfmn.org" class="web-link">www.wfmn.org</a>
						</li>
						<li>
							<p>Women’s Foundation of Mississippi</p>
							<a href="http://www.womensfoundationms.org" class="web-link">www.womensfoundationms.org</a>
						</li>
						<li>
							<p>Women’s Foundation of California</p>
							<a href="http://www.womensfoundca.org" class="web-link">www.womensfoundca.org</a>
						</li>
					</ul>
				</div>
			</div>
			<p>Learn more about the impact our members make in their communities through the Partnership for Women’s Prosperity.</p>
			<h3>stories from the partnership: How Investing in Women Leads to REAL Impact</h3>
			<div class="field-container horizontal cf">
				<div class="logos-slider">
					<ul class="slides logos">
						<li><a href="#"><img src="<?php echo TDU; ?>/images/logo-1.png" height="54" width="108" alt=""></a></li>
						<li><a href="#"><img src="<?php echo TDU; ?>/images/logo-2.png" height="54" width="108" alt=""></a></li>
						<li><a href="#"><img src="<?php echo TDU; ?>/images/logo-3.png" height="54" width="108" alt=""></a></li>
						<li><a href="#"><img src="<?php echo TDU; ?>/images/logo-4.png" height="54" width="108" alt=""></a></li>
						<li><a href="#"><img src="<?php echo TDU; ?>/images/logo-1.png" height="54" width="108" alt=""></a></li>
						<li><a href="#"><img src="<?php echo TDU; ?>/images/logo-2.png" height="54" width="108" alt=""></a></li>
						<li><a href="#"><img src="<?php echo TDU; ?>/images/logo-3.png" height="54" width="108" alt=""></a></li>
						<li><a href="#"><img src="<?php echo TDU; ?>/images/logo-4.png" height="54" width="108" alt=""></a></li>
					</ul>
				</div>
				<div class="content content-style">
					<h3 class="red">Washington Area Women’s Foundation</h3>
					<div class="imgs-captions cf">
						<figure class="image-caption alignleft">
							<img src="<?php echo TDU; ?>/images/img-6.jpg" height="167" width="261" alt="">
							<figcaption>Willena Lastname or other caption.</figcaption>
						</figure>
						<figure class="image-caption alignleft">
							<img src="<?php echo TDU; ?>/images/img-7.jpg" height="167" width="261" alt="">
							<figcaption>Photo caption here.</figcaption>
						</figure>
					</div>
					<p>In the Washington DC area, funding through the Partnership assisted over 5,700 women through access to education and job training, supportive services, and asset building opportunities. Participants included Willena, a 32-year-old mother, who had dropped out of high school in the 12th grade when she became pregnant. Willena found Academy of Hope, a leading adult basic education provider in DC, and decided that she needed to obtain her GED to improve her life and that of her children. She had enrolled in other GED classes before but, at Academy of Hope, she felt like family. The organization built her confidence, and that was critical as she stepped into the working world again. Willena is now a Leasing Consultant and Property Manager and has two daughters, 8 and 11 years old. She highly values education and, thanks to her experience at Academy of Hope and earning her GED, she is able to be a better role model for her daughters as well as help them with their educational development. She's proud that both her daughters are straight A students, and they're "absolutely going to college!"</p>
					<div class="logos-navigation cf">
						<a href="#" class="prev">&lt; Previous</a>
						<a href="#" class="next">Next &gt;</a>
					</div>
				</div>
			</div>
			<div class="data-text-row">
				<p>WE ARE GRATEFUL TO THE <a href="#">WALMART FOUNDATION</a>, FOR THEIR SUPPORT OF THE PARTNERSHIP FOR WOMEN’S PROSPERITY.</p>
			</div>
		</div>
		<div id="story-4" class="s-story">
			<h2>women &amp; the new economy convenings</h2>
			<figure class="featured-image-block">
				<img src="<?php echo TDU; ?>/images/img-8.jpg" alt="">
				<figcaption>Featured photo caption for Women &amp the New Economy: 2013 Regional Convenings. This caption can be 1-2 lines long and goes here. </figcaption>
			</figure>
			<h4 class="mbn">Exploring Women & the New Economy: 2013 Regional Convenings</h4>
			<p>In June 2013, Women’s Funding Network launched Women & the New Economy, a series of regional convenings to explore patterns, practices, and partnerships that affect women and girls in today’s changing economic landscape. Over the course of the year, we brought together more than 100 leaders from women’s funds and foundations in the northeast, southwest, and southeast United States.</p>
			<p>The convenings offered an intimate space for leaders within the women’s funding community to meet new colleagues, share stories about their work, and workshop new strategies for community-based philanthropy.</p>
			<p>We were also joined by a slate of dynamic speakers from organizations such as Brookings, Pew Research Center, True Child, and the Women and Public Policy Program at Harvard Kennedy School of Government. The research and insight that these speakers offered was continuously paired with the question: What is the role for women-led philanthropy?</p>
			<p>Across the convenings, leaders from women’s funds and foundations answered that question with fresh thinking and new solutions – from long-term grantmaking strategies to innovative approaches to evaluation and storytelling.</p>
			<h4>why it matters</h4>
			<div class="data-row v2 cf">
				<div class="data dt">
					<div class="dtc">
						<strong class="num">&gt;80%</strong>
					</div>
					<div class="dtc">
						of grants within the women’s funding community are directed to women and girls with little to no income.
					</div>
				</div>
			</div>
			<p>By connecting our members to share grantmaking strategies and make use of the latest research, we help ensure that those grants are more effective for the women and girls they are intended to serve. <br><br></p>
			<div class="data-text-row">
				<p>WE ARE GRATEFUL TO <a href="#">U.S. TRUST</a> AND THE <a href="#">FORD FOUNDATION</a> FOR THEIR SUPPORT OF THESE CONVENINGS.</p>
			</div>
		</div>
		<div id="story-5" class="s-story">
			<h2>BUILDING CAPACITY TO ENGAGE <br>MAJOR DONORS </h2>
			<h4 class="mbn">Energizing 600 Donors to Join the Movement</h4>
			<p>One of the most common challenges that Women’s Funding Network members share with us is a need for fresh strategies and messaging that will engage new supporters in their work. When this need is combined with a complex issue like reproductive health, the task to engage donors can become even more daunting.</p>
			<p>That’s why Women’s Funding Network spearheaded the creation of Raising Leaders, Raising Millions. This two-year initiative was designed to equip women’s funds and foundation to engage new donors and secure larger donations focused on reproductive health, rights, and justice work.</p>
			<p>By the end of 2013, three U.S.-based and two Africa-based women’s foundations involved in the initiative had raised $1.1M from more than 625 donors. These dollars are funding programs that seek to improve women’s health by reducing maternal mortality and unplanned teen pregnancy rates, increasing access to health care, and decreasing the incidence of domestic violence.</p>
			<p>In the second year of Raising Leaders, Raising Millions, we partnered with Women Donors Network to offer a multi-day leadership retreat in New York City. The retreat brought together women leaders, donors, and health experts to discuss research and engagement strategies related to reproductive health.</p>
			<p>Initiatives like Raising Leaders, Raising Millions demonstrate the power of a network like ours. By bringing our members together for learning and action, new philanthropy takes root… enabling more changemakers to take on the most essential issues of our time.</p>
			<h4>results</h4>
			<div class="separator"></div>
			<div class="two-cols v1 cf">
				<div class="col">
					<img class="icon" width="95" height="95" alt="" src="<?php echo TDU; ?>/images/ico-raised.png">
					<strong class="num">&gt; $1.1M</strong>
					<p>Raised</p>
				</div>
				<div class="col">
					<img class="icon" width="95" height="95" alt="" src="<?php echo TDU; ?>/images/ico-donors.png">
					<strong class="num">&gt; 625</strong>
					<p>Donors</p>
				</div>
			</div>
			<div class="separator"></div>
			<h4>highlights of this initiative</h4>
			<div class="data-boxes cf">
				<div class="data-box">
					<img class="icon" width="95" height="95" alt="" src="<?php echo TDU; ?>/images/ico-t-w.png">
					<h5>toolkit + webinars</h5>
					<p>Put the Power in Her Hands is a toolkit, tutorial, and set of webinars designed to provide practical training on how to boost effective messaging that inspires and engages donors. <br><br><br><br></p>
				</div>
				<div class="data-box">
					<img class="icon" width="95" height="95" alt="" src="<?php echo TDU; ?>/images/ico-leadership.png">
					<h5>leadeiIIrship</h5>
					<p>A multi-day retreat in New York, where donors and women’s foundations worked together to share their knowledge and identify new strategies to foster donor leadership. Speakers included leaders from Planned Parenthood Federation of America, Ultraviolet, and Fenton Communications.</p>
				</div>
				<div class="data-box">
					<img class="icon" width="95" height="95" alt="" src="<?php echo TDU; ?>/images/ico-grants.png">
					<h5>grants</h5>
					<p>Funding for seven participating member women’s funds or foundations to improve their strategic communications efforts.</p>
				</div>
				<div class="data-box">
					<img class="icon" width="95" height="96" alt="" src="<?php echo TDU; ?>/images/ico-messaging.png">
					<h5>messaging</h5>
					<p>Ongoing work to adapt messaging and create culturally relevant strategies for new audiences, including African and millennial populations.</p>
				</div>
			</div>
			<h4>Members</h4>
			<div class="two-cols-text v1 cf">
				<div class="col">
					<ul>
						<li>
							<p>African Women’s Development Fund</p>
							<a href="#" class="web-link">Member Profile</a>
						</li>
						<li>
							<p>New Mexico Community Foundation</p>
							<a href="#" class="web-link">Member Profile</a>
						</li>
						<li>
							<p>The New York Women’s Foundation</p>
							<a href="#" class="web-link">Member Profile</a>
						</li>
						<li>
							<p>Spark</p>
							<a href="#" class="web-link">Member Profile</a>
						</li>
					</ul>
				</div>
				<div class="col">
					<ul>
						<li>
							<p>Wheat Trust Fund (South Africa)</p>
							<a href="#" class="web-link">Member Profile</a>
						</li>
						<li>
							<p>Women’s Foundation of Mississippi</p>
							<a href="#" class="web-link">Member Profile</a>
						</li>
						<li>
							<p>Women’s Fund of New Jersey</p>
							<a href="#" class="web-link">Member Profile</a>
						</li>
					</ul>
				</div>
			</div>
			<div class="data-text-row">
				<p>WE ARE GRATEFUL TO THE <a href="#">DAVID AND LUCILE PACKARD FOUNDATION</a>, FOR THEIR SUPPORT OF RAISING LEADERS, RAISING MILLIONS.</p>
			</div>
		</div>
	</div>
</div>
<div class="lightbox lightbox-f-i-block">
	<figure class="featured-image-block">
		<img src="images/img-1-1.jpg" height="988" width="704" alt="">
		<figcaption>Cecile Richards of Planned Parenthood presents at the WFN LEAD Awards. Or other photo caption of one to two lines goes here. </figcaption>
	</figure>
</div>
<div class="lightbox lightbox-video">
	<img src="images/" alt="" class="temp-video-lightbox">
</div>
<?php include('footer-nav.php'); ?>
<?php get_footer(); ?>