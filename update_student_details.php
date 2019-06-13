<?php
	include("session.php");
	error_reporting(E_ALL & ~(E_STRICT|E_NOTICE));
	ini_set("display_errors", 0);

	include("connect.php");
	
	$id = $login_session;
	
	$current_mob     = $_POST['current_mob'];
	$alt_mob     	 = $_POST['alt_mob'];
	$room_no         = $_POST['room_no'];
	$hostel          = $_POST['hostel'];
	$program		 = $_POST['program'];
	$department      = $_POST['department'];
	$roll_no         = $_POST['roll_no'];
	$name            = $_POST['name'];
	// For Profile Picture
	$imgFile = $_FILES['user_image']['name'];
	$tmp_dir = $_FILES['user_image']['tmp_name'];
	$imgSize = $_FILES['user_image']['size'];
	$upload_dir = 'images/'; // upload directory
	
	$user_activity   = "Updated student details of Webmail ID ".$id;
	$currentdatetime = mysql_query('select now()');
	$curdatetime     = mysql_result($currentdatetime, 0);
	$curYear         = date('Y');
	$error = "";
	$success = "";
	
	if (isset($_POST['Submit'])) {
		if ($current_mob == '' OR $alt_mob == '' OR $room_no == '' OR $hostel == '' OR $program == '' OR $department == '' OR $roll_no == '') {
			$error = "<font color='red'>All fields are required.</font>";
		}
		else {
			$success = "<font color='green'>Information successfully updated with the following details.</font>";
			mysql_query ("UPDATE studentinfo SET name = '$name', room_no = '$room_no', hostel = '$hostel', cellNo = '$current_mob', alt_phone = '$alt_mob', studentId = '$roll_no', program = '$program', department = '$department' WHERE webmail = '$id'");
			mysql_query("INSERT INTO user_activity VALUES ('','$login_session','$name','000','$user_activity','private','$curdatetime')");
			$message = "Dear ".$name."\r\n Your profile details have been successfully updated on CLS.\r\n Thanking You.\r\n Regards,\r\n Team SWC";
			$headers = "MIME-Version: 1.0" . "\r\n";
			$headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
			$headers .= 'From: SWC, IIT Guwahati <swc@iitg.ernet.in>' . "\r\n";
			$headers .= 'Cc: swc@iitg.ernet.in' . "\r\n";
			$user_webmail = $id."@iitg.ernet.in";
			mail($user_webmail , 'Profile details successfully updated on CLS' , $message , $headers);
		}
	}
	$query = "SELECT * FROM studentinfo WHERE webmail = '$id' ";
	$result = mysql_query($query);
	$row = mysql_fetch_array($result);
?>
			<link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
			<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
			<script>
			  $( function() {
				$( "#entrydate" ).datepicker({maxDate: "0D",dateFormat: "dd/mm/yy",showAnim: "slideDown" });
			  } );
			  $( function() {
				$( "#leavingdate" ).datepicker({maxDate: "0D",dateFormat: "dd/mm/yy",showAnim: "slideDown" });
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
                        <div class="panel panel-default">
                            <div class="panel-heading">
                               Update your information(s)
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
									else if($success != ''){
									?>
									  <div class="alert alert-success">
										<?php if(isset($success)) {											
											echo $success;
										?>
										<style>
											.ongoing{
												display: none;
											}
										</style>
										<?php
										} 
										?>
									  </div>
									<?php
									}
									else{
										//echo "";
									}
								?>
                                <div class="row">
                                    <div class="col-lg-12">
                                        <form role="form" name="form1" method="POST" enctype="multipart/form-data" action="">
											<div class="form-group col-md-4">
                                                <label>Webmail</label>
                                                <input class="form-control" value="<?php echo $id; ?>" readonly>
                                            </div>
                                            <div class="form-group col-md-4">
                                                <label class="required">Roll Number</label>
                                                <input class="form-control" name="roll_no" value="<?php echo $row["studentId"]; ?>">
                                            </div>
											<div class="form-group col-md-4">
                                                <label class="required">Name</label>
                                                <input class="form-control" type="text" name="name" value="<?php echo $row["name"]; ?>">
                                            </div>
                                            <div class="form-group col-md-4">
                                                <label class="required">Phone No.</label>
                                                <input class="form-control" type="text" name="current_mob" value="<?php echo $row["cellNo"]; ?>">
                                            </div>
                                            <div class="form-group col-md-4">
                                                <label class="required">Alt. Phone No.</label>
                                                <input class="form-control" type="text" name="alt_mob" value="<?php echo $row["alt_phone"]; ?>">
                                            </div>
                                            <div class="form-group col-md-4">
                                                <label class="required">Hostel</label>
                                                <input class="form-control" type="text" name="hostel" value="<?php echo $row["hostel"]; ?>">
                                            </div>
                                            <div class="form-group col-md-4">
                                                <label class="required">Room No.</label>
                                                <input class="form-control" type="text" name="room_no" value="<?php echo $row["room_no"]; ?>">
                                            </div>
                                            <div class="form-group col-md-4">
                                                <label class="required">Programme</label>
                                                <input class="form-control" type="text" name="program" value="<?php echo $row["program"]; ?>">
                                            </div>
                                            <div class="form-group col-md-4">
                                                <label class="required">Department</label>
                                                <input class="form-control" type="text" name="department" value="<?php echo $row["department"]; ?>">
                                            </div>
											<div class="form-group col-md-12">
												<button type="submit" name="Submit" class="btn btn-default ongoing">Submit</button>
												<?php if($success !=''){?>
													<a href='system_update_student_details.php?stud_id=<?php echo $id; ?>'><button type="button" class="btn btn-default">Edit Again</button></a>
												<?php } ?>
												<a href='system.php'><button type="button" class="btn btn-default">Back</button></a>
											</div>
                                        </form>
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