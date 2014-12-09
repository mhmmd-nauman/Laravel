<?php

class HomeController extends BaseController {

	/*
	|--------------------------------------------------------------------------
	| Default Home Controller
	|--------------------------------------------------------------------------
	|
	| You may wish to use controllers instead of, or in addition to, Closure
	| based routes. That's great! Here is an example controller method to
	| get you started. To route to this controller, just add the route:
	|
	|	Route::get('/', 'HomeController@showWelcome');
	|
	*/

	public function showWelcome()
	{
		return View::make('hello');
	}
        public function postRegister() {
            try {
              $user = Sentry::createUser(array(
                'first_name' => "Muhammad",
                'last_name' => "Nauman",
                'email' => "mhmmd.nauman@gmail.com",
                'password' => "123456",
                'activated' => true,
              ));
            }
            catch(\Cartalyst\Sentry\Users\UserExistsException $e) {
              echo "User already exists.";
            }
        }
        public function postLogin() {
            $credentials = array(
              'email' => Input::get('login'),
              'password' => Input::get('password'),
            );
            try {
              $user = Sentry::authenticate($credentials, Input::get('remember'));
              if ($user) {
                return Redirect::to('admin');
              }
            }
            catch (Exception $e) {
              return Redirect::to('login')->withInput()->with(array('view'=>'login', 'messageType'=>'danger', 'message'=>$e->getMessage()));
            }
        }

}
