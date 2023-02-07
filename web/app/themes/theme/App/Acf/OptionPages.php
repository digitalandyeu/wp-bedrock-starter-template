<?php

namespace Theme\Acf;

/**
 * Load ACF blocks and options pages.
 *
 * @version 1.0.0
 * @since 1.0.0
 */
class OptionPages
{

    public array $option_pages = [
        [
            'slug' => 'config',
            'title' => 'Config'
        ]
    ];

    /**
     * Hook the methods into WordPress actions here.
     *
     * @return void
     */
    public function __construct($_option_pages = [])
    {
        if (!empty($_option_pages)) {
            $this->option_pages = $_option_pages;
        }

        add_action('acf/init', [$this, 'register_option_pages']);
    }

    public function register_option_pages()
    {
        foreach ($this->option_pages as $option_page) {
            $this->register_option_page($option_page['slug'], $option_page['title'], $option_page['args'] ?? []);
        }
    }


    /**
     * Register the options page.
     *
     * @return void
     */
    public function register_option_page($slug, $title, $_args = [])
    {

        if (function_exists('acf_add_options_page')) {

            $slug = 'options_' . $slug;

            $args = [
                'page_title' => $title,
                'menu_slug' => $slug,
                'post_id' => $slug
            ];

            acf_add_options_page(array_merge($args, $_args));

        }

    }

}
