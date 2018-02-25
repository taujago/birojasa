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
            data : {  no_mesin : $("#in_mesin").val(), jenis : $('#jenis').val() },
            success : function(obj) {
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

                BootstrapDialog.show({
                            type: BootstrapDialog.TYPE_PRIMARY,
                            title: 'Informasi',
                            message: obj.message,
                            buttons: [{
					                label: 'Tutup',
					                action: function(dialog) {
            							 $("#id").val('');
						                $("#no_rangka").val('');
						                $("#no_mesin").val('');
						                $("#no_faktur").val('');
						                $("#nama_pemilik").val('');
						                $("#alamat_pemilik").val('');
						                $("#bpkb_no").val('');
						                $("#bayar_jumlah_bpkb").val('');
						                $("#bpkb_tgl").val('');
						                $("#in_mesin").val('');
        								dialog.close();
					                }
					            }]
                             
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

    return false;
});


	});
</script>