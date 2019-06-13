<div id="page-wrapper">
<?php
	include("session.php");
	error_reporting(E_ALL & ~(E_STRICT|E_NOTICE));
	ini_set("display_errors", 1);

	include("connect.php");
	$webmail = $login_session;

	//applicant details
	$stud_name = $name;
	$roll_no = $rollno;
	$contact_no = $user_phone;
	$programme = $current_course;
	$department = $current_dept;
	$category = $_POST['category'];
	$father_name = $_POST['father_name'];
	$father_occupation = $_POST['father_occupation'];
	$mother_name = $_POST['mother_name'];
	$mother_occupation = $_POST['mother_occupation'];
	$annual_income = $_POST['annual_income'];
	$father_employer = $_POST['father_employer'];
	$mother_employer = $_POST['mother_employer'];
	$income_slab = $_POST['income_slab'];
	$hostel = $user_hostel;
	$room_no = $user_room;
	$address = $_POST['address'];
	//scholarship details
	$name_of_schp = $_POST['name_of_schp'];
	$session = $_POST['session'];
	$sponsored_organisation_address = $_POST['organisation_address'];
	$amount_of_schp = $_POST['amount_of_schp'];
	$last_date = $_POST['last_date'];
	$schp_status = $_POST['status_schp'];
	$prev_session = $_POST['prev_session'];
	$prev_amount_of_schp = $_POST['prev_amount_of_schp'];
	//is applicant eligible for other scholarship
	$other_schp = $_POST['other_schp'];
	$name_other_schp = $_POST['name_other_schp'];
	$session_other_schp = $_POST['session_other'];
	$amount_of_other_schp = $_POST['amount_of_other_schp'];
	
	//details of schp applying for
	$sponsoring_authority = $_POST['sponsoring_authority'];
	$cpi = $_POST['cpi']; 

	// for undertaking
	$undertaking = $_FILES['undertaking']['name'];
	$tmp_dir = $_FILES['undertaking']['tmp_name'];
	$undertaking_fileSize = $_FILES['undertaking']['size'];
	$undertaking_fileSizeKB = (int) ($grade_card_fileSize/1024);
	$upload_dir_undertaking = 'schp_04/undertaking/';
	// renaming file
	$temp = explode(".",$_FILES['undertaking']['name']);
	$undertaking_newfilename = round(microtime(true)*1) . 'undertaking' . '.' . end($temp);


	// for grade card
	$grade_card = $_FILES['grade_card']['name'];
	$tmp_dir = $_FILES['grade_card']['tmp_name'];
	$grade_card_fileSize = $_FILES['grade_card']['size'];
	$grade_card_fileSizeKB = (int) ($grade_card_fileSize/1024);
	$upload_dir_grade_card = 'schp_04/grade_card/';
	// renaming file
	$temp = explode(".",$_FILES['grade_card']['name']);
	$grade_card_newfilename = round(microtime(true)*1) . 'grade_card' . '.' . end($temp);
	

	//files
	$File = $_FILES['files']['name'];
	$tmp_dir = $_FILES['files']['tmp_name'];
	$fileSize = $_FILES['files']['size'];
	$fileSizeKB = (int) ($fileSize/1024);
	$upload_dir_files = 'schp_04/files/';
	// renaming file
	$temp = explode(".",$_FILES['files']['name']);
	$newfilename = round(microtime(true)*1) . 'file' .'.' . end($temp);
	
	
	$curdatetime = date('Y-m-d H:i:s');
	$curYear = date('Y');

	
	if(isset($_POST['Submit'])){
		if($stud_name=='' OR $roll_no=='' OR $contact_no=='' OR $programme=='' OR $hostel=='' OR $room_no=='' OR $department=='' OR $father_name=='' OR $father_occupation=='' OR $mother_name=='' OR $mother_occupation=='' OR $annual_income=='' OR $address==''){
			$error = "<font color='red'>All fields of Applicant are required.</font>";
		}
		else if($name_of_schp == '' OR $session=='' OR $sponsored_organisation_address==''){
			$error = "<font color='red'>Please Enter Schlarship Details for which you are applying.</font>";
		}
		else if($schp_status=='Renewal' AND ($prev_session=='' OR $prev_amount_of_schp=='')){
			$error = "<font color='red'>Please state year & amounts received, In case of renewal.</font>";
		}
		else if($other_schp=='yes' AND ($name_other_schp=='' OR $session_other_schp=='' OR $amount_of_other_schp=='')){
			$error = "<font color='red'>Please  please mention the name of the scholarship, session and amount. Since you are a  recipient of other scholarship(s).</font>";
		}
		else if($other_schp=='no' AND $undertaking==''){
			$error="<font color='red'>Please uploading undertaking stating that you are not recipent of any other scholarship(s).</font>";
		}
		else if($cpi==''){
			$error = "<font color='red'>Please enter Latest CPI/% in qualifying marks.</font>";
		}
		else if($grade_card==''){
			$error = "<font color='red'>Please upload scanned copy of atest grade/marks sheet.</font>";
		}
		else if($grade_card_fileSizeKB > 200){
			$error = "<font color='red'>You have uploaded grade card of size larger than 200 KB.</font>";
		}
		else if($undertaking_fileSizeKB > 200){
			$error = "<font color='red'>You have uploaded Undertaking of size larger than 200 KB.</font>";
		}
		else if($fileSizeKB > 400){
			$error = "<font color='red'>You have uploaded supporting documents of size larger than 400 KB.</font>";
		}
		else{
			$application_no=round(microtime(true));
			$schp_04_application_no = "SCHP_04/2018/".$application_no;
			$success = "<font color='green'>Request successfully submitted. Your booking Application No. is <b>$schp_04_application_no</b></font>";
			mysql_query("INSERT INTO schp_04 VALUES('','$schp_04_application_no','$roll_no','$stud_name','$contact_no','$department','$programme','$category','$room_no','$hostel','$father_name','$father_occupation','$annual_income','$mother_name','$mother_occupation','$income_slab','$father_employer','$mother_employer','$address','$name_of_schp','$session','$sponsored_organisation_address','$amount_of_schp','$last_date','$schp_status','$prev_session','$prev_amount_of_schp','$other_schp','$name_other_schp','$session_other_schp','$amount_of_other_schp','$sponsoring_authority','$cpi','$grade_card_newfilename','$newfilename','$curdatetime','','','','','','','','','','','yes','','','','$webmail','','Student Affairs Office','','','','','','','','','','','$undertaking_newfilename','')");
			move_uploaded_file($_FILES["grade_card"]["tmp_name"], $upload_dir_grade_card.$grade_card_newfilename);
			move_uploaded_file($_FILES["files"]["tmp_name"], $upload_dir_files.$newfilename);
			move_uploaded_file($_FILES["undertaking"]["tmp_name"], $upload_dir_undertaking.$undertaking_newfilename);
			$message = "Dear ".$stud_name."\r\n Your application for Certify/Forwarding Outside Scholarship submission(Application No. ".$schp_04_application_no.") has been successfully submitted to SA Office. Latest status can be tracked via CLS.\r\n Thanking You.\r\n Regards,\r\n Team SWC";
			$headers = "MIME-Version: 1.0" . "\r\n";
			$headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
			$headers .= 'From: SWC, IIT Guwahati <swc@iitg.ernet.in>' . "\r\n";
			//$headers .= 'Cc: swc@iitg.ernet.in, saoff@iitg.ernet.in, guesthouse@iitg.ernet.in' . "\r\n";
			$user_webmail = $webmail."@iitg.ernet.in";
			mail($user_webmail , 'Certify/Forwarding Outside Scholarship submission confirmation' , $message , $headers);
		
		}
	}

