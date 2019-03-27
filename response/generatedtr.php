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


if ($TypeID=="UploadData") {
if(isset($_POST["filepath"]) && strlen($_POST["filepath"])>0) 
{	 
	$filepath = filter_var($_POST["filepath"],FILTER_SANITIZE_STRING, FILTER_FLAG_STRIP_HIGH);
	
$exec = "DELETE FROM tblimportdtr;
		 DELETE FROM tmpdtr;
		 LOAD DATA INFILE '".$pathdomain."server/php/files/".$filepath."' INTO TABLE tblimportdtr
		 FIELDS TERMINATED BY '\t'
	     (tblimportdtr.`EmployeeCode`,`tblimportdtr`.`importdtr_date`,`tblimportdtr`.`device_id`,`tblimportdtr`.`time_in`,`tblimportdtr`.`time_out`,`tblimportdtr`.`unknown`);
	     CALL spGenerateDTR('2019-02-01','2019-02-28');
	     CALL RecomputeTmpDtr(1,1);";
$RSInsert=$con->getrecords($exec);
echo $exec;	
}else{
		header('HTTP/1.1 500 Error!');
		exit();
	}
}
?>



