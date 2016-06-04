<?php 
class bj_model extends biro_jasa_controller{
	var $controller;
	function bj_model(){
		parent::__construct();

		$this->controller = get_class($this);
		$this->load->model($this->controller.'_model','dm');
        $this->load->model('coremodel','cm');




		
		//$this->load->helper("serviceurl");
		
	}








function index(){
		$data_array=array();
		$content = $this->load->view($this->controller."_view",$data_array,true);

		$this->set_subtitle("Data Model");
		$this->set_title("Data Model");
		$this->set_content($content);
		$this->cetak();
}


function baru(){

    $data_array=array();
        $userdata = $this->session->userdata('bj_login');
        $birojasa = $userdata['birojasa_id'];

         $data_array['arr_jenis'] = $this->cm->arr_dropdown3("m_jenis", "id_jenis", "jenis", "jenis", "id_birojasa", $birojasa);
    
        $data_array['action'] = 'simpan';
        $content = $this->load->view($this->controller."_form_view",$data_array,true);
        $this->set_subtitle("Tambah Model");
        $this->set_title("Tambah Model");
        $this->set_content($content);
        $this->cetak();
    }




function simpan(){


    $post = $this->input->post();
       


        $this->load->library('form_validation');
        $this->form_validation->set_rules('model','MODEL','required');
          
          
         
        $this->form_validation->set_message('required', ' %s Harus diisi ');
        
        $this->form_validation->set_error_delimiters('', '<br>');

        $userdata = $this->session->userdata('bj_login');
        $post['id_birojasa'] = $userdata['birojasa_id'];

        //show_array($data);

if($this->form_validation->run() == TRUE ) { 

        
        $res = $this->db->insert('m_model', $post); 
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
        $this->form_validation->set_rules('model','Model','required');     
        $this->form_validation->set_message('required', ' %s Harus diisi ');
        
        $this->form_validation->set_error_delimiters('', '<br>');

     

        //show_array($data);

if($this->form_validation->run() == TRUE ) { 

        $this->db->where("id_model",$post['id_model']);
        $res = $this->db->update('m_model', $post); 
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
        
  
        $model = $_REQUEST['columns'][1]['search']['value'];
        $userdata = $this->session->userdata('bj_login');
        $birojasa = $userdata['birojasa_id'];


      //  order[0][column]
        $req_param = array (
				"sort_by" => $sidx,
				"sort_direction" => $sord,
				"limit" => null,
				"model" => $model,
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
        $id = $row['id_model'];
        

        $action = "<div class='btn-group'>
                              <button type='button' class='btn btn-primary'>Action</button>
                              <button type='button' class='btn btn-primary dropdown-toggle' data-toggle='dropdown'>
                                <span class='caret'></span>
                                <span class='sr-only'>Toggle Dropdown</span>
                              </button>
                              <ul class='dropdown-menu' role='menu'>
                                <li><a href='#' onclick=\"hapus('$id')\" ><i class='fa fa-trash'></i> Hapus</a></li>
                                <li><a href='bj_model/editdata?id=$id'><i class='fa fa-edit'></i> Edit</a></li>
                              </ul>
                            </div>";
        	
        	 
        	$arr_data[] = array(
        		$row['id_model'],
        		$row['model'],
                $row['nm_jenis'],
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

         $this->db->where('id_model',$id);
         $model = $this->db->get('m_model');
         $data_array= $model->row_array();

         $data_array['action'] = 'update';
         
            $userdata = $this->session->userdata('bj_login');
            $birojasa = $userdata['birojasa_id'];

         $data_array['arr_jenis'] = $this->cm->arr_dropdown3("m_jenis", "id_jenis", "jenis", "jenis", "id_birojasa", $birojasa);
    	 
		

        

        $content = $this->load->view($this->controller."_form_view",$data_array,true);

		$this->set_subtitle("Edit Model");
		$this->set_title("Edit Model");
		$this->set_content($content);
		$this->cetak();

    }




    function hapusdata(){
    	$get = $this->input->post();
    	$model= $get['id'];

    	$data = array('id_model' => $model, );

    	$res = $this->db->delete('m_model', $data);
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