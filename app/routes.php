<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the Closure to execute when that URI is requested.
|
*/




/**
 * Route Route
 * 
 */
Route::get('/login', ['as'=> 'login', 'uses'=> 'AuthController@index']);
Route::post('/login', ['as'=> 'login', 'uses'=> 'AuthController@store']);


/**
 * Guests Route
 * untuk mengakses public page
 */
Route::get('/', 'HomeController@index');
Route::get('/watch', ['as'=> 'watch', 'uses'=> 'VideoController@watch']);


/**
 * Sample Route
 *
 */
Route::get('upload', ['as'=> 'upload', 'uses'=> 'UploadController@getUpload']);

//Route::post('upload', ['as'=> 'uploadvideo', 'uses'=> 'UploadController@postVideo']);
Route::get('uploadfile', 'UploadController@upload');
Route::post('uploadfile','UploadController@upload');


Route::post('video/informasi', ['as'=> 'video.informasi.add', 'uses'=> 'UploadController@addInformasi']);

/** 
 * Tv Route 
 */
Route::resource('tv', 'TvController');

/**
 * Category Routes
 * 
 */
Route::resource('categories', 'CategoryController');
Route::get('api/categories', array('as'=>'api.categories', 'uses'=>'CategoryController@getDatatable'));

/**
 * License Routes
 * 
 */
Route::resource('licenses', 'LicenseController');
Route::get('api/licenses', array('as'=>'api.licenses', 'uses'=>'LicenseController@getDatatable'));


//user access
Route::get('/me', array('before'=> 'auth', function(){
	return Sentry::getUser();
}));

Route::get('/logout', array('as'=>'logout', function(){
	Sentry::logout();
	return Redirect::to('/');
}));
//OAuth 
Route::get('oauth', function(){

	$provider = new League\OAuth2\Client\Provider\Xtwoend(array(
	    'clientId'  	=>  'ymyi8bGd6nSP0WhdmmLz9rUxAGSQ3pT6DlVDIau1',
	    'clientSecret'  =>  'JX3ymChnENBoYfuygyssta5FqZOAFeBKe9QRpvTg',
	    'redirectUri'   =>  'http://localhost/merahputih/public/oauth'
	));

	if ( ! isset($_GET['code'])) {

	    // If we don't have an authorization code then get one
	    header('Location: '.$provider->getAuthorizationUrl());
	    exit;

	} else {
		
	    // Try to get an access token (using the authorization code grant)
	    $token = $provider->getAccessToken('authorization_code', [
	        'code' => $_GET['code']
	    ]);
	    // Optional: Now you have a token you can look up a users profile data
	    try {
	        // We got an access token, let's now get the user's details
	        $userDetails = $provider->getUserDetails($token);

	        try
			{
			    // Find the user using the user email address
			    $user = Sentry::findUserByLogin($userDetails->email);
		
			    Sentry::loginAndRemember($user);
	        	
	        	return Redirect::to('me');
			    // Now you can send this code to your user via email for example.
			}
			catch (Cartalyst\Sentry\Users\UserNotFoundException $e)
			{
			   $user = Sentry::createUser(array(
			        'email'     => $userDetails->email,
			        'password'  => Str::random(40),
			        'first_name' => $userDetails->firstName,
			        'last_name'	=> $userDetails->lastName,
			        'activated' => true,
			    ));

			    // Find the group using the group id
			    $userGroup = Sentry::findGroupById(1);

			    // Assign the group to the user
			    $user->addGroup($userGroup);

			    Sentry::loginAndRemember($user);

	        	return Redirect::to('me');
			}

	        // Use these details to create a new profile
	        //printf('Hello %s!', $userDetails->firstName);

	    } catch (Exception $e) {
	        // Failed to get user details
	        exit($e->getMessage());
	    }
	}
});


//rotue tester
Route::get('/thumb', function(){
	$path = '/home/xtwoend/Video/hunterxhunter.mp4';
	$destination = '/home/xtwoend/Video/';
	$name = 'dadang.jpg';
	return Sonus::getThumbnails($path, $destination.$name, 5);
});
