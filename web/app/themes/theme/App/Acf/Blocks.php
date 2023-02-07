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


    }
}
