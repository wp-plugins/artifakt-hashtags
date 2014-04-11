<?php
/*
Plugin Name: The artifakt Hashtag Plugin
Plugin URI: http://www.artifakt.ca
Description: The artifakt Team's custom Hashtag WordPress plugin allows you to use hashtags in your posts that become searchable throughout your website.
Author: The artifakt Team
Author URI: http://www.artifakt.ca
Version: 1.0
*/

add_filter( 'the_content', 'hashtag_content_filter');

function hashtag_content_filter($content) {
	
	if ( preg_match_all('/#([\p{L}\p{Mn}]+)/u',$content,$matches) ) {
	foreach( $matches[1] as $hashtag ) {
		$content = str_replace('#'.$hashtag, '<a href="'.get_home_url().'/?s='.urlencode('#'.$hashtag).'">#'.$hashtag.'</a>',$content);
	}
	}
	return $content;
}
?>
