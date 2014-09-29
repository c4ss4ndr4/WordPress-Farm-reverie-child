<?php
/*
Author: Cassandra Marshall 
URL: http://daydreamproject.com

Child theme functions. 

*/

/* Function that converts the <...> after the_excerpt on the archive.php to a link to the post*/
function new_excerpt_more( $more ) {
	return ' <a class="read-more" href="'. get_permalink( get_the_ID() ) . '"> read more...</a>';
}
add_filter( 'excerpt_more', 'new_excerpt_more' );

//function adds post-thumbnails to the theme 
if ( function_exists( 'add_theme_support' ) ) {
	add_theme_support( 'post-thumbnails' );
        set_post_thumbnail_size('true');
}

//Posts 2 Posts Functions
function my_connection_types() {
    p2p_register_connection_type( array(
        'name' => 'newsletters_to_recipes',
        'from' => 'newsletter',
        'to' => 'recipe',
		'reciprocal' => true,
		'duplicate_connections' => true
    ) );
	p2p_register_connection_type( array(
        'name' => 'newsletters_to_podcasts',
        'from' => 'newsletter',
        'to' => 'podcast',
		'reciprocal' => true,
		'duplicate_connections' => true
    ) );

}
 
add_action( 'p2p_init', 'my_connection_types' );

//register tags for custom post types
function namespace_add_custom_types( $query ) {
  if( is_category() || is_tag() && empty( $query->query_vars['suppress_filters'] ) ) {
    $query->set( 'post_type', array(
     'post', 'newsletter', 'recipe', 'podcast'
        ));
      return $query;
    }
}
add_filter( 'pre_get_posts', 'namespace_add_custom_types' );

?>