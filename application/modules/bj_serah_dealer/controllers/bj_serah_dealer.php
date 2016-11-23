<?php 
class bj_serah_dealer extends biro_jasa_controller{
    var $controller;
    function bj_serah_dealer(){
        parent::__construct();

        $this->controller = get_class($this);
        $this->load->model($this->controller.'_model','dm');
        $this->load->model("coremodel","cm");
        $this->load->helper("tanggal");
        
        //$this->load->helper("serviceurl");
        
    }


// Untuk View




function index(){
        $data_array=array();
    $userdata = $this->session->userdata('bj_login');
    $id_birojasa = $userdata['birojasa_id'];

    $data_array['action'] = 'simpan';
    $data_array['arr_dealer'] = $this->cm->arr_dropdown4("dealer", "id", "nama", $id_birojasa);

        $content = $this->load->view($this->controller."_view",$data_array,true);

        $this->set_subtitle("Pengurusan BBN 1");
        $this->set_title("Pngurusan BBN 1");
        $this->set_content($content);
        $this->cetak();
}

    


function simpan(){

    $post  = $this->input->post('id');
    $userdata = $this->session->userdata('bj_login');
    $userdata_id = $userdata['id'];

    // $show_array($post);
    // exit();
    // $f = array();
  foreach($post as $id) {
    $tgl_serah_dealer = $this->input->post('tgl_serah_dealer');
    $data = array(
      'id'     => $id,
      'nama_serah_dealer' => $userdata_id,
      'status_serah_dealer' => 1,
      'nama_penerima_dealer' => $this->input->post('nama_penerima_dealer'),
      'tgl_serah_dealer' => flipdate($tgl_serah_dealer),
    );
    // show_array($data);
    // exit();
    // $f = array('id' => $id);

    $this->db->where('id', $id);
    $this->db->update('bj_bbn_satu', $data); 
    
  }
  $arr = array("error"=>false,'message'=>"BERHASIL DISIMPAN");

  echo json_encode($arr);

  // return $f;
        
  }






    // Read


