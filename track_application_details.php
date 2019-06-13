<?php 
	include("session.php");
	error_reporting(0);
?>
			<div id="page-wrapper">
                <!-- /.row -->
                <div class="row">
                    <div class="col-lg-12">
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                Track Application No.: <b><?php $id = $_GET['track']; echo $id; ?></b>
                            </div>
							<div class="panel-body">
								<?php
								   include("connect.php");
								   $id = $_GET['track'];
								   $query_track = "SELECT * FROM files WHERE fileno = '$id' AND applicant_webmail = '$login_session'";
								   $result_query = mysql_query($query_track);
								   if (mysql_num_rows($result_query)==0) {
										$query_track = "SELECT * FROM files_jan_june WHERE fileno = '$id' AND applicant_webmail = '$login_session'";
										$result_query = mysql_query($query_track);
										if (mysql_num_rows($result_query)==0) {
											$query = "SELECT * FROM old_files WHERE fileno = '$id' AND applicant_webmail = '$login_session'";
											$result_query = mysql_query($query);
											$row_track = mysql_fetch_array($result_query);
										}
										else{
											$query = "SELECT * FROM files_jan_june WHERE fileno = '$id' AND applicant_webmail = '$login_session'";
											$result_query = mysql_query($query);
											$row_track = mysql_fetch_array($result_query);
										}
								   }
								   else{
										$row_track = mysql_fetch_array($result_query);
								   }
								   
								   //Store no. of hits
								   $query_hits = "SELECT * FROM hits WHERE application_no = '$id' ";
								   $result_hits = mysql_query($query_hits);
								   $row_hits = mysql_fetch_array($result_hits);
								   $total_hits = $row_hits["total_hits"];
								   $total_hits = $total_hits + 1;
								   mysql_query("INSERT INTO hits VALUES ('','$id','$current_location')");
								   $updateunread  = mysql_query("SELECT * FROM unread_applications where application_no = '$id' AND unread_by_dept = '$current_location'");
								   $isupdateunread    = mysql_num_rows($updateunread);
								   if ($isupdateunread == 1) {
										mysql_query ("UPDATE unread_applications SET total_hits = '1' WHERE application_no = '$id' AND unread_by_dept = '$current_location'");
								   }
								if($row_track["fileno"] == $id){
								?>
								<div class="table-responsive">
                                    <table class="table table-striped table-bordered table-hover">
                                        <tbody>
                                            <tr>
                                                <td><b>Application No.:</b> <?php echo $row_track["fileno"]; ?></td>
                                                <td><b style="color:#d3b62a;">Current Status:</b> <?php if($row_track["status"] == "Completed"){echo "<span style='color:green;'>Process Completed</span>";} else{echo "Under Process";} ?></td>
                                                
                                            </tr>
                                            <tr>
                                                <td><b>Application Date:</b> <?php echo $row_track["fdate"]; ?></td>
                                                <td><b>Entry Time:</b> <?php echo $row_track["datecreate"]; ?></td>
                                            </tr>
                                            <tr>
                                                <td><b>Applicant:</b> <?php echo $row_track["filename"]; ?></td>
												<td><b>Applicant Webmail:</b> <?php echo $row_track["applicant_webmail"]; ?></td>
                                            </tr>
                                            <tr>
                                                <td><b>Addressed to:</b> <?php echo $row_track["faddress"]; ?></td>
                                                <td><b>Dealing Person:</b> <?php echo $row_track["fdeal"]; ?></td>
                                            </tr>
											<tr>
                                                <td><b>Created By (staff name):</b> <?php echo $row_track["createby_user"]; ?></td>
                                                <td><b>Created By (section/department name):</b> <?php echo $row_track["createby_dept"]; ?></td>
                                            </tr>
											<tr>
                                                <td><b>Current File Location:</b> <?php echo $row_track["currentloc"]; ?></td>
                                                <td><b>Last Responsible Person:</b> <?php echo $row_track["currentresponsible"]; ?></td>
                                            </tr>
											<tr>
                                                <td colspan="2"><b>Application Description:</b> <?php echo $row_track["filedesc"]; ?></td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                                <div class="dataTable_wrapper">
                                    <table class="table table-striped table-bordered table-hover" id="">
										<thead>
											<tr> 
											  <th valign="top" bgcolor="#dedede"> <font>Date and Time</font></th>
											  <th valign="top" bgcolor="#dedede"> <font>Last File Location</font></th>
											  <th valign="top" bgcolor="#dedede"> <font>Updated By</font></th>
											  <th valign="top" bgcolor="#dedede"> <font>Forwarded to</font></th>
											  <th valign="top" bgcolor="#dedede"> <font>Comments</font></th>
											</tr>
										</thead>
										<tbody>
										<?php
											include("connect_ats.php");
											$id = $_GET['track'];
											$query3 = "SELECT * FROM movement WHERE filesNo = '$id'";
											$result3 = mysql_query($query3);
												while($row = mysql_fetch_array($result3)){
												
														$location = $row[5];
														$responsible = $row[7];
														$comment = $row[8];
														$initiator = $row[10];
														$datetime = $row[11];
														echo "<tr class='odd'>";
														
														echo "<td><font size='2' color = 'red'><b>$datetime</b>";	
														echo "<td><font size='2'>$location";	
														echo "<td><font size='2'>$initiator";	
														echo "<td><font size='2'>$responsible";		
														echo "<td><font size='2'>$comment";
														echo "</tr>";
														}
											?>
										</tbody>
                                    </table>
                                </div>
                                <!-- /.table-responsive -->
								<iframe src="print_application.php?print=<?php echo $id; ?>" name="frame1" style="display:none;"></iframe>
								<button type="button" onclick="frames['frame1'].print()" class="btn btn-primary">Print</button>
							<?php
								}
								else{
									echo "<div class='alert alert-warning'>Requested application no. doesn't exist!</div>";
								}
							?>
							</div>
                            <!-- /.panel-body -->
                        </div>
                        <!-- /.panel -->
                    </div>
                    <!-- /.col-lg-12 -->
                </div>
            </div>
            <!-- /#page-wrapper -->
 