<?php 
include_once('../class/clsConnection.php');
include('../includes/variable.php');
include('../session.php');
include('../sessionuser.php');
	$con = new mycon();
	$con->getconnect();
	$search = $_GET["txtsearch"];


	if ($search=="") {
		$SQL="SELECT * FROM `tblemployee`
		INNER JOIN `tbldepartment`
		ON `tbldepartment`.`DepartmentCode` = `tblemployee`.`DepartmentCode`";
	}else{
		$SQL="SELECT * FROM `tblemployee`
		INNER JOIN `tbldepartment`
		ON `tbldepartment`.`DepartmentCode` = `tblemployee`.`DepartmentCode`
		WHERE `tbldepartment`.`DepartmentName` LIKE '%".$search."%'";
	}

	$GetSQL=$con->getrecords($SQL);
error_reporting(E_ERROR | E_PARSE);?>