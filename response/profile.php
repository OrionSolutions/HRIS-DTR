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
************************ profile.php Module
*************************************************************************************/	


if ($TypeID=="UpdateData") {
if(isset($_POST["txtlastname"]) && strlen($_POST["txtlastname"])>0) 
{	 
    $txtaccountid = filter_var($_POST["txtaccountid"],FILTER_SANITIZE_STRING, FILTER_FLAG_STRIP_HIGH); 
	$txtlastname = filter_var($_POST["txtlastname"],FILTER_SANITIZE_STRING, FILTER_FLAG_STRIP_HIGH); 
	$txtfirstname = filter_var($_POST["txtfirstname"],FILTER_SANITIZE_STRING, FILTER_FLAG_STRIP_HIGH); 
	$txtemail = filter_var($_POST["txtemail"],FILTER_SANITIZE_STRING, FILTER_FLAG_STRIP_HIGH); 
	$txtmobilenumber =filter_var($_POST["txtmobilenumber"],FILTER_SANITIZE_STRING, FILTER_FLAG_STRIP_HIGH); 
	$txtsubject= filter_var($_POST["txtsubject"],FILTER_SANITIZE_STRING, FILTER_FLAG_STRIP_HIGH); 
	$cbodepartment = filter_var($_POST["cbodepartment"],FILTER_SANITIZE_STRING, FILTER_FLAG_STRIP_HIGH); 
	$cbooccupation = filter_var($_POST["cbooccupation"],FILTER_SANITIZE_STRING, FILTER_FLAG_STRIP_HIGH); 
	$cbosubject= filter_var($_POST["cbosubject"],FILTER_SANITIZE_STRING, FILTER_FLAG_STRIP_HIGH); 
	$cbogender = filter_var($_POST["cbogender"],FILTER_SANITIZE_STRING, FILTER_FLAG_STRIP_HIGH); 
	$chkauditor =filter_var($_POST["chkauditor"],FILTER_SANITIZE_STRING, FILTER_FLAG_STRIP_HIGH); 
	$txtusername= filter_var($_POST["txtusername"],FILTER_SANITIZE_STRING, FILTER_FLAG_STRIP_HIGH); 
	$txtpassword = filter_var($_POST["txtpassword"],FILTER_SANITIZE_STRING, FILTER_FLAG_STRIP_HIGH); 
	if ($chkauditor==1) { $UserType ="Auditor";}else{ $UserType="Employee";}
	
    	$UpdateSQL="UPDATE tblaccount SET";
	$UpdateSQL=$UpdateSQL."`Lastname`='".$txtlastname."',";
	$UpdateSQL=$UpdateSQL."`Firstname`='".$txtfirstname."',";
	$UpdateSQL=$UpdateSQL."`EmailAdd`='".$txtemail."',";
	$UpdateSQL=$UpdateSQL."`MobileNumber`='".$txtmobilenumber."',";
	$UpdateSQL=$UpdateSQL."`SubjectArea`='".$txtsubject."',";
	$UpdateSQL=$UpdateSQL."`DepartmentID`='".$cbodepartment."',";
	$UpdateSQL=$UpdateSQL."`OccupationID`='".$cbooccupation."',";
	$UpdateSQL=$UpdateSQL."`SubjectID`='".$cbosubject."',";
	$UpdateSQL=$UpdateSQL."`Gender`='".$cbogender."',";
	$UpdateSQL=$UpdateSQL."`Auditor`='".$chkauditor."',";
	$UpdateSQL=$UpdateSQL."`Username`='".$txtusername."',";
	$UpdateSQL=$UpdateSQL."`Password`='".$txtpassword."',";
	$UpdateSQL=$UpdateSQL."`Usertype`='".$UserType."'";
	$UpdateSQL=$UpdateSQL."WHERE `AccountID`='".$txtaccountid."';";
	
	
	$RSInsert=$con->getrecords($UpdateSQL);
}else{
		header('HTTP/1.1 500 Error!');
		exit();
	}
}




