<?php 
class dealer_preview extends dealer_controller{
	var $controller;
	function dealer_preview(){
		parent::__construct();

		$this->controller = get_class($this);
		$this->load->model('dealer_preview_model','dm');
        $this->load->model("coremodel","cm");
        $this->load->helper("tanggal");
		
		//$this->load->helper("serviceurl");
		
	}


// Untuk View


    function lihatdata(){
         $get = $this->input->get(); 
         $id = $get['id'];


         $this->db->select('bbn1.*, pb.nama as nm_pengurus_bpkb, ps.nama as nm_pengurus_stnk, t.tipe as nm_tipe');

        $this->db->from("bj_bbn_satu bbn1");
        $this->db->join('pengguna ps','bbn1.pengurus_stnk=ps.id');
        $this->db->join('pengguna pb','bbn1.pengurus_bpkb=pb.id');
        $this->db->join('m_tipe t','bbn1.type=t.id');
        $this->db->where('bbn1.id',$id);
         $bbn = $this->db->get('bj_bbn_satu');
         // echo $this->db->last_query(); exit();

         $data = $bbn->row_array();

        


         $kota = $this->dm->datawilayah('id', 'tiger_kota', $data['id_kota'], 'kota')->row_array();
         $provinsi = $this->dm->datawilayah('id', 'tiger_provinsi', $data['id_provinsi'], 'provinsi')->row_array();
          $kecamatan = $this->dm->datawilayah('id', 'tiger_kecamatan', $data['id_kecamatan'], 'kecamatan')->row_array();
          $desa = $this->dm->datawilayah('id', 'tiger_desa', $data['id_desa'], 'desa')->row_array();

          $jenis = $this->dm->datawilayah('id_jenis', 'm_jenis', $data['id_jenis'], 'jenis')->row_array();

          $polda = $this->dm->datawilayah('polda_id', 'm_polda', $data['id_polda'], 'polda_nama')->row_array();

          $samsat = $this->dm->datawilayah('id', 'samsat', $data['id_samsat'], 'nama')->row_array();
          $pengurus = $this->dm->datawilayah('id', 'pengguna', $data['user_entri'], 'nama')->row_array();

          $dealer = $this->dm->datawilayah('id', 'dealer', $data['kode_dealer'], 'nama')->row_array();
          

          $data_array['arr_tahun'] = $this->cm->arr_tahun();

          $model = $this->dm->datawilayah('id_model', 'm_model', $data['id_model'], 'model')->row_array();

          $merek = $this->dm->datawilayah('kode', 'm_merek', $data['id_merek'], 'nama')->row_array();
          // echo $data['id_merek'];
          // exit();

          // $warna = $this->dm->datawilayah('WARNA_ID', 'm_warna', $data['id_warna'], 'WARNA_NAMA')->row_array();
         

        $data['nama_dealer'] =  $dealer['nama'];
         $data['samsat_masuk_tgl'] = flipdate($data['samsat_masuk_tgl']);
        $data['stnk_serah_tgl'] = flipdate($data['stnk_serah_tgl']);
        $data['bpkb_serah_tgl'] = flipdate($data['bpkb_serah_tgl']);
        $data['stnk_tgl'] = flipdate($data['stnk_tgl']);
        $data['tgl_entri'] = flipdate($data['tgl_entri']);
        $data['bpkb_tgl'] = flipdate($data['bpkb_tgl']);
        $data['tgl_faktur'] = flipdate($data['tgl_faktur']);
        $data['bayar_tgl_stnk'] = flipdate($data['bayar_tgl_stnk']);
        $data['bayar_tgl_bpkb'] = flipdate($data['bayar_tgl_bpkb']);

        $data['rp_daftar_stnk'] = rupiah($data['rp_daftar_stnk']);
        $data['rp_daftar_bpkb'] = rupiah($data['rp_daftar_bpkb']);
        $data['rp_admin_fee'] = rupiah($data['rp_admin_fee']);
        $data['rp_pajak_kendaraan'] = rupiah($data['rp_pajak_kendaraan']);
        $data['bayar_jumlah_stnk'] = rupiah($data['bayar_jumlah_stnk']);
        $data['bayar_jumlah_bpkb'] = rupiah($data['bayar_jumlah_bpkb']);


        
        $data["jenis"] = $jenis['jenis'];
        $data["model"] = $model['model'];
        $data["merek"] = $merek['nama'];
        // $data["warna"] = $warna['WARNA_NAMA'];
        
        $data["kota"] = $kota['kota'];
        $data['provinsi'] = $provinsi['provinsi'];
        $data['desa'] = $desa['desa'];
        $data['kecamatan'] = $kecamatan['kecamatan'];
        $data['polda'] = $polda['polda_nama'];
        $data['samsat'] = $samsat['nama'];
    



        

        $content = $this->load->view("bj_bbn_satu_detail_view",$data,true);

         // $content = $this->load->view($this->controller."_form_view",$data,true);

        $this->set_subtitle("Detail Data");
        $this->set_title("Detail Data BBN 2");
        $this->set_content($content);
        $this->cetak();

    }




function index(){
		$data_array=array();
    $userdata = $this->session->userdata('dealer_login');
    $id_birojasa = $userdata['birojasa_id'];
    $data_array['arr_dealer']  = array( '' => 'Semua',
                                        'no_pol' => 'NO. POLISI',
                                        'no_mesin' => 'NO. MESIN',
                                        'no_rangka' => 'NO. RANGKA',
                                        'no_bpkb' => 'NO. BPKB' );

		$content = $this->load->view("index_view",$data_array,true);

		$this->set_subtitle("");
		$this->set_title("Proses Pengurusan BBN 1");
		$this->set_content($content);
		$this->cetak();
}

    





