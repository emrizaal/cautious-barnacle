<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Ustadz extends MY_Controller {

	private $_table;

	public function __construct() {
		parent::__construct();
		$this->_table = "ustadz";
		$this->load->model("m_ustadz");
		$this->load->model("m_mosque");
	}

	public function index(){
		$data['data']=$this->m_ustadz->getAllByIdMosque($this->_table,'id_mosque',$this->session->userdata('id_mosque'));
		$this->load->view('ustadz',$data);
	}

	public function getUstadzById($id_mosque,$id){
		$data=$this->m_ustadz->getUstadzById($id_mosque,$id);
		print(json_encode($data));
	}

	public function getAllUstadzByIdMosque($id){
		$data=$this->m_ustadz->getAllByIdMosque($this->_table,'id_mosque',$id);
		print(json_encode($data));
	}

	public function addUstadz(){
		$this->load->view('add_ustadz');
	}

	public function saveUstadz(){
		$config['upload_path']   =   "assets/image/ustadz";
		$config['allowed_types'] =   "gif|jpg|jpeg|png";
		$config['max_size']      =   "5000";
		$config['max_width']     =   "1907";
		$config['max_height']    =   "1280";
		$this->load->library('upload',$config);

		if(!$this->upload->do_upload('fupload')){
			//echo $this->upload->display_errors();
		}else{
			$finfo=$this->upload->data();
		}

		$p=$this->db->escape_str($this->input->post());
		$mos=$this->m_mosque->getMosqueById($p['id_mosque']);
		if($mos['token']!=$p['token'])die();
		$data=array(
			'id_mosque' => $p['id_mosque'],
			'name' => $p['name'],
			'description' => $p['description'],
			'pic' => $finfo['file_name']
			);
		$res = $this->m_ustadz->insert($this->_table,$data);
		if($res){
			print(json_encode(array('status'=>true)));
		}else{
			print(json_encode(array('status'=>false)));
		};
	}

	public function deleteUstadz($id,$token,$id_mosque){
		$mos=$this->m_mosque->getMosqueById($id_mosque);
		if($mos['token']!=$token)die();
		$data=$this->m_ustadz->getUstadzById($id_mosque,$id);
		$res=$this->m_ustadz->deleteById($this->_table,array('id_ustadz'=>$id),$id_mosque);
		if($res){
			if(!empty($data['pic']))unlink("assets/image/ustadz/".$data['pic']);
				print(json_encode(array('status'=>true)));
		}else{
				print(json_encode(array('status'=>false)));
		}
	}

	public function detailUstadz($id){
		$data['data']=$this->m_ustadz->getUstadzById($this->session->userdata('id_mosque'),$id);
		$this->load->view("detail_ustadz",$data);
	}

	public function editUstadz($id){
		$data['data']=$this->m_ustadz->getUstadzById($this->session->userdata('id_mosque'),$id);
		$this->load->view("edit_ustadz",$data);
	}

	public function updateUstadz(){
		$config['upload_path']   =   "assets/image/ustadz";
		$config['allowed_types'] =   "gif|jpg|jpeg|png";
		$config['max_size']      =   "5000";
		$config['max_width']     =   "1907";
		$config['max_height']    =   "1280";
		$this->load->library('upload',$config);

		$p=$this->db->escape_str($this->input->post());
		$mos=$this->m_mosque->getMosqueById($p['id_mosque']);
		if($mos['token']!=$p['token'])die();
		$data=array(
			'id_ustadz' =>$p['id_ustadz'],
			'name' => $p['name'],
			'description' => $p['description'],
			'id_mosque'=> $p['id_mosque']
			);
		if(!$this->upload->do_upload('fupload')){
			//echo $this->upload->display_errors();
		}else{
			$finfo=$this->upload->data();
			$data['pic'] = $finfo['file_name'];
			$pic=$this->m_ustadz->getUstadzById($p['id_mosque'],$p['id_ustadz']);
			unlink("assets/image/ustadz/".$pic['pic']);
		}

		$res = $this->m_ustadz->update($this->_table,$data,'id_ustadz');
		if($res){
			print(json_encode(array('status'=>true)));
		}else{
			print(json_encode(array('status'=>false)));
		}
	}

}

?>
