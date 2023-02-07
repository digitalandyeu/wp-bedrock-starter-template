<?php

/**
 * WordPress Core modifications.
 * Be careful
 */

namespace Theme\WpCore;

class AdminArea
{
    public function __construct()
    {
//        add_action('init', function () {
//            add_rewrite_rule('^api/contact/?', 'index.php?rest_route=/contact/v1/contact', 'top');
//        });

        add_filter( 'post_type_labels_user_request', [$this, 'rename_comments'] );

        /**
         * Rename default post type to news
         *
         * @param object $labels
         * @hooked post_type_labels_post
         * @return object $labels
         */
    }

    public function rename_comments( $labels )
    {
        # Labels
        $labels->name = 'Feedback';
        $labels->singular_name = 'Feedback';

        # Menu
        $labels->menu_name = 'Feedback';
        $labels->all_items = 'All Feedback';
        $labels->name_admin_bar = 'Feedback';

        return $labels;
    }



}