<?php 
	$connection = mysqli_connect('localhost','root','','careu');

	$query1="SELECT requestID,firstName,lastName,NIC
			FROM requests ORDER BY requestID DESC";
	
	$requestsInfo=mysqli_query($connection,$query1);

	while($row1 = mysqli_fetch_assoc($requestsInfo))
	{
		echo "<div class='requestrow'>";
	  		echo "<div class='column1'>";
	    			echo "<h3>".$row1["firstName"]." ".$row1["lastName"]."</h3>";
					echo $row1["NIC"];
	  		echo "</div>";
	  		echo "<div class='column2'>";
	    			echo '<a href="viewuserrequest?rid='.$row1["requestID"].'" id="xxx">View</a>';
	  		echo "</div>";
		echo "</div>";
	}
?>