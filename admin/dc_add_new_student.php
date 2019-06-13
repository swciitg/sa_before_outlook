<?php
	include("session.php");
	error_reporting(E_ALL & ~(E_STRICT|E_NOTICE));
	ini_set("display_errors", 0);

	include("connect.php");
	
	
	
	$application_no = $_GET['track'];	
	

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

	
	
	
	//$currentdatetime = mysql_query('select now()');
	//$curdatetime = mysql_result($currentdatetime,0);
	//$date = new DateTime('now', new DateTimeZone('Asia/Kolkata'));
	//$curdatetime = $date->format('d-m-Y H:i:s');
	$time_d = date("d");
	$time_m = date("M");
	$time_y = date("Y");
	if (isset($_POST['Submit'])) {
		if($stud_name =='' OR $roll_no =='' OR $dept =='' OR $hostel ==''){
			$error  = "<font color='red'>Please Enter Student Complete Details.</font>";
		}
		else if($blank_row=='yes'){
			$error  = "<font color='red'>Please Enter Student Complete Details.</font>";
		}
		else{
		
			$success = "New disciplinary case with case no. <b>$application_no</b> is successfully registered.";
			mysql_query("INSERT INTO `disciplinary_students` VALUES ('','$application_no','$stud_name','$roll_no','$dept','$hostel','$curdatetime')");
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
                               Add New Student
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
                                            
						<?php echo "<div style='font-size:110%; color:#198822' class='form-group col-lg-12'>Add Involved Student Details(Application No.:$application_no)</div>"; ?>
					   
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
					<a id="add_row" class="btn btn-default pull-left">Add Row</a><a id='delete_row' class="pull-right btn btn-default">Delete</a>
					</div>
	


					    <div class="row" style="margin-top:2%">
						<div class="col-lg-12">
						   <div class="col-lg-5"></div>
							 
							<div class="col-lg-2">
								<div class="form-group ">
								  
									<button type="submit" class="btn btn-primary" name="Submit" >Add Student(s)</button>
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
						
					</tbody>
				</table>
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
