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
/*
Route::get('/', function()
{
	return View::make('hello');
});
*/

Route::get('/', function()
{
    //$tag = new Tag(array('name' => 'wamp'));
    //Blogpost::find(2)->tags()->save($tag);
    $blogpost = Blogpost::find(2);
    return $blogpost->tags;
});

Route::resource('companies', 'CompanyController');

Route::resource('addresses', 'AddressController');

Route::resource('tags', 'TagController');

Route::get('/register', 'HomeController@postRegister');

Route::resource('nerds', 'NerdController');

Route::resource('courses', 'CourseController');