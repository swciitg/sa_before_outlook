<?php
	include("session.php");
	error_reporting(E_ALL & ~(E_STRICT|E_NOTICE));
	ini_set("display_errors", 0);

	include("connect.php");
	$id = $login_session;
	
	$query2 = "SELECT * FROM gh_booking WHERE webmail = '$login_session'";
	$result2 = mysql_query($query2);
	//$row = mysql_fetch_array($result2);
	//$fetch_last_booking_time = $row["date_from"];
	
	$from 			 = $_POST['from'];
	$to           	 = $_POST['to'];
	
	// Current Year
	$cur_year = date("Y");
	
	// Check if max booking days is 3
	$date_from   = new DateTime($from); 
	$date_to   = new DateTime($to);  
	$interval    = $date_from->diff($date_to);  
	$days        = $interval->format('%a');
	
	// Visitor - 1 Info
	$visitor1_name   = $_POST['visitor1_name'];
	$visitor1_age    = $_POST['visitor1_age'];
	$visitor1_gender    = $_POST['visitor1_gender'];
	$visitor1_address    = $_POST['visitor1_address'];
	$visitor1_marital    = $_POST['visitor1_marital'];
	$visitor1_relation    = $_POST['visitor1_relation'];
	
	// Visitor - 2 Info
	$visitor2_name   = $_POST['visitor2_name'];
	$visitor2_age    = $_POST['visitor2_age'];
	$visitor2_gender    = $_POST['visitor2_gender'];
	$visitor2_address    = $_POST['visitor2_address'];
	$visitor2_marital    = $_POST['visitor2_marital'];
	$visitor2_relation    = $_POST['visitor2_relation'];
	
	$room_type       = $_POST['room_type'];
	$reason          = $_POST['booking_reason'];
	$id_number       = $_POST['id_number'];
	$tnc             = $_POST['tnc']; 
	
	// For Visitor ID
	$idFile = $_FILES['id_visitors']['name'];
	$tmp_dir = $_FILES['id_visitors']['tmp_name'];
	$idSize = $_FILES['id_visitors']['size'];
	$idSizeKB = (int) ($idSize / 1024);
	$upload_dir = 'ids/'; // upload directory
	
	// Renaming Uploaded ID Card
	$temp = explode(".", $_FILES["id_visitors"]["name"]);
	$newfilename = round(microtime(true)) . '.' . end($temp);
	//move_uploaded_file($_FILES["id_visitors"]["tmp_name"], $upload_dir.$newfilename);
	
	
	$currentdatetime = mysql_query('select now()');
	$curdatetime     = mysql_result($currentdatetime, 0);
	$curYear         = date('Y');
	
	// Check if last booking is one week old or not
	$date_last_booking   = new DateTime($last_booking_time); 
	$interval_last_now    = $date_last_booking->diff($date_from);  
	$last_booking_days        = $interval_last_now->format('%a');
	//echo $last_booking_days;
	
	$error = "";
	$success = "";
	if (isset($_POST['Submit'])) {
		if($visitor2_name == '' AND ($visitor1_name == '' OR $visitor1_age == '' OR $visitor1_gender == '' OR $visitor1_address == '' OR $visitor1_marital == '' OR $visitor1_relation == '')){
			$error = "<font color='red'>All fileds of visitor-1 are required.</font>";
		}
		else if($visitor2_name != '' AND ($visitor1_name == '' OR $visitor1_age == '' OR $visitor1_gender == '' OR $visitor1_address == '' OR $visitor1_marital == '' OR $visitor1_relation == '' OR $visitor2_name == '' OR $visitor2_age == '' OR $visitor2_gender == '' OR $visitor2_address == '' OR $visitor2_marital == '' OR $visitor2_relation == '')){
			$error = "<font color='red'>All fileds of visitor-1 and Visitor-2 are required.</font>";
		}
		else if($from == '' OR $to == ''){
			$error = "<font color='red'>Choose check-in and check-out dates.</font>";
		}
		else if($reason == ''){
			$error = "<font color='red'>Please state the purpose of visit.</font>";
		}
		else if($id_number == ''){
			$error = "<font color='red'>Visitor's ID card number is required.</font>";
		}
		else if($idFile == ''){
			$error = "<font color='red'>Please upload a scanned copy of visitor's ID card.</font>";
		}
		else if($idSizeKB > 200){
			$error = "<font color='red'>You have uploaded ID card of size ".$idSizeKB." KB, which is larger than 200 KB.</font>";
		}
		else if($days >3){
			$error = "<font color='red'>You have requested of booking for ".$days." nights, But the maximum nights you can book is 3 only.</font>";
		}
		else if($tnc == NULL){
		    $error = "<font color='red'>Kindly select terms and condition field.</font>";
		}
		else{
			$min=10000;
			$max=99999;
			$application_no = rand($min,$max);
			$gh_application_no = "GH/2019/".$application_no;
			$isbooked = mysql_query("SELECT * FROM gh_booking WHERE application_no = '$application_no'");
            $isinbooked = mysql_num_rows($isbooked);
		  
			$isdatebooked = mysql_query("SELECT * FROM gh_booking WHERE webmail = '$login_session' AND (date_from = '$from' OR date_to = '$from')");
            $isindatebooked = mysql_num_rows($isdatebooked);
			
			while ($row = mysql_fetch_array($result2)) {
				$starting_time = $row["date_from"];
				$ending_time = $row["date_to"];
				$jan = $cur_year."-01-01";
				$jun = $cur_year."-06-30";
				$july = $cur_year."-07-01";
				$dec = $cur_year."-12-31";
				//echo $starting_time.$ending_time.$from."<br>";
				if(($starting_time >= $jan) && ($starting_time <= $jun)){
					$errorsem = "sem1";
					break;
				}
				else if(($starting_time >= $july) && ($starting_time <= $dec)){
					$errorsem = "sem2";
					break;
				}
			}
			// If making multiple booking on same date
			if(($errorsem == "sem1") && (($from >= $jan) && ($from <= $jun))){
				$error = "<font color='red'>You have already done a booking in Jan-June session.</font>";
			}
			else if(($errorsem == "sem2") && (($from >= $july) && ($from <= $dec))){
				$error = "<font color='red'>You have already done a booking in July-Dec session.</font>";
			}
			// If not in Db
            else{
				$success = "Request successfully submitted. Your booking Application No. is <b>$gh_application_no</b></font>";
				mysql_query("INSERT INTO gh_booking VALUES ('','$gh_application_no','$rollno','$name','$login_session','$current_dept','$user_hostel','$user_room','$user_phone','$from','$to','$days','$visitor1_name','$visitor1_age','$visitor1_gender','$visitor1_address','$visitor1_marital','$visitor1_relation','$visitor2_name','$visitor2_age','$visitor2_gender','$visitor2_address','$visitor2_marital','$visitor2_relation','$room_type','$id_number','$newfilename','$curdatetime','$reason','Students Affairs Office','Private','','','','','','','','','','','','','yes','','','','','','')");
				//move_uploaded_file($tmp_dir,$upload_dir.$idFile);
				move_uploaded_file($_FILES["id_visitors"]["tmp_name"], $upload_dir.$newfilename);
				mysql_query("INSERT INTO gh_movement VALUES ('','$gh_application_no','Students Affairs','Students Affairs Office','Application Received','$curdatetime')");
				$message = "Dear ".$name."\r\n Your guesthouse booking request (Application No. ".$gh_application_no.") has been successfully submitted to SA Office. Latest status can be tracked via CLS.\r\n Thanking You.\r\n Regards,\r\n Team SWC";
				$headers = "MIME-Version: 1.0" . "\r\n";
				$headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
				$headers .= 'From: SWC, IIT Guwahati <swc@iitg.ernet.in>' . "\r\n";
				//$headers .= 'Cc: swc@iitg.ernet.in, saoff@iitg.ernet.in, guesthouse@iitg.ernet.in' . "\r\n";
				$user_webmail = $id."@iitg.ernet.in";
				mail($user_webmail , 'Guesthouse booking confirmation' , $message , $headers);
			}
		}
	}
