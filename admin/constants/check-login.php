<?php
session_start();
if (isset($_SESSION['logged']) && $_SESSION['logged'] == true) {
$myid = $_SESSION['myid'];


$mymail = $_SESSION['myemail'];
$myphone = $_SESSION['myphone'];
$city = $_SESSION['mycity'];
$street = $_SESSION['mystreet'];
$zip = $_SESSION['myzip'];
$country = $_SESSION['mycountry'];
$desc = $_SESSION['mydesc'];
$logo = $_SESSION['avatar'];
$mylogin = $_SESSION['lastlogin'];
$myrole = $_SESSION['role'];        
$user_online = true;	
}else{
$user_online = false;
}
?>