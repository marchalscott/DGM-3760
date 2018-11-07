<?php 
$employee_id = $_GET[id];

//BUILD A DATABASE CONNECTION WITH host, user, pass, database
$dbconnection = mysqli_connect('localhost','marchale_3760usr','s0l0w00k1E2000','marchale_3760') or die ('Connection to the database failed');


//-----------delete selected records (In from post) ------------------------
if(isset ($_POST['submit'])) {

	//build a select query
	$query = "DELETE FROM employee_simple WHERE id=$_POST[id]";

	//now try and delete the record
	$result = mysqli_query($dbconnection, $query) or die ('delete query failed');

	//delete the image
	@unlink($_POST['photo']);

	//redirect
	header("Location: https://marchaleardley.com/dgm3760/Midterm/delete.php");


	//make sure that code delow does not get executed when we redirect
	exit;

};


//-----------display the selected records-------------------------------------
//build the select query
$query = "SELECT * FROM employee_simple WHERE id=$employee_id";

//now try and talk to deatabase
$result = mysqli_query($dbconnection, $query) or die ('Query failed');

//put the results in a variable
$found = mysqli_fetch_array($result);


?>

<!DOCTYPE html>
<html>
<head>
	<title>Employee Directory Detail</title>
	<link href="styles.css" rel="stylesheet" type="text/css">
</head>
<body>
<h1>Deleting an Employee</h1>
<div class="employee">
	<form action="delete2.php" method="POST">
		<?php
			//display what we found
		echo '<h2>' .$found['first'] .' '. $found['last'].'</h2';
		echo '<p>';
		echo $found['dept']. '<br>' .$found['phone'];
		echo '</p>';
		?>

		<input type="hidden" name="photo" value="employees/<?php echo $found['photo']; ?>">
		<input type="hidden" name="id" value="<?php echo $found['id']; ?>">
		<input type="submit" name="submit" value="DELETE THE PERSON">
		&nbsp; <a href="delete.php"> Cancel </a>
	</form>
<div class="keepOpen">
</div>
</body>
</html>