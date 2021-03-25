<!DOCTYPE html>
<html>
<head>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="shortcut icon" type="image/jpg" href="../img/appLogo.png"/>
	<link rel="stylesheet" type="text/css" href="../css/admin/blisterInstructions.css">
	<link rel="stylesheet" type="text/css" href="../css/admin/adminHeader.css">
	<link rel="stylesheet" type="text/css" href="../css/includecss/footer.css">
	<link rel="stylesheet" type="text/css" href="../css/includecss/sidebar.css">
	<link rel="stylesheet" type="text/css" href="../css/includecss/breadcrumb.css">
	<link rel="stylesheet" type="text/css" href="../css/includecss/preloader.css">
	<link rel="stylesheet" type="text/css" href="../css/includecss/loader.css">
	<link rel="stylesheet" type="text/css" href="../css/includecss/topButton.css">
	<title>Blister First Aids</title>
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
			<li><a href="firstaids">First Aids</a></li>
			<li>Blister</li>
		</ul>
	</div>
	<div class="form1">
		<div class="frame">
			<center>
				<form action="updateblister" method="post" id="blisterForm" name="blisterForm" enctype="multipart/form-data">
					<div class="row">
						<div class="namediv">
							<h1>Blister Instructions</h1>
						</div>
						<div class="column1">
							<canvas class="picture" id="picture"></canvas><br>
							<input type="file" name="image" id="instructionPicture">
						</div>
						<div class="column2">
							<label class="lab" >Step No</label>
							<input type="text" name="stepNumber" id="stepNumber"><br>
							<label class="lab" >Add Description</label>
							<textarea class="description" type="text" name="description" id="description"></textarea><br>
							<center><p class="hide" id="err">Error</p></center>
							<input type="submit" value="ADD" name="submit" id="submit" onclick="return check()">
						</div>
					</div>
				</form>
			</center>
		</div>
	</div>
	<div class="form">
		<center>
			<div class="instructionrow" id="instructionrow">	
			</div>	
		</center>
	</div>
	<div id="modal2" class="modal">
		<div class="message">
			<div class="container">
				<div class="titleconfirm">
					<h1>Success!</h1>
				</div>
				<div class="confirm">
					<img src="../img/modelicons/success.svg" alt="">
					<p>Added successfuly!</p>
				</div>
			</div>
		</div>
	</div>
	<div id="modal3" class="modal">
		<div class="message">
			<div class="container">
				<div class="titleconfirm">
					<h1>Confirm !</h1>
				</div>
				<div class="confirm">
					<p>Are you sure you want to delete?</p>
				</div>
				<div class="clearfix">
					<div class="clicks">
						<div class="btns">
							<a href="" class="yes" id="yes">Yes</a>
						</div>
						<div class="btns">
							<a onclick="closeconfirm()" class="no">Cancel</a>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<div id="modal4" class="modal">
		<div class="message">
			<div class="container">
				<div class="titleconfirm">
					<h1>Success!</h1>
				</div>
				<div class="confirm">
					<img src="../img/modelicons/success.svg" alt="">
					<p>Deleted successfuly!</p>
				</div>
			</div>
		</div>
	</div>
	<button onclick="topFunction()" id="myBtn" title="Go to top">Top</button>
	<script type="text/javascript" src="../javascript/topButton.js"></script>
	<script type="text/javascript" src="../javascript/jquery.js"></script>
	<script type="text/javascript" src="../javascript/instructions.js"></script>
	<script type="text/javascript" src="../javascript/blisterInstructions.js"></script>
	<script type="text/javascript" src="../javascript/adminnotification.js"></script>
	<script type="text/javascript" src="../javascript/preloader.js"></script>
</body>
</html>