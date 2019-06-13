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
                Guesthouse Applications
            </div>
            <!-- /.panel-heading -->
            <div class="panel-body">
                <div class="dataTable_wrapper">
                    <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                        <thead>
                            <tr>
                                <th>Application No.</th>
                                <th>Applicant</th>
				<th>Booking From</th>
				<th>Booking Upto</th>
                                <th>Status</th>
                                <th>Details</th>
                            </tr>
                        </thead>
                        <tbody>
						<?php 
							include("connect.php");
							
							if($login_session == 'hossa'){
								$query2 = "SELECT * FROM gh_booking WHERE approve_hossa = 'yes' OR reject_hossa = 'yes' ORDER BY booking_time DESC ";
							}
							else if($login_session == 'adosa_1'){
								$query2 = "SELECT * FROM gh_booking WHERE dean = 'adosa_1' AND (approve_dean = 'yes' OR reject_dean = 'yes') ORDER BY booking_time DESC ";
							}
							else if($login_session == 'adosa_2'){
								$query2 = "SELECT * FROM gh_booking WHERE dean = 'adosa_2' AND (approve_dean = 'yes' OR reject_dean = 'yes') ORDER BY booking_time DESC ";
							}
							else if($login_session == 'dos'){
								$query2 = "SELECT * FROM gh_booking WHERE dean = 'dosa' AND (approve_dean = 'yes' OR reject_dean = 'yes') ORDER BY booking_time DESC ";
							}
							else if($current_dept == '104'){
								$query2 = "SELECT * FROM gh_booking WHERE approve_est = 'yes' OR reject_est = 'yes' ORDER BY booking_time DESC ";
							}
							else{
								$query2 = "SELECT * FROM gh_booking WHERE approve_saoff = 'yes' OR reject_saoff = 'yes' ORDER BY booking_time DESC ";
							}
							$result2 = mysql_query($query2);
							
							while ($row = mysql_fetch_array($result2)) {
								$id = $row[0];
								$gh_application_no = $row[1];
								$applied_on   = $row[27];
								$from = $row[9];
								$to = $row[10];
								$student_name = $row[3];
								$status = $row[29];
								$allotted_room = $row[43];
							?>
                                            <tr class="odd gradeX" <?php if($status == "Allotted"){echo "style='color:green'";}?>>
						<td><?php echo "$gh_application_no";?></td>
						<td><?php echo "$student_name";?></td>
                                                <td><?php echo "$from";?></td>
						<td><?php echo "$to";?></td>
                                                <td><?php if($status == "Allotted"){echo "<span style='color:green;'>Room Allotted (".$allotted_room.")</span>";} else{echo $status;} ?></td>
						<td class="center"><a href='system_track_guesthouse_application_details.php?track=<?php echo $gh_application_no; ?>' style='color:#337ab7'>Details</a></td>
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
