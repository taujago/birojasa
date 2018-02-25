        <link href="<?php echo base_url("assets") ?>/plugins/select2/select2.min.css" rel="stylesheet" >
    

    <link href="<?php echo base_url("assets") ?>/css/datepicker.css" rel="stylesheet">
    <script src="<?php echo base_url("assets") ?>/js/bootstrap-datepicker.js"></script>

    <script src="<?php echo base_url("assets") ?>/plugins/select2/select2.full.min.js"></script>

    <script type="text/javascript" src="<?php echo base_url();?>assets/js/autoNumeric.js"></script>

     <form role="form" action="" id="btn-cari">
            
            <div class="col-md-2">
              <div class="form-group">
                <label>&nbsp;</label>
                <select class="form-control input-style" name="jenis" id="jenis">
                  <option value="no_rangka">No. Rangka</option>
                  <option value="no_mesin">No. Mesin</option>
                </select>
              </div>
            </div>
            <div class="col-md-4">
              <div class="form-group">
                <label>&nbsp;</label>
                <input id="in_mesin" name="in_mesin" type="text" class="form-control input-style" placeholder="Input Mesin/Rangka" />
              </div>
            </div>
            <div class="col-md-2">
              <div class="form-group">
                <label>&nbsp;</label>
                <button type="button" class="btn btn-primary form-control" id="query"><i class="fa">Query</i></button>
              </div>
            </div>
      </form>

<form id="form_<?php echo $action ?>" class="form-horizontal" method="post" 
        action="<?php echo site_url("$this->controller/$action"); ?>" role="form"> 

 
<div class="col-md-12">
<div class="panel panel-primary ">
      <div class="panel-heading">
      <strong><h3 class="panel-title">Data</h3></strong>
    </div>
    <div class="panel-body">

    
    
    <div class="form-group">
      <label class="col-sm-3 control-label">No. Rangka</label>
      <div class="col-sm-9">
      <input type="hidden" name="id" id="id" value="<?php echo isset($id)?$id:''; ?>">
        <input type="text" name="no_rangka" id="no_rangka" class="form-control input-style" placeholder="No. Rangka . . ." readonly>
      </div>
    </div>
    <div class="form-group">
      <label class="col-sm-3 control-label">No. Mesin</label>
      <div class="col-sm-9">
        <input type="text" name="no_mesin" id="no_mesin" class="form-control input-style" placeholder="No. Mesin . . ." readonly>
      </div>
    </div>
    <div class="form-group">
      <label class="col-sm-3 control-label">No. Faktur</label>
      <div class="col-sm-9">
        <input type="text" name="no_faktur" id="no_faktur" class="form-control input-style" placeholder="No. Faktur . . ." readonly>
      </div>
    </div>
    <div class="form-group">
      <label class="col-sm-3 control-label">Nama Pemilik</label>
      <div class="col-sm-9">
        <input type="text" name="nama_pemilik" id="nama_pemilik" class="form-control input-style" placeholder="Nama Pemilik . . ." readonly>
      </div>
    </div>
    <div class="form-group">
      <label class="col-sm-3 control-label">Alamat</label>
      <div class="col-sm-9">
        <textarea class="form-control input-style" id="alamat_pemilik" name="alamat_pemilik" readonly></textarea>
      </div>
    </div>
    <br /> &nbsp;

    <div class="form-group">
      <label class="col-sm-3 control-label">No. BPKB</label>
      <div class="col-sm-9">
        <input type="text" name="bpkb_no" id="bpkb_no" class="form-control input-style" placeholder="No. BPKB . . .">
      </div>
    </div>
    <div class="form-group">
      <label class="col-sm-3 control-label">Tgl. BPKB</label>
      <div class="col-sm-9">
        <input type="text" name="bpkb_tgl" id="bpkb_tgl" class="tanggal form-control col-md-7 col-xs-12 input-style" name="tgl_faktur"   placeholder="Tanggal BPKB"  data-date-format="dd-mm-yyyy">
      </div>
    </div>
    <div class="form-group">
      <label class="col-sm-3 control-label">Biaya Admin</label>
      <div class="col-sm-9">
        <input type="text" name="bayar_jumlah_bpkb" id="bayar_jumlah_bpkb" class="rupiah form-control input-style" placeholder="Biaya Admin . . ." data-a-sign="" data-a-dec="," data-a-sep=".">
      </div>
    </div>
    <div class="form-group pull-center">
        <div class="col-sm-offset-3 col-sm-9">
          <button id="<?php echo $action; ?>" style="border-radius: 0;" type="submit" class="btn btn-primary"  >Simpan</button>
        </div>
      </div>

  </div>
</div>
</div>

  </form>


      <?php 
$this->load->view($this->controller."_view_js");
?>