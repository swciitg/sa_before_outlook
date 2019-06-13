<?php 
	include("session.php");
	include("connect.php");
	error_reporting(0);
	
	$currentdatetime = mysql_query('select now()');
	$curdatetime     = mysql_result($currentdatetime, 0);
	$id = $_GET['track'];
	$query = "SELECT * FROM schp_04 WHERE application_no = '$id'";
	$result = mysql_query($query);
	$row_track = mysql_fetch_array($result);
	$applicant = $row_track["name"];
	$applicant_webmail = $row_track["webmail"];
	$mch_application_no = $row_track["application_no"];
	$comment_sa = $_POST['comment_sa'];
	$comment_adosa_2 = $_POST['comment_adosa_2'];
	$comment_adosa_1 = $_POST['comment_adosa_1'];
	$comment_hossa = $_POST['comment_hossa'];
	$comment_dosa = $_POST['comment_dosa'];
	$query_sa = $_POST['query_sa'];
	$query_adosa_2 = $_POST['query_adosa_2'];
	$query_adosa_1 = $_POST['query_adosa_1'];
	$query_hossa = $_POST['query_hossa'];
	$query_dosa = $_POST['query_dosa'];	
	//$comment_est = $_POST['comment_est'];
	//$allotted_room = $_POST['allotted_room'];
//	$category_recommended = $_POST['category_recommended'];
//    $dosa = $_POST['dosa'];
//	$adosa_1 = $_POST['adosa_1'];
//	$adosa_2 = $_POST['adosa_2'];
	$error = "";
	$success = "";
	
	// comment add............
	
	if (isset($_POST['Submit_sa'])) {
		if($comment_sa ==''){
			$error = "Comment field is empty";
		}
		else {
			mysql_query("INSERT INTO schp_04_movement VALUES ('','$id','$current_location','$name','$comment_sa','$curdatetime')");
			mysql_query ("UPDATE schp_04 SET comment_saoff ='$comment_sa' WHERE application_no = '$id'");
			$comment_success="Comment successfully saved.";
			$message = "Dear ".$applicant."\r\n A comment has been added by SA Office to your MCH booking request (Application No. ".$id."). \r\n Comment: ".$comment_sa."\r\n Latest status can be tracked via CLS.\r\n Thanking You.\r\n Regards,\r\n Team SWC";
			$headers = "MIME-Version: 1.0" . "\r\n";
			$headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
			$headers .= 'From: SWC, IIT Guwahati <swc@iitg.ernet.in>' . "\r\n";
			//$headers .= 'Cc: swc@iitg.ernet.in, saoff@iitg.ernet.in, hossa@iitg.ernet.in' . "\r\n";
			$user_webmail = $applicant_webmail."@iitg.ernet.in";
		//	mail($user_webmail , 'Comment by SA Office on your MCH booking request' , $message , $headers);
		}
	}
	if (isset($_POST['Submit_hossa'])) {
		if($comment_hossa ==''){
			$error = "Comment field is empty";
		}
		else {
			mysql_query("INSERT INTO schp_04_movement VALUES ('','$id','$current_location','$name','$comment_hossa','$curdatetime')");
			mysql_query ("UPDATE schp_04 SET comment_hossa ='$comment_hossa' WHERE application_no = '$id'");
			$comment_success ="Comment successfully saved.";
			$message = "Dear ".$applicant."\r\n A comment has been added by HoSSA to your MCH booking request (Application No. ".$id."). \r\n Comment: ".$comment_hossa."\r\n Latest status can be tracked via CLS.\r\n Thanking You.\r\n Regards,\r\n Team SWC";
			$headers = "MIME-Version: 1.0" . "\r\n";
			$headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
			$headers .= 'From: SWC, IIT Guwahati <swc@iitg.ernet.in>' . "\r\n";
			//$headers .= 'Cc: swc@iitg.ernet.in, saoff@iitg.ernet.in, hossa@iitg.ernet.in' . "\r\n";
			$user_webmail = $applicant_webmail."@iitg.ernet.in";
		//	mail($user_webmail , 'Comment by HoSSA on your MCH Booking request' , $message , $headers);
		}
	} 
	if (isset($_POST['Submit_adosa_1'])) {
		if($comment_adosa_1 ==''){
			$error = "Comment field is empty";
		}
		else {
			mysql_query("INSERT INTO schp_04_movement VALUES ('','$id','$current_location','$name','$comment_adosa_1','$curdatetime')");
			mysql_query ("UPDATE schp_04 SET comment_dean ='$comment_adosa_1' WHERE application_no = '$id'");
			$comment_success ="Comment successfully saved.";
			$message = "Dear ".$applicant."\r\n A comment has been added by ADOSA_1 to your MCH booking request (Application No. ".$id."). \r\n Comment: ".$comment_hossa."\r\n Latest status can be tracked via CLS.\r\n Thanking You.\r\n Regards,\r\n Team SWC";
			$headers = "MIME-Version: 1.0" . "\r\n";
			$headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
			$headers .= 'From: SWC, IIT Guwahati <swc@iitg.ernet.in>' . "\r\n";
			//$headers .= 'Cc: swc@iitg.ernet.in, saoff@iitg.ernet.in, hossa@iitg.ernet.in' . "\r\n";
			$user_webmail = $applicant_webmail."@iitg.ernet.in";
		//	mail($user_webmail , 'Comment by HoSSA on your MCH Booking request' , $message , $headers);
		}
	}
	if (isset($_POST['Submit_adosa_2'])) {
		if($comment_adosa_2==''){
			$error = "Comment field is empty";
		}
		else {
			mysql_query("INSERT INTO schp_04_movement VALUES ('','$id','$current_location','$name','$comment_adosa_2','$curdatetime')");
			mysql_query ("UPDATE schp_04 SET comment_dean ='$comment_adosa_2' WHERE application_no = '$id'");
			$comment_success ="Comment successfully saved.";
			$message = "Dear ".$applicant."\r\n A comment has been added by ADOSA_2 to your MCH booking request (Application No. ".$id."). \r\n Comment: ".$comment_hossa."\r\n Latest status can be tracked via CLS.\r\n Thanking You.\r\n Regards,\r\n Team SWC";
			$headers = "MIME-Version: 1.0" . "\r\n";
			$headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
			$headers .= 'From: SWC, IIT Guwahati <swc@iitg.ernet.in>' . "\r\n";
			//$headers .= 'Cc: swc@iitg.ernet.in, saoff@iitg.ernet.in, hossa@iitg.ernet.in' . "\r\n";
			$user_webmail = $applicant_webmail."@iitg.ernet.in";
		//	mail($user_webmail , 'Comment by HoSSA on your MCH Booking request' , $message , $headers);
		}
	}
	if (isset($_POST['Submit_dosa'])) {
		if($comment_dosa ==''){
			$error = "Comment field is empty";
		}
		else {
			mysql_query("INSERT INTO schp_04_movement VALUES ('','$id','$current_location','$name','$comment_dosa','$curdatetime')");
			mysql_query ("UPDATE schp_04 SET comment_dean ='$comment_dosa' WHERE application_no = '$id'");
			$comment_success ="Comment successfully saved.";
			$message = "Dear ".$applicant."\r\n A comment has been added by DoSA to your MCH booking request (Application No. ".$id."). \r\n Comment: ".$comment_hossa."\r\n Latest status can be tracked via CLS.\r\n Thanking You.\r\n Regards,\r\n Team SWC";
			$headers = "MIME-Version: 1.0" . "\r\n";
			$headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
			$headers .= 'From: SWC, IIT Guwahati <swc@iitg.ernet.in>' . "\r\n";
			//$headers .= 'Cc: swc@iitg.ernet.in, saoff@iitg.ernet.in, hossa@iitg.ernet.in' . "\r\n";
			$user_webmail = $applicant_webmail."@iitg.ernet.in";
	//		mail($user_webmail , 'Comment by HoSSA on your MCH Booking request' , $message , $headers);
		}
	}

