<?php>
//load the post data into PHP variables
$first      = $_POST[first];
$last       = $_POST[last];
$department = $_POST[dept];
$phone      = $_POST[phone];
$photo      = $_POST[photo];


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
$query = "INSERT INTO employee_simple (first, last, dept, phone, photo)".
"VALUES ('$first','$last','$department', '$phone', '$filename')";

//NOW TRY AND TALK TO THE DATABASE
$result = mysqli_query($dbconnection, $query) or die ('Query failed');

//DONE CLOSE THE CONNECTION
mysqli_close($dbconnection);


} else {
	echo '<a href="marchaleardley.com/05-manage_records>Please try again</a>';
};

?>

<!DOCTYPE html>
<html>
<head>
	<title>Employee Successfully Added</title>
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

</body>
</html>