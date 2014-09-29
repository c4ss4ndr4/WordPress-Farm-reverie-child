<?php get_header(); ?>

<!-- Row for main content area -->
	<div class="small-12 medium-9 large-9 columns nine" id="content" role="main">
	
	<?php /* Start loop */ ?>
	<?php while (have_posts()) : the_post(); ?>
		<article <?php post_class() ?> id="post-<?php the_ID(); ?>">
			<header>
				<h1 class="entry-title"><?php the_title(); ?></h1>
					<?php reverie_entry_meta(); ?>
                <p class="entry-tags"><?php the_tags(); ?></p>
                
                <?php
				// Query to find the connected podcasts and display in a list.
				// Find connected pages
				$connected = new WP_Query( array(
				  'connected_type' => 'newsletters_to_podcasts',
				  'connected_items' => get_queried_object(),
				  'nopaging' => true,
				) );
				
				// Display connected pages
				if ( $connected->have_posts() ) :
				?>
                
				
				<?php while ( $connected->have_posts() ) : $connected->the_post(); ?>
                
                		<h3>Weekly Podcast:</h3>
							<ul>
                        		<h3><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
                                <?php echo do_shortcode('[types field="podcast" id="$podcasts"]'); ?>
							</ul>	
                            
                            
				<?php endwhile; ?>
				
				
				<?php 
				// Prevent weirdness
				wp_reset_postdata();
				
				endif;
				?>
                
			</header>
            
            
			<div class="entry-content">
				<?php the_content(); ?>
			</div>
            
            
                
            <?php
				// Query to find the connected recipies and display the associated fields.
				// Find connected pages
				$connected = new WP_Query( array(
				  'connected_type' => 'newsletters_to_recipes',
				  'connected_items' => get_queried_object(),
				  'nopaging' => true,
				) );
				
				// Display connected pages
				if ( $connected->have_posts() ) :
				?>
                
				<h3>Weekly Recipes:</h3>
                
				<?php while ( $connected->have_posts() ) : $connected->the_post(); ?>
    
						
							<ul>
								<?php echo do_shortcode('[types field="image" id="$recipe"]'); ?>
                        		<h3><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
                             <h5><?php echo do_shortcode('[types field="credits" id="$recipe"]'); ?></h5>
                             <i><?php echo do_shortcode('[types field="notes" id="$recipe"]'); ?></i>
								<div class="row">
                                <div class="small-12 medium-6 large-6 columns six" id="content" role="main">
                                <h3>Ingredients:</h3>
                             		<?php echo do_shortcode('[types field="ingredient" id="$recipe"]'); ?>
                             	</div>
                             	<div class="small-12 medium-6 large-6 columns six" id="content" role="main">
									<h3>Instructions:</h3>
										<?php echo do_shortcode('[types field="instructions" id="$recipe"]'); ?>
                            		</div>
                            </div>
							</ul>	
                            
                            
				<?php endwhile; ?>
				
				
				<?php 
				// Prevent weirdness
				wp_reset_postdata();
				
				endif;
				?>
			
            <footer>
				<?php wp_link_pages(array('before' => '<nav id="page-nav"><p>' . __('Pages:', 'reverie'), 'after' => '</p></nav>' )); ?>
				<?php edit_post_link('Edit this Post'); ?>
			</footer>
		</article>
		<div class="entry-author panel">
			<div class="row">
				<div class="small-12 medium-3 large-3 columns three">
					<?php echo get_avatar( get_the_author_meta('user_email'), 95 ); ?>
				</div>
				<div class="small-12 medium-9 large-9 columns nine">
					<h4><?php the_author_posts_link(); ?></h4>
					<p class="cover-description"><?php the_author_meta('description'); ?></p>
				</div>
			</div>
		</div>
		<?php comments_template(); ?>
	<?php endwhile; // End the loop ?>

	</div>
	<?php get_sidebar(); ?>
		
<?php get_footer(); ?>