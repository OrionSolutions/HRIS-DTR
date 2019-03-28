<?php
include_once('../class/clsConnection.php');
include('../class/clsCombo.php');
include('../includes/variable.php');
$con = new  mycon();
$con->getconnect();
$TypeID=$_GET['TypeID'];
ini_set('max_execution_time', 0);
if (!isset($_SESSION)) {
  session_start();
}


/************************************************************************************
************************ user-module.php Module
*************************************************************************************/	


if ($TypeID=="UploadData") {
if(isset($_POST["filepath"]) && strlen($_POST["filepath"])>0) 
{	 
	$filepath = filter_var($_POST["filepath"],FILTER_SANITIZE_STRING, FILTER_FLAG_STRIP_HIGH);
	$txtStart = filter_var($_POST["startDate"],FILTER_SANITIZE_STRING, FILTER_FLAG_STRIP_HIGH);
	$txtEnd = filter_var($_POST["endDate"],FILTER_SANITIZE_STRING, FILTER_FLAG_STRIP_HIGH);
	//$txtStart=date_format($txtStart,"Y-m-d");
	//$txtEnd=date_format($txtEnd,"Y-m-d");
$exec = "DELETE FROM tblimportdtr;";
$RSInsert=$con->getrecords($exec);
$exec = "DELETE FROM tmpdtr;";
$RSInsert=$con->getrecords($exec);
$ss = str_replace('\\', '/', dirname(__DIR__)).'/';
$exec= "LOAD DATA INFILE '". $ss . "/server/php/" . "files/" .$filepath."' INTO TABLE tblimportdtr
FIELDS TERMINATED BY '\t'
(tblimportdtr.`EmployeeCode`,`tblimportdtr`.`importdtr_date`,`tblimportdtr`.`device_id`,`tblimportdtr`.`time_in`,`tblimportdtr`.`time_out`,`tblimportdtr`.`unknown`);";
$RSInsert=$con->getrecords($exec);
$exec ="CALL spGenerateDTR('".$txtStart."','".$txtEnd."');";
$result = mysqli_query($cons, 
$exec);
echo $exec;	
//$execs = "CALL RecomputeTmpDtr(1,1);";
//$result2 = mysqli_query($cons2, 
//$execs);

}else{
		header('HTTP/1.1 500 Error!');
		exit();
	}
}
?>



