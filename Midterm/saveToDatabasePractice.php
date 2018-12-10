<?php>
//load the post data into PHP variables
$first            = $_POST[first];
$last             = $_POST[last];
$email			  = $_POST[email];
$department       = $_POST[dept];
$phone            = $_POST[phone];
$photo            = $_POST[photo];
$interest	      = $_POST[interest];
$specialization   = $_POST[specialization];


//make photo path and name
$ext = pathinfo($_FILES['photo']['name'], PATHINFO_EXTENSION);
$filename = $first . $last .time(). '.'.$ext;
$filepath = 'employees/';

//verify the image is valid
$validImage = true;

//check iamge missing
if($_FILES['photo']['size'] == 0) {
	echo 'OOPS -- You did not select an image';
	$validImage = false;
};

//check image size too large
if($_FILES['photo']['size'] > 204800) {
	echo 'OOPS -- That file was larger than 200KB.';
	$validImage = false;
};

//check file type
if($_FILES['photo']['type'] == 'image/gif' || $_FILES['photo']['type'] == 'image/jpeg' || $_FILES['photo']['type'] == 'image/pjpeg' || $_FILES['photo']['type'] == 'image/png'){
	// that must be a proper format 

} else {
	//tell user not correct
	echo 'OOPS -- That file is the wrong format.';
	$validImage = false;
};

if($validImage == true) {
	//upload file
	$tmp_name = $_FILES["photo"]["tmp_name"];
	move_uploaded_file($tmp_name, "$filepath$filename");
	//erase the temp file
	@unlink($_FILES["photo"]["tmp_name"]);

//BUILD A DATABASE CONNECTION WITH host, user, pass, database
$dbconnection = mysqli_connect('localhost','marchale_3760usr','s0l0w00k1E2000','marchale_3760') or die ('Connection to the database failed');

//BUILD THE QUERY
$query = "INSERT INTO employee_simple (first, last, email, interest, specialization, dept, phone, photo)".
"VALUES ('$first','$last','$email', '$interest','$specialization','$department', '$phone', '$filename')";

//NOW TRY AND TALK TO THE DATABASE
$result = mysqli_query($dbconnection, $query) or die ('Query failed');

//DONE CLOSE THE CONNECTION
mysqli_close($dbconnection);


} else {
	echo '<a href="marchaleardley.com/Midterm>Please try again</a>';
};

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
	<?php require_once('nav.php'); ?>
	<?php
	echo '<p class="clearfix">';
	echo "$first $last <br/>";
	echo "$department <br/>";
	echo "$phone <br/>";
	echo "$email<br/>";
	echo "$interest <br/>";
	echo "$specialization <br/>";
	echo "$photo <br/>";
	echo '<img src="'.$filepath.$filename.'" alt="Employee Image"';
		echo '</p>';
	?>

</body>
<?php require_once('footer.php'); ?>
</html>