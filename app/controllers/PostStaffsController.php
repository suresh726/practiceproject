<?php

class PostStaffsController extends \BaseController {
	protected $layout = "admin.index";
	/**
	 * Display a listing of poststaffs
	 *
	 * @return Response
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
		$poststaffs = Poststaff::all();

		$this->layout->content = View::make('admin.post_staffs.index', compact('poststaffs'));
	}

	/**
	 * Show the form for creating a new poststaff
	 *
	 * @return Response
	 */
	public function create()
	{
		$this->layout->content = View::make('admin.post_staffs.create');
	}

	/**
	 * Store a newly created poststaff in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		$validator = Validator::make($data = Input::all(), Poststaff::$rules);

		if ($validator->fails())
		{
			return Redirect::back()->withErrors($validator)->withInput();
		}

		Poststaff::create($data);

		return Redirect::route('poststaffs.index');
	}

	/**
	 * Display the specified poststaff.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		$poststaff = Poststaff::findOrFail($id);

		$this->layout->content = View::make('admin.post_staffs.show', compact('poststaff'));
	}

	/**
	 * Show the form for editing the specified poststaff.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		$poststaff = Poststaff::find($id);

		$this->layout->content = View::make('admin.post_staffs.edit', compact('poststaff'));
	}

	/**
	 * Update the specified poststaff in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		$poststaff = Poststaff::findOrFail($id);

		$validator = Validator::make($data = Input::all(), Poststaff::$rules);

		if ($validator->fails())
		{
			return Redirect::back()->withErrors($validator)->withInput();
		}

		$poststaff->update($data);

		return Redirect::route('poststaffs.index');
	}

	/**
	 * Remove the specified poststaff from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		Poststaff::destroy($id);

		return Redirect::route('poststaffs.index');
	}

}
