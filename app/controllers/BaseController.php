<?php

class BaseController extends Controller {

	/**
	 * Setup the layout used by the controller.
	 *
	 * @return void
	 */
	protected function setupLayout()
	{
		if ( ! is_null($this->layout))
		{
			$this->layout = View::make($this->layout);
		}
	}
	public function getTableHeader($tablename)
{
	switch ($tablename) {
		case 'User':
			return [
				"name"	=>	"Name",
				"username"	=>	"Username",
				"name"	=>	"Name",
				"email"	=>	"Email",
				"is_active"	=>	"Status",
					];
			break;
		case 'Contact':
			return [
				"contact_person_name"	=> "Name",
				"phone"	=> "Phone",
				"mobile"	=> "Mobile",
				"is_active"	=>	"Status",
				"person_description"	=> "Remarks",
			];
			break;
		
		default:
			
			break;
	}
}
public function getFormFields($form1){
	switch ($form1) {
		case 'User':
			$form[]=[
			"column" => "username",
			"label" => "Username",
			"group" => "1",
			"type" => "text",
			"options"	=> "",
			];
			$form[]=[
			"column" => "password",
			"label" => "Password",
			"group" => "1",
			"type" => "password",
			"options"	=> "",
			];
			$form[]=[
			"column" => "confirm_password",
			"label" => "Confirm Password",
			"group" => "1",
			"type" => "password",
			"options"	=> "",
			];
			$form[]=[
			"column" => "name",
			"label" => "Full name",
			"group" => "2",
			"type" => "text",
			"options"	=> "",
			];
			$form[]=[
			"column" => "email",
			"label" => "Email",
			"group" => "2",
			"type" => "text",
			"options"	=> "",
			];
			$form[]=[
			"column" => "is_active",
			"label" => "Status",
			"group" => "2",
			"type" => "select",
			"options"	=> [" "=>"Select",1=>"Inactive",2=>"Active"],
			];
			return $form ;
			
			break;
	case 'Contact':
	$form[]=[
			"column" => "contact_person_name",
			"label" => "Name",
			"group" => "1",
			"type" => "text",
			"options"	=> "",
			];
			$form[]=[
			"column" => "person_description",
			"label" => "Description",
			"group" => "2",
			"type" => "text",
			"options"	=> "",
			];
			$form[]=[
			"column" => "phone",
			"label" => "Phone",
			"group" => "1",
			"type" => "text",
			"options"	=> "",
			];
			$form[]=[
			"column" => "mobile",
			"label" => "Mobile",
			"group" => "1",
			"type" => "text",
			"options"	=> "",
			];
			$form[]=[
			"column" => "is_active",
			"label" => "Status",
			"group" => "2",
			"type" => "select",
			"options"	=> [" "=>"Select",1=>"Inactive",2=>"Active"],
			];
			return $form ;
	break;
		default:
			
			break;
	}
	
}

}
