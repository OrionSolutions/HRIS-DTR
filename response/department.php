<?php
include_once('../class/clsConnection.php');
include('../class/clsCombo.php');
include('../includes/variable.php');
$con = new  mycon();
$con->getconnect();
$TypeID=$_GET['TypeID'];
ini_set('max_execution_time', 900000);
if (!isset($_SESSION)) {
  session_start();
}


/************************************************************************************
************************ user-module.php Module
*************************************************************************************/	


if ($TypeID=="UpdateData") {
if(isset($_POST["txtdepartmentname"]) && strlen($_POST["txtdepartmentname"])>0) 
{	 
    $txtdepartmentname = filter_var($_POST["txtdepartmentname"],FILTER_SANITIZE_STRING, FILTER_FLAG_STRIP_HIGH);
    $txtdepartmentdesc = filter_var($_POST["txtdepartmentdesc"],FILTER_SANITIZE_STRING, FILTER_FLAG_STRIP_HIGH); 
    $DepartmentID = filter_var($_POST["departmentid"],FILTER_SANITIZE_STRING, FILTER_FLAG_STRIP_HIGH);

    $UpdateSQL="UPDATE tbldepartment SET";
	$UpdateSQL=$UpdateSQL."`DepartmentName`='".$txtdepartmentname."',";
	$UpdateSQL=$UpdateSQL."`DepartmentDesc`='".$txtdepartmentdesc."'";
	$UpdateSQL=$UpdateSQL." WHERE `DepartmentID`='".$DepartmentID."';"; 
$RSInsert=$con->getrecords($UpdateSQL);
}else{
		header('HTTP/1.1 500 Error!');
		exit();
	}
}



if ($TypeID=="SaveData") {
if(isset($_POST["txtdepartmentname2"]) && strlen($_POST["txtdepartmentname2"])>0) 
{	 
	$txtdepartmentname = filter_var($_POST["txtdepartmentname2"],FILTER_SANITIZE_STRING, FILTER_FLAG_STRIP_HIGH);
	$txtdepartmentdesc = filter_var($_POST["txtdepartmentdesc2"],FILTER_SANITIZE_STRING, FILTER_FLAG_STRIP_HIGH); 

    $SQLInsert ="INSERT INTO `tbldepartment`(`DepartmentName`,`DepartmentDesc`)";
	$SQLInsert = $SQLInsert." VALUES('".$txtdepartmentname."',";
	$SQLInsert = $SQLInsert."'".$txtdepartmentdesc."');";
    $RSInsert=$con->getrecords($SQLInsert);
}else{
       
		header('HTTP/1.1 500 Error!');
		exit();
	}
}





if ($TypeID=="DeleteData") { 
    $departmentID = filter_var($_POST["departmentid"],FILTER_SANITIZE_STRING, FILTER_FLAG_STRIP_HIGH); 
    $DeleteSQL="DELETE from tbldepartment WHERE DepartmentID=".$departmentID;
    $RSDelete=$con->getrecords($DeleteSQL);
}
?>



