

     <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
       <script src="<?php echo base_url("assets"); ?>/fileinput/js/fileinput.min.js"></script>


    <link href="<?php echo base_url("assets"); ?>/fileinput/css/fileinput.min.css" rel="stylesheet">
     
        <!-- Main content -->
        <form id="form_edit" class="form-horizontal" role="form" enctype="multipart/form-data"> 


              <div class="panel panel-primary">
      <div class="panel-heading">
      <strong><h3 class="panel-title">Edit</h3></strong>
    </div>
    <div class="panel-body" id="data_umum">

    <div class="form-group">
      <label class="col-sm-3 control-label">Nama Biro Jasa</label>
      <div class="col-sm-9">
        <input type="hidden" name="id" id="id" value="<?php echo $id; ?>">
        <input type="text" name="nama" id="nama" class="form-control input-style" placeholder="Nama" value="<?php echo $nama; ?>">
      </div>
    </div>
    <div class="form-group">
      <label class="col-sm-3 control-label">No. SIUP</label>
      <div class="col-sm-9">
        <input type="text" name="no_siup" id="no_siup" class="form-control input-style" placeholder="Nomor Siup . . ." value="<?php echo $no_siup; ?>">
      </div>
    </div>
    <div class="form-group">
      <label class="col-sm-3 control-label">NO. NPWP</label>
      <div class="col-sm-9">
        <input type="text" name="no_npwp" id="no_npwp" class="form-control input-style" placeholder="NO. NPWP . . ." value="<?php echo $no_npwp; ?>">
      </div>
    </div>
    <div class="form-group">
      <label class="col-sm-3 control-label">No. TDP</label>
      <div class="col-sm-9">
        <input type="text" name="no_tdp" id="no_tdp" class="form-control input-style" placeholder="No. TDP . . ." value="<?php echo $no_tdp; ?>">
      </div>
    </div>
    <div class="form-group">
      <label class="col-sm-3 control-label">Alamat</label>
      <div class="col-sm-9">
      <textarea name="alamat" id="alamat" class="form-control input-style" placeholder="Alamat . . ."><?php echo $alamat; ?></textarea>
      </div>
    </div>
    <div class="form-group">
      <label class="col-sm-3 control-label">No. Telp</label>
      <div class="col-sm-9">
        <input type="text" name="telp" id="telp" class="form-control input-style" placeholder="No. Telp" value="<?php echo $telp; ?>">
      </div>
    </div>
    <div class="form-group">
      <label class="col-sm-3 control-label">No. HP</label>
      <div class="col-sm-9">
        <input type="text" name="hp" id="hp" class="form-control input-style" placeholder="No. HP . ." value="<?php echo $hp; ?>">
      </div>
    </div>
    <div class="form-group">
      <label class="col-sm-3 control-label">Email</label>
      <div class="col-sm-9">
        <input type="text" name="email" id="email" class="form-control input-style" placeholder="Email . . ." value="<?php echo $email; ?>">
      </div>
    </div>
    <div class="form-group">
      <label class="col-sm-3 control-label">Logo</label>
      <div class="col-sm-9">
        <input type="file" name="logo" id="logo" class="file" data-show-preview="true" accept="image/*"/>
      </div>
    </div>
    <div class="form-group pull-center">
        <div class="col-sm-offset-3 col-sm-9">
          <button id="tombolsubmitupdate" style="border-radius: 0;" type="submit" class="btn btn-lg btn-primary"  >Simpan</button>
          <a href="<?php echo site_url('sa_birojasa'); ?>"><button style="border-radius: 0;" id="reset" type="button" class="btn btn-lg btn-danger">Cancel</button></a>
        </div>
      </div>

  </div>
  </form>


      <?php 
$this->load->view($this->controller."_form_view_js");
?>