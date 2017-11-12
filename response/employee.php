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
if(isset($_POST["txtlastname"]) && strlen($_POST["txtlastname"])>0) 
{	 
    $txtemployeecode2 = filter_var($_POST["txtemployeecode"],FILTER_SANITIZE_STRING, FILTER_FLAG_STRIP_HIGH);
	$txtlastname = filter_var($_POST["txtlastname"],FILTER_SANITIZE_STRING, FILTER_FLAG_STRIP_HIGH); 
	$txtfirstname = filter_var($_POST["txtfirstname"],FILTER_SANITIZE_STRING, FILTER_FLAG_STRIP_HIGH);
	$txtmiddlename = filter_var($_POST["txtmiddlename"],FILTER_SANITIZE_STRING, FILTER_FLAG_STRIP_HIGH);
	$cbocivilstatus = filter_var($_POST["cbocivilstatus"],FILTER_SANITIZE_STRING, FILTER_FLAG_STRIP_HIGH);    
	$txtmobilenumber =filter_var($_POST["txtmobilenumber"],FILTER_SANITIZE_STRING, FILTER_FLAG_STRIP_HIGH); 
	$txtbirthdate =filter_var($_POST["txtbirthdate"],FILTER_SANITIZE_STRING, FILTER_FLAG_STRIP_HIGH);
	$txtaddress= filter_var($_POST["txtaddress"],FILTER_SANITIZE_STRING, FILTER_FLAG_STRIP_HIGH); 
	$cbogender = filter_var($_POST["cbogender"],FILTER_SANITIZE_STRING, FILTER_FLAG_STRIP_HIGH); 
	$cboposition= filter_var($_POST["cboposition"],FILTER_SANITIZE_STRING, FILTER_FLAG_STRIP_HIGH); 
	$cbodepartment = filter_var($_POST["cbodepartment"],FILTER_SANITIZE_STRING, FILTER_FLAG_STRIP_HIGH);   
	$EmployeeID = filter_var($_POST["txtaccountid"],FILTER_SANITIZE_STRING, FILTER_FLAG_STRIP_HIGH);   
    $UpdateSQL="UPDATE tblemployee SET";
	$UpdateSQL=$UpdateSQL."`EmployeeCode`='".$txtemployeecode2."',";
	$UpdateSQL=$UpdateSQL."`Lastname`='".$txtlastname."',";
	$UpdateSQL=$UpdateSQL."`Firstname`='".$txtfirstname."',";
	$UpdateSQL=$UpdateSQL."`Middlename`='".$txtmiddlename."',";
	$UpdateSQL=$UpdateSQL."`CivilStatus`='".$cbocivilstatus."',";
	$UpdateSQL=$UpdateSQL."`ContactNumber`='".$txtmobilenumber."',";
	$UpdateSQL=$UpdateSQL."`Birthdate`='".$txtbirthdate."',";
	$UpdateSQL=$UpdateSQL."`Address`='".$txtaddress."',";
	$UpdateSQL=$UpdateSQL."`Gender`='".$cbogender."',";
	$UpdateSQL=$UpdateSQL."`PositionID`='".$cboposition."',";
	$UpdateSQL=$UpdateSQL."`DepartmentID`='".$cbodepartment."'";
	$UpdateSQL=$UpdateSQL." WHERE `EmployeeID`='".$EmployeeID."';";

//echo $UpdateSQL;	
$RSInsert=$con->getrecords($UpdateSQL);
}else{
		header('HTTP/1.1 500 Error!');
		exit();
	}
}



if ($TypeID=="SaveData") {
if(isset($_POST["txtemployeecode2"]) && strlen($_POST["txtemployeecode2"])>0) 
{	 
	$txtemployeecode2 = filter_var($_POST["txtemployeecode2"],FILTER_SANITIZE_STRING, FILTER_FLAG_STRIP_HIGH);
	$txtlastname = filter_var($_POST["txtlastname2"],FILTER_SANITIZE_STRING, FILTER_FLAG_STRIP_HIGH); 
	$txtfirstname = filter_var($_POST["txtfirstname2"],FILTER_SANITIZE_STRING, FILTER_FLAG_STRIP_HIGH);
	$txtmiddlename = filter_var($_POST["txtmiddlename2"],FILTER_SANITIZE_STRING, FILTER_FLAG_STRIP_HIGH);
	$cbocivilstatus = filter_var($_POST["cbocivilstatus2"],FILTER_SANITIZE_STRING, FILTER_FLAG_STRIP_HIGH);    
	$txtmobilenumber =filter_var($_POST["txtmobilenumber2"],FILTER_SANITIZE_STRING, FILTER_FLAG_STRIP_HIGH); 
	$txtbirthdate =filter_var($_POST["txtbirthdate2"],FILTER_SANITIZE_STRING, FILTER_FLAG_STRIP_HIGH);
	$txtaddress= filter_var($_POST["txtaddress2"],FILTER_SANITIZE_STRING, FILTER_FLAG_STRIP_HIGH); 
	$cbogender = filter_var($_POST["cbogender2"],FILTER_SANITIZE_STRING, FILTER_FLAG_STRIP_HIGH); 
	$cboposition= filter_var($_POST["cboposition2"],FILTER_SANITIZE_STRING, FILTER_FLAG_STRIP_HIGH); 
	$cbodepartment = filter_var($_POST["cbodepartment2"],FILTER_SANITIZE_STRING, FILTER_FLAG_STRIP_HIGH);   

    $SQLInsert ="INSERT INTO `tblemployee`(`EmployeeCode`,`Lastname`,`Firstname`,`Middlename`,`CivilStatus`,`ContactNumber`,`Birthdate`,`Address`,`Gender`,`PositionID`,`DepartmentID`)";
	$SQLInsert = $SQLInsert." VALUES('".$txtemployeecode2."',";
	$SQLInsert = $SQLInsert."'".$txtlastname."',";
	$SQLInsert = $SQLInsert."'".$txtfirstname."',";
	$SQLInsert = $SQLInsert."'".$txtmiddlename."',";
	$SQLInsert = $SQLInsert."'".$cbocivilstatus."',";
	$SQLInsert = $SQLInsert."'".$txtmobilenumber."',";
	$SQLInsert = $SQLInsert."'".$txtbirthdate."',";	
	$SQLInsert = $SQLInsert."'".$txtaddress."',";	
	$SQLInsert = $SQLInsert."'".$cbogender."',";	
	$SQLInsert = $SQLInsert."'".$cboposition."',";		
	$SQLInsert = $SQLInsert."'".$cbodepartment."');";

	$RSInsert=$con->getrecords($SQLInsert);
}else{
		header('HTTP/1.1 500 Error!');
		exit();
	}
}





if ($TypeID=="DeleteData") { 
    $txtemployeeID = filter_var($_POST["txtaccountid"],FILTER_SANITIZE_STRING, FILTER_FLAG_STRIP_HIGH); 
    $DeleteSQL="DELETE from tblemployee WHERE EmployeeID=".$txtemployeeID;
    $RSDelete=$con->getrecords($DeleteSQL);
}
?>



