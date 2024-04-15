

<!doctype html>
<html lang="en">
<?php 
// Set the timezone to your desired value

// Include necessary files and perform other initializations
include '../constants/settings.php'; 
include 'constants/check-login.php';

// Check user login status and role
?>
<head>

	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<title>JobLinkX - Employers</title>
	<meta name="description" content="Online Job Management / Job Portal" />
	<meta name="keywords" content="job, work, resume, applicants, application, employee, employer, hire, hiring, human resource management, hr, online job management, company, worker, career, recruiting, recruitment" />
	<meta name="author" content="JobLinkX">
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
	<meta property="og:image" content="http://<?php echo "$actual_link"; ?>/images/banner.jpg" />
    <meta property="og:image:secure_url" content="https://<?php echo "$actual_link"; ?>/images/banner.jpg" />
    <meta property="og:image:type" content="image/jpeg" />
    <meta property="og:image:width" content="500" />
    <meta property="og:image:height" content="300" />
    <meta property="og:image:alt" content="JobLinkX" />
    <meta property="og:description" content="Online Job Management / Job Portal" />

	<link rel="shortcut icon" href="..images/logo.png">

	<link rel="stylesheet" type="text/css" href="../bootstrap/css/bootstrap.min.css" media="screen">	
	<link href="../css/animate.css" rel="stylesheet">
	<link href="../css/main.css" rel="stylesheet">
	<link href="../css/component.css" rel="stylesheet">
	
	<link rel="stylesheet" href="../icons/linearicons/style.css">
	<link rel="stylesheet" href="../icons/font-awesome/css/font-awesome.min.css">
	<link rel="stylesheet" href="../icons/simple-line-icons/css/simple-line-icons.css">
	<link rel="stylesheet" href="../icons/ionicons/css/ionicons.css">
	<link rel="stylesheet" href="../icons/pe-icon-7-stroke/css/pe-icon-7-stroke.css">
	<link rel="stylesheet" href="../icons/rivolicons/style.css">
	<link rel="stylesheet" href="../icons/flaticon-line-icon-set/flaticon-line-icon-set.css">
	<link rel="stylesheet" href="../icons/flaticon-streamline-outline/flaticon-streamline-outline.css">
	<link rel="stylesheet" href="../icons/flaticon-thick-icons/flaticon-thick.css">
	<link rel="stylesheet" href="../icons/flaticon-ventures/flaticon-ventures.css">

	<link href="../css/style.css" rel="stylesheet">

	<style>
        /* Define blinking animation */
        @keyframes blink {
            0% { opacity: 1; }
            50% { opacity: 0; }
            100% { opacity: 1; }
        }

        /* Apply blinking effect to the active list item */
        .blink {
            animation: blink 1s infinite;
        }
    </style>
	
</head>


