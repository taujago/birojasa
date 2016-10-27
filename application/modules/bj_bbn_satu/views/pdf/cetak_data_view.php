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
    <td width="100%" align="center"><h1>Data Report BBN 1</h1></td>
  </tr>
  
</table>
<br />&nbsp;
<br />&nbsp;
    

    <table border="0.4" cellpadding="5" width="100%">
  <tr class="thead">
    <th width="3%">No</th>
    <th width="13%">No. Rangka</th>
    <th width="13%">No. Mesin</th>
    <th width="10%">No. Faktur</th>
    <th width="10%">Tgl. Faktur</th>
    <th width="10%">Model</th>
    <th width="10%">Merk</th>
    <th width="8%">Jenis</th>
    <th width="11%">Pengurus STNK</th>
    <th width="12%">Pengurus BPKB</th>
  </tr>
  <?php foreach($query as $x => $row): 
    
    ?>
  <tr>
    <td><?php echo $x+1; ?></td>
    <td><?php echo $row->no_rangka; ?></td>
    <td><?php echo $row->no_mesin; ?></td>
    <td><?php echo $row->no_faktur; ?></td>
    <td><?php echo $row->tgl_faktur; ?></td>
    <td><?php echo $row->model; ?></td>
    <td><?php echo $row->merk; ?></td>
    <td><?php echo $row->jenis; ?></td>
    <td><?php echo $row->nm_pengurus_stnk; ?></td>
    <td><?php echo $row->nm_pengurus_bpkb; ?></td>
  </tr>
  <?php endforeach; ?>
</table>

</body>

</html>