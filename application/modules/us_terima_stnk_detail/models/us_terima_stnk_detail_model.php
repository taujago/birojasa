<?php 

class us_terima_stnk_detail_model extends CI_Model {


	function us_terima_stnk_detail_model(){
		parent::__construct();
	}

	function data($param){
		 extract($param);

		 $kolom = array(0=>"id",
							"no_ref",
							"jumlah_berkas",
							
		 	);



		 	$this->db->select('s.*, sa.nama as nm_samsat')->from("bj_bbn_satu s");
		 	$this->db->join('samsat sa','s.id_samsat=sa.id');
		 	$this->db->where('s.pengurus_stnk', $id);		
		 	$this->db->where('s.status_stnk', 1);
		 	$this->db->order_by('s.stnk_tgl', 'desc');
		
		 
		 $tanggal_awal = flipdate($tanggal_awal);
			$tanggal_akhir = flipdate($tanggal_akhir);
		 
		if(!empty($tanggal_awal) and !empty($tanggal_akhir) ) {
		 	$this->db->where("s.stnk_tgl between '$tanggal_awal' and '$tanggal_akhir'",null,false);	 	
		 }

		 if(!empty($samsat)) {
		 	$this->db->where("s.id_samsat",$samsat);
		 }


		($param['limit'] != null ? $this->db->limit($param['limit']['end'], $param['limit']['start']) : '');
		//$this->db->limit($param['limit']['end'], $param['limit']['start']) ;
       
       ($param['sort_by'] != null) ? $this->db->order_by($kolom[$param['sort_by']], $param['sort_direction']) :'';
        
		$res = $this->db->get();
		// echo $this->db->last_query(); exit;
 		return $res;
	}

}