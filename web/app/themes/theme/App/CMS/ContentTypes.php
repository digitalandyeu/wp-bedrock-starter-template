<?php

namespace Theme\CMS;

class ContentTypes
{
    public function __construct()
    {
        add_action('init', array($this, 'register_post_types'));
        add_action('init', array($this, 'register_taxonomies'));
        add_action('init', function () {
            add_post_type_support('page', 'excerpt');
//            remove_post_type_support('page', 'editor');
            register_taxonomy_for_object_type('post_tag', 'page');
            register_taxonomy_for_object_type('post_tag', 'attachment');
        });
        add_action('pre_get_posts', array($this, 'parse_request'));
    }

    public function register_post_types()
    {
        // Register post types here
    }

    public function register_taxonomies()
    {
        // Register taxonomies here
    }

    /**
     * Parse request before getting posts.
     *
     * @return void
     */
    public function parse_request($query)
    {
        if (!$query->is_main_query() || 2 != count($query->query) || !isset($query->query['page'])) {
            return;
        }

        if (!empty($query->query['name'])) {
            $query->set('post_type', ['post', 'page']);
        }
    }
}
