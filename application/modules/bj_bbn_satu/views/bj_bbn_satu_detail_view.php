</br>
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
        <th><?php echo $nm_tipe; ?></th>
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
        <th width="70%"><?php echo isset($provinsi)?$provinsi:"Tidak Terisi"; ?></th>
   </tr>
   <tr>
        <th width="20%">Kota</th>
        <th width="1%">:</th>
        <th width="70%"><?php echo isset($kota)?$kota:"Tidak Terisi"; ?></th>
   </tr>
   <tr>
        <th width="20%">Kecamatan</th>
        <th width="1%">:</th>
        <th width="70%"><?php echo isset($kecamatan)?$kecamatan:"Tidak Terisi"; ?></th>
   </tr>
   <tr>
        <th width="20%">Desa</th>
        <th width="1%">:</th>
        <th width="70%"><?php echo isset($desa)?$desa:"Tidak Terisi"; ?></th>
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
        <th width="20%">Daftar STNK</th>
        <th width="1%">:</th>
        <th width="70%">Rp. <?php echo $rp_daftar_stnk; ?>,00</th>
   </tr>
   <tr>
        <th width="20%">Daftar BPKB</th>
        <th width="1%">:</th>
        <th width="70%">Rp. <?php echo $rp_daftar_bpkb; ?>,00</th>
   </tr>
   <tr>
        <th width="20%">Pajak Kendaraan</th>
        <th width="1%">:</th>
        <th width="70%">Rp. <?php echo $rp_pajak_kendaraan; ?>,00</th>
   </tr>
   <tr>
        <th width="20%">Admin Fee</th>
        <th width="1%">:</th>
        <th width="70%">Rp. <?php echo $rp_admin_fee; ?>,00</th>
   </tr>
  </tbody>
</table>

<table width="100%" border="0" class="table table-striped table-hover no-footer" role="grid">
<thead>
  <tr>
        <th colspan="2" align="center" style="font-size: 20px;">Status Pengerjaan</th>
  </tr>
</thead>
<tbody style="font-size: 16px;">
    <tr>
        <th width="20%">Tgl. Masuk Samsat</th>
        <th width="1%">:</th>
        <th width="70%"><?php echo $samsat_masuk_tgl; ?></th>
   </tr>
   <tr>
        <th width="20%">Terakhir Diupdate</th>
        <th width="1%">:</th>
        <th width="70%"><?php echo $tgl_update; ?></th>
   </tr>
    <tr>
        <th width="20%">Pengurus STNK</th>
        <th width="1%">:</th>
        <th width="70%"><?php echo $nm_pengurus_stnk; ?></th>
   </tr>
    <tr>
        <th width="20%">STNK </th>
        <th width="1%">:</th>
        <th width="70%"><?php if($status_stnk==0){ echo 'Belum Selesai';}else{ echo 'Selesai';} ?></th>
   </tr>
   <tr>
        <th width="20%">Pengurus BPKB</th>
        <th width="1%">:</th>
        <th width="70%"><?php echo $nm_pengurus_bpkb; ?></th>
   </tr>
   <tr>
        <th width="20%">BPKB </th>
        <th width="1%">:</th>
        <th width="70%"><?php if($status_bpkb==0){ echo 'Belum Selesai';}else{ echo 'Selesai';} ?></th>
   </tr>
   
   
  </tbody>
</table>


</div>
</div>
</div>
</div>

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
<thead>
  <tr>
        <th colspan="2" align="center">Detail Hasil Pengerjaan</th>
  </tr>
</thead>
<tbody>
    
   
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

<?php         
      }else{    

}  ?>

<?php 
      if ($status_stnk==1) {?>
      <div class="row">
    <div class="col-md-12">
              <div class="x_panel">
                <div class="x_title">
                  <h2>Detail Hasil Pengerjaan STNK</h2>
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
        <th width="20%">No. STNK</th>
        <th width="1%">:</th>
        <th width="70%"><?php echo $stnk_no; ?></th>
   </tr>
   <tr>
        <th width="20%">Tgl. STNK</th>
        <th width="1%">:</th>
        <th width="70%"><?php echo $stnk_tgl; ?></th>
   </tr>
   <tr>
        <th width="20%">Tgl. Serah STNK</th>
        <th width="1%">:</th>
        <th width="70%"><?php echo $stnk_serah_tgl; ?></th>
   </tr>
   
   <tr>
        <th width="20%">Tgl. Bayar</th>
        <th width="1%">:</th>
        <th width="70%"><?php echo $bayar_tgl_stnk; ?></th>
   </tr>
   <tr>
        <th width="20%">Metode Bayar </th>
        <th width="1%">:</th>
        <th width="70%"><?php echo $bayar_metode_stnk; ?></th>
   </tr>
   <tr>
        <th width="20%">No. CC Bayar</th>
        <th width="1%">:</th>
        <th width="70%"><?php echo $bayar_no_cc_stnk; ?></th>
   </tr>
   <tr>
        <th width="20%">Ref. CC Bayar</th>
        <th width="1%">:</th>
        <th width="70%"><?php echo $bayar_ref_cc_stnk; ?></th>
   </tr>
   <tr>
        <th width="20%">Bayar Jumlah</th>
        <th width="1%">:</th>
        <th width="70%"><?php echo $bayar_jumlah_stnk; ?></th>
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