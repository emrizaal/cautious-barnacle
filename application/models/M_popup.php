<?php 
class M_mosque extends MY_Model {

	function getMosqueById($id){
		$query = $this->db->query("SELECT * from mosque where id_mosque = '$id'")->row_array();
		return $query;
	}

}
?>