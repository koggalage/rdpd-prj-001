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

		$data['title'] = "Home";

		$this->view('home', $data);
	}
}