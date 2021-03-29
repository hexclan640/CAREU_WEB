<!DOCTYPE html>
<html>
<head>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="shortcut icon" type="image/jpg" href="../img/appLogo.png"/>
	<link rel="stylesheet" type="text/css" href="../css/admin/reports.css">
	<link rel="stylesheet" type="text/css" href="../css/admin/adminHeader.css">
	<link rel="stylesheet" type="text/css" href="../css/includecss/footer.css">
	<link rel="stylesheet" type="text/css" href="../css/includecss/sidebar.css">
	<link rel="stylesheet" type="text/css" href="../css/includecss/breadcrumb.css">
	<link rel="stylesheet" type="text/css" href="../css/includecss/preloader.css">
	<link rel="stylesheet" type="text/css" href="../css/includecss/loader.css">
	<link rel="stylesheet" type="text/css" href="../css/includecss/topButton.css">
	<script type="text/javascript" src="../javascript/jquery.js"></script>
	<script type="text/javascript" src="../javascript/preloader.js"></script>
	<title>Reports</title>
</head>
<body>
	<div class="loader-wrapper">
		<span class="loader"><span class="loader-inner"></span></span>
	</div>
	<div class="loader-wrapper2" id="loader-wrapper2">
		<span class="loader2"><span class="loader-inner2"></span></span>
	</div>
	<div class="breadcrum" id="breadcrum">
		<ul class="breadcrumb">
			<li><a href="home">Home</a></li>
			<li>Reports</li>
		</ul>
	</div>
	<div class="form">
		<div class="frame marginbottom nonpaddingborder">
			<center>
				<div class="row">
					<div class="col">
						<a class="part active" onclick="adminview()" id="admin" >ADMIN</a>
					</div>
					<div class="col">
						<a class="part" onclick="policeview()" id="police">POLICE</a>
					</div>
					<div class="col">
						<a class="part" onclick="suwasariyaview()" id="suwasariya">SUWASARIYA</a>
					</div>
				</div>
			</center>
		</div>
		<div class="frame" id="admindiv1">
			<center>
				<div class="row">
					<div class="namediv">
						<h1>Admin Reports</h1>
					</div>
					<div class="chart">
						<div class="chartdiv">
							<p id="admintitle1"></p>
							<canvas id="adminChart1"></canvas>
						</div>
					</div>
					<div class="chart">
						<div class="chartdiv">
							<p id="admintitle2"></p>
							<canvas id="adminChart2"></canvas>
						</div>
					</div>
					<div class="barchart">
						<div class="chartdiv">
							<p>Requests In Last 4 Weeks</p>
							<canvas id="adminChart3"></canvas>
						</div>
					</div>
				</div>
			</center>
		</div>
		<div class="frame1" id="admindiv2">
			<center>
				<div class="row">
					<div class="pdfoptions">
						<select class="options" name="options" id="adminoptions">
							<option value="select">-Select-</option>
							<option value="1">Group By Week</option>
							<option value="2">Verified User Requests Within The Last Month</option>
							<option value="3">Rejected User Requests Within The Last Month</option>
							<option value="4">Blocked User Requests Within The Last Month</option>
							<option value="5">Police Operators - 119</option>
							<option value="6">Suwasariya Operators - 1990</option>
							<!-- <option value="7">All Requests With Details</option>
							<option value="8">Requests With User Details</option> -->
						</select>
					</div>
					<div class="pdf">
						<a class="pdfbtn" id="pdfbtnadmin" onclick="exportpdfadmin()" target = '_blank'>Export PDF</a>
					</div>
					<div class="excel">
						<a class="excelbtn" id="excelbtnadmin" onclick="exportexeladmin()">Download EXCEL</a>
					</div>
				</div>
			</center>
		</div>
		<div class="frame" id="policediv1">
			<center>
				<div class="row">
					<div class="namediv">
						<h1>Police Reports</h1>
					</div>
					<div class="chart">
						<div class="chartdiv">
							<p id="policetitle1"></p>
							<canvas id="policeChart1"></canvas>
						</div>
					</div>
					<div class="chart">
						<div class="chartdiv">
							<p>Category Wise</p>
							<canvas id="policeChart2"></canvas>
						</div>
					</div>
					<div class="barchart">
						<div class="chartdiv">
							<p>District Wise</p>
							<canvas id="policeChart3"></canvas>
						</div>
					</div>
				</div>
			</center>
		</div>
		<div class="frame1" id="policediv2">
			<center>
				<div class="row">
					<div class="pdfoptions">
						<select class="options" name="options" id="policeoptions">
							<option value="select">-Select-</option>
							<option value="1">Group By Date And District</option>
							<option value="2">Group By District And Category</option>
							<option value="3">Group By Police Station And Category</option>
							<option value="4">Group By Date And Category</option>
							<option value="5">Group By Service Requester</option>
							<option value="6">Service Ratings With Police Stations</option>
							<option value="7">All Requests With Details</option>
							<option value="8">Requests With User Details</option>
						</select>
					</div>
					<div class="pdf">
						<a class="pdfbtn" id="pdfbtnpolice" onclick="exportpdfpolice()" target = '_blank'>Export PDF</a>
					</div>
					<div class="excel">
						<a class="excelbtn" id="excelbtnpolice" onclick="exportexelpolice()">Download EXCEL</a>
					</div>
				</div>
			</center>
		</div>
		<div class="frame" id="suwasariyadiv1">
			<center>
				<div class="row">
					<div class="namediv">
						<h1>Suwasariya Reports</h1>
					</div>
					<div class="chart">
						<div class="chartdiv">
							<p id="suwasariyatitle1"></p>
							<canvas id="suwasariyaChart1"></canvas>
						</div>
					</div>
					<div class="chart">
						<div class="chartdiv">
							<p id="suwasariyatitle2"></p>
							<canvas id="suwasariyaChart2"></canvas>
						</div>
					</div>
					<div class="barchart">
						<div class="chartdiv">
							<p>District Wise</p>
							<canvas id="suwasariyaChart3"></canvas>
						</div>
					</div>
				</div>
			</center>
		</div>
		<div class="frame1" id="suwasariyadiv2">
			<center>
				<div class="row">
					<div class="pdfoptions">
						<select class="options" name="options" id="suwasariyaoptions">
							<option value="select">-Select-</option>
							<option value="1">Group By Date And District</option>
							<option value="2">Group By District And Number Of Patients</option>
							<option value="3">Group By Police Station And Number Of Patients</option>
							<option value="4">Group By Date And Number Of Patients</option>
							<option value="5">Group By Service Requester</option>
							<option value="6">Service Ratings With Police Stations</option>
							<option value="7">All Requests With Details</option>
							<option value="8">Requests With User Details</option>
						</select>
					</div>
					<div class="pdf">
						<a class="pdfbtn" id="pdfbtnsuwasariya" onclick="exportpdfsuwasariya()" target = '_blank'>Export PDF</a>
					</div>
					<div class="excel">
						<a class="excelbtn" id="excelbtnsuwasariya" onclick="exportexelsuwasariya()">Download EXCEL</a>
					</div>
				</div>
			</center>
		</div>
	</div>
	<button onclick="topFunction()" id="myBtn" title="Go to top">Top</button>
	<script src="https://cdn.jsdelivr.net/npm/chart.js@2.9.4/dist/Chart.min.js"></script>
	<script type="text/javascript" src="../javascript/topButton.js"></script>
	<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
	<script type="text/javascript" src="../javascript/adminReports.js"></script>
	<script type="text/javascript" src="../javascript/adminnotification.js"></script>
</body>
</html>