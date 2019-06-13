<?php include("session.php"); ?>
<!DOCTYPE html>
<html lang="en">
<?php
if(isset($_GET['delete'])) {
   @mysql_query("DELETE FROM forms WHERE id = '".$_GET['delete']."'");
}
?>
<?php include("head.php"); ?>
<?php include("scripts.php"); ?>
	<body>
	<?php include("header.php"); ?>
	<div id="wrapper">
	<?php include("all_forms.php"); ?>
	</div>
	</body>
</html>