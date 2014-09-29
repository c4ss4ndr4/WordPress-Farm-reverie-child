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
            <div class="small-12 medium-12 large-12 columns twelve">
            <header>
                <h2><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
                <?php reverie_entry_meta(); ?>
                <p class="entry-tags"><?php the_tags(); ?></p>
                <p><?php echo do_shortcode('[types field="podcast" id="$podcast"]'); ?></p>
            </header>
            <div class="entry-content">
            		<h3>Featured In: </h3>
					<?php echo do_shortcode('[p2p_connected type=newsletters_to_podcasts]'); ?>
            		
                 <?php //the_excerpt(); ?>
            </div>
            </div>
    
	</div>
</article>