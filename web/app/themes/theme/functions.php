<?php

/**
 * Registers all of the theme's back-end functionality.
 */

/**
 * Bootstrap the theme's PHP code and
 * load all related classes.
 */
(new Theme\ThemeInit())->bootstrap();


add_filter('show_admin_bar', '__return_false');

add_filter('init', function () {
    remove_action('wp_head', 'wp_generator');
    remove_action('generate_header', 'generate_construct_header');
    add_post_type_support('page', 'excerpt');
    remove_post_type_support('page', 'editor');
    register_taxonomy_for_object_type('post_tag', 'page');
    register_taxonomy_for_object_type('post_tag', 'attachment');
});

add_filter( 'jetpack_implode_frontend_css', '__return_false', 99 );


add_action('after_setup_theme', function () {
    add_theme_support('menus');
    remove_theme_support( 'editor-styles' );
    remove_theme_support('wp-block-styles');
    add_theme_support('disable-custom-font-sizes');
    add_theme_support('disable-custom-colors');
    add_theme_support('disable-custom-gradients');
    add_theme_support('disable-layout-styles');
    remove_theme_support('core-block-patterns');
    remove_theme_support('block-template-parts');

    add_theme_support('editor-color-palette', []);
    add_theme_support('editor-gradient-presets', []);
    add_theme_support('disable-appearance-tools');
    remove_theme_support('appearance-tools');

    add_theme_support('editor-font-sizes', [
        [
            'name' => 'default',
            'slug' => 'default',
            'size' => 16,
        ],
        [
            'name' => 'small',
            'size' => 12,
            'slug' => 'small'
        ]
    ]);

});

add_filter('body_class', function ($classes) {
    $classes_unset = ['wp-embed-responsive', 'status-published'];
    $classes = array_diff($classes, $classes_unset);

    if (is_front_page()) {
        $classes[] = 'front-page';
    }

    return $classes;
});

//add_action('template_redirect', function () {
//
//    $resp = [
//        'config' => get_fields('options_settings_config'),
//        'nav' => [
//            'sitemap' => wp_get_nav_menu_items('sitemap'),
//            'main' => wp_get_nav_menu_items('main'),
//            'footer' => wp_get_nav_menu_items('footer'),
//        ],
//        'template_configuration' => [
//            'selectors' => get_body_class(),
//            'type' => get_post_type(),
//            'template' => get_page_template_slug() ?: 'default'
//        ],
//        'seo' => [
//            'title' => html_entity_decode(wp_strip_all_tags(get_the_title())),
//            'description' => html_entity_decode(wp_strip_all_tags(get_the_excerpt()) ?: wp_strip_all_tags(get_bloginfo('description'))),
//            'json-ld' => '',
//            'og-image' => get_the_post_thumbnail_url() ?: get_template_directory_uri() . '/assets/images/og-image.jpg',
//            'head' => [
//                'canonical' => get_permalink(),
//                'robots' => [
//                    'index' => 'index',
//                    'follow' => 'follow'
//                ],
//                'humans' => 'humans.txt',
//            ]
//        ]
//    ];
//
//    $is_singular = false;
//    $post_type = get_post_type();
//
//    if (is_singular()) {
//        $is_singular = true;
//        $post = get_post();
//
//        $post_clean = (array)$post;
//
//        $post_cleanup = [
//            "post_author",
//            "post_date_gmt",
//            "comment_status",
//            "post_status",
//            "ping_status",
//            "post_password",
//            "to_ping",
//            "pinged",
//            "guid",
//            "post_mime_type",
//            "post_modified_gmt",
//            "post_content_filtered",
//            "comment_count",
//            "filter"
//        ];
//
//        foreach ($post_cleanup as $key) {
//            unset($post_clean[$key]);
//        }
//
//        $post_clean['post_content_blocks'] = parse_blocks($post->post_content);
//
//        $next_post = get_next_post() ? [
//            'id' => get_next_post()->ID,
//            'title' => get_the_title(get_next_post()->ID),
//            'link' => wp_make_link_relative(get_permalink(get_next_post()->ID))
//        ] : false;
//
//        $prev_post = get_previous_post() ? [
//            'ID' => get_previous_post()->ID,
//            'title' => get_the_title(get_previous_post()->ID),
//            'link' => wp_make_link_relative(get_permalink(get_previous_post()->ID))
//        ] : false;
//
//        $post_clean['relations'] = [
//            'has_category' => get_the_category() ?: false,
//            'has_tag' => get_the_tags(),
//            'has_parent' => get_post_ancestors(get_the_ID()) ?: false,
//            'has_children' => get_children([
//                'post_parent' => get_the_ID(),
//                'fields' => 'ids',
//            ]),
//            'next_post' => $next_post ?: false,
//            'prev_post' => $prev_post ?: false,
//        ];
//
//        $resp = array_merge($resp, [
//            'post' => $post_clean,
//            'acf' => get_fields(get_the_ID()),
//        ]);
//    }
//
//    returnJsonHttpResponse(true, $resp);
//});

function returnJsonHttpResponse($success, $data)
{
    // remove any string that could create an invalid JSON
    // such as PHP Notice, Warning, logs...
    ob_clean();

    // this will clean up any previously added headers, to start clean
    header_remove();

    // Set the content type to JSON and charset
    // (charset can be set to something else)
    header('Content-type: application/json; charset=utf-8');

    // Set your HTTP response code, 2xx = SUCCESS,
    // anything else will be error, refer to HTTP documentation
    if ($success) {
        http_response_code(200);
    } else {
        http_response_code(500);
    }

    // encode your PHP Object or Array into a JSON string.
    // stdClass or array
    echo json_encode($data);

    // making sure nothing is added
    exit();
}
