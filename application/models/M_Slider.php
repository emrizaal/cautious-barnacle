<?php 
class M_slider extends MY_Model {

	public function getSliderById($mosque,$id){
		$query=$this->db->query("SELECT * from slider where id_slider='$id' AND id_mosque = '$mosque'")->row_array();
		return $query;
	}

}
?>