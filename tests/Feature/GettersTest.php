<?php

namespace AmirHossein5\Routin\Tests\Feature;

use AmirHossein5\Routin\Facades\Routin;
use AmirHossein5\Routin\Tests\TestCase;
use Illuminate\Routing\Route;

class GettersTest extends TestCase
{
    public function test_routes_can_be_get_manually_and_return_value_like_get_method()
    {
        $routes = Routin::routes()->get(
            fn ($route) => [$route->getName() => $route]
        );

        $this->assertTrue(
            collect(array_keys($routes))
                ->diff(collect($this->routes['names']))
                ->isEmpty()
        );

        foreach (array_values($routes) as $routeValue) {
            $this->assertEquals($routeValue::class, Route::class);
        }
    }

    public function test_routes_can_be_get_manually_and_return_value_like_get_uri_method()
    {
        $routes = Routin::routes()->get(fn ($route) => $route->uri);

        $this->assertTrue(
            collect($routes)
                ->diff(collect($this->routes['uris']))
                ->isEmpty()
        );

        $routes = Routin::routes()->get(fn ($route) => [$route->uri]);

        $this->assertTrue(
            collect($routes)
                ->diff(collect($this->routes['uris']))
                ->isEmpty()
        );
    }

    public function test_routes_can_be_get_manually_and_return_value_like_get_name_method()
    {
        $routes = Routin::routes()->get(fn ($route) => $route->getName());
        $this->assertEquals($routes, $this->routes['names']);

        $routes = Routin::routes()->get(fn ($route) => [$route->getName()]);
        $this->assertEquals($routes, $this->routes['names']);
    }

    public function test_value_in_manually_way_is_flat_mapped()
    {
        $routes = Routin::routes()->get(fn ($route) => [$route]);
        $this->assertTrue(!is_array($routes[0]));

        $routes = Routin::routes()->get(fn ($route) => $route);
        $this->assertTrue(!is_array($routes[0]));
    }

    public function test_get_method_returns_key_of_route_name()
    {
        $routes = Routin::routes()->get();

        $this->assertTrue(
            collect(array_keys($routes))
                ->diff(collect($this->routes['names']))
                ->isEmpty()
        );
    }

    public function test_get_method_returns_value_of_Route_object()
    {
        $routes = Routin::routes()->get();

        foreach (array_values($routes) as $routeValue) {
            $this->assertEquals($routeValue::class, Route::class);
        }
    }

    public function test_get_uri_method_returns_correct_uri()
    {
        $routes = Routin::routes()->getUri();

        $this->assertTrue(
            collect($routes)
                ->diff(collect($this->routes['uris']))
                ->isEmpty()
        );
    }

    public function test_get_parameters_returns_key_of_route_name()
    {
        $routes = Routin::routes()->getParameters();

        $this->assertTrue(
            collect(array_keys($routes))
                ->diff(collect($this->routes['names']))
                ->isEmpty()
        );
    }

    public function test_get_parameters_returns_value_of_parameters()
    {
        $routes = Routin::routes()->getParameters();

        foreach ($routes as $name => $parameter) {
            $this->assertTrue($this->routes['parameters'][$name] === $parameter);
        }
    }

    public function test_get_name_returns_names_correctly()
    {
        $routes = Routin::routes()->getName();

        $this->assertEquals($routes, $this->routes['names']);
    }
}
