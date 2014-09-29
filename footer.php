	</div><!-- Row End -->
</div><!-- Container End -->
    
    
<!-- display the certification -->
<div class="full-width">
<div class="row certification">
    <div class="small-12 medium-12 large-12 columns twelve">
    	
        <?php if ( have_posts() ) : ?>
	
		<?php /* Start the Loop */ 
		// querry arguements //
		// querry newsletter post types
		// above code has errors fix the querry before going live
		$certifiedPosts = new WP_Query();
		$certifiedPosts->query('cat=38');
		?>
        
		<?php while ( $certifiedPosts->have_posts() ) : $certifiedPosts->the_post(); ?>
			<?php 
                      echo the_content('Read more...'); ?>
                      
		<?php endwhile; ?>
		
		<?php else : ?>
			<?php get_template_part( 'content', 'none' ); ?>
		
	<?php endif; // end have_posts() check ?>
    </div>
    </div>
    </div>
    
    


<div class="full-width footer-widget">
	<div class="row">
    <div class="small-12 medium-12 large-12 columns three">
		<?php dynamic_sidebar("Footer"); ?>
      </div>
	</div>
</div>



<footer class="full-width" role="contentinfo">
	<div class="row">
		<div class="small-12 medium-12 large-12 columns twelve">
			<?php wp_nav_menu(array('theme_location' => 'utility', 'container' => false, 'menu_class' => 'inline-list')); ?>
		</div>
	</div>
    
	<div class="row love-reverie">
		<div class="small-12 medium-12 large-12 columns twelve">
			<p>&copy; <?php echo date('Y'); ?> <?php bloginfo('name'); ?>. 
			<br />
			<small><a href="http://daydreamproject.com">D A Y D R E A M • P R O J E C T</a> • <a href="http://themefortress.com/reverie/" rel="nofollow" title="Reverie Framework"><?php _e('Reverie','reverie'); ?> </a>   </small>  </p>
		</div>
	</div>
</footer>

<?php wp_footer(); ?>

<!-- Foundation 3 for IE 8 and earlier -->
<!--[if lt IE 9]>
    <script src="<?php echo get_template_directory_uri(); ?>/js/foundation3/foundation.min.js"></script>
    <script src="<?php echo get_template_directory_uri(); ?>/js/foundation3/app.js"></script>
<![endif]-->

<!-- Foundation 5 for IE 9 and later -->
<!--[if gt IE 8]><!
    <script src="/js/foundation4/foundation.min.js"></script>
    <script>
        $(document).foundation();
    </script>-->
<!--<![endif]-->

<script>
	(function($) {
		$(document).foundation();
	})(jQuery);
</script>
	
</body>
</html>