   function get_data() {

        
        // show_array($userdata);

        $draw = $_REQUEST['draw']; // get the requested page 
        $start = $_REQUEST['start'];
        $limit = $_REQUEST['length']; // get how many rows we want to have into the grid 
        $sidx = isset($_REQUEST['order'][0]['column'])?$_REQUEST['order'][0]['column']:0; // get index row - i.e. user click to sort 
        $sord = isset($_REQUEST['order'][0]['dir'])?$_REQUEST['order'][0]['dir']:"asc"; // get the direction if(!$sidx) $sidx =1;  
        
  
        $tanggal_awal = $_REQUEST['columns'][1]['search']['value'];
        $tanggal_akhir = $_REQUEST['columns'][2]['search']['value'];
        $no_rangka = $_REQUEST['columns'][3]['search']['value'];
        $kode_dealer = $_REQUEST['columns'][4]['search']['value'];
        $userdata = $this->session->userdata('bj_login');
        $id_birojasa = $userdata['birojasa_id'];
        // $userdata = $this->session->userdata('bj_login');
        // $id_birojasa = $userdata['birojasa_id'];



      //  order[0][column]
        $req_param = array (
                "sort_by" => $sidx,
                "sort_direction" => $sord,
                "limit" => null,
                "tanggal_awal" => $tanggal_awal,
                "tanggal_akhir" => $tanggal_akhir,
                "no_rangka" => $no_rangka, 
                "kode_dealer" => $kode_dealer, 
                "id_birojasa" => $id_birojasa    
        );     
           
        $row = $this->dm->data($req_param)->result_array();
        
        $count = count($row); 
       
        
        $req_param['limit'] = array(
                    'start' => $start,
                    'end' => $limit
        );
          
        
        $result = $this->dm->data($req_param)->result_array();

        // echo $this->db->last_query();
        $totalbpkb = 0;
        $totalstnk = 0;
        $totalpajak = 0;
        $totaladmin = 0;

       
        $arr_data = array();
        foreach($result as $row) : 
        // $daft_id = $row['daft_id'];
          $id = $row['id'];
          $select = "<input type='checkbox' name='id[]' id='id' value='$id'>"; 
          
        $id = $row['id'];
        $id_pengurus_bpkb = $row['pengurus_bpkb'];
        $id_pengurus_stnk = $row['pengurus_stnk'];
        $no_rangka = $row['no_rangka'];
        $no_mesin = $row['no_mesin'];
        $no_faktur = $row['no_faktur'];
        

          $pengurus = '<b>BPKB :</b> <a href='. site_url('bj_add_user/editdata?id='.$id_pengurus_bpkb).' >'.$row['nm_pengurus_bpkb'].'</a><br />'.
                      '<b>STNK :</b> <a href='. site_url('bj_add_user/editdata?id='.$id_pengurus_stnk).' >'.$row['nm_pengurus_stnk'].'</a><br />';
        // <a href ='bj_bbn_satu/editdata?id=$id' class='btn btn-primary btn-xs'><i class='fa fa-edit'></i>Edit</a>";
        $nama ="<a href='bj_bbn_satu/lihatdata?id=$id'>$no_rangka<br/>
                $no_mesin<br/>
                $no_faktur
                </a>
                ";
        $tgl_entri = flipdate($row['tgl_entri']);
            
             
            $arr_data[] = array(

                
                $select,
                flipdate($row['tgl_pengajuan']),
                $nama,
                rupiah($row['rp_daftar_bpkb']),
                rupiah($row['rp_daftar_stnk']),
                rupiah($row['rp_pajak_kendaraan']),
                rupiah($row['rp_admin_fee']),
                $pengurus,
                
                
                     
                                );

              $totalbpkb = $row['rp_daftar_bpkb']+$totalbpkb;
              $totalstnk = $row['rp_daftar_stnk']+$totalstnk;
              $totalpajak = $row['rp_pajak_kendaraan']+$totalpajak;
              $totaladmin = $row['rp_admin_fee']+$totaladmin;

        endforeach;
          $spasi1 = 'Total';

          


          $arr_data[]  = array(
              '',
              $spasi1,
              '',
              rupiah($totalbpkb),
              rupiah($totalstnk),
              rupiah($totalpajak),
              rupiah($totaladmin),
              
              '',

             );

         $responce = array('draw' => $draw, // ($start==0)?1:$start,
                          'recordsTotal' => $count, 
                          'recordsFiltered' => $count,
                          'data'=>$arr_data
            );
         
        echo json_encode($responce); 
    }


 



function cetak_serah_dealer(){
    $post = $this->input->get(); 
    

    $kode_dealer = $post['kode_dealer'];
    $tanggal_awal = $post['tanggal_awal'];
    $tanggal_akhir = $post['tanggal_akhir'];


    $this->db->select('bbn1.*, pb.nama as nm_pengurus_bpkb, ps.nama as nm_pengurus_stnk, j.tipe as nm_type');

      $this->db->from("bj_bbn_satu bbn1");
      
      $this->db->join('m_tipe j','bbn1.type=j.id');
      $this->db->join('pengguna ps','bbn1.pengurus_stnk=ps.id');
      $this->db->join('pengguna pb','bbn1.pengurus_bpkb=pb.id');
      // $this->db->where('id_birojasa', $id_birojasa);
      


      $tanggal_awal = flipdate($tanggal_awal);
      $tanggal_akhir = flipdate($tanggal_akhir);
     
    if(!empty($tanggal_awal) and !empty($tanggal_akhir) ) {
      $this->db->where("tgl_pengajuan between '$tanggal_awal' and '$tanggal_akhir'",null,false);    
     }

     if(!empty($kode_dealer)) {
      $this->db->like("bbn1.kode_dealer",$kode_dealer);
     }

     $resx = $this->db->get();

    $data['controller'] = get_class($this);
    $data['header'] = "Report BBN 1";
    $data['query']  = $resx->result();
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
        $pdf->AddPage('L');

 

         $html = $this->load->view("pdf/cetak_serah_dealer",$data,true);
         $pdf->writeHTML($html, true, false, true, false, '');

 
         $pdf->Output($data['header']. $this->session->userdata("tahun") .'.pdf', 'I');
}

    

}

?>
