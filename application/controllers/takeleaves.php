<?php
if ( ! defined("BASEPATH") ) exit ("No direct script access allowed");
/**
* Taking leave request
*/
class Takeleaves extends CI_Controller
{
	
	function __construct()
	{
		parent::__construct();
	}
	public function index()
	{
		$datas['title'] = "Takeleave Management";
		$datas['controller_name'] = strtolower(get_class());
		// var_dump($datas['controller_name']); die();
        $datas['records'] = $this->Takeleave->get_all();
        // var_dump($datas['records']); die();
		$this->load->view("takeleaves/index", $datas);
	}
	/*
      Inserts/updates an leave  request
     */
   
	public function edit($take_id) {
        $datas['title'] = "Edit Takeleave";
        $datas['controller_name'] = strtolower(get_class());
        $datas['take_info'] = $this->Takeleave->get_info($take_id);

        $this->load->view("takeleaves/form", $datas);
    }

    public function create($take_id = -1) {
        $datas['title'] = "New Takeleave";
        $datas['controller_name'] = strtolower(get_class());
        $datas['take_info'] = $this->Takeleave->get_info($take_id);

        $this->load->view("takeleaves/form", $datas);
    }
    function save($take_id=-1)
    {
        $takeleave_info = array(
            'approved_by'=>$this->input->post('manager_mail'),
            'start_date'=>$this->input->post('start_date'),
            'end_date'=>$this->input->post('end_date'),
            'content'=>$this->input->post('reason'), 
        );

        if($this->Takeleave->save($takeleave_info, $take_id))
        {
            //New department
            if($take_id==-1)
            {
                echo json_encode(array('success'=>true,'message'=> 'Department has been added successfully '.
                $takeleave_info['approved_by'], 'actions'=>'add'));
            }
            else //previous department
            {
                echo json_encode(array('success'=>true,'message'=>'Department has been updated successfully '.
                $department_info['approved_by'], 'actions'=>'update'));
            }
        }
        else//failure
        {   
            echo json_encode(array('success'=>false,'message'=>'Department cannot added/updated with successfully '.
            $takeleave_info['approved_by'],'id'=>-1));
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

