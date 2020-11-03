<?php 
	$connection = mysqli_connect('localhost','root','','careu');

	$query1="SELECT userID,firstName,lastName,NIC
			FROM users ORDER BY userID DESC;";
	
	$userInfo=mysqli_query($connection,$query1);

	while($row2 = mysqli_fetch_assoc($userInfo))
	{
		echo "<div class='userrow'>";
	  		echo "<div class='column1'>";
	    			echo "<h3>".$row2["firstName"]." ".$row2["lastName"]."</h3>";
					echo $row2["NIC"];
	  		echo "</div>";
	  		echo "<div class='column2'>";
	    			echo '<a href="userprofile?id='.$row2["userID"].'">View</a>';
	  		echo "</div>";
		echo "</div>";
	}
?>