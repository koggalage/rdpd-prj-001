<?php 

/**
 * users model
 */
class User
{
	
	public $errors = [];
	protected $table = "users";

	protected $allowedColumns = [

		'email',
		'firstname',
		'lastname',
		'password',
		'role',
		'date',
	];

	public function validate($data)
{
    $this->errors = [];

    // Validate first name
    if (empty($data['firstname'])) {
        $this->errors['firstname'] = "A first name is required";
    }

    // Validate last name
    if (empty($data['lastname'])) {
        $this->errors['lastname'] = "A last name is required";
    }

    // Validate email
    if (empty($data['email'])) {
        $this->errors['email'] = "Email is required";
    }

    // Validate password
    if (empty($data['password'] ?? '')) { // Check if 'password' exists
        $this->errors['password'] = "A password is required";
    }

    // Validate retype password
    if (empty($data['retype_password'] ?? '')) { // Check if 'retype_password' exists
        $this->errors['retype_password'] = "Retyped password is required";
    }

    // Check if passwords match
    if (($data['password'] ?? '') !== ($data['retype_password'] ?? '')) {
        $this->errors['password'] = "Passwords do not match";
    }

    // Validate terms and conditions
    if (empty($data['terms'])) {
        $this->errors['terms'] = "Please accept the terms and conditions";
    }

    // Return true if no errors
    if (empty($this->errors)) {
        return true;
    }

    return false;
}

public function insert($data)
{
	if(!empty($this->allowedColumns))
	{
		foreach ($data as $key => $value) 
		{
			if (!in_array($key, $this->allowedColumns)) 
			{
				unset($data[$key]);
			}
		}
	}

	$keys = array_keys($data);
	$values = array_keys($data);

	$query = "insert into users ";
	$query .= "(".implode(",", $keys) .") values (:".implode(",:", $keys) .")";

	$db = new Database();
	$db->query($query, $data);
}

	
}