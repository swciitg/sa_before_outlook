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
                                List of all SAC Minutes
                            </div>
                            <!-- /.panel-heading -->
                            <div class="panel-body">
                                <div class="dataTable_wrapper">
                                    <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                                        <thead>
                                            <tr>
                                                <th>Title</th>
												<th>Link</th>
                                                <th colspan="2">Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
										<?php 
											include("connect.php");
											
											$query = "SELECT * FROM sac_minutes";
											$result = mysql_query($query);
												
											while ($row = mysql_fetch_array($result)) {
												$id= $row[0];
												$title = $row[1];
												$link = $row[2];
											?>
                                            <tr class="odd gradeX">
												<td><?php echo "$title";?></td>
												<td><a target='_blank' href='<?php echo "$link";?>'>Link</a></td>
												<td class="center"><a href='system_edit_sac_minutes.php?edit=<?php echo "$id";?>' style='color:green'>Edit</a></td>
												<td class="center"><a href='system_all_sac_minutes.php?delete=<?php echo "$id";?>' style='color:red'>Delete</a></td>
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
								<a href="system_add_new_sac_minutes.php" class="btn btn-primary">Add New Minute</a>
							</div>
                        </div>
                        <!-- /.panel -->
                    </div>
                    <!-- /.col-lg-12 -->
                </div>
            </div>
            <!-- /#page-wrapper -->