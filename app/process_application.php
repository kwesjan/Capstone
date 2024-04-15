<?php
date_default_timezone_set('Africa/Dar_es_salaam');
$last_login = date('d-m-Y h:m A [T P]');
require '../constants/db_config.php';


if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    if (isset($_POST['action'])) {
 
        if ($_POST['action'] === 'accept') {
    
            if (isset($_POST['applicant_id'])) {
                $applicant_id = $_POST['applicant_id'];
                try {
              
                    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
                    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                    
           
                    $stmt = $conn->prepare("UPDATE tbl_applicants SET status = 'accepted' WHERE id = :applicant_id");
                    $stmt->bindParam(':applicant_id', $applicant_id);
                    $stmt->execute();
             
                    header("Location: ../view-applicants.php");
                    exit();
                } catch(PDOException $e) {
                    echo "Error: " . $e->getMessage();
                }
            } else {
            
            }
        }

        if ($_POST['action'] === 'decline') {
    
            if (isset($_POST['applicant_id'])) {
                $applicant_id = $_POST['applicant_id'];
                try {
               
                    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
                    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                    
                 
                    $stmt = $conn->prepare("UPDATE tbl_job_applications SET status = 'declined' WHERE member_no = :applicant_id");

                    $stmt->bindParam(':applicant_id', $applicant_id);
                    $stmt->execute();
                    
    
                    header("Location: ../employer/view-applicants.php");
                    exit();
                } catch(PDOException $e) {
                    echo "Error: " . $e->getMessage();
                }
            } else {
         
            }
        }
    } else {
  
    }
} else {

}
?>
