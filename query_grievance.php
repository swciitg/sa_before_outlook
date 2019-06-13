<?php
	include('connect.php');
	//////// Do not Edit below /////////
	try {
	$dbo = new PDO('mysql:host='.$hab_dbhost_name.';dbname='.$hab_database, $hab_username, $hab_password);
	} catch (PDOException $e) {
	print "Error!: " . $e->getMessage() . "<br/>";
	die();
	}
	
	include("session.php");
	error_reporting(E_ALL & ~(E_STRICT|E_NOTICE));
	ini_set("display_errors", 1);
	$id = $login_session;
	
	$subject         = $_POST['subject'];
	$query_category        = $_POST['cat'];
	$query_subcategory     = $_POST['subcat'];
	$message   		 = $_POST['message'];
	$anonymous       = $_POST['anonymous'];
	$user_activity   = "Station leave application from Webmail ID ".$id;
	$currentdatetime = mysql_query('select now()');
	$curdatetime     = mysql_result($currentdatetime, 0);
	$curYear         = date('Y');
	$error = "";
	$success = "";
	
	$min_range=10000;
	$max_range=99999;
	$newID = rand($min_range,$max_range);
	
	$query_id = 'QNG/'.$curYear.'/'.$newID;
	
	$query2 = "SELECT * FROM query_category WHERE cat_id = '$query_category '";
	$result2 = mysql_query($query2);
	$query_row = mysql_fetch_array($result2);
	$category_name = $query_row['category'];
	$query3 = "SELECT * FROM query_subcategory WHERE subcat_id = '$query_subcategory '";
	$result3 = mysql_query($query3);
	$subquery_row = mysql_fetch_array($result3);
	$subcategory_name = $subquery_row['subcategory'];
	
	if (isset($_POST['Submit'])) {
		if ($subject == '' OR $query_category == '' OR $query_subcategory == '' OR $message == '') {
			$error = "<font color='red'>All fields are required.</font>";
		}
		else if($anonymous != ''){
			$success = "<font color='green'>Message successfully recorded and forwarded to concerned person/department.<br></br>Application No.: <b>".$query_id."</b></font>";
			mysql_query("INSERT INTO query_grievance VALUES ('','$query_id','$login_session','$name','$subject','$category_name','$subcategory_name','$message','yes','$curdatetime')");
		}	
		else {
			$success = "<font color='green'>Message successfully recorded and forwarded to concerned person/department.<br></br>Application No.: <b>".$query_id."</b></font>";
			mysql_query("INSERT INTO query_grievance VALUES ('','$query_id','$login_session','$name','$subject','$category_name','$subcategory_name','$message','no','$curdatetime')");
			$message = "Dear ".$name."\r\n Your message (Application No. ".$query_id.") has been successfully recorded and forwarded to concerned person/department. Latest status can be tracked via CLS.\r\n Thanking You.\r\n Regards,\r\n Team SWC";
			$headers = "MIME-Version: 1.0" . "\r\n";
			$headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
			$headers .= 'From: SWC, IIT Guwahati <swc@iitg.ernet.in>' . "\r\n";
			//$headers .= 'Cc: swc@iitg.ernet.in' . "\r\n";
			$user_webmail = $id."@iitg.ernet.in";
			mail($user_webmail , 'Query/Grievance confirmation message' , $message , $headers);
		}
	}