?>



<style>
label.required:after {
	content: " *";
	color: red;
}
</style>

<link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
<script type='text/javascript'>
	$( function() {
		$( "#date" ).datepicker({minDate: "3D",maxDate: "180D",dateFormat: "yy-mm-dd",showAnim: "slideDown" });
	  } );


	$(window).load(function(){
		$(".return").show();
		$(".general").click(function() {
			if($(this).is(":selected")) {
				$(".return").show();
			
			}
		});
		$(".sc_st").click(function() {
			if($(this).is(":selected")) {
				$(".return").hide();
			
			}
		});
	});

	$(window).load(function(){
		$(".prev").hide();
		$(".renewal").click(function() {
			if($(this).is(":checked")) {
				$(".prev").show();
			
			}
		});
		$(".fresh").click(function() {
			if($(this).is(":checked")) {
				$(".prev").hide();
			
			}
		});
	});
	
	$(window).load(function(){
		$(".other_schp").show();
		$(".undertaking").hide();
		$(".yes").click(function() {
			if($(this).is(":checked")) {
				$(".other_schp").show();
				$(".undertaking").hide();
			
			}
		});
		$(".no").click(function() {
			if($(this).is(":checked")) {
				$(".other_schp").hide();
				$(".undertaking").show();
			}
		});
	});
