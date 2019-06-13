<?php
	include("session.php");
	error_reporting(E_ALL & ~(E_STRICT|E_NOTICE));
	ini_set("display_errors", 0);

	include("connect.php");
	
	$current_location = '113';
	$fno = $_POST['fileno'];
	$fdesc = $_POST['filedesc'];
	//$fcode = $_POST['filecode'];
	$link = $_POST['link'];
	$onlinelink = $_POST['onlinelink'];
	//$currentdatetime = mysql_query('select now()');
	//$curdatetime = mysql_result($currentdatetime,0);
	$date = new DateTime('now', new DateTimeZone('Asia/Kolkata'));
	$curdatetime = $date->format('d-m-Y H:i:s');
	$idindb = mysql_query("SELECT * FROM forms where form_no = '$fno' ");
	$isidindb = mysql_num_rows($idindb);
	//for Uploading Attachment
	$pdf=$_FILES['pdf']['name'];
	//echo $pdf;
	$doc=$_FILES['doc']['name'];
	$target_dir = "uploads/";
	$target_file_pdf = $target_dir.$_FILES['pdf']['name'];
	$target_file_doc = $target_dir.$_FILES['doc']['name'];
	//$pdfindb = mysql_query("SELECT * FROM forms where pdf = '$pdf' ");
	//$ispdfindb = mysql_num_rows($pdfindb);
	//$docindb = mysql_query("SELECT * FROM forms where doc = '$doc' ");
	//$isdocindb = mysql_num_rows($docindb);
	$idindb2 = mysql_query("SELECT * FROM forms where subject = '$fdesc' ");
	$isidindb2 = mysql_num_rows($idindb2);
	//echo"$isidindb";
	if (isset($_POST['Submit'])) {
		if ($fno == ''){
			$error = "<font color='red'>All fields are required.";
		}else if ($isidindb == 1){
			$error = "File [ <b>$fno</b> ]<font color='red'> is already in the database";
		}
		else if ($fdesc == ''){
			$error = "<font color='red'>All fields are required.";
		}
		else if ($isidindb2 == 1){
			$error = "File [ <b>$fdesc</b> ]<font color='red'> is already in the database";
		}
		else if($link != ''){
			if($onlinelink == ''){
				$error = "Please provide a link.";
			}
			else if($login_session == 'admin'){
				$success = "Form Number with <b>$fno - $fdesc</b> is successfully saved into the database.";
				mysql_query("INSERT INTO `forms` VALUES ('','113','$fdesc','$fno','','','$curdatetime','$onlinelink')");
				move_uploaded_file($_FILES['pdf']['tmp_name'],$target_dir.$_FILES['pdf']['name']);
				move_uploaded_file($_FILES['doc']['tmp_name'],$target_dir.$_FILES['doc']['name']);
			}
			else{
				$success = "Form Number with <b>$fno - $fdesc</b> is successfully saved into the database.";
				mysql_query("INSERT INTO `forms` VALUES ('','$current_location','$fdesc','$fno','','','$curdatetime','$onlinelink')");
				move_uploaded_file($_FILES['pdf']['tmp_name'],$target_dir.$_FILES['pdf']['name']);
				move_uploaded_file($_FILES['doc']['tmp_name'],$target_dir.$_FILES['doc']['name']);
			}
		}
		else if($pdf == '' OR $doc == ''){
			$error = "Please uplaod file in both Pdf and Doc format.";
		}
		else if(file_exists($target_file_pdf)) {
			$error = "Sorry, Pdf file with the same name already exists in the upload folder.";
		}
		else if(file_exists($target_file_doc)) {
			$error = "Sorry, Doc file with the same name already exists in the upload folder.";
		}
		//else if ($ispdfindb == 1 AND $isdocindb == 1) {
		//	$error = "Sorry, Both Pdf and Doc/Docx files with the same name already exists in the upload folder. Rename your Pdf and Doc/Docx files and upload it again.";
		//}
		//else if ($isdocindb == 1 AND $isdocindb == 0) {
		//	$error = "Sorry, Pdf file with the same name already exists in the upload folder. Rename your Pdf file and upload it again.";
		//}
		//else if ($isdocindb == 0 AND $isdocindb == 1) {
		//	$error = "Sorry, Doc/Docx file with the same name already exists in the upload folder. Rename your Doc/Docx file and upload it again.";
		//}
		else if($login_session == 'admin'){
			$success = "Form Number with <b>$fno - $fdesc</b> is successfully saved into the database.";
			mysql_query("INSERT INTO `forms` VALUES ('','113','$fdesc','$fno','$doc','$pdf','$curdatetime','$link')");
			move_uploaded_file($_FILES['pdf']['tmp_name'],$target_dir.$_FILES['pdf']['name']);
			move_uploaded_file($_FILES['doc']['tmp_name'],$target_dir.$_FILES['doc']['name']);
		}
		else{
			$success = "Form Number with <b>$fno - $fdesc</b> is successfully saved into the database.";
			mysql_query("INSERT INTO `forms` VALUES ('','$current_location','$fdesc','$fno','$doc','$pdf','$curdatetime','$link')");
			move_uploaded_file($_FILES['pdf']['tmp_name'],$target_dir.$_FILES['pdf']['name']);
			move_uploaded_file($_FILES['doc']['tmp_name'],$target_dir.$_FILES['doc']['name']);
		}
	}
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
                                        <form name="form1" method="POST" class="col s12" action="" enctype="multipart/form-data">
                                            <div class="form-group col-md-6">
                                                <label>Form Number</label>
                                                <input class="form-control" name="fileno">
                                            </div>
											<div class="form-group col-md-6">
                                                <label>Form Description</label>
                                                <input class="form-control" name="filedesc" >
                                            </div>
											<script type='text/javascript'>//<![CDATA[
											$(window).load(function(){
											$(".answer").hide();
											$(".link").click(function() {
												if($(this).is(":checked")) {
													$(".answer").show();
													$(".pdf").hide();
													$(".doc").hide();
												} else {
													$(".answer").hide();
													$(".pdf").show();
													$(".doc").show();
												}
											});
											});//]]> 

											</script>
											<div class="form-group col-md-12 question">
												<label for="link">Online Link</label>
                                                <input type="checkbox" id="link" name="link" class="link"/>
                                            </div>
											<div class="form-group col-md-12 answer">
                                                <label>Link</label>
                                                <input class="form-control" name="onlinelink" placeholder="Must include http:// or https://">
                                            </div>
											<div class="form-group col-md-6 pdf">
                                                <label>PDF</label>
                                                <input class="form-control" type="file" name="pdf">
                                            </div>
											<div class="form-group col-md-6 doc">
                                                <label>Doc</label>
                                                <input class="form-control" type="file" name="doc">
                                            </div>
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