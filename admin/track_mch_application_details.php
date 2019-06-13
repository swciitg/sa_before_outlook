<?php 
	include("session.php");
	include("connect.php");
	error_reporting(0);
	
	$currentdatetime = mysql_query('select now()');
	$curdatetime     = mysql_result($currentdatetime, 0);
	$id = $_GET['track'];
	$query = "SELECT * FROM mch_booking WHERE application_no = '$id'";
	$result = mysql_query($query);
	$row_track = mysql_fetch_array($result);
	$applicant = $row_track["name"];
	$applicant_webmail = $row_track["webmail"];
	$mch_application_no = $row_track["application_no"];
	$comment_sa = 'Comment: '.$_POST['comment_sa'];
	$comment_adosa_2 = 'Comment: '.$_POST['comment_adosa_2'];
	$comment_adosa_1 = 'Comment: '.$_POST['comment_adosa_1'];
	$comment_hossa = 'Comment: '.$_POST['comment_hossa'];
	$comment_dosa = 'Comment: '.$_POST['comment_dosa'];
	//$comment_est = $_POST['comment_est'];
	//$allotted_room = $_POST['allotted_room'];
//	$category_recommended = $_POST['category_recommended'];
//    $dosa = $_POST['dosa'];
//	$adosa_1 = $_POST['adosa_1'];
//	$adosa_2 = $_POST['adosa_2'];
	$error = "";
	$success = "";
	if (isset($_POST['Submit_sa'])) {
		if($comment_sa ==''){
			$error = "Comment field is empty";
		}
		else {
			mysql_query("INSERT INTO mch_movement VALUES ('','$id','$current_location','$name','$comment_sa','$curdatetime')");
			mysql_query ("UPDATE mch_booking SET comment_saoff ='$comment_sa' WHERE application_no = '$id'");
			$comment_success="Comment successfully saved.";
			$message = "Dear ".$applicant."\r\n A comment has been added by SA Office to your MCH booking request (Application No. ".$id."). \r\n Comment: ".$comment_sa."\r\n Latest status can be tracked via CLS.\r\n Thanking You.\r\n Regards,\r\n Team SWC";
			$headers = "MIME-Version: 1.0" . "\r\n";
			$headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
			$headers .= 'From: SWC, IIT Guwahati <swc@iitg.ernet.in>' . "\r\n";
			//$headers .= 'Cc: swc@iitg.ernet.in, saoff@iitg.ernet.in, hossa@iitg.ernet.in' . "\r\n";
			$user_webmail = $applicant_webmail."@iitg.ernet.in";
			//mail($user_webmail , 'Comment by SA Office on your MCH booking request' , $message , $headers);
		}
	}
	if (isset($_POST['Submit_hossa'])) {
		if($comment_hossa ==''){
			$error = "Comment field is empty";
		}
		else {
			mysql_query("INSERT INTO mch_movement VALUES ('','$id','$current_location','$name','$comment_hossa','$curdatetime')");
			mysql_query ("UPDATE mch_booking SET comment_hossa ='$comment_hossa' WHERE application_no = '$id'");
			$comment_success ="Comment successfully saved.";
			$message = "Dear ".$applicant."\r\n A comment has been added by HoSSA to your MCH booking request (Application No. ".$id."). \r\n Comment: ".$comment_hossa."\r\n Latest status can be tracked via CLS.\r\n Thanking You.\r\n Regards,\r\n Team SWC";
			$headers = "MIME-Version: 1.0" . "\r\n";
			$headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
			$headers .= 'From: SWC, IIT Guwahati <swc@iitg.ernet.in>' . "\r\n";
			//$headers .= 'Cc: swc@iitg.ernet.in, saoff@iitg.ernet.in, hossa@iitg.ernet.in' . "\r\n";
			$user_webmail = $applicant_webmail."@iitg.ernet.in";
			//mail($user_webmail , 'Comment by HoSSA on your MCH Booking request' , $message , $headers);
		}
	} 
	if (isset($_POST['Submit_adosa_1'])) {
		if($comment_adosa_1 ==''){
			$error = "Comment field is empty";
		}
		else {
			mysql_query("INSERT INTO mch_movement VALUES ('','$id','$current_location','$name','$comment_adosa_1','$curdatetime')");
			mysql_query ("UPDATE mch_booking SET comment_dean ='$comment_adosa_1' WHERE application_no = '$id'");
			$comment_success ="Comment successfully saved.";
			$message = "Dear ".$applicant."\r\n A comment has been added by HoSSA to your MCH booking request (Application No. ".$id."). \r\n Comment: ".$comment_hossa."\r\n Latest status can be tracked via CLS.\r\n Thanking You.\r\n Regards,\r\n Team SWC";
			$headers = "MIME-Version: 1.0" . "\r\n";
			$headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
			$headers .= 'From: SWC, IIT Guwahati <swc@iitg.ernet.in>' . "\r\n";
			//$headers .= 'Cc: swc@iitg.ernet.in, saoff@iitg.ernet.in, hossa@iitg.ernet.in' . "\r\n";
			$user_webmail = $applicant_webmail."@iitg.ernet.in";
			//mail($user_webmail , 'Comment by HoSSA on your MCH Booking request' , $message , $headers);
		}
	}
	if (isset($_POST['Submit_adosa_2'])) {
		if($comment_adosa_2==''){
			$error = "Comment field is empty";
		}
		else {
			mysql_query("INSERT INTO mch_movement VALUES ('','$id','$current_location','$name','$comment_adosa_2','$curdatetime')");
			mysql_query ("UPDATE mch_booking SET comment_dean ='$comment_adosa_2' WHERE application_no = '$id'");
			$comment_success ="Comment successfully saved.";
			$message = "Dear ".$applicant."\r\n A comment has been added by HoSSA to your MCH booking request (Application No. ".$id."). \r\n Comment: ".$comment_hossa."\r\n Latest status can be tracked via CLS.\r\n Thanking You.\r\n Regards,\r\n Team SWC";
			$headers = "MIME-Version: 1.0" . "\r\n";
			$headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
			$headers .= 'From: SWC, IIT Guwahati <swc@iitg.ernet.in>' . "\r\n";
			//$headers .= 'Cc: swc@iitg.ernet.in, saoff@iitg.ernet.in, hossa@iitg.ernet.in' . "\r\n";
			$user_webmail = $applicant_webmail."@iitg.ernet.in";
			//mail($user_webmail , 'Comment by HoSSA on your MCH Booking request' , $message , $headers);
		}
	}
	if (isset($_POST['Submit_dosa'])) {
		if($comment_dosa ==''){
			$error = "Comment field is empty";
		}
		else {
			mysql_query("INSERT INTO mch_movement VALUES ('','$id','$current_location','$name','$comment_dosa','$curdatetime')");
			mysql_query ("UPDATE mch_booking SET comment_dean ='$comment_dosa' WHERE application_no = '$id'");
			$comment_success ="Comment successfully saved.";
			$message = "Dear ".$applicant."\r\n A comment has been added by HoSSA to your MCH booking request (Application No. ".$id."). \r\n Comment: ".$comment_hossa."\r\n Latest status can be tracked via CLS.\r\n Thanking You.\r\n Regards,\r\n Team SWC";
			$headers = "MIME-Version: 1.0" . "\r\n";
			$headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
			$headers .= 'From: SWC, IIT Guwahati <swc@iitg.ernet.in>' . "\r\n";
			//$headers .= 'Cc: swc@iitg.ernet.in, saoff@iitg.ernet.in, hossa@iitg.ernet.in' . "\r\n";
			$user_webmail = $applicant_webmail."@iitg.ernet.in";
			//mail($user_webmail , 'Comment by HoSSA on your MCH Booking request' , $message , $headers);
		}
	}


	if (isset($_POST['Approve'])) {
		if ($login_session == 'adosa_1'){
			$approve_success = "Application Approved by adosa_1";
			mysql_query ("UPDATE mch_booking SET approve_dean='yes' WHERE application_no = '$id'");
			mysql_query ("UPDATE mch_booking SET status='Approved' WHERE application_no = '$id'");
			mysql_query("INSERT INTO mch_movement VALUES ('','$id','$current_location','$name','Approved by adosa_1','$curdatetime')");
			$message = "Dear ".$applicant."\r\n Your MCH booking request (Application No. ".$id.") has been approved by ADOSA1.For further procedure visit Student Affairs Office. \r\n Latest status can be tracked via CLS.\r\n Thanking You.\r\n Regards,\r\n Team SWC";
			$headers = "MIME-Version: 1.0" . "\r\n";
			$headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
			$headers .= 'From: SWC, IIT Guwahati <swc@iitg.ernet.in>' . "\r\n";
			//$headers .= 'Cc: swc@iitg.ernet.in, saoff@iitg.ernet.in, hossa@iitg.ernet.in' . "\r\n";
			$user_webmail = $applicant_webmail."@iitg.ernet.in";
			mail($user_webmail , 'MCH booking application approved by ADOSA1' , $message , $headers);
	    }
		
		else if ($login_session == 'adosa_2'){
			$approve_success = "Appplication Approved by adosa_2";
			mysql_query ("UPDATE mch_booking SET approve_dean='yes' WHERE application_no = '$id'");
			mysql_query ("UPDATE mch_booking SET status='Approved' WHERE application_no = '$id'");
			mysql_query("INSERT INTO mch_movement VALUES ('','$id','$current_location','$name','Approved by adosa_2','$curdatetime')");
			$message = "Dear ".$applicant."\r\n Your MCH booking request (Application No. ".$id.") has been approved by ADOSA2.For further procedure visit Student Affairs Office. \r\n Latest status can be tracked via CLS.\r\n Thanking You.\r\n Regards,\r\n Team SWC";
			$headers = "MIME-Version: 1.0" . "\r\n";
			$headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
			$headers .= 'From: SWC, IIT Guwahati <swc@iitg.ernet.in>' . "\r\n";
			//$headers .= 'Cc: swc@iitg.ernet.in, saoff@iitg.ernet.in, hossa@iitg.ernet.in' . "\r\n";
			$user_webmail = $applicant_webmail."@iitg.ernet.in";
			mail($user_webmail , 'MCH booking application approved by ADOSA2' , $message , $headers);
	    }
		else if ($login_session == 'dos'){
			$approve_success = "Application approved by dosa";
			mysql_query ("UPDATE mch_booking SET approve_dean='yes'  WHERE application_no = '$id'");
			mysql_query ("UPDATE mch_booking SET status='Approved' WHERE application_no = '$id'");
			mysql_query("INSERT INTO mch_movement VALUES ('','$id','$current_location','$name','Approved by Dosa','$curdatetime')");
			$message = "Dear ".$applicant."\r\n Your MCH booking request (Application No. ".$id.") has been approved by DOSA.For further procedure visit Student Affairs Office. \r\n Latest status can be tracked via CLS.\r\n Thanking You.\r\n Regards,\r\n Team SWC";
			$headers = "MIME-Version: 1.0" . "\r\n";
			$headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
			$headers .= 'From: SWC, IIT Guwahati <swc@iitg.ernet.in>' . "\r\n";
			//$headers .= 'Cc: swc@iitg.ernet.in, saoff@iitg.ernet.in, hossa@iitg.ernet.in' . "\r\n";
			$user_webmail = $applicant_webmail."@iitg.ernet.in";
			mail($user_webmail , 'MCH booking application approved by DOSA' , $message , $headers);
	    }
		else{
			$approve_success = "Details Verified and Forwarded to HoSSA.";
			mysql_query ("UPDATE mch_booking SET approve_saoff='yes',reach_hossa='yes' WHERE application_no = '$id'");
			mysql_query ("UPDATE mch_booking SET status='Approved by SA Office and forwarded to HoSSA.' WHERE application_no = '$id'");
			mysql_query("INSERT INTO mch_movement VALUES ('','$id','$current_location','$name','Approved and Forwarded to HoSSA','$curdatetime')");
			$message = "Dear ".$applicant."\r\n Your MCH booking request (Application No. ".$id.") has been approved by SA Office and forwarded to HoSSA for further approval. \r\n Latest status can be tracked via CLS.\r\n Thanking You.\r\n Regards,\r\n Team SWC";
			$headers = "MIME-Version: 1.0" . "\r\n";
			$headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
			$headers .= 'From: SWC, IIT Guwahati <swc@iitg.ernet.in>' . "\r\n";
			//$headers .= 'Cc: swc@iitg.ernet.in, saoff@iitg.ernet.in, hossa@iitg.ernet.in' . "\r\n";
			$user_webmail = $applicant_webmail."@iitg.ernet.in";
			//mail($user_webmail , 'MCH booking application forwarded to HoSSA' , $message , $headers);
	    }
	}
	if (isset($_POST['Reject']) AND ($login_session != 'adosa_1' OR $login_session != 'adosa_2' OR $login_session != 'dos')) {
		if($login_session == 'hossa'){
			$reject_success = "Rejected.";
			mysql_query ("UPDATE mch_booking SET reject_hossa='yes' WHERE application_no = '$id'");
			mysql_query ("UPDATE mch_booking SET status='Rejected by HoSSA.' WHERE application_no = '$id'");
			mysql_query("INSERT INTO mch_movement VALUES ('','$id','$current_location','$name','Rejected by HoSSA','$curdatetime')");
			$message = "Dear ".$applicant."\r\n Your MCH booking request (Application No. ".$id.") has been rejected by HoSSA. \r\n Latest status can be tracked via CLS.\r\n Thanking You.\r\n Regards,\r\n Team SWC";
			$headers = "MIME-Version: 1.0" . "\r\n";
			$headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
			$headers .= 'From: SWC, IIT Guwahati <swc@iitg.ernet.in>' . "\r\n";
			//$headers .= 'Cc: swc@iitg.ernet.in, saoff@iitg.ernet.in, hossa@iitg.ernet.in' . "\r\n";
			$user_webmail = $applicant_webmail."@iitg.ernet.in";
			mail($user_webmail , 'MCH Booking application rejected by HoSSA' , $message , $headers);
		}

		else{
			$reject_success = "Rejected.";
			mysql_query ("UPDATE mch_booking SET reject_saoff='yes' WHERE application_no = '$id'");
			mysql_query ("UPDATE mch_booking SET status='Rejected by Students Affairs Office.' WHERE application_no = '$id'");
			mysql_query("INSERT INTO mch_movement VALUES ('','$id','$current_location','$name','Rejected by Students Affairs Office','$curdatetime')");
			$message = "Dear ".$applicant."\r\n Your MCH booking request (Application No. ".$id.") has been rejected by SA Office. \r\n Latest status can be tracked via CLS.\r\n Thanking You.\r\n Regards,\r\n Team SWC";
			$headers = "MIME-Version: 1.0" . "\r\n";
			$headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
			$headers .= 'From: SWC, IIT Guwahati <swc@iitg.ernet.in>' . "\r\n";
			//$headers .= 'Cc: swc@iitg.ernet.in, saoff@iitg.ernet.in' . "\r\n";
			$user_webmail = $applicant_webmail."@iitg.ernet.in";
			mail($user_webmail , 'MCH Booking application rejected by SA Office' , $message , $headers);
		}
	}
	if (isset($_POST['Reject']) AND ($login_session == 'adosa_1' OR $login_session == 'adosa_2' OR $login_session == 'dos')) {
		$reject_success = "Rejected.";
		mysql_query ("UPDATE mch_booking SET reject_dean='yes' WHERE application_no = '$id'");
		mysql_query ("UPDATE mch_booking SET status='Rejectd by Dean.' WHERE application_no = '$id'");
		mysql_query("INSERT INTO mch_movement VALUES ('','$id','$current_location','$name','Rejected by Dean','$curdatetime')");
		$message = "Dear ".$applicant."\r\n Your MCH booking request (Application No. ".$id.") has been rejected by DEAN. \r\n Latest status can be tracked via CLS.\r\n Thanking You.\r\n Regards,\r\n Team SWC";
			$headers = "MIME-Version: 1.0" . "\r\n";
			$headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
			$headers .= 'From: SWC, IIT Guwahati <swc@iitg.ernet.in>' . "\r\n";
			//$headers .= 'Cc: swc@iitg.ernet.in, saoff@iitg.ernet.in, hossa@iitg.ernet.in, adosa_1@iitg.ernet.in, guesthouse@iitg.ernet.in' . "\r\n";
			$user_webmail = $applicant_webmail."@iitg.ernet.in";
			mail($user_webmail , 'MCH Booking application rejected by Adosa1' , $message , $headers);
	}
	

	if(isset($_POST['dosa']) AND $login_session == 'hossa'){
		$approve_success = "Application Forwarded to Dosa.";
		mysql_query ("UPDATE mch_booking SET reach_dean='yes' WHERE application_no = '$id'");
		mysql_query ("UPDATE mch_booking SET status='Approved by Hossa and forwarded to Dosa.' WHERE application_no = '$id'");
		mysql_query ("UPDATE mch_booking SET dean='dosa' WHERE application_no = '$id'");
		mysql_query ("UPDATE mch_booking SET approve_hossa='yes' WHERE application_no = '$id'");
		mysql_query("INSERT INTO mch_movement VALUES ('','$id','$current_location','$name','Approved by Hossa and forwarded to Dosa','$curdatetime')");
	}
	if(isset($_POST['adosa_1']) AND $login_session == 'hossa'){
		$approve_success = "Application Forwarded to Adosa_1.";
		mysql_query ("UPDATE mch_booking SET reach_dean='yes' WHERE application_no = '$id'");
		mysql_query ("UPDATE mch_booking SET status='Approved by Hossa and forwarded to Adosa_1.' WHERE application_no = '$id'");
		mysql_query ("UPDATE mch_booking SET dean='adosa_1' WHERE application_no = '$id'");
		mysql_query ("UPDATE mch_booking SET approve_hossa='yes' WHERE application_no = '$id'");
		mysql_query("INSERT INTO mch_movement VALUES ('','$id','$current_location','$name','Approved by Hossa and forwarded to Adosa_1','$curdatetime')");
	}
	if(isset($_POST['adosa_2']) AND $login_session == 'hossa'){
		$approve_success = "Application Forwarded to Adosa_2.";
		mysql_query ("UPDATE mch_booking SET reach_dean='yes' WHERE application_no = '$id'");
		mysql_query ("UPDATE mch_booking SET status='Approved by Hossa and forwarded to Adosa_2.' WHERE application_no = '$id'");	
		mysql_query ("UPDATE mch_booking SET approve_hossa='yes' WHERE application_no = '$id'");
		mysql_query ("UPDATE mch_booking SET dean='adosa_2' WHERE application_no = '$id'");
		mysql_query("INSERT INTO mch_movement VALUES ('','$id','$current_location','$name','Approved by Hossa and forwarded to Adosa_2.','$curdatetime')");
	}
	

