<?php 
	include("session.php");
	include("connect.php");
	$application_no = $_GET['track'];
	$query = "SELECT * FROM schp_04 WHERE application_no = '$application_no' AND webmail = '$login_session'";
	$result = mysql_query($query);
	$row_track = mysql_fetch_array($result);
	error_reporting(0);

	//files
	$File = $_FILES['file']['name'];
	$tmp_dir = $_FILES['file']['tmp_name'];
	$fileSize = $_FILES['file']['size'];
	$fileSizeKB = (int) ($fileSize/1024);
	$upload_dir_files = 'schp_04/query_files/';
	// renaming file
	$temp = explode(".",$_FILES['file']['name']);
	$newfilename = round(microtime(true)*1) . 'file' .'.' . end($temp);


	$query_ans = $_POST['query_ans'];


	if (isset($_POST['Submit'])) {
		if($fileSizeKB > 400){
			$error = "<font color='red'>You have uploaded supporting documents of size larger than 400 KB.</font>";
		}
		else if($row_track['query_by']=='saoff'){
			$success ="Query successfully answered.";
			mysql_query ("UPDATE schp_04 SET query_ans_saoff ='$query_ans' WHERE application_no = '$application_no'");
			mysql_query ("UPDATE schp_04 SET query_doc_saoff ='$newfilename' WHERE application_no = '$application_no'");
			mysql_query ("UPDATE schp_04 SET query_by ='' WHERE application_no = '$application_no'");
			move_uploaded_file($_FILES["file"]["tmp_name"], $upload_dir_files.$newfilename);
		}
		else if($row_track['query_by']=='hossa'){
			$success ="Query successfully answered.";
			mysql_query ("UPDATE schp_04 SET query_ans_hossa ='$query_ans' WHERE application_no = '$application_no'");
			mysql_query ("UPDATE schp_04 SET query_doc_hossa ='$newfilename' WHERE application_no = '$application_no'");
			mysql_query ("UPDATE schp_04 SET query_by ='' WHERE application_no = '$application_no'");
			move_uploaded_file($_FILES["file"]["tmp_name"], $upload_dir_files.$newfilename);
		}
		else if($row_track['query_by']=='adosa_1' OR $row_track['query_by']=='adosa_2' OR $row_track['query_by']=='dos'){
			$success ="Query successfully answered.";
			mysql_query ("UPDATE schp_04 SET query_ans_dean ='$query_ans' WHERE application_no = '$application_no'");
			mysql_query ("UPDATE schp_04 SET query_doc_dean ='$newfilename' WHERE application_no = '$application_no'");
			mysql_query ("UPDATE schp_04 SET query_by ='' WHERE application_no = '$application_no'");
			move_uploaded_file($_FILES["file"]["tmp_name"], $upload_dir_files.$newfilename);
		}
	}



?>
			<div id="page-wrapper">
                <!-- /.row -->
                <div class="row">
                    <div class="col-lg-12">
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                Answer query for Certify/Forwarding Outside Scholarship Application No.: <b><?php $application_no = $_GET['track']; echo $application_no; ?></b>
                            </div>
							<div class="panel-body">
								<?php
									
									$id = $row_track['id'];
								if($row_track["application_no"] == $application_no){
								?>
								<div class="row">
								    <div class="col-lg-12">

									<form name="schp_04" class="before_success" action=""  accept-charset="utf-8" method="post" enctype="multipart/form-data"> 
									    
										<table class="table table-striped table-bordered table-hover">
										    <tbody>
											<tr>
												<td><b>Query By:<b><?php if($row_track['query_by']=='saoff'){ echo "SA Office";} else if($row_track['query_by']=='hossa'){ echo "HOSSA";} else if($row_track['query_by']=='adosa_1'){ echo "ADOSA1";} else if($row_track['query_by']=='adosa_2'){ echo "ADOSA2";} else if($row_track['query_by']=='dos'){ echo "DOSA";}?></td>
												<td><b></b><?php if($row_track['query_by']=='saoff'){ echo $row_track['query_saoff'];} else if($row_track['query_by']=='hossa'){ echo $row_track['query_hossa'];} else if($row_track['query_by']=='adosa_1'){ echo $row_track['query_dean'];} else if($row_track['query_by']=='adosa_2'){ echo $row_track['query_dean'];} else if($row_track['query_by']=='dos'){ echo $row_track['query_dean'];}?></td>
											</tr>
										    </tbody>
										</table>
									    <div class="form-group col-md-12">
										<label class="required">Answer Query:</label>
										<textarea class="form-control" name="query_ans" ></textarea>
									    </div>
									    <div class="form-group col-md-8">
										<label for="file" class="required">Scanned copy of Supporting document(max 400Kb)[**Only If asked of any**]</label>
										<input type="file" name="file" id="file" class="inputfile"/>
									    </div>



										<div class="row" style="margin-top:2%">
											<div class="col-lg-12">
											 <input type="checkbox" id="checkme" name="tnc" required class="required"/> <b>Declaration:</b> I do hereby declare that the above information is true to the best of my knowledge.I have read all the rules for Certify/Forwarding Outside Scholarship Application. <br/>
												<br/><div class="col-lg-4"></div>
												 
												<div class="col-lg-4">
													<div class="form-group ">
													  
														<button type="submit" class="btn btn-primary" name="Submit"  >Submit Answer to Query</button>
													</div>
												</div>
												<div class="col-lg-4"></div>
											</div>
										    </div>

									</form>

									<?php if($success != ''){ ?>
										<style>
										.before_success{
											display: none;
										}
										.alert-dismissable{
											display: none;
										}
										</style>
									<div class="table-responsive" style="overflow-x: hidden;">
										<div class="alert alert-success">
											<?php if(isset($success)) { echo $success; }?>
										</div>
										<table class="table table-striped table-bordered table-hover">
											<tbody>
												<tr>
													<td><b>Application No.:</b> <?php echo $application_no; ?></td>
													<td><b>Status:</b> Query Has been Successfully answered.</td>
												</tr>
											</tbody>
										</table>
									</div>
									<div class="row" style="margin-top:2%">
											<div class="col-lg-12">
												<div class="col-lg-5"></div>
													<div class="col-lg-2">
														<div class="form-group ">
														    
															<a href='system_track_cos.php'><button type="button" class="btn btn-default">Check Old Booking(s)</button></a>
														</div>
													</div>
												<div class="col-lg-5">
												</div>
											</div>
										</div>
									</div>

									
								    </div>
								</div>
		

	<?php			}  }
							?>


								
	
							</div>
                            <!-- /.panel-body -->
                        </div>
                        <!-- /.panel -->
                    </div>
                    <!-- /.col-lg-12 -->
                </div>
            </div>
            <!-- /#page-wrapper -->
 
