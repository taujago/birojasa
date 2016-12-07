<?php 
class bj_bbn_satu extends biro_jasa_controller{
	var $controller;
	function bj_bbn_satu(){
		parent::__construct();

		$this->controller = get_class($this);
		$this->load->model('bj_bbn_satu_model','dm');
        $this->load->model("coremodel","cm");
        $this->load->helper("tanggal");
		
		//$this->load->helper("serviceurl");
		
	}


// Untuk View


    function lihatdata(){
         $get = $this->input->get(); 
         $id = $get['id'];


         $this->db->select('bbn1.*, pb.nama as nm_pengurus_bpkb, ps.nama as nm_pengurus_stnk, t.tipe as nm_tipe, j.jenis as jenis, m.model as model' );

        $this->db->from("bj_bbn_satu bbn1");
        $this->db->join('pengguna ps','bbn1.pengurus_stnk=ps.id');
        $this->db->join('pengguna pb','bbn1.pengurus_bpkb=pb.id');
        $this->db->join('m_tipe t','bbn1.type=t.id');
        $this->db->join('m_jenis j','bbn1.jenis=j.id_jenis');
        // $this->db->join('tiger_kota kt','bbn1.id_kota=kt.id');
        $this->db->join('m_model m','bbn1.model=m.id_model');
        $this->db->where('bbn1.id',$id);
         $bbn = $this->db->get('bj_bbn_satu');
         // echo $this->db->last_query(); exit();

         $data = $bbn->row_array();

        // show_array($data);exit();        


         $kota = $this->dm->datawilayah('id', 'tiger_kota', $data['id_kota'], 'kota')->row_array();
         $provinsi = $this->dm->datawilayah('id', 'tiger_provinsi', $data['id_provinsi'], 'provinsi')->row_array();
          $kecamatan = $this->dm->datawilayah('id', 'tiger_kecamatan', $data['id_kecamatan'], 'kecamatan')->row_array();
          $desa = $this->dm->datawilayah('id', 'tiger_desa', $data['id_desa'], 'desa')->row_array();

          // $jenis = $this->dm->datawilayah('id_jenis', 'm_jenis', $data['id_jenis'], 'jenis')->row_array();

          $polda = $this->dm->datawilayah('polda_id', 'm_polda', $data['id_polda'], 'polda_nama')->row_array();

          $samsat = $this->dm->datawilayah('id', 'samsat', $data['id_samsat'], 'nama')->row_array();
          $pengurus = $this->dm->datawilayah('id', 'pengguna', $data['user_entri'], 'nama')->row_array();

          $dealer = $this->dm->datawilayah('id', 'dealer', $data['kode_dealer'], 'nama')->row_array();
          

          $data_array['arr_tahun'] = $this->cm->arr_tahun();

          // $model = $this->dm->datawilayah('id_model', 'm_model', $data['id_model'], 'model')->row_array();

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


        
        // $data["jenis"] = $jenis['jenis'];
        // $data["model"] = $model['model'];
        $data["merek"] = $merek['nama'];
        // // $data["warna"] = $warna['WARNA_NAMA'];
        // if (!empty($kota['kota'])) {
        //   $data["kota"] = $kota['kota'];
        // }

        $data["merek"] = $merek['nama'];
        // $data["warna"] = $warna['WARNA_NAMA'];
        if (!empty($kota['kota'])) {
          $data['kota'] = $kota['kota'];
        }
        
        if (!empty($desa['desa'])) {
          $data['desa'] = $desa['desa'];
        }
        if (!empty($kecamatan['kecamatan'])) {
          $data['kecamatan'] = $kecamatan['kecamatan'];
        }

        if (!empty($provinsi['provinsi'])) {
          $data['provinsi'] = $provinsi['provinsi'];
        }
        
        
        // $data['desa'] = $desa['desa'];
        // $data['kecamatan'] = $kecamatan['kecamatan'];
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
    $userdata = $this->session->userdata('bj_login');
    $id_birojasa = $userdata['birojasa_id'];
    $data_array['arr_dealer'] = $this->cm->arr_dropdown4("dealer", "id", "nama", $id_birojasa);

		$content = $this->load->view($this->controller."_view",$data_array,true);

		$this->set_subtitle("Pengurusan BBN 1");
		$this->set_title("Pngurusan BBN 1");
		$this->set_content($content);
		$this->cetak();
}

    



function baru(){

        $data_array=array();
        $data_array['action'] = 'simpan';
        $userdata = $this->session->userdata('bj_login');
        $id_birojasa = $userdata['birojasa_id'];
        

        // Dropdown Array

        $data_array['arr_polda'] = $this->cm->arr_dropdown("m_polda", "polda_id", "polda_nama", "polda_nama");

        $data_array['arr_merek'] = $this->cm->arr_dropdown3("m_merek", "kode", "nama", "nama", "id_birojasa", $id_birojasa);

        $data_array['arr_type'] = array('' => "- Pilih Merk Terlebih Dahulu -", );

        $data_array['arr_dealer'] = $this->cm->arr_dropdown4("dealer", "id", "nama", $id_birojasa);

        $data_array['arr_jenis'] = $this->cm->arr_dropdown3("m_jenis", "id_jenis", "jenis", "jenis", "id_birojasa", $id_birojasa);

        $data_array['arr_provinsi'] = $this->cm->arr_dropdown("tiger_provinsi", "id", "provinsi", "provinsi");

        $data_array['arr_warna'] = $this->cm->arr_dropdown3("m_warna", "WARNA_ID", "WARNA_NAMA", "WARNA_NAMA", "id_birojasa", $id_birojasa);


        $data_array['arr_warna_tnkb'] = $this->cm->arr_dropdown("m_warna_tnkb", "id_warna_tnkb", "warna_tnkb", "warna_tnkb");
        
        $data_array['arr_user'] = $this->cm->arr_dropdown2("pengguna", "id", "nama", "nama", "birojasa_id", $id_birojasa);

        $data_array['arr_tahun'] = $this->cm->arr_tahun();

        $data_array['arr_samsat_baru'] = array('' => '- Silahkan Pilih Polda -');
        $data_array['arr_kota_baru'] = array('' => '- Silahkan Pilih Provinsi -');
        $data_array['arr_kecamatan_baru'] = array('' => '- Silahkan Pilih Kota -');
        $data_array['arr_desa_baru'] = array('' => '- Silahkan Pilih Kecamatan -');
        $data_array['arr_model_baru'] = array('' => '- Silahkan Pilih Jenis -');



        // Load Page
        $content = $this->load->view($this->controller."_form_view",$data_array,true);

        $this->set_subtitle("Tambah Data Kepengurusan  BBN 1");
        $this->set_title("Tambah Data Kepengurusan  BBN 1");
        $this->set_content($content);
        $this->cetak();
} 


