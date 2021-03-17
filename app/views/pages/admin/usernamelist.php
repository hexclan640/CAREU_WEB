<?php if($data['operatorInfo']){ ?>
	<?php foreach($data['operatorInfo'] as $operatorInfo){ ?>
        <div class="usernamelist">
            <p><?php echo $operatorInfo->username; ?></p>
        </div>
	<?php } ?>
<?php } else{?>
    <div class="alert" id="alert">
		<center>
			<p>-No such a username-</p>
		</center>
    </div>
<?php } ?>