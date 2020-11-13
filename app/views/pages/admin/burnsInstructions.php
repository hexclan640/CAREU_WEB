<!DOCTYPE html>
<html>
<head>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="shortcut icon" type="image/jpg" href="../img/appLogo.png"/>
	<link rel="stylesheet" type="text/css" href="../css/admin/burnsInstructions.css">
	<link rel="stylesheet" type="text/css" href="../css/admin/adminHeader.css">
	<link rel="stylesheet" type="text/css" href="../css/includecss/footer.css">
	<title>Burn First Aids</title>
</head>
<body>
	<div class="breadcrum">
		Burn First Aids
	</div>
	<div class="form">
		<center>
			<form action="updateburn" method="post" id="burnsForm" name="burnsForm" enctype="multipart/form-data">
				<div class="row">
			  		<div class="column1">
						<canvas class="picture" id="picture"></canvas><br>
						<input type="file" name="image" id="instructionPicture">
					</div>
			  		<div class="column2">
			  			<label>Step No</label><br>
						<label>Add Description</label><br>
			  		</div>
			  		<div class="column3">
			  			<label class="lab" >Step No</label>
			  			<input type="text" name="stepNumber" id="stepNumber"><br>
			  			<label class="lab" >Add Description</label>
						<textarea class="description" type="text" name="description" id="description"></textarea><br>
						<p class="hide" id="err">Error</p>
						<input type="submit" value="ADD" name="submit" id="submit" onclick="return check()">
			  		</div>
				</div>
			</form>
		</center>
	</div>
	<div class="form">
		<center>
			<div class="instructionrow">
				<?php foreach($data['instructions'] as $instructions){ ?>
					<div class="instructioncol">
						<div class="details">
							<h2 class="stepx"><?php echo $instructions->step; ?></h2><br>
							<?php if(!empty($instructions->image)) { ?>
								<img src="../img/images/<?php echo $instructions->image; ?>" alt="">
							<?php } ?>
							<h3><?php echo $instructions->description; ?></h3>
							<div class="options">
								<a href="editBurn?id=<?php echo $instructions->id; ?>">EDIT</a>
								<a href="deleteburn?id=<?php echo $instructions->id; ?>">DELETE</a>
							</div>
						</div>
					</div>
				<?php } ?>	
			</div>	
		</center>
	</div>	
	<script type="text/javascript" src="../javascript/jquery.js"></script>
	<script type="text/javascript" src="../javascript/jquery.sticky.js"></script>
	<script type="text/javascript" src="../javascript/headerAdmin.js"></script>
	<script type="text/javascript" src="../javascript/instructions.js"></script>
</body>
</html>