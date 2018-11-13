<?php 
//BUILD A DATABASE CONNECTION WITH host, user, pass, database
$dbconnection = mysqli_connect('localhost','marchale_3760usr','s0l0w00k1E2000','marchale_3760') or die ('Connection to the database failed');

//BUILD THE QUERY FOR AN INNER JOIN
$query = "SELECT * FROM dgm_emphasis ORDER BY value";

//TALK WITH DATABASE
$result = mysqli_query($dbconnection, $query) or die ('Query Failed');



 ?>

<!DOCTYPE html>
<html>
<head>
	<title>Search DGM Students</title>
	<!--<link href="styles.css" rel="stylesheet" type="text/css">-->
</head>
<body>
<?php include_once('nav.php'); ?>
<h2>Search by Emphasis</h2>
<ul class="searchList">

<?php  
while($row = mysqli_fetch_array($result)){
	echo'<li><a href="index.php?emphasis='.$row['emphasis_id'].'">';
	echo $row['value'];
	echo '</a></li>';
};
?>
</ul>

<?php
//WE'RE DONE SO HANG UP
mysqli_close($dbconnection);
 ?>
</body>
 <footer>Built by Marchal Eardley</footer>
</html>