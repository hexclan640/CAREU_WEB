<?php if($data['feedbackInfo']){ ?>
<h1 class="heading">Feedback History</h1>
<?php foreach($data['feedbackInfo'] as $feedbackInfo){ if($feedbackInfo->comment!="" && $feedbackInfo->feedbackTime!="") {?>
	<div class="feedbackrow">
		<div class="fdiv">
			<div class="fbox">
				<p><?php echo $feedbackInfo->comment ?></p>
			</div>
		    <div class="ftime">
                <hr>
                <p><?php echo $feedbackInfo->feedbackTime; ?></p>
		    </div>
	    </div>
	</div>
<?php } }?>	
<?php } else{?>
    <h1 class="heading">Feedback History</h1>
    <div class="alert" id="alert">
		<center>
			<p>-No feedbacks-</p>
		</center>
    </div>
<?php } ?>