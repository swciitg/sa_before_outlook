<?php
error_reporting(0);
// Establishing Connection with Server by passing server_name, user_id and password as a parameter
$connection = mysql_connect("localhost", "saDbUser", "saoff@#admin");
//$connection = mysql_connect("localhost", "sa_admin", "sa_#admin");
// Selecting Database
$db = mysql_select_db("saDb", $connection);
session_start();// Starting Session

// Storing Session
$user_check = $_SESSION['login_user'];

// SQL Query To Fetch Complete Information Of User
$ses_sql=mysql_query("select username,password,name,phone,image,post,department,usertype from user where username='$user_check'", $connection);
$row = mysql_fetch_assoc($ses_sql);
$login_session =$row['username'];
$user_password = $row['password'];
$name = $row['name'];
$user_phone = $row['phone'];
$user_image = $row['image'];
$user_post = $row['post'];
$current_dept = $row['department'];
$usertype= $row['usertype'];
$currentdatetime = mysql_query('select now()');
$curdatetime     = mysql_result($currentdatetime, 0);

//Variable Current Year
$curYear = date('Y'); 

// SQL Query To Fetch Department Name of Logged in User
$code_sql=mysql_query("select dept_name from department_codes where dept_id='$current_dept'", $connection);
$code = mysql_fetch_assoc($code_sql);
$current_location = $code['dept_name'];

if(!isset($login_session)){
mysql_close($connection); // Closing Connection
header('Location: ../index.php'); // Redirecting To Home Page
}
?>
