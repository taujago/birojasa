<?php 

class bj_invoice_bpkb_detail_model extends CI_Model {


	function bj_invoice_bpkb_detail_model(){
		parent::__construct();
	}

	function data($param){
		 extract($param);

		 $kolom = array(0=>"id",
							"no_ref",
							"jumlah_berkas",
							
		 	);



		 	$this->db->select('s.*, d.nama as nm_dealer')->from("invoice_bpkb s");
		 	$this->db->join('dealer d','s.id_dealer=d.id');
		 	$this->db->where('s.id_birojasa', $birojasa);		
		 	$this->db->order_by('s.tanggal', 'desc');
		
		 
		 $tanggal_awal = flipdate($tanggal_awal);
			$tanggal_akhir = flipdate($tanggal_akhir);
		 
		if(!empty($tanggal_awal) and !empty($tanggal_akhir) ) {
		 	$this->db->where("s.tanggal between '$tanggal_awal' and '$tanggal_akhir'",null,false);	 	
		 }

		 if(!empty($dealer)) {
		 	$this->db->where("s.id_dealer", $dealer);
		 }


		($param['limit'] != null ? $this->db->limit($param['limit']['end'], $param['limit']['start']) : '');
		//$this->db->limit($param['limit']['end'], $param['limit']['start']) ;
       
       ($param['sort_by'] != null) ? $this->db->order_by($kolom[$param['sort_by']], $param['sort_direction']) :'';
        
		$res = $this->db->get();
		// echo $this->db->last_query(); exit;
 		return $res;
	}

}