


<script type="text/javascript">


$(document).ready(function() {

$(".rupiah").autoNumeric('init'); 

 

$('.rp').focus(function(){
    console.log('test');

    $.ajax({
        url : '<?php echo site_url("$this->controller/get_biaya") ?>',
        data :  $("#form_data").serialize(), 
        type : 'post',
        dataType : 'json',
        success : function(obj) {
            $("#rp_daftar_stnk").val(obj.rp_daftar_stnk);
            $("#rp_daftar_bpkb").val(obj.rp_daftar_bpkb);
            $("#rp_pajak_kendaraan").val(obj.rp_pajak_kendaraan);
            $("#rp_admin_fee").val(obj.rp_admin_fee);
            $("#total").val(obj.total);
        }
    });

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
                $("#kode_dealer").val(obj.Data.KodeDealer);
                $("#nama_dealer").val(obj.Data.NamaDealer);
                $("#nama_pemilik").val(obj.Data.Pemilik1);
                $("#alamat_pemilik").val(obj.Data.Alamat1);


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


</script>