<?php

/**
 * pgb-child functions and definitions
 */

add_action( 'wp_enqueue_scripts', 'pgb_child_enqueue_styles' );
function pgb_child_enqueue_styles() {
    wp_enqueue_style( 'pgb', get_template_directory_uri() . '/style.css' );
}

/**
 * Output Blog Page title
 * @since ProGo 0.6.3
 * @uses pgb_blog_page_id()
 * @return string
 */
if ( ! function_exists('blog_page_title') ) :
    function sp_blog_page_title( $before = '<h1 class="page-title"><a href="http://www.ninthlink.com">', $after = '</a></h1>', $blog_page_id = 0, $echo = true ) {
        $blog_page_id = pgb_blog_page_id();
        $blog_page_title = get_the_title( $blog_page_id );

        if ( ! empty( $blog_page_id ) ) {
            $blog_page_title = $before . $blog_page_title . $after;
        }
        if ( ! $echo ) {

            return $blog_page_title;
        }
        echo $blog_page_title;
    }
endif;


/**
 * Load Navbar block - pgb_block_navbar()
 */
function sp_block_navbar() {
    do_action( 'sp_block_navbar' );
}
/* callback */
function sp_load_block_navbar() {
    locate_template( 'block-navbar.php', true );
}
add_action( 'sp_block_navbar', 'sp_load_block_navbar', 10 );