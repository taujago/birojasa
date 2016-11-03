    <?php
    $userdata = $this->session->userdata('bj_login');
    ?>   
              <!-- Start Page -->
                <!-- Selsai -->
          <div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12">
              <div class="x_panel">
                <div class="x_title">
                  <h2>Tambah Data <small>User BBN 1 </small></h2>
                  <ul class="nav navbar-right panel_toolbox">
                    <li class="dropdown">
                      <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><i class="fa fa-eye"></i></a>
                      <ul class="dropdown-menu" role="menu">
                        <li><a href="<?php echo site_url($this->controller); ?>">Lihat Data</a>
                        </li>
                      </ul>
                    </li>
                  </ul>
                  <div class="clearfix"></div>
                </div>
                <div class="x_content">
                  <br />
                  
                  <form id="form_data" data-parsley-validate class="form-horizontal form-label-left" action="<?php echo site_url("$this->controller/$action"); ?>" method="post">
                  
                    <div class="form-group">
                      <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Nama
                      </label>
                      <div class="col-md-6 col-sm-6 col-xs-12">
                      <?php echo form_dropdown("id_dealer",$arr_dealer,isset($id_dealer)?$id_dealer:"",'id="id_dealer" class="form-control input-style"'); ?>
                      </div>
                    </div>
                    <div class="form-group">
                      <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Nama
                      </label>
                      <div class="col-md-6 col-sm-6 col-xs-12">
                      <input type="hidden" name="birojasa_id" id="birojasa_id" value="<?php echo $userdata['birojasa_id']; ?>"></input>
                      <input type="hidden" name="id" id="id" value="<?php echo isset($id)?$id:""  ?>"></input>
                        <input type="text" id="nama" name="nama" required="required" class="form-control col-md-7 col-xs-12" placeholder="Nama" value="<?php echo isset($nama)?$nama:"" ?>">
                      </div>
                    </div>
                    <div class="form-group">
                      <label class="control-label col-md-3 col-sm-3 col-xs-12" for="last-name">Email
                      </label>
                      <div class="col-md-6 col-sm-6 col-xs-12">
                        <input type="text" id="email" name="email" required="required" class="form-control col-md-7 col-xs-12" placeholder="Email" value="<?php echo isset($email)?$email:"" ?>">
                      </div>
                    </div>
                    <div class="form-group">
                      <label class="control-label col-md-3 col-sm-3 col-xs-12" for="last-name">Password
                      </label>
                      <div class="col-md-6 col-sm-6 col-xs-12">
                        <input type="password" id="pswd" name="pswd" required="required" class="form-control col-md-7 col-xs-12" placeholder="Password">
                      </div>
                    </div>
                    <div class="form-group">
                      <label class="control-label col-md-3 col-sm-3 col-xs-12">Ulangi Password 
                      </label>
                      <div class="col-md-6 col-sm-6 col-xs-12">
                        <input id="re_pswd" name="re_pswd" class="date-picker form-control col-md-7 col-xs-12 tgl" required="required" type="password" placeholder="Ulangi Password">
                      </div>
                    </div>
                    <div class="form-group">
                      <label class="control-label col-md-3 col-sm-3 col-xs-12" for="last-name">Alamat
                      </label>
                      <div class="col-md-6 col-sm-6 col-xs-12">
                        <textarea name="alamat" id="alamat" class="form-control" rows="3" placeholder='Alamat'><?php echo isset($alamat)?$alamat:"" ?></textarea>
                      </div>
                    </div>
                    <div class="form-group">
                      <label class="control-label col-md-3 col-sm-3 col-xs-12" for="last-name">Nomor HP
                      </label>
                      <div class="col-md-6 col-sm-6 col-xs-12">
                        <input type="text" id="nomor_hp" name="nomor_hp" required="required" class="form-control col-md-7 col-xs-12" placeholder="Nomor HP" value="<?php echo isset($nomor_hp)?$nomor_hp:"" ?>">
                      </div>
                    </div>
                   
                    <div class="ln_solid"></div>
                    <div class="form-group">
                      <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                      <?php if ($action=='simpan') {
                        echo '<button id="tombolsubmitsimpan" type="submit" class="btn btn-primary">Simpan</button>';
                      }elseif ($action=='update') {
                        echo '<button id="tombolsubmitupdate" type="submit" class="btn btn-primary">Simpan</button>';
                      } ?>
                        
                        <a href="<?php echo site_url($this->controller) ?>" class="btn btn-danger" >Batal</a>
                      </div>
                    </div>

                  </form>
                </div>
              </div>
            </div>
          </div>



<?php 
$this->load->view($this->controller.'_form_view_js');
?>
                
         