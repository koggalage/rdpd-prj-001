<?php

/**
 * signup class
 */
class Signup extends Controller
{
	public function index()
	{
		$user = new User();
		if($user->validate($_POST))
		{
			$_POST['date'] = date("Y-m-d H:i:s");
			$user->insert($_POST);
			// $query = "insert into users (email,firstname,lastname,password,role,date) values (:email,:firstname,:lastname,:password,:role,:date)";
			
			// $arr['firstname'] = $_POST['firstname'];
			// $arr['lastname'] = $_POST['lastname'];
			// $arr['email'] = $_POST['email'];
			// $arr['password'] = $_POST['password'];
			// $arr['role'] = "user";
			// $arr['date'] = date("Y-m-d H:i:s");
			
			// $db = new Database();
			// $db->query($query,$arr);
		}

		show($user->errors);
		show($_POST);
		$data['title'] = "Signup";

		$this->view('signup', $data);



		// show($_POST);
		// $user = new User();
		// if($user->validate($_POST))
		// {
		// 	$query = "insert into users (email,firstname,lastname,password,role,date) values (:email,:firstname,:lastname,:password,:role,:date)";

		// 	$arr['firstname'] = $_POST['firstname'];
		// 	$arr['lastname'] = $_POST['lastname'];
		// 	$arr['email'] = $_POST['email'];
		// 	$arr['password'] = $_POST['password'];
		// 	$arr['role'] = "user";
		// 	$arr['date'] = date("Y-m-d H:i:s");

		// 	$db = new Database();
		// 	$db->query($query,$arr);
		// }

		// show($user->errors);

		
		// $data['title'] = "Signup";

		// $this->view('signup', $data);
	}
}