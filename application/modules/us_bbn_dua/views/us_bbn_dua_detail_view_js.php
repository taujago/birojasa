<script type="text/javascript">
  $(document).ready(function() {

     $(".tanggal").datepicker().on('changeDate', function(ev){                 
             $('.tanggal').datepicker('hide');
        });
     
    $("#btn_submit").click(function(){

      $.ajax({

            url : '<?php echo site_url("us_bbn_dua/update") ?>',
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

            url : '<?php echo site_url("us_bbn_dua/selesai") ?>',
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

                     window.location.href = "<?php echo site_url(us_bbn_dua); ?>"

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
