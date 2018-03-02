<?php 
class us_terima_stnk extends user_controller{
	var $controller;
    
    
	function us_terima_stnk(){
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


		$this->set_subtitle("Penerimaan STNK");
		$this->set_title("STNK");
		$this->set_content($content);
		$this->cetak();
}


function get_data(){
    $post  = $this->input->post();
    //show_array($post);

   

     $this->db->where($post['jenis'], $post['no_mesin']);
    $this->db->where('stnk_serah_samsat', 1);
    $this->db->where('status_notis', 1);
    $this->db->where('status_stnk', 0);
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
        $this->form_validation->set_rules('alamat_pemilik','Alamat','required');
        $this->form_validation->set_rules('stnk_tgl','Isi Tgl. STNK','required');    
        $this->form_validation->set_rules('stnk_no','Isi No. STNK','required');         
         
        $this->form_validation->set_message('required', ' %s Harus diisi ');
        
        $this->form_validation->set_error_delimiters('', '<br>');

     
        
        

if($this->form_validation->run() == TRUE ) { 
        $post['stnk_tgl'] = flipdate($post['stnk_tgl']);
        $post['status_stnk'] = 1;
        $this->db->where('id', $post['id']);
        $res = $this->db->update('bj_bbn_satu', $post); 
        
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