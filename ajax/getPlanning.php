<?php
include('../includes/config.php');
if (!isset($_SESSION)) {
  session_start();
}

$query="SELECT `tblvalidation`.`validationID`,`tblvalidation`.`PlanningTime`,`tblvalidation`.`OrganizationActivity`,CONCAT(`tblaccount`.`Lastname`,', ',`tblaccount`.`Firstname`) AS Validator,
`tblvalidation`.`StandardNo1`,`tblvalidation`.`StandardNo2`,`tblvalidation`.`StandardNo3`,`tblvalidation`.`Standard1`,`tblvalidation`.`Standard2`,`tblvalidation`.`Standard3`,`tblvalidation`.`ConcernedPersonel`,`tblvalidation`.`Standard1Desc`,`tblvalidation`.`Standard2Desc`,`tblvalidation`.`Standard3Desc`,IF(`Status`=1,'Posted','Pending') AS `Status` 
FROM `tblvalidation`
INNER JOIN `tblaccount` ON `tblaccount`.`AccountID` = `tblvalidation`.`AccountID`
WHERE `tblvalidation`.`SchoolYearID`=".$_SESSION['SYEAR']." AND `tblvalidation`.`SemesterID`=".$_SESSION['STERM']." AND `tblvalidation`.`AccountID`=".$_SESSION["USER_ID"];
$result = $mysqli->query($query) or die($mysqli->error.__LINE__);

$arr = array();
$i=0;
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
