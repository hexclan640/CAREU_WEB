<?php if($data['feedbackInfo']){ ?>
<h1 class="heading">Feedback History</h1>
<?php foreach($data['feedbackInfo'] as $feedbackInfo){ if($feedbackInfo->comment!="" && $feedbackInfo->feedbackTime!="") { ?>
	<div class="feedbackrow">
		<div class="fdiv">
			<div class="fbox">
				<p><?php echo $feedbackInfo->comment ?></p>
			</div>
			<div class="frate">
				<div class="outer-star">
					<?php echo '<div class="inner-star" id="'.$feedbackInfo->feedbackId.'">'?>
						<script>
							var rating="<?php echo $feedbackInfo->ratings; ?>";
							var id="<?php echo $feedbackInfo->feedbackId; ?>";
							var ratingPercentage = rating / 5 * 100;
							var ratingRounded = Math.round(ratingPercentage / 10) * 10 + '%';
							var star = document.getElementById(`${id}`);
							star.style.width = ratingRounded;
						</script>
					</div>
				</div>
				<span class="numberRating" id="numberRating"> <?php echo $feedbackInfo->ratings; ?></span>
				<p>Service Rating</p>
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