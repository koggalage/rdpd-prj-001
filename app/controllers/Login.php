<?php 

/**
 * login class
 */
class Login extends Controller
{
	
	public function index()
	{

		$data['errors'] = [];

		$data['title'] = "Login";
		$user = new User();

		if($_SERVER['REQUEST_METHOD'] == "POST")
		{
			//validate
			$row = $user->first([
				'email'=>$_POST['email']
			]);

			//show($row);die;

			if($row){

				if($row->password === $_POST['password'])
				{
					//authenticate
					$_SESSION['USER_DATA'] = $row;

					redirect('home');
				}
			}

			$data['errors']['email'] = "Wrong email or password";
		}

		$this->view('login',$data);
	}
	
}