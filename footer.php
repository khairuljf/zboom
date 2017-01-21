<?php
	global $rstore;
 ?>

<footer>
	<div class="wrap-footer zerogrid">
		<div class="row block09">

			<?php dynamic_sidebar('footer_sidebar'); ?>
			
		</div>
		
		<div class="row copyright">
			<p><?php echo $rstore['footer']; ?></p>
		</div>
	</div>
</footer>
<script src="<?php echo get_template_directory_uri(); ?>/js/responsiveslides.js"></script>
	<script>
		jQuery(function () {
		  jQuery("#slider").responsiveSlides({
			auto: true,
			pager: false,
			nav: true,
			speed: 500,
			maxwidth: 962,
			namespace: "centered-btns"
		  });
		});
	</script>
<?php wp_footer() ?>
</body>
</html>