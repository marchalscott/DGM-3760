<?php 
//BUILD A DATABASE CONNECTION WITH host, user, pass, database
$dbconnection = mysqli_connect('localhost','marchale_3760usr','s0l0w00k1E2000','marchale_3760') or die ('Connection to the database failed');

//BUILD THE QUERY
$query = "SELECT * FROM employee_simple ORDER BY last ASC";

//NOW TRY AND TALK TO THE DATABASE
$result = mysqli_query($dbconnection, $query) or die ('Query failed');


?>

<!DOCTYPE html>
<html>
<head>
	<title>Employees</title>
	<link href="styles.css" rel="stylesheet" type="text/css">
</head>
<body>
<h1>Employees</h1>
<?php require_once('nav.php'); ?>
<?php

//display what we found
while ($row = mysqli_fetch_array($result)) {
	echo '<p class="clearfix">';
	echo $row['last'] .', '. $row['first'].' - '.$row['dept']. '<br>';
	echo 'Interests - ' . $row['interest']. '<br>';
	echo 'Specialization - ' .$row['specialization']. '<br>';
	echo '<a href="mailto:'. $row['email'] .'"> Email</a>';
	echo '<img src="employees/'.$row['photo'].'" ';
	echo '<p> <hr/>';
};

//DONE CLOSE THE CONNECTION
mysqli_close($dbconnection);

?>
</body>
<?php require_once('footer.php'); ?>
</html>
