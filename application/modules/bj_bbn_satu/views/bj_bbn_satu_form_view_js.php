


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
        success : function(obj) {

            console.log(obj.error);

            if(obj.error == false) { // berhasil 

                // alert('hooooo.. error false');
                     console.log(obj.error);
            $("#rp_daftar_stnk").val(obj.rp_daftar_stnk);
            $("#rp_daftar_bpkb").val(obj.rp_daftar_bpkb);
            $("#rp_pajak_kendaraan").val(obj.rp_pajak_kendaraan);
            $("#rp_admin_fee").val(obj.rp_admin_fee);
            $("#total").val(obj.total);
            }
            else {
                 BootstrapDialog.alert({
                            type: BootstrapDialog.TYPE_DANGER,
                            title: 'Error',
                            message: obj.message 
                             
                        });
                        $("#rp_daftar_stnk").val(obj.rp_daftar_stnk);
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

  $("#update").click(function(){ 
    $.ajax({
        url:'<?php echo site_url("$this->controller/update"); ?>',
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
                     window.location = '<?php echo site_url("$this->controller"); ?>'
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

            url : '<?php echo site_url("$this->controller/get_model") ?>',
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

 $("#no_rangka").blur(function(){
       // alert('hell yea..');

       $.ajax({
            url : '<?php echo site_url("bj_bbn_satu/get_data_service") ?>',
           dataType : 'json',
            type : 'post',
            data : {  id_polda : $("#id_polda").val(), no_rangka : $("#no_rangka").val()  },
            success : function(obj) {
                // console.log(obj);
                $("#no_mesin").val(obj.Data.NoMesin);
                $("#no_faktur").val(obj.Data.NoFaktur);
                $("#tgl_faktur").val(obj.Data.TglFaktur);
                
                $("#nama_pemilik").val(obj.Data.Pemilik1);
                $("#alamat_pemilik").val(obj.Data.Alamat1);
                $("#warna").val(obj.Data.Warna);
                $("#silinder").val(obj.Data.VolCilynder);
                $("#tahun_buat").val(obj.Data.TahunBuat);
                $("#warna_tnkb").val(obj.Data.WarnaTNKB);
                $("#label_merk").html(obj.Data.Merk);
                $("#label_type").html(obj.Data.Type);
                $("#label_model").html(obj.Data.Model);
                $("#label_jenis").html(obj.Data.Jenis);
                
                // var type = [obj.Data.KodeDealer, obj.Data.NamaDealer];
                
                $.ajax({
                    url : '<?php echo site_url("$this->controller/dealer") ?>',
                    data : {KodeDealer : obj.Data.KodeDealer, NamaDealer : obj.Data.NamaDealer},
                    type : 'post', 
                        success : function(result) {
                        $("#kode_dealer").html(result)
                    }
                });

                $.ajax({
                    url : '<?php echo site_url("$this->controller/merk") ?>',
                    data : {Merk : obj.Data.Merk},
                    type : 'post', 
                        success : function(result) {
                        $("#id_merek").html(result);
                        
                        get_type($("#id_merek").val(), obj.Data.Type);

                    }
                });

                $.ajax({
                    url : '<?php echo site_url("$this->controller/warna_tnkb") ?>',
                    data : {id_warna_tnkb : obj.Data.WarnaTNKB},
                    type : 'post', 
                        success : function(result) {
                        $("#id_warna_tnkb").html(result);
                        
                        

                    }
                });

                $.ajax({
                    url : '<?php echo site_url("$this->controller/jenis") ?>',
                    data : {Jenis : obj.Data.Jenis},
                    type : 'post', 
                        success : function(result) {
                        $("#id_jenis").html(result);
                        // alert($("#id_jenis").val());
                        model($("#id_jenis").val(), obj.Data.Model);
                    }
                });

                // $.ajax({
                //     url : '<?php echo site_url("$this->controller/model") ?>',
                //     data : {Merk : obj.Data.Model},
                //     type : 'post', 
                //         success : function(result) {
                //         $("#id_model").html(result)
                //     }
                // });

                // $("#kode_dealer").val(obj.Data.KodeDealer);
                // alert(obj.Data.KodeDealer);


            }

       });


       $.ajax({
            url : '<?php echo site_url("bj_bbn_satu/get_data_type") ?>',
           dataType : 'json',
            type : 'post',
            data : {   no_rangka : $("#no_rangka").val()  },
            success : function(obj) {
                // console.log(obj);
                $("#silinder").val(obj.SILINDER);
                $("#bahan_bakar").val(obj.BHN_BAKAR);
                $("#tahun_buat").val(obj.THN_BUAT);
                $("#type").val(obj.TIPE);
                $("#id_merek").val(obj.MERK).attr('selected','selected');
                


            }

       });
 });



});

function get_type(id_merk, type){
    $.ajax({

            url : '<?php echo site_url("$this->controller/get_tipe") ?>',
            data : { id_merk : id_merk, type : type },
            type : 'post', 
            success : function(result) {
                $("#type").html(result)
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