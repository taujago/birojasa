<?php 
class bj_invoice_stnk extends biro_jasa_controller{
	var $controller;
	function bj_invoice_stnk(){
		parent::__construct();

		$this->controller = get_class($this);
		$this->load->model('bj_invoice_stnk_model','dm');
        $this->load->model("coremodel","cm");
        $this->load->helper("tanggal");
		
		//$this->load->helper("serviceurl");
		
	}



	function index(){
		

        $data_array=array();

        $userdata = $this->session->userdata('bj_login');
        // show_array($userdata);
        // exit();
        $id_birojasa = $userdata['birojasa_id'];
        $data_array['arr_dealer'] = $this->cm->arr_dropdown4("dealer", "id", "nama", $id_birojasa);

        // $data_array['data'] = $data;



		$content = $this->load->view($this->controller."_view",$data_array,true);


		$this->set_subtitle("Invoice STNK");
		$this->set_title("Invoice");
		$this->set_content($content);
		$this->cetak();
}

function cekbiaya(){
    $post = $this->input->post();

    $biaya = 0;

    if(!empty($post['data'])){
    
    foreach ($post['data'] as $key => $value) {
        $check = $this->dm->cekbiaya($value);
        $biaya = $biaya + $check['bayar_jumlah_stnk'];
        
         }
    }
    
    echo json_encode($biaya);
 }



 function simpan(){
    $post = $this->input->post();
    $userdata = $this->session->userdata('bj_login');
    extract($post);
    unset($post['serah_bpkb_length']);	
    // show_array($post);
    // exit();

    $this->load->library('form_validation');
    $this->form_validation->set_rules('kode_dealer','Pilih Dealer','required');
    $this->form_validation->set_rules('dibuat','Penerima','required');
    $this->form_validation->set_rules('diterima','Pembuat','required');
    $this->form_validation->set_message('required', ' %s Harus diisi ');
    $this->form_validation->set_error_delimiters('', '<br>');
if($this->form_validation->run() == TRUE ) { 
    
if(!empty($chb)) { 

    $this->db->where('id_birojasa', $userdata['birojasa_id']);
    $cek_no = $this->db->get('no_invoice_stnk');
    if ($cek_no->num_rows()<1) {
        $ref = array('no_terakhir' => 1,
                    'id_birojasa' => $userdata['birojasa_id'], );
        $tambah_ref = $this->db->insert('no_invoice_stnk', $ref);
    }else{
        $no_terakhir = $cek_no->row_array();
        $no_baru = $no_terakhir['no_terakhir']+1;
        $ref = array('no_terakhir' => $no_baru );
        $this->db->where('id_birojasa', $userdata['birojasa_id']);
        $update_ref = $this->db->update('no_invoice_stnk', $ref);
    }


    $no_invoice_stnk = 'INV/'.sprintf("%06d", $ref['no_terakhir']).'/STNK';
    $no_tt_stnk = 'TT/'.sprintf("%06d", $ref['no_terakhir']).'/STNK'; 
    $tanggal = date("Y-m-d");

    $data_inv_bpkb = array('no_invoice' => $no_invoice_stnk,
                            'jumlah_berkas' => count($chb),
                            'tanggal' => $tanggal,
                            'id_birojasa' => $userdata['birojasa_id'],
                            'id_dealer' => $kode_dealer, 
                            'no_tt_stnk' => $no_tt_stnk,
                            'diterima' => $diterima,
                            'dibuat' => $dibuat );

    // show_array($data_inv_bpkb);
    // exit();

        $res = $this->db->insert('invoice_stnk', $data_inv_bpkb);
         
        if($res){

            $data_update = array('no_invoice_stnk' => $no_invoice_stnk, 
                                'stnk_serah_dealer' => 1);

            foreach ($chb as $key => $value) {
                $this->db->where('id', $value);
                $update = $this->db->update('bj_bbn_satu', $data_update);    
            }

            $arr = array("error"=>false,'message'=>"BERHASIL DISIMPAN");
        }
        else {
             $arr = array("error"=>true,'message'=>"GAGAL  DISIMPAN");
        }
}
else {
    $arr = array("error"=>true,'message'=> 'Pilih salah satu data');
}
}else{

    $arr = array("error"=>true,'message'=>validation_errors());

}
        echo json_encode($arr);     

    // foreach ($chb as $x) {
    //     echo $x;
    // }
 }


function get_data() {

        $userdata = $this->session->userdata('bj_login');
        
        // echo $userdata['nama']; 
        $id_birojasa = $userdata['birojasa_id']; 
        // echo $userdata['birojasa']; 
        // show_array($userdata); exit();

        // echo $id_pengguna;
        // exit();

        $draw = $_REQUEST['draw']; // get the requested page 
        $start = $_REQUEST['start'];
        $limit = $_REQUEST['length']; // get how many rows we want to have into the grid 
        $sidx = isset($_REQUEST['order'][0]['column'])?$_REQUEST['order'][0]['column']:0; // get index row - i.e. user click to sort 
        $sord = isset($_REQUEST['order'][0]['dir'])?$_REQUEST['order'][0]['dir']:"asc"; // get the direction if(!$sidx) $sidx =1;  
        
        
        $dealer = $_REQUEST['columns'][1]['search']['value'];
      //  order[0][column]
        $req_param = array (
                "sort_by" => $sidx,
                "sort_direction" => $sord,
                "limit" => null,
                "dealer" => $dealer,
                "id_birojasa" => $id_birojasa,    
        );     

        
           
        $result = $this->dm->get_data($req_param)->result_array();
        
       
        

        $arr_data = array();
        foreach($result as $row) : 
        // $daft_id = $row['daft_id'];
        $id = $row['id'];
                    
             $cek = '<input type="checkbox" name="chb[]" value="'.$id.'" class="check" id="chb" onchange="biaya()" >';

            $arr_data[] = array(
                $cek,
                $row['no_rangka'],
                $row['no_mesin'],
                $row['no_faktur'],
                $row['nama_pemilik'],
                rupiah($row['bayar_jumlah_stnk']),
                
                     
                                );
        endforeach;

         $responce = array('draw' => $draw, 
                          'data'=>$arr_data
            );
         
        echo json_encode($responce); 
    }






}


