<?php 
include_once('../class/clsConnection.php');
include('../includes/variable.php');
include('../session.php');
include('../sessionuser.php');
	$con = new mycon();
	$con->getconnect();
$id=$_GET['ID'];
$index=$_GET['index'];
$SQL="SELECT * FROM `tblvalidation`
INNER JOIN `tblvalidationdetails` ON `tblvalidationdetails`.`validationID`=`tblvalidation`.`validationID`
INNER JOIN `tblaccount` ON `tblaccount`.`AccountID` = `tblvalidationdetails`.`ConcernedPersons`
WHERE `tblvalidationdetails`.`validationID`=".$id." AND StandardNo=".$index;
$GetValidation=$con->getrecords($SQL);
$RS=$con->getresult($GetValidation);

error_reporting(E_ERROR | E_PARSE);?>