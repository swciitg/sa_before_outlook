<?php 
	include("session.php");
	include("connect.php");
	error_reporting(0);
	
	$id = $login_session;
	$query2 = "SELECT * FROM leave_request ORDER BY application_time DESC ";
	$result2 = mysql_query($query2);	
	$isindb    = mysql_num_rows($result2);	
?>
			<div id="page-wrapper">
                <!-- /.row -->
                <div class="row">
                    <div class="col-lg-12">
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                Station Leave Request(s)
                            </div>
							<div class="panel-body">
								<?php if($isindb == 1){ ?>
                                <div class="dataTable_wrapper">
                                    <table class="table table-striped table-bordered table-hover" id="dataTables-example">
										<thead>
											<tr> 
											  <th valign="top" bgcolor="#dedede"> <font>Request No.</font></th>
											  <th valign="top" bgcolor="#dedede"> <font>Request By</font></th>
											  <th valign="top" bgcolor="#dedede"> <font>Leaving Date</font></th>
											  <th valign="top" bgcolor="#dedede"> <font>Returning Date</font></th>
											  <th valign="top" bgcolor="#dedede"> <font>Destination</font></th>
											  <th valign="top" bgcolor="#dedede"> <font>Purpose of visit</font></th>
											</tr>
										</thead>
										<tbody>
										<?php
											while ($row = mysql_fetch_array($result2)) {
												$request_no = $row[1];
												$name = $row[3];
												$from = $row[4];
												$to = $row[5];
												$location = $row[6];
												$purpose = $row[7];
											?>
                                            <tr class="odd gradeX">
												<td><?php echo "$request_no";?></td>
												<td><?php echo "$name";?></td>
												<td><?php echo "$from";?></td>
                                                <td><?php echo "$to";?></td>
												<td><?php echo "$location";?></td>
												<td><?php echo "$purpose";?></td>
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
 