<?php 

class dealer_preview_model extends CI_Model {


	function dealer_preview_model(){
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
							"rp_daftar_stnk",
							'rp_daftar_bpkb',
							"rp_pajak_kendaraan",
							"rp_admin_fee",
							"ps.nama as nm_pengurus_bpkb",
							"pb.nama as nm_pengurus_stnk",
							
		 	);



		 	$this->db->select('bbn1.*, pb.nama as nm_pengurus_bpkb, ps.nama as nm_pengurus_stnk');

		 	$this->db->from("bj_bbn_satu bbn1");
		 	$this->db->join('pengguna ps','bbn1.pengurus_stnk=ps.id');
		 	$this->db->join('pengguna pb','bbn1.pengurus_bpkb=pb.id');
		 	$this->db->where('id_birojasa', $id_birojasa);
		
		 if (!empty($jenis_field) and !empty($field)) {
		 	$this->db->like($jenis_field, $field);
		 }

		 	$tanggal_awal = flipdate($tanggal_awal);
			$tanggal_akhir = flipdate($tanggal_akhir);
		 
		if(!empty($tanggal_awal) and !empty($tanggal_akhir) ) {
		 	$this->db->where("tgl_pengajuan between '$tanggal_awal' and '$tanggal_akhir'",null,false);	 	
		 }

		 
		$this->db->where("bbn1.kode_dealer",$kode_dealer);
		$this->db->where('bbn1.status_stnk', 1);
		$this->db->where('bbn1.status_bpkb', 1); 


		($param['limit'] != null ? $this->db->limit($param['limit']['end'], $param['limit']['start']) : '');
		//$this->db->limit($param['limit']['end'], $param['limit']['start']) ;
       
       ($param['sort_by'] != null) ? $this->db->order_by($kolom[$param['sort_by']], $param['sort_direction']) :'';
        
		$res = $this->db->get();
		// echo $this->db->last_query(); exit;
 		return $res;
	}



	


	


}

?>