<?php
/**
 * @package WordPress
 * @subpackage Base_Theme
 */
?>
<?php if(!is_front_page())	include('footer-block.php');  ?>
	<span class="contact-button fixed-side">Get Started</span>
	<div class="contact-modal">
		<?php echo do_shortcode('[contact-form-7 id="558" title="Customize Contact"]'); ?>
	</div>
</div>
<?php wp_footer(); ?>
</body>
</html>
