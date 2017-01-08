<?php 
class M_article extends MY_Model {

	public function getArticleById($mosque,$id){
		$query=$this->db->query("SELECT * from article where id_article='$id' AND id_mosque = '$mosque'")->row_array();
		return $query;
	}

}
?>