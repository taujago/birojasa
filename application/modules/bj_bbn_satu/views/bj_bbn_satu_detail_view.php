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
<tbody style="font-size: 16px;">
	<tr>
        <td width="20%">No. Rangka</td>
        <td width="2%">:</td>
        <td width="78%"><?php echo $no_rangka; ?></td>
  </tr>
	<tr>
        <td>No. Mesin</td>
        <td>:</td>
        <td><?php echo $no_mesin; ?></td>
  </tr>
   <tr>
        <td >No. Faktur</td>
        <td >:</td>
        <td ><?php echo $no_faktur; ?></td>
  </tr>
  <tr>
        <td>Tgl. Faktur</td>
        <td>:</td>
        <td><?php echo $tgl_faktur; ?></td>
  </tr>
	<tr>
        <td>Merk</td>
        <td> : </td>
        <td><?php echo $merek; ?></td>
  </tr>
	<tr>
        <td>Type</td>
        <td>:</td>
        <td><?php echo $nm_tipe; ?></td>
  </tr>
	<tr>
        <td >Jenis</td>
        <td>:</td>
        <td ><?php echo $jenis; ?></td>
  </tr>
  <tr>
        <td >Model</td>
        <td>:</td>
        <td><?php echo $model; ?></td>
  </tr>
  <tr>
        <td>Warna</td>
        <td>:</td>
        <td><?php echo $warna; ?></td>
  </tr>
  <tr>
        <td>Silinder</td>
        <td>:</td>
        <td><?php echo $silinder; ?></td>
  </tr>
  <tr>
        <td>Tahun Buat</td>
        <td>:</td>
        <td><?php echo $tahun_buat; ?></td>
  </tr>
  <tr>
        <td>Kode Dealer</td>
        <td>:</td>
        <td><?php echo $kode_dealer; ?></td>
  </tr>
  <tr>
        <td>Nama Dealer</td>
        <td>:</td>
        <td><?php echo $nama_dealer; ?></td>
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
<tbody style="font-size: 16px;">
    <tr>
        <td width="20%">Nama</td>
        <td width="1%">:</td>
        <td width="70%"><?php echo $nama_pemilik; ?></td>
   </tr>
   <tr>
        <td width="20%">Alamat</td>
        <td width="1%">:</td>
        <td width="70%"><?php echo $alamat_pemilik; ?></td>
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

<tbody style="font-size: 16px;">
    <tr>
        <td width="20%">Polda</td>
        <td width="1%">:</td>
        <td width="70%"><?php echo $polda; ?></td>
   </tr>
   <tr>
        <td width="20%">Samsat</td>
        <td width="1%">:</td>
        <td width="70%"><?php echo $samsat; ?></td>
   </tr>
   <tr>
        <td width="20%">Tgl. Entri</td>
        <td width="1%">:</td>
        <td width="70%"><?php echo $tgl_entri; ?></td>
   </tr>
   
   
   <tr>
        <td width="20%">Daftar Estimasi STNK</td>
        <td width="1%">:</td>
        <td width="70%">Rp. <?php echo $rp_daftar_stnk; ?>,00</td>
   </tr>
   <tr>
        <td width="20%">Daftar Estimasi STCK</td>
        <td width="1%">:</td>
        <td width="70%">Rp. <?php echo rupiah($rp_daftar_stck); ?>,00</td>
   </tr>
   <tr>
        <td width="20%">Daftar Estimasi BPKB</td>
        <td width="1%">:</td>
        <td width="70%">Rp. <?php echo $rp_daftar_bpkb; ?>,00</td>
   </tr>
   <tr>
        <td width="20%">Pajak Estimasi Kendaraan</td>
        <td width="1%">:</td>
        <td width="70%">Rp. <?php echo $rp_pajak_kendaraan; ?>,00</td>
   </tr>
   <tr>
        <td width="20%">Admin Estimasi Fee</td>
        <td width="1%">:</td>
        <td width="70%">Rp. <?php echo $rp_admin_fee; ?>,00</td>
   </tr>
  </tbody>
</table>

