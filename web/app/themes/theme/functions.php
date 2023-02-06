<?php

add_filter('show_admin_bar', '__return_false');
add_filter('init', function () {
    add_theme_support('menus');
    add_post_type_support( 'page', 'excerpt' );
    remove_post_type_support('page', 'editor');
});

add_action('acf/init', function () {

    acf_add_options_page(array(
        'menu_slug' => 'page_settings',
        'page_title' => 'Page settings',
        'active' => true,
        'capability' => 'edit_posts',
        'parent_slug' => '/edit.php?post_type=page',
        'position' => 100,
        'redirect' => true,
        'post_id' => 'options_settings_page',
        'autoload' => false,
    ));

    acf_add_options_page(array(
        'menu_slug' => 'post_settings',
        'page_title' => 'Posts settings',
        'active' => true,
        'capability' => 'edit_posts',
        'parent_slug' => '/edit.php',
        'position' => 100,
        'redirect' => true,
        'post_id' => 'options_settings_post',
        'autoload' => false,
    ));

    acf_add_options_page(array(
        'menu_slug' => 'options_config',
        'page_title' => 'Configurations',
        'active' => true,
        'capability' => 'edit_posts',
        'position' => 100,
        'redirect' => true,
        'post_id' => 'options_settings_config',
        'autoload' => false,
    ));

});