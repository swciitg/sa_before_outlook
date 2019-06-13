<?php 
	include("session.php");
	error_reporting(0);
	include("connect.php");
	$id = $_GET['track'];
?>

<div id="page-wrapper">
<!-- /.row -->
<div class="row">
    <div class="col-lg-12">
	<div class="panel panel-default">
	    <div class="panel-heading">
	        Railway Concession Application No.: <b><?php echo $id; ?></b>
	    </div>
		<div class="panel-body">
			<?php
				
				$id = $_GET['track'];
				$query = "SELECT * FROM railway_concession_1 WHERE application_no = '$id'";
				$result = mysql_query($query);
				$row_track = mysql_fetch_array($result);
				$id_2 = $row_track["id"];
				$query2 = "SELECT * FROM railway_concession_2 WHERE id=$id_2";
				$result2 = mysql_query($query2);
				$status = $row_track["approval_result"];
			if($row_track["application_no"] == $id){
			?>
			<div class="table-responsive">
                            <table class="table table-striped table-bordered table-hover">
                                <tbody>
                                    <tr>
                                        <td><b>Application No.:</b> <?php echo $row_track["application_no"]; ?></td>
                                        <?php if ($row_track["approval_result"] == "" AND $row_track["eligible"] != "yes" AND $row_track["edit"] != "yes") { ?>
                                                <td><b style="color:#d3b62a;">Current Status:</b> <?php echo "<span style='color: blue;'>  Application Pending  </span>"; ?> </td>
												
												<?php } else if($row_track["approval_result"] != "") {  ?>
												
                                                <td><b style="color:#d3b62a;">Current Status:</b> <?php if($row_track["approval_result"] == "approved"){echo "<span style='color:green;'>Application Approved.</span>";} else{echo "<span style='color:red;'> $status </span>";} ?></td>
												<?php } else if($row_track["approval_result"] == "" AND $row_track["eligible"] == "yes") { ?>
                                                <td><b style="color:#d3b62a;">Current Status:</b> <?php echo "<span style='color: brown;'>  Eligible  </span>"; ?> </td>
												<?php } else if($row_track["edit"] == "yes") { ?>
                                                <td><b style="color:#d3b62a;">Current Status:</b> <?php echo "<span style='color: yellow;'>  Edit Required  </span>"; ?> </td>
												<?php } ?>
				    </tr>
                                    <tr>
                                        <td><b>From Station:</b> <?php echo $row_track["departure_station"]; ?></td>
                                        <td><b>To Station:</b> <?php echo $row_track["arrival_station"] ; ?></td>
                                    </tr>
                                    <tr>
                                        <td><b>Journey Type:</b> <?php echo $row_track["journey_type"]; ?></td>
                                        <td><b>Applying Date & Time:</b> <?php echo $row_track["date_of_filling"] ; ?></td>
                                    </tr>
                                    <tr>
                                        <td><b>Onward Journey Date:</b> <?php echo $row_track["journey_date"]; ?></td>
                                        <td><b>Return Journey Date:</b> <?php if($row_track["return_date"]==''){echo 'NA';} else {echo $row_track["return_date"] ;} ?></td>
                                    </tr>
				    <tr>
                                        <td><?php if($row_track['edit']=='yes'){?><b>Edit Link:</b> <a href="system_edit_railway_concession_application.php?track='<?php echo $row_track['application_no']?>'" >Edit</a><?php }?></td>
                                    	<td><b>Ticket:</b><a href="railway/ticket/<?php echo $row_track["ticket"]; ?>" target="_blank">Download</a></td>
				    </tr>
				</tbody>
                            </table>
                        </div>
			
				

			<div class="panel-heading">
	       			 Detail of Travellers:	
	    		</div>
			<div class="panel-body">
			  <?php ?>
				<div class="table-responsive">
	                            <table class="table table-striped table-bordered table-hover">
	                                <thead>
						<tr>
							<th valign="top" bgcolor="#dedede">Name</th>
							<th valign="top" bgcolor="#dedede">Webmail</th>
							<th valign="top" bgcolor="#dedede">Hostel/Room No.</th>
							<th valign="top" bgcolor="#dedede">Roll No.</th>
							<th valign="top" bgcolor="#dedede">Gender</th>
							<th valign="top" bgcolor="#dedede">Age</th>
							<th valign="top" bgcolor="#dedede">Student ID</th>
							<th valign="top" bgcolor="#dedede">Leave Application</th>
							<th valign="top" bgcolor="#dedede">Caste Certificate</th>
						</tr>
					</thead>
					<tbody>
						<tr class="odd gradeX" <?php if($row_track["approval_result"] == "approved"){echo "style='color:green'";}?>>
							<td><?php echo $row_track['stud_name']; ?></td>
							<td><?php echo $row_track['webmail']; ?></td>
							<td><?php echo $row_track['hostel'].'/'.$row_track['room_no']; ?></td>
							<td><?php echo $row_track['roll_no']; ?></td>
							<td><?php echo $row_track['gender']; ?></td>
							<td><?php echo $row_track['age']; ?></td>
							<td><a href="railway/ids/<?php echo $row_track["id_card"]; ?>" target="_blank">Download</a></td>
							<td><?php if($row_track['course']=='mtech'){?><a href="railway/dept/<?php echo $row_track["leave_application"]; ?>" target="_blank">Download</a><?php }else{?>NA<?php } ?></td>
							<td><?php if($row_track['course']=='cat'){?><a href="railway/caste/<?php echo $row_track["caste_certi"]; ?>" target="_blank">Download</a><?php }else{?>NA<?php } ?></td>
						</tr>
							<?php 
								while($row_track_2 = mysql_fetch_array($result2)){
								?>
									
						<tr class="odd gradeX" <?php if($row_track["approval_result"] == "approved"){echo "style='color:green'";}?>>
									<td><?php echo $row_track_2['stud_name']; ?></td>
									<td><?php echo $row_track_2['webmail']; ?></td>
									<td><?php echo $row_track_2['hostel'].'/'.$row_track_2['room_no']; ?></td>
									<td><?php echo $row_track_2['roll_no']; ?></td>
									<td><?php echo $row_track_2['gender']; ?></td>
									<td><?php echo $row_track_2['age']; ?></td>
									<td><a href="railway/ids/<?php echo $row_track_2["id_card"]; ?>" target="_blank">Download</a></td>
									<td><?php if($row_track_2['course']=='mtech'){?><a href="railway/dept/<?php echo $row_track_2["leave_application"]; ?>" target="_blank">Download</a><?php }else{?>NA<?php } ?></td>
									<td><?php if($row_track_2['caste']=='cat'){?><a href="railway/caste/<?php echo $row_track_2["caste_certi"]; ?>" target="_blank">Download</a><?php }else{?>NA<?php } ?></td>
							
						</tr>
							<?php
							 	}
							?>
					</tbody>
	                            </table>
	                        </div>
			</div>



			<div class="dataTable_wrapper">
			    <table class="table table-striped table-bordered table-hover" id="">
				<thead>
					<tr>
					  <th valign="top" bgcolor="#dedede"> <font>Comment</font></th>
					  <th valign="top" bgcolor="#dedede"> <font>Reference No.</font></th>
					</tr>
				</thead>
				<tbody>
				<?php
					
								$m_comment = $row_track['sa_office_comment'];
								$m_ref_no = $row_track['ref_no'];
								echo "<tr class='odd'>";
								echo "<td><font size='2'>$m_comment";		
								echo "<td><font size='2' color = 'red'><b>$m_ref_no</b>";		
								echo "</tr>";
								
					?>
				</tbody>
			    </table>
			</div>
			

			<?php } ?>


		</div>
            <!-- /.panel-body -->
        </div>
        <!-- /.panel -->
    </div>
    <!-- /.col-lg-12 -->
</div>
</div>
<!-- /#page-wrapper -->
