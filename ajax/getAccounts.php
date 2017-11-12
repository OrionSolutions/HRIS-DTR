<?php
include('../includes/config.php');

$query="SELECT * FROM `tblaccount`
INNER JOIN `tbldepartment` ON `tbldepartment`.`DepartmentID`=`tblaccount`.`DepartmentID`
INNER JOIN `tbloccupation` ON `tbloccupation`.`OccupationID`=`tblaccount`.`OccupationID`
INNER JOIN `tblsubjectarea` ON `tblsubjectarea`.`SubjectID` = `tblsubjectarea`.`SubjectID`
WHERE UserType<>'Admin' GROUP BY `tblaccount`.`AccountID`";
$result = $mysqli->query($query) or die($mysqli->error.__LINE__);

$arr = array();
if($result->num_rows > 0) {
	while($row = $result->fetch_assoc()) {
		$arr[] = $row;	
	}
}
# JSON-encode the response
$json_response = json_encode($arr);

// # Return the response
echo $json_response;
?>
