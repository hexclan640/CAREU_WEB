<!DOCTYPE html>
<html>
<head>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="shortcut icon" type="image/jpg" href="../img/appLogo.png"/>
	<link rel="stylesheet" type="text/css" href="../css/admin/viewUserRequest.css">
	<link rel="stylesheet" type="text/css" href="../css/admin/adminHeader.css">
	<link rel="stylesheet" type="text/css" href="../css/includecss/footer.css">
	<title>Edit Profile</title>

	<style>
body {font-family: Arial, Helvetica, sans-serif;}
* {box-sizing: border-box;}

/* Set a style for all buttons */
button {
  background-color: #4CAF50;
  color: white;
  padding: 14px 20px;
  margin: 8px 0;
  border: none;
  cursor: pointer;
  width: 100%;
  opacity: 0.9;
}

button:hover {
  opacity:1;
}

/* Float cancel and delete buttons and add an equal width */
.cancelbtn, .deletebtn {
  float: left;
  width: 50%;
}

/* Add a color to the cancel button */
.cancelbtn {
  background-color: #ccc;
  color: black;
}

/* Add a color to the delete button */
.deletebtn {
  background-color: #f44336;
}

/* Add padding and center-align text to the container */
.container {
  padding: 16px;
  text-align: center;
}

/* The Modal (background) */
.modal {
  display: none; /* Hidden by default */
  position: fixed; /* Stay in place */
  z-index: 1; /* Sit on top */
  left: 0;
  top: 0;
  width: 100%; /* Full width */
  height: 100%; /* Full height */
  overflow: auto; /* Enable scroll if needed */
  background-color: #474e5d;
  padding-top: 50px;
}

/* Modal Content/Box */
.modal-content {
  background-color: #fefefe;
  margin: 5% auto 15% auto; /* 5% from the top, 15% from the bottom and centered */
  border: 1px solid #888;
  width: 80%; /* Could be more or less, depending on screen size */
}

/* Style the horizontal ruler */
hr {
  border: 1px solid #f1f1f1;
  margin-bottom: 25px;
}
 
/* The Modal Close Button (x) */
.close {
  position: absolute;
  right: 35px;
  top: 15px;
  font-size: 40px;
  font-weight: bold;
  color: #f1f1f1;
}

.close:hover,
.close:focus {
  color: #f44336;
  cursor: pointer;
}

/* Clear floats */
.clearfix::after {
  content: "";
  clear: both;
  display: table;
}

/* Change styles for cancel button and delete button on extra small screens */
@media screen and (max-width: 300px) {
  .cancelbtn, .deletebtn {
     width: 100%;
  }
}
</style>
</head>
<body>
	<div class="breadcrum" id="breadcrum">
		<ul class="breadcrumb">
			<li><a href="home">Home</a></li>
			<li><a href="usermanagement">Users</a></li>
			<li>User Profile</li>
		</ul>
	</div>
	<div class="form">
		<div class="frame">
			<center>
				<div class="row">
					<div col=column1>
						<div class="photorow">
							<div class="photo1col">
								<img src="../img/unknown.jpg" id="idImg1">
							</div>
							<div class="photo2col">
								<img src="../img/unknown.jpg" id="idImg2">
							</div>
							<div id="zoomImg" class="zoomImg">
								<span class="close">&times;</span>
								<img class="idImg" id="img">
							</div>
						</div>
					</div>
					<div class="column2">
						<label>First Name</label><br>
						<label>Last Name</label><br>
						<label>Username</label><br>
						<label>NIC</label><br>
						<label>E-mail</label><br>
						<label>Phone Number</label><br>
						<label>Gender</label><br>
						<label>Date of Birth</label><br>
						<label>Address</label><br>
					</div>
					<div class="column3">
						<?php foreach($data['userInfo'] as $userInfo){ ?>
						<label class="lab">First Name</label>
						<input type="text" value="<?php echo $userInfo->firstName; ?>" disabled><br>
						<label class="lab">Last Name</label>
						<input type="text" value="<?php echo $userInfo->lastName; ?>" disabled><br>
						<label class="lab">Username</label>
						<input type="text"value="<?php echo $userInfo->userName; ?>" disabled><br>
						<label class="lab">NIC</label>
						<input type="text" value="<?php echo $userInfo->nicNumber; ?>" disabled><br>
						<label class="lab">E-mail</label>
						<input type="text" value="<?php echo $userInfo->email; ?>" disabled><br>
						<label class="lab">Phone Number</label>
						<input type="text" value="<?php echo $userInfo->phoneNumber; ?>" disabled><br>
						<label class="lab">Gender</label>
						<input type="text" value="<?php echo $userInfo->gender; ?>" disabled><br>
						<label class="lab">Date of Birth</label>
						<input type="text" value="<?php echo $userInfo->dateOfBirth; ?>" disabled><br>
						<label class="lab">Address</label>
						<input type="text" value="<?php echo $userInfo->address; ?>" disabled><br>
						<?php } ?>
						<p class="hide" id="err">Error</p>
						<a href="accept?id=<?php echo $userInfo->userId; ?>" onclick="return confirm()">ACCEPT</a>
						<a href="reject?id=<?php echo $userInfo->userId; ?>">REJECT</a>
					</div>
				</div>
			</center>
		</div>
	</div>

	<div id="id01" class="modal">
  <span onclick="document.getElementById('id01').style.display='none'" class="close" title="Close Modal">×</span>
  <form class="modal-content" action="/action_page.php">
    <div class="container">
      <h1>Delete Account</h1>
      <p>Are you sure you want to delete your account?</p>
    
      <div class="clearfix">
        <button type="button" class="cancelbtn" id="no">Cancel</button>
        <button type="button" class="deletebtn">Delete</button>
      </div>
    </div>
  </form>
</div>

<script>

	function confirm()
	{
		document.getElementById('id01').style.display='block';
		var no = document.getElementById('no');

		no.onclick = function() {
			return false;
		};
	}
// Get the modal
var modal = document.getElementById('id01');

// When the user clicks anywhere outside of the modal, close it
window.onclick = function(event) {
  if (event.target == modal) {
    modal.style.display = "none";
  }
}
</script>
	<script type="text/javascript" src="../javascript/jquery.js"></script>
	<script type="text/javascript" src="../javascript/headerAdmin.js"></script>
	<script type="text/javascript" src="../javascript/viewUserRequest.js"></script>
</body>
</html>