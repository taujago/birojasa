
<script type="text/javascript">

$(document).ready(function(){

	 var dt = $("#jenis").DataTable(
		 	{
		 		// "order": [[ 0, "desc" ]],
		 		// "iDisplayLength": 50,
				"columnDefs": [ { "targets": 0, "orderable": false } ],
				"processing": true,
		        "serverSide": true,
		        "ajax": '<?php echo site_url("bj_merk/get_data") ?>'
		 	});

		 
		 $("#jenis_filter").css("display","none");  
	
	 
		 $("#btn_submit").click(function(){
		 	  // alert('hello');
		 	  

		 	  dt.column(1).search($("#merk").val())
				 .draw();

				 return false;
		 });


		 $("#btn_reset").click(function(){
			$("#merk").val('');
			$("#btn_submit").click();
		 });


});
	




function hapus(merk){



BootstrapDialog.show({
            message : 'ANDA AKAN MENGHAPUS DATA MERK INI. ANDA YAKIN  ?  ',
            title: 'KONFIRMASI HAPUS DATA  MERK',
            draggable: true,
            buttons : [
              {
                label : 'YA',
                cssClass : 'btn-primary',
                hotkey: 13,
                action : function(dialogItself){


                  dialogItself.close();
                  $('#myPleaseWait').modal('show'); 
                  $.ajax({
                  	url : '<?php echo site_url("$this->controller/hapusdata") ?>',
                  	type : 'post',
                  	data : {merk : merk},
                  	dataType : 'json',
                  	success : function(obj) {
                  		$('#myPleaseWait').modal('hide'); 
                  		if(obj.error==false) {
                  				BootstrapDialog.alert({
				                      type: BootstrapDialog.TYPE_PRIMARY,
				                      title: 'Informasi',
				                      message: obj.message,
				                       
				                  });   

                  			$('#jenis').DataTable().ajax.reload();		
                  		}
                  		else {
                  			BootstrapDialog.alert({
			                      type: BootstrapDialog.TYPE_DANGER,
			                      title: 'Error',
			                      message: obj.message,
			                       
			                  }); 
                  		}
                  	}
                  });

                }
              },
              {
                label : 'TIDAK',
                cssClass : 'btn-danger',
                action: function(dialogItself){
                    dialogItself.close();
                }
              }
            ]
          });

}
 		 




</script>