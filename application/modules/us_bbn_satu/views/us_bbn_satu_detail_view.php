</br>
    


    <style type="text/css">
    .datepicker{ z-index: 1151 !important; }
    </style>
    

    <link href="<?php echo base_url("assets") ?>/css/datepicker.css" rel="stylesheet" >
    <script src="<?php echo base_url("assets") ?>/js/bootstrap-datepicker.js"></script>
    <script type="text/javascript" src="<?php echo base_url();?>assets/js/autoNumeric.js"></script>

        


</br>



<div class="row">

            <div class="col-md-12">
              <div class="x_panel">
                <div class="x_title">
                  <h2>Detail Pengurusan</h2>
                  <ul class="nav navbar-right panel_toolbox">
                    <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                    </li>
                  </ul>
                  <div class="clearfix"></div>
                </div>
                <div class="x_content">





<table width="100%" border="0" class="table table-striped table-hover no-footer" role="grid">
<thead>
  <tr>
        <th colspan="2" align="center">Data Pengurusan</th>
  </tr>
</thead>
<tbody>
    <tr>
        <th width="20%">Polda</th>
        <th width="1%">:</th>
        <th width="70%"><?php echo $polda; ?></th>
   </tr>
   <tr>
        <th width="20%">Samsat</th>
        <th width="1%">:</th>
        <th width="70%"><?php echo $samsat; ?></th>
   </tr>
   <tr>
        <th width="20%">Tgl. Entri</th>
        <th width="1%">:</th>
        <th width="70%"><?php echo $tgl_entri; ?></th>
   </tr>
<!--    <tr>
        <th width="20%">Pengurus</th>
        <th width="1%">:</th>
        <th width="70%"><?php echo $pengurus; ?></th>
   </tr> -->
   <tr>
        <th width="20%">Daftar STNK</th>
        <th width="1%">:</th>
        <th width="70%"><?php echo $rp_daftar_stnk; ?></th>
   </tr>
    <tr>
        <th width="20%">Daftar STCK</th>
        <th width="1%">:</th>
        <th width="70%"><?php echo rupiah($rp_daftar_stck); ?></th>
   </tr>
   <tr>
        <th width="20%">Daftar BPKB</th>
        <th width="1%">:</th>
        <th width="70%"><?php echo $rp_daftar_bpkb; ?></th>
   </tr>
   <tr>
        <th width="20%">Pajak Kendaraan</th>
        <th width="1%">:</th>
        <th width="70%"><?php echo $rp_pajak_kendaraan; ?></th>
   </tr>
   <tr>
        <th width="20%">Admin Fee</th>
        <th width="1%">:</th>
        <th width="70%"><?php echo $rp_admin_fee; ?></th>
   </tr>
  </tbody>
</table>

</div>
</div>
</div>
</div>




		<div class="row">
            <div class="col-md-12">
              <div class="x_panel">
                <div class="x_title">
                  <h2>Detail Kendaraan</h2>
                  <ul class="nav navbar-right panel_toolbox">
                    <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                    </li>
                  </ul>
                  <div class="clearfix"></div>
                </div>
                <div class="x_content">

<table width="100%" border="0" class="table table-striped table-hover no-footer" role="grid">
<thead>
  <tr>
        <th colspan="2" align="center">Detail Kendaraan </th>
  </tr>
</thead>
<tbody>
	<tr>
        <th width="20%">No. Rangka</th>
        <th width="1%">:</th>
        <th width="70%"><?php echo $no_rangka; ?></th>
  </tr>
	<tr>
        <th>No. Mesin</th>
        <th>:</th>
        <th><?php echo $no_mesin; ?></th>
  </tr>
   <tr>
        <th >No. Faktur</th>
        <th >:</th>
        <th ><?php echo $no_faktur; ?></th>
  </tr>
  <tr>
        <th>Tgl. Faktur</th>
        <th>:</th>
        <th><?php echo $tgl_faktur; ?></th>
  </tr>
	<tr>
        <th>Merk</th>
        <th> : </th>
        <th><?php echo $merek; ?></th>
  </tr>
	<tr>
        <th>Type</th>
        <th>:</th>
        <th><?php echo $type; ?></th>
  </tr>
	<tr>
        <th >Jenis</th>
        <th>:</th>
        <th ><?php echo $jenis; ?></th>
  </tr>
  <tr>
        <th >Model</th>
        <th>:</th>
        <th><?php echo $model; ?></th>
  </tr>
  <tr>
        <th>Warna</th>
        <th>:</th>
        <th><?php echo $warna; ?></th>
  </tr>
  <tr>
        <th>Silinder</th>
        <th>:</th>
        <th><?php echo $silinder; ?></th>
  </tr>

  <tr>
        <th>Tahun Buat</th>
        <th>:</th>
        <th><?php echo $tahun_buat; ?></th>
  </tr>
  <tr>
        <th>Kode Dealer</th>
        <th>:</th>
        <th><?php echo $kode_dealer; ?></th>
  </tr>
  <tr>
        <th>Nama Dealer</th>
        <th>:</th>
        <th><?php echo $nama_dealer; ?></th>
  </tr>

