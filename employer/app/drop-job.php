<?php
require '../../constants/db_config.php';
require '../constants/check-login.php';
$job_id = $_GET['id'];

try {
$conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

	
$stmt = $conn->prepare("DELETE FROM tbl_jobs WHERE job_id= :jobid AND company = '$myid'");
$stmt->bindParam(':jobid', $job_id);
$stmt->execute();

$stmt = $conn->prepare("DELETE FROM tbl_job_applications WHERE job_id= :jobid");
$stmt->bindParam(':jobid', $job_id);
$stmt->execute();

header("location:../my-jobs.php?r=0173");					  
}catch(PDOException $e)
{
    echo "Error: " . $e->getMessage(); // Output any errors for debugging
}
	
?>

<script>
function deleteAndRedirect(event, jobId) {
    if (confirm('Are you sure you want to delete this job?')) {
        // Perform the deletion here (you might need AJAX or form submission)

        // Redirect to the homepage after deletion
        window.location.href = '../index.php'; // Adjust the URL as needed
    } else {
        event.preventDefault(); // Prevent the default link behavior if the user cancels deletion
    }
}
</script>