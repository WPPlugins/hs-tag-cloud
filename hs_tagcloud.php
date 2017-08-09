<?php

/*
Plugin Name: HS Tag Cloud
Plugin URI: http://wordpress.org/extend/plugins/hs-tag-cloud/
Description: This is a really simple WP plugin to display a tag cloud in your content. It uses the WP builtin function 'wp_tag_cloud()'. All functionality of 'wp_tag_cloud()' is supported.
Version: 2.0
Author: Henrik Sachse
Author URI: http://wordpress.org/extend/plugins/hs-tag-cloud/
License: GPL2
*/

function hsWpTagCloud($attributes) {

	// Only allow 'format'='array'
	$attributes['format'] = 'array';

	// Default 'number'=0
	if (!array_key_exists('number', $attributes)) {
		$attributes['number']=0;
	}

	// Retrieve the tags
	$tags=wp_tag_cloud($attributes);

	// Assemble the tag cloud
	$cloud='';
	if(!empty($tags)) {
		foreach($tags as $tag) {
			$cloud.=$tag.' ';
		}
	}
	return $cloud;

}

add_shortcode('hs_wp_tag_cloud', 'hsWpTagCloud');

?>
