<?php

class MultiUseController extends \BaseController {
	 protected $layout = "admin.index";
	public function index(){
		$header_of_tables = $this->getTableHeader("User");
		$this->layout->content = View::make('admin.user.secondblade');
	}

public function getTableHeader($tablename)
{
	switch ($tablename) {
		case 'User':
			return [
				"sn"	=>	"SN",
				"name"	=>	"Name",
				"username"	=>	"Usernmae",
				"name"	=>	"Name",
				"email"	=>	"Email",
				"is_active"	=>	"Status",
					];
			break;
		
		default:
			
			break;
	}
}

}