<!DOCTYPE html>
<html>
<head>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="shortcut icon" type="image/jpg" href="../img/appLogo.png"/>
	<link rel="stylesheet" type="text/css" href="../css/admin/create1990OperatorAccount.css">
	<link rel="stylesheet" type="text/css" href="../css/admin/adminHeader.css">
	<link rel="stylesheet" type="text/css" href="../css/includecss/footer.css">
	<link rel="stylesheet" type="text/css" href="../css/includecss/sidebar.css">
	<link rel="stylesheet" type="text/css" href="../css/includecss/breadcrumb.css">
	<link rel="stylesheet" type="text/css" href="../css/includecss/preloader.css">
	<link rel="stylesheet" type="text/css" href="../css/includecss/topButton.css">
	<script type="text/javascript" src="../javascript/topButton.js"></script>
	<script type="text/javascript" src="../javascript/jquery.js"></script>
	<script type="text/javascript" src="../javascript/newOperator1990.js"></script>
	<script type="text/javascript" src="../javascript/adminnotification.js"></script>
	<script type="text/javascript" src="../javascript/preloader.js"></script>
	<title>1990 Operator Account</title>
</head>
<body>
	<div class="loader-wrapper">
		<span class="loader"><span class="loader-inner"></span></span>
	</div>
	<div class="breadcrum" id="breadcrum">
		<ul class="breadcrumb">
			<li><a href="home">Home</a></li>
			<li>New Suwasariya Operator</li>
		</ul>
	</div>
	<div class="form">
		<div class="frame">
			<center>
				<div class="row">
					<form method="post" id="formOperator1990">
						<div class="namediv">
							<h1>New Operator - 1990</h1>
						</div>
						<!-- <div class="column1">
							<input type="text" class="search" name="search" id="search" placeholder="Search by username..">
							<div id="result"></div>
						</div> -->
						<div class="column2">
							<label for="userName">User Name</label>
							<input type="text" value="careu_1990_" name="userName" id="userName"><br>
							<label for="firstName">First Name</label>
							<input type="text" name="firstName" id="firstName"><br>
							<label for="lastName">Last Name</label>
							<input type="text" name="lastName" id="lastName"><br>
						</div>
						<div class="column3">
							<label for="gender">Gender</label>
							<select name="gender" class="gender" id="gender">
								<option value=""></option>
								<option value="Male">Male</option>
								<option value="Female">Female</option>
							</select>
							<label for="password1">Password</label>
							<input type="password" name="password1" id="password1"><br>
							<label for="password2">Re-enter Password</label>
							<input type="password" name="password2" id="password2"><br>
						</div>
						<div class="column4">
							<p class="hide" id="err">Error</p>
							<input type="submit" value="CREATE" name="submit" id="submit">
						</div>
					</form>
				</div>
			</center>
		</div>
	</div>
	<div id="modal1" class="modal">
		<div class="message">
			<div class="container">
				<div class="titleconfirm">
					<h1>Success!</h1>
				</div>
				<div class="confirm">
					<img src="../img/modelicons/success.svg" alt="">
					<p>Operator added sussecfuly!</p>
				</div>
			</div>
		</div>
	</div>
	<button onclick="topFunction()" id="myBtn" title="Go to top">Top</button>
</body>
</html>