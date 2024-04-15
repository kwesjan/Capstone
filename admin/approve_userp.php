<?php
date_default_timezone_set('Asia/Manila');
require '../constants/db_config.php';
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $myid = $_POST['id'];
    $currentDate = date('F j, Y');

    try {
        $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        $stmt = $conn->prepare("UPDATE tbl_users SET approval_status = 'approved', user_status = 'active', date_approved = :date_approved WHERE id = :id");
        $stmt->bindParam(':id', $myid);
        $stmt->bindParam(':date_approved', $currentDate);
        $stmt->execute();

        header("Location: users.php");
        exit();
    } catch(PDOException $e) {
        echo "Error: " . $e->getMessage();
    }
} else {
    echo "Invalid request method";
}
?>
