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
                                Manas Community Hall Booking Application
                            </div>
                            <!-- /.panel-heading -->
                            <div class="panel-body">
                                <div class="dataTable_wrapper">
                                    <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                                        <thead>
                                            <tr>
                                                <th>Application No.</th>
                                                <th>Applicant</th>
						<th>Purpose of Booking</th>
						<th>From-Date</th>
						<th>To-Date</th>												
                                                <th>Status</th>
                                                <th>Details</th>
                                            </tr>
                                        </thead>
                                        <tbody>
						<?php 
							include("connect.php");
		
							$query2 = "SELECT * FROM mch_booking WHERE webmail='$login_session' ORDER BY booking_time ";

							$result2 = mysql_query($query2);
							
							while ($row = mysql_fetch_array($result2)) {
								$id = $row['id'];
								$application_no = $row['application_no'];
								$applied_on   = $row['booking_time'];
								$from = $row['date_from'];
								$to = $row['date_to'];
								$from_time = $row['from_time'];
								$to_time = $row['to_time'];
								$student_name = $row['name'];
								$approval_result = $row['approval_result'];
								$booking_reason = $row['booking_reason'];
								$status = $row['status'];
								//$eligible = $row[''];
								//$edit = $row[21];
							?>
            							<tr class="odd gradeX" <?php if($status == "Approved"){echo "style='color:green'";}?>>
								<td><?php echo "$application_no";?></td>
								<td><?php echo "$student_name";?></td>
								<td><?php echo "$booking_reason";?></td>
								<td><?php echo "$from";?></td>
								<td><?php echo "$to";?></td>
								<td><?php echo "$status";?></td>
								
								<td class="center"><a href='system_track_mch_booking_details.php?track=<?php echo $application_no; ?>' style='color:#337ab7'>Details</a></td>
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
                        </div>
                        <!-- /.panel -->
                    </div>
                    <!-- /.col-lg-12 -->
                </div>
            </div>
            <!-- /#page-wrapper -->
