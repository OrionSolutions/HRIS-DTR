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
if(isset($_POST["txtmorningin"]) && strlen($_POST["txtmorningin"])>0) 
{	 
    $morningin = filter_var($_POST["txtmorningin"],FILTER_SANITIZE_STRING, FILTER_FLAG_STRIP_HIGH);
	$afternoonout = filter_var($_POST["txtafternoonout"],FILTER_SANITIZE_STRING, FILTER_FLAG_STRIP_HIGH); 
	$afternoonin = filter_var($_POST["txtafternoonin"],FILTER_SANITIZE_STRING, FILTER_FLAG_STRIP_HIGH);
	$morningout = filter_var($_POST["txtmorningout"],FILTER_SANITIZE_STRING, FILTER_FLAG_STRIP_HIGH); 
	$overtimein = filter_var($_POST["txtovertimein"],FILTER_SANITIZE_STRING, FILTER_FLAG_STRIP_HIGH);
	$overtimeout = filter_var($_POST["txtovertimeout"],FILTER_SANITIZE_STRING, FILTER_FLAG_STRIP_HIGH); 
	$TimeID = filter_var($_POST["timeid"],FILTER_SANITIZE_STRING, FILTER_FLAG_STRIP_HIGH); 

    $UpdateSQL="UPDATE tbltimeconfiguration SET";
	$UpdateSQL=$UpdateSQL."`MorningIn`='".$morningin."',";
	$UpdateSQL=$UpdateSQL."`AfternoonOut`='".$afternoonout."',";
	$UpdateSQL=$UpdateSQL."`AfternoonIn`='".$afternoonin."',";
	$UpdateSQL=$UpdateSQL."`MorningOut`='".$morningout."',";
	$UpdateSQL=$UpdateSQL."`Overtimein`='".$overtimein."',";
	$UpdateSQL=$UpdateSQL."`Overtimeout`='".$overtimeout."'";
    $UpdateSQL=$UpdateSQL." WHERE `TimeID`='".$TimeID."';";
    //echo $TimeID;
    $RSInsert=$con->getrecords($UpdateSQL);

}else{
		header('HTTP/1.1 500 Error!');
		exit();
	}
}



if ($TypeID=="SaveData") {
if(isset($_POST["txtmorningin2"]) && strlen($_POST["txtmorningin2"])>0) 
{	 
	$morningin = filter_var($_POST["txtmorningin2"],FILTER_SANITIZE_STRING, FILTER_FLAG_STRIP_HIGH);
	$afternoonout = filter_var($_POST["txtafternoonout2"],FILTER_SANITIZE_STRING, FILTER_FLAG_STRIP_HIGH); 
	$afternoonin = filter_var($_POST["txtafternoonin2"],FILTER_SANITIZE_STRING, FILTER_FLAG_STRIP_HIGH);
	$morningout = filter_var($_POST["txtmorningout2"],FILTER_SANITIZE_STRING, FILTER_FLAG_STRIP_HIGH); 

	$overtimein = filter_var($_POST["txtovertimein2"],FILTER_SANITIZE_STRING, FILTER_FLAG_STRIP_HIGH);
	$overtimeout = filter_var($_POST["txtovertimeout2"],FILTER_SANITIZE_STRING, FILTER_FLAG_STRIP_HIGH); 
	

    $SQLInsert ="INSERT INTO `tbltimeconfiguration`(`MorningIn`,`MorningOut`,`AfternoonIn`,`AfternoonOut`,`Overtimein`,`Overtimeout`)";
	$SQLInsert = $SQLInsert." VALUES('".$morningin."',";
	$SQLInsert = $SQLInsert."'".$morningout."',";
	$SQLInsert = $SQLInsert."'".$afternoonin."',";
	$SQLInsert = $SQLInsert."'".$afternoonout."',";
	$SQLInsert = $SQLInsert."'".$overtimein."',";
	$SQLInsert = $SQLInsert."'".$overtimeout."');";
	//echo $SQLInsert;
    $RSInsert=$con->getrecords($SQLInsert);
}else{
       
		header('HTTP/1.1 500 Error!');
		exit();
	}
}





if ($TypeID=="DeleteData") { 
    $TimeID = filter_var($_POST["timeid"],FILTER_SANITIZE_STRING, FILTER_FLAG_STRIP_HIGH); 
    $DeleteSQL="DELETE from tbltimeconfiguration WHERE TimeID=".$TimeID;
    $RSDelete=$con->getrecords($DeleteSQL);
}
?>



