<?php include("session.php"); ?>
<!DOCTYPE html>
<html lang="en">
<?php
if(isset($_GET['delete'])) {
   @mysql_query("DELETE FROM disciplinary_students WHERE id = '".$_GET['delete']."'");
}
	$roll = $_GET['roll'];
?>
<?php include("head.php"); ?>
<?php include("scripts.php"); ?>
	<body>
	<?php include("header.php"); ?>
	<div id="wrapper">
	<?php include("dc_delete_student.php"); ?>
	</div>
	</body>
</html>
