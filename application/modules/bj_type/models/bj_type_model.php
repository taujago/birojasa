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
							
							);


		$this->db->where("id_birojasa", $birojasa);

		 $this->db->select('*')->from("m_tipe");


		 

		 if(!empty($tipe)) {
		 	$this->db->like("tipe",$tipe);
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