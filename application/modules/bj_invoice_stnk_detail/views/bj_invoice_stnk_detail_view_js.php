<script type="text/javascript">

$(document).ready(function(){

  $(".tanggal").datepicker().on('changeDate', function(ev){                 
             $('.tanggal').datepicker('hide');
        });

    var dt = $("#us_serah_bpkb_detail").DataTable(
            {
                // "order": [[ 0, "desc" ]],
                // "iDisplayLength": 50,
                "columnDefs": [ { "targets": 0, "orderable": false } ],
                "processing": true,
                "serverSide": true,
                "ajax": '<?php echo site_url("$this->controller/get_data") ?>'
            });

         
         $("#us_serah_bpkb_detail_filter").css("display","none");  
    
     
         $("#btn_submit").click(function(){
              // alert('hello');
              
              dt.column(1).search($("#dealer").val())
              	.column(2).search($("#tanggal_awal").val())
                .column(3).search($("#tanggal_akhir").val())
                 .draw();

                 return false;
         });


         $("#btn_reset").click(function(){
            $("#tanggal_awal").val('');
            $("#tanggal_akhir").val('');
            $("#dealer").val('');

            $("#btn_submit").click();
         });

  

});
</script>