<?php

namespace Saas\Alay\Facades;

use Illuminate\Support\Facades\Facade;

class Foo extends Facade
{
    protected static function getFacadeAccessor() { return 'alay.foo'; }
}