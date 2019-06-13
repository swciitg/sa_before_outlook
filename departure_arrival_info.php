<?php
	include("session.php");
	error_reporting(E_ALL & ~(E_STRICT|E_NOTICE));
	ini_set("display_errors", 0);

	include("connect.php");
	$id = $login_session;
	
	$departure       = $_POST['departure'];
	$arrival         = $_POST['arrival'];
	$place_visit     = $_POST['place_visit'];
	$purpose_visit   = $_POST['purpose_visit'];
	$user_activity   = "Station leave application from Webmail ID ".$id;
	$currentdatetime = mysql_query('select now()');
	$curdatetime     = mysql_result($currentdatetime, 0);
	$curYear         = date('Y');
	$error = "";
	$success = "";
	
	$min_range=10000;
	$max_range=99999;
	$newID = rand($min_range,$max_range);
	
	$request_id = '113/SSL/'.$curYear.'/'.$newID;
	
	if (isset($_POST['Submit'])) {
		if ($departure == '' OR $arrival == '' OR $place_visit == '' OR $purpose_visit == '') {
			$error = "<font color='red'>All fields are required.</font>";
		}
		else {
			$success = "<font color='green'>Request successfully submitted with the following details.</font>";
			mysql_query("INSERT INTO leave_request VALUES ('','$request_id','$login_session','$name','$departure','$arrival','$place_visit','$purpose_visit','$curdatetime')");
		}
	}
	$query = "SELECT * FROM studentinfo WHERE webmail = '$id' ";
	$result = mysql_query($query);
	$row = mysql_fetch_array($result);
?>
			<link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
			<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
			<script>
			  $( function() {
				$( "#departure" ).datepicker({minDate: "0D", dateFormat: "dd/mm/yy",showAnim: "slideDown" });
			  } );
			  $( function() {
				$( "#arrival" ).datepicker({minDate: "0D", dateFormat: "dd/mm/yy",showAnim: "slideDown" });
			  } );
			</script>
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
                               Station Leave Request
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
                                        <form role="form" name="form1" method="POST" action="">
                                            <div class="form-group col-md-6">
                                                <label class="required">Departure Date</label>
                                                <input id="departure" class="form-control" name="departure" value="<?php echo $_POST["departure"]; ?>">
                                            </div>
											<div class="form-group col-md-6">
                                                <label class="required">Expected Arrival Time</label>
                                                <input id="arrival" class="form-control" name="arrival" type="text" value="<?php echo $_POST["arrival"]; ?>">
                                            </div>
                                            <div class="form-group col-md-6">
                                                <label class="required">Place of Visit</label>
                                                <input class="form-control" type="text" name="place_visit" value="<?php echo $_POST["place_visit"]; ?>">
                                            </div>
                                            <div class="form-group col-md-6">
                                                <label class="required">Purpose of Visit</label>
                                                <input class="form-control" type="text" name="purpose_visit" value="<?php echo $_POST["purpose_visit"]; ?>">
                                            </div>
											<div class="form-group col-md-12">
												<button type="submit" name="Submit" class="btn btn-default ongoing">Send Request</button>
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