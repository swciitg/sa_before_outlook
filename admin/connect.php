<?php

/***************************************************************************
 *                         Connect to MySQL Server                         *
 ***************************************************************************/

$dbh=mysql_connect ("localhost", "saDbUser", "saoff@#admin") or die ('I cannot connect to the database because: ' . mysql_error());
mysql_select_db ("saDb");
?>
