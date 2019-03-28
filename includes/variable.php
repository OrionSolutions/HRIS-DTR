<?php
$title="Z.C Integrated Port Services INC. HRIS System Dashboard";
$keywords = "Z.C Integrated Port Services INC. HRIS System Dashboard";
$DB_HOST = 'localhost';
$DB_USER = 'root';
$DB_PASS = 'root';
$DB_NAME = 'hrisdtr';
$pathdomain = 'http://localhost/HRIS-DTR/';
$cons = mysqli_connect($DB_HOST, $DB_USER, $DB_PASS, $DB_NAME) or die ("could not connect database");
$cons2 = mysqli_connect($DB_HOST, $DB_USER, $DB_PASS, $DB_NAME) or die ("could not connect database");
error_reporting(E_ERROR | E_PARSE);
?>