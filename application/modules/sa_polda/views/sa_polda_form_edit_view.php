

     <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
     
        <!-- Main content -->
        <form id="form_edit" class="form-horizontal" method="post" action="<?php echo site_url("$this->controller/$action"); ?>" role="form"> 


              <div class="panel panel-primary">
      <div class="panel-heading">
      <strong><h3 class="panel-title">Edit</h3></strong>
    </div>
    <div class="panel-body" id="data_umum">

    
    <div class="form-group">
      <label class="col-sm-3 control-label">Nama Polda</label>
      <div class="col-sm-9">
        <input type="hidden" name="polda_id" id="polda_id" value="<?php echo $polda_id; ?>"></input>
        <input type="text" name="polda_nama" id="polda_nama" class="form-control input-style" value="<?php echo $polda_nama; ?>">
      </div>
    </div>

    <div class="form-group">
      <label class="col-sm-3 control-label">Link Web</label>
      <div class="col-sm-9">
        <input type="text" name="url" id="url" class="form-control input-style" value="<?php echo $url; ?>">
      </div>
    </div>

    <div class="form-group">
      <label class="col-sm-3 control-label">Pengguna</label>
      <div class="col-sm-9">
        <input type="text" name="id" id="id" class="form-control input-style" value="<?php echo $id; ?>">
      </div>
    </div>


    <div class="form-group">
      <label class="col-sm-3 control-label">Pass</label>
      <div class="col-sm-9">
        <input type="text" name="id_key" id="id_key" class="form-control input-style" value="<?php echo $id_key; ?>">
      </div>
    </div>

    <div class="form-group pull-center">
        <div class="col-sm-offset-3 col-sm-9">
          <button id="tombolsubmitupdate" style="border-radius: 0;" type="submit" class="btn btn-lg btn-primary"  >Simpan</button>
          <a href="<?php echo site_url('sa_polda'); ?>"><button style="border-radius: 0;" id="reset" type="button" class="btn btn-lg btn-danger">Cancel</button></a>
        </div>
      </div>

  </div>
  </form>


      <?php 
$this->load->view($this->controller."_form_view_js");
?>