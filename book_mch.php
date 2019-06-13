<div id="page-wrapper">
<?php
	include("session.php");
	error_reporting(E_ALL & ~(E_STRICT|E_NOTICE));
	ini_set("display_errors", 1);

	include("connect.php");
	$webmail = $login_session;

	$query2 = "SELECT * FROM mch WHERE webmail='$login_session'";
	$result2 = mysql_query($query2);
	

	//appllicant details
	$stud_name = $name;
	$roll_no = $rollno;
	$contact_no = $user_phone;
	$programme_detail = $current_dept;
	$purpose_of_booking = $_POST['purpose'];
	$hostel= $user_hostel;
	$room = $user_room;
	$course = $current_course;
	$from = $_POST['from'];
	$from_time = $_POST['from_time'];
	$to = $_POST['to'];
	$to_time = $_POST['to_time'];
	$days = $_POST['days'];
	$hall_type = $_POST['hall_type'];
	//permission-file
	$permissionFile = $_FILES['permission']['name'];
	$tmp_dir = $_FILES['permission']['tmp_name'];
	$fileSize = $_FILES['permission']['size'];
	$fileSizeKB = (int) ($fileSize/1024);
	$upload_dir = 'mch/permission/';
	// renaming file
	$temp = explode(".",$_FILES['permission']['name']);
	$newfilename = round(microtime(true)*1) . '.' . end($temp);

	$curdatetime = date('Y-m-d H:i:s');
	$curYear = date('Y');

	if(isset($_POST['Submit'])){
		if($purpose_of_booking == ''){
			$error = "<font color='red'>Please Enter Purpose of Booking.</font>";
		}
		else if($from=='' OR $to==''){
			$error = "<font color='red'>Please enter dates of booking.</font>";
		}
		else if($from_time=='' OR $to_time==''){
			$error = "<font color='red'>Please enter time for which you want to book hall.</font>";
		}
		else if($days==''){
			$error = "<font color='red'>Please enter number of days for which you want to book hall.</font>";
		}
		else if($hall_type==''){
			$error = "<font color='red'>Please Hall type for booking.</font>";
		}
		else if($permissionFile==''){
			$error = "<font color='red'>Please upload scanned copy of Permission Files.</font>";
		}
		else if($fileSizeKB > 200){
			$error = "<font color='red'>You have uploaded Permission Files of size ".$fileSizeKB." KB, which is larger than 200 KB.</font>";
		}
		else{
			$application_no=round(microtime(true));
			$mch_application_no = "MCH/2018/".$application_no;
			$success = "Request successfully submitted. Your booking Application No. is <b>$mch_application_no</b></font>";
			mysql_query("INSERT INTO mch_booking VALUES('','$mch_application_no','$roll_no','$stud_name','$webmail','$programme_detail','$hostel','$room','$contact_no','$from','$to','$days','','$course','$curdatetime','$purpose_of_booking','Student Affairs Office','$hall_type','','','','','','','','','','$from_time','$to_time','','$newfilename','yes','','','','')");
			move_uploaded_file($_FILES["permission"]["tmp_name"], $upload_dir.$newfilename);
			$message = "Dear ".$stud_name."\r\n Your MCH(Manas Community hall) booking request (Application No. ".$mch_application_no.") has been successfully submitted to SA Office. Latest status can be tracked via CLS.\r\n Thanking You.\r\n Regards,\r\n Team SWC";
			$headers = "MIME-Version: 1.0" . "\r\n";
			$headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
			$headers .= 'From: SWC, IIT Guwahati <swc@iitg.ernet.in>' . "\r\n";
			//$headers .= 'Cc: swc@iitg.ernet.in, saoff@iitg.ernet.in, guesthouse@iitg.ernet.in' . "\r\n";
			$user_webmail = $webmail."@iitg.ernet.in";
			mail($user_webmail , 'MCH booking application submission confirmation' , $message , $headers);
		
		}
	}

