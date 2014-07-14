<?php 
if ( ! defined('BASEPATH')) exit('No direct script access allowed');
require_once 'security.php'; 

/**
* Manage of Employees
*/
class Employees extends Security
{
	
	function __construct()
	{
		parent::__construct();
	}

	public function index()
	{
		$datas['title'] = "Employees Management";
		$datas['controller_name'] = strtolower(get_class());
        $datas['employees'] = $this->Employee->get_all();
		$this->load->view("staffs/index", $datas);
	}

	public function edit($user_id) {
		$datas['title'] = "Edit Employee";
		$datas['controller_name'] = strtolower(get_class());
        $datas['user_info'] = $this->Employee->get_info($user_id);
        $datas['position'] = array();
        foreach ($this->Position->get_all()->result() as $position)
        {
            $datas['position'][$position->position_id] = $position->position_name;
        }
        
        $departments = array('' => '-- Select --');
        foreach($this->Department->get_all()->result_array() as $row)
        {
            $departments[$row['department_id']] = $row['department_name'];
        }
        $datas['department']=$departments;

        $user_types = array('' => '-- Select --');
        foreach($this->Usertype->get_all()->result_array() as $row)
        {
            $user_types[$row['usertype_id']] = $row['usertype_name'];
        }
        $datas['user_type']=$user_types;

        $managers = array('' => '-- Select --');
        foreach($this->Employee->get_manager_info()->result_array() as $row)
        {
            $managers[$row['user_id']] = $row['first_name']." ".$row['last_name'];
        }
        $datas['manager']=$managers;

		$this->load->view("staffs/form", $datas);
	}

	public function create($user_id = -1) {
		$datas['title'] = "New Employee";
		$datas['controller_name'] = strtolower(get_class());
        $datas['user_info'] = $this->Employee->get_info($user_id);
		$positions = array('' => '-- Select --');
        foreach($this->Position->get_all()->result_array() as $row)
        {
            $positions[$row['position_id']] = $row['position_name'];
        }
        $datas['position']=$positions;

        $departments = array('' => '-- Select --');
        foreach($this->Department->get_all()->result_array() as $row)
        {
            $departments[$row['department_id']] = $row['department_name'];
        }
        $datas['department']=$departments;

        $user_types = array('' => '-- Select --');
        foreach($this->Usertype->get_all()->result_array() as $row)
        {
            $user_types[$row['usertype_id']] = $row['usertype_name'];
        }
        $datas['user_type']=$user_types;

        $managers = array('' => '-- Select --');
        foreach($this->Employee->get_manager_info()->result_array() as $row)
        {
            $managers[$row['user_id']] = $row['first_name']." ".$row['last_name'];
        }
        $datas['manager']=$managers;

		$this->load->view("staffs/form", $datas);
	}

	/*
      Inserts/updates an employee
     */
    function save($user_id=-1)
    {

        $user_profile_data = array(
            'first_name'=>$this->input->post('first_name'),
            'last_name'=>$this->input->post('last_name'),
            'email'=>$this->input->post('email'),
            'gender'=>$this->input->post('gender'),
            'address'=>$this->input->post('address'),
            'phone1'=>$this->input->post('phone1'),
            'phone2'=>$this->input->post('phone2'),
            'dob'=>$this->input->post('dob')
        );
        
        //Password has been changed OR first time password set
        if($this->input->post('password')!='')
        {
            $user_data = array(
                'username'=>$this->input->post('email'),
                'password'=>md5($this->input->post('password')),
                'position_id' => $this->input->post("position"),
                'department_id' => $this->input->post("department"),
                'usertype_id' => $this->input->post("user_type")
            );
        }
        else //Password not changed
        {
            $user_data = array(
                'username'=>$this->input->post('email'),
                'position_id' => $this->input->post("position"),
                'department_id' => $this->input->post("department"),
                'usertype_id' => $this->input->post("user_type")
            );
        }

        if($this->Employee->save($user_profile_data,$user_data, $user_id))
        {
            //New employee
            if($user_id==-1)
            {
                echo json_encode(array('success'=>true,'message'=> 'Employee has been added successfully '.
                $user_profile_data['first_name'].' '.$user_profile_data['last_name'],'user_id'=>$user_data['user_id'],
                'actions'=>'add'));
            }
            else //previous employee
            {
                echo json_encode(array('success'=>true,'message'=>'Employee has been updated successfully '.
                $user_profile_data['first_name'].' '.$user_profile_data['last_name'],'user_id'=>$user_id,
                'actions'=>'update'));
            }
        }
        else//failure
        {   
            echo json_encode(array('success'=>false,'message'=>'Employee cannot added/updated with successfully '.
            $user_profile_data['first_name'].' '.$user_profile_data['last_name'],'user_id'=>-1));
        }
    }

	public function view($user_id) {
		$datas['title'] = "View Details";
		$datas['controller_name'] = strtolower(get_class());

        $datas['user_info'] = $this->Employee->get_info($user_id);

		$this->load->view("staffs/view", $datas);
	}

    /*
      This deletes employees from the users table
     */
    function remove() {
        $employees_to_delete = $this->input->post('checkedID');

        if ($this->Employee->delete_list($employees_to_delete)) {
            echo json_encode(array('success' => true, 'message' => 'Delete successfully ' .
                count($employees_to_delete) . ' employee(s)'));
        } else {
            echo json_encode(array('success' => false, 'message' => 'Deleting was error, delete was failed'));
        }
    }

    /*
    This delete employee from the users table
    */
    function delete($user_id) {
        if ($this->Employee->delete($user_id)) {
            echo json_encode(array('success' => true, 'message' => 'Delete successfully ' .
                count($user_id) . ' employee(s)'));
        } else {
            echo json_encode(array('success' => false, 'message' => 'Deleting was error, delete was failed'));
        }
    }

}
