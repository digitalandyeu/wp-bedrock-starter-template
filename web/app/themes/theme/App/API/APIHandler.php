<?php

namespace Theme\API;

use BadMethodCallException;

/**
 * Handles the API routes.
 *
 * @version 1.0.0
 * @since 1.0.0
 */
class APIHandler extends \WP_REST_Controller
{
    /**
     * The allowed API methods.
     *
     * @var array
     */
    public static array $methods = ['GET', 'POST'];

    /**
     * The namespace of the API.
     *
     * @var string
     */
    public static string $ns = 'newpage';

    /**
     * The version number of the API.
     *
     * @var string
     */
    public static string $version = 'v1';

    /**
     * Defines a route in the API using the method
     * called.
     *
     * @param string $func_name
     * @param array $arguments
     *
     * @return void
     */
    public static function __callStatic(string $func_name, array $arguments)
    {
        // Ensure method name is uppercase
        $method = strtoupper($func_name);

        // Filter out unsupported methods
        if (!in_array($method, self::$methods)) {
            throw new BadMethodCallException("Method $func_name does not exist!", 500);
        }

        // Split out the args into named values
        list($route, $callback) = $arguments;

        // If the callback is a string, get the class
        if (is_string($callback)) {
            $callback = str_replace(' ', '', explode('.', $callback));

            $callback_class = '\Theme\API\\' . $callback[0];
            $callback_func = $callback[1];

            $callback_class = new $callback_class();
            $callback = array( $callback_class, $callback_func );
        }

        // Ensure the method exists before registering API
        /** @var $callback_func */
        /** @var $callback_class */
        if (method_exists($callback_class, $callback_func)) {
            $args = array(
              'methods'               => $method,
              'callback'              => $callback,
              'args'                  => $callback_class->get_arguments(),
              'permission_callback'   => array( $callback_class, 'get_permissions' )
            );

            register_rest_route(self::$ns . '/' . self::$version, $route, $args);
        }
    }
}
