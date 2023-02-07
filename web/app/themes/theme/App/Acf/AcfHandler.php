<?php

namespace Theme\Acf;

/**
 * Load ACF blocks and options pages.
 *
 * @version 1.0.0
 * @since 1.0.0
 */
class AcfHandler
{

    /**
     * Hook the methods into WordPress actions here.
     *
     * @return void
     */
    public function __construct()
    {
        add_action('acf/init', function () {
            remove_filter('acf_the_content', 'wpautop');
        });

        if (class_exists('ACFE_AutoSync')) {

            add_filter('acf/load_field_group', function ($field_group) {
                $field_group['acfe_autosync'] = ['json','php'];
                return $field_group;
            });

        }

        add_action('acfe/init', function () {
            if (WP_DEBUG && WP_ENV === 'development') {
                acf_update_setting('acfe/dev', true);
            }
        });

    }

}
