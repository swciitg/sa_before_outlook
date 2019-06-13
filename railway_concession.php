<?php
	include("session.php");
	error_reporting(E_ALL & ~(E_STRICT|E_NOTICE));
	ini_set("display_errors", 1);

	include("connect.php");				

	//$id = $login_session;
	
	$query2_2 = "SELECT webmail, journey_date, return_date FROM railway_concession_1  WHERE webmail = 'tusharyadav'";
	$result2_2 = mysql_query($query2_2);
	$query2 = "SELECT rc_1.webmail, rc_1.journey_date, rc_1.return_date, rc_2.webmail FROM railway_concession_1 as rc_1 INNER JOIN railway_concession_2 as rc_2 ON rc_1.id=rc_2.id WHERE (rc_1.webmail = '$login_session' OR rc_2.webmail='$login_session')";
	$result2 = mysql_query($query2);
	
	

	$query_rc = "SELECT * FROM railway_concession_availibility_btech";
	$result_rc = mysql_query($query_rc);
	$row_availability = mysql_fetch_array($result_rc);
	$starting_date = $row_availability['date_from'];
	$end_date = $row_availability['date_to'];
	
	
	//Student-1 info
	$student1_name = $_POST["student1_name"];
	$student1_webmail = $_POST["student1_webmail"];
	$student1_roll_number = $_POST["student1_roll_number"];
	$student1_age = $_POST["student1_age"];
	$student1_gender = $_POST["student1_gender"];
	$student1_hostel = $_POST["student1_hostel"];
	$student1_room_number = $_POST["student1_room_number"];
	$student1_course = $_POST["student1_course"];
	$student1_category = $_POST["student1_category"];
	//Student-1 ID
	$student1_idFile = $_FILES['student1_id']['name'];
	$tmp_dir_student1_id = $_FILES['student1_id']['tmp_name'];
	$student1_id_Size = $_FILES['student1_id']['size'];
	$student1_id_SizeKB = (int) ($student1_id_Size / 1024);	
	$upload_dir_ids = 'railway/ids/'; // upload directory
	// Renaming Uploaded student-1 ID Card
	$student1_id_temp = explode(".", $_FILES["student1_id"]["name"]);
	$student1_id_newfilename = round(microtime(true)*1000) . 'student1' . '.' . end($student1_id_temp);
	//Student-1 department
	$student1_dept_leave = $_FILES["student1_dept_leave"]["name"];
	$tmp_dir_student1_dept_leave = $_FILES['student1_dept_leave']['tmp_name'];
	$student1_dept_leave_Size = $_FILES['student1_dept_leave']['size'];
	$student1_dept_leave_SizeKB = (int) ($student1_dept_leave_Size / 1024);	
	$upload_dir_dept = 'railway/dept/'; // upload directory
	// Renaming Uploaded student-1 ID Card
	$student1_dept_leave_temp = explode(".", $_FILES["student1_dept_leave"]["name"]);
	$student1_dept_leave_newfilename = round(microtime(true)*1000) . 'student1' . '.' . end($student1_dept_leave_temp);
	//Student-1 caste certi
	$student1_caste_certi = $_FILES["student1_caste_certi"]["name"];
	$tmp_dir_student1_caste_certi = $_FILES['student1_caste_certi']['tmp_name'];
	$student1_caste_certi_Size = $_FILES['student1_caste_certi']['size'];
	$student1_caste_certi_SizeKB = (int) ($student1_caste_certi_Size / 1024);	
	$upload_dir_caste = 'railway/caste/'; // upload directory
	// Renaming Uploaded student-1 ID Card
	$student1_caste_certi_temp = explode(".", $_FILES["student1_caste_certi"]["name"]);
	$student1_caste_certi_newfilename = round(microtime(true)*1000) . 'student1' . '.' . end($student1_caste_certi_temp);


	//Student-2 info
	$student2_name = $_POST["student2_name"];
	$student2_webmail = $_POST["student2_webmail"];
	$student2_roll_number = $_POST["student2_roll_number"];
	$student2_age = $_POST["student2_age"];
	$student2_gender = $_POST["student2_gender"];
	$student2_hostel = $_POST["student2_hostel"];
	$student2_room_number = $_POST["student2_room_number"];
	$student2_course = $_POST["student2_course"];
	$student2_category = $_POST["student2_category"];
	//Student-2 ID
	$student2_idFile = $_FILES['student2_id']['name'];
	$tmp_dir_student1_id = $_FILES['student2_id']['tmp_name'];
	$student2_id_Size = $_FILES['student2_id']['size'];
	$student2_id_SizeKB = (int) ($student2_id_Size / 1024);	
	//$upload_dir_ids = 'railway/ids/'; // upload directory
	// Renaming Uploaded student-2 ID Card
	$student2_id_temp = explode(".", $_FILES["student2_id"]["name"]);
	$student2_id_newfilename = round(microtime(true)*1000) . 'student2' . '.' . end($student2_id_temp);
	//Student-2 department
	$student2_dept_leave = $_FILES["student2_dept_leave"]["name"];
	$tmp_dir_student2_dept_leave = $_FILES['student2_dept_leave']['tmp_name'];
	$student2_dept_leave_Size = $_FILES['student2_dept_leave']['size'];
	$student2_dept_leave_SizeKB = (int) ($student2_dept_leave_Size / 1024);	
	//$upload_dir_dept = 'railway/dept/'; // upload directory
	// Renaming Uploaded student-2 ID Card
	$student2_dept_leave_temp = explode(".", $_FILES["student2_dept_leave"]["name"]);
	$student2_dept_leave_newfilename = round(microtime(true)*1000) . 'student2' . '.' . end($student2_dept_leave_temp);
	//Student-2 caste certi
	$student2_caste_certi = $_FILES["student2_caste_certi"]["name"];
	$tmp_dir_student2_caste_certi = $_FILES['student2_caste_certi']['tmp_name'];
	$student2_caste_certi_Size = $_FILES['student2_caste_certi']['size'];
	$student2_caste_certi_SizeKB = (int) ($student2_caste_certi_Size / 1024);	
	//$upload_dir_caste = 'railway/caste/'; // upload directory
	// Renaming Uploaded student-2 ID Card
	$student2_caste_certi_temp = explode(".", $_FILES["student2_caste_certi"]["name"]);
	$student2_caste_certi_newfilename = round(microtime(true)*1000) . 'student2' . '.' . end($student2_caste_certi_temp);




	//Student-3 info
	$student3_name = $_POST["student3_name"];
	$student3_webmail = $_POST["student3_webmail"];
	$student3_roll_number = $_POST["student3_roll_number"];
	$student3_age = $_POST["student3_age"];
	$student3_gender = $_POST["student3_gender"];
	$student3_hostel = $_POST["student3_hostel"];
	$student3_room_number = $_POST["student3_room_number"];
	$student3_course = $_POST["student3_course"];
	$student3_category = $_POST["student3_category"];	
	//Student-3 ID
	$student3_idFile = $_FILES['student3_id']['name'];
	$tmp_dir_student3_id = $_FILES['student3_id']['tmp_name'];
	$student3_id_Size = $_FILES['student3_id']['size'];
	$student3_id_SizeKB = (int) ($student3_id_Size / 1024);	
	//$upload_dir_ids = 'railway/ids/'; // upload directory
	// Renaming Uploaded student-3 ID Card
	$student3_id_temp = explode(".", $_FILES["student3_id"]["name"]);
	$student3_id_newfilename = round(microtime(true)*1000) . 'student3' . '.' . end($student3_id_temp);
	//Student-3 department
	$student3_dept_leave = $_FILES["student3_dept_leave"]["name"];
	$tmp_dir_student3_dept_leave = $_FILES['student3_dept_leave']['tmp_name'];
	$student3_dept_leave_Size = $_FILES['student3_dept_leave']['size'];
	$student3_dept_leave_SizeKB = (int) ($student3_dept_leave_Size / 1024);	
	//$upload_dir_dept = 'railway/dept/'; // upload directory
	// Renaming Uploaded student-3 ID Card
	$student3_dept_leave_temp = explode(".", $_FILES["student3_dept_leave"]["name"]);
	$student3_dept_leave_newfilename = round(microtime(true)*1000) . 'student3' . '.' . end($student3_dept_leave_temp);
	//Student-3 caste certi
	$student3_caste_certi = $_FILES["student3_caste_certi"]["name"];
	$tmp_dir_student3_caste_certi = $_FILES['student3_caste_certi']['tmp_name'];
	$student3_caste_certi_Size = $_FILES['student3_caste_certi']['size'];
	$student3_caste_certi_SizeKB = (int) ($student3_caste_certi_Size / 1024);	
	//$upload_dir_caste = 'railway/caste/'; // upload directory
	// Renaming Uploaded student-3 ID Card
	$student3_caste_certi_temp = explode(".", $_FILES["student3_caste_certi"]["name"]);
	$student3_caste_certi_newfilename = round(microtime(true)*1000) . 'student3' . '.' . end($student3_caste_certi_temp);



	//Student-4 info
	$student4_name = $_POST["student4_name"];
	$student4_webmail = $_POST["student4_webmail"];
	$student4_roll_number = $_POST["student4_roll_number"];
	$student4_age = $_POST["student4_age"];
	$student4_gender = $_POST["student4_gender"];
	$student4_hostel = $_POST["student4_hostel"];
	$student4_room_number = $_POST["student4_room_number"];
	$student4_course = $_POST["student4_course"];
	$student4_category = $_POST["student4_category"];	
	//Student-4 ID
	$student4_idFile = $_FILES['student4_id']['name'];
	$tmp_dir_student4_id = $_FILES['student4_id']['tmp_name'];
	$student4_id_Size = $_FILES['student4_id']['size'];
	$student4_id_SizeKB = (int) ($student4_id_Size / 1024);	
	//$upload_dir_ids = 'railway/ids/'; // upload directory
	// Renaming Uploaded student-4 ID Card
	$student4_id_temp = explode(".", $_FILES["student4_id"]["name"]);
	$student4_id_newfilename = round(microtime(true)*1000) . 'student4' . '.' . end($student4_id_temp);
	//Student-4 department
	$student4_dept_leave = $_FILES["student4_dept_leave"]["name"];
	$tmp_dir_student4_dept_leave = $_FILES['student4_dept_leave']['tmp_name'];
	$student4_dept_leave_Size = $_FILES['student4_dept_leave']['size'];
	$student4_dept_leave_SizeKB = (int) ($student4_dept_leave_Size / 1024);	
	//$upload_dir_dept = 'railway/dept/'; // upload directory
	// Renaming Uploaded student-4 ID Card
	$student4_dept_leave_temp = explode(".", $_FILES["student4_dept_leave"]["name"]);
	$student4_dept_leave_newfilename = round(microtime(true)*1000) . 'student4' . '.' . end($student4_dept_leave_temp);
	//Student-4 caste certi
	$student4_caste_certi = $_FILES["student4_caste_certi"]["name"];
	$tmp_dir_student4_caste_certi = $_FILES['student4_caste_certi']['tmp_name'];
	$student4_caste_certi_Size = $_FILES['student4_caste_certi']['size'];
	$student4_caste_certi_SizeKB = (int) ($student4_caste_certi_Size / 1024);	
	//$upload_dir_caste = 'railway/caste/'; // upload directory
	// Renaming Uploaded student-4 ID Card
	$student4_caste_certi_temp = explode(".", $_FILES["student4_caste_certi"]["name"]);
	$student4_caste_certi_newfilename = round(microtime(true)*1000) . 'student4' . '.' . end($student4_caste_certi_temp);



	//Student-5 info
	$student5_name = $_POST["student5_name"];
	$student5_webmail = $_POST["student5_webmail"];
	$student5_roll_number = $_POST["student5_roll_number"];
	$student5_age = $_POST["student5_age"];
	$student5_gender = $_POST["student5_gender"];
	$student5_hostel = $_POST["student5_hostel"];
	$student5_room_number = $_POST["student5_room_number"];
	$student5_course = $_POST["student5_course"];
	$student5_category = $_POST["student5_category"];
	//Student-5 ID
	$student5_idFile = $_FILES['student5_id']['name'];
	$tmp_dir_student5_id = $_FILES['student5_id']['tmp_name'];
	$student5_id_Size = $_FILES['student5_id']['size'];
	$student5_id_SizeKB = (int) ($student5_id_Size / 1024);	
	//$upload_dir_ids = 'railway/ids/'; // upload directory
	// Renaming Uploaded student-5 ID Card
	$student5_id_temp = explode(".", $_FILES["student5_id"]["name"]);
	$student5_id_newfilename = round(microtime(true)*1000) . 'student5'.'.' . end($student5_id_temp);
	//Student-5 department
	$student5_dept_leave = $_FILES["student5_dept_leave"]["name"];
	$tmp_dir_student5_dept_leave = $_FILES['student5_dept_leave']['tmp_name'];
	$student5_dept_leave_Size = $_FILES['student5_dept_leave']['size'];
	$student5_dept_leave_SizeKB = (int) ($student5_dept_leave_Size / 1024);	
	//$upload_dir_dept = 'railway/dept/'; // upload directory
	// Renaming Uploaded student-5 ID Card
	$student5_dept_leave_temp = explode(".", $_FILES["student5_dept_leave"]["name"]);
	$student5_dept_leave_newfilename = round(microtime(true)*1000) . 'student5' . '.' . end($student5_dept_leave_temp);
	//Student-5 caste certi
	$student5_caste_certi = $_FILES["student5_caste_certi"]["name"];
	$tmp_dir_student5_caste_certi = $_FILES['student5_caste_certi']['tmp_name'];
	$student5_caste_certi_Size = $_FILES['student5_caste_certi']['size'];
	$student5_caste_certi_SizeKB = (int) ($student5_caste_certi_Size / 1024);	
	//$upload_dir_caste = 'railway/caste/'; // upload directory
	// Renaming Uploaded student-5 ID Card
	$student5_caste_certi_temp = explode(".", $_FILES["student5_caste_certi"]["name"]);
	$student5_caste_certi_newfilename = round(microtime(true)*1000) . 'student5' . '.' . end($student5_caste_certi_temp);


	
	//Student-6 info
	$student6_name = $_POST["student6_name"];
	$student6_webmail = $_POST["student6_webmail"];
	$student6_roll_number = $_POST["student6_roll_number"];
	$student6_age = $_POST["student6_age"];
	$student6_gender = $_POST["student6_gender"];
	$student6_hostel = $_POST["student6_hostel"];
	$student6_room_number = $_POST["student6_room_number"];
	$student6_course = $_POST["student6_course"];
	$student6_category = $_POST["student6_category"];	
	//Student-6 ID
	$student6_idFile = $_FILES['student6_id']['name'];
	$tmp_dir_student6_id = $_FILES['student6_id']['tmp_name'];
	$student6_id_Size = $_FILES['student6_id']['size'];
	$student6_id_SizeKB = (int) ($student6_id_Size / 1024);	
	//$upload_dir_ids = 'railway/ids/'; // upload directory
	// Renaming Uploaded student-6 ID Card
	$student6_id_temp = explode(".", $_FILES["student6_id"]["name"]);
	$student6_id_newfilename = round(microtime(true)*1000) . 'student6' . '.' . end($student6_id_temp);
	//Student-6 department
	$student6_dept_leave = $_FILES["student6_dept_leave"]["name"];
	$tmp_dir_student6_dept_leave = $_FILES['student6_dept_leave']['tmp_name'];
	$student6_dept_leave_Size = $_FILES['student6_dept_leave']['size'];
	$student6_dept_leave_SizeKB = (int) ($student6_dept_leave_Size / 1024);	
	//$upload_dir_dept = 'railway/dept/'; // upload directory
	// Renaming Uploaded student-6 ID Card
	$student6_dept_leave_temp = explode(".", $_FILES["student6_dept_leave"]["name"]);
	$student6_dept_leave_newfilename = round(microtime(true)*1000) . 'student6' . '.' . end($student6_dept_leave_temp);
	//Student-6 caste certi
	$student6_caste_certi = $_FILES["student6_caste_certi"]["name"];
	$tmp_dir_student6_caste_certi = $_FILES['student6_caste_certi']['tmp_name'];
	$student6_caste_certi_Size = $_FILES['student6_caste_certi']['size'];
	$student6_caste_certi_SizeKB = (int) ($student6_caste_certi_Size / 1024);	
	//$upload_dir_caste = 'railway/caste/'; // upload directory
	// Renaming Uploaded student-6 ID Card
	$student6_caste_certi_temp = explode(".", $_FILES["student6_caste_certi"]["name"]);
	$student6_caste_certi_newfilename = round(microtime(true)*1000) . 'student6' . '.' . end($student6_caste_certi_temp);


	//travel-info
	$from_station = $_POST["from_station"];
	$to_station = $_POST["to_station"];
	$journey_type = $_POST["journey_type"];
	$onward_journey = $_POST["onward"];
	$return_journey = $_POST["return"];
	

	//ticket
	$ticket = $_FILES["ticket"]["name"];
	$tmp_dir_ticket = $_FILES["ticket"]['tmp_name'];
	$ticket_Size = $_FILES["ticket"]["size"];
	$ticket_SizeKB = (int) ($ticket_Size / 1024);	
	$upload_dir_ticket = 'railway/ticket/'; // upload directory
	// Renaming Uploaded ticket
	$ticket_temp = explode(".", $_FILES["ticket"]["name"]);
	$ticket_newfilename = round(microtime(true)*1000) .'ticket' .'.' . end($ticket_temp);



	// Current Year
	$cur_year = date("Y");



	if($student1_course=='btech1'){
		$student1_course='btech';
	}
	else{
		$student1_course='mtech';
	}

	if($student2_course=='btech2'){
		$student2_course='btech';
	}
	else{
		$student2_course='mtech';
	}

	if($student3_course=='btech3'){
		$student3_course='btech';
	}
	else{
		$student3_course='mtech';
	}

	if($student4_course=='btech4'){
		$student4_course='btech';
	}
	else{
		$student4_course='mtech';
	}

	if($student5_course=='btech5'){
		$student5_course='btech';
	}
	else{
		$student5_course='mtech';
	}

	if($student6_course=='btech6'){
		$student6_course='btech';
	}
	else{
		$student6_course='mtech';
	}

	//assigning all category values a common value
	if($student1_category=='cat1'){
		$student1_category='cat';
	}else{
		$student1_category='gen';
	}
	
	if($student2_category=='cat2'){
		$student2_category='cat';
	}else{
		$student2_category='gen';
	}

	if($student3_category=='cat3'){
		$student3_category='cat';
	}else{
		$student3_category='gen';
	}

	if($student4_category=='cat4'){
		$student4_category='cat';
	}else{
		$student4_category='gen';
	}
	
	if($student5_category=='cat5'){
		$student5_category='cat';
	}else{
		$student5_category='gen';
	}

	if($student6_category=='cat6'){
		$student6_category='cat';
	}else{
		$student6_category='gen';
	}

	$curdatetime = date('Y-m-d H:i:s');
	$curYear = date('Y');

	$error = "";
	$success = "";
	if(isset($_POST['Submit'])){
		if($student1_name=='' OR $student1_webmail=='' OR $student1_roll_number=='' OR $student1_age=='' OR $student1_gender=='' OR $student1_room_number=='' OR $from_station=='' OR $to_station==''){
			$error = "<font color='red'>All fileds of Student-1 are required.</font>";	
		}
		else if($student2_name!='' AND ($student2_webmail=='' OR $student2_roll_number=='' OR $student2_age=='' OR $student2_gender=='' OR $student2_room_number=='')){
			$error = "<font color='red'>All fileds of Student-2 are required.</font>";	
		}
		else if($student3_name!='' AND ($student3_webmail=='' OR $student3_roll_number=='' OR $student3_age=='' OR $student3_gender=='' OR $student3_room_number=='')){
			$error = "<font color='red'>All fileds of Student-3 are required.</font>";	
		}
		else if($student4_name!='' AND ($student4_webmail=='' OR $student4_roll_number=='' OR $student4_age=='' OR $student4_gender=='' OR $student4_room_number=='')){
			$error = "<font color='red'>All fileds of Student-4 are required.</font>";	
		}
		else if($student5_name!='' AND ($student5_webmail=='' OR $student5_roll_number=='' OR $student5_age=='' OR $student5_gender=='' OR $student5_room_number=='')){
			$error = "<font color='red'>All fileds of Student-5 are required.</font>";	
		}
		else if($student6_name!='' AND ($student6_webmail=='' OR $student6_roll_number=='' OR $student6_age=='' OR $student6_gender=='' OR $student3_room_number=='')){
			$error = "<font color='red'>All fileds of Student-6 are required.</font>";	
		}
		else if($journey_type=='one_way' AND $onward_journey==''){
			$error = "<font color='red'>Please fill you Onward Journey date.</font>";
		}
		else if($journey_type=='both_way' AND($onward_journey=='' OR $return_journey=='')){
			$error = "<font color='red'>Please fill you Journey dates.</font>";
		}
		else if(($student1_course=='mtech' AND $student1_dept_leave=='') OR ($student2_name!='' AND $student2_course=='mtech' AND $student2_dept_leave=='') OR ($student3_name!='' AND $student3_course=='mtech' AND $student3_dept_leave=='') OR ($student4_name!='' AND $student4_course=='mtech' AND $student4_dept_leave=='') OR ($student5_name!='' AND $student5_course=='mtech' AND $student5_dept_leave=='') OR ($student6_name!='' AND $student6_course=='mtech' AND $student6_dept_leave=='')){
			$error = "<font color='red'>Please upload scanned copy of your Department Leave Certificate.</font>";
		}
		else if($student1_course=='mtech' AND $student1_dept_leave!=='' AND $student1_dept_leave_SizeKB > 200){
			$error = "<font color='red'>You have uploaded Department Leave of size ".$student1_dept_leave_SizeKB." KB, which is larger than 200 KB.</font>";
		}
		else if($student2_name!='' AND $student2_course=='mtech' AND $student2_dept_leave!='' AND $student2_dept_leave_SizeKB > 200){
			$error = "<font color='red'>You have uploaded Department Leave of size".$student2_dept_leave_SizeKB." KB, which is larger than 200 KB.</font>";
		}
		else if($student3_name!='' AND $student3_course=='mtech' AND $student3_dept_leave!='' AND $student3_dept_leave_SizeKB > 200){
			$error = "<font color='red'>You have uploaded Department Leave of size".$student3_dept_leave_SizeKB." KB, which is larger than 200 KB.</font>";
		}
		else if($student4_name!='' AND $student4_course=='mtech' AND $student4_dept_leave!='' AND $student4_dept_leave_SizeKB > 200){
			$error = "<font color='red'>You have uploaded Department Leave of size".$student4_dept_leave_SizeKB." KB, which is larger than 200 KB.</font>";
		}
		else if($student5_name!='' AND $student5_course=='mtech' AND $student5_dept_leave!='' AND $student5_dept_leave_SizeKB > 200){
			$error = "<font color='red'>You have uploaded Department Leave of size".$student2_dept_leave_SizeKB." KB, which is larger than 200 KB.</font>";
		}
		else if($student6_name!='' AND $student6_course=='mtech' AND $student6_dept_leave!='' AND $student6_dept_leave_SizeKB > 200){
			$error = "<font color='red'>You have uploaded Department Leave of size ".$student6_dept_leave_SizeKB." KB, which is larger than 200 KB.</font>";
		}
		else if(($student1_category=='cat' AND $student1_caste_certi=='') OR ($student2_name!='' AND $student2_category=='cat' AND $student2_caste_certi=='') OR ($student3_name!='' AND $student3_category=='cat' AND $student3_caste_certi=='') OR ($student4_name!='' AND $student4_category=='cat' AND $student4_caste_certi=='') OR ($student5_name!='' AND $student5_category=='cat' AND $student5_caste_certi=='') OR ($student6_name!='' AND $student6_category=='cat' AND $student6_caste_certi=='')){
			$error = "<font color='red'>Please upload scanned copy of your caste certificate.</font>";
		}
		else if($student1_name!='' AND $student1_category=='cat' AND $student1_caste_certi!='' AND $student1_caste_certi_SizeKB > 200){
			$error = "<font color='red'>You have uploaded Caste certificate of size ".$student1_caste_certi_SizeKB." KB, which is larger than 200 KB.</font>";
		}
		else if($student2_name!='' AND $student2_category=='cat' AND $student2_caste_certi!='' AND $student2_caste_certi_SizeKB > 200){
			$error = "<font color='red'>You have uploaded Caste certificate of size ".$student2_caste_certi_SizeKB." KB, which is larger than 200 KB.</font>";
		}
		else if($student3_name!='' AND $student3_category=='cat' AND $student3_caste_certi!='' AND $student3_caste_certi_SizeKB > 200){
			$error = "<font color='red'>You have uploaded Caste certificate of size ".$student3_caste_certi_SizeKB." KB, which is larger than 200 KB.</font>";
		}
		else if($student4_name!='' AND $student4_category=='cat' AND $student4_caste_certi!='' AND $student4_caste_certi_SizeKB > 200){
			$error = "<font color='red'>You have uploaded Caste certificate of size ".$student4_caste_certi_SizeKB." KB, which is larger than 200 KB.</font>";
		}
		else if($student5_name!='' AND $student5_category=='cat' AND $student5_caste_certi!='' AND $student5_caste_certi_SizeKB > 200){
			$error = "<font color='red'>You have uploaded Caste certificate of size ".$student5_caste_certi_SizeKB." KB, which is larger than 200 KB.</font>";
		}
		else if($student6_name!='' AND $student6_category=='cat' AND $student6_caste_certi!='' AND $student6_caste_certi_SizeKB > 200){
			$error = "<font color='red'>You have uploaded Caste certificate of size ".$student6_caste_certi_SizeKB." KB, which is larger than 200 KB.</font>";
		}
/*		else if(($student1_idFile!='' AND (end($student1_id_temp)!='pdf' OR end($student1_id_temp)!='PDF')) OR ($student2_idFile!='' AND (end($student2_id_temp)!='pdf' OR end($student2_id_temp)!='PDF')) OR ($student3_idFile!='' AND (end($student3_id_temp)!='pdf' OR end($student3_id_temp)!='PDF')) OR ($student4_idFile!='' AND (end($student4_id_temp)!='pdf' OR end($student4_id_temp)!='PDF'))  OR ($student5_idFile!='' AND (end($student5_id_temp)!='pdf' OR end($student5_id_temp)!='PDF')) OR ($student6_idFile!='' AND (end($student6_id_temp)!='pdf' OR end($student6_id_temp)!='PDF')) ){
			$error = "<font color='red'>Upload pdf files only.</font>";
		}
*/		else if($student1_idFile==''){ 
			$error = "<font color='red'> Please upload scanned copy of Student-1 ID card.";
		}		
		else if($student2_name!='' AND $student2_idFile==''){ 
			$error = "<font color='red'> Please upload scanned copy of Student-2 ID card.";
		}		
		else if($student3_name!='' AND $student3_idFile==''){ 
			$error = "<font color='red'> Please upload scanned copy of Student-3 ID card.";
		}		
		else if($student4_name!='' AND $student4_idFile==''){ 
			$error = "<font color='red'> Please upload scanned copy of Student-4 ID card.";
		}		
		else if($student5_name!='' AND $student5_idFile==''){ 
			$error = "<font color='red'> Please upload scanned copy of Student-5 ID card.";
		}		
		else if($student6_name!='' AND $student6_idFile==''){ 
			$error = "<font color='red'> Please upload scanned copy of Student-6 ID card.";
		}		
		else if($ticket==''){ 
			$error = "<font color='red'> Please upload scanned copy of travelling ticket.";
		}		
		else if($student1_id_SizeKB > 200){
			$error = "<font color='red'>You have uploaded ID card of size ".$student1_id_SizeKB." KB, which is larger than 200 KB.</font>";
		}		
		else if($student2_name!='' AND $student2_id_SizeKB > 200){
			$error = "<font color='red'>You have uploaded ID card of size ".$student2_id_SizeKB." KB, which is larger than 200 KB.</font>";
		}		
		else if($student3_name!='' AND $student3_id_SizeKB > 200){
			$error = "<font color='red'>You have uploaded ID card of size ".$student3_id_SizeKB." KB, which is larger than 200 KB.</font>";
		}		
		else if($student4_name!='' AND $student4_id_SizeKB > 200){
			$error = "<font color='red'>You have uploaded ID card of size ".$student4_id_SizeKB." KB, which is larger than 200 KB.</font>";
		}		
		else if($student5_name!='' AND $student5_id_SizeKB > 200){
			$error = "<font color='red'>You have uploaded ID card of size ".$student5_id_SizeKB." KB, which is larger than 200 KB.</font>";
		}		
		else if($student6_name!='' AND $student6_id_SizeKB > 200){
			$error = "<font color='red'>You have uploaded ID card of size ".$student6_id_SizeKB." KB, which is larger than 200 KB.</font>";
		}		
		else if($ticket_SizeKB > 200){
			$error = "<font color='red'>You have uploaded ticket of size ".$ticket_SizeKB." KB, which is larger than 200 KB.</font>";
		}
		/*else if($tnc == NULL){
		    $error = "<font color='red'>Kindly select terms and condition field.</font>";
		}*/
		else if(($student1_course=='btech' OR $student2_course=='btech' OR $student3_course=='btech' OR $student4_course=='btech' OR $student5_course=='btech' OR $student6_course=='btech') AND ($onward_journey<$starting_date OR $onward_journey>$end_date)){
			$error = "<font color='red'>B.tech. students can only apply for railway concession for journey dates during vacations as mention in the note. </font>";
		}
		else{	
			
			while ($row = mysql_fetch_array($result2)){
				$journey_time = $row['journey_date'];
				
				$jan = $cur_year."-01-01";
				$jun = $cur_year."-06-30";
				$july = $cur_year."-07-01";
				$dec = $cur_year."-12-31";
				//echo $journey_time.$ending_time.$from."<br>";
				if(($journey_time >= $jan) AND ($journey_time <= $jun)){
					$errorsem = "sem1";
					break;
				} 	  
				else if(($journey_time >= $july) AND ($journey_time <= $dec)){
					$errorsem = "sem2";
					break;
				}
			}
			
			while ($row2_2 = mysql_fetch_array($result2_2)){
				$journey_time = $row2_2['journey_date'];
				
				$jan = $cur_year."-01-01";
				$jun = $cur_year."-06-30";
				$july = $cur_year."-07-01";
				$dec = $cur_year."-12-31";
				//echo $journey_time.$ending_time.$from."<br>";
				if(($journey_time >= $jan) AND ($journey_time <= $jun)){
					$errorsem = "sem1";
					break;
				} 	  
				else if(($journey_time >= $july) AND ($journey_time <= $dec)){
					$errorsem = "sem2";
					break;
				}
			}

			if(($errorsem == "sem1") AND (($onward_journey >= $jan) AND ($onward_journey <= $jun))){
				$error = "<font color='red'>You have already applied for railway concession in Jan-June session.</font>";
			}
			else if(($errorsem == "sem2") AND (($onward_journey >= $july) AND ($onward_journey <= $dec))){
				$error = "<font color='red'>You have already applied for railway concession in July-Dec session.</font>";
			}
			// If not in Db
		        else{
		
				$application_no=round(microtime(true*10));
				$rc_application_no = "RC/".$curYear."/".$application_no;
				$success = "Request successfully submitted. Your booking Application No. is <b>$rc_application_no</b></font>";
				mysql_query("INSERT INTO railway_concession_1 VALUES ('','$student1_name','$student1_webmail','$student1_age','$student1_gender','$student1_roll_number','$student1_room_number','$student1_id_newfilename','$from_station','$to_station','$journey_type','$onward_journey','$return_journey','$student1_category','$student1_caste_certi_newfilename','$ticket_newfilename','$student1_course','$student1_dept_leave_newfilename','$curdatetime','$student1_hostel','','','','$rc_application_no','','','','','')");
				move_uploaded_file($_FILES["ticket"]["tmp_name"], $upload_dir_ticket.$ticket_newfilename);


				if($student1_name!=''){
					move_uploaded_file($_FILES["student1_id"]["tmp_name"], $upload_dir_ids.$student1_id_newfilename);
					if($student1_dept_leave!=''){
						move_uploaded_file($_FILES["student1_dept_leave"]["tmp_name"], $upload_dir_dept.$student1_dept_leave_newfilename);
					}
			
					if($student1_caste_certi!=''){
						move_uploaded_file($_FILES["student1_caste_certi"]["tmp_name"], $upload_dir_caste.$student1_caste_certi_newfilename);		
					}			
		
				}
		
				if($student2_name!=''){
			
					mysql_query("INSERT INTO railway_concession_2 VALUES ('',(SELECT id FROM railway_concession_1 WHERE webmail='$student1_webmail'),'$student2_name','$student2_webmail','$student2_age','$student2_gender','$student2_roll_number','$student2_room_number','$student2_id_newfilename','$student2_category','$student2_caste_certi_newfilename','$student2_course','$student2_dept_leave_newfilename','$student2_hostel')");
					move_uploaded_file($_FILES["student2_id"]["tmp_name"], $upload_dir_ids.$student2_id_newfilename);
					if($student2_dept_leave!=''){
						move_uploaded_file($_FILES["student2_dept_leave"]["tmp_name"], $upload_dir_dept.$student2_dept_leave_newfilename);
					}
			
					if($student2_caste_certi!=''){
						move_uploaded_file($_FILES["student2_caste_certi"]["tmp_name"], $upload_dir_caste.$student2_caste_certi_newfilename);		
					}			
		
				}
		
				if($student3_name!=''){
					mysql_query("INSERT INTO railway_concession_2 VALUES ('',(SELECT id FROM railway_concession_1 WHERE webmail='$student1_webmail'),'$student3_name','$student3_webmail','$student3_age','$student3_gender','$student3_roll_number','$student3_room_number','$student3_id_newfilename','$student3_category','$student3_caste_certi_newfilename','$student3_course','$student3_dept_leave_newfilename','$student3_hostel')");
					move_uploaded_file($_FILES["student3_id"]["tmp_name"], $upload_dir_ids.$student3_id_newfilename);
					if($student3_dept_leave!=''){
						move_uploaded_file($_FILES["student3_dept_leave"]["tmp_name"], $upload_dir_dept.$student3_dept_leave_newfilename);
					}
			
					if($student3_caste_certi!=''){
						move_uploaded_file($_FILES["student3_caste_certi"]["tmp_name"], $upload_dir_caste.$student3_caste_certi_newfilename);		
					}			
		
				}
		
				if($student4_name!=''){
					mysql_query("INSERT INTO railway_concession_2 VALUES ('',(SELECT id FROM railway_concession_1 WHERE webmail='$student1_webmail'),'$student4_name','$student4_webmail','$student4_age','$student4_gender','$student4_roll_number','$student4_room_number','$student4_id_newfilename','$student4_category','$student4_caste_certi_newfilename','$student4_course','$student4_dept_leave_newfilename','$student4_hostel')");
					move_uploaded_file($_FILES["student4_id"]["tmp_name"], $upload_dir_ids.$student4_id_newfilename);
					if($student4_dept_leave!=''){
						move_uploaded_file($_FILES["student4_dept_leave"]["tmp_name"], $upload_dir_dept.$student4_dept_leave_newfilename);
					}
			
					if($student4_caste_certi!=''){
						move_uploaded_file($_FILES["student4_caste_certi"]["tmp_name"], $upload_dir_caste.$student4_caste_certi_newfilename);		
					}			
		
				}
		
				if($student5_name!=''){
						mysql_query("INSERT INTO railway_concession_2 VALUES ('',(SELECT id FROM railway_concession_1 WHERE webmail='$student1_webmail'),'$student5_name','$student5_webmail','$student5_age','$student5_gender','$student5_roll_number','$student5_room_number','$student5_id_newfilename','$student5_category','$student5_caste_certi_newfilename','$student5_course','$student5_dept_leave_newfilename','$student5_hostel')");
					move_uploaded_file($_FILES["student5_id"]["tmp_name"], $upload_dir_ids.$student5_id_newfilename);
					if($student5_dept_leave!=''){
						move_uploaded_file($_FILES["student5_dept_leave"]["tmp_name"], $upload_dir_dept.$student5_dept_leave_newfilename);
					}
			
					if($student5_caste_certi!=''){
						move_uploaded_file($_FILES["student5_caste_certi"]["tmp_name"], $upload_dir_caste.$student5_caste_certi_newfilename);		
					}			
		
				}  
		
				if($student6_name!=''){
					mysql_query("INSERT INTO railway_concession_2 VALUES ('',(SELECT id FROM railway_concession_1 WHERE webmail='$student1_webmail'),'$student6_name','$student6_webmail','$student6_age','$student6_gender','$student6_roll_number','$student6_room_number','$student6_id_newfilename','$student6_category','$student6_caste_certi_newfilename','$student6_course','$student6_dept_leave_newfilename','$student6_hostel')");
					move_uploaded_file($_FILES["student6_id"]["tmp_name"], $upload_dir_ids.$student6_id_newfilename);
					if($student6_dept_leave!=''){
						move_uploaded_file($_FILES["student6_dept_leave"]["tmp_name"], $upload_dir_dept.$student6_dept_leave_newfilename);
					}
			
					if($student6_caste_certi!=''){
						move_uploaded_file($_FILES["student6_caste_certi"]["tmp_name"], $upload_dir_caste.$student6_caste_certi_newfilename);		
					}			
		
				}
				$message = "Dear ".$student1_name."\r\n Your Railway Concession application (Application No. ".$rc_application_no.") has been successfully submitted to SA Office. Latest status can be tracked via CLS.\r\n Thanking You.\r\n Regards,\r\n Team SWC";
				$headers = "MIME-Version: 1.0" . "\r\n";
				$headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
				$headers .= 'From: SWC, IIT Guwahati <swc@iitg.ernet.in>' . "\r\n";
				//$headers .= 'Cc: swc@iitg.ernet.in, saoff@iitg.ernet.in, guesthouse@iitg.ernet.in' . "\r\n";
				$user_webmail = $student1_webmail."@iitg.ernet.in";
				mail($user_webmail , 'Railway Concession application submission confirmation' , $message , $headers);
			}
		}
	}



