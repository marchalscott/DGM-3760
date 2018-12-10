

<!DOCTYPE html>
<html>
<head>
	<title>New Entry</title>
	<link rel="stylesheet" type="text/css" href="styles.css"/>
</head>
<body>
	<div id="container">
		<?php include_once('navbar.php');?>
		<h1>New Entry</h1>
		<form action="saveToDatabase.php" enctype="multipart/form-data" id="travelInfo" method="post" name="travelInfo">
			<fieldset>
				<legend>Name</legend> <label></label>
				<p><label>Full Name:</label></p><label><input name="name" pattern="[a-zA-Z ]{1,99}" placeholder="Full Name" required="" type="text" value="John Smith"></label> <label></label>
			</fieldset>
			<fieldset>
				<legend>Topic</legend>
				<label> <span>Please Select:</span> <select name="topic">
					<option>
						Government
					</option>
					<option>
						Politics
					</option>
					<option>
						Health
					</option>
					<option>
						Science
					</option>
				</select></label>
			</fieldset>

			<fieldset>
				<legend>Comment</legend>
				<label>
					<span>Comment</span>
					<input type="text" name="comment"><br/>
				</label>
			</fieldset>

			<input type="submit" value="Submit" class="submitBtn">
		</form>
	</div><!--End container-->
</body>
</html>