?>
<link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/timepicker/1.3.5/jquery.timepicker.min.js"></script>
<link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/timepicker/1.3.5/jquery.timepicker.min.css">
<script>
  $( function() {
	$( "#date_from" ).datepicker({minDate: "0D",maxDate: "30D",dateFormat: "yy-mm-dd",showAnim: "slideDown" });
  } );
  $( function() {
	$( "#date_to" ).datepicker({minDate: "0D",maxDate: "30D",dateFormat: "yy-mm-dd",showAnim: "slideDown" });
  } );
  $( function() {
	$("#from_time").timepicker({timeFormat: 'h:mm p', dynamic: false, dropdown: true, scrollbar: true });
  } );
  $( function() {
	$("#to_time").timepicker({timeFormat: 'h:mm p', dynamic: false, dropdown: true, scrollbar: true });
  } );
</script>

<style>
label.required:after {
	content: " *";
	color: red;
}
</style>



<div class="row" >
    <div class="col-lg-12">
	<div class="panel panel-info">
	    <div class="panel-heading">
		Online Manas Community Hall Booking
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
		
		<form name="rc" class="before_success" action=""  accept-charset="utf-8" method="post" enctype="multipart/form-data"> 
		    <div class="form-group col-md-4">
			<label class="required">Name</label>
			<input class="form-control" value="<?php echo $name; ?>" readonly> 
		    </div>
		    <div class="form-group col-md-4">
			<label class="required">Roll No.</label>
			<input class="form-control" value="<?php echo $rollno; ?>" readonly>
		    </div>
		    <div class="form-group col-md-4">
			<label class="required">Contact No.</label>
			<input class="form-control" value="<?php echo $user_phone; ?>" readonly>
		    </div>
		    <div class="form-group col-md-4">
			<label class="required">Hostel</label>
			<input class="form-control" value="<?php echo $user_hostel; ?>" readonly>
		    </div>
		    <div class="form-group col-md-4">
			<label class="required">Room No.</label>
			<input class="form-control" value="<?php echo $user_room; ?>" readonly>
		    </div>
		    <div class="form-group col-lg-4">
			<label class="required">Course</label>
			<input class="form-control" value="<?php echo $current_course; ?>" readonly>	
		    </div>
		    <div class="form-group col-md-4">
			<label class="required">Applicant Programme Details(Dept/Centre etc.)</label>
			<input class="form-control" value="<?php echo $current_dept; ?>" readonly>
			<!--<textarea class="form-control" type="text" name=""></textarea>  -->
		    </div>
		    <div class="form-group col-md-8">
			<label for="purpose" class="required">Purpose Of Booking</label>
			<textarea class="form-control" id="purpose" name="purpose" value="<?php echo $purpose_of_booking; ?>" /></textarea>
		    </div>
		    
		    <div class="form-group col-md-3">
			<label for="date_from" class="required">From Date</label>
			<div class="input-group date">
				<span class="input-group-addon"><i class="fa fa-calendar"></i> </span>
				<input input id="date_from" type="text" class="form-control datepicker"  name="from" value="<?php echo $from; ?>" data-date-format="yyyy-mm-dd" />
			</div>
		    </div>
		    <div class="form-group col-md-3">
			<label for="from_time" class="required">From Time</label>
			<div class="input-group">
				<span class="input-group-addon"><i class="fa fa-clock-o"></i> </span>
				<input input id="from_time" type="text" class="form-control" id="from_time" name="from_time" value="<?php echo $from_time; ?>" />
			</div>
		    </div>
		    <div class="form-group col-md-3">
			<label for="date_to" class="required">To Date</label>
			<div class="input-group date">
				<span class="input-group-addon"><i class="fa fa-calendar"></i> </span>
				<input input id="date_to" type="text" class="form-control datepicker" name="to" value="<?php echo $to; ?>" data-date-format="yyyy-mm-dd" />
			</div>
		    </div>
		    <div class="form-group col-md-3">
			<label for="to_time" class="required">To Time</label>
			<div class="input-group">
				<span class="input-group-addon"><i class="fa fa-clock-o"></i> </span>
				<input input id="to_time" type="text" class="form-control" id="to_time" name="to_time" value="<?php echo $to_time; ?>" />
			</div>
		    </div>
		    <div class="form-group col-md-3">
			<label for="days" class="required">Number of Days</label>
			<input class="form-control" type="text" id="days" name="days" value="<?php echo $days; ?>" />
		    </div>
		    
		   
		    <div class="form-group col-md-5">
			<div>
			<label class="required">Charges for use of Community Hall (Booking Option)</label>
			</div>
			<div>
			<input class="" name="hall_type" type="radio" value="Hall" checked>A) Only the hall=Rs.500/- per day <br>  
			<input class="" name="hall_type" type="radio" value="Hall Plus Room">B) Hall Plus One Room=Rs.600/- per day
			</div>
		    </div>
		    <div class="form-group col-md-4">
			<label for="permission" class="required">Recommendation from Authority/Faculty(max 200Kb)</label>
			<input type="file" name="permission" id="permission" class="inputfile"/>
		    </div>
		    <div class="row" style="margin-top:2%">
			<div class="col-lg-12">
			    <div class="col-lg-12"><input type="checkbox" id="checkme" name="tnc" required class="required"/><a href="system_mch_rules.php"> I have read all the rules for applying for booking of Community hall. </a><br/><br/></div>
				<div class="col-lg-5"></div>
				 
				<div class="col-lg-2">
					<div class="form-group ">
					  
						<button type="submit" class="btn btn-primary" name="Submit" >Submit Request</button>
					</div>
				</div>
				<div class="col-lg-5"></div>
			</div>
		    </div>
	    



		</form>



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
							<td><b>Booking Application No.:</b> <?php echo $mch_application_no; ?></td>
							<td><b>Booking Status:</b> Students' Affairs Office</td>
							
						</tr>
						<tr>
							<td><b>Booking From Date:</b> <?php echo $from; ?></td>
							<td><b>Booking Upto Date:</b> <?php echo $to; ?></td>
							
						</tr>
						<tr>
							<td><b>Booking From Time:</b> <?php echo $from_time; ?></td>
							<td><b>Booking Upto Time:</b> <?php echo $to_time; ?></td>
							
						</tr>
						<tr>
							<td><b>No. of Days(s):</b> <?php echo $days; ?></td>
							<td><b>Hall Booking Type:</b> <?php echo $hall_type; ?></td>
						</tr>
						<tr>
							<td><b>Course/Programme Details:</b><?php echo $course."/".$programme_detail;?></td>
							<td><b>Booking Time:</b> <?php echo $curdatetime; ?></td>
						</tr>
						<tr>
							<td><b>Purpose of Booking:</b> <?php echo $purpose_of_booking; ?></td>
							<td><b>Uploaded Permission:</b> <a href="mch/permission/<?php echo $newfilename; ?>" target="_blank">Download</a></td>
						</tr>
						<tr>
							
						</tr>
					</tbody>
				</table>
				<div class="row" style="margin-top:2%">
					<div class="col-lg-12">
						<div class="col-lg-5"></div>
							<div class="col-lg-2">
								<div class="form-group ">
								    
									<a href='system_track_mch_booking.php'><button type="button" class="btn btn-default">Check Old Booking(s)</button></a>
								</div>
							</div>
						<div class="col-lg-5">
						</div>
					</div>
				</div>
			</div>
			<?php } ?>



		</div>
		<!-- /.panel-body -->
	</div>
	<!-- /.panel panel-info-->
    </div>
    <!-- /.cl-lg-12 -->
</div>
<!--  /.row  -->
</div>
<!-- /#pagewrapper -->
	
