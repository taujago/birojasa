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
	


	function cekEmail(){
		$email = $this->input->post('email');
		$valid = true;
		$this->db->where('email', $email);
		$jumlah = $this->db->get("biro_jasa")->num_rows();	
		if($jumlah == 1) {
			$valid = false;
		}
		
		echo json_encode(array('valid' => $valid));
	
	}

	function ceksiup(){
		$no_siup = $this->input->post('no_siup');
		$valid = true;
		$this->db->where('no_siup', $no_siup);
		$jumlah = $this->db->get("biro_jasa")->num_rows();	
		if($jumlah == 1) {
			$valid = false;
		}
		
		echo json_encode(array('valid' => $valid));
	}

		function ceknpwp(){
		$no_npwp = $this->input->post('no_npwp');
		$valid = true;
		$this->db->where('no_npwp', $no_npwp);
		$jumlah = $this->db->get("biro_jasa")->num_rows();	
		if($jumlah == 1) {
			$valid = false;
		}
		
		echo json_encode(array('valid' => $valid));
	}

		function cektdp(){
		$no_tdp = $this->input->post('no_tdp');
		$valid = true;
		$this->db->where('no_tdp', $no_tdp);
		$jumlah = $this->db->get("biro_jasa")->num_rows();	
		if($jumlah == 1) {
			$valid = false;
		}
		
		echo json_encode(array('valid' => $valid));
	}

	function simpan(){
		$post = $this->input->post();
		
		$data = array(  'nama' => $post['nama'],
						'email' => $post['email'],
						'alamat' => $post['alamat'],
						'no_siup' => $post['no_siup'],
						'no_npwp' => $post['no_npwp'],
						'no_tdp' => $post['no_tdp'],
						'telp' => $post['telp'],
						'hp' => $post['hp'],


						);
		$this->db->insert('biro_jasa', $data); 

		redirect('sa_birojasa');
	}





	

}

?>