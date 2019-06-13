<?php include("session.php"); ?>
<!DOCTYPE html>
<html lang="en">
<?php include("head.php"); ?>
<?php include("scripts.php"); ?>
	<body>
	<?php include("header.php"); ?>
	<div id="wrapper">
	<?php
		include("connect.php");
		$id = $login_session;
		$query = "SELECT * FROM studentinfo WHERE webmail = '$id'";
		$result = mysql_query($query);
		$row = mysql_fetch_assoc($result);
		$webmail_id = $row['webmail'];
		if ($webmail_id != '') {
			include("track_railway_concession_application_details.php");
		}
		else{
			include("new_user.php");
		}
	?>
	</div>
	</body>
</html>
