<?php namespace Merahputih\Comment\Facades;

use Illuminate\Support\Facades\Facade;

class CommentFacade extends Facade {

    /**
     * Get the registered name of the component.
     *
     * @return string
     */
    protected static function getFacadeAccessor() { return 'comment'; }

}