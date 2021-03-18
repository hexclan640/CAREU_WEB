<!DOCTYPE html>
<html>
<head>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="shortcut icon" type="image/jpg" href="../img/appLogo.png"/>
	<link rel="stylesheet" type="text/css" href="../css/admin/viewRequest.css">
	<link rel="stylesheet" type="text/css" href="../css/admin/adminheader.css">
	<link rel="stylesheet" type="text/css" href="../css/includecss/footer.css">
	<link rel="stylesheet" type="text/css" href="../css/includecss/sidebar.css">
	<link rel="stylesheet" type="text/css" href="../css/includecss/breadcrumb.css">
	<link rel="stylesheet" type="text/css" href="../css/includecss/preloader.css">
	<link rel="stylesheet" type="text/css" href="../css/includecss/topButton.css">
	<title>Request Details</title>
</head>
<body>
	<div class="loader-wrapper">
		<span class="loader"><span class="loader-inner"></span></span>
	</div>
	<?php foreach($data['requestInfo'] as $requestInfo){ ?>
	<div class="breadcrum" id="breadcrum">
		<ul class="breadcrumb">
			<li><a href="home">Home</a></li>
			<li><a href="usermanagement">Users</a></li>
			<li><a href="verifieduser?id=<?php echo $requestInfo->userId; ?>">User Profile</a></li>
			<li>Police Request</li>
		</ul>
	</div>
	<div class="reqInfomations">
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
					<h3><?php echo $requestInfo->phoneNumber; ?></h3>
				</div>
				<div class="brief2">
					<div class="details">
						<div class="patients">
							<img src="../img/recentRequests/category.svg" alt="">
							<p><?php echo $requestInfo->complainCategory; ?></p>
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
					<p class="note">Special Notes</p>
					<textarea name="specialnote" cols="30" rows="10" disabled><?php echo $requestInfo->description; ?></textarea>
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
			</div>
		<?php } ?>
	</div>
	<button onclick="topFunction()" id="myBtn" title="Go to top">Top</button>
	<script type="text/javascript" src="../javascript/topButton.js"></script>
	<script type="text/javascript" src="../javascript/headerSuwasariya.js"></script>
	<script type="text/javascript" src="../javascript/jquery.js"></script>
	<script type="text/javascript" src="../javascript/adminNotification.js"></script>
	<script type="text/javascript" src="../javascript/viewRequest.js"></script>
	<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAuUFIqw6r-ifKemRUTI9obFZghDIrcNHE&callback=myMap"></script>
	<script type="text/javascript" src="../javascript/preloader.js"></script>
</body>
</html>