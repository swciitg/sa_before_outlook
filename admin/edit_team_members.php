<?php
	include("session.php");
	error_reporting(E_ALL & ~(E_STRICT|E_NOTICE));
	ini_set("display_errors", 1);

	include("connect.php");
	
	$id = $_GET['edit'];
	$section = $_GET['section'];
	$name = $_POST['_name'];
	$webmail = $_POST['_webmail'];
	$phone = $_POST['_phone'];
	$post = $_POST['_post'];
	$usertype = $_POST['_usertype'];
	$position = $_POST['_position'];
	$hostel = $_POST['_hostel'];
	$image=$_FILES['image']['name'];
    
        
        
    $prev_image = $_POST['_prev_image'];
   
	//$currentdatetime = mysql_query('select now()');
	//$curdatetime = mysql_result($currentdatetime,0);
	//$date = new DateTime('now', new DateTimeZone('Asia/Kolkata'));
	//$curdatetime = $date->format('d-m-Y H:i:s');
	$time_d = date("d");
	$time_m = date("M");
	$time_y = date("Y");
	$target_dir = "uploads/contacts/";
	$target_file_pdf = $target_dir.$_FILES['image']['name'];
   
	$uploadfile = $target_dir . basename($_FILES['image']['name']);
    
    $hostelArray = array( "Barak", "Brahmaputra", "Dhansiri", "Dibang", "Dihing", "Kamneg", "Kapili", "Manas", "Siang", "Subhansiri", "Umium", "Lohit", "Married Scholar");
		


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
		else if($image == '' and  $prev_image==''){
			$error = "Please uplaod Image in prescribed format.";
		}
        else if ($hostel=='' and $section =='hostels'){
            $error = "Please Select a Hostel";
		}
	/*	else{
			$success = "Successfully Updated!";
			
			$cur_query = "UPDATE user_contact_sa SET phone='$phone' WHERE webmail = '$id'";
			mysql_query ("UPDATE user_contact_sa SET name='$name' WHERE webmail = '$id'");
			mysql_query ("UPDATE user_contact_sa SET webmail='$webmail' WHERE webmail = '$id'");
			mysql_query ("UPDATE user_contact_sa SET phone='$phone' WHERE webmail = '$id'");
			mysql_query ("UPDATE user_contact_sa SET post='$post' WHERE webmail = '$id'");
			mysql_query ("UPDATE user_contact_sa SET usertype='$usertype' WHERE webmail = '$id'");
			mysql_query ("UPDATE user_contact_sa SET position='$position' WHERE webmail = '$id'");
			move_uploaded_file($_FILES['image']['tmp_name'],$target_dir.$_FILES['image']['name']);

		}*/
		else{
                 if($image==''){
                    $image = $prev_image;
                }

			if($section=='sa'){
				
			mysql_query ("UPDATE user_contact_sa SET name='$name',webmail='$webmail',phone='$phone',post='$post',usertype='$usertype',position='$position',image='$image' WHERE webmail = '$id'");
            if($prev_image ==''){		
                move_uploaded_file($_FILES['image']['tmp_name'],$target_dir.$_FILES['image']['name']);
                }
                $success = "Successfully Updated! current image=".$image.": prev image =".$prev_image;
			}
			else if($section=='gymkhana_office'){
				$success = "Successfully Updated!";
			mysql_query ("UPDATE user_contact_gymkhana_office SET name='$name',webmail='$webmail',phone='$phone',post='$post',usertype='$usertype',position='$position',image='$image' WHERE webmail = '$id'");
             if($prev_image ==''){
			    move_uploaded_file($_FILES['image']['tmp_name'],$target_dir.$_FILES['image']['name']);
			    }
            }
			else if($section=='counselling_cell'){
			$post_1=addslashes($post);
			mysql_query ("UPDATE user_contact_counselling_cell SET name='$name',webmail='$webmail',phone='$phone',post='$post_1',usertype='$usertype',position='$position',image='$image' WHERE webmail = '$id'");
             if($prev_image ==''){
			    move_uploaded_file($_FILES['image']['tmp_name'],$target_dir.$_FILES['image']['name']);
                }				
				$success = "Successfully Updated!";
			}
			else if($section=='visiting_artist'){
				$success = "Successfully Updated!";
			mysql_query ("UPDATE user_contact_visiting_artist SET name='$name',webmail='$webmail',phone='$phone',post='$post',usertype='$usertype',position='$position',image='$image' WHERE webmail = '$id'");
                 if($prev_image ==''){
		    	move_uploaded_file($_FILES['image']['tmp_name'],$target_dir.$_FILES['image']['name']);
		    	}
            }		
        	else if($section=='new_sac'){
				$success = "Successfully Updated!";
			mysql_query ("UPDATE user_contact_new_sac SET name='$name',webmail='$webmail',phone='$phone',post='$post',usertype='$usertype',position='$position',image='$image' WHERE webmail = '$id'");
                 if($prev_image ==''){			    
                    move_uploaded_file($_FILES['image']['tmp_name'],$target_dir.$_FILES['image']['name']);
        			}
            }
   			else if($section=='hostels'){
		    $query = "UPDATE user_contact_hostels SET name='$name',webmail='$webmail',phone='$phone',post='$post',usertype='$usertype',position='$position',image='$image',hostel='$hostel' WHERE webmail = '$id'";
            
			mysql_query ("UPDATE user_contact_hostels SET name='$name',webmail='$webmail',phone='$phone',post='$post',usertype='$usertype',position='$position',image='$image',hostel='$hostel' WHERE webmail = '$id'");
             if($prev_image ==''){
			            move_uploaded_file($_FILES['image']['tmp_name'],$target_dir.$_FILES['image']['name']);
                }            
                $success = "Successfully Updated Hostel details !";
			}
		}
	}  
	
/*	$query = "SELECT * FROM user_contact_sa WHERE webmail = '$id' ";
	$result = mysql_query($query);
	$row = mysql_fetch_array($result);  */

	if($section=='sa'){
		$query = "SELECT * FROM user_contact_sa WHERE webmail = '$id' ";
		$result = mysql_query($query);
		$row = mysql_fetch_array($result);
	}
	else if($section=='gymkhana_office'){
		$query = "SELECT * FROM user_contact_gymkhana_office WHERE webmail = '$id' ";
		$result = mysql_query($query);
		$row = mysql_fetch_array($result);
	}
	else if($section=='counselling_cell'){
		$query = "SELECT * FROM user_contact_counselling_cell WHERE webmail = '$id' ";
		$result = mysql_query($query);
		$row = mysql_fetch_array($result);
	}
	else if($section=='visiting_artist'){
		$query = "SELECT * FROM user_contact_visiting_artist WHERE webmail = '$id' ";
		$result = mysql_query($query);
		$row = mysql_fetch_array($result);
	}
	else if($section=='new_sac'){
		$query = "SELECT * FROM user_contact_new_sac WHERE webmail = '$id' ";
		$result = mysql_query($query);
		$row = mysql_fetch_array($result);
	}
	else if($section=='hostels'){
		$query = "SELECT * FROM user_contact_hostels WHERE webmail = '$id' ";
		$result = mysql_query($query);
		$row = mysql_fetch_array($result);
	}
?>
			<div id="page-wrapper">
                <!-- /.row -->
                <div class="row">
                    <div class="col-lg-12">
                        <div class="panel panel-default">
                            <div class="panel-heading">
                               Update Team Members
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
											echo $success;
											echo $cur_query;
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
                                                <input class="form-control" name="_name" value="<?php echo $row["name"]; ?>">
                                            </div>
					                        <div class="form-group col-md-6">
                                                                    <label>Webmail</label>
                                                                    <input class="form-control" name="_webmail" value="<?php echo $row["webmail"]; ?>">
                                                                </div>   
					                        <div class="form-group col-md-6">
                                                                    <label>Phone</label>
                                                                    <input class="form-control" name="_phone" value="<?php echo $row["phone"]; ?>">
                                                                </div>
					                        <div class="form-group col-md-6">
                                                                    <label>Post</label>
                                                                    <input class="form-control" name="_post" value="<?php echo $row["post"]; ?>">
                                                                </div>
					                        <div class="form-group col-md-6">
                                                                    <label>Usertype</label>
                                                                    <input class="form-control" name="_usertype" value="<?php echo $row["usertype"]; ?>">
                                                                </div>
					                        <div class="form-group col-md-6">
                                                                    <label>Position</label>
                                                                    <input class="form-control" name="_position" value="<?php echo $row["position"]; ?>">
                                           </div>
					                       
					                       <div class="form-group col-md-6 pdf">
                                                                    <label>Image</label>
                                                                    <input class="form-control" type="file" name="image">
                                            </div>
    
					                        <?php if($section=='hostels'){ ?>
							                    <div class='form-group col-md-6'>
								                    <label>Hostel</label>
								                    <select class="form-control" name="_hostel" >
                                                            <option hidden value='' > Select Hostel</option>
                                                            <?php foreach ($hostelArray as $hostel)
                                                                 if( $row['hostel']==$hostel and $row['hostel']!='') 
                                                                    echo('<option selected="selected" value='.$hostel.'>'.$hostel.'</option>');
                                                                 else
                                                                    echo('<option value='.$hostel.'>'.$hostel.'</option>');
                                                            ?>
                                                            
                                                    </select>
							                    </div>
					                         <?php } ?>	
                                             <div class="form-group col-md-12">
                                                    <label>Previous image</image>
                                                    <input class="form-control" name="_prev_image" value="<?php echo $row["image"];?>" type="hidden">
                                                    <input class="form-control" name="prev_image" value="<?php echo $row["image"];?>" disabled="disabled">
                                                    <img src="<?php echo $target_dir.$row["image"];?>"  height="350" width="350">

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
