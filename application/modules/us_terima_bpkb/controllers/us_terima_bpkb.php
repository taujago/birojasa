<?php 
class us_terima_bpkb extends user_controller{
	var $controller;
    
    
	function us_terima_bpkb(){
		parent::__construct();

		$this->controller = get_class($this);
		
        $this->load->model("coremodel","cm");
		$this->load->helper("tanggal");

	
		
	}








function index(){
		

        $data_array=array();

        $userdata = $this->session->userdata('user_login');
        

		$content = $this->load->view($this->controller."_view",$data_array,true);


		$this->set_subtitle("Penerimaan BPKB");
		$this->set_title("BPKB");
		$this->set_content($content);
		$this->cetak();
}




	

}

?>