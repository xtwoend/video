<?php

class BaseController extends Controller {

	/**
	 * initalize theme
	 */
	public $theme;

	/**
	 * construct.
	 *
	 * @return void
	 */	
	public function __construct()
	{
		$this->theme = Theme::uses('merahputih')->layout('default');
	}

}