?>


<link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
<script>
  $( function() {
	$( "#date_from" ).datepicker({minDate: "1D",maxDate: "180D",dateFormat: "yy-mm-dd",showAnim: "slideDown" });
  } );
  $( function() {
	$( "#date_to" ).datepicker({minDate: "2D",maxDate: "180D",dateFormat: "yy-mm-dd",showAnim: "slideDown" });
  } );
    $(document).ready(function(){
	    $(".course1").change(function(){
		$(this).find("option:selected").each(function(){
		    var optionValue = $(this).attr("value");
		    if(optionValue){
			$(".dept_leave1").not("." + optionValue).hide();
			$("." + optionValue).show();
		    } else{
			$(".dept_leave1").hide();
		    }
		});
	    }).change();
	});
	$(document).ready(function(){
	    $(".course2").change(function(){
		$(this).find("option:selected").each(function(){
		    var optionValue = $(this).attr("value");
		    if(optionValue){
			$(".dept_leave2").not("." + optionValue).hide();
			$("." + optionValue).show();
		    } else{
			$(".dept_leave2").hide();
		    }
		});
	    }).change();
	});
	$(document).ready(function(){
	    $(".course3").change(function(){
		$(this).find("option:selected").each(function(){
		    var optionValue = $(this).attr("value");
		    if(optionValue){
			$(".dept_leave3").not("." + optionValue).hide();
			$("." + optionValue).show();
		    } else{
			$(".dept_leave3").hide();
		    }
		});
	    }).change();
	});
	$(document).ready(function(){
	    $(".course4").change(function(){
		$(this).find("option:selected").each(function(){
		    var optionValue = $(this).attr("value");
		    if(optionValue){
			$(".dept_leave4").not("." + optionValue).hide();
			$("." + optionValue).show();
		    } else{
			$(".dept_leave4").hide();
		    }
		});
	    }).change();
	});
	$(document).ready(function(){
	    $(".course5").change(function(){
		$(this).find("option:selected").each(function(){
		    var optionValue = $(this).attr("value");
		    if(optionValue){
			$(".dept_leave5").not("." + optionValue).hide();
			$("." + optionValue).show();
		    } else{
			$(".dept_leave5").hide();
		    }
		});
	    }).change();
	});
	$(document).ready(function(){
	    $(".course6").change(function(){
		$(this).find("option:selected").each(function(){
		    var optionValue = $(this).attr("value");
		    if(optionValue){
			$(".dept_leave6").not("." + optionValue).hide();
			$("." + optionValue).show();
		    } else{
			$(".dept_leave6").hide();
		    }
		});
	    }).change();
	});


	$(document).ready(function(){
	    $(".category1").change(function(){
		$(this).find("option:selected").each(function(){
		    var optionValue = $(this).attr("value");
		    if(optionValue){
			$(".caste_certi1").not("." + optionValue).hide();
			$("." + optionValue).show();
		    } else{
			$(".caste_certi1").hide();
		    }
		});
	    }).change();
	});
	$(document).ready(function(){
	    $(".category2").change(function(){
		$(this).find("option:selected").each(function(){
		    var optionValue = $(this).attr("value");
		    if(optionValue){
			$(".caste_certi2").not("." + optionValue).hide();
			$("." + optionValue).show();
		    } else{
			$(".caste_certi2").hide();
		    }
		});
	    }).change();
	});
	$(document).ready(function(){
	    $(".category3").change(function(){
		$(this).find("option:selected").each(function(){
		    var optionValue = $(this).attr("value");
		    if(optionValue){
			$(".caste_certi3").not("." + optionValue).hide();
			$("." + optionValue).show();
		    } else{
			$(".caste_certi3").hide();
		    }
		});
	    }).change();
	});
	$(document).ready(function(){
	    $(".category4").change(function(){
		$(this).find("option:selected").each(function(){
		    var optionValue = $(this).attr("value");
		    if(optionValue){
			$(".caste_certi4").not("." + optionValue).hide();
			$("." + optionValue).show();
		    } else{
			$(".caste_certi4").hide();
		    }
		});
	    }).change();
	});
	$(document).ready(function(){
	    $(".category5").change(function(){
		$(this).find("option:selected").each(function(){
		    var optionValue = $(this).attr("value");
		    if(optionValue){
			$(".caste_certi5").not("." + optionValue).hide();
			$("." + optionValue).show();
		    } else{
			$(".caste_certi5").hide();
		    }
		});
	    }).change();
	});
	$(document).ready(function(){
	    $(".category6").change(function(){
		$(this).find("option:selected").each(function(){
		    var optionValue = $(this).attr("value");
		    if(optionValue){
			$(".caste_certi6").not("." + optionValue).hide();
			$("." + optionValue).show();
		    } else{
			$(".caste_certi6").hide();
		    }
		});
	    }).change();
	});

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
	    <div class="panel panel-info">
        	<div class="panel-heading">
		    Online Railway Concession Form Filling 
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
			?>
		

		    	<div class="row">
                            <div class="col-lg-12">
				<form name="rc" class="before_success" action=""  accept-charset="utf-8" method="post" enctype="multipart/form-data">
				    <div class="row">
					<div class="col-lg-12">
						<div class="alert alert-warning alert-dismissable">
							<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
							<?php
							?>
							B.tech./B.des./MSc./MA students can only apply for railway concession for journey dates from <?php echo $row_availability["date_from"]; ?> to <?php echo $row_availability["date_to"]; ?> <?php  if($row_availability["vaccation_reason"] !=''){ echo " during ".$row_availability["vaccation_reason"];}?>.
						</div>

					    <div class="panel-body">
						<div class="panel-group" id="accordion">

				                                                              
