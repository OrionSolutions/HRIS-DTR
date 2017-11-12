<?php 
include_once('class/clsConnection.php');
include('includes/variable.php');
include('session.php');
include('sessionuser.php');
	$con = new mycon();
	$con->getconnect();

$SQLDep="SELECT * FROM tbldepartment ORDER BY DepartmentID ASC";
$GetDeps=$con->getrecords($SQLDep);

$SQLDep="SELECT * FROM tbldepartment ORDER BY DepartmentID ASC";
$GetDep=$con->getrecords($SQLDep);

$SQLOccu="SELECT * FROM tbloccupation ORDER BY OccupationID DESC";
$GetOccu=$con->getrecords($SQLOccu);

$SQLSubj="SELECT * FROM tblsubjectarea ORDER BY SubjectID DESC";
$GetSubj=$con->getrecords($SQLSubj);


$SQLDep="SELECT * FROM tbldepartment ORDER BY DepartmentID ASC";
$GetDep2=$con->getrecords($SQLDep);

$SQLOccu="SELECT * FROM tbloccupation ORDER BY OccupationID DESC";
$GetOccu2=$con->getrecords($SQLOccu);

$SQLSubj="SELECT * FROM tblsubjectarea ORDER BY SubjectID DESC";
$GetSubj2=$con->getrecords($SQLSubj);



error_reporting(E_ERROR | E_PARSE);?>