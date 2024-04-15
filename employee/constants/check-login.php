<?php
session_start();
if (isset($_SESSION['logged']) && $_SESSION['logged'] == true) {
    $myid = $_SESSION['myid'] ?? null;
    $myfname = $_SESSION['myfname'] ?? null;
    $mylname = $_SESSION['mylname'] ?? null;
    $mygender = $_SESSION['gender'] ?? null;
    $myemail = $_SESSION['myemail'] ?? null;
    $mydate = $_SESSION['mydate'] ?? null;
    $mymonth = $_SESSION['mymonth'] ?? null;
    $myyear = $_SESSION['myyear'] ?? null;
    $myphone = $_SESSION['myphone'] ?? null;
    $myedu = $_SESSION['myedu'] ?? null;
    $mytitle = $_SESSION['mytitle'] ?? null;
    $mycity = $_SESSION['mycity'] ?? null;
    $mystreet = $_SESSION['mystreet'] ?? null;
    $myzip = $_SESSION['myzip'] ?? null;
    $mycountry = $_SESSION['mycountry'] ?? null;
    $mydesc = $_SESSION['mydesc'] ?? null;
    $myavatar = $_SESSION['avatar'] ?? null;
    $mylogin = $_SESSION['lastlogin'] ?? null;
    $myrole = $_SESSION['role'] ?? null;
	
$user_online = true;	
$myavatar = $_SESSION['avatar'];
}else{
$user_online = false;
}
?>