<!--                ----------------          1     -----------------                -->

						    <div class="panel panel-default">
							<div class="panel-heading">
							     <h4 class="panel-title" style="font-size: 15px;">
							         <a data-toggle="collapse" data-parent="#accordion" href="#collapseOne">Student - 1</a>
							     </h4>
							</div>
						    	    <div id="collapseOne" class="panel-collapse collapse in">
								<div class="panel-body">
								    <div class="form-group col-md-4">
									<label class="required">Name</label>
									<input class="form-control" type="text" value="<?php echo $student1_name; ?>" name="student1_name" />									
								    </div>
								    <div class="form-group col-md-4">
									<label class="required">Webmail (Without "@iitg.ac.in")</label>
									<input class="form-control" type="text" value="<?php echo $student1_webmail; ?>" name="student1_webmail" />									
								    </div>
								    <div class="form-group col-md-4">
									<label class="required">Roll No.</label>
									<input class="form-control" type="number" value="<?php echo $student1_roll_number; ?>" name="student1_roll_number" />
								    </div>
								    <div class="form-group col-md-4">
									<label class="required">Age</label>
									<input class="form-control" type="number" value="<?php echo $student1_age; ?>" name="student1_age" />
								    </div>
								    <div class="col-lg-4">
									<div class="form-group">
										<label class="required">Gender</label>
										<select class="form-control" name="student1_gender">
											<option value="Male">Male</option>
											<option value="Female">Female</option>
											<option value="Transgender">Transgender</option>
										</select>
									</div>
								    </div>
								    <div class="form-group col-md-4">
									<label class="required">Hostel</label>
									<input class="form-control" type="text" value="<?php echo $student1_hostel; ?>" name="student1_hostel" />									
								    </div>
								    <div class="form-group col-md-4">
									<label class="required">Room No.</label>
									<input class="form-control" type="text" value="<?php echo $student1_room_number; ?>" name="student1_room_number" />									
								    </div>
								    <div class="col-lg-4">
									<div class="form-group course1">
										<label class="required">Course</label>
										<select class="form-control" name="student1_course">
											<option value="btech1">B.Tech./B.Des/MSc/MA</option>
											<option value="mtech1">M.Tech./M.Des/PhD</option>
										</select>
									</div>
								    </div>
								    <div class="col-lg-4">
									<div class="form-group category1">
										<label class="required">Category</label>
										<select class="form-control" name="student1_category">
											<option value="gen1">General/OBC</option>
											<option value="cat1">SC/ST</option>
										</select>
									</div>
								    </div>
								    <div class="form-group col-md-4">
									<label for="student1_id" class="required">Upload ID Card</label>
									<input type="file" name="student1_id" id="file" class="inputfile"/>
								    </div>
								    <div class="form-group col-md-4 mtech1 dept_leave1">
									<label for="student1_dept_leave" class="required">Departmental Leave Form</label>
									<input type="file" name="student1_dept_leave" id="file" class="inputfile"/>
								    </div>
								    <div class="form-group col-md-4 cat1 caste_certi1">
									<label for="student1_caste_certi" class="required">Upload Caste Certificate</label>
									<input type="file" name="student1_caste_certi" id="file" class="inputfile"/>
								    </div>


								</div>
								<!-- ./panel boby -->
							    </div>
							    
						    </div>
						    <!-- ./ panel panel-default  -->




