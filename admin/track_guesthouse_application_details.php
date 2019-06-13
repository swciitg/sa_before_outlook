<?php 
	include("session.php");
	include("connect.php");
	error_reporting(0);
	
	$currentdatetime = mysql_query('select now()');
	$curdatetime     = mysql_result($currentdatetime, 0);
	$id = $_GET['track'];
	$query = "SELECT * FROM gh_booking WHERE application_no = '$id'";
	$result = mysql_query($query);
	$row_track = mysql_fetch_array($result);
	$applicant = $row_track["name"];
	$applicant_webmail = $row_track["webmail"];
	$comment_sa = $_POST['comment_sa'];
	$comment_hossa = $_POST['comment_hossa'];
	$comment_dean = $_POST['comment_dean'];
	$comment_est = $_POST['comment_est'];
	$allotted_room = $_POST['allotted_room'];
	$category_recommended = $_POST['category_recommended'];
	$error = "";
	$success = "";
	if (isset($_POST['Submit'])) {
		if($comment_sa ==''){
			$error = "Comment field is empty";
		}
		else {
			mysql_query("INSERT INTO gh_movement VALUES ('','$id','$current_location','$name','$comment_sa','$curdatetime')");
			mysql_query ("UPDATE gh_booking SET comment_saoff ='$comment_sa' WHERE application_no = '$id'");
			$comment_success="Comment successfully saved.";
			$message = "Dear ".$applicant."\r\n A comment has been added by SA Office to your guesthouse booking request (Application No. ".$id."). \r\n Comment: ".$comment_sa.".\r\n Latest status can be tracked via CLS.\r\n Thanking You.\r\n Regards,\r\n Team SWC";
			$headers = "MIME-Version: 1.0" . "\r\n";
			$headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
			$headers .= 'From: SWC, IIT Guwahati <swc@iitg.ernet.in>' . "\r\n";
			//$headers .= 'Cc: swc@iitg.ernet.in, saoff@iitg.ernet.in, hossa@iitg.ernet.in' . "\r\n";
			$user_webmail = $applicant_webmail."@iitg.ernet.in";
			mail($user_webmail , 'Comment by SA Office on your guesthouse request' , $message , $headers);
		}
	}
	if (isset($_POST['Submit_Hossa'])) {
		if($comment_hossa ==''){
			$error = "Comment field is empty";
		}
		else {
			mysql_query("INSERT INTO gh_movement VALUES ('','$id','$current_location','$name','$comment_hossa','$curdatetime')");
			mysql_query ("UPDATE gh_booking SET comment_hossa ='$comment_hossa' WHERE application_no = '$id'");
			$comment_success="Comment successfully saved.";
			$message = "Dear ".$applicant."\r\n A comment has been added by HoSSA to your guesthouse booking request (Application No. ".$id."). \r\n Comment: ".$comment_hossa.".\r\n Latest status can be tracked via CLS.\r\n Thanking You.\r\n Regards,\r\n Team SWC";
			$headers = "MIME-Version: 1.0" . "\r\n";
			$headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
			$headers .= 'From: SWC, IIT Guwahati <swc@iitg.ernet.in>' . "\r\n";
			//$headers .= 'Cc: swc@iitg.ernet.in, saoff@iitg.ernet.in, hossa@iitg.ernet.in' . "\r\n";
			$user_webmail = $applicant_webmail."@iitg.ernet.in";
			mail($user_webmail , 'Comment by HoSSA on your guesthouse request' , $message , $headers);
		}
	}
	if (isset($_POST['Submit_adosa_1'])) {
		if($comment_dean ==''){
			$error = "Comment field is empty";
		}
		else {
			mysql_query("INSERT INTO gh_movement VALUES ('','$id','$current_location','$name','$comment_dean','$curdatetime')");
			mysql_query ("UPDATE gh_booking SET comment_dean ='$comment_dean' WHERE application_no = '$id'");
			$comment_success="Comment successfully saved.";
			$message = "Dear ".$applicant."\r\n A comment has been added by ADoSA-1 to your guesthouse booking request (Application No. ".$id."). \r\n Comment: ".$comment_dean.".\r\n Latest status can be tracked via CLS.\r\n Thanking You.\r\n Regards,\r\n Team SWC";
			$headers = "MIME-Version: 1.0" . "\r\n";
			$headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
			$headers .= 'From: SWC, IIT Guwahati <swc@iitg.ernet.in>' . "\r\n";
			//$headers .= 'Cc: swc@iitg.ernet.in, saoff@iitg.ernet.in, hossa@iitg.ernet.in, adosa_1@iitg.ernet.in' . "\r\n";
			$user_webmail = $applicant_webmail."@iitg.ernet.in";
			mail($user_webmail , 'Comment by ADoSA-1 on your guesthouse request' , $message , $headers);
		}
	}
	
	if (isset($_POST['Submit_adosa_2'])) {
		if($comment_dean ==''){
			$error = "Comment field is empty";
		}
		else {
			mysql_query("INSERT INTO gh_movement VALUES ('','$id','$current_location','$name','$comment_dean','$curdatetime')");
			mysql_query ("UPDATE gh_booking SET comment_dean ='$comment_dean' WHERE application_no = '$id'");
			$comment_success="Comment successfully saved.";
			$message = "Dear ".$applicant."\r\n A comment has been added by ADoSA-2 to your guesthouse booking request (Application No. ".$id."). \r\n Comment: ".$comment_dean.".\r\n Latest status can be tracked via CLS.\r\n Thanking You.\r\n Regards,\r\n Team SWC";
			$headers = "MIME-Version: 1.0" . "\r\n";
			$headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
			$headers .= 'From: SWC, IIT Guwahati <swc@iitg.ernet.in>' . "\r\n";
			//$headers .= 'Cc: swc@iitg.ernet.in, saoff@iitg.ernet.in, hossa@iitg.ernet.in, adosa_1@iitg.ernet.in' . "\r\n";
			$user_webmail = $applicant_webmail."@iitg.ernet.in";
			mail($user_webmail , 'Comment by ADoSA-2 on your guesthouse request' , $message , $headers);
		}
	}
	if (isset($_POST['Submit_dosa'])) {
		if($comment_dean ==''){
			$error = "Comment field is empty";
		}
		else {
			mysql_query("INSERT INTO gh_movement VALUES ('','$id','$current_location','$name','$comment_dean','$curdatetime')");
			mysql_query ("UPDATE gh_booking SET comment_dean ='$comment_dean' WHERE application_no = '$id'");
			$comment_success="Comment successfully saved.";
			$message = "Dear ".$applicant."\r\n A comment has been added by Dosa to your guesthouse booking request (Application No. ".$id."). \r\n Comment: ".$comment_dean.".\r\n Latest status can be tracked via CLS.\r\n Thanking You.\r\n Regards,\r\n Team SWC";
			$headers = "MIME-Version: 1.0" . "\r\n";
			$headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
			$headers .= 'From: SWC, IIT Guwahati <swc@iitg.ernet.in>' . "\r\n";
			//$headers .= 'Cc: swc@iitg.ernet.in, saoff@iitg.ernet.in, hossa@iitg.ernet.in, adosa_1@iitg.ernet.in' . "\r\n";
			$user_webmail = $applicant_webmail."@iitg.ernet.in";
			mail($user_webmail , 'Comment by Dosa on your guesthouse request' , $message , $headers);
		}
	}
		
	if (isset($_POST['Submit_EST'])) {
		if($comment_est =='' && $allotted_room == ''){
			$error = "Enter something to update.";
		}
		else if($comment_est != '' && $allotted_room == '' ){
			$comment_success="Comment successfully saved.";
			mysql_query("INSERT INTO gh_movement VALUES ('','$id','$current_location','$name','$comment_est','$curdatetime')");
			$message = "Dear ".$applicant."\r\n A comment has been added by Establishment Section to your guesthouse booking request (Application No. ".$id."). \r\n Comment: ".$comment_est.".\r\n Latest status can be tracked via CLS.\r\n Thanking You.\r\n Regards,\r\n Team SWC";
			$headers = "MIME-Version: 1.0" . "\r\n";
			$headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
			$headers .= 'From: SWC, IIT Guwahati <swc@iitg.ernet.in>' . "\r\n";
			//$headers .= 'Cc: swc@iitg.ernet.in, saoff@iitg.ernet.in, guesthouse@iitg.ernet.in' . "\r\n";
			$user_webmail = $applicant_webmail."@iitg.ernet.in";
			mail($user_webmail , 'Comment by Establishment Section on your guesthouse request' , $message , $headers);
		}
		else if($comment_est == '' && $allotted_room != '' ){
			$approve_success="Room successfully Allotted.";
			mysql_query ("UPDATE gh_booking SET allotted_room='$allotted_room', approve_est='yes', status='Allotted', category_recommended='$category_recommended' WHERE application_no = '$id'"); // Debug here 
			mysql_query("INSERT INTO gh_movement VALUES ('','$id','$current_location','$name','Approved and Alloted room no. is $allotted_room','$curdatetime')");
			$message = "Dear ".$applicant."\r\n A room has been allotted by Establishment Section against your guesthouse booking request (Application No. ".$id."). \r\n Room No: ".$allotted_room."\r\n Latest status can be tracked via CLS.\r\n Thanking You.\r\n Regards,\r\n Team SWC";
			$headers = "MIME-Version: 1.0" . "\r\n";
			$headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
			$headers .= 'From: SWC, IIT Guwahati <swc@iitg.ernet.in>' . "\r\n";
			//$headers .= 'Cc: swc@iitg.ernet.in, saoff@iitg.ernet.in, hossa@iitg.ernet.in, adosa_1@iitg.ernet.in, guesthouse@iitg.ernet.in' . "\r\n";
			$user_webmail = $applicant_webmail."@iitg.ernet.in";
			mail($user_webmail , 'Room allotted as per your guesthouse request' , $message , $headers);
		}
		else if($comment_est != '' && $allotted_room != '' ){
			$approve_success="Data successfully saved.";
			mysql_query ("UPDATE gh_booking SET allotted_room='$allotted_room', approve_est='yes', status='Allotted' WHERE application_no = '$id'");
			mysql_query("INSERT INTO gh_movement VALUES ('','$id','$current_location','$name','Approved and Alloted room no. is $allotted_room','$curdatetime')");
			mysql_query("INSERT INTO gh_movement VALUES ('','$id','$current_location','$name','$comment_est','$curdatetime')");
			$message = "Dear ".$applicant."\r\n A room has been allotted by Establishment Section against your guesthouse booking request (Application No. ".$id."). \r\n Room No: ".$allotted_room."\r\n Latest status can be tracked via CLS.\r\n Thanking You.\r\n Regards,\r\n Team SWC";
			$headers = "MIME-Version: 1.0" . "\r\n";
			$headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
			$headers .= 'From: SWC, IIT Guwahati <swc@iitg.ernet.in>' . "\r\n";
			//$headers .= 'Cc: swc@iitg.ernet.in, saoff@iitg.ernet.in, hossa@iitg.ernet.in, adosa_1@iitg.ernet.in, guesthouse@iitg.ernet.in' . "\r\n";
			$user_webmail = $applicant_webmail."@iitg.ernet.in";
			mail($user_webmail , 'Room allotted as per your guesthouse request' , $message , $headers);
		}
	}
	if (isset($_POST['Approve'])) {
		if($login_session == 'adosa_1'){
			$approve_success = "Forwarded to Establishment Section.";
			mysql_query ("UPDATE gh_booking SET approve_dean='yes',reach_est='yes' WHERE application_no = '$id'");
			mysql_query ("UPDATE gh_booking SET reach_est='yes'  WHERE application_no = '$id'");
			mysql_query ("UPDATE gh_booking SET status='Approved by ADoSA-1 and forwarded to Establishment Section.' WHERE application_no = '$id'");
			mysql_query("INSERT INTO gh_movement VALUES ('','$id','$current_location','$name','Approved by ADOSA-1 and Forwarded to Establishment Section','$curdatetime')");
			$message = "Dear ".$applicant."\r\n Your guesthouse booking request (Application No. ".$id.") has been approved by Associate Dean-1 and forwarded to Establishment Section for further approval. \r\n Latest status can be tracked via CLS.\r\n Thanking You.\r\n Regards,\r\n Team SWC";
			$headers = "MIME-Version: 1.0" . "\r\n";
			$headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
			$headers .= 'From: SWC, IIT Guwahati <swc@iitg.ernet.in>' . "\r\n";
			//$headers .= 'Cc: swc@iitg.ernet.in, saoff@iitg.ernet.in, hossa@iitg.ernet.in, adosa_1@iitg.ernet.in, guesthouse@iitg.ernet.in' . "\r\n";
			$user_webmail = $applicant_webmail."@iitg.ernet.in";
			mail($user_webmail , 'Guesthouse application forwarded to Establishment Section' , $message , $headers);
		}
		else if ($login_session == 'adosa_2'){
			$approve_success = "Forwarded to Establishment Section.";
			mysql_query ("UPDATE gh_booking SET approve_dean='yes' WHERE application_no = '$id'");
			mysql_query ("UPDATE gh_booking SET reach_est='yes'  WHERE application_no = '$id'");
			mysql_query ("UPDATE gh_booking SET status='Approved by ADOSA_2 and Forwarded to Establishment Section' WHERE application_no = '$id'");
			mysql_query("INSERT INTO gh_movement VALUES ('','$id','$current_location','$name','Approved by adosa_2 and Forwarded to Establishment Section','$curdatetime')");
			$message = "Dear ".$applicant."\r\n Your Guest House booking request (Application No. ".$id.")  has been approved by Associate Dean-2 and forwarded to Establishment Section for further approval. \r\n Latest status can be tracked via CLS.\r\n Thanking You.\r\n Regards,\r\n Team SWC";
			$headers = "MIME-Version: 1.0" . "\r\n";
			$headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
			$headers .= 'From: SWC, IIT Guwahati <swc@iitg.ernet.in>' . "\r\n";
			//$headers .= 'Cc: swc@iitg.ernet.in, saoff@iitg.ernet.in, hossa@iitg.ernet.in' . "\r\n";
			$user_webmail = $applicant_webmail."@iitg.ernet.in";
			mail($user_webmail , 'Guesthouse application forwarded to Establishment Section' , $message , $headers);
	    }
		else if ($login_session == 'dos'){
			$approve_success = "Forwarded to Establishment Section";
			mysql_query ("UPDATE gh_booking SET approve_dean='yes'  WHERE application_no = '$id'");
			mysql_query ("UPDATE gh_booking SET reach_est='yes'  WHERE application_no = '$id'");
			mysql_query ("UPDATE gh_booking SET status='Approved by Dosa and Forwarded to Establishment Section' WHERE application_no = '$id'");
			mysql_query("INSERT INTO gh_movement VALUES ('','$id','$current_location','$name','Approved by Dosa and Forwarded to Establishment Section','$curdatetime')");
			$message = "Dear ".$applicant."\r\n Your Guesthouse booking request (Application No. ".$id.")  has been approved by Dean and forwarded to Establishment Section for further approval. \r\n Latest status can be tracked via CLS.\r\n Thanking You.\r\n Regards,\r\n Team SWC";
			$headers = "MIME-Version: 1.0" . "\r\n";
			$headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
			$headers .= 'From: SWC, IIT Guwahati <swc@iitg.ernet.in>' . "\r\n";
			//$headers .= 'Cc: swc@iitg.ernet.in, saoff@iitg.ernet.in, hossa@iitg.ernet.in' . "\r\n";
			$user_webmail = $applicant_webmail."@iitg.ernet.in";
			mail($user_webmail , 'Guesthouse application forwarded to Establishment Section' , $message , $headers);
	    }
		else{
			$approve_success = "Forwarded to HoSSA.";
			mysql_query ("UPDATE gh_booking SET approve_saoff='yes',reach_hossa='yes' WHERE application_no = '$id'");
			mysql_query ("UPDATE gh_booking SET status='Approved by SA Office and forwarded to HoSSA.' WHERE application_no = '$id'");
			mysql_query("INSERT INTO gh_movement VALUES ('','$id','$current_location','$name','Approved and Forwarded to HoSSA','$curdatetime')");
			$message = "Dear ".$applicant."\r\n Your guesthouse booking request (Application No. ".$id.") has been approved by SA Office and forwarded to HoSSA for further approval. \r\n Latest status can be tracked via CLS.\r\n Thanking You.\r\n Regards,\r\n Team SWC";
			$headers = "MIME-Version: 1.0" . "\r\n";
			$headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
			$headers .= 'From: SWC, IIT Guwahati <swc@iitg.ernet.in>' . "\r\n";
			//$headers .= 'Cc: swc@iitg.ernet.in, saoff@iitg.ernet.in, hossa@iitg.ernet.in' . "\r\n";
			$user_webmail = $applicant_webmail."@iitg.ernet.in";
			mail($user_webmail , 'Guesthouse application forwarded to HoSSA' , $message , $headers);
		}
	}
	if (isset($_POST['Reject']) AND $current_dept != '104') {
		if($login_session == 'hossa'){
			$reject_success = "Rejected.";
			mysql_query ("UPDATE gh_booking SET reject_hossa='yes' WHERE application_no = '$id'");
			mysql_query ("UPDATE gh_booking SET status='Rejected by HoSSA.' WHERE application_no = '$id'");
			mysql_query("INSERT INTO gh_movement VALUES ('','$id','$current_location','$name','Rejected by HoSSA','$curdatetime')");
			$message = "Dear ".$applicant."\r\n Your guesthouse booking request (Application No. ".$id.") has been rejected by HoSSA. \r\n Latest status can be tracked via CLS.\r\n Thanking You.\r\n Regards,\r\n Team SWC";
			$headers = "MIME-Version: 1.0" . "\r\n";
			$headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
			$headers .= 'From: SWC, IIT Guwahati <swc@iitg.ernet.in>' . "\r\n";
			//$headers .= 'Cc: swc@iitg.ernet.in, saoff@iitg.ernet.in, hossa@iitg.ernet.in' . "\r\n";
			$user_webmail = $applicant_webmail."@iitg.ernet.in";
			mail($user_webmail , 'Guesthouse application rejected by HoSSA' , $message , $headers);
		}
		else if($login_session == 'adosa_1'){
			$reject_success = "Rejected.";
			mysql_query ("UPDATE gh_booking SET reject_dean='yes' WHERE application_no = '$id'");
			mysql_query ("UPDATE gh_booking SET status='Rejected by Associate Dean-1.' WHERE application_no = '$id'");
			mysql_query("INSERT INTO gh_movement VALUES ('','$id','$current_location','$name','Rejected by ADoSA-1','$curdatetime')");
			$message = "Dear ".$applicant."\r\n Your guesthouse booking request (Application No. ".$id.") has been rejected by Associate Dean-1. \r\n Latest status can be tracked via CLS.\r\n Thanking You.\r\n Regards,\r\n Team SWC";
			$headers = "MIME-Version: 1.0" . "\r\n";
			$headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
			$headers .= 'From: SWC, IIT Guwahati <swc@iitg.ernet.in>' . "\r\n";
			//$headers .= 'Cc: swc@iitg.ernet.in, saoff@iitg.ernet.in, hossa@iitg.ernet.in, adosa_1@iitg.ernet.in' . "\r\n";
			$user_webmail = $applicant_webmail."@iitg.ernet.in";
			mail($user_webmail , 'Guesthouse application rejected by Associate Dean-1' , $message , $headers);
		}
		else if($login_session == 'adosa_2'){
			$reject_success = "Rejected.";
			mysql_query ("UPDATE gh_booking SET reject_dean='yes' WHERE application_no = '$id'");
			mysql_query ("UPDATE gh_booking SET status='Rejected by Associate Dean-2.' WHERE application_no = '$id'");
			mysql_query("INSERT INTO gh_movement VALUES ('','$id','$current_location','$name','Rejected by ADoSA-1','$curdatetime')");
			$message = "Dear ".$applicant."\r\n Your guesthouse booking request (Application No. ".$id.") has been rejected by Associate Dean-2. \r\n Latest status can be tracked via CLS.\r\n Thanking You.\r\n Regards,\r\n Team SWC";
			$headers = "MIME-Version: 1.0" . "\r\n";
			$headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
			$headers .= 'From: SWC, IIT Guwahati <swc@iitg.ernet.in>' . "\r\n";
			//$headers .= 'Cc: swc@iitg.ernet.in, saoff@iitg.ernet.in, hossa@iitg.ernet.in, adosa_1@iitg.ernet.in' . "\r\n";
			$user_webmail = $applicant_webmail."@iitg.ernet.in";
			mail($user_webmail , 'Guesthouse application rejected by Associate Dean-2' , $message , $headers);
		}
		else if($login_session == 'dos'){
			$reject_success = "Rejected.";
			mysql_query ("UPDATE gh_booking SET reject_dean='yes' WHERE application_no = '$id'");
			mysql_query ("UPDATE gh_booking SET status='Rejected by Dosa' WHERE application_no = '$id'");
			mysql_query("INSERT INTO gh_movement VALUES ('','$id','$current_location','$name','Rejected by ADoSA-1','$curdatetime')");
			$message = "Dear ".$applicant."\r\n Your guesthouse booking request (Application No. ".$id.") has been rejected by Dosa. \r\n Latest status can be tracked via CLS.\r\n Thanking You.\r\n Regards,\r\n Team SWC";
			$headers = "MIME-Version: 1.0" . "\r\n";
			$headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
			$headers .= 'From: SWC, IIT Guwahati <swc@iitg.ernet.in>' . "\r\n";
			//$headers .= 'Cc: swc@iitg.ernet.in, saoff@iitg.ernet.in, hossa@iitg.ernet.in, adosa_1@iitg.ernet.in' . "\r\n";
			$user_webmail = $applicant_webmail."@iitg.ernet.in";
			mail($user_webmail , 'Guesthouse application rejected by Dosa' , $message , $headers);
		}
		else{
			$reject_success = "Rejected.";
			mysql_query ("UPDATE gh_booking SET reject_saoff='yes' WHERE application_no = '$id'");
			mysql_query ("UPDATE gh_booking SET status='Rejected by Students Affairs Office.' WHERE application_no = '$id'");
			mysql_query("INSERT INTO gh_movement VALUES ('','$id','$current_location','$name','Rejected by Students Affairs Office','$curdatetime')");
			$message = "Dear ".$applicant."\r\n Your guesthouse booking request (Application No. ".$id.") has been rejected by SA Office. \r\n Latest status can be tracked via CLS.\r\n Thanking You.\r\n Regards,\r\n Team SWC";
			$headers = "MIME-Version: 1.0" . "\r\n";
			$headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
			$headers .= 'From: SWC, IIT Guwahati <swc@iitg.ernet.in>' . "\r\n";
			//$headers .= 'Cc: swc@iitg.ernet.in, saoff@iitg.ernet.in' . "\r\n";
			$user_webmail = $applicant_webmail."@iitg.ernet.in";
			mail($user_webmail , 'Guesthouse application rejected by SA Office' , $message , $headers);
		}
	}
	if (isset($_POST['Reject']) AND $current_dept == '104') {
		$reject_success = "Rejected.";
		mysql_query ("UPDATE gh_booking SET reject_est='yes' WHERE application_no = '$id'");
		mysql_query ("UPDATE gh_booking SET status='Rejectd by Establishment Section.' WHERE application_no = '$id'");
		mysql_query("INSERT INTO gh_movement VALUES ('','$id','$current_location','$name','Rejected by Establishment Section','$curdatetime')");
		$message = "Dear ".$applicant."\r\n Your guesthouse booking request (Application No. ".$id.") has been rejected by Establishment Section. \r\n Latest status can be tracked via CLS.\r\n Thanking You.\r\n Regards,\r\n Team SWC";
			$headers = "MIME-Version: 1.0" . "\r\n";
			$headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
			$headers .= 'From: SWC, IIT Guwahati <swc@iitg.ernet.in>' . "\r\n";
			//$headers .= 'Cc: swc@iitg.ernet.in, saoff@iitg.ernet.in, hossa@iitg.ernet.in, adosa_1@iitg.ernet.in, guesthouse@iitg.ernet.in' . "\r\n";
			$user_webmail = $applicant_webmail."@iitg.ernet.in";
			mail($user_webmail , 'Guesthouse application rejected by Establishment Section' , $message , $headers);
	}



	if(isset($_POST['dosa']) AND $login_session == 'hossa'){
		$approve_success = "Application Forwarded to Dosa.";
		mysql_query ("UPDATE gh_booking SET reach_dean='yes' WHERE application_no = '$id'");
		mysql_query ("UPDATE gh_booking SET status='Approved by Hossa and forwarded to Dosa.' WHERE application_no = '$id'");
		mysql_query ("UPDATE gh_booking SET dean='dosa' WHERE application_no = '$id'");
		mysql_query ("UPDATE gh_booking SET approve_hossa='yes' WHERE application_no = '$id'");
		mysql_query("INSERT INTO gh_movement VALUES ('','$id','$current_location','$name','Approved by Hossa and forwarded to Dosa','$curdatetime')");
		$message = "Dear ".$applicant."\r\n Your guesthouse booking request (Application No. ".$id.") has been varified by hossa and Forwarded to Dosa. \r\n Latest status can be tracked via CLS.\r\n Thanking You.\r\n Regards,\r\n Team SWC";
			$headers = "MIME-Version: 1.0" . "\r\n";
			$headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
			$headers .= 'From: SWC, IIT Guwahati <swc@iitg.ernet.in>' . "\r\n";
			//$headers .= 'Cc: swc@iitg.ernet.in, saoff@iitg.ernet.in, hossa@iitg.ernet.in, adosa_1@iitg.ernet.in, guesthouse@iitg.ernet.in' . "\r\n";
			$user_webmail = $applicant_webmail."@iitg.ernet.in";
			mail($user_webmail , 'Guesthouse application forwarded to Dosa' , $message , $headers);
	}
	if(isset($_POST['adosa_1']) AND $login_session == 'hossa'){
		$approve_success = "Application Forwarded to Adosa_1.";
		mysql_query ("UPDATE gh_booking SET reach_dean='yes' WHERE application_no = '$id'");
		mysql_query ("UPDATE gh_booking SET status='Approved by Hossa and forwarded to Adosa_1.' WHERE application_no = '$id'");
		mysql_query ("UPDATE gh_booking SET dean='adosa_1' WHERE application_no = '$id'");
		mysql_query ("UPDATE gh_booking SET approve_hossa='yes' WHERE application_no = '$id'");
		mysql_query("INSERT INTO gh_movement VALUES ('','$id','$current_location','$name','Approved by Hossa and forwarded to Adosa_1','$curdatetime')");
		$message = "Dear ".$applicant."\r\n Your guesthouse booking request (Application No. ".$id.") has been varified by hossa and Forwarded to ADoSA-1. \r\n Latest status can be tracked via CLS.\r\n Thanking You.\r\n Regards,\r\n Team SWC";
			$headers = "MIME-Version: 1.0" . "\r\n";
			$headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
			$headers .= 'From: SWC, IIT Guwahati <swc@iitg.ernet.in>' . "\r\n";
			//$headers .= 'Cc: swc@iitg.ernet.in, saoff@iitg.ernet.in, hossa@iitg.ernet.in, adosa_1@iitg.ernet.in, guesthouse@iitg.ernet.in' . "\r\n";
			$user_webmail = $applicant_webmail."@iitg.ernet.in";
			mail($user_webmail , 'Guesthouse application forwarded to Adosa_1' , $message , $headers);
	}
	if(isset($_POST['adosa_2']) AND $login_session == 'hossa'){
		$approve_success = "Application Forwarded to Adosa_2.";
		mysql_query ("UPDATE gh_booking SET reach_dean='yes' WHERE application_no = '$id'");
		mysql_query ("UPDATE gh_booking SET status='Approved by Hossa and forwarded to Adosa_2.' WHERE application_no = '$id'");	
		mysql_query ("UPDATE gh_booking SET approve_hossa='yes' WHERE application_no = '$id'");
		mysql_query ("UPDATE gh_booking SET dean='adosa_2' WHERE application_no = '$id'");
		mysql_query("INSERT INTO gh_movement VALUES ('','$id','$current_location','$name','Approved by Hossa and forwarded to Adosa_2.','$curdatetime')");
		$message = "Dear ".$applicant."\r\n Your guesthouse booking request (Application No. ".$id.") has been varified by hossa and Forwarded to Adosa_2. \r\n Latest status can be tracked via CLS.\r\n Thanking You.\r\n Regards,\r\n Team SWC";
			$headers = "MIME-Version: 1.0" . "\r\n";
			$headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
			$headers .= 'From: SWC, IIT Guwahati <swc@iitg.ernet.in>' . "\r\n";
			//$headers .= 'Cc: swc@iitg.ernet.in, saoff@iitg.ernet.in, hossa@iitg.ernet.in, adosa_1@iitg.ernet.in, guesthouse@iitg.ernet.in' . "\r\n";
			$user_webmail = $applicant_webmail."@iitg.ernet.in";
			mail($user_webmail , 'Guesthouse application forwarded to Adosa_2' , $message , $headers);
	}
