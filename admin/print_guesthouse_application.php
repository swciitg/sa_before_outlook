<?php 
	include("session.php");
	include("connect.php");
	error_reporting(0);
	
	$id = $_GET['print'];
	$query = "SELECT * FROM gh_booking WHERE application_no = '$id'";
	$result = mysql_query($query);
	$row_print = mysql_fetch_array($result);
?>
<!DOCTYPE html>
<html>
<head>
<style>
body{
	width: 90%;
	margin: auto;
}
table, th, td {
    border: 1px solid black;
    border-collapse: collapse;
}
th, td {
    padding: 5px;
    text-align: left;    
}
</style>
</head>
<body>
	<table>
	   <caption><img src="http://www.iitg.ernet.in/html/images/logo.png" style="margin:10px"></caption>
	   <thead>
		  <tr>
			 <td style="text-align:center"><b>Application No.:</b> <?php echo $row_print["application_no"]; ?></td>
			 <td colspan="5" style="text-align:center"><b>REQUEST FOR GUEST HOUSE ACCOMMODATION</b><br>(FOR USE BY STUDENTS FOR THEIR PARENTS/LEGAL GUARDIANS)</td> 
		  </tr>
	   </thead>
	   <tbody>
		  <tr>
			 <td colspan="2"><b>Name(s) of the Visitor(s):</b><br>(Mention Gender / Age / Marital Status and relationship with the Student)</td>
			 <td colspan="4">
				 <?php 
					echo "Visitor-1: ".$row_print['visitor1_name']." ".$row_print['visitor1_gender']." ".$row_print['visitor1_age']." ".$row_print['visitor1_marital']." ".$row_print['visitor1_relation']; 
					if($row_print['visitor2_name'] !=''){
						echo "<br>Visitor-2: ".$row_print['visitor2_name']." ".$row_print['visitor2_gender']." ".$row_print['visitor2_age']." ".$row_print['visitor2_marital']." ".$row_print['visitor2_relation']; 
					}
				 ?>
			 </td>
		  </tr>
	   </tbody>
	   <tfoot>
		  <tr>
			 <td colspan="2"><b>Address(s) of the Visitor(s):</b><br>(Please state mobile number / e-mail ID, if any)</td>
			 <td colspan="4">
				<?php 
					echo "Visitor-1: ".$row_print['visitor1_address'];
					if($row_print['visitor2_name'] !=''){
						echo "<br>Visitor-2: ".$row_print['visitor2_address']; 
					}
				?>
			 </td>
		  </tr>
		  <tr>
			 <th colspan="2"><b>Purpose of Visit:</b></th>
			 <td colspan="4"> <?php echo $row_print["booking_reason"]; ?></td>
		  </tr>
		  <tr>
			 <th><b>Date of Arrival:</b></th>
			 <td> <?php echo $row_print["date_from"]; ?></td>
			 <th><b>Date of Departure:</b></th>
			 <td> <?php echo $row_print["date_to"]; ?></td>
			 <td><b>Type of Occupancy:</b><br>(Please note that all rooms are double bedded)</td>
			 <td> <?php echo $row_print["room_type"]; ?></td>
		  </tr>
		  <tr>
			 <td rowspan="5" colspan="2"><b>Remarks(if any):</b><br>Recommendation from Students’ Affairs<br></br><?php echo $row_print["comment_saoff"]; ?></td>
			 <td colspan="2"> <b>Name of the Student:<b></td>
			 <td colspan="2"> <?php echo $row_print["name"]; ?></td>
		  </tr>
		  <tr>
			 <th>Roll No.:</th>
			 <td> <?php echo $row_print["roll_no"]; ?></td>
			 <th>Email ID:</th>
			 <td> <?php echo $row_print["webmail"]; ?></td>
		  </tr>
		  <tr>
			 <th colspan="2">Department/Centre</th>
			 <td colspan="2"> <?php echo $row_print["department"]; ?></td>
		  </tr>
		  <tr>
			 <th>Hostel:</th>
			 <td> <?php echo $row_print["hostel"]; ?></td>
			 <th>Room No.:</th>
			 <td><?php echo $row_print["room"]; ?></td>
		  </tr>
		  <tr>
			 <th colspan="2">Contact No.:</th>
			 <td colspan="2"> <?php echo $row_print["phone"]; ?></td>
		  </tr>
		  <!--<tr>
			 <td colspan="6"> <b>Note:</b> Request for Guest House accommodation – (a) must be submitted to Students’ Affairs Section at least 5 (five) working days before the arrival of the guest, (b) Guest House will be generally provided only to immediate parents or immediate guardian (if parents are deceased or incapacitated) and spouse (in case of married scholars) only once a year (c) as subject to availability of rooms, one room is considered for accommodation for a maximum of 3 nights in a spell at semi-official rate. (d) copy of official Identity Card of guests must be submitted at the time of submitting this form (e) in exceptional cases, when parents cannot come due to circumstances, immediate siblings may be permitted with such request pre-endorsed by parents (e) All the information sought above must be duly filled or else request may be declined (f) request for any other guest is not entertained.</td>
		  </tr> -->
		  <tr>
			 <td colspan="6" style="text-align:center"> <b>Office Comment(s)</b></td>
		  </tr>
		  <tr>
			 <th colspan="2"><b>Allotted Room No.:</b></th>
			 <td colspan="4"> <?php echo $row_print["allotted_room"]; ?></td>
		  </tr>
		  <tr>
			 <th colspan="2"><b>Period:</b></th>
			 <td> From:</td>
			 <td> <?php echo $row_print["date_from"]; ?></td>
			 <td> To:</td>
			 <td> <?php echo $row_print["date_to"]; ?></td>
		  </tr>
		  <tr>
			 <th colspan="2"><b>Booking Category:</b></th>
			 <td colspan="4"> Official</td>
		  </tr>
		  <tr style="border:0">
			 <th colspan="2" style="border:0"><b>Office Note:</b></th>
			 <td colspan="4" style="border:0"> <?php echo $row_print["comment_est"]; ?></td>
		  </tr>
	   </tfoot>
	</table>
</body>
</html>
