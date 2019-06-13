<?php
	include("session.php");
	error_reporting(E_ALL & ~(E_STRICT|E_NOTICE));
	ini_set("display_errors", 0);

	include("connect.php");
	$roll=$_GET['roll'];
	
	


	
	
	

	

	
?>





			<div id="page-wrapper">
                <!-- /.row -->
                <div class="row">
                    <div class="col-lg-12">
                        <div class="panel panel-default">
                            <div class="panel-heading" style='font-size:150%; color:#198822' class='form-group col-lg-12'>
                               Student Deleted
                            </div>
                            <div class="panel-body">
							
                                <div class="row">
                                    <div class="col-lg-12">
                                        <form name="meeting" class="before_success" accept-charset="utf-8" method="post"  action="" enctype="multipart/form-data">
                                            	<?php echo "<div style='font-size:110%; color:#198822' class='form-group col-lg-12'>Details Successfully Deleted</div>"; ?>
					   

						<div class="col-md-12 column">
							<table class="table table-bordered table-hover" id="tab_logic">
								
								<tbody>
								<tr><td><?php echo "Student With Roll No.".$roll." has been successfully deleted.";?></td></tr>
						    	</tbody>		
							</table>
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
                <!-- /.row -->
            </div>
            <!-- /#page-wrapper -->
