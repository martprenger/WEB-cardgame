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
        $url = $_SERVER['REQUEST_URI'];
        if (isset($this->routes[$method])) {
            foreach ($this->routes[$method] as $routeUrl => $target) {
                if ($routeUrl === $url) {
                    call_user_func($target);
                }
            }
        }
        throw new Exception('Route not found');
    }
}

