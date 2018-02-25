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
   <td rowspan="4" width="60%"><img src="<?php echo base_url().'assets/logo_birojasa/'.$birojasa['logo']; ?>" height="50" width="50"></td>
    <td width="40%"><b><?php echo $birojasa['nama']; ?></b></td>
    
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
    <td width="100%" align="center" ><h1 style="font-size: 20px;"><u>TANDA TERIMA</u></h1></td>
  </tr>
   <tr>
    <td width="100%" align="center"><h3><?php echo $data_inv['no_tt_bpkb']; ?></h3></td>
  </tr>
  
</table>



<br/>&nbsp;
<br/>&nbsp;
<br/>&nbsp;

<?php
     $new_data = array();
    if(count($hasil)>5){
      $new_data = array_slice($hasil,5);
      $dll = ' .DLL';
    }else{
    $new_data = $hasil;
    $dll = '.';
  }

 ?>

<table width="100%">
  <tr>
    <td width="30%">Telah Terima Dari</td>
    <td width="60%">: <?php echo $birojasa['nama']; ?></td>
  </tr>
  <tr>
    <td>Kepada</td>
    <td>: <?php echo 'Dealer '.$dealer['nama']; ?></td>
  </tr>
  <tr>
    <td>UP</td>
    <td>: <?php echo $data_inv['diterima'];  ?></td>
  </tr>
  <tr>
    <td>Keterangan</td>
    <td>: <?php echo $data_inv['jumlah_berkas']; ?> Buah Buku BPKB dengan Nomor BPKB sbb : </td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;&nbsp;<?php foreach($new_data as $x => $row){ echo $row['bpkb_no'].', '; } ?><?php echo $dll; ?></td>
  </tr>
</table>


<br/>&nbsp;
<br/>&nbsp;
<br/>&nbsp;
<br/>&nbsp;

<table width="100%">
  <tr>
    <td>Jakarta, <?php echo flipdate($data_inv['tanggal']) ?></td>
  </tr>
</table>



<br/>&nbsp;
<br/>&nbsp;
<br/>&nbsp;

<table width="100%">
  <tr>
    <td width="50%" align="center">Dibuat Oleh</td>
    <td width="50%" align="center">Diterima Oleh</td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td align="center">(<?php echo $data_inv['dibuat']; ?>)</td>
    <td align="center">(<?php echo $data_inv['diterima']; ?>)</td>
  </tr>
</table>

<br/>&nbsp;
<br/>&nbsp;
<br/>&nbsp;
<br/>&nbsp;



    



</body>

</html>