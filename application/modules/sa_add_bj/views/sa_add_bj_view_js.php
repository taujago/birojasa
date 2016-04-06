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
                    nama: {
                        validators: {
                            notEmpty: {
                                message : 'Nama tidak boleh kosong' 
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

                    password: {
                        validators: {
                            notEmpty: {
                                message : 'Password tidak boleh kosong' 
                            },
                            stringLength: {
                                min: 6, 
                                message: 'Panjang minimal 6 karakter'
                            }
                        }
                    },
                    re_password: {
                        validators: {
                            notEmpty: {
                                message: 'tidak boleh kosong'
                            },
                            identical: {
                                field: 'password',
                                message: 'passwod yang anda masukkan tidak sesuai'
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
                                url: "<?php echo site_url('sa_add_bj/cekEmail'); ?>",
                                message: 'Email ini sudah terdaftar',
                                delay: 2000
                            }
                        }
                    }

                    
                }
                
            });



        $('#reset').click(function() {
            $('#form_data').data('bootstrapValidator').resetForm(true);
        });

});
</script>