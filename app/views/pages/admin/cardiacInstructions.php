<!-- <?php require_once('connection.php'); ?> -->

<?php $connection = mysqli_connect('localhost','root','','careu'); ?>

<?php 

$msg="";


//if save button is pressed

if (isset($_POST['upload'])) {
	
	$target ="images/".basename($_FILES['image']['name']);

	//connect to the database

	//$db=mysqli_connect("localhost","root","","store");

	//Get all the submitted data from the form

    $step=$_POST['step'];
	$description=$_POST['description'];
	$image=$_FILES['image']['name'];

	$sql="INSERT INTO instruction1 (step,description,image) VALUES ('$step','$description','$image')";

	mysqli_query($connection,$sql); //stores the submitted data into dayabase table images


   //move the uploaded image into the folder images

	if (move_uploaded_file($_FILES['image']['tmp_name'], $target)) {
		$msg="Uploaded successfully";
		
	}else{
		$msg="Error";
	}


}

 ?>




<!DOCTYPE html>
<html>
<head>
	<title>Manage Instruction1</title>
	<link rel="stylesheet" href="style.css">
</head>
<body>

<h1>Instructions for Cardiac arrest</h1>
<h3><a href="home_instructions.php"> < Back to Instructions home page</a></h3>
	
	<form method="post" action="manage_Instruction1.php" enctype="multipart/form-data">
			<h1>Add New Instruction</h1>

			
			<input type="hidden" name="size" value="1000000">

        <div>
        	<label for="">Step no:</label>
        	<input type="text" name="step">
        </div>
        <label for="">Add description:</label>
		
			<div>
				
				<textarea name="description" cols="40" rows="4" placeholder="Say something..."> 
				</textarea>
			</div>
				<div>
					<label for="">Add image file</label>
				<input type="file" name="image">
			</div>
			<div>
				<input type="submit" name="upload" value="Save">
			</div>
			
		</form>

	<div id="content">
          
          <h1>Instruction list</h1>

<?php 
		$instruction_list='';
        // $db=mysqli_connect("localhost","root","","store");

         $sql="SELECT * FROM instruction1";

         $result=mysqli_query($connection,$sql);

         if ($result){

         	 while ($row=mysqli_fetch_array($result)) {

         	echo "<div id='img_div'>";
         	echo "<img src='../img/instructionImages/".$row['image']."'>";
         	echo "<p>".$row['step']."</p>";
         	echo "<p>".$row['description']."</p>";
         	//echo "<a href =\"edit_instructions.php?ins_id={$row['id']}\">Edit</a>";
         	//echo "<br>";
         	echo "<a href =\"delete_instruction1.php?ins_id={$row['id']}\" onclick=\"return confirm('Are you sure?');\">Delete</a>";
         	echo "</div>";
         }

        }else{

         	echo "Query failed";
         }

        


		 ?>
		
		
		
	</div>

</body>
</html>

<?php mysqli_close($connection); ?>