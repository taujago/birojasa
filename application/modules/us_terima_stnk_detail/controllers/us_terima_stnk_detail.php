<?php
class us_terima_stnk_detail extends user_controller{
    var $controller;
    
    
    function us_terima_stnk_detail(){
        parent::__construct();

        $this->controller = get_class($this);
        $this->load->model('us_terima_stnk_detail_model','dm');
        $this->load->model("coremodel","cm");
        $this->load->helper("tanggal");

    
        
    }

    function index(){
        

        $data_array=array();

        $userdata = $this->session->userdata('user_login');
        $id = $userdata['id'];

        

        $data_array['arr_polda'] = $this->cm->arr_dropdown3("samsat", "id","nama", "nama", "id_birojasa", $userdata['birojasa_id'] );



        $content = $this->load->view($this->controller."_view",$data_array,true);


        $this->set_subtitle("Detail Penerimaan STNK Samsat");
        $this->set_title("STNK");
        $this->set_content($content);
        $this->cetak();
}

    function get_data(){

        $userdata = $this->session->userdata('user_login');
        $pengguna = $userdata['id'];
        // echo $userdata['nama']; 
        $id_birojasa = $userdata['birojasa_id']; 
        // echo $userdata['birojasa']; 
        // show_array($userdata); exit();

        $draw = $_REQUEST['draw']; // get the requested page 
        $start = $_REQUEST['start'];
        $limit = $_REQUEST['length']; // get how many rows we want to have into the grid 
        $sidx = isset($_REQUEST['order'][0]['column'])?$_REQUEST['order'][0]['column']:0; // get index row - i.e. user click to sort 
        $sord = isset($_REQUEST['order'][0]['dir'])?$_REQUEST['order'][0]['dir']:"asc"; // get the direction if(!$sidx) $sidx =1;  
        // show_array($_REQUEST['columns']);
        // exit();
  
        $samsat = $_REQUEST['columns'][1]['search']['value'];
        $tanggal_awal = $_REQUEST['columns'][2]['search']['value'];
        $tanggal_akhir = $_REQUEST['columns'][3]['search']['value'];
      //  order[0][column]
        $req_param = array (
                "sort_by" => $sidx,
                "sort_direction" => 'desc',
                "limit" => null,
                "tanggal_awal" => $tanggal_awal,
                "tanggal_akhir" => $tanggal_akhir,
                "samsat" => $samsat,
                "id" => $pengguna,    
        );     
        // show_array($req_param);
        // exit();
        $row = $this->dm->data($req_param)->result_array();
        
        
        $count = count($row); 
       
        
        $req_param['limit'] = array(
                    'start' => $start,
                    'end' => $limit
        );
          
        
        $result = $this->dm->data($req_param)->result_array();
        

       
        $arr_data = array();
        foreach($result as $row) : 
            
             
            $arr_data[] = array(
                $row['no_rangka'],
                $row['no_mesin'],
                $row['no_faktur'],
                $row['nama_pemilik'],
                flipdate($row['stnk_tgl'])    
                                );
        endforeach;

         $responce = array('draw' => $draw, // ($start==0)?1:$start,
                          'recordsTotal' => $count, 
                          'recordsFiltered' => $count,
                          'data'=>$arr_data
            );
         
        echo json_encode($responce); 
    }


    function lihatdata(){
        $data_array = array();
        $get = $this->input->get();

        $this->db->where('id', $get['id']);
        $ref_bpkb = $this->db->get('ref_bpkb')->row_array();
        
        $no_ref = $ref_bpkb['no_ref'];

        $this->db->where('no_ref_bpkb', $no_ref);
        $data_array['hasil'] = $this->db->get('bj_bbn_satu')->result_array();
        $data_array['id_ref'] = $get['id'];

        $content = $this->load->view($this->controller."_view_detail",$data_array,true);


        $this->set_subtitle("Detail No. Referensi : ".$no_ref);
        $this->set_title("BPKB");
        $this->set_content($content);
        $this->cetak();
        
    }



    function pdf(){
        $userdata = $this->session->userdata('user_login');
        $pengguna = $userdata['id'];

    $post = $this->input->get(); 

    $this->db->where('id', $userdata['birojasa_id']);
    $data['birojasa'] = $this->db->get('biro_jasa')->row_array();


    

    $samsat = $post['pol'];
    $tanggal_awal = $post['tanggal_awal'];
    $tanggal_akhir = $post['tanggal_akhir'];

    


           $this->db->select('s.*, sa.nama as nm_samsat')->from("bj_bbn_satu s");
            $this->db->join('samsat sa','s.id_samsat=sa.id');
            $this->db->where('s.pengurus_stnk', $pengguna);       
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


     $resx = $this->db->get();


     if (!empty($tanggal_awal) and !empty($tanggal_akhir)) {
        $data['tanggal'] = array('tgl_awal' => $tanggal_awal,
                                    'tgl_akhir' => $tanggal_akhir );
     }

      if(!empty($samsat)) {
        
            $this->db->where('id', $samsat);
            $data_samsat = $this->db->get('samsat')->row_array();

            $data['samsat'] = $data_samsat['nama'];
         }

    $data['controller'] = get_class($this);
    $data['header'] = "Detail Penerimaan Berkas STNK ";
    $data['query']  = $resx->result_array();
    $data['title'] = $data['header'];
    $this->load->library('Pdf');
        $pdf = new Pdf('L', 'mm', 'A4', true, 'UTF-8', false);
        $pdf->SetTitle( $data['header']);
        // $pdf->Orientation('L');
        $pdf->SetMargins(10, 10, 10);
        $pdf->SetHeaderMargin(10);
        $pdf->SetFooterMargin(10);
        $pdf->setFooterFont(Array(PDF_FONT_NAME_DATA, '', PDF_FONT_SIZE_DATA));

        $pdf->SetAutoPageBreak(true,10);
        $pdf->SetAuthor('PKPD  taujago@gmail.com');
         
            
        $pdf->setPrintHeader(false);
        $pdf->setPrintFooter(true);

         // add a page
        $pdf->AddPage('P');

 

         $html = $this->load->view("pdf/print",$data,true);
         $pdf->writeHTML($html, true, false, true, false, '');

 
         $pdf->Output($data['header']. $this->session->userdata("tahun") .'.pdf', 'I');
}


}