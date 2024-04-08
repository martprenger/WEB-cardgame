<?php
namespace Source;
use Closure;
use Exception;

class Router
{
    protected $routes = [];

    public function addRoute(string $method, string $url, $controllerMethod)
    {
        // Parse route parameters
        $parsedUrl = preg_replace_callback('/\{([^\}]+)\}/', function($matches) {
            return "(?P<{$matches[1]}>[^\/]+)";
        }, $url);

        // Add the route to the routes array
        $this->routes[$method][$parsedUrl] = $controllerMethod;
    }


    public function checkUrl(Request $request)
    {
        $url = $request->getPath();
        echo $url;
    }


    public function matchRoute(Request $request)
    {
        $method = $request->getMethod();
        $url = $request->getPath();

        foreach ($this->routes[$method] as $route => $controllerMethod) {
            // Convert route string to regex
            $regex = '@^' . $route . '$@u';

            if (preg_match($regex, $url, $matches)) {
                // Remove the first match (which is the full URL)
                array_shift($matches);

                // Remove numeric keys from the matches
                $matches = array_filter($matches, 'is_string', ARRAY_FILTER_USE_KEY);

                // Combine route parameters with request parameters
                $request->setParameters($matches);

                $controller = new $controllerMethod[0]();
                return $controller->{$controllerMethod[1]}($request);
            }
        }

        // Handle route not found
        return "view/404.php";
    }
}