   function get_data() {

        
        // show_array($userdata);

        $draw = $_REQUEST['draw']; // get the requested page 
        $start = $_REQUEST['start'];
        $limit = $_REQUEST['length']; // get how many rows we want to have into the grid 
        $sidx = isset($_REQUEST['order'][0]['column'])?$_REQUEST['order'][0]['column']:0; // get index row - i.e. user click to sort 
        $sord = isset($_REQUEST['order'][0]['dir'])?$_REQUEST['order'][0]['dir']:"asc"; // get the direction if(!$sidx) $sidx =1;  
        
  
        $tanggal_awal = $_REQUEST['columns'][1]['search']['value'];
        $tanggal_akhir = $_REQUEST['columns'][2]['search']['value'];
        $field = $_REQUEST['columns'][3]['search']['value'];
        $jenis_field = $_REQUEST['columns'][4]['search']['value'];
        $userdata = $this->session->userdata('dealer_login');
        $id_birojasa = $userdata['birojasa_id'];
        $id_dealer = $userdata['id_dealer'];
        // $userdata = $this->session->userdata('bj_login');
        // $id_birojasa = $userdata['birojasa_id'];



      //  order[0][column]
        $req_param = array (
                "sort_by" => $sidx,
                "sort_direction" => $sord,
                "limit" => null,
                "tanggal_awal" => $tanggal_awal,
                "tanggal_akhir" => $tanggal_akhir,
                "field" => $field,
                'jenis_field' => $jenis_field, 
                "kode_dealer" => $id_dealer, 
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
        $id_pengurus_bpkb = $row['pengurus_bpkb'];
        $id_pengurus_stnk = $row['pengurus_stnk'];
        $no_rangka = $row['no_rangka'];
        $no_mesin = $row['no_mesin'];
        $no_faktur = $row['no_faktur'];
        

          $pengurus = '<b>BPKB :</b>'.$row['nm_pengurus_bpkb'].'<br />'.
                      '<b>STNK :</b>'.$row['nm_pengurus_stnk'].'<br />';
        // <a href ='bj_bbn_satu/editdata?id=$id' class='btn btn-primary btn-xs'><i class='fa fa-edit'></i>Edit</a>";
        $nama ="$no_rangka<br/>
                $no_mesin<br/>
                $no_faktur
                
                ";
        $tgl_pengajuan = flipdate($row['tgl_pengajuan']);
            
             
            $arr_data[] = array(

                
                
                $tgl_pengajuan,
                $nama,
                $row['no_pol'],
                $row['bpkb_no'],
                rupiah($row['rp_pajak_kendaraan']),
                rupiah($row['rp_admin_fee']),
                $pengurus,
               
                
                     
                                );

              $totalbpkb = $row['rp_daftar_bpkb']+$totalbpkb;
              $totalstnk = $row['rp_daftar_stnk']+$totalstnk;
              $totalpajak = $row['rp_pajak_kendaraan']+$totalpajak;
              $totaladmin = $row['rp_admin_fee']+$totaladmin;

        endforeach;
         



         $responce = array('draw' => $draw, // ($start==0)?1:$start,
                          'recordsTotal' => $count, 
                          'recordsFiltered' => $count,
                          'data'=>$arr_data
            );
         
        echo json_encode($responce); 
    }


    // Update



 



   
        // Delete





function pdf(){
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

     if (!empty($jenis_field) and !empty($field)) {
      $this->db->like($jenis_field, $field);
     }

     $userdata = $this->session->userdata('dealer_login');
     $id_dealer = $userdata['id_dealer'];
     
      $this->db->where("bbn1.kode_dealer",$id_dealer);
    $this->db->where('bbn1.status_stnk', 1);
    $this->db->where('bbn1.status_bpkb', 1); 

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

 

         $html = $this->load->view("pdf/cetak_data_view",$data,true);
         $pdf->writeHTML($html, true, false, true, false, '');

 
         $pdf->Output($data['header']. $this->session->userdata("tahun") .'.pdf', 'I');
}

	

}

?>
