<?php 
//LOAD THE POST DATA INTO PHP VARIABLES
$first = $_POST['first'];
$last  = $_POST['last'];
$gender = $_POST['gender'];
$website = $_POST['website'];
$emphasis = $_POST['emphasis'];


//CONNECT TO THE DATABASE
$dbconnection = mysqli_connect('localhost','marchale_3760usr','s0l0w00k1E2000','marchale_3760') or die ('Connection to the database failed');

//BUILD THE QUERY
$query = "INSERT INTO dgm_student (first, last, gender, website, emphasis) VALUES ('$first','$last','$gender','$website','$emphasis')";

//NOW TRY AND TALK TO THE DATABSE
$result = mysqli_query($dbconnection, $query) or die ('Query Failed');

//UPDATING SOFTWARE SKILLS
$recent_id = mysqli_insert_id($dbconnection);

//LOOP THROUGH THE ARRAY THAT CONTAINS ALL THE PACKAGES THEY SELECTED
foreach($_POST['packages']as $package_id) {
//BUILD THE SELECT QUERY
$query = "INSERT INTO dgm_softwareskill (id, package_id) VALUES ($recent_id, $package_id)";

//NOW TRY AND DELETE THE RECORD
$result = mysqli_query($dbconnection, $query) or die ('update software skills query failed');

}; //END FOREACH

//WE'RE DONE SO HANG UP
mysqli_close($dbconnection);


 ?>

 <!DOCTYPE html>
 <html>
 <head>
 	<title>Confirm Addition</title>
 	<link href="styles.css" rel="stylesheet" type="text/css">
 </head>
 <body>
 <?php include_once('nav.php'); ?>

<p><p>An entry for <?php $first .' '. $last ?> has been added to the DGM database.</p></p>
<p><a href="new.php">Add another student</a><br></p>
<p><a href="index.php">Return to the home page</a></p>
 </body>
 </html>