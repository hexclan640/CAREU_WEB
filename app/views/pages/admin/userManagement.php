<!DOCTYPE html>
<html>
<head>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="shortcut icon" type="image/jpg" href="../img/appLogo.png"/>
	<link rel="stylesheet" type="text/css" href="../css/admin/userManagement.css">
	<link rel="stylesheet" type="text/css" href="../css/admin/adminHeader.css">
	<link rel="stylesheet" type="text/css" href="../css/includecss/footer.css">
	<link rel="stylesheet" type="text/css" href="../css/includecss/sidebar.css">
	<link rel="stylesheet" type="text/css" href="../css/includecss/breadcrumb.css">
	<link rel="stylesheet" type="text/css" href="../css/includecss/preloader.css">
	<link rel="stylesheet" type="text/css" href="../css/includecss/topButton.css">
	<title>User Management</title>
</head>
<body>
	<div class="loader-wrapper">
		<span class="loader"><span class="loader-inner"></span></span>
	</div>
	<div class="breadcrum" id="breadcrum">
		<ul class="breadcrumb">
			<li><a href="home">Home</a></li>
			<li>Users</li>
		</ul>
	</div>
	<div class="form">
		<div class="updates">
			<div class="column" >
				<div class="category"><h1>Unverified Requests</h1></div>
				<div class="searchdiv">
					<input type="text" class="search" name="search1" id="search1" placeholder="Search by name, email or phone..">
				</div>
				<div id="result1"></div>
				<div class="col" id="col1">
					<center>
						<img src="../img/loading.svg" class="loading">
					</center>
				</div>
			</div>
			<div class="column" >
				<div class="category"><h1>Verified Users</h1></div>
				<div class="searchdiv">
					<input type="text" class="search" name="search2" id="search2" placeholder="Search by name, email or phone..">
				</div>
				<div id="result2"></div>
				<div class="col" id="col2">
					<center>
						<img src="../img/loading.svg" class="loading">
					</center>
				</div>
			</div>
		</div>
	</div>
	<div id="modal1" class="modal">
		<div class="message">
			<div class="container">
				<div class="titleconfirm">
					<h1>Success!</h1>
				</div>
				<div class="confirm">
					<img src="../img/modelicons/redsuccess.svg" alt="">
					<p>Blocked successfuly!</p>
				</div>
			</div>
		</div>
	</div>
	<div id="modal2" class="modal">
		<div class="message">
			<div class="container">
				<div class="titleconfirm">
					<h1>Success!</h1>
				</div>
				<div class="confirm">
					<img src="../img/modelicons/success.svg" alt="">
					<p>Verified successfuly!</p>
				</div>
			</div>
		</div>
	</div>
	<div id="modal3" class="modal">
		<div class="message">
			<div class="container">
				<div class="titleconfirm">
					<h1>Success!</h1>
				</div>
				<div class="confirm">
					<img src="../img/modelicons/redsuccess.svg" alt="">
					<p>Rjected successfuly!</p>
				</div>
			</div>
		</div>
	</div>
	<button onclick="topFunction()" id="myBtn" title="Go to top">Top</button>
	<script type="text/javascript" src="../javascript/topButton.js"></script>
	<script type="text/javascript" src="../javascript/jquery.js"></script>
	<script type="text/javascript" src="../javascript/userManagement.js"></script>
	<script type="text/javascript" src="../javascript/adminnotification.js"></script>
	<script type="text/javascript" src="../javascript/preloader.js"></script>
</body>
</html>