// query raised...............	
	
		if (isset($_POST['Submit1_sa'])) {
		if($query_sa ==''){
			$error = "Query Field is empty.";
		}
		else {
			mysql_query("INSERT INTO schp_04_movement VALUES ('','$id','$current_location','$name','$query_sa','$curdatetime')");
			mysql_query ("UPDATE schp_04 SET query_saoff ='$query_sa' WHERE application_no = '$id'");
			mysql_query ("UPDATE schp_04 SET query_by ='saoff' WHERE application_no = '$id'");
			mysql_query ("UPDATE schp_04 SET status='a query has been raised by Saoff' WHERE application_no = '$id'");
			$comment_success="Query successfully saved.";
			$message = "Dear ".$applicant."\r\n A Query has been Raised by SA Office to your Scholarship Application (Application No. ".$id."). \r\n Query: ".$query_sa."\r\n Latest status can be tracked via CLS.\r\n Thanking You.\r\n Regards,\r\n Team SWC";
			$headers = "MIME-Version: 1.0" . "\r\n";
			$headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
			$headers .= 'From: SWC, IIT Guwahati <swc@iitg.ernet.in>' . "\r\n";
			//$headers .= 'Cc: swc@iitg.ernet.in, saoff@iitg.ernet.in, hossa@iitg.ernet.in' . "\r\n";
			$user_webmail = $applicant_webmail."@iitg.ernet.in";
		//	mail($user_webmail , 'Query by SA Office on your Scholarship Application' , $message , $headers);
		}
	}
	if (isset($_POST['Submit1_hossa'])) {
		if($query_hossa ==''){
			$error = "query field is empty";
		}
		else {
			mysql_query("INSERT INTO schp_04_movement VALUES ('','$id','$current_location','$name','$query_hossa','$curdatetime')");
			mysql_query ("UPDATE schp_04 SET query_hossa ='$query_hossa' WHERE application_no = '$id'");
			mysql_query ("UPDATE schp_04 SET query_by ='hossa' WHERE application_no = '$id'");
			mysql_query ("UPDATE schp_04 SET status='a query has been raised by HoSSA' WHERE application_no = '$id'");
			$comment_success ="query successfully saved.";
			$message = "Dear ".$applicant."\r\n A Query has been Raised by Hossa to your Scholarship Application(Application No. ".$id."). \r\n Comment: ".$query_hossa."\r\n Latest status can be tracked via CLS.\r\n Thanking You.\r\n Regards,\r\n Team SWC";
			$headers = "MIME-Version: 1.0" . "\r\n";
			$headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
			$headers .= 'From: SWC, IIT Guwahati <swc@iitg.ernet.in>' . "\r\n";
			//$headers .= 'Cc: swc@iitg.ernet.in, saoff@iitg.ernet.in, hossa@iitg.ernet.in' . "\r\n";
			$user_webmail = $applicant_webmail."@iitg.ernet.in";
		//	mail($user_webmail , 'Query by HoSSA on your Scholarship application' , $message , $headers);
		}
	} 
	if (isset($_POST['Submit1_adosa_1'])) {
		if($query_adosa_1 ==''){
			$error = "query field is empty";
		}
		else {
			mysql_query("INSERT INTO schp_04_movement VALUES ('','$id','$current_location','$name','$query_adosa_1','$curdatetime')");
			mysql_query ("UPDATE schp_04 SET query_dean ='$query_adosa_1' WHERE application_no = '$id'");
			mysql_query ("UPDATE schp_04 SET query_by ='adosa_1' WHERE application_no = '$id'");
			mysql_query ("UPDATE schp_04 SET status='a query has been raised by Adosa_1' WHERE application_no = '$id'");
			$comment_success ="query successfully saved.";
			$message = "Dear ".$applicant."\r\n A Query has been Raised by Adosa_1 to your Scholarship Application (Application No. ".$id."). \r\n Comment: ".$query_adosa_1."\r\n Latest status can be tracked via CLS.\r\n Thanking You.\r\n Regards,\r\n Team SWC";
			$headers = "MIME-Version: 1.0" . "\r\n";
			$headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
			$headers .= 'From: SWC, IIT Guwahati <swc@iitg.ernet.in>' . "\r\n";
			//$headers .= 'Cc: swc@iitg.ernet.in, saoff@iitg.ernet.in, hossa@iitg.ernet.in' . "\r\n";
			$user_webmail = $applicant_webmail."@iitg.ernet.in";
		//	mail($user_webmail , 'Query by Adosa_1 on your Scholarship Application' , $message , $headers);
		}
	}
	if (isset($_POST['Submit1_adosa_2'])) {
		if($query_adosa_2==''){
			$error = "query field is empty";
		}
		else {
			mysql_query("INSERT INTO schp_04_movement VALUES ('','$id','$current_location','$name','$query_adosa_2','$curdatetime')");
			mysql_query ("UPDATE schp_04 SET query_dean ='$query_adosa_2' WHERE application_no = '$id'");
			mysql_query ("UPDATE schp_04 SET query_by ='adosa_2' WHERE application_no = '$id'");
			mysql_query ("UPDATE schp_04 SET status='a query has been raised by Adosa_1' WHERE application_no = '$id'");
			$comment_success ="query successfully saved.";
			$message = "Dear ".$applicant."\r\n A Query has been Raised by Adosa_2 to your Scholarship Application (Application No. ".$id."). \r\n Comment: ".$query_adosa_2."\r\n Latest status can be tracked via CLS.\r\n Thanking You.\r\n Regards,\r\n Team SWC";
			$headers = "MIME-Version: 1.0" . "\r\n";
			$headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
			$headers .= 'From: SWC, IIT Guwahati <swc@iitg.ernet.in>' . "\r\n";
			//$headers .= 'Cc: swc@iitg.ernet.in, saoff@iitg.ernet.in, hossa@iitg.ernet.in' . "\r\n";
			$user_webmail = $applicant_webmail."@iitg.ernet.in";
		//	mail($user_webmail , 'Query by Adosa_2 on your Scholarship Application' , $message , $headers);
		}
	}
	if (isset($_POST['Submit1_dosa'])) {
		if($query_dosa ==''){
			$error = "query field is empty";
		}
		else {
			mysql_query("INSERT INTO schp_04_movement VALUES ('','$id','$current_location','$name','$query_dosa','$curdatetime')");
			mysql_query ("UPDATE schp_04 SET query_dean ='$query_dosa' WHERE application_no = '$id'");
			mysql_query ("UPDATE schp_04 SET query_by ='dos' WHERE application_no = '$id'");
			mysql_query ("UPDATE schp_04 SET status='a query has been raised by Dosa' WHERE application_no = '$id'");
			$comment_success ="query successfully saved.";
			$message = "Dear ".$applicant."\r\n A Query has been Raised by Dosa to your Scholarship Application (Application No. ".$id."). \r\n Comment: ".$query_dosa."\r\n Latest status can be tracked via CLS.\r\n Thanking You.\r\n Regards,\r\n Team SWC";
			$headers = "MIME-Version: 1.0" . "\r\n";
			$headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
			$headers .= 'From: SWC, IIT Guwahati <swc@iitg.ernet.in>' . "\r\n";
			//$headers .= 'Cc: swc@iitg.ernet.in, saoff@iitg.ernet.in, hossa@iitg.ernet.in' . "\r\n";
			$user_webmail = $applicant_webmail."@iitg.ernet.in";
	//		mail($user_webmail , 'Query by Dosa on your Scholarship Application' , $message , $headers);
		}
	}