  function editdata(){
         $get = $this->input->get(); 
         $id = $get['id'];
         $userdata = $this->session->userdata('bj_login');

        


         $this->db->where('id',$id);
         $bbn1 = $this->db->get('bj_bbn_satu');
         // echo $estimasi_bbn_satu->row_array(); exit();
         $data = $bbn1->row_array();
         $id_provinsi = $data['id_provinsi'];
         $id_kota = $data['id_kota'];
         $id_kecamatan = $data['id_kecamatan'];
         $id_polda = $data['id_polda'];
         $id_jenis = $data['jenis'];
         $data['tgl_faktur'] = flipdate($data['tgl_faktur']);
        $data['tgl_pengajuan'] = flipdate($data['tgl_pengajuan']);

        $data['rp_total'] = rupiah($data['rp_daftar_bpkb'] + $data['rp_daftar_stnk']  + $data['rp_pajak_kendaraan'] +  $data['rp_admin_fee'] );

        $data['arr_warna_tnkb'] = $this->cm->arr_dropdown("m_warna_tnkb", "id_warna_tnkb", "warna_tnkb", "warna_tnkb");


         $id_birojasa = $userdata['birojasa_id'];
        // echo $this->db->last_query(); exit();
         $this->db->select('*');
         $this->db->where('id', $data['kode_dealer']);
         $rs = $this->db->get('dealer')->row();
         $data['dealer'] = $rs->id.''.$rs->nama;
         // echo $this->db->last_query();
         // show_array($dealer);
         // echo $kode_dealer;
         // exit();

          $data['action'] = 'update';

          $data['arr_merek'] = $this->cm->arr_dropdown3("m_merek", "kode", "nama", "nama", "id_birojasa", $id_birojasa);
        $data['arr_type'] = $this->cm->arr_dropdown3("m_tipe", "id", "tipe", "tipe", "id_merk", $data['id_merek']);

          $data['arr_dealer'] = $this->cm->arr_dropdown4("dealer", "id", "nama", $id_birojasa);

         $data['arr_polda'] = $this->cm->arr_dropdown("m_polda", "polda_id", "polda_nama", "polda_nama");

         $data['arr_model'] = $this->cm->arr_dropdown3("m_model", "id_model", "model", "model", "id_jenis", $id_jenis  );

         $data['arr_tahun'] = $this->cm->arr_tahun();

        

        $data['arr_jenis'] = $this->cm->arr_dropdown("m_jenis", "id_jenis", "jenis", "jenis");

        $data['arr_provinsi'] = $this->cm->arr_dropdown("tiger_provinsi", "id", "provinsi", "provinsi");

        $data['arr_kota'] = $this->cm->arr_dropdown3("tiger_kota", "id","kota", "kota", "id_provinsi", $id_provinsi );

        $data['arr_kecamatan'] = $this->cm->arr_dropdown3("tiger_kecamatan", "id","kecamatan", "kecamatan", "id_kota", $id_kota);

        $data['arr_desa'] = $this->cm->arr_dropdown3("tiger_desa", "id","desa", "desa", "id_kecamatan", $id_kecamatan);

         $data['arr_samsat'] = $this->cm->arr_dropdown3("samsat", "id","nama", "nama", "id_polda", $id_polda );

        $data['arr_warna'] = $this->cm->arr_dropdown3("m_warna", "WARNA_ID", "WARNA_NAMA", "WARNA_NAMA", "id_birojasa", $id_birojasa);
        
        $data['arr_user'] = $this->cm->arr_dropdown2("pengguna", "id", "nama", "nama", "birojasa_id", $id_birojasa);
        

        $content = $this->load->view("bj_bbn_satu_form_view",$data,true);

         // $content = $this->load->view($this->controller."_form_view",$data,true);

        $this->set_subtitle("Edit Pengurusan BBN1");
        $this->set_title("Edit Pengurusan BBN1");
        $this->set_content($content);
        $this->cetak();

    }

