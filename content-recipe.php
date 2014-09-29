<?php
/**
 * The default template for displaying content. Used for both single and index/archive/search.
 *
 * @subpackage Reverie
 * @since Reverie 4.0
 */
?>

 
<article id="post-<?php the_ID(); ?>" <?php post_class('index-card'); ?>>
	<div class="row">
        <div class="small-12 medium-4 large-4 columns four">
        <figure><a href="<?php the_permalink(); ?>"><?php echo do_shortcode('[types field="image" id="$recipe"]'); ?></a></figure>
        </div>
            <div class="small-12 medium-8 large-8 columns eight">
            <header>
                <h2><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
                <?php reverie_entry_meta(); ?>
                <p class="entry-tags"><?php the_tags(); ?></p>
            </header>
            <div class="entry-content">
            		<h3>Featured In: </h3>
					<?php echo do_shortcode('[p2p_connected type=newsletters_to_recipes]'); ?>
            		<?php //echo do_shortcode('[types field="notes" id="$recipe"]'); ?>
                 <?php //the_excerpt(); ?>
            </div>
            </div>
    
	</div>
</article>