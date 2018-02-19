<script type="text/javascript">
	
	$("#cetak").click(function() {
  


  var id;

  
  id = $("#id_ref").val();
  
  open('<?php echo site_url("$this->controller/pdf?"); ?>'+'id='+ id);

});


</script>