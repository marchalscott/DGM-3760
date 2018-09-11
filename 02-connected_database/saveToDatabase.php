<?php

//Load the variables from the form
$fullname    = $_POST[fullname];
$address     = $_POST[address];
$email       = $_POST[email];
$destination = $_POST[destination];
$tourguide   = $_POST[tourguide];

//BUILD THE DATABASE CONNECTION WITH host, user, pass, databse
$dbconnection = mysqli_connect('localhost','marchale_3760usr','s0l0w00k1E2000','marchale_3760') or die ('connection failed');

//BUILD THE QUERY
$query = "INSERT INTO mexico_inquires (name, address, email, destination, guide) VALUES ('$fullname','$address','$email','$destination','$tourguide')";

//NOW TRY AND TALK TO THE DATABASE
$result = mysqli_query($dbconnection,$query) or die ('query failed')

//WE'RE DONE SO HANDS UP

?>

<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>

	
	<p>Thanks, <?php echo $fullname; ?> for requesting a tour by <?php echo $tourguide; ?> of the <?php echo $destination; ?> in Caesarea.</p>

	<p>We will contact your at the address below:</p>

	<?php echo $address; ?><br/>
	<?php echo $email; ?><br/>

	<p>The Mexico Destination Team</p>







	</h2>
	<?php echo $fullName; ?>



</body>
</html>