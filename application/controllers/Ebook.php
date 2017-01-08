<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Ebook extends MY_Controller {

	private $_table;

	public function __construct() {
		parent::__construct();
		$this->_table = "ebook";
		$this->load->model("m_ebook");
		$this->load->model("m_mosque");
	}

	public function index(){
		$data['data']=$this->m_ebook->getAllByIdMosque($this->_table,'id_mosque',$this->session->userdata('id_mosque'));
		$this->load->view('ebook',$data);
	}

	public function getAllEbookByIdMosque($id){
		$data=$this->m_ebook->getAllByIdMosque($this->_table,'id_mosque',$id);
		print(json_encode($data));
	}

	public function getEbookById($id_mosque,$id){
		$data=$this->m_ebook->getEbookById($id_mosque,$id);
		print(json_encode($data));
	}

	public function addEbook(){
		$this->load->view('add_ebook');
	}

	public function saveEbook(){
		$config['upload_path']   =   "assets/image/ebook";
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
			'title' => $p['title'],
			'description' => $p['description'],
			'url' => $p['url'],
			'pic' => $finfo['file_name']
			);
		$res = $this->m_ebook->insert($this->_table,$data);
		if($res){
			print(json_encode(array('status'=>true)));
		}else{
			print(json_encode(array('status'=>false)));
		};
	}

	public function deleteEbook($id,$token,$id_mosque){
		$mos=$this->m_mosque->getMosqueById($id_mosque);
		if($mos['token']!=$token)die();
		$data=$this->m_ebook->getEbookById($id_mosque,$id);
		$res = $this->m_ebook->deleteById($this->_table,array('id_ebook'=>$id),$id_mosque);
		if($res){
			if(!empty($data['pic']))unlink("assets/image/ebook/".$data['pic']);
			print(json_encode(array('status'=>true)));
		}else{
			print(json_encode(array('status'=>false)));
		}

	}

	public function detailEbook($id){
		$data['data']=$this->m_ebook->getEbookById($this->session->userdata('id_mosque'),$id);
		$this->load->view("detail_ebook",$data);
	}

	public function editEbook($id){
		$data['data']=$this->m_ebook->getEbookById($this->session->userdata('id_mosque'),$id);
		$this->load->view("edit_ebook",$data);
	}

	public function updateEbook(){
		$config['upload_path']   =   "assets/image/ebook";
		$config['allowed_types'] =   "gif|jpg|jpeg|png";
		$config['max_size']      =   "5000";
		$config['max_width']     =   "1907";
		$config['max_height']    =   "1280";
		$this->load->library('upload',$config);

		$p=$this->db->escape_str($this->input->post());
		$mos=$this->m_mosque->getMosqueById($p['id_mosque']);
		if($mos['token']!=$p['token'])die();
		$data=array(
			'id_ebook' =>$p['id_ebook'],
			'id_mosque' => $p['id_mosque'],
			'title' => $p['title'],
			'description' => $p['description'],
			'url' => $p['url']
			);
		if(!$this->upload->do_upload('fupload')){
			//echo $this->upload->display_errors();
		}else{
			$finfo=$this->upload->data();
			$data['pic'] = $finfo['file_name'];
			$pic=$this->m_ebook->getEbookById($p['id_mosque'],$p['id_ebook']);
		}

		$res = $this->m_ebook->update($this->_table,$data,'id_ebook');
		if($res){
			if(!empty($pic))unlink("assets/image/ebook/".$pic['pic']);;
			print(json_encode(array('status'=>true)));
		}else{
			print(json_encode(array('status'=>false)));
		};
	}

}

?>
