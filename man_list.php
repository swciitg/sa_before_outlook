<?php
// manufacturer_list
include("connect.php");
include("session.php");

header("Content-type: text/xml");
echo "<?xml version=\"1.0\" ?>\n";
echo "<companies>\n";
if($user_gender == "Male"){
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
		echo "<Company>\n\t<id>".$row['dept_id']."</id>\n\t<name>".$row['dept_name']."</name>\n</Company>\n";
	}
}
catch(PDOException $e) {
	echo $e->getMessage();
	die();
}
echo "</companies>";
?>