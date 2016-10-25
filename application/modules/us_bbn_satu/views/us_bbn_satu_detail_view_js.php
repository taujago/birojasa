<script type="text/javascript">



	$(document).ready(function() {

        $(".tanggal").datepicker().on('changeDate', function(ev){                 
             $('.tanggal').datepicker('hide');
        });
        $(".rp").autoNumeric('init'); 

        
		$("#btn_submit1").click(function(){
 			$.ajax({

            url : '<?php echo site_url("us_bbn_satu/update1") ?>',
            data : $('#form_update1').serialize(),
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

                    
                    // $('#form_update').data('bootstrapValidator').resetForm(true);
                    

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
 			$('.modal').modal('hide');
	});



    $("#btn_submit2").click(function(){
            $.ajax({

            url : '<?php echo site_url("us_bbn_satu/update2") ?>',
            data : $('#form_update1').serialize(),
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
                    
                      // $('#form_update').data('bootstrapValisdator').resetForm(true);
                      window.location = "<?php echo site_url('us_bbn_satu') ?>";

                      

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
            $('.modal').modal('hide');
    });

  





});
</script>