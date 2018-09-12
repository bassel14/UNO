<?php
/**
 * Webgear Theme Filtters
 *
 * @package     WordPress
 * @subpackage  Uno Blog
 * @since       1.0
 * @author      Bassel Suleiman
 */
?>

<?php
    // File Security Check
    if ( ! defined( 'ABSPATH' ) ) { exit; }
?>

<?php
/**
 * This is a copy of the filtter from smofy admin area, all info below is still the same.
 * Filter URLs from uploaded media fields and replaces the site URL keywords
 * with the actual site URL.
 * 
 * @since 1.4.0
 * @param $data Options array
 * @return array
 */
function wg_url_filter( $data ) {
    
    if( !is_array($data) ) {
        return;
    }
    
    foreach ($data as $key => $value) {
        if (is_string($value)) {
            $data[$key] = str_replace(
                array(
                    '[site_url]', 
                    '[site_url_secure]',
                ),
                array(
                    site_url('', 'http'),
                    site_url('', 'https'),
                ),
                $value
            );
        }
    }

    return $data;
}
add_filter('wg_theme_url_options_filter', 'wg_url_filter');

/** ------------------------------------------------------------------------ *
  * Tag font size Filter
 ** ------------------------------------------------------------------------ */
/*
 * Fillter to arrange the tags font size.
*/
add_filter('widget_tag_cloud_args','set_tag_cloud_sizes');

function set_tag_cloud_sizes($args) {
    $args['smallest'] = 8;
    $args['largest'] = 8;
    
    return $args; 
}

/** ------------------------------------------------------------------------ *
  * Archive Pages Title Filter for Author Page only.
  * can be amended to for all pages by removing the if condition.
 ** ------------------------------------------------------------------------ */
// Simply remove anything that looks like an archive title prefix ("Archive:", "Foo:", "Bar:").
add_filter('get_the_archive_title', function ($title) {

    if( is_author() ) {

        return preg_replace('/^\w+: /', '', $title);
    }
    return $title;
    
});

/* ---------------------------------------------------------------------------- *
 * Change Excerpt length to user request or just keep it as default 55 words.
** ---------------------------------------------------------------------------- */
/*function board_excerpt_length ( $length ) {
	global $data;
    
	if ( isset( $data['blog_excerpt_length'] ) && $data['blog_excerpt_length'] != '' ) {
        return $data['blog_excerpt_length'] ;
	}
    return '55';
}
add_filter ( 'excerpt_length', 'board_excerpt_length', 999 ) ;

// Changing excerpt more
function new_excerpt_more($more) {
    return '...';
}
add_filter('excerpt_more', 'new_excerpt_more');*/



// filter to replace class on reply link
add_filter('comment_reply_link', 'replace_reply_link_class');

function replace_reply_link_class($class){
    $class = str_replace("class='comment-reply-link", "class='pull-right hidden-sm hidden-xs more-title butn-flat butn-flat-small", $class);
    return $class;
}