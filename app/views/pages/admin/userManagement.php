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
	<title>User Management</title>
</head>
<body>
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
				<div class="col" id="col1">
					<center>
						<img src="../img/loading.svg" class="loading">
					</center>
				</div>
			</div>
			<div class="column" >
				<div class="category"><h1>Verified Users</h1></div>
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
	<?php if(isset($_SESSION['blockuser'])){?>
		<script>
			document.getElementById('modal1').style.display = 'block';
			setTimeout(function(){document.getElementById('modal1').style.display = 'none'; }, 2000);
		</script>
	<?php unset($_SESSION['blockuser']);} ?>
	<?php if(isset($_SESSION['acceptuser'])){?>
		<script>
			document.getElementById('modal2').style.display = 'block';
			setTimeout(function(){document.getElementById('modal2').style.display = 'none'; }, 2000);
		</script>
	<?php unset($_SESSION['acceptuser']);} ?>
	<?php if(isset($_SESSION['rejectuser'])){?>
		<script>
			document.getElementById('modal3').style.display = 'block';
			setTimeout(function(){document.getElementById('modal3').style.display = 'none'; }, 2000);
		</script>
	<?php unset($_SESSION['rejectuser']);} ?>
	<script type="text/javascript" src="../javascript/jquery.js"></script>
	<script type="text/javascript" src="../javascript/userManagement.js"></script>
</body>
</html>