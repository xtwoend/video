<?php

/**
 * Category Controller
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

class CategoryController extends \BaseController {

	/**
	 * construct 
	 *
	 * @return void
	 */
	public function __construct()
	{
		parent::__construct();
	}


	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{	
		return $this->theme->of('categories.index')->render();
	}


	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		return $this->theme->of('categories.create')->render();
	}


	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{	
		$input = Input::all();
		$create = Category::create($input);
		return ($create)? Redirect::to('categories') : Redirect::back('error');
	}


	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		//
	}


	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		//
	}


	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		//
	}


	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		//
	}

	/**
	 * resource datatable
	 *
	 * @return json
	 */
	public function getDatatable()
	{	
		return Datatable::collection(Category::all())
        ->showColumns('id', 'category', 'slug')
        ->searchColumns('category')
        ->orderColumns('id','category')
        ->make();
    }	
}
