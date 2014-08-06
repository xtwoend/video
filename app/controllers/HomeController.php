<?php

/**
 * Home Controller
 *
 * NOTICE OF LICENSE
 *
 * Licensed under the MIT License.
 *
 * This source file is subject to the MIT License that is
 * bundled with this package in the LICENSE file.  It is also available at
 * the following URL: http://opensource.org/licenses/MIT
 *
 * @package    controllers
 * @version    1.0.0
 * @author     Abdul Hafidz A <aditans88@gmail.com>
 * @license    MIT License
 */

class HomeController extends BaseController {

	

	public function __construct()
	{
		parent::__construct();


	}

	public function index()
	{
		$data['do'] = '';
		return $this->theme->of('home.index', $data)->render();
	}

}
