


<script type="text/javascript">


$(document).ready(function() {

$(".rupiah").autoNumeric('init'); 






$('#hitung').click(function(){
    console.log('test');

    $.ajax({
        url : '<?php echo site_url("$this->controller/get_biaya") ?>',
        data :  $("#form_data").serialize(), 
        type : 'post',
        dataType : 'json',
        beforeSend : function(){
            $('#myPleaseWait').modal('show');
        },
        success : function(obj) {
            $('#myPleaseWait').modal('hide');
            console.log(obj.error);

            if(obj.error == false) { // berhasil 

                // alert('hooooo.. error false');
                     console.log(obj.error);
            $("#rp_daftar_stnk").val(obj.rp_daftar_stnk);
            $("#rp_daftar_stck").val(obj.rp_daftar_stck);
            $("#rp_daftar_bpkb").val(obj.rp_daftar_bpkb);
            $("#rp_pajak_kendaraan").val(obj.rp_pajak_kendaraan);
            $("#rp_admin_fee").val(obj.rp_admin_fee);
            $("#total").val(obj.total);
            document.getElementById("rp_daftar_stnk").setAttribute("disabled", true)
            document.getElementById("rp_daftar_stck").setAttribute("disabled", true)
            document.getElementById("rp_daftar_bpkb").setAttribute("disabled", true)
            document.getElementById("rp_pajak_kendaraan").setAttribute("disabled", true)
            document.getElementById("rp_admin_fee").setAttribute("disabled", true)
            document.getElementById("total").setAttribute("disabled", false)
            }
            else {
                 BootstrapDialog.alert({
                            type: BootstrapDialog.TYPE_DANGER,
                            title: 'Error',
                            message: obj.message 
                             
                        });
            $("#rp_daftar_stnk").val(obj.rp_daftar_stnk);
            $("#rp_daftar_stck").val(obj.rp_daftar_stck);
            $("#rp_daftar_bpkb").val(obj.rp_daftar_bpkb);
            $("#rp_pajak_kendaraan").val(obj.rp_pajak_kendaraan);
            $("#rp_admin_fee").val(obj.rp_admin_fee);
            $("#total").val(obj.total);

            
            }

            
        }
    });
    return false;

});




$(".tanggal").datepicker().on('changeDate', function(ev){                 
             $('.tanggal').datepicker('hide');
        });


  $("#simpan").click(function(){
 console.log('tests');

    $.ajax({
        url:'<?php echo site_url("$this->controller/simpan"); ?>',
        data : new FormData($('#form_data')[0]),
        contentType: false,
        processData: false,
        type : 'post',
        dataType : 'json',
        beforeSend : function(){
            $('#myPleaseWait').modal('show');
        },
        success : function(obj){

            $('#myPleaseWait').modal('hide');
            console.log(obj.error);

            if(obj.error == false) { // berhasil 

                // alert('hooooo.. error false');
                     BootstrapDialog.show({
                            type: BootstrapDialog.TYPE_PRIMARY,
                            title: 'Informasi',
                            message: obj.message,
                            buttons: [{
                                    label: 'OK',
                                    action: function(dialog) {
                                        dialog.close();
                                        window.location = "<?php echo site_url('bj_bbn_satu') ?>";
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

  $("#update").click(function(){ 
    $.ajax({
        url:'<?php echo site_url("$this->controller/update"); ?>',
        data : new FormData($('#form_data')[0]),
        contentType: false,
        processData: false,
        type : 'post',
        dataType : 'json',
        beforeSend : function(){
            $('#myPleaseWait').modal('show');
        },
        success : function(obj){
            $('#myPleaseWait').modal('hide');

            console.log(obj.error);

            if(obj.error == false) { // berhasil 

                // alert('hooooo.. error false');
                    BootstrapDialog.show({
                            type: BootstrapDialog.TYPE_PRIMARY,
                            title: 'Informasi',
                            message: obj.message,
                            buttons: [{
                                    label: 'OK',
                                    action: function(dialog) {
                                        dialog.close();
                                        window.location = "<?php echo site_url('bj_bbn_satu') ?>";
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
              


  $("#id_jenis").change(function(){

    $.ajax({

            url : '<?php echo site_url("$this->controller/get_data_model") ?>',
            data : { id_jenis : $(this).val() },
            type : 'post', 
            success : function(result) {
                $("#id_model").html(result)
            }
      });

    });
         
//          $("#id_merek").change(function(){

    

// });     
            

  $("#id_polda").change(function(){

    $.ajax({

            url : '<?php echo site_url("$this->controller/get_samsat") ?>',
            data : { id_polda : $(this).val() },
            type : 'post', 
            success : function(result) {
                $("#id_samsat").html(result)
            }
      });

    });

   $("#id_provinsi").change(function(){

    $.ajax({

            url : '<?php echo site_url("$this->controller/get_kabupaten") ?>',
            data : { id_provinsi : $(this).val() },
            type : 'post', 
            success : function(result) {
                $("#id_kota").html(result)
            }
      });

    });

   $("#id_kota").change(function(){

    $.ajax({

            url : '<?php echo site_url("$this->controller/get_kecamatan") ?>',
            data : { id_kota : $(this).val() },
            type : 'post', 
            success : function(result) {
                $("#id_kecamatan").html(result)
            }
      });

    });

   $("#id_kecamatan").change(function(){

    $.ajax({

            url : '<?php echo site_url("$this->controller/get_desa") ?>',
            data : { id_kecamatan : $(this).val() },
            type : 'post', 
            success : function(result) {
                $("#id_desa").html(result)
            }
      });

    });




   $("#id_merek").change(function(){

    $.ajax({

            url : '<?php echo site_url("$this->controller/get_type") ?>',
            data : { id_merk : $(this).val() },
            type : 'post', 
            success : function(result) {
                $("#type").html(result)
            }
      });

    });

  $('.tgl').daterangepicker({
    singleDatePicker: true,
    calender_style: "picker_4"
    }, function(start, end, label) {
      console.log(start.toISOString(), end.toISOString(), label);
  });


// request nomor rangka. kirim data id_polda dan nomor rangka 

 $("#query").click(function(){
       // alert('hell yea..');

       $.ajax({
            url : '<?php echo site_url("bj_bbn_satu/get_data_service") ?>',
           dataType : 'json',
            type : 'post',
            data : {  id_polda : $("#id_polda").val(), no_rangka : $("#no_rangka").val()  },
            beforeSend : function(){
            $('#myPleaseWait').modal('show');
            },
            success : function(obj) {
                $('#myPleaseWait').modal('hide');

            console.log(obj.error);
                // console.log(obj);
            if(obj.error == false) {

                $("#no_mesin").val(obj.no_mesin);
                $("#no_faktur").val(obj.no_faktur);
                $("#tgl_faktur").val(obj.tgl_faktur);
                
                $("#nama_pemilik").val(obj.pemilik);
                $("#alamat_pemilik").val(obj.alamat);
                $("#warna").val(obj.warna);
                $("#silinder").val(obj.silinder);
                $("#tahun_buat").val(obj.thn_buat);
                $("#warna_tnkb").val(obj.warna_tnkb);
                
                $("#id_jenis").val(obj.jenis);
                $("#id_merek").val(obj.merk);
                // $("#label_merk").html(obj.merk);
                // $("#label_type").html(obj.tipe);
                // $("#label_model").html(obj.model);
                // $("#label_jenis").html(obj.jenis);
                
                // var type = [obj.Data.KodeDealer, obj.Data.NamaDealer];
                
                get_type($("#id_merek").val(), obj.tipe);
                model($("#id_jenis").val(), obj.model);
                

                

                
            }else{
                BootstrapDialog.alert({
                            type: BootstrapDialog.TYPE_DANGER,
                            title: 'Error',
                            message: obj.message 
                             
                        });
            }


            }

       });
                

       
 });



});




function get_type(id_merk, type){
    $.ajax({

            url : '<?php echo site_url("$this->controller/get_data_tipe") ?>',
            data : { id_merk : id_merk, type : type },
            type : 'post', 
            success : function(result) {
                $("#type").html(result);
                
            }
    });
}

function model(jenis, model){
    $.ajax({

            url : '<?php echo site_url("$this->controller/get_model") ?>',
            data : { id_jenis : jenis, model : model },
            type : 'post', 
            success : function(result) {
                $("#id_model").html(result)
                
            }
      });
}


</script>