<script language="JavaScript" src="functionsjq.js"></script>
<script language="JavaScript" src='http://ajax.googleapis.com/ajax/libs/jquery/1.7.2/jquery.min.js'></script>
<script>
jQuery().ready(function($){

$('#loading')
    .hide()  // hide it initially
    .ajaxStart(function() {
        $(this).show();
    })
    .ajaxStop(function() {
        $(this).hide();
    })
;



// Ajax Called When Page is Load/Ready (Load Manufacturer)
jQuery.ajax({
					  url: 'man_list.php',
					  global: false,
					  type: "POST",
					  dataType: "xml",
					  async: false,	
					  success: populateComp
				}); 
				
				

//Ajax Called When You Change  Manufaturer
$("#manufacturer").change(function () 
	{
	 resetValues();	
	 var value = $('#manufacturer option:selected').text();
	 
	    var data = { man :$(this).attr('value')	};
	jQuery.ajax({
					  url: 'type_list.php',
					  type: "POST",
					  dataType: "xml",
					  data: { hostel: value},
					  async: false,	
					  success: populateType
				}); 
	});
	
//Do What You Want With Result .......... :)
	$("#printermodel").change(function () 
	{

//'you select Model='+$('#manufacturer').val()+'type='+$('#printertype').val()+'And Model='+$('#printermodel').val()
alert('you select Model = '+$('#manufacturer option:selected').text()+' ,type= '+$('#printertype option:selected').text()+' And Model = '+$('#printermodel option:selected').text()
);
	});
	
	
				
					});	
	</script>
	
	
	
	<style>
	#loading{
	background:url('loader64.gif') no-repeat;
	height: 63px;
	}
	</style>
			<div id="page-wrapper">
                <!-- /.row -->
                <div class="row">
                    <div class="col-lg-12">
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                Mess Preferences
                            </div>
							<div class="panel-body">
								Breakfast: <select name="manufacturer" id="manufacturer" >
								<option value="">Please select:</option></select>&nbsp;
								Lunch + Dinner: <select name="printertype" id="printertype" disabled="disabled" >
								<option value="">Please select:</option></select>&nbsp;
							</div>
                            <!-- /.panel-body -->
                        </div>
                        <!-- /.panel -->
                    </div>
                    <!-- /.col-lg-12 -->
                </div>
            </div>
            <!-- /#page-wrapper -->