</tbody>
</table>

</div>
</div>
</div>
</div>



<div class="row">

            <div class="col-md-12">
              <div class="x_panel">
                <div class="x_title">
                  <h2>Detail Pemilik Kendaraan</h2>
                  <ul class="nav navbar-right panel_toolbox">
                    <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                    </li>
                  </ul>
                  <div class="clearfix"></div>
                </div>
                <div class="x_content">





<table width="100%" border="0" class="table table-striped table-hover no-footer" role="grid">
<thead>
  <tr>
        <th colspan="2" align="center">Data Pemilik Kendaraan</th>
  </tr>
</thead>
<tbody>
    <tr>
        <th width="20%">Nama</th>
        <th width="1%">:</th>
        <th width="70%"><?php echo $nama_pemilik; ?></th>
   </tr>
   <tr>
        <th width="20%">Alamat</th>
        <th width="1%">:</th>
        <th width="70%"><?php echo $alamat_pemilik; ?></th>
   </tr>
  </tbody>
</table>

</div>
</div>
</div>
</div>
<div class="row">
<?php 
  if ($status_bpkb==1) {
  ?>    
  <div class="row">
    <div class="col-md-12">
              <div class="x_panel">
                <div class="x_title">
                  <h2>Detail Hasil Pengerjaan BPKB</h2>
                  <ul class="nav navbar-right panel_toolbox">
                    <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                    </li>
                  </ul>
                  <div class="clearfix"></div>
                </div>
                <div class="x_content">





<table width="100%" border="0" class="table table-striped table-hover no-footer" role="grid">

<tbody>
    
   
   <tr>
        <td width="20%">No. BPKB</td>
        <td width="1%">:</td>
        <td width="70%"><?php echo $bpkb_no; ?></td>
   </tr>
   <tr>
        <td width="20%">Tgl. BPKB</td>
        <td width="1%">:</td>
        <td width="70%"><?php echo $bpkb_tgl; ?></td>
  </tr>
  <tr>
        <td width="20%">Bayar Jumlah</td>
        <td width="1%">:</td>
        <td width="70%"><?php echo $bayar_jumlah_bpkb; ?></td>
   </tr>
  </tbody>
</table>

</div>
</div>
</div>
</div>

<?php         
      }else{    

}  ?>


<?php 
      if ($status_stnk==1) {?>
      <div class="row">
    <div class="col-md-12">
              <div class="x_panel">
                <div class="x_title">
                  <h2>Detail Hasil Pengerjaan STNK </h2>
                  <ul class="nav navbar-right panel_toolbox">
                    <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                    </li>
                  </ul>
                  <div class="clearfix"></div>
                </div>
                <div class="x_content">





<table width="100%" border="0" class="table table-striped table-hover no-footer" role="grid">

<tbody>
    
   
   <tr>
        <td width="20%">No. STNK</td>
        <td width="1%">:</td>
        <td width="70%"><?php echo $stnk_no; ?></td>
   </tr>
   <tr>
        <td width="20%">Tgl. STNK</td>
        <td width="1%">:</td>
        <td width="70%"><?php echo $stnk_tgl; ?></td>
   </tr>
   <tr>
        <td width="20%">Bayar Jumlah</td>
        <td width="1%">:</td>
        <td width="70%"><?php echo $bayar_jumlah_stnk; ?></td>
   </tr>
  </tbody>
</table>

</div>
</div>
</div>
</div>
  <?php  
      }else{

 } ?>

<?php 
      if ($status_terima_stck==1) {?>
      <div class="row">
    <div class="col-md-12">
              <div class="x_panel">
                <div class="x_title">
                  <h2>Detail Hasil Pengerjaan STCK </h2>
                  <ul class="nav navbar-right panel_toolbox">
                    <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                    </li>
                  </ul>
                  <div class="clearfix"></div>
                </div>
                <div class="x_content">





<table width="100%" border="0" class="table table-striped table-hover no-footer" role="grid">

<tbody>
    
   
   <tr>
        <td width="20%">No. REF STCK</td>
        <td width="1%">:</td>
        <td width="70%"><?php echo $no_ref_stck; ?></td>
   </tr>
   <tr>
        <td width="20%">Tgl. STCK</td>
        <td width="1%">:</td>
        <td width="70%"><?php echo $stck_terima_tgl; ?></td>
   </tr>
   <tr>
        <td width="20%">Bayar Jumlah</td>
        <td width="1%">:</td>
        <td width="70%"><?php echo rupiah($jumlah_bayar_stck); ?></td>
   </tr>
  </tbody>
</table>

</div>
</div>
</div>
</div>
  <?php  
      }else{

 } ?>
