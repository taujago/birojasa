<?php 

class us_serah_bpkb_model extends CI_Model {


	function us_serah_bpkb_model(){
		parent::__construct();
	}




 function get_data($param)
	{		

		// show_array($param);
		// exit;

		 extract($param);

		 $kolom = array(0=>"id",
							"no_rangka",
							"no_mesin",
							"no_faktur",
							"nama_pemilik",
							"rp_daftar_bpkb"
							
		 	);



		 	$this->db->select('*')->from("bj_bbn_satu");
		 	$this->db->where('pengurus_bpkb', $user_id);
		 	$this->db->where('bpkb_serah_polda', 0);		
		 	$this->db->order_by('tgl_pengajuan', 'desc');
		
		 
		

		 if(!empty($polda)) {
		 	$this->db->where("id_polda",$polda);
		 }else{
		 	$this->db->where("id_polda", 'xxxxx');
		 }


		($param['limit'] != null ? $this->db->limit($param['limit']['end'], $param['limit']['start']) : '');
		//$this->db->limit($param['limit']['end'], $param['limit']['start']) ;
       
       ($param['sort_by'] != null) ? $this->db->order_by($kolom[$param['sort_by']], $param['sort_direction']) :'';
        
		$res = $this->db->get();
		// echo $this->db->last_query(); exit;
 		return $res;
	}


 function data($param)
	{		
		extract($param);

		 	$this->db->select('*')->from("bj_bbn_satu");
		 	$this->db->where('pengurus_bpkb', $id);
		 	$this->db->where('bpkb_serah_polda', 0);		
		 	$this->db->order_by('tgl_pengajuan', 'desc');

		 
        
		$res = $this->db->get()->result_array();
		 return $res;
	}


	function cekbiaya($id){
		$this->db->select('rp_daftar_bpkb')->from("bj_bbn_satu");
		$this->db->where('id', $id);


		$res = $this->db->get()->row_array();
		return $res;
	}

		


	


}

?>