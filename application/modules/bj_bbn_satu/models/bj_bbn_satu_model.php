<?php 

class bj_bbn_satu_model extends CI_Model {


	function bj_bbn_satu_model(){
		parent::__construct();
	}




 function data($param)
	{		

		// show_array($param);
		// exit;

		 extract($param);

		 $kolom = array(0=>"bbn1.id",
							"no_rangka",
							"no_faktur",
							"tgl_faktur",
							"tgl_entri",
							"bj_nama_user",
							
		 	);



		 	$this->db->select('bbn1.*, p.nama as bj_nama_user');

		 	$this->db->from("bj_bbn_satu bbn1");
		 	$this->db->join('pengguna p','bbn1.user_entri=p.id');
		 	$this->db->where('id_birojasa', $id_birojasa);
		


		 

		 if(!empty($no_rangka)) {
		 	$this->db->like("bbn1.no_rangka",$no_rangka);
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