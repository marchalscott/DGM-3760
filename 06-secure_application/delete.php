<?php 
require_once('authorize.php');
$id = $_GET['id'];
echo $id;

require_once('variables.php');

//build the database connection with host, user, pass, databse
$dbconnection = mysqli_connect(HOST,USER,PASSWORD,DB_NAME) or die ('connection failed');

//build the select query
$query = "DELETE FROM blog WHERE id=$id";

//now try and talk to the database
$result = mysqli_query($dbconnection, $query) or die ('query failed');

//return to approve page
header('Location: approve.php');








 ?>