<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Dashboard extends CI_Controller {

	/**
	 * Index Page for this controller.
	 */
	public function index()
	{
		$datas['title'] = "Welcome ~ UP Leave Request";
		$this->load->view('dashboard', $datas);
	}
}

/* End of file dashboard.php */
/* Location: ./application/controllers/dashboard.php */