<body class="not-transparent-header">

	<div class="container-wrapper">

		<header id="header">

			<nav class="navbar navbar-default navbar-fixed-top navbar-sticky-function bg-success">

				<div class="container">
					
					<div class="logo-wrapper">
						<div class="logo">
							<a href="../"><img src="../images/logo.png" alt="Logo" /></a>
						</div>
					</div>
					
					<div id="navbar" class="navbar-nav-wrapper navbar-arrow">
					
						<ul class="nav navbar-nav" id="responsive-menu">
						
							<li>
							
								<a href="../index.php">HOME</a>
								
							</li>
							
							<li>
								<a href="../job-list.php">JOB LISTS</a>
							</li>
							
							<li>
								<a href="../employers.php">UI EMPLOYERS</a>
							</li>
							
							<li>
								<a href="../employees.php">UI EMPLOYEES</a>
							</li>
							
						

						</ul>
				
					</div>

					<div class="nav-mini-wrapper">
						<ul class="nav-mini sign-in">
							<li><a href="../logout.php">Logout</a></li>
							<li><a href="./">Profile</a></li>
						</ul>
					</div>
				
				</div>
				
				<div id="slicknav-mobile"></div>
				
			</nav>

			
		</header>

		<div class="main-wrapper">
		
			<div class="breadcrumb-wrapper">
			
				<div class="container">
				
					<ol class="breadcrumb-list booking-step">
						<li><a href="../">JobLinkX</a></li>
						<li><span>Profile</span></li>
					</ol>
					
				</div>
				
			</div>

			
			<div class="admin-container-wrapper">

				<div class="container">
				
					<div class="GridLex-gap-15-wrappper">
					
						<div class="GridLex-grid-noGutter-equalHeight">
						
							<div class="GridLex-col-3_sm-4_xs-12">
							
								<div class="admin-sidebar">
										
										
									<div class="admin-user-item for-employer">
										
										<div class="image">
										<?php 
										if ($logo == null) {
										print '<center>Logo Not Inserted</center>';
										}else{
										echo '<center><img alt="image" title="'.$myrole.'" width="180" height="100" src="data:image/jpeg;base64,'.base64_encode($logo).'"/></center>';	
										}
										?><br>
										</div>
										
										<h4><?php echo "$myrole"; ?></h4>
										
									</div>
									

									
									<ul class="admin-user-menu clearfix">

									<li class="">
											<a href="./" class="btn btn-success btn-inverse fa fa-user">Dashboard</a>
										</li>

										<li class="active">
											<a href="users_employer.php" class="btn btn-success btn-sm fa fa-user">Employers</a>
										</li>

										<li class="">
										<a href="users.php" class="btn btn-success btn-inverse fa fa-user">Employees</a>
										</li>

										<li>
											<a href="my-jobs.php" class="btn btn-success btn-sm btn-inverse fa fa-bookmark"> Posted Jobs</a>
										</li>

										<li class="">
										<a href="statistics.php" class="btn btn-success btn-inverse fa fa-user">Statistics</a>
										</li>
										
										<li class="">
										<a href="change-password.php" class="btn btn-success btn-sm btn-inverse fa fa-key"> Settings</a>
										</li>
										
										<li>
											<a href="../logout.php" class="btn btn-success btn-sm btn-inverse fa fa-sign-out"> Logout</a>
										</li>
									</ul>
									
								</div>

							</div>
							
							<div class="GridLex-col-9_sm-8_xs-12">
							
								<div class="admin-content-wrapper">

								<div class="admin-section-title">
									<h2>EMPLOYERS</h2>
									<!-- Notification button -->
									<button class="btn btn-primary btn-sm" id="notificationBtn">Notification</button>

									<script>
										
										document.getElementById("notificationBtn").addEventListener("click", function() {
											// Your notification logic here
											alert("You clicked the notification button!");
										});
									</script>
								</div>

									
									
									<form class="post-form-wrapper" action="app/update-profile.php" method="POST" autocomplete="off">
								
											
												
												
												<div class="clear"></div>
												
												

												<div class="clear"></div>
												
									
												<div class="GridLex-col-9_sm-8_xs-12">
													<div class="admin-content-wrapper">
														<!-- Displaying the table of employers -->
														<div class="admin-table-wrapper">
															<table class="admin-table">
																<thread>
																	<tr class="bg-success">
																
																		<th>COMPANY NAME</th>
																		<th>EMAIL</th>
																		<th>TITLE</th>
																		<th>ROLE</th>
																		<th>APPROVAL STATUS</th>
																		<th> APPROVE </th>
																		<th> DENY </th>
																	
																	</tr>
																</thread>
																<tbody>
																<?php
																	$page1 = 0;
																		require '../constants/db_config.php';
																		try {
																			$conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
																			$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
																			$stmt = $conn->prepare("SELECT * FROM tbl_employers WHERE role = 'employer' AND approval_status = 'pending' ORDER BY id LIMIT $page1,16");
																			$stmt->execute();
																			$result = $stmt->fetchAll();

																		foreach($result as $row) {
																?>
														<tr>
												
															<td><?php echo $row['first_name']; ?></td>    
															<td><?php echo $row['email']; ?></td>
															<td><?php echo $row['title']; ?></td>
															<td><?php echo $row['role']; ?></td>
															<td><?php echo $row['approval_status']; ?></td>

															<td>
																<form id="approveForm<?php echo $row['id']; ?>" action="approve_process.php" method="POST">
																	<input type="hidden" name="id" value="<?php echo $row['id']; ?>">
																	<button type="button" onclick="confirmApprove(<?php echo $row['id']; ?>)" class="bg-success">Approve</button>
																</form>

																<script>
																	function confirmApprove(id) {
																		if (confirm('This will validate the registration! Do you want to continue?')) {
																			document.getElementById('approveForm' + id).submit();
																		}
																	}
																</script>
															</td>


															<td>
															<form id="deny_Form<?php echo $row['id']; ?>" action="deny.php" method="POST">
														<input type="hidden" name="id" value="<?php echo $row['id']; ?>">
														<button type="button" class="bg-danger" onclick="confirmDecline(<?php echo $row['id']; ?>)">Deny</button>
													</form>

														<script>
													function confirmDecline(applicationId) {
														if (confirm('This will delete the registration! Do you want to continue?')) {
															// Proceed with the form submission
															document.getElementById('deny_Form' + applicationId).submit();
														}
													}
													</script>
																</td>
															</tr>
													<?php
														}
													} catch(PDOException $e) {
														echo "Error: " . $e->getMessage();
													}
													?>

																	</tbody>
																</table>
															</div>
														</div>
												</div>



												<div class="clear"></div>
												


												<div class="clear"></div>
												
												
												
												<div class="clear"></div>
									</form>
								</div>
											
									
										
										
									
							</div>

							</div>
							
						</div>

					</div>

				</div>
			
			</div>

			<footer class="footer-wrapper">
			
				<div class="main-footer">
				
					<div class="container">
					
						<div class="row">
						
							<div class="col-sm-12 col-md-9">
							
								<div class="row">
								
									<div class="col-sm-6 col-md-4">
									
										<div class="footer-about-us">
											<h5 class="footer-title">About JobLinkX</h5>
											<p>jobLinkX is a job finding portal for UI Alumni, developed by Introbirds for their Capstone Project.</p>
										
										</div>

									</div>
									
									<div class="col-sm-6 col-md-5 mt-30-xs">
										<h5 class="footer-title">Quick Links</h5>
										<ul class="footer-menu clearfix">
											<li><a href="./">Home</a></li>
											<li><a href="job-list.php">Job Lists</a></li>
											<li><a href="employers.php">UI Employers</a></li>
											<li><a href="employees.php">UI Employees</a></li>
											<li><a href="contact.php">Contact Us</a></li>
											<li><a href="#">Go to top</a></li>

										</ul>
									
									</div>

								</div>

							</div>
							
							<div class="col-sm-12 col-md-3 mt-30-sm">
							
								<h5 class="footer-title">Contact Us</h5>
								
								<p>Address : PHINMA UNIVERSITY OF ILOILO</p>
								<p>Email : <a href="joblinkx@gmail.com">joblinkx@gmail.com</a></p>
								<p>Phone : <a href="tel:+639933703313"> +639933703313</a></p>
								

							</div>

							
						</div>
						
					</div>
					
				</div>
				
				<div class="bottom-footer">
				
					<div class="container">
					
						<div class="row">
						
							<div class="col-sm-4 col-md-4">
					
								<p class="copy-right">&#169; Copyright <?php echo date('Y'); ?> JobLinkX</p>
								
							</div>
							
							<div class="col-sm-4 col-md-4">
							
								<ul class="bottom-footer-menu">
									<li><a >Developed by Team Introbirds</a></li>
								</ul>
							
							</div>
						
						</div>

					</div>
					
				</div>
			
			</footer>
			
		</div>

	</div>

 
 
