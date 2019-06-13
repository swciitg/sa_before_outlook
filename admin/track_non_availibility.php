<?php 
	include("session.php");
	include("connect.php");
	error_reporting(0);
	
	$id = $login_session;
	$query2 = "SELECT * FROM gh_non_availibility ORDER BY time DESC";
	$result2 = mysql_query($query2);	
?>
			<div id="page-wrapper">
                <!-- /.row -->
                <div class="row">
                    <div class="col-lg-12">
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                Previous Non-availibility dates
                            </div>
							<div class="panel-body">
                                <div class="dataTable_wrapper">
                                    <table class="table table-striped table-bordered table-hover" id="dataTables-example">
										<thead>
											<tr>
											  <th valign="top" bgcolor="#dedede"> <font>Post Time</font></th>
											  <th valign="top" bgcolor="#dedede"> <font>Dates</font></th>
											  <th valign="top" bgcolor="#dedede"> <font>Reason</font></th>
											</tr>
										</thead>
										<tbody>
										<?php
											while ($row = mysql_fetch_array($result2)) {
												$time = $row['time'];
												$dates = $row['dates'];
												$reason = $row['non_ava_reason'];
											?>
                                            <tr class="odd gradeX">
												<td><?php echo "$time";?></td>
												<td><?php echo "$dates";?></td>
												<td><?php echo "$reason";?></td>
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
 