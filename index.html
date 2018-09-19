<!DOCTYPE html>
<html>
<head>
	<title>Send</title>
	<link rel="stylesheet" type="text/css" href="styles.css">
	<link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet">
</head>
<body>
<form action="<?php $SERVER['PHP_SELF'];?>" method="POST">
	
	<fieldset>
		<legend>Manage "Stay up to Date" List</legend>
		<p>Please select the emails you would like to remove.</p>


</form>

<?php
//BUILD A DATABASE CONNECTION WITH host, user, pass, database
$databaseconnection = mysqli_connect('localhost','marchale_3760usr','s0l0w00k1E2000','marchale_3760') or die ('Connection to the database failed');

//DELETION CODE
if(isset($_POST['submit'])) {

	foreach($_POST[todelete] as $delete_id) {
		//echo $delete_id;
		$query = "DELETE FROM newsletter WHERE id = $delete_id";
		//NOW TRY AND TALK TO THE DATABASE
		$results = mysqli_query($databaseconnection, $query) or die ('Query Failed');

	}; //END OF FOREACH

}; //END OF THE IF

//DISPLAY ALL RECORDS
$query = "SELECT * FROM newsletter";

//NOW TRY AND TALK TO THE DATABASE
$results = mysqli_query($databaseconnection, $query) or die ('Query Failed');


//DISPLAY WHAT WE FOUND
while($row = mysqli_fetch_array($results)) {
	echo '<label>';
	echo '<input type="checkbox" value="'.$row['id'].'" name="todelete[]" />';
	echo $row['first'] .' '. $row['last'] .' - '. $row['email'] . '<br/>';
	echo '</label>';
};

//CLOSE DATABASE
mysqli_close($databaseconnection);

?>

<input type="submit" name="submit" value="Remove from list" class="submitBtn" />
</fieldset>
</form>

</body>
</html>