<!DOCTYPE html>
<html>
<head>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="shortcut icon" type="image/jpg" href="../img/appLogo.png"/>
	<link rel="stylesheet" type="text/css" href="../css/admin/bleedingInstructions.css">
	<link rel="stylesheet" type="text/css" href="../css/admin/adminHeader.css">
	<link rel="stylesheet" type="text/css" href="../css/includecss/footer.css">
	<link rel="stylesheet" type="text/css" href="../css/includecss/sidebar.css">
	<link rel="stylesheet" type="text/css" href="../css/includecss/breadcrumb.css">
	<title>Bleeding First Aids</title>
</head>
<body>
	<div class="breadcrum" id="breadcrum">
		<ul class="breadcrumb">
			<li><a href="home">Home</a></li>
			<li><a href="firstaids">First Aids</a></li>
			<li>Bleeding</li>
		</ul>
	</div>
	<div class="form1">
		<div class="frame">
			<center>
				<form action="updatebleeding" method="post" id="bleedingForm" name="bleedingForm" enctype="multipart/form-data">
					<div class="row">
						<div class="namediv">
							<h1>Bleeding Instructions</h1>
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
							<p class="hide" id="err">Error</p>
							<input type="submit" value="Add" name="submit" id="submit" onclick="return check()">
						</div>
					</div>
				</form>
			</center>
		</div>
	</div>
	<div class="form">
		<center>
			<div class="instructionrow">
				<?php foreach($data['instructions'] as $instructions){ ?>
				<div class="instructioncol">
					<div class="details">
						<div class="step">
							<div class="stepname">
								<h2 class="stepx"><?php echo $instructions->step; ?></h2><br>
								<?php if(!empty($instructions->image)) { ?>
								<img src="../../careu-php/images/<?php echo $instructions->image; ?>" alt="">
								<?php } ?>
							</div>
						</div>
						<div class="stepdescription">
							<p><?php echo $instructions->description; ?></p>
						</div>
						<div class="options">
							<a onclick="confirm(<?php echo $instructions->id; ?>)" class="edit"><img src="../img/instructionIcons/delete.svg" alt=""></a>
							<a href="editBleeding?id=<?php echo $instructions->id; ?>"><img src="../img/instructionIcons/edit.svg" alt=""></a>
						</div>
					</div>
				</div>
				<?php } ?>	
			</div>	
		</center>
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
	<?php if(isset($_SESSION['instruction'])){?>
		<script>
			document.getElementById('modal1').style.display = 'block';
			setTimeout(function(){document.getElementById('modal1').style.display = 'none'; }, 2000);
		</script>
	<?php unset($_SESSION['newinstruction']);} ?>
	<?php if(isset($_SESSION['newinstruction'])){?>
		<script>
			document.getElementById('modal2').style.display = 'block';
			setTimeout(function(){document.getElementById('modal2').style.display = 'none'; }, 2000);
		</script>
	<?php unset($_SESSION['newinstruction']);} ?>
	<?php if(isset($_SESSION['deleteinstruction'])){?>
		<script>
			document.getElementById('modal4').style.display = 'block';
			setTimeout(function(){document.getElementById('modal4').style.display = 'none'; }, 2000);
		</script>
	<?php unset($_SESSION['deleteinstruction']);} ?>
	<script type="text/javascript" src="../javascript/jquery.js"></script>
	<script type="text/javascript" src="../javascript/instructions.js"></script>
	<script type="text/javascript" src="../javascript/bleedingInstructions.js"></script>
</body>
</html>