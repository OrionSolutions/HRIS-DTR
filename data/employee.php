<?php 
include_once('class/clsConnection.php');
include('includes/variable.php');
include('session.php');
include('sessionuser.php');
	$con = new mycon();
	$con->getconnect();

	$SQLPos="SELECT * FROM tblposition ORDER BY PositionID ASC";
	$GetPosition=$con->getrecords($SQLPos);

error_reporting(E_ERROR | E_PARSE);?>