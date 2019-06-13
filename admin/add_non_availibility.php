<?php
	include("session.php");
	error_reporting(E_ALL & ~(E_STRICT|E_NOTICE));
	ini_set("display_errors", 0);

	include("connect.php");
	
	$dates = $_POST['dates'];
	$reason = $_POST['reason'];
	if (isset($_POST['Submit'])) {
		if ($dates == ''){
			$error = "<font color='red'>Dates cannot be left blank.</font>";
		}
		else{
			$success = "<font color='green'>New non-availiblity dates successfully published with the following details.</font>";
			mysql_query("INSERT INTO `gh_non_availibility` VALUES ('','$dates','$reason',NOW())");
		}
	}
?>
			<style>
			label.required:after {
				content: " *";
				color: red;
			}
			</style>
			<div id="page-wrapper">
                <!-- /.row -->
                <div class="row">
                    <div class="col-lg-12">
                        <div class="panel panel-default">
                            <div class="panel-heading">
                               Add non-availibility dates
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
											.post_success{
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
                                                <label class="required">Dates</label>
                                                <input class="form-control" name="dates" placeholder="July 5 - August 10, 2017" value="<?php echo $_POST["dates"]; ?>">
                                            </div>
											<div class="form-group col-md-6">
                                                <label>Reason of non-availibility (optional)</label>
                                                <input class="form-control" name="reason" value="<?php echo $_POST["reason"]; ?>">
                                            </div>
											<div class="form-group col-md-12 post_success">
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