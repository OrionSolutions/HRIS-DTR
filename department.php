<?php include('data/department.php');?>
<!DOCTYPE html>
<html ng-app="listdepartment" lang="en">
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


		<div ng-controller="listofdepartmentcrtl">
			<div class="wrapper wrapper-white">
				<div class="space-20"></div>
				<h1>Department Module</h1>
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
							<a type="button" data-toggle="modal" data-target="#myModal2" href="#new-Profile" class="new-Profile sub btn btn-primary btn-block" name="btnNew">Add New Department <span class="glyphicon glyphicon-pencil"></span></a>
						</div>
					</div>
					<div class="space-30"></div>
				</div>
				<div class="row">
					<div class="col-md-12" ng-show="filteredItems > 0">
						<table class="table table-striped table-bordered">
							<thead>
								<th>Department Name :&nbsp;<a ng-click="sort_by('DepartmentName');"><i class="glyphicon glyphicon-sort"></i></a>
								</th>
								<th>Department Description :&nbsp;<a ng-click="sort_by('DepartmentDesc');"><i class="glyphicon glyphicon-sort"></i></a>
								
								<th>Action
								</th>
							</thead>
							<tbody>
								<tr ng-repeat="data in filtered = (list | filter:search | orderBy : predicate :reverse) | startFrom:(currentPage-1)*entryLimit | limitTo:entryLimit">
									<td>{{data.DepartmentName}}</td>
									<td>{{data.DepartmentDesc}}</td>
									<td><a type="button" data-toggle="modal" data-target="#myModal" data-id="{{data.DepartmentID}}" href="#open-Profile" class="open-Profile sub btn btn-primary btn-block" name="btnEdit">Edit <span class="glyphicon glyphicon-pencil"></span></a>
									<a type="button" data-id="{{data.DepartmentID}}" href="#close-Profile" class="close-Profile sub btn btn-warning btn-block" name="btnEdit">Delete <span class="glyphicon glyphicon-alert"></span></a>
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
					<h4 class="modal-title">Update Department</h4>
				</div>
				<div class="modal-body">

					<div class="space-20"></div>
					<div class="space-20"></div>
					<div class="container">
						<form id="updateform">
					<div class="col-lg-12">
						<div class="space-10"></div>
						<input type="text" class="form-control" placeHolder="Department Name" id="txtdepartmentname" name="txtdepartmentname" required><span class="fa fa-info-circle errspan"></span>
					</div>

					<div class="col-lg-12">
						<div class="space-10"></div>
						<input type="text" class="form-control" placeHolder="Department Description" id="txtdepartmentdesc" name="txtdepartmentdesc" required><span class="fa fa-info-circle errspan"></span>
					</div>
                    <p id="lol"></p>    

							<div id="mydisplay" class="display">
							
							</div>

							<div class="col-lg-9">

							</div>

							<div class="col-lg-3">
								<div class="space-20"></div>
								<input type="hidden" id="departmentid" name="departmentid" value="">
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
					<h4 class="modal-title">Add New Department</h4>
				</div>
				<div class="modal-body">
					<div class="space-20"></div>

					<div class="space-20"></div>
					<div class="container">
						<form id="saveform">
						
							<div class="col-lg-12">
								<div class="space-10"></div>
								<input type="text" class="form-control" placeHolder="Department Name" id="txtdepartmentname2" name="txtdepartmentname2" required><span class="fa fa-info-circle errspan"></span>
							</div>

							<div class="col-lg-12">
								<div class="space-10"></div>
								<input type="text" class="form-control" placeHolder="Department Description" id="txtdepartmentdesc2" name="txtdepartmentdesc2" required><span class="fa fa-info-circle errspan"></span>
							</div>
                            <p id="lol"></p>
						
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

<script type="text/javascript" src="customjs/department.js"></script>
	










        </div>
    </section>

 <?php include('bottom.php');?>
</body>

</html>