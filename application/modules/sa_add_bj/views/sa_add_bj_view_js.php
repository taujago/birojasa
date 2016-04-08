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
                                message: 'Biro jasa dengan email ini sudah terdaftar',
                                delay: 2000
                            }
                        }
                    },
                    no_siup: {
                        validators: {
                            notEmpty: {
                                message : 'Email tidak boleh kosong'    
                            },
                            remote: {
                                type: 'POST',
                                url: "<?php echo site_url('sa_add_bj/ceksiup'); ?>",
                                message: 'Biro jasa dengan nomor SIUP ini sudah terdaftar',
                                delay: 2000
                            }
                        }
                    },
                    no_tdp: {
                        validators: {
                            notEmpty: {
                                message : 'No. TDP tidak boleh kosong'    
                            },
                            remote: {
                                type: 'POST',
                                url: "<?php echo site_url('sa_add_bj/cektdp'); ?>",
                                message: 'Biro jasa dengan nomor TDP ini sudah terdaftar',
                                delay: 2000
                            }
                        }
                    },
                    no_npwp: {
                        validators: {
                            notEmpty: {
                                message : 'Email tidak boleh kosong'    
                            },
                            remote: {
                                type: 'POST',
                                url: "<?php echo site_url('sa_add_bj/ceknpwp'); ?>",
                                message: 'Biro jasa dengan nomor NPWP ini sudah terdaftar',
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