


    <?php
    $userdata = $this->session->userdata('bj_login');
    ?>    

     <link href="<?php echo base_url("assets") ?>/css/datepicker.css" rel="stylesheet">
    <script src="<?php echo base_url("assets") ?>/js/bootstrap-datepicker.js"></script>
     <script src="<?php echo base_url("assets") ?>/js/jquery.dataTables.min.js"></script>           
              <div class="x_title">
                  <h2>Tambah Data <small>Biaya Estimasi BBN 1 </small></h2>
                  <ul class="nav navbar-right panel_toolbox">
                    <a href="<?php echo site_url($this->controller.'/baru'); ?>"><button type="button" class="btn btn-primary">Tambah Data</button>
                    </a>
                  </ul>
                  <div class="clearfix"></div>
                </div>


          <form role="form" action="" id="btn-cari">
            <div class="col-md-3">
              <div class="form-group">
              <label for="nama">Tipe Kendaraan </label>
                <input id="tipe_kendaraan" name="tipe_kendaraan" type="text" class="form-control" placeholder="Tipe Kendaraan"></input>
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
            


<table width="100%" border="0" id="bbn_satu" class="table table-striped 
             table-bordered table-hover dataTable no-footer" role="grid" style='text-align:center;vertical-align:middle'>

<thead>
  <tr >


        
        <th width="7%" style='text-align:center;vertical-align:middle'>#</th>
        <th width="15%" style='text-align:center;vertical-align:middle'>Tipe Kendaraan</th>
        <th width="11%" style='text-align:center;vertical-align:middle'>Tahun</th>
        <th width="10%" style='text-align:center;vertical-align:middle'>Warna TNKB</th>
        <th width="15%" style='text-align:center;vertical-align:middle'>Samsat</th>
        <th width="15%" style='text-align:center;vertical-align:middle'>Polda</th>
        <th width="15%" style='text-align:center;vertical-align:middle'>Biaya</th>
        <th width="14%" style='text-align:center;vertical-align:middle'>Action</th>
    </tr>
  
</thead>
</table>
                  

<?php 
$this->load->view($this->controller.'_view_js');
?>

                
                <!-- End Page -->


      
