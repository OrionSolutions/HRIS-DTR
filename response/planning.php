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
$x = 1;


/************************************************************************************
************************ planning.php Module
*************************************************************************************/	

if ($TypeID=="SaveData") {
if(isset($_POST["txtdatetime"]) && strlen($_POST["txtdatetime"])>0) 
{	 
	$str_time = filter_var($_POST["txtdatetime"],FILTER_SANITIZE_STRING, FILTER_FLAG_STRIP_HIGH); 
	$curdate = date('Y-m-d');
	$date = new DateTime($curdate." ".$str_time);
	$txtdatetime = $date->format('Y-m-d H:i:s');
	$txtorganization = filter_var($_POST["txtorganization"],FILTER_SANITIZE_STRING, FILTER_FLAG_STRIP_HIGH); 
	$txtconcerned = filter_var($_POST["txtconcerned"],FILTER_SANITIZE_STRING, FILTER_FLAG_STRIP_HIGH); 
	$cbostandard1 =filter_var($_POST["cbostandard1"],FILTER_SANITIZE_STRING, FILTER_FLAG_STRIP_HIGH); 
	$txtstandard1= filter_var($_POST["txtstandard1"],FILTER_SANITIZE_STRING, FILTER_FLAG_STRIP_HIGH); 
	$cbostandard2 = filter_var($_POST["cbostandard2"],FILTER_SANITIZE_STRING, FILTER_FLAG_STRIP_HIGH); 
	$txtstandard2 = filter_var($_POST["txtstandard2"],FILTER_SANITIZE_STRING, FILTER_FLAG_STRIP_HIGH); 
	$cbostandard3= filter_var($_POST["cbostandard3"],FILTER_SANITIZE_STRING, FILTER_FLAG_STRIP_HIGH); 
	$txtstandard3 = filter_var($_POST["txtstandard3"],FILTER_SANITIZE_STRING, FILTER_FLAG_STRIP_HIGH); 
	$AccountID =filter_var(	$_SESSION["USER_ID"],FILTER_SANITIZE_STRING, FILTER_FLAG_STRIP_HIGH); 
	$SYear= filter_var(	$_SESSION["SYEAR"],FILTER_SANITIZE_STRING, FILTER_FLAG_STRIP_HIGH); 
	$STerm = filter_var( $_SESSION["STERM"],FILTER_SANITIZE_STRING, FILTER_FLAG_STRIP_HIGH); 

    $SQLInsert ="INSERT INTO `tblvalidation`(`PlanningTime`,`OrganizationActivity`,`AccountID`,`ConcernedPersonel`,`Standard1`,`Standard2`,`Standard3`,`Standard1Desc`,`Standard2Desc`,
	`Standard3Desc`,`SchoolYearID`,`SemesterID`)";
	$SQLInsert = $SQLInsert." VALUES('".$txtdatetime."',";
	$SQLInsert = $SQLInsert."'".$txtorganization."',";
	$SQLInsert = $SQLInsert."'".$AccountID."',";
	$SQLInsert = $SQLInsert."'".$txtconcerned."',";
	$SQLInsert = $SQLInsert."'".trim($cbostandard1)."',";
	$SQLInsert = $SQLInsert."'".trim($cbostandard2)."',";
	$SQLInsert = $SQLInsert."'".trim($cbostandard3)."',";
	$SQLInsert = $SQLInsert."'".$txtstandard1."',";
	$SQLInsert = $SQLInsert."'".$txtstandard2."',";
	$SQLInsert = $SQLInsert."'".$txtstandard3."',";
	$SQLInsert = $SQLInsert."'".$SYear."',";	
	$SQLInsert = $SQLInsert."'".$STerm."');";
	$RSInsert=$con->getrecords($SQLInsert);
	$SQLGetLast = "SELECT MAX(validationID) AS ValidationID from tblvalidation";
	$RSLast=$con->getrecords($SQLGetLast);
	$RowLast=$con->getresult($RSLast);


	while($x<=3) {
	$SQLInsert2 = "INSERT INTO tblvalidationdetails(validationID,StandardNo)";
	$SQLInsert2 = $SQLInsert2." VALUES('".$RowLast['ValidationID']."',".$x.")";
	$RSInsert=$con->getrecords($SQLInsert2);
	$x++;
	//echo $x;
	}


}else{
		header('HTTP/1.1 500 Error!');
		exit();
	}
}


if ($TypeID=="UpdateData") {
if(isset($_POST["txtassessment"]) && strlen($_POST["txtassessment"])>0) 
{	 
    $txtaccountid = filter_var($_POST["txtaccountid"],FILTER_SANITIZE_STRING, FILTER_FLAG_STRIP_HIGH); 
	$txtassessment = filter_var($_POST["txtassessment"],FILTER_SANITIZE_STRING, FILTER_FLAG_STRIP_HIGH); 
	$txtdocuments = filter_var($_POST["txtdocuments"],FILTER_SANITIZE_STRING, FILTER_FLAG_STRIP_HIGH); 
	$froala = $_POST["froala-editor"]; 
	$txtobservation =filter_var($_POST["txtobservation"],FILTER_SANITIZE_STRING, FILTER_FLAG_STRIP_HIGH); 
	$cbopersonnel2= filter_var($_POST["cbopersonnel2"],FILTER_SANITIZE_STRING, FILTER_FLAG_STRIP_HIGH); 
    $UpdateSQL="UPDATE tblvalidationdetails SET";
	$UpdateSQL=$UpdateSQL."`ConcernedPersons`='".$cbopersonnel2."',";
	$UpdateSQL=$UpdateSQL."`PlannedQuestions`='".$froala."',";
	$UpdateSQL=$UpdateSQL."`AssesmentIssue`='".$txtassessment."',";
	$UpdateSQL=$UpdateSQL."`DocumentsNeeded`='".$txtdocuments."',";
	$UpdateSQL=$UpdateSQL."`ObservationsNeeded`='".$txtobservation."' ";
	$UpdateSQL=$UpdateSQL."WHERE `validationDetailsID`='".$txtaccountid."';";
	
	
	$RSInsert=$con->getrecords($UpdateSQL);
}else{
		header('HTTP/1.1 500 Error!');
		exit();
	}
}
?>