<!-- ------------------------------------------      2       ----------------- -------------------- -->
						    <div class="panel panel-default">
							<div class="panel-heading">
							     <h4 class="panel-title" style="font-size: 15px;">
							         <a data-toggle="collapse" data-parent="#accordion" href="#collapseTwo">Student - 2(Optional)</a>
							     </h4>
							</div>
						    	    <div id="collapseTwo" class="panel-collapse collapse">
								<div class="panel-body">
								    <div class="form-group col-md-4">
									<label class="required">Name</label>
									<input class="form-control" type="text" value="<?php echo $student2_name; ?>" name="student2_name" />									
								    </div>
								    <div class="form-group col-md-4">
									<label class="required">Webmail (Without "@iitg.ac.in")</label>
									<input class="form-control" type="text" value="<?php echo $student2_webmail; ?>" name="student2_webmail" />									
								    </div>
								    <div class="form-group col-md-4">
									<label class="required">Roll No.</label>
									<input class="form-control" type="number" value="<?php echo $student2_roll_number; ?>" name="student2_roll_number" />
								    </div>
								    <div class="form-group col-md-4">
									<label class="required">Age</label>
									<input class="form-control" type="number" value="<?php echo $student2_age; ?>" name="student2_age" />
								    </div>
								    <div class="col-lg-4">
									<div class="form-group">
										<label class="required">Gender</label>
										<select class="form-control" name="student2_gender">
											<option value="Male">Male</option>
											<option value="Female">Female</option>
											<option value="Transgender">Transgender</option>
										</select>
									</div>
								    </div>
								    <div class="form-group col-md-4">
									<label class="required">Hostel</label>
									<input class="form-control" type="text" value="<?php echo $student2_hostel; ?>" name="student2_hostel" />									
								    </div>
								    <div class="form-group col-md-4">
									<label class="required">Room No.</label>
									<input class="form-control" type="text" value="<?php echo $student2_room_number; ?>" name="student2_room_number" />									
								    </div>
								    <div class="col-lg-4">
									<div class="form-group course2">
										<label class="required">Course</label>
										<select class="form-control" name="student2_course">
											<option value="btech2">B.Tech./B.Des/MSc/MA</option>
											<option value="mtech2">M.Tech./M.Des/PhD</option>
										</select>
									</div>
								    </div>
								    <div class="col-lg-4">
									<div class="form-group category2">
										<label class="required">Category</label>
										<select class="form-control" name="student2_category">
											<option value="gen2">General/OBC</option>
											<option value="cat2">SC/ST</option>
										</select>
									</div>
								    </div>
								    <div class="form-group col-md-4">
									<label for="student2_id" class="required">Upload ID Card</label>
									<input type="file" name="student2_id" id="file" class="inputfile"/>
								    </div>
								    <div class="form-group col-md-4 mtech2 dept_leave2">
									<label for="student2_dept_leave" class="required">Departmental Leave Form</label>
									<input type="file" name="student2_dept_leave" id="file" class="inputfile"/>
								    </div>
								    <div class="form-group col-md-4 cat2 caste_certi2">
									<label for="student2_caste_certi" class="required">Upload Caste Certificate</label>
									<input type="file" name="student2_caste_certi" id="file" class="inputfile"/>
								    </div>

								</div>
								<!-- ./panel boby -->
							    </div>
							    
						    </div>
						    <!-- ./ panel panel-default  -->





