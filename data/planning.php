<?php 
include_once('class/clsConnection.php');
include('includes/variable.php');
include('session.php');
include('sessionuser.php');
	$con = new mycon();
	$con->getconnect();

$SQL="SELECT AccountID,CONCAT(`tblaccount`.`Lastname`,', ',`tblaccount`.`Firstname`) AS ConcernedPersonnel FROM tblaccount WHERE UserType<>'Admin' ORDER BY ConcernedPersonnel DESC";
$GetPersonnel=$con->getrecords($SQL);

$SQL="SELECT * from tblstandards";
$GetStandards=$con->getrecords($SQL);

$SQL="SELECT * from tblstandards";
$GetStandards2=$con->getrecords($SQL);

$SQL="SELECT * from tblstandards";
$GetStandards3=$con->getrecords($SQL);

$SQL="SELECT AccountID,CONCAT(`tblaccount`.`Lastname`,', ',`tblaccount`.`Firstname`) AS ConcernedPersonnel FROM tblaccount WHERE UserType<>'Admin' ORDER BY ConcernedPersonnel DESC";
$GetPersonnel2=$con->getrecords($SQL);

error_reporting(E_ERROR | E_PARSE);?>