<script type="text/javascript">
	$(document).ready(function() {
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
                      $('#form_update').data('bootstrapValidator').resetForm(true);

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