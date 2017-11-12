<?php include_once('class/clsConnection.php'); 
	  include('session.php');
	  include('authenticate.php');
	  include('includes/variable.php');
	  //initialize the session
$con = new mycon();
$con->getconnect();	  


if (!isset($_SESSION)) {
  session_start();
}
error_reporting(E_ERROR | E_PARSE);
?>