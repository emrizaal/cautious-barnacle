<?php
class M_kajian extends MY_Model {

	function getAllKajian($id){
		$query=$this->db->query("SELECT kajian.*,ustadz.name as ustadz,
			(SELECT count(id_member) from attend where attend.id_kajian = kajian.id_kajian) as attendance
			from kajian,ustadz where kajian.id_ustadz = ustadz.id_ustadz AND kajian.id_mosque = '$id'")->result_array();
		return $query;
	}

	function getKajianById($mosque,$id){
		$query=$this->db->query("SELECT kajian.*,ustadz.name as ustadz from kajian,ustadz where kajian.id_mosque = '$mosque' AND kajian.id_kajian = '$id'")->row_array();
		return $query;
	}

	function mostPopularKajianList(){
		$query=$this->db->query("SELECT kajian.*,ustadz.name as ustadz,
			(SELECT count(id_member) from attend where attend.id_kajian = kajian.id_kajian) as attendance
			from kajian,ustadz where kajian.id_ustadz = ustadz.id_ustadz ORDER BY attendance DESC")->result_array();
		return $query;
	}

	function newestKajianList(){
		$query=$this->db->query("SELECT kajian.*,ustadz.name as ustadz,
			(SELECT count(id_member) from attend where attend.id_kajian = kajian.id_kajian) as attendance
			from kajian,ustadz where kajian.id_ustadz = ustadz.id_ustadz ORDER BY kajian.id_kajian DESC")->result_array();
			return $query;
	}

	function subscribedList($id){
		$query=$this->db->query("SELECT kajian.*,ustadz.name as ustadz,
			(SELECT count(id_member) from attend where attend.id_kajian = kajian.id_kajian) as attendance
			from kajian,ustadz,subscribe where kajian.id_ustadz = ustadz.id_ustadz AND kajian.id_mosque = subscribe.id_mosque AND subscribe.id_member = '$id' ORDER BY kajian.id_kajian DESC")->result_array();
			return $query;
	}
}
?>
