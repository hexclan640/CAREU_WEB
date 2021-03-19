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
				<a onclick="edit(<?php echo $instructions->id; ?>)" class="delete"><img src="../img/instructionIcons/edit.svg" alt=""></a>
			</div>
		</div>
	</div>
<?php } ?>