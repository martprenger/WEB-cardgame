<?php
namespace Source;
use Closure;
use Exception;

class Router
{
    protected $routes = [];

    public function addRoute(string $method, string $url, $controllerMethod): void
    {
        $this->routes[$method][$url] = $controllerMethod;
    }

    public function matchRoute(Request $request)
    {
        $method = $request->getMethod();
        $url = $request->getPath();

        if (isset($this->routes[$method][$url])) {
            $controllerMethod = $this->routes[$method][$url];
            return new $controllerMethod;
        } else {
            // Handle route not found
            echo "Route not found";
        }
    }
}

