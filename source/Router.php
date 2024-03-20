<?php
namespace Source;
class Router {
    private $routes;

    public function __construct($routes) {
        $this->routes = $routes;
    }

    public function route($url) {
        $path = parse_url($url, PHP_URL_PATH);
        $path = ltrim($path, '/');

        if (array_key_exists($path, $this->routes)) {
            require $this->routes[$path];
        } else {
            header("HTTP/1.0 404 Not Found");
            echo "Page not found";
        }
    }
}

