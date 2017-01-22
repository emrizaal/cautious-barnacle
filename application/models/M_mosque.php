<?php
class M_mosque extends MY_Model {

	function getMosqueById($id){
		$query = $this->db->query("SELECT * from mosque where id_mosque = '$id'")->row_array();
		return $query;
	}

	function checkPassword($p){
		$query = $this->db->query("SELECT * from mosque where password = md5('$p[old]')")->row_array();
		return $query;
	}

	function savePassword($p){
		$id=$p['id_mosque'];
		$query = $this->db->query("UPDATE mosque set password = md5('$p[new]') where id_mosque = '$id'");
		return $query;
	}

}
?>
