<?php 
	include("session.php");
	include("connect.php");
	error_reporting(0);
	
	$currentdatetime = mysql_query('select now()');
	$curdatetime     = mysql_result($currentdatetime, 0);
	$id = $_GET['track'];
	$query = "SELECT * FROM railway_concession_1 WHERE application_no = '$id'";
	$result = mysql_query($query);
	$row_track = mysql_fetch_array($result);
	$applicant = $row_track["stud_name"];
	$application_no = $row_track["application_no"];
	$applicant_webmail = $row_track["webmail"];
	$comment_sa = $_POST['comment_sa'];
	$ref_no = $_POST['ref_no'];
	$error = "";
	$success = "";
	if (isset($_POST['Submit'])) {
		if($comment_sa ==''){
			$error = "Comment field is empty";
		}
		else{		
		   // $dbh->query("INSERT INTO rc_movement VALUES ('','$id','$current_location','$name','$comment_sa','$curdatetime')");
			mysql_query ("UPDATE railway_concession_1 SET sa_office_comment ='$comment_sa' WHERE application_no = '$id'");
			//$dbh->query ("UPDATE railway_concession_1 SET ref_no ='$row_track[ref_no]' WHERE application_no = '$id'");			
			$comment_success="Comment successfully saved.";
			$message = "Dear ".$applicant."\r\n A comment has been added by SA Office to your Railway Concession request (Application No. ".$application_no."). \r\n Comment: ".$comment_sa."\r\n Latest status can be tracked via CLS.\r\n Thanking You.\r\n Regards,\r\n Team SWC";
			$headers = "MIME-Version: 1.0" . "\r\n";
			$headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
			$headers .= 'From: SWC, IIT Guwahati <swc@iitg.ernet.in>' . "\r\n";
			//$headers .= 'Cc: swc@iitg.ernet.in, saoff@iitg.ernet.in, hossa@iitg.ernet.in' . "\r\n";
			$user_webmail = $applicant_webmail."@iitg.ernet.in";
			mail($user_webmail , 'Comment by SA Office on your Railway Concession request' , $message , $headers);
		}
	} 
	
		if (isset($_POST['Submit1'])) {
			if($ref_no ==''){
			$error = "Reference No. field is empty";
		}
		else{		
		   // $dbh->query("INSERT INTO rc_movement VALUES ('','$id','$current_location','$name','$comment_sa','$curdatetime')");
			//$dbh->query ("UPDATE railway_concession_1 SET comment_saoff ='$comment_sa' WHERE application_no = '$id'");
			mysql_query ("UPDATE railway_concession_1 SET ref_no ='$ref_no' WHERE application_no = '$id'");			
			$comment_success="Reference No successfully saved.";
			$message = "Dear ".$applicant."\r\n A comment has been added by SA Office to your Railway Concession request (Application No. ".$application_no."). \r\n Comment: ".$comment_sa."\r\n Latest status can be tracked via CLS.\r\n Thanking You.\r\n Regards,\r\n Team SWC";
			$headers = "MIME-Version: 1.0" . "\r\n";
			$headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
			$headers .= 'From: SWC, IIT Guwahati <swc@iitg.ernet.in>' . "\r\n";
			//$headers .= 'Cc: swc@iitg.ernet.in, saoff@iitg.ernet.in, hossa@iitg.ernet.in' . "\r\n";
			$user_webmail = $applicant_webmail."@iitg.ernet.in";
			//mail($user_webmail , 'Comment by SA Office on your Railway Concession request' , $message , $headers);
		}
	}

  if (isset($_POST['Approve'])) {
	//if($login_session == 'saoff'){
			$approve_success="Approved.";

			mysql_query ("UPDATE railway_concession_1 SET approval_result='approved' WHERE application_no = '$id'");
		//	$dbh->query ("UPDATE railway_concession_1 SET status='Approved' WHERE id = '$id'");
			//$dbh->query("INSERT INTO rc_movement VALUES ('','$id','$current_location','$name','Approved','$curdatetime')");
			$message = "Dear ".$applicant."\r\n Your Railway Concession request (Application No. ".$application_no.") has been approved by SAoff. \r\n Latest status can be tracked via CLS.\r\n Thanking You.\r\n Regards,\r\n Team SWC";
			$headers = "MIME-Version: 1.0" . "\r\n";
			$headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
			$headers .= 'From: SWC, IIT Guwahati <swc@iitg.ernet.in>' . "\r\n";
			//$headers .= 'Cc: swc@iitg.ernet.in, saoff@iitg.ernet.in, hossa@iitg.ernet.in, adosa_1@iitg.ernet.in' . "\r\n";
			$user_webmail = $applicant_webmail."@iitg.ernet.in";
			mail($user_webmail , "Railway Concession application Approved by Students Affair Office. Visit SA Office to collect your railway concession Form." , $message , $headers);
	//	}
	}
	if (isset($_POST['Reject'])) {
	//	if($login_session == 'saoff'){
			$reject_success = "Rejected.";
			mysql_query ("UPDATE railway_concession_1 SET approval_result='rejected' WHERE application_no = '$id'");
		//	$dbh->query ("UPDATE railway_concession_1 SET status='Rejected' WHERE application_no = '$id'");
		//	$dbh->query("INSERT INTO rc_movement VALUES ('','$id','$current_location','$name','Rejected by Students Affairs Office','$curdatetime')");
			$message = "Dear ".$applicant."\r\n Your Railway Concession request (Application No. ".$application_no.") has been rejected by SA Office. \r\n Latest status can be tracked via CLS.\r\n Thanking You.\r\n Regards,\r\n Team SWC";
			$headers = "MIME-Version: 1.0" . "\r\n";
			$headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
			$headers .= 'From: SWC, IIT Guwahati <swc@iitg.ernet.in>' . "\r\n";
			//$headers .= 'Cc: swc@iitg.ernet.in, saoff@iitg.ernet.in' . "\r\n";
			$user_webmail = $applicant_webmail."@iitg.ernet.in";
			mail($user_webmail , "Railway Concession application rejected by SA Office" , $message , $headers);
		//}	
		} 
	if (isset($_POST['Edit'])) {
	//	if($login_session == 'saoff'){
			$edit_success = "Edit request sent.";
			mysql_query ("UPDATE railway_concession_1 SET edit='yes' WHERE application_no = '$id'");
		//	$dbh->query ("UPDATE railway_concession_1 SET approval_result='edit required' WHERE id = '$id'");
			
		//	$dbh->query ("UPDATE railway_concession_1 SET status='Rejected' WHERE application_no = '$id'");
		//	$dbh->query("INSERT INTO rc_movement VALUES ('','$id','$current_location','$name','Rejected by Students Affairs Office','$curdatetime')");
			$message = "Dear ".$applicant."\r\n Your Railway Concession request (Application No. ".$application_no.") has been requested to modify the incorrect details by SA Office. \r\n Latest status can be tracked via CLS.\r\n Thanking You.\r\n Regards,\r\n Team SWC";
			$headers = "MIME-Version: 1.0" . "\r\n";
			$headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
			$headers .= 'From: SWC, IIT Guwahati <swc@iitg.ernet.in>' . "\r\n";
			//$headers .= 'Cc: swc@iitg.ernet.in, saoff@iitg.ernet.in' . "\r\n";
			$user_webmail = $applicant_webmail."@iitg.ernet.in";
			mail($user_webmail , "Edit Required in Railway Concession application" , $message , $headers);
		//}	
		} 	

	if (isset($_POST['Eligible'])) {
	//	if($login_session == 'saoff'){
			$eligible_success = "Eligible.";
			mysql_query ("UPDATE railway_concession_1 SET eligible='yes' WHERE application_no = '$id'");
		//	$dbh->query ("UPDATE railway_concession_1 SET status='Rejected' WHERE application_no = '$id'");
		//	$dbh->query("INSERT INTO rc_movement VALUES ('','$id','$current_location','$name','Rejected by Students Affairs Office','$curdatetime')");
			$message = "Dear ".$applicant."\r\n You are Eligible For the Railway Concession (Application No. ".$application_no."). \r\n Latest status can be tracked via CLS.\r\n Thanking You.\r\n Regards,\r\n Team SWC";
			$headers = "MIME-Version: 1.0" . "\r\n";
			$headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
			$headers .= 'From: SWC, IIT Guwahati <swc@iitg.ernet.in>' . "\r\n";
			//$headers .= 'Cc: swc@iitg.ernet.in, saoff@iitg.ernet.in' . "\r\n";
			$user_webmail = $applicant_webmail."@iitg.ernet.in";
			mail($user_webmail , "Eligible For the Railway Concession" , $message , $headers);
		//}	
		}	
