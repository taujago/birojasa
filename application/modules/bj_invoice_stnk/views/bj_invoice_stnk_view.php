    <?php
    $userdata = $this->session->userdata('bj_login');
    ?>    



     <script src="<?php echo base_url("assets") ?>/js/jquery.dataTables.min.js"></script> 
 
     
     <form role="form" action="" id="btn-cari">
            
            <div class="col-md-4">
              <div class="form-group">
                <label>Nama Dealer</label>
                <?php echo form_dropdown("dealer",$arr_dealer,'','id="dealer" class="form-control input-style"'); ?>
              </div>
            </div>
            <div class="col-md-4">
              <div class="form-group">
                <label>Total Bayar</label>
                <input id="estimasi" name="estimasi" type="text" class="form-control input-style" placeholder="Biaya Biaya" readonly>
              </div>
            </div>
      </form>

<form id="form_data" class="form-horizontal" method="post" action="<?php echo site_url("$this->controller/simpan"); ?>" role="form">
	<input type="hidden" name="kode_dealer" id="kode_dealer" >
<table width="100%" border="0" id="serah_bpkb" class="table table-striped table-bordered table-hover dataTable no-footer" role="grid">
	<thead>
	      	<tr>
	      		<th>Cek.</th>
	      		<th>No. Rangka</th>
	      		<th>No. Mesin</th>
	      		<th>No. Faktur</th>
	      		<th>Nama Pemilik</th>
	      		<th>Biaya</th>
	      	</tr>
	      </thead>
</table>
  <div class="col-md-12">
      <div class="form-group">
        <div class="col-md-2">
          <label>Dibuat Oleh</label>
        </div>
        <div class="col-md-4">
          <input id="dibuat" name="dibuat" type="text" class="form-control input-style" placeholder="Dibuat Oleh">
        </div>
      </div>
      <div class="form-group">
        <div class="col-md-2">
            <label>Diterima Oleh</label>
          </div>
          <div class="col-md-4">
          <input id="diterima" name="diterima" type="text" class="form-control input-style" placeholder="Diterima Oleh">
          </div>
      </div>
  </div>
	<div class="col-md-12">
		<input type="button" class="btn btn-primary col-md-2" id="btntest" value="Simpan" />
    <a href="<?php echo site_url('bj_bbn_satu'); ?>" class="btn btn-danger col-md-2">Kembali</a>   
    <a href="<?php echo site_url('bj_invoice_stnk_detail'); ?>" class="btn btn-success col-md-2">Data Invoice</a>          
	</div>
</form>
              

    <?php 
$this->load->view($this->controller."_view_js");
?>
