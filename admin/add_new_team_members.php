<?php
	include("session.php");
	error_reporting(E_ALL & ~(E_STRICT|E_NOTICE));
	ini_set("display_errors", 0);

	include("connect.php");
	$section = $_GET['section'];
	$name = $_POST['name'];
	$webmail = $_POST['webmail'];
	$phone = $_POST['phone'];
	$post_1 = $_POST['post'];
	$post = addslashes($post_1);
	$usertype = $_POST['usertype'];
	$position = $_POST['position'];
	$image=$_FILES['image']['name'];
	$hostel=$_POST['hostels'];
	

	//$currentdatetime = mysql_query('select now()');
	//$curdatetime = mysql_result($currentdatetime,0);
	//$date = new DateTime('now', new DateTimeZone('Asia/Kolkata'));
	//$curdatetime = $date->format('d-m-Y H:i:s');
	$time_d = date("d");
	$time_m = date("M");
	$time_y = date("Y");
	$target_dir = "uploads/contacts/";
	$target_file_pdf = $target_dir.$_FILES['image']['name'];
	

		


	if (isset($_POST['Submit'])) {
		if ($name == ''){
			$error = "<font color='red'>All fields are required.";
		}
		else if($webmail == ''){
			$error = "<font color='red'>All fields are required.";
		}
		else if($phone == ''){
			$error = "<font color='red'>All fields are required.";
		}
		else if($post == ''){
			$error = "<font color='red'>All fields are required.";
		}
		else if($usertype == ''){
			$error = "<font color='red'>All fields are required.";
		}
		else if($position == ''){
			$error = "<font color='red'>All fields are required.";
		}
		else if($image == ''){
			$error = "Please uplaod Image in prescribed format.";
		}
	/*	else{ 
			$success = "Successfully Updated!";
			$dbh->query("INSERT INTO user_contact_sa VALUES ('$webmail','$name','$phone','$image','$post','$usertype','$position')");
			move_uploaded_file($_FILES['image']['tmp_name'],$target_dir.$_FILES['image']['name']);

		} */
		else{
			if($section=='sa'){
				$success = "Successfully Updated!";
				mysql_query("INSERT INTO user_contact_sa VALUES ('$webmail','$name','$phone','$image','$post','$usertype','$position')");
				move_uploaded_file($_FILES['image']['tmp_name'],$target_dir.$_FILES['image']['name']);			
			}
			else if($section=='gymkhana_office'){
				$success = "Successfully Updated!";
				mysql_query("INSERT INTO user_contact_gymkhana_office VALUES ('$webmail','$name','$phone','$image','$post','$usertype','$position')");
				move_uploaded_file($_FILES['image']['tmp_name'],$target_dir.$_FILES['image']['name']);
			}
			else if($section=='counselling_cell'){
				$success = "Successfully Updated!";
				mysql_query("INSERT INTO user_contact_counselling_cell VALUES ('$webmail','$name','$phone','$image','$post','$usertype','$position')");
				move_uploaded_file($_FILES['image']['tmp_name'],$target_dir.$_FILES['image']['name']);
			}
			else if($section=='visiting_artist'){
				$success = "Successfully Updated!";
				mysql_query("INSERT INTO user_contact_visiting_artist VALUES ('$webmail','$name','$phone','$image','$post','$usertype','$position')");
				move_uploaded_file($_FILES['image']['tmp_name'],$target_dir.$_FILES['image']['name']);
			}
			else if($section=='new_sac'){
				$success = "Successfully Updated!";
				mysql_query("INSERT INTO user_contact_new_sac VALUES ('$webmail','$name','$phone','$image','$post','$usertype','$position')");
				move_uploaded_file($_FILES['image']['tmp_name'],$target_dir.$_FILES['image']['name']);
			}
			else if($section=='hostels'){
				$success = "Successfully Updated!";
				mysql_query("INSERT INTO user_contact_hostels VALUES ('$webmail','$name','$phone','$image','$post','$usertype','$hostel','$position')");
				move_uploaded_file($_FILES['image']['tmp_name'],$target_dir.$_FILES['image']['name']);
			}
		}
	}  
?>
			<div id="page-wrapper">
                <!-- /.row -->
                <div class="row">
                    <div class="col-lg-12">
                        <div class="panel panel-default">
                            <div class="panel-heading">
                               Add New Team Member
                            </div>
                            <div class="panel-body">
								<?php
									if($error != ''){
									?>
									  <div class="alert alert-warning">
										<?php if(isset($error)) { echo $error; }  ?>
									  </div>
									<?php
									}
									else if($success != ''){  
									?>
									  <div class="alert alert-success">
										<?php if(isset($success)) {											
											echo $success.$cur_query;
										
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
                                                <label>Name</label>
                                                <input class="form-control" name="name" >
                                            </div>
					    <div class="form-group col-md-6">
                                                <label>Webmail</label>
                                                <input class="form-control" name="webmail" >
                                            </div>
					    <div class="form-group col-md-6">
                                                <label>Phone</label>
                                                <input class="form-control" name="phone" >
                                            </div>
					    <div class="form-group col-md-6">
                                                <label>Post</label>
                                                <input class="form-control" name="post" >
                                            </div>
					    <div class="form-group col-md-6">
                                                <label>Usertype</label>
                                                <input class="form-control" name="usertype" >
                                            </div>
					    <div class="form-group col-md-6">
                                                <label>Position</label>
                                                <input class="form-control" name="position" >
                                            </div>
					   </div>
					   <div class="form-group col-md-6">
                                                <label>Image</label>
                                                <input class="form-control" type="file" name="image">
                                            </div>
					    
					    <?php
						if($section=='hostels'){ ?>
							<div class='form-group col-md-6'>
								<label>Hostel</label>
								<input class="form-control" name="hostel">
							</div>
					<?php	}
					?>	
					    <div class="form-group col-md-12">
					    <button type="submit" name="Submit" class="btn btn-primary">Submit</button>
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
