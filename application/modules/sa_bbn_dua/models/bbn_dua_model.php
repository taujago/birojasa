<?php 

class bbn_dua_model extends CI_Model {


	function bbn_satu_model(){
		parent::__construct();
	}




 function data($param)
	{		

		// show_array($param);
		// exit;

		 extract($param);

		 $kolom = array(0=>"id",
							"tipe_kendaraan",
							"tahun_kendaraan",
							"warna_tnkb",
							"samsat",
							"polda",
							
		 	);


		

		 $this->db->select('*')->from("estimasi_bbn_dua");


		 

		 if(!empty($tipe_kendaraan)) {
		 	$this->db->like("tipe_kendaraan",$tipe_kendaraan);
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