<script src="<?php echo base_url("assets") ?>/js/jquery.dataTables.min.js"></script>

<script type="text/javascript">

$(document).ready(function(){

	 var dt = $("#biro_jasa").DataTable(
		 	{
		 		// "order": [[ 0, "desc" ]],
		 		// "iDisplayLength": 50,
				"columnDefs": [ { "targets": 0, "orderable": false } ],
				"processing": true,
		        "serverSide": true,
		        "ajax": '<?php echo site_url("sa_birojasa/get_data") ?>'
		 	});

		 
		 $("#biro_jasa_filter").css("display","none");  
	
	 
		 $("#btn_submit").click(function(){
		 	  // alert('hello');
		 	  

		 	  dt.column(1).search($("#nama").val())
				 .draw();

				 return false;
		 });


		 $("#btn_reset").click(function(){
			$("#nama").val('');

			$("#btn_submit").click();
		 });


});
	




</script>