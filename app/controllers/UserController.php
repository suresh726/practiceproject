<?php
use Illuminate\Auth\Reminders\RemindableTrait;
use Illuminate\Auth\Reminders\RemindableInterface;
class UserController extends \BaseController {
	public function login() {
		if ($this -> isPostRequest()) {
			$validator = $this -> getLoginValidator();
			if ($validator -> passes()) {
				$credentials = $this -> getLoginCredential();
					
					if(Auth::attempt($credentials)){
						
						return Redirect::route('admin.index')	;
					}
					else {
						
				 return Redirect::back()->withErrors([
                            "password" => ["Invalid Credentials"]
                            ]);
					}
			}
		}
		return View::make('admin.login');
	}
public function registerNewUser() {
 	if($this -> isPostRequest()){
 		
 		$data['name'] = Input::get('name');
		$data['username'] = Input::get('username');
		$data['email'] = Input::get('email');
		$data['password'] = Hash::make(Input::get('password'));
		$data['is_active'] = 0;
		
		$messages=array('username.required'	=>	'Username is required',
						'name.required'	=>	'Full name is required',
						'email.required'	=>	'Email is required',
						'password.required'	=>	'Password is required',
						'password.confirmed'=> 'Password didnot match',
						
						);
		$rules=array(
						'username'	=>	'required',
						'name'	=>	'required',
						'email'	=>	'required',
						'password'	=>	'required',
						
						);
		
		$validator = Validator::make($data, $rules,$messages);

		if ($validator->fails())
		{
			return Redirect::back()->withErrors([
                            "password" => ["Invalid Credentials"]
                ])->withInput();
		}

		User::create($data);
		return Redirect::route('admin.index');
 	}
	return View::make("admin.register");
 }
	protected function isPostRequest() {
		return Input::server("REQUEST_METHOD") == "POST";
	}

	protected function getLoginValidator() {
		return Validator::make(Input::all(), ["username" => "required", "password" => "required"], ["username.required" => "Username is required", "password.required" => "Password is required"]);
	}

	protected function getLoginCredential() {
		return ["username" => Input::get("username"), "password" => Input::get("password")];
	}
	public function logOutUser(){
		Auth::logout();
        return Redirect::to('users/login')->with('message', 'You are now logged out!');
	}
	/* register new user */
 
 

}