//////

	if (isset($_POST['Approve'])) {
		if ($login_session == 'adosa_1'){
			$approve_success = "Application Approved by adosa_1";
			mysql_query ("UPDATE schp_04 SET approve_dean='yes' WHERE application_no = '$id'");
			mysql_query ("UPDATE schp_04 SET status='approved' WHERE application_no = '$id'");
			mysql_query("INSERT INTO schp_04_movement VALUES ('','$id','$current_location','$name','Approved by adosa_1','$curdatetime')");
			$message = "Dear ".$applicant."\r\n Your MCH booking request (Application No. ".$id.") has been approved by SA Office and forwarded to HoSSA for further approval. \r\n Latest status can be tracked via CLS.\r\n Thanking You.\r\n Regards,\r\n Team SWC";
			$headers = "MIME-Version: 1.0" . "\r\n";
			$headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
			$headers .= 'From: SWC, IIT Guwahati <swc@iitg.ernet.in>' . "\r\n";
			//$headers .= 'Cc: swc@iitg.ernet.in, saoff@iitg.ernet.in, hossa@iitg.ernet.in' . "\r\n";
			$user_webmail = $applicant_webmail."@iitg.ernet.in";
	//		mail($user_webmail , 'MCH booking application approved by ADOSA1' , $message , $headers);
	    }
		
		else if ($login_session == 'adosa_2'){
			$approve_success = "Appplication Approved by adosa_2";
			mysql_query ("UPDATE schp_04 SET approve_daen='yes' WHERE application_no = '$id'");
			mysql_query ("UPDATEschp_04 SET status='approved' WHERE application_no = '$id'");
			mysql_query("INSERT INTO schp_04_movement VALUES ('','$id','$current_location','$name','Approved by adosa_2','$curdatetime')");
			$message = "Dear ".$applicant."\r\n Your MCH booking request (Application No. ".$id.") has been approved by SA Office and forwarded to HoSSA for further approval. \r\n Latest status can be tracked via CLS.\r\n Thanking You.\r\n Regards,\r\n Team SWC";
			$headers = "MIME-Version: 1.0" . "\r\n";
			$headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
			$headers .= 'From: SWC, IIT Guwahati <swc@iitg.ernet.in>' . "\r\n";
			//$headers .= 'Cc: swc@iitg.ernet.in, saoff@iitg.ernet.in, hossa@iitg.ernet.in' . "\r\n";
			$user_webmail = $applicant_webmail."@iitg.ernet.in";
	//		mail($user_webmail , 'MCH booking application approved by ADOSA2' , $message , $headers);
	    }
		else if ($login_session == 'dos'){
			$approve_success = "Application approved by dosa";
			mysql_query ("UPDATE schp_04 SET approve_dean='yes'  WHERE application_no = '$id'");
			mysql_query ("UPDATE schp_04 SET status='approved' WHERE application_no = '$id'");
			mysql_query("INSERT INTO schp_04_movement VALUES ('','$id','$current_location','$name','Approved by Dosa','$curdatetime')");
			$message = "Dear ".$applicant."\r\n Your MCH booking request (Application No. ".$id.") has been approved by SA Office and forwarded to HoSSA for further approval. \r\n Latest status can be tracked via CLS.\r\n Thanking You.\r\n Regards,\r\n Team SWC";
			$headers = "MIME-Version: 1.0" . "\r\n";
			$headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
			$headers .= 'From: SWC, IIT Guwahati <swc@iitg.ernet.in>' . "\r\n";
			//$headers .= 'Cc: swc@iitg.ernet.in, saoff@iitg.ernet.in, hossa@iitg.ernet.in' . "\r\n";
			$user_webmail = $applicant_webmail."@iitg.ernet.in";
	//		mail($user_webmail , 'MCH booking application approved by DOSA' , $message , $headers);
	    }
		else{
			$approve_success = "Details Verified and Forwarded to HoSSA.";
			mysql_query ("UPDATE schp_04 SET approve_saoff='yes',reach_hossa='yes' WHERE application_no = '$id'");
			mysql_query ("UPDATE schp_04 SET status='Approved by SA Office and forwarded to HoSSA.' WHERE application_no = '$id'");
			mysql_query("INSERT INTO schp_04_movement VALUES ('','$id','$current_location','$name','Approved and Forwarded to HoSSA','$curdatetime')");
			$message = "Dear ".$applicant."\r\n Your MCH booking request (Application No. ".$id.") has been approved by SA Office and forwarded to HoSSA for further approval. \r\n Latest status can be tracked via CLS.\r\n Thanking You.\r\n Regards,\r\n Team SWC";
			$headers = "MIME-Version: 1.0" . "\r\n";
			$headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
			$headers .= 'From: SWC, IIT Guwahati <swc@iitg.ernet.in>' . "\r\n";
			//$headers .= 'Cc: swc@iitg.ernet.in, saoff@iitg.ernet.in, hossa@iitg.ernet.in' . "\r\n";
			$user_webmail = $applicant_webmail."@iitg.ernet.in";
	//		mail($user_webmail , 'MCH booking application forwarded to HoSSA' , $message , $headers);
	    }
	}
	if (isset($_POST['Reject']) AND ($login_session != 'adosa_1' OR $login_session != 'adosa_2' OR $login_session != 'dos')) {
		if($login_session == 'hossa'){
			$reject_success = "Rejected.";
			mysql_query ("UPDATE schp_04 SET reject_hossa='yes' WHERE application_no = '$id'");
			mysql_query ("UPDATE schp_04 SET status='Rejected by HoSSA.' WHERE application_no = '$id'");
			mysql_query("INSERT INTO schp_04_movement VALUES ('','$id','$current_location','$name','Rejected by HoSSA','$curdatetime')");
			$message = "Dear ".$applicant."\r\n Your MCH booking request (Application No. ".$id.") has been rejected by HoSSA. \r\n Latest status can be tracked via CLS.\r\n Thanking You.\r\n Regards,\r\n Team SWC";
			$headers = "MIME-Version: 1.0" . "\r\n";
			$headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
			$headers .= 'From: SWC, IIT Guwahati <swc@iitg.ernet.in>' . "\r\n";
			//$headers .= 'Cc: swc@iitg.ernet.in, saoff@iitg.ernet.in, hossa@iitg.ernet.in' . "\r\n";
			$user_webmail = $applicant_webmail."@iitg.ernet.in";
	//		mail($user_webmail , 'MCH Booking application rejected by HoSSA' , $message , $headers);
		}

		else{
			$reject_success = "Rejected.";
			mysql_query ("UPDATE schp_04 SET reject_saoff='yes' WHERE application_no = '$id'");
			mysql_query ("UPDATE schp_04 SET status='Rejected by Students Affairs Office.' WHERE application_no = '$id'");
			mysql_query("INSERT INTO schp_04_movement VALUES ('','$id','$current_location','$name','Rejected by Students Affairs Office','$curdatetime')");
			$message = "Dear ".$applicant."\r\n Your MCH booking request (Application No. ".$id.") has been rejected by SA Office. \r\n Latest status can be tracked via CLS.\r\n Thanking You.\r\n Regards,\r\n Team SWC";
			$headers = "MIME-Version: 1.0" . "\r\n";
			$headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
			$headers .= 'From: SWC, IIT Guwahati <swc@iitg.ernet.in>' . "\r\n";
			//$headers .= 'Cc: swc@iitg.ernet.in, saoff@iitg.ernet.in' . "\r\n";
			$user_webmail = $applicant_webmail."@iitg.ernet.in";
	//		mail($user_webmail , 'MCH Booking application rejected by SA Office' , $message , $headers);
		}
	}
	if (isset($_POST['Reject']) AND ($login_session == 'adosa_1' OR $login_session == 'adosa_2' OR $login_session == 'dos')) {
		$reject_success = "Rejected.";
		mysql_query ("UPDATE schp_04 SET reject_dean='yes' WHERE application_no = '$id'");
		mysql_query ("UPDATE schp_04 SET status='Rejectd by Dean.' WHERE application_no = '$id'");
		mysql_query("INSERT INTO schp_04_movement VALUES ('','$id','$current_location','$name','Rejected by Dean','$curdatetime')");
		$message = "Dear ".$applicant."\r\n Your MCH booking request (Application No. ".$id.") has been rejected by Establishment Section. \r\n Latest status can be tracked via CLS.\r\n Thanking You.\r\n Regards,\r\n Team SWC";
			$headers = "MIME-Version: 1.0" . "\r\n";
			$headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
			$headers .= 'From: SWC, IIT Guwahati <swc@iitg.ernet.in>' . "\r\n";
			//$headers .= 'Cc: swc@iitg.ernet.in, saoff@iitg.ernet.in, hossa@iitg.ernet.in, adosa_1@iitg.ernet.in, guesthouse@iitg.ernet.in' . "\r\n";
			$user_webmail = $applicant_webmail."@iitg.ernet.in";
	//		mail($user_webmail , 'MCH Booking application rejected by Adosa1' , $message , $headers);
	}
	

	if(isset($_POST['dosa']) AND $login_session == 'hossa'){
		$approve_success = "Application Forwarded to Dosa.";
		mysql_query ("UPDATE schp_04 SET reach_dean='yes' WHERE application_no = '$id'");
		mysql_query ("UPDATE schp_04 SET status='Approved by Hossa and forwarded to Dosa.' WHERE application_no = '$id'");
		mysql_query ("UPDATE schp_04 SET dean='dosa' WHERE application_no = '$id'");
		mysql_query ("UPDATE schp_04 SET approve_hossa='yes' WHERE application_no = '$id'");
		mysql_query("INSERT INTO schp_04_movement VALUES ('','$id','$current_location','$name','Approved by Hossa and forwarded to Dosa','$curdatetime')");
	}
	if(isset($_POST['adosa_1']) AND $login_session == 'hossa'){
		$approve_success = "Application Forwarded to Adosa_1.";
		mysql_query ("UPDATE schp_04 SET reach_dean='yes' WHERE application_no = '$id'");
		mysql_query ("UPDATE schp_04 SET status='Approved by Hossa and forwarded to Adosa_1.' WHERE application_no = '$id'");
		mysql_query ("UPDATE schp_04 SET dean='adosa_1' WHERE application_no = '$id'");
		mysql_query ("UPDATE schp_04 SET approve_hossa='yes' WHERE application_no = '$id'");
		mysql_query("INSERT INTO schp_04_movement VALUES ('','$id','$current_location','$name','Approved by Hossa and forwarded to Adosa_1','$curdatetime')");
	}
	if(isset($_POST['adosa_2']) AND $login_session == 'hossa'){
		$approve_success = "Application Forwarded to Adosa_2.";
		mysql_query ("UPDATE schp_04 SET reach_dean='yes' WHERE application_no = '$id'");
		mysql_query ("UPDATE schp_04 SET status='Approved by Hossa and forwarded to Adosa_2.' WHERE application_no = '$id'");	
		mysql_query ("UPDATE schp_04 SET approve_hossa='yes' WHERE application_no = '$id'");
		mysql_query ("UPDATE schp_04 SET dean='adosa_2' WHERE application_no = '$id'");
		mysql_query("INSERT INTO schp_04_movement VALUES ('','$id','$current_location','$name','Approved by Hossa and forwarded to Adosa_2.','$curdatetime')");
	}
	

