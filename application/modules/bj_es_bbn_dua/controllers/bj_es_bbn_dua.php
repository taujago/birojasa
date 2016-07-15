<?php 
class bj_es_bbn_dua extends biro_jasa_controller{
	var $controller;
	function bj_es_bbn_dua(){
		parent::__construct();

		$this->controller = get_class($this);
		$this->load->model($this->controller.'_model','dm');
        $this->load->model("coremodel","cm");
		
		//$this->load->helper("serviceurl");
		
	}







function index(){
		$data_array=array();
		$content = $this->load->view($this->controller."_view",$data_array,true);

		$this->set_subtitle("Estimasi Pengurusan");
		$this->set_title("Estimasi BBN 2");
		$this->set_content($content);
		$this->cetak();
}

function get_samsat(){
    $data = $this->input->post();

    $userdata = $this->session->userdata('bj_login');
    $birojasa = $userdata['birojasa_id'];

    $id_polda = $data['id_polda'];

    $this->db->where("id_birojasa",$birojasa);
    $this->db->where("id_polda",$id_polda);
    $this->db->order_by("nama");
    $rs = $this->db->get("samsat");
    foreach($rs->result() as $row ) :
        echo "<option value=$row->id>$row->nama </option>";
    endforeach;


}



function baru(){
        $data_array=array();

        $userdata = $this->session->userdata('bj_login');
        $birojasa = $userdata['birojasa_id'];

        $data_array['action'] = 'simpan';
        $data_array['arr_polda'] = $this->cm->arr_dropdown("m_polda", "polda_id", "polda_nama", "polda_nama");



        $data_array['arr_perubahan'] = $this->cm->arr_dropdown("perubahan", "id", "nama", "nama");
        
        $data_array['arr_warna'] = $this->cm->arr_dropdown3("m_warna", "WARNA_ID", "WARNA_NAMA", "WARNA_NAMA", "id_birojasa", $birojasa);

        
 $data_array['arr_warna_tnkb'] = $this->cm->arr_dropdown("m_warna_tnkb", "id_warna_tnkb", "warna_tnkb", "warna_tnkb");

        $content = $this->load->view($this->controller."_form_view",$data_array,true);

        $this->set_subtitle("Tambah BBN 1");
        $this->set_title("Tambah BBN 1");
        $this->set_content($content);
        $this->cetak();
}



function simpan(){


    $post = $this->input->post();
    unset($post['id']);
       


        $this->load->library('form_validation');
        $this->form_validation->set_rules('tipe_kendaraan','Tipe Kendaraan','required');    
        $this->form_validation->set_rules('tahun_kendaraan','Tahun Kendaraan','required');
           
        $this->form_validation->set_rules('rp_pendaftaran','Daftar STNK','required');
        $this->form_validation->set_rules('rp_perubahan','Daftar BPKB','required');    
        $this->form_validation->set_rules('rp_admin_fee','Admin Fee','required');    
        // $this->form_validation->set_rules('pelaksana_nip','NIP','required');         
         
        $this->form_validation->set_message('required', ' %s Harus diisi ');
        
        $this->form_validation->set_error_delimiters('', '<br>');

        $userdata = $this->session->userdata("bj_login");
        $post['id_birojasa'] = $userdata['birojasa_id'];

         

        //show_array($data);

if($this->form_validation->run() == TRUE ) { 

        
        $res = $this->db->insert('estimasi_bbn_dua', $post); 
        
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
        
        $this->form_validation->set_rules('rp_pendaftaran','Daftar BPKB','required');    
        $this->form_validation->set_rules('rp_perubahan','Pajak Kendaraan','required');
        $this->form_validation->set_rules('rp_admin_fee','Admin Fee','required');     
        // $this->form_validation->set_rules('email','Email','callback_cek_email');    
        // $this->form_validation->set_rules('pelaksana_nip','NIP','required');         
         
        $this->form_validation->set_message('required', ' %s Harus diisi ');
        
        $this->form_validation->set_error_delimiters('', '<br>');

     

        //show_array($data);

if($this->form_validation->run() == TRUE ) { 

        $this->db->where("id",$post['id']);
        $res = $this->db->update('estimasi_bbn_dua', $post); 
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
        
  
        $tipe_kendaraan = $_REQUEST['columns'][1]['search']['value'];

         $userdata = $this->session->userdata("bj_login");
        $birojasa = $userdata['birojasa_id'];

      //  order[0][column]
        $req_param = array (
				"sort_by" => $sidx,
				"sort_direction" => $sord,
				"limit" => null,
				"tipe_kendaraan" => $tipe_kendaraan,
                "birojasa" => $birojasa
				
				 
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
        

        $action = "<div class='btn-group'>
                              <button type='button' class='btn btn-primary'>Pending</button>
                              <button type='button' class='btn btn-primary dropdown-toggle' data-toggle='dropdown'>
                                <span class='caret'></span>
                                <span class='sr-only'>Toggle Dropdown</span>
                              </button>
                              <ul class='dropdown-menu' role='menu'>
                                <li><a href='#' onclick=\"hapus('$id')\" ><i class='fa fa-trash'></i> Hapus</a></li>
                                <li><a href='bj_es_bbn_dua/editdata?id=$id'><i class='fa fa-edit'></i> Edit</a></li>
                              </ul>
                            </div>";
        	
        	 
        	$arr_data[] = array(
        		$row['id'],
        		$row['tipe_kendaraan'],
        		$row['tahun_kendaraan'],
        		$row['nm_perubahan'],
                $row['nm_samsat'],
                $row['nm_polda'],
        		$action
        		
         			 
        		  				);
        endforeach;

         $responce = array('draw' => $draw, // ($start==0)?1:$start,
        				  'recordsTotal' => $count, 
        				  'recordsFiltered' => $count,
        				  'data'=>$arr_data
        	);
         
        echo json_encode($responce); 
    }

   
    function editdata(){
    	 $get = $this->input->get(); 
    	 $id = $get['id'];

    	 $this->db->where('id',$id);
    	 $estimasi_bbn_satu = $this->db->get('estimasi_bbn_dua');
    	 $data = $estimasi_bbn_satu->row_array();
         $id_polda = $data['id_polda'];


         $data['action'] = 'update';

         $data['arr_polda'] = $this->cm->arr_dropdown("m_polda", "polda_id", "polda_nama", "polda_nama");

         $data['arr_warna'] = $this->cm->arr_dropdown("m_warna", "WARNA_ID", "WARNA_NAMA", "WARNA_NAMA");
         
          $data['arr_samsat'] = $this->cm->arr_dropdown3("samsat", "id","nama", "nama", "id_polda", $id_polda );


  
        $data['arr_warna_tnkb'] = $this->cm->arr_dropdown("m_warna_tnkb", "id_warna_tnkb", "warna_tnkb", "warna_tnkb");

        $data['arr_perubahan'] = $this->cm->arr_dropdown("perubahan", "id", "nama", "nama");

		$content = $this->load->view($this->controller."_form_view",$data,true);

         // $content = $this->load->view($this->controller."_form_view",$data,true);

		$this->set_subtitle("Edit Estimasi Biaya BBN 2");
		$this->set_title("Edit Estimasi Biaya BBN 2");
		$this->set_content($content);
		$this->cetak();

    }




    function hapusdata(){
    	$get = $this->input->post();
    	$id = $get['id'];

    	$data = array('id' => $id, );

    	$res = $this->db->delete('estimasi_bbn_dua', $data);
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