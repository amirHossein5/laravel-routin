<?php

namespace AmirHossein5\Routin\Classes;

use Closure;

trait Getters
{
    public function get(?Closure $closure = null)
    {
        if ($closure instanceof Closure) {
            $passedInArray = false;

            $routes =  collect(array_values($this->allRoutes))
                ->map(function ($route) use ($closure, &$passedInArray) {
                    $passedInArray = is_array($closure($route));
                    return $closure($route);
                });

            if ($passedInArray) {
                $routes = $routes->flatMap(fn ($route) => $route);
            }

            return $routes->toArray();
        }

        return $this->allRoutes;
    }

    public function getUri(): array
    {
        $routes = [];

        foreach ($this->allRoutes as $route) {
            $routes[] = $route->uri;
        }

        return $routes;
    }

    public function getParameters(): array
    {
        $routes = [];

        foreach ($this->allRoutes as $route) {
            preg_match_all("/\\{(.*?)\\}/", $route->uri, $matches);
            $routes[$route->getName()] = $matches[1];
        }

        return $routes;
    }

    public function getName(): array
    {
        $routes = [];

        foreach ($this->allRoutes as $route) {
            $routes[] = $route->getName();
        }

        return $routes;
    }
}
