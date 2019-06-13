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
                                Scholarship Applications
                            </div>
                            <!-- /.panel-heading -->
                            <div class="panel-body">
                                <div class="dataTable_wrapper">
                                    <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                                        <thead>
                                            <tr>
                                                <th>Application No.</th>
                                                <th>Applicant</th>
						<th>Name of Scholarship</th>
						<th>Session</th>
						<th>Amount</th>												
                                                <th>Status</th>
                                                <th>Details</th>
                                            </tr>
                                        </thead>
                                        <tbody>
										<?php 
											include("connect.php");
						
											if($login_session == 'hossa'){
												$query2 = "SELECT * FROM schp_04 WHERE approve_hossa = 'yes' OR reject_hossa = 'yes' ORDER BY booking_time DESC ";
											}
											else if($login_session == 'adosa_1'){
												$query2 = "SELECT * FROM schp_04 WHERE dean = 'adosa_1' AND (approve_dean = 'yes' OR reject_dean = 'yes') ORDER BY booking_time DESC ";
											}
											else if($login_session == 'adosa_2'){
												$query2 = "SELECT * FROM schp_04 WHERE dean = 'adosa_2' AND (approve_dean = 'yes' OR reject_dean = 'yes') ORDER BY booking_time DESC ";
											}
											else if($login_session == 'dos'){
												$query2 = "SELECT * FROM schp_04 WHERE dean = 'dosa' AND (approve_dean = 'yes' OR reject_dean = 'yes') ORDER BY booking_time DESC ";
											}
											else{
												$query2 = "SELECT * FROM schp_04 WHERE approve_saoff = 'yes' OR reject_saoff = 'yes' ORDER BY booking_time DESC ";
											}
											$result2 = mysql_query($query2);
											
											while ($row = mysql_fetch_array($result2)) {
												$id = $row[0];
												$app_no = $row[1];

											?>
                                            <tr class="odd gradeX" <?php if($row["status"] == "approved"){echo "style='color:green'";}?>>
												<td><?php echo $row['application_no'];?></td>
												<td><?php echo $row['name'];?></td>
                                                						<td><?php echo $row['scholarship_name'];?></td>
                                                						<td><?php echo $row['session_applying'];?></td>
												<td><?php echo $row['scholarship_amount'];?></td>
												<td><?php echo $row['status'];?></td>
												
												<td class="center"><a href='system_track_schp_04_application_details.php?track=<?php echo $app_no; ?>' style='color:#337ab7'>Details</a></td>
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
