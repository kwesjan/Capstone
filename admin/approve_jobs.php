<?php
date_default_timezone_set('Asia/Manila');
require '../constants/db_config.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $id = $_POST['job_id'];
    $currentDate = date('F j, Y');

    try {
        $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        $stmt = $conn->prepare("UPDATE tbl_jobs SET approval_status = 'approved', date_approved = :date_approved WHERE job_id = :jobid");
        $stmt->bindParam(':jobid', $id);
        $stmt->bindParam(':date_approved', $currentDate);
        $stmt->execute();

        header("Location: my-jobs.php");
        exit();
    } catch(PDOException $e) {
        echo "Error: " . $e->getMessage();
    }
} else {
    echo "Invalid request method";
}
?>