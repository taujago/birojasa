<?php 

class bj_bbn_satu_model extends CI_Model {


	function __construct(){
		parent::__construct();
	}

	function execute_service($url,$method,$json_data) {

  $req_url = $url."/".$method;
    $ch = curl_init();

  //set the url, number of POST vars, POST data
  curl_setopt($ch,CURLOPT_URL, $req_url);
  curl_setopt($ch,CURLOPT_POST, 1);
  curl_setopt($ch,CURLOPT_POSTFIELDS, $json_data);
  curl_setopt($ch,CURLOPT_RETURNTRANSFER,1);

  //execute post
  $result = curl_exec($ch);
  // echo $result;  
  $obj  = json_decode($result);
  $array = (array) $obj;

  $info = curl_getinfo($ch);

  $error = ($info['http_code']=="200")?false:true;
  // show_array($info);exit;
  // show_array($array); exit;
  curl_close($ch);
  return array("data"=>$array,"error"=>$error);
}

function execute_service_baru($url,$json_data) {

  $req_url = $url;
    $ch = curl_init();

  //set the url, number of POST vars, POST data
  curl_setopt($ch,CURLOPT_URL, $req_url);
  curl_setopt($ch,CURLOPT_POST, 1);
  curl_setopt($ch,CURLOPT_POSTFIELDS, $json_data);
  curl_setopt($ch,CURLOPT_RETURNTRANSFER,1);

  //execute post
  $result = curl_exec($ch);
  // echo $result; exit; 
  $obj  = json_decode($result);
  $array = (array) $obj;

  $info = curl_getinfo($ch);

  $error = ($info['http_code']=="200")?false:true;
  show_array($info);exit;
  // show_array($array); exit;
  curl_close($ch);
  return array("data"=>$array,"error"=>$error);
}


 function data($param)
	{		

		// show_array($param);
		// exit;

		 extract($param);

		 $kolom = array(0=>	"bbn1.id",
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
							'status'
							
		 	);



		 	$this->db->select('bbn1.*, pb.nama as nm_pengurus_bpkb, ps.nama as nm_pengurus_stnk');

		 	$this->db->from("bj_bbn_satu bbn1");
		 	$this->db->join('pengguna ps','bbn1.pengurus_stnk=ps.id');
		 	$this->db->join('pengguna pb','bbn1.pengurus_bpkb=pb.id');
		 	$this->db->where('id_birojasa', $id_birojasa);
		 	$this->db->order_by('bbn1.id', 'desc');
		


		 	$tanggal_awal = flipdate($tanggal_awal);
			$tanggal_akhir = flipdate($tanggal_akhir);
		 
		if(!empty($tanggal_awal) and !empty($tanggal_akhir) ) {
		 	$this->db->where("tgl_pengajuan between '$tanggal_awal' and '$tanggal_akhir'",null,false);	 	
		 }

		 if(!empty($kode_dealer)) {
		 	$this->db->like("bbn1.kode_dealer",$kode_dealer);
		 }

		 if(!empty($jenis)&&!empty($pengurus)){
		 	if($jenis=='stnk'){
		 		$this->db->where('bbn1.pengurus_stnk', $pengurus);
		 	}else if ($jenis=='bpkb') {
		 		$this->db->where('bbn1.pengurus_bpkb', $pengurus);
		 	}

		 	
		 }

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

		function datawilayah($id, $table, $condition, $nama){
		$this->db->select($nama);
		$this->db->where($id, $condition);
		$this->db->order_by($nama);
		$rs = $this->db->get($table);
		return $rs;

	}




	function biaya($data){

		extract($data);
		$this->db->where('tipe_kendaraan', $tipe_kendaraan);
		$this->db->where('tahun_kendaraan', $tahun_buat);
		$this->db->where('id_warna_tnkb', $id_warna_tnkb);
		$this->db->where('id_samsat', $id_samsat);
		$this->db->where('id_birojasa', $birojasa); 

		$rs = $this->db->get('estimasi_bbn_satu');
		return $rs;
	}


	


}

?>