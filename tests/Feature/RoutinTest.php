<?php

namespace AmirHossein5\Routin\Tests\Feature;

use AmirHossein5\Routin\Facades\Routin;
use AmirHossein5\Routin\Tests\TestCase;

class RoutinTest extends TestCase
{
    public function test_returns_those_routes_with_get_that_dont_have_parameters()
    {
        $routes = Routin::routes()
            ->withoutParameter()
            ->method('get')
            ->getUri();

        $this->assertEquals(["user", "user/create"], $routes);
    }
}
