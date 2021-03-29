<!DOCTYPE html>
<html>
<head>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="shortcut icon" type="image/jpg" href="../img/appLogo.png"/>
	<link rel="stylesheet" type="text/css" href="../css/119Operator/viewRequest.css">
	<link rel="stylesheet" type="text/css" href="../css/includecss/operatorHeader.css">
	<link rel="stylesheet" type="text/css" href="../css/includecss/footer.css">
	<link rel="stylesheet" type="text/css" href="../css/includecss/sidebar.css">
	<link rel="stylesheet" type="text/css" href="../css/includecss/breadcrumb.css">
	<link rel="stylesheet" type="text/css" href="../css/includecss/preloader.css">
	<link rel="stylesheet" type="text/css" href="../css/includecss/loader.css">
	<link rel="stylesheet" type="text/css" href="../css/includecss/topButton.css">
	<script type="text/javascript" src="../javascript/jquery.js"></script>
	<script type="text/javascript" src="../javascript/preloader.js"></script>
	<title>Request Details</title>
</head>
<body onload="timeoutchecker(<?php echo $_GET['id']?>)">
	<div class="loader-wrapper">
		<span class="loader"><span class="loader-inner"></span></span>
	</div>
	<div class="loader-wrapper2" id="loader-wrapper2">
		<span class="loader2"><span class="loader-inner2"></span></span>
	</div>
	<div class="breadcrum" id="breadcrum">
		<ul class="breadcrumb">
			<li><a href="home">Home</a></li>
			<li><a href="recent">Recent</a></li>
  			<li>Request</li>
		</ul>
	</div>
	<div class="reqInfomations">
		<?php foreach($data['requestInfo'] as $requestInfo){ ?>
			<div class="requestrow">
				<div class="userPic">
					<?php if($requestInfo->gender=="Male") { ?>
						<img src="../img/recentRequests/profileMale.svg">
					<?php } else if($requestInfo->gender=="Female") { ?>
						<img src="../img/recentRequests/profileFemale.svg">
					<?php } else {?>
						<img src="../img/recentRequests/user.svg">
					<?php } ?>
				</div>
				<div class="brief1">
					<h1><?php echo $requestInfo->firstName." ".$requestInfo->lastName; ?></h1>
					<h3><?php echo $requestInfo->email; ?></h3>
					<h3><?php echo $requestInfo->phoneNumber; ?></h3>
				</div>
				<div class="brief2">
					<div class="details">
						<div class="patients">
							<img src="../img/recentRequests/category.svg" alt="">
							<p><?php echo $requestInfo->numberOfPatients; ?></p>
						</div>
						<div class="police">
							<img src="../img/recentRequests/police.svg" alt="">
							<p><?php echo $requestInfo->policeStation; ?></p>
						</div>
						<div class="time">
							<img src="../img/recentRequests/datetime.svg" alt="">
							<p><?php echo $requestInfo->time; ?></p>
							<p><?php echo $requestInfo->date; ?></p>
						</div>
						<div class="district">
							<img src="../img/recentRequests/district.svg" alt="">
							<p><?php echo $requestInfo->district; ?></p>
						</div>
					</div>
				</div>
			</div>
			<div class="reqDetails">
				<div class="description">
					<p class="specialnote">Special Notes</p>
					<textarea name="specialnote" cols="30" rows="16" disabled><?php echo $requestInfo->description; ?></textarea>
				</div>
				<div class="emergencylocation">
					<div id="googleMap" style="width:100%;height:400px;"></div>
					<script>
						function myMap() {
							var latitude='<?php echo $requestInfo->latitude; ?>';
							var longitude='<?php echo $requestInfo->longitude; ?>';
							var mapProp= {
								center:new google.maps.LatLng(latitude,longitude),
								zoom:18,
								};
							var map = new google.maps.Map(document.getElementById("googleMap"),mapProp);
							var marker = new google.maps.Marker({
								position: new google.maps.LatLng(latitude,longitude),
								map:map
							});
						}
					</script>
				</div>
				<div class="sendbtns" id="sendbtns">
					<p class="note" id="note"></p>
					<?php if($requestInfo->flag==0){?>
						<form action="" id="acceptform" method="post">
							<input type="text" value="<?php echo $requestInfo->requestId ?>" name="requestId" id="requestId1" hidden>
							<input type="submit" id="accept" class="accept" value="ACCEPT">
						</form>
						<button class="reject" onclick="confirm()" id="rejectbtn">REJECT</button>
					<?php }?>
				</div>
			</div>
		<div class="reply">
			<div class="cusmessage">
				<p class="specialnote">Send Message</p>
				<form method="post" id="messageForm">
					<input type="text" value="<?php echo $requestInfo->requestId ?>" name="requestId" id="requestId3" hidden>
					<textarea name="specialnote" cols="30" rows="5" id="message"></textarea>
					<input type="submit" id="send" value="SEND">
				</form>
			</div>
		</div>
	</div>
	<div id="modal1" class="modal">
		<div class="message">
			<div class="container">
				<div class="titleconfirm">
					<h1>Confirm !</h1>
				</div>
				<div class="confirm">
					<p>Are you sure you want to reject the request?</p>
				</div>
				<div class="clearfix">
					<div class="clicks">
						<div class="btns">
							<form action="" id="rejectform" method="post">
								<input type="text" value="<?php echo $requestInfo->requestId ?>" name="requestId" id="requestId2" hidden>
								<input type="submit" id="reject" class="yes" value="Yes">
							</form>
						</div>
						<div class="btns">
							<a onclick="closeconfirm()" class="no">Cancel</a>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<?php } ?>
	<div id="modal2" class="modal">
		<div class="message">
			<div class="container">
				<div class="titleconfirm">
					<h1>Sent!</h1>
				</div>
				<div class="confirm">
					<img src="../img/modelicons/success.svg" alt="">
					<p>Message Sent!</p>
				</div>
			</div>
		</div>
	</div>
	<button onclick="topFunction()" id="myBtn" title="Go to top">Top</button>
	<script type="text/javascript" src="../javascript/topButton.js"></script>
	<script type="text/javascript" src="../javascript/headerSuwasariya.js"></script>
	<script type="text/javascript" src="../javascript/suwasariyaNotification.js"></script>
	<script type="text/javascript" src="../javascript/viewRequest.js"></script>
	<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAuUFIqw6r-ifKemRUTI9obFZghDIrcNHE&callback=myMap"></script>
</body>
</html>