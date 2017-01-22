<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Auth extends MY_Controller {

	private $_table;

	public function __construct() {
		parent::__construct();
		$this->_table = "mosque";
		$this->load->model("m_auth");
	}

	public function index(){
		$this->load->view('login');
	}

	public function auth(){
		$p=$this->input->post();
		$res=$this->m_auth->auth($p);
		if($res){
			print(json_encode(array('status'=>true,'data'=>$res)));
		}else{
			print(json_encode(array('status'=>false)));
		}
	}

	public function logout(){
		$this->session->sess_destroy();
		redirect("auth");
	}

}

?>
