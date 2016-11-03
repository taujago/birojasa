<?php 
class us_bbn_satu extends user_controller{
	var $controller;
    var $status_button = array(1=>"Konfirmasi berkas masuk samsast",
    2=>"Konfirmasi STNK sudah jadi",
    3 => "Konfirmasi BPKB sudah jadi ",
    4 =>"Input kelebihan Biaya",
    5 =>"Penyerahan STNK",
    6 =>"Penyerahan BPKB",
    7 =>"Input Invoice",
    8 =>"SELESAI");
    
	function us_bbn_satu(){
		parent::__construct();

		$this->controller = get_class($this);
		$this->load->model('us_bbn_satu_model','dm');
        $this->load->model("coremodel","cm");
		$this->load->helper("tanggal");

		//$this->load->helper("serviceurl");

		
	}


// Untuk View






    function lihatdata(){

        

         $get = $this->input->get(); 
         $id = $get['id'];

         $this->db->where('id',$id);
         $bbn = $this->db->get('bj_bbn_satu');
         // echo $this->db->last_query(); exit();

         $data = $bbn->row_array();

        $userdata = $this->session->userdata('user_login');
        $pengguna = $userdata['id'];

         if ($data['pengurus_stnk']==$pengguna) {
            
             $data['pengerjaan_stnk'] = 'stnk';
         }
         if($data['pengurus_bpkb']==$pengguna){
            $data['pengerjaan_bpkb']= 'bpkb';
         }
        

         // show_array($data);exit;


         $kota = $this->dm->datawilayah('id', 'tiger_kota', $data['id_kota'], 'kota')->row_array();
         $provinsi = $this->dm->datawilayah('id', 'tiger_provinsi', $data['id_provinsi'], 'provinsi')->row_array();
          $kecamatan = $this->dm->datawilayah('id', 'tiger_kecamatan', $data['id_kecamatan'], 'kecamatan')->row_array();
          $desa = $this->dm->datawilayah('id', 'tiger_desa', $data['id_desa'], 'desa')->row_array();

          $jenis = $this->dm->datawilayah('id_jenis', 'm_jenis', $data['id_jenis'], 'jenis')->row_array();

          $polda = $this->dm->datawilayah('polda_id', 'm_polda', $data['id_polda'], 'polda_nama')->row_array();

          $samsat = $this->dm->datawilayah('id', 'samsat', $data['id_samsat'], 'nama')->row_array();
          $pengurus = $this->dm->datawilayah('id', 'pengguna', $data['user_entri'], 'nama')->row_array();

          $dealer = $this->dm->datawilayah('id', 'dealer', $data['kode_dealer'], 'nama')->row_array();

          $model = $this->dm->datawilayah('id_model', 'm_model', $data['id_model'], 'model')->row_array();

          $merek = $this->dm->datawilayah('kode', 'm_merek', $data['id_merek'], 'nama')->row_array();

          

          // $data['nama_samsat_masuk_user'] = $this->dm->get_user($data['samsat_masuk_user']);
          // $data['nama_stnk_serah_user'] = $this->dm->get_user($data['stnk_serah_user']);
          // $data['nama_bpkb_serah_user'] = $this->dm->get_user($data['bpkb_serah_user']);
          // $data['nama_bayar_user'] = $this->dm->get_user($data['bayar_user']);
          // $data['nama_biaya_lebih_user'] = $this->dm->get_user($data['biaya_lebih_user']);


        $data['nama_dealer'] =  $dealer['nama'];
        $data["jenis"] = $jenis['jenis'];
        $data["model"] = $model['model'];
        $data["merek"] = $merek['nama'];
        
        $data["kota"] = $kota['kota'];
        $data['provinsi'] = $provinsi['provinsi'];
        $data['desa'] = $desa['desa'];
        $data['kecamatan'] = $kecamatan['kecamatan'];
        $data['polda'] = $polda['polda_nama'];
        $data['samsat'] = $samsat['nama'];
        $data['v_rp_daftar_stnk'] = $data['rp_daftar_stnk'];
        $data['v_rp_daftar_bpkb'] = $data['rp_daftar_bpkb'];
        $data['v_rp_admin_fee'] = $data['rp_admin_fee'];
        $data['v_rp_pajak_kendaraan'] = $data['rp_pajak_kendaraan'];
        $data['v_bayar_jumlah_stnk'] = $data['bayar_jumlah_stnk'];
        $data['v_bayar_jumlah_bpkb'] = $data['bayar_jumlah_bpkb'];
        $data['v_biaya_lebih_jumlah_stnk'] = $data['biaya_lebih_jumlah_stnk'];
        // $data['pengurus'] = $pengurus['nama'];
        $data['nama_status'] = $this->status_button[$data['status']];
        $data['rp_daftar_stnk'] = rupiah($data['rp_daftar_stnk']);
        $data['rp_daftar_bpkb'] = rupiah($data['rp_daftar_bpkb']);
        $data['rp_admin_fee'] = rupiah($data['rp_admin_fee']);
        $data['rp_pajak_kendaraan'] = rupiah($data['rp_pajak_kendaraan']);
        $data['bayar_jumlah_stnk'] = rupiah($data['bayar_jumlah_stnk']);
        $data['bayar_jumlah_bpkb'] = rupiah($data['bayar_jumlah_bpkb']);


        
        $data['samsat_masuk_tgl'] = flipdate($data['samsat_masuk_tgl']);
        $data['stnk_serah_tgl'] = flipdate($data['stnk_serah_tgl']);
        $data['bpkb_serah_tgl'] = flipdate($data['bpkb_serah_tgl']);
        $data['stnk_tgl'] = flipdate($data['stnk_tgl']);
        $data['tgl_entri'] = flipdate($data['tgl_entri']);
        $data['bpkb_tgl'] = flipdate($data['bpkb_tgl']);
        $data['tgl_faktur'] = flipdate($data['tgl_faktur']);
        $data['bayar_tgl_stnk'] = flipdate($data['bayar_tgl_stnk']);
        $data['bayar_tgl_bpkb'] = flipdate($data['bayar_tgl_bpkb']);

        

        

        $content = $this->load->view("us_bbn_satu_detail_view",$data,true);

         // $content = $this->load->view($this->controller."_form_view",$data,true);

        $this->set_subtitle("Detail Data");
        $this->set_title("Detail Data BBN 1");
        $this->set_content($content);
        $this->cetak();

    }




function index(){
		$data_array=array();
		$content = $this->load->view($this->controller."_view",$data_array,true);

		$this->set_subtitle("Pengurusan BBN 1");
		$this->set_title("Pngurusan BBN 1");
		$this->set_content($content);
		$this->cetak();
}

    