?>
			<div id="page-wrapper">
                <!-- /.row -->
                <div class="row">
                    <div class="col-lg-12">
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                Manas Community Hall Booking Application No.: <b><?php echo $id; ?></b>
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
									else if($comment_success != ''){
									?>
									  <div class="alert alert-success">
										<?php if(isset($comment_success)) {											
											echo $comment_success;
										} 
										?>
									  </div>
									<?php
									}
									else if($approve_success != ''){
									?>
									  <div class="alert alert-success">
										<?php if(isset($approve_success)) {										
											echo $approve_success;
										} 
										?>
									  </div>
									  <style>
									  .before_approve{
										  display:none;
									  }
									  .hide_approve{
										  display:none;
									  }
									  .hide_reject{
										  display:none;
									  }
									  </style>
									<?php
									}
									else if($reject_success != ''){
									?>
									  <div class="alert alert-warning">
										<?php if(isset($reject_success)) {										
											echo $reject_success;
										} 
										?>
									  </div>
									  <style>
									  .before_approve{
										  display:none;
									  }
									  .hide_approve{
										  display:none;
									  }
									  .hide_reject{
										  display:none;
									  }
									  </style>
									<?php
									}
									else{
										//echo "";
									}
								?>
								<div class="table-responsive">
                                    <table class="table table-striped table-bordered table-hover">
                                        <tbody>
                                            <tr>
                                                <td><b>Application No.:</b> <?php echo $row_track["application_no"]; ?></td>
                                                <td><b style="color:#d3b62a;">Current Status:</b> <?php if($row_track["status"] == "Approved"){echo "<span style='color:green;'>MCH booking application Approved.</span>";} else{echo $row_track["status"];} ?></td>
                                                
                                            </tr>
                                            <tr>
                                                <td><b>Booking Reason:</b> <?php echo $row_track["booking_reason"]; ?></td>
                                                <td><b>No. of Day(s):</b> <?php echo $row_track["no_days"]; ?></td>
                                            </tr>
                                            <tr>
                                                <td><b>Booking From:</b> <?php echo $row_track["date_from"]; ?></td>
												<td><b>Booking Upto:</b> <?php echo $row_track["date_to"]; ?></td>
                                            </tr>
											 <tr>
                                                <td><b>Time From:</b> <?php echo $row_track["from_time"]; ?></td>
												<td><b>Time Upto:</b> <?php echo $row_track["to_time"]; ?></td>
                                            </tr>
                                            <tr>
                                                <td><b>Booking By:</b> <?php echo $row_track["name"]; ?></td>
                                                <td><b>Applicant Roll No.:</b> <?php echo $row_track["roll_no"]; ?></td>
                                            </tr>
                                            <tr>
                                                <td><b>Applicant Webmail:</b> <?php echo $row_track["webmail"]; ?></td>
                                                <td><b>Applicant Hostel:</b> <?php echo $row_track["hostel"]; ?></td>
                                            </tr>
                                            <tr>
                                                <td><b>Applicant Room No.:</b> <?php echo $row_track["room"]; ?></td>
                                                <td><b>Applicant Department:</b> <?php echo $row_track["department"] ; ?></td>
                                            </tr>
											<tr>
                                                <td><b>Hall Type:</b> <?php echo $row_track["hall_type"]; ?></td>
                                                <td><b>Applicant Course:</b> <?php echo $row_track["course"]; ?></td>
                                            </tr>
											<tr>
                                                <td><b>Booking Time:</b> <?php echo $row_track["booking_time"]; ?></td>
                                                <td><b>Students' Phone No.:</b> <?php echo $row_track["phone"]; ?></td>
                                            </tr>
											<tr>
                                                
                                                <td><b>Permission Letter:</b> <a href="../mch/permission/<?php echo $row_track["permission"]; ?>" target="_blank"> Download</a></td>
						<td></td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
								<div class="dataTable_wrapper">
                                    <table class="table table-striped table-bordered table-hover" id="">
										<thead>
											<tr> 
											  <th valign="top" bgcolor="#dedede"> <font>Date and Time</font></th>
											  <th valign="top" bgcolor="#dedede"> <font>File Location</font></th>
											  <th valign="top" bgcolor="#dedede"> <font>Responsible Person</font></th>
											  <th valign="top" bgcolor="#dedede"> <font>Comment</font></th>
											</tr>
										</thead>
										<tbody>
										<?php
											$query3 = "SELECT * FROM mch_movement WHERE filesNo = '$id'";
											$result3 = mysql_query($query3);
												while($m_row = mysql_fetch_array($result3)){
												
														$m_location = $m_row[2];
														$m_responsible = $m_row[3];
														$m_comment = $m_row[4];
														$m_datetime = $m_row[5];
														echo "<tr class='odd'>";
														
														echo "<td><font size='2' color = 'red'><b>$m_datetime</b>";	
														echo "<td><font size='2'>$m_location";		
														echo "<td><font size='2'>$m_responsible";	
														echo "<td><font size='2'>$m_comment";		
														echo "</tr>";
														}
											?>
										</tbody>
                                    </table>
                                </div>
                                <!-- /.table-responsive -->
								
								<?php if($row_track["status"] == "Approved"){ ?>
									
								<?php } 
								else if($row_track["approve_saoff"] == "yes" AND ($login_session != 'hossa' AND $login_session != 'adosa_1' AND $login_session != 'dos' AND $login_session != 'adosa_2')) {?>
									<button type="button" class="btn btn-success disabled">Verified</button>
								<?php
								} 
								else if($row_track["approve_hossa"] == "yes" AND ($login_session == 'hossa')) {?>
									<button type="button" class="btn btn-success disabled">Verified</button>
									
								
								<?php
								}
								else if($row_track["reject_saoff"] == "yes" OR $row_track["reject_hossa"] == "yes" OR $row_track["reject_dean"] == "yes" ){?>
									<button type="button" class="btn btn-danger disabled">Rejected</button>
								<?php
								}
		   		            	else{ 
								if($login_session == 'adosa_1' AND $row_track["dean"] == "adosa_1" AND $row_track["reach_dean"] == "yes"){ ?>
								<form action="" accept-charset="utf-8" method="post">
									<button type="submit" class="btn btn-success hide_approve" name="Approve">Approve</button>
									<button type="submit" class="btn btn-danger hide_reject" name="Reject">Reject</button>
								</form>
									<form name="gh" style="margin-top:2%" class="before_approve" action=""  accept-charset="utf-8" method="post" enctype="multipart/form-data">
											<div class="row">
												<div class="col-lg-12" style="padding-left:0px;" >
													<div class="col-lg-6">
														<div class="form-group">
															<label>Add/Update Comment (if any)</label>
															<input type="text" class="form-control" name="comment_adosa_1">
														</div>
													</div>
												</div>
											</div>
											<div class="row">
												<div class="col-lg-12" style="padding-left:0px;" >
													<div class="col-lg-12">
														<div class="form-group ">
															<button type="submit" class="btn btn-primary" name="Submit_adosa_1" >Submit</button>
														</div>
													</div>
												</div>
											</div>
										<!--	<button type="submit" class="btn btn-success hide_approve" name="fullapprove">Approve</button> -->
									</form>
								<?php } 
								else if($login_session == 'adosa_2' AND $row_track["dean"] == "adosa_2" AND $row_track["reach_dean"] == "yes"){ ?>
								<form action="" accept-charset="utf-8" method="post">
									<button type="submit" class="btn btn-success hide_approve" name="Approve">Approve</button>
									<button type="submit" class="btn btn-danger hide_reject" name="Reject">Reject</button>
								</form>
									<form name="gh" style="margin-top:2%" class="before_approve" action=""  accept-charset="utf-8" method="post" enctype="multipart/form-data">
											<div class="row">
												<div class="col-lg-12" style="padding-left:0px;" >
													<div class="col-lg-6">
														<div class="form-group">
															<label>Add/Update Comment (optional)</label>
															<textarea type="text" class="form-control" name="comment_adosa_2"></textarea>
														</div>
													</div>
												</div>
											</div>
											<div class="row">
												<div class="col-lg-12" style="padding-left:0px;" >
													<div class="col-lg-12">
														<div class="form-group ">
															<button type="submit" class="btn btn-primary" name="Submit_adosa_2" >Add Comment</button>
														</div>
													</div>
												</div>
											</div>
									</form>
								<?php }
								else if($login_session == 'dos' AND $row_track["dean"] == "dosa" AND $row_track["reach_dean"] == "yes"){ ?>
								<form action="" accept-charset="utf-8" method="post">
									<button type="submit" class="btn btn-success hide_approve" name="Approve">Approve</button>
									<button type="submit" class="btn btn-danger hide_reject" name="Reject">Reject</button>
								</form>
									<form name="gh" style="margin-top:2%" class="before_approve" action=""  accept-charset="utf-8" method="post" enctype="multipart/form-data">
											<div class="row">
												<div class="col-lg-12" style="padding-left:0px;" >
													<div class="col-lg-6">
														<div class="form-group">
															<label>Add/Update Comment (optional)</label>
															<textarea type="text" class="form-control" name="comment_dosa"></textarea>
														</div>
													</div>
												</div>
											</div>
											<div class="row">
												<div class="col-lg-12" style="padding-left:0px;" >
													<div class="col-lg-12">
														<div class="form-group ">
															<button type="submit" class="btn btn-primary" name="Submit_dosa" >Add Comment</button>
														</div>
													</div>
												</div>
											</div>
									</form>
								<?php }
								else if($login_session == 'hossa' AND $row_track["reach_hossa"] == "yes"){ ?>
								<form action="" accept-charset="utf-8" method="post">
									<button type="submit" class="btn btn-success hide_approve" name="dosa">Verify and Forward to Dosa</button>
									<button type="submit" class="btn btn-danger hide_reject" name="adosa_1">Verify and Forward to adosa_1</button>
									<button type="submit" class="btn btn-success hide_approve " name="adosa_2">Verify and Forward to adosa_2</button>
									<button type="submit" class="btn btn-danger hide_reject" name="Reject">Reject</button>
								</form>
									<form name="gh" style="margin-top:2%" class="before_approve" action=""  accept-charset="utf-8" method="post" enctype="multipart/form-data">
											<div class="row">
												<div class="col-lg-12" style="padding-left:0px;" >
													<div class="col-lg-6">
														<div class="form-group">
															<label>Add/Update Comment (optional)</label>
															<textarea type="text" class="form-control" name="comment_hossa"></textarea>
														</div>
													</div>
												</div>
											</div>
											<div class="row">
												<div class="col-lg-12" style="padding-left:0px;" >
													<div class="col-lg-12">
														<div class="form-group ">
															<button type="submit" class="btn btn-primary" name="Submit_hossa" >Add Comment</button>
														</div>
													</div>
												</div>
											</div>
									</form>
								<?php }else { ?>
								 <form action="" accept-charset="utf-8" method="post">
									<button type="submit" class="btn btn-success hide_approve" name="Approve">Verify and Forward to Hossa</button>
									<button type="submit" class="btn btn-danger hide_reject" name="Reject">Reject</button>
								</form>
									<form name="gh" style="margin-top:2%" class="before_approve" action=""  accept-charset="utf-8" method="post" enctype="multipart/form-data">
											<div class="row">
												<div class="col-lg-12" style="padding-left:0px;" >
													<div class="col-lg-6">
														<div class="form-group">
															<label>Add/Update Comment (optional)</label>
															<textarea type="text" class="form-control" name="comment_sa"></textarea>
														</div>
													</div>
												</div>
											</div>
											<div class="row">
												<div class="col-lg-12" style="padding-left:0px;" >
													<div class="col-lg-12">
														<div class="form-group ">
															<button type="submit" class="btn btn-primary" name="Submit_sa" >Add Comment</button>
														</div>
													</div>
												</div>
											</div>
									</form> 
								 
								<?php } } ?> 
								
							</div>
                            <!-- /.panel-body -->
                        </div>
                        <!-- /.panel -->
                    </div>
                    <!-- /.col-lg-12 -->
                </div>
            </div>
            <!-- /#page-wrapper -->
 
