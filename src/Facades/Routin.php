<?php

namespace AmirHossein5\Routin\Facades;

use Illuminate\Support\Facades\Facade;

/**
 * @method static self routes()
 * @method static self uriStartsWith(string $uriStartsWith)
 * @method static self uriEndsWith(string $endsWith)
 * @method static self nameStartsWith(string $nameStartsWith)
 * @method static self nameEndsWith(string $endsWith)
 * @method static self withoutParameter()
 * @method static self method(string $method)
 * @method static array get(?\Closure $closure = null)
 * @method static array getName()
 * @method static array getParameters()
 * @method static array getUri()
 **/

class Routin extends Facade
{
    protected static function getFacadeAccessor()
    {
        return 'routin';
    }
}
