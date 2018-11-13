<?php 
//BUILD A DATABASE CONNECTION WITH host, user, pass, database
$dbconnection = mysqli_connect('localhost','marchale_3760usr','s0l0w00k1E2000','marchale_3760') or die ('Connection to the database failed');

//GET THE EMPHASIS NAMES FROM THE DATABASE
$query = "SELECT * FROM dgm_emphasis";
$resultEmphasis = mysqli_query($dbconnection, $query) or die ('Query Failed');

//GET THE SOFTWARE NAMES FROM THE DATABASE
$query = "SELECT * FROM dgm_packages ORDER BY package ASC";
$resultPackage = mysqli_query($dbconnection, $query) or die ('Query Failed');



 ?>

<!DOCTYPE html>
<html>
<head>
	<title>Add a New Student</title>
	<link href="styles.css" rel="stylesheet" type="text/css">
</head>
<body>
<?php include_once('nav.php'); ?>

<h2>Add a New Student</h2>
<form action="saveToDatabase.php" method="POST">
	<fieldset>
		<legend>Personal Inforation</legend>
		<label><p>First Name:</p><input type="text" name="first" value="Jimmy" placeholder="First Name" pattern="[a-zA-z-]{3,99}" required></label>

		<label><p>Last Name:</p><input type="text" name="last" value="Westover" placeholder="Last Name" pattern="[a-zA-z-]{3,99}" required></label>

		<label><p>Website:</p><input type="text" name="website" value="http://jdogswest.com" placeholder="http://" required></label>
	</fieldset>
	<fieldset>
		<legend>Gender</legend>
		<label><input type="radio" name="gender" value="1"><span>Male</span></label>
		<label><input type="radio" name="gender" value="2"><span>Female</span></label>
	</fieldset>
	<fieldset>
		<legend>Emphasis</legend>
		<label><p>Please select an emphasis:</p>
		<select name="emphasis">
			<option>Please Select...</option>
			<?php 
				while($row = mysqli_fetch_array($resultEmphasis)) {
					echo '<option value="'.$row['emphasis_id'].'">'.$row['value'].'</option>';
				};
			 ?>
		</select>
		</label>
	</fieldset>
	<fieldset>
		<legend>Software Skills</legend>
		<p>Check the packages you know well:</p>
		<?php 
		while($row = $row = mysqli_fetch_array($resultPackage)) {
		echo ' <label><input type="checkbox" value="'.$row['package_id'].'" name="packages[]">'.$row['package'].'</label>';


		};
		 ?>
	</fieldset>
<input type="submit" value="Submit" class="submitBtn">
</form>
</body>
</html>