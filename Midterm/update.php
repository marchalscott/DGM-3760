<?php
require_once('authorize.php');
$employee_id = $_GET[id];


//BUILD A DATABASE CONNECTION WITH host, user, pass, database
$dbconnection = mysqli_connect('localhost','marchale_3760usr','s0l0w00k1E2000','marchale_3760') or die ('Connection to the database failed');

//BUILD THE QUERY
$query = "SELECT * FROM employee_simple WHERE id=$employee_id";

//NOW TRY AND TALK TO THE DATABASE
$result = mysqli_query($dbconnection, $query) or die ('Query failed');

//put the results in a variable
$found = mysqli_fetch_array($result);


?>


<!DOCTYPE html>
<html>
<head>
	<title>Update Records</title>
	<link href="styles.css" rel="stylesheet" type="text/css">
	<link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet">
</head>
<body>
	<h1>Update Employee Information</h1>
	<form action="updateDatabase.php" enctype="multipart/form-data" id="travelInfo" method="post" name="travelInfo">
		<fieldset>
			<legend>Name</legend> <label></label>
			<p><label>First Name:</label></p><label><input name="first" pattern="[a-zA-Z ]{1,99}" required="" type="text" value="<?php echo $found['first']; ?>"></label> <label></label>
			<p><label>Last Name:</label></p><label><input name="last" pattern="[a-zA-Z ]{1,99}" required="" type="text" value="<?php echo $found['last']; ?>"></label> <label></label>
			<p><label>Phone:</label></p><label><input name="phone" required="" type="phone" value="<?php echo $found['phone']; ?>"></label>
		</fieldset>
		<fieldset>
			<legend>Department</legend>
			<label> <span>Please Select:</span> <select name="dept">
				<option>
					<?php echo $found['dept']; ?>
				</option>
				<option>
					---------------------------
				</option>
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

		<input type="hidden" name="id" value="<?php echo $found['id']; ?>">
		<input type="submit" value="Update Employee" class="submitBtn">
	</form>
</body>
<?php require_once('footer.php'); ?>
</html>