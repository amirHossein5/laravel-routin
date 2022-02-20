<?php

namespace AmirHossein5\Routin\Classes;

use Illuminate\Routing\Route as RouteItem;

trait Filters
{
    public function uriStartsWith(string $uriStartsWith): self
    {
        $this->allRoutes = $this->filterBy(
            'uriStartsWith',
            ['uriStartsWith' => $uriStartsWith]
        );

        return $this;
    }

    public function uriEndsWith(string $endsWith): self
    {
        $this->allRoutes = $this->filterBy(
            'uriEndsWith',
            ['uriEndsWith' => $endsWith]
        );

        return $this;
    }

    public function nameStartsWith(string $nameStartsWith): self
    {
        $this->allRoutes = $this->filterBy(
            'nameStartsWith',
            ['nameStartsWith' => $nameStartsWith]
        );

        return $this;
    }

    public function nameEndsWith(string $endsWith): self
    {
        $this->allRoutes = $this->filterBy(
            'nameEndsWith',
            ['nameEndsWith' => $endsWith]
        );

        return $this;
    }

    public function withoutParameter(): self
    {
        $this->allRoutes = $this->filterBy('withoutParameter');

        return $this;
    }

    public function method(string $method): self
    {
        $this->allRoutes = $this->filterBy(
            'method',
            ['method' => $method]
        );

        return $this;
    }

    /**
     * Filter Conditions
     *
     */
    private function isWithoutParameter(RouteItem $route): bool
    {
        return !str_contains($route->uri, '{');
    }

    private function isNameStartsWith(RouteItem $route, string $startsWith): bool
    {
        return str_starts_with($route->getName(), $startsWith);
    }

    private function isNameEndsWith(RouteItem $route, string $endsWith): bool
    {
        return str_ends_with($route->getName(), $endsWith);
    }

    private function isUriStartsWith(RouteItem $route, string $startsWith): bool
    {
        return str_starts_with($route->uri, $startsWith);
    }

    private function isUriEndsWith(RouteItem $route, string $endsWith): bool
    {
        return str_ends_with($route->uri, $endsWith);
    }

    private function hasMethod(RouteItem $route, string $method): bool
    {
        $method = strtoupper($method);

        return in_array($method, $route->methods());
    }
}
