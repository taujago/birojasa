      <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
     
        <!-- Main content -->
        <form id="form_data" class="form-horizontal" method="post" 
        action="<?php echo site_url("$this->controller/$action"); ?>" role="form"> 

 


              <div class="panel panel-primary">
      <div class="panel-heading">
      <strong><h3 class="panel-title">Tambah data </h3></strong>
    </div>
    <div class="panel-body" id="data_umum">

    <div class="form-group">
      <label class="col-sm-3 control-label">Tipe Kendaraan</label>
      <div class="col-sm-9">
        <input type="hidden" name="id" id="id" value="<?php echo isset($id)?$id:""; ?>">
        <input type="text" name="tipe_kendaraan" id="tipe_kendaraan" class="form-control input-style" placeholder="Tipe Kendaraan" 
        value="<?php echo isset($tipe_kendaraan)?$tipe_kendaraan:""; ?>">
      </div>
    </div>
    <div class="form-group">
      <label class="col-sm-3 control-label">Tahun Kendaraan</label>
      <div class="col-sm-9">
        <input type="text" name="tahun_kendaraan"  value="<?php echo isset($tahun_kendaraan)?$tahun_kendaraan:""; ?>" id="tahun_kendaraan" class="form-control input-style" placeholder="Tahun Kendaraan"  >
      </div>
    </div>
    <div class="form-group">
      <label class="col-sm-3 control-label">Warna TNKB</label>
      <div class="col-sm-9">
        <input type="text" name="warna_tnkb" id="warna_tnkb" class="form-control input-style" placeholder="Warna TNKB" value="<?php echo isset($warna_tnkb)?$warna_tnkb:""; ?>">
      </div>
    </div>
    <div class="form-group">
      <label class="col-sm-3 control-label">Polda</label>
      <div class="col-sm-9">
        <?php echo form_dropdown("id_polda",$arr_polda,'','id="id_polda" class="form-control input-style"'); ?>
      </div>
    </div>
    <div class="form-group">
      <label class="col-sm-3 control-label">Samsat</label>
      <div class="col-sm-9">
      <?php echo form_dropdown("id_samsat",array(),'','id="id_samsat" class="form-control input-style"'); ?>
      </div>
    </div>
    <div class="form-group">
      <label class="col-sm-3 control-label">Perubahan</label>
      <div class="col-sm-9">
        <?php echo form_dropdown("id_perubahan",$arr_perubahan,'','id="id_perubahan" class="form-control input-style"'); ?>
      </div>
    </div>
    <div class="form-group">
      <label class="col-sm-3 control-label">Rp. Pendaftaran</label>
      <div class="col-sm-9">
        <input type="text" name="rp_pendaftaran" id="rp_pendaftaran" class="form-control input-style" placeholder="Rp. Daftar BPKB" value="<?php echo isset($rp_pendaftaran)?$rp_pendaftaran:""; ?>">
      </div>
    </div>
    <div class="form-group">
      <label class="col-sm-3 control-label">Rp. Perubahan</label>
      <div class="col-sm-9">
        <input type="text" name="rp_perubahan" id="rp_perubahan" class="form-control input-style" placeholder="Rp. Pajak Kendaraan" value="<?php echo isset($rp_perubahan)?$rp_perubahan:""; ?>">
      </div>
    </div>
    <div class="form-group">
      <label class="col-sm-3 control-label">Rp. Admin Fee</label>
      <div class="col-sm-9">
        <input type="text" name="rp_admin_fee" id="rp_admin_fee" class="form-control input-style" placeholder="Rp. Admin Fee" value="<?php echo isset($rp_admin_fee)?$rp_admin_fee:""; ?>">
      </div>
    </div>
    <div class="form-group pull-center">
        <div class="col-sm-offset-3 col-sm-9">
          <button id="tombolsubmitsimpan" style="border-radius: 0;" type="submit" class="btn btn-lg btn-primary"  >Simpan</button>
          <a href="<?php echo site_url('sa_bbn_dua'); ?>"><button style="border-radius: 0;" id="reset" type="button" class="btn btn-lg btn-danger">Cancel</button></a>
        </div>
      </div>

  </div>
  </form>


      <?php 
$this->load->view($this->controller."_form_view_js");
?>