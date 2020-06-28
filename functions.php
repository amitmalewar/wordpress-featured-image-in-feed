<?php
/*
	Plugin Name: Show featured image in WordPress feed
	Plugin URI: https://www.infophilic.com
	Description: Show featured image in WordPress feed for Google News
	Author: Amit Malewar
	Version: 1.0
	Author URI: https://www.infophilic.com
*/

// Disallow direct access
defined( 'ABSPATH' ) or die( 'No Access' );

function featured_image_in_feed( $content ) {
    global $post;
    if( has_post_thumbnail( $post->ID ) ) {
        $content = '<div>' . get_the_post_thumbnail( $post->ID, 'full' , array('style' => 'margin-bottom:10px; width:696px; height:auto;') ) . '</div>' . $content;
    }
    return $content;
}
add_filter( 'the_excerpt_rss', 'featured_image_in_feed' );
add_filter( 'the_content_feed', 'featured_image_in_feed' );