<?php 

class bj_es_bbn_satu_model extends CI_Model {


	function bj_es_bbn_satu_model(){
		parent::__construct();
	}




 function data($param)
	{		

		// show_array($param);
		// exit;

		 extract($param);

		 $kolom = array(0=>"bbn1.id",
							"nm_tipe",
							"tahun_kendaraan",
							"warna_tnkb",
							"nm_samsat",
							"nm_polda",
							
		 	);


		 	$this->db->where('bbn1.id_birojasa', $birojasa);
		 	$this->db->select('bbn1.*, polda.polda_nama as nm_polda, s.nama as nm_samsat, w.warna_tnkb as warna_tnkb, t.tipe as nm_tipe');

		 	$this->db->from("estimasi_bbn_satu bbn1");
		 	$this->db->join('m_polda polda','bbn1.id_polda=polda.polda_id');
		 	$this->db->join('samsat s', 'bbn1.id_samsat = s.id');
		 	$this->db->join('m_tipe t', 'bbn1.tipe_kendaraan = t.id');
		 	$this->db->join('m_warna_tnkb w', 'bbn1.id_warna_tnkb = w.id_warna_tnkb','left');

			


		 

		 if(!empty($tipe_kendaraan)) {
		 	$this->db->like("bbn1.tipe_kendaraan",$tipe_kendaraan);
		 }

		($param['limit'] != null ? $this->db->limit($param['limit']['end'], $param['limit']['start']) : '');
		//$this->db->limit($param['limit']['end'], $param['limit']['start']) ;
       
       ($param['sort_by'] != null) ? $this->db->order_by($kolom[$param['sort_by']], $param['sort_direction']) :'';
        
		$res = $this->db->get();
		// echo $this->db->last_query(); exit;
 		return $res;
	}




        function arr_pilih_polda(){
                

                $ret = array();
                $ret = array('' => '- Pilih Polda Terlebih Dahulu -', );
                
                return $ret;

        }
	


}

?>