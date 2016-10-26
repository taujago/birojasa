<?php 

class bj_merk_model extends CI_Model {


	function bj_merk_model(){
		parent::__construct();
	}




 function data($param)
	{		

		// show_array($param);
		// exit;

		 extract($param);

		 $kolom = array(0=>"kode",
							"nama",
							
							);


		$this->db->where("id_birojasa", $birojasa);

		 $this->db->select('*')->from("m_merek");


		 

		 if(!empty($merk)) {
		 	$this->db->like("nama",$merk);
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