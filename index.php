<?php get_header(); ?>



<!-- Row for main content area -->
    <div class="row">
		<div class="small-12 medium-12 large-12 columns twelve" id="featured" role="main">
        
			<?php 
            // the query
           $featuredNewsletter = new WP_Query(); 
			$featuredNewsletter->query('cat=14&post_type=newsletter');
			?>
            
            <?php if ( $featuredNewsletter->have_posts() ) : ?>
            
              <!-- pagination here -->
            
              <!-- the loop -->
              <?php while ( $featuredNewsletter->have_posts() ) : $featuredNewsletter->the_post(); 
                      echo '<div class="small-12 medium-9 large-9 columns nine">';
                      echo '<div class="featured-main">';
                      echo '<figure><a href="';
                      echo the_permalink();
                      echo '">'; 
                      echo get_the_post_thumbnail(); 
                      echo '</a></figure>';
                      //echo '<br />';
                      echo '<h3>';
					  	echo '<a href="';
                      echo the_permalink();
					  	echo '">'; 
                      echo the_title();
					  	echo '</a>';
                      echo '</h3>';
                      echo the_excerpt('Read more...');
                      echo '</div>';
                      echo '</div>';
					  ?>
              <?php endwhile; ?>
              <!-- end of the loop -->
            
              <!-- pagination here -->
            
              <?php wp_reset_postdata(); ?>
            
            <?php else:  ?>
              <p><?php get_template_part( 'content', 'none' ); ?></p>
            <?php endif; ?>

        <?php 
            // the query
           $featuredNewsletter = new WP_Query(); 
			$featuredNewsletter->query('cat=12&post_type=newsletter');
			?>
            
            <?php if ( $featuredNewsletter->have_posts() ) : ?>
            
              <!-- pagination here -->
            
              <!-- the loop -->
              <?php while ( $featuredNewsletter->have_posts() ) : $featuredNewsletter->the_post(); 
                      echo '<div class="small-6 medium-3 large-3 columns three">';
                      echo '<div class="featured-main">';
                      echo '<figure><a href="';
                      echo the_permalink();
                      echo '">'; 
                      echo get_the_post_thumbnail(); 
                      echo '</a></figure>';
                      //echo '<br />';
                      echo '<h3>';
                      echo '<a href="';
                      echo the_permalink();
					  	echo '">'; 
                      echo the_title();
					  	echo '</a>';
                      echo '</h3>';
                      //echo the_excerpt('Read more...');
                      echo '</div>';
                      echo '</div>';
					  ?>
              <?php endwhile; ?>
              <!-- end of the loop -->
            
              <!-- pagination here -->
            
              <?php wp_reset_postdata(); ?>
            
            <?php else:  ?>
              <p><?php get_template_part( 'content', 'none' ); ?></p>
            <?php endif; ?>

    
 
 </div> <!--end column-->
 </div> <!--end row-->

<hr />
<hr />

<div class="row post-roll">
<div class="small-12 medium-9 large-9 columns nine" id="content" role="main">	
	<?php if ( have_posts() ) : ?>
	
		<?php /* Start the Loop */ 
		// querry arguements //
		// querry newsletter post types
		// above code has errors fix the querry before going live
		$newsletterPosts = new WP_Query();
		$newsletterPosts->query('post_type=newsletter&cat=-12,-14&posts_per_page=7');
		?>
        
		<?php while ( $newsletterPosts->have_posts() ) : $newsletterPosts->the_post(); ?>
			<?php get_template_part( 'content', get_post_format() ); ?>
		<?php endwhile; ?>
		
		<?php else : ?>
			<?php get_template_part( 'content', 'none' ); ?>
		
	<?php endif; // end have_posts() check ?>
    
    <div><a href="http://www.ranchopiccolo.com/farm/newsletter/page/2/">continue reading...</a></div>
    
	<?php /* Display navigation to next/previous pages when applicable */ ?>
	<?php if ( function_exists('reverie_pagination') ) { reverie_pagination(array('query' => $newsletterPosts)); } else if ( is_paged() ) { ?>
		<nav id="post-nav">
			<div class="post-previous"><?php next_posts_link( __( '&larr; Older posts', 'reverie' ) ); ?></div>
			<div class="post-next"><?php previous_posts_link( __( 'Newer posts &rarr;', 'reverie' ) ); ?></div>
		</nav>
	<?php } ?>

	</div>
	<?php get_sidebar(); ?>
		
<?php get_footer(); ?>