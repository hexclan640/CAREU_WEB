<?php foreach($data['requestsInfo'] as $requestsInfo){ ?>
	<a href="verifieduser?id=<?php echo $requestsInfo->requestId; ?>" class="link">
		<div class="requestrow">
			<div class="userPic">
				<?php if($requestsInfo->gender=="Male") { ?>
					<img src="../img/recentRequests/profileMale.svg">
				<?php } else if($requestsInfo->gender=="Female") { ?>
					<img src="../img/recentRequests/profileFemale.svg">
				<?php } else {?>
					<img src="../img/recentRequests/user.svg">
                <?php } ?>
			</div>
			<div class="brief1">
				<h1><?php echo $requestsInfo->firstName." ".$requestsInfo->lastName; ?></h1>
                <h3><?php echo $requestsInfo->phoneNumber; ?></h3>
            </div>
            <div class="brief2">
                <div class="details">
                    <div class="patients">
                        <img src="../img/recentRequests/patients.svg" alt="">
                        <p><?php echo $requestsInfo->numberOfPatients; ?></p>
                    </div>
                    <div class="police">
                        <img src="../img/recentRequests/police.svg" alt="">
                        <p><?php echo $requestsInfo->policeStation; ?></p>
                    </div>
                    <div class="time">
                        <img src="../img/recentRequests/datetime.svg" alt="">
                        <p><?php echo $requestsInfo->time; ?></p>
                        <p><?php echo $requestsInfo->date; ?></p>
                    </div>
                    <div class="district">
                        <img src="../img/recentRequests/district.svg" alt="">
                        <p><?php echo $requestsInfo->district; ?></p>
                    </div>
                </div>
            </div>
		</div>
	</a>
<?php } ?>