<?php 
	include("session.php"); 
	error_reporting(0);
	
	$error = "";
	$success = "";
	$searchTerm      = $_POST['search_student'];
	$curdatetime     = date("Y-m-d h:i:sa");
	
	$idindb          = mysql_query("SELECT * FROM students where roll_no LIKE '%".$searchTerm."%' OR name LIKE '%".$searchTerm."%' OR webmail LIKE '%".$searchTerm."%' OR room LIKE '%".$searchTerm."%' OR hostel LIKE '%".$searchTerm."%'");
	$isidindb        = mysql_num_rows($idindb);
	
	if (isset($_POST['Submit'])) {
		if($searchTerm == ""){
			$error = "Enter something...";
		}
		else if ($isidindb == 0) {
			$error = "No records found for ".$searchTerm."!";
			mysql_query("INSERT INTO user_activity VALUES ('','$login_session','$name','$current_dept','Searched for $searchTerm','public','$curdatetime')");
		}
		else{
			$success = $isidindb." records found for <b>".$searchTerm."</b>";
			mysql_query("INSERT INTO user_activity VALUES ('','$login_session','$name','$current_dept','Searched for $searchTerm','public','$curdatetime')");
		}
	}
?>
			<div id="page-wrapper">
                <!-- /.row -->
                <div class="row">
                    <div class="col-lg-12">
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                Search Student's Details
                            </div>
                            <!-- /.panel-heading -->
                            <div class="panel-body">
								<div class="row">
                                    <div class="col-lg-6 col-md-offset-3" style="margin-top: 2%;margin-bottom: 2%;">
                                        <form role="form" name="form1" method="POST" action="">
                                            <div class="input-group  custom-search-form">
												<input type="text" class="form-control" name="search_student" placeholder="Enter Name/Roll No/Webmail/Hostel/Room No">
												<span class="input-group-btn">
													<button class="btn btn-primary" type="submit" name="Submit">
														<i class="fa fa-search"></i> Search
													</button>
												</span>
											</div>
										</form>
										<?php 
											if($error != ''){
											?>
											  <div class="alert alert-warning" style="width:80%;margin-top:5%">
												<?php if(isset($error)) { echo $error; }?>
											  </div>
											<?php
											}
											else if($success != ''){
											?>
											  <div class="alert alert-success" style="width:80%;margin-top:5%">
												<?php if(isset($success)) {											
													echo $success;
												} 
												?>
											  </div>
											<?php
											}
											else{
												//echo "";
											}
										?>
									</div>
								</div>
								<?php if($success != ""){?>
                                <div class="dataTable_wrapper">
                                    <table class="table table-striped table-bordered table-hover" id="">
                                        <thead>
                                            <tr>
                                                <th valign="top" bgcolor="#dedede">Roll No</th>
												<th valign="top" bgcolor="#dedede">Name</th>
												<th valign="top" bgcolor="#dedede">Webmail</th>
                                                <th valign="top" bgcolor="#dedede">Programme</th>
                                                <th valign="top" bgcolor="#dedede">Discipline</th>
                                                <th valign="top" bgcolor="#dedede">Room No</th>
												<th valign="top" bgcolor="#dedede">Hostel</th>
                                            </tr>
                                        </thead>
                                        <tbody>
										<?php 
											include("connect.php");
											
											$query2 = "SELECT * FROM students where roll_no LIKE '%".$searchTerm."%' OR name LIKE '%".$searchTerm."%' OR webmail LIKE '%".$searchTerm."%' OR room LIKE '%".$searchTerm."%' OR hostel LIKE '%".$searchTerm."%'";
											$result2 = mysql_query($query2);
											
											while ($row = mysql_fetch_array($result2)) {
												$stud_rollno = $row[1];
												$stud_name = $row[2];
												$stud_webmail = $row[3];
												$stud_programme = $row[4];
												$stud_discipline = $row[5];
												$stud_room = $row[6];
												$stud_hostel = $row[7];
												
											?>
                                            <tr class="odd gradeX">
                                                <td><?php echo "$stud_rollno";?></td>
												<td><?php echo "$stud_name";?></td>
												<td><?php echo "$stud_webmail";?></td>
												<td><?php echo "$stud_programme";?></td>
												<td><?php echo "$stud_discipline";?></td>
												<td><?php echo "$stud_room";?></td>
												<td><?php echo "$stud_hostel";?></td>
                                            </tr>
											<?php
											}
											?>
                                        </tbody>
                                    </table>
                                </div>
                                <!-- /.table-responsive -->
								<?php } ?>
                            </div>
                            <!-- /.panel-body -->
                        </div>
                        <!-- /.panel -->
                    </div>
                    <!-- /.col-lg-12 -->
                </div>
            </div>
            <!-- /#page-wrapper -->