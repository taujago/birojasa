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
		$jumlah = $this->db->get("pengguna")->num_rows();	
		if($jumlah == 1) {
			$valid = false;
		}
		
		echo json_encode(array('valid' => $valid));
	
	}

	function simpan(){
		$post = $this->input->post();
		$password = md5($post['password']);
		$data = array('nama' => $post['nama'],
						'email' => $post['email'],
						'alamat' => $post['alamat'],
						'password' => $password,
						'level' => 2);
		$this->db->insert('pengguna', $data); 

		redirect('sa_add_bj');
	}





	

}

?>