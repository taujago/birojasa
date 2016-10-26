<?php 

class bj_type_model extends CI_Model {


	function bj_type_model(){
		parent::__construct();
	}




 function data($param)
	{		

		// show_array($param);
		// exit;

		 extract($param);

		 $kolom = array(0=>"id",
							"tipe",
							"merk"
							
							);


		$this->db->where("t.id_birojasa", $birojasa);

		 $this->db->select('t.*, m.nama as merk')->from("m_tipe t");
		 $this->db->join('m_merek m','t.id_merk=m.kode');

		 

		 if(!empty($tipe)) {
		 	$this->db->like("t.tipe",$tipe);
		 }

		 if(!empty($merk)) {
		 	$this->db->like("t.id_merk",$merk);
		 }

		($param['limit'] != null ? $this->db->limit($param['limit']['end'], $param['limit']['start']) : '');
		//$this->db->limit($param['limit']['end'], $param['limit']['start']) ;
       
       ($param['sort_by'] != null) ? $this->db->order_by($kolom[$param['sort_by']], $param['sort_direction']) :'';
        
		$res = $this->db->get();
		// echo $this->db->last_query(); exit;
 		return $res;
	}


	


}

?>