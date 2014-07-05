<?php
class Employee extends User
{
	/*
	Determines if a given user_id is an employee
	*/
	function exists($user_id)
	{
		$this->db->from('users');
		$this->db->where('users.user_id',$user_id);
		$query = $this->db->get();
		
		return ($query->num_rows()==1);
	}
	
		
	function employee_username_exists($username)
	{
		$this->db->from('users');	
		$this->db->join('user_profile', 'user_profile.user_id = users.user_id');
		$this->db->where('users.username',$username);
		$query = $this->db->get();
		
		
		if($query->num_rows()==1)
		{
			return $query->row()->username;
		}
	}	
	
	/*
	Returns all the users
	*/
	function get_all($col='last_name',$order='asc')
	{	
		$query = $this->db
				->join("user_profile", "users.user_id = user_profile.user_id")
				->join("positions", "users.position_id = positions.position_id")
				->join("departments", "users.department_id = departments.department_id")
				->join("user_types", "users.usertype_id = user_types.usertype_id")
				->get("users");
		return $query;
	}

	/*
	Returns all the users as manager role
	*/
	function get_manager_info($position='manager', $col='last_name',$order='asc')
	{	
		$this->db->select("*");	
		$this->db->join('user_profile', 'user_profile.user_id = users.user_id', 'left');
		$this->db->join('positions', 'positions.position_id = users.position_id');
		$this->db->where('positions.position_name',$position);
		return $this->db->get("users");
	}
	
	function count_all()
	{
		$this->db->from('users');
		$this->db->where('deleted',0);
		return $this->db->count_all_results();
	}
	
	/*
	Gets information about a particular employee
	*/
	function get_info($user_id)
	{
		$query = $this->db
				->join("user_profile", "users.user_id = user_profile.user_id")
				->join("positions", "users.position_id = positions.position_id")
				->join("departments", "users.department_id = departments.department_id")
				->join("user_types", "users.usertype_id = user_types.usertype_id")
				->where("users.user_id", $user_id)
				->get("users");
		
		if($query->num_rows()==1)
		{
			return $query->row();
		}
		else
		{
			//Get empty base parent object, as $user_id is NOT an employee
			$user_obj = parent::get_info(-1);
			
			//Get all the fields from employee table
			$fields = $this->db->list_fields('user_profile');
			
			//append those fields to base parent object, we we have a complete empty object
			foreach ($fields as $field)
			{
				$user_obj->$field='';
			}
			
			return $user_obj;
		}
	}
	
	/*
	Gets information about multiple users
	*/
	function get_multiple_info($user_ids)
	{
		$this->de->select("users.user_id as user_id, user_profile.user_id as pro_user_id");
		$this->db->from('user_profile');
		$this->db->join('users', 'user_profile.pro_user_id = users.user_id');		
		$this->db->where_in('users.user_id',$user_ids);
		$this->db->order_by("last_name", "asc");
		return $this->db->get();		
	}
        
	/*
	Inserts or updates an employee
	*/
	function save(&$user_profile_data, &$user_data, $user_id = false)
	{
		$success=false;
		
		//Run these queries as a transaction, we want to make sure we do all or nothing
		$this->db->trans_start();
			
		if(parent::save($user_data,$user_id))
		{
			if (!$user_id or !$this->exists($user_id))
			{
				$user_profile_data['user_id'] = $user_id = $user_data['user_id'];
				$success = $this->db->insert('user_profile',$user_profile_data);
                                
			}
			else
			{
				$this->db->where('user_id', $user_id);
				$success = $this->db->update('user_profile',$user_profile_data);		
			}
			
		}
		
		$this->db->trans_complete();		
		return $success;
	}
	
	/*
	Deletes one employee
	*/
	function delete($user_id)
	{
		$success=false;
		
		//Don't let employee delete their self
		if($user_id==$this->get_logged_in_employee_info()->user_id)
			return false;
		
		//Run these queries as a transaction, we want to make sure we do all or nothing
		$this->db->trans_start();

		$this->db->where('user_id', $user_id);
		$success = $this->db->delete('users');

		$this->db->trans_complete();		
		return $success;
	}
	
	/*
	Deletes a list of users
	*/
	function delete_list($user_ids)
	{
		$success=false;
		
		//Don't let employee delete their self
		if(in_array($this->get_logged_in_employee_info()->user_id,$user_ids))
			return false;

		//Run these queries as a transaction, we want to make sure we do all or nothing
		$this->db->trans_start();

		/*$this->db->where_in('user_id',$user_ids);
		//Delete permissions
		if ($this->db->delete('permissions'))
		{*/
			//delete from employee table
			$this->db->where_in('user_id',$user_ids);
			$success = $this->db->delete('users');
		// }
		$this->db->trans_complete();		
		return $success;
 	}
	
		
	function check_duplicate($term)
	{
		$this->db->from('users');
		$this->db->join('user_profile','users.user_id=user_profile.user_id');	
		$this->db->where('deleted',0);		
		$query = $this->db->where("CONCAT(first_name,' ',last_name) = ".$this->db->escape($term));
		$query=$this->db->get();
		
		if($query->num_rows()>0)
		{
			return true;
		}
	}
	
	/*
	Attempts to login employee and set session. Returns boolean based on outcome.
	*/
	function login($email, $password)
	{
		$query = $this->db->get_where('users', array('username' => $email,'password'=>md5($password)), 1);
		if ($query->num_rows() ==1)
		{
			$row=$query->row();
			$this->session->set_userdata('user_id', $row->user_id);
			return true;
		}
		return false;
	}
	
	/*
	Logs out a user by destorying all session data and redirect to login
	*/
	function logout()
	{
		$this->session->sess_destroy();
		redirect('login');
	}
	
	/*
	Determins if a employee is logged in
	*/
	function is_logged_in()
	{
		return $this->session->userdata('user_id')!=false;
	}
	
	/*
	Gets information about the currently logged in employee.
	*/
	function get_logged_in_employee_info()
	{
		if($this->is_logged_in())
		{
			return $this->get_info($this->session->userdata('user_id'));
		}
		
		return false;
	}
	
	function authentication_check($password)
	{
		$pd=$this->session->userdata('user_id');
	   $pass=md5($password);
		$query = $this->db->get_where('users', array('user_id' => $pd,'password'=>$pass), 1);
		return $query->num_rows() == 1;
	}
	
	function get_employee_by_username_or_email($username_or_email)
	{
		$this->db->from('users');	
		$this->db->join('people', 'people.user_id = users.user_id');
		$this->db->where('username',$username_or_email);
		$this->db->or_where('email',$username_or_email);
		$query = $this->db->get();
		
		if ($query->num_rows() == 1)
		{
			return $query->row();
		}
		
		return false;
	}
	
	function update_employee_password($user_id, $password)
	{
		$user_data = array('password' => $password);
		$this->db->where('user_id', $user_id);
		$success = $this->db->update('users',$user_data);
		
		return $success;
	}
	
}
?>
