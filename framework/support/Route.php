<?php

namespace Framework\Support;

use App\Controllers\Controller;


class Route
{
    private $routes;

    private $current_uri;

    public function __construct()
    {
        $this->current_uri = $_SERVER['REQUEST_URI'];
        $this->routes = require_once($_SERVER['DOCUMENT_ROOT'] . '/routes/web.php');
    }


    public function run()
    {
        foreach ($this->routes as $path => $settings) {
            if ($this->current_uri == $path) {
                $controllerName = "\App\Controllers\\" . $settings['controller'];
                $action = $settings['action'];
                $controller = new $controllerName();
                $action == 'store' ?  $controller->$action(new Request()) :
                    $controller->$action();
            }
        }
    }
}
