<?php 
	include("session.php");
	include("connect.php");
	error_reporting(1);
	
	$currentdatetime = mysql_query('select now()');
	$curdatetime     = mysql_result($currentdatetime, 0);
	$id = $_GET['track'];
	$query = "SELECT * FROM disciplinary_cases WHERE app_no = '$id'";
	$result = mysql_query($query);
	$row_track = mysql_fetch_array($result);
	$applicant = $row_track["stud_name"];
	$application_no = $row_track["id"];
	$applicant_webmail = $row_track["webmail"];
	$comment_sa = $_POST['comment_sa'];
	$ref_no = $_POST['ref_no'];
	$error = "";
	$success = "";
	
	
		
?>
 			<div id="page-wrapper">
                <!-- /.row -->
                <div class="row">
                    <div class="col-lg-12">
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                SDC Diary Case No: <b><?php echo $id; ?></b>
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
								<?php echo "<div style='font-size:150%; color:#198822'>Case Details</div>"; ?>

								<div class="table-responsive">
                                    <table class="table table-striped table-bordered table-hover">
                                        <tbody>
                                            <tr>
                                                <td><b>Case No.:</b> <?php echo $row_track["app_no"]; ?></td>
												
                                            </tr>
                                            <tr>
                                                <td><b>Matter Related To:</b> <?php echo $row_track["matter_related_to"]; ?></td>
                                                <td><b>Date of Incident:</b> <?php echo $row_track["date_of_incident"]; ?></td>
                                            </tr>
											
										</tbody>
									</table>
	<!-- sudent details table -->								
           <table>				
				<tbody>	
 
							<?php echo "<div style='font-size:150%; color:#198822'>Student Details</div>"; ?>
							<div class="panel-body">
								
                                <div class="dataTable_wrapper">
                                    <table class="table table-striped table-bordered table-hover" id="">
										<thead>
											<tr> 
											  <th valign="top" bgcolor="#dedede"> <font>Name of the student</font></th>
											  <th valign="top" bgcolor="#dedede"> <font>Roll No.</font></th>
											  <th valign="top" bgcolor="#dedede"> <font>Department</font></th>
											  <th valign="top" bgcolor="#dedede"> <font>Hostel</font></th>
											</tr>
										</thead>
										<tbody>
										
                                            <tr class="odd gradeX">
												<td><?php echo $row_track["stud_name"];?></td>
												<td><?php echo $row_track["roll_no"];?></td>
                                                <td><?php echo $row_track["department"];?></td>
												<td><?php echo $row_track["hostel"];?></td>
                                            </tr>
	
					     					<?php
											
										  	$query4 = "SELECT * FROM disciplinary_students WHERE app_no='$id'";
	                                     //    echo "$query4" ;
											$result4 = mysql_query($query4);
											
											while ($row_4 = mysql_fetch_array($result4)) {
												
											?>
                                           <tr class="odd gradeX" >
												<td><?php echo $row_4["stud_name"];;?></td>
												<td><?php echo $row_4["roll_no"];;?></td>
                                                <td><?php echo $row_4["department"];;?></td>
												<td><?php echo $row_4["hostel"];;?></td>
                                            </tr>
											<?php
											}
											?>
											
											
											
										</tbody>
                                    </table>
                                </div>
							
							</div>
         
                                    </table>
									  </tbody>
				
							<?php echo "<div style='font-size:150%; color:#198822'>Meeting Details</div>"; ?>
							<div class="panel-body">
								
                                <div class="dataTable_wrapper">
                                    <table class="table table-striped table-bordered table-hover" id="">
										<thead>
											<tr> 
											  <th valign="top" bgcolor="#dedede"> <font>SI.No</font></th>
											  <th valign="top" bgcolor="#dedede"> <font>Meeting Date</font></th>
											  <th valign="top" bgcolor="#dedede"> <font>Decision</font></th>
											</tr>
										</thead>
										<tbody>
										<?php
											
										  	$query5 = "SELECT * FROM disciplinary_meeting_details WHERE app_no='$id'";
	                                     //    echo "$query4" ;
											$result5 = mysql_query($query5);
											
											while ($row_5 = mysql_fetch_array($result5)) {
												
											?>
                                           <tr class="odd gradeX" >
												<td><?php echo $row_5["id"];;?></td>
												<td><?php echo $row_5["meeting_date"];;?></td>
                                                <td><?php echo $row_5["decisions"];;?></td>
                                            </tr>
											<?php
											}
											?>
											
										</tbody>
                                    </table>
                                </div>

							</div>
						
									
  
							<?php echo "<div style='font-size:150%; color:#198822'>Follow Up</div>"; ?>
							<div class="panel-body">
								
                                <div class="dataTable_wrapper">
                                    <table class="table table-striped table-bordered table-hover" id="">
										<thead>
											<tr> 
											  <th valign="top" bgcolor="#dedede"> <font>date</font></th>
											  <th valign="top" bgcolor="#dedede"> <font>Details</font></th>
											  <th valign="top" bgcolor="#dedede"> <font>Remarks</font></th>
											</tr>
										</thead>
										<tbody>
										<?php
											
										  	$query6 = "SELECT * FROM disciplinary_follow_up WHERE app_no='$id'";
	                                     //    echo "$query4" ;
											$result6 = mysql_query($query6);
											
											while ($row_6 = mysql_fetch_array($result6)) {
												
											?>
                                           <tr class="odd gradeX" >
												<td><?php echo $row_6["date"];;?></td>
												<td><?php echo $row_6["details"];;?></td>
                                                <td><?php echo $row_6["remarks"];;?></td>
                                            </tr>
											<?php
											}
											?>
										</tbody>
                                    </table>
                                </div>

							</div>
									
					
									
                                </div>
								
                                <!-- /.table-responsive -->
	
		
             
							<form action="" accept-charset="utf-8" method="post">

									<button type="submit" class="btn btn-success hide_approve" name="new_student">Add New Student</button>
									</form>
							<form action="" accept-charset="utf-8" method="post">		
									<button type="submit" class="btn btn-danger hide_reject" name="meeting_details">Add Meeting Details</button>
									</form>
							<form action="" accept-charset="utf-8" method="post">		
									<button type="submit" class="btn btn-primary hide_reject" name="follow_up">Add Follow Up</button>
 								</form>					


							
							</div>
                            <!-- /.panel-body -->
                        </div>
                        <!-- /.panel -->
                    </div>
                    <!-- /.col-lg-12 -->
                </div>
            </div>
            <!-- /#page-wrapper -->

