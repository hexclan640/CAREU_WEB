<!DOCTYPE html>
<html>
<head>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="shortcut icon" type="image/jpg" href="../img/appLogo.png"/>
	<link rel="stylesheet" type="text/css" href="../css/admin/viewUserRequest.css">
	<link rel="stylesheet" type="text/css" href="../css/admin/adminHeader.css">
	<link rel="stylesheet" type="text/css" href="../css/includecss/footer.css">
	<title>View Requests</title>
</head>
<body>
	<div class="breadcrum">
		Request
	</div>
	<?php foreach($data['admin'] as $requestInfo){ ?>
	<div class="request">
		<?php echo "<h2>".$requestInfo->firstName." ".$requestInfo->lastName."</h2>"; ?>
		<div class="reqDetails">
			<?php
				echo '<table>';

					echo '<tr>';
						echo '<td>';
							echo "<b>E-mail</b>";
						echo '</td>';
						echo '<td>';
							echo $requestInfo->email;
						echo '</td>';
					echo '</tr>';

					echo '<tr>';
						echo '<td>';
							echo "<b>NIC</b>";
						echo '</td>';
						echo '<td>';
							echo $requestInfo->NIC;
						echo '</td>';
					echo '</tr>';

					echo '<tr>';
						echo '<td>';
							echo "<b>Phone Number</b>";
						echo '</td>';
						echo '<td>';
							echo $requestInfo->phoneNumber;
						echo '</td>';
					echo '</tr>';

					echo '<tr>';
						echo '<td>';
							echo "<b>Address</b>";
						echo '</td>';
						echo '<td>';
							echo $requestInfo->address;
						echo '</td>';
					echo '</tr>';

					echo '<tr>';
						echo '<td>';
							echo "<b>Relative 1</b>";
						echo '</td>';
						echo '<td>';
							echo $requestInfo->relative1;
							echo "<br>";
							echo $requestInfo->relativePhone1;
						echo '</td>';
					echo '</tr>';

					echo '<tr>';
						echo '<td>';
							echo "<b>Relative 2</b>";
						echo '</td>';
						echo '<td>';
							echo $requestInfo->relative2;
							echo "<br>";
							echo $requestInfo->relativePhone2;
						echo '</td>';
					echo '</tr>';

					echo '<tr>';
						echo '<td>';
							echo "<b>Relative 3</b>";
						echo '</td>';
						echo '<td>';
							echo $requestInfo->relative3;
							echo "<br>";
							echo $requestInfo->relativePhone3;
						echo '</td>';
					echo '</tr>';}

				echo '</table>';
			?>
		</div>
		<div class="verify">
			<form action="viewUserRequest.php?rid=<?php echo $_GET["rid"]; ?>" method="post">
				<input type="submit" name="reject" class="reject" value="Reject Request">
				<input type="submit" name="accept" class="accept" value="Accept Request">
			</form>
		</div>
	</div>
	<script type="text/javascript" src="../javascript/jquery.js"></script>
	<script type="text/javascript" src="../javascript/jquery.sticky.js"></script>
	<script type="text/javascript" src="../javascript/navigation.js"></script>
</body>
</html>