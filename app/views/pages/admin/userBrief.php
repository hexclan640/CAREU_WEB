<?php foreach($data['usersInfo'] as $usersInfo){ ?>
	<a href="verifieduser?id=<?php echo $usersInfo->userId; ?>">
		<div class="userrow">
			<div class="userPic">
				<?php if($usersInfo->gender=="Male") { ?>
					<img src="../img/userManagement/verifiedMale.svg">
				<?php } else if($usersInfo->gender=="Female") { ?>
					<img src="../img/userManagement/verifiedFemale.svg">
				<?php } else {?>
					<img src="../img/userManagement/verifiedUser.svg">
				<?php } ?>
			</div>
			<div class="column1">
				<h2><?php echo $usersInfo->firstName." ".$usersInfo->lastName; ?><img src="../img/userManagement/virified.svg" alt=""></h2>
				<p><img src="../img/footer/envelope.svg"/><?php echo $usersInfo->email; ?></p>
				<p><img src="../img/footer/call.svg"/><?php echo $usersInfo->phoneNumber; ?></p>
			</div>
			<div class='column2'>
			</div>
		</div>
	</a>
<?php } ?>