<!-- ------------------------------------------      3       ----------------- -------------------- -->
						    <div class="panel panel-default">
							<div class="panel-heading">
							     <h4 class="panel-title" style="font-size: 15px;">
							         <a data-toggle="collapse" data-parent="#accordion" href="#collapseThree">Student - 3(Optional)</a>
							     </h4>
							</div>
						    	    <div id="collapseThree" class="panel-collapse collapse">
								<div class="panel-body">
								    <div class="form-group col-md-4">
									<label class="required">Name</label>
									<input class="form-control" type="text" value="<?php echo $student3_name; ?>" name="student3_name" />									
								    </div>
								    <div class="form-group col-md-4">
									<label class="required">Webmail (Without "@iitg.ac.in")</label>
									<input class="form-control" type="text" value="<?php echo $student3_webmail; ?>" name="student3_webmail" />									
								    </div>
								    <div class="form-group col-md-4">
									<label class="required">Roll No.</label>
									<input class="form-control" type="number" value="<?php echo $student3_roll_number; ?>" name="student3_roll_number" />
								    </div>
								    <div class="form-group col-md-4">
									<label class="required">Age</label>
									<input class="form-control" type="number" value="<?php echo $student3_age; ?>" name="student3_age" />
								    </div>
								    <div class="col-lg-4">
									<div class="form-group">
										<label class="required">Gender</label>
										<select class="form-control" name="student3_gender">
											<option value="Male">Male</option>
											<option value="Female">Female</option>
											<option value="Transgender">Transgender</option>
										</select>
									</div>
								    </div>
								    <div class="form-group col-md-4">
									<label class="required">Hostel</label>
									<input class="form-control" type="text" value="<?php echo $student3_hostel; ?>" name="student3_hostel" />									
								    </div>
								    <div class="form-group col-md-4">
									<label class="required">Room No.</label>
									<input class="form-control" type="text" value="<?php echo $student3_room_number; ?>" name="student3_room_number" />									
								    </div>
								    <div class="col-lg-4">
									<div class="form-group course3">
										<label class="required">Course</label>
										<select class="form-control" name="student3_course">
											<option value="btech3">B.Tech./B.Des/MSc/MA</option>
											<option value="mtech3">M.Tech./M.Des/PhD</option>
										</select>
									</div>
								    </div>
								    <div class="col-lg-4">
									<div class="form-group category3">
										<label class="required">Category</label>
										<select class="form-control" name="student3_category">
											<option value="gen3">General/OBC</option>
											<option value="cat3">SC/ST</option>
										</select>
									</div>
								    </div>
								    <div class="form-group col-md-4">
									<label for="student3_id" class="required">Upload ID Card</label>
									<input type="file" name="student3_id" id="file" class="inputfile"/>
								    </div>
								    <div class="form-group col-md-4 mtech3 dept_leave3">
									<label for="student3_dept_leave" class="required">Departmental Leave Form</label>
									<input type="file" name="student3_dept_leave" id="file" class="inputfile"/>
								    </div>
								    <div class="form-group col-md-4 cat3 caste_certi3">
									<label for="student3_caste_certi" class="required">Upload Caste Certificate</label>
									<input type="file" name="student3_caste_certi" id="file" class="inputfile"/>
								    </div>

								</div>
								<!-- ./panel boby -->
							    </div>
							    
						    </div>
						    <!-- ./ panel panel-default  -->





