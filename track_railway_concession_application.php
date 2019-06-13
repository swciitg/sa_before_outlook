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
                                Railway Concession Application History
                            </div>
                            <!-- /.panel-heading -->
                            <div class="panel-body">
                                <div class="dataTable_wrapper">
                                    <table class="table table-striped table-bordered table-hover" id="">
                                        <thead>
                                            <tr>
						<th>Application No.</th>
                                                <th>Applied On</th>
                                                <th>Journey Date / Return Date</th>
						<th>From Station</th>
						<th>To Station</th>
                                                <th>Status</th>
                                                <th>Details</th>
                                            </tr>
                                        </thead>
                                        <tbody>
										<?php 
											include("connect.php");
											$query2 = "SELECT * FROM railway_concession_1 WHERE webmail = '$login_session'";
											$result2 = mysql_query($query2);
											
											while ($row = mysql_fetch_array($result2)) {
												$id = $row['id'];
												$rc_application_no = $row['application_no'];
												$applied_on   = $row['date_of_filling'];
												$from_station = $row['departure_station'];
												$to_station = $row['arrival_station'];
												$status = $row['approval_result'];
												$journey_date = $row['journey_date'];
												$return_date = $row['return_date'];
												$eligible = $row['eligible'];
												$edit = $row['edit'];
											?>
                                            <tr class="odd gradeX" <?php if($status == "approved"){echo "style='color:green'";}?>>
						<td><?php echo "$rc_application_no";?></td>
						<td><?php echo "$applied_on";?></td>
                                                <td><?php if($return_date==''){ echo $journey_date." / NA";} else{ echo "$journey_date / $return_date"; }?></td>
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
						<td class="center"><a href='system_track_railway_application_details.php?track=<?php echo $rc_application_no; ?>' style='color:#337ab7'>Details</a></td>
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
