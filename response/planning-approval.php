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
************************ planning-approval.php Module
*************************************************************************************/	


if ($TypeID=="ApprovedData") { 
    $txtaccountid = filter_var($_POST["txtaccountid"],FILTER_SANITIZE_STRING, FILTER_FLAG_STRIP_HIGH); 
    $DeleteSQL="UPDATE tblvalidation SET `Status`=1 WHERE validationID=".$txtaccountid;
    $RSDelete=$con->getrecords($DeleteSQL);
}



if ($TypeID=="DeleteData") { 
    $txtaccountid = filter_var($_POST["txtaccountid"],FILTER_SANITIZE_STRING, FILTER_FLAG_STRIP_HIGH); 
    $DeleteSQL="DELETE from tblvalidation WHERE validationID=".$txtaccountid;
    $RSDelete=$con->getrecords($DeleteSQL);
}



?>



