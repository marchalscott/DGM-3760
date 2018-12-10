<?php>
//load the post data into PHP variables
$id			= $_POST[id];
$first      = $_POST[first];
$last       = $_POST[last];
$department = $_POST[dept];
$phone      = $_POST[phone];


//BUILD A DATABASE CONNECTION WITH host, user, pass, database
$dbconnection = mysqli_connect('localhost','marchale_3760usr','s0l0w00k1E2000','marchale_3760') or die ('Connection to the database failed');

//BUILD THE QUERY
$query = "UPDATE employee_simple SET first='$first', last='$last', dept='$department', phone='phone' WHERE id=$id";

//NOW TRY AND TALK TO THE DATABASE
$result = mysqli_query($dbconnection, $query) or die ('Query failed');

//DONE CLOSE THE CONNECTION
mysqli_close($dbconnection);


?>

<!DOCTYPE html>
<html>
<head>
	<title>Employee Successfully Added</title>
	<link href="styles.css" rel="stylesheet" type="text/css">
	<link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet">
</head>
<body>

	<h1>Employee Successfully Added</h1>
	<?php

	echo "$first $last <br/>";
	echo "$department <br/>";
	echo "$phone <br/>";
	echo "$photo <br/>";
	echo '<img src="'.$filepath.$filename.'" alt="Employee Image"';
	?>

<?php require_once('footer.php'); ?>

</body>
</html>