<?php

namespace Theme\Acf;

/**
 * Load ACF blocks and options pages.
 *
 * @version 1.0.0
 * @since 1.0.0
 */
class Blocks
{

    /**
     * Hook the methods into WordPress actions here.
     *
     * @return void
     */
    public function __construct()
    {
        add_action('acf/init', array($this, 'register_blocks'));
        // add_filter('block_categories', array($this, 'register_block_categories'), 10, 2);
    }

    /**
     * Register ACF Blocks.
     *
     * @return void
     */
    public function register_blocks()
    {

        /**
         * Register hero block
         */
        \acf_register_block_type(array(
            'name' => 'hero',
            'title' => __('Hero'),
            'description' => __('Hero element'),
            'render_template' => 'blocks/Global/Hero/Hero.php',
            'category' => 'think3',
            'icon' => 'cover-image',
            'keywords' => array('Hero', 'Banner', 'top'),
            'mode' => 'preview',
            'align' => 'wide',
            'supports' => array(
                'mode' => false,
                'align' => false
            )
        ));

        /**
         * Register Media Text content
         */
        \acf_register_block_type(array(
            'name' => 'media-text',
            'title' => __('Content & Media'),
            'description' => __('Text with media'),
            'render_template' => 'blocks/Global/MediaContent/MediaContent.php',
            'category' => 'think3',
            'icon' => '<svg width="24" height="24" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" role="img" aria-hidden="true" focusable="false"><path d="M4 17h7V6H4v11zm9-10v1.5h7V7h-7zm0 5.5h7V11h-7v1.5zm0 4h7V15h-7v1.5z"></path></svg>',
            'keywords' => array('gallery', 'content', 'image'),
            'mode' => 'preview',
            'align' => 'full',
            'supports' => array(
                'mode' => false,
                'align' => false,
                'align_content' => true,
                'align_text' => array('left', 'right'),
            )
        ));

        /**
         * Register Features content
         */
        \acf_register_block_type(array(
            'name' => 'features',
            'title' => __('Features'),
            'description' => __('Grid-layout list of feature cards'),
            'render_template' => 'blocks/Global/Features/Features.php',
            'category' => 'think3',
            'icon' => 'grid-view',
            'keywords' => array('features', 'grid', 'blocks', 'list'),
            'mode' => 'preview',
            'align' => 'full',
            'supports' => array(
                'mode' => false,
                'align' => false
            )
        ));

        /**
         * Register testimonials content
         */
        \acf_register_block_type(array(
            'name' => 'testimonials',
            'title' => __('Testimonials'),
            'description' => __('Testimonials in slide-based format'),
            'render_template' => 'blocks/Global/Testimonials/Testimonials.php',
            'category' => 'think3',
            'icon' => 'quote',
            'keywords' => array('testimonials', 'content', 'images', 'cite'),
            'mode' => 'preview',
            'align' => 'full',
            'supports' => array(
                'mode' => false,
                'align' => false
            )
        ));

        /**
         * Register Call to Action content
         */
        \acf_register_block_type(array(
            'name' => 'call-to-action',
            'title' => __('Call to Action'),
            'description' => __('Call to action block with parallax'),
            'render_template' => 'blocks/Global/CallToAction/CallToAction.php',
            'category' => 'think3',
            'icon' => 'quote',
            'keywords' => array('cta', 'action', 'parallax'),
            'mode' => 'preview',
            'align' => 'full',
            'supports' => array(
                'mode' => false,
                'align' => false
            )
        ));

        /**
         * Register Anchor block
         */
        \acf_register_block_type(array(
            'name' => 'scroll-anchor',
            'title' => __('Scroll Anchor'),
            'description' => __('Adds a scroll anchor to the page, used by anchor links'),
            'render_template' => 'blocks/Global/ScrollAnchor/ScrollAnchor.php',
            'category' => 'think3',
            'icon' => 'admin-post',
            'keywords' => array('anchor', 'scroll', 'links'),
            'mode' => 'preview',
            'align' => 'full',
            'supports' => array(
                'mode' => false,
                'align' => false,
            )
        ));

        /**
         * Register News Items block
         */
        \acf_register_block_type(array(
            'name' => 'news-items',
            'title' => __('News Items'),
            'description' => __('Show latest three posts'),
            'render_template' => 'blocks/Global/NewsItems/NewsItems.php',
            'category' => 'think3',
            'icon' => 'admin-post',
            'keywords' => array('news', 'news item', 'blog'),
            'mode' => 'preview',
            'align' => 'full',
            'supports' => array(
                'mode' => false,
                'align' => false,
            )
        ));

    }

    /**
     * Register new block categories.
     *
     * @param array $categories
     * @param object $post
     * @return array
     */
    public function register_block_categories(array $categories, object $post): array
    {

        $new_categories = [
            [
                'slug' => 'common-simple',
                'title' => 'Common Simple Blocks',
            ],
        ];

        return array_merge($categories, $new_categories);

    }
}