   function get_data() {

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
        
  
        $tanggal_awal = $_REQUEST['columns'][1]['search']['value'];
        $tanggal_akhir = $_REQUEST['columns'][2]['search']['value'];
        $no_rangka = $_REQUEST['columns'][3]['search']['value'];
      //  order[0][column]
        $req_param = array (
                "sort_by" => $sidx,
                "sort_direction" => $sord,
                "limit" => null,
                "tanggal_awal" => $tanggal_awal,
                "tanggal_akhir" => $tanggal_akhir,
                "no_rangka" => $no_rangka, 
                "id_birojasa" => $id_birojasa, 
                "id" => $pengguna,    
        );     
           
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
        $no_rangka = $row['no_rangka'];

        if ($row['status'] < 2) {
        $hapus = "<a href ='us_bbn_satu/lihatdata?id=$id' class='btn btn-primary btn-xs'><i class='fa fa-edit'></i> Detail</a>";
        
        $nama ="<a href='us_bbn_satu/lihatdata?id=$id'>$no_rangka</a>";
        }else{
         $hapus = "<a href='us_bbn_satu/lihatdata?id=$id' class='btn btn-success btn-xs'>Selesai</a>";
         $nama ="<a href='us_bbn_satu/lihatdata?id=$id'>$no_rangka</a>";
        }
        
            
             
            $arr_data[] = array(
                $row['id'],
                $row['tgl_entri'],
                $nama,
                $row['no_mesin'],
                $row['nama_pemilik'],
                rupiah($row['rp_daftar_stnk']),
                rupiah($row['rp_daftar_bpkb']),
                rupiah($row['rp_pajak_kendaraan']),
                rupiah($row['rp_admin_fee']),
                $hapus
                
                     
                                );
        endforeach;

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
    $id = $post['id'];


    $this->load->library('form_validation');

    $this->db->where('id', $id);
    $this->db->where('status', 0);
    $vld = $this->db->get('bj_bbn_satu');

    
    if($vld->num_rows() > 0){


        $post['status']=1;
        $this->db->where("id",$id);
        $this->db->set('tgl_update', 'NOW()', FALSE);
        $res = $this->db->update('bj_bbn_satu', $post);
        if($res){
            $arr = array("error"=>false,'message'=>"BERHASIL DISIMPAN");
        }
        else {
             $arr = array("error"=>true,'message'=>"GAGAL  DISIMPAN");
        }
    }
    else{
        $arr = array("error"=>true, 'message'=>"ERROR DATABASE");
    }
        echo json_encode($arr);

}




function update_stnk1(){

    $userdata = $this->session->userdata('user_login');
    $post = $this->input->post();
    $id = $post['id'];


    $post['samsat_masuk_user'] = $userdata['id'];
    $post['samsat_masuk_tgl'] = flipdate($post['samsat_masuk_tgl']);
    $post['stnk_serah_tgl'] = flipdate($post['stnk_serah_tgl']);
    $post['stnk_tgl'] = flipdate($post['stnk_tgl']);
    $post['bayar_tgl_stnk'] = flipdate($post['bayar_tgl_stnk']);

    $post['biaya_lebih_jumlah_stnk'] = bersih($post['biaya_lebih_jumlah_stnk']);
    $post['bayar_jumlah_stnk'] = bersih($post['bayar_jumlah_stnk']);
    // unset($post['bayar_jumlah']);

    foreach ($post as $key => $value) {
        if(empty($value)){
            unset($post[$key]);
        }
    }

    // show_array($post);
    // echo count($post);
    // exit;

    if (empty($post['samsat_masuk_tgl'])) {
        unset($post['samsat_masuk_user']);
    }

    if (!empty($post['stnk_serah_tanggal'])) {
        $post['stnk_serah_user'] = $userdata['id'];
    }

    if (!empty($post['biaya_lebih_jumlah_stnk'])) {
        $post['biaya_lebih_user'] = $userdata['id'];
    }

    // if (!empty($post['bpkb_serah_tgl'])) {
    //     $post['bpkb_serah_user'] = $userdata['id'];
    // }

    if (!empty($post['bayar_tgl_stnk'])) {
        $post['bayar_user_stnk'] = $userdata['id'];
    }
    if (!empty($post['stnk_serah_tgl'])) {
        $post['stnk_serah_user'] = $userdata['id'];
    }

    $this->load->library('form_validation');

    $this->db->where('id', $id);
    $this->db->where('status_stnk', 0);
    $vld = $this->db->get('bj_bbn_satu');


    
    if($vld->num_rows() > 0){


        // $post['status']=2;
        $this->db->where("id",$id);
        $this->db->set('tgl_update', 'NOW()', FALSE);
        $res = $this->db->update('bj_bbn_satu', $post);
        if($res){
            $arr = array("error"=>false,'message'=>"BERHASIL DISIMPAN");
            
        }
        else {
             $arr = array("error"=>true,'message'=>"GAGAL  DISIMPAN");
        }
    }
    else{
        $arr = array("error"=>true, 'message'=>"DATA BBN INI TELAH ANDA KONFIRMASI SEBELUMNYA");
    }
        echo json_encode($arr);

}


function update_bpkb1(){

    $userdata = $this->session->userdata('user_login');
    $post = $this->input->post();
    $id = $post['id'];

    
    $post['bpkb_serah_tgl'] = flipdate($post['bpkb_serah_tgl']);
    $post['bpkb_tgl'] = flipdate($post['bpkb_tgl']);
    $post['bayar_tgl_bpkb'] = flipdate($post['bayar_tgl_bpkb']);

    $post['biaya_lebih_jumlah_bpkb'] = bersih($post['biaya_lebih_jumlah_bpkb']);
    $post['bayar_jumlah_bpkb'] = bersih($post['bayar_jumlah_bpkb']);
    // unset($post['bayar_jumlah']);

    foreach ($post as $key => $value) {
        if(empty($value)){
            unset($post[$key]);
        }
    }

    // show_array($post);
    // echo count($post);
    // exit;

    

    if (!empty($post['bpkb_serah_tanggal'])) {
        $post['bpkb_serah_user'] = $userdata['id'];
    }

    if (!empty($post['biaya_lebih_jumlah_bpkb'])) {
        $post['biaya_lebih_user'] = $userdata['id'];
    }

    // if (!empty($post['bpkb_serah_tgl'])) {
    //     $post['bpkb_serah_user'] = $userdata['id'];
    // }

    if (!empty($post['bayar_tgl_bpkb'])) {
        $post['bayar_user_bpkb'] = $userdata['id'];
    }
    if (!empty($post['bpkb_serah_tgl'])) {
        $post['bpkb_serah_user'] = $userdata['id'];
    }

    $this->load->library('form_validation');

    $this->db->where('id', $id);
    $this->db->where('status_bpkb', 0);
    $vld = $this->db->get('bj_bbn_satu');


    
    if($vld->num_rows() > 0){


        // $post['status']=2;
        $this->db->where("id",$id);
        $this->db->set('tgl_update', 'NOW()', FALSE);
        $res = $this->db->update('bj_bbn_satu', $post);
        if($res){
            $arr = array("error"=>false,'message'=>"BERHASIL DISIMPAN");
            
        }
        else {
             $arr = array("error"=>true,'message'=>"GAGAL  DISIMPAN");
        }
    }
    else{
        $arr = array("error"=>true, 'message'=>"DATA BBN INI TELAH ANDA KONFIRMASI SEBELUMNYA");
    }
        echo json_encode($arr);

}


function update_bpkb2(){

    
    $post = $this->input->post();
    
   
    // show_array($post);
    // exit;
    
    $this->load->library('form_validation');
    $this->form_validation->set_rules('bpkb_tgl','Tgl. BPKB','required');
    $this->form_validation->set_rules('biaya_lebih_jumlah_bpkb','Biaya Lebih','required');
    $this->form_validation->set_rules('bpkb_serah_tgl','Tgl. Serah BPKB','required');
    $this->form_validation->set_rules('bayar_tgl_bpkb','Tgl. Pembayaran','required');
    $this->form_validation->set_rules('bayar_metode_bpkb','Metode Bayar','required');
    $this->form_validation->set_rules('bayar_ref_cc_bpkb','Ref. ID Debit','required');
    $this->form_validation->set_rules('bayar_no_cc_bpkb','No. Kartu Debit','required');
    $this->form_validation->set_rules('bpkb_no','No. BPKB','required');
    $this->form_validation->set_rules('bayar_jumlah_bpkb','Jumlah Pembayaran','required');
         
    $this->form_validation->set_message('required', 'Anda Belum Mengisi Field %s');
        
    $this->form_validation->set_error_delimiters('', '<br>');

    $userdata = $this->session->userdata('user_login');
    $id = $post['id'];
    
    $post['bpkb_serah_tgl'] = flipdate($post['bpkb_serah_tgl']);
    $post['bpkb_tgl'] = flipdate($post['bpkb_tgl']);
    $post['bayar_tgl_bpkb'] = flipdate($post['bayar_tgl_bpkb']);

    $post['biaya_lebih_jumlah_bpkb'] = bersih($post['biaya_lebih_jumlah_bpkb']);
    $post['bayar_jumlah_bpkb'] = bersih($post['bayar_jumlah_bpkb']);
    
    $post['status_bpkb'] = '1';

    $this->db->where('id', $id);
    $this->db->where('status_bpkb', 0);
    $vld = $this->db->get('bj_bbn_satu');

    

     if (!empty($post['bpkb_serah_tanggal'])) {
        $post['bpkb_serah_user'] = $userdata['id'];
    }

    if (!empty($post['biaya_lebih_jumlah_bpkb'])) {
        $post['biaya_lebih_user'] = $userdata['id'];
    }

    // if (!empty($post['bpkb_serah_tgl'])) {
    //     $post['bpkb_serah_user'] = $userdata['id'];
    // }

    if (!empty($post['bayar_tgl_bpkb'])) {
        $post['bayar_user_bpkb'] = $userdata['id'];
    }
    if (!empty($post['bpkb_serah_tgl'])) {
        $post['bpkb_serah_user'] = $userdata['id'];
    }

    
   if($this->form_validation->run() == TRUE ){


        // $post['status']=2;
        $this->db->where("id",$id);
        $this->db->set('tgl_update', 'NOW()', FALSE);
        $res = $this->db->update('bj_bbn_satu', $post);
        if($res){
            $arr = array("error"=>false,'message'=>"BERHASIL DISIMPAN");
            
        }
        else {
             $arr = array("error"=>true,'message'=>"GAGAL  DISIMPAN");
        }
    }
    else{
        $arr = array("error"=>true,'message'=>validation_errors());
    }
        echo json_encode($arr);

}


function update_stnk2(){

    
    $post = $this->input->post();
    
   
    // show_array($post);
    // exit;
    
    $this->load->library('form_validation');
    $this->form_validation->set_rules('samsat_masuk_tgl','No. STNK','required');
    $this->form_validation->set_rules('stnk_tgl','Tgl. STNK','required');
    $this->form_validation->set_rules('biaya_lebih_jumlah_stnk','Biaya Lebih','required');
    $this->form_validation->set_rules('stnk_serah_tgl','Tgl. Serah STNK','required');
    $this->form_validation->set_rules('bayar_tgl_stnk','Tgl. Pembayaran','required');
    $this->form_validation->set_rules('bayar_metode_stnk','Metode Bayar','required');
    $this->form_validation->set_rules('bayar_ref_cc_stnk','Ref. ID Debit','required');
    $this->form_validation->set_rules('bayar_no_cc_stnk','No. Kartu Debit','required');
    $this->form_validation->set_rules('stnk_no','No. STNK','required');
    $this->form_validation->set_rules('bayar_jumlah_stnk','Jumlah Pembayaran','required');
         
    $this->form_validation->set_message('required', 'Anda Belum Mengisi Field %s');
        
    $this->form_validation->set_error_delimiters('', '<br>');

    $userdata = $this->session->userdata('user_login');
    $id = $post['id'];
    $post['samsat_masuk_user'] = $userdata['id'];
    $post['samsat_masuk_tgl'] = flipdate($post['samsat_masuk_tgl']);
    $post['stnk_serah_tgl'] = flipdate($post['stnk_serah_tgl']);
    $post['stnk_tgl'] = flipdate($post['stnk_tgl']);
    $post['bayar_tgl_stnk'] = flipdate($post['bayar_tgl_stnk']);

    $post['biaya_lebih_jumlah_stnk'] = bersih($post['biaya_lebih_jumlah_stnk']);
    $post['bayar_jumlah_stnk'] = bersih($post['bayar_jumlah_stnk']);
    
    $post['status_stnk'] = '1';

    $this->db->where('id', $id);
    $this->db->where('status_stnk', 0);
    $vld = $this->db->get('bj_bbn_satu');

    if (empty($post['samsat_masuk_tgl'])) {
        unset($post['samsat_masuk_user']);
    }

    if (!empty($post['stnk_serah_tanggal'])) {
        $post['stnk_serah_user'] = $userdata['id'];
    }

    if (!empty($post['biaya_lebih_jumlah'])) {
        $post['biaya_lebih_user'] = $userdata['id'];
    }


    if (!empty($post['bayar_tgl_stnk'])) {
        $post['bayar_user_stnk'] = $userdata['id'];
    }
    if (!empty($post['stnk_serah_tgl'])) {
        $post['stnk_serah_user'] = $userdata['id'];
    }

    
   if($this->form_validation->run() == TRUE ){


        // $post['status']=2;
        $this->db->where("id",$id);
        $this->db->set('tgl_update', 'NOW()', FALSE);
        $res = $this->db->update('bj_bbn_satu', $post);
        if($res){
            $arr = array("error"=>false,'message'=>"BERHASIL DISIMPAN");
            
        }
        else {
             $arr = array("error"=>true,'message'=>"GAGAL  DISIMPAN");
        }
    }
    else{
        $arr = array("error"=>true,'message'=>validation_errors());
    }
        echo json_encode($arr);

}





 



   
        // Delete







// Untuk Menu DropDown

        function get_samsat(){
    $data = $this->input->post();

    $id_polda = $data['id_polda'];
    $this->db->where("id_polda",$id_polda);
    $this->db->order_by("nama");
    $rs = $this->db->get("samsat");
    foreach($rs->result() as $row ) :
        echo "<option value=$row->id>$row->nama </option>";
    endforeach;


}

function get_model(){
    $data = $this->input->post();

    $id_jenis = $data['id_jenis'];
    $this->db->where("id_jenis",$id_jenis);
    $this->db->order_by("model");
    $rs = $this->db->get("m_model");
    foreach($rs->result() as $row ) :
        echo "<option value=$row->id_model>$row->model </option>";
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

	

}

?>