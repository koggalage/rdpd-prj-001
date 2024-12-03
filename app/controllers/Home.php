<?php

/**
 * home class
 */
class Home extends Controller
{
	
	//function __construct()
	//{
	//	echo('Home Page');
	//}

	public function index()
	{
		//echo('Home View Page');

		$db = new Database();
		$db->query();


		$data['title'] = "Home";

		$this->view('home', $data);
	}
}