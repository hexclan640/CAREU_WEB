<?php foreach($data['requestInfo'] as $requestInfo){ ?>
	<a href="userprofile?id=<?php echo $requestInfo->userId; ?>">
		<div class="userrow">
			<div class="userPic">
				<?php if($requestInfo->gender=="Male") { ?>
					<img src="../img/userManagement/newUserMale.svg">
				<?php } else if($requestInfo->gender=="Female") { ?>
					<img src="../img/userManagement/newUserFemale.svg">
				<?php } else {?>
					<img src="../img/userManagement/verifiedUser.svg">
				<?php } ?>
			</div>
			<div class="column1">
				<h2><?php echo $requestInfo->firstName." ".$requestInfo->lastName; ?><img src="../img/userManagement/unverified.svg" alt=""></h2>
				<p><img src="../img/footer/envelope.svg"/><?php echo $requestInfo->email; ?></p>
				<p><img src="../img/footer/call.svg"/><?php echo $requestInfo->phoneNumber; ?></p>
			</div>
		</div>
	</a>
<?php } ?>