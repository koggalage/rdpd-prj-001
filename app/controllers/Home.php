<?php

/**
 * home class
 */
class Home
{
	
	//function __construct()
	//{
	//	echo('Home Page');
	//}

	public function index()
	{
		echo('Home View Page');
	}

	public function edit()
	{
		echo('Home Editing ');
	}

	public function delete($id)
	{
		echo('Home Deleting '.$id);
	}
}