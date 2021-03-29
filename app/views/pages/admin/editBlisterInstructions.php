<!DOCTYPE html>
<html>
<head>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="shortcut icon" type="image/jpg" href="../img/appLogo.png"/>
	<link rel="stylesheet" type="text/css" href="../css/admin/editBlisterInstructions.css">
	<link rel="stylesheet" type="text/css" href="../css/admin/adminHeader.css">
	<link rel="stylesheet" type="text/css" href="../css/includecss/footer.css">
	<link rel="stylesheet" type="text/css" href="../css/includecss/sidebar.css">
	<link rel="stylesheet" type="text/css" href="../css/includecss/breadcrumb.css">
	<link rel="stylesheet" type="text/css" href="../css/includecss/preloader.css">
	<link rel="stylesheet" type="text/css" href="../css/includecss/loader.css">
	<link rel="stylesheet" type="text/css" href="../css/includecss/topButton.css">
	<script type="text/javascript" src="../javascript/jquery.js"></script>
	<script type="text/javascript" src="../javascript/preloader.js"></script>
	<title>Edit Instructions</title>
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
			<li><a href="bleeding">Blister</a></li>
			<li>Edit</li>
		</ul>
	</div>
	<div class="form">
		<div class="frame">
			<center>
				<form method="post" id="blisterForm" name="blisterForm" enctype="multipart/form-data">
					<div class="row">
						<div class="namediv">
							<h1>Blister Instructions</h1>
						</div>
						<div class="column1">
							<?php foreach($data['instruction'] as $instruction){ ?>
							<?php if(!empty($instruction->image)) { ?>
								<img src="../../careu-php/images/<?php echo $instruction->image; ?>" class="iPic" id="iPic"><br>
							<?php } else {?>
								<canvas class="picture1" id="picture1"></canvas><br>
							<?php }?>
							<canvas class="picture2 hidden" id="picture2"></canvas><br>
							<input type="file" name="image" id="instructionPicture"><br>
						</div>
						<div class="column2">
							<input type="text" name="id" id="id" value="<?php echo $instruction->id; ?>">
							<label class="lab" >Step No</label>
							<input type="text" name="stepNumber" value="<?php echo $instruction->step; ?>" id="stepNumber"><br>
							<label class="lab" >Add Description</label>
							<textarea class="description" type="text" name="description" id="description"><?php echo $instruction->description; ?></textarea><br>
							<?php } ?>
							<p class="hide" id="err">Error</p>
							<input type="submit" value="SAVE" name="submit" id="submit">
						</div>
					</div>
				</form>
			</center>
		</div>
	</div>
	<div id="modal1" class="modal">
		<div class="message">
			<div class="container">
				<div class="titleconfirm">
					<h1>Saved!</h1>
				</div>
				<div class="confirm">
					<img src="../img/modelicons/success.svg" alt="">
					<p>Changes saved successfuly!</p>
				</div>
			</div>
		</div>
	</div>
	<button onclick="topFunction()" id="myBtn" title="Go to top">Top</button>
	<script type="text/javascript" src="../javascript/topButton.js"></script>
	<script type="text/javascript" src="../javascript/editBlisterInstuctions.js"></script>
	<script type="text/javascript" src="../javascript/adminnotification.js"></script>
</body>
</html>