<?php

require_once('wp_bootstrap_navwalker.php');

/*-----------------------------------------------------------------------------------*/
/*	Theme Setup
/*-----------------------------------------------------------------------------------*/

if ( ! function_exists( 'site_setup' ) ) :

function site_setup() {
    // Add Menu Support
    add_theme_support('menus');

    // Register Menus
    register_nav_menus( array(
//        'main-menu' => __('Main Menu','jjwendel'), // Main Navigation
//        'footer-menu' => __('Quicklinks','jjwendel') // Footer Navigation
    ));

	/*
	 * Switch default core markup for search form, comment form, and comments
	 * to output valid HTML5.
	 */
	add_theme_support( 'html5', array(
		'search-form',
		'comment-form',
		'comment-list',
		'gallery',
		'caption',
	) );

	/*
	 * This theme styles the visual editor to resemble the theme style,
	 * specifically font, colors, icons, and column width.
	 */
	add_editor_style( 'css/editor-style.css' );
}

endif; // end main set-up function
add_action( 'after_setup_theme', 'site_setup' );

/* Add support for side bar */
if( function_exists('acf_add_options_page') ) {

	$args = array(
		/* (string) The title displayed on the options page. Required. */
		'page_title' => 'Global Variables',

		/* (int|string) The '$post_id' to save/load data to/from. Can be set to a numeric post ID (123), or a string ('user_2').
		Defaults to 'options'. Added in v5.2.7 */
		'post_id' => 'globalitems',
	);

	acf_add_options_page( $args );

}

/*-----------------------------------------------------------------------------------*/
/*	Functions
/*-----------------------------------------------------------------------------------*/

// Load scripts
function main_enqueue_scripts()
{
   if (!is_admin()) {

		wp_register_script('jquery_hbootstrap',get_template_directory_uri() . '/lib/jquery/jquery-1.11.3.min.js');
		wp_enqueue_script('jquery_hbootstrap');

		wp_register_script('hbootstrap',get_template_directory_uri() . '/lib/bootstrap-3.3.7-dist/js/bootstrap.min.js');
		wp_enqueue_script('hbootstrap');

    wp_register_script('dtf',get_template_directory_uri() . '/js/dtf.js');
        wp_enqueue_script('dtf');

	   	if (is_front_page()) {

		}



    }
}
add_action('wp_enqueue_scripts', 'main_enqueue_scripts'); // Add Custom Scripts to wp_head
add_theme_support( 'post-thumbnails');
set_post_thumbnail_size( 200, 200, false );

// Load CSS styles
function main_enqueue_css()
{

    wp_register_style('bootstrap-css', get_template_directory_uri() . '/lib/bootstrap-3.3.7-dist/css/bootstrap.min.css' );
    wp_enqueue_style('bootstrap-css');


	wp_enqueue_style( 'main-style', get_stylesheet_uri() );

	wp_register_style('fontawesome-css', get_template_directory_uri() . '/lib/fontawesome/css/font-awesome.min.css');
    wp_enqueue_style('fontawesome-css');

	wp_register_style('style-css', get_template_directory_uri() . '/style.css' );
   	wp_enqueue_style('style-css');


	wp_enqueue_style('wpb-google-fonts', 'https://fonts.googleapis.com/css?family=Lato:300,400|Montserrat', false);




}
add_action('wp_enqueue_scripts', 'main_enqueue_css'); // Add Theme Stylesheet

//bootstrap pagination
function custom_pagination() {
    global $wp_query;
    $big = 999999999; // need an unlikely integer
    $pages = paginate_links( array(
            'base' => str_replace( $big, '%#%', esc_url( get_pagenum_link( $big ) ) ),
            'format' => '?paged=%#%',
            'current' => max( 1, get_query_var('paged') ),
            'total' => $wp_query->max_num_pages,
            'prev_next' => false,
            'type'  => 'array',
            'prev_next'   => TRUE,
			'prev_text'    => __('«'),
			'next_text'    => __('»'),
        ) );
        if( is_array( $pages ) ) {
            $paged = ( get_query_var('paged') == 0 ) ? 1 : get_query_var('paged');
            echo '<ul class="pagination">';
            foreach ( $pages as $page ) {
                    echo "<li>$page</li>";
            }
           echo '</ul>';
        }
}


//Pagination
//This is the blog paging controls
function main_paging_nav() {
	global $wp_query, $wp_rewrite;

	// Don't print empty markup if there's only one page.
	if ( $wp_query->max_num_pages < 2 ) {
		return;
	}

	$paged        = get_query_var( 'paged' ) ? intval( get_query_var( 'paged' ) ) : 1;
	$pagenum_link = html_entity_decode( get_pagenum_link() );
	$query_args   = array();
	$url_parts    = explode( '?', $pagenum_link );

	if ( isset( $url_parts[1] ) ) {
		wp_parse_str( $url_parts[1], $query_args );
	}

	$pagenum_link = remove_query_arg( array_keys( $query_args ), $pagenum_link );
	$pagenum_link = trailingslashit( $pagenum_link ) . '%_%';

	$format  = $wp_rewrite->using_index_permalinks() && ! strpos( $pagenum_link, 'index.php' ) ? 'index.php/' : '';
	$format .= $wp_rewrite->using_permalinks() ? user_trailingslashit( $wp_rewrite->pagination_base . '/%#%', 'paged' ) : '?paged=%#%';

	echo custom_pagination();

}

function remove_more_link_scroll( $link ) {
	$link = preg_replace( '|#more-[0-9]+|', '', $link );
	return $link;
}
add_filter( 'the_content_more_link', 'remove_more_link_scroll' );

/**
 * Filter the except length to 20 words.
 *
 * @param int $length Excerpt length.
 * @return int (Maybe) modified excerpt length.
 */
function wpdocs_custom_excerpt_length( $length ) {
    return 35;
}
add_filter( 'excerpt_length', 'wpdocs_custom_excerpt_length', 999 );



/**
 * Conditionally Override Yoast SEO Breadcrumb Trail
 * http://plugins.svn.wordpress.org/wordpress-seo/trunk/frontend/class-breadcrumbs.php
 * -----------------------------------------------------------------------------------
 */

add_filter( 'wpseo_breadcrumb_links', 'wpse_100012_override_yoast_breadcrumb_trail' );

function wpse_100012_override_yoast_breadcrumb_trail( $links ) {
    global $post;

    if ( is_singular( array( 'photos' ) ) || (is_archive() ) ) {

        $breadcrumb[] = array(
//            'url' => get_permalink( get_page_by_title( 'dfgdfgd' ) ),
//			            'url' => get_permalink( get_option( 'category' ) ),
			            'url' => '/before-and-after/',

            'text' => 'Before and After'
        );

        array_splice( $links, 1, -2, $breadcrumb );
    }

    return $links;
}

//convert to the slug format according to conventions
//by pulling out the spaces and the symbols and making lowercase
function urlconvert( $procedurename ) {
	$procedurename = strtolower( $procedurename );
	$procedurename = str_replace( " ", "-", $procedurename);
	$procedurename = str_replace( "&trade;", "", $procedurename);
	$procedurename = str_replace( "&reg;", "", $procedurename);
	//$procedurename = mb_ereg_replace( "[^a-z]", "", $procedurename);
	return $procedurename;
}

?>
