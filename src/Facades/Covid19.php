<?php


namespace Imagdic\Covid19\Facades;


use Illuminate\Support\Facades\Facade;

/**
 * @see \Imagdic\Covid19\Covid19
 */
class Covid19 extends Facade
{
    /**
     * Get the registered name of the component.
     *
     * @return string
     */
    protected static function getFacadeAccessor() { return 'covid19'; }
}
