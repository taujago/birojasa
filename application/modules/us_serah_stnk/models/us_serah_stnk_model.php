<?php 

class us_serah_stnk_model extends CI_Model {


	function us_serah_stnk_model(){
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
		 	$this->db->where('pengurus_stnk', $user_id);
		 	$this->db->where('stnk_serah_samsat', 0);		
		 	$this->db->order_by('tgl_pengajuan', 'desc');
		
		 
		

		 if(!empty($samsat)) {
		 	$this->db->where("id_samsat",$samsat);
		 }else{
		 	$this->db->where("id_samsat", 'xxxxx');
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
		 	$this->db->where('pengurus_stnk', $id);
		 	$this->db->where('status_stnk', 0);		
		 	$this->db->order_by('tgl_pengajuan', 'desc');

		 
        
		$res = $this->db->get()->result_array();
		 return $res;
	}


	function cekbiaya($id){
		$this->db->select('rp_daftar_stnk')->from("bj_bbn_satu");
		$this->db->where('id', $id);


		$res = $this->db->get()->row_array();
		return $res;
	}

		


	


}

?>