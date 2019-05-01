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
				<div class="container" style="height: 500px;">
					<div class="row">
					<h1>POST DTR to Payroll</h1>
						<form>
							<div class="col-lg-3">

                                <select class="form-control" id="cboSalaryType" name="cboSalaryType" required>
                                    <option selected value="Daily">Daily</option>
                                    <option value="Monthly">Monthly</option>
                                </select>

							</div>
							<div class="col-lg-3">
							<input type="date" class="form-control" placeHolder="Start Date" id="txtStart" name="txtStart" required><span class="fa fa-info-circle errspan"></span>
							</div>
							<div class="col-lg-3">
							<input type="date" class="form-control" placeHolder="End Date" id="txtEnd" name="txtEnd" required><span class="fa fa-info-circle errspan"></span>
							</div>
							<div class="col-lg-3">
							<button class="btn btn-lg btn-success btn-block" id="btnPost">POST to Payroll</button>
							</div>
							
						</form>
					</div>
					<div class="row">
							<div class="col-lg-12" style="text-align:center;">
							<h3><img src="images/loading.gif" height="350" width="250" id="LoadingImages" alt="" class="hideloading" /></h3>
								<div id="datavalue">

								</div>
							</div>
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
<!-- Bootstrap JS is not required, but included for the responsive demo navigation -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>

</body>
</html>