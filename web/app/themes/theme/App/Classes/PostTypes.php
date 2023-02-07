<?php

namespace Theme\Classes;

/**
 * Registers any post types the theme has.
 * 
 * @version 1.0.0 
 * @since 1.0.0
 */
class PostTypes {

  /**
   * Hook methods into WordPress actions.
   * 
   * @return void
   */
  public function __construct() {

    add_action( 'init', array( $this, 'register_post_types' ) );
    add_action( 'pre_get_posts', array( $this, 'parse_request' ) );

  }

  /**
   * Parse request before getting posts.
   *
   * @return void
   */
  public function parse_request( $query ) {

    if ( !$query->is_main_query() || 2 != count( $query->query ) || !isset( $query->query['page'] ) ) {

      return;

    }

    if ( !empty( $query->query['name'] ) ) {

      $query->set( 'post_type', array( 'post', 'service', 'project', 'career', 'page' ) );

    }

  }

  /**
   * Creates a post type and generates any
   * necessary labels.
   *
   * @return void
   */
  private function post_type( $name, $plural = false, $args ) {

    $capName = ucfirst( $name );
    $capNamePlural = !$plural ? $capName . 's' : ucfirst( $plural );
    $namePlural = !$plural ? $name . 's' : $plural ;

    $labels = array(
      'name'                => $capNamePlural,
      'singular_name'       => $capName,
      'add_new'             => 'Add New',
      'add_new_item'        => 'Add New ' . $capName,
      'edit_item'           => 'Edit ' . $capName,
      'new_item'            => 'New ' . $capName,
      'all_items'           => 'All ' . $capNamePlural,
      'view_item'           => 'View ' . $capName,
      'search_items'        => 'Search ' . $capNamePlural,
      'not_found'           => 'No ' . $namePlural . ' found',
      'not_found_in_trash'  => 'No ' . $namePlural . ' found in the trash',
      'menu_name'           => $capNamePlural
    );

    $args = wp_parse_args( $args, array( 'labels'  => $labels ) );

    register_post_type( $name, $args );

  }

  /**
   * All post types are registered in this
   * function.
   *
   * @return void
   */
  public function register_post_types() {

//    $this->post_type( 'testimonial', 'testimonials', array(
//      'description'         => 'Testimonial item',
//      'menu_icon'           => 'dashicons-editor-quote',
//      'hierarchical'        => false,
//      'publicly_queryable'  => false,
//      'public'              => true,
//      'supports'            => array( 'title'),
//      'show_in_rest'        => true,
//      'map_meta_cap'        => true
//    ));

  }

}