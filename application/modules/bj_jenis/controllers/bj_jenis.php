<?php 
class bj_jenis extends biro_jasa_controller{
	var $controller;
	function bj_jenis(){
		parent::__construct();

		$this->controller = get_class($this);
		$this->load->model($this->controller.'_model','dm');
		
	}








function index(){
		$data_array=array();
		$content = $this->load->view($this->controller."_view",$data_array,true);

		$this->set_subtitle("Data Jenis");
		$this->set_title("Data Jenis");
		$this->set_content($content);
		$this->cetak();
}


function baru(){
    
        $data_array['action'] = 'simpan';

        $content = $this->load->view($this->controller."_form_view",$data_array,true);
        $this->set_subtitle("Tambah Jenis");
        $this->set_title("Tambah Jenis");
        $this->set_content($content);
        $this->cetak();
    }




function simpan(){


    $post = $this->input->post();
       


        $this->load->library('form_validation');
        $this->form_validation->set_rules('jenis','JENIS','required');
          
          
         
        $this->form_validation->set_message('required', ' %s Harus diisi ');
        
        $this->form_validation->set_error_delimiters('', '<br>');

     

        //show_array($data);

if($this->form_validation->run() == TRUE ) { 

        $userdata = $this->session->userdata('bj_login');
        $post['id_birojasa'] = $userdata['birojasa_id'];
        
        $res = $this->db->insert('m_jenis', $post); 
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
        $this->form_validation->set_rules('jenis','Jenis','required');     
        $this->form_validation->set_message('required', ' %s Harus diisi ');
        
        $this->form_validation->set_error_delimiters('', '<br>');

     

        //show_array($data);

if($this->form_validation->run() == TRUE ) { 

        $this->db->where("id_jenis",$post['id_jenis']);
        $res = $this->db->update('m_jenis', $post); 

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
        
  
        $jenis = $_REQUEST['columns'][1]['search']['value'];
        
        $userdata = $this->session->userdata('bj_login');
        $birojasa = $userdata['birojasa_id']; 


      //  order[0][column]
        $req_param = array (
				"sort_by" => $sidx,
				"sort_direction" => $sord,
				"limit" => null,
				"jenis" => $jenis,
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
		$id = $row['id_jenis'];

        $action = "<div class='btn-group'>
                              <button type='button' class='btn btn-primary'>Action</button>
                              <button type='button' class='btn btn-primary dropdown-toggle' data-toggle='dropdown'>
                                <span class='caret'></span>
                                <span class='sr-only'>Toggle Dropdown</span>
                              </button>
                              <ul class='dropdown-menu' role='menu'>
                                <li><a href='#' onclick=\"hapus('$id')\" ><i class='fa fa-trash'></i> Hapus</a></li>
                                <li><a href='bj_jenis/editdata?id=$id'><i class='fa fa-edit'></i> Edit</a></li>
                              </ul>
                            </div>";
        	
        	 
        	$arr_data[] = array(
        		$row['id_jenis'],
        		$row['jenis'],
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

         $this->db->where('id_jenis',$id);
         $jenis = $this->db->get('m_jenis');
         $data_array = $jenis->row_array();

         $data_array['action'] = 'update';
         // show_array($data); exit;
    	 
		

    	// $data_array=array(
    	// 		'id' => $data->id,
    	// 		'nama' => $data->nama,
    	// 		'no_siup' => $data->no_siup,
    	// 		'no_npwp' => $data->no_npwp,
    	// 		'no_tdp' => $data->no_tdp,
    	// 		'telp' => $data->telp,
    	// 		'alamat' => $data->alamat,
    	// 		'email' => $data->email,
    	// 		'hp' => $data->hp,

    	// 	);

        

        $content = $this->load->view($this->controller."_form_view",$data_array,true);

		$this->set_subtitle("Edit Jenis");
		$this->set_title("Edit Jenis");
		$this->set_content($content);
		$this->cetak();

    }




    function hapusdata(){
    	$get = $this->input->post();
    	$jenis = $get['jenis'];

    	$data = array('id_jenis' => $jenis, );

    	$res = $this->db->delete('m_jenis', $data);
        if($res){
            $arr = array("error"=>false,"message"=>"DATA BERHASIL DIHAPUS");
        }
        else {
            $arr = array("error"=>true,"message"=>"DATA GAGAL DIHAPUS ".mysql_error());
        }
    	//redirect('sa_birojasa');
        echo json_encode($arr);
    }



	// function simpan(){
	// 	$post = $this->input->post();
	// 	$password = md5($post['password']);
	// 	$data = array('nama' => $post['nama'],
	// 					'email' => $post['email'],
	// 					'alamat' => $post['alamat'],
	// 					'password' => $password,
	// 					'level' => 2);
	// 	$this->db->insert('sa_birojasa', $data); 

	// 	redirect('sa_birojasa');
	// }





	

}

?>