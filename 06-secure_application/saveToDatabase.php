<?php>
//load the post data into PHP variables
$name         = $_POST[name];
$topic        = $_POST[topic];
$comment      = $_POST[comment];
$date         = $_POST[date_now];

//BUILD A DATABASE CONNECTION WITH host, user, pass, database
$dbconnection = mysqli_connect('localhost','marchale_3760usr','s0l0w00k1E2000','marchale_3760') or die ('Connection to the database failed');

//BUILD THE QUERY
$query = "INSERT INTO blog (name, topic, comment, date_now)".
"VALUES ('$name','$topic', '$comment', CURDATE())";

//NOW TRY AND TALK TO THE DATABASE
$result = mysqli_query($dbconnection, $query) or die ('Query failed');

//DONE CLOSE THE CONNECTION
mysqli_close($dbconnection);

?>

<!DOCTYPE html>
<html>
<head>
	<title>Comment Added</title>
	<link rel="stylesheet" type="text/css" href="styles.css"/>
</head>
<body>
	<h1>Comment Added</h1>
	<?php include_once('navbar.php');?>
	<?php
	echo "$name <br/>";
	echo "$topic <br/>";
	echo "$comment";
	?>

</body>
</html>