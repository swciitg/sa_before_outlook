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
                                Applications from other section/department
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
                                                <th>Edit</th>
                                                <th>Details</th>
                                            </tr>
                                        </thead>
                                        <tbody>
										<?php 
											include("connect.php");
											
											if ($user_type == '1') {
												$current_location = "All";
											}
												
											$query2 = "SELECT filesNo,filename,application_date,application_desc,current_location,dealing_person,current_responsible_person,comment,current_status,time FROM movement WHERE current_responsible_person LIKE '%$current_location%' GROUP BY filesNo ORDER BY time DESC";
											$result2 = mysql_query($query2);
											
											while ($row = mysql_fetch_array($result2)) {
												$file_no   = $row[0];
												$file_name = $row[1];
												$file_date = $row[2];
												$file_desc = $row[3];
												$file_current_location = $row[4];
												$file_dealing_person = $row[5];
												$file_current_person = $row[6];
												$file_comment = $row[7];
												$file_status = $row[8];
												
												$totalunread  = mysql_query("SELECT * FROM unread_applications where application_no = '$file_no' AND total_hits = '0' AND unread_by_dept = '$current_location'");
												$istotalunread    = mysql_num_rows($totalunread);
											?>
                                            <tr class="odd gradeX" <?php if($file_status == "Completed"){echo "style='color:green'";} else if($istotalunread != 0){echo "style='background-color:rgba(255, 165, 0, 0.28)'";} ?>>
												<td><?php echo "$file_no";?></td>
                                                <td><?php echo "$file_name";?></td>
												<td><?php echo "$file_dealing_person";?></td>
												<td><?php echo "$file_desc";?></td>
                                                <td><?php if($file_status == "Completed"){echo "<span style='color:green;'>Process Completed</span>";} else{echo "Under Process";} ?></td>
												<td class="center"><a href='system_update_application.php?edit=<?php echo $file_no; ?>' style='color:#337ab7'>Edit</a></td>
												<td class="center"><a href='system_track_application.php?track=<?php echo $file_no; ?>' style='color:#337ab7'>Details</a></td>
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
