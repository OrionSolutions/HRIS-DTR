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
if(isset($_POST["txtusername"]) && strlen($_POST["txtusername"])>0) 
{	 
    	 
	$txtusername = filter_var($_POST["txtusername"],FILTER_SANITIZE_STRING, FILTER_FLAG_STRIP_HIGH);
    $txtpassword = filter_var($_POST["txtpassword"],FILTER_SANITIZE_STRING, FILTER_FLAG_STRIP_HIGH); 
    $txtusertype = filter_var($_POST["txtusertype"],FILTER_SANITIZE_STRING, FILTER_FLAG_STRIP_HIGH); 
    $accountid = filter_var($_POST["accountid"],FILTER_SANITIZE_STRING, FILTER_FLAG_STRIP_HIGH); 

    $UpdateSQL="UPDATE tblaccount SET";
    $UpdateSQL=$UpdateSQL."`Username`='".$txtusername."',";
    $UpdateSQL=$UpdateSQL."`Password`= md5('".$txtpassword."'),";
	$UpdateSQL=$UpdateSQL."`UserType`='".$txtusertype."'";
    $UpdateSQL=$UpdateSQL." WHERE `AccountID`='".$accountid."';";
    //echo $UpdateSQL;
    $RSInsert=$con->getrecords($UpdateSQL);
}else{
		header('HTTP/1.1 500 Error!');
		exit();
	}
}



if ($TypeID=="SaveData") {
if(isset($_POST["txtusername2"]) && strlen($_POST["txtusername2"])>0) 
{	 
	$txtusername2 = filter_var($_POST["txtusername2"],FILTER_SANITIZE_STRING, FILTER_FLAG_STRIP_HIGH);
    $txtpassword2 = filter_var($_POST["txtpassword2"],FILTER_SANITIZE_STRING, FILTER_FLAG_STRIP_HIGH); 
    $txtusertype2 = filter_var($_POST["cbousertype"],FILTER_SANITIZE_STRING, FILTER_FLAG_STRIP_HIGH); 

    $SQLInsert ="INSERT INTO `tblaccount`(`Username`,`Password`,`UserType`)";
    $SQLInsert = $SQLInsert." VALUES('".$txtusername2."',";
    $SQLInsert = $SQLInsert."md5('".$txtpassword2."'),";
	$SQLInsert = $SQLInsert."'".$txtusertype2."');";
    $RSInsert=$con->getrecords($SQLInsert);
}else{
       
		header('HTTP/1.1 500 Error!');
		exit();
	}
}





if ($TypeID=="DeleteData") { 
    $accountid = filter_var($_POST["accountid"],FILTER_SANITIZE_STRING, FILTER_FLAG_STRIP_HIGH); 
    $DeleteSQL="DELETE from tblaccount WHERE AccountID=".$accountid;
    $RSDelete=$con->getrecords($DeleteSQL);
}
?>



