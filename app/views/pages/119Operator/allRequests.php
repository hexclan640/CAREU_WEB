<!DOCTYPE html>
<html>
<head>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="shortcut icon" type="image/jpg" href="../img/appLogo.png"/>
	<link rel="stylesheet" type="text/css" href="../css/119Operator/allRequests.css">
	<link rel="stylesheet" type="text/css" href="../css/119Operator/viewNewRequest.css">
	<link rel="stylesheet" type="text/css" href="../css/includecss/operatorHeader.css">
	<link rel="stylesheet" type="text/css" href="../css/includecss/footer.css">
	<link rel="stylesheet" type="text/css" href="../css/includecss/sidebar.css">
	<link rel="stylesheet" type="text/css" href="../css/includecss/breadcrumb.css">
	<link rel="stylesheet" type="text/css" href="../css/includecss/preloader.css">
	<link rel="stylesheet" type="text/css" href="../css/includecss/loader.css">
	<link rel="stylesheet" type="text/css" href="../css/includecss/topButton.css">
	<script type="text/javascript" src="../javascript/jquery.js"></script>
	<script type="text/javascript" src="../javascript/preloader.js"></script>
	<title>All Requests</title>
</head>
<body>
	<div class="loader-wrapper">
		<span class="loader"><span class="loader-inner"></span></span>
	</div>
	<div class="breadcrum" id="breadcrum">
		<ul class="breadcrumb">
			<li><a href="home">Home</a></li>
  			<li>All</li>
		</ul>
	</div>
	<div class="requests">
		<div class="searchdiv">
			<input type="text" class="search" name="search" id="search" placeholder="Search by name, email or phone..">
			<div class="searchoptions">
				<select class="options" name="option" id="option">
					<option value="All">All</option>
 	 				<option value="NotViewed">Not Viewed</option>
  					<option value="Accepted">Accepted</option>
  					<option value="Rejected">Rejected</option>
					<option value="Timeout">Timeout</option>
				</select>
			</div>
		</div>
		<div id="result"></div>
		<div class="requestcol" id="requestcol">
			<center>
				<img src="../img/loading.svg" class="loading">
			</center>
		</div>
	</div>
	<button onclick="topFunction()" id="myBtn" title="Go to top">Top</button>
	<script type="text/javascript" src="../javascript/topButton.js"></script>
	<script type="text/javascript" src="../javascript/allRequests.js"></script>
	<script type="text/javascript" src="../javascript/suwasariyaNotification.js"></script>
</body>
</html>