s
</div>

<?php if($status==2){ ?>
<div class="row">
    <div class="col-md-12">
              <div class="x_panel">
                <div class="x_title">
                  <h2>Detail Hasil Pengerjaan</h2>
                  <ul class="nav navbar-right panel_toolbox">
                    <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                    </li>
                  </ul>
                  <div class="clearfix"></div>
                </div>
                <div class="x_content">





<table width="100%" border="0" class="table table-striped table-hover no-footer" role="grid">
<thead>
  <tr>
        <th colspan="2" align="center">Detail Hasil Pengerjaan</th>
  </tr>
</thead>
<tbody>
    <tr>
        <th width="20%">Terakhir Diupdate</th>
        <th width="1%">:</th>
        <th width="70%"><?php echo $tgl_update; ?></th>
   </tr>
   
   
   <tr>
        <th width="20%">No. BPKB</th>
        <th width="1%">:</th>
        <th width="70%"><?php echo $bpkb_no; ?></th>
   </tr>
   <tr>
        <th width="20%">Tgl. BPKB</th>
        <th width="1%">:</th>
        <th width="70%"><?php echo $bpkb_tgl; ?></th>
   </tr>
   
   <tr>
        <th width="20%">Tgl. Serah STNK</th>
        <th width="1%">:</th>
        <th width="70%"><?php echo $stnk_serah_tgl; ?></th>
   </tr>
   
   <tr>
        <th width="20%">Tgl. Serah BPKB</th>
        <th width="1%">:</th>
        <th width="70%"><?php echo $bpkb_serah_tgl; ?></th>
   </tr>
   <tr>
        <th width="20%">Tgl. Bayar</th>
        <th width="1%">:</th>
        <th width="70%"><?php echo $bayar_tgl_bpkb; ?></th>
   </tr>
   
   <tr>
        <th width="20%">Metode Bayar </th>
        <th width="1%">:</th>
        <th width="70%"><?php echo $bayar_metode_bpkb; ?></th>
   </tr>
   <tr>
        <th width="20%">No. CC Bayar</th>
        <th width="1%">:</th>
        <th width="70%"><?php echo $bayar_no_cc_bpkb; ?></th>
   </tr>
   <tr>
        <th width="20%">Ref. CC Bayar</th>
        <th width="1%">:</th>
        <th width="70%"><?php echo $bayar_ref_cc_bpkb; ?></th>
   </tr>
   <tr>
        <th width="20%">Bayar Jumlah</th>
        <th width="1%">:</th>
        <th width="70%"><?php echo $bayar_jumlah_bpkb; ?></th>
   </tr>
  </tbody>
</table>

</div>
</div>
</div>
</div>
<?php } ?>



