<?php if($data['policeInfo']){ ?>
    <h1 class="heading">Police Requests</h1>
    <?php foreach($data['policeInfo'] as $policeInfo){ ?>
        <a href="viewtherequest?id=<?php echo $policeInfo->requestId; ?>" class="link">
            <div class="requestrow">
                <div class="brief2">
                    <div class="details">
                        <div class="patients">
                            <img src="../img/recentRequests/category.svg" alt="">
                            <p><?php echo $policeInfo->complainCategory; ?></p>
                        </div>
                        <div class="police">
                            <img src="../img/recentRequests/police.svg" alt="">
                            <p><?php echo $policeInfo->policeStation; ?></p>
                        </div>
                        <div class="time">
                            <img src="../img/recentRequests/datetime.svg" alt="">
                            <p><?php echo $policeInfo->time; ?></p>
                            <p><?php echo $policeInfo->date; ?></p>
                        </div>
                        <div class="district">
                            <img src="../img/recentRequests/district.svg" alt="">
                            <p><?php echo $policeInfo->district; ?></p>
                        </div>
                    </div>
                </div>
                <div class="brief1">
                    <?php if($policeInfo->flag==1){ ?>
                        <p class="name"><div class="acceptspan">Accepted</div></p>
                    <?php }else if($policeInfo->flag==2){ ?>
                        <p class="name"><div class="rejectspan">Rejected</div></p>
                    <?php } else if($policeInfo->flag==0){ ?>
                        <p class="name"><div class="notviewedspan">Not Viewed</div></p>
                    <?php } ?>
                </div>
            </div>
        </a>
    <?php } ?>
<?php } else{?>
    <h1 class="heading">Police Requests</h1>
    <div class="alert" id="alert">
		<center>
			<p>-No police requests-</p>
		</center>
    </div>
<?php } ?>

<?php if($data['suwasariyaInfo']){ ?>
    <h1 class="heading">Suwasariya Requests</h1>
    <?php foreach($data['suwasariyaInfo'] as $suwasariyaInfo){ ?>
        <a href="viewtherequest?id=<?php echo $suwasariyaInfo->requestId; ?>" class="link">
            <div class="requestrow">
                <div class="brief2">
                    <div class="details">
                        <div class="patients">
                            <img src="../img/recentRequests/category.svg" alt="">
                            <p><?php echo $suwasariyaInfo->numberOfPatients; ?></p>
                        </div>
                        <div class="police">
                            <img src="../img/recentRequests/police.svg" alt="">
                            <p><?php echo $suwasariyaInfo->policeStation; ?></p>
                        </div>
                        <div class="time">
                            <img src="../img/recentRequests/datetime.svg" alt="">
                            <p><?php echo $suwasariyaInfo->time; ?></p>
                            <p><?php echo $suwasariyaInfo->date; ?></p>
                        </div>
                        <div class="district">
                            <img src="../img/recentRequests/district.svg" alt="">
                            <p><?php echo $suwasariyaInfo->district; ?></p>
                        </div>
                    </div>
                </div>
                <div class="brief1">
                    <?php if($suwasariyaInfo->flag==1){ ?>
                        <p class="name"><div class="acceptspan">Accepted</div></p>
                    <?php }else if($suwasariyaInfo->flag==2){ ?>
                        <p class="name"><div class="rejectspan">Rejected</div></p>
                    <?php } else if($suwasariyaInfo->flag==0){ ?>
                        <p class="name"><div class="notviewedspan">Not Viewed</div></p>
                    <?php } ?>
                </div>
            </div>
        </a>
    <?php } ?>
<?php } else{?>
    <h1 class="heading">Suwasariya Requests</h1>
    <div class="alert" id="alert">
		<center>
			<p>-No suwasariya requests-</p>
		</center>
    </div>
<?php } ?>