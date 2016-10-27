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

.subtitle{
  font-size: 10px;
  font-style: italic;
  text-align:center;
}

.judul {
  font-size: 16px;
  font-weight:bold;
  text-align:center;
}

.isi {
  font-size: 17px;
  text-align:center;
  font-weight: bold;
  align-self: center;
}

.xx {
  font-size: 15px;
  text-align:left;
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
    <td width="100%" align="left" class="judul" >PT. <?php echo $birojasa['nama']; ?></td>
  </tr>
  <tr>
    <td width="100%" align="left" class="subtitle"><?php echo $birojasa['alamat']; ?></td>
  </tr>
  <tr>
    <td width="100%" align="left" class="subtitle"><?php echo $birojasa['no_siup']; ?></td>
  </tr>
  <tr>
    <td width="100%" align="left" class="subtitle"><?php echo $birojasa['telp']; ?></td>
  </tr>
</table>
<br />
<hr style="height: 3px" />&nbsp;
<br />&nbsp;


<table width="100%" align="center" class="isi">
  <tr>
    <td width="100%">
      Bukti Bayar
    </td>
  </tr>
</table>

<br />&nbsp;
<br />&nbsp;
<br />&nbsp;
<br />&nbsp;
<table width="100%" class="xx" >
  <tr>
    <td width="20%">
      Telah Terima Dari
    </td>
    <td width="70%">
      : <?php echo $birojasa['nama']; ?>
    </td>
  </tr>
  <tr>
    <td width="20%">
      &nbsp;
    </td>
    <td width="70%">
      &nbsp;
    </td>
  </tr>
  <tr>
    <td width="20%">
      Uang Sejumlah 
    </td>
    <td width="70%">
      : (&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;)
    </td>
  </tr>
  <tr>
    <td width="20%">
      &nbsp;
    </td>
    <td width="70%">
      &nbsp;
    </td>
  </tr>
  <tr>
    <td width="20%">
      Untuk Pembayaran
    </td>
    <td width="70%">
      : Pengurusan BPKB Dengan No. Rangka <b><?php echo $query['no_rangka']; ?></b>
    </td>
  </tr>
</table>


<br />&nbsp;
<br />&nbsp;
<br />&nbsp;
<br />&nbsp;
<br />&nbsp;
<br />&nbsp;
<br />&nbsp;
<br />&nbsp;
<br />&nbsp;

<table width="100%">
  <tr>
    <td width="70%">&nbsp;</td>
    <td width="30%" style="font-size: 12px">Jakarta, <?php echo flipdate($query['tgl_cetak_kwitansi']); ?></td>
  </tr>
  <tr>
    <td width="70%">&nbsp;</td>
    <td width="30%">&nbsp;</td>
  </tr>
  <tr>
    <td width="70%" style="font-size: 20px"><b>Rp. <?php echo rupiah($query['bayar_jumlah_bpkb']); ?>,-</b></td>
    <td width="30%">&nbsp;</td>
  </tr>
  <tr>
    <td width="70%">&nbsp;</td>
    <td width="30%">&nbsp;</td>
  </tr>
  <tr>
    <td width="70%">&nbsp;</td>
    <td width="30%" style="font-size: 12px"><?php echo $query['nm_pengurus_bpkb']; ?></td>
  </tr>
</table>





</body>

</html>