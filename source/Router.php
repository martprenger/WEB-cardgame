<?php
namespace Source;
use Closure;
use Exception;

class Router
{
    protected $routes = [];

    public function addRoute(string $method, string $url, Closure $target) {
        $this->routes[$method][$url] = $target;
    }

    public function matchRoute() {
        $method = $_SERVER['REQUEST_METHOD'];
        $url = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH); // Get the path component of the URL
        $url = rtrim($url, '/'); // Remove trailing slashes
        if (isset($this->routes[$method])) {
            foreach ($this->routes[$method] as $routeUrl => $target) {
                $routeUrl = rtrim($routeUrl, '/'); // Remove trailing slashes from the route URL
                if ($routeUrl === $url) {
                    call_user_func($target);
                    return;
                }
            }
        }
        throw new Exception('Route not found');
    }
}

