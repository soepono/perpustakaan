<?php
class Login extends CI_Controller {
	public function __construct()
    {
		parent::__construct();
		$this->load->model('MUser');
    }

    public function index()
    {
    	$this->load->view('login_view');
    }

    function validasi()
    {
    	$username = $this->input->post('username');
    	$password = $this->input->post('password');
    	if ($this->MUser->CheckUser($username, $password) == true){
    		//echo "Echo Username dan Password Benar";
    		$row = $this->MUser->get_by_username($username);
    		//print_r($row); exit;
    		$data_user = array(
    			'username'=>$username,
    			'nama_lengkap'=>$row->nama_lengkap,
    			'hak_akses'=>$row->hak_akses,
    			'is_login'=>true,
    		);
    		$this->session->set_userdata($data_user);
    		redirect('Dashboard');
    		exit;
    	} else {
    		//echo "Echo Username dan Password Salah";
    		$this->session->set_flashdata('pesan', 'Username atau Password Anda salah');
    		redirect('Login');
    		exit;
    	}
    	//exit;
    }

    public function logout()
    {
    	$this->session->sess_destroy();
    	redirect('Login');
    }

}
?>