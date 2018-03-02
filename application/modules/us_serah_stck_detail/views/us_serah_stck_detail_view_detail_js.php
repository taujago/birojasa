<script type="text/javascript">
	
	$("#cetak").click(function() {
  


  var id;

  
  id = $("#id_ref").val();
  
  open('<?php echo site_url("$this->controller/pdf?"); ?>'+'id='+ id + '&jenis=fin');

});

$("#cetak_sam").click(function() {
  


  var id;

  
  id = $("#id_ref").val();
  
  open('<?php echo site_url("$this->controller/pdf?"); ?>'+'id='+ id + '&jenis=sam');

});


function hapus(id){



BootstrapDialog.show({
            message : 'ANDA AKAN MENGHAPUS DATA INI DARI NO. REF. ANDA YAKIN  ?  ',
            title: 'KONFIRMASI HAPUS DATA',
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
                  	data : {id : id},
                  	dataType : 'json',
                  	success : function(obj) {
                  		$('#myPleaseWait').modal('hide'); 
                  		if(obj.error==false) {
                  				BootstrapDialog.alert({
				                      type: BootstrapDialog.TYPE_PRIMARY,
				                      title: 'Informasi',
				                      message: obj.message,
				                       
				                  });   

                  			location.reload();	
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