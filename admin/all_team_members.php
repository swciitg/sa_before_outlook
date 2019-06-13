<?php 
    include("connect.php");
	include("session.php"); 
	error_reporting(0);
?>
<div id="page-wrapper">
<section id="content" class="page-dynamic_template-meettheteam sequentialchildren  ">
   <div class="row-fluid">
      <div class="span12">
         <div class="row-fluid row-dynamic-el " style="">
            <div class=""><!-- container class   -->
               <div class="row-fluid tabbable">
                   <ul class="nav nav-tabs">
                      <li class="active"><a href="#tab1" data-toggle="tab">Students' Affairs Office</a></li>
                      <li class=""><a href="#tab2" data-toggle="tab">Gymkhana Office</a></li>
                      <li class=""><a href="#tab3" data-toggle="tab">Counselling Cell</a></li>
                      <li class=""><a href="#tab4" data-toggle="tab">Visiting Artists-in-Residence</a></li>
                      <li class=""><a href="#tab5" data-toggle="tab">New SAC Building</a></li>
                      <li class=""><a href="#tab6" data-toggle="tab">Hostels</a></li>
                   </ul>
                                   
                 <div class="tab-content">

		     <!-- Student affairs office -->
                     <div class="tab-pane active " id="tab1">
			                <!-- /.row -->
                <div class="row">
                    <div class="col-lg-12">
                        <div class="panel panel-default">
                            <!-- /.panel-heading -->
                            <div class="panel-body">
                                <div class="dataTable_wrapper">
                                    <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                                        <thead>
                                            <tr>
                                                <th>S.No( Position)</th>
                                                <th>Name</th>
						                        <th>Webmail</th>
						                        <th>Phone</th>
						                        <th>Image</th>
						                        <th>Post</th>	
                                                <th colspan="2">Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
					 <?php 
						
						$query = "SELECT * FROM user_contact_sa ORDER BY position";
						$result = mysql_query($query);			
						while ($row = mysql_fetch_array($result)) {
						$webmail= $row[0];
						$name = $row[1];
						$phone = $row[2];
						$image = $row[3];
						$post = $row[4];
						$usertype = $row[5];
						$position = $row[6];
					  ?>
                      <tr class="odd gradeX">
                      <td><?php echo "$position";?></td>
					  <td><?php echo "$name";?></td>
					  <td><?php echo "$webmail";?></td>
					  <td><?php echo "$phone";?></td>
					  <td><?php echo "$image";?></td>
					  <td><?php echo "$post";?></td>
					  <td class="center"><a href='system_edit_team_members.php?edit=<?php echo "$webmail";?>&section=sa' style='color:green'>Edit</a></td>

					  <td class="center"><a href='system_all_team_members.php?delete=<?php echo "$webmail";?>&section=sa' style='color:red'>Delete</a></td>
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
						<div class="form-group" style="margin-left:1%;">
							<a href="system_add_new_team_members.php?section=sa" class="btn btn-primary">Add New Member</a>
						</div>
                        </div>
                        <!-- /.panel -->
                    </div>
                    <!-- /.col-lg-12 -->
                </div>

		 </div>
		


		<!-- Gymkhana Office -->
		<div class="tab-pane" id="tab2">
		    	                <!-- /.row -->
                <div class="row">
                    <div class="col-lg-12">
                        <div class="panel panel-default">
                            <!-- /.panel-heading -->
                            <div class="panel-body">
                                <div class="dataTable_wrapper">
                                    <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                                        <thead>
                                            <tr>
                                                <th>S.No( Position)</th>
                                                <th>Name</th>
						                        <th>Webmail</th>
						                        <th>Phone</th>
						                        <th>Image</th>
						                        <th>Post</th>	
                                                <th colspan="2">Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
					 <?php 
						$query = "SELECT * FROM user_contact_gymkhana_office ORDER BY position";
						$result = mysql_query($query);			
						while ($row = mysql_fetch_array($result)) {
						$webmail= $row[0];
						$name = $row[1];
						$phone = $row[2];
						$image = $row[3];
						$post = $row[4];
						$usertype = $row[5];
						$position = $row[6];
					  ?>
                                          <tr class="odd gradeX">
                      <td><?php echo "$position";?></td>
					  <td><?php echo "$name";?></td>
					  <td><?php echo "$webmail";?></td>
					  <td><?php echo "$phone";?></td>
					  <td><?php echo "$image";?></td>
					  <td><?php echo "$post";?></td>
					  <td class="center"><a href='system_edit_team_members.php?edit=<?php echo "$webmail";?>&section=gymkhana_office' style='color:green'>Edit</a></td>
					  <td class="center"><a href='system_all_team_members.php?delete=<?php echo "$webmail";?>&section=gymkhana_office' style='color:red'>Delete</a></td>
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
							<div class="form-group" style="margin-left:1%;">
								<a href="system_add_new_team_members.php?section=gymkhana_office" class="btn btn-primary">Add New Member</a>
							</div>
                        </div>
                        <!-- /.panel -->
                    </div>
                    <!-- /.col-lg-12 -->
                </div>
		   <!-- /.row -->		    
		</div>

		


		<!-- Counselling Cell  -->
		<div class="tab-pane" id="tab3">
		    	                <!-- /.row -->
                <div class="row">
                    <div class="col-lg-12">
                        <div class="panel panel-default">
                            <!-- /.panel-heading -->
                            <div class="panel-body">
                                <div class="dataTable_wrapper">
                                    <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                                        <thead>
                                            <tr>
                                                <th>S.No( Position)</th>
                                                <th>Name</th>
						                        <th>Webmail</th>
						                        <th>Phone</th>
						                        <th>Image</th>
						                        <th>Post</th>	
                                                <th colspan="2">Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
					 <?php 
						
						$query = "SELECT * FROM user_contact_counselling_cell ORDER BY position";
						$result = mysql_query($query);			
						while ($row = mysql_fetch_array($result)) {
						$webmail= $row[0];
						$name = $row[1];
						$phone = $row[2];
						$image = $row[3];
						$post = $row[4];
						$usertype = $row[5];
						$position = $row[6];
					  ?>
                                          <tr class="odd gradeX">
                      <td><?php echo "$position";?></td>
					  <td><?php echo "$name";?></td>
					  <td><?php echo "$webmail";?></td>
					  <td><?php echo "$phone";?></td>
					  <td><?php echo "$image";?></td>
					  <td><?php echo "$post";?></td>
					  <td class="center"><a href='system_edit_team_members.php?edit=<?php echo "$webmail";?>&section=counselling_cell' style='color:green'>Edit</a></td>
					  <td class="center"><a href='system_all_team_members.php?delete=<?php echo "$webmail";?>&section=counselling_cell' style='color:red'>Delete</a></td>
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
							<div class="form-group" style="margin-left:1%;">
								<a href="system_add_new_team_members.php?section=counselling_cell" class="btn btn-primary">Add New Member</a>
							</div>
                        </div>
                        <!-- /.panel -->
                    </div>
                    <!-- /.col-lg-12 -->
                </div>
		   <!-- /.row -->		    
		</div>



		<!-- Visiting Artist-in-Residence  --> 
		<div class="tab-pane" id="tab4">
		    	                <!-- /.row -->
                <div class="row">
                    <div class="col-lg-12">
                        <div class="panel panel-default">
                            <!-- /.panel-heading -->
                            <div class="panel-body">
                                <div class="dataTable_wrapper">
                                    <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                                        <thead>
                                            <tr>
                                                <th>S.No( Position)</th>
                                                <th>Name</th>
						                        <th>Webmail</th>
						                        <th>Phone</th>
						                        <th>Image</th>
						                        <th>Post</th>	
                                                <th colspan="2">Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
					 <?php 

						$query = "SELECT * FROM user_contact_visiting_artist ORDER BY position";
						$result = mysql_query($query);			
						while ($row = mysql_fetch_array($result)) {
						$webmail= $row[0];
						$name = $row[1];
						$phone = $row[2];
						$image = $row[3];
						$post = $row[4];
						$usertype = $row[5];
						$position = $row[6];
					  ?>
                                          <tr class="odd gradeX">
                      <td><?php echo "$position";?></td>
                      <td><?php echo "$position";?></td>
					  <td><?php echo "$name";?></td>
					  <td><?php echo "$webmail";?></td>
					  <td><?php echo "$phone";?></td>
					  <td><?php echo "$image";?></td>
					  <td><?php echo "$post";?></td>
					  <td class="center"><a href='system_edit_team_members.php?edit=<?php echo "$webmail";?>&section=visiting_artist' style='color:green'>Edit</a></td>
					  <td class="center"><a href='system_all_team_members.php?delete=<?php echo "$webmail";?>&section=visiting_artist' style='color:red'>Delete</a></td>
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
							<div class="form-group" style="margin-left:1%;">
								<a href="system_add_new_team_members.php?section=visiting_artist" class="btn btn-primary">Add New Member</a>
							</div>
                        </div>
                        <!-- /.panel -->
                    </div>
                    <!-- /.col-lg-12 -->
                </div>
		   <!-- /.row -->		    
		</div>



		<!-- New Sac Building  -->
		<div class="tab-pane" id="tab5">
		    	                <!-- /.row -->
                <div class="row">
                    <div class="col-lg-12">
                        <div class="panel panel-default">
                            <!-- /.panel-heading -->
                            <div class="panel-body">
                                <div class="dataTable_wrapper">
                                    <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                                        <thead>
                                            <tr>
                                                <th>S.No( Position)</th>
                                                <th>Name</th>
						                        <th>Webmail</th>
						                        <th>Phone</th>
						                        <th>Image</th>
						                        <th>Post</th>	
                                                <th colspan="2">Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
					 <?php 
						
						$query = "SELECT * FROM user_contact_new_sac ORDER BY position";
						$result = mysql_query($query);			
						while ($row = mysql_fetch_array($result)) {
						$webmail= $row[0];
						$name = $row[1];
						$phone = $row[2];
						$image = $row[3];
						$post = $row[4];
						$usertype = $row[5];
						$position = $row[6];
					  ?>
                                          <tr class="odd gradeX">
                      <td><?php echo "$position";?></td>
					  <td><?php echo "$name";?></td>
					  <td><?php echo "$webmail";?></td>
					  <td><?php echo "$phone";?></td>
					  <td><?php echo "$image";?></td>
					  <td><?php echo "$post";?></td>
					  <td class="center"><a href='system_edit_team_members.php?edit=<?php echo "$webmail";?>&section=new_sac' style='color:green'>Edit</a></td>
					  <td class="center"><a href='system_all_team_members.php?delete=<?php echo "$webmail";?>&section=new_sac' style='color:red'>Delete</a></td>
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
							<div class="form-group" style="margin-left:1%;">
								<a href="system_add_new_team_members.php?section=new_sac" class="btn btn-primary">Add New Member</a>
							</div>
                        </div>
                        <!-- /.panel -->
                    </div>
                    <!-- /.col-lg-12 -->
                </div>
		   <!-- /.row -->		    
		</div>



		<!-- Hostels  Caretakers  -->
		<div class="tab-pane" id="tab6">
		    	                <!-- /.row -->
                <div class="row">
                    <div class="col-lg-12">
                        <div class="panel panel-default">
                            <!-- /.panel-heading -->
                            <div class="panel-body">
                                <div class="dataTable_wrapper">
                                    <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                                        <thead>
                                            <tr>
                                                <th>S.No( Position)</th>
                                                <th>Name</th>
						                        <th>Webmail</th>
						                        <th>Phone</th>
						                        <th>Image</th>
                                                <th>Hostel</th>
						                        <th>Post</th>	
            
                                                <th colspan="2">Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
					 <?php 
						
						$query = "SELECT * FROM user_contact_hostels ORDER BY position";
						$result = mysql_query($query);			
						while ($row = mysql_fetch_array($result)) {
						$webmail= $row[0];
						$name = $row[1];
						$phone = $row[2];
						$image = $row[3];
						$post = $row[4];
						$usertype = $row[5];
						$position = $row[7];
                        $hostel = $row[6];
					  ?>
                                          <tr class="odd gradeX">
                      <td><?php echo "$position";?></td>
					  <td><?php echo "$name";?></td>
					  <td><?php echo "$webmail";?></td>
					  <td><?php echo "$phone";?></td>
					  <td><?php echo "$image";?></td>
                      <td><?php echo "$hostel";?></td>
					  <td><?php echo "$post";?></td>
					  <td class="center"><a href='system_edit_team_members.php?edit=<?php echo "$webmail";?>&section=hostels' style='color:green'>Edit</a></td>
					  <td class="center"><a href='system_all_team_members.php?delete=<?php echo "$webmail";?>&section=hostels' style='color:red'>Delete</a></td>
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
							<div class="form-group" style="margin-left:1%;">
								<a href="system_add_new_team_members.php?section=hostels" class="btn btn-primary">Add New Member</a>
							</div>
                        </div>
                        <!-- /.panel -->
                    </div>
                    <!-- /.col-lg-12 -->
                </div>
		   <!-- /.row -->		    
		</div>



		 
	       </div>
		<!--tab-content -->
            </div>
         </div>
      </div>
   </div>                 
</section>
</div>
      <!-- /#page-wrapper -->
