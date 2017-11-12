<?php
include_once('class/clsConnection.php'); 
?>
<?php
//include('class/clsConnection.php');
// *** Validate request to login to this site.
if (!isset($_SESSION)) {
  session_start();
}

$loginFormAction = $_SERVER['PHP_SELF'];
if (isset($_GET['accesscheck'])) {
  $_SESSION['PrevUrl'] = $_GET['accesscheck'];
}

if (isset($_POST['txtusername'])) {
  $loginUsername=$_POST['txtusername'];
  $password=$_POST['txtpassword'];
  $syear=$_POST['syear'];
  $sterm=$_POST['sterm'];
  $MM_fldUserAuthorization = "";
  $MM_redirectLoginSuccess = "index.php";
  $MM_redirectLoginFailed = "login.php";
  $MM_redirecttoReferrer = false;
  $con = new mycon;
  $con->getconnect();
	 $LoginRS__query="SELECT `AccountID`,`UserType`,`Username`,`Password` FROM `tblaccount` WHERE `Username`='".$loginUsername."' AND `Password`=md5('".$password."') AND `Username`<>'Employee'";
  $LoginRS = $con->getrecords($LoginRS__query);
  $loginFoundUser = mysqli_num_rows($LoginRS);
  if ($loginFoundUser) {
     $loginStrGroup = "";
    //declare two session variables and assign them
	$rowEdit = $con->getresult($LoginRS);
	if ($rowEdit["UserType"]=="Admin") {
	$_SESSION["USER_ID"] = $rowEdit["AccountID"];
	$_SESSION["USER_TYPE"] = $rowEdit["UserType"];
	$_SESSION['USER_NAME'] = $loginUsername;
	$MM_redirectLoginSuccess = "index.php";
	}else{
	$_SESSION["USER_ID"] = $rowEdit["AccountID"];
	$_SESSION["USER_TYPE"] = $rowEdit["UserType"];
	$_SESSION['USER_NAME'] = $loginUsername;
  $MM_redirectLoginSuccess = "index.php";
	}
    $_SESSION['MM_UserGroup'] = $loginStrGroup;
	$_SESSION['LoginFailed']="";
    if (isset($_SESSION['PrevUrl']) && false) {
      $MM_redirectLoginSuccess = $_SESSION['PrevUrl'];	
    }
    header("Location: " . $MM_redirectLoginSuccess );
	$_SESSION['LoginFailed']="";
  }
  else {
    header("Location: ". $MM_redirectLoginFailed );
	$_SESSION['LoginFailed']="Login Failed";
  }
}
?>


