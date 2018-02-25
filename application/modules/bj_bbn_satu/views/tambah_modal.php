     
              <form id="form_dealer" data-parsley-validate class="form-horizontal form-label-left" action="" method="post">
                <div class="modal fade 1" tabindex="-1" role="dialog" aria-hidden="true">
                  <div class="modal-dialog modal-sm">
                    <div class="modal-content">

                      <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span>
                        </button>
                        <h4 class="modal-title" id="myModalLabel2">Tambah Dealer</h4>
                      </div>
                      <div class="modal-body">
        
                            <div class="form-group">
                                <label>Kode Dealer</label>
                                  <input type="text" name="id" id="id" class="form-control input-style" placeholder="Kode Dealer" >
                              </div>

                              <div class="form-group">
                                <label>Nama Dealer</label>
                                  <input type="text" name="nama" id="nama" class="form-control input-style" placeholder="Nama" >
                              </div>
                              <div class="form-group">
                                <label >Alamat</label>
                                <textarea name="alamat" id="alamat" class="form-control input-style" placeholder="Alamat . . ."></textarea>
                              </div>
                              <div class="form-group">
                                <label>No. Telp</label>
                                  <input type="text" name="telp" id="telp" class="form-control input-style" placeholder="No. Telp" value="<?php echo isset($telp)?$telp:""; ?>">
                              </div>
                              <div class="form-group">
                                <label >Email</label>
                                  <input type="text" name="email" id="email" class="form-control input-style" placeholder="Email . . .">
                              </div>  
                           

                      </div>
                      <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Batal</button>
                        <button type="button" id="simpan_dealer" class="btn btn-primary">Simpan</button>
                      </div>

                    </div>
                  </div>
                </div>
                </form>




                <form id="form_type" data-parsley-validate class="form-horizontal form-label-left" action="" method="post">
                <div class="modal fade 2" tabindex="-2" role="dialog" aria-hidden="true">
                  <div class="modal-dialog modal-sm">
                    <div class="modal-content">

                      <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span>
                        </button>
                        <h4 class="modal-title" id="myModalLabel2">Tambah Type</h4>
                      </div>
                      <div class="modal-body">
        
                            <div class="form-group">
                              <label for="kembali">Merk</label>
                              <?php echo form_dropdown("id_merk",$arr_merek,isset($id_merk)?$id_merk:"",'id="merk_modal" class="form-control select2" style="width: 100%;"'); ?>
                            </div>
                            <div class="form-group">
                                <label>Type</label>
                                  <input type="text" name="tipe" id="tipe_modal" class="form-control input-style" placeholder="Type">
                              </div>
                           

                      </div>
                      <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Batal</button>
                        <button type="button" id="simpan_type" class="btn btn-primary">Simpan</button>
                      </div>

                    </div>
                  </div>
                </div>
                </form>

<script type="text/javascript">
  $(document).ready(function(){

    $('#form_dealer').bootstrapValidator({
                message: 'This value is not valid', 
                feedbackIcons: { 
                    valid: 'glyphicon glyphicon-ok', 
                    invalid: 'glyphicon glyphicon-remove', 
                    validating: 'glyphicon glyphicon-refresh'
                },
                fields: {
                    id: {
                        validators: {
                            notEmpty: {
                                message : 'Kode Dealer tidak boleh kosong' 
                            },
                            numeric: {
                                message : 'Kode Dealer harus Angka'
                            },
                            remote: {
                                type: 'POST',
                                url: "<?php echo site_url("bj_dealer/cekId"); ?>",
                                message: 'Dealer dengan Kode Dealer ini sudah terdaftar',
                                delay: 2000
                            }
                        }
                    },
                    nama: {
                        validators: {
                            notEmpty: {
                                message : 'Nama tidak boleh kosong' 
                            }
                        }
                    },
                    telp: {
                        validators: {
                            notEmpty: {
                                message : 'Alamat tidak boleh kosong' 
                            }
                        }
                    },

                    alamat: {
                        validators: {
                            notEmpty: {
                                message : 'Alamat tidak boleh kosong' 
                            }
                        }
                    },

                    email: {
                        validators: {
                            notEmpty: {
                                message : 'Email tidak boleh kosong'    
                            },
                            emailAddress: {
                                message : 'Email harus valid'
                            },
                            remote: {
                                type: 'POST',
                                url: "<?php echo site_url("bj_dealer/cekEmail"); ?>",
                                message: 'Dealer dengan email ini sudah terdaftar',
                                delay: 2000
                            }
                        }
                    },
                    


                    
                }
                
            });


  

    $("#simpan_dealer").click(function(){
 // console.log('tests');

    $.ajax({
        url:'<?php echo site_url("$this->controller/simpan_dealer"); ?>',
        data : $('#form_dealer').serialize(),
        type : 'post',
        dataType : 'json',
        success : function(obj){

            // console.log(obj.error);

            if(obj.error == false) { // berhasil 

                // alert('hooooo.. error false');
                     BootstrapDialog.alert({
                            type: BootstrapDialog.TYPE_PRIMARY,
                            title: 'Informasi',
                            message: obj.message
                             
                        });   
                      
                        
            }
            else {
                 BootstrapDialog.alert({
                            type: BootstrapDialog.TYPE_DANGER,
                            title: 'Error',
                            message: obj.message 
                             
                        }); 

                 
            }
        }
    });

    $('#id').val('');
    $('#alamat').val('');
    $('#email').val('');
    $('#telp').val('');
    $('#nama').val('');
    $('.modal').modal('hide');

    return false;
});


 $("#simpan_type").click(function(){
 // console.log('tests');

    $.ajax({
        url:'<?php echo site_url("$this->controller/simpan_tipe"); ?>',
        data : $('#form_type').serialize(),
        type : 'post',
        dataType : 'json',
        success : function(obj){

            // console.log(obj.error);

            if(obj.error == false) { // berhasil 

                // alert('hooooo.. error false');
                     BootstrapDialog.alert({
                            type: BootstrapDialog.TYPE_PRIMARY,
                            title: 'Informasi',
                            message: obj.message
                             
                        });   
                      
                        
            }
            else {
                 BootstrapDialog.alert({
                            type: BootstrapDialog.TYPE_DANGER,
                            title: 'Error',
                            message: obj.message 
                             
                        }); 

                 
            }
        }
    });

    $('#merk_modal').val('');
    $('#tipe_modal').val('');
    $('.modal').modal('hide');

    return false;
});

    $('#reload_dealer').click(function(){
      var birojasa = '';
      $.ajax({

            url : '<?php echo site_url("$this->controller/get_dealer") ?>',
            data : { birojasa : birojasa },
            type : 'post', 
            success : function(result) {
                $("#kode_dealer").html(result);
            }
        });
    });

  });


  
</script>