    <?php
    $userdata = $this->session->userdata('bj_login');
    ?>


<?php 
    $this->load->view('tambah_modal');
?>


<div class="modal fade bs-example-modal-sm" id="myPleaseWait" tabindex="-1"
    role="dialog" aria-hidden="true" data-backdrop="static">
    <div class="modal-dialog modal-sm">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">
                    <span class="glyphicon glyphicon-time">
                    </span>Sedang memproses. Harap Tunggu...
                 </h4>
            </div>
            <div class="modal-body">
                <div class="progress">
                    <div class="progress-bar progress-bar-info progress-bar-striped active" style="width: 100%">
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
     <script src="<?php echo base_url("assets"); ?>/fileinput/js/fileinput.min.js"></script>
 <link href="<?php echo base_url("assets"); ?>/fileinput/css/fileinput.min.css" rel="stylesheet">
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
                  
                  <form id="form_data" data-parsley-validate class="form-horizontal form-label-left" action="<?php echo site_url("$this->controller/$action"); ?>" method="post" enctype="multipart/form-data">



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
                      <label class="control-label col-md-3 col-sm-3 col-xs-12">Tanggal Pengajuan 
                      </label>
                      <div class="col-md-6 col-sm-6 col-xs-12">
                        <input type="text" id="tanggal" class="tanggal form-control col-md-7 col-xs-12 input-style" name="tgl_pengajuan"  placeholder="Tanggal Pengajuan BBN 1"  data-date-format="dd-mm-yyyy" value="<?php echo isset($tgl_pengajuan)?$tgl_pengajuan:""; ?>">
                      </div>
                    </div>
                    <div class="form-group">
                      <label class="control-label col-md-3 col-sm-3 col-xs-12" for="last-name">Nomor Rangka
                      </label>
                      <div class="col-md-6 col-sm-6 col-xs-12">
                      <div class="col-md-6 no-padding">
                        <input type="hidden" name="id_birojasa" id="id_birojasa" value="<?php echo $userdata['birojasa_id']; ?>">
                        <input type="text" id="no_rangka" name="no_rangka" required="required" class="form-control col-md-7 col-xs-12" placeholder="Nomor Rangka" value="<?php echo isset($no_rangka)?$no_rangka:""; ?>">
                        </div>
                      <div class="col-md-5"> 
                          <button type="button" class="btn btn-primary" id="query"><i class="fa fa-search"> </i>Cari</button>
                      </div>
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
                      <div class="col-md-6 no-padding">
                        <?php echo form_dropdown("id_merek",$arr_merek,isset($id_merek)?$id_merek:"",'id="id_merek" class="form-control select2" style="width: 100%;"'); ?>
                      </div>
                      <div class="col-md-1"></div>
                      <div class="col-md-5" id="label_merk" style="font-size: 20px;"> 
                        
                      </div>
                      <div class="col-md-1">
                           <button id="proses" type="button" class="btn btn-primary" data-toggle="modal" data-target=".5"><i class="fa fa-plus"></i></button>
                        </div>
                        <div class="col-md-1">
                           <button type="button"  id="reload_merk" class="btn btn-primary" ><i class="fa fa-refresh"></i></button>
                        </div>

                        
                       </div> 
                    </div>
                    <div class="form-group">
                      <label class="control-label col-md-3 col-sm-3 col-xs-12" for="last-name">Type
                      </label>
                      <div class="col-md-6 col-sm-6 col-xs-12">
                      <div class="col-md-6 no-padding">
                      <?php echo form_dropdown("type",$arr_type,isset($type)?$type:"",'id="type" class="form-control select2" style="width: 100%;"'); ?>
                      </div>
                      <div class="col-md-1"></div>
                      <div class="col-md-5" id="label_type" style="font-size: 20px;"> 
                       
                      </div>
                      <div class="col-md-1">
                           <button id="proses" type="button" class="btn btn-primary" data-toggle="modal" data-target=".2"><i class="fa fa-plus"></i></button>
                        </div>
                        <div class="col-md-1">
                           <button type="button"  id="reload_tipe" class="btn btn-primary" ><i class="fa fa-refresh"></i></button>
                        </div>
                        
                      </div>
                    </div>
                    <div class="form-group">
                      <label class="control-label col-md-3 col-sm-3 col-xs-12" for="last-name">Jenis
                      </label>
                      <div class="col-md-6 col-sm-6 col-xs-12">
                      <div class="col-md-6 no-padding">
                        <?php echo form_dropdown("jenis",$arr_jenis,isset($jenis)?$jenis:"",'id="id_jenis" class="form-control input-style"'); ?>
                        </div>
                        <div class="col-md-1"></div>
                      <div class="col-md-5" id="label_jenis" style="font-size: 20px;"> 
                        
                      </div>
                      <div class="col-md-1">
                           <button id="proses" type="button" class="btn btn-primary" data-toggle="modal" data-target=".3"><i class="fa fa-plus"></i></button>
                        </div>
                        <div class="col-md-1">
                           <button type="button"  id="reload_jenis" class="btn btn-primary" ><i class="fa fa-refresh"></i></button>
                        </div>
                      
                       </div> 
                    </div>
                   <div class="form-group">
                      <label class="control-label col-md-3 col-sm-3 col-xs-12" for="last-name">Model
                      </label>
                      <div class="col-md-6 col-sm-6 col-xs-12">
                      <div class="col-md-6 no-padding">
                        <?php 
                        if ($action=='simpan') {
                          echo form_dropdown("model",$arr_model_baru,isset($model)?$model:"",'id="id_model" class="form-control input-style"');
                        }else{
                          echo form_dropdown("model",$arr_model,isset($model)?$model:"",'id="id_model" class="form-control input-style"');
                        }
                         ?>
                        </div>
                        <div class="col-md-1"></div>
                      <div class="col-md-5" id="label_model" style="font-size: 20px;"> 
                      
                      </div>
                      <div class="col-md-1">
                           <button id="proses" type="button" class="btn btn-primary" data-toggle="modal" data-target=".4"><i class="fa fa-plus"></i></button>
                        </div>
                        <div class="col-md-1">
                           <button type="button"  id="reload_model" class="btn btn-primary" ><i class="fa fa-refresh"></i></button>
                        </div>
                       </div> 
                    </div>

                     <div class="form-group">
                      <label class="control-label col-md-3 col-sm-3 col-xs-12" for="last-name">Warna Kendaraan
                      </label>
                      <div class="col-md-6 col-sm-6 col-xs-12">
                        <input type="text" id="warna" name="warna" required="required" class="form-control col-md-7 col-xs-12" placeholder="Warna Kendaraan" value="<?php echo isset($warna)?$warna:""; ?>">
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
                      <label class="control-label col-md-3 col-sm-3 col-xs-12" for="last-name">Tahun Buat
                      </label>
                      <div class="col-md-6 col-sm-6 col-xs-12">
                      <?php echo form_dropdown("tahun_buat",$arr_tahun,isset($tahun_buat)?$tahun_buat:"",'id="tahun_buat" class="form-control input-style"'); ?>
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
                      <label class="control-label col-md-3 col-sm-3 col-xs-12" for="last-name">Dealer
                      </label>
                      

                      <div class="col-md-6 col-sm-6 col-xs-12">
                        <div class="col-md-6 no-padding">
                          <?php echo form_dropdown("kode_dealer",$arr_dealer,isset($kode_dealer)?$kode_dealer:"",'id="kode_dealer" class="form-control input-style"'); ?>
                        </div>
                        <div class="col-md-1">
                           <button id="proses" type="button" class="btn btn-primary" data-toggle="modal" data-target=".1"><i class="fa fa-plus"></i></button>
                        </div>
                        <div class="col-md-1">
                           <button type="button"  id="reload_dealer" class="btn btn-primary" ><i class="fa fa-refresh"></i></button>
                        </div>

                        
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
                      <label class="control-label col-md-3 col-sm-3 col-xs-12" for="last-name">Faktur
                      </label>
                      <div class="col-md-6 col-sm-6 col-xs-12">
                        <input type="file" name="file[]" id="faktur" class="file" data-show-preview="true" accept="image/*"/>
                      </div>
                    </div><div class="form-group">
                      <label class="control-label col-md-3 col-sm-3 col-xs-12" for="last-name">KTP
                      </label>
                      <div class="col-md-6 col-sm-6 col-xs-12">
                        <input type="file" name="file[]" id="ktp" class="file" data-show-preview="true" accept="image/*"/>
                      </div>
                    </div><div class="form-group">
                      <label class="control-label col-md-3 col-sm-3 col-xs-12" for="last-name">Cek Fisik
                      </label>
                      <div class="col-md-6 col-sm-6 col-xs-12">
                        <input type="file" name="file[]" id="cek_fisik" class="file" data-show-preview="true" accept="image/*"/>
                      </div>
                    </div><div class="form-group">
                      <label class="control-label col-md-3 col-sm-3 col-xs-12" for="last-name">SIUP
                      </label>
                      <div class="col-md-6 col-sm-6 col-xs-12">
                        <input type="file" name="file[]" id="siup" class="file" data-show-preview="true" accept="image/*"/>
                      </div>
                    </div><div class="form-group">
                      <label class="control-label col-md-3 col-sm-3 col-xs-12" for="last-name">TDP
                      </label>
                      <div class="col-md-6 col-sm-6 col-xs-12">
                        <input type="file" name="file[]" id="tdp" class="file" data-show-preview="true" accept="image/*"/>
                      </div>
                    </div><div class="form-group">
                      <label class="control-label col-md-3 col-sm-3 col-xs-12" for="last-name">Domisili 
                      </label>
                      <div class="col-md-6 col-sm-6 col-xs-12">
                        <input type="file" name="file[]" id="domisili" class="file" data-show-preview="true" accept="image/*"/>
                      </div>
                    </div><div class="form-group">
                      <label class="control-label col-md-3 col-sm-3 col-xs-12" for="last-name">NPWP
                      </label>
                      <div class="col-md-6 col-sm-6 col-xs-12">
                        <input type="file" name="file[]" id="npwp" class="file" data-show-preview="true" accept="image/*"/>
                      </div>
                    </div><div class="form-group">
                      <label class="control-label col-md-3 col-sm-3 col-xs-12" for="last-name">Surat Kuasa
                      </label>
                      <div class="col-md-6 col-sm-6 col-xs-12">
                        <input type="file" name="file[]" id="sk" class="file" data-show-preview="true" accept="image/*"/>
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
                      <label class="control-label col-md-3 col-sm-3 col-xs-12" for="last-name">
                      </label>
                      <div class="col-md-6 col-sm-6 col-xs-12">
                       <a class="btn btn-primary" id="hitung">Estimasi Biaya</a>
                       </div> 
                    </div>
                    <div class="form-group">
                      <label class="control-label col-md-3 col-sm-3 col-xs-12" for="last-name">Biaya STCK
                      </label>
                      <div class="col-md-6 col-sm-6 col-xs-12">
                        <input type="text" id="rp_daftar_stck" name="rp_daftar_stck" required="required" class="rupiah form-control col-md-7 col-xs-12 rp" placeholder="Biaya STCK"  data-a-sign="" data-a-dec="," data-a-sep="." value="<?php echo isset($rp_daftar_stck)?$rp_daftar_stck:""; ?>">
                      </div>
                    </div>
                    
             <div class="form-group">
                      <label class="control-label col-md-3 col-sm-3 col-xs-12" for="last-name">Biaya STNK
                      </label>
                      <div class="col-md-6 col-sm-6 col-xs-12">
                        <input type="text" id="rp_daftar_stnk" name="rp_daftar_stnk" required="required" class="rupiah form-control col-md-7 col-xs-12 rp" placeholder="Biaya STNK"  data-a-sign="" data-a-dec="," data-a-sep="." value="<?php echo isset($rp_daftar_stnk)?$rp_daftar_stnk:""; ?>">
                      </div>
                    </div>
      
  <div class="form-group">
                      <label class="control-label col-md-3 col-sm-3 col-xs-12" for="last-name">Biaya BPKB
                      </label>
                      <div class="col-md-6 col-sm-6 col-xs-12">
                        <input type="text" id="rp_daftar_bpkb" name="rp_daftar_bpkb" required="required" class="rupiah form-control col-md-7 col-xs-12 rp" placeholder="Biaya BPKB"  data-a-sign="" data-a-dec="," data-a-sep="."  value="<?php echo isset($rp_daftar_bpkb)?$rp_daftar_bpkb:""; ?>">
                      </div>
                    </div>
                    
                    
                    
  <div class="form-group">
                      <label class="control-label col-md-3 col-sm-3 col-xs-12" for="last-name">Pajak Kendaraan
                      </label>
                      <div class="col-md-6 col-sm-6 col-xs-12">
                        <input type="text" id="rp_pajak_kendaraan" name="rp_pajak_kendaraan" required="required" class="rupiah form-control col-md-7 col-xs-12 rp" placeholder="Pajak Kendaraan"  data-a-sign="" data-a-dec="," data-a-sep="."  value="<?php echo isset($rp_pajak_kendaraan)?$rp_pajak_kendaraan:""; ?>">
                      </div>
                    </div>
                    
  <div class="form-group">
                      <label class="control-label col-md-3 col-sm-3 col-xs-12" for="last-name">Admin Fee
                      </label>
                      <div class="col-md-6 col-sm-6 col-xs-12">
                        <input type="text" id="rp_admin_fee" name="rp_admin_fee" required="required" class="rupiah form-control col-md-7 col-xs-12 rp" placeholder="Admin Fee"  data-a-sign="" data-a-dec="," data-a-sep="." value="<?php echo isset($rp_admin_fee)?$rp_admin_fee:""; ?>">
                      </div>
                    </div>
                    
<div class="form-group">
                      <label class="control-label col-md-3 col-sm-3 col-xs-12" for="last-name">Total Estimasi Biaya
                      </label>
                      <div class="col-md-6 col-sm-6 col-xs-12">
                        <input type="text" id="total" name="total" required="required" class="form-control col-md-7 col-xs-12 rp" placeholder="Admin Fee"  data-a-sign="" data-a-dec="," data-a-sep="." value="<?php echo isset($rp_total)?$rp_total:""; ?>" disabled>
                      </div>
                    </div>         
                                                                                                    
                    
                    <div class="ln_solid"></div>
                    <div class="form-group">
                      <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                        <button id="<?php echo $action; ?>" type="submit" class="btn btn-primary">Simpan</button>

                        <?php
                          if ($action=='simpan') { ?>
                            <button type="reset" class="btn btn-success">Bersihkan</button>
                            <a href="<?php echo site_url($this->controller); ?>" class="btn btn-danger">Batal</a>
                          <?php 
                          }else{ ?>
                            <a href="<?php echo site_url($this->controller); ?>"><button type="button" class="btn btn-danger">Batal</button></a>
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

                
         