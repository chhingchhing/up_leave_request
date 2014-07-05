<?php

/**
* User Type of user
*/
class Usertype extends CI_Model
{
	
	/*
	Returns all the types of user
	*/
	function get_all($col='usertype_name',$order='asc')
	{
		$data = $this->db
				->from("user_types")
				->order_by($col, $order)
				->get();
		return $data;
	}

}