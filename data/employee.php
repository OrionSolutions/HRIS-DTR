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
	
	$SQL_Time="SELECT * FROM tbltimeconfiguration ORDER BY TimeID ASC";
	$GetTime=$con->getrecords($SQL_Time);

	$GetPosition2=$con->getrecords($SQLPos);
	$GetDepartment2=$con->getrecords($SQL_Dep);
	$GetTime2=$con->getrecords($SQL_Time);

error_reporting(E_ERROR | E_PARSE);?>