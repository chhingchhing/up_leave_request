<?php
/**
* Parent class of employee model
*/
class User extends CI_Model
{
	
	function save(&$user_data,$user_id)
	{
		if (!$user_id OR !$this->existsing($user_id)) {
			if ($this->db->insert("users",$user_data)) {
				$user_data['user_id'] = $this->db->insert_id();
				return true;
			} else {
				return false;
			}
			
		} else {
			$this->db->where('user_id', $user_id);
			return $this->db->update('users',$user_data);
		}
	}

	function existsing($user_id)
	{
		$this->db->from('users');	
		$this->db->where('users.user_id',$user_id);
		$query = $this->db->get();

		return ($query->num_rows()==1);
	}

	/*
	Gets information about a person as an array.
	*/
	function get_info($user_id)
	{
		$query = $this->db->get_where('users', array('user_id' => $user_id), 1);
		
		if($query->num_rows()==1)
		{
			return $query->row();
		}
		else
		{
			//create object with empty properties.
			$fields = $this->db->list_fields('users');
			$user_obj = new stdClass;
			
			foreach ($fields as $field)
			{
				$user_obj->$field='';
			}
			
			return $user_obj;
		}
	}

}