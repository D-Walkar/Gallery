<?php
//start the session
session_start();
//check for session if not set redirect to login page
if(!isset($_SESSION["username"])){
header("Location: login.php");
exit(); }
?>