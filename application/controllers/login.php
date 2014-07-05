<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Login extends CI_Controller {

	/**
	 * Index Page for this controller.
	 */
	public function index()
	{
		$datas = array();
		$datas['title'] = "Login Application";
		if($this->Employee->is_logged_in())		//Model employee
		{
			redirect('dashboard');
		}
		else
		{
			$this->form_validation->set_rules('email', 'Email', 'callback_login_check');
    	    $this->form_validation->set_error_delimiters('<div class="error">', '</div>');
			
			if($this->form_validation->run() == FALSE)
			{
				$this->load->view('login',$datas);
			}
			else
			{
				redirect('dashboard');
			}
		}
	}

	function login_check($username)
	{
		$password = $this->input->post("password");	
		
		if(!$this->Employee->login($username,$password))
		{
			$this->form_validation->set_message('login_check', 'Invalid username/password');
			return false;
		}
		return true;		
	}

	function logout() {
		$this->Employee->logout();
	}

}

/* End of file login.php */
/* Location: ./application/controllers/login.php */