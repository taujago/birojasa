    <?php
    $userdata = $this->session->userdata('bj_login');
    ?>



    <link href="<?php echo base_url("assets") ?>/plugins/select2/select2.min.css" rel="stylesheet" >
    

    <link href="<?php echo base_url("assets") ?>/css/datepicker.css" rel="stylesheet">
    <script src="<?php echo base_url("assets") ?>/js/bootstrap-datepicker.js"></script>

    <script src="<?php echo base_url("assets") ?>/plugins/select2/select2.full.min.js"></script>

    <script type="text/javascript" src="<?php echo base_url();?>assets/js/autoNumeric.js"></script>
    
    
              <!-- Start Page -->
                <!-- Selsai -->
          <div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12">
              <div class="x_panel">
                <div class="x_title">
                  <h2>Tambah Data <small>Pengurusan BBN 1 </small></h2>
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
                      <label class="control-label col-md-3 col-sm-3 col-xs-12" for="last-name">Polda
                      </label>
                      <div class="col-md-6 col-sm-6 col-xs-12">
                        <?php echo form_dropdown("id_polda",$arr_polda,isset($id_polda)?$id_polda:"",'id="id_polda" class="form-control input-style"'); ?>
                       </div> 
                    </div>
                    <div class="form-group">
                      <label class="control-label col-md-3 col-sm-3 col-xs-12" for="last-name">Samsat
                      </label>
                      <div class="col-md-6 col-sm-6 col-xs-12">
                      <?php
                        if ($action=='simpan') {
                           echo form_dropdown("id_samsat",$arr_samsat_baru,'','id="id_samsat" class="form-control input-style"'); 
                         } else{
                          echo form_dropdown("id_samsat",$arr_samsat,isset($id_samsat)?$id_samsat:"",'id="id_samsat" class="form-control input-style"'); 
                         }
                      ?>
                        
                       </div> 
                    </div>






                    <div class="form-group">
                      <label class="control-label col-md-3 col-sm-3 col-xs-12">Tanggal Entri 
                      </label>
                      <div class="col-md-6 col-sm-6 col-xs-12">
                        <input type="text" id="tanggal" class="tanggal form-control col-md-7 col-xs-12 input-style" name="tgl_entri"  placeholder="Tanggal Entri BBN 1"  data-date-format="dd-mm-yyyy" value="<?php echo isset($tgl_entri)?$tgl_entri:""; ?>">
                      </div>
                    </div>
                    
                    <div class="form-group">
                      <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Nomor Rangka
                      </label>
                      <div class="col-md-6 col-sm-6 col-xs-12">
                      <input type="hidden" name="id_birojasa" id="id_birojasa" value="<?php echo $userdata['birojasa_id']; ?>"></input>
                        <input type="text" id="no_rangka" name="no_rangka" required="required" class="form-control col-md-7 col-xs-12" placeholder="Nomor Rangka" value="<?php echo isset($no_rangka)?$no_rangka:""; ?>">
                      </div>
                    </div>
                    <div class="form-group">
                      <label class="control-label col-md-3 col-sm-3 col-xs-12" for="last-name">Nomor Mesin
                      </label>
                      <div class="col-md-6 col-sm-6 col-xs-12">
                        <input type="text" id="no_mesin" name="no_mesin" required="required" class="form-control col-md-7 col-xs-12" placeholder="Nomor Mesin" value="<?php echo isset($no_mesin)?$no_mesin:""; ?>">
                      </div>
                    </div>
                    <div class="form-group">
                      <label class="control-label col-md-3 col-sm-3 col-xs-12" for="last-name">Nomor Faktur
                      </label>
                      <div class="col-md-6 col-sm-6 col-xs-12">
                        <input type="text" id="no_faktur" name="no_faktur" required="required" class="form-control col-md-7 col-xs-12" placeholder="Nomor Faktur" value="<?php echo isset($no_faktur)?$no_faktur:""; ?>">
                        <input type="hidden" id="id" name="id" value="<?php echo isset($id)?$id:""; ?>">
                      </div>
                    </div>
                    <div class="form-group">
                      <label class="control-label col-md-3 col-sm-3 col-xs-12">Tanggal Faktur 
                      </label>
                      <div class="col-md-6 col-sm-6 col-xs-12">
                        <input type="text" id="tgl_faktur" class="tanggal form-control col-md-7 col-xs-12 input-style" name="tgl_faktur"   placeholder="Tanggal Faktur"  data-date-format="dd-mm-yyyy" value="<?php echo isset($tgl_faktur)?$tgl_faktur:""; ?>">
                      </div>
                    </div>
                    <div class="form-group">
                      <label class="control-label col-md-3 col-sm-3 col-xs-12" for="last-name">Merek
                      </label>
                      <div class="col-md-6 col-sm-6 col-xs-12">
                        <?php echo form_dropdown("id_merek",$arr_merek,isset($id_merek)?$id_merek:"",'id="id_merek" class="form-control select2" style="width: 100%;"'); ?>
                       </div> 
                    </div>
                    <div class="form-group">
                      <label class="control-label col-md-3 col-sm-3 col-xs-12" for="last-name">Type
                      </label>
                      <div class="col-md-6 col-sm-6 col-xs-12">
                      <?php echo form_dropdown("type",$arr_type,isset($type)?$type:"",'id="type" class="form-control select2" style="width: 100%;"'); ?>

                        
                      </div>
                    </div>
                    <div class="form-group">
                      <label class="control-label col-md-3 col-sm-3 col-xs-12" for="last-name">Jenis
                      </label>
                      <div class="col-md-6 col-sm-6 col-xs-12">
                        <?php echo form_dropdown("id_jenis",$arr_jenis,isset($id_jenis)?$id_jenis:"",'id="id_jenis" class="form-control input-style"'); ?>
                       </div> 
                    </div>
                   <div class="form-group">
                      <label class="control-label col-md-3 col-sm-3 col-xs-12" for="last-name">Model
                      </label>
                      <div class="col-md-6 col-sm-6 col-xs-12">

                        <?php 
                        if ($action=='simpan') {
                          echo form_dropdown("id_model",$arr_model_baru,isset($id_model)?$id_model:"",'id="id_model" class="form-control input-style"');
                        }else{
                          echo form_dropdown("id_model",$arr_model,isset($id_model)?$id_model:"",'id="id_model" class="form-control input-style"');
                        }
                         ?>
                        
                       </div> 
                    </div>

                     <div class="form-group">
                      <label class="control-label col-md-3 col-sm-3 col-xs-12" for="last-name">Warna Kendaraan
                      </label>
                      <div class="col-md-6 col-sm-6 col-xs-12">
                        <?php echo form_dropdown("id_warna",$arr_warna,isset($id_warna)?$id_warna:"",'id="id_warna" class="form-control input-style"'); ?>
                       </div> 
                    </div>

                    <div class="form-group">
                      <label class="control-label col-md-3 col-sm-3 col-xs-12" for="last-name">Silinder
                      </label>
                      <div class="col-md-6 col-sm-6 col-xs-12">
                        <input type="text" id="silinder" name="silinder" required="required" class="form-control col-md-7 col-xs-12" placeholder="Silinder" value="<?php echo isset($silinder)?$silinder:""; ?>">
                      </div>
                    </div>
                    <div class="form-group">
                      <label class="control-label col-md-3 col-sm-3 col-xs-12" for="last-name">Bahan Bakar
                      </label>
                      <div class="col-md-6 col-sm-6 col-xs-12">
                        <input type="text" id="bahan_bakar" name="bahan_bakar" required="required" class="form-control col-md-7 col-xs-12" placeholder="Bahan Bakar" value="<?php echo isset($bahan_bakar)?$bahan_bakar:""; ?>">
                      </div>
                    </div>
                    <div class="form-group">
                      <label class="control-label col-md-3 col-sm-3 col-xs-12" for="last-name">Tahun Buat
                      </label>
                      <div class="col-md-6 col-sm-6 col-xs-12">
                      <?php echo form_dropdown("tahun_buat",$arr_tahun,isset($tahun_buat)?$tahun_buat:"",'id="tahun_buat" class="form-control input-style"'); ?>
                      </div>
                    </div>
                    <div class="form-group">
                      <label class="control-label col-md-3 col-sm-3 col-xs-12" for="last-name">Deaelar
                      </label>
                      

                      <div class="col-md-6 col-sm-6 col-xs-12">
                      <?php echo form_dropdown("kode_dealer",$arr_dealer,isset($kode_dealer)?$kode_dealer:"",'id="kode_dealer" class="form-control input-style"'); ?>
                        
                      </div>
                    </div>
                    <div class="form-group">
                      <label class="control-label col-md-3 col-sm-3 col-xs-12" for="last-name">Nama Pemilik
                      </label>
                      <div class="col-md-6 col-sm-6 col-xs-12">
                        <input type="text" id="nama_pemilik" name="nama_pemilik" required="required" class="form-control col-md-7 col-xs-12" placeholder="Nama Pemilik" value="<?php echo isset($nama_pemilik)?$nama_pemilik:""; ?>">
                      </div>
                    </div>
                    <div class="form-group">
                      <label class="control-label col-md-3 col-sm-3 col-xs-12" for="last-name">Alamat Pemilik
                      </label>
                      <div class="col-md-6 col-sm-6 col-xs-12">
                        <textarea name="alamat_pemilik" id="alamat_pemilik" class="form-control" rows="3" placeholder='Alamat'><?php echo isset($alamat_pemilik)?$alamat_pemilik:""; ?></textarea>
                       </div> 
                    </div>
                    <div class="form-group">
                      <label class="control-label col-md-3 col-sm-3 col-xs-12" for="last-name">Provinsi
                      </label>
                      <div class="col-md-6 col-sm-6 col-xs-12">
                        <?php echo form_dropdown("id_provinsi",$arr_provinsi,isset($id_provinsi)?$id_provinsi:"",'id="id_provinsi" class="form-control input-style"'); ?>
                       </div> 
                    </div>
                    <div class="form-group">
                      <label class="control-label col-md-3 col-sm-3 col-xs-12" for="last-name">Kabupaten
                      </label>
                      <div class="col-md-6 col-sm-6 col-xs-12">

                        <?php 
                        if ($action=='simpan') {
                          echo form_dropdown("id_kota",$arr_kota_baru,'','id="id_kota" class="form-control input-style"');
                        }else{
                          echo form_dropdown("id_kota",$arr_kota,isset($id_kota)?$id_kota:"",'id="id_kota" class="form-control input-style"');
                        }
                         ?>
                       </div> 
                    </div>
                    <div class="form-group">
                      <label class="control-label col-md-3 col-sm-3 col-xs-12" for="last-name">Kecamatan
                      </label>
                      <div class="col-md-6 col-sm-6 col-xs-12">
                        <?php
                        if ($action=='simpan') {
                           echo form_dropdown("id_kecamatan",$arr_kecamatan_baru,'','id="id_kecamatan" class="form-control input-style"');
                         } else{
                          echo form_dropdown("id_kecamatan",$arr_kecamatan,isset($id_kecamatan)?$id_kecamatan:"",'id="id_kecamatan" class="form-control input-style"');
                         }
                         ?>
                       </div> 
                    </div>
                    <div class="form-group">
                      <label class="control-label col-md-3 col-sm-3 col-xs-12" for="last-name">Kelurahan/Desa
                      </label>
                      <div class="col-md-6 col-sm-6 col-xs-12">
                        <?php 
                        if ($action=='simpan') {
                          echo form_dropdown("id_desa",$arr_desa_baru,'','id="id_desa" class="form-control input-style"');
                        }else{
                          echo form_dropdown("id_desa",$arr_desa,isset($id_desa)?$id_desa:"",'id="id_desa" class="form-control input-style"');
                        }
                         ?>
                        
                        </div>
                    </div>


                    <div class="form-group">
                      <label class="control-label col-md-3 col-sm-3 col-xs-12" for="last-name">Pengurus STNK
                      </label>
                      <div class="col-md-6 col-sm-6 col-xs-12">
                        <?php echo form_dropdown("pengurus_stnk",$arr_user,isset($pengurus_stnk)?$pengurus_stnk:"",'id="pengurus_stnk" class="form-control input-style"'); ?>
                       </div> 
                    </div>
                    <div class="form-group">
                      <label class="control-label col-md-3 col-sm-3 col-xs-12" for="last-name">Pengurus BPKB
                      </label>
                      <div class="col-md-6 col-sm-6 col-xs-12">
                        <?php echo form_dropdown("pengurus_bpkb",$arr_user,isset($pengurus_bpkb)?$pengurus_bpkb:"",'id="pengurus_bpkb" class="form-control input-style"'); ?>
                       </div> 
                    </div>
                    

                     <div class="form-group">
                      <label class="control-label col-md-3 col-sm-3 col-xs-12" for="last-name">Warna TNKB
                      </label>
                      <div class="col-md-6 col-sm-6 col-xs-12">
                        <?php echo form_dropdown("id_warna_tnkb",$arr_warna_tnkb,isset($id_warna_tnkb)?$id_warna_tnkb:"",'id="id_warna_tnkb" class="form-control input-style"'); ?>
                       </div> 
                    </div>


                    <div class="form-group">
                      <label class="control-label col-md-3 col-sm-3 col-xs-12" for="last-name">Pengurus
                      </label>
                      <div class="col-md-6 col-sm-6 col-xs-12">
                       <a class="btn btn-primary" id="hitung">Hitung</a>
                       </div> 
                    </div>

                    
             <div class="form-group">
                      <label class="control-label col-md-3 col-sm-3 col-xs-12" for="last-name">Biaya STNK
                      </label>
                      <div class="col-md-6 col-sm-6 col-xs-12">
                        <input type="text" id="rp_daftar_stnk" name="rp_daftar_stnk" required="required" class="rupiah form-control col-md-7 col-xs-12 rp" placeholder="Biaya STNK"  data-a-sign="" data-a-dec="," data-a-sep="." readonly="true" value="<?php echo isset($rp_daftar_stnk)?$rp_daftar_stnk:""; ?>">
                      </div>
                    </div>
      
  <div class="form-group">
                      <label class="control-label col-md-3 col-sm-3 col-xs-12" for="last-name">Biaya BPKB
                      </label>
                      <div class="col-md-6 col-sm-6 col-xs-12">
                        <input type="text" id="rp_daftar_bpkb" name="rp_daftar_bpkb" required="required" class="rupiah form-control col-md-7 col-xs-12 rp" placeholder="Biaya BPKB"  data-a-sign="" data-a-dec="," data-a-sep="." readonly="true" value="<?php echo isset($rp_daftar_bpkb)?$rp_daftar_bpkb:""; ?>">
                      </div>
                    </div>
                    
                    
                    
  <div class="form-group">
                      <label class="control-label col-md-3 col-sm-3 col-xs-12" for="last-name">Pajak Kendaraan
                      </label>
                      <div class="col-md-6 col-sm-6 col-xs-12">
                        <input type="text" id="rp_pajak_kendaraan" name="rp_pajak_kendaraan" required="required" class="rupiah form-control col-md-7 col-xs-12 rp" placeholder="Pajak Kendaraan"  data-a-sign="" data-a-dec="," data-a-sep="." readonly="true" value="<?php echo isset($rp_pajak_kendaraan)?$rp_pajak_kendaraan:""; ?>">
                      </div>
                    </div>
                    
  <div class="form-group">
                      <label class="control-label col-md-3 col-sm-3 col-xs-12" for="last-name">Admin Fee
                      </label>
                      <div class="col-md-6 col-sm-6 col-xs-12">
                        <input type="text" id="rp_admin_fee" name="rp_admin_fee" required="required" class="rupiah form-control col-md-7 col-xs-12 rp" placeholder="Admin Fee"  data-a-sign="" data-a-dec="," data-a-sep="." readonly="true" value="<?php echo isset($rp_admin_fee)?$rp_admin_fee:""; ?>">
                      </div>
                    </div>
                    
<div class="form-group">
                      <label class="control-label col-md-3 col-sm-3 col-xs-12" for="last-name">Total Estimasi Biaya
                      </label>
                      <div class="col-md-6 col-sm-6 col-xs-12">
                        <input type="text" id="total" name="total" required="required" class="form-control col-md-7 col-xs-12 rp" placeholder="Admin Fee"  data-a-sign="" data-a-dec="," data-a-sep="." readonly="true" value="<?php echo isset($rp_total)?$rp_total:""; ?>">
                      </div>
                    </div>         
                                                                                                    
                    
                    <div class="ln_solid"></div>
                    <div class="form-group">
                      <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                        <button id="<?php echo $action; ?>" type="submit" class="btn btn-primary">Simpan</button>

                        <?php
                          if ($action=='simpan') { ?>
                            <button type="reset" class="btn btn-danger">Batal</button>
                          <?php 
                          }else{ ?>
                            <a href="<?php echo site_url($this->controller); ?>"><button type="reset" class="btn btn-danger">Batal</button></a>
                            <?php 
                          }
                         ?>
                        
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
                
         