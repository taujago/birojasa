<link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
     
        <!-- Main content -->
        <form id="form_edit" class="form-horizontal" method="post" action="<?php echo site_url("$this->controller/$action"); ?>" role="form"> 


              <div class="panel panel-primary">
      <div class="panel-heading">
      <strong><h3 class="panel-title">Edit</h3></strong>
    </div>
    <div class="panel-body" id="data_umum">

    
    <div class="form-group">
      <label class="col-sm-3 control-label">Id Warna</label>
      <div class="col-sm-9">
        <input type="hidden" name="WARNA_ID1" id="WARNA_ID1" value="<?php echo $WARNA_ID; ?>"></input>
        <input type="text" name="WARNA_ID" id="WARNA_ID" class="form-control input-style" value="<?php echo $WARNA_ID; ?>">
      </div>
    </div>
    <div class="form-group">
      <label class="col-sm-3 control-label">Warna</label>
      <div class="col-sm-9">
        <input type="text" name="WARNA_NAMA" id="WARNA_NAMA" class="form-control input-style" value="<?php echo $WARNA_NAMA; ?>">
      </div>
    </div>

    <div class="form-group pull-center">
        <div class="col-sm-offset-3 col-sm-9">
          <button id="tombolsubmitupdate" style="border-radius: 0;" type="submit" class="btn btn-lg btn-primary"  >Simpan</button>
          <a href="<?php echo site_url('sa_warna'); ?>"><button style="border-radius: 0;" id="reset" type="button" class="btn btn-lg btn-danger">Cancel</button></a>
        </div>
      </div>

  </div>
  </form>


      <?php 
$this->load->view($this->controller."_form_view_js");
?>