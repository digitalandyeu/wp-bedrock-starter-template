<?php

/**
 * WordPress Core modifications.
 * Be careful
 */

namespace Theme\CMS;

class AdminArea
{
    public function __construct()
    {

        add_action( 'admin_enqueue_scripts', array( $this, 'admin_assets' ) );


    }

    public function admin_assets()  {

        // wp_enqueue_script( 'admin-script', get_stylesheet_directory_uri() . 'admin.js', array() );

        wp_enqueue_style( 'admin-style', get_stylesheet_directory_uri() . '/style.css', false );

    }

}