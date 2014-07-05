<?php
if ( !defined("BASEPATH") ) exit("No direct script access allowed");

class Departments extends CI_Controller
{
	function __construct()
	{
		parent::__construct();
	}

	public function index()
	{
		$datas['title'] = "Users Management";
		$datas['controller_name'] = strtolower(get_class());
        $datas['records'] = $this->Department->get_all();
		$this->load->view("departments/index", $datas);
	}

	public function edit($department_id) {
		$datas['title'] = "Edit User";
		$datas['controller_name'] = strtolower(get_class());
        $datas['record_info'] = $this->Department->get_info($department_id);

		$this->load->view("departments/form", $datas);
	}

	public function create($department_id = -1) {
		$datas['title'] = "New Departments";
		$datas['controller_name'] = strtolower(get_class());
		$datas['record_info'] = $this->Department->get_info($department_id);

		$this->load->view("departments/form", $datas);
	}

	public function view() {
		$datas['title'] = "View Details";
		$datas['controller_name'] = strtolower(get_class());
		$this->load->view("departments/view", $datas);
	}

	/*
    This delete department from the departments table
    */
    function delete($department_id) {
        if ($this->Department->delete($department_id)) {
            echo json_encode(array('success' => true, 'message' => 'Delete successfully ' .
                count($department_id) . ' department(s)'));
        } else {
            echo json_encode(array('success' => false, 'message' => 'Deleting was error, delete was failed'));
        }
    }

    /*
      Inserts/updates an department
     */
    function save($department_id=-1)
    {
        $department_info = array(
            'department_name'=>$this->input->post('dept_name'),
            'description'=>$this->input->post('dept_description'),
        );

        if($this->Department->save($department_info, $department_id))
        {
            //New department
            if($department_id==-1)
            {
                echo json_encode(array('success'=>true,'message'=> 'Department has been added successfully '.
                $department_info['department_name'], 'actions'=>'add'));
            }
            else //previous department
            {
                echo json_encode(array('success'=>true,'message'=>'Department has been updated successfully '.
                $department_info['department_name'], 'actions'=>'update'));
            }
        }
        else//failure
        {   
            echo json_encode(array('success'=>false,'message'=>'Department cannot added/updated with successfully '.
            $department_info['department_name'],'id'=>-1));
        }
    }

    /*
      This deletes department from the departments table
     */
    function remove() {
        $departments_to_delete = $this->input->post('checkedID');

        if ($this->Department->delete_list($departments_to_delete)) {
            echo json_encode(array('success' => true, 'message' => 'Delete successfully ' .
                count($departments_to_delete) . ' department(s)'));
        } else {
            echo json_encode(array('success' => false, 'message' => 'Deleting was error, delete was failed'));
        }
    }

}