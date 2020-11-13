<!DOCTYPE html>
<html>
<head>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="shortcut icon" type="image/jpg" href="../img/appLogo.png"/>
	<link rel="stylesheet" type="text/css" href="../css/admin/editBleedingInstructions.css">
	<link rel="stylesheet" type="text/css" href="../css/admin/adminHeader.css">
	<link rel="stylesheet" type="text/css" href="../css/includecss/footer.css">
	<title>Edit Instructions</title>
</head>
<body>
	<div class="breadcrum">
		Edit Instructions
	</div>
	<div class="form">
		<center>
			<form action="savebleeding" method="post" id="bleedingForm" name="bleedingForm" enctype="multipart/form-data">
				<div class="row">
			  		<div class="column1">
                        <?php foreach($data['instruction'] as $instruction){ ?>
						<?php if(!empty($instruction->image)) { ?>
							<img src="../img/images/<?php echo $instruction->image; ?>" class="iPic" id="iPic"><br>
						<?php } else {?>
							<canvas class="picture1" id="picture1"></canvas><br>
						<?php }?>
						<canvas class="picture2 hidden" id="picture2"></canvas><br>
						<input type="file" name="image" id="instructionPicture"><br>
					</div>
			  		<div class="column2">
			  			<label>Step No</label><br>
						<label>Add Description</label><br>
			  		</div>
			  		<div class="column3">
                        <input type="text" name="id" id="id" value="<?php echo $instruction->id; ?>">
			  			<label class="lab" >Step No</label>
			  			<input type="text" name="stepNumber" value="<?php echo $instruction->step; ?>" id="stepNumber"><br>
			  			<label class="lab" >Add Description</label>
                        <textarea class="description" type="text" name="description" id="description"><?php echo $instruction->description; ?></textarea><br>
                        <?php } ?>
						<p class="hide" id="err">Error</p>
						<input type="submit" value="SAVE" name="submit" id="submit" onclick="return check()">
			  		</div>
				</div>
			</form>
		</center>
	</div>
	<script type="text/javascript" src="../javascript/jquery.js"></script>
	<script type="text/javascript" src="../javascript/jquery.sticky.js"></script>
	<script type="text/javascript" src="../javascript/headerAdmin.js"></script>
	<script type="text/javascript" src="../javascript/editInstructions.js"></script>
</body>
</html>