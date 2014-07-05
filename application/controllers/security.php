<?php

/**
* Security area before using this application
*/
class Security extends CI_Controller
{
	
	function __construct()
	{
		parent::__construct();
		// $this->load->model('Employee');
		if(!$this->Employee->is_logged_in())
		{
			redirect('login');
		}
		
		//load up global data
		$logged_in_employee_info=$this->Employee->get_logged_in_employee_info();
		$data['user_info']=$logged_in_employee_info;

		$this->load->vars($data);
	}

}