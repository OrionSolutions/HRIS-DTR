<?php 
include_once('class/clsConnection.php');
include('includes/variable.php');
include('session.php');
include('sessionuser.php');
	$con = new mycon();
	$con->getconnect();


error_reporting(E_ERROR | E_PARSE);?>