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
    <td width="100%" align="center"><h1>Detail Penyerahan BPKB Ke-Polda <?php echo $data_ref['nm_polda'] ?></h1></td>
  </tr>
   <tr>
    <td width="100%" align="center"><h1>Detail No Referensi : <?php echo $data_ref['no_ref']; ?></h1></td>
  </tr>
  
</table>
<br />&nbsp;
<br />&nbsp;
    

<table border="0.4" cellpadding="5" width="100%">
  <tr class="thead">
    <th width="4%">#</th>
    <th width="24%">No. Rangka</th>
    <th width="22%">No. Mesin</th>
    <th width="22%">No. Faktur</th>
    <th width="31%">Nama Pemilik</th>
  </tr>
  <?php 
  $total_biaya = 0;
  
    foreach($hasil as $x => $row): 
    $total_biaya = $total_biaya+$row['rp_daftar_bpkb'];
    
    ?>
  <tr>
    <td><?php echo $x+1; ?></td>
    <td><?php echo $row['no_rangka']; ?></td>
    <td><?php echo $row['no_mesin']; ?></td>
    <td><?php echo $row['no_faktur']; ?></td>
    <td><?php echo $row['nama_pemilik']; ?></td>
  </tr>
  <?php endforeach; ?>

  
</table>

Tanggal : <?php echo flipdate($data_ref['tanggal']); ?>

</body>

</html>