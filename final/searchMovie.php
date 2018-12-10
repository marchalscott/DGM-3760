<?php
$page = 'searchMovies';
require_once('variables.php');
// BUILD THE DATABASE CONNECTION
$dbconnection = mysqli_connect(HOST, USER, PASSWORD, DB_NAME) or die ('connection failed');
// BUILD QUERY
$query = "SELECT * FROM movies ORDER BY id";
// TALK TO DATABASE
$result = mysqli_query($dbconnection, $query) or die ('sorry, query failed');
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" type="text/css" href="style.css">
  <title>Search Movies</title>
  </head>

  <body>
    <h1>Search Movie</h1>
    <?php include 'header.php';?>
    <div class="container">
    <h2 class="clearfix">Search Movie</h2>
    <hr class="clearfix"/>
         <?php 
			while ($row = mysqli_fetch_array($result)) {
        echo '<p>';
				echo '<a href="index.php?id='.$row['id'].'">';
				echo $row['title'];
				echo '</a>';	
        echo '</p>';
			};
			?>
    </div> <!-- End Container -->
    <?php include 'footer.php';?>

  </body>
</html>