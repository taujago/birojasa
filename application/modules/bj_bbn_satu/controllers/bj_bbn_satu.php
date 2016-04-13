<?php 


class bj_bbn_satu extends biro_jasa_controller {
	
	var $controller;
	public function bj_bbn_satu(){
		parent::__construct();
		$this->controller = get_class($this);
	}
	
		function index(){
		



		$data_array=array();
		$content = $this->load->view($this->controller."_view",$data_array,true);
			
		$this->set_subtitle("BBN 1");
		$this->set_title("BBN 1");
		$this->set_content($content);
		$this->cetak();


				
			
		
	}


}
?>