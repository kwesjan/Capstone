<?php
require '../../constants/db_config.php';
require '../constants/check-login.php';

if(isset($_POST['jobid']) && !empty($_POST['jobid'])) {
    $job_id = $_POST['jobid'];
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

        $stmt = $conn->prepare("UPDATE tbl_jobs SET title = :title, city = :city, category = :category, type = :type, experience = :experience, department = :department WHERE job_id = :jobid AND company = :myid");
        $stmt->bindParam(':title', $title);
        $stmt->bindParam(':city', $city);
        $stmt->bindParam(':category', $category);
        $stmt->bindParam(':type', $type);
        $stmt->bindParam(':experience', $exp);
        $stmt->bindParam(':department', $department);
        $stmt->bindParam(':jobid', $job_id);
        $stmt->bindParam(':myid', $myid); // Assuming $myid holds the company ID
        $stmt->execute();

        header("location:../my-jobs.php?r=0369&jobid=$job_id");
    } catch(PDOException $e) {
        echo "Error: " . $e->getMessage(); // Display any SQL errors for debugging
    }
} else {
    echo "Invalid job ID"; // Handle the case where jobid is not set
}
?>
