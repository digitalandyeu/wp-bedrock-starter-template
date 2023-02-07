<?php

namespace Theme;

use Theme\Acf;
use Theme\CMS\AdminArea;
use Theme\CMS\ContentTypes;
use Theme\Theme\ThemeConfig;
use Theme\Theme\ThemeBlocks;

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


        new ThemeConfig();

        new ContentTypes();
        new AdminArea();

        new ThemeBlocks([
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
        new Acf\AcfHandler();
    }

}
