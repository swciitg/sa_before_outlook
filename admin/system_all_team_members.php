<?php include("session.php"); ?>
<!DOCTYPE html>
<html lang="en-US">
<?php

if(isset($_GET['delete'])){
	$section=$_GET['section'];
	if($section=='sa'){
		@mysql_query("DELETE FROM user_contact_sa WHERE webmail = '".$_GET['delete']."'");
	}
	else if($section=='gymkhana_office'){
		@mysql_query("DELETE FROM user_contact_gymkhana_office WHERE webmail = '".$_GET['delete']."'");
	}
	else if($section=='counselling_cell'){
		@mysql_query("DELETE FROM user_contact_counselling_cell WHERE webmail = '".$_GET['delete']."'");
	}	
	else if($section=='new_sac'){
		@mysql_query("DELETE FROM user_contact_new_sac WHERE webmail = '".$_GET['delete']."'");
	}
	else if($section=='visiting_artist'){
		@mysql_query("DELETE FROM user_contact_visiting_artist WHERE webmail = '".$_GET['delete']."'");
	}
	else if($section=='hostels'){
		@mysql_query("DELETE FROM user_contact_hostels WHERE webmail = '".$_GET['delete']."'");
	}
	
}
?>
<?php include("head.php"); ?>
<?php include("scripts.php"); ?>
	<body>
	<?php include("header.php"); ?>
	<div id="wrapper">
	<?php include("all_team_members.php"); ?>
	</div>
	</body>
</html>
