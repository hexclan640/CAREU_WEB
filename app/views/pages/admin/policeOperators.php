<?php foreach($data['operatorInfo119'] as $operatorInfo119){ ?>
    <div class="userrow">
	    <div class="userPic">
			<img src="../img/operators/profile.svg">
		</div>
        <div class="column1">
            <h2><?php echo $operatorInfo119->firstName." ".$operatorInfo119->lastName; ?><img src="../img/userManagement/virified.svg" alt=""></h2>
            <p><img src="../img/operators/username.svg"/><?php echo $operatorInfo119->userName; ?></p>
            <p><img src="../img/operators/gender.svg"/><?php echo $operatorInfo119->gender; ?></p>
        </div>
		<div class="column2">
    		<button onclick="confirm1(<?php echo $operatorInfo119->userId; ?>)">REMOVE</button>
		</div>
    </div>
<?php } ?>