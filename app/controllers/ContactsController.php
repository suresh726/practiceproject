<?php

class ContactsController extends \BaseController {
	protected $layout = "admin.index";
	/**
	 * Display a listing of contacts
	 *
	 * @return Response
	 */
	public function __construct() {
		$this -> beforeFilter('auth.user');
		if (Auth::user()) {
			$user_details = User::find(Auth::user() -> id);
			$name = $user_details['name'];
			$firstname = explode(" ", $name);
			View::share('user_firstname', $firstname[0]);
			View::share('user_name', $name);
		}
	}

	public function index() {
		$contacts = Contact::all();
		$header_of_tables = $this -> getTableHeader("Contact");
		$this -> layout -> content = View::make('admin.contacts.index', compact('contacts', 'header_of_tables'));
	}

	/**
	 * Show the form for creating a new contact
	 *
	 * @return Response
	 */
	public function create() {
		
		$form_fields = $this->getFormFields('Contact');
		
		$this -> layout -> content = View::make('admin.contacts.create',compact('form_fields'));
	}

	/**
	 * Store a newly created contact in storage.
	 *
	 * @return Response
	 */
	public function store() {
		$messages=array('phone.required'	=>	'Phone Number is required',
						'mobile.required'	=>	'Mobile Number is required',
						'contact_person_name.required'	=>	'Name is required',
						'person_description.required'	=>	'Person description is required',
						
						);
		$rules=array(
						'phone'	=>	'required',
						'mobile'	=>	'required',
						'contact_person_name'	=>	'required',
						'person_description'	=>	'required',
						'is_active'	=> 'required',
						
						);
		
		$validator = Validator::make($data = Input::all(),$rules,$messages);

		if ($validator -> fails()) {
			return Redirect::back() -> withErrors($validator) -> withInput();
		}

		Contact::create($data);

		return Redirect::route('contacts.index');
	}

	/**
	 * Display the specified contact.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id) {
		$contact = Contact::findOrFail($id);

		$this -> layout -> content = View::make('admin.contacts.show', compact('contact'));
	}

	/**
	 * Show the form for editing the specified contact.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id) {
		$contact = Contact::find($id);
		$form_fields = $this->getFormFields('Contact');
		$this -> layout -> content = View::make('admin.contacts.edit', compact('contact','form_fields'));
	}

	/**
	 * Update the specified contact in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id) {
		$contact = Contact::findOrFail($id);

		$messages=array('phone.required'	=>	'Phone Number is required',
						'mobile.required'	=>	'Mobile Number is required',
						'contact_person_name.required'	=>	'Name is required',
						'person_description.required'	=>	'Person description is required',
						
						);
		$rules=array(
						'phone'	=>	'required',
						'mobile'	=>	'required',
						'contact_person_name'	=>	'required',
						'person_description'	=>	'required',
						'is_active'	=> 'required',
						
						);
		
		$validator = Validator::make($data = Input::all(),$rules,$messages);


		if ($validator -> fails()) {
			return Redirect::back() -> withErrors($validator) -> withInput();
		}

		$contact -> update($data);

		return Redirect::route('contacts.index');
	}

	/**
	 * Remove the specified contact from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id) {
		Contact::destroy($id);

		return Redirect::route('contacts.index');
	}

}
