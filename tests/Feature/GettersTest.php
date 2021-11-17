<?php

namespace AmirHossein5\Routin\Tests\Feature;

use AmirHossein5\Routin\Facades\Routin;
use AmirHossein5\Routin\Tests\TestCase;
use Illuminate\Routing\Route;

class GettersTest extends TestCase
{
    public function test_get_method_returns_key_of_route_name()
    {
        $routes = Routin::get();

        $this->assertTrue(
            collect(array_keys($routes))
                ->diff(collect($this->routes['names']))
                ->isEmpty()
        );
    }

    public function test_get_method_returns_value_of_Route_object()
    {
        $routes = Routin::get();

        foreach (array_values($routes) as $routeValue) {
            $this->assertEquals($routeValue::class, Route::class);
        }
    }

    public function test_get_uri_method_returns_correct_uri()
    {
        $routes = Routin::getUri();

        $this->assertTrue(
            collect($routes)
                ->diff(collect($this->routes['uris']))
                ->isEmpty()
        );
    }

    public function test_get_parameters_returns_key_of_route_name()
    {
        $routes = Routin::getParameters();

        $this->assertTrue(
            collect(array_keys($routes))
                ->diff(collect($this->routes['names']))
                ->isEmpty()
        );
    }

    public function test_get_parameters_returns_value_of_parameters()
    {
        $routes = Routin::getParameters();

        foreach ($routes as $name => $parameter) {
            $this->assertTrue($this->routes['parameters'][$name] === $parameter);
        }
    }

    public function test_get_name_returns_names_correctly()
    {
        $routes = Routin::getName();

        $this->assertEquals($routes, $this->routes['names']);
    }
}
