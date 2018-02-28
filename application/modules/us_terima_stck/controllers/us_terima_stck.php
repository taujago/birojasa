<?php 
class us_terima_stck extends user_controller{
    var $controller;
    
    
    function us_terima_stck(){
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


        $this->set_subtitle("Terima STCK");
        $this->set_title("STCK");
        $this->set_content($content);
        $this->cetak();
}


function get_data(){
    $post  = $this->input->post();
    //show_array($post);

   

    $this->db->like($post['jenis'], $post['no_mesin']);
    $this->db->where('status_stck', 1);
    $this->db->where('status_terima_stck', 0);
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
        $this->form_validation->set_rules('jumlah_bayar_stck','Input Biaya Notis','required');         
         
        $this->form_validation->set_message('required', ' %s Harus diisi ');
        
        $this->form_validation->set_error_delimiters('', '<br>');

     
        
        

if($this->form_validation->run() == TRUE ) { 
        $post['stck_terima_tgl'] = date("Y-m-d");
        $post['jumlah_bayar_stck'] = bersih($post['jumlah_bayar_stck']);
        $post['status_terima_stck'] = 1;
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