?>
	<script type="text/javascript">
		function AjaxFunction()
		{
		var httpxml;
		try
		  {
		  // Firefox, Opera 8.0+, Safari
		  httpxml=new XMLHttpRequest();
		  }
		catch (e)
		  {
		  // Internet Explorer
				  try
							{
						 httpxml=new ActiveXObject("Msxml2.XMLHTTP");
							}
					catch (e)
							{
						try
					{
					httpxml=new ActiveXObject("Microsoft.XMLHTTP");
					 }
						catch (e)
					{
					alert("Your browser does not support AJAX!");
					return false;
					}
					}
		  }
		function stateck() 
			{
			if(httpxml.readyState==4)
			  {
		//alert(httpxml.responseText);
		var myarray = JSON.parse(httpxml.responseText);
		// Remove the options from 2nd dropdown list 
		for(j=document.testform.subcat.options.length-1;j>=0;j--)
		{
		document.testform.subcat.remove(j);
		}


		for (i=0;i<myarray.data.length;i++)
		{
		var optn = document.createElement("OPTION");
		optn.text = myarray.data[i].subcategory;
		optn.value = myarray.data[i].subcat_id;  // You can change this to subcategory 
		document.testform.subcat.options.add(optn);

		} 
			  }
			} // end of function stateck
			var url="dd.php";
		var cat_id=document.getElementById('s1').value;
		url=url+"?cat_id="+cat_id;
		url=url+"&sid="+Math.random();
		httpxml.onreadystatechange=stateck;
		//alert(url);
		httpxml.open("GET",url,true);
		httpxml.send(null);
		  }
	</script>
			<style>
			label.required:after {
				content: " *";
				color: red;
			}
			</style>
			<div id="page-wrapper">
                <!-- /.row -->
                <div class="row">
                    <div class="col-lg-12">
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                Query and Grievance
                            </div>
							<div class="panel-body">
								<?php 
									if($error != ''){
									?>
									  <div class="alert alert-warning">
										<?php if(isset($error)) { echo $error; }?>
									  </div>
									<?php
									}
									else if($success != ''){
									?>
									  <div class="alert alert-success">
										<?php if(isset($success)) {											
											echo $success;
										?>
										<style>
											.query_success{
												display: none;
											}
										</style>
										<?php
										} 
										?>
									  </div>
									<?php
									}
									else{
										//echo "";
									}
								?>
                                <div class="row query_success">
                                    <div class="col-lg-12">
                                        <form name="testform" class="before_success" action=""  accept-charset="utf-8" method="post" enctype="multipart/form-data">
											<div class="row">
												<div class="col-lg-12">
													<div class="panel-body">
													   <div class="form-group col-md-4">
														  <label class="required">Subject</label>
														  <input class="form-control" type="text" value="<?php echo $_POST["subject"]; ?>" name="subject"/>
													   </div>
													   <div class="col-lg-4">
														  <div class="form-group">
															 <label class="required">Category</label>
															 <select class="form-control" name="cat" id='s1' onchange=AjaxFunction();>
															    <?php
																$sql="select * from query_category "; // Query to collect data from table 
																foreach ($dbo->query($sql) as $row) {
																echo "<option value=$row[cat_id]>$row[category]</option>";
																}
															    ?>
															 </select>
														  </div>
													   </div>
													   <div class="col-lg-4">
														  <div class="form-group">
															 <label class="required">Subcategory</label>
															    <select class="form-control" name="subcat" id='s2'>
																</select>
														  </div>
													   </div>
													   <div class="form-group col-md-6">
														  <label class="required">Message</label>
														  <textarea class="form-control" name="message"><?php echo $_POST["message"]; ?></textarea>
													   </div>
													   <div class="checkbox col-md-12">
															<label>
																<input name="anonymous" type="checkbox" value="Submit as Anonymous">Submit Anonymously
															</label>
														</div>
													</div>
												</div>
											</div>
											<div class="row" style="margin-top:2%">
												<div class="col-lg-12">
													<div class="col-lg-5"></div>
													<div class="col-lg-2">
														<div class="form-group ">
															<button type="submit" class="btn btn-primary" name="Submit" >Submit</button>
														</div>
													</div>
													<div class="col-lg-5">
													</div>
												</div>
											</div>
										</form>
                                    </div>
                                </div>
                                <!-- /.row (nested) -->
                            </div>
                            <!-- /.panel-body -->
                        </div>
                        <!-- /.panel -->
                    </div>
                    <!-- /.col-lg-12 -->
                </div>
            </div>
            <!-- /#page-wrapper -->
