<?php
	include("session.php");
	error_reporting(E_ALL & ~(E_STRICT|E_NOTICE));
	ini_set("display_errors", 0);

	include("connect.php");
	
	
	$query2 = "SELECT * FROM `disciplinary_cases`";
	$result2 = mysql_query($query2);
	$num_rows = mysql_num_rows($result2) + 1;

	
	$year_reg = $_POST['year_reg'];
	$committee = $_POST['committee'];
	$date_of_incident = $_POST['date_of_incident'];
	$matter = $_POST['matter'];
	$stud_name = $_POST['name0'];
	$roll_no = $_POST['roll_no0'];
	$dept = $_POST['dept0'];
	$hostel = $_POST['hostel0'];
	$curdatetime = date('Y-m-d H:i:s');
	
	//no. of students only if more than one
	$i_value = $_POST['i_value'];
	if($i_value!=''){
			$i=1;
			while($i<$i_value){
				$stud_name_check = $_POST['name'.$i];
				$roll_no_check = $_POST['roll_no'.$i];
				$dept_check = $_POST['dept'.$i];
				$hostel_check = $_POST['hostel'.$i];
				if($stud_name_check=='' OR $roll_no_check='' OR $dept_check=='' OR $hostel_check==''){
					$blank_row='yes';
					break;
				}
				$i++;
			}
		}

	
	if($committee=='ADC'){
		$committee_short = "A";
	}
	else if($committee=='SDC'){
		$committee_short = "S";
	}
	else if($committee=='OEC'){
		$committee_short = "O";
	}
	else if($committee=='DDC'){
		$committee_short = "D";
	}
	else if($committee=='IHDC'){
		$committee_short = "I";
	}
	else if($committee=='HDC'){
		$committee_short = "H";
	}
	else if($committee=='SAPRC'){
		$committee_short = "SA";
	}

	
	//$currentdatetime = mysql_query('select now()');
	//$curdatetime = mysql_result($currentdatetime,0);
	//$date = new DateTime('now', new DateTimeZone('Asia/Kolkata'));
	//$curdatetime = $date->format('d-m-Y H:i:s');
	$time_d = date("d");
	$time_m = date("M");
	$time_y = date("Y");
	if (isset($_POST['Submit'])) {
		if($year_reg==''){
			$error = "<font color='red'>Please Enter Year of Registration(Student).</font>";
		}
		else if($date_of_incident==''){
			$error = "<font color='red'>Please Enter Date Of Incident.</font>";
		}
		else if($matter==''){
			$error  = "<font color='red'>Please Enter Matter of Incident.</font>";
		}
		else if($stud_name =='' OR $roll_no =='' OR $dept =='' OR $hostel ==''){
			$error  = "<font color='red'>Please Enter Student Complete Details.</font>";
		}
		else if($blank_row=='yes'){
			$error  = "<font color='red'>Please Enter Student Complete Details.</font>";
		}
		else{
		
			$application_no = $year_reg."/".$committee_short."/".$num_rows;
			$success = "New disciplinary case with case no. <b>$application_no</b> is successfully registered.";
			mysql_query("INSERT INTO `disciplinary_cases` VALUES ('','$application_no','$year_reg','$committee','$date_of_incident','$matter','$stud_name','$roll_no','$dept','$hostel','$curdatetime','open','')");
			if($i_value!=''){
				$i=1;
				while($i<$i_value){
					$stud_name_var = $_POST['name'.$i];
					$roll_no_var = $_POST['roll_no'.$i];
					$dept_var = $_POST['dept'.$i];
					$hostel_var = $_POST['hostel'.$i];
					mysql_query("INSERT INTO `disciplinary_students` VALUES ('','$application_no','$stud_name_var','$roll_no_var','$dept_var','$hostel_var','$curdatetime')");
					$i++;
				}
			}	
		}

	
	}
?>



<style>
label.required:after {
	content: " *";
	color: red;
}
</style>

