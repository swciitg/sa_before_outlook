<?php

/***************************************************************************
 *                         Connect to MySQL Server                         *
 ***************************************************************************/

$dbh=mysql_connect ("localhost", "saDbUser", "saoff@#admin") or die ('I cannot connect to the database because: ' . mysql_error());
mysql_select_db ("saDb");

/////// Update database login details here /////
$hab_dbhost_name = "localhost"; // host name 
$hab_database = "saDb";       // database name
$hab_username = "saDbUser";            // login userid 
$hab_password = "saoff@#admin";            // password 
//////// End of database details of server //////

									
?>
