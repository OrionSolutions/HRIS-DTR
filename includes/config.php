<?php 
header("Access-Control-Allow-Origin: *");
$DB_HOST = '127.0.0.1';
$DB_USER = 'roots';
$DB_PASS = 'roots';
$DB_NAME = 'hrisdtr';
$mysqli = new mysqli($DB_HOST, $DB_USER, $DB_PASS, $DB_NAME);
$con = mysqli_connect($DB_HOST, $DB_USER, $DB_PASS, $DB_NAME) or die ("could not connect database");

?>
