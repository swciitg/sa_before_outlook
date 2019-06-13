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
                                Guesthouse Room Booking Application No.: <b><?php $id = $_GET['track']; echo $id; ?></b>
                            </div>
							<div class="panel-body">
								<?php
									include("connect.php");
									$id = $_GET['track'];
									$query = "SELECT * FROM gh_booking WHERE application_no = '$id' AND webmail = '$login_session'";
									$result = mysql_query($query);
									$row_track = mysql_fetch_array($result);
								if($row_track["application_no"] == $id){
								?>
								<div class="table-responsive">
                                    <table class="table table-striped table-bordered table-hover">
                                        <tbody>
                                            <tr>
                                                <td><b>Application No.:</b> <?php echo $row_track["application_no"]; ?></td>
                                                <td><b style="color:#d3b62a;">Current Status:</b> <?php if($row_track["status"] == "Allotted"){echo "<span style='color:green;'>Room Allotted (".$row_track["allotted_room"].")</span>";} else{echo $row_track["status"];} ?></td>
                                                
                                            </tr>
                                            <tr>
                                                <td><b>Booking From:</b> <?php echo $row_track["date_from"]; ?></td>
                                                <td><b>Booking Upto:</b> <?php echo $row_track["date_to"]; ?></td>
                                            </tr>
                                            <tr>
                                                <td><b>No. of Night(s):</b> <?php echo $row_track["no_days"]; ?></td>
												<td><b>Room Type:</b> <?php echo $row_track["room_type"]; ?></td>
                                            </tr>
                                            <tr>
                                                <td><b>Visitor-1 Details:<br></b> <?php echo "Name: ".$row_track["visitor1_name"]."<br>Gender: ".$row_track["visitor1_gender"]."<br>Age: ".$row_track["visitor1_age"]."<br>Marital Status: ".$row_track["visitor1_marital"]."<br>Relation with Student: ".$row_track["visitor1_relation"]."<br>Address: ".$row_track["visitor1_address"]; ?></td>
												<td><b>Visitor-2 Details:<br></b> <?php if($row_track["visitor2_name"] == ''){echo "NA";} else{echo "Name: ".$row_track["visitor2_name"]."<br>Gender: ".$row_track["visitor2_gender"]."<br>Age: ".$row_track["visitor2_age"]."<br>Marital Status: ".$row_track["visitor2_marital"]."<br>Relation with Student: ".$row_track["visitor2_relation"]."<br>Address: ".$row_track["visitor2_address"];} ?></td>
                                            </tr>
											<tr>
                                                <td><b>Booking Reason:</b> <?php echo $row_track["booking_reason"]; ?></td>
                                                <td><b>Booking Time:</b> <?php echo $row_track["booking_time"]; ?></td>
                                            </tr>
											<tr>
                                                <td><b>Booking Category:</b> <?php echo $row_track["booking_category"]; ?></td>
                                                <td><b>Students' Phone No.:</b> <?php echo $row_track["phone"]; ?></td>
                                            </tr>
											<tr>
                                                <td><b>ID Card Number:</b> <?php echo $row_track["id_card"]; ?></td>
                                                <td><b>ID Card:</b> <a href="ids/<?php echo $row_track["id_card_name"]; ?>" target="_blank">Download</a></td>
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
											$query3 = "SELECT * FROM gh_movement WHERE filesNo = '$id'";
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
								<iframe src="print_guesthouse_application.php?print=<?php echo $id; ?>" name="frame1" style="display:none;"></iframe>
								<?php if($row_track["status"] == "Allotted"){ ?>
									<button type="button" onclick="frames['frame1'].print()" class="btn btn-primary">Print Approval Letter</button>
								<?php }
									else{ ?>
									<button type="button" class="btn btn-primary disabled">Print Approval Letter</button>
								<?php }
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
 