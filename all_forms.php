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
                                All Forms
                            </div>
                            <!-- /.panel-heading -->
                            <div class="panel-body">
                                <div class="dataTable_wrapper">
                                    <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                                        <thead>
                                            <tr>
                                                <th>Form No.</th>
                                                <th>Subject</th>
												<th>PDF</th>
												<th>DOC</th>
                                                <th>Updated On</th>
                                            </tr>
                                        </thead>
                                        <tbody>
										<?php 
											include("connect.php");
											$query2 = "SELECT * FROM forms";
											$result2 = mysql_query($query2);
											
											while ($row = mysql_fetch_array($result2)) {
												$subject = $row[2];
												$form_no   = $row[3];
												$doc = $row['doc'];
												$pdf = $row['pdf'];
												$link = $row['link'];
												$time = $row['time'];
											?>
                                            <tr class="odd gradeX">
												<td><?php echo "$form_no";?></td>
                                                <td><?php echo "$subject";?></td>
												<?php
												if($link !=''){
													echo "<td style='text-align:center;'><font size='2'><a href='$link' target='_blank'>Link</a></td>";
													echo "<td style='text-align:center;'><font size='2'></td>";
												}
												else{
													echo "<td style='text-align:center;'><font size='2'><a href='admin/uploads/$pdf' target='_blank'>PDF</a></td>";
													echo "<td style='text-align:center;'><font size='2'><a href='admin/uploads/$doc' target='_blank'>Doc</a></td>";
												}
												?>
												<td><?php echo $time;?></td>
                                            </tr>
											<?php
											}
											?>
                                        </tbody>
                                    </table>
                                </div>
                                <!-- /.table-responsive -->
                            </div>
                            <!-- /.panel-body -->
                        </div>
                        <!-- /.panel -->
                    </div>
                    <!-- /.col-lg-12 -->
                </div>
            </div>
            <!-- /#page-wrapper -->