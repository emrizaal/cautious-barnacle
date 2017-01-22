<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Mosque extends MY_Controller {

	private $_table;

	public function __construct() {
		parent::__construct();
		$this->_table = "mosque";
		$this->load->model("m_mosque");
	}

	public function index(){
		$data['data']=$this->m_mosque->getAll($this->_table);
		$this->load->view('mosque',$data);
	}

	public function mosqueList(){
		$data=$this->m_mosque->getAll($this->_table);
		print(json_encode(array('collection'=>$data)));
	}

	public function getMosqueById($id){
		$data=$this->m_mosque->getMosqueById($id);
		print(json_encode($data));
	}

	public function addMosque(){
		$this->load->view("add_mosque");
	}

	public function saveMosque(){
		$p=$this->db->escape_str($this->input->post());
		$ran=$this->randomPassword();
		$p['password'] = MD5($ran);
		$res=$this->m_mosque->insert($this->_table,$p);
		if($res)redirect("mosque");
	}

	public function deleteMosque($id){
		$p['id_mosque']=$id;
		$res=$this->m_mosque->adminDeleteById($this->_table,$p);
		if($res)redirect("mosque");
	}

	public function editMosque($id){
		$data['data']=$this->m_mosque->getMosqueById($id);
		$this->load->view("edit_mosque",$data);
	}

	public function updateMosque(){
		$config['upload_path']   =   "assets/image/mosque";
		$config['allowed_types'] =   "gif|jpg|jpeg|png";
		$config['max_size']      =   "5000";
		$config['max_width']     =   "1907";
		$config['max_height']    =   "1280";
		$this->load->library('upload',$config);
		$isUpload=0;

		$p=$this->db->escape_str($this->input->post());
		$mos=$this->m_mosque->getMosqueById($p['id_mosque']);
		if($mos['token']!=$p['token'])die();
		if(!$this->upload->do_upload('fupload')){
			//echo $this->upload->display_errors();
		}else{
			$finfo=$this->upload->data();
			$p['pic'] = $finfo['file_name'];
			$pic=$this->m_mosque->getMosqueById($p['id_mosque']);
			$isUpload=1;
		}
		$res=$this->m_mosque->adminUpdate($this->_table,$p,'id_mosque');
		if($res){
			if($isUpload==1)unlink("assets/image/mosque/".$pic['pic']);
			print(json_encode(array('status'=>true)));
		}else{
			print(json_encode(array('status'=>false)));
		};
	}

	public function detailMosque($id){
		$data['data']=$this->m_mosque->getMosqueById($id);
		$this->load->view("detail_mosque",$data);
	}

	public function editProfile($id){
		$data['data']=$this->m_mosque->getMosqueById($id);
		$this->load->view("edit_profile",$data);
	}

	public function changePassword(){
		$data['info']="";
		$this->load->view("change_password",$data);
	}

	public function savePassword(){
		$p=$this->db->escape_str($this->input->post());
		$mos=$this->m_mosque->getMosqueById($p['id_mosque']);
		if($mos['token']!=$p['token'])die();
		$res=$this->m_mosque->checkPassword($p);
		if(empty($res)){
			print(json_encode(array('status'=>false)));
		}else{
			$res2=$this->m_mosque->savePassword($p);
			if($res2)print(json_encode(array('status'=>true)));
		}

	}
}

?>
