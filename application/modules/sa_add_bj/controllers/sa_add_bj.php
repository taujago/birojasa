<?php 

class sa_add_bj extends admin_controller{
	var $controller;
	function sa_add_bj(){
		parent::__construct();

		$this->controller = get_class($this);
		
		//$this->load->helper("serviceurl");
		
	}
	



function index(){
		$data_array=array();
		$content = $this->load->view($this->controller."_view",$data_array,true);

		$this->set_subtitle("Tambah Biro Jasa");
		$this->set_title("Tambah Biro Jasa");
		$this->set_content($content);
		$this->cetak();
}





	

}

?>