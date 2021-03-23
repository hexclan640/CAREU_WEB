<div class="frame">
	<center>
		<form method="post" id="cardiacForm" name="cardiacForm" enctype="multipart/form-data">
			<div class="row">
	    		<div class="namediv">
					<h1>Cardiac Instructions</h1>
				</div>
				<div class="column1">
					<canvas class="picture" id="picture"></canvas><br>
					<input type="file" name="image" id="instructionPicture">
				</div>
	    		<div class="column2">
					<label >Step No</label>
					<input type="text" name="stepNumber" id="stepNumber"><br>
					<label >Add Description</label>
					<textarea class="description" type="text" name="description" id="description"></textarea><br>
					<center><p class="hide" id="err">Error</p></center>
					<input type="submit" value="ADD" name="submit" id="submit" onclick="return check()">
				</div>
			</div>
		</form>
	</center>
</div>