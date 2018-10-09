<?php
require_once('variables.php');

//build the database connection with host, user, pass, databse
$dbconnection = mysqli_connect(HOST,USER,PASSWORD,DB_NAME) or die ('connection failed');

//build the select query
$query = "SELECT * FROM blog WHERE approved=1 ORDER BY date ASC";

//now try and talk to the database
$result = mysqli_query($dbconnection, $query) or die ('query failed');

?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Employee Directory</title>
	<link rel="stylesheet" type="text/css" href="styles.css"/>
</head>
<body>
<div id="container">
	<?php include_once('navbar.php');?>
	<h1>Blog Comments</h1>
</body>
</html>