

<!doctype html>
<html lang="en">
<?php 
date_default_timezone_set('Asia/Manila');

include '../constants/settings.php'; 
include 'constants/check-login.php';


$servername = "localhost";
$username = "root";
$password = ""; 
$dbname = "joblinkx";

try {
    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    // Set the PDO error mode to exception
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch(PDOException $e) {
    echo "Connection failed: " . $e->getMessage();
}


try {
   
    $stmt_jobs = $conn->prepare("SELECT date_posted, COUNT(job_id) AS num_jobs FROM tbl_jobs WHERE date_posted <= CURDATE() GROUP BY date_posted ORDER BY date_posted");
	$stmt_jobs->execute();	
	$job_data = $stmt_jobs->fetchAll(PDO::FETCH_ASSOC);

    $chart_data = array();
	$chart_data[] = array('Date', 'Jobs');

foreach ($job_data as $job) {
    $chart_data[] = array($job['date_posted'], (int)$job['num_jobs']);
	
}
	
} catch(PDOException $e) {
    echo "Error: " . $e->getMessage();
}

try {

	$stmt_employers = $conn->prepare("SELECT date_approved, COUNT(*) AS num_employers FROM tbl_employers WHERE approval_status = 'approved' GROUP BY date_approved");
    $stmt_employers->execute();
    $employer_data = $stmt_employers->fetchAll(PDO::FETCH_ASSOC);
    
	$employer_chart_data = array();
    $employer_chart_data[] = array('Statistic', 'Employers');
   

	foreach ($employer_data as $employer) {
        $employer_chart_data[] = array($employer['date_approved'], (int)$employer['num_employers']);
    }
	
} catch(PDOException $e) {
    echo "Error: " . $e->getMessage();
}

try {

	$stmt_employees = $conn->prepare("SELECT date_approved, COUNT(*) AS num_employees FROM tbl_users WHERE approval_status = 'approved' GROUP BY date_approved");
    $stmt_employees->execute();
    $employee_data = $stmt_employees->fetchAll(PDO::FETCH_ASSOC);
    
	$employee_chart_data = array();
    $employee_chart_data[] = array('Statistic', 'Employees');
   

	foreach ($employee_data as $employee) {
        $employee_chart_data[] = array($employee['date_approved'], (int)$employee['num_employees']);
    }
	
} catch(PDOException $e) {
    echo "Error: " . $e->getMessage();
}

try {

	$stmt_applicants = $conn->prepare("SELECT application_date, COUNT(*) AS num_applicants FROM tbl_job_applications WHERE application_status = 'pending' GROUP BY application_date");
    $stmt_applicants->execute();
    $applicants_data = $stmt_applicants->fetchAll(PDO::FETCH_ASSOC);
    
	$applicants_chart_data = array();
    $applicants_chart_data[] = array('Statistic', 'Applicants');
   

	foreach ($applicants_data as $applicants) {
        $applicants_chart_data[] = array($applicants['application_date'], (int)$applicants['num_applicants']);
    }
	
} catch(PDOException $e) {
    echo "Error: " . $e->getMessage();
}

$conn = null;

?>
<head>
	<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
	<!-- Job Script -->
	
    <script type="text/javascript">
      google.charts.load('current', {'packages':['corechart']});
      google.charts.setOnLoadCallback(drawChart);

	  function drawChart() {
    var data = google.visualization.arrayToDataTable(<?php echo json_encode($chart_data); ?>);

    var options = {
        title: 'Number of Jobs Posted',
        curveType: 'function',
        legend: { position: 'bottom' },
       
        colors: ['red']
    };

    var chart = new google.visualization.LineChart(document.getElementById('curve_chart'));

    chart.draw(data, options);
}	
    </script>
	
	<!-- Employer Script -->

<script type="text/javascript">
    google.charts.load('current', {'packages':['corechart']});
    google.charts.setOnLoadCallback(drawEmployerChart);

    function drawEmployerChart() {
        var data = google.visualization.arrayToDataTable(<?php echo json_encode($employer_chart_data); ?>);

        var options = {
        title: 'Number of Registered Employers',
        curveType: 'function',
        legend: { position: 'bottom' },
        vAxis: { format: '0' },
        colors: ['blue']
    };

        var chart = new google.visualization.LineChart(document.getElementById('employer_chart'));

        chart.draw(data, options);
    }	
</script>

<!-- Employee Script -->

<script type="text/javascript">
    google.charts.load('current', {'packages':['corechart']});
    google.charts.setOnLoadCallback(drawEmployeeChart);

    function drawEmployeeChart() {
        var data = google.visualization.arrayToDataTable(<?php echo json_encode($employee_chart_data); ?>);

        var options = {
        title: 'Number of Registered Employees',
        curveType: 'function',
        legend: { position: 'bottom' },
        vAxis: { format: '0' },
        colors: ['green']
    };

        var chart = new google.visualization.LineChart(document.getElementById('employee_chart'));

        chart.draw(data, options);
    }	
</script>

<!-- Applicant Script -->

<script type="text/javascript">
    google.charts.load('current', {'packages':['corechart']});
    google.charts.setOnLoadCallback(drawApplicantChart);

    function drawApplicantChart() {
        var data = google.visualization.arrayToDataTable(<?php echo json_encode($applicants_chart_data); ?>);

        var options = {
        title: 'Number of Job Applications',
        curveType: 'function',
        legend: { position: 'bottom' },
        vAxis: { format: '0' },
        colors: ['green']
    };

        var chart = new google.visualization.LineChart(document.getElementById('applicant_chart'));

        chart.draw(data, options);
    }	
</script>


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
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
	
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

										<li class="">
											<a href="users_employer.php" class="btn btn-success btn-inverse fa fa-user">Employers</a>
										</li>

										<li class="">
										    <a href="users.php" class="btn btn-success btn-inverse fa fa-user">Employees</a>
										</li>

										<li>
											<a href="my-jobs.php" class="btn btn-success btn-sm btn-inverse fa fa-bookmark"> Posted Jobs</a>
										</li>

                                        <li class="active">
										    <a href="statistics.php" class="btn btn-success btn-sm fa fa-user">Statistics</a>
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
									
										<h2>STATISTICS</h2>
										
									</div>
                                    
									<!-- Add this where you want to display the chart -->
									<div class="admin-content-wrapper">
        
        							<!-- Add this where you want to display the chart -->
        								<div id="curve_chart" style="width: 1000px; height: 500px; margin-top: auto"></div>
										<div id="applicant_chart" style="width: 1000px; height: 500px; margin-top: auto"></div>
										<div id="employer_chart" style="width: 1000px; height: 500px; margin-top: auto"></div>
										<div id="employee_chart" style="width: 1000px; height: 500px; margin-top: auto"></div>
										
		
    								</div>

										
                                </div>


                            </div>
                        </div>

                        
						<div class="clear"></div>
										
						<div class="clear"></div>
                        			
						<div class="clear"></div>

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