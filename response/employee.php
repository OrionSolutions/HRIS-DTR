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
    $txtaccountid = filter_var($_POST["txtaccountid"],FILTER_SANITIZE_STRING, FILTER_FLAG_STRIP_HIGH); 
	$txtlastname = filter_var($_POST["txtlastname"],FILTER_SANITIZE_STRING, FILTER_FLAG_STRIP_HIGH); 
	$txtfirstname = filter_var($_POST["txtfirstname"],FILTER_SANITIZE_STRING, FILTER_FLAG_STRIP_HIGH); 
	$txtemail = filter_var($_POST["txtemail"],FILTER_SANITIZE_STRING, FILTER_FLAG_STRIP_HIGH); 
	$txtmobilenumber =filter_var($_POST["txtmobilenumber"],FILTER_SANITIZE_STRING, FILTER_FLAG_STRIP_HIGH); 
	$txtaddress= filter_var($_POST["txtaddress"],FILTER_SANITIZE_STRING, FILTER_FLAG_STRIP_HIGH); 
	$cbogender = filter_var($_POST["cbogender"],FILTER_SANITIZE_STRING, FILTER_FLAG_STRIP_HIGH);
	$cbousertype = filter_var($_POST["cbousertype"],FILTER_SANITIZE_STRING, FILTER_FLAG_STRIP_HIGH);  
	$txtusername= filter_var($_POST["txtusername"],FILTER_SANITIZE_STRING, FILTER_FLAG_STRIP_HIGH); 
	$txtpassword = filter_var($_POST["txtpassword"],FILTER_SANITIZE_STRING, FILTER_FLAG_STRIP_HIGH); 

    $UpdateSQL="UPDATE tblaccount SET";
	$UpdateSQL=$UpdateSQL."`Lastname`='".$txtlastname."',";
	$UpdateSQL=$UpdateSQL."`Firstname`='".$txtfirstname."',";
	$UpdateSQL=$UpdateSQL."`EmailAdd`='".$txtemail."',";
	$UpdateSQL=$UpdateSQL."`MobileNumber`='".$txtmobilenumber."',";
	$UpdateSQL=$UpdateSQL."`Address`='".$txtaddress."',";
	$UpdateSQL=$UpdateSQL."`Gender`='".$cbogender."',";
	$UpdateSQL=$UpdateSQL."`Username`='".$txtusername."',";
	$UpdateSQL=$UpdateSQL."`Password`='".$txtpassword."',";
	$UpdateSQL=$UpdateSQL."`Usertype`='".$cbousertype."'";
	$UpdateSQL=$UpdateSQL."WHERE `AccountID`='".$txtaccountid."';";
	
	
	$RSInsert=$con->getrecords($UpdateSQL);
}else{
		header('HTTP/1.1 500 Error!');
		exit();
	}
}



if ($TypeID=="SaveData") {
if(isset($_POST["txtlastname"]) && strlen($_POST["txtlastname"])>0) 
{	 
	$txtlastname = filter_var($_POST["txtlastname"],FILTER_SANITIZE_STRING, FILTER_FLAG_STRIP_HIGH); 
	$txtfirstname = filter_var($_POST["txtfirstname"],FILTER_SANITIZE_STRING, FILTER_FLAG_STRIP_HIGH); 
	$txtemail = filter_var($_POST["txtemail"],FILTER_SANITIZE_STRING, FILTER_FLAG_STRIP_HIGH); 
	$txtmobilenumber =filter_var($_POST["txtmobilenumber"],FILTER_SANITIZE_STRING, FILTER_FLAG_STRIP_HIGH); 
	$txtaddress= filter_var($_POST["txtaddress"],FILTER_SANITIZE_STRING, FILTER_FLAG_STRIP_HIGH); 
	$cbogender = filter_var($_POST["cbogender"],FILTER_SANITIZE_STRING, FILTER_FLAG_STRIP_HIGH); 
	$cbousertype = filter_var($_POST["cbousertype"],FILTER_SANITIZE_STRING, FILTER_FLAG_STRIP_HIGH);  
	$txtusername= filter_var($_POST["txtusername"],FILTER_SANITIZE_STRING, FILTER_FLAG_STRIP_HIGH); 
	$txtpassword = filter_var($_POST["txtpassword"],FILTER_SANITIZE_STRING, FILTER_FLAG_STRIP_HIGH); 

    $SQLInsert ="INSERT INTO `tblaccount`(`Lastname`,`Firstname`,`EmailAdd`,`MobileNumber`,`Address`,`Gender`,`Username`,`Password`,`UserType`)";
	$SQLInsert = $SQLInsert." VALUES('".$txtlastname."',";
	$SQLInsert = $SQLInsert."'".$txtfirstname."',";
	$SQLInsert = $SQLInsert."'".$txtemail."',";
	$SQLInsert = $SQLInsert."'".$txtmobilenumber."',";
	$SQLInsert = $SQLInsert."'".$txtaddress."',";
	$SQLInsert = $SQLInsert."'".$cbogender."',";
	$SQLInsert = $SQLInsert."'".$txtusername."',";		
	$SQLInsert = $SQLInsert."md5('".$txtpassword."'),";	
	$SQLInsert = $SQLInsert."'".$cbousertype."');";
	$RSInsert=$con->getrecords($SQLInsert);
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
?>



