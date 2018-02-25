<table width="100%" border="0" id="us_serah_bpkb_detail" class="table table-striped table-bordered table-hover dataTable no-footer" role="grid">
<thead>
  <tr>  
    <th>No. Rangka</th>
    <th>No. Mesin</th>
    <th>No. Faktur</th>
    <th>Nama Pemilik</th>
    <th>Byarar</th>
  </tr>
</thead>
<tbody>
	<?php foreach ($hasil as $row): ?>
		<tr>
			<td><?php echo $row['no_rangka']; ?></td>
			<td><?php echo $row['no_mesin']; ?></td>
			<td><?php echo $row['no_faktur']; ?></td>
			<td><?php echo $row['nama_pemilik']; ?></td>
			<td><?php echo rupiah($row['bayar_jumlah_stnk']); ?></td>
		</tr>		
	<?php endforeach ?>
</tbody>
</table>
<input type="hidden" name="id" id="id" value="<?php echo $id; ?>">

<div class="col-md-12">
	<button  type="button" class="btn btn-success col-md-2" id="cetak"><i class="fa fa-print"> </i> Cetak Invoice</button> <button  type="button" class="btn btn-success col-md-2" id="cetak_tt"><i class="fa fa-print"> </i> Cetak Tanda Terima</button> <a href="<?php echo site_url('bj_invoice_stnk_detail') ?>" class="btn btn-danger col-md-2">Kembali</a>
</div>

<?php 
$this->load->view($this->controller.'_view_detail_js');
?>