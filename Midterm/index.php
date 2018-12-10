<?php 
require_once('authorize.php');
 ?>
<!DOCTYPE html>
<html>
<head>
	<title>Manage Employee Records</title>
	<link href="styles.css" rel="stylesheet" type="text/css">
	<link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet">
</head>
<body>
	<h1>Employee Information</h1>
	<?php require_once('nav.php'); ?>
    <div class="contianer">
	<form action="saveToDatabasePractice.php" enctype="multipart/form-data" id="travelInfo" method="post" name="travelInfo">

		<!--Emplyee Information-->
		<fieldset class="clearfix">
			<legend>Personal Information</legend> <label></label>
			<p><label>First Name</label></p><label><input name="first" pattern="[a-zA-Z ]{1,99}" placeholder="Full Name" required="" type="text" value="Marchal"></label> <label></label>
			<p><label>Last Name</label></p><label><input name="last" pattern="[a-zA-Z ]{1,99}" placeholder="Full Name" required="" type="text" value="Eardley"></label> <label></label>
			<p><label>Email</label></p><label><input name="email" placeholder="Email" required="" type="email" value="Email"></label>
			<p><label>Phone</label></p><label><input name="phone" placeholder="xxx-xxx-xxxx" required="" type="phone" value="801-123-4567"></label>
			<p><label>Expertise</label></p><label><input name="interest" placeholder="Areas of expertise" required="" type="interest" value="Area of expertise"></label>
		</fieldset>

		<!--Area of expertise-->
		<fieldset>
			<legend>Specialization</legend> <label></label>
			<p><label>Please Explain</label></p><label><input name="specialization" placeholder="Specialization" required="" type="text" value=""></label> <label></label>
		</fieldset>

		<!--Department Selection-->
		<fieldset>
			<legend>Department</legend>
			<label> <span>Please Select:</span> <select name="dept">
				<option>
					IT Department
				</option>
				<option>
					Marketing
				</option>
				<option>
					Accounting
				</option>
				<option>
					Warehouse
				</option>
				<option>
					Sales
				</option>
				<option>
					Management
				</option>
			</select></label>
		</fieldset>

		<!--Image upload-->
		<fieldset>
			<legend>Photo</legend>
			<label>
				<span>Pick a photo of this employee</span>
				<input type="file" name="photo"><br/>
				<span>File must be saved as a .jpg file.</span><br/>
				<span>Please crop to 150px wide X 200px tall before uploading.</span>
			</label>
		</fieldset>

		<input type="submit" value="Submit" class="submitBtn">
	</form>
	</div>
</body>
<?php require_once('footer.php'); ?>
</html>