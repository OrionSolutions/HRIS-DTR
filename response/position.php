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
if(isset($_POST["txtpositiontitle"]) && strlen($_POST["txtpositiontitle"])>0) 
{	 
    $txtpositiontitle = filter_var($_POST["txtpositiontitle"],FILTER_SANITIZE_STRING, FILTER_FLAG_STRIP_HIGH);
    $txtpositiondesc = filter_var($_POST["txtpositiondesc"],FILTER_SANITIZE_STRING, FILTER_FLAG_STRIP_HIGH); 
    $positionID = filter_var($_POST["positionid"],FILTER_SANITIZE_STRING, FILTER_FLAG_STRIP_HIGH);

    $UpdateSQL="UPDATE tblposition SET";
	$UpdateSQL=$UpdateSQL."`PositionTitle`='".$txtpositiontitle."',";
	$UpdateSQL=$UpdateSQL."`PositionDesc`='".$txtpositiondesc."'";
    $UpdateSQL=$UpdateSQL." WHERE `PositionID`='".$positionID."';";
    
    $RSInsert=$con->getrecords($UpdateSQL);

}else{
		header('HTTP/1.1 500 Error!');
		exit();
	}
}



if ($TypeID=="SaveData") {
if(isset($_POST["txtpositiontitle2"]) && strlen($_POST["txtpositiontitle2"])>0) 
{	 
	$txtpositionName = filter_var($_POST["txtpositiontitle2"],FILTER_SANITIZE_STRING, FILTER_FLAG_STRIP_HIGH);
	$txtpositionDesc = filter_var($_POST["txtpositiondesc2"],FILTER_SANITIZE_STRING, FILTER_FLAG_STRIP_HIGH); 

    $SQLInsert ="INSERT INTO `tblposition`(`PositionTitle`,`PositionDesc`)";
	$SQLInsert = $SQLInsert." VALUES('".$txtpositionName."',";
	$SQLInsert = $SQLInsert."'".$txtpositionDesc."');";
    $RSInsert=$con->getrecords($SQLInsert);
}else{
       
		header('HTTP/1.1 500 Error!');
		exit();
	}
}





if ($TypeID=="DeleteData") { 
    $positionID = filter_var($_POST["positionid"],FILTER_SANITIZE_STRING, FILTER_FLAG_STRIP_HIGH); 
    $DeleteSQL="DELETE from tblposition WHERE PositionID=".$positionID;
    $RSDelete=$con->getrecords($DeleteSQL);
}
?>



