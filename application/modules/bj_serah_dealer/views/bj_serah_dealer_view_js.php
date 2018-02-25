
<script type="text/javascript">

function modal_dealer(){
  $('#dealer').modal('show');
}

// $("#tombolsubmitsimpan").click(function(){
//  console.log('tests');

//     $.ajax({
//         url:'<?php echo site_url("$this->controller/simpan"); ?>',
//         data : $('#form_data').serialize(),
//         type : 'post',
//         dataType : 'json',
//         success : function(obj){

//             console.log(obj.error);

//             if(obj.error == false) { // berhasil 

//                 // alert('hooooo.. error false');
//                      BootstrapDialog.alert({
//                             type: BootstrapDialog.TYPE_PRIMARY,
//                             title: 'Informasi',
//                             message: obj.message
                             
//                         });   
//                       $('#form_data').data('bootstrapValidator').resetForm(true);

//             }
//             else {
//                  BootstrapDialog.alert({
//                             type: BootstrapDialog.TYPE_DANGER,
//                             title: 'Error',
//                             message: obj.message 
                             
//                         }); 
//             }
//         }

//     });
    
//     $('#biro_jasa').DataTable().ajax.reload();
//   // $('#tombolsubmitsimpan').click();
//     return false;
// });


function serah_dealer_simpan(){
        
  $.ajax({
        url:'<?php echo site_url("$this->controller/simpan"); ?>',
        data : $('#form_data').serialize(),
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
                      // $('#form_data').data('bootstrapValidator').resetForm(true);
                      
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
    
    $('#bj_bbn_satu').DataTable().ajax.reload();
    $('#dealer').modal('hide');
    
    
    return false;
}


$(document).ready(function(){

  $(".tanggal").datepicker().on('changeDate', function(ev){                 
             $('.tanggal').datepicker('hide');
        });


  //   });

$("#cetak").click(function() {
  

  var tanggal_awal;
  var tanggal_akhir;
  var kode_dealer;

  tanggal_awal = $("#tanggal_awal").val();
  tanggal_akhir = $("#tanggal_akhir").val();
  kode_dealer = $("#kode_dealer").val();
  
  // window.alert(desa);
  
  open('<?php echo site_url("$this->controller/cetak_serah_dealer?"); ?>'+'tanggal_awal='+ tanggal_awal +'&tanggal_akhir='+tanggal_akhir+'&kode_dealer='+ kode_dealer);

});


     var dt = $("#bj_bbn_satu").DataTable(
            {
                // "order": [[ 0, "desc" ]],
                // "iDisplayLength": 50,
                "columnDefs": [ { "targets": 0, "orderable": false } ],
                "processing": true,
                "serverSide": true,
                "ajax": '<?php echo site_url($this->controller."/get_data") ?>'
            });

         
         $("#bj_bbn_satu_filter").css("display","none");  
    
     
         $("#btn_submit").click(function(){
              // alert('hello');
              

             dt.column(1).search($("#tanggal_awal").val())
                .column(2).search($("#tanggal_akhir").val())
                .column(3).search($("#no_rangka").val())
                .column(4).search($("#kode_dealer").val())
                 .draw();

                 return false;
         });


         $("#btn_reset").click(function(){
            
            $("#tanggal_awal").val('');
            $("#tanggal_akhir").val('');
            $("#no_rangka").val('');
            $("#kode_dealer").val('');
            $("#btn_submit").click();
         });


});
    

function printkwitansi(id){
  open('<?php echo site_url("$this->controller/printkwitansi?"); ?>'+'id='+ id);
}


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

                            $('#bj_bbn_satu').DataTable().ajax.reload();      
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