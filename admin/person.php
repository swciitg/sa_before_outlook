<?php
    include("connect.php");
	include("session.php");
	
	//get search term
    $searchTerm = $_GET['term'];
	
    //get matched data from skills table
	$query  = "SELECT * FROM user WHERE name LIKE '%".$searchTerm."%' AND department = $current_dept ORDER BY name ASC";
	$result = mysql_query($query);
    while ($row = mysql_fetch_array($result)) {
        $data[] = $row['name'];
    }
    
    //return json data
    echo json_encode($data);
?>