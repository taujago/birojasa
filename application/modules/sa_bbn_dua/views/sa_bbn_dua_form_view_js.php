<script type="text/javascript">

$(document).ready(function(){


$('#form_data').bootstrapValidator({
                message: 'This value is not valid', 
                feedbackIcons: { 
                    valid: 'glyphicon glyphicon-ok', 
                    invalid: 'glyphicon glyphicon-remove', 
                    validating: 'glyphicon glyphicon-refresh'
                },
                fields: {
                    tipe_kendaraan: {
                        validators: {
                            notEmpty: {
                                message : 'Tipe Kendaraan tidak boleh kosong' 
                            }
                        }
                    },

                    tahun_kendaraan: {
                        validators: {
                            notEmpty: {
                                message : 'Tahun Kendaraan tidak boleh kosong' 
                            }
                        }
                    },
                    warna_tnkb: {
                        validators: {
                            notEmpty: {
                                message : 'Warna TNKB tidak boleh kosong' 
                            }
                        }
                    },
                    polda: {
                        validators: {
                            notEmpty: {
                                message : 'Polda tidak boleh kosong' 
                            }
                        }
                    },

                    samsat: {
                        validators: {
                            notEmpty: {
                                message : 'Samat tidak boleh kosong'    
                            }
                        }
                    },
                    rp_daftar_stnk: {
                        validators: {
                            notEmpty: {
                                message : 'Daftar STNK tidak boleh kosong'    
                            }
                        }
                    },
                    rp_daftar_bpkb: {
                        validators: {
                            notEmpty: {
                                message : 'Daftar BPKB tidak boleh kosong'    
                            }
                        }
                    },
                    rp_pajak_kendaraan: {
                        validators: {
                            notEmpty: {
                                message : 'Pajak Kendaraan tidak boleh kosong'    
                            }
                        }
                    },

                    rp_admin_fee: {
                        validators: {
                            notEmpty: {
                                message : 'Admin Fee tidak boleh kosong'    
                            }
                        }
                    }


                    
                }
                
            });



        $('#reset').click(function() {
            $('#form_data').data('bootstrapValidator').resetForm(true);
        });



$("#tombolsubmitsimpan").click(function(){
 console.log('tests');

    $.ajax({
        url:'<?php echo site_url("$this->controller/simpan"); ?>',
        data : $('#form_data').serialize(),
        type : 'post',
        dataType : 'json',
        success : function(obj){

            console.log(obj.error);

            if(obj.error == false) { // berhasil 

                // alert('hooooo.. error false');
                     BootstrapDialog.alert({
                            type: BootstrapDialog.TYPE_PRIMARY,
                            title: 'Informasi',
                            message: obj.message
                             
                        });   
                      $('#form_data').data('bootstrapValidator').resetForm(true);
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

    return false;
});



$("#tombolsubmitupdate").click(function(){ 
    $.ajax({
        url:'<?php echo site_url("$this->controller/update"); ?>',
        data : $('#form_edit').serialize(),
        type : 'post',
        dataType : 'json',
        success : function(obj){

            console.log(obj.error);

            if(obj.error == false) { // berhasil 

                // alert('hooooo.. error false');
                     BootstrapDialog.alert({
                            type: BootstrapDialog.TYPE_PRIMARY,
                            title: 'Informasi',
                            message: obj.message
                             
                        });   
                     // $('#form_data').data('bootstrapValidator').resetForm(true);
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

    return false;
});







});
</script>