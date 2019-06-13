<?php 
	include("session.php");
	include("connect.php");
	error_reporting(1);
	
	
	$query2 = "SELECT * FROM railway_concession_1 WHERE (eligible='' AND approval_result='') ORDER BY date_of_filling DESC";
	
	$result2 = mysql_query($query2);	
	$isindb    = mysql_num_rows($result2);	
?>

<div id="page-wrapper">
	<!-- /.row -->
        <div class="row">
        	<div class="col-lg-12">
                	<div class="panel panel-default">
                            <div class="panel-heading">
                                Recent Railway Concession Applications
                            </div>
				
							<div class="panel-body">
								<?php
									 if($isindb !=0 ){ ?>
                                <div class="dataTable_wrapper">
                                    <table class="table table-striped table-bordered table-hover" id="">
										<thead>
											<tr> 
											  <th valign="top" bgcolor="#dedede"> <font>Application No.</font></th>
											  <th valign="top" bgcolor="#dedede"> <font>Applicant</font></th>
											  <th valign="top" bgcolor="#dedede"> <font>Applied On</font></th>
											  <th valign="top" bgcolor="#dedede"> <font>Onward Journey/ Return Date</font></th>
											  <th valign="top" bgcolor="#dedede"> <font>From Station</font></th>
											  <th valign="top" bgcolor="#dedede"> <font>To Station</font></th>
										          <th valign="top" bgcolor="#dedede"> <font>Status</font></th>
											  <th valign="top" bgcolor="#dedede"> <font>Details</font></th>
											</tr>
										</thead>
										<tbody>
										<?php
											while ($row = mysql_fetch_array($result2)) {
												//$id = $row['id'];
												$application_no = $row['application_no'];
												$applied_on   = $row['date_of_filling'];
												$from_station = $row['departure_station'];
												$to_station = $row['arrival_station'];
												$journey_date = $row['journey_date'];
												$return_date = $row['return_date'];
												$student_name = $row['stud_name'];
												$status = $row['approval_result'];
												$edit = $row['edit'];
												$eligible = $row['eligible'];
												
											?>
                                            <tr class="odd gradeX" <?php if($status == "approved"){echo "style='color:green'";}?>>
												<td><?php echo "$application_no";?></td>
												<td><?php echo "$student_name";?></td>
												<td><?php echo "$applied_on";?></td>
                                                						<td><?php if($return_date==''){ echo $journey_date."/ NA";} else{ echo "$journey_date/ $return_date"; }?></td>
												<td><?php echo "$from_station";?></td>
												<td><?php echo "$to_station";?></td>
                                               <?php if ($status == "" AND $eligible != "yes" AND $edit != "yes") { ?>
                                                <td><b style="color:#d3b62a;"></b> <?php echo "<span style='color: blue;'>  Application Pending  </span>"; ?> </td>
												
												<?php } else if($status != "") {  ?>
												
                                                <td><b style="color:#d3b62a;"></b> <?php if($status == "approved"){echo "<span style='color:green;'>Application Approved.</span>";} else{echo "<span style='color:red;'> $status </span>";} ?></td>
												<?php } else if($status == "" AND $eligible == "yes") { ?>
                                                <td><b style="color:#d3b62a;"></b> <?php echo "<span style='color: brown;'>  Eligible  </span>"; ?> </td>
												<?php } else if($status== "" AND $edit == "yes") { ?>
                                                <td><b style="color:#d3b62a;"></b> <?php echo "<span style='color: yellow;'>  Edit Required  </span>"; ?> </td>
												<?php } ?>  
												<td class="center"><a href='system_track_railway_concession_application_details.php?track=<?php echo $application_no; ?>' style='color:#337ab7'>Details</a></td>
                            </tr>
											<?php
											}
											?>
										</tbody>
                                    </table>
                                </div>
                                <!-- /.table-responsive -->
								<?php }
								else{
									echo "No new application.";
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
 
