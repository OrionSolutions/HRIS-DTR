<?php 
include_once('class/clsConnection.php');
include('includes/variable.php');
include('session.php');
include('sessionuser.php');
	$con = new mycon();
	$con->getconnect();

	$SQLPos="SELECT * FROM tblposition ORDER BY PositionID ASC";
	$GetPosition=$con->getrecords($SQLPos);

	$SQL_Dep="SELECT * FROM tbldepartment ORDER BY DepartmentID ASC";
	$GetDepartment=$con->getrecords($SQL_Dep);

	$GetPosition2=$con->getrecords($SQLPos);
	$GetDepartment2=$con->getrecords($SQL_Dep);

error_reporting(E_ERROR | E_PARSE);?>