<link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
<script type='text/javascript'>
	$( function() {
		$( "#date" ).datepicker({dateFormat: "yy-mm-dd",showAnim: "slideDown" });
	  } );

	$(document).ready(function(){
	      var i=1;
	     $("#add_row").click(function(){
	      $('#addr'+i).html("<td>"+ (i+1) +"</td><td><input name='name"+i+"' type='text' placeholder='Name' class='form-control input-md'  /> </td><td><input  name='roll_no"+i+"' type='text' placeholder='Roll Number'  class='form-control input-md'></td><td><input  name='dept"+i+"' type='text' placeholder='Department'  class='form-control input-md'></td><td><input  name='hostel"+i+"' type='text' placeholder='Hostel'  class='form-control input-md'></td>");

	      $('#tab_logic').append('<tr id="addr'+(i+1)+'"></tr>');
	      
	      i++; 
		$('#value_i').html("<input name='i_value' value='"+i+"' type='hidden'>");
	  });
	     $("#delete_row").click(function(){
	    	 if(i>1){
			 $("#addr"+(i-1)).html('');
			 i--;
			 }
		 });

	});
</script>

			<div id="page-wrapper">
                <!-- /.row -->
                <div class="row">
                    <div class="col-lg-12">
                        <div class="panel panel-default">
                            <div class="panel-heading" style='font-size:150%; color:#198822' class='form-group col-lg-12'>
                               Register New Disciplinary Case 
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
									
								?>
                                <div class="row">
                                    <div class="col-lg-12">
                                        <form name="case" class="before_success" accept-charset="utf-8" method="post"  action="" enctype="multipart/form-data">
                                             <div class="form-group col-md-4">
						<label for="year_reg" class="required">Year of Registration(Student)</label>
						<select class="form-control" id="year_reg" name="year_reg">
							<option value="01">2001</option>
							<option value="02">2002</option>
							<option value="03">2003</option>
							<option value="04">2004</option>
							<option value="05">2005</option>
							<option value="06">2006</option>
							<option value="07">2007</option>
							<option value="08">2008</option>
							<option value="09">2009</option>
							<option value="10">2010</option>
							<option value="11">2011</option>
							<option value="12">2012</option>
							<option value="13">2013</option>
							<option value="14">2014</option>
							<option value="15">2015</option>
							<option value="16">2016</option>
							<option value="17">2017</option>
							<option value="18">2018</option>
							<option value="19">2019</option>
							<option value="20">2020</option>
						</select> 
					    </div>
					    <div class="form-group col-md-4 return">
						<label for="committee" class="required">Register Case Under:</label>
						<select class="form-control" id="committee" name="committee">
							<option value="ADC">ADC (Academic Disciplinary Committee)</option>
							<option value="SDC">SDC (Student Disciplinary Committee)</option>
							<option value="OCE">OCE (Other Complaints and Enquiry)</option>
							<option value="DDC">DDC (Department Disciplinary Committee)</option>
							<option value="IHDC">IHDC (Institute Hostel Disciplinary Committee)</option>
							<option value="HDC">HDC (Hostel Disciplinary Committee)</option>
							<option value="SARPC">SARPC (SARPC)</option>
						</select>
					    </div>
					    <div class="form-group col-md-4">
						<label for="date" class="required">Date Of Incident</label>
						<div class="input-group date">
							<span class="input-group-addon"><i class="fa fa-calendar"></i> </span>
							<input id="date" type="text" class="form-control datepicker" name="date_of_incident" data-date-format="yyyy-mm-dd" value="<?php echo $date_of_incident; ?>">
						</div>
					    </div>
					    <div class="form-group col-md-12">
						<label for="matter" class="required">Matter Related To</label>
						<input class="form-control" type="text" id="matter" name="matter" value="<?php echo $matter;?>" />
					    </div>
					    <?php echo "<div style='font-size:150%; color:#198822' class='form-group col-lg-12'>Involved Student Details</div>"; ?>
					   <!-- <div class="form-group col-md-3">
						<label for="name" class="required">Name</label>
						<input class="form-control" name="name" id="name" value="<?php echo $stud_name; ?>" /> 
					    </div>
					    <div class="form-group col-md-3">
						<label for="roll_no" class="required">Roll No.</label>
						<input class="form-control" name="roll_no" id="roll_no" value="<?php echo $roll_no; ?>" />
					    </div>
					    <div class="form-group col-md-3">
						<label for="department" class="required">Department</label>
						<input class="form-control" name="department" id="department" value="<?php echo $dept; ?>" />
					    </div>
					    <div class="form-group col-md-3">
						<label for="hostel" class="required">Hostel</label>
						<input class="form-control" name="hostel" id="hostel" value="<?php echo $hostel; ?>" />
					    </div> -->

						<div class="col-md-12 column">
							<table class="table table-bordered table-hover" id="tab_logic">
								<thead>
									<tr >
										<th class="text-center">
											S.No.
										</th>
										<th class="text-center">
											Student Name
										</th>
										<th class="text-center">
											Roll Number
										</th>
										<th class="text-center">
											Department
										</th>
										<th class="text-center">
											Hostel
										</th>
									</tr>
								</thead>
								<tbody>
									<tr id='addr0'>
										<td>
										1
										</td>
										<td>
										<input type="text" name='name0'  placeholder='Name' class="form-control"/>
										</td>
										<td>
										<input type="text" name='roll_no0' placeholder="Roll Number" class="form-control"/>
										</td>
										<td>
										<input type="text" name='dept0' placeholder='Department' class="form-control"/>
										</td>
										<td>
										<input type="text" name='hostel0' placeholder='Hostel' class="form-control"/>
										</td>
									</tr>
						    <tr id='addr1'></tr>
						    <tr id='value_i'></tr>
								</tbody>
							</table>
					<a id="add_row" class="btn btn-default pull-left">Add Student</a><a id='delete_row' class="pull-right btn btn-default">Delete</a>
					</div>
	


					    <div class="row" style="margin-top:2%">
						<div class="col-lg-12">
						   <div class="col-lg-5"></div>
							 
							<div class="col-lg-2">
								<div class="form-group ">
								  
									<button type="submit" class="btn btn-primary" name="Submit" >Register New Case</button>
								</div>
							</div>
							<div class="col-lg-5"></div>
						</div>
					    </div>
                                        </form>
                                    </div>
                                </div>
                                <!-- /.row (nested) -->





				<?php if($success != ''){ ?>
			<style>
			.before_success{
				display: none;
			}
			.alert-dismissable{
				display: none;
			}
			</style>
			<div class="table-responsive" style="overflow-x: hidden;">
				<div class="alert alert-success">
					<?php if(isset($success)) { echo $success; }?>
				</div>
				<table class="table table-striped table-bordered table-hover">
					<tbody>
						<tr>
							<td><b>Case Application No.:</b> <?php echo $application_no; ?></td>
							<td><b>Date of Incident:</b> <?php echo $date_of_incident; ?></td>
							
						</tr>
						<tr>
							<td colspan='2'><b>Matter Related to:</b> <?php echo $matter; ?></td>
							
						</tr>
					</tbody>
				</table>
				<div class="row" style="margin-top:2%">
				<div class="row" style="margin-top:2%">
					<div class="col-lg-12">
						<div class="col-lg-3"></div>
							<div class="col-lg-2">
								<div class="form-group ">
								    
									<a href='system_running_disciplinary_cases.php'><button type="button" class="btn btn-default">Check Open Case(s)</button></a>
								</div>
							</div>
						<div class="col-lg-2"></div>
							<div class="col-lg-2">
								<div class="form-group ">
								    
									<a href='system_closed_disciplinary_cases.php'><button type="button" class="btn btn-default">Check Closed Case(s)</button></a>
								</div>
							</div>
						<div class="col-lg-3">
						</div>
					</div>
				</div>
				</div>
			</div>
			<?php } ?>


                            </div>
                            <!-- /.panel-body -->
                        </div>
                        <!-- /.panel -->
                    </div>
                    <!-- /.col-lg-12 -->
                </div>
                <!-- /.row -->
            </div>
            <!-- /#page-wrapper -->
