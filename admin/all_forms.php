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
                                All Forms
                            </div>
                            <!-- /.panel-heading -->
                            <div class="panel-body">
                                <div class="dataTable_wrapper">
                                    <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                                        <thead>
                                            <tr>
                                                <th>Form No.</th>
                                                <th>Subject</th>
												<th colspan="2">Format</th>
                                                <th>Updated Time</th>
                                                <th>Edit</th>
                                                <th>Delete</th>
                                            </tr>
                                        </thead>
                                        <tbody>
										<?php 
											include("connect.php");
											
											if ($user_type == '1') {
												$current_location = "All";
											}
											if($login_session == 'admin'){
											  // Get details of files from Database and put them in variables
											  $query = "SELECT * FROM forms";
											  $result = mysql_query($query);
											  //echo "$fno $fname $nameno $fno2 $fname2";
											}
											else{
											  // Get details of files from Database and put them in variables
											  $query2 = "SELECT * FROM forms WHERE department = '113' ";
											  $result2 = mysql_query($query2);
											  //echo "$fno $fname $nameno $fno2 $fname2";
											}
												
											while ($row = mysql_fetch_array($result2)) {
												$formid = $row[0];
												$formno = $row[3];
												$subject = $row[2];
												$pdf = $row[5];
												$doc = $row[4];
												$time = $row[6];
												$link = $row[7];
											?>
                                            <tr class="odd gradeX">
												<td><?php echo "$formno";?></td>
                                                <td><?php echo "$subject";?></td>
												<?php
												if($link !=''){
													echo "<td style='text-align:center;'><font size='2'><a href='$link' target='_blank'>Link</a></td>";
													echo "<td style='text-align:center;'><font size='2'></td>";
												}
												else{
													echo "<td style='text-align:center;'><font size='2'><a href='uploads/$pdf' target='_blank'>PDF</a></td>";
													echo "<td style='text-align:center;'><font size='2'><a href='uploads/$doc' target='_blank'>Doc</a></td>";
												}
												?>
												<td><?php echo "$time";?></td>
												<td class="center"><a href='system_edit_form.php?edit=<?php echo $formid; ?>' style='color:#337ab7'>Edit</a></td>
												<td class="center"><a style="color:red" href='system_all_forms.php?delete=<?php echo $formid; ?>' style='color:#337ab7'>Delete</a></td>
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
								<a href="system_add_new_form.php" class="btn btn-primary">Add New Form</a>
							</div>
                        </div>
                        <!-- /.panel -->
                    </div>
                    <!-- /.col-lg-12 -->
                </div>
            </div>
            <!-- /#page-wrapper -->