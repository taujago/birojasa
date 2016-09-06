
<script type="text/javascript">

$(document).ready(function(){

  $(".tanggal_awal").datepicker().on('changeDate', function(ev){                 
         $('.tanggal_awal').datepicker('hide');
    });
  
  $(".tanggal_akhir").datepicker().on('changeDate', function(ev){                 
         $('.tanggal_akhir').datepicker('hide');
    });


     var dt = $("#bj_bbn_dua").DataTable(
            {
                // "order": [[ 0, "desc" ]],
                // "iDisplayLength": 50,
                "columnDefs": [ { "targets": 0, "orderable": false } ],
                "processing": true,
                "serverSide": true,
                "ajax": '<?php echo site_url("bj_bbn_dua/get_data") ?>'
            });

         
         $("#bj_bbn_dua_filter").css("display","none");  
    
     
         $("#btn_submit").click(function(){
              // alert('hello');
              

              dt.column(1).search($("#tanggal_awal").val())
                .column(2).search($("#tanggal_akhir").val())
                .column(3).search($("#no_rangka").val())
                 .draw();

                 return false;
         });


         $("#btn_reset").click(function(){
            $("#no_rangka").val('');

            $("#btn_submit").click();
         });


});
    




function hapus(id){



BootstrapDialog.show({
            message : 'ANDA AKAN MENGHAPUS DATA BIRO JASA. ANDA YAKIN  ?  ',
            title: 'KONFIRMASI HAPUS DATA  BIRO JASA',
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

                            $('#bj_bbn_dua').DataTable().ajax.reload();      
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