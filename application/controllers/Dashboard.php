<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		if ($this->session->userdata('is_login') != true){
            redirect('Login');
        }
	}
	
	public function index()
	{
		$data['page'] = 'dashboard_view';
        $this->load->view('template', $data);
		//$this->load->view('dashboard_view');
	}
}
