<?php 
class M_auth extends MY_Model {

	function auth($p){
		$query = $this->db->query("SELECT * from mosque where username='$p[username]' AND password=MD5('$p[password]')")->row_array();
		return $query;
	}

}
?>