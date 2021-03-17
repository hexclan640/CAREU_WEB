<?php if($data['requestsInfo']){ ?>
    <?php foreach($data['requestsInfo'] as $requestsInfo){ ?>
        <a href="allrequests?id=<?php echo $requestsInfo->requestId; ?>" class="link">
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
                    <?php if($requestsInfo->flag==1){ ?>
                        <p class="name"><?php echo $requestsInfo->firstName." ".$requestsInfo->lastName; ?><span class="acceptspan">Accepted</span></p>
                    <?php }else if($requestsInfo->flag==2){ ?>
                        <p class="name"><?php echo $requestsInfo->firstName." ".$requestsInfo->lastName; ?><span class="rejectspan">Rejected</span></p>
                    <?php } else if($requestsInfo->flag==0){?>
                        <p class="name"><?php echo $requestsInfo->firstName." ".$requestsInfo->lastName; ?><span class="notviewedspan">Not Viewed</span></p>
                    <?php } ?>
                    <p class="pNumber"><?php echo $requestsInfo->email; ?></p>
                    <p class="pNumber"><?php echo $requestsInfo->phoneNumber; ?></p>
                </div>
                <div class="brief2">
                    <div class="details">
                        <div class="patients">
                            <img src="../img/recentRequests/patients.svg" alt="">
                            <p><?php echo $requestsInfo->complainCategory; ?></p>
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
    <?php } }else{?>
    <div class="alert" id="alert">
		<center>
			<p>-No recent found-</p>
		</center>
    </div>
<?php } ?>