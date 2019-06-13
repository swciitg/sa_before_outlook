<?php
	include("session.php");
	error_reporting(E_ALL & ~(E_STRICT|E_NOTICE));
	ini_set("display_errors", 0);

	include("connect.php");
	
	$id = $_GET['edit'];
	$vname = $_POST['name'];
	$vtype = $_POST['type'];
	$pdf=$_FILES['pdf']['name'];

	//$currentdatetime = mysql_query('select now()');
	//$curdatetime = mysql_result($currentdatetime,0);
	//$date = new DateTime('now', new DateTimeZone('Asia/Kolkata'));
	//$curdatetime = $date->format('d-m-Y H:i:s');
	$time_d = date("d");
	$time_m = date("M");
	$time_y = date("Y");
	$target_dir = "uploads/";
	$target_file_pdf = $target_dir.$_FILES['pdf']['name'];
	$uploadfile = $target_dir . basename($_FILES['pdf']['name']);
	



	if (isset($_POST['Submit'])) {
		if ($vname == ''){
			$error = "<font color='red'>All fields are required.";
		}
		else if($vtype == ''){
			$error = "All fields are required.";
		}
		else if($pdf == ''){
			$error = "Please provide a pdf.";
		}
		else{
			$success = "Successfully Updated!";
			mysql_query ("UPDATE vendor_details SET name_of_vendor = '$vname' WHERE id = '$id'");
			mysql_query ("UPDATE vendor_details SET buisness_type = '$vtype' WHERE id = '$id'");			
			mysql_query ("UPDATE vendor_details SET vendor_profile_form = '$pdf' WHERE id = '$id'");
			move_uploaded_file($_FILES['pdf']['tmp_name'],$target_dir.$_FILES['pdf']['name']);
		}
	}
	$query = "SELECT * FROM vendor_details WHERE id = '$id' ";
	$result = mysql_query($query);
	$row = mysql_fetch_array($result);
?>
			<div id="page-wrapper">
                <!-- /.row -->
                <div class="row">
                    <div class="col-lg-12">
                        <div class="panel panel-default">
                            <div class="panel-heading">
                               Update Vendor Details
                            </div>
                            <div class="panel-body">
								<?php 
									if($error != ''){
									?>
									  <div class="alert alert-warning">
										<?php if(isset($error)) { echo $error; }?>
									  </div>
									<?php
									}
									else if($success != ''){
									?>
									  <div class="alert alert-success">
										<?php if(isset($success)) {											
											echo $success;
										?>
										<style>
											.ongoing{
												display: none;
											}
										</style>
										<?php
										} 
										?>
									  </div>
									<?php
									}
									else{
										//echo "";
									}
								?>
                                <div class="row">
                                    <div class="col-lg-12">
                                        <form name="form2" method="POST" class="col s12" action="" enctype="multipart/form-data">
                                            <div class="form-group col-md-6">
                                                <label>Name of Vendor</label>
                                                <input class="form-control" name="name" value="<?php echo $row["name_of_vendor"]; ?>">
                                            </div>
					    <div class="form-group col-md-6">
                                                <label>Business Type</label>
                                                <input class="form-control" name="type" value="<?php echo $row["buisness_type"]; ?>">
                                            </div>
											<div class="form-group col-md-12">
                                                <label>Vendor Profile Form</label>
                                                	<input class="form-control" type="file" name="pdf">
						</div>
											<div class="form-group col-md-12">
												<button type="submit" name="Submit" class="btn btn-primary">Update</button>
											</div>
                                        </form>
                                    </div>
                                </div>
                                <!-- /.row (nested) -->
                            </div>
                            <!-- /.panel-body -->
                        </div>
                        <!-- /.panel -->
                    </div>
                    <!-- /.col-lg-12 -->
                </div>
                <!-- /.row -->
            </div>
            <!-- /#page-wrapper -->
