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
                                Your Applications
                            </div>
                            <!-- /.panel-heading -->
                            <div class="panel-body">
                                <div class="dataTable_wrapper">
                                    <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                                        <thead>
                                            <tr>
                                                <th>Application No.</th>
                                                <th>Applicant</th>
												<th>Dealing Person</th>
												<th>Description</th>
                                                <th>Status</th>
                                                <th>Details</th>
                                            </tr>
                                        </thead>
                                        <tbody>
										<?php 
											include("connect.php");
											$query1 = "SELECT * FROM files WHERE applicant_webmail = '$login_session'";
											$result1 = mysql_query($query1);
											$query2 = "SELECT * FROM files_jan_june WHERE applicant_webmail = '$login_session'";
											$result2 = mysql_query($query2);
											$query3 = "SELECT * FROM old_files WHERE applicant_webmail = '$login_session'";
											$result3 = mysql_query($query3);
											
											while ($row = mysql_fetch_array($result1)) {
												$file_no   = $row[1];
												$file_name = $row[2];
												$file_dealing_person = $row[7];
												$file_desc = $row[6];
												$file_status = $row[14];
											?>
                                            <tr class="odd gradeX" <?php if($file_status == "Completed"){echo "style='color:green'";}?>>
												<td><?php echo "$file_no";?></td>
                                                <td><?php echo "$file_name";?></td>
												<td><?php echo "$file_dealing_person";?></td>
												<td><?php echo "$file_desc";?></td>
                                                <td><?php if($file_status == "Completed"){echo "<span style='color:green;'>Process Completed</span>";} else{echo "Under Process";} ?></td>
												<td class="center"><a href='system_track_application_details.php?track=<?php echo $file_no; ?>' style='color:#337ab7'>Details</a></td>
                                            </tr>
											<?php
											}
											while ($row = mysql_fetch_array($result2)) {
												$file_no   = $row[1];
												$file_name = $row[2];
												$file_dealing_person = $row[7];
												$file_desc = $row[6];
												$file_status = $row[14];
											?>
                                            <tr class="odd gradeX" <?php if($file_status == "Completed"){echo "style='color:green'";}?>>
												<td><?php echo "$file_no";?></td>
                                                <td><?php echo "$file_name";?></td>
												<td><?php echo "$file_dealing_person";?></td>
												<td><?php echo "$file_desc";?></td>
                                                <td><?php if($file_status == "Completed"){echo "<span style='color:green;'>Process Completed</span>";} else{echo "Under Process";} ?></td>
												<td class="center"><a href='system_track_application_details.php?track=<?php echo $file_no; ?>' style='color:#337ab7'>Details</a></td>
                                            </tr>
											<?php
											}
											while ($row = mysql_fetch_array($result3)) {
												$file_no   = $row[1];
												$file_name = $row[2];
												$file_dealing_person = $row[7];
												$file_desc = $row[6];
												$file_status = $row[14];
											?>
                                            <tr class="odd gradeX" <?php if($file_status == "Completed"){echo "style='color:green'";}?>>
												<td><?php echo "$file_no";?></td>
                                                <td><?php echo "$file_name";?></td>
												<td><?php echo "$file_dealing_person";?></td>
												<td><?php echo "$file_desc";?></td>
                                                <td><?php if($file_status == "Completed"){echo "<span style='color:green;'>Process Completed</span>";} else{echo "Under Process";} ?></td>
												<td class="center"><a href='system_track_application_details.php?track=<?php echo $file_no; ?>' style='color:#337ab7'>Details</a></td>
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