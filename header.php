<?php 
	include("config.php"); 
?>
			<!-- Navigation -->
            <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
                <div class="navbar-header">
                    <a class="navbar-brand" href="system.php">Central Login System</a>
                </div>

                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>

                <ul class="nav navbar-right navbar-top-links">
                    <li class="dropdown">
                        <a class="dropdown-toggle" data-toggle="dropdown" href="#">
						<?php if($user_image !=''){ ?>
                            <img src="images/<?php echo $user_image; ?>" width="35" style="border-radius:20px;">
						<?php }else{ ?>
							<i class="fa fa-user fa-fw"></i>
						<?php } 
							echo $name; ?> <b class="caret"></b>
							
                        </a>
                        <ul class="dropdown-menu dropdown-user">
                            <li><a href="system_profile.php"><i class="fa fa-user fa-fw"></i> My Profile</a>
                            </li>
                            <li class="divider"></li>
                            <li><a href="logout.php"><i class="fa fa-sign-out fa-fw"></i> Logout</a>
                            </li>
                        </ul>
                    </li>
                </ul>
                <!-- /.navbar-top-links -->

                <div class="navbar-default sidebar" role="navigation">
                    <div class="sidebar-nav navbar-collapse">
                        <ul class="nav" id="side-menu">
                            <li class="sidebar-search">
                                <div class="input-group custom-search-form" style="text-align:center;">
                                   <a href="system.php"><img width="45%" src="images/logo.png"></a>
                                </div>
                                <!-- /input-group -->
                            </li>
							<li>
                                <a href="system.php"><i class="fa fa-home fa-fw"></i> Dashboard</a>
                            </li>
							<li>
                                <a href="system_track_application.php"><i class="fa fa-history fa-fw"></i> Track Applications</a>
                            </li>
			    <li>
                                <a href="#"><i class="fa fa-bed fa-fw"></i> Guesthouse Booking<span class="fa arrow"></span></a>
                                <ul class="nav nav-second-level">
                                    <li><a href="system_book_guesthouse.php"> New Booking</a></li>
                                    <li><a href="system_track_guesthouse_application.php"> Booking History</a></li>
				    <li><a href="system_guesthouse_rules.php"> Booking Rules</a></li>
                                </ul>
                                <!-- /.nav-second-level -->
                            </li>
			    <li>
                                <a href="#"><i class="fa fa-train fa-fw"></i> Railway Concession Application<span class="fa arrow"></span></a>
                                <ul class="nav nav-second-level">
                                    <li><a href="system_railway_concession.php"> New Application</a></li>
                                    <li><a href="system_track_railway_concession_application.php">Application History</a></li>
				    <li><a href="system_railway_concession_rules.php">Rules</a></li>
                                </ul>
                                <!-- /.nav-second-level -->
                            </li>
			    <li>
                                <a href="#"><i class="fa fa-university fa-fw"></i>Community Hall Booking<span class="fa arrow"></span></a>
                                <ul class="nav nav-second-level">
                                    <li><a href="system_book_mch.php"> New Application</a></li>
                                    <li><a href="system_track_mch_booking.php">Application History</a></li>
				    <li><a href="system_mch_rules.php">Rules</a></li>
                                </ul>
                                <!-- /.nav-second-level -->
                            </li>
			    <li>
                                <a href="#"><i class="fa fa-money fa-fw"></i>Outside Scholarship Form<span class="fa arrow"></span></a>
                                <ul class="nav nav-second-level">
                                    <li><a href="system_certify_outside_scholarship.php"> New Application</a></li>
                                    <li><a href="system_track_cos.php">Application History</a></li>
				    <li><a href="system_cos_rules.php">Rules</a></li>
                                </ul>
                                <!-- /.nav-second-level -->
                            </li>
							<!--
							<li>
                                <a href="system_anonymous_complaint.php"><i class="fa fa-question-circle fa-fw"></i> Anonymous Complaints</a>
                            </li>
							<li>
                                <a href="system_room_details.php"><i class="fa fa-list-alt fa-fw"></i> Vacation Stay Approval</a>
                            </li>
							-->
							<li>
                                <a href="#"><i class="fa fa-bus fa-fw"></i> Station Leave Request<span class="fa arrow"></span></a>
                                <ul class="nav nav-second-level">
                                    <li>
										<a href="system_departure_arrival_info.php"> New Request</a>
									</li>
                                    <li>
										<a href="system_track_departure_arrival_info.php"> Previous Request(s)</a>
									</li>
                                </ul>
                                <!-- /.nav-second-level -->
                            </li>
							<li>
                                <a href="system_query_grievance.php"><i class="fa fa-comments fa-fw"></i> Query and Grievance</a>
                            </li>
							<li>
                                <a href="system_all_forms.php"><i class="fa fa-edit fa-fw"></i> Centralized Forms</a>
                            </li>
							<li>
                                <a href="system_student_details.php"><i class="fa fa-users fa-fw"></i> Search Student's Details</a>
                            </li>
                        </ul>
                    </div>
                    <!-- /.sidebar-collapse -->
                </div>
                <!-- /.navbar-static-side -->
            </nav>
