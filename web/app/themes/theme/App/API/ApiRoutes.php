<?php

/**
 * WordPress Core modifications.
 * Be careful
 */

namespace Theme\API;

use Theme\API\APIHandler as Router;

class ApiRoutes
{
    public function __construct()
    {
        add_action('rest_api_init', array($this, 'wp_headless_routes'));
    }

    /**
     * Define all routes using the router in
     * this function.
     *
     * @return void
     */
    public function wp_headless_routes()
    {
        /** Contact API */
        Router::post(
            '/contact',
            'Contact.submit'
        );
    }
}
