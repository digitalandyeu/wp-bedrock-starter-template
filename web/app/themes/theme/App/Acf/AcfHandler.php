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

        if (function_exists('acfe_')) {

        }

//        add_action('acfe/init', function () {
//            acf_update_setting('acfe/modules/single_meta', true);
//        });

//        add_filter('acf/load_field_group', function ($field_group) {
//            $field_group['acfe_autosync'] = ['json','php'];
//            return $field_group;
//        });

    }

}
