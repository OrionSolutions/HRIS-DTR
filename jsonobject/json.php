<?php
include "../includes/config.php";
$data=array();
$tables = $_GET["tables"];
$id=$_GET["id"];
$index=$_GET["index"];
switch ($tables) {
case "tblaccount":
$q=mysqli_query($con,"SELECT * FROM `tblaccount`
INNER JOIN `tbldepartment` ON `tbldepartment`.`DepartmentID`=`tblaccount`.`DepartmentID`
INNER JOIN `tbloccupation` ON `tbloccupation`.`OccupationID`=`tblaccount`.`OccupationID`
INNER JOIN `tblsubjectarea` ON `tblsubjectarea`.`SubjectID` = `tblsubjectarea`.`SubjectID`
WHERE `tblaccount`.`AccountID`=".$id." GROUP BY `tblaccount`.`AccountID` DESC");	
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