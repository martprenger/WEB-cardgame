<?php
namespace Source;
use Closure;
use Exception;

class Router
{
    protected $routes = [];

    public function addRoute(string $method, string $url, $target): void
    {
        $this->routes[$method][$url] = $target;
    }

    public function matchRoute(): void
    {
        $method = $_SERVER['REQUEST_METHOD'];
        $url = $_SERVER['REQUEST_URI'];
        if (isset($this->routes[$method])) {
            foreach ($this->routes[$method] as $routeUrl => $target) {
                // Check if the route matches the requested URL
                if ($routeUrl === $url) {
                    // Check if the target is a closure or a controller method
                    if ($target instanceof Closure) {
                        // If it's a closure, directly execute it
                        call_user_func($target);
                        return;
                    } elseif (is_array($target) && count($target) == 2 && is_callable($target)) {
                        // If it's an array with two elements and callable, treat it as a controller method
                        $controllerClass = $target[0];
                        $methodName = $target[1];
                        $controllerInstance = new $controllerClass();
                        $controllerInstance->$methodName();
                        return;
                    } else {
                        // Handle error: Invalid target format
                        throw new Exception('Invalid target format');
                    }
                }
            }
        } else {
            require 'view/notefication_codes/404.php/';
        }
    }
}

