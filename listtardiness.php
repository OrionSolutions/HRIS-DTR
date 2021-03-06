﻿<?php include('data/dtr.php');?>
<!DOCTYPE html>
<html ng-app="listtardiness" lang="en">
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


		<div ng-controller="listtardinesscrtl">
			<div class="wrapper wrapper-white">
				<div class="space-20"></div>
				<h1>Tardiness Report Detailed</h1>
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
		

						<form action="reports/rpt_listtardiness.php" method="get" target="_blank">	
						
						<div class="col-md-10">&nbsp;
							<input type="text" ng-model="search" id="txtsearch" name="txtsearch" ng-change="filter()" placeholder="Search" class="form-control"/>
							<div class="space-30"></div>
						</div>	
						<div class="row" style="padding:15px;">
							<div class="col-md-3">Select Type &nbsp;
									<select id="type" name="type" class="form-control">
									<option value="All">All</option>
									<option value="Count">By Tardiness Count</option>
									<option value="Detailed">By Tardiness Detailed</option>
									</select>
							</div>
							<div class="col-md-3">StartDate &nbsp;
									<input type="date" id="startDate" name="startDate"  placeholder="Search" class="form-control"/>
							</div>
							<div class="col-md-3">EndDate&nbsp;
		m,						<input type="date" id="endDate" name="endDate"  placeholder="Search" class="form-control"/>
							</div>
							<div class="col-md-3">&nbsp;
								<button type="submit" class="new-Profile sub btn btn-primary btn-block" name="btnPrint">Print<span class="glyphicon glyphicon-print"></span></a>
							</div>
						</div>
						</form>
						<div class="space-30"></div>
					
				</div>
				<div class="row">
					<div class="col-md-12" ng-show="filteredItems > 0">
						<table class="table table-striped table-bordered">
							<thead>
								<th>EmployeeCode :&nbsp;<a ng-click="sort_by('EmployeeID');"><i class="glyphicon glyphicon-sort"></i></a>
								</th>
								<th>Fullname :&nbsp;<a ng-click="sort_by('Fullname');"><i class="glyphicon glyphicon-sort"></i></a>
								</th>
								<th>TimeID :&nbsp;<a ng-click="sort_by('TimeID');"><i class="glyphicon glyphicon-sort"></i></a>
								</th>
								<th>Date :&nbsp;<a ng-click="sort_by('dtrDate');"><i class="glyphicon glyphicon-sort"></i></a>
								</th>
								<th>AM IN:&nbsp;<a ng-click="sort_by('TimeInAM');"><i class="glyphicon glyphicon-sort"></i></a>
								</th>
								<th>AM OUT :&nbsp;<a ng-click="sort_by('TimeOutAM');"><i class="glyphicon glyphicon-sort"></i></a>
								</th>
								<th>AFTERNOON IN :&nbsp;<a ng-click="sort_by('TimeInPM');"><i class="glyphicon glyphicon-sort"></i></a>
								</th>
								<th>AFTERNOON OUT :&nbsp;<a ng-click="sort_by('TimeOutPM');"><i class="glyphicon glyphicon-sort"></i></a>
								</th>
								<th>OT IN :&nbsp;<a ng-click="sort_by('TimeInOT');"><i class="glyphicon glyphicon-sort"></i></a>
								</th>
								<th>OT OUT :&nbsp;<a ng-click="sort_by('TimeOutOT');"><i class="glyphicon glyphicon-sort"></i></a>
								</th>
								<th>Late Morning IN :&nbsp;<a ng-click="sort_by('LateMorning');"><i class="glyphicon glyphicon-sort"></i></a>
								</th>
								<th>Late Morning OUT :&nbsp;<a ng-click="sort_by('MorningOutLate');"><i class="glyphicon glyphicon-sort"></i></a>
								</th>
								<th>Late Afternoon IN :&nbsp;<a ng-click="sort_by('AfternoonInLate');"><i class="glyphicon glyphicon-sort"></i></a>
								</th>
								<th>Late Afternoon OUT :&nbsp;<a ng-click="sort_by('AfternoonOutLate');"><i class="glyphicon glyphicon-sort"></i></a>
								</th>
								<!--<th>Action
								</th>-->
							</thead>
							<tbody>
								<tr ng-repeat="data in filtered = (list | filter:search | orderBy : predicate :reverse) | startFrom:(currentPage-1)*entryLimit | limitTo:entryLimit">
									<td>{{data.EmployeeID}}</td>
									<td>{{data.Fullname}}</td>
									<td>{{data.TimeID}}</td>
									<td>{{data.dtrDate}}</td>
									<td>{{data.TimeInAM}}</td>
									<td>{{data.TimeOutAM}}</td>
									<td>{{data.TimeInPM}}</td>
									<td>{{data.TimeOutPM}}</td>
									<td>{{data.TimeInOT}}</td>
									<td>{{data.TimeOutOT}}</td>
									<td>{{data.LateMorning}}</td>
									<td>{{data.MorningOutLate}}</td>
									<td>{{data.AfternoonInLate}}</td>
									<td>{{data.AfternoonOutLate}}</td>
									<!--<td><a type="button" data-toggle="modal" data-target="#myModal" data-id="{{data.EmployeeID}}" href="#open-Profile" class="open-Profile sub btn btn-primary btn-block" name="btnEdit">Edit <span class="glyphicon glyphicon-pencil"></span></a>
									<a type="button" data-id="{{data.EmployeeID}}" href="#close-Profile" class="close-Profile sub btn btn-warning btn-block" name="btnEdit">Delete <span class="glyphicon glyphicon-alert"></span></a>
									</td>-->
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


<script type="text/javascript" src="customjs/employee.js"></script>
	
        </div>
    </section>

 <?php include('bottom.php');?>
</body>

</html>