<?php 
	include("session.php"); 
	error_reporting(0);

	
	include("connect.php");
	$query2 = "SELECT * FROM disciplinary_cases WHERE status = 'open' ORDER BY booking_time DESC  ";
	$result2 = mysql_query($query2);
?>
			<div id="page-wrapper">
                <!-- /.row -->
                <div class="row">
                    <div class="col-lg-12">
                        <div class="panel panel-default">
                            <div class="panel-heading">
                               Running Disciplinary Ceses
                            </div>
                            <!-- /.panel-heading -->
                            <div class="panel-body">
                                <div class="dataTable_wrapper">
                                    <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                                        <thead>
                                            <tr>
                                                <th>Case No.</th>
                                                <th>Name of the student(s)</th>
						<th>Roll No.</th>
						<th>Department</th>
						<th>Hostel</th>												
						<th>Date of Incident</th>												
                                                <th>Status</th>
                                                <th>Details</th>
                                            </tr>
                                        </thead>
                                        <tbody>
										<?php 
											
											while ($row = mysql_fetch_array($result2)) {
												
											?>
                                            <tr class="odd gradeX" <?php if($status == "closed"){echo "style='color:green'";}?>>
											<?php $query3 = "SELECT * FROM disciplinary_students WHERE app_no='$row[app_no]'"; 
												$result3 = mysql_query($query3);
												$result4 = mysql_query($query3);
												$result5 = mysql_query($query3);
												$result6 = mysql_query($query3);
											?>												

												<td><?php echo "$row[app_no]";?></td> 
												<td><?php echo "$row[stud_name]"; while($row_track3=mysql_fetch_array($result3)){ ?><br/><?php echo $row_track3['stud_name']; }?></td>
												<td><?php echo "$row[roll_no]"; while($row_track4=mysql_fetch_array($result4)){ ?><br/><?php echo $row_track4['roll_no']; }?></td>
												<td><?php echo "$row[department]"; while($row_track5=mysql_fetch_array($result5)){ ?><br/><?php echo $row_track5['department']; }?></td>
												<td><?php echo "$row[hostel]"; while($row_track6=mysql_fetch_array($result6)){ ?><br/><?php echo $row_track6['hostel']; }?></td>
												<td><?php echo "$row[date_of_incident]";?></td>
												<td><?php if($row["status"] == "open") {echo "<span style='color:red;'>Running</span>";} else { echo "$row[status]"; }?></td>
												
												<td class="center"><a href='system_track_disciplinary_cases_details.php?track=<?php echo $row["app_no"]; ?>' style='color:#337ab7'>Details</a></td>
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
