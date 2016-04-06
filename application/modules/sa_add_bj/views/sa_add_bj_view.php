      <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
      <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
          <h1>
            Tambah Biro Jasa
            <small>Welcome</small>
          </h1>
        </section>

        <!-- Main content -->
        <form id="form_data" class="form-horizontal" method="post" action="<?php echo site_url('sa_add_bj/simpan'); ?>" role="form"> 

        <section class="content">
              <div class="panel panel-primary">
      <div class="panel-heading">
      <strong><h3 class="panel-title">Add Biro Jasa</h3></strong>
    </div>
    <div class="panel-body" id="data_umum">

    <div class="form-group">
      <label class="col-sm-3 control-label">Nama</label>
      <div class="col-sm-9">
        <input type="text" name="nama" id="nama" class="form-control input-style" placeholder="Nama">
      </div>
    </div>
    <div class="form-group">
      <label class="col-sm-3 control-label">Email</label>
      <div class="col-sm-9">
        <input type="text" name="email" id="email" class="form-control input-style" placeholder="Email">
      </div>
    </div>
    <div class="form-group">
      <label class="col-sm-3 control-label">Alamat</label>
      <div class="col-sm-9">
      <textarea name="alamat" id="alamat" class="form-control input-style" placeholder="Alamat"></textarea>
      </div>
    </div>
    <div class="form-group">
      <label class="col-sm-3 control-label">Password</label>
      <div class="col-sm-9">
        <input type="password" name="password" id="password" class="form-control input-style" placeholder="Password">
      </div>
    </div>
    <div class="form-group">
      <label class="col-sm-3 control-label">Ulang Password</label>
      <div class="col-sm-9">
        <input type="password" name="re_password" id="re_password" class="form-control input-style" placeholder="Ulang Password">
      </div>
    </div>
    <div class="form-group pull-center">
        <div class="col-sm-offset-3 col-sm-9">
          <button id="tombolsubmit" style="border-radius: 0;" type="submit" class="btn btn-lg btn-primary"  >Simpan</button>
          <button style="border-radius: 0;" id="reset" type="reset" class="btn btn-lg btn-danger">Cancel</button>
        </div>
      </div>

  </div>
  </form>
          <!-- End Add BJ -->

        </section><!-- /.content -->
      </div><!-- /.content-wrapper -->

      <?php 
$this->load->view($this->controller."_view_js");
?>