<?php

namespace AmirHossein5\Routin\Classes;

use Illuminate\Support\Facades\Route;

class Routin
{
    use Filters;
    use Getters;

    private $allRoutes;

    public function routes(): self
    {
        $this->allRoutes = Route::getRoutes()->getRoutesByName();

        return $this;
    }

    private function filterBy(string $filterBy, array $param = null): array
    {
        $allRoutes = [];

        $matches = '';

        foreach ($this->allRoutes as $route) {
            $matches = match ($filterBy) {
                'method'           => $this->hasMethod($route, $param['method']),
                'nameStartsWith'   => $this->isNameStartsWith($route, $param['nameStartsWith']),
                'uriStartsWith'    => $this->isUriStartsWith($route, $param['uriStartsWith']),
                'nameEndsWith'     => $this->isNameEndsWith($route, $param['nameEndsWith']),
                'uriEndsWith'      => $this->isUriEndsWith($route, $param['uriEndsWith']),
                'withoutParameter' => $this->isWithoutParameter($route),
            };

            if ($matches) {
                $allRoutes[$route->getName()] = $route;
            }
        }

        return $allRoutes;
    }
}