?>
			<div id="page-wrapper">
                <!-- /.row -->
                <div class="row">
                    <div class="col-lg-12">
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                Certify/Forwarding Outside Scholarship Application No.: <b><?php echo $id; ?></b>
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
												<?php echo "<div style='font-size:150%; color:#198822'>Details of Applicant</div>"; ?>
			
								<div class="table-responsive">
                                    <table class="table table-striped table-bordered table-hover">
                                        <tbody>
                                            <tr>
                                                <td><b>Application No.:</b> <?php echo $row_track["application_no"]; ?></td>
                                                <td><b style="color:#d3b62a;">Current Status:</b> <?php if($row_track["status"] == "approved"){echo "<span style='color:green;'>Scholarship Application Approved ()</span>";} else{echo $row_track["status"];} ?></td>
                                                
                                            </tr>
                                            <tr>
                                                <td><b>Applicant:</b> <?php echo $row_track["name"]; ?></td>
                                                <td><b>Category:</b> <?php echo $row_track["category"]; ?></td>
                                            </tr>
                                            <tr>
                                                <td><b>Applicant Programme:</b> <?php echo $row_track["programme"]; ?></td>
                                                <td><b>Applicant Roll No.:</b> <?php echo $row_track["roll_no"]; ?></td>
                                            </tr>
                                            <tr>
                                                <td><b>Applicant Hostel:</b> <?php echo $row_track["hostel"]; ?></td>
                                                <td><b>Applicant Room No.:</b> <?php echo $row_track["room_no"]; ?></td>
                                            </tr>
                                            <tr>
                                                <td><b>Students' Phone No.:</b> <?php echo $row_track["contact_no"]; ?></td>
                                                <td><b>Applicant Department:</b> <?php echo $row_track["department"] ; ?></td>
                                            </tr>
								</tbody>
                                    </table>
                                </div>
								
 							<?php echo "<div style='font-size:150%; color:#198822'>Details of Parents</div>"; ?>


           <div class="table-responsive">
                                    <table class="table table-striped table-bordered table-hover">
                                        <tbody> 
											<tr>
												<td><b>Father's Name:</b> <?php echo $row_track["father_name"]; ?></td>
                                                <td><b>Father's Occupation:</b> <?php echo $row_track["father_occup"]; ?></td>
                                            </tr>
											<tr>
												<td><b>Mother's Name:</b> <?php echo $row_track["mother_name"]; ?></td>
                                                <td><b>Mother's Occupation:</b> <?php echo $row_track["mother_occup"]; ?></td>
                                            </tr>
											<tr>
												<td><b>Parents Annual Income:</b> <?php echo $row_track["annual_income"]; ?></td>
                                                <td><b>Income slab:</b> <?php echo $row_track["income_slab"]; ?></td>
                                            </tr>
											<tr>
												<td><b>Permanent Address:</b> <?php echo $row_track["permanent_address"]; ?></td>
                                                <td><b>Student's Phone No.:</b> <?php echo $row_track["contact_no"]; ?></td>
                                            </tr>
											<tr>
												<td><b>Father's Employer Address:</b> <?php if($row_track["father_address"] != ''){ echo $row_track["father_address"]; } else{ echo "NA"; }?></td>
                                                <td><b>Mother's Employer Address:</b> <?phpif($row_track["mother_address"] != ''){ echo $row_track["mother_address"]; } else{ echo "NA"; } ?></td>
                                            </tr> 
											
                                        </tbody>
                                    </table>
                                </div>
							<?php echo "<div style='font-size:150%; color:#198822'>Details of Scholarship</div>"; ?>

								<div class="table-responsive">
                                    <table class="table table-striped table-bordered table-hover">
                                        <tbody>
                                            <tr>
                                                <td><b>Name of Scholarship:</b> <?php echo $row_track["scholarship_name"]; ?></td>
                                                <td><b>Session:</b> <?php echo $row_track["session_applying"]; ?></td>

                                            </tr>
                                            <tr>
                                                <td><b>Sponsored Organization:</b> <?php echo $row_track["sponsored_org"]; ?></td>
                                                <td><b>Amount of Scholarship:</b> <?php echo $row_track["scholarship_amount "]; ?></td>
                                            </tr>
                                            <tr>
                                                <td><b>Last Date for Submission to sponsorer :</b> <?php echo $row_track["last_date"]; ?></td>
                                                <td><b>Scholarship Status:</b> <?php echo $row_track["schp_status"]; ?></td>
                                            </tr>
                                            <tr>
                                                <td><b>Year (If applicant got the Scholarship Before):</b> <?php if($row_track["schp_status"] == 'yes'){ echo $row_track["year"]; } else{ echo "NA"; } ?></td>
                                                <td><b>Amount (If applicant got the Scholarship Before):</b> <?php if($row_track["schp_status"] == 'yes'){ echo $row_track["amount"]; } else{ echo "NA"; } ?></td>
                                            </tr>
											<tr>
												<td><b>whether the Scholarship will be received directly from sponsoring authority / through IITG?:</b> <?php echo $row_track["sponsoring_authority"]; ?></td>
                                                <td><b>Latest CPI/% in qualifying marks:</b> <?php echo $row_track["cpi"]; ?></td>
                                            </tr>
											<tr>
                                                <td><b>Grade Card:</b> <a href="../schp_04/grade_card/<?php echo $row_track["gradecard"]; ?>" target="_blank"> Download</a></td>
                                                <td><b>Supporting Documents:</b> <a href="../schp_04/files/<?php echo $row_track["documents"]; ?>" target="_blank"> Download</a></td>
                                            </tr>
									</tbody>
                                    </table>
                                </div>	
								<?php echo "<div style='font-size:150%; color:#198822'>Details of Other Scholarship</div>"; ?>
							
                             <div class="table-responsive">
                                    <table class="table table-striped table-bordered table-hover">
                                        <tbody>								
                                            <tr>
                                                <td><b>Recipient of any other scholarship(s):</b> <?php echo $row_track["other_scholarship"]; ?></td>
                                                <td><b>Name of That Scholarship:</b> <?php echo $row_track["details_other_scholarship"] ; ?></td>
                                            </tr>
											<tr>
												<td><b>Session:</b> <?php echo $row_track["session_other_scholarship"]; ?></td>
                                                <td><b>Amount:</b> <?php echo $row_track["amount_other_scholarship"]; ?></td>
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
											$query3 = "SELECT * FROM schp_04_movement WHERE filesNo = '$id'";
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
								<?php if($row_track["status"] == "approved"){ ?>
									<button type="button" onclick="frames['frame1'].print()" class="btn btn-primary">Print Approval Letter</button>
								<?php } 
								else if($row_track["approve_saoff"] == "yes" AND ($login_session != 'hossa' AND $login_session != 'dos' AND $login_session != 'adosa_1' AND $login_session != 'adosa_2')) {?>
									<button type="button" class="btn btn-success disabled">Verified</button>
									<button type="button" class="btn btn-primary disabled">Print Approval Letter</button>
								<?php
								} 
								else if($row_track["approve_hossa"] == "yes" AND ($login_session == 'hossa')) {?>
									<button type="button" class="btn btn-success disabled">Verified</button>
									<button type="button" class="btn btn-primary disabled">Print Approval Letter</button>
									
								
								<?php
								}
								else if($row_track["reject_saoff"] == "yes" OR $row_track["reject_hossa"] == "yes" OR $row_track["reject_dean"] == "yes" ){?>
									<button type="button" class="btn btn-danger disabled">Rejected</button>
								<?php
								}
		   		            	else{ 
								if($login_session == 'adosa_1' AND $row_track["dean"] == "adosa_1" AND $row_track["reach_dean"] == "yes"){ ?>
								<form action="" accept-charset="utf-8" method="post">
									<button type="submit" class="btn btn-success hide_approve" name="Approve">Approve</button>
									<button type="submit" class="btn btn-danger hide_reject" name="Reject">Reject</button>
									<button type="button" class="btn btn-primary disabled">Print Approval Letter</button>
								</form>
			<table class="table table-striped table-bordered table-hover">
				<tbody>
					<tr>
						<td><form name="gh" style="margin-top:2%" class="before_approve" action=""  accept-charset="utf-8" method="post" enctype="multipart/form-data">
									<div class="row">
												<div class="col-lg-12" style="padding-left:0px;" >
													<div class="col-lg-6">
														<div class="form-group">
															<label>Add/Update Comment</label>
															<textarea type="text" class="form-control" name="comment_adosa_1"></textarea>
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
								</form> </td>
									
									<td> <form name="gh" style="margin-top:2%" class="before_approve" action=""  accept-charset="utf-8" method="post" enctype="multipart/form-data">
											<div class="row">
												<div class="col-lg-12" style="padding-left:0px;" >
													<div class="col-lg-6">
														<div class="form-group">
															<label>Raise a Query.</label>
															<textarea type="text" class="form-control" name="query_adosa_1"></textarea>
														</div>
													</div>
												</div>
											</div>
											<div class="row">
												<div class="col-lg-12" style="padding-left:0px;" >
													<div class="col-lg-12">
														<div class="form-group ">
															<button type="submit" class="btn btn-primary" name="Submit1_adosa_1" >Raise Query</button>
														</div>
													</div>
												</div>
											</div>
									</form> </td>
									</tbody>
									</table>
								<?php } 
								else if($login_session == 'adosa_2' AND $row_track["dean"] == "adosa_2" AND $row_track["reach_dean"] == "yes"){ ?>
								<form action="" accept-charset="utf-8" method="post">
									<button type="submit" class="btn btn-success hide_approve" name="Approve">Approve</button>
									<button type="submit" class="btn btn-danger hide_reject" name="Reject">Reject</button>
									<button type="button" class="btn btn-primary disabled">Print Approval Letter</button>
								<table class="table table-striped table-bordered table-hover">
			<tbody>
			  <tr>
     			  <td><form name="gh" style="margin-top:2%" class="before_approve" action=""  accept-charset="utf-8" method="post" enctype="multipart/form-data">
              				  <div class="row">
												<div class="col-lg-12" style="padding-left:0px;" >
													<div class="col-lg-6">
														<div class="form-group">
															<label>Add/Update Comment</label>
															<textarea type="text" class="form-control" name="comment_adosa_2"></textarea>
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
									</form> </td>
									
									<td> <form name="gh" style="margin-top:2%" class="before_approve" action=""  accept-charset="utf-8" method="post" enctype="multipart/form-data">
											<div class="row">
												<div class="col-lg-12" style="padding-left:0px;" >
													<div class="col-lg-6">
														<div class="form-group">
															<label>Raise a Query.</label>
															<textarea type="text" class="form-control" name="query_adosa_2"></textarea>
														</div>
													</div>
												</div>
											</div>
											<div class="row">
												<div class="col-lg-12" style="padding-left:0px;" >
													<div class="col-lg-12">
														<div class="form-group ">
															<button type="submit" class="btn btn-primary" name="Submit1_adosa_2" >Raise Query</button>
														</div>
													</div>
												</div>
											</div>
									</form> </td>
									</tbody>
									</table>
								<?php }
								else if($login_session == 'dos' AND $row_track["dean"] == "dosa" AND $row_track["reach_dean"] == "yes"){ ?>
								<form action="" accept-charset="utf-8" method="post">
									<button type="submit" class="btn btn-success hide_approve" name="Approve">Approve</button>
									<button type="submit" class="btn btn-danger hide_reject" name="Reject">Reject</button>
									<button type="button" class="btn btn-primary disabled">Print Approval Letter</button>
								<table class="table table-striped table-bordered table-hover">
			<tbody>
			  <tr>
     			  <td><form name="gh" style="margin-top:2%" class="before_approve" action=""  accept-charset="utf-8" method="post" enctype="multipart/form-data">
              				  <div class="row">
												<div class="col-lg-12" style="padding-left:0px;" >
													<div class="col-lg-6">
														<div class="form-group">
															<label>Add/Update Comment</label>
															<textarea type="text" class="form-control" name="comment_dosa"></textarea>
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
									</form> </td>
									
									<td> <form name="gh" style="margin-top:2%" class="before_approve" action=""  accept-charset="utf-8" method="post" enctype="multipart/form-data">
											<div class="row">
												<div class="col-lg-12" style="padding-left:0px;" >
													<div class="col-lg-6">
														<div class="form-group">
															<label>Raise a Query.</label>
															<textarea type="text" class="form-control" name="query_dosa"></textarea>
														</div>
													</div>
												</div>
											</div>
											<div class="row">
												<div class="col-lg-12" style="padding-left:0px;" >
													<div class="col-lg-12">
														<div class="form-group ">
															<button type="submit" class="btn btn-primary" name="Submit1_dosa" >Raise Query</button>
														</div>
													</div>
												</div>
											</div>
									</form> </td>
									</tbody>
									</table>
								<?php }
								else if($login_session == 'hossa' AND $row_track["reach_hossa"] == "yes"){ ?>
								<form action="" accept-charset="utf-8" method="post">
									<button type="submit" class="btn btn-success hide_approve" name="dosa">Verify and Forward to Dosa</button>
									<button type="submit" class="btn btn-danger hide_reject" name="adosa_1">Verify and Forward to adosa_1</button>
									<button type="submit" class="btn btn-success hide_approve " name="adosa_2">Verify and Forward to adosa_2</button>
									<button type="submit" class="btn btn-danger hide_reject" name="Reject">Reject</button>
									<button type="button" class="btn btn-primary disabled">Print Approval Letter</button>
								</form>
									<table class="table table-striped table-bordered table-hover">
			<tbody>
			  <tr>
     			  <td><form name="gh" style="margin-top:2%" class="before_approve" action=""  accept-charset="utf-8" method="post" enctype="multipart/form-data">
              				  <div class="row">
												<div class="col-lg-12" style="padding-left:0px;" >
													<div class="col-lg-6">
														<div class="form-group">
															<label>Add/Update Comment</label>
															<textarea type="text" class="form-control" name="comment_hossa"></textarea>
														</div>
													</div>
												</div>
											</div>
											<div class="row">
												<div class="col-lg-12" style="padding-left:0px;" >
													<div class="col-lg-12">
														<div class="form-group ">
															<button type="submit" class="btn btn-primary" name="Submit_hossa" >Add Comment</button>
														</div>
													</div>
												</div>
											</div>
									</form> </td>
									
									<td> <form name="gh" style="margin-top:2%" class="before_approve" action=""  accept-charset="utf-8" method="post" enctype="multipart/form-data">
											<div class="row">
												<div class="col-lg-12" style="padding-left:0px;" >
													<div class="col-lg-6">
														<div class="form-group">
															<label>Raise a Query.</label>
															<textarea type="text" class="form-control" name="query_hossa"></textarea>
														</div>
													</div>
												</div>
											</div>
											<div class="row">
												<div class="col-lg-12" style="padding-left:0px;" >
													<div class="col-lg-12">
														<div class="form-group ">
															<button type="submit" class="btn btn-primary" name="Submit1_hossa" >Raise Query</button>
														</div>
													</div>
												</div>
											</div>
									</form> </td>
									</tbody>
									</table>
								<?php }else { ?>
								 <form action="" accept-charset="utf-8" method="post">
									<button type="submit" class="btn btn-success hide_approve" name="Approve">Verify and Forward to Hossa</button>
									<button type="submit" class="btn btn-danger hide_reject" name="Reject">Reject</button>
									<button type="button" class="btn btn-primary disabled">Print Approval Letter</button>
								</form>
									<table class="table table-striped table-bordered table-hover">
			<tbody>
			  <tr>
     			  <td><form name="gh" style="margin-top:2%" class="before_approve" action=""  accept-charset="utf-8" method="post" enctype="multipart/form-data">
              				  <div class="row">
												<div class="col-lg-12" style="padding-left:0px;" >
													<div class="col-lg-6">
														<div class="form-group">
															<label>Add/Update Comment</label>
															<textarea type="text" class="form-control" name="comment_sa"></textarea>
														</div>
													</div>
												</div>
											</div>
											<div class="row">
												<div class="col-lg-12" style="padding-left:0px;" >
													<div class="col-lg-12">
														<div class="form-group ">
															<button type="submit" class="btn btn-primary" name="Submit_sa" >Add Comment</button>
														</div>
													</div>
												</div>
											</div>
									</form> </td>
									
									<td> <form name="gh" style="margin-top:2%" class="before_approve" action=""  accept-charset="utf-8" method="post" enctype="multipart/form-data">
											<div class="row">
												<div class="col-lg-12" style="padding-left:0px;" >
													<div class="col-lg-6">
														<div class="form-group">
															<label>Raise a Query:</label>
															<textarea type="text" class="form-control" name="query_sa"></textarea>
														</div>
													</div>
												</div>
											</div>
											<div class="row">
												<div class="col-lg-12" style="padding-left:0px;" >
													<div class="col-lg-12">
														<div class="form-group ">
															<button type="submit" class="btn btn-primary" name="Submit1_sa" >Raise Query</button>
														</div>
													</div>
												</div>
											</div>
									</form> </td>
									</tbody>
									</table> 
								 
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
 
