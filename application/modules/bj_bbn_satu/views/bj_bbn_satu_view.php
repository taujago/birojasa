    <?php
    $userdata = $this->session->userdata('bj_login');
    ?>    


    <style type="text/css">
    .datepicker{ z-index: 1151 !important; }
    </style>

     <link href="<?php echo base_url("assets") ?>/css/datepicker.css" rel="stylesheet">
    <script src="<?php echo base_url("assets") ?>/js/bootstrap-datepicker.js"></script>
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

            <div class="col-md-3">
              <div class="form-group">
                <label for="nama">No. Rangka</label>
                
                <input id="no_rangka" name="no_rangka" type="text" class="form-control" placeholder="No. Rangka"></input>
              </div>
            </div>
            <div class="col-md-2">
              <div class="form-group">
                <label for="Tanggal">Dealer</label>
                <?php echo form_dropdown("kode_dealer",$arr_dealer,isset($kode_dealer)?$kode_dealer:"",'id="kode_dealer" class="form-control input-style"'); ?>
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

    
    <th width="10%" rowspan="2" style='text-align:center;vertical-align:middle'>Tgl. Entri</th>
    <th width="15%" rowspan="2" style='text-align:center;vertical-align:middle'>No. Rangka/Mesin/Faktur</th>
    <th width="40%" colspan="4" style='text-align:center;vertical-align:middle'>Biaya</th>
    <th width="20%" rowspan="2" style='text-align:center;vertical-align:middle'>Pengurus</th>
    <th width="20%" rowspan="2" style='text-align:center;vertical-align:middle'>#</th>
  </tr>
  <tr> 
        <th width="10%" style='text-align:center;vertical-align:middle'>BPKB</th>
        <th width="10%" style='text-align:center;vertical-align:middle'>STNK</th>
        <th width="10%" style='text-align:center;vertical-align:middle'>Pajak</th>
        <th width="10%" style='text-align:center;vertical-align:middle'>Admin</th>
  </tr>
  
</thead>
</table>
                  

<div class="modal fade" id="dealer" tabindex="-1" role="dialog" aria-labelledby="dealerModal">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="dealerModal">Serah Dealer</h4>
      </div>
      <div class="modal-body">
        <form action="" id="form_serah_dealer" method="post">
          <table width="100%"  class='table table-bordered'>
             
              <tr>
                <td width="30%" >Tanggal Serah Dealer</td>
                <TD>
                  <input name="tgl_serah_dealer" id="tgl" type="text" class="form-control tanggal" placeholder="Tanggal Serah Dealer" data-date-format="dd-mm-yyyy"></input>
                  <input type="hidden" class="form-control" name="id" id="id"  />
                </TD>
              </tr>
              <tr>
                <td width="30%" >Nama Penerima</td>
                <TD>
                  <input name="nama_penerima_dealer" id="nama_penerima_dealer" type="text" class="form-control" placeholder="Nama Penerima" ></input>
                  
                </TD>
              </tr>  
            </table>   
          </form>   
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Tutup</button>
          <button type="button" id="btn_simpan_serah_dealer" class="btn btn-primary" onclick="return serah_dealer_simpan()">Simpan</button>
        </div>
      </div>
    </div>
  </div>



<?php 
$this->load->view($this->controller.'_view_js');
?>

                
                <!-- End Page -->


      
