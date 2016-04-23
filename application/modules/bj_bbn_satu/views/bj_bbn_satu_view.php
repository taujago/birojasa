    <?php
    $userdata = $this->session->userdata('bj_login');
    ?>    
     <script src="<?php echo base_url("assets") ?>/js/jquery.dataTables.min.js"></script>           
              <div class="x_title">
                  <h2>Tambah Data <small>Pengurusan BBN 1 </small></h2>
                  <ul class="nav navbar-right panel_toolbox">
                    <a href="<?php echo site_url($this->controller.'/baru'); ?>"><button type="button" class="btn btn-primary">Tambah Data</button>
                    </a>
                  </ul>
                  <div class="clearfix"></div>
                </div>


          <form role="form" action="" id="btn-cari">


            <div class="col-md-3">
              <div class="form-group">
                <label for="nama">Nama</label>
                
                <input id="no_rangka" name="no_rangka" type="text" class="form-control" placeholder="Nama"></input>
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
            


<table width="100%" border="0" id="bj_bbn_satu" class="table table-striped 
             table-bordered table-hover dataTable no-footer" role="grid">
<thead>
  <tr>

    <th width="3%" rowspan="2" style='text-align:center;vertical-align:middle'>ID</th>
    <th width="10%" rowspan="2" style='text-align:center;vertical-align:middle'>Tgl. Entri</th>
    <th width="25%" rowspan="2" style='text-align:center;vertical-align:middle'>No. Rangka</th>
    <th width="10%" rowspan="2" style='text-align:center;vertical-align:middle'>No. Faktur</th>
    <th width="40%" colspan="4" style='text-align:center;vertical-align:middle'>Biaya</th>
    <th width="10%" rowspan="2" style='text-align:center;vertical-align:middle'>Pengurus</th>
    <th width="10%" rowspan="2" style='text-align:center;vertical-align:middle'>#</th>
  </tr>
  <tr> 
        <th width="10%" style='text-align:center;vertical-align:middle'>BPKB</th>
        <th width="10%" style='text-align:center;vertical-align:middle'>STNK</th>
        <th width="10%" style='text-align:center;vertical-align:middle'>Pajak</th>
        <th width="10%" style='text-align:center;vertical-align:middle'>Admin</th>
  </tr>
  
</thead>
</table>
                  

<?php 
$this->load->view($this->controller.'_view_js');
?>

                
                <!-- End Page -->


      
