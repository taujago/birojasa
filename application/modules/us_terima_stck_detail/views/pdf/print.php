<html>
  <head>
    <title>
      <?php echo   $title; ?>
    </title>

 <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/css/print_style.css">


</head>

<body>

<!-- <div id="wrap" style="width:1024; margin:0px auto" >  -->


<style>
* {
  font-size:10px;
}
.judul {
  font-size:12px;
  font-weight:bold;
   text-align:center;
}

#gambar {
  width:50px;
  position:fixed;
  top:10px;
  float:left;
}

#kop {
  text-align:center;
}

.thead {
  font-weight: bold;
}
</style>
<table width="100%">
  <tr>
    <td width="75%"><b><?php echo $birojasa['nama']; ?></b></td>
    <td rowspan="4" width="25%">&nbsp;</td>
  </tr>
  <tr>
    <td><?php echo $birojasa['alamat']; ?></td>
  </tr>
  <tr>
    <td>Telp. <?php echo $birojasa['telp']; ?></td>
  </tr>
  <tr>
    <td>Email. <?php echo $birojasa['email']; ?></td>
  </tr>
</table>

<br/>&nbsp;
<br/>&nbsp;
<hr/>&nbsp;
<br/>&nbsp;
<br/>&nbsp;

<table width="100%">
  <tr>
    <td width="100%" align="center"><h1>Detail Penerimaan STCK Dari Samsat <?php if(!empty($samsat)){ echo $samsat; } ?> </h1></td>
  </tr>
</table>
<br />&nbsp;
<br />&nbsp;
    

<table border="0.4" cellpadding="5" width="100%">
  <tr class="thead">
    <th width="5%">#</th>
    <th width="20%">No. Rangka</th>
    <th width="20%">No. Mesin</th>
    <th width="20%">No. Faktur</th>
    <th width="20%">Nama Pemilik</th>
    <th width="15%">Tanggal</th>
  </tr>
  <?php 
  
  
    foreach($query as $x => $row): 
    
    
    ?>
  <tr>
    <td><?php echo $x+1; ?></td>
    <td><?php echo $row['no_rangka']; ?></td>
    <td><?php echo $row['no_mesin']; ?></td>
    <td><?php echo $row['no_faktur']; ?></td>
    <td><?php echo $row['nama_pemilik']; ?></td>
    <td><?php echo flipdate($row['stck_terima_tgl']); ?></td>
  </tr>
  <?php endforeach; ?>
</table>

<?php if(!empty($tanggal)){ ?>
  
  Tanggal : <?php echo flipdate($tanggal['tgl_awal']).' S/D '.flipdate($tanggal['tgl_akhir']); ?>

<?php } ?>

</body>

</html>