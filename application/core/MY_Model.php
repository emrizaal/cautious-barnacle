<?php
class MY_Model extends CI_Model {


	function getAll($table){
		$query = $this->db->get($table)->result_array();
		return $query;
	}

	function getAllByIdMosque($table,$key,$id){
		$query = $this->db->query("SELECT * from $table where $key = '$id'")->result_array();
		return $query;
	}

	function insert($table,$data){
		$query = $this->db->insert($table,$data);
		return $query;
	}

	function deleteById($table,$data,$id_mosque){
		$data['id_mosque']=$id_mosque;
		$query = $this->db->delete($table,$data);
		return $query;
	}

	function update($table,$data,$key){
		$this->db->where('id_mosque',$data['id_mosque']);
		$this->db->where($key,$data[$key]);
		$query = $this->db->update($table,$data);
		return $query;
	}

	function adminDeleteById($table,$data){
		$query = $this->db->delete($table,$data);
		return $query;
	}

	function adminUpdate($table,$data,$key){
		$this->db->where($key,$data[$key]);
		$query = $this->db->update($table,$data);
		return $query;
	}

}
?>
