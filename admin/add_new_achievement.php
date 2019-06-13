<?php
	include("session.php");
	error_reporting(E_ALL & ~(E_STRICT|E_NOTICE));
	ini_set("display_errors", 0);

	include("connect.php");
	
	$fno = $_POST['achtitle'];
	$fdesc = $_POST['achdesc'];
	$onlinelink = $_POST['onlinelink'];
	//$currentdatetime = mysql_query('select now()');
	//$curdatetime = mysql_result($currentdatetime,0);
	//$date = new DateTime('now', new DateTimeZone('Asia/Kolkata'));
	$curdatetime = date('Y-m-d H:i:s');
	$time_d = date("d");
	$time_m = date("M");
	$time_y = date("Y");
	if (isset($_POST['Submit'])) {
		if ($fno == ''){
			$error = "<font color='red'>All fields are required.";
		}
		else if ($fdesc == ''){
			$error = "<font color='red'>All fields are required.";
		}
		else if($onlinelink == ''){
			$error = "Please provide a link.";
		}
		else{
			$success = "An achievement with title - <b>$fno</b> is successfully published.";
			mysql_query("INSERT INTO `achievements` VALUES ('','$time_d','$time_m','$time_y','$fno','$fdesc','$onlinelink','$curdatetime')");
		}
	}
?>
			<div id="page-wrapper">
                <!-- /.row -->
                <div class="row">
                    <div class="col-lg-12">
                        <div class="panel panel-default">
                            <div class="panel-heading">
                               Add New Achievement
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
                                                <label>Achievement Title</label>
                                                <input class="form-control" name="achtitle" value="<?php echo $row["title"]; ?>">
                                            </div>
											<div class="form-group col-md-6">
                                                <label>Short Description</label>
                                                <input class="form-control" name="achdesc" value="<?php echo $row["description"]; ?>">
                                            </div>
											<div class="form-group col-md-6">
                                                <label>Read more link</label>
                                                <input class="form-control" name="onlinelink" value="<?php echo $row["link"]; ?>" placeholder="Must include http:// or https://">
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
