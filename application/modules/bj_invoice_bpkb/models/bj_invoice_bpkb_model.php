<?php 

class bj_invoice_bpkb_model extends CI_Model {


	function bj_invoice_bpkb_model(){
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
		 	$this->db->where('id_birojasa', $id_birojasa);
		 	$this->db->where('status_bpkb', 1);	
		 	$this->db->where('bpkb_serah_dealer', 0);	
		 	$this->db->order_by('tgl_pengajuan', 'desc');
		
		 
		

		 if(!empty($dealer)) {
		 	$this->db->where("kode_dealer",$dealer);
		 }else{
		 	$this->db->where("kode_dealer", 'xxxxx');
		 }


		($param['limit'] != null ? $this->db->limit($param['limit']['end'], $param['limit']['start']) : '');
		//$this->db->limit($param['limit']['end'], $param['limit']['start']) ;
       
       ($param['sort_by'] != null) ? $this->db->order_by($kolom[$param['sort_by']], $param['sort_direction']) :'';
        
		$res = $this->db->get();
		// echo $this->db->last_query(); exit;
 		return $res;
	}



	function cekbiaya($id){
		$this->db->select('bayar_jumlah_bpkb')->from("bj_bbn_satu");
		$this->db->where('id', $id);


		$res = $this->db->get()->row_array();
		return $res;
	}

		


	


}

?>