?>
			<div id="page-wrapper">
                <!-- /.row -->
                <div class="row">
                    <div class="col-lg-12">
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                Guesthouse Room Booking Application No.: <b><?php echo $id; ?></b>
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
									else if($comment_success != ''){
									?>
									  <div class="alert alert-success">
										<?php if(isset($comment_success)) {											
											echo $comment_success;
										} 
										?>
									  </div>
									<?php
									}
									else if($approve_success != ''){
									?>
									  <div class="alert alert-success">
										<?php if(isset($approve_success)) {										
											echo $approve_success;
										} 
										?>
									  </div>
									  <style>
									  .before_approve{
										  display:none;
									  }
									  .hide_approve{
										  display:none;
									  }
									  .hide_reject{
										  display:none;
									  }
									  </style>
									<?php
									}
									else if($reject_success != ''){
									?>
									  <div class="alert alert-warning">
										<?php if(isset($reject_success)) {										
											echo $reject_success;
										} 
										?>
									  </div>
									  <style>
									  .before_approve{
										  display:none;
									  }
									  .hide_approve{
										  display:none;
									  }
									  .hide_reject{
										  display:none;
									  }
									  </style>
									<?php
									}
									else{
										//echo "";
									}
								?>
								<div class="table-responsive">
                                    <table class="table table-striped table-bordered table-hover">
                                        <tbody>
                                            <tr>
                                                <td><b>Application No.:</b> <?php echo $row_track["application_no"]; ?></td>
                                                <td><b style="color:#d3b62a;">Current Status:</b> <?php if($row_track["status"] == "Allotted"){echo "<span style='color:green;'>Room Allotted (".$row_track["allotted_room"].")</span>";} else{echo $row_track["status"];} ?></td>
                                                
                                            </tr>
                                            <tr>
                                                <td><b>Booking From:</b> <?php echo $row_track["date_from"]; ?></td>
                                                <td><b>Booking Upto:</b> <?php echo $row_track["date_to"]; ?></td>
                                            </tr>
                                            <tr>
                                                <td><b>No. of Night(s):</b> <?php echo $row_track["no_days"]; ?></td>
												<td><b>Room Type:</b> <?php echo $row_track["room_type"]; ?></td>
                                            </tr>
                                            <tr>
                                                <td><b>Booking By:</b> <?php echo $row_track["name"]; ?></td>
                                                <td><b>Applicant Roll No.:</b> <?php echo $row_track["roll_no"]; ?></td>
                                            </tr>
                                            <tr>
                                                <td><b>Applicant Webmail:</b> <?php echo $row_track["webmail"]; ?></td>
                                                <td><b>Applicant Hostel:</b> <?php echo $row_track["hostel"]; ?></td>
                                            </tr>
                                            <tr>
                                                <td><b>Applicant Room No.:</b> <?php echo $row_track["room"]; ?></td>
                                                <td><b>Applicant Department:</b> <?php echo $row_track["department"]; ?></td>
                                            </tr>
                                            <tr>
                                                <td><b>Visitor-1 Details:<br></b> <?php echo "Name: ".$row_track["visitor1_name"]."<br>Gender: ".$row_track["visitor1_gender"]."<br>Age: ".$row_track["visitor1_age"]."<br>Marital Status: ".$row_track["visitor1_marital"]."<br>Relation with Student: ".$row_track["visitor1_relation"]."<br>Address: ".$row_track["visitor1_address"]; ?></td>
												<td><b>Visitor-2 Details:<br></b> <?php if($row_track["visitor2_name"] == ''){echo "NA";} else{echo "Name: ".$row_track["visitor2_name"]."<br>Gender: ".$row_track["visitor2_gender"]."<br>Age: ".$row_track["visitor2_age"]."<br>Marital Status: ".$row_track["visitor2_marital"]."<br>Relation with Student: ".$row_track["visitor2_relation"]."<br>Address: ".$row_track["visitor2_address"];} ?></td>
                                            </tr>
											<tr>
                                                <td><b>Booking Reason:</b> <?php echo $row_track["booking_reason"]; ?></td>
                                                <td><b>Booking Time:</b> <?php echo $row_track["booking_time"]; ?></td>
                                            </tr>
											<tr>
                                                <td><b>Booking Category:</b> <?php echo $row_track["booking_category"]; ?></td>
                                                <td><b>Students' Phone No.:</b> <?php echo $row_track["phone"]; ?></td>
                                            </tr>
											<tr>
                                                <td colspan="2"><b>Visitors' ID Card:</b> <a href="../ids/<?php echo $row_track["id_card_name"]; ?>" target="_blank"> Download</a></td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
								<div class="dataTable_wrapper">
                                    <table class="table table-striped table-bordered table-hover" id="">
										<thead>
											<tr> 
											  <th valign="top" bgcolor="#dedede"> <font>Date and Time</font></th>
											  <th valign="top" bgcolor="#dedede"> <font>File Location</font></th>
											  <th valign="top" bgcolor="#dedede"> <font>Responsible Person</font></th>
											  <th valign="top" bgcolor="#dedede"> <font>Comment</font></th>
											</tr>
										</thead>
										<tbody>
										<?php
											$query3 = "SELECT * FROM gh_movement WHERE filesNo = '$id'";
											$result3 = mysql_query($query3);
												while($m_row = mysql_fetch_array($result3)){
												
														$m_location = $m_row[2];
														$m_responsible = $m_row[3];
														$m_comment = $m_row[4];
														$m_datetime = $m_row[5];
														echo "<tr class='odd'>";
														
														echo "<td><font size='2' color = 'red'><b>$m_datetime</b>";	
														echo "<td><font size='2'>$m_location";		
														echo "<td><font size='2'>$m_responsible";	
														echo "<td><font size='2'>$m_comment";		
														echo "</tr>";
														}
											?>
										</tbody>
                                    </table>
                                </div>
                                <!-- /.table-responsive -->
								<iframe src="print_guesthouse_application.php?print=<?php echo $id; ?>" name="frame1" style="display:none;"></iframe>
								<?php if($row_track["status"] == "Allotted"){ ?>
									<button type="button" onclick="frames['frame1'].print()" class="btn btn-primary">Print Approval Letter</button>
								<?php }
								else if($row_track["approve_saoff"] == "yes" AND ($current_dept != "104" AND $login_session != 'hossa' AND $login_session != 'adosa_1' AND $login_session != 'adosa_2' AND $login_session != 'dos' )) {?>
									<button type="button" class="btn btn-success disabled">Verified and forwarded to hossa</button>
									<button type="button" class="btn btn-primary disabled">Print Approval Letter</button>
								<?php
								}
								else if($row_track["approve_hossa"] == "yes" AND ($current_dept != "104" AND $login_session == 'hossa')) {?>
									<button type="button" class="btn btn-success disabled">Verified</button>
									<button type="button" class="btn btn-primary disabled">Print Approval Letter</button>
								<?php
								}
								else if($row_track["approve_dean"] == "yes" AND ($current_dept != "104" AND ($login_session == 'adosa_1' OR $login_session == 'adosa_2' OR $login_session == 'dos'))) {?>
									<button type="button" class="btn btn-success disabled">verified and forwarded to Establishment Section</button>
									<button type="button" class="btn btn-primary disabled">Print Approval Letter</button>
								<?php
								}
								else if($row_track["reject_saoff"] == "yes" OR $row_track["reject_hossa"] == "yes" OR $row_track["reject_dean"] == "yes" OR $row_track["reject_est"] == "yes" ){?>
									<button type="button" class="btn btn-danger disabled">Rejected</button>
								<?php
								}
								else{ ?>
								<form action="" accept-charset="utf-8" method="post">
								<?php if($current_dept != '104' AND $login_session != 'hossa'){ ?>
									<button type="submit" class="btn btn-success hide_approve" name="Approve">Approve</button>
								<?php } else if($current_dept != '104' AND $login_session == 'hossa') { ?>
									<button type="submit" class="btn btn-success hide_approve" name="dosa">Verify and Forward to Dosa</button>
									<button type="submit" class="btn btn-success hide_approve" name="adosa_1">Verify and Forward to adosa_1</button>
									<button type="submit" class="btn btn-success hide_approve" name="adosa_2">Verify and Forward to adosa_2</button>
								<?php } ?>
								
									<button type="submit" class="btn btn-danger hide_reject" name="Reject">Reject</button>
									<button type="button" class="btn btn-primary disabled">Print Approval Letter</button><hr>
								</form>
								<?php if($current_dept == '104'){ ?>
									<form name="gh" style="margin-top:2%" class="before_approve" action=""  accept-charset="utf-8" method="post" enctype="multipart/form-data">
											<div class="row">
												<div class="col-lg-12" style="padding-left:0px;" >
													<div class="col-lg-3">
														<div class="form-group">
															<label>Allot Room No. (optional)</label>
															<input type="text" class="form-control" name="allotted_room" value="<?php echo $row_track["allotted_room"]; ?>">
														</div>
													</div>
															<div class="col-lg-3">
														<div class="form-group">
															<label class="required">Category Recommended</label>
																	<select class="form-control" name="category_recommended">
																		<option value="Official">Official</option>
																		<option value="Semi-official">Semi-official</option>
																		<option value="Semi-private">Semi-private</option>
																		<option value="Private">Private</option>
																	</select>
														</div>
													</div>
													<div class="col-lg-6">
														<div class="form-group">
															<label>Add/Update Comment (if any)</label>
															<input type="text" class="form-control" name="comment_est">
														</div>
													</div>
												</div>
											</div>
											<div class="row">
												<div class="col-lg-12" style="padding-left:0px;" >
													<div class="col-lg-12">
														<div class="form-group ">
															<button type="submit" class="btn btn-primary" name="Submit_EST" >Submit</button>
														</div>
													</div>
												</div>
											</div>
									</form>
								<?php } 
								else if($login_session == 'hossa'){ ?>
									<form name="gh" style="margin-top:2%" class="before_approve" action=""  accept-charset="utf-8" method="post" enctype="multipart/form-data">
											<div class="row">
												<div class="col-lg-12" style="padding-left:0px;" >
													<div class="col-lg-6">
														<div class="form-group">
															<label>Add/Update Comment (optional)</label>
															<textarea type="text" class="form-control" name="comment_hossa"></textarea>
														</div>
													</div>
												</div>
											</div>
											<div class="row">
												<div class="col-lg-12" style="padding-left:0px;" >
													<div class="col-lg-12">
														<div class="form-group ">
															<button type="submit" class="btn btn-primary" name="Submit_Hossa" >Add Comment</button>
														</div>
													</div>
												</div>
											</div>
									</form>
								<?php }
								else if($login_session == 'adosa_1'){ ?>
									<form name="gh" style="margin-top:2%" class="before_approve" action=""  accept-charset="utf-8" method="post" enctype="multipart/form-data">
											<div class="row">
												<div class="col-lg-12" style="padding-left:0px;" >
													<div class="col-lg-6">
														<div class="form-group">
															<label>Add/Update Comment (optional)</label>
															<textarea type="text" class="form-control" name="comment_dean"></textarea>
														</div>
													</div>
												</div>
											</div>
											<div class="row">
												<div class="col-lg-12" style="padding-left:0px;" >
													<div class="col-lg-12">
														<div class="form-group ">
															<button type="submit" class="btn btn-primary" name="Submit_adosa_1" >Add Comment</button>
														</div>
													</div>
												</div>
											</div>
									</form>
								<?php }
                                 else if($login_session == 'adosa_2'){ ?>
									<form name="gh" style="margin-top:2%" class="before_approve" action=""  accept-charset="utf-8" method="post" enctype="multipart/form-data">
											<div class="row">
												<div class="col-lg-12" style="padding-left:0px;" >
													<div class="col-lg-6">
														<div class="form-group">
															<label>Add/Update Comment (optional)</label>
															<textarea type="text" class="form-control" name="comment_dean"></textarea>
														</div>
													</div>
												</div>
											</div>
											<div class="row">
												<div class="col-lg-12" style="padding-left:0px;" >
													<div class="col-lg-12">
														<div class="form-group ">
															<button type="submit" class="btn btn-primary" name="Submit_adosa_2" >Add Comment</button>
														</div>
													</div>
												</div>
											</div>
									</form>
								<?php }						
                                 else if($login_session == 'dos'){ ?>
									<form name="gh" style="margin-top:2%" class="before_approve" action=""  accept-charset="utf-8" method="post" enctype="multipart/form-data">
											<div class="row">
												<div class="col-lg-12" style="padding-left:0px;" >
													<div class="col-lg-6">
														<div class="form-group">
															<label>Add/Update Comment (optional)</label>
															<textarea type="text" class="form-control" name="comment_dean"></textarea>
														</div>
													</div>
												</div>
											</div>
											<div class="row">
												<div class="col-lg-12" style="padding-left:0px;" >
													<div class="col-lg-12">
														<div class="form-group ">
															<button type="submit" class="btn btn-primary" name="Submit_dosa" >Add Comment</button>
														</div>
													</div>
												</div>
											</div>
									</form>
								<?php }	else { ?>
									<form name="gh" style="margin-top:2%" class="before_approve" action=""  accept-charset="utf-8" method="post" enctype="multipart/form-data">
											<div class="row">
												<div class="col-lg-12" style="padding-left:0px;" >
													<div class="col-lg-6">
														<div class="form-group">
															<label>Add/Update Comment (optional)</label>
															<textarea type="text" class="form-control" name="comment_sa"></textarea>
														</div>
													</div>
												</div>
											</div>
											<div class="row">
												<div class="col-lg-12" style="padding-left:0px;" >
													<div class="col-lg-12">
														<div class="form-group ">
															<button type="submit" class="btn btn-primary" name="Submit" >Add Comment</button>
														</div>
													</div>
												</div>
											</div>
									</form>
								<?php } } ?>
							</div>
                            <!-- /.panel-body -->
                        </div>
                        <!-- /.panel -->
                    </div>
                    <!-- /.col-lg-12 -->
                </div>
            </div>
            <!-- /#page-wrapper -->
 
