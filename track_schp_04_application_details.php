<?php 
	include("session.php");
	error_reporting(0);
?>
			<div id="page-wrapper">
                <!-- /.row -->
                <div class="row">
                    <div class="col-lg-12">
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                Certify/Forwarding Outside Scholarship Application No.: <b><?php $application_no = $_GET['track']; echo $application_no; ?></b>
                            </div>
							<div class="panel-body">
								<?php
									include("connect.php");
									$application_no = $_GET['track'];
									$query = "SELECT * FROM schp_04 WHERE application_no = '$application_no' AND webmail = '$login_session'";
									$result = mysql_query($query);
									$row_track = mysql_fetch_array($result);
									$id = $row_track['id'];
								if($row_track["application_no"] == $application_no){
								?>
								<div class="table-responsive">
                                      <table class="table table-striped table-bordered table-hover">
                                        <tbody>
                                            <tr>
                                                <td><b>Application No.:</b> <?php echo $row_track["application_no"]; ?></td>
                                                <td><b style="color:#d3b62a;">Current Status:</b> <?php if($row_track["status"] == "approved"){echo "<span style='color:green;'>Scholarship Application Approved.</span>";} else{echo $row_track["status"];} ?></td>
                                                
                                            </tr>
                                            <tr>
                                                <td><b>Applicant:</b> <?php echo $row_track["name"]; ?></td>
                                                <td><b>Category:</b> <?php echo $row_track["category"]; ?></td>
                                            </tr>
                                            <tr>
                                                <td><b>Applicant Programme:</b> <?php echo $row_track["programme"]; ?></td>
                                                <td><b>Applicant Roll No.:</b> <?php echo $row_track["roll_no"]; ?></td>
                                            </tr>
                                            <tr>
                                                <td><b>Applicant Hostel:</b> <?php echo $row_track["hostel"]; ?></td>
                                                <td><b>Applicant Room No.:</b> <?php echo $row_track["room_no"]; ?></td>
                                            </tr>
                                            <tr>
                                                <td><b>Students' Phone No.:</b> <?php echo $row_track["contact_no"]; ?></td>
                                                <td><b>Applicant Department:</b> <?php echo $row_track["department"] ; ?></td>
                                            </tr>
								</tbody>
                                    </table>
                                </div>


           <div class="table-responsive">
							<?php if($row_track['query_saoff']!='' OR $row_track['query_hossa']!='' OR $row_track['query_dean']!=''){ echo "<div style='font-size:150%; color:#198822'>Query Answer</div>"; ?>


                                    <table class="table table-striped table-bordered table-hover">
                                        <tbody> 
					   <?php if(($row_track['query_saoff']!='' AND $row_track['query_ans_saoff']=='')OR ($row_track['query_hossa']!='' AND $row_track['query_ans_hossa']=='') OR ($row_track['query_dean']!='' AND $row_track['query_ans_dean']=='')){ ?>
					    <tr> 
						<td colspan='2'><b>Answer to Query Raised : </b><a href='system_schp_04_answer_query.php?track=<?php echo $application_no; ?>'>Link to Answer</a></td>
                                              </tr>
					<?php }
						if($row_track['query_saoff']!='' AND $row_track['query_ans_saoff']!=''){ ?>
					    <tr> 
						<td><b>Query Answer:</b> <?php echo $row_track["query_ans_saoff"]; ?></td>
                                                <td><b>Supporting Documents:</b> <?php if( end(explode(".",$row_track['query_doc_saoff']))!='' ){?><a href="../schp_04/query_files/<?php echo $row_track["query_doc_saoff"]; ?>" target="_blank"> Download</a><?php } else{ echo "NA";}?></td>
                                            </tr>
					<?php } 
						if($row_track['query_hossa']!='' AND $row_track['query_ans_hossa']!=''){ ?>
					    <tr> 
						<td><b>Query Answer:</b> <?php echo $row_track["query_ans_hossa"]; ?></td>
                                                <td><b>Supporting Documents:</b> <?php if( end(explode(".",$row_track['query_doc_hossa']))!='' ){?><a href="../schp_04/query_files/<?php echo $row_track["query_doc_hossa"]; ?>" target="_blank"> Download</a><?php } else{ echo "NA";}?></td>
                                            </tr>
					<?php }
						if($row_track['query_dean']!='' AND $row_track['query_ans_dean']!=''){ ?>
					    <tr> 
						<td><b>Query Answer:</b> <?php echo $row_track["query_ans_dean"]; ?></td>
                                                <td><b>Supporting Documents:</b> <?php if( end(explode(".",$row_track['query_doc_dean']))!='' ){?><a href="../schp_04/query_files/<?php echo $row_track["query_doc_dean"]; ?>" target="_blank"> Download</a><?php } else{ echo "NA";}?></td>
                                            </tr>
					<?php }?>
											
											
                                        </tbody>
                                    </table><?php }?>
                                </div>
								
 							<?php echo "<div style='font-size:150%; color:#198822'>Details of Parents</div>"; ?>


           <div class="table-responsive">
                                    <table class="table table-striped table-bordered table-hover">
                                        <tbody> 
											<tr>
												<td><b>Father's Name:</b> <?php echo $row_track["father_name"]; ?></td>
                                                <td><b>Father's Occupation:</b> <?php echo $row_track["father_occup"]; ?></td>
                                            </tr>
											<tr>
												<td><b>Mother's Name:</b> <?php echo $row_track["mother_name"]; ?></td>
                                                <td><b>Mother's Occupation:</b> <?php echo $row_track["mother_occup"]; ?></td>
                                            </tr>
											<tr>
												<td><b>Parents Annual Income:</b> <?php echo $row_track["annual_income"]; ?></td>
                                                <td><b>Income slab:</b> <?php echo $row_track["income_slab"]; ?></td>
                                            </tr>
											<tr>
												<td><b>Permanent Address:</b> <?php echo $row_track["permanent_address"]; ?></td>
                                                <td><b></b> </td>
                                            </tr>
											<tr>
												<td><b>Father's Employer Address:</b> <?php if($row_track["father_address"] != ''){ echo $row_track["father_address"]; } else{ echo "NA"; }?></td>
                                                <td><b>Mother's Employer Address:</b> <?php if($row_track["mother_address"] != ''){ echo $row_track["mother_address"]; } else{ echo "NA"; } ?></td>
                                            </tr> 
											
                                        </tbody>
                                    </table>
                                </div>
						<!--	<?php echo "<div style='font-size:150%; color:#198822'>Details of Scholarship</div>"; ?>

								<div class="table-responsive">
                                   <table class="table table-striped table-bordered table-hover">
                                        <tbody>
                                            <tr>
                                                <td><b>Application No.:</b> <?php echo $row_track["application_no"]; ?></td>
                                                <td><b style="color:#d3b62a;">Current Status:</b> <?php if($row_track["status"] == "approved"){echo "<span style='color:green;'>Scholarship Application Approved ()</span>";} else{echo $row_track["status"];} ?></td>
                                                
                                            </tr>
                                            <tr>
                                                <td><b>Applicant:</b> <?php echo $row_track["name"]; ?></td>
                                                <td><b>Category:</b> <?php echo $row_track["category"]; ?></td>
                                            </tr>
                                            <tr>
                                                <td><b>Applicant Programme:</b> <?php echo $row_track["programme"]; ?></td>
                                                <td><b>Applicant Roll No.:</b> <?php echo $row_track["roll_no"]; ?></td>
                                            </tr>
                                            <tr>
                                                <td><b>Applicant Hostel:</b> <?php echo $row_track["hostel"]; ?></td>
                                                <td><b>Applicant Room No.:</b> <?php echo $row_track["room_no"]; ?></td>
                                            </tr>
                                            <tr>
                                                <td><b>Students' Phone No.:</b> <?php echo $row_track["contact_no"]; ?></td>
                                                <td><b>Applicant Department:</b> <?php echo $row_track["department"] ; ?></td>
                                            </tr>
								</tbody>
                                    </table>
                                </div> -->

							<?php echo "<div style='font-size:150%; color:#198822'>Details of Scholarship</div>"; ?>

								<div class="table-responsive">
                                    <table class="table table-striped table-bordered table-hover">
                                        <tbody>
                                            <tr>
                                                <td><b>Name of Scholarship:</b> <?php echo $row_track["scholarship_name"]; ?></td>
                                                <td><b>Session:</b> <?php echo $row_track["session_applying"]; ?></td>

                                            </tr>
                                            <tr>
                                                <td><b>Sponsored Organization:</b> <?php echo $row_track["sponsored_org"]; ?></td>
                                                <td><b>Amount of Scholarship:</b> <?php echo $row_track["scholarship_amount"]; ?></td>
                                            </tr>
                                            <tr>
                                                <td><b>Last Date for Submission to sponsorer :</b> <?php echo $row_track["last_date"]; ?></td>
                                                <td><b>Scholarship Status:</b> <?php echo $row_track["schp_status"]; ?></td>
                                            </tr>
                                            <tr>
                                                <td><b>Year (If applicant got the Scholarship Before):</b> <?php if($row_track["schp_status"] == 'yes'){ echo $row_track["year"]; } else{ echo "NA"; } ?></td>
                                                <td><b>Amount (If applicant got the Scholarship Before):</b> <?php if($row_track["schp_status"] == 'yes'){ echo $row_track["amount"]; } else{ echo "NA"; } ?></td>
                                            </tr>
											<tr>
												<td><b>whether the Scholarship will be received directly from sponsoring authority / through IITG?:</b> <?php echo $row_track["sponsoring_authority"]; ?></td>
                                                <td><b>Latest CPI/% in qualifying marks:</b> <?php echo $row_track["cpi"]; ?></td>
                                            </tr>
											<tr>
                                                <td><b>Grade Card:</b> <a href="../schp_04/grade_card/<?php echo $row_track["gradecard"]; ?>" target="_blank"> Download</a></td>
                                                <td><b>Supporting Documents:</b> <?php if( end(explode(".",$row_track['documents']))!='' ){?><a href="../schp_04/files/<?php echo $row_track["documents"]; ?>" target="_blank"> Download</a><?php } else{ echo "NA";}?></td>
                                            </tr>
									</tbody>
                                    </table>
                                </div>	
								<?php echo "<div style='font-size:150%; color:#198822'>Details of Other Scholarship</div>"; ?>
							
                             <div class="table-responsive">
                                    <table class="table table-striped table-bordered table-hover">
                                        <tbody>								
                                            <tr>
                                                <td><b>Recipient of any other scholarship(s):</b> <?php echo $row_track["other_scholarship"]; ?></td>
												<?php if($row_track["other_scholarship"] == 'yes') { ?>
                                                <td><b>Name of That Scholarship(If applicant got the Scholarship Before):</b> <?php echo $row_track["details_other_scholarship"] ; ?></td>
                                            </tr>
											<tr>
												<td><b>Session(If applicant got the Scholarship Before):</b> <?php echo $row_track["session_other_scholarship"]; ?></td>
                                                <td><b>Amount(If applicant got the Scholarship Before):</b> <?php echo $row_track["amount_other_scholarship"]; ?></td>
                                            </tr>
												<?php } else { ?>
												<td><b>Undertaking of Not Recieving any other Scholarship:</b> <?php if( end(explode(".",$row_track['undertaking']))!='' ){?><a href="../schp_04/undertaking/<?php echo $row_track["undertaking"]; ?>" target="_blank"> Download</a><?php } else{ echo "NA";}?></td>
                                            </tr>
												<?php } ?>
                                        </tbody>
                                    </table>
                                </div>
								<div class="dataTable_wrapper">
                                    <table class="table table-striped table-bordered table-hover" id="">
										<thead>
											<tr> 
											  <th valign="top" bgcolor="#dedede"> <font>Date and Time</font></th>
											  <th valign="top" bgcolor="#dedede"> <font>File Location</font></th>
											  <th valign="top" bgcolor="#dedede"> <font>Responsible Person</font></th>
											  <th valign="top" bgcolor="#dedede"> <font>Comment</font></th>
											</tr>
										</thead>
										<tbody>
										<?php
											$query3 = "SELECT * FROM schp_04_movement WHERE filesNo = '$application_no'";
											$result3 = mysql_query($query3);
												while($m_row = mysql_fetch_array($result3)){
												
														$m_location = $m_row[2];
														$m_responsible = $m_row[3];
														$m_comment = $m_row[4];
														$m_datetime = $m_row[5];
														echo "<tr class='odd'>";
														
														echo "<td><font size='2' color = 'red'><b>$m_datetime</b>";	
														echo "<td><font size='2'>$m_location";		
														echo "<td><font size='2'>$m_responsible";	
														echo "<td><font size='2'>$m_comment";		
														echo "</tr>";
														}
											?>
										</tbody>
                                    </table>
                                </div>
                                <!-- /.table-responsive -->
								<?php
								}
								else{
									echo "<div class='alert alert-warning'>Requested application no. doesn't exist!</div>";
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
 
