<?php 
	include("session.php");
	include("connect.php");
	error_reporting(0);
	
	if($login_session == 'hossa'){
		$query2 = "SELECT * FROM schp_04 WHERE reach_hossa = 'yes' AND reach_dean != 'yes' AND query_hossa != '' AND reject_hossa != 'yes' ORDER BY booking_time DESC ";
	}
	else if($login_session == 'adosa_1'){
		$query2 = "SELECT * FROM schp_04 WHERE reach_dean = 'yes' AND dean = 'adosa_1' AND query_adosa_1 != '' AND approve_dean = '' OR reject_dean = '' ORDER BY booking_time DESC ";
	}
	else if($login_session == 'adosa_2'){
		$query2 = "SELECT * FROM schp_04 WHERE reach_dean = 'yes' AND dean = 'adosa_2' AND query_adosa_2 != '' AND  approve_dean = '' OR reject_dean = '' ORDER BY booking_time DESC ";
	}
	else if($login_session == 'dos'){
		$query2 = "SELECT * FROM schp_04 WHERE reach_dean = 'yes' AND dean =  'dosa' AND query_dosa != ''  AND approve_dean = '' OR reject_dean = '' ORDER BY booking_time DESC ";
	}
	else{
		$query2 = "SELECT * FROM schp_04 WHERE reach_saoff='yes' AND reach_hossa!='yes' AND reach_dean!='yes' AND query_saoff != '' AND reject_saoff != 'yes' ORDER BY booking_time DESC ";
	}
	$result2 = mysql_query($query2);	
	$isindb    = mysql_num_rows($result2);
?>
			<div id="page-wrapper">
                <!-- /.row -->
                <div class="row">
                    <div class="col-lg-12">
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                Scholarship Applications
                            </div>
                            <!-- /.panel-heading -->
                            <div class="panel-body">
				<?php if($isindb !=0 ){ ?>
                                <div class="dataTable_wrapper">
                                    <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                                        <thead>
                                            <tr>
                                                <th>Application No.</th>
                                                <th>Applicant</th>
												<th>Name of Scholarship</th>
												<th>Session</th>
												<th>Amount</th>												
												<th>Status</th>
                                                <th>Details</th>
                                            </tr>
                                        </thead>
                                        <tbody>
						<?php 

							$result2 = mysql_query($query2);
							
							while ($row = mysql_fetch_array($result2)) {
									$id = $row[0];
								    $app_no = $row[1];

	     				?>
                               <tr class="odd gradeX" <?php if($row["status"] == "approved"){echo "style='color:green'";}?>>
									<td><?php echo "$row[application_no]";?></td>
									<td><?php echo "$row[name]";?></td>
                                    <td><?php echo "$row[scholarship_name]";?></td>
                                    <td><?php echo "$row[session_applying]";?></td>
									<td><?php echo "$row[scholarship_amount]";?></td>
									
									<?php if($login_session == "hossa") { 
											 if($row["query_ans_hossa"] != '' OR $row["query_doc_hossa"] != '') { ?>
											 <td><?php echo "<font color = 'green'> $row[status]";?></td> 
											<?php } else { ?>
											<td><?php echo "<font color = 'red'> $row[status]";?></td> 
									<?php } }
											 
									 else if($login_session == "adosa_1") { ?>
											<?php if($row["query_ans_adosa_1"] != '' OR $row["query_doc_adosa_1"] != '') { ?>
											 <td><?php echo" <font color = 'green'> $row[status]";?></td> 
											<?php } else { ?>
											<td><?php echo "<font color = 'red'> $row[status]";?></td> 
									<?php } }
									
									 else if($login_session == "adosa_2") { ?>
											<?php if($row["query_ans_adosa_2"] != '' OR $row["query_doc_adosa_2"] != '') { ?>
											 <td><?php echo" <font color = 'green'> $row[status]";?></td> 
											<?php } else { ?>
											<td><?php echo "<font color = 'red'> $row[status]";?></td> 
									<?php } } 
									  else if($login_session == "dos") { ?>
											<?php if($row["query_ans_dosa"] != '' OR $row["query_doc_dosa"] != '') { ?>
											 <td><?php echo "<font color = 'green'> $row[status]";?></td> 
											<?php } else { ?>
											<td><?php echo "<font color = 'red'> $row[status]";?></td> 
									<?php } } 
									     else  { ?>
											<?php if($row["query_ans_saoff"] != '' OR $row["query_doc_saoff"] != '') { ?>
											 <td><?php echo "<font color = 'green'> $row[status]";?></td> 
											<?php } else { ?>
											<td><?php echo "<font color = 'red'>$row[status]";?></td> 
									<?php } }?>		 
									
												
									<td class="center"><a href='system_track_schp_04_application_details.php?track=<?php echo $app_no; ?>' style='color:#337ab7'>Details</a></td>
                               </tr>
											<?php
											}
											?>
                                        </tbody>
                                    </table>
                                </div>
                                <!-- /.table-responsive -->
				<?php }else{
					echo "No Queried application.";
				}
				?>
                            </div>
                            <!-- /.panel-body -->
                        </div>
                        <!-- /.panel -->
                    </div>
                    <!-- /.col-lg-12 -->
                </div>
            </div>
            <!-- /#page-wrapper -->
