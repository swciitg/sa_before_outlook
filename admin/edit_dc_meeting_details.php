<?php
	include("session.php");
	error_reporting(E_ALL & ~(E_STRICT|E_NOTICE));
	ini_set("display_errors", 0);

	include("connect.php");
	
	

	$id = $_GET['track'];
	
	
	$date = $_POST['date0'];
	$decision = $_POST['decision0'];
	$curdatetime = date('Y-m-d H:i:s');
	
	//no. of students only if more than one
	

	$query2 = "SELECT * FROM `disciplinary_meeting_details` WHERE id='$id'";
	$result2 = mysql_query($query2);
	$row_track = mysql_fetch_array($result2);	
	
	

	
	//$currentdatetime = mysql_query('select now()');
	//$curdatetime = mysql_result($currentdatetime,0);
	//$date = new DateTime('now', new DateTimeZone('Asia/Kolkata'));
	//$curdatetime = $date->format('d-m-Y H:i:s');
	$time_d = date("d");
	$time_m = date("M");
	$time_y = date("Y");
	if (isset($_POST['Submit'])) {
		if($date==''){
			$error  = "<font color='red'>Please Enter Meeting Details.</font>";
		}
		else{
		
			
			$success = "Meeting details successfully updated for case no. <b>$application_no</b>.";
			mysql_query("UPDATE `disciplinary_meeting_details` SET meeting_date='$date' WHERE id='$id'");
			mysql_query("UPDATE `disciplinary_meeting_details` SET decisions ='$decision' WHERE id='$id'");
			
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
			

</script>

			<div id="page-wrapper">
                <!-- /.row -->
                <div class="row">
                    <div class="col-lg-12">
                        <div class="panel panel-default">
                            <div class="panel-heading" style='font-size:150%; color:#198822' class='form-group col-lg-12'>
                               Update DC Meeting Details
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
                                            
						<?php echo "<div style='font-size:110%; color:#198822' class='form-group col-lg-12'>Add Meeting Details(Application No.:$row_track[app_no])</div>"; ?>
					   
						<div class="col-md-12 column">
							<table class="table table-bordered table-hover" id="tab_logic">
								<thead>
									<tr >
										<th class="text-center">
											S.No.
										</th>
										<th class="text-center">
											Meeting Date
										</th>
										<th class="text-center">
											Decision
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
										<span for="date" class="input-group-addon"><i class="fa fa-calendar" ></i> </span>										
										<input type="text" name='date0' id='date' placeholder="Meeting Date"  class="form-control datepicker" data-date-format="yyyy-mm-dd" value="<?php echo $row_track['meeting_date'];?>" />
										</div>
										</td>
										<td><textarea type="text" name='decision0' placeholder="Decision" class="form-control" ><?php echo $row_track['decisions'];?></textarea>
										</td>
									</tr>
						    </tbody>
							</table>
					</div>
	


					    <div class="row" style="margin-top:2%">
						<div class="col-lg-12">
						   <div class="col-lg-5"></div>
							 
							<div class="col-lg-2">
								<div class="form-group ">
								  
									<button type="submit" class="btn btn-primary" name="Submit" >Update Meeting</button>
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
							<td><b>Case Application No.:</b> <?php echo $row_track['application_no']; ?></td>
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
