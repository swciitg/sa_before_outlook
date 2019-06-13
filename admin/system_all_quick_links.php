<?php include("session.php"); ?>
<!DOCTYPE html>
<html lang="en">
<?php
if(isset($_GET['delete'])) {
   @mysql_query("DELETE FROM quick_links WHERE id = '".$_GET['delete']."'");
}
?>
<?php include("head.php"); ?>
<?php include("scripts.php"); ?>
	<body>
	<?php include("header.php"); ?>
	<div id="wrapper">
	<?php include("all_quick_links.php"); ?>
	</div>
	</body>
</html>