?>
 			<div id="page-wrapper">
                <!-- /.row -->
                <div class="row">
                    <div class="col-lg-12">
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                Railway Concession Form Application No.: <b><?php echo $id; ?></b>
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
                                    else if($edit_success != ''){
									?>
									  <div class="alert alert-success">
										<?php if(isset($edit_success)) {											
											echo $edit_success;
										} 
										?>
									  </div>
									<?php
									}
                                    else if($eligible_success != ''){
									?>
									  <div class="alert alert-success">
										<?php if(isset($eligible_success)) {											
											echo $eligible_success;
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
                                                <?php if ($row_track["approval_result"] == "" AND $row_track["eligible"] != "yes" AND $row_track["edit"] != "yes") { ?>
                                                <td><b style="color:#d3b62a;">Current Status:</b> <?php echo "<span style='color: blue;'>  Application Pending  </span>"; ?> </td>
												
												<?php } else if($row_track["approval_result"] != "") {  ?>
												
                                                <td><b style="color:#d3b62a;">Current Status:</b> <?php if($row_track["approval_result"] == "approved"){echo "<span style='color:green;'>Application Approved (".$row_track["application_no"].")</span>";} else{echo "<span style='color:blue;'> $row_track[approval_result] </span>";} ?></td>
												<?php } else if($row_track["approval_result"] == "" AND $row_track["eligible"] == "yes") { ?>
                                                <td><b style="color:#d3b62a;">Current Status:</b> <?php echo "<span style='color: brown;'>  Eligible  </span>"; ?> </td>
												<?php } else if($row_track["approval_result"] == "" AND $row_track["edit"] == "yes") { ?>
                                                <td><b style="color:#d3b62a;">Current Status:</b> <?php echo "<span style='color: yellow;'>  Edit Required  </span>"; ?> </td>
												<?php } ?>
                                            </tr>
                                            <tr>
                                                <td><b>Departure Station:</b> <?php echo $row_track["departure_station"]; ?></td>
                                                <td><b>Arrival Station:</b> <?php echo $row_track["arrival_station"]; ?></td>
                                            </tr>
											<tr> 
												<td><b>Journey Type:</b> <?php echo $row_track["journey_type"]; ?></td>
												<td><b>Applying Date and Time:</b> <?php echo $row_track["date_of_filling"]; ?> <?php echo "" ?></td>
                                            </tr>
											<?php if ($row_track["journey_type"] == "One Way") {  ?>
										     <tr>
                                                <td><b>Journey Date:</b> <?php echo $row_track["journey_date"]; ?></td>
                                                <td><b></b> <?php  ?></td>
												
                                            </tr>
											<?php
											}
										          else { ?>
                                            <tr>
                                                <td><b>Journey Date:</b> <?php echo $row_track["journey_date"]; ?></td>
                                                <td><b>Return Date:</b> <?php echo $row_track["return_date"]; ?></td>
                                            </tr>
											<?php
											}
											?>
											<tr>
                                                <td><b>Ticket:</b><a href="../railway/ticket/<?php echo $row_track["ticket_pdf"]; ?>" target="_blank"> Download</a></td>
                                                <td><b></b> <?php  ?></td>
                                            </tr>
						
											
											 </tbody>
                                    </table>
									
                                 <tbody>
                                    <table>				
											
                <!--    <div class="panel panel-default"> 
                            <div class="panel-heading">
                                Details of Travellers
                            </div>   -->
							<?php echo "<div style='font-size:150%; color:#198822'>Details of Travellers</div>"; ?>
							<div class="panel-body">
								
                                <div class="dataTable_wrapper">
                                    <table class="table table-striped table-bordered table-hover" id="">
										<thead>
											<tr> 
											  <th valign="top" bgcolor="#dedede"> <font>Name</font></th>
											  <th valign="top" bgcolor="#dedede"> <font>Webmail</font></th>
											  <th valign="top" bgcolor="#dedede"> <font>Hostel/Room no.</font></th>
											  <th valign="top" bgcolor="#dedede"> <font>Roll no. </font></th>
											  <th valign="top" bgcolor="#dedede"> <font>Gender</font></th>
											  <th valign="top" bgcolor="#dedede"> <font>Age</font></th>
											  <th valign="top" bgcolor="#dedede"> <font>Traveller's Id Card</font></th>
											  <th valign="top" bgcolor="#dedede"> <font>Leave Application</font></th>
											  <th valign="top" bgcolor="#dedede"> <font>Caste</font></th>
											</tr>
										</thead>
										<tbody>
										<?php
			                  			  	$query2 = "SELECT * FROM railway_concession_1 WHERE application_no = '$id'";
	                                        $result2 = mysql_query($query2); 
											
											while ($row=mysql_fetch_array($result2)) {
												$id = $row[0];
												//$application_no = $row[1];
												$room_no   = $row[6];
												$webmail = $row[2];
												$roll_no = $row[5];
												$hostel = $row[19];
												$student_name = $row[1];
												$gender = $row[4];
												$age = $row[3];
												$course = $row[16];
												$caste = $row[13];
												
											?>
                                            <tr class="odd gradeX" <?php if($status == "Approved"){echo "style='color:green'";}?>>
												<td><?php echo "$student_name";?></td>
												<td><?php echo "$webmail";?></td>
                                                						<td><?php echo "$hostel/$room_no";?></td>
												<td><?php echo "$roll_no";?></td>
												<td><?php echo "$gender";?></td>
												<td><?php echo "$age";?></td>
												<td><a href="../railway/ids/<?php echo $row_track["id_card"]; ?>" target="_blank"> Download</a></td>
											<?php if($course == 'mtech') {	?>
											      
												<td><a href="../railway/dept/<?php echo $row_track["leave_application"]; ?>" target="_blank"> Download</a></td>
											<?php  } else { ?>
				    							<td> <?php echo "NA" ?> </td>
											<?php } ?>
												
											<?php if($caste == 'cat')	{ ?>
												<td><a href="../railway/caste/<?php echo $row_track["caste_certi"]; ?>" target="_blank"> Download</a></td>
											<?php } else { ?>
											     <td> <?php echo "NA" ?> </td>
											<?php } ?>		
                                            </tr>
											<?php
											}
											?>
											
											
											
											
					     					<?php
											
										  	$query4 = "SELECT * FROM railway_concession_2 WHERE id='$id'";
	                                     //    echo "$query4" ;
											$result4 = mysql_query($query4);
											
											while ($row_4 = mysql_fetch_array($result4)) {
												$hostel = $row_4[13];
												$room_no1   = $row_4[7];
												$webmail1 = $row_4[3];
												$roll_no1 = $row_4[6];
												$stud_name1 = $row_4[2];
												$gender1 = $row_4[5];
												$age1 = $row_4[4];
												$course1 = $row_4[11];
												$caste1 = $row_4[9];
											?>
                                           <tr class="odd gradeX" <?php if($status == "Approved"){echo "style='color:green'";}?>>
												<td><?php echo "$stud_name1";?></td>
												<td><?php echo "$webmail1";?></td>
                                                <td><?php echo "$room_no1";?></td>
												<td><?php echo "$roll_no1";?></td>
												<td><?php echo "$gender1";?></td>
												<td><?php echo "$age1";?></td>
												<td><a href="../railway/ids/<?php echo $row_4["id_card"]; ?>" target="_blank"> Download</a></td>
											<?php if($course1 == 'mtech') {	?>
												<td><a href="../railway/dept/<?php echo $row_4["leave_application"]; ?>" target="_blank"> Download</a></td>
											<?php  } else { ?>
				    							<td> <?php echo "NA" ?> </td>
											<?php } ?>
												
											<?php if($caste1 == 'cat')	{ ?>
												<td><a href="../railway/caste/<?php echo $row_4["caste_certi"]; ?>" target="_blank"> Download</a></td>
											<?php } else { ?>
											     <td> <?php echo "NA" ?> </td>
											<?php } ?>		
                                            </tr>
											<?php
											}
											?>
											
											
											
										</tbody>
                                    </table>
                                </div>
                                <!-- /.table-responsive -->
								
								
							</div>
                            <!-- /.panel-body -->
                  <!--  </div>
                        <!-- /.panel -->
                                         </tbody>
                                    </table>
                                </div>
								
								
								
								
								
								<div class="dataTable_wrapper">
                                    <table class="table table-striped table-bordered table-hover" id="">
										<thead>
											<tr>
											  <th valign="top" bgcolor="#dedede"> <font>Comment</font></th>
											  <th valign="top" bgcolor="#dedede"> <font>Reference No.</font></th>
											</tr>
										</thead>
										<tbody>
										    <tr class='odd'>
										      <td><?php echo  "<span style='color: brown;'> $row_track[sa_office_comment] </span>";?></td>		
										      <td><?php echo "<span style='color: brown;'> $row_track[ref_no] </span>";?></td>		
											</tr>
											
										</tbody>
                                    </table>
                                </div>
                                <!-- /.table-responsive -->
								<?php if($row_track["approval_result"] == "" AND $row_track["eligible"] == ""){ ?>
								
									
								<table class="table table-striped table-bordered table-hover">
								  <tbody>
								   <tr>
									 <td><form name="gh" style="margin-top:2%" class="before_approve" action=""  accept-charset="utf-8" method="post" enctype="multipart/form-data">
											<div class="row">
												<div class="col-lg-12" style="padding-left:0px;" >
													<div class="col-lg-6">
														<div class="form-group">
															<label>Add/Update Comment</label>
															<textarea type="text" class="form-control" name="comment_sa"></textarea>
														</div>
													</div>
												</div>
											</div>
											<div class="row">
												<div class="col-lg-12" style="padding-left:0px;" >
													<div class="col-lg-12">
														<div class="form-group ">
															<button type="submit" class="btn btn-primary" name="Submit" >Add Comment</button>
														</div>
													</div>
												</div>
											</div>
									</form> </td>
									
									<td> <form name="gh" style="margin-top:2%" class="before_approve" action=""  accept-charset="utf-8" method="post" enctype="multipart/form-data">
											<div class="row">
												<div class="col-lg-12" style="padding-left:0px;" >
													<div class="col-lg-6">
														<div class="form-group">
															<label>Add/Update Reference No.</label>
															<textarea type="text" class="form-control" name="ref_no"></textarea>
														</div>
													</div>
												</div>
											</div>
											<div class="row">
												<div class="col-lg-12" style="padding-left:0px;" >
													<div class="col-lg-12">
														<div class="form-group ">
															<button type="submit" class="btn btn-primary" name="Submit1" >Add Reference No</button>
														</div>
													</div>
												</div>
											</div>
									</form> </td>
									</tbody>
									</table>
									
								<!--	<iframe src="print_guesthouse_application.php?print=<?php //echo $id; ?>" name="frame1" style="display:none;"></iframe> -->
					
								<form action="" accept-charset="utf-8" method="post">
								<?php //if($login_session = 'saoff') ?>
									<button type="submit" class="btn btn-success hide_approve" name="Eligible">Eligible</button>
								<?php// } ?>
									<button type="submit" class="btn btn-danger hide_reject" name="Reject">Reject</button>
									<button type="submit" class="btn btn-primary hide_reject" name="Edit">Edit Required</button>
								<?php //} ?>	
								<!--	<button type="button" class="btn btn-primary disabled">Print Approval Letter</button><hr>  -->
								</form>
								<?php //} ?>
								<?php } ?>
 								
 					
 
    <?php if($row_track["eligible"] == "yes" AND $row_track["approval_result"] == "" ) { ?>
		<table class="table table-striped table-bordered table-hover">
			<tbody>
			  <tr>
     			  <td><form name="gh" style="margin-top:2%" class="before_approve" action=""  accept-charset="utf-8" method="post" enctype="multipart/form-data">
              				  <div class="row">
												<div class="col-lg-12" style="padding-left:0px;" >
													<div class="col-lg-6">
														<div class="form-group">
															<label>Add/Update Comment</label>
															<textarea type="text" class="form-control" name="comment_sa"></textarea>
														</div>
													</div>
												</div>
											</div>
											<div class="row">
												<div class="col-lg-12" style="padding-left:0px;" >
													<div class="col-lg-12">
														<div class="form-group ">
															<button type="submit" class="btn btn-primary" name="Submit" >Add Comment</button>
														</div>
													</div>
												</div>
											</div>
									</form> </td>
									
									<td> <form name="gh" style="margin-top:2%" class="before_approve" action=""  accept-charset="utf-8" method="post" enctype="multipart/form-data">
											<div class="row">
												<div class="col-lg-12" style="padding-left:0px;" >
													<div class="col-lg-6">
														<div class="form-group">
															<label>Add/Update Reference No.</label>
															<textarea type="text" class="form-control" name="ref_no"></textarea>
														</div>
													</div>
												</div>
											</div>
											<div class="row">
												<div class="col-lg-12" style="padding-left:0px;" >
													<div class="col-lg-12">
														<div class="form-group ">
															<button type="submit" class="btn btn-primary" name="Submit1" >Add Reference No</button>
														</div>
													</div>
												</div>
											</div>
									</form> </td>
									</tbody>
									</table>
									
             
							<form action="" accept-charset="utf-8" method="post">

									<button type="submit" class="btn btn-success hide_approve" name="Approve">Approve</button>
									<button type="submit" class="btn btn-danger hide_reject" name="Reject">Reject</button>
 								</form>					
								
	<?php } ?>							</div>
                            <!-- /.panel-body -->
                        </div>
                        <!-- /.panel -->
                    </div>
                    <!-- /.col-lg-12 -->
                </div>
            </div>
            <!-- /#page-wrapper -->

