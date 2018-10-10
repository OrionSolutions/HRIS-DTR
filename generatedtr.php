<?php include('data/generatedtr.php');?>
<!DOCTYPE html>
<html ng-app="listdtr" lang="en">
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

			<div class="wrapper wrapper-white">
				<div class="container">
					<div class="row">
					<h1>DTR Generation</h1>
						<form>
							<div class="col-lg-6">
							<span class="btn btn-success fileinput-button">
        <input id="fileupload" type="file" name="files[]">
    </span>
    <div class="space-30"></div>

    <!-- The global progress bar -->
    <div id="progress" class="progress">
        <div class="progress-bar progress-bar-success"></div>
    </div>
    <!-- The container for the uploaded files -->
    <div id="files" class="files"></div>

							</div>
				
							<div class="col-lg-6">
							<button class="btn btn-lg btn-success btn-block" id="btngenerate">Generate DTR</button>
							</div>
						</form>
					</div>
					<div class="row">
							<div class="col-lg-12">
							<h3><img src="images/loading.gif" height="48" id="LoadingImages" alt="" class="hideloading" /></h3>
								<div id="datavalue">

								</div>
							</div>
					</div>
				</div>
			</div>

<div id="mydata" ng-controller="listdtrcrtl">
			<div class="wrapper wrapper-white">
				<div class="space-20"></div>
				<h1></h1>
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
							<input type="date" id="date1" ng-model="search" ng-change="filter()" placeholder="Search" class="form-control"/>
						</div>
					</div>
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
    </section>
<?php include('bottom.php');?>
<script type="text/javascript" src="customjs/generatedtr.js"></script>
<!-- The jQuery UI widget factory, can be omitted if jQuery UI is already included -->
<script src="js/vendor/jquery.ui.widget.js"></script>
<!-- The Iframe Transport is required for browsers without support for XHR file uploads -->
<script src="js/jquery.iframe-transport.js"></script>
<!-- The basic File Upload plugin -->
<script src="js/jquery.fileupload.js"></script>
<script src="//netdna.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>
<script type="text/javascript">
/*jslint unparam: true */
/*global window, $ */
$(function () {
    'use strict';
    // Change this to the location of your server-side upload handler:
    var url = window.location.hostname === 'blueimp.github.io' ?
                '//jquery-file-upload.appspot.com/' : 'server/php/';
    $('#fileupload').fileupload({
        url: url,
        dataType: 'json',
        done: function (e, data) {
            $.each(data.result.files, function (index, file) {
				$('#files').empty();
				$('<p/>').text(file.name).appendTo('#files');
            });
        },
        progressall: function (e, data) {
            var progress = parseInt(data.loaded / data.total * 100, 10);
            $('#progress .progress-bar').css(
                'width',
                progress + '%'
            );
        }
    }).prop('disabled', !$.support.fileInput)
        .parent().addClass($.support.fileInput ? undefined : 'disabled');
});
</script>
</body>
</html>