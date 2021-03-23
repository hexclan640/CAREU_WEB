<?php foreach($data['operatorInfo1990'] as $operatorInfo1990){ ?>
    <div class="userrow">
        <div class="userPic">
			<img src="../img/operators/profile.svg">
        </div>
        <div class="column1">
            <h2><?php echo $operatorInfo1990->firstName." ".$operatorInfo1990->lastName; ?><img src="../img/userManagement/virified.svg" alt=""></h2>
       	    <p><img src="../img/operators/username.svg"/><?php echo $operatorInfo1990->userName; ?></p>
            <p><img src="../img/operators/gender.svg"/><?php echo $operatorInfo1990->gender; ?></p>
		</div>
		<div class="column2">
			<button onclick="confirm2(<?php echo $operatorInfo1990->userId; ?>)">REMOVE</button>
		</div>
    </div>
<?php } ?>