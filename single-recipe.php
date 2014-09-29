<?php get_header(); ?>

<!-- Row for main content area -->
	<div class="small-12 medium-9 large-9 columns nine" id="content" role="main">
	
	<?php /* Start loop */ ?>
	<?php while (have_posts()) : the_post(); ?>
		<article <?php post_class() ?> id="post-<?php the_ID(); ?>">
			<header>
				<h1 class="entry-title"><?php the_title(); ?></h1>
					<?php reverie_entry_meta(); ?>
                <p class="entry-tags"><?php the_tags(); ?>
                <br /><?php echo get_the_term_list( $post->ID, 'cuisine', 'Cuisine: ', ', ', '' ); ?>
                </p>
                
                
                
			</header>
			<div class="entry-content">
             <!-- custom field type display from Types -->
            <div class="custom-fields">
				<?php echo do_shortcode('[types field="image" id="$recipe"]'); ?>
                <h5>Recipe Credit: <?php echo do_shortcode('[types field="credits" id="$recipe"]'); ?></h5>
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
            </div> 
				<h3>Featured In: </h3>
				<?php echo do_shortcode('[p2p_connected type=newsletters_to_recipes]'); ?>
			</div>
            		
                 
                
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