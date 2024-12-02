<?php

/**
 * 404 class page not found
 */
class _404 extends Controller
{
	
	function index()
	{
		//echo("Page not found!");

		$data['title'] = "Home";
		$this->view('404', $data);
	}
}