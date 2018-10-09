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
	<title>Remove Employees</title>
</head>
<body>
<h1>Delete Employee</h1>

<?php

//display what we found
while ($row = mysqli_fetch_array($result)) {
	echo '<p>';
	echo $row['last'] .', '. $row['first'].' - '.$row['dept'];
	echo '<a href="delete2.php?id='. $row['id'] .'">delete</a>';
	echo '<a href="update.php?id='. $row['id'].'"> - update </a>';
	echo '<p>';
};

//DONE CLOSE THE CONNECTION
mysqli_close($dbconnection);

?>
</body>
</html>
