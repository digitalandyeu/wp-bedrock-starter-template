<?php

namespace Theme\Classes;

use Theme\API\APIHandler as Router;

/**
 * Theme configuration settings.
 *
 * @version 1.0.0
 * @since 1.0.0
 */
class ThemeConfig
{

    /**
     * Hook methods into WordPress actions.
     *
     * @return void
     */
    public function __construct()
    {

        add_action('after_setup_theme', array($this, 'register_menus'));
        add_action('rest_api_init', array($this, 'wp_headless_routes'));
        add_action('admin_init', array($this, 'reserved_pages'));

        // add_filter( 'wp_nav_menu_items', array( $this, 'prepend_footer_heading' ), 10, 2 );
        // add_filter( 'query_vars', array( $this, 'register_query_vars' ) );

//        add_filter('excerpt_length', array($this, 'np_excerpt_length'));
        add_filter('excerpt_more', array($this, 'np_excerpt_more'));

        // add_theme_support( 'align-wide' );
        // add_theme_support( 'post-thumbnails' );

    }

    /**
     * Add additional menus to the theme.
     *
     * @return void
     */
    public function register_menus()
    {

        /* Navigation Menus */
        register_nav_menus(
            [
                'mob' => 'Mob',
                'footer' => 'Footer',
                'main' => 'Main'
            ]
        );

    }

    public function np_excerpt_more($more): string
    {
        global $post;
        return '...';
    }

//    public function np_excerpt_length($length): int
//    {
//        return 38;
//    }

    /**
     * Register additional allowed query parameters.
     *
     * @return array
     */
//    public function register_query_vars($vars)
//    {
//
//        $new_vars = array(
//            'layout',
//            'page',
//            'type',
//            'min_price',
//            'max_price',
//            'property_type',
//            'bedrooms',
//            'location',
//            'sort_by',
//            'radius',
//            'searchPostcode',
//            'sm_srch_res'
//        );
//
//        return array_merge($vars, $new_vars);
//
//    }


    /**
     * Add new image sizes.
     *
     * @return void
     */
//    public function add_image_sizes()
//    {
//
//        // add_image_size( 'lqip', 256, false, false );
//        // add_image_size( 'news-banner', 1200, 540, true );
//        // add_image_size( 'news-card', 380, 260, true );
//
//    }

    /**
     * Disables the editor for reserved pages.
     *
     * @return void
     */
    public function reserved_pages()
    {

        $post_id = $_GET['post'] ?? $_POST['post_ID'] ?? false;

        if (isset($post_id)) {

            $post = get_post($post_id);

            if ($post && in_array($post->post_name, ['properties', 'valuation'])) {

                remove_post_type_support('page', 'editor');

            }

        }

    }

    /**
     * Add headings to footer
     *
     * @param array $items
     * @param object $args
     * @return array
     */
//    public function prepend_footer_heading($items, $args)
//    {
//
//        // get menu
//        $menu = wp_get_nav_menu_object($args->menu);
//
//        // modify primary only
//        if (strpos($args->theme_location, 'footer') !== false) {
//
//            // vars
//            $heading = get_field('menu_heading', $menu);
//
//            // prepend logo
//            $heading = $heading ? '<h2 class="footer__menu-heading h5">' . $heading . '</h2>' : null;
//
//            // append html
//            $items = $heading . $items;
//
//        }
//
//        // return
//        return $items;
//
//    }


    /**
     * Define all routes using the router in
     * this function.
     *
     * @return void
     */
    public function wp_headless_routes()
    {

        /** Contact API */
        Router::post(
            '/contact',
            'Contact.submit'
        );

    }

}