<div id="back-to-top">
   <a href="#"><i class="ion-ios-arrow-up"></i></a>
</div>


<script type="text/javascript" src="../js/jquery-1.11.3.min.js"></script>
<script type="text/javascript" src="../js/jquery-migrate-1.2.1.min.js"></script>
<script type="text/javascript" src="../bootstrap/js/bootstrap.min.js"></script>
<script type="text/javascript" src="../js/bootstrap-modalmanager.js"></script>
<script type="text/javascript" src="../js/bootstrap-modal.js"></script>
<script type="text/javascript" src="../js/smoothscroll.js"></script>
<script type="text/javascript" src="../js/jquery.easing.1.3.js"></script>
<script type="text/javascript" src="../js/jquery.waypoints.min.js"></script>
<script type="text/javascript" src="../js/wow.min.js"></script>
<script type="text/javascript" src="../js/jquery.slicknav.min.js"></script>
<script type="text/javascript" src="../js/jquery.placeholder.min.js"></script>
<script type="text/javascript" src="../js/bootstrap-tokenfield.js"></script>
<script type="text/javascript" src="../js/typeahead.bundle.min.js"></script>
<script type="text/javascript" src="../js/bootstrap3-wysihtml5.min.js"></script>
<script type="text/javascript" src="../js/bootstrap-select.min.js"></script>
<script type="text/javascript" src="../js/jquery-filestyle.min.js"></script>
<script type="text/javascript" src="../js/bootstrap-select.js"></script>
<script type="text/javascript" src="../js/ion.rangeSlider.min.js"></script>
<script type="text/javascript" src="../js/handlebars.min.js"></script>
<script type="text/javascript" src="../js/jquery.countimator.js"></script>
<script type="text/javascript" src="../js/jquery.countimator.wheel.js"></script>
<script type="text/javascript" src="../js/slick.min.js"></script>
<script type="text/javascript" src="../js/easy-ticker.js"></script>
<script type="text/javascript" src="../js/jquery.introLoader.min.js"></script>
<script type="text/javascript" src="../js/jquery.responsivegrid.js"></script>
<script type="text/javascript" src="../js/customs.js"></script>

</body>



</html>