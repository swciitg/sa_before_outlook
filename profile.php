<?php 
	include("session.php");
	error_reporting(E_ALL & ~(E_STRICT|E_NOTICE));
	ini_set("display_errors", 0);

	include("connect.php");
	$error = "";
	$success = "";
	
	$id = $login_session;
	
	// For Profile Picture
	$imgFile = $_FILES['user_image']['name'];
	$tmp_dir = $_FILES['user_image']['tmp_name'];
	$imgSize = $_FILES['user_image']['size'];
	$upload_dir = 'images/'; // upload directory
	$currentdatetime = mysql_query('select now()');
	$curdatetime     = mysql_result($currentdatetime, 0);
	if (isset($_POST['Submit'])) {
		if(empty($imgFile)){
			$error = "Please select a Profile Pic to update.";
		}
		else if($error ==''){
			mysql_query ("UPDATE studentinfo SET pic ='$imgFile' WHERE webmail = '$login_session'");
			move_uploaded_file($tmp_dir,$upload_dir.$imgFile);
			mysql_query("INSERT INTO user_activity VALUES ('','$login_session','$name','$current_dept','Profile Pic changed','private','$curdatetime')");
			$success = "Profile Pic successfully updated!";
			$message = "Dear ".$name."\r\n Your profile pic has been successfully updated on CLS.\r\n Thanking You.\r\n Regards,\r\n Team SWC";
			$headers = "MIME-Version: 1.0" . "\r\n";
			$headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
			$headers .= 'From: SWC, IIT Guwahati <swc@iitg.ernet.in>' . "\r\n";
			$headers .= 'Cc: swc@iitg.ernet.in' . "\r\n";
			$user_webmail = $id."@iitg.ernet.in";
			mail($user_webmail , 'Profile Pic successfully updated on CLS' , $message , $headers);
		}
	}
	
	// For Password Change
	$old_pass  			 = $_POST['old_pass'];
	$new_pass  			 = $_POST['new_pass'];
	$confirm_new_pass	 = $_POST['confirm_new_pass'];
	
	if (isset($_POST['SubmitPassword'])) {
		if($old_pass == '' OR $new_pass == '' OR $confirm_new_pass == ''){
			$error = "Enter all fields while changing password.";
		}
		else if($old_pass != $user_password){
			$error = "Current password is incorrect.";
		}
		else if($new_pass != $confirm_new_pass){
			$error = "Confirm password is not same as New Password.";
		}
		else{
			mysql_query ("UPDATE cls_users SET password ='$new_pass' WHERE username = '$login_session'");
			mysql_query("INSERT INTO user_activity VALUES ('','$login_session','$name','$current_dept','Password Changed','private','$curdatetime')");
			$success = "Password successfully changed!";
		}
	}
?>
			<div id="page-wrapper">
                <!-- /.row -->
                <div class="row">
                    <div class="col-lg-12">
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                <b><?php echo $name; ?></b>
                            </div>
							<div class="panel-body">
								<?php 
									if($error != ''){
									?>
									  <div class="alert alert-warning" style="color:red">
										<?php if(isset($error)) { echo $error; }?>
									  </div>
									<?php
									} else if($success != ''){
									?>
									  <div class="alert alert-success" style="color:green">
										<?php if(isset($success)) { echo $success; }?>
									  </div>
									<?php
									}
								?>
								<div class="table-responsive">
                                    <table class="table table-striped table-bordered table-hover">
                                        <tbody>
										<?php
											include("connect.php");
											$query = "SELECT * FROM studentinfo WHERE webmail = '$login_session'";
											$result = mysql_query($query);
											$row_track = mysql_fetch_array($result);
										?>
                                            <tr>
                                                <td rowspan="4" style="text-align:center"><img src="images/<?php echo $row_track["pic"]; ?>" width="150" height="150" style="border-radius:80px;"></td>
                                                <td><b>Webmail:</b> <?php echo $login_session; ?></td>
                                                
                                            </tr>
                                            <tr>
                                                <td><b>Phone Number:</b> <?php echo $row_track["cellNo"]; ?></td>
                                            </tr>
                                            <tr>
                                                <td><b>Alternate Phone:</b> <?php echo $row_track["alt_phone"]; ?></td>
                                            </tr>
                                            <tr>
                                                <td><b>Department:</b> <?php echo $row_track["department"]; ?></td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                                <!-- /.table-responsive -->
								<a style="color:white;text-decoration:none;" data-toggle="modal" data-target="#myPicModal"><button type="button" class="btn btn-primary">Change Profile Pic</button></a>
								<!--<a style="color:white;text-decoration:none;" data-toggle="modal" data-target="#myPasswordModal"><button type="button" class="btn btn-primary">Change Password</button></a>-->
								<!-- Profile Pic Modal -->
                                <div class="modal fade" id="myPicModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                                <h4 class="modal-title" id="myModalLabel">Change Profile Pic</h4>
                                            </div>
                                            <div class="modal-body">
                                                <form role="form" enctype="multipart/form-data" name="form1" method="POST" action="">
													<div class="form-group col-md-12">
														<label>Choose a New Pic</label>
														<input type="file" name="user_image" accept="image/*">
													</div>
													<div class="form-group col-md-12">
														<button type="submit" name="Submit" class="btn btn-primary">Submit</button>
													</div>
												</form>
                                            </div>
											<div class="modal-footer" style="border:0px;">
                                            </div>
                                        </div>
                                        <!-- /.modal-content -->
                                    </div>
                                    <!-- /.modal-dialog -->
                                </div>
                                <!-- /.Profile Pic modal End -->
								<!-- Password Modal -->
                                <div class="modal fade" id="myPasswordModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                                <h4 class="modal-title" id="myModalLabel">Change Password</h4>
                                            </div>
                                            <div class="modal-body">
                                                <form role="form" name="form" method="POST" action="">
													<div class="form-group col-md-12">
														<label>Current Password</label>
														<input class="form-control" type="text" name="old_pass">
													</div>
													<div class="form-group col-md-12">
														<label>New Password</label>
														<input class="form-control" type="text" name="new_pass">
													</div>
													<div class="form-group col-md-12">
														<label>Confirm New Password</label>
														<input class="form-control" type="text" name="confirm_new_pass">
													</div>
													<div class="form-group col-md-12">
														<button type="submit" name="SubmitPassword" class="btn btn-primary">Submit</button>
													</div>
												</form>
                                            </div>
											<div class="modal-footer" style="border:0px;">
                                            </div>
                                        </div>
                                        <!-- /.modal-content -->
                                    </div>
                                    <!-- /.modal-dialog -->
                                </div>
                                <!-- /.Password modal end -->
							</div>
                            <!-- /.panel-body -->
                        </div>
                        <!-- /.panel -->
                    </div>
                    <!-- /.col-lg-12 -->
                </div>
            </div>
            <!-- /#page-wrapper -->
 