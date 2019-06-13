<?php
	include("session.php");
	error_reporting(E_ALL & ~(E_STRICT|E_NOTICE));
	ini_set("display_errors", 0);

	include("connect.php");
	
	


	$application_no = $_GET['track'];
	
	
	$date = $_POST['date0'];
	$details = $_POST['details0'];
	$remarks = $_POST['remarks0'];
	$curdatetime = date('Y-m-d H:i:s');
	
	//no. of students only if more than one
	$i_value = $_POST['i_value'];
	if($i_value!=''){
			$i=1;
			while($i<$i_value){
				$date_check = $_POST['date'.$i];
				if($date_check==''){
					$blank_row='yes';
					break;
				}
				$i++;
			}
		}

	
	

	
	//$currentdatetime = mysql_query('select now()');
	//$curdatetime = mysql_result($currentdatetime,0);
	//$date = new DateTime('now', new DateTimeZone('Asia/Kolkata'));
	//$curdatetime = $date->format('d-m-Y H:i:s');
	$time_d = date("d");
	$time_m = date("M");
	$time_y = date("Y");
	if (isset($_POST['Submit'])) {
		if($date=='' OR $blank_row=='yes'){
			$error  = "<font color='red'>Please Enter Follow Up Details.</font>";
		}
		else{
		
			
			$success = "Follow Up details successfully updated for case no. <b>$application_no</b>.";
			mysql_query("INSERT INTO `disciplinary_follow_up` VALUES ('','$application_no','$date','$details','$remarks','$curdatetime')");
			if($i_value!=''){
				$i=1;
				while($i<$i_value){
					$date_var = $_POST['date'.$i];
					$details_var = $_POST['details'.$i];
					$remarks_var = $_POST['remarks'.$i];
					mysql_query("INSERT INTO `disciplinary_follow_up` VALUES ('','$application_no','$date_var','$details_var','$remarks','$curdatetime')");
					$i++;
				}
			}	
		}

	
	}
?>



<style>
label.required:after {
	content: " *";
	color: red;
}
</style>

<link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
<script type='text/javascript'>
	$( function() {
		$( "#date" ).datepicker({dateFormat: "yy-mm-dd",showAnim: "slideDown" });
		
	  } );

	$(document).ready(function(){
	      var i=1;
		$("#date_"+i).datepicker({dateFormat: "yy-mm-dd",showAnim: "slideDown" });
	     $("#add_row").click(function(){
		
	      $('#addr'+i).html("<td>"+ (i+1) +"</td><td><div class='input-group date'><span class='input-group-addon'><i class='fa fa-calendar'></i> </span><input id='date_"+i+"' name='date"+i+"' type='text' placeholder='Date' class='form-control datepicker' data-date-format='yyyy-mm-dd' /> </div></td><td><textarea  name='details"+i+"' type='text' placeholder='Details'  class='form-control input-md'></textarea></td><td><textarea  name='remarks"+i+"' type='text' placeholder='Remarks'  class='form-control input-md'></textarea></td>");

	      $('#tab_logic').append('<tr id="addr'+(i+1)+'"></tr>');
	      
	      i++; 
		$('#value_i').html("<input name='i_value' value='"+i+"' type='hidden'>");
	  });
	     $("#delete_row").click(function(){
	    	 if(i>1){
			 $("#addr"+(i-1)).html('');
			 i--;
			 }
		 });

	});
</script>

			<div id="page-wrapper">
                <!-- /.row -->
                <div class="row">
                    <div class="col-lg-12">
                        <div class="panel panel-default">
                            <div class="panel-heading" style='font-size:150%; color:#198822' class='form-group col-lg-12'>
                               Update DC Follow Up
                            </div>
                            <div class="panel-body">
								<?php 
									if($error != ''){
									?>
									  <div class="alert alert-warning">
										<?php if(isset($error)) { echo $error; }?>
									  </div>
									<?php
									}
									
								?>
                                <div class="row">
                                    <div class="col-lg-12">
                                        <form name="meeting" class="before_success" accept-charset="utf-8" method="post"  action="" enctype="multipart/form-data">
                                            	<?php echo "<div style='font-size:110%; color:#198822' class='form-group col-lg-12'>Add Follow Up Details(Application No.:$application_no)</div>"; ?>
					   

						<div class="col-md-12 column">
							<table class="table table-bordered table-hover" id="tab_logic">
								<thead>
									<tr >
										<th class="text-center">
											S.No.
										</th>
										<th class="text-center">
											Date
										</th>
										<th class="text-center">
											Details
										</th>
										<th class="text-center">
											Remarks
										</th>
									</tr>
								</thead>
								<tbody>
									<tr id='addr0'>
										<td>
										1
										</td>
										<td>
										<div class="input-group date">
										<span class="input-group-addon"><i class="fa fa-calendar"></i> </span>										
										<input type="text" name='date0' id='date' placeholder="Date"  class="form-control datepicker" data-date-format="yyyy-mm-dd"/>
										</div>
										</td>
										<td><textarea type="text" name='details0' placeholder="Details" class="form-control"></textarea>
										</td>
										</td>
										<td><textarea type="text" name='remarks0' placeholder="Remarks" class="form-control"></textarea>
										</td>
									</tr>
						    <tr id='addr1'></tr>
						    <tr id='value_i'></tr>
								</tbody>
							</table>
					<a id="add_row" class="btn btn-default pull-left">Add Row</a><a id='delete_row' class="pull-right btn btn-default">Delete</a>
					</div>
	


					    <div class="row" style="margin-top:2%">
						<div class="col-lg-12">
						   <div class="col-lg-5"></div>
							 
							<div class="col-lg-2">
								<div class="form-group ">
								  
									<button type="submit" class="btn btn-primary" name="Submit" >Add Follow Up(s)</button>
								</div>
							</div>
							<div class="col-lg-5"></div>
						</div>
					    </div>
                                        </form>
                                    </div>
                                </div>
                                <!-- /.row (nested) -->





				<?php if($success != ''){ ?>
			<style>
			.before_success{
				display: none;
			}
			.alert-dismissable{
				display: none;
			}
			</style>
			<div class="table-responsive" style="overflow-x: hidden;">
				<div class="alert alert-success">
					<?php if(isset($success)) { echo $success; }?>
				</div>
				<table class="table table-striped table-bordered table-hover">
					<tbody>
						<tr>
							<td><b>Case Application No.:</b> <?php echo $application_no; ?></td>
							<td><b>Current Date Time:</b> <?php echo $curdatetime; ?></td>
							
						</tr>
						<tr>
					</tbody>
				</table>
				<div class="row" style="margin-top:2%">
					<div class="col-lg-12">
						<div class="col-lg-3"></div>
							<div class="col-lg-2">
								<div class="form-group ">
								    
									<a href='system_running_disciplinary_cases.php'><button type="button" class="btn btn-default">Check Open Case(s)</button></a>
								</div>
							</div>
						<div class="col-lg-2"></div>
							<div class="col-lg-2">
								<div class="form-group ">
								    
									<a href='system_closed_disciplinary_cases.php'><button type="button" class="btn btn-default">Check Closed Case(s)</button></a>
								</div>
							</div>
						<div class="col-lg-3">
						</div>
					</div>
				</div>
			</div>
			<?php } ?>


                            </div>
                            <!-- /.panel-body -->
                        </div>
                        <!-- /.panel -->
                    </div>
                    <!-- /.col-lg-12 -->
                </div>
                <!-- /.row -->
            </div>
            <!-- /#page-wrapper -->
