<?php 


class admin extends admin_controller {
	
	var $controller;
	public function admin(){
		parent::__construct();
		$this->controller = get_class($this);
	}
	
		function index(){
		



		$data_array=array();
		// $content = "WELCOME MR. ADMIN "; 
		$birojasa = $this->db->get('biro_jasa')->num_rows();
		$this->db->where('level', 2);
		$birojasa_user = $this->db->get('pengguna')->num_rows();
		$samsat = $this->db->get('samsat')->num_rows();
		$dealer = $this->db->get('dealer')->num_rows();

		$data_array = array(
								"biro_jasa" => $birojasa, 
								"samsat" => $samsat,
								"dealer" => $dealer,
								"birojasa_user" => $birojasa_user, 
								);

		$content = $this->load->view("admin/index_view",$data_array,true);

		$this->set_subtitle("DASHBOARD");
		$this->set_title("DASHBOARD");
		$this->set_content($content);
		$this->cetak();


				
			
		
	}


}
?>