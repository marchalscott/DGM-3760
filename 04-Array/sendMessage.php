<?php
$subject = $_POST[subject];
$message = $_POST[message];
$from    = "marchalscott@gmail.com";

//BUILD A DATABASE CONNECTION WITH host, user, pass, database
$databaseconnection = mysqli_connect('localhost','marchale_3760usr','s0l0w00k1E2000','marchale_3760') or die ('Connection to the database failed');

//BUILD THE QUERY
$query = "SELECT * FROM newsletter ";

//NOW TRY AND TALK TO THE DATABASE
$result = mysqli_query($databaseconnection, $query) or die ('Query failed');

//DISPLAY WHAT WE FOUND
while ($row = mysqli_fetch_array($result)) {
	$first_name = $row['first'];
	$last_name = $row['last'];
	$to = $row['email'];
	$newMessage = "Dear $first_name $last_name, $message";

	mail($to, $subject, $newMessage, 'From:'.$from);

	echo 'Message Sent to' . $to . '<br/>';

};



//DONE CLOSE THE CONNECTION
mysqli_close($databaseconnection);

?>









<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
You have sent email to blah
</body>
</html>