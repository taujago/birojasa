<script type="text/javascript">
	$(document).ready(function(){
		$(".tanggal").datepicker().on('changeDate', function(ev){                 
             $('.tanggal').datepicker('hide');
        });

        $(".rupiah").autoNumeric('init'); 

		 $("#query").click(function(){
		 	$.ajax({
            url : '<?php echo site_url("us_terima_bpkb/get_data") ?>',
           dataType : 'json',
            type : 'post',
            data : {  no_mesin : $("#in_mesin").val() },
            success : function(obj) {
                // console.log(obj);
                $("#id").val(obj.id);
                $("#no_rangka").val(obj.no_rangka);
                $("#no_mesin").val(obj.no_mesin);
                $("#no_faktur").val(obj.no_faktur);
                $("#nama_pemilik").val(obj.nama_pemilik);
                $("#alamat_pemilik").val(obj.alamat_pemilik);
                
                
                

            }

       });
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
                      $('#form_data').data('bootstrapValidator').resetForm(true);
                      window.location = "<?php echo site_url('bj_bbn_satu') ?>";
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