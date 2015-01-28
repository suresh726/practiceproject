<?php

class AdminController extends \BaseController {
	  protected $layout = "admin.index";
	  
	/**
	 * Display a listing of users
	 *
	 * @return Response
	 * 
	 */
	 public function __construct(){
	 	$this->beforeFilter('auth.user');
		if(Auth::user()){
	 	 $user_details = User::find(Auth::user()->id);
		 $name=$user_details['name'];
		 $firstname = explode(" ", $name);
		 View::share('user_firstname',$firstname[0]);
		  View::share('user_name',$name);
		}
	 }
	public function index()
	{
		$users = User::all();
		
		$header_of_tables = $this->getTableHeader("User");
		$this->layout->content = View::make('users.index',compact('users','header_of_tables'));
		
	}

	/**
	 * Show the form for creating a new user
	 *
	 * @return Response
	 */
	public function create()
	{
		$form_fields = $this->getFormFields('User');
		$this->layout->content = View::make('users.create',compact('form_fields'));
	}

	/**
	 * Store a newly created user in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		$data['name'] = Input::get('name');
		$data['username'] = Input::get('username');
		$data['email'] = Input::get('email');
		$data['password'] = Hash::make(Input::get('password'));
		$data['is_active'] = Input::get('is_active');
		
		$messages=array('username.required'	=>	'Username is required',
						'name.required'	=>	'Full name is required',
						'email.required'	=>	'Email is required',
						'password.required'	=>	'Password is required',
						'is_active.required'	=> 'Status is required',		
						
						);
		$rules=array(
						'username'	=>	'required',
						'name'	=>	'required',
						'email'	=>	'required',
						'password'	=>	'required',
						'is_active'	=> 'required',	
						);
		
		$validator = Validator::make($data, $rules,$messages);

		if ($validator->fails())
		{
			return Redirect::back()->withErrors($validator)->withInput();
		}

		User::create($data);

		return Redirect::route('admin.index');
	}

	/**
	 * Display the specified user.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		$user = User::findOrFail($id);

		$this->layout->content= View::make('users.show', compact('user'));
	}

	/**
	 * Show the form for editing the specified user.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		$user = User::find($id);
		$form_fields = $this->getFormFields('User');

		$this->layout->content=View::make('users.edit', compact('user','form_fields'));
	}

	/**
	 * Update the specified user in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		$user = User::findOrFail($id);

		$validator = Validator::make($data = Input::all(), $rules,$messages);

		if ($validator->fails())
		{
			return Redirect::back()->withErrors($validator)->withInput();
		}

		$user->update($data);

		return Redirect::route('admin.index');
	}

	/**
	 * Remove the specified user from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		User::destroy($id);

		return Redirect::route('admin.index');
	}

}
