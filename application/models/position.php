<?php

class Position extends CI_Model
{
	/*
	Returns all the positions
	*/
	function get_all($col='position_name',$order='asc')
	{
		$positions = $this->db->dbprefix('positions');
		$data = $this->db
				->from($positions)
				->order_by($col, $order)
				->get();
		return $data;
	}

}