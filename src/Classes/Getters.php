<?php

namespace AmirHossein5\Routin\Classes;

trait Getters
{
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
