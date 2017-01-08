<?php 
class M_ustadz extends MY_Model {

	public function getUstadzById($mosque,$id){
		$query=$this->db->query("SELECT * from ustadz where id_ustadz='$id' AND id_mosque = '$mosque'")->row_array();
		return $query;
	}

}
?>