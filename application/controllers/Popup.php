<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Popup extends MY_Controller {

  private $_table;

  public function __construct() {
    parent::__construct();
    $this->_table = "mosque";
    $this->load->model("m_mosque");
  }

  public function index(){
    $data['data']=$this->m_mosque->getMosqueById($this->session->userdata('id_mosque'));
    $this->load->view('popup',$data);
  }

  public function getPopupByIdMosque($id){
    $data=$this->m_mosque->getMosqueById($id);
    print(json_encode($data));
  }

 public function updatePopup(){
    $config['upload_path']   =   "assets/image/popup";
    $config['allowed_types'] =   "gif|jpg|jpeg|png";
    $config['max_size']      =   "5000";
    $config['max_width']     =   "1907";
    $config['max_height']    =   "1280";
    $this->load->library('upload',$config);

    $p=$this->db->escape_str($this->input->post());
    $mos=$this->m_mosque->getMosqueById($p['id_mosque']);
    if($mos['token']!=$p['token'])die();
    if(!$this->upload->do_upload('fupload')){
      //echo $this->upload->display_errors();
    }else{
      $finfo=$this->upload->data();
      $data['pic'] = $finfo['file_name'];
      $pic=$this->m_mosque->getMosqueById($p['id_mosque']);
      unlink("assets/image/popup/".$pic['popup']);
    }

    $data=array(
      'id_mosque' => $p['id_mosque'],
      'popup' => $finfo['file_name']
      );
    $res = $this->m_mosque->update($this->_table,$data,'id_mosque');
    if($res){
			print(json_encode(array('status'=>true)));
		}else{
			print(json_encode(array('status'=>false)));
		};
  }

}

?>
