

     <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
     
        <!-- Main content -->
        <form id="form_edit" class="form-horizontal" method="post" action="<?php echo site_url("$this->controller/$action"); ?>" role="form"> 


              <div class="panel panel-primary">
      <div class="panel-heading">
      <strong><h3 class="panel-title">Edit</h3></strong>
    </div>
    <div class="panel-body" id="data_umum">

    <div class="form-group">
      <label class="col-sm-3 control-label">Nama Polres</label>
      <div class="col-sm-9">
        <input type="hidden" name="polres_id" id="polres_id" value="<?php echo $polres_id; ?>">
        <input type="text" name="polres_nama" id="polres_nama" class="form-control input-style" placeholder="Nama Polres . . ." value="<?php echo $polres_nama; ?>">
      </div>
    </div>
    <div class="form-group">
      <label class="col-sm-3 control-label">Kode Polres</label>
      <div class="col-sm-9">
        <input type="text" name="polres_kode" id="polres_kode" class="form-control input-style" placeholder="Kode Polres . . ." value="<?php echo $polres_kode; ?>">
      </div>
    </div>
    <div class="form-group">
      <label class="col-sm-3 control-label">Id Polda</label>
      <div class="col-sm-9">
        <input type="text" name="polda_id" id="polda_id" class="form-control input-style" placeholder="KODE POLRES . . ." value="<?php echo $polda_id; ?>">
      </div>
    </div>

    <div class="form-group pull-center">
        <div class="col-sm-offset-3 col-sm-9">
          <button id="tombolsubmitupdate" style="border-radius: 0;" type="submit" class="btn btn-lg btn-primary"  >Simpan</button>
          <a href="<?php echo site_url('sa_polres'); ?>"><button style="border-radius: 0;" id="reset" type="button" class="btn btn-lg btn-danger">Cancel</button></a>
        </div>
      </div>

  </div>
  </form>


      <?php 
$this->load->view($this->controller."_form_view_js");
?>