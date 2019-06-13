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
                                Guesthouse Room Booking Application No.: <b><?php $application_no = $_GET['track']; echo $application_no; ?></b>
                            </div>
							<div class="panel-body">
								<?php
									include("connect.php");
									$application_no = $_GET['track'];
									$query = "SELECT * FROM mch_booking WHERE application_no = '$application_no' AND webmail = '$login_session'";
									$result = mysql_query($query);
									$row_track = mysql_fetch_array($result);
									$id = $row_track['id'];
								if($row_track["application_no"] == $application_no){
								?>
								<div class="table-responsive">
                                    <table class="table table-striped table-bordered table-hover">
                                        <tbody>
                                            <tr>
                                                <td><b>Application No.:</b> <?php echo $row_track["application_no"]; ?></td>
                                                <td><b style="color:#d3b62a;">Current Status:</b> <?php if($row_track["status"] == "Approved"){echo "<span style='color:green;'>MCH booking application Approved.</span>";} else{echo $row_track["status"];} ?></td>
                                                
                                            </tr>
                                            <tr>
                                                <td><b>Hostel:</b> <?php echo $row_track["hostel"] ?></td>
                                                <td><b>Application date and time:</b> <?php echo $row_track["booking_time"]; ?></td>
                                            </tr>
                                            <tr>
                                                <td><b>Room No.:</b> <?php echo $row_track["room"]; ?></td>
                                                <td><b>Contact:</b> <?php echo $row_track["phone"]; ?></td>
                                            </tr>
                                            <tr>
                                                <td><b>Booking From Date:</b> <?php echo $row_track["date_from"]; ?></td>
                                                <td><b>Booking Upto Date:</b> <?php echo $row_track["date_to"]; ?></td>
                                            </tr>
                                            <tr>
                                                <td><b>Booking From Time:</b> <?php echo $row_track["from_time"]; ?></td>
                                                <td><b>Booking Upto Time:</b> <?php echo $row_track["to_time"]; ?></td>
                                            </tr>
                                            <tr>
                                                <td><b>Number of Days:</b> <?php echo $row_track["no_days"]; ?></td>
                                                <td><b>Purpose of Booking:</b> <?php echo $row_track["booking_reason"]; ?></td>
                                            </tr>
					    <tr>
                                                <td><b>Course:</b> <?php echo $row_track["course"]; ?></td>
                                                <td><b>Applicant Programme Details(Dept/Centre etc.):</b> <?php echo $row_track["department"]; ?></td>
                                            </tr>
					    <tr>
                                                <td><b>Type of hall:</b> <?php echo $row_track["hall_type"]; ?></td>
                                                <td><b>Permission:<a href="mch/permission/<?php echo $row_track["permission"]; ?>" target="_blank">Download</a></td>
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
											$query3 = "SELECT * FROM mch_movement WHERE filesNo = '$application_no'";
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
 
