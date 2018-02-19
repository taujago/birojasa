    <?php
    $userdata = $this->session->userdata('user_login');
    ?>    



     <script src="<?php echo base_url("assets") ?>/js/jquery.dataTables.min.js"></script> 
 
     
     <form role="form" action="" id="btn-cari">
            
            <div class="col-md-4">
              <div class="form-group">
                <label>Nama Polda</label>
                <?php echo form_dropdown("polda",$arr_polda,'','id="polda" class="form-control input-style"'); ?>
              </div>
            </div>
            <div class="col-md-4">
              <div class="form-group">
                <label>Total Estimasi</label>
                <input id="estimasi" name="estimasi" type="text" class="form-control input-style" placeholder="Estimasi Biaya" readonly></input>
              </div>
            </div>
      </form>

<form id="form_data" class="form-horizontal" method="post" action="<?php echo site_url("$this->controller/simpan"); ?>" role="form">
	<input type="hidden" name="id_polda" id="id_polda" >
<table width="100%" border="0" id="serah_bpkb" class="table table-striped table-bordered table-hover dataTable no-footer" role="grid">
	<thead>
	      	<tr>
	      		<th>Cek.</th>
	      		<th>No. Rangka</th>
	      		<th>No. Mesin</th>
	      		<th>No. Faktur</th>
	      		<th>Nama Pemilik</th>
	      		<th>Estimasi</th>
	      	</tr>
	      </thead>
</table>

	<div class="col-md-12">
		<input type="button" class="btn btn-primary col-md-4" id="btntest" value="Simpan" />
	</div>
</form>
              

    <?php 
$this->load->view("us_serah_bpkb_view_js");
?>
