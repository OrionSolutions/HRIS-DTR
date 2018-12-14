<?php 
include_once('../class/clsConnection.php');
include('../includes/variable.php');
include('../session.php');
include('../sessionuser.php');
	$con = new mycon();
	$con->getconnect();
	$search = $_GET["txtsearch"];
	$type = $_GET["type"];
	$startDate = $_GET["startDate"];
	$endDate = $_GET["endDate"];
	
	if ($search=="") {
		$SQL="CALL spTardiness('".$type."','".$startDate."','".$endDate."','0','".$search."')";
	}else{
		$SQL="CALL spTardiness('".$type."','".$startDate."','".$endDate."','1','".$search."')";
	}

	$GetSQL=$con->getrecords($SQL);
error_reporting(E_ERROR | E_PARSE);?>