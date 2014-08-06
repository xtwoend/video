<?php namespace Merahputih\Tv\Facades;

use Illuminate\Support\Facades\Facade;

class TvFacade extends Facade {

    /**
     * Get the registered name of the component.
     *
     * @return string
     */
    protected static function getFacadeAccessor() { return 'tv'; }

}