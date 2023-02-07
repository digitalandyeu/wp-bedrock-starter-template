<?php

namespace Theme\Theme;

class ThemeConfig
{
    public function __construct()
    {
        add_action('after_setup_theme', [$this, 'addThemeSupports']);
    }

    public function addThemeSupports()
    {
//         add_theme_support('title-tag');
//         add_theme_support('post-thumbnails');
//         add_theme_support('html5', ['caption']);
//         add_theme_support('automatic-feed-links');

//         add_theme_support('custom-header', ['default-image' => '']);
//         add_theme_support('custom-logo');
//         add_theme_support('customise-selective-refresh-widgets');
        // remove_theme_support( 'widgets-block-editor' ).
        // add_theme_support('starter-content', $this->getStarterContent());


        // Theme.json analog
        add_theme_support('menus');
        remove_theme_support('editor-styles');
        remove_theme_support('wp-block-styles');

//        add_theme_support('disable-custom-font-sizes');
//        add_theme_support('disable-custom-colors');
//        add_theme_support('disable-custom-gradients');
//        add_theme_support('disable-layout-styles');
//        remove_theme_support('core-block-patterns');
//        remove_theme_support('block-template-parts');
//
//        add_theme_support('editor-color-palette', []);
//        add_theme_support('editor-gradient-presets', []);
//        add_theme_support('disable-appearance-tools');
//
//        add_theme_support('editor-font-sizes', [
//            [
//                'name' => 'default',
//                'slug' => 'default',
//                'size' => 16,
//            ],
//            [
//                'name' => 'small',
//                'size' => 12,
//                'slug' => 'small'
//            ]
//        ]);

        add_theme_support('soil', [
            'clean-up', // Cleaner WordPress markup
            // 'disable-rest-api', // Disable REST API
            //'disable-asset-versioning', // Remove asset versioning
            'disable-trackbacks', // Disable trackbacks
            //'google-analytics' => 'UA-XXXXX-Y', // Google Analytics
            //'js-to-footer', // Move JS to footer
            'nav-walker', // Clean up nav menu markup
            //'nice-search', // Redirect /?s=query to /search/query
            'relative-urls', // Convert absolute URLs to relative URLs
        ]);

    }

    public function getStarterContent(): array
    {
        return [
            'posts' => [
                'home',
                'about',
                'contact',
                'blog',
                'homepage-section',
            ],
            'options' => [
                'show_on_front' => 'page',
                'page_on_front' => '{{home}}',
                'page_for_posts' => '{{blog}}',
            ],
            'theme_mods' => [
                'custom_logo' => '{{logo}}',
                'custom_header' => '{{header}}',
                'custom_background' => '{{background}}',
            ],
            'nav_menus' => []
        ];
    }
}