<?php 
class us_terima_bpkb extends user_controller{
	var $controller;
    
    
	function us_terima_bpkb(){
		parent::__construct();

		$this->controller = get_class($this);
		
        $this->load->model("coremodel","cm");
		$this->load->helper("tanggal");

	
		
	}








function index(){
		

        $data_array=array();

        $userdata = $this->session->userdata('user_login');


        $data_array['action'] = 'simpan';
        

		$content = $this->load->view($this->controller."_view",$data_array,true);


		$this->set_subtitle("Penerimaan BPKB");
		$this->set_title("BPKB");
		$this->set_content($content);
		$this->cetak();
}


function get_data(){
    $post  = $this->input->post();
    //show_array($post);

   

    $this->db->where('no_mesin', $post['no_mesin']);
    $this->db->where('bpkb_serah_polda', 1);
    $this->db->where('status_bpkb', 0);
    $res = $this->db->get('bj_bbn_satu')->row_array();

    // show_array($res);
    // echo $this->db->last_query();
    // exit();

    echo json_encode($res);

    // echo "hasilnya mana ? " . $hasil;
}


function simpan(){


    $post = $this->input->post();
    
       


        $this->load->library('form_validation');
        $this->form_validation->set_rules('no_rangka','No. Rangka','required');    
        $this->form_validation->set_rules('no_mesin','No. Mesin','required');
        $this->form_validation->set_rules('no_faktur','No. Faktur','required');
        $this->form_validation->set_rules('nama_pemilik','Nama Pemilik','required'); 
        $this->form_validation->set_rules('alamat_pemilik','ALAMAT','required');
        $this->form_validation->set_rules('bpkb_no','No. BPKB','required');
        $this->form_validation->set_rules('bpkb_tgl','Tgl. BPKB','required');  
        $this->form_validation->set_rules('bayar_jumlah_bpkb','Biaya Admin','callback_cek_');    
        // $this->form_validation->set_rules('pelaksana_nip','NIP','required');         
         
        $this->form_validation->set_message('required', ' %s Harus diisi ');
        
        $this->form_validation->set_error_delimiters('', '<br>');

     
        $userdata = $this->session->userdata('bj_login');
        $post['id_birojasa'] = $userdata['birojasa_id'];
        //show_array($data);

if($this->form_validation->run() == TRUE ) { 

        
        $res = $this->db->insert('dealer', $post); 
        
        if($res){
            $arr = array("error"=>false,'message'=>"BERHASIL DISIMPAN");
        }
        else {
             $arr = array("error"=>true,'message'=>"GAGAL  DISIMPAN");
        }
}
else {
    $arr = array("error"=>true,'message'=>validation_errors());
}
        echo json_encode($arr);
}



	

}

?>