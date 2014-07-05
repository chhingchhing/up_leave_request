<?php

/**
* Class Department for using with department data
*/
class Takeleave extends CI_Model
{
	
	/*
	Returns all the departments
	*/
	function get_all($col='take_id',$order='asc')
	{
		$data = $this->db
				->from("leave_requests")
				->order_by($col, $order)
				->get();
		return $data;
	}
	/*
	Gets information about a particular takeleave
	*/
	function get_info($take_id)
	{
		$query = $this->db
				->where("take_id", $take_id)
				->get("leave_requests");
		
		if($query->num_rows()==1)
		{
			return $query->row();
		}
		else
		{
			//Get empty base parent object, as $take_id is NOT an takeleave
			$obj = new stdClass();
			
			//Get all the fields from takeleave table
			$fields = $this->db->list_fields('leave_requests');
			
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
	function save(&$take_leave, &$take_id = false)
	{
		$success=false;
		
		//Run these queries as a transaction, we want to make sure we do all or nothing
		$this->db->trans_start();
			
		if(parent::save($take_leave,$take_id))
		{
			if (!$take_id or !$this->exists($take_id))
			{
				$take_leave['take_id'] = $take_id;
				$success = $this->db->insert('leave_requests',$take_leave);
                                
			}
			else
			{
				$this->db->where('take_id', $take_id);
				$success = $this->db->update('leave_requests',$take_leave);		
			}
			
		}
	}
}
?>