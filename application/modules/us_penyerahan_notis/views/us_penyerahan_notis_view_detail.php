<table width="100%" border="0" id="us_serah_bpkb_detail" class="table table-striped table-bordered table-hover dataTable no-footer" role="grid">
<thead>
  <tr>  
    <th>No. Rangka</th>
    <th>No. Mesin</th>
    <th>No. Faktur</th>
    <th>Nama Pemilik</th>
    <th>Estimasi</th>
  </tr>
</thead>
<tbody>
	<?php $x = 0; foreach ($hasil as $row): ?>
		<tr>
			<td><?php echo $row['no_rangka']; ?></td>
			<td><?php echo $row['no_mesin']; ?></td>
			<td><?php echo $row['no_faktur']; ?></td>
			<td><?php echo $row['nama_pemilik']; ?></td>
			<td><?php echo rupiah($row['rp_daftar_stnk']); $x = $row['rp_daftar_stnk']+$x; ?></td>
		</tr>		
	<?php endforeach ?>
	<tr>
		<td colspan='4' align="center"><b>Total</b></td>
		<td><?php echo rupiah($x); ?></td>
	</tr>
</tbody>
</table>
<input type="hidden" name="id_ref" id="id_ref" value="<?php echo $id_ref; ?>">

<div class="col-md-12">
	<button  type="button" class="btn btn-success col-md-4" id="cetak">Cetak Notis</button> <a href="<?php echo site_url($this->controller) ?>" class="btn btn-danger col-md-2">Kembali</a>
</div>

<?php 
$this->load->view($this->controller.'_view_detail_js');
?>