?>
			<link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
			<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
			<script>
			  $( function() {
				$( "#date_from" ).datepicker({minDate: "5D",maxDate: "30D",dateFormat: "yy-mm-dd",showAnim: "slideDown" });
			  } );
			  $( function() {
				$( "#date_to" ).datepicker({minDate: "6D",maxDate: "30D",dateFormat: "yy-mm-dd",showAnim: "slideDown" });
			  } );
			</script>
			<style>
			label.required:after {
				content: " *";
				color: red;
			}
			</style>
			<div id="page-wrapper">
                <!-- /.row -->
                <div class="row">
                    <div class="col-lg-12">
                        <div class="panel panel-info">
                            <div class="panel-heading">
                               Online Guesthouse Booking
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
                                        <form name="gh" class="before_success" action=""  accept-charset="utf-8" method="post" enctype="multipart/form-data">
											<div class="row">
												<div class="col-lg-12">			
													<div class="alert alert-warning alert-dismissable">
														<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
														<?php
														$query3 = "SELECT * FROM gh_non_availibility ORDER BY time DESC";
														$result3 = mysql_query($query3);
														$row_non_availibility = mysql_fetch_array($result3);
														?>
														No rooms are available during the period from <?php echo $row_non_availibility["dates"]; ?><?php  if($row_non_availibility["non_ava_reason"] !=''){ echo " due to ".$row_non_availibility["non_ava_reason"];}?>.
													</div>
													<div class="panel-body">
														<div class="panel-group" id="accordion">
															<div class="panel panel-default">
																<div class="panel-heading">
																	<h4 class="panel-title" style="font-size: 15px;">
																		<a data-toggle="collapse" data-parent="#accordion" href="#collapseOne">Visitor - 1</a>
																	</h4>
																</div>
																<div id="collapseOne" class="panel-collapse collapse in">
																	<div class="panel-body">
																		<div class="form-group col-md-4">
																			<label class="required">Name</label>
																			<input class="form-control" type="text" value="<?php echo $visitor1_name; ?>" name="visitor1_name" />
																		</div>
																		<div class="form-group col-md-4">
																			<label class="required">Age</label>
																			<input class="form-control" type="number" value="<?php echo $visitor1_age; ?>" name="visitor1_age" />
																		</div>
																		<div class="col-lg-4">
																			<div class="form-group">
																				<label class="required">Gender</label>
																				<select class="form-control" name="visitor1_gender">
																					<option value="Male">Male</option>
																					<option value="Female">Female</option>
																					<option value="Transgender">Transgender</option>
																				</select>
																			</div>
																		</div>
																		<div class="form-group col-md-4">
																			<label class="required">Address</label>
																			<input class="form-control" type="text" value="<?php echo $visitor1_address; ?>" name="visitor1_address" />
																		</div>
																		<div class="col-lg-4">
																			<div class="form-group">
																				<label class="required">Marital Status</label>
																				<select class="form-control" name="visitor1_marital">
																					<option value="Single">Single</option>
																					<option value="Double">Married</option>
																				</select>
																			</div>
																		</div>
																		<div class="col-lg-4">
																			<div class="form-group">
																				<label class="required">Relationship with the student</label>
																				<select class="form-control" name="visitor1_relation">
																					<option value="Single">Parents</option>
																					<option value="Double">Others</option>
																				</select>
																			</div>
																		</div>
																	</div>
																</div>
															</div>
															<div class="panel panel-default">
																<div class="panel-heading">
																	<h4 class="panel-title" style="font-size: 15px;">
																		<a data-toggle="collapse" data-parent="#accordion" href="#collapseTwo">Visitor - 2 (optional)</a>
																	</h4>
																</div>
																<div id="collapseTwo" class="panel-collapse collapse">
																	<div class="panel-body">
																		<div class="form-group col-md-4">
																			<label>Name</label>
																			<input class="form-control" type="text" value="<?php echo $visitor2_name; ?>" name="visitor2_name" />
																		</div>
																		<div class="form-group col-md-4">
																			<label>Age</label>
																			<input class="form-control" type="text" value="<?php echo $visitor2_age; ?>" name="visitor2_age" />
																		</div>
																		<div class="col-lg-4">
																			<div class="form-group">
																				<label>Gender</label>
																				<select class="form-control" name="visitor2_gender">
																					<option value="Single">Male</option>
																					<option value="Double">Female</option>
																					<option value="Transgender">Transgender</option>
																				</select>
																			</div>
																		</div>
																		<div class="form-group col-md-4">
																			<label>Address</label>
																			<input class="form-control" type="text" value="<?php echo $visitor2_address; ?>" name="visitor2_address" />
																		</div>
																		<div class="col-lg-4">
																			<div class="form-group">
																				<label>Marital Status</label>
																				<select class="form-control" name="visitor2_marital">
																					<option value="Single">Single</option>
																					<option value="Double">Married</option>
																				</select>
																			</div>
																		</div>
																		<div class="col-lg-4">
																			<div class="form-group">
																				<label>Relationship with the student</label>
																				<select class="form-control" name="visitor2_relation">
																					<option value="Single">Parents</option>
																					<option value="Double">Others</option>
																				</select>
																			</div>
																		</div>
																	</div>
																</div>
															</div>
														</div>
													</div>
													<div class="form-group col-lg-4">
														<label class="required">From</label>
														<div class="input-group date">
															<span class="input-group-addon"><i class="fa fa-calendar"></i> </span>
															<input id="date_from" type="text" class="form-control datepicker" name="from" data-date-format="yyyy-mm-dd" value="<?php echo $from; ?>">
														</div>
													</div>
													<div class="form-group col-lg-4">
														<label class="required">To</label>
														<div class="input-group date">
															<span class="input-group-addon"><i class="fa fa-calendar"></i> </span>
															<input id="date_to" type="text" class="form-control datepicker" name="to" data-date-format="yyyy-mm-dd" value="<?php echo $to; ?>">
														</div>
													</div>
													<div class="form-group col-lg-4">
														<label class="required">Room Type</label>
														<select class="form-control" name="room_type">
															<option value="Single">Single</option>
															<option value="Double">Double</option>
														</select>
													</div>
													<div class="form-group col-md-4">
														<label class="required">Purpose of Visit</label>
														<input class="form-control" type="text" value="<?php echo $reason; ?>" name="booking_reason" />
													</div>
													<div class="form-group col-md-4">
														<label class="required">Visitor's ID Card No.</label>
														<input class="form-control" type="text" value="<?php echo $id_number; ?>" name="id_number" />
													</div>
													<div class="form-group col-md-4">
														<label for="id_visitors" class="required">Visitor's ID card (max 200Kb)</label>
														<input type="file" name="id_visitors" id="file" class="inputfile"/>
													</div>
												</div>
											</div>
											<div class="row" style="margin-top:2%">
												<div class="col-lg-12">
												 <input type="checkbox" id="checkme" name="tnc" required class="required"/> <a href='system_guesthouse_rules.php'>I have read all the rules for Guesthouse booking.</a> <br/>
													<div class="col-lg-5"></div>
													 
													<div class="col-lg-2">
														<div class="form-group ">
														  
															<button type="submit" class="btn btn-primary" name="Submit"  >Submit Request</button>
														</div>
													</div>
													<div class="col-lg-5">
													</div>
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
														<td><b>Booking Application No.:</b> <?php echo $gh_application_no; ?></td>
														<td><b>Booking Status:</b> Students' Affairs Office</td>
														
													</tr>
													<tr>
														<td><b>Booking From:</b> <?php echo $from; ?></td>
														<td><b>Booking Upto:</b> <?php echo $to; ?></td>
														
													</tr>
													<tr>
														<td><b>No. of Night(s):</b> <?php echo $days; ?></td>
														<td><b>Room Type:</b> <?php echo $room_type; ?></td>
													</tr>
													<tr>
														<td><b>Booking Time:</b> <?php echo $curdatetime; ?></td>
														<td><b>Booking Category:</b> Private</td>
													</tr>
													<tr>
														<td><b>Visitor's ID Card Number:</b> <?php echo $id_number; ?></td>
														<td><b>ID Card:</b> <a href="ids/<?php echo $newfilename; ?>" target="_blank">Download</a></td>
													</tr>
													<tr>
														<td colspan="2"><b>Booking Reason:</b> <?php echo $reason; ?></td>
													</tr>
												</tbody>
											</table>
											<div class="row" style="margin-top:2%">
												<div class="col-lg-12">
													<div class="col-lg-5"></div>
														<div class="col-lg-2">
															<div class="form-group ">
															    
																<a href='system_track_guesthouse_application.php'><button type="button" class="btn btn-default">Check Old Booking(s)</button></a>
															</div>
														</div>
													<div class="col-lg-5">
													</div>
												</div>
											</div>
										</div>
										<?php } ?>
                                    </div>
                                </div>
                                <!-- /.row (nested) -->
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