</script>


<div class="row" >
    <div class="col-lg-12">
	<div class="panel panel-info">
	    <div class="panel-heading">
		Online Certify/Forwarding Outside Scholarship (SCHP/04)
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
		?>
	<div class="row">
            <div class="col-lg-12">
		<form name="schp_04" class="before_success" action=""  accept-charset="utf-8" method="post" enctype="multipart/form-data"> 
		    <div class="form-group col-md-4">
			<label class="required">Name</label>
			<input class="form-control" value="<?php echo $name; ?>" readonly> 
		    </div>
		    <div class="form-group col-md-4">
			<label class="required">Roll No.</label>
			<input class="form-control" value="<?php echo $rollno; ?>" readonly>
		    </div>
		    <div class="form-group col-md-4">
			<label class="required">Contact No.</label>
			<input class="form-control" value="<?php echo $user_phone; ?>" readonly>
		    </div>
		    <div class="form-group col-lg-4">
			<label class="required">Programme</label>
			<input class="form-control" value="<?php echo $current_course; ?>" readonly>	
		    </div>
		    <div class="form-group col-md-4">
			<label class="required">Department</label>
			<input class="form-control" value="<?php echo $current_dept; ?>" readonly>
		    </div>
		    <div class="col-lg-4">
			<div class="form-group category">
				<label class="required">Category</label>
				<select class="form-control" name="category">
					<option class="general" value="General/OBC">General/OBC</option>
					<option class="sc_st" value="SC/ST">SC/ST</option>
				</select>
			</div>
		    </div>
		    <div class="form-group col-md-4">
			<label for="father_name" class="required">Father's Name</label>
			<input class="form-control" type="text" id="father_name" name="father_name" value="<?php echo $father_name;?>" />
		    </div>
		    <div class="form-group col-md-4">
			<label for="father_occupation" class="required">Father's Occupation</label>
			<input class="form-control" type="text" id="father_occupation" name="father_occupation" value="<?php echo $father_occupation;?>" />
		    </div>
		    <div class="form-group col-md-4">
			<label for="annual_income" class="required">Parent's annual Income</label>
			<input class="form-control" type="text" id="annual_income" name="annual_income" value="<?php echo $annual_income; ?>" />
		    </div>
		    <div class="form-group col-md-4">
			<label for="mother_name" class="required">Mother's Name</label>
			<input class="form-control" type="text" id="mother_name" name="mother_name" value="<?php echo $mother_name;?>" />
		    </div>
		    <div class="form-group col-md-4">
			<label for="mother_occupation" class="required">Mother's Occupation</label>
			<input class="form-control" type="text" id="mother_occupation" name="mother_occupation" value="<?php echo $mother_occupation;?>" />
		    </div>
		    <div class="form-group col-md-4 return">
				<label for="income_slab" class="required">Income Slab</label>
				<select class="form-control" id="income_slab" name="income_slab">
					<option value="Till 1,00,000">Till Rs.1,00,000</option>
					<option value="1,00,000-5,00,000">Rs.1,00,000-Rs.5,00,000</option>
					<option value=">5,00,000">>Rs.5,00,000</option>
				</select>
		    </div>
		    <div class="form-group col-md-6">
			<label for="father_employer" class="">Father's Employers Address</label>
			<textarea class="form-control" id="father_employer" name="father_employer" value="<?php echo $father_employer;?>" /></textarea>
		    </div>
		    <div class="form-group col-md-6">
			<label for="mother_employer" class="">Mother's Employers Address</label>
			<textarea class="form-control" id="mother_employer" name="mother_employer" value="<?php echo $mother_employer;?>" /></textarea>
		    </div>
		    <div class="form-group col-md-3">
			<label class="required">Hostel</label>
			<input class="form-control" value="<?php echo $user_hostel; ?>" readonly>
		    </div>
		    <div class="form-group col-md-3">
			<label class="required">Room No.</label>
			<input class="form-control" value="<?php echo $user_room; ?>" readonly>
		    </div>
		    <div class="form-group col-md-6">
			<label for="address" class="required">Permanent Address</label>
			<textarea class="form-control" id="address" name="address" value="<?php echo $address;?>" /></textarea>
		    </div>
			
		    <?php echo "<div style='font-size:150%; color:#198822' class='form-group col-lg-12'>Details of Scholarship</div>"; ?>
		    <div class="form-group col-md-6">
			<label for="name_of_schp" class="required">Name of Scholarship</label>
			<input class="form-control" type="text" id="" name="name_of_schp" value="<?php $name_of_schp;?>" />
		    </div>
		    <div class="form-group col-md-3">
			<label for="session" class="required">Session Applying For</label>
			<input class="form-control" type="text" id="session" name="session" value="<?php echo $session;?>" />
		    </div>
		    <div class="form-group col-md-12">
			<label for="organisation_address" class="required">Sponsored Organization & Address(With Email ID & Ph. No)</label>
			<textarea class="form-control" id="organisation_address" name="organisation_address" value="<?php echo $sponsered_organisation_address;?>" /></textarea>
		    </div>
		    <div class="form-group col-md-6">
			<label for="amount_of_schp" class="required">Amount  of  Scholarship(state  whether p.a./p.m./one time)</label>
			<input class="form-control" type="text" id="amount_of_schp" name="amount_of_schp" value="<?php echo $amount_of_schp;?>" />
		    </div>
		    <div class="form-group col-md-4">
			<label for="date" class="">Last Date for submission to sponsorer</label>
			<div class="input-group date">
				<span class="input-group-addon"><i class="fa fa-calendar"></i> </span>
				<input id="date" type="text" class="form-control datepicker" name="last_date" data-date-format="yyyy-mm-dd" value="<?php echo $last_date; ?>">
			</div>
		    </div>
		    <div class="form-group col-md-3">
			<div >
				<label class="required">Status (Tick): Renewal/Fresh</label>
			</div>
			<div >  
				<input class="fresh" name="status_schp" type="radio" value="Fresh" checked> Fresh
				<input class="renewal" name="status_schp" type="radio" value="Renewal" >Renewal
		        </div>
		    </div>
		    <div class="prev">
			    <div class="form-group col-md-3">
				<label class="required">In case of renewal, state year & amounts received:-</label>
			    </div>
			    <div class="form-group col-md-3">
				<label for="prev_session" class="required">Year</label>
				<input class="form-control" type="text" id="prev_session" name="prev_session" value="<?php echo $prev_session;?>" />
			    </div>
			    <div class="form-group col-md-3">
				<label for="prev_amount_of_schp" class="required">Amounts Recieved(state p.a./p.m./one time)</label>
				<input class="form-control" type="text" id="prev_amount_of_schp" name="prev_amount_of_schp" value="<?php echo $prev_amount_of_schp;?>" />
			    </div>
		    </div>
		    <div class="form-group col-md-12"><br/><br/><br/></div>
		
		    <div class="form-group col-md-5">
			<div >
				<label class="required">Are you a recipient of any other scholarship(s)? </label>
			</div>
			<div >  
				<input class="yes" name="other_schp" type="radio" value="yes" checked> Yes
				<input class="no" name="other_schp" type="radio" value="no" >No
		        </div>
		    </div>
		    <div class="undertaking">
			    
			    <div class="form-group col-md-6">
			<label for="undertaking" class="required">Undertaking of Not Recieving any other Scholarship(max 200Kb)</label>
			<input type="file" name="undertaking" id="undertaking" class="inputfile"/>
			    </div>
		    </div>
		    <div class="other_schp">
			    <div class="col-md-4">
				<b>If yes, please mention the name of the scholarship, session and amount.</b>
			    </div>
			    <div class="form-group col-md-3">
				<label for="name_other_schp" class="required">Name of Scholarship</label>
				<input class="form-control" type="text" id="name_other_schp" name="name_other_schp" value="<?php echo $name_other_schp;?>" />
			    </div>
			    <div class="form-group col-md-4">
				<label for="session_other" class="required">Session</label>
				<input class="form-control" type="text" id="session_other" name="session_other" value="<?php echo $session_other_schp;?>" />
			    </div>
			    <div class="form-group col-md-4">
				<label for="amount_of_other_schp" class="required">Amount(state p.a./p.m./one time)</label>
				<input class="form-control" type="text" id="amount_of_other_schp" name="amount_of_other_schp" value="<?php echo $amount_of_other_schp;?>" />
			    </div>
		    </div>
			<div class="form-group col-md-12"><br/><br/></div>
		    <div class="form-group col-md-9">
			<label for="sponsoring_authority">Specify whether the Scholarship will be received directly from sponsoring authority / through IITG?</label>
			<input class="form-control" type="text" id="sponsoring_authority" name="sponsoring_authority" value="<?php echo $sponsoring_authority;?>" />
		    </div>
		    <div class="form-group col-md-3">
			<label for="cpi" class="required">Latest CPI/% in qualifying marks</label>
			<input class="form-control" type="text" id="cpi" name="cpi" value="<?php echo $cpi;?>" />
		    </div>
		    <div class="form-group col-md-6">
			<label for="grade_card" class="required">Scanned copy of latest grade/marks sheet(max 200Kb)</label>
			<input type="file" name="grade_card" id="grade_card" class="inputfile"/>
		    </div>
		    <div class="form-group col-md-6">
			<label for="files" class="">Scanned copy of Supporting document(max 400Kb)</label>
			<input type="file" name="files" id="files" class="inputfile"/>
		    </div>

		    <div class="row" style="margin-top:2%">
			<div class="col-lg-12">
			 <input type="checkbox" id="checkme" name="tnc" required class="required"/> <b>Declaration:</b> I do hereby declare that the above information is true to the best of my knowledge.<a href="system_cos_rules.php">I have read all the rules for Certify/Forwarding Outside Scholarship Application. </a><br/>
				<br/><div class="col-lg-5"></div>
				 
				<div class="col-lg-2">
					<div class="form-group ">
					  
						<button type="submit" class="btn btn-primary" name="Submit"  >Submit Application</button>
					</div>
				</div>
				<div class="col-lg-5"></div>
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
							<td><b>Application No.:</b> <?php echo $schp_04_application_no; ?></td>
							<td><b>Status:</b> Students' Affairs Office</td>
						</tr>
						<tr>
							<td><b>Father's name:</b> <?php echo $father_name; ?></td>
							<td><b>Father's Occupation:</b> <?php echo $father_occupation; ?></td>
						</tr>
						<tr>
							<td><b>Mother's name:</b> <?php echo $mother_name; ?></td>
							<td><b>Mother's Occupation:</b> <?php echo $mother_occupation; ?></td>
						</tr>
						<tr>
							<td><b>Parents Annual Income:</b> <?php echo $annual_income; ?></td>
							<td><b>Permanent Address:</b> <?php echo $address; ?></td>
						</tr>	
						<tr>
							<td><b>Name of Scholarship:</b> <?php echo $name_of_schp; ?></td>
							<td><b>Session:</b> <?php echo $session; ?></td>
						</tr>
						<tr>
							<td colspan="2"><b>Sponsored Organization & Address:</b> <?php echo $sponsored_organisation_address; ?></td>
							
						</tr>		
						<tr>
							<td><b>Amount of Scholarship:</b> <?php echo $amount_of_schp; ?></td>
							<td><b>Last Date for submission to sponsorer:</b> <?php echo $last_date; ?></td>
						</tr>
						<tr>
							<td><b>Status (Renewal/Fresh):</b> <?php echo $schp_status; ?></td>
							<td><b>Are you a recipient of any other scholarship(s)?:</b> <?php echo $other_schp; ?></td>
						</tr>
						<tr>
							<td><b>Specify whether the Scholarship will be received directly from sponsoring authority / through IITG?:</b> <?php echo $sponsoring_authority; ?></td>
							<td><b>Latest CPI/% in qualifying marks:</b> <?php echo $cpi; ?></td>
						</tr>
						<tr>
							<td><b>Latest grade sheet/marks sheet:</b> <a href="schp_04/grade_card/<?php echo $grade_card_newfilename; ?>" target="_blank">Download</a></td>
							<td><b>Supporting Documents:</b> <?php if( end(explode(".",$row_track['documents']))!='' ){?><a href="../schp_04/files/<?php echo $row_track["documents"]; ?>" target="_blank"> Download</a><?php } else{ echo "NA";}?></td>
						</tr>
					</tbody>
				</table>
				<div class="row" style="margin-top:2%">
					<div class="col-lg-12">
						<div class="col-lg-5"></div>
							<div class="col-lg-2">
								<div class="form-group ">
								    
									<a href=''><button type="button" class="btn btn-default">Check Old Booking(s)</button></a>
								</div>
							</div>
						<div class="col-lg-5">
						</div>
					</div>
				</div>
			</div>
			<?php } ?>


			</div>
			</div>
		</div>
		<!-- /.panel-body -->
	</div>
	<!-- /.panel panel-info-->
    </div>
    <!-- /.cl-lg-12 -->
</div>
<!--  /.row  -->
</div>
<!-- /#pagewrapper -->
