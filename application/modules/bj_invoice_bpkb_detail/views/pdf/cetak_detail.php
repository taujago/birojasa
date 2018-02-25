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
    <td rowspan="4" width="25%"><img src="<?php echo base_url().'assets/logo_birojasa/'.$birojasa['logo']; ?>" height="50" width="50"></td>
    
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
    <td width="100%" align="center" ><h1 style="font-size: 20px;"><u>INVOICE</u></h1></td>
  </tr>
   <tr>
    <td width="100%" align="center"><h3><?php echo $data_inv['no_invoice']; ?></h3></td>
  </tr>
  
</table>


<br/>&nbsp;
<br/>&nbsp;
<hr/>&nbsp;
<br/>&nbsp;
<br/>&nbsp;


<table width="100%">
  <tr>
    <td width="60%">Kepada Yth.</td>
    <td width="15%">Tangal</td>
    <td width="25%">: <?php echo flipdate($data_inv['tanggal']) ?></td>
  </tr>
  <tr>
    <td><b><?php echo 'Dealer '.$dealer['nama']; ?></b></td>
    <td>No. PKS</td>
    <td>: </td>
  </tr>
  <tr>
    <td><b><?php echo $dealer['alamat'] ?></b></td>
    <td>Tgl. PKS</td>
    <td>: </td>
  </tr>
  <tr>
    <td><b>Tlp. <?php echo $dealer['telp']; ?></b></td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>

</table>

 <?php 
  $total_biaya = 0;
  
    foreach($hasil as $x => $row): 
    $total_biaya = $total_biaya+$row['bayar_jumlah_bpkb']; 
    endforeach; 

    $new_data = array();
    if(count($hasil)>5){
      $new_data = array_slice($hasil,5);
      $dll = ' .DLL';
    }else{
    $new_data = $hasil;
    $dll = '.';
  }

  
   ?>

<table width="100%" border="0.4" cellpadding="5" align="center">
  <tr>
    <td width="10%"><b>Qty</b></td>
    <td width="60%"><b>Keterangan</b></td>
    <td width="15%"><b>Unit Price</b></td>
    <td width="15%"><b>TOTAL</b></td>
  </tr>
</table>
<br/>&nbsp;
<br/>&nbsp;
<table width="100%">
  <tr>
    <td width="10%" align="center"><b><?php echo $data_inv['jumlah_berkas']; ?></b></td>
    <td width="60%"><b>Pembayaran Pembuatan BPKB sebanyak <?php echo $data_inv['jumlah_berkas']; ?> Berkas dengan nomor BPKB sebagai berikut : <?php foreach($new_data as $x => $row){ echo $row['bpkb_no'].', '; } ?><?php echo $dll; ?> </b></td>
    <td width="15%">&nbsp;</td>
    <td width="15%" align="center"><b><?php echo rupiah($total_biaya); ?>,-</b></td>
  </tr>
</table>


<br/>&nbsp;
<br/>&nbsp;
<br/>&nbsp;
<br/>&nbsp;
<br/>&nbsp;
<br/>&nbsp;
<br/>&nbsp;
<br/>&nbsp;
<br/>&nbsp;
<br/>&nbsp;
<br/>&nbsp;
<br/>&nbsp;
<br/>&nbsp;
<br/>&nbsp;
<br/>&nbsp;
<br/>&nbsp;
<br/>&nbsp;
<br/>&nbsp;
<br/>&nbsp;
<br/>&nbsp;
<br/>&nbsp;
<br/>&nbsp;
<br/>&nbsp;
<br/>&nbsp;
<br/>&nbsp;
<br/>&nbsp;
<hr/>&nbsp;
<br/>&nbsp;
<br/>&nbsp;

<?php
  $pajak = ($total_biaya*10)/100;
  $total = $pajak+$total_biaya;
 ?>
<table width="100%">
  <tr>
    <td width="50%">&nbsp;</td>
    <td width="30%">Sub. Total</td>
    <td width="5%"></td>
    <td width="15%" align="right"><?php echo rupiah($total_biaya); ?>,-</td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>Discount</td>
    <td></td>
    <td></td>
  </tr>
  <tr>
    <td >&nbsp;</td>
    <td >PPN</td>
    <td >10%</td>
    <td align="right"><?php echo rupiah($pajak); ?>,-</td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td colspan="3"><hr/></td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>TOTAL</td>
    <td>&nbsp;</td>
    <td align="right"><b><?php echo rupiah($total) ?>.-</b></td>
  </tr>
</table>


    



</body>

</html>