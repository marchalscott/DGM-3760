<?php>
$first = $_POST[first];
$last = $_POST[last];
$department = $_POST[dept];
$phone = $_POST[phone];
$photo = $_POST[photo];



//make photo path and name
$ext = pathinfo($_FILES['photo']['name',], PATHINFO_EXTENSION);

$filename = 'employees/'.$first. $last.'.'.$ext;
echo 'filename';
?>

<!DOCTYPE html>
<html>
<head>
	<title>Thank you Page</title>
</head>
<body>
<h1>Test Upload Page</h1>

<?php>

echo 'img  src="'.$filename.'" alt="photo"/>'

echo $_FILES['photo']['size',];
echo $_FILES['photo']['type',];
echo $_FILES['photo']['tmp_name',];
echo $_FILES['photo']['name',];

?>

</body>
</html>