<!-- ------------------------------------------      4       ----------------- -------------------- -->
						    <div class="panel panel-default">
							<div class="panel-heading">
							     <h4 class="panel-title" style="font-size: 15px;">
							         <a data-toggle="collapse" data-parent="#accordion" href="#collapseFour">Student - 4(Optional)</a>
							     </h4>
							</div>
						    	    <div id="collapseFour" class="panel-collapse collapse">
								<div class="panel-body">
								    <div class="form-group col-md-4">
									<label class="required">Name</label>
									<input class="form-control" type="text" value="<?php echo $student4_name; ?>" name="student4_name" />									
								    </div>
								    <div class="form-group col-md-4">
									<label class="required">Webmail (Without "@iitg.ac.in")</label>
									<input class="form-control" type="text" value="<?php echo $student4_webmail; ?>" name="student4_webmail" />									
								    </div>
								    <div class="form-group col-md-4">
									<label class="required">Roll No.</label>
									<input class="form-control" type="number" value="<?php echo $student4_roll_number;?>" name="student4_roll_number" />
								    </div>
								    <div class="form-group col-md-4">
									<label class="required">Age</label>
									<input class="form-control" type="number" value="<?php echo $student4_age;?>" name="student4_age" />
								    </div>
								    <div class="col-lg-4">
									<div class="form-group">
										<label class="required">Gender</label>
										<select class="form-control" name="student4_gender">
											<option value="Male">Male</option>
											<option value="Female">Female</option>
											<option value="Transgender">Transgender</option>
										</select>
									</div>
								    </div>
								    <div class="form-group col-md-4">
									<label class="required">Hostel</label>
									<input class="form-control" type="text" value="<?php echo $student4_hostel;?>" name="student4_hostel" />									
								    </div>
								    <div class="form-group col-md-4">
									<label class="required">Room No.</label>
									<input class="form-control" type="text" value="<?php echo $student4_room_number;?>" name="student4_room_number" />									
								    </div>
								    <div class="col-lg-4">
									<div class="form-group course4">
										<label class="required">Course</label>
										<select class="form-control" name="student4_course">
											<option value="btech4">B.Tech./B.Des/MSc/MA</option>
											<option value="mtech4">M.Tech./M.Des/PhD</option>
										</select>
									</div>
								    </div>
								    <div class="col-lg-4">
									<div class="form-group category4">
										<label class="required">Category</label>
										<select class="form-control" name="student4_category">
											<option value="gen4">General/OBC</option>
											<option value="cat4">SC/ST</option>
										</select>
									</div>
								    </div>
								    <div class="form-group col-md-4">
									<label for="student4_id" class="required">Upload ID Card</label>
									<input type="file" name="student4_id" id="file" class="inputfile"/>
								    </div>
								    <div class="form-group col-md-4 mtech4 dept_leave4">
									<label for="student4_dept_leave" class="required">Departmental Leave Form</label>
									<input type="file" name="student4_dept_leave" id="file" class="inputfile"/>
								    </div>
								    <div class="form-group col-md-4 cat4 caste_certi4">
									<label for="student4_caste_certi" class="required">Upload Caste Certificate</label>
									<input type="file" name="student4_caste_certi" id="file" class="inputfile"/>
								    </div>

								</div>
								<!-- ./panel boby -->
							    </div>
							    
						    </div>
						    <!-- ./ panel panel-default  -->





<!-- ------------------------------------------      5       ----------------- -------------------- -->
						     <div class="panel panel-default">
							<div class="panel-heading">
							     <h4 class="panel-title" style="font-size: 15px;">
							         <a data-toggle="collapse" data-parent="#accordion" href="#collapseFive">Student - 5(Optional)</a>
							     </h4>
							</div>
						    	    <div id="collapseFive" class="panel-collapse collapse">
								<div class="panel-body">
								    <div class="form-group col-md-4">
									<label class="required">Name</label>
									<input class="form-control" type="text" value="<?php echo $student5_name; ?>" name="student5_name" />									
								    </div>
								    <div class="form-group col-md-4">
									<label class="required">Webmail (Without "@iitg.ac.in")</label>
									<input class="form-control" type="text" value="<?php echo $student5_name;?>" name="student5_webmail" />									
								    </div>
								    <div class="form-group col-md-4">
									<label class="required">Roll No.</label>
									<input class="form-control" type="number" value="<?php echo $student5_roll_number; ?>" name="student5_roll_number" />
								    </div>
								    <div class="form-group col-md-4">
									<label class="required">Age</label>
									<input class="form-control" type="number" value="<?php echo $student5_age; ?>" name="student5_age" />
								    </div>
								    <div class="col-lg-4">
									<div class="form-group">
										<label class="required">Gender</label>
										<select class="form-control" name="student5_gender">
											<option value="Male">Male</option>
											<option value="Female">Female</option>
											<option value="Transgender">Transgender</option>
										</select>
									</div>
								    </div>
								    <div class="form-group col-md-4">
									<label class="required">Hostel</label>
									<input class="form-control" type="text" value="<?php echo $student5_hostel; ?>" name="student5_hostel" />									
								    </div>
								    <div class="form-group col-md-4">
									<label class="required">Room No.</label>
									<input class="form-control" type="text" value="<?php echo $student5_room_number; ?>" name="student5_room_number" />									
								    </div>
								    <div class="col-lg-4">
									<div class="form-group course5">
										<label class="required">Course</label>
										<select class="form-control" name="student5_course">
											<option value="btech5">B.Tech./B.Des/MSc/MA</option>
											<option value="mtech5">M.Tech./M.Des/PhD</option>
										</select>
									</div>
								    </div>
								    <div class="col-lg-4">
									<div class="form-group category5">
										<label class="required">Category</label>
										<select class="form-control" name="student5_category">
											<option value="gen5">General/OBC</option>
											<option value="cat5">SC/ST</option>
										</select>
									</div>
								    </div>
								    <div class="form-group col-md-4">
									<label for="student5_id" class="required">Upload ID Card</label>
									<input type="file" name="student5_id" id="file" class="inputfile"/>
								    </div>
								    <div class="form-group col-md-4 mtech5 dept_leave5">
									<label for="student5_dept_leave" class="required">Departmental Leave Form</label>
									<input type="file" name="student5_dept_leave" id="file" class="inputfile"/>
								    </div>
								    <div class="form-group col-md-4 cat5 caste_certi5">
									<label for="student5_caste_certi" class="required">Upload Caste Certificate</label>
									<input type="file" name="student5_caste_certi" id="file" class="inputfile"/>
								    </div>

								</div>
								<!-- ./panel boby -->
							    </div>
							    
						    </div>
						    <!-- ./ panel panel-default  -->





<!-- ------------------------------------------      6       ----------------- -------------------- -->
						    <div class="panel panel-default">
							<div class="panel-heading">
							     <h4 class="panel-title" style="font-size: 15px;">
							         <a data-toggle="collapse" data-parent="#accordion" href="#collapse6">Student - 6(Optional)</a>
							     </h4>
							</div>
						    	    <div id="collapse6" class="panel-collapse collapse">
								<div class="panel-body">
								    <div class="form-group col-md-4">
									<label class="required">Name</label>
									<input class="form-control" type="text" value="<?php echo $student6_name; ?>" name="student6_name" />									
								    </div>
								    <div class="form-group col-md-4">
									<label class="required">Webmail (Without "@iitg.ac.in")</label>
									<input class="form-control" type="text" value="<?php echo $student6_webmail; ?>" name="student6_webmail" />									
								    </div>
								    <div class="form-group col-md-4">
									<label class="required">Roll No.</label>
									<input class="form-control" type="number" value="<?php echo $student6_roll_number; ?>" name="student6_roll_number" />
								    </div>
								    <div class="form-group col-md-4">
									<label class="required">Age</label>
									<input class="form-control" type="number" value="<?php echo $student6_age; ?>" name="student6_age" />
								    </div>
								    <div class="col-lg-4">
									<div class="form-group">
										<label class="required">Gender</label>
										<select class="form-control" name="student6_gender">
											<option value="Male">Male</option>
											<option value="Female">Female</option>
											<option value="Transgender">Transgender</option>
										</select>
									</div>
								    </div>
								    <div class="form-group col-md-4">
									<label class="required">Hostel</label>
									<input class="form-control" type="text" value="<?php echo $student6_hostel; ?>" name="student6_hostel" />									
								    </div>
								    <div class="form-group col-md-4">
									<label class="required">Room No.</label>
									<input class="form-control" type="text" value="<?php echo $student6_room_number; ?>" name="student6_room_number" />									
								    </div>
								    <div class="col-lg-4">
									<div class="form-group course6">
										<label class="required">Course</label>
										<select class="form-control" name="student6_course">
											<option value="btech6">B.Tech./B.Des/MSc/MA</option>
											<option value="mtech6">M.Tech./M.Des/PhD</option>
										</select>
									</div>
								    </div>
								    <div class="col-lg-4">
									<div class="form-group category6">
										<label class="required">Category</label>
										<select class="form-control" name="student6_category">
											<option value="gen6">General/OBC</option>
											<option value="cat6">SC/ST</option>
										</select>
									</div>
								    </div>
								    <div class="form-group col-md-4">
									<label for="student6_id" class="required">Upload ID Card</label>
									<input type="file" name="student6_id" id="file" class="inputfile"/>
								    </div>
								    <div class="form-group col-md-4 mtech6 dept_leave6">
									<label for="student6_dept_leave" class="required">Departmental Leave Form</label>
									<input type="file" name="student6_dept_leave" id="file" class="inputfile"/>
								    </div>
								    <div class="form-group col-md-4 cat6 caste_certi6">
									<label for="student6_caste_certi" class="required">Upload Caste Certificate</label>
									<input type="file" name="student6_caste_certi" id="file" class="inputfile"/>
								    </div>

								</div>
								<!-- ./panel boby -->
							    </div>
							    
						    </div>
						    <!-- ./ panel panel-default  -->










				                </div>
						    
					    </div>
					    <!-- panel body  -->

				    <script type='text/javascript'>
					$(window).load(function(){
						$(".return").hide();
						$(".one").click(function() {
							if($(this).is(":checked")) {
								$(".return").hide();
							
							} else {
								$(".return").show();
							}
						});
						$(".both").click(function() {
							if($(this).is(":checked")) {
								$(".return").show();
							
							} else {
								$(".return").hide();
							}
						});
					});

				    </script>


					    <div >
						<label class="required">Station Of Journey</label>
							<div>
							<div class="form-group col-lg-6">
								<label class="required">From</label>
								<input type="text" class="form-control" value="<?php echo $from_station; ?>" name="from_station"/>
							</div>
							<div class="form-group col-lg-6">
								<label  class="required">To</label>
								<input type="text" class="form-control" value="<?php echo $to_station; ?>" name="to_station"/>
							</div>
							</div>
					    </div>
					    
					    <div class="form-group col-lg-6">
						<div >
							<label class="required">Journey Type:</label>
						</div>
						<div >
							<input class="one" name="journey_type" type="radio" value="One Way" checked>One Way  
							<input class="both" name="journey_type" type="radio" value="Both Way"> Both Way
					        </div>
					    </div>
					    

					    <div class="form-group col-lg-3">
						<label class="required">Date of Onward Journey</label>
						<div class="input-group date">
							<span class="input-group-addon"><i class="fa fa-calendar"></i> </span>
							<input id="date_from" type="text" class="form-control datepicker" name="onward" data-date-format="yyyy-mm-dd" value="<?php echo $onward_journey; ?>">
						</div>
					    </div>
					    <div class="form-group col-lg-3 return">
						<label class="required">Date of Return Journey</label>
						<div class="input-group date">
							<span class="input-group-addon"><i class="fa fa-calendar"></i> </span>
							<input id="date_to" type="text" class="form-control datepicker" name="return" data-date-format="yyyy-mm-dd" value="<?php echo $return_journey; ?>">
						</div>
					    </div>
					    <div class="form-group col-md-4">
						<label for="ticket" class="required">Upload Ticket</label>
						<input type="file" name="ticket" id="file" class="inputfile"/>
					    </div>

					
					</div>
				    </div>

				    <div class="row" style="margin-top:2%">
					<div class="col-lg-12">
					    <div class="col-lg-12"><input type="checkbox" id="checkme" name="tnc" required class="required"/><a href="system_railway_concession_rules.php"> I have read all the rules for applying for Railway Concession. </a><br/></div>
						<div class="col-lg-5"></div>
						 
						<div class="col-lg-2">
							<div class="form-group ">
							  
								<button type="submit" class="btn btn-primary" name="Submit"  >Submit Request</button>
							</div>
						</div>
						<div class="col-lg-5">
						</div>
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
									<td><b>Railway Concession Application No.:</b> <?php echo $rc_application_no; ?></td>
									<td><b>Booking Status:</b>Submitted to Students' Affairs Office</td>
									
								</tr>
								<tr>
									<td><b>Onward Journey Date:</b> <?php echo $onward_journey; ?></td>
									<td><b>Return Journey Date:</b> <?php if($journey_type=='One Way'){ echo $return_journey;} else{ echo "NA"; } ?></td>
									
								</tr>
								<tr>
									<td><b>From Station:</b> <?php echo $from_station; ?></td>
									<td><b>To Station:</b> <?php echo $to_station; ?></td>
								</tr>
								<tr>
									<td><b>Booking Time:</b> <?php echo $curdatetime; ?></td>
									<td><b>Journey Type:</b> <?php echo $journey_type; ?></td>
								</tr>
								
							</tbody>
						</table>
					<div class="row" style="margin-top:2%">
					<div class="col-lg-12">
						<div class="col-lg-5"></div>
							<div class="col-lg-2">
								<div class="form-group ">
								    
									<a href='system_track_railway_concession_application.php'><button type="button" class="btn btn-default">Check Old Booking(s)</button></a>
								</div>
							</div>
						<div class="col-lg-5"></div>
					</div>
					</div>
				<?php } ?>





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