<table width="100%" border="0" class="table table-striped table-hover no-footer" role="grid">
<tbody style="font-size: 16px;">
    <tr>
        <td width="20%">Tgl. Masuk Samsat</td>
        <td width="1%">:</td>
        <td width="70%"><?php echo $samsat_masuk_tgl; ?></td>
   </tr>
   <tr>
        <td width="20%">Terakhir Diupdate</td>
        <td width="1%">:</td>
        <td width="70%"><?php echo $tgl_update; ?></td>
   </tr>
    <tr>
        <td width="20%">Pengurus STNK & STCK</td>
        <td width="1%">:</td>
        <td width="70%"><?php echo $nm_pengurus_stnk; ?></td>
   </tr>
    <tr>
        <td width="20%">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Status STNK </td>
        <td width="1%">:</td>
        <td width="70%"><?php if($status_stnk==0){ echo 'Belum Selesai';}else{ echo 'Selesai';} ?></td>
   </tr>
   <tr>
        <td width="20%">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Status STCK </td>
        <td width="1%">:</td>
        <td width="70%"><?php if($status_terima_stck==0){ echo 'Belum Selesai';}else{ echo 'Selesai';} ?></td>
   </tr>
   <tr>
        <td width="20%">Pengurus BPKB</td>
        <td width="1%">:</td>
        <td width="70%"><?php echo $nm_pengurus_bpkb; ?></td>
   </tr>
   <tr>
        <td width="20%">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Status BPKB </td>
        <td width="1%">:</td>
        <td width="70%"><?php if($status_bpkb==0){ echo 'Belum Selesai';}else{ echo 'Selesai';} ?></td>
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


 <div class="row">
    <div class="col-md-12">
              <div class="x_panel">
                <div class="x_title">
                  <h2>File Upload</h2>
                  <ul class="nav navbar-right panel_toolbox">
                    <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                    </li>
                  </ul>
                  <div class="clearfix"></div>
                </div>
                <div class="x_content">



<b>

<table width="100%" border="0" class="table table-striped table-hover no-footer" role="grid">

<tbody>
    
   
   <tr>
        <td width="20%">Faktur</td>
        <td width="1%">:</td>
        <td width="70%"><?php if(!empty($faktur)) { ?>
          <img src="<?php echo base_url().'assets/file_upload/'.$faktur; ?>" height="300" width="300">
        <?php }else{ echo 'Data Tidak di-input'; }; ?></td>
   </tr>
   <tr>
        <td width="20%">KTP</td>
        <td width="1%">:</td>
        <td width="70%"><?php if(!empty($ktp)) { ?>
          <img src="<?php echo base_url().'assets/file_upload/'.$ktp; ?>" height="300" width="300">
        <?php }else{ echo 'Data Tidak di-input'; }; ?></td>
   </tr>
   <tr>
        <td width="20%">Cek Fisik</td>
        <td width="1%">:</td>
        <td width="70%"><?php if(!empty($cek_fisik)) { ?>
          <img src="<?php echo base_url().'assets/file_upload/'.$cek_fisik; ?>" height="300" width="300">
        <?php }else{ echo 'Data Tidak di-input'; }; ?></td>
   </tr>
   
   <tr>
        <td width="20%">SIUP</td>
        <td width="1%">:</td>
        <td width="70%"><?php if(!empty($siup)) { ?>
          <img src="<?php echo base_url().'assets/file_upload/'.$siup; ?>" height="300" width="300">
        <?php }else{ echo 'Data Tidak di-input'; }; ?></td>
   </tr>
   <tr>
        <td width="20%">TDP </td>
        <td width="1%">:</td>
        <td width="70%"><?php if(!empty($tdp)) { ?>
          <img src="<?php echo base_url().'assets/file_upload/'.$tdp; ?>" height="300" width="300">
        <?php }else{ echo 'Data Tidak di-input'; }; ?></td>
   </tr>
   <tr>
        <td width="20%">Domisili</td>
        <td width="1%">:</td>
        <td width="70%"><?php if(!empty($domisili)) { ?>
          <img src="<?php echo base_url().'assets/file_upload/'.$domisili; ?>" height="300" width="300">
        <?php }else{ echo 'Data Tidak di-input'; }; ?></td>
   </tr>
   <tr>
        <td width="20%">NPWP</td>
        <td width="1%">:</td>
        <td width="70%"><?php if(!empty($npwp)) { ?>
          <img src="<?php echo base_url().'assets/file_upload/'.$npwp; ?>" height="300" width="300">
        <?php }else{ echo 'Data Tidak di-input'; }; ?></td>
   </tr>
   <tr>
        <td width="20%">Surat Kuasa</td>
        <td width="1%">:</td>
        <td width="70%"><?php if(!empty($sk)) { ?>
          <img src="<?php echo base_url().'assets/file_upload/'.$sk; ?>" height="300" width="300">
        <?php }else{ echo 'Data Tidak di-input'; }; ?></td>
   </tr>
  </tbody>
</table>
</b>
</div>
</div>
</div>
</div>

  
   <div class="col-md-2"><a href="<?php echo site_url('bj_bbn_satu'); ?>" class="btn btn-primary"> Back </a></div>
 