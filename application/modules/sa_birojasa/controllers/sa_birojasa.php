<?php 

class sa_birojasa extends admin_controller{
	var $controller;
	function sa_birojasa(){
		parent::__construct();

		$this->controller = get_class($this);
		$this->load->model('biro_jasa_model','dm');
		
		//$this->load->helper("serviceurl");
		
	}

	function simpanberhasil(){
		
		$data_array=array();
		$content = $this->load->view($this->controller."_view",$data_array,true);
		
		

		// $ket = '<div class="callout callout-info"><h4>Succes</h4><p>Data Biro Jasa Anda Berhasil Dimasukkan</p></div>';
		$this->set_subtitle("Biro Jasa");
		$this->set_title("Biro Jasa");
		$this->set_content($content);
		$this->cetak();
	}






function index(){
		$data_array=array();
		$content = $this->load->view($this->controller."_view",$data_array,true);

		$this->set_subtitle("Biro Jasa");
		$this->set_title("Biro Jasa");
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
        
  
        $nama = $_REQUEST['columns'][1]['search']['value'];


      //  order[0][column]
        $req_param = array (
				"sort_by" => $sidx,
				"sort_direction" => $sord,
				"limit" => null,
				"nama" => $nama
				
				 
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
        	 
        	
        

        	 
        	$arr_data[] = array(
        		$row['id'],
        		$row['nama'], 
        		$row['alamat'],
        		$row['no_siup'],
        		$row['telp'],
        		$row['hp'],
        		$row['email'],
        		
         			 
        		  				);
        endforeach;

         $responce = array('draw' => $draw, // ($start==0)?1:$start,
        				  'recordsTotal' => $count, 
        				  'recordsFiltered' => $count,
        				  'data'=>$arr_data
        	);
         
        echo json_encode($responce); 
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