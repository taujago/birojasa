<script type="text/javascript">



	$(document).ready(function() {

        $(".tanggal").datepicker().on('changeDate', function(ev){                 
             $('.tanggal').datepicker('hide');
        });

        
		$("#btn_submit").click(function(){
 			$.ajax({

            url : '<?php echo site_url("us_bbn_satu/update") ?>',
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

                    
                    // $('#form_update').data('bootstrapValidator').resetForm(true);
                    $("#proses").html(obj.nama_status);
                    $("#proses").attr('data-target',obj.status);

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


$("#btn_selesai").click(function(){

      $.ajax({

            url : '<?php echo site_url("us_bbn_satu/selesai") ?>',
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

                     window.location.href = "<?php echo site_url(us_bbn_satu); ?>"

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