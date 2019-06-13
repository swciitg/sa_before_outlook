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
                                All Vendors
                            </div>
                            <!-- /.panel-heading -->
                            <div class="panel-body">
                                <div class="dataTable_wrapper">
                                    <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                                        <thead>
                                            <tr>
                                                <th>Name of Vendor</th>
						<th>Buisness type </th>
                                                <th>Vendor profile form Link</th>
						<th colspan="2">Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
										<?php 
											include("connect.php");
											
											$query = "SELECT * FROM vendor_details";
											$result = mysql_query($query);
												
											while ($row = mysql_fetch_array($result)) {
												$id= $row[0];
												$name= $row[1];
												$type = $row[2];
												$link = "uploads/".$row[3];
											?>
                                            <tr class="odd gradeX">
												<td><?php echo "$name";?></td>
												<td><?php echo "$type";?></td>
												<td><a target='_blank' href='<?php echo "$link";?>'>PDF</a></td>
												<td class="center"><a href='system_edit_vendor_details.php?edit=<?php echo "$id";?>' style='color:green'>Edit</a></td>
												<td class="center"><a href='system_all_vendor_details.php?delete=<?php echo "$id";?>' style='color:red'>Delete</a></td>
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
								<a href="system_add_new_vendor_details.php" class="btn btn-primary">Add New Vendor</a>
							</div>
                        </div>
                        <!-- /.panel -->
                    </div>
                    <!-- /.col-lg-12 -->
                </div>
            </div>
            <!-- /#page-wrapper -->
