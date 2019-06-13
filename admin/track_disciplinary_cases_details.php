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

	
	
		if(isset($_POST['closed'])){
		$approve_success = "Case Closed.";
		mysql_query ("UPDATE disciplinary_cases SET status = 'closed' WHERE app_no = '$id'");

	}
	
?>
 			<div id="page-wrapper">
                <!-- /.row -->
                <div class="row">
                    <div class="col-lg-12">
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                SDC Diary Case No.: <b><?php echo $id; ?></b>
                            </div>
							<div class="panel-body">
								<?php 
																	
									if($approve_success != ''){
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
									
									else{
										//echo "";
									}
								?>
								<?php echo "<div style='font-size:150%; color:#198822'>Case Details</div>"; ?>

								<div class="table-responsive">
                                    <table class="table table-striped table-bordered table-hover">
                                        <tbody>
                                            <tr>
                                                <td><b>Matter Related To:</b> <?php echo $row_track["matter_related_to"]; ?></td>
                                                <td><b>Date of Incident:</b> <?php echo $row_track["date_of_incident"]; ?></td>
                                            </tr>
											
										</tbody>
									</table>
	<!-- sudent details table -->								
           
 
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
											  <?php if($row_track["status"] == "open"){ ?> <th valign="top" bgcolor="#dedede"> <font>Delete</font></th><?php }?>
											</tr>
										</thead>
										<tbody>
										
                                            <tr class="odd gradeX">
												<td><?php echo $row_track["stud_name"];?></td>
												<td><?php echo $row_track["roll_no"];?></td>
                                                						<td><?php echo $row_track["department"];?></td>
												<td><?php echo $row_track["hostel"];?></td>
												 <?php if($row_track["status"] == "open"){ ?><td></td><?php }?>
                                            </tr>
	
					     					<?php
											
										  	$query4 = "SELECT * FROM disciplinary_students WHERE app_no='$id' ORDER BY date_time";
	                                     //    echo "$query4" ;
											$result4 = mysql_query($query4);
											
											while ($row_4 = mysql_fetch_array($result4)) {
												
											?>
                                           <tr class="odd gradeX" >
												<td><?php echo $row_4["stud_name"];;?></td>
												<td><?php echo $row_4["roll_no"];;?></td>
                                                						<td><?php echo $row_4["department"];;?></td>
												<td><?php echo $row_4["hostel"];;?></td>
\												 <?php if($row_track["status"] == "open"){ ?><td class="center"><a href='system_dc_delete_student.php?delete=<?php echo $row_4["id"];?>&roll=<?php echo $row_4["roll_no"];?>' style='color:red'>Delete</a></td><?php }?>
                                            
                                            </tr>
											<?php
											}
											?>
											
											
											
										</tbody>
                                    </table>
                                </div>
							
							</div>
         
                                
				
							<?php echo "<div style='font-size:150%; color:#198822'>Meeting Details</div>"; ?>
							<div class="panel-body">
								
                                <div class="dataTable_wrapper">
                                    <table class="table table-striped table-bordered table-hover" id="">
										<thead>
											<tr> 
											  <th valign="top" bgcolor="#dedede"> <font>SI.No</font></th>
											  <th valign="top" bgcolor="#dedede"> <font>Meeting Date</font></th>
											  <th valign="top" bgcolor="#dedede"> <font>Decision</font></th>
											  <?php if($row_track["status"] == "open"){ ?><th valign="top" bgcolor="#dedede"> <font>Edit Meeting Details</font></th>
											<?php }?>
												</tr>
										</thead>
										<tbody>
										<?php
											
										  	$query5 = "SELECT * FROM disciplinary_meeting_details WHERE app_no='$id' ORDER BY update_date_time";
	                                     //    echo "$query4" ;
											$result5 = mysql_query($query5);
											$num_row = mysql_num_rows($result5) + 1;
											$i=1;
											while ($row_5 = mysql_fetch_array($result5)) { 
												
											?>
                                           <tr class="odd gradeX" >
												<td><?php echo $i;?></td>
												<td><?php echo $row_5["meeting_date"];?></td>
                                                <td><?php echo $row_5["decisions"];?></td>
												<?php if($row_track["status"] == "open"){ ?><td class="center"><a href='system_edit_dc_meeting_details.php?track=<?php echo $row_5["id"]; ?>' style='color:#337ab7'>Edit</a></td>
												<?php }?>		                                            
							</tr>
											<?php
											 $i++;}
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
											  <?php if($row_track["status"] == "open"){ ?><th valign="top" bgcolor="#dedede"> <font>Edit Follow UP</font></th>
											<?php }?>
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
												<td><?php echo $row_6["date"];?></td>
												<td><?php echo $row_6["details"];?></td>
                                                <td><?php echo $row_6["remarks"];?></td>
												<?php if($row_track["status"] == "open"){ ?><td class="center"><a href='system_edit_dc_follow_up.php?track=<?php echo $row_6["id"]; ?>' style='color:#337ab7'>Edit</a></td>
     													<?php }?>                                      
									 </tr>
											<?php
											}
											?>
						 
										</tbody>
                                    </table>
					<?php if($row_track["status"] != "closed"){ ?>			
						<div class="btn-group btn-group-justified hide_reject">
							<a href="system_dc_meeting_details.php?track=<?php echo "$id"; ?>" class="btn btn-success hide_success">Add Meeting Details</a>
							<a href="system_dc_follow_up.php?track=<?php echo "$id"; ?>" class="btn btn-primary hide_reject">Add Follow Up</a>
							<a href="system_dc_add_new_student.php?track=<?php echo "$id"; ?>" class="btn btn-success hide_reject">Add New Student</a>
						</div> 
					
					<?php } ?>
					
                                </div>

							</div>
									
					
									
                                </div>
								
                                <!-- /.table-responsive -->
						<?php if($row_track["status"] == "closed"){ ?>			
                      <form action="" accept-charset="utf-8" method="post">
									<button type="submit" class="btn btn-danger disabled" >Case Closed</button>
								</form>
					   <?php } else { ?>
					   
							<form action="" accept-charset="utf-8" method="post">
									<button type="submit" class="btn btn-danger hide_reject" name="closed">  Close This Case</button>
								</form>
					   <?php } ?>							
							</div>
					<div><br/><br/><br/></div>
                            <!-- /.panel-body -->
                        </div>
                        <!-- /.panel -->
                    </div>
                    <!-- /.col-lg-12 -->
                </div>
            </div>
            <!-- /#page-wrapper -->

