<script type="text/javascript">

$(document).ready(function(){

  $(".tanggal").datepicker().on('changeDate', function(ev){                 
             $('.tanggal').datepicker('hide');
        });

    var dt = $("#us_terima_bpkb_detail").DataTable(
            {
                // "order": [[ 0, "desc" ]],
                // "iDisplayLength": 50,
                "columnDefs": [ { "targets": 0, "orderable": false } ],
                "processing": true,
                "serverSide": true,
                "ajax": '<?php echo site_url("us_terima_stck_detail/get_data") ?>'
            });

         
         $("#us_terima_bpkb_detail_filter").css("display","none");  
    
     
         $("#btn_submit").click(function(){
              // alert('hello');
              
              dt.column(1).search($("#pol").val())
              	.column(2).search($("#tanggal_awal").val())
                .column(3).search($("#tanggal_akhir").val())
                 .draw();

                 return false;
         });


         $("#btn_reset").click(function(){
            $("#tanggal_awal").val('');
            $("#tanggal_akhir").val('');
            $("#pol").val('');

            $("#btn_submit").click();
         });

$("#cetak").click(function() {
  

  var tanggal_awal;
  var tanggal_akhir;
  var kode_dealer;

  tanggal_awal = $("#tanggal_awal").val();
  tanggal_akhir = $("#tanggal_akhir").val();
  pol = $("#pol").val();
  
  // window.alert(desa);
  
  open('<?php echo site_url("$this->controller/pdf?"); ?>'+'tanggal_awal='+ tanggal_awal +'&tanggal_akhir='+tanggal_akhir+'&pol='+ pol);

});    

});
</script>