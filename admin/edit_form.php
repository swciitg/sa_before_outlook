<?php
	include("session.php");
	error_reporting(E_ALL & ~(E_STRICT|E_NOTICE));
	ini_set("display_errors", 0);

	include("connect.php");
	$id = $_GET['edit'];
	
	//Saving Edited Form
	$date = new DateTime('now', new DateTimeZone('Asia/Kolkata'));
	$curdatetime = $date->format('d-m-Y H:i:s');
	//$fno = $_POST['fno'];
	$fno = $_POST['finoname'];
	$fname = $_POST['sub_update'];
	$flink = $_POST['link_upddate'];
	$query = mysql_query("SELECT * FROM forms WHERE form_no = '$fno' ");
	$fdept = mysql_result($query,0,1);
	$oldpdf = mysql_result($query,0,5);
	$olddoc = mysql_result($query,0,4);
	$idindb = mysql_query("SELECT * FROM forms where form_no = '$fno' ");
	$isidindb = mysql_num_rows($idindb);
	//for Uploading Attachment
	$pdf_update=$_FILES['pdf_update']['name'];
	$doc_update=$_FILES['doc_update']['name'];
	$target_dir = "uploads/";
	$target_file_pdf = $target_dir.$_FILES['pdf_update']['name'];
	$target_file_doc = $target_dir.$_FILES['doc_update']['name'];
	//For Deleting Files from Folder
	$old_file_pdf = $target_dir.$oldpdf;
	$old_file_doc = $target_dir.$olddoc;
	if (isset($_POST['Submit2'])) {
	if ($fno == ''){
		$error = "<font color='red'>Enter Form No.</font>";
	}
	if ($fname == ''){
		$error = "<font color='red'>Enter Form Desc</font>";
	}
	$query1 = "SELECT * FROM forms WHERE id = '$id' ";
	$result1 = mysql_query($query1);
	$row1 = mysql_fetch_array($result1);
	if ($row1["link"] !=''){
		if ($flink == ''){
			$error = "<font color='red'>Enter Form Link</font>";
		}
		else{
			$success = "Successfully Updated!";
			mysql_query ("UPDATE forms SET subject = '$fname' WHERE form_no = '$fno'");
			mysql_query ("UPDATE forms SET link = '$flink' WHERE form_no = '$fno'");
		}
	}
	else if ($fdept == '113' OR $login_session == 'admin'){
		if ($fname != ''){
			if($pdf_update !='' AND $doc_update !=''){
				// Check if file already exists
				if (file_exists($target_file_pdf)) {
					$error = "Sorry, Pdf file with the same name already exists in the upload folder. Rename file and upload it again.";
				}
				else if (file_exists($target_file_doc)) {
					$error = "Sorry, Doc file with the same name already exists in the upload folder. Rename file and upload it again.";
				}
				else{
					$success = "Successfully Updated!";
					mysql_query ("UPDATE forms SET subject = '$fname' WHERE form_no = '$fno'");
					mysql_query ("UPDATE forms SET pdf = '$pdf_update' WHERE form_no = '$fno'");	
					mysql_query ("UPDATE forms SET doc = '$doc_update' WHERE form_no = '$fno'");
					mysql_query ("UPDATE forms SET time = '$curdatetime' WHERE form_no = '$fno'");	
					//Delete Old files
					//unlink($old_file_pdf);
					//unlink($old_file_doc);
					//save Uploaded attachment under upload folder
					move_uploaded_file($_FILES['pdf_update']['tmp_name'],$target_dir.$_FILES['pdf_update']['name']);
					move_uploaded_file($_FILES['doc_update']['tmp_name'],$target_dir.$_FILES['doc_update']['name']);
				}
			}else if($pdf_update !='' AND $doc_update ==''){
					// Check if file already exists
					if (file_exists($target_file_pdf)) {
						$error = "Sorry, Pdf file with the same name already exists in the upload folder. Rename file and upload it again.";
					}
					else{
						$success = "Successfully Updated!";
						mysql_query ("UPDATE forms SET subject = '$fname' WHERE form_no = '$fno'");
						mysql_query ("UPDATE forms SET pdf = '$pdf_update' WHERE form_no = '$fno'");
						mysql_query ("UPDATE forms SET time = '$curdatetime' WHERE form_no = '$fno'");												
						//save Uploaded attachment under upload folder
						move_uploaded_file($_FILES['pdf_update']['tmp_name'],$target_dir.$_FILES['pdf_update']['name']);
					}
			}else if($pdf_update =='' AND $doc_update !=''){
					// Check if file already exists
					if (file_exists($target_file_doc)) {
						$error = "Sorry, Doc file with the same name already exists in the upload folder. Rename file and upload it again.";
					}
					else{
						$success = "Successfully Updated!";
						mysql_query ("UPDATE forms SET subject = '$fname' WHERE form_no = '$fno'");
						mysql_query ("UPDATE forms SET doc = '$doc_update' WHERE form_no = '$fno'");
						mysql_query ("UPDATE forms SET time = '$curdatetime' WHERE form_no = '$fno'");
						//save Uploaded attachment under upload folder
						move_uploaded_file($_FILES['doc_update']['tmp_name'],$target_dir.$_FILES['doc_update']['name']);
					}
			}else{
					$success = "Successfully Updated!".$pdf_update;
					mysql_query ("UPDATE forms SET subject = '$fname' WHERE form_no = '$fno'");
					mysql_query ("UPDATE forms SET time = '$curdatetime' WHERE form_no = '$fno'");
			}
		}else{
			$error = "Something went wrong!!";
		}
	}
	else{
		$error = "This form doesn't belongs to your section/department. You can only delete your section/department forms.";
	}
	}
	
	$query = "SELECT * FROM forms WHERE id = '$id' ";
	$result = mysql_query($query);
	$row = mysql_fetch_array($result);
?>
			<div id="page-wrapper">
                <!-- /.row -->
                <div class="row">
                    <div class="col-lg-12">
                        <div class="panel panel-default">
                            <div class="panel-heading">
                               Update Form No. <b><?php echo $row["form_no"]; ?></b>
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
                                                <label>Form Number</label>
                                                <input class="form-control" name="finoname" value="<?php echo $row["form_no"]; ?>" readonly>
                                            </div>
											<div class="form-group col-md-6">
                                                <label>Form Description</label>
                                                <input class="form-control" name="sub_update" value="<?php echo $row["subject"]; ?>">
                                            </div>
											<?php if($row["link"] == ''){ ?>
											<div class="form-group col-md-6">
                                                <label>PDF</label>
                                                <input class="form-control" type="file" name="pdf_update">
                                            </div>
											<div class="form-group col-md-6">
                                                <label>Doc</label>
                                                <input class="form-control" type="file" name="doc_update">
                                            </div>
											<?php } else{ ?>
											<div class="form-group col-md-6">
                                                <label>Link</label>
                                                <input class="form-control" name="link_upddate" value="<?php echo $row["link"]; ?>">
                                            </div>
											<?php } ?>
											<div class="form-group col-md-12">
												<button type="submit" name="Submit2" class="btn btn-default">Update</button>
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