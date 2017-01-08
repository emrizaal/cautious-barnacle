<?php 
class M_ebook extends MY_Model {

	public function getEbookById($mosque,$id){
		$query=$this->db->query("SELECT * from ebook where id_ebook='$id' AND id_mosque = '$mosque'")->row_array();
		return $query;
	}

}
?>