<?php

//Load the variables from the form
$fullname    = $_POST[fullname];
$address     = $_POST[address];
$email       = $_POST[email];
$destination = $_POST[destination];
$tourguide   = $_POST[tourguide];

//BUILD THE EMAIL
$to      = 'marchalscott@gmail.com';
$subject = 'Mexico Info Request';
$message = "$fullname has requested a tour of $destination by $tourguide. You should contact them at $email or send a brochure to $address.";

//send the email
mail($to, $subject, $message, 'FROM:'.$email);

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