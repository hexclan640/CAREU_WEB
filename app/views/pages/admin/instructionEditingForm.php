<div class="frame">
    <center>
		<form method="post" id="cardiacForm" name="cardiacForm" enctype="multipart/form-data">
			<div class="row">
				<div class="namediv">
					<h1>Cardiac Instructions</h1>
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
					<input type="submit" value="Save" name="submit" id="submit1">
				</div>
    		</div>
    	</form>
	</center>
</div>