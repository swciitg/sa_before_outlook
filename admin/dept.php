<?php
    include("connect.php");
	include("session.php");
    
	//get search term
    $searchTerm = $_GET['term'];
	
    //get matched data from skills table
	$query  = "SELECT * FROM department_codes WHERE dept_name LIKE '%".$searchTerm."%' AND dept_id NOT IN (SELECT dept_id FROM department_codes WHERE dept_id = $current_dept) ORDER BY dept_name ASC";
	$result = mysql_query($query);
    while ($row = mysql_fetch_array($result)) {
        $data[] = $row['dept_name'];
    }
    
    //return json data
    echo json_encode($data);
?>