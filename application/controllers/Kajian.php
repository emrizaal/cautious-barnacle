<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Kajian extends MY_Controller {

	private $_table;

	public function __construct() {
		parent::__construct();
		$this->_table = "kajian";
		$this->load->model("m_kajian");
		$this->load->model("m_mosque");
	}

	public function index(){
		$data['data']=$this->m_kajian->getAllKajianByIdMosque($this->session->userdata('id_mosque'));
		$this->load->view('kajian',$data);
	}

	public function mostPopularKajianList(){
		$data=$this->m_kajian->mostPopularKajianList();
		print(json_encode(array('collection'=>$data)));
	}

	public function newestKajianList(){
		$data=$this->m_kajian->newestKajianList();
		print(json_encode(array('collection'=>$data)));
	}

	public function subscribedList($id){
		$data=$this->m_kajian->subscribedList($id);
		print_r($data);
		//print(json_encode(array('collection'=>$data)));
	}

	public function getAllKajianByIdMosque($id){
		$data=$this->m_kajian->getAllKajian($id);
		print(json_encode(array('collection'=>$data)));
	}

	public function getKajianById($id_mosque,$id){
		$data=$this->m_kajian->getKajianById($id_mosque,$id);
		print(json_encode($data));
	}

	public function addKajian(){
		$data['ustadz']=$this->m_kajian->getAllByIdMosque('ustadz','id_mosque',$this->session->userdata('id_mosque'));
		$this->load->view('add_kajian',$data);
	}

	public function saveKajian(){
		$config['upload_path']   =   "assets/image/kajian";
		$config['allowed_types'] =   "gif|jpg|jpeg|png";
		$config['max_size']      =   "5000";
		$config['max_width']     =   "1907";
		$config['max_height']    =   "1280";
		$this->load->library('upload',$config);

		$finfo['file_name'] = "";
		$fattachment['file_name'] = "";

		if(!$this->upload->do_upload('fupload')){
			//echo $this->upload->display_errors();
		}else{
			$finfo=$this->upload->data();
		}

		if(!$this->upload->do_upload('attachment')){
		//	echo $this->upload->display_errors();
		}else{
			$fattachment=$this->upload->data();
		}

		$p=$this->db->escape_str($this->input->post());
		$mos=$this->m_mosque->getMosqueById($p['id_mosque']);
		if($mos['token']!=$p['token'])die();
		$link = strtolower($p['name']);
		$link  = str_replace(' ', '-', $link);
		$data=array(
			'id_ustadz' => $p['ustadz'],
			'id_mosque' => $p['id_mosque'],
			'name' => $p['name'],
			'description' => $p['description'],
			'place' => $p['place'],
			'date' => $p['date'],
			'time_start' => $p['time_start'],
			'time_end' => $p['time_end'],
			'url' => $link,
			'pic' => $finfo['file_name'],
			'attachment' => $fattachment['file_name']
		);
		$res = $this->m_kajian->insert($this->_table,$data);
		if($res){
			print(json_encode(array('status'=>true)));
		}else{
			print(json_encode(array('status'=>false)));
		};
	}

	public function editKajian($id){
		$data['ustadz']=$this->m_kajian->getAllByIdMosque('ustadz','id_mosque',$this->session->userdata('id_mosque'));
		$data['data']=$this->m_kajian->getKajianById($this->session->userdata('id_mosque'),$id);
		if(empty($data['data'])){
			redirect("kajian");
		}else{
			$this->load->view('edit_kajian',$data);
		}
	}

	public function updateKajian(){
		$config['upload_path']   =   "assets/image/kajian";
		$config['allowed_types'] =   "gif|jpg|jpeg|png";
		$config['max_size']      =   "5000";
		$config['max_width']     =   "1907";
		$config['max_height']    =   "1280";
		$this->load->library('upload',$config);
		$pic=0;
		$attachment=0;
		$p=$this->db->escape_str($this->input->post());
		$mos=$this->m_mosque->getMosqueById($p['id_mosque']);
		if($mos['token']!=$p['token'])die();
		$kajian=$this->m_kajian->getKajianById($p['id_mosque'],$p['id_kajian']);

		$link = strtolower($p['name']);
		$link  = str_replace(' ', '-', $link);
		$data=array(
			'id_kajian' => $p['id_kajian'],
			'id_ustadz' => $p['ustadz'],
			'id_mosque' => $p['id_mosque'],
			'name' => $p['name'],
			'description' => $p['description'],
			'place' => $p['place'],
			'date' => $p['date'],
			'time_start' => $p['time_start'],
			'time_end' => $p['time_end'],
			'url' => $link
		);


		if(!$this->upload->do_upload('fupload')){
		//	echo $this->upload->display_errors();
		}else{
			$finfo=$this->upload->data();
			$data['pic'] = $finfo['file_name'];
			$pic=1;
		}

		if(!$this->upload->do_upload('attachment')){
		//	echo $this->upload->display_errors();
		}else{
			$fattachment=$this->upload->data();
			$data['attachment'] = $fattachment['file_name'];
			$attachment=1;
		}

		$res = $this->m_kajian->update($this->_table,$data,'id_kajian');

		if($res){
			if($pic==1)unlink("assets/image/kajian/".$kajian['pic']);
			if($attachment==1)unlink("assets/image/kajian/".$kajian['attachment']);
			print(json_encode(array('status'=>true)));
		}else{
			print(json_encode(array('status'=>false)));
		};
	}

	function deleteKajian($id,$token,$id_mosque){
		$mos=$this->m_mosque->getMosqueById($id_mosque);
		if($mos['token']!=$token)die();
		$data=$this->m_kajian->getKajianById($id_mosque,$id);
		$res= $this->m_kajian->deleteById($this->_table,array('id_kajian'=>$id),$id_mosque);
		if($res){
			if(!empty($data['pic']))unlink("assets/image/kajian/".$data['pic']);
			if(!empty($data['attachment']))unlink("assets/image/kajian/".$data['attachment']);
			print(json_encode(array('status'=>true)));
		}else{
			print(json_encode(array('status'=>false)));
		};
	}

	function detailKajian($id){
		$data['data']=$this->m_kajian->getKajianById($this->session->userdata('id_mosque'),$id);
		$this->load->view("detail_kajian",$data);
	}

}

?>