    // function crud

    // Create
function simpan_serah_dealer(){


    $post = $this->input->post();
    
       
        // show_array($post);
        // exit;

        $this->load->library('form_validation');
        $this->form_validation->set_rules('tgl_serah_dealer','Tgl. Serah','required');   
        $this->form_validation->set_rules('nama_penerima_dealer','Nama Penerima','required');

         
        $this->form_validation->set_message('required', ' %s Harus diisi ');
        
        $this->form_validation->set_error_delimiters('', '<br>');

        $userdata = $this->session->userdata('bj_login');
        $post['nama_serah_dealer'] = $userdata['id'];

        //show_array($data);

if($this->form_validation->run() == TRUE ) { 

         $post['status_serah_dealer'] = 1;
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






function simpan(){


    $post = $this->input->post();


        $this->load->library('form_validation');
        $this->form_validation->set_rules('no_rangka','No. Rangka','required');
        $this->form_validation->set_rules('no_mesin','No. Mesin','required'); 
        $this->form_validation->set_rules('no_faktur','No. Faktur','required'); 
        $this->form_validation->set_rules('tgl_faktur','Tanggal Faktur','required'); 
        // $this->form_validation->set_rules('id_merek','Merk','required'); 
        $this->form_validation->set_rules('type','Type','required'); 
        // $this->form_validation->set_rules('id_model','Model','required');     
        // $this->form_validation->set_rules('id_jenis','Jenis','required'); 
        // $this->form_validation->set_rules('id_warna','Warna','required'); 
        $this->form_validation->set_rules('silinder','Silinder','required'); 
        $this->form_validation->set_rules('bahan_bakar','Bahan Bakar','required'); 
        $this->form_validation->set_rules('tahun_buat','Tahun Buat','required'); 
        $this->form_validation->set_rules('kode_dealer','Dealer','required');  
        // $this->form_validation->set_rules('id_desa','Desa','required'); 
        // $this->form_validation->set_rules('id_kecamatan','Kecamatan','required');
        // $this->form_validation->set_rules('id_provinsi','Provinsi','required');
        // $this->form_validation->set_rules('id_kota','Kota','required');
        $this->form_validation->set_rules('id_polda','Polda','required');
        $this->form_validation->set_rules('id_samsat','Samsat','required');
        $this->form_validation->set_rules('tgl_pengajuan','Tanggal Pengajuan','required');         
         
        $this->form_validation->set_message('required', 'Field %s Harus diisi ');
        
        $this->form_validation->set_error_delimiters('', '<br>');

        
        






if($this->form_validation->run() == TRUE ) { 

  $this->db->where('no_rangka', $post['no_rangka']);
  $this->db->where('tahun_buat', $post['tahun_buat']);
  $get = $this->db->get('bj_bbn_satu');
  if ($get->num_rows>0) {
    $arr = array("error"=>true,'message'=>"Data Tersebut Sudah Di Input Sebelumnya");
  }else{
    $post['status'] = 1;
        $post['tgl_faktur'] = flipdate($post['tgl_faktur']);
        $post['tgl_pengajuan'] = flipdate($post['tgl_pengajuan']);

        $userdata = $this->session->userdata('bj_login');
        $birojasa = $userdata['birojasa_id'];

        $primarykey = array('tipe_kendaraan' => $post['type'],
                            'tahun_buat' => $post['tahun_buat'],
                            'id_warna_tnkb' => $post['id_warna_tnkb'],
                            'id_samsat' => $post['id_samsat'],
                            'birojasa' => $birojasa
         );
        $biaya = $this->dm->biaya($primarykey)->row_array();
        if (empty($biaya)) {
            $arr = array("error"=>true,'message'=>"BELUM ADA ESTIMASI BIAYA UNTUK DATA INI </BR> MOHON PERIKSA KEMBALI DATA ANDA");
        }
        else{
        $stnk = $biaya['rp_daftar_stnk'];
        $bpkb = $biaya['rp_daftar_bpkb'];
        $pajak = $biaya['rp_pajak_kendaraan'];
        $ppn = ($biaya['rp_admin_fee']/100)*10;
        $admin = $biaya['rp_admin_fee']+$ppn;

        $post['rp_daftar_stnk']=$stnk;
        $post['rp_daftar_bpkb']=$bpkb;
        $post['rp_pajak_kendaraan']=$pajak;
        $post['rp_admin_fee']=$admin;

         $post['total']=$post['total'];

          

        
        
        $this->db->set('tgl_entri', 'NOW()', FALSE);
        $res = $this->db->insert('bj_bbn_satu', $post); 
        
        if($res){
            $arr = array("error"=>false,'message'=>"BERHASIL DISIMPAN");
        }
        else {
             $arr = array("error"=>true,'message'=>"GAGAL  DISIMPAN");
        }
    }
  }

        
}
else {
    $arr = array("error"=>true,'message'=>validation_errors());
}
        echo json_encode($arr);
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
        $id_pengurus_bpkb = $row['pengurus_bpkb'];
        $id_pengurus_stnk = $row['pengurus_stnk'];
        $no_rangka = $row['no_rangka'];
        $no_mesin = $row['no_mesin'];
        $no_faktur = $row['no_faktur'];
        if ($row['status_stnk']==1&&$row['status_bpkb']==1) {
          if ($row['status_kwitansi']==1) {
            if ($row['status_serah_dealer']==1) {

              $action = "<div class='btn-group'>
                              <button type='button' class='btn btn-default'>Selesai</button>
                              <button type='button' class='btn btn-default dropdown-toggle' data-toggle='dropdown'>
                                <span class='caret'></span>
                                <span class='sr-only'>Toggle Dropdown</span>
                              </button>
                              <ul class='dropdown-menu' role='menu'>
                                <li><a href='bj_bbn_satu/lihatdata?id=$id'  ><i class='fa fa-edit'></i> Detail</a></li>
                              </ul>
                            </div>";            
                          }else{


            $action = "<div class='btn-group'>
                              <button type='button' class='btn btn-default'>Done</button>
                              <button type='button' class='btn btn-default dropdown-toggle' data-toggle='dropdown'>
                                <span class='caret'></span>
                                <span class='sr-only'>Toggle Dropdown</span>
                              </button>
                              <ul class='dropdown-menu' role='menu'>
                                <li><a href='#' onclick=\"modal_dealer('$id')\" ><i class='fa fa-edit'></i> Serah Dealer</a></li>
                              </ul>
                            </div>"; 
                }         
              }else{
                $action = "<div class='btn-group'>
                              <button type='button' class='btn btn-default'>Kwitansi</button>
                              <button type='button' class='btn btn-default dropdown-toggle' data-toggle='dropdown'>
                                <span class='caret'></span>
                                <span class='sr-only'>Toggle Dropdown</span>
                              </button>
                              <ul class='dropdown-menu' role='menu'>
                                <li><a href='#' onclick=\"printkwitansi('$id')\" ><i class='fa fa-trash'></i> Cetak Kwitansi</a></li>
                              </ul>
                            </div>";   
          }
          
        }else{
        $action = "<div class='btn-group'>
                              <button type='button' class='btn btn-default'>Pending</button>
                              <button type='button' class='btn btn-default dropdown-toggle' data-toggle='dropdown'>
                                <span class='caret'></span>
                                <span class='sr-only'>Toggle Dropdown</span>
                              </button>
                              <ul class='dropdown-menu' role='menu'>
                                <li><a href='#' onclick=\"hapus('$id')\" ><i class='fa fa-trash'></i> Hapus</a></li>
                                <li><a href='bj_bbn_satu/editdata?id=$id'><i class='fa fa-edit'></i> Edit</a></li>
                              </ul>
                            </div>";

          }

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

                
                
                $tgl_entri,
                $nama,
                rupiah($row['rp_daftar_bpkb']),
                rupiah($row['rp_daftar_stnk']),
                rupiah($row['rp_pajak_kendaraan']),
                rupiah($row['rp_admin_fee']),
                $pengurus,
                $action
                
                     
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
              rupiah($totalbpkb),
              rupiah($totalstnk),
              rupiah($totalpajak),
              rupiah($totaladmin),
              '',
              '',

             );

         $responce = array('draw' => $draw, // ($start==0)?1:$start,
                          'recordsTotal' => $count, 
                          'recordsFiltered' => $count,
                          'data'=>$arr_data
            );
         
        echo json_encode($responce); 
    }


    // Update

function update(){

    $post = $this->input->post();
   
        $this->load->library('form_validation');
        $this->form_validation->set_rules('no_rangka','No. Rangka','required');
        $this->form_validation->set_rules('no_mesin','No. Mesin','required'); 
        $this->form_validation->set_rules('no_faktur','No. Faktur','required'); 
        $this->form_validation->set_rules('tgl_faktur','Tanggal Faktur','required'); 
        // $this->form_validation->set_rules('id_merek','Merk','required'); 
        $this->form_validation->set_rules('type','Type','required'); 
        // $this->form_validation->set_rules('id_model','Model','required');   
        $this->form_validation->set_rules('silinder','Silinder','required'); 
        $this->form_validation->set_rules('bahan_bakar','Bahan Bakar','required'); 
        $this->form_validation->set_rules('tahun_buat','Tahun Buat','required'); 
        $this->form_validation->set_rules('kode_dealer','Kode Dealer','required');  
        // $this->form_validation->set_rules('id_desa','Desa','required'); 
        // $this->form_validation->set_rules('id_kecamatan','Kecamatan','required');
        // $this->form_validation->set_rules('id_provinsi','Provinsi','required');
        // $this->form_validation->set_rules('id_kota','Kota','required');
        $this->form_validation->set_rules('id_polda','Polda','required');
        $this->form_validation->set_rules('id_samsat','Samsat','required');
        $this->form_validation->set_rules('tgl_pengajuan','Tanggal Pengajuan','required');         
         
        $this->form_validation->set_message('required', 'Field %s Harus diisi ');
        
        $this->form_validation->set_error_delimiters('', '<br>');
       
        

     

        //show_array($data);

if($this->form_validation->run() == TRUE ) { 


        $post['tgl_faktur'] = flipdate($post['tgl_faktur']);
        $post['tgl_pengajuan'] = flipdate($post['tgl_pengajuan']);

        $userdata = $this->session->userdata('bj_login');
        $birojasa = $userdata['birojasa_id'];

        $primarykey = array('tipe_kendaraan' => $post['type'],
                            'tahun_buat' => $post['tahun_buat'],
                            'id_warna_tnkb' => $post['id_warna_tnkb'],
                            'id_samsat' => $post['id_samsat'],
                            'birojasa' => $birojasa
         );
        $biaya = $this->dm->biaya($primarykey)->row_array();

        if(empty($biaya)){
            $arr = array("error"=>true,'message'=>"BELUM ADA ESTIMASI BIAYA UNTUK DATA INI </BR> MOHON PERIKSA KEMBALI DATA EDITAN ANDA");
        }

        else{
        $stnk = $biaya['rp_daftar_stnk'];
        $bpkb = $biaya['rp_daftar_bpkb'];
        $pajak = $biaya['rp_pajak_kendaraan'];
        $admin = $biaya['rp_admin_fee'];

        $post['rp_daftar_stnk']=$stnk;
        $post['rp_daftar_bpkb']=$bpkb;
        $post['rp_pajak_kendaraan']=$pajak;
        $post['rp_admin_fee']=$admin;
   


        $this->db->where("id",$post['id']);
        $res = $this->db->update('bj_bbn_satu', $post); 
        if($res){
            $arr = array("error"=>false,'message'=>"BERHASIL DIUPDATE");
        }
        else {
             $arr = array("error"=>true,'message'=>"GAGAL  DIUPDATE");
        }
    }
}
else {
    $arr = array("error"=>true,'message'=>validation_errors());
}

        echo json_encode($arr);
}


 



   
        // Delete




    function hapusdata(){
    	$get = $this->input->post();
    	$id = $get['id'];

    	$data = array('id' => $id, );

    	$res = $this->db->delete('bj_bbn_satu', $data);
        if($res){
            $arr = array("error"=>false,"message"=>"DATA BERHASIL DIHAPUS");
        }
        else {
            $arr = array("error"=>true,"message"=>"DATA GAGAL DIHAPUS ".mysql_error());
        }
    	//redirect('sa_birojasa');
        echo json_encode($arr);
    }




// Untuk Menu DropDown

        function get_samsat(){
    $data = $this->input->post();
    $userdata = $this->session->userdata('bj_login');
    $birojasa = $userdata['birojasa_id'];

    $id_polda = $data['id_polda'];

    $this->db->where('id_birojasa', $birojasa);
    $this->db->where("id_polda",$id_polda);
    $this->db->order_by("nama");
    $rs = $this->db->get("samsat");
    foreach($rs->result() as $row ) :
        echo "<option value=$row->id>$row->nama </option>";
    endforeach;


}

function get_model(){
    $post = $this->input->post();

    $userdata = $this->session->userdata('bj_login');

    $birojasa = $userdata['birojasa_id'];

    $id_jenis = $post['id_jenis'];
    $model = $post['model'];

    // show_array($post);
    // echo $id_jenis;
    // echo $model;
    // echo $birojasa;
    // $id_model = '';

    $this->db->where("id_birojasa", $birojasa);
    $this->db->where("id_jenis",$id_jenis);
    $this->db->where("model",$model);
    $get_model = $this->db->get('m_model');
    echo $this->db->last_query();
    if ($get_model->num_rows()==0) {
      $data['id_birojasa'] = $birojasa;
      $data['id_jenis'] = $id_jenis;
      $data['model'] = $model;
      $this->db->insert('m_model', $data); 
      echo $this->db->last_query();
      $id_model = $this->db->insert_id();


    }

    
    if (!empty($id_model)) {
      $this->db->where("id_model",$id_model);
    }
    $this->db->where("id_birojasa", $birojasa);
    $this->db->where("id_jenis",$id_jenis);
    $this->db->where("model",$model);
    
    $this->db->order_by("model");
    $rs = $this->db->get("m_model");
    foreach($rs->result() as $row ) :
      echo "<option value=$row->id_model>- $row->model</option>";
      // if ($row->id_model==$id_model) {
      //   echo "<option value=$row->id_model selected>- $row->model</option>";
      // }else{
      //   echo "<option value=$row->id_model>- $row->model</option>";
      // }
    endforeach;


}


function jenis(){
    $post = $this->input->post();

    $userdata = $this->session->userdata('bj_login');
    $birojasa = $userdata['birojasa_id'];

    // show_array($post);
    // echo $post['NamaDealer'];
    // exit;

    //echo "nomor rangka  $no_rangka ";
    $this->db->where("jenis", $post['Jenis']);
    $this->db->where("id_birojasa", $birojasa);
    $type = $this->db->get("m_jenis");

    if ($type->num_rows()==0) {
      $data['id_birojasa'] = $birojasa;
      $data['jenis'] = $post['Jenis'];
      $this->db->insert('m_jenis', $data);
    }

            // $ret = array('' => '- Pilih Satu -', );
            //     foreach($res->result_array() as $row) : 
            //             $ret[$row[$vINDEX]] = $row[$vINDEX].' - '.$row[$vVALUE];
            //     endforeach;

    $this->db->where("jenis", $post['Jenis']);
    $this->db->order_by("id_jenis");
    $rs = $this->db->get("m_jenis");
    foreach($rs->result() as $row ) :

      if ($row->id_jenis==$post['Jenis']) {
        echo "<option value=$row->id_jenis selected>- $row->jenis</option>";
      }else{
        echo "<option value=$row->id_jenis>- $row->jenis</option>";
      }
    endforeach;


    
}

 function get_kabupaten(){
    $data = $this->input->post();

    $id_provinsi = $data['id_provinsi'];
    $this->db->where("id_provinsi",$id_provinsi);
    $this->db->order_by("kota");
    $rs = $this->db->get("tiger_kota");
    foreach($rs->result() as $row ) :
        echo "<option value=$row->id>$row->kota </option>";
    endforeach;


}

 function get_kecamatan(){
    $data = $this->input->post();

    $id_kota = $data['id_kota'];
    $this->db->where("id_kota",$id_kota);
    $this->db->order_by("kecamatan");
    $rs = $this->db->get("tiger_kecamatan");
    foreach($rs->result() as $row ) :
        echo "<option value=$row->id>$row->kecamatan </option>";
    endforeach;


}

 function get_desa(){
    $data = $this->input->post();

    $id_kecamatan = $data['id_kecamatan'];
    $this->db->where("id_kecamatan",$id_kecamatan);
    $this->db->order_by("desa");
    $rs = $this->db->get("tiger_desa");
    foreach($rs->result() as $row ) :
        echo "<option value=$row->id>$row->desa </option>";
    endforeach;


}




function get_biaya(){
    $data_bj = $this->session->userdata("bj_login");
    //show_array($data_bj);

    $post = $this->input->post();


     $this->load->library('form_validation');
        $this->form_validation->set_rules('no_rangka','No. Rangka','required');
        $this->form_validation->set_rules('no_mesin','No. Mesin','required');     
         
        $this->form_validation->set_message('required', 'Field %s Harus diisi ');
        
        $this->form_validation->set_error_delimiters('', '<br>');

        if($this->form_validation->run() == TRUE ) { 

        
        $userdata = $this->session->userdata('bj_login');
        $birojasa = $userdata['birojasa_id'];

        $primarykey = array('tipe_kendaraan' => $post['type'],
                            'tahun_buat' => $post['tahun_buat'],
                            'id_warna_tnkb' => $post['id_warna_tnkb'],
                            'id_samsat' => $post['id_samsat'],
                            'birojasa' => $birojasa
         );
        $biaya = $this->dm->biaya($primarykey)->row_array();
        if (empty($biaya)) {
            $arr = array("error"=>true,'message'=>"BELUM ADA ESTIMASI BIAYA UNTUK DATA INI </BR> MOHON PERIKSA KEMBALI DATA ANDA");
            $arr['total'] = '';
          $arr['rp_daftar_bpkb'] = '';
          $arr['rp_daftar_stnk'] = '';
          $arr['rp_pajak_kendaraan'] = '';
          $arr['rp_admin_fee'] = '';
        }
        else{
           $arr = array("error"=>false);
           $ppn = ($biaya['rp_admin_fee']/100)*10;
        $arr['total'] = rupiah($biaya['rp_daftar_bpkb'] + $biaya['rp_daftar_stnk']  + $biaya['rp_pajak_kendaraan'] +  $biaya['rp_admin_fee'] + $ppn );



        

          $arr['rp_daftar_bpkb'] = rupiah( $biaya['rp_daftar_bpkb']);
          $arr['rp_daftar_stnk'] = rupiah( $biaya['rp_daftar_stnk']);
          $arr['rp_pajak_kendaraan'] = rupiah( $biaya['rp_pajak_kendaraan']);
          $arr['rp_admin_fee'] = rupiah( $biaya['rp_admin_fee']+$ppn);

        
    }
}
else {
    $arr = array("error"=>true,'message'=>validation_errors());
}


    echo json_encode($arr);

}

function get_data_service(){
    $post  = $this->input->post();
    //show_array($post);

    $this->db->where("polda_id",$post['id_polda']);
    $data_polda  = $this->db->get("m_polda")->row();

 

    $data = $data_polda->id_key . date("Ymd") . "APMDATA". $post['no_rangka'];

    // echo "data before signature " . $data . '<hr />';

    $signature = sha1($data);

     // echo "data after signature " .$signature . '<hr />';

    $arr = array(
        "Fn" => "APMDATA",
        "ClientID" => $data_polda->id,
        "Param" => array(
            "Signature" => $signature, 
            "NoRangka"  => $post['no_rangka']
            )

        );


    $json_data = json_encode($arr); 

   // echo $json_data . '<br />';  


    // show_array($data_polda);

   

    $hasil = $this->execute_service($data_polda->url, $json_data) ;

    $arr = json_decode($hasil);

    $arr->Data->TglFaktur = flipdate(todate2($arr->Data->TglFaktur)); 

   // show_array($arr);


    if($arr->Success == "1") {

        echo json_encode($arr);

    }

    

    // echo "hasilnya mana ? " . $hasil;
}


// function get_data_type(){
//     $post = $this->input->post();

//     $no_rangka  = substr($post['no_rangka'], 0, 10); 

//     //echo "nomor rangka  $no_rangka ";
//     $this->db->where("NO_RANGKA", $no_rangka );
//     $data_type = $this->db->get("t_type")->row();
//     echo json_encode($data_type);
// }

function get_tipe(){
    $data = $this->input->post();

    
    $id_merk = $data['id_merek'];

    $userdata = $this->session->userdata('bj_login');
    $birojasa = $userdata['birojasa_id'];

    $this->db->where("id_merk",$id_merk);
    $this->db->where("id_birojasa", $birojasa);
    $this->db->order_by("tipe");
    $rs = $this->db->get("m_tipe");
    echo "<option value=''>- Pilih Tipe -</option>";
    foreach($rs->result() as $row ) :
        echo "<option value=$row->id>$row->tipe </option>";
    endforeach;


}


function dealer(){
    $post = $this->input->post();

    $userdata = $this->session->userdata('bj_login');
    $birojasa = $userdata['birojasa_id'];

    // show_array($post);
    // echo $post['NamaDealer'];
    // exit;

    //echo "nomor rangka  $no_rangka ";
    $this->db->where("id", $post['KodeDealer']);
    $this->db->where("id_birojasa", $birojasa);
    $type = $this->db->get("dealer");

    if ($type->num_rows()==0) {
      $data['id_birojasa'] = $birojasa;
      $data['id'] = $post['KodeDealer'];
      $data['nama'] = $post['NamaDealer'];
      $this->db->insert('dealer', $data);
    }

            // $ret = array('' => '- Pilih Satu -', );
            //     foreach($res->result_array() as $row) : 
            //             $ret[$row[$vINDEX]] = $row[$vINDEX].' - '.$row[$vVALUE];
            //     endforeach;

    $this->db->where("id_birojasa", $birojasa);
    $this->db->order_by("id");
    $rs = $this->db->get("dealer");
    foreach($rs->result() as $row ) :

      if ($row->id==$post['KodeDealer']) {
        echo "<option value=$row->id selected> $row->id - $row->nama</option>";
      }else{
        echo "<option value=$row->id> $row->id - $row->nama</option>";
      }
    endforeach;


    
}


function merk(){
    $post = $this->input->post();

    $userdata = $this->session->userdata('bj_login');
    $birojasa = $userdata['birojasa_id'];

    // show_array($post);
    // // echo $post['NamaDealer'];
    // exit;

    //echo "nomor rangka  $no_rangka ";

    $this->db->where("nama", $post['Merk']);
    $this->db->where("id_birojasa", $birojasa);
    $type = $this->db->get("m_merek");

    if ($type->num_rows()==0&&!(empty($psot['Merk']))) {
      $data['id_birojasa'] = $birojasa;
      $data['kode'] = $post['Merk'];
      $data['nama'] = $post['Merk'];
      $this->db->insert('m_merek', $data);
      $this->db->where("kode", $post['Merk']);
    $this->db->order_by("kode");
    $rs = $this->db->get("m_merek");
    }else{

    $this->db->order_by("kode");
    $rs = $this->db->get("m_merek");
    }

            // $ret = array('' => '- Pilih Satu -', );
            //     foreach($res->result_array() as $row) : 
            //             $ret[$row[$vINDEX]] = $row[$vINDEX].' - '.$row[$vVALUE];
            //     endforeach;

    // $this->db->where("kode", $post['Merk']);
    // $this->db->order_by("kode");
    // $rs = $this->db->get("m_merek");
    foreach($rs->result() as $row ) :

      if ($row->kode==$post['Merk']) {
        echo "<option value=$row->kode selected>- $row->nama</option>";
      }else{
        echo "<option value=$row->kode>- $row->nama</option>";
      }
    endforeach;


    
}




function printkwitansi(){
    $get = $this->input->get(); 
    $userdata = $this->session->userdata('bj_login');
    $birojasa = $userdata['birojasa_id'];

    $id = $get['id'];

    $this->db->where('id', $birojasa);
    $this->db->set('tgl_cetak_kwitansi', 'NOW()', FALSE);
    $data['birojasa'] = $this->db->get('biro_jasa')->row_array();
     
    $dataupdate = array('status_kwitansi' => 1, );

    $this->db->where('id', $id);
    $this->db->update('bj_bbn_satu', $dataupdate);




    $this->db->select('bbn1.*, pb.nama as nm_pengurus_bpkb, ps.nama as nm_pengurus_stnk, m.model as model, j.jenis as jenis, mr.nama as merk, t.tipe as type');

      $this->db->from("bj_bbn_satu bbn1");
      $this->db->join('m_model m','bbn1.model=m.id_model');
      $this->db->join('m_jenis j','bbn1.jenis=j.id_jenis');
      $this->db->join('m_merek mr','bbn1.id_merek=mr.kode');
      $this->db->join('m_tipe t','bbn1.type=t.id');
      $this->db->join('pengguna ps','bbn1.pengurus_stnk=ps.id');
      $this->db->join('pengguna pb','bbn1.pengurus_bpkb=pb.id');
      // $this->db->where('id_birojasa', $id_birojasa);

     
      $this->db->where("bbn1.id",$id);

     $resx = $this->db->get();

    $data['controller'] = get_class($this);
    $data['header'] = "Kwitansi";
    $data['query'] = $resx->row_array();
    
    
    // show_array($data);exit;
    $data['title'] = $data['header'];
    $this->load->library('Pdf');
        $pdf = new Pdf('P', 'mm', 'A4', true, 'UTF-8', false);
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

 

         $html = $this->load->view("pdf/cetak_kwitansi",$data,true);
         $pdf->writeHTML($html, true, false, true, false, '');

 
         $pdf->Output($data['header']. $this->session->userdata("tahun") .'.pdf', 'FI');
}



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

 

         $html = $this->load->view("pdf/cetak_data_view",$data,true);
         $pdf->writeHTML($html, true, false, true, false, '');

 
         $pdf->Output($data['header']. $this->session->userdata("tahun") .'.pdf', 'I');
}

	

}

?>
