<?php 
class us_serah_stnk_detail extends user_controller{
	var $controller;
    
    
	function us_serah_stnk_detail(){
		parent::__construct();

		$this->controller = get_class($this);
		$this->load->model('us_serah_stnk_detail_model','dm');
        $this->load->model("coremodel","cm");
		$this->load->helper("tanggal");

		
	}

	function index(){
		

        $data_array=array();

        $userdata = $this->session->userdata('user_login');
        $id = $userdata['id'];

        $data_array['arr_samsat'] = $this->cm->arr_dropdown3("samsat", "id","nama", "nama", "id_birojasa", $userdata['birojasa_id'] );



		$content = $this->load->view($this->controller."_view",$data_array,true);


		$this->set_subtitle("Detail Penyerahan STNK Ke-Samsat");
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
        // $daft_id = $row['daft_id'];
        $id = $row['id'];
        $no_ref = $row['no_ref'];

        
         $nama ="<b><a href='us_serah_stnk_detail/lihatdata?id=$id'>$no_ref</a></b>";
        
        
            
             
            $arr_data[] = array(
                $row['id'],
                $nama,
                $row['jumlah_berkas'],
                $row['nm_samsat']    
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

         $userdata = $this->session->userdata('user_login');
        $pengguna = $userdata['id'];
        $id_birojasa = $userdata['birojasa_id']; 


    	$this->db->where('id', $get['id']);
    	$ref_stnk = $this->db->get('ref_stnk')->row_array();
    	
    	$no_ref = $ref_stnk['no_ref'];
        $this->db->where('pengurus_stnk', $pengguna);
    	$this->db->where('no_ref_stnk', $no_ref);
    	$data_array['hasil'] = $this->db->get('bj_bbn_satu')->result_array();
    	$data_array['id_ref'] = $get['id'];

    	$content = $this->load->view($this->controller."_view_detail",$data_array,true);


		$this->set_subtitle("Detail No. Referensi : ".$no_ref);
		$this->set_title("STNK");
		$this->set_content($content);
		$this->cetak();
    	
    }


    function hapusdata(){
        $get = $this->input->post();
        $id = $get['id'];

        $userdata = $this->session->userdata('user_login');
        $pengguna = $userdata['id'];
        // echo $userdata['nama']; 
        $id_birojasa = $userdata['birojasa_id']; 

        $data = array('id' => $id, );
        $this->db->select('no_ref_stnk');
        $this->db->where('id', $id);
        $data_bbn = $this->db->get('bj_bbn_satu')->row_array();
        $no_ref = $data_bbn['no_ref_stnk'];
        // echo $no_ref;

        



        
        

        
        
        $update_data = array('status_stnk' => 0,
                            'stnk_serah_samsat' => 0,
                            'status_notis' => 0,
                            'bpkb_serah_polda' => 0, 
                            'no_ref_stnk' => ''
                             );
        $this->db->where('id', $id);
        $res = $this->db->update('bj_bbn_satu', $update_data);
        if($res){
            $this->db->where('pengurus_stnk', $pengguna);
            $this->db->where('no_ref_stnk', $no_ref);
            $jumlah_berkas = $this->db->get('bj_bbn_satu')->num_rows();

            $update_ref = array('jumlah_berkas' => $jumlah_berkas, );

            $this->db->where('id_user', $pengguna);
            $this->db->where('id_birojasa', $id_birojasa);
            $this->db->where('no_ref', $no_ref);
            $this->db->update('ref_stnk', $update_ref);

            $arr = array("error"=>false,"message"=>"DATA BERHASIL DIUPDATE");
        }
        else {
            $arr = array("error"=>true,"message"=>"DATA GAGAL DIUPDATE ".mysql_error());
        }
        //redirect('sa_birojasa');
        echo json_encode($arr);
    }

    function pdf(){
    	$data = array();
    	$get = $this->input->get();
        $userdata = $this->session->userdata('user_login');
        $pengguna = $userdata['id'];
        // echo $userdata['nama']; 
        $id_birojasa = $userdata['birojasa_id']; 
    	

    	$this->db->select('s.*, sa.nama as nm_samsat')->from("ref_stnk s");
        $this->db->join('samsat sa','s.id_samsat=sa.id');
    	$this->db->where('s.id', $get['id']);
    	$ref_stnk = $this->db->get('')->row_array();


    	$this->db->where('id', $ref_stnk['id_birojasa']);
    	$data['birojasa'] = $this->db->get('biro_jasa')->row_array();

    	$no_ref = $ref_stnk['no_ref'];
        $this->db->where('pengurus_stnk', $pengguna);
    	$this->db->where('no_ref_stnk', $no_ref);
    	$data['hasil'] = $this->db->get('bj_bbn_satu')->result_array();
    	$data['id_ref'] = $get['id'];
     	$data['data_ref'] = $ref_stnk;
   		// show_array($data);
    $data['controller'] = get_class($this);
    $data['header'] = "Detail No. Referensi ".$no_ref;
    
    $data['title'] = $data['header'];
    $this->load->library('Pdf');
        $pdf = new Pdf('P', 'mm', 'A4', true, 'UTF-8', false);
        $pdf->SetTitle( $data['header']);
        // $pdf->Orientation('P');
        $pdf->SetMargins(10, 10, 10);
        $pdf->SetHeaderMargin(10);
        $pdf->SetFooterMargin(10);
        $pdf->setFooterFont(Array(PDF_FONT_NAME_DATA, '', PDF_FONT_SIZE_DATA));

        $pdf->SetAutoPageBreak(true,10);
        $pdf->SetAuthor('TPMM taujago@gmail.com');
         
            
        $pdf->setPrintHeader(false);
        $pdf->setPrintFooter(true);

         // add a page
        $pdf->AddPage('P');

 
        if ($get['jenis']=='fin') {
            $html = $this->load->view("pdf/cetak_detail_ref",$data,true);
        }else{
            $html = $this->load->view("pdf/cetak_detail_ref_sam",$data,true);
        }
         
         $pdf->writeHTML($html, true, false, true, false, '');

 
         $pdf->Output($data['header']. $this->session->userdata("tahun") .'.pdf', 'I');
}


	function pdf_ref(){
		$userdata = $this->session->userdata('user_login');
        $pengguna = $userdata['id'];

    $post = $this->input->get(); 

    $this->db->where('id', $userdata['birojasa_id']);
    $data['birojasa'] = $this->db->get('biro_jasa')->row_array();


    

    $samsat = $post['samsat'];
    $tanggal_awal = $post['tanggal_awal'];
    $tanggal_akhir = $post['tanggal_akhir'];

    


    		$this->db->select('s.*, sa.nama as nm_samsat')->from("ref_stnk s");
            $this->db->join('samsat sa','s.id_samsat=sa.id');
		 	$this->db->where('s.id_user', $pengguna);		
		 	$this->db->order_by('s.tanggal', 'desc');
		
		 
		$tanggal_awal = flipdate($tanggal_awal);
		$tanggal_akhir = flipdate($tanggal_akhir);
		 
		if(!empty($tanggal_awal) and !empty($tanggal_akhir) ) {
		 	$this->db->where("s.tanggal between '$tanggal_awal' and '$tanggal_akhir'",null,false);

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
    $data['header'] = "Detail Penyerahan Berkas STNK ";
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

 

         $html = $this->load->view("pdf/cetak_ref_stnk",$data,true);
         $pdf->writeHTML($html, true, false, true, false, '');

 
         $pdf->Output($data['header']. $this->session->userdata("tahun") .'.pdf', 'I');
}


}