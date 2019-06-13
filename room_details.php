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
                                All Rooms
                            </div>
                            <!-- /.panel-heading -->
							<div class="panel-body">
                                <div class="dataTable_wrapper">
                                    <table class="table table-striped table-bordered table-hover" id="">
                                        <thead>
                                            <tr>
                                                <th valign="top" bgcolor="#dedede">Room No</th>
                                                <th valign="top" bgcolor="#dedede">Roll No</th>
												<th valign="top" bgcolor="#dedede">Name</th>
                                            </tr>
                                        </thead>
                                        <tbody>
										<?php 
											include("connect.php");
											
											$query2 = "SELECT * FROM studentinfo";
											$result2 = mysql_query($query2);
											
											while ($row = mysql_fetch_array($result2)) {
												$stud_id = $row[0];
												$stud_rollno = $row[2];
												$stud_name = $row[1];
												$stud_webmail = $row[5];
												$stud_programme = $row[9];
												$stud_discipline = $row[10];
												$stud_room = $row[7];
												$stud_hostel = $row[8];
												
											?>
                                            <tr class="odd gradeX">
												<td><?php echo "$stud_room";?></td>
                                                <td><?php echo "$stud_rollno";?></td>
												<td><?php echo "$stud_name";?></td>
											</tr>
											<?php } ?>
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
            <!-- /#page-wrapper -->
		</div>