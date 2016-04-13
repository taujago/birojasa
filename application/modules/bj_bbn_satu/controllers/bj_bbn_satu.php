<?php 
class bj_bbn_satu extends biro_jasa_controller{
	var $controller;
	function bj_bbn_satu(){
		parent::__construct();

		$this->controller = get_class($this);
		$this->load->model('bj_bbn_satu_model','dm');
        $this->load->model("coremodel","cm");
		
		//$this->load->helper("serviceurl");
		
	}







function index(){
		$data_array=array();
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
        $data_array['arr_provinsi'] = $this->cm->arr_dropdown("tiger_provinsi", "id", "provinsi", "provinsi");
        
        $data_array['arr_user'] = $this->cm->arr_dropdown2("pengguna", "id", "nama", "nama", "birojasa_id", $id_birojasa);

        // Load Page
        $content = $this->load->view($this->controller."_form_view",$data_array,true);

        $this->set_subtitle("Tambah BBN 1");
        $this->set_title("Tambah BBN 1");
        $this->set_content($content);
        $this->cetak();
}



function simpan(){


    $post = $this->input->post();
    
       


        $this->load->library('form_validation');
        $this->form_validation->set_rules('no_rangka','No. Rangka','required');
        $this->form_validation->set_rules('no_mesin','No. Mesin','required'); 
        $this->form_validation->set_rules('no_faktur','No. Faktur','required'); 
        $this->form_validation->set_rules('tgl_faktur','Tanggal Faktur','required'); 
        $this->form_validation->set_rules('merek','Merk','required'); 
        $this->form_validation->set_rules('type','Type','required'); 
        $this->form_validation->set_rules('model','Model','required');     
        $this->form_validation->set_rules('jenis','Jenis','required'); 
        $this->form_validation->set_rules('warna','Warna','required'); 
        $this->form_validation->set_rules('silinder','Silinder','required'); 
        $this->form_validation->set_rules('bahan_bakar','Bahan Bakar','required'); 
        $this->form_validation->set_rules('tahun_buat','Tahun Buat','required'); 
        $this->form_validation->set_rules('kode_dealer','Kode Dealer','required'); 
        $this->form_validation->set_rules('nama_dealer','Nama Dealer','required'); 
        $this->form_validation->set_rules('id_desa','Desa','required'); 
        $this->form_validation->set_rules('id_kecamatan','Kecamatan','required');
        $this->form_validation->set_rules('id_provinsi','Provinsi','required');
        $this->form_validation->set_rules('id_kota','Kota','required');
        $this->form_validation->set_rules('id_polda','Polda','required');
        $this->form_validation->set_rules('id_samsat','Samsat','required');
        $this->form_validation->set_rules('tgl_entri','Tanggal Entri','required');         
         
        $this->form_validation->set_message('required', 'Field %s Harus diisi ');
        
        $this->form_validation->set_error_delimiters('', '<br>');

     

        //show_array($data);

if($this->form_validation->run() == TRUE ) { 

        
        $res = $this->db->insert('bj_bbn_satu', $post); 
        
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

function update(){

    $post = $this->input->post();
   
       
        $this->load->library('form_validation'); 
        $this->form_validation->set_rules('tipe_kendaraan','Tipe Kendaraan','required');    
        $this->form_validation->set_rules('tahun_kendaraan','Tahun Kendaraan','required');
        $this->form_validation->set_rules('warna_tnkb','Warna TNKB','required');    
        $this->form_validation->set_rules('rp_daftar_stnk','Daftar STNK','required');
        $this->form_validation->set_rules('rp_daftar_bpkb','Daftar BPKB','required');    
        $this->form_validation->set_rules('rp_pajak_kendaraan','Pajak Kendaraan','required');
        $this->form_validation->set_rules('rp_admin_fee','Admin Fee','required');     
        // $this->form_validation->set_rules('email','Email','callback_cek_email');    
        // $this->form_validation->set_rules('pelaksana_nip','NIP','required');         
         
        $this->form_validation->set_message('required', ' %s Harus diisi ');
        
        $this->form_validation->set_error_delimiters('', '<br>');

     

        //show_array($data);

if($this->form_validation->run() == TRUE ) { 

        $this->db->where("id",$post['id']);
        $res = $this->db->update('estimasi_bbn_satu', $post); 
        if($res){
            $arr = array("error"=>false,'message'=>"BERHASIL DIUPDATE");
        }
        else {
             $arr = array("error"=>true,'message'=>"GAGAL  DIUPDATE");
        }
}
else {
    $arr = array("error"=>true,'message'=>validation_errors());
}

        echo json_encode($arr);
}


    function get_data() {

        
        


        
    	
    	// show_array($userdata);

    	$draw = $_REQUEST['draw']; // get the requested page 
    	$start = $_REQUEST['start'];
        $limit = $_REQUEST['length']; // get how many rows we want to have into the grid 
        $sidx = isset($_REQUEST['order'][0]['column'])?$_REQUEST['order'][0]['column']:0; // get index row - i.e. user click to sort 
        $sord = isset($_REQUEST['order'][0]['dir'])?$_REQUEST['order'][0]['dir']:"asc"; // get the direction if(!$sidx) $sidx =1;  
        
  
        $no_rangka = $_REQUEST['columns'][1]['search']['value'];
        $userdata = $this->session->userdata('bj_login');
        $id_birojasa = $userdata['birojasa_id'];
        // $userdata = $this->session->userdata('bj_login');
        // $id_birojasa = $userdata['birojasa_id'];



      //  order[0][column]
        $req_param = array (
				"sort_by" => $sidx,
				"sort_direction" => $sord,
				"limit" => null,
				"no_rangka" => $no_rangka, 
                "id_birojasa" => $id_birojasa	 
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
        $hapus = "<a href ='#' onclick=\"hapus('$id')\" class='btn btn-danger btn-xs'><i class='fa fa-trash'></i>Hapus</a>
        <a href ='bj_bbn_satu/editdata?id=$id' class='btn btn-primary btn-xs'><i class='fa fa-edit'></i>Edit</a>";
        	
        	 
        	$arr_data[] = array(
        		$row['id'],
        		$row['no_rangka'],
        		$row['no_mesin'],
        		$row['tgl_faktur'],
                $row['tgl_entri'],
                $row['bj_nama_user'],
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

   
    function editdata(){
    	 $get = $this->input->get(); 
    	 $id = $get['id'];

    	 $this->db->where('id',$id);
    	 $estimasi_bbn_satu = $this->db->get('estimasi_bbn_satu');
    	 $data = $estimasi_bbn_satu->row_array();


         

          $data['action'] = 'update';

         $data['arr_polda'] = $this->cm->arr_dropdown("m_polda", "polda_id", "polda_nama", "polda_nama");

        $data['arr_samsat'] = $this->cm->arr_dropdown("samsat", "id","nama", "nama", "nama");

        

		$content = $this->load->view("sa_bbn_satu_form_edit_view",$data,true);

         // $content = $this->load->view($this->controller."_form_view",$data,true);

		$this->set_subtitle("Edit Estimasi");
		$this->set_title("BBN 1");
		$this->set_content($content);
		$this->cetak();

    }




    function hapusdata(){
    	$get = $this->input->post();
    	$id = $get['id'];

    	$data = array('id' => $id, );

    	$res = $this->db->delete('estimasi_bbn_satu', $data);
        if($res){
            $arr = array("error"=>false,"message"=>"DATA BERHASIL DIHAPUS");
        }
        else {
            $arr = array("error"=>true,"message"=>"DATA GAGAL DIHAPUS ".mysql_error());
        }
    	//redirect('sa_birojasa');
        echo json_encode($arr);
    }








	

}

?>