<?php 
header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Methods: POST, GET, OPTIONS');

define( 'WP_USE_THEMES', false );  
require( '../wp-blog-header.php' ); # adjust your path
	// Initialize the post ID to -1. This indicates no action has been taken.
$post_id = -1;

// Setup the author, slug, and title for the post
$author_id = 1;
$slug =  	$_GET['slug'];
$title = 	$_GET['title'];
$videoid = 	$_GET['videoid'];
// If the page doesn't already exist, then create it
if( null == get_page_by_title( $title ) ) {

	// Set the page ID so that we know the page was created successfully
	$post_id = wp_insert_post(
		array(
			'comment_status'	=>	'closed',
			'ping_status'		=>	'closed',
			'post_author'		=>	$author_id,
			'post_name'		=>	$slug,
			'post_title'		=>	$title,
			'post_status'		=>	'draft',
			'post_type'		=>	'post'
		)
	);

	add_post_meta($post_id, 'dp_video_layout', "standard");
	add_post_meta($post_id, 'dp_video_url', "http://www.youtube.com/watch?v=".$videoid);
	add_post_meta($post_id, '_video_thumbnail', "http://img.youtube.com/vi/".$videoid."/0.jpg");
	add_post_meta($post_id, '_oembed_4faf660351e3fa2253cff9ec843db960', '<iframe width="620" height="465" src="http://www.youtube.com/embed/'.$videoid.'?feature=oembed" frameborder="0" allowfullscreen></iframe>');
	set_post_format($post_id, 'video');
	echo "OK";
// Otherwise, we'll stop and set a flag
} else {

    // Arbitrarily use -2 to indicate that the page with the title already exists
    $post_id = -2;
    echo "EXISTS";
} // end if
 ?>