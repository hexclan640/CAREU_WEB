<!DOCTYPE html>
<html>
<head>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="shortcut icon" type="image/jpg" href="../img/appLogo.png"/>
	<link rel="stylesheet" type="text/css" href="../css/119Operator/viewNewRequest.css">
	<link rel="stylesheet" type="text/css" href="../css/includecss/operatorHeader.css">
	<link rel="stylesheet" type="text/css" href="../css/includecss/footer.css">
	<link rel="stylesheet" type="text/css" href="../css/includecss/sidebar.css">
	<link rel="stylesheet" type="text/css" href="../css/includecss/breadcrumb.css">
	<title>Request <?php echo $_GET['id']; ?></title>
</head>
<body>
	<div class="breadcrum" id="breadcrum">
		<ul class="breadcrumb">
			<li><a href="home">Home</a></li>
			<li><a href="recent">Recent</a></li>
  			<li>Request</li>
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
					<textarea class="message" placeholder="Type..."></textarea>
					<a href="" class="send">Send</a>
				</td>
			</tr>
			<tr>
				<td>
					<a href="" class="accept">Accept</a>
					<a href="" class="reject">Reject</a>
				</td>
			</tr>
		</table>
	</div>
	<script type="text/javascript" src="../javascript/jquery.js"></script>
</body>
</html>