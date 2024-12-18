<?php

class Model extends Database
{
    protected $table = "";

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

	$query = "insert into " . $this->table;
	$query .= " (".implode(",", $keys) .") values (:".implode(",:", $keys) .")";

	$this->query($query, $data);
}

public function where($data)
	{

		$keys = array_keys($data);

		$query = "select * from ".$this->table." where ";

		foreach ($keys as $key) {
			$query .= $key . "=:" . $key . " && ";
		}
 
 		$query = trim($query,"&& ");

		//echo $query;die;

		$res = $this->query($query,$data);

		if(is_array($res))
		{
			return $res;
		}

		return false;

	}

	public function first($data)
	{

		$keys = array_keys($data);

		$query = "select * from ".$this->table." where ";

		foreach ($keys as $key) {
			$query .= $key . "=:" . $key . " && ";
		}
 
 		$query = trim($query,"&& ");
 		$query .= " order by id desc limit 1";

		$res = $this->query($query,$data);

		if(is_array($res))
		{
			return $res[0];
		}

		return false;

	}

}