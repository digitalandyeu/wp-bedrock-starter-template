<?php

namespace Theme\Theme;

/**
 * Enqueues assets required in the theme.
 * 
 * @version 1.0.0 
 * @since 1.0.0
 */
class AssetLoader {

  /**
   * The directory that holds all compiled assets.
   * 
   * @var string
   */
  public string $assets_dir;

  /**
   * Hook methods into WordPress actions.
   * 
   * @return void
   */
  public function __construct() {

    $this->assets_dir = get_stylesheet_directory_uri() . '/Theme/';

    add_action( 'wp_enqueue_scripts', array( $this, 'theme_assets' ) );
    add_action( 'admin_enqueue_scripts', array( $this, 'admin_assets' ) );
    add_action( 'init', array( $this, 'disable_emojis') );

  }

  /**
   * Fix SVGs on the admin side.
   * 
   * @return void
   */
  public function fix_svg() {
    
    echo <<<HTML
      <style type="text/css">
        .attachment-266x266, .thumbnail img {
          width: 100% !important;
          height: auto !important;
        }
      </style>
    HTML;

  }

  /**
   * Enqueues assets on the admin side.
   * 
   * @return void
   */
  public function admin_assets()  {

    /* Back-end theme script */
    wp_enqueue_script( 'newspage-mann', $this->assets_dir . 'js/admin.js', array() );

    /* Back-end theme style */
    wp_enqueue_style( 'newspage-mann', $this->assets_dir . 'css/admin.css', false );

  }

  /**
   * Enqueues assets on the front-end
   * site.
   * 
   * @return void
   */
  public function theme_assets() {

    /* Front-end theme script */
    wp_enqueue_script( 'newspage-mann', $this->assets_dir . 'js/theme.js', array(), false, true );

    /* Front-end theme style */
    wp_enqueue_style( 'newspage-mann', $this->assets_dir . 'css/theme.css', false );

  }

  /**
   * Disable the emojis.
   * 
   * @return void
   */
  public function disable_emojis() {

    remove_action( 'wp_head', 'print_emoji_detection_script', 7 );
    remove_action( 'admin_print_scripts', 'print_emoji_detection_script' );
    remove_action( 'wp_print_styles', 'print_emoji_styles' );
    remove_action( 'admin_print_styles', 'print_emoji_styles' );

    remove_filter( 'the_content_feed', 'wp_staticize_emoji' );
    remove_filter( 'comment_text_rss', 'wp_staticize_emoji' );
    remove_filter( 'wp_mail', 'wp_staticize_emoji_for_email' );

    add_filter( 'tiny_mce_plugins', array( $this, 'disable_emojis_tinymce') );
    add_filter( 'wp_resource_hints', array( $this, 'disable_emojis_remove_dns_prefetch'), 10, 2 );

  }
  
  /**
   * Filter function used to remove the tinymce emoji plugin.
   * 
   * @param  array $plugins 
   * @return array Difference betwen the two arrays
   */
  public function disable_emojis_tinymce( $plugins ): array
  {

    return is_array( $plugins ) ? array_diff( $plugins, array( 'wpemoji' ) ) : array();

  }
  
  /**
   * Remove emoji CDN hostname from DNS prefetching hints.
   *
   * @param  array $urls URLs to print for resource hints.
   * @param  string $relation_type The relation type the URLs are printed for.
   * @return array Difference betwen the two arrays.
   */
  public function disable_emojis_remove_dns_prefetch( $urls, $relation_type ): array
  {

    if ( 'dns-prefetch' === $relation_type ) {

      $emoji_svg_url = apply_filters( 'emoji_svg_url', 'https://s.w.org/images/core/emoji/2/svg/' );
      $urls = array_diff( $urls, array( $emoji_svg_url ) );

    }
  
    return $urls;

  }

}