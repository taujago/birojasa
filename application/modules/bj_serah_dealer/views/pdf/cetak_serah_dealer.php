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
    <td width="100%" align="center"><h1>Dokumen Penyerahan Dealer</h1></td>
  </tr>
  
</table>
<br />&nbsp;
<br />&nbsp;
    

    <table border="0.4" cellpadding="5" width="100%">
  <tr class="thead">
    <th width="3%">No</th>
    <th width="13%">Nama Pemilik</th>
    <th width="13%">Type</th>
    <th width="11%">No. Polisi</th>
    <th width="10%">No. BPKB</th>
    <th width="10%">Total PKB</th>
    <th width="10%">Biaya Proses</th>
    <th width="10%">Fee</th>
    <th width="8%">Total</th>
    
    <th width="12%">Pengurus BPKB</th>
  </tr>
  <?php 
  $total_biaya = 0;
  $total_fee = 0;
  
  foreach($query as $x => $row): 
    
    $pkb = '';
    $biaya_proses = $row->bayar_jumlah_bpkb+$row->bayar_jumlah_stnk+$row->rp_pajak_kendaraan;
    $total = $biaya_proses+$row->rp_admin_fee;
    $total_biaya = $total_biaya+$biaya_proses;
    $total_fee = $total_fee+$row->rp_admin_fee;

    ?>
  <tr>
    <td><?php echo $x+1; ?></td>
    <td><?php echo $row->nama_pemilik; ?></td>
    <td><?php echo $row->nm_type; ?></td>
    <td><?php echo $row->no_pol; ?></td>
    <td><?php echo $row->bpkb_no; ?></td>
    <td><?php echo $pkb; ?></td>
    <td><?php echo rupiah($biaya_proses); ?></td>
    <td><?php echo rupiah($row->rp_admin_fee); ?></td>
    <td><?php echo rupiah($total); ?></td>
    
    <td><?php echo $row->nm_pengurus_bpkb; ?></td>
  </tr>
  <?php endforeach; ?>

  <tr>
    <td colspan="4">Total</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td><b><?php echo rupiah($total_biaya); ?></b></td>
    <td><b><?php echo rupiah($total_fee); ?></b></td>
    <td><b><?php echo rupiah($total_biaya+$total_fee); ?></b></td>
    
    <td>&nbsp;</td>
  </tr>
</table>

</body>

</html>