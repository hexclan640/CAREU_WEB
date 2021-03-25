<!DOCTYPE html>
<html>
<head>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="shortcut icon" type="image/jpg" href="../img/appLogo.png"/>
	<link rel="stylesheet" type="text/css" href="../css/119Operator/reports.css">
	<link rel="stylesheet" type="text/css" href="../css/includecss/operatorHeader.css">
	<link rel="stylesheet" type="text/css" href="../css/includecss/footer.css">
	<link rel="stylesheet" type="text/css" href="../css/includecss/sidebar.css">
	<link rel="stylesheet" type="text/css" href="../css/includecss/breadcrumb.css">
	<link rel="stylesheet" type="text/css" href="../css/includecss/preloader.css">
	<link rel="stylesheet" type="text/css" href="../css/includecss/loader.css">
	<link rel="stylesheet" type="text/css" href="../css/includecss/topButton.css">
	<title>Reports</title>
</head>
<body>
	<div class="loader-wrapper">
		<span class="loader"><span class="loader-inner"></span></span>
	</div>
	<div class="breadcrum" id="breadcrum">
		<ul class="breadcrumb">
			<li><a href="home">Home</a></li>
  			<li>Reports</li>
		</ul>
	</div>
	<div class="form">
		<div class="frame">
			<center>
				<div class="row">
					<div class="namediv">
						<h1>Reports</h1>
					</div>
					<div class="chart">
						<div class="chartdiv">
							<p id="title1"></p>
							<canvas id="myChart1"></canvas>
						</div>
					</div>
					<div class="chart">
						<div class="chartdiv">
							<p id="title2">Category Wise</p>
							<canvas id="myChart2"></canvas>
						</div>
					</div>
					<div class="barchart">
						<div class="chartdiv">
							<p id="title3">District Wise</p>
							<canvas id="myChart3"></canvas>
						</div>
					</div>
				</div>
			</center>
		</div>
		<div class="frame1">
			<center>
				<div class="row">
					<div class="pdfoptions">
						<select class="options" name="options" id="options">
							<option value="select">-Select-</option>
							<option value="report1">Group By Date And District</option>
							<option value="report2">Group By District And Category</option>
							<option value="report3">Group By Police Station And Category</option>
							<option value="report4">Group By Date And Category</option>
						</select>
					</div>
					<div class="pdf">
						<a class="pdfbtn" id="pdfbtn" onclick="exportpdf()">Export PDF</a>
					</div>
					<div class="excel">
						<a class="excelbtn">Export EXCEL</a>
					</div>
				</div>
			</center>
		</div>
	</div>
	<button onclick="topFunction()" id="myBtn" title="Go to top">Top</button>
	<script src="https://cdn.jsdelivr.net/npm/chart.js@2.9.4/dist/Chart.min.js"></script>
	<script type="text/javascript" src="../javascript/topButton.js"></script>
	<script type="text/javascript" src="../javascript/jquery.js"></script>
	<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
	<script type="text/javascript" src="../javascript/policeReports.js"></script>
	<script type="text/javascript" src="../javascript/jquery.js"></script>
	<script type="text/javascript" src="../javascript/policeNotification.js"></script>
	<script type="text/javascript" src="../javascript/preloader.js"></script>
</body>
</html>