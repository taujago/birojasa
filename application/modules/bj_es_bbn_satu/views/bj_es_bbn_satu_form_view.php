    <link href="<?php echo base_url("assets") ?>/css/datepicker.css" rel="stylesheet">
  <link href="<?php echo base_url("assets") ?>/plugins/select2/select2.min.css" rel="stylesheet" >
    <script src="<?php echo base_url("assets") ?>/js/bootstrap-datepicker.js"></script>
    <script src="<?php echo base_url("assets") ?>/plugins/select2/select2.full.min.js"></script>
<script type="text/javascript" src="<?php echo base_url();?>assets/js/autoNumeric.js"></script>
 

 <style type="text/css">
   .rupiah {
    text-align: right;
   }
 </style>


    <form id="form_<?php echo $action; ?>" class="form-horizontal" method="post" 
        action="<?php echo site_url("$this->controller/$action"); ?>" role="form"> 

 


    <div class="panel panel-primary">
      <div class="panel-heading">
      <strong><h3 class="panel-title">Tambah data </h3></strong>
    </div>
    <div class="panel-body" id="data_umum">
    <div class="form-group">
      <label class="col-sm-3 control-label">Merk Kendaraan</label>
      <div class="col-sm-9">
        <?php echo form_dropdown("merk_kendaraan",$arr_merk,isset($merk_kendaraan)?$merk_kendaraan:'','id="merk_kendaraan" class="form-control input-style"'); ?>
      </div>
    </div>
    <div class="form-group">
      <label class="col-sm-3 control-label">Tipe Kendaraan</label>
      <div class="col-sm-9">
        <input type="hidden" name="id" id="id" value="<?php echo isset($id)?$id:""; ?>">
        <?php echo form_dropdown("tipe_kendaraan",$arr_tipe,isset($tipe_kendaraan)?$tipe_kendaraan:'','id="tipe_kendaraan" class="form-control input-style"'); ?>
      </div>
    </div>
    <div class="form-group">
      <label class="col-sm-3 control-label">Tahun Kendaraan</label>
      <div class="col-sm-9">
      <?php echo form_dropdown("tahun_kendaraan",$arr_tahun,isset($tahun_kendaraan)?$tahun_kendaraan:'','id="tahun_kendaraan" class="form-control input-style"'); ?>
      </div>
    </div>
    <div class="form-group">
      <label class="col-sm-3 control-label">Warna TNKB</label>
      <div class="col-sm-9">
        <?php echo form_dropdown("id_warna_tnkb",$arr_warna,isset($id_warna_tnkb)?$id_warna_tnkb:'','id="id_warna_tnkb" class="form-control input-style"'); ?>
      </div>
    </div>
    <div class="form-group">
      <label class="col-sm-3 control-label">Polda</label>
      <div class="col-sm-9">
        <?php echo form_dropdown("id_polda",$arr_polda,isset($id_polda)?$id_polda:'','id="id_polda" class="form-control input-style"'); ?>
      </div>
    </div>
    <div class="form-group">
      <label class="col-sm-3 control-label">Samsat</label>
      <div class="col-sm-9">
      <?php 
          if ($action == "simpan") {
            echo form_dropdown("id_samsat",$arr_pilih_polda,'','id="id_samsat" class="form-control input-style"'); 
          } else if ($action == "update") {
      echo form_dropdown("id_samsat",$arr_samsat,isset($id_samsat)?$id_samsat:'','id="id_samsat" class="form-control input-style"'); 
        }
      ?>
      </div>
    </div>
    <div class="form-group">
      <label class="col-sm-3 control-label">Rp. Daftar STNK</label>
      <div class="col-sm-9">
        <input type="text" 
        data-a-sign="" data-a-dec="," data-a-sep="." 
        name="rp_daftar_stnk" id="rp_daftar_stnk" class="rupiah form-control input-style" placeholder="Rp. Daftar STNK" value="<?php echo isset($rp_daftar_stnk)?$rp_daftar_stnk:""; ?>">
      </div>
    </div>
    <div class="form-group">
      <label class="col-sm-3 control-label">Rp. Daftar BPKB</label>
      <div class="col-sm-9">
        <input  data-a-sign="" data-a-dec="," data-a-sep="."  type="text" name="rp_daftar_bpkb" id="rp_daftar_bpkb" class="rupiah form-control input-style" placeholder="Rp. Daftar BPKB" value="<?php echo isset($rp_daftar_bpkb)?$rp_daftar_bpkb:""; ?>">
      </div>
    </div>
    <div class="form-group">
      <label class="col-sm-3 control-label">Rp. Pajak Kendaraan</label>
      <div class="col-sm-9">
        <input  data-a-sign="" data-a-dec="," data-a-sep="."  type="text" name="rp_pajak_kendaraan" id="rp_pajak_kendaraan" class="rupiah form-control input-style" placeholder="Rp. Pajak Kendaraan" value="<?php echo isset($rp_pajak_kendaraan)?$rp_pajak_kendaraan:""; ?>">
      </div>
    </div>
    <div class="form-group">
      <label class="col-sm-3 control-label">Rp. Admin Fee</label>
      <div class="col-sm-9">
        <input  data-a-sign="" data-a-dec="," data-a-sep="."  type="text" name="rp_admin_fee" id="rp_admin_fee" class="rupiah form-control input-style" placeholder="Rp. Admin Fee" value="<?php echo isset($rp_admin_fee)?$rp_admin_fee:""; ?>" >
      </div>
    </div>
    <div class="form-group pull-center">
        <div class="col-sm-offset-3 col-sm-9">
          <button id="<?php echo $action; ?>" style="border-radius: 0;" type="submit" class="btn btn-lg btn-primary"  >Simpan</button>
          <a href="<?php echo site_url('bj_es_bbn_satu'); ?>"><button style="border-radius: 0;" id="reset" type="button" class="btn btn-lg btn-danger">Cancel</button></a>
        </div>
      </div>

  </div>
  </form>

        <?php 
$this->load->view($this->controller."_form_view_js");
?>