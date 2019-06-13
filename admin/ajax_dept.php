<?php
include("session.php");
if($_POST['oth_department'])
{
	$query = "SELECT * FROM department_codes";
	$result = mysql_query($query);
	echo "<option disabled selected>Choose Department/Section</option>";
	while($row=mysql_fetch_array($result))
	{
	$oth_department=$row['dept_name'];
	echo "<option>$oth_department</option>";
	}
}
?>