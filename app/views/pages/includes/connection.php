<?php 
	$connection = mysqli_connect('localhost','root','','careu');
	if(mysqli_connect_errno())
	{
		die('Database connecting faild.'.mysqli_connect_error());
	}
	else
	{
		//echo "Connection successful.";
	}
	 ?>