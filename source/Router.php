<?php
namespace Source;
use Closure;
use Exception;

class Router
{
    protected $routes = [];

    public function addRoute(string $method, string $url, $controllerMethod)
    {
        $this->routes[$method][$url] = $controllerMethod;
    }

    public function matchRoute(Request $request)
    {
        $method = $request->getMethod();
        $url = $request->getPath();

        if (isset($this->routes[$method][$url])) {
            $controllerMethod = $this->routes[$method][$url];
            $controller = new $controllerMethod[0]();
            return $controller->{$controllerMethod[1]}($request);
        } else {
            // Handle route not found
            echo "Route not found";
        }
    }
}

