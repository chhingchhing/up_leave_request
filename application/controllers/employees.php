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


if ($this->input->post('upload_profile')) {
    echo "upload_profile"; die();
} else {
    echo "string"; die();
}

        //upload image
        $config = array(
            'upload_path' => 'user_uploads/thumbnail/original/',
            'allowed_types' => 'gif|jpg|png|GIF|JPG|PNG',
            'max_size' => '20000'
        ); 
        $this->load->library('upload', $config);   
        $configThumb = array(
            'image_library' => 'gd2',
            'upload_path' => 'user_uploads/thumbnail/thumb/',
            'source_image' => '',
            'create_thumb' => TRUE,
            'maintain_ratio' => TRUE
        );
        $this->load->library('image_lib');
        $files = $_FILES;
        $cpt = count($_FILES['upload_profile']['name']); 
        // for ($i = 0; $i < $cpt; $i++) {
            $_FILES['upload_profile']['name'] = str_replace(" ", "_", $files['upload_profile']['name']);
            $_FILES['upload_profile']['name'] = str_replace("-", "_", $files['upload_profile']['name']);
            //$_FILES['txt_photo']['name'] = $files['txt_photo']['name'];
            $_FILES['upload_profile']['tmp_name'] = $files['upload_profile']['tmp_name'];
            $_FILES['upload_profile']['type'] = $files['upload_profile']['type'];
            $_FILES['upload_profile']['size'] = $files['upload_profile']['size'];     
            if ($this->upload->do_upload('upload_profile')) {

                if (file_exists ($config['upload_path']. $_FILES['upload_profile']['name'] )) {
                    $image = $this->upload->data();
                    $image = $_FILES['upload_profile']['name'];
                    $data = $this->upload->data();
                    if($data['is_image'] == 1) {
                        //Replace string URL of full_path upload
                        $data['full_path'] = str_replace('original', 'thumb', $data['full_path']);
                        $configThumb['source_image'] = $data['full_path'];
                       // var_dump( $configThumb['source_image']); die();
                        $this->image_lib->initialize($configThumb);
                        $this->image_lib->resize();
                        //Get last element of string
                        $last_start = strrpos($data['full_path'], '/');
                        if($last_start !== false) {
                          $last_field = substr($data['full_path'], $last_start);
                        } else {
                          $last_field = $data['full_path'];
                        }
                        // Get the name of gallery
                        $image = ltrim ($last_field, '/');  //remove first character of string
                    }
                    if ($image != "") {
                        $this->resize_image($config['upload_path'], $image, 150, 300);
                    }
                    // $image[$i] = $this->random(5).'-'.$image[$i];
                } else {
                   //  var_dump($config['upload_path']); die();
                    $image = $this->upload->data();
                    $image = $_FILES['upload_profile']['name'];
                   // var_dump($image[$i]);
                    if ($image != "") {
                        $this->resize_image($config['upload_path'], $image, 150, 300);
                    }
                }
            /* End of uploading */
            } else {
                $image = '';
            }
        // }
  
     // $result = $this->mod_gallery->add_galleries($image);
    // var_dump($result); die();

  /*if ($result>0) { //show message, already exist  
  $this->session->set_userdata('create', show_message('Your data input was successfully.', 'success'));
  //redirect('gallery/list_record');
  redirect('gallery/view_galleries/'.$result);
    }*/


var_dump($image); die();


        if ($image == "") {
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
        } else {
            $user_profile_data = array(
                'first_name'=>$this->input->post('first_name'),
                'last_name'=>$this->input->post('last_name'),
                'email'=>$this->input->post('email'),
                'gender'=>$this->input->post('gender'),
                'address'=>$this->input->post('address'),
                'phone1'=>$this->input->post('phone1'),
                'phone2'=>$this->input->post('phone2'),
                'dob'=>$this->input->post('dob'),
                'photo' => $image
            );
        }
        
        
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
