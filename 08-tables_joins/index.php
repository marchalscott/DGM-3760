<?php
$queryaddition = '';
if(isset($_GET[emphasis])) {
	$queryaddition = "WHERE emphasis=$_GET[emphasis]";
};

?>

<?php 
//CONNECT TO THE DATABASE
$dbconnection = mysqli_connect('localhost','marchale_3760usr','s0l0w00k1E2000','marchale_3760') or die ('Connection to the database failed');

//BUILD THE QUERY FOR AN INNER JOIN
$query = "SELECT * FROM dgm_student INNER JOIN dgm_emphasis ON (dgm_student.emphasis = dgm_emphasis.emphasis_id) $queryaddition ORDER BY last";

//NOW TRY AND TALK TO THE DATABASE
$result = mysqli_query($dbconnection, $query) or die ('query failed');

 ?>

 <!DOCTYPE html>
 <html>
 <head>
 	<title>Section 8</title>
 	<link href="styles.css" rel="stylesheet" type="text/css">
 </head>
 <body>
 <?php include_once('nav.php'); ?>


 <?php
  	if (mysqli_num_rows($result) == 0) {
 		echo '<p>Sorry but no one matches the requested search.</p>';
 	}
//DISPLAY WHAT WE FOUND
 while($row = mysqli_fetch_array($result)) {
 	echo '<div class="person">';
 	echo '<h2>'.$row['first'] .' '. $row['last']. '</h2>';

 	echo '<p>';
 	//TERNARY OPERATOR -- REPLACES AN IF ELSE
 	echo ($row['gender']==1 ? 'Mr. ' : 'Ms. ') . $row['last'];
 	echo ' is an employee with the following skills in '. $row['value'].'</>';

 	//FIND SOFTWARE SKILLS
 	echo '<p>';
 	echo ($row['gender']==1 ? 'He ' : 'She ');
 	echo 'is competent with the following software packages:</p><hr/>';



 	//ASSIGN THE USER TO A VARIABLE TO BE USED IN THE NEXT QUERY
 	$theid = $row['id'];

 	//BUILD ANOTHER INNER JOIN QUERY
 	$query2 = "SELECT * FROM dgm_softwareskill INNER JOIN dgm_packages ON (dgm_softwareskill.package_id = dgm_packages.package_id) WHERE id=$theid";

 	//NOW TRY AND TALK TO THE DATABASE
 	$resultPackage = mysqli_query($dbconnection, $query2) or die ('Query Failed');

 	while ($row2 = mysqli_fetch_array($resutPackage)) {
    echo '<p class="pkgs">'.$row2['packages'].'</p>';
        };

    echo '</div>';

 };

  ?>
 </body>
 </html>