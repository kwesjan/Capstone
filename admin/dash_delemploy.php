<?php

require '../constants/db_config.php';


if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    $id = $_POST['id'];

    try {

        $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

 
        $stmt = $conn->prepare("DELETE FROM tbl_employers WHERE id = :id");
        $stmt->bindParam(':id', $id);
        $stmt->execute();


        header("Location: index.php");
        exit();
    } catch(PDOException $e) {

        echo "Error: " . $e->getMessage();
    }
} else {

    echo "Invalid request method";
}
?>
