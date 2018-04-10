<?php include('data/employee.php');?>
<!DOCTYPE html>
<html ng-app="listemployees" lang="en">
<head>
    <title>
		<?php echo $title;?>
	</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=Edge">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <!-- Favicon-->
    <link rel="icon" href="favicon.ico" type="image/x-icon">

    <?php include('header.php'); ?>
</head>

<body class="theme-red">
    <!-- Page Loader -->
    <div class="page-loader-wrapper">
        <div class="loader">
            <div class="preloader">
                <div class="spinner-layer pl-red">
                    <div class="circle-clipper left">
                        <div class="circle"></div>
                    </div>
                    <div class="circle-clipper right">
                        <div class="circle"></div>
                    </div>
                </div>
            </div>
            <p>Please wait...</p>
        </div>
    </div>
    <!-- #END# Page Loader -->
    <!-- Overlay For Sidebars -->
    <div class="overlay"></div>
    <!-- #END# Overlay For Sidebars -->
    <!-- Top Bar -->
    <nav class="navbar">
        <div class="container-fluid">
            <div class="navbar-header">
                <a href="javascript:void(0);" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar-collapse" aria-expanded="false"></a>
                <a href="javascript:void(0);" class="bars"></a>
                <a class="navbar-brand" href="index.html">ZCIPSI HRIS-SYSTEM</a>
            </div>
            <div class="collapse navbar-collapse" id="navbar-collapse">
                <ul class="nav navbar-nav navbar-right">
                    <li class="pull-right"><a href="javascript:void(0);" class="js-right-sidebar" data-close="true"><i class="material-icons">more_vert</i></a></li>
                </ul>
            </div>
        </div>
    </nav>
    <!-- #Top Bar -->
    <section>
        <!-- Left Sidebar -->
      <?php include('left.php'); ?>
        <!-- #END# Left Sidebar -->
    </section>

    <section class="content">
        <div class="container-fluid">


		<div ng-controller="listofemployeecrtl">
			<div class="wrapper wrapper-white">
				<div class="space-20"></div>
				<h1>Employee Module</h1>
				<div class="space-20"></div>
				<div class="container-fluid">
					<div class="row">
						<div class="col-md-2">Page Size :
							<select ng-model="entryLimit" class="form-control">
								<option>5</option>
								<option>10</option>
								<option>20</option>
								<option>50</option>
								<option>100</option>
							</select>
						</div>
		
						<div class="col-md-4">&nbsp;
							<input type="text" ng-model="search" ng-change="filter()" placeholder="Search" class="form-control"/>
						</div>
					<div class="col-md-4">&nbsp;
							<a type="button" data-toggle="modal" data-target="#myModal2" href="#new-Profile" class="new-Profile sub btn btn-primary btn-block" name="btnNew">Add New Employee <span class="glyphicon glyphicon-pencil"></span></a>
						</div>
					</div>
					<div class="space-30"></div>
				</div>
				<div class="row">
					<div class="col-md-12" ng-show="filteredItems > 0">
						<table class="table table-striped table-bordered">
							<thead>
								<th>EmployeeCode :&nbsp;<a ng-click="sort_by('EmployeeCode');"><i class="glyphicon glyphicon-sort"></i></a>
								</th>
								<th>Last name :&nbsp;<a ng-click="sort_by('Lastname');"><i class="glyphicon glyphicon-sort"></i></a>
								</th>
								<th>First name :&nbsp;<a ng-click="sort_by('Firstname');"><i class="glyphicon glyphicon-sort"></i></a>
								</th>
								<th>Address :&nbsp;<a ng-click="sort_by('Address');"><i class="glyphicon glyphicon-sort"></i></a>
								</th>
								<th>Mobile Number :&nbsp;<a ng-click="sort_by('ContactNumber');"><i class="glyphicon glyphicon-sort"></i></a>
								</th>
								<th>Gender :&nbsp;<a ng-click="sort_by('Gender');"><i class="glyphicon glyphicon-sort"></i></a>
								</th>
								<th>Action
								</th>
							</thead>
							<tbody>
								<tr ng-repeat="data in filtered = (list | filter:search | orderBy : predicate :reverse) | startFrom:(currentPage-1)*entryLimit | limitTo:entryLimit">
									<td>{{data.EmployeeCode}}</td>
									<td>{{data.Lastname}}</td>
									<td>{{data.Firstname}}</td>
									<td>{{data.Address}}</td>
									<td>{{data.ContactNumber}}</td>
									<td>{{data.Gender}}</td>
									<td><a type="button" data-toggle="modal" data-target="#myModal" data-id="{{data.EmployeeID}}" href="#open-Profile" class="open-Profile sub btn btn-primary btn-block" name="btnEdit">Edit <span class="glyphicon glyphicon-pencil"></span></a>
									<a type="button" data-id="{{data.EmployeeID}}" href="#close-Profile" class="close-Profile sub btn btn-warning btn-block" name="btnEdit">Delete <span class="glyphicon glyphicon-alert"></span></a>
									</td>
								</tr>
							</tbody>
						</table>
					</div>
					<div class="col-md-12" ng-show="filteredItems == 0">
						<div class="col-md-12">
							<h4>No Employees found</h4>
						</div>
					</div>
					<div class="col-md-12" ng-show="filteredItems > 0">
						<div pagination="" page="currentPage" on-select-page="setPage(page)" boundary-links="true" total-items="filteredItems" items-per-page="entryLimit" class="pagination-small" previous-text="&laquo;" next-text="&raquo;"></div>
					</div>
					<script src="js/angular.min.js"></script>
					<script src="js/ui-bootstrap-tpls-0.10.0.min.js"></script>
					<script src="app/app.js"></script>
				</div>
			</div>
		</div>
	</div>



    <!-- Modal Update -->
	<div id="myModal" class="modal fade" role="dialog">
		<div class="modal-dialog">

			<!-- Modal content-->
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal">&times;</button>
					<h4 class="modal-title">Update Employee</h4>
				</div>
				<div class="modal-body">

					<div class="space-20"></div>
					<div class="space-20"></div>
					<div class="container">
						<form id="updateform">
						<div class="col-lg-12">
						<div class="space-10"></div>
						<input type="text" class="form-control" placeHolder="Employee Code" id="txtemployeecode" name="txtemployeecode" required><span class="fa fa-info-circle errspan"></span>
					</div>

					<div class="col-lg-4">
						<div class="space-10"></div>
						<input type="text" class="form-control" placeHolder="Lastname" id="txtlastname" name="txtlastname" required><span class="fa fa-info-circle errspan"></span>
					</div>

					<div class="col-lg-4">
						<div class="space-10"></div>
						<input type="text" class="form-control" placeHolder="Firstname" id="txtfirstname" name="txtfirstname" required><span class="fa fa-info-circle errspan"></span>
					</div>
					<div class="col-lg-4">
						<div class="space-10"></div>
						<input type="text" class="form-control" placeHolder="Middle Name" id="txtmiddlename" name="txtmiddlename" required><span class="fa fa-info-circle errspan"></span>
					</div>



					<div class="col-lg-4">
						<div class="space-10"></div>
						<select class="form-control" id="cbocivilstatus" name="cbocivilstatus" required>
							<option value="">[Select Civil Status]</option>
							<option value="Single">Single</option>
							<option value="Married">Married</option>
						</select><span class="fa fa-info-circle errspan"></span>
					</div>
					<div class="col-lg-4">
						<div class="space-10"></div>
						<input type="number" class="form-control" placeHolder="Mobile Number" id="txtmobilenumber" name="txtmobilenumber" required><span class="fa fa-info-circle errspan"></span>
					</div>
					<div class="col-lg-4">
						<div class="space-10"></div>
						<input type="date" class="form-control" placeHolder="Birth Date" id="txtbirthdate" name="txtbirthdate" required><span class="fa fa-info-circle errspan"></span>
					</div>


					<div class="col-lg-12">
						<div class="space-10"></div>
						<input type="text" class="form-control" placeHolder="Address" id="txtaddress" name="txtaddress" required><span class="fa fa-info-circle errspan"></span>
					</div>
					
					<div class="col-lg-12">
						<div class="space-10"></div>
						<select class="form-control" id="cbogender" name="cbogender" required>
							<option value="">[Select Gender]</option>
							<option value="Male">MALE</option>
							<option value="Female">FEMALE</option>
						</select><span class="fa fa-info-circle errspan"></span>
					</div>
					<div class="col-lg-12">
						<div class="space-10"></div>
						<select class="form-control" id="cboposition" name="cboposition" required>
							<option value="">[Select Position]</option>
							<?php while($RS=mysqli_fetch_assoc($GetPosition2)) {?>
							<option value="<?php echo $RS['PositionID'];?>">
							<?php echo  $RS['PositionTitle']; ?>
							</option>
							<?php } ?>
						</select><span class="fa fa-info-circle errspan"></span>
					</div>

					<div class="col-lg-12">
						<div class="space-10"></div>
						<select class="form-control" id="cbodepartment" name="cbodepartment" required>
							<option value="">[Select Department]</option>
							<?php while($RS=mysqli_fetch_assoc($GetDepartment2)) {?>
							<option value="<?php echo $RS['DepartmentID'];?>">
							<?php echo  $RS['DepartmentName']; ?>
							</option>
							<?php } ?>
						</select><span class="fa fa-info-circle errspan"></span>
					</div>

					<div class="col-lg-12">
						<div class="space-10"></div>
						<select class="form-control" id="cbotime" name="cbotime" required>
							<option value="">[Select Time]</option>
							<?php while($RS=mysqli_fetch_assoc($GetTime2)) {?>
							<option value="<?php echo $RS['TimeID'];?>">
							<?php echo "Morning In: ". $RS['MorningIn'] . " - " . "Afternoon Out: " .$RS['AfternoonOut']; ?> |
							<?php echo "Afternoon In : ". $RS['AfternoonIn'] . " - " . "Morning Out: " .$RS['MorningOut']; ?>
							</option>
							<?php } ?>
						</select><span class="fa fa-info-circle errspan"></span>
					</div>

							<div id="mydisplay" class="display">
							
							</div>

							<div class="col-lg-9">

							</div>

							<div class="col-lg-3">
								<div class="space-20"></div>
								<input type="hidden" id="txtaccountid" name="txtaccountid" value="">
								<button class="btn btn-success btn-lg btn-block" id="btnUpdate" name="btnUpdate"><i class="fa fa-envelope"></i> Update</button>
							</div>

						</form>
					</div>


				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
				</div>
				<p id="test"></p>
			</div>
		</div>
	</div>




	<!-- Modal Add -->
	<div id="myModal2" class="modal fade" role="dialog">
		<div class="modal-dialog">

			<!-- Modal content-->
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal">&times;</button>
					<h4 class="modal-title">Add New Employee</h4>
				</div>
				<div class="modal-body">
					<div class="space-20"></div>

					<div class="space-20"></div>
					<div class="container">
						<form id="saveform">
						
							<div class="col-lg-12">
								<div class="space-10"></div>
								<input type="text" class="form-control" placeHolder="Employee Code" id="txtemployeecode2" name="txtemployeecode2" required><span class="fa fa-info-circle errspan"></span>
							</div>

							<div class="col-lg-4">
								<div class="space-10"></div>
								<input type="text" class="form-control" placeHolder="Lastname" id="txtlastname2" name="txtlastname2" required><span class="fa fa-info-circle errspan"></span>
							</div>

							<div class="col-lg-4">
								<div class="space-10"></div>
								<input type="text" class="form-control" placeHolder="Firstname" id="txtfirstname2" name="txtfirstname2" required><span class="fa fa-info-circle errspan"></span>
							</div>
							<div class="col-lg-4">
								<div class="space-10"></div>
								<input type="text" class="form-control" placeHolder="Middle Name" id="txtmiddlename2" name="txtmiddlename2" required><span class="fa fa-info-circle errspan"></span>
							</div>



							<div class="col-lg-4">
								<div class="space-10"></div>
								<select class="form-control" id="cbocivilstatus2" name="cbocivilstatus2" required>
									<option value="">[Select Civil Status]</option>
									<option value="Single">Single</option>
									<option value="Married">Married</option>
								</select><span class="fa fa-info-circle errspan"></span>
							</div>
							<div class="col-lg-4">
								<div class="space-10"></div>
								<input type="number" class="form-control" placeHolder="Mobile Number" id="txtmobilenumber2" name="txtmobilenumber2" required><span class="fa fa-info-circle errspan"></span>
							</div>
							<div class="col-lg-4">
								<div class="space-10"></div>
								<input type="date" class="form-control" placeHolder="Birth Date" id="txtbirthdate2" name="txtbirthdate2" required><span class="fa fa-info-circle errspan"></span>
							</div>


							<div class="col-lg-12">
								<div class="space-10"></div>
								<input type="text" class="form-control" placeHolder="Address" id="txtaddress2" name="txtaddress2" required><span class="fa fa-info-circle errspan"></span>
							</div>
							
							<div class="col-lg-12">
								<div class="space-10"></div>
								<select class="form-control" id="cbogender2" name="cbogender2" required>
									<option value="">[Select Gender]</option>
									<option value="Male">MALE</option>
									<option value="Female">FEMALE</option>
								</select><span class="fa fa-info-circle errspan"></span>
							</div>
							
							<div class="col-lg-12">
								<div class="space-10"></div>
								<select class="form-control" id="cboposition2" name="cboposition2" required>
									<option value="">[Select Position]</option>
                                    <?php while($RS=mysqli_fetch_assoc($GetPosition)) {?>
							        <option value="<?php echo $RS['PositionID'];?>">
								    <?php echo  $RS['PositionTitle']; ?>
							        </option>
							        <?php } ?>
								</select><span class="fa fa-info-circle errspan"></span>
							</div>

							<div class="col-lg-12">
								<div class="space-10"></div>
								<select class="form-control" id="cbodepartment2" name="cbodepartment2" required>
									<option value="">[Select Department]</option>
                                    <?php while($RS=mysqli_fetch_assoc($GetDepartment)) {?>
							        <option value="<?php echo $RS['DepartmentID'];?>">
								    <?php echo  $RS['DepartmentName']; ?>
							        </option>
							        <?php } ?>
								</select><span class="fa fa-info-circle errspan"></span>
							</div>

							<div class="col-lg-12">
								<div class="space-10"></div>
								<select class="form-control" id="cbotime2" name="cbotime2" required>
									<option value="">[Select Time]</option>
                                    <?php while($RS=mysqli_fetch_assoc($GetTime)) {?>
							        <option value="<?php echo $RS['TimeID'];?>">
								   	<?php echo "Morning In: ". $RS['MorningIn'] . " - " . "Afternoon Out: " .$RS['AfternoonOut']; ?> |
									<?php echo "Afternoon In : ". $RS['AfternoonIn'] . " - " . "Morning Out: " .$RS['MorningOut']; ?>
							        </option>
							        <?php } ?>
								</select><span class="fa fa-info-circle errspan"></span>
							</div>
							<div id="mydisplay" class="display">
						
							</div>

							<div class="col-lg-9">

							</div>

							<div class="col-lg-3">
								<div class="space-20"></div>
								<button class="btn btn-success btn-lg btn-block" id="btnAddbtnUpdate" name="btnAdd"><i class="fa fa-envelope"></i> Save</button>
							</div>

						</form>
					</div>






				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
				</div>
			</div>
		</div>
	</div>

<script type="text/javascript" src="customjs/employee.js"></script>
	
        </div>
    </section>

 <?php include('bottom.php');?>
</body>

</html>