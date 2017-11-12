<?php include('data/user-module.php');?>
<!DOCTYPE html>
<html ng-app="listofusers" lang="en">

<head>
	<title>
		<?php echo $title;?>
	</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta charset="utf-8">
	<script type="text/javascript" src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
	<script type="text/javascript" src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
	<script src="js/sweetalert.min.js"></script>
	<link rel="stylesheet" type="text/css" href="css/sweetalert.css">
	<link href="css/reset.css" rel="stylesheet">
	<link href="css/grid.css" rel="stylesheet">
	<link rel="stylesheet" type="text/css" href="css/font-awsome/css/font-awesome.css">
	<link href="https://fonts.googleapis.com/css?family=Montserrat" rel="stylesheet">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
	<link href="style.css" rel="stylesheet">
	<link href="css/custom.css" rel="stylesheet">
</head>

<body class="bgimage">
	<div class="main-container">
		<?php include('menu.php'); ?>
		<div ng-controller="listofuserscrtl">
			<div class="wrapper wrapper-white">
				<div class="space-20"></div>
				<h1>Users Module</h1>
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
							<a type="button" data-toggle="modal" data-target="#myModal2" href="#new-Profile" class="new-Profile sub btn btn-primary btn-block" name="btnNew">Add New User <span class="glyphicon glyphicon-pencil"></span></a>
						</div>
					</div>
					<div class="space-30"></div>
				</div>
				<div class="row">
					<div class="col-md-12" ng-show="filteredItems > 0">
						<table class="table table-striped table-bordered">
							<thead>
								<th>AccountID :&nbsp;<a ng-click="sort_by('AccountID');"><i class="glyphicon glyphicon-sort"></i></a>
								</th>
								<th>Last name :&nbsp;<a ng-click="sort_by('Lastname');"><i class="glyphicon glyphicon-sort"></i></a>
								</th>
								<th>First name :&nbsp;<a ng-click="sort_by('Firstname');"><i class="glyphicon glyphicon-sort"></i></a>
								</th>
								<th>Address :&nbsp;<a ng-click="sort_by('Address');"><i class="glyphicon glyphicon-sort"></i></a>
								</th>
								<th>Email Add # :&nbsp;<a ng-click="sort_by('EmailAdd');"><i class="glyphicon glyphicon-sort"></i></a>
								</th>
								<th>Mobile Number :&nbsp;<a ng-click="sort_by('MobileNumber');"><i class="glyphicon glyphicon-sort"></i></a>
								</th>
								<th>Gender :&nbsp;<a ng-click="sort_by('Gender');"><i class="glyphicon glyphicon-sort"></i></a>
								</th>
								<th>User Type :&nbsp;<a ng-click="sort_by('UserType');"><i class="glyphicon glyphicon-sort"></i></a>
								</th>
								<th>Action
								</th>
							</thead>
							<tbody>
								<tr ng-repeat="data in filtered = (list | filter:search | orderBy : predicate :reverse) | startFrom:(currentPage-1)*entryLimit | limitTo:entryLimit">
									<td>{{data.AccountID}}</td>
									<td>{{data.Lastname}}</td>
									<td>{{data.Firstname}}</td>
									<td>{{data.Address}}</td>
									<td>{{data.EmailAdd}}</td>
									<td>{{data.MobileNumber}}</td>
									<td>{{data.Gender}}</td>
									<td>{{data.UserType}}</td>
									<td><a type="button" data-toggle="modal" data-target="#myModal" data-id="{{data.AccountID}}" href="#open-Profile" class="open-Profile sub btn btn-primary btn-block" name="btnEdit">Edit <span class="glyphicon glyphicon-pencil"></span></a>
									<a type="button" data-id="{{data.AccountID}}" href="#close-Profile" class="close-Profile sub btn btn-warning btn-block" name="btnEdit">Delete <span class="glyphicon glyphicon-alert"></span></a>
									</td>
								</tr>
							</tbody>
						</table>
					</div>
					<div class="col-md-12" ng-show="filteredItems == 0">
						<div class="col-md-12">
							<h4>No Account found</h4>
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
					<h4 class="modal-title">Update User</h4>
				</div>
				<div class="modal-body">




					<div class="space-20"></div>

					<div class="space-20"></div>
					<div class="container">
						<form id="updateform">
							<div class="col-lg-6">
								<div class="space-10"></div>
								<input type="text" class="form-control" placeHolder="Lastname" id="txtlastname" name="txtlastname" required><span class="fa fa-info-circle errspan"></span>
							</div>
							<div class="col-lg-6">
								<div class="space-10"></div>
								<input type="text" class="form-control" placeHolder="Firstname" id="txtfirstname" name="txtfirstname" required><span class="fa fa-info-circle errspan"></span>
							</div>
							<div class="col-lg-6">
								<div class="space-10"></div>
								<input type="email" class="form-control" placeHolder="Email Address" id="txtemail" name="txtemail">
							</div>
							<div class="col-lg-6">
								<div class="space-10"></div>
								<input type="number" class="form-control" placeHolder="Mobile Number" id="txtmobilenumber" name="txtmobilenumber" required><span class="fa fa-info-circle errspan"></span>
							</div>
							<div class="col-lg-12">
								<div class="space-10"></div>
								<input type="text" class="form-control" placeHolder="Address" id="txtaddress" name="txtaddress" required><span class="fa fa-info-circle errspan"></span>
							</div>
							
							<div class="col-lg-12">
								<div class="space-10"></div>
								<select class="form-control" id="cbogender" name="cbogender" required>
									<option value="">[Select Gender]</option>
									<option value="MALE">MALE</option>
									<option value="FEMALE">FEMALE</option>
								</select><span class="fa fa-info-circle errspan"></span>
							</div>
							<div class="col-lg-12">
								<div class="space-10"></div>
								<select class="form-control" id="cbousertype" name="cbousertype" required>
									<option value="">[Select User Type]</option>
									<option value="User">User</option>
									<option value="Cashier">Cashier</option>
									<option value="Registrar">Registrar</option>
								</select><span class="fa fa-info-circle errspan"></span>
							</div>

							<div id="mydisplay" class="display">
							
								<div class="col-lg-6">
									<div class="space-10"></div>
									<input type="text" class="form-control" placeHolder="Username" id="txtusername" name="txtusername">
								</div>
								<div class="col-lg-6">
									<div class="space-10"></div>
									<input type="password" class="form-control" placeHolder="Password" id="txtpassword" name="txtpassword">
								</div>

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
					<h4 class="modal-title">Add New User</h4>
				</div>
				<div class="modal-body">




					<div class="space-20"></div>

					<div class="space-20"></div>
					<div class="container">
						<form id="saveform">
							<div class="col-lg-6">
								<div class="space-10"></div>
								<input type="text" class="form-control" placeHolder="Lastname" id="txtlastname2" name="txtlastname2" required><span class="fa fa-info-circle errspan"></span>
							</div>
							<div class="col-lg-6">
								<div class="space-10"></div>
								<input type="text" class="form-control" placeHolder="Firstname" id="txtfirstname2" name="txtfirstname2" required><span class="fa fa-info-circle errspan"></span>
							</div>
							<div class="col-lg-6">
								<div class="space-10"></div>
								<input type="email" class="form-control" placeHolder="Email Address" id="txtemail2" name="txtemail2">
							</div>
							<div class="col-lg-6">
								<div class="space-10"></div>
								<input type="number" class="form-control" placeHolder="Mobile Number" id="txtmobilenumber2" name="txtmobilenumber2" required><span class="fa fa-info-circle errspan"></span>
							</div>
							<div class="col-lg-12">
								<div class="space-10"></div>
								<input type="text" class="form-control" placeHolder="Address" id="txtaddress2" name="txtaddress2" required><span class="fa fa-info-circle errspan"></span>
							</div>
							
							<div class="col-lg-12">
								<div class="space-10"></div>
								<select class="form-control" id="cbogender2" name="cbogender2" required>
									<option value="">[Select Gender]</option>
									<option value="MALE">MALE</option>
									<option value="FEMALE">FEMALE</option>
								</select><span class="fa fa-info-circle errspan"></span>
							</div>
							<div class="col-lg-12">
								<div class="space-10"></div>
								<select class="form-control" id="cbousertype2" name="cbousertype2" required>
									<option value="">[Select User Type]</option>
									<option value="User">User</option>
									<option value="Cashier">Cashier</option>
									<option value="Registrar">Registrar</option>
								</select><span class="fa fa-info-circle errspan"></span>
							</div>

							<div id="mydisplay" class="display">
							
								<div class="col-lg-6">
									<div class="space-10"></div>
									<input type="text" class="form-control" placeHolder="Username" id="txtusername2" name="txtusername2">
								</div>
								<div class="col-lg-6">
									<div class="space-10"></div>
									<input type="password" class="form-control" placeHolder="Password" id="txtpassword2" name="txtpassword2">
								</div>

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

<script type="text/javascript" src="customjs/user-module.js"></script>
	
</body>

</html>