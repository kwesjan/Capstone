<?php
date_default_timezone_set('Africa/Dar_es_salaam');
require '../../constants/db_config.php';
require '../constants/check-login.php';
require '../../constants/uniques.php';
$postdate = date('F d, Y');
$job_id = ''.get_rand_numbers(10).'';
$title  = ucwords($_POST['title']);
$city  = ucwords($_POST['city']);
$category = $_POST['category'];
$type = $_POST['jobtype'];
$exp = $_POST['experience'];
$deadline = $_POST['deadline'];
$department = $_POST['department'];
try {
$conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

	
$stmt = $conn->prepare("INSERT INTO tbl_jobs (job_id, title, city, country, category, type, experience, company, date_posted, closing_date, department)
 VALUES (:jobid, :title, :city, :country, :category, :type, :experience, :company, :dateposted, :closingdate, :department)");
$stmt->bindParam(':jobid', $job_id);
$stmt->bindParam(':title', $title);
$stmt->bindParam(':city', $city);
$stmt->bindParam(':country', $country);
$stmt->bindParam(':category', $category);
$stmt->bindParam(':type', $type);
$stmt->bindParam(':experience', $exp);
$stmt->bindParam(':company', $myid);
$stmt->bindParam(':dateposted', $postdate);
$stmt->bindParam(':closingdate', $deadline);
$stmt->bindParam(':department', $department);
$stmt->execute();
header("location:../post-job.php?r=9843");		  
}catch(PDOException $e)
{
echo "Connection failed: " . $e->getMessage();
}

?>