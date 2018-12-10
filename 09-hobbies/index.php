<?php 
//CONNECT TO THE DATABASE
$dbconnection = mysqli_connect('localhost','marchale_3760usr','s0l0w00k1E2000','marchale_3760') or die ('Connection to the database failed');

//BUILD THE QUERY FOR AN INNER JOIN
$query = "SELECT * FROM hobbies ORDER BY name ASC";

//NOW TRY AND TALK TO THE DATABASE
$result = mysqli_query($dbconnection, $query) or die ('query failed');

function convertMonth($a) {
	switch($a) {
		case 1:
		$b="January";
		break;
		case 2:
		$b="Febuary";
		break;
		case 3:
		$b="March";
		break;
		case 4:
		$b="April";
		break;
		case 5:
		$b="May";
		break;
		case 6:
		$b="June";
		break;
		case 7:
		$b="July";
		break;
		case 8:
		$b="August";
		break;
		case 9:
		$b="September";
		break;
		case 10:
		$b="October";
		break;
		case 11:
		$b="Novemeber";
		break;
		case 12:
		$b="December";
		break;
		}//END CASE
		return $b;
	}//END FUNCTION

 ?>

 <!DOCTYPE html>
 <html>
 <head>
 	<title>Section 9</title>
 	<link href="styles.css" rel="stylesheet" type="text/css">
 </head>
 <body>
 <?php include_once('nav.php'); ?>
<h1 class="title">Category Submitions</h1>
<div class="container">
<?php 
	//DISPLAY WHAT WE DID
while ($row = mysqli_fetch_array($result)) {

	$day = substr($row[birthday],0 ,2 );
	$monthNum = substr($row[birthday],3 ,2 );
	$monthName = convertMonth($monthNum);
	$year = substr($row[birthday],6 ,4 );


	echo '<h2>'.$row[name].'</h2>';
	echo '<p>Date added is '.$monthName.' '.$day.', '.$year.'</p>';
	echo '<p>'.$row[hobbies].'</p><hr/>';

};

//WE ARE DONE HANG UP
mysqli_close($dbconnection);
 ?>
</div>
<?php require_once('footer.php'); ?>
 </body>
 </html>