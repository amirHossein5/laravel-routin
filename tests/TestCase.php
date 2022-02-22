<?php

namespace AmirHossein5\Routin\Tests;

use AmirHossein5\Routin\RoutinServiceProvider;
use AmirHossein5\Routin\Tests\Controllers\UserController;

class TestCase extends \Orchestra\Testbench\TestCase
{
    /**
     * Routes defined for testing.
     */
    protected $routes = [
        'get' => [
            'user' => [
                'name'       => 'user.index',
                'parameters' => [],
            ],
            'user/create' => [
                'name'       => 'user.create',
                'parameters' => [],
            ],
            'user/{user}' => [
                'name'       => 'user.edit',
                'parameters' => [
                    'user',
                ],
            ],
            'user/show' => [
                'name'       => 'user.show',
                'parameters' => [
                    'user',
                ],
            ],
        ],

        'post' => [
            'user' => [
                'name'       => 'user.store',
                'parameters' => [],
            ],
        ],

        'put' => [
            'user/{user}' => [
                'name'       => 'user.update',
                'parameters' => [
                    'user',
                ],
            ],
        ],

        'delete' => [
            'user/{user}' => [
                'name'       => 'user.destroy',
                'parameters' => [
                    'user',
                ],
            ],
        ],

        'names' => [
            'user.index',
            'user.create',
            'user.store',
            'user.show',
            'user.edit',
            'user.update',
            'user.destroy',
        ],

        'uris' => [
            'user',
            'user/create',
            'user',
            'user/{user}',
            'user/{user}/edit',
            'user/{user}',
            'user/{user}',
        ],

        'parameters' => [
            'user.index'   => [],
            'user.create'  => [],
            'user.store'   => [],
            'user.show'    => ['user'],
            'user.edit'    => ['user'],
            'user.update'  => ['user'],
            'user.destroy' => ['user'],
        ],
    ];

    public function setUp(): void
    {
        parent::setUp();
    }

    protected function getPackageProviders($app)
    {
        return [
            RoutinServiceProvider::class,
        ];
    }

    protected function getEnvironmentSetUp($app)
    {
        //
    }

    protected function defineRoutes($router)
    {
        $router->resource('user', UserController::class);
    }
}
