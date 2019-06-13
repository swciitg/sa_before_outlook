<?php 
	include("session.php");
	error_reporting(0);
	
	include("connect.php");
	$id = $login_session;
	$query = "SELECT * FROM studentinfo WHERE webmail = '$id'";
	$result = mysql_query($query);
	$row_id = mysql_fetch_array($result);
?>
			<div id="page-wrapper">
                <!-- /.row -->
                <div class="panel panel-info">
				   <div class="panel-heading">
					  <i class="fa fa-info-circle fa-fw"></i>Personal Informations
				   </div>
				   <!-- /.panel-heading -->
				   <div class="panel-body">
					  <div class="row">
						 <div class="col-lg-12">
							<div class="col-lg-4">
							</div>
							<div class="col-lg-4">
							   <img src="images/<?php echo $row_id["pic"]; ?>" alt="Avatar" width="220" height="220" class="img-responsive img-rounded proimg">
							</div>
							<div class="col-lg-4">
							</div>
						 </div>
					  </div>
					  <hr>
					  <div class="row">
						 <div class="col-lg-12">
							<div class="col-lg-4">
							   <div class="form-group ">
								  <label>Name:</label>
								  <span><?php echo $row_id["name"]; ?></span>
							   </div>
							</div>
							<div class="col-lg-4">
							   <div class="form-group ">
								  <label>Roll No:</label>
								  <span><?php echo $row_id["studentId"]; ?></span>
							   </div>
							</div>
							<div class="col-lg-4">
							   <div class="form-group ">
								  <label>Webmail:</label>
								  <span><?php echo $row_id["webmail"]; ?></span>
							   </div>
							</div>
						 </div>
					  </div>
					  <div class="row">
						 <div class="col-lg-12">
							<div class="col-lg-4">
							   <div class="form-group ">
								  <label>Room No:</label>
								  <span><?php echo $row_id["room_no"]; ?></span>
							   </div>
							</div>
							<div class="col-lg-4">
							   <div class="form-group ">
								  <label>Hostel:</label>
								  <span><?php echo $row_id["hostel"]; ?></span>
							   </div>
							</div>
							<div class="col-lg-4">
							   <div class="form-group ">
								  <label>Phone No:</label>
								  <span><?php echo $row_id["cellNo"]; ?></span>
							   </div>
							</div>
						 </div>
					  </div>
					  <div class="row">
						 <div class="col-lg-12">
							<div class="col-lg-4">
							   <div class="form-group ">
								  <label>Alt. Phone:</label>
								  <span><?php echo $row_id["alt_phone"]; ?></span>
							   </div>
							</div>
							<div class="col-lg-4">
							   <div class="form-group ">
								  <label>Programme:</label>
								  <span><?php echo $row_id["program"]; ?></span>
							   </div>
							</div>
							<div class="col-lg-4">
							   <div class="form-group ">
								  <label>Department:</label>
								  <span><?php echo $row_id["department"]; ?></span>
							   </div>
							</div>
						 </div>
					  </div>
					  <div class="row">
						<div class="form-group col-md-12" style="padding-left:30px;">
							<a href='system_update_student_details.php?stud_id=<?php echo $id; ?>' style='color:white'><button type="button" class="btn btn-primary">Edit</button></a>
						</div>
					  </div>
				   </div>
				</div>
            </div>
            <!-- /#page-wrapper -->
 