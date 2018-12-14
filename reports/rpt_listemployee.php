<?php include('../data/rpt_listemployee.php');?>
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
		<h6 style="text-align:center">List Of Employees</h6>
		<h6 style="text-align:center">Department <?php echo $search; ?></h6>		
	</div>

<table class="table table-condensed" border="0">
	<thead>
	<tr>
		<th><h6>Employee Code</h6></th>
		<th><h6>Employee Name</h6></th>
		<th><h6>Department</h6></th>
		<th><h6>Address</h6></th>
		<th><h6>Contact</h6></th>
		<th><h6>Gender</h6></th>
	</thead>
	<tbody>


<?php 
$counter=0;
while($RSData = mysqli_fetch_assoc($GetSQL)) { 

?>

<tr>
<td>
	<h6 width="10%"><?php echo $RSData["EmployeeCode"];?></h6>
</td>

<td>
	<h6 width="20%"><?php echo $RSData["Firstname"].", ".$RSData["Firstname"]." ".$RSData["Middlename"];?></h6>
</td>

<td>
	<h6 width="15%"><?php echo $RSData["DepartmentName"];?></h6>
</td>

<td>
	<h6 width="25%"><?php echo $RSData["Address"];?></h6>
</td>

<td>
	<h6 width="15%"><?php echo $RSData["ContactNumber"];?></h6>
</td>

<td>
	<h6 width="15%"><?php echo $RSData["Gender"];?></h6>
</td>

</tr>

<?php 

}

?>


<tr>
<td>
	<h5></h5>
</td>

<td>
	<h5></h5>
</td>


<td>
	<h5></h5>
</td>

<td>
	<h5><?php echo 'Total : '.$RSCounts["TotalRow"];?></h5>
</td>

</tr>



</tbody>
</table>

</div>
<script type="text/javascript">
window.print();
</script>
</body>

</html>