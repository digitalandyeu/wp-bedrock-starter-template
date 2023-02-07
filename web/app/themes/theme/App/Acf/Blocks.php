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
    }

    /**
     * Register ACF Blocks.
     *
     * @return void
     */
    public function register_blocks()
    {

//        acf_register_block_type(array(
//            'name' => 'acf/hero',
//            'title' => 'Hero',
//            'active' => true,
//            'description' => 'test',
//            'category' => 'common',
//            'icon' => '',
//            'keywords' => array(
//                'test',
//            ),
//            'post_types' => array('page'),
//            'mode' => 'edit',
//            'align' => '',
//            'align_text' => '',
//            'align_content' => 'top',
//            'render_template' => '',
//            'render_callback' => 'acf_block_render_callback',
//            'enqueue_style' => '',
//            'enqueue_script' => '',
//            'enqueue_assets' => '',
//            'supports' => array(
//                'anchor' => true,
//                'align' => false,
//                'align_text' => false,
//                'align_content' => false,
//                'full_height' => false,
//                'mode' => false,
//                'multiple' => false,
//                'example' => array(),
//                'jsx' => true,
//            ),
//        ));

    }
}

function acf_block_render_callback( $block ) {

    ob_start();
    json_encode($block);
    $block = ob_get_clean();

    $myfile = fopen(get_stylesheet_directory() . 'cache/' . $block['name'] . 'json', 'w') or die('Unable to open file!');

    fwrite($myfile, $$block);
    fclose($myfile);

    return 1;

}