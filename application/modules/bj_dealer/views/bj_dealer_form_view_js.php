<script type="text/javascript">

$(document).ready(function(){


$('#form_simpan').bootstrapValidator({
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



        $('#reset').click(function() {
            $('#form_simpan').data('bootstrapValidator').resetForm(true);
        });



$("#simpan").click(function(){
 console.log('tests');

    $.ajax({
        url:'<?php echo site_url("$this->controller/simpan"); ?>',
        data : $('#form_simpan').serialize(),
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
                      $('#form_simpan').data('bootstrapValidator').resetForm(true);
                      window.location = "<?php echo site_url('bj_dealer'); ?>";
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



$("#update").click(function(){ 
    $.ajax({
        url:'<?php echo site_url("$this->controller/update"); ?>',
        data : $('#form_update').serialize(),
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
                     window.location.href = "<?php echo site_url('bj_dealer'); ?>";
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