<?php include('../data/rpt_listtardiness.php');?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>
		<?php echo $title;?>
	</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=Edge">
	<meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
	<script type="text/javascript" src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
	<script type="text/javascript" src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
	<link href="https://fonts.googleapis.com/css?family=Montserrat" rel="stylesheet">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <!-- Favicon-->
    <link rel="icon" href="favicon.ico" type="image/x-icon">
    <?php include('header.php'); ?>
</head>

<body>

<div class="row-clearfix">
	<div class="col-lg-12">
		<h3 style="text-align:center">Zamboanga City Integrated Port Services Inc.</h3>	
		<h6 style="text-align:center">Port Area Zamboanga City.</h6>	
		<div class="space-20"></div>
		<h6 style="text-align:center">Tardiness Report</h6>
		<h6 style="text-align:center">For the date of  <?php echo $startDate. "-" . $endDate; ?></h6>		
	</div>

<?php 

if($type=="Count") {


?>	


<table class="table table-condensed" border="0">
	<thead>
	<tr>
		<th><h6>Employee ID</h6></th>
		<th><h6>Employee Name</h6></th>
		<th><h6>DTR Date</h6></th>
		<th><h6>Morning In</h6></th>
		<th><h6>Morning Out</h6></th>
		<th><h6>Afternoon In</h6></th>
		<th><h6>Afternoon Out</h6></th>
		<th><h6>OT In</h6></th>
		<th><h6>OT Out</h6></th>
		<th><h6># of Lates</h6></th>

	</thead>
	<tbody>


<?php 
$counter=0;
while($RSData = mysqli_fetch_assoc($GetSQL)) { 

?>

<tr>
<td>
	<h6 width="10%"><?php echo $RSData["employee_id"];?></h6>
</td>

<td>
	<h6 width="20%"><?php echo $RSData["fullname"]?></h6>
</td>

<td>
	<h6 width="15%"><?php echo $RSData["dtr_date"];?></h6>
</td>

<td>
	<h6 width="25%"><?php echo $RSData["timein_am"];?></h6>
</td>

<td>
	<h6 width="15%"><?php echo $RSData["timeout_am"];?></h6>
</td>

<td>
	<h6 width="15%"><?php echo $RSData["timein_pm"];?></h6>
</td>

<td>
	<h6 width="15%"><?php echo $RSData["timeout_pm"];?></h6>
</td>

<td>
	<h6 width="15%"><?php echo $RSData["timein_ot"];?></h6>
</td>

<td>
	<h6 width="15%"><?php echo $RSData["timeout_ot"];?></h6>
</td>

<td>
	<h6 width="15%"><?php echo $RSData["cnt"];?></h6>
</td>

</td>

</tr>

<?php 

}

}else{
?>


<table class="table table-condensed" border="0">
	<thead>
	<tr>
		<th><h6>Employee ID</h6></th>
		<th><h6>Employee Name</h6></th>
		<th><h6>DTR Date</h6></th>
		<th><h6>Morning In</h6></th>
		<th><h6>Morning Out</h6></th>
		<th><h6>Afternoon In</h6></th>
		<th><h6>Afternoon Out</h6></th>
		<th><h6>OT In</h6></th>
		<th><h6>OT Out</h6></th>
		<th><h6>Late Morning In</h6></th>
		<th><h6>Late Morning Out</h6></th>
		<th><h6>Late Afternoon In</h6></th>
		<th><h6>Late Afternoon Out</h6></th>
	</thead>
	<tbody>


<?php 
$counter=0;
while($RSData = mysqli_fetch_assoc($GetSQL)) { 

?>

<tr>
<td>
	<h6 width="10%"><?php echo $RSData["employee_id"];?></h6>
</td>

<td>
	<h6 width="20%"><?php echo $RSData["fullname"]?></h6>
</td>

<td>
	<h6 width="15%"><?php echo $RSData["dtr_date"];?></h6>
</td>

<td>
	<h6 width="25%"><?php echo $RSData["timein_am"];?></h6>
</td>

<td>
	<h6 width="15%"><?php echo $RSData["timeout_am"];?></h6>
</td>

<td>
	<h6 width="15%"><?php echo $RSData["timein_pm"];?></h6>
</td>

<td>
	<h6 width="15%"><?php echo $RSData["timeout_pm"];?></h6>
</td>

<td>
	<h6 width="15%"><?php echo $RSData["timein_ot"];?></h6>
</td>

<td>
	<h6 width="15%"><?php echo $RSData["timeout_ot"];?></h6>
</td>

<td>
	<h6 width="15%"><?php echo $RSData["late_morning"];?></h6>
</td>

<td>
	<h6 width="15%"><?php echo $RSData["morningout_late"];?></h6>
</td>

<td>
	<h6 width="15%"><?php echo $RSData["afternoonin_late"];?></h6>
</td>

<td>
	<h6 width="15%"><?php echo $RSData["afternoonout_late"];?></h6>
</td>

</tr>

<?php 

}

}

?>


</tbody>
</table>

</div>
<script type="text/javascript">
window.print();
</script>
</body>

</html>