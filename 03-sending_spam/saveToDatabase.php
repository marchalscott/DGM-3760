<?php
$firstname = $_POST[firstname];
$lastname = $_POST[lastname];
$email = $_POST[email];

//BUILD A DATABASE CONNECTION WITH host, user, pass, database
$databaseconnection = mysqli_connect('localhost','marchale_3760usr','s0l0w00k1E2000','marchale_3760') or die ('Connection to the database failed');

//BUILD THE QUERY
$query = "INSERT INTO newsletter (first, last, email)".
"VALUES ('$firstname','$lastname','$email')";

//NOW TRY AND TALK TO THE DATABASE
$result = mysqli_query($databaseconnection, $query) or die ('Query failed');

?>

<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
Thank you for signing up for the newsletter.
</body>
</html>