<!DOCTYPE html>
<html>
<head>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="shortcut icon" type="image/jpg" href="../img/appLogo.png"/>
	<link rel="stylesheet" type="text/css" href="../css/119Operator/viewRequest.css">
	<link rel="stylesheet" type="text/css" href="../css/includecss/operatorHeader.css">
	<link rel="stylesheet" type="text/css" href="../css/includecss/footer.css">
	<link rel="stylesheet" type="text/css" href="../css/includecss/topButton.css">
	<title>Request <?php echo $_GET['id']; ?></title>
</head>
<body>
	<div class="breadcrum" id="breadcrum">
		<ul class="breadcrumb">
			<li><a href="home">Home</a></li>
			<li><a href="firstaids">First Aids</a></li>
  			<li>Cardiac</li>
		</ul>
	</div>

	<div class="reqDetails">
		<table>
			<tr>
				<td>
					<div class="details">
						Request Details
					</div>
				</td>
			</tr>
			<tr>
				<td>
					<div class="feedback">
						Feedback
					</div>
				</td>
			</tr>
		</table>
	</div>
	<button onclick="topFunction()" id="myBtn" title="Go to top">Top</button>
	<script type="text/javascript" src="../javascript/topButton.js"></script>
	<script type="text/javascript" src="../javascript/jquery.js"></script>
	<script type="text/javascript" src="../javascript/headerPolice.js"></script>
	<script type="text/javascript" src="../javascript/policeNotification.js"></script>
</body>
</html>