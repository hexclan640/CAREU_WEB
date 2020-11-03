<!DOCTYPE html>
<html>
<head>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="shortcut icon" type="image/jpg" href="../img/appLogo.png"/>
	<link rel="stylesheet" type="text/css" href="../css/admin/userProfile.css">
	<link rel="stylesheet" type="text/css" href="../css/admin/adminHeader.css">
	<link rel="stylesheet" type="text/css" href="../css/includecss/footer.css">
	<title>User Profile</title>
</head>
<body>
	<div class="breadcrum">
		User Profile
	</div>

	<div class="user">
		<h2>User <?php echo $_GET['id']; ?></h2>
		<center>
			<table>
				<tr>
					<td class="reqHistory">
						<div>
							<center>
								<h2>Requests History</h2>
								<a href="">View</a>
							</center>
						</div>
					</td>
					<td class="feedHistory">
						<div>
							<center>
								<h2>Feedback History</h2>
								<a href="">View</a>
							</center>
						</div>
					</td>
				</tr>
			</table>
		</center>
	</div>
	<script type="text/javascript" src="../javascript/jquery.js"></script>
	<script type="text/javascript" src="../javascript/jquery.sticky.js"></script>
	<script type="text/javascript" src="../javascript/navigation.js"></script>
</body>
</html>