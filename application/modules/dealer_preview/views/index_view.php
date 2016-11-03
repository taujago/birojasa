    <?php
    $userdata = $this->session->userdata('dealer_login');
    ?>    


    <style type="text/css">
    .datepicker{ z-index: 1151 !important; }
    </style>

     <link href="<?php echo base_url("assets") ?>/css/datepicker.css" rel="stylesheet">
    <script src="<?php echo base_url("assets") ?>/js/bootstrap-datepicker.js"></script>
     <script src="<?php echo base_url("assets") ?>/js/jquery.dataTables.min.js"></script>           
              <div class="x_title">
                  <h2>Proses <small>Pengurusan BBN 1 </small></h2>
                  <ul class="nav navbar-right panel_toolbox">
                    
                  </ul>
                  <div class="clearfix"></div>
                </div>


          <form role="form" action="" id="btn-cari">
            <div class="col-md-2">
              <div class="form-group">
                <label for="Tanggal">Tanggal Awal</label>
                <input name="tanggal_awal" id="tanggal_awal" type="text" class="form-control tanggal" placeholder="Tanggal Awal" data-date-format="dd-mm-yyyy"></input>
              </div>
            </div>
            <div class="col-md-2">
              <div class="form-group">
                <label for="Tanggal">Tanggal Akhir</label>
                <input name="tanggal_akhir" id="tanggal_akhir" type="text" class="form-control tanggal" placeholder="Tanggal Akhir" data-date-format="dd-mm-yyyy"></input>
              </div>
            </div>
            <div class="col-md-2">
              <div class="form-group">
                <label for="Tanggal">Jenis Pencarian</label>
                <?php echo form_dropdown("jenis_field",$arr_dealer,"",'id="jenis_field" class="form-control input-style"'); ?>
              </div>
            </div>
            <div class="col-md-3">
              <div class="form-group">
                <label for="nama"></label>
                
                <input id="field" name="field" type="text" class="form-control" placeholder="Value"></input>
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
                <button type="button" class="btn btn-success form-control" id="cetak" style="border-radius: 5px"><i class="fa">Cetak</i></button>
              </div>
            </div>
            <div class="col-md-1">
              <div class="form-group">
                <label></label>
                <button type="reset" class="btn btn-danger form-control" id="btn_reset" style="border-radius: 5px"><i class="fa">Reset</i></button>
              </div>
            </div>
            
          
          </form>
            


<table width="100%" border="0" id="bj_bbn_satu" class="table table-striped 
             table-bordered table-hover dataTable no-footer" role="grid" style='text-align:center;vertical-align:middle'>
<thead>
  <tr>

    
    <th width="10%"  style='text-align:center;vertical-align:middle'>Tgl. Entri</th>
    <th width="15%" style='text-align:center;vertical-align:middle'>No. Rangka/Mesin/Faktur</th>
    <th width="10%" style='text-align:center;vertical-align:middle'>No. Polisi</th>
    <th width="10%" style='text-align:center;vertical-align:middle'>No. BPKB</th>
    <th width="10%" style='text-align:center;vertical-align:middle'>Pajak</th>
    <th width="10%" style='text-align:center;vertical-align:middle'>Admin</th>
    <th width="20%"  style='text-align:center;vertical-align:middle'>Pengurus</th>
    <!-- <th width="20%" rowspan="2" style='text-align:center;vertical-align:middle'>#</th> -->
  </tr>
  
  
</thead>
</table>
                  





<?php 
$this->load->view('index_view_js');
?>

                
                <!-- End Page -->


      
