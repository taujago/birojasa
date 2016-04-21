</br>
 



          <button type="button" class="btn btn-primary pull-right" data-toggle="modal" data-target=".bs-example-modal-sm">Selsai</button>


<div class="row" style="font-size: 30px;">
	<div class="col-md-2" >
		No. Rangka
	</div>
	<div class="col-md-4">
		: <?php echo $no_rangka; ?>
	</div>
</div>
<div class="row" style="font-size: 20px;">
	<div class="col-md-2">
		No. Mesin
	</div>
	<div class="col-md-4">
		: <?php echo $no_mesin; ?>
	</div>
</div>
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
        <th colspan="2" align="center" style="font-size: 20px;">Data Pengurusan</th>
  </tr>
</thead>
<tbody style="font-size: 16px;">
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
   <tr>
        <th width="20%">Pengurus</th>
        <th width="1%">:</th>
        <th width="70%"><?php echo $pengurus; ?></th>
   </tr>
   <tr>
        <th width="20%">Jenis Perubahan</th>
        <th width="1%">:</th>
        <th width="70%"><?php echo $jenis_perubahan; ?></th>
   </tr>
   <tr>
        <th width="20%">Biaya Pendaftaran</th>
        <th width="1%">:</th>
        <th width="70%"><?php echo $rp_daftar; ?></th>
   </tr>
   <tr>
        <th width="20%">Biaya Perubahan</th>
        <th width="1%">:</th>
        <th width="70%"><?php echo $rp_biaya; ?></th>
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
        <th colspan="2" align="center" style="font-size: 20px;">Detail Kendaraan </th>
  </tr>
</thead>
<tbody style="font-size: 16px;">
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
        <th>Bahan Bakar</th>
        <th>:</th>
        <th><?php echo $bahan_bakar; ?></th>
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
        <th colspan="2" align="center" style="font-size: 20px;">Data Pemilik Kendaraan</th>
  </tr>
</thead>
<tbody style="font-size: 16px;">
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
   <tr>
        <th width="20%">Provinsi</th>
        <th width="1%">:</th>
        <th width="70%"><?php echo $provinsi; ?></th>
   </tr>
   <tr>
        <th width="20%">Kota</th>
        <th width="1%">:</th>
        <th width="70%"><?php echo $kota; ?></th>
   </tr>
   <tr>
        <th width="20%">Kecamatan</th>
        <th width="1%">:</th>
        <th width="70%"><?php echo $kecamatan; ?></th>
   </tr>
   <tr>
        <th width="20%">Desa</th>
        <th width="1%">:</th>
        <th width="70%"><?php echo $desa; ?></th>
   </tr>
  </tbody>
</table>

</div>
</div>
</div>
</div>




                 
              <form id="form_update" data-parsley-validate class="form-horizontal form-label-left" action="<?php echo site_url("us_bbn_satu/update"); ?>" method="post">
                <div class="modal fade bs-example-modal-sm" tabindex="-1" role="dialog" aria-hidden="true">
                  <div class="modal-dialog modal-sm">
                    <div class="modal-content">

                      <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span>
                        </button>
                        <h4 class="modal-title" id="myModalLabel2">Kofirmasi Penyelesaian</h4>
                      </div>
                      <div class="modal-body">
                        <div class="row">
                          <div class="col-md-12">
                            <div class="form-group">
                              <label for="kembali">Sisa Uang</label>
                              <input type="hidden" name="id" id="id" value="<?php echo $id; ?>">
                              <input id="kembali" name="kembali" type="text" class="form-control" placeholder="Sisa Uang"></input>
                            </div>
                          </div>
                        </div>
                      </div>
                      <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Batal</button>
                        <button type="button" id="btn_submit" class="btn btn-primary">Simpan</button>
                      </div>

                    </div>
                  </div>
                </div>
                </form>
<?php 
$this->load->view('us_bbn_dua_detail_view_js');
?>