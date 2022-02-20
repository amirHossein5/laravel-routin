<?php

namespace AmirHossein5\Routin\Tests\Feature;

use AmirHossein5\Routin\Facades\Routin;
use AmirHossein5\Routin\Tests\TestCase;

class FiltersTest extends TestCase
{
    public function test_uri_starts_with_filters_routes_correctly()
    {
        $routes = Routin::routes()->uriStartsWith('s')->getUri(); // not exists
        $this->assertEmpty($routes);

        $routes = Routin::routes()->uriStartsWith('u')->getName();
        $this->assertEquals($this->routes['names'], $routes);
    }

    public function test_uri_ends_with_filters_routes_correctly()
    {
        $routes = Routin::routes()->uriEndsWith('s')->getUri(); // not exists
        $this->assertEmpty($routes);

        $routes = Routin::routes()->uriEndsWith('create')->getName();
        $this->assertEquals(['user.create'], $routes);

        $routes = Routin::routes()->uriEndsWith('r')->getName();
        $this->assertEquals(['user.index', 'user.store'], $routes);

        $routes = Routin::routes()->uriEndsWith('t')->getName();
        $this->assertEquals(['user.edit'], $routes);
    }

    public function test_name_starts_with_filters_routes_correctly()
    {
        $routes = Routin::routes()->nameStartsWith('s')->getUri(); // not exists
        $this->assertEmpty($routes);

        $routes = Routin::routes()->nameStartsWith('user')->getName();
        $this->assertEquals($this->routes['names'], $routes);

        $routes = Routin::routes()->nameStartsWith('u')->getName();
        $this->assertEquals($this->routes['names'], $routes);
    }

    public function test_name_ends_with_filters_routes_correctly()
    {
        $routes = Routin::routes()->nameEndsWith('s')->getUri(); // not exists
        $this->assertEmpty($routes);

        $routes = Routin::routes()->nameEndsWith('w')->getName();
        $this->assertEquals(['user.show'], $routes);

        $routes = Routin::routes()->nameEndsWith('x')->getName();
        $this->assertEquals(['user.index'], $routes);

        $routes = Routin::routes()->nameEndsWith('w')->getName();
        $this->assertEquals(['user.show'], $routes);

        $routes = Routin::routes()->nameEndsWith('te')->getName();
        $this->assertEquals(['user.create', 'user.update'], $routes);
    }

    public function test_without_parameter_filters_routes_correctly()
    {
        $routes = Routin::routes()->withoutParameter()->getName();

        $this->assertEquals(['user.index', 'user.create', 'user.store'], $routes);
    }

    public function test_method_filters_routes_correctly()
    {
        $routes = Routin::routes()->method('delete')->getName();
        $this->assertEquals(['user.destroy'], $routes);

        $routes = Routin::routes()->method('put')->getName();
        $this->assertEquals(['user.update'], $routes);

        $routes = Routin::routes()->method('post')->getName();
        $this->assertEquals(['user.store'], $routes);
    }
}
