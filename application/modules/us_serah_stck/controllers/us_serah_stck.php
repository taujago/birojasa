<?php 
class us_serah_stck extends user_controller{
	var $controller;
    
    
	function us_serah_stck(){
		parent::__construct();

		$this->controller = get_class($this);
		$this->load->model('us_serah_stck_model','dm');
        $this->load->model("coremodel","cm");
		$this->load->helper("tanggal");

	
		
	}








function index(){
		

        $data_array=array();

        $userdata = $this->session->userdata('user_login');
        $id = $userdata['id'];

        $req_param = array('id' => $userdata['id'], );

        $data = $this->dm->data($req_param);
        $data_array['arr_samsat'] = $this->cm->arr_dropdown3("samsat", "id","nama", "nama", "id_birojasa", $userdata['birojasa_id'] );

        $data_array['data'] = $data;


		$content = $this->load->view($this->controller."_view",$data_array,true);


		$this->set_subtitle("Penyerahan STCK Ke-Samsat");
		$this->set_title("STCK");
		$this->set_content($content);
		$this->cetak();
}



 function cekbiaya(){
    $post = $this->input->post();

    $biaya = 0;

    if(!empty($post['data'])){
    
    foreach ($post['data'] as $key => $value) {
        $check = $this->dm->cekbiaya($value);
        $biaya = $biaya + $check['rp_daftar_stck'];
        
         }
    }
    
    echo json_encode($biaya);
 }



 function simpan(){
    $post = $this->input->post();
    $userdata = $this->session->userdata('user_login');
    extract($post);

    $this->load->library('form_validation');
    $this->form_validation->set_rules('id_samsat','Pilih Samsat Dulu','required');
    $this->form_validation->set_message('required', ' %s Harus diisi ');
    $this->form_validation->set_error_delimiters('', '<br>');

    
if(!empty($chb)) { 

    $this->db->where('id_birojasa', $userdata['birojasa_id']);
    $cek_no = $this->db->get('no_ref_stck');
    if ($cek_no->num_rows()<1) {
        $ref = array('no_terakhir' => 1,
                    'id_birojasa' => $userdata['birojasa_id'], );
        $tambah_ref = $this->db->insert('no_ref_stck', $ref);
    }else{
        $no_terakhir = $cek_no->row_array();
        $no_baru = $no_terakhir['no_terakhir']+1;
        $ref = array('no_terakhir' => $no_baru );
        $this->db->where('id_birojasa', $userdata['birojasa_id']);
        $update_ref = $this->db->update('no_ref_stck', $ref);
    }


    $no_ref_stck = 'REF.'.sprintf("%06d", $ref['no_terakhir']).'/STCK'; 
    $tanggal = date("Y-m-d");

    $data_ref_stck = array('no_ref' => $no_ref_stck,
                            'jumlah_berkas' => count($chb),
                            'tanggal' => $tanggal,
                            'id_user' => $userdata['id'],
                            'id_birojasa' => $userdata['birojasa_id'],
                            'id_samsat' => $id_samsat );
        $res = $this->db->insert('ref_stck', $data_ref_stck);
         
        if($res){

            $data_update = array('no_ref_stck' => $no_ref_stck,
                                'status_stck' => 1, 
                                'status' => 1,);

            foreach ($chb as $key => $value) {
                $this->db->where('id', $value);
                $update = $this->db->update('bj_bbn_satu', $data_update);    
            }

            $arr = array("error"=>false,'message'=>"BERHASIL DISIMPAN");
        }
        else {
             $arr = array("error"=>true,'message'=>"GAGAL  DISIMPAN");
        }
}
else {
    $arr = array("error"=>true,'message'=> 'Pilih salah satu data');
}
        echo json_encode($arr);     

    // foreach ($chb as $x) {
    //     echo $x;
    // }
 }


function get_data() {

        $userdata = $this->session->userdata('user_login');
        
        // echo $userdata['nama']; 
        $id_birojasa = $userdata['birojasa_id']; 
        // echo $userdata['birojasa']; 
        // show_array($userdata); exit();

        // echo $id_pengguna;
        // exit();

        $draw = $_REQUEST['draw']; // get the requested page 
        $start = $_REQUEST['start'];
        $limit = $_REQUEST['length']; // get how many rows we want to have into the grid 
        $sidx = isset($_REQUEST['order'][0]['column'])?$_REQUEST['order'][0]['column']:0; // get index row - i.e. user click to sort 
        $sord = isset($_REQUEST['order'][0]['dir'])?$_REQUEST['order'][0]['dir']:"asc"; // get the direction if(!$sidx) $sidx =1;  
        
        $user_id = $userdata['id'];
        $samsat = $_REQUEST['columns'][1]['search']['value'];
      //  order[0][column]
        $req_param = array (
                "sort_by" => $sidx,
                "sort_direction" => $sord,
                "limit" => null,
                "samsat" => $samsat,
                "id_birojasa" => $id_birojasa, 
                "user_id" => $user_id,    
        );     

        
           
        $result = $this->dm->get_data($req_param)->result_array();
        
       
        

        $arr_data = array();
        foreach($result as $row) : 
        // $daft_id = $row['daft_id'];
        $id = $row['id'];
                    
             $cek = '<input type="checkbox" name="chb[]" value="'.$id.'" class="check" id="chb" onchange="biaya()" >';

            $arr_data[] = array(
                $cek,
                $row['no_rangka'],
                $row['no_mesin'],
                $row['no_faktur'],
                $row['nama_pemilik'],
                rupiah($row['rp_daftar_stck']),
                
                     
                                );
        endforeach;

         $responce = array('draw' => $draw, 
                          'data'=>$arr_data
            );
         
        echo json_encode($responce); 
    }




	

}

?>