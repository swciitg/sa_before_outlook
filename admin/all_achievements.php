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
                                All Achievements
                            </div>
                            <!-- /.panel-heading -->
                            <div class="panel-body">
                                <div class="dataTable_wrapper">
                                    <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                                        <thead>
                                            <tr>
                                                <th>Time</th>
                                                <th>Title</th>
												<th>Description</th>
												<th>Link</th>
                                                <th colspan="2">Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
										<?php 
											include("connect.php");
											
											$query = "SELECT * FROM achievements";
											$result = mysql_query($query);
												
											while ($row = mysql_fetch_array($result)) {
												$id= $row[0];
												$date_d = $row[1];
												$date_m = $row[2];
												$date_y = $row[3];
												$title = $row[4];
												$description = $row[5];
												$link = $row[6];
											?>
                                            <tr class="odd gradeX">
												<td><?php echo "$date_d $date_m $date_y";?></td>
                                                <td><?php echo "$title";?></td>
												<td><?php echo "$description";?></td>
												<td><a target='_blank' href='<?php echo "$link";?>'>Link</a></td>
												<td class="center"><a href='system_edit_achievement.php?edit=<?php echo "$id";?>' style='color:green'>Edit</a></td>
												<td class="center"><a href='system_all_achievements.php?delete=<?php echo "$id";?>' style='color:red'>Delete</a></td>
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
							<div class="form-group" style="margin-left:1%;">
								<a href="system_add_new_achievement.php" class="btn btn-primary">Add New Achievement</a>
							</div>
                        </div>
                        <!-- /.panel -->
                    </div>
                    <!-- /.col-lg-12 -->
                </div>
            </div>
            <!-- /#page-wrapper -->
