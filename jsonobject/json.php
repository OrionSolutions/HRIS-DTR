<?php
include "../includes/config.php";
error_reporting(0);
$data=array();
$tables = $_GET["tables"];
$id=$_GET["id"];
$index=$_GET["index"];
switch ($tables) {

case "tblemployee":
$q=mysqli_query($con,"SELECT * FROM tblemployee
WHERE `tblemployee`.`EmployeeID`=".$id." GROUP BY `tblemployee`.`EmployeeID` DESC");	
break;

case "tbldepartment":
$q=mysqli_query($con,"SELECT * FROM tbldepartment
WHERE `tbldepartment`.`DepartmentID`=".$id." GROUP BY `tbldepartment`.`DepartmentID` DESC");	
break;

case "tblposition":
$q=mysqli_query($con,"SELECT * FROM tblposition
WHERE `tblposition`.`PositionID`=".$id." GROUP BY `tblposition`.`PositionID` DESC");	
break;

case "tblvalidationdetails":
$q=mysqli_query($con,"SELECT * FROM `tblvalidationdetails`
WHERE `tblvalidationdetails`.`validationID`=".$id." AND StandardNo=".$index." GROUP BY `tblvalidationdetails`.`validationID` DESC");	
break;
}

while ($row=mysqli_fetch_object($q)){
 $data[]=$row;
}
echo json_encode($data);
?>