<!-- BPKB -->

                 
              <form id="form_update_bpkb" data-parsley-validate class="form-horizontal form-label-left" action="" method="post">
                <div class="modal fade 1" tabindex="-1" role="dialog" aria-hidden="true">
                  <div class="modal-dialog modal-sm">
                    <div class="modal-content">

                      <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span>
                        </button>
                        <h4 class="modal-title" id="myModalLabel2">Progres Pengerjaan BPKB</h4>
                      </div>
                      <div class="modal-body">
                        
                        <div class="row">
                          <div class="col-md-12">
                            <div class="form-group">
                              <label for="kembali">Tgl. BPKB</label>
                              <input type="hidden" name="id" id="id" value="<?php echo $id; ?>">
                              <input type="text" id="tanggal" name="bpkb_tgl" class="tanggal ui-datepicker form-control" placeholder="Tanggal Jadi BPKB"  data-date-format="dd-mm-yyyy" value="<?php echo isset($bpkb_tgl)?$bpkb_tgl:'' ?>">
                            </div>
                          </div>
                        </div>
                        <div class="row">
                          <div class="col-md-12">
                            <div class="form-group">
                              <label for="kembali">No. BPKB</label>
                              <input id="bpkb_no" name="bpkb_no" type="text" class="form-control" placeholder="No BPKB" value="<?php echo isset($bpkb_no)?$bpkb_no:'' ?>"></input>
                            </div>
                          </div>
                        </div>
                        <div class="row">
                          <div class="col-md-12">
                            <div class="form-group">
                              <label for="kembali">No. Polisi</label>
                              <input id="no_pol" name="no_pol" type="text" class="form-control" placeholder="No Polisi" value="<?php echo isset($no_pol)?$no_pol:'' ?>"></input>
                            </div>
                          </div>
                        </div>
                        <div class="row">
                          <div class="col-md-12">
                            <div class="form-group">
                              <label for="kembali">Biaya Lebih</label>
                              <input id="biaya_lebih_jumlah_bpkb" name="biaya_lebih_jumlah_bpkb" type="text" class="form-control rp" placeholder="Biaya Lebih" data-a-sign="" data-a-dec="," data-a-sep="." value="<?php echo isset($biaya_lebih_jumlah_bpkb)?$biaya_lebih_jumlah_bpkb:'' ?>"></input>
                            </div>
                          </div>
                        </div>
                        <div class="row">
                          <div class="col-md-12">
                            <div class="form-group">
                              <label for="kembali">Tgl. Serah BPKB</label>
                              <input type="text" id="tanggal" name="bpkb_serah_tgl" class="tanggal ui-datepicker form-control" placeholder="Tanggal Jadi BPKB"  data-date-format="dd-mm-yyyy" value="<?php echo isset($bpkb_serah_tgl)?$bpkb_serah_tgl:'' ?>">
                            </div>
                          </div>
                        </div>
                        <div class="form-group">
                              <label for="kembali">Tgl. Pembayaran</label>
                              <input type="text" id="tanggal" name="bayar_tgl_bpkb" class="tanggal ui-datepicker form-control" placeholder="Tanggal Pembayaran"  data-date-format="dd-mm-yyyy" value="<?php echo isset($bayar_tgl_bpkb)?$bayar_tgl_bpkb:'' ?>">
                            </div>
                            <div class="form-group">
                              <label for="kembali">Metode Pembayaran</label>
                              <input id="bayar_metode_bpkb" name="bayar_metode_bpkb" type="text" class="form-control" placeholder="Metode Pembayaran" value="<?php echo isset($bayar_metode_bpkb)?$bayar_metode_bpkb:'' ?>"></input>
                            </div>
                            <div class="form-group">
                              <label for="kembali">No. Kartu Debit</label>
                              <input id="bayar_no_cc_bpkb" name="bayar_no_cc_bpkb" type="text" class="form-control" placeholder="No. Kartu Debit" value="<?php echo isset($bayar_no_cc_bpkb)?$bayar_no_cc_bpkb:'' ?>"></input>
                            </div>
                            <div class="form-group">
                              <label for="kembali">Ref ID Debit</label>
                              <input id="bayar_ref_cc_bpkb" name="bayar_ref_cc_bpkb" type="text" class="form-control" placeholder="Ref ID Debit" value="<?php echo isset($bayar_ref_cc_bpkb)?$bayar_ref_cc_bpkb:'' ?>"></input>
                            </div>
                            <div class="form-group">
                              <label for="kembali">Jumlah Bayar</label>
                              <input id="bayar_jumlah_bpkb" name="bayar_jumlah_bpkb" type="text" class="form-control rp" placeholder="Jumlah Bayar" data-a-sign="" data-a-dec="," data-a-sep="." value="<?php echo isset($v_bayar_jumlah_bpkb)?$v_bayar_jumlah_bpkb:'' ?>"></input>
                            </div>

                      </div>
                      <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Batal</button>
                        <button type="button" id="btn_submit_bpkb1" class="btn btn-primary">Konfirmasi</button>
                        <button type="button" id="btn_submit_bpkb2" class="btn btn-success">Selesai</button>
                      </div>

                    </div>
                  </div>
                </div>
                </form>


                <!-- STNK -->

 <form id="form_update_stnk" data-parsley-validate class="form-horizontal form-label-left" action="" method="post">
                <div class="modal fade 2" tabindex="-1" role="dialog" aria-hidden="true">
                  <div class="modal-dialog modal-sm">
                    <div class="modal-content">

                      <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span>
                        </button>
                        <h4 class="modal-title" id="myModalLabel2">Progres Pengerjaan STNK</h4>
                      </div>
                      <div class="modal-body">
                        <div class="row">
                          <div class="col-md-12">
                            <div class="form-group">
                              <label for="kembali">Tgl. Masuk Samsat</label>
                              <input type="hidden" name="id" id="id" value="<?php echo $id; ?>">
                              <input type="text" id="tanggal" name="samsat_masuk_tgl" class="tanggal ui-datepicker form-control" placeholder="Tanggal Masuk Samsat"  data-date-format="dd-mm-yyyy" value="<?php echo isset($samsat_masuk_tgl)?$samsat_masuk_tgl:'' ?>">
                            </div>
                          </div>
                        </div>
                        <div class="row">
                          <div class="col-md-12">
                            <div class="form-group">
                              <label for="kembali">Tgl. STNK</label>
                              
                              <input type="text" id="tanggal" name="stnk_tgl" class="tanggal ui-datepicker form-control" placeholder="Tanggal Jadi STNK"  data-date-format="dd-mm-yyyy" value="<?php echo isset($stnk_tgl)?$stnk_tgl:'' ?>">
                            </div>
                          </div>
                        </div>
                        <div class="row">
                          <div class="col-md-12">
                            <div class="form-group">
                              <label for="kembali">No. STNK</label>
                              <input id="stnk_no" name="stnk_no" type="text" class="form-control" placeholder="No STNK" value="<?php echo isset($stnk_no)?$stnk_no:'' ?>"></input>
                            </div>
                          </div>
                        </div>
                        <div class="row">
                          <div class="col-md-12">
                            <div class="form-group">
                              <label for="kembali">Biaya Lebih</label>
                              <input id="biaya_lebih_jumlah_stnk" name="biaya_lebih_jumlah_stnk" type="text" class="form-control rp" placeholder="Biaya Lebih" data-a-sign="" data-a-dec="," data-a-sep="." value="<?php echo isset($v_biaya_lebih_jumlah_stnk)?$v_biaya_lebih_jumlah_stnk:'' ?>"></input>
                            </div>
                          </div>
                        </div>
                        <div class="row">
                          <div class="col-md-12">
                            <div class="form-group">
                              <label for="kembali">Tgl. Serah STNK</label>
                              <input type="text" id="tanggal" name="stnk_serah_tgl" class="tanggal ui-datepicker form-control" placeholder="Tanggal Serah STNK"  data-date-format="dd-mm-yyyy" value="<?php echo isset($stnk_serah_tgl)?$stnk_serah_tgl:'' ?>">
                            </div>
                          </div>
                        </div>
                        <div class="form-group">
                              <label for="kembali">Tgl. Pembayaran</label>
                              <input type="text" id="tanggal" name="bayar_tgl_stnk" class="tanggal ui-datepicker form-control" placeholder="Tanggal Pembayaran"  data-date-format="dd-mm-yyyy" value="<?php echo isset($bayar_tgl_stnk)?$bayar_tgl_stnk:'' ?>">
                            </div>
                            <div class="form-group">
                              <label for="kembali">Metode Pembayaran</label>
                              <input id="bayar_metode_stnk" name="bayar_metode_stnk" type="text" class="form-control" placeholder="Metode Pembayaran" value="<?php echo isset($bayar_metode_stnk)?$bayar_metode_stnk:'' ?>"></input>
                            </div>
                            <div class="form-group">
                              <label for="kembali">No. Kartu Debit</label>
                              <input id="bayar_no_cc_stnk" name="bayar_no_cc_stnk" type="text" class="form-control" placeholder="No. Kartu Debit" value="<?php echo isset($bayar_no_cc_stnk)?$bayar_no_cc_stnk:'' ?>"></input>
                            </div>
                            <div class="form-group">
                              <label for="kembali">Ref ID Debit</label>
                              <input id="bayar_ref_cc_stnk" name="bayar_ref_cc_stnk" type="text" class="form-control" placeholder="Ref ID Debit" value="<?php echo isset($bayar_ref_cc_stnk)?$bayar_ref_cc_stnk:'' ?>"></input>
                            </div>
                            <div class="form-group">
                              <label for="kembali">Jumlah Bayar</label>
                              <input id="bayar_jumlah_stnk" name="bayar_jumlah_stnk" type="text" class="form-control rp" placeholder="Jumlah Bayar" data-a-sign="" data-a-dec="," data-a-sep="." value="<?php echo isset($v_bayar_jumlah_stnk)?$v_bayar_jumlah_stnk:'' ?>"></input>
                            </div>

                      </div>
                      <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Batal</button>
                        <button type="button" id="btn_submit_stnk1" class="btn btn-primary">Konfirmasi</button>
                        <button type="button" id="btn_submit_stnk2" class="btn btn-success">Selesai</button>
                      </div>

                    </div>
                  </div>
                </div>
                </form>


               





<?php 
$this->load->view('us_bbn_satu_detail_view_js');
?>