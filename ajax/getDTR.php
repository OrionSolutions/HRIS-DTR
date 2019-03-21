<?php
include('../includes/config.php');

$query="SELECT `tmpdtr`.`tmpDTRID`,`tmpdtr`.`EmployeeID` , CONCAT(`tblemployee`.`Lastname`,', ',`tblemployee`.`Firstname`,' ',`tblemployee`.`Middlename`) AS Fullname,`tbltimeconfiguration`.`TimeID`,
`tmpdtr`.`dtrDate` , `tmpdtr`.`TimeInAM`,`tmpdtr`.`TimeOutAM`,`tmpdtr`.`TimeInPM`,`tmpdtr`.`TimeOutPM`,`tmpdtr`.`TimeInOT`,`tmpdtr`.`TimeOutOT`,
IF((TIME_TO_SEC(TIMEDIFF(`tmpdtr`.`TimeInAM`,`tbltimeconfiguration`.`MorningIn`))/3600) < 0,0,TIMEDIFF(`tmpdtr`.`TimeInAM`,`tbltimeconfiguration`.`MorningIn`)) AS LateMorning,
IF((TIME_TO_SEC(TIMEDIFF(`tmpdtr`.`TimeOutAM`,`tbltimeconfiguration`.`AfternoonIn`))/3600) < 0,0,TIMEDIFF(`tmpdtr`.`TimeOutAM`,`tbltimeconfiguration`.`AfternoonIn`)) AS MorningOutLate,
IF((TIME_TO_SEC(TIMEDIFF(`tmpdtr`.`TimeInPM`,`tbltimeconfiguration`.`AfternoonIn`))/3600) < 0,0,TIMEDIFF(`tmpdtr`.`TimeInPM`,`tbltimeconfiguration`.`AfternoonIn`)) AS AfternoonInLate,
IF((TIME_TO_SEC(TIMEDIFF(`tbltimeconfiguration`.`AfternoonOut`,`tmpdtr`.`TimeOutPM`))/3600) < 0,0,TIMEDIFF(`tbltimeconfiguration`.`AfternoonOut`,`tmpdtr`.`TimeOutPM`)) AS AfternoonOutLate
FROM `tmpdtr`
INNER JOIN `tblemployee`
ON `tmpdtr`.`EmployeeID` = `tblemployee`.`BiometricID`
INNER JOIN `tbltimeconfiguration`
ON `tbltimeconfiguration`.`TimeID` = `tblemployee`.`TimeID`
ORDER BY EmployeeID";
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
