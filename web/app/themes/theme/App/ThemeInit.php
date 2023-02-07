<?php

namespace Theme;

use Theme\Acf;
use Theme\Classes\PostTypes;
use Theme\Classes\ThemeConfig;
use Theme\Theme\Blocks;

/**
 * The theme, as loaded and represented
 * in Wordpress.
 */
class ThemeInit
{

    /**
     * Load the theme's required code
     * and enqueues any related assets.
     *
     * @return void
     */
    public function bootstrap()
    {

        // new Assetloader();
        // new PostTypes();
        // new ThemeConfig();

        new Blocks([
            'core/paragraph',
            'core/heading',
            'core/image',
            'core/list',
            'jetpack/markdown',
            'core/html',
            'core/spacer',
            'core/separator',
            'core/list',
            'core/page-list',
            'core/navigation',
            'core/social-link',
            'jetpack/contact-info',
            'jetpack/business-hours',
            'wp/navigation',
            'wp/social-links'
        ]);

        new Acf\OptionPages([
            [
                'slug' => 'config',
                'title' => 'Config'
            ],
            [
                'slug' => 'post',
                'title' => 'Posts Settings',
                'args' => [
                    'parent_slug' => 'edit.php',
                    'position' => 100
                ]
            ],
            [
                'slug' => 'page',
                'title' => 'Pages Settings',
                'args' => [
                    'parent_slug' => 'edit.php?post_type=page',
                    'position' => 100
                ]
            ]
        ]);

        new Acf\Blocks();
    }

}
