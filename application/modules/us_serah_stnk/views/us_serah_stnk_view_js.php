<script type="text/javascript">



	  var dt = $("#serah_bpkb").DataTable(
            {
                // "order": [[ 0, "desc" ]],
                // "iDisplayLength": 50,
                "columnDefs": [ { "targets": 0, "orderable": false } ],
                "processing": true,
                "serverSide": true,
                "ajax": '<?php echo site_url("us_serah_stnk/get_data") ?>'
            });

         
         $("#serah_bpkb_filter").css("display","none"); 
         $("#serah_bpkb_length").css("display","none"); 
          $("#serah_bpkb_paginate").css("display","none"); 
          $("#serah_bpkb_info").css("display","none"); 
    	
     
         $("#samsat").change(function(){
              // alert('hello');
              
              dt.column(1).search($("#samsat").val())
                 .draw();

                 $("#estimasi").val('0');
                 $("#id_samsat").val($('#samsat').val());
                 return false;
         });


        




function getSelectedChbox(frm) {
 // JavaScript & jQuery Course - http://coursesweb.net/javascript/
  var selchbox = [];        // array that will store the value of selected checkboxes
  // var inputs = $('directoryresults input');
  // gets all the input tags in frm, and their number
  var inpfields = frm.find('input');
  var nr_inpfields = inpfields.length;

  // traverse the inpfields elements, and adds the value of selected (checked) checkbox in selchbox
  for(var i=0; i<nr_inpfields; i++) {
    if(inpfields[i].type == 'checkbox' && inpfields[i].checked == true) selchbox.push(inpfields[i].value);
  }

  return selchbox;
}

function biaya(){

	var selchb = getSelectedChbox($('#form_data'));
		
	$.ajax({
        url:'<?php echo site_url("$this->controller/cekbiaya"); ?>',
        data : {data : selchb},
        type : 'post',
        cache: false,
        success : function(obj){
        	
        	$('#estimasi').val(obj);
            
        }
    });

};

  /* Test this function */
// When click on #btntest, alert the selected values
$('#btntest').click(function(){


  $.ajax({

            url : '<?php echo site_url("$this->controller/simpan") ?>',
            data : $('#form_data').serialize(),
            type : 'post', 
            dataType : 'json',
            success : function(obj){

            console.log(obj.error);

            if(obj.error == false) { // berhasil 

                // alert('hooooo.. error false');
                     BootstrapDialog.show({
                            type: BootstrapDialog.TYPE_PRIMARY,
                            title: 'Informasi',
                            message: obj.message,
                            buttons: [{
					                label: 'Tutup',
					                action: function(dialog) {
            							window.location = "<?php echo site_url('us_serah_stnk_detail'); ?>";
        
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
});
</script>