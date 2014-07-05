<?php

/**
* Class Department for using with department data
*/
class Department extends CI_Model
{
	
	/*
	Returns all the departments
	*/
	function get_all($col='department_name',$order='asc')
	{
		$data = $this->db
				->from("departments")
				->order_by($col, $order)
				->get();
		return $data;
	}
	/*
	Gets information about a particular employee
	*/
	function get_info($user_id)
	{
		$query = $this->db
				->where("department_id", $user_id)
				->get("departments");
		
		if($query->num_rows()==1)
		{
			return $query->row();
		}
		else
		{
			//Get empty base parent object, as $user_id is NOT an employee
			$obj = new stdClass();
			
			//Get all the fields from employee table
			$fields = $this->db->list_fields('departments');
			
			//append those fields to base parent object, we we have a complete empty object
			foreach ($fields as $field)
			{
				$obj->$field='';
			}
			
			return $obj;
		}
	}

	/*
	Inserts or updates an employee
	*/
	function save(&$department_info, $department_id = false)
	{
		$success=false;
		
		//Run these queries as a transaction, we want to make sure we do all or nothing
		$this->db->trans_start();

		if (!$department_id or !$this->exists($department_id))
		{
			$success = $this->db->insert('departments',$department_info);              
		}
		else
		{
			$this->db->where('department_id', $department_id);
			$success = $this->db->update('departments',$department_info);		
		}
		
		$this->db->trans_complete();		
		return $success;
	}

	/*
	Determines if a given department_id is an employee
	*/
	function exists($department_id)
	{
		$this->db->from('departments');
		$this->db->where('department_id',$department_id);
		$query = $this->db->get();
		
		return ($query->num_rows()==1);
	}

	/*
	Deletes one employee
	*/
	function delete($department_id)
	{
		$success=false;
		
		//Don't let employee delete their self
		/*if($department_id==$this->get_logged_in_employee_info()->user_id)
			return false;*/
		
		//Run these queries as a transaction, we want to make sure we do all or nothing
		$this->db->trans_start();

		$this->db->where('department_id', $department_id);
		$success = $this->db->delete('departments');

		$this->db->trans_complete();		
		return $success;
	}

	/*
	Deletes a list of departments
	*/
	function delete_list($department_ids)
	{
		$success=false;
		
		//Don't let employee delete their self
		/*if(in_array($this->get_logged_in_employee_info()->user_id,$user_ids))
			return false;*/

		//Run these queries as a transaction, we want to make sure we do all or nothing
		$this->db->trans_start();
		
		//delete from departments table
		$this->db->where_in('department_id',$department_ids);
		$success = $this->db->delete('departments');
		$this->db->trans_complete();		
		return $success;
 	}

}