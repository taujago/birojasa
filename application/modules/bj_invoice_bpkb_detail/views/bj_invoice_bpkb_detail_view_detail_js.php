<script type="text/javascript">
	
$("#cetak").click(function() {
  


  var id;

  
  id = $("#id").val();
  
  open('<?php echo site_url("$this->controller/pdf?"); ?>'+'id='+ id+'&jenis=inv');

});

$("#cetak_tt").click(function() {
  


  var id;

  
  id = $("#id").val();
  
  open('<?php echo site_url("$this->controller/pdf?"); ?>'+'id='+ id+'&jenis=tt');

});


</script>