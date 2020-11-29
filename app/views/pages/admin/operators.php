<!DOCTYPE html>
<html>
<head>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="shortcut icon" type="image/jpg" href="../img/appLogo.png"/>
	<link rel="stylesheet" type="text/css" href="../css/admin/operators.css">
	<link rel="stylesheet" type="text/css" href="../css/admin/adminHeader.css">
	<link rel="stylesheet" type="text/css" href="../css/includecss/footer.css">
	<link rel="stylesheet" type="text/css" href="../css/includecss/sidebar.css">
	<link rel="stylesheet" type="text/css" href="../css/includecss/breadcrumb.css">
	<title>Operators</title>
</head>
<body>
	<div class="breadcrum" id="breadcrum">
		<ul class="breadcrumb">
			<li><a href="home">Home</a></li>
			<li>Operators</li>
		</ul>
	</div>
	<div class="form">
		<div class="updates">
			<div class="column" >
				<div class="category"><h1>Police Operators</h1></div>
				<div class="col" id="col1">
                    <?php foreach($data['operatorInfo119'] as $operatorInfo119){ ?>
                        <div class="userrow">
                            <div class="userPic">
								<div class="userPic">
									<img src="../img/operators/profile.svg">
								</div>
                            </div>
                            <div class="column1">
                                <h2><?php echo $operatorInfo119->firstName." ".$operatorInfo119->lastName; ?><img src="../img/userManagement/virified.svg" alt=""></h2>
                                <p><img src="../img/operators/username.svg"/><?php echo $operatorInfo119->userName; ?></p>
                                <p><img src="../img/operators/gender.svg"/><?php echo $operatorInfo119->gender; ?></p>
							</div>
							<div class="column2">
								<button onclick="confirm1(<?php echo $operatorInfo119->userId; ?>)">Remove</button>
							</div>
                        </div>
                    <?php } ?>
				</div>
			</div>
			<div class="column" >
				<div class="category"><h1>Suwasariya Operators</h1></div>
				<div class="col" id="col1">
                    <?php foreach($data['operatorInfo1990'] as $operatorInfo1990){ ?>
                        <div class="userrow">
                            <div class="userPic">
								<img src="../img/operators/profile.svg">
                            </div>
                            <div class="column1">
                                <h2><?php echo $operatorInfo1990->firstName." ".$operatorInfo1990->lastName; ?><img src="../img/userManagement/virified.svg" alt=""></h2>
                        	    <p><img src="../img/operators/username.svg"/><?php echo $operatorInfo1990->userName; ?></p>
                                <p><img src="../img/operators/gender.svg"/><?php echo $operatorInfo1990->gender; ?></p>
							</div>
							<div class="column2">
								<button onclick="confirm2(<?php echo $operatorInfo1990->userId; ?>)">Remove</button>
							</div>
                        </div>
                    <?php } ?>
				</div>
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
					<p>Are you sure you want to block the user?</p>
				</div>
				<div class="clearfix">
					<div class="clicks">
						<div class="btns">
							<a href="" class="yes" id="yes1">Yes</a>
						</div>
						<div class="btns">
							<a onclick="closeconfirm1()" class="no">Cancel</a>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<div id="modal2" class="modal">
		<div class="message">
			<div class="container">
				<div class="titleconfirm">
					<h1>Confirm !</h1>
				</div>
				<div class="confirm">
					<p>Are you sure you want to block the user?</p>
				</div>
				<div class="clearfix">
					<div class="clicks">
						<div class="btns">
							<a href="" class="yes" id="yes2">Yes</a>
						</div>
						<div class="btns">
							<a onclick="closeconfirm2()" class="no">Cancel</a>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<div id="modal3" class="modal">
		<div class="message">
			<div class="container">
				<div class="titleconfirm">
					<h1>Success!</h1>
				</div>
				<div class="confirm">
					<img src="../img/modelicons/redsuccess.svg" alt="">
					<p>Removed successfuly!</p>
				</div>
			</div>
		</div>
	</div>
	<?php if(isset($_SESSION['operators'])){?>
		<script>
			document.getElementById('modal3').style.display = 'block';
			setTimeout(function(){document.getElementById('modal3').style.display = 'none';}, 2000);
		</script>
	<?php unset($_SESSION['operators']);} ?>
	<script type="text/javascript" src="../javascript/jquery.js"></script>
	<script type="text/javascript" src="../javascript/operators.js"></script>
</body>
</html>