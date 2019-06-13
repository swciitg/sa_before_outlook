<?php
// list of printer types for specific manufacturer
include("connect.php");
include("session.php");

header("Content-type: text/xml");

$hostel = $_POST['hostel'];
//echo $man;

echo "<?xml version=\"1.0\" ?>\n";
echo "<printertypes>\n";
if($user_hostel != "$hostel"){
	$select = "
	SELECT *
	FROM department_codes
	WHERE dept_name = '$hostel'";
}
else if($user_gender == "Male"){
	$select = "
	SELECT *
	FROM department_codes
	WHERE dept_name NOT IN (
	  SELECT dept_name FROM department_codes
	  WHERE gender IN ('Female','Coed')
	)";
}
else if($user_gender == "Female"){
	$select = "
	SELECT *
	FROM department_codes
	WHERE dept_name NOT IN (
	  SELECT dept_name FROM department_codes
	  WHERE gender IN ('Coed')
	)";
}
try {
	foreach($dbh->query($select) as $row) {
		echo "<Printertype>\n\t<id>".$row['dept_id']."</id>\n\t<name>".$row['dept_name']."</name>\n</Printertype>\n";
	}
}
catch(PDOException $e) {
	echo $e->getMessage();
	die();
}
echo "</printertypes>";
?>