if ($TypeID=="DeleteData") { 
    $txtaccountid = filter_var($_POST["txtaccountid"],FILTER_SANITIZE_STRING, FILTER_FLAG_STRIP_HIGH); 
    $DeleteSQL="DELETE from tblaccount WHERE AccountID=".$txtaccountid;
    $RSDelete=$con->getrecords($DeleteSQL);
}


if ($TypeID=="SaveData") {
if(isset($_POST["txtlastname"]) && strlen($_POST["txtlastname"])>0) 
{	 
	$txtlastname = filter_var($_POST["txtlastname"],FILTER_SANITIZE_STRING, FILTER_FLAG_STRIP_HIGH); 
	$txtfirstname = filter_var($_POST["txtfirstname"],FILTER_SANITIZE_STRING, FILTER_FLAG_STRIP_HIGH); 
	$txtemail = filter_var($_POST["txtemail"],FILTER_SANITIZE_STRING, FILTER_FLAG_STRIP_HIGH); 
	$txtmobilenumber =filter_var($_POST["txtmobilenumber"],FILTER_SANITIZE_STRING, FILTER_FLAG_STRIP_HIGH); 
	$txtsubject= filter_var($_POST["txtsubject"],FILTER_SANITIZE_STRING, FILTER_FLAG_STRIP_HIGH); 
	$cbodepartment = filter_var($_POST["cbodepartment"],FILTER_SANITIZE_STRING, FILTER_FLAG_STRIP_HIGH); 
	$cbooccupation = filter_var($_POST["cbooccupation"],FILTER_SANITIZE_STRING, FILTER_FLAG_STRIP_HIGH); 
	$cbosubject= filter_var($_POST["cbosubject"],FILTER_SANITIZE_STRING, FILTER_FLAG_STRIP_HIGH); 
	$cbogender = filter_var($_POST["cbogender"],FILTER_SANITIZE_STRING, FILTER_FLAG_STRIP_HIGH); 
	$chkauditor =filter_var($_POST["chkauditor"],FILTER_SANITIZE_STRING, FILTER_FLAG_STRIP_HIGH); 
	$txtusername= filter_var($_POST["txtusername"],FILTER_SANITIZE_STRING, FILTER_FLAG_STRIP_HIGH); 
	$txtpassword = filter_var($_POST["txtpassword"],FILTER_SANITIZE_STRING, FILTER_FLAG_STRIP_HIGH); 
	$contentProductImage = filter_var($_POST["img_txt"],FILTER_SANITIZE_STRING, FILTER_FLAG_STRIP_HIGH);
	if ($chkauditor==1) { $UserType ="Auditor";}else{ $UserType="Employee";}
	
    $SQLInsert ="INSERT INTO `tblaccount`(`Lastname`,`Firstname`,`EmailAdd`,`MobileNumber`,`SubjectArea`,`DepartmentID`,`OccupationID`,`SubjectID`,`Gender`,`Auditor`,`Username`,`Password`,`Images`,`UserType`)";
	$SQLInsert = $SQLInsert." VALUES('".$txtlastname."',";
	$SQLInsert = $SQLInsert."'".$txtfirstname."',";
	$SQLInsert = $SQLInsert."'".$txtemail."',";
	$SQLInsert = $SQLInsert."'".$txtmobilenumber."',";
	$SQLInsert = $SQLInsert."'".$txtsubject."',";
	$SQLInsert = $SQLInsert."'".$cbodepartment."',";
	$SQLInsert = $SQLInsert."'".$cbooccupation."',";
	$SQLInsert = $SQLInsert."'".$cbosubject."',";
	$SQLInsert = $SQLInsert."'".$cbogender."',";
	$SQLInsert = $SQLInsert."'".$chkauditor."',";
	$SQLInsert = $SQLInsert."'".$txtusername."',";	
	$SQLInsert = $SQLInsert."md5('".$txtpassword."'),";	
	$SQLInsert = $SQLInsert."'".$contentProductImage."',";
	$SQLInsert = $SQLInsert."'".$UserType."');";
	$RSInsert=$con->getrecords($SQLInsert);
}else{
		header('HTTP/1.1 500 Error!');
		exit();
	}
}

?>



