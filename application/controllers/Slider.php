<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Slider extends MY_Controller {

	private $_table;

	public function __construct() {
		parent::__construct();
		$this->_table = "slider";
		$this->load->model("m_slider");
		$this->load->model("m_mosque");
	}

	public function index(){
		$data['data']=$this->m_slider->getAllByIdMosque($this->_table,'id_mosque',$this->session->userdata('id_mosque'));
		$this->load->view('slider',$data);
	}

	public function getAllSliderByIdMosque($id){
		$data=$this->m_slider->getAllByIdMosque($this->_table,'id_mosque',$id);
		print(json_encode($data));
	}

	public function saveslider(){
		$config['upload_path']   =   "assets/image/slider";
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
			'pic' => $finfo['file_name'],
			'status' => $p['status']
			);
		$res = $this->m_slider->insert($this->_table,$data);
		if($res){
			print(json_encode(array('status'=>true)));
		}else{
			print(json_encode(array('status'=>false)));
		};
	}

	public function deleteslider($id,$token,$id_mosque){
		$mos=$this->m_mosque->getMosqueById($id_mosque);
		if($mos['token']!=$token)die();
		$data=$this->m_slider->getsliderById($id_mosque,$id);
		$res = $this->m_slider->deleteById($this->_table,array('id_slider'=>$id),$id_mosque);
		if($res){
			if(!empty($data['pic']))unlink("assets/image/slider/".$data['pic']);
			print(json_encode(array('status'=>true)));
		}else{
			print(json_encode(array('status'=>false)));
		}
	}

	public function updateStatus(){
		$p=$this->db->escape_str($this->input->post());
		$mos=$this->m_mosque->getMosqueById($p['id_mosque']);
		if($mos['token']!=$p['token'])die();
		$data=array(
			'id_mosque' => $p['id_mosque'],
			'id_slider' =>$p['id_slider'],
			'status' => $p['status']
			);
		$res = $this->m_slider->update($this->_table,$data,'id_slider');
		if($res){
			print(json_encode(array('status'=>true)));
		}else{
			print(json_encode(array('status'=>false)));
		};
	}
}

?>
