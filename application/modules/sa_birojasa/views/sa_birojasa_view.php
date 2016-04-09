 <link href="<?php echo base_url("assets") ?>/css/datepicker.css" rel="stylesheet">
<script src="<?php echo base_url("assets") ?>/js/bootstrap-datepicker.js"></script>
 <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/jquery.dataTables.min.css">


        <!-- Content Header (Page header) -->
        

          <!-- Default box -->
          <div class="box">
            <div class="box-header with-border">
              <h3 class="box-title">Data Biro Jasa</h3>
              <div class="box-tools pull-right">
                <button class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse"><i class="fa fa-minus"></i></button>
              </div>
            </div>
            <div class="box-body">

            <div class="row">
            <div class="col-sm-offset-3 col-sm-9">
              
            </div>
            <div class="col-md-3 pull-right">
              <div class="form-group">
                <label></label>
                <a href="<?php echo site_url('sa_add_bj'); ?>"><button type="button" class="btn btn-primary form-control"><i class="fa fa fa-plus-circle "></i> Tambah Biro Jasa</button></a>
              </div>
            </div>
            </div>

            <form role="form" action="" id="btn-cari" >
            <div class="col-md-3">
              <div class="form-group">
                <label for="nama">Nama</label>
                <input id="nama" name="nama" type="text" class="form-control" placeholder="Nama"></input>
              </div>
            </div>
            <div class="col-md-1">
              <div class="form-group">
                <label></label>
                <button type="submit" class="btn btn-primary form-control" id="btn_submit"><i class="fa">Cari</i></button>
              </div>
            </div>
            <div class="col-md-1">
              <div class="form-group">
                <label></label>
                <button type="reset" class="btn btn-danger form-control" id="btn_reset"><i class="fa">Reset</i></button>
              </div>
            </div>
            </form>
            


<table width="100%" border="0" id="biro_jasa" class="table table-striped 
             table-bordered table-hover dataTable no-footer" role="grid">
<thead>
  <tr  >


        
        <th width="5%">ID</th>
        <th width="15%">Nama</th>
        <th width="16%">Alamat </th>
        <th width="5%">Telpon</th>
        <th width="5%">Hp</th>
        <th width="8%">Email</th>
        <th width="8%">#</th>
    </tr>
  
</thead>
</table>
            </div>
            </div>



<?php 
$this->load->view("sa_birojasa_view_js");
?>