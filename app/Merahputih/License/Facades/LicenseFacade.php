<?php namespace Merahputih\License\Facades;

use Illuminate\Support\Facades\Facade;

class LicenseFacade extends Facade {

    /**
     * Get the registered name of the component.
     *
     * @return string
     */
    protected static function getFacadeAccessor() { return 'license'; }

}