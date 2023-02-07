<?php

namespace Theme\Theme;

class Config
{
    public function __construct()
    {
        add_action('after_setup_theme', [$this, 'addThemeSupports']);
    }

    public function addThemeSupports()
    {
        add_theme_support('title-tag');
        add_theme_support('post-thumbnails');
        add_theme_support('html5', ['search-form', 'comment-form', 'comment-list', 'gallery', 'caption']);
        add_theme_support('automatic-feed-links');
        add_theme_support('menus');
        add_theme_support('post-formats', ['aside', 'image', 'video', 'quote', 'link', 'gallery', 'audio']);
        add_theme_support('custom-background', ['default-color' => 'ffffff']);
        add_theme_support('custom-header', ['default-image' => '', 'default-text-color' => '000', 'width' => 1000, 'height' => 250, 'flex-height' => true, 'flex-width' => true, 'uploads' => true]);
        add_theme_support('custom-logo', ['height' => 100, 'width' => 400, 'flex-height' => true, 'flex-width' => true]);
        add_theme_support('customize-selective-refresh-widgets');
        add_theme_support('starter-content', $this->getStarterContent());
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