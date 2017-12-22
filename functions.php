<?php



if (! file_exists( get_template_directory() . '/inc/wp-bootstrap-navwalker.php')) {
    return new WP_Error( 'wp-bootstrap-navwalker-missing', __( 'It appears the wp-bootstrap-navwalker.php file may be missing.', 'wp-bootstrap-navwalker' ) );
}


if ( ! function_exists( 'lgw_paging_nav' ) ) {
	/**
	 * Display navigation to next/previous set of posts when applicable.
	 */
	function lgw_paging_nav() {
		global $wp_query;

		$args = array(
			'type' 	    => 'list',
			'next_text' => _x( 'Next', 'Next post', 'storefront' ),
			'prev_text' => _x( 'Previous', 'Previous post', 'storefront' ),
			);

		the_posts_pagination( $args );
	}
}


if ( ! function_exists( 'lgw_posted_on' ) ) {
	/**
	 * Prints HTML with meta information for the current post-date/time and author.
	 */
	function lgw_posted_on() {
		$time_string = '<time class="entry-date published updated" datetime="%1$s">%2$s</time>';
		if ( get_the_time( 'U' ) !== get_the_modified_time( 'U' ) ) {
			$time_string = '<time class="entry-date published" datetime="%1$s">%2$s</time> <time class="updated" datetime="%3$s">%4$s</time>';
		}

		$time_string = sprintf( $time_string,
			esc_attr( get_the_date( 'c' ) ),
			esc_html( get_the_date() ),
			esc_attr( get_the_modified_date( 'c' ) ),
			esc_html( get_the_modified_date() )
		);

		$posted_on = sprintf(
			_x( 'Posted on %s', 'post date', 'storefront' ),
			'<a href="' . esc_url( get_permalink() ) . '" rel="bookmark">' . $time_string . '</a>'
		);

		echo wp_kses( apply_filters( 'storefront_single_post_posted_on_html', '<span class="posted-on">' . $posted_on . '</span>', $posted_on ), array(
			'span' => array(
				'class'  => array(),
			),
			'a'    => array(
				'href'  => array(),
				'title' => array(),
				'rel'   => array(),
			),
			'time' => array(
				'datetime' => array(),
				'class'    => array(),
			),
		) );
	}



if ( ! function_exists( 'lgw_post_header' ) ) {
	/**
	 * Display the post header with a link to the single post
	 *
	 * @since 1.0.0
	 */
	function lgw_post_header() {
		?>
		<header class="entry-header">
		<?php
		if ( is_single() ) {
			lgw_posted_on();
			the_title( '<h1 class="entry-title">', '</h1>' );
		} else {
			if ( 'post' == get_post_type() ) {
				lgw_posted_on();
			}

			the_title( sprintf( '<h2 class="alpha entry-title"><a href="%s" rel="bookmark">', esc_url( get_permalink() ) ), '</a></h2>' );
		}
		?>
		</header><!-- .entry-header -->
		<?php
	}
}



function lgw_get_post_first_trumbil_image($post_id) {

}

function lgw_get_menu_for_index_widget() {
    wp_get_nav_menu_items('top');
}

function create_left_menu( $theme_location ) {
    $menu_list = "";
    if ( ($theme_location) && ($locations = get_nav_menu_locations()) && isset($locations[$theme_location]) ) {
        $menu = get_term( $locations[$theme_location], 'nav_menu' );
        $menu_items = wp_get_nav_menu_items($menu->term_id);
 
        $menu_list = '<div class="list-group">' ."\n";
          
        foreach( $menu_items as $menu_item ) {
            if( $menu_item->menu_item_parent == 0 ) {
                 
                $parent = $menu_item->ID;

                $menu_list .= '<div class="list-group-item">' ."\n";
                $menu_list .= '<h4 class="list-group-item-heading list-group-item-info">' . $menu_item->title . '</h4>' ."\n";
                $menu_array = array();
                foreach( $menu_items as $submenu ) {
                    if( $submenu->menu_item_parent == $parent ) {
                        $bool = true;
                        $menu_array[] = '<span>' . $submenu->title . '</span>' ."\n";
                    }
                }
                
                if( $bool == true && count( $menu_array ) > 0 ) {
                    $menu_list .= '<div class="list-group-item-text">' ."\n";
                    $menu_list .= implode( "\n", $menu_array );
                    $menu_list .= '</div>' ."\n";
                }

                $menu_list .= '</div>' ."\n";
            }
        }

        $menu_list .= '</div><!-- /.container-fluid -->' ."\n";
  
    } else {
        $menu_list = '<!-- no menu defined in location "'.$theme_location.'" -->';
    }
     
    echo $menu_list;
}

function clean_custom_menus() {
	$menu_name = 'top'; // specify custom menu slug
	if (($locations = get_nav_menu_locations()) && isset($locations[$menu_name])) {
		$menu = wp_get_nav_menu_object($locations[$menu_name]);
		$menu_items = wp_get_nav_menu_items($menu->term_id);
        
		$menu_list = '<nav>' ."\n";
		$menu_list .= "\t\t\t\t". '<ul>' ."\n";


        print_r($menu_list);
        
        
		foreach ((array) $menu_items as $key => $menu_item) {
			$title = $menu_item->title;
			$url = $menu_item->url;
			$menu_list .= "\t\t\t\t\t". '<li><a href="'. $url .'">'. $title .'</a></li>' ."\n";
		}
		$menu_list .= "\t\t\t\t". '</ul>' ."\n";
		$menu_list .= "\t\t\t". '</nav>' ."\n";
	} else {
		// $menu_list = '<!-- no list defined -->';
	}
	echo $menu_list;
}

function lgw_setup() {
    load_theme_textdomain( 'lgw' );
    add_theme_support( 'title-tag' );
    add_theme_support( 'post-thumbnails' );

    add_image_size('lgw-featured-image', 2000, 1200, true );
    add_image_size('ldp-thumbnail-avatar', 100, 100, true );

    $GLOBALS['content_width'] = 525;

    register_nav_menus( array(
        'top'    => __( 'Top Menu', 'ldp'),
        'social' => __( 'Social Links Menu', 'ldp' ),
        'front_page_menu_rmd' => __( 'Index Page menu','ldp'),
    ));
    
    add_theme_support('html5',array(
	'gallery',
	'caption',));
    
    add_theme_support('post-formats',array(
	'aside',
	'image',
	'video',
	'link',
	'gallery',
	'audio',
    ));
    
    add_theme_support('custom-logo',array(
	'width' => 250,
	'height' => 250,
	'flex-width' => true,
    ));
}

add_action('after_setup_theme','lgw_setup');


function my_attachments( $attachments )
{
  $fields         = array(
    array(
      'name'      => 'title',                         // unique field name
      'type'      => 'text',                          // registered field type
      'label'     => __( 'Title', 'attachments' ),    // label to display
      'default'   => 'title',                         // default value upon selection
    ),
    
    array(
      'name'      => 'caption',                       // unique field name
      'type'      => 'textarea',                      // registered field type
      'label'     => __( 'Caption', 'attachments' ),  // label to display
      'default'   => 'caption',                       // default value upon selection
    ),
  );

  $args = array(

    // title of the meta box (string)
    'label'         => 'My Attachments',

    // all post types to utilize (string|array)
    'post_type'     => array( 'post', 'page' ),

    // meta box position (string) (normal, side or advanced)
    'position'      => 'normal',

    // meta box priority (string) (high, default, low, core)
    'priority'      => 'high',

    // allowed file type(s) (array) (image|video|text|audio|application)
    'filetype'      => null,  // no filetype limit

    // include a note within the meta box (string)
    'note'          => 'Attach files here!',

    // by default new Attachments will be appended to the list
    // but you can have then prepend if you set this to false
    'append'        => true,

    // text for 'Attach' button in meta box (string)
    'button_text'   => __( 'Attach Files', 'attachments' ),

    // text for modal 'Attach' button (string)
    'modal_text'    => __( 'Attach', 'attachments' ),

    // which tab should be the default in the modal (string) (browse|upload)
    'router'        => 'browse',

    // whether Attachments should set 'Uploaded to' (if not already set)
	'post_parent'   => false,

    // fields array
    'fields'        => $fields,

  );

  $attachments->register( 'my_attachments', $args ); // unique instance name
}

add_action( 'attachments_register', 'my_attachments' );


add_filter( 'attachments_default_instance', '__return_false' ); // disable the default instance

function lgw_color_css_wrap() {
    
}
    function lgw_scripts() {
	    
	    //bootstrap
	    wp_enqueue_style('lgw-bootstrap',get_theme_file_uri('/assets/css/bootstrap.min.css'));
        wp_enqueue_style('lgw-bootstrap',get_theme_file_uri('/assets/css/navbar-fixed-side.css'));
	    
	    wp_enqueue_style('lgw-style',get_stylesheet_uri());
	    
	    wp_enqueue_script('lgw-bootstrap',get_theme_file_uri('/assets/js/bootstrap.min.js'),array('jquery'),'3.3.7');
	    
	    //    wp_style_add_data( 'twentyseventeen-ie8', 'conditional', 'lt IE 9' );
	    // Load the html5 shiv.
	    //    wp_enqueue_script( 'html5', get_theme_file_uri( '/assets/js/html5.js' ), array(), '3.7.3' );
	    //    wp_script_add_data( 'html5', 'conditional', 'lt IE 9' );
	}
add_action( 'wp_enqueue_scripts', 'lgw_scripts' );


/**
 * Posts
 *
 * @see  storefront_post_header()
 * @see  storefront_post_meta()
 * @see  storefront_post_content()
 * @see  storefront_paging_nav()
 * @see  storefront_single_post_header()
 * @see  storefront_post_nav()
 * @see  storefront_display_comments()
 */



add_action( 'lgw_single_post',         'lgw_post_header',          10 );
add_action( 'lgw_single_post',         'lgw_post_meta',            20 );
add_action( 'lgw_single_post',         'lgw_post_content',         30 );

/*
add_action( 'lgw_single_post_bottom',  'lgw_post_nav',             10 );
add_action( 'lgw_single_post_bottom',  'lgw_display_comments',     20 );
add_action( 'lgw_post_content_before', 'lgw_post_thumbnail',       10 );
*/

require_once get_template_directory() . '/inc/wp-bootstrap-navwalker.php';