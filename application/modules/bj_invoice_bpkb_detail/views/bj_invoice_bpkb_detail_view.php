 <link href="<?php echo base_url("assets") ?>/css/datepicker.css" rel="stylesheet">
    <script src="<?php echo base_url("assets") ?>/js/bootstrap-datepicker.js"></script>
     <script src="<?php echo base_url("assets") ?>/js/jquery.dataTables.min.js"></script>  
     
     <form role="form" action="" id="btn-cari">
            
            
            <div class="col-md-2">
              <div class="form-group">
                <label for="Tanggal">Tanggal Awal</label>
                <input name="tanggal_awal" id="tanggal_awal" type="text" class="form-control tanggal input-style" placeholder="Tanggal Awal" data-date-format="dd-mm-yyyy" />
              </div>
            </div>
            <div class="col-md-2">
              <div class="form-group">
                <label for="Tanggal">Tanggal Akhir</label>
                <input name="tanggal_akhir" id="tanggal_akhir" type="text" class="form-control tanggal input-style" placeholder="Tanggal Akhir" data-date-format="dd-mm-yyyy" />
              </div>
            </div>
            <div class="col-md-4">
              <div class="form-group">
                <label>Nama Dealer</label>
                <?php echo form_dropdown("dealer",$arr_dealer,'','id="dealer" class="form-control input-style"'); ?>
              </div>
            </div>
            <div class="col-md-1">
              <div class="form-group">
                <label></label>
                <button type="submit" class="btn btn-primary form-control" id="btn_submit" style="border-radius: 5px"><i class="fa">Cari</i></button>
              </div>
            </div>
            <div class="col-md-1">
              <div class="form-group">
                <label></label>
                <button type="reset" class="btn btn-danger form-control" id="btn_reset" style="border-radius: 5px"><i class="fa">Reset</i></button>
              </div>
            </div>
            
      </form>


<table width="100%" border="0" id="us_serah_bpkb_detail" class="table table-striped table-bordered table-hover dataTable no-footer" role="grid">
<thead>
  <tr>  
    <th>No.</th>
    <th>No. Invoice</th>
    <th>Jumlah Berkas</th>
    <th>Dealer</th>
  </tr>
</thead>
</table>


<div class="col-md-12">
    <a href="<?php echo site_url('bj_invoice_bpkb'); ?>" class="btn btn-danger col-md-2">Kembali</a>   
    <a href="<?php echo site_url('bj_bbn_satu'); ?>" class="btn btn-success col-md-2">Data BBN 1</a>          
  </div>
<?php 
$this->load->view($this->controller.'_view_js');
?>