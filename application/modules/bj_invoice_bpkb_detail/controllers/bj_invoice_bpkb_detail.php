<?php 
class bj_invoice_bpkb_detail extends biro_jasa_controller{
	var $controller;
    
    
	function bj_invoice_bpkb_detail(){
		parent::__construct();

		$this->controller = get_class($this);
		$this->load->model('bj_invoice_bpkb_detail_model','dm');
        $this->load->model("coremodel","cm");
		$this->load->helper("tanggal");

	
		
	}

	function index(){
		

        $data_array=array();

        $userdata = $this->session->userdata('bj_login');
        

        $id_birojasa = $userdata['birojasa_id'];
        $data_array['arr_dealer'] = $this->cm->arr_dropdown4("dealer", "id", "nama", $id_birojasa);



		$content = $this->load->view($this->controller."_view",$data_array,true);


		$this->set_subtitle("Invoice dan Tanda Terima BPKB");
		$this->set_title("Invoice");
		$this->set_content($content);
		$this->cetak();
}

	function get_data(){

        $userdata = $this->session->userdata('bj_login');
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
  
        $dealer = $_REQUEST['columns'][1]['search']['value'];
        $tanggal_awal = $_REQUEST['columns'][2]['search']['value'];
        $tanggal_akhir = $_REQUEST['columns'][3]['search']['value'];
      //  order[0][column]
        $req_param = array (
                "sort_by" => $sidx,
                "sort_direction" => 'desc',
                "limit" => null,
                "tanggal_awal" => $tanggal_awal,
                "tanggal_akhir" => $tanggal_akhir,
                "dealer" => $dealer,
                "birojasa" => $id_birojasa,    
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
        $no_invoice = $row['no_invoice'];

        
         $nama ="<b><a href='bj_invoice_bpkb_detail/lihatdata?id=$id'>$no_invoice</a></b>";
        
        
            
             
            $arr_data[] = array(
                $row['id'],
                $nama,
                $row['jumlah_berkas'],
                $row['nm_dealer']    
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

        $userdata = $this->session->userdata('bj_login');
        // echo $userdata['nama']; 
        $id_birojasa = $userdata['birojasa_id']; 

    	$this->db->where('id', $get['id']);
    	$invoice_bpkb = $this->db->get('invoice_bpkb')->row_array();
    	
    	$no_invoice_bpkb = $invoice_bpkb['no_invoice'];
        $this->db->where('id_birojasa', $id_birojasa);
    	$this->db->where('no_invoice_bpkb', $no_invoice_bpkb);
    	$data_array['hasil'] = $this->db->get('bj_bbn_satu')->result_array();
    	$data_array['id'] = $get['id'];

    	$content = $this->load->view($this->controller."_view_detail",$data_array,true);


		$this->set_subtitle("Detail No. Invoice : ".$no_invoice_bpkb);
		$this->set_title("BPKB");
		$this->set_content($content);
		$this->cetak();
    	
    }

    function pdf(){
    	$data = array();
    	$get = $this->input->get();

    	

    	$this->db->select('s.*, d.nama as nm_dealer')->from("invoice_bpkb s");
		$this->db->join('dealer d','s.id_dealer=d.id');
    	$this->db->where('s.id', $get['id']);
    	$invoice_bpkb = $this->db->get('')->row_array();

        // show_array($invoice_bpkb);
        // exit();
        $this->db->where('id', $invoice_bpkb['id_dealer']);
        $data['dealer'] = $this->db->get('dealer')->row_array();
        // show_array($data['dealer']);
        // exit();
    	$this->db->where('id', $invoice_bpkb['id_birojasa']);
    	$data['birojasa'] = $this->db->get('biro_jasa')->row_array();

    	$no_invoice = $invoice_bpkb['no_invoice'];
        $this->db->where('id_birojasa', $invoice_bpkb['id_birojasa']);
    	$this->db->where('no_invoice_bpkb', $no_invoice);
    	$data['hasil'] = $this->db->get('bj_bbn_satu')->result_array();
    	$data['id'] = $get['id'];
     	$data['data_inv'] = $invoice_bpkb;
   		// show_array($data);
    $data['controller'] = get_class($this);
    $data['header'] = "Detail No. Referensi ".$no_invoice;
    
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

         if ($get['jenis']=='inv') {
            $html = $this->load->view("pdf/cetak_detail",$data,true);
        }else{
            $html = $this->load->view("pdf/cetak_tanda_terima",$data,true);
        }

         
         $pdf->writeHTML($html, true, false, true, false, '');

 
         $pdf->Output($data['header']. $this->session->userdata("tahun") .'.pdf', 'I');
}




}