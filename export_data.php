<?php
include("session.php"); 
error_reporting(0);
// Database Connection

$curdatetime     = date("Y-m-d h:i:sa");
mysql_query("INSERT INTO user_activity VALUES ('','$login_session','$name','$current_dept','Downloaded records','public','$curdatetime')");

$host="localhost";
$uname="root";
$pass="";
$database = "sadb"; 

$connection=mysql_connect($host,$uname,$pass); 

echo mysql_error();

//or die("Database Connection Failed");
$selectdb=mysql_select_db($database) or 
die("Database could not be selected"); 
$result=mysql_select_db($database)
or die("database cannot be selected <br>");

// Fetch Record from Database

$output = "";
$sql = mysql_query("SELECT filesNo,filename,application_date,application_desc,current_location,dealing_person,current_responsible_person,comment,current_status FROM movement WHERE current_location LIKE '%$current_location%' OR current_responsible_person LIKE '%$current_location%' GROUP BY filesNo");
$columns_total = mysql_num_fields($sql);

// Get The Field Name

for ($i = 0; $i < $columns_total; $i++) {
$heading = mysql_field_name($sql, $i);
$output .= '"'.$heading.'",';
}
$output .="\n";

// Get Records from the table

while ($row = mysql_fetch_array($sql)) {
for ($i = 0; $i < $columns_total; $i++) {
$output .='"'.$row["$i"].'",';
}
$output .="\n";
}

// Download the file

$filename = "Application_Records_".$current_location.".csv";
header('Content-type: application/csv');
header('Content-Disposition: attachment; filename='.$filename);

echo $output;
exit;

?>