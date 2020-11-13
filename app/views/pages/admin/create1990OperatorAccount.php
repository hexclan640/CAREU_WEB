<!DOCTYPE html>
<html>
<head>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="shortcut icon" type="image/jpg" href="../img/appLogo.png"/>
	<link rel="stylesheet" type="text/css" href="../css/admin/create1990OperatorAccount.css">
	<link rel="stylesheet" type="text/css" href="../css/admin/adminHeader.css">
	<link rel="stylesheet" type="text/css" href="../css/includecss/footer.css">
	<title>119 Operator Account</title>
</head>
<body>
	<div class="breadcrum">
		New Suwasariya Operator
	</div>
	<div class="form">
		<center>
			<form action="" method="post" id="formOperator1990">
				<div class="row">
			  		<div class="column1">
			  			<canvas class="picture" id="picture">
										
						</canvas>
					</div>
			  		<div class="column2">
			  			<label>User Name</label><br>
						<label>First Name</label><br>
						<label>Last Name</label><br>
						<label>Gender</label><br>
						<label>Password</label><br>
						<label>Re-enter Password</label><br>
			  		</div>
			  		<div class="column3">
			  			<label class="lab" >User Name</label>
			  			<input type="text" name="userName" id="userName"><br>
			  			<label class="lab" >First Name</label>
						<input type="text" name="firstName" id="firstName"><br>
						<label class="lab" >Last Name</label>
						<input type="text" name="lastName" id="lastName"><br>
						<label class="lab" >Gender</label>
						<select name="gender" class="gender" id="gender">
							<option value=""></option>
							<option value="Male">Male</option>
							<option value="Female">Female</option>
						</select>
						<label class="lab">Password</label>
						<input type="password" name="password1" id="password1"><br>
						<label class="lab" >Re-enter Password</label>
						<input type="text" name="password2" id="password2"><br>
						<p class="hide" id="err">Error</p>
						<input type="submit" value="CREATE" name="submit" id="submit">
			  		</div>
				</div>
			</form>
		</center>
	</div>
	<script type="text/javascript" src="../javascript/jquery.js"></script>
	<script type="text/javascript" src="../javascript/jquery.sticky.js"></script>
	<script type="text/javascript" src="../javascript/headerAdmin.js"></script>
	<script type="text/javascript" src="../javascript/newOperator1990.js"></script>
</body>
</html>