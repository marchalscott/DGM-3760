<?php
$page = 'index';
require_once('variables.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1, shrink-to-fit=no" name="viewport">
  <link href="style.css" rel="stylesheet" type="text/css">
  <title>Movie Reviews</title>
</head>
<body>
  <h1>Review Site</h1>
  <?php include 'header.php';?>
  <div class="container">
    <br>
    <h2 class="clearfix">Movies</h2>
    <hr class="clearfix">
    <?php
        $filepath = 'movies/';
        // BUILD THE DATABASE CONNECTION
        $dbconnection = mysqli_connect(HOST, USER, PASSWORD, DB_NAME) or die ('connection failed');  
        // BUILD THE QUERY TO DISPLAY ALL RECORDS
        $query = "SELECT * FROM movies";
        // TALK TO DATABASE
        $result = mysqli_query($dbconnection, $query) or die ('query failed');
        // DISPLAY ALL RECORDS
        while($row = mysqli_fetch_array($result)) {
          echo '<p class="clearfix">';
          echo 'Title: '.$row['title']. '<br/>';
          echo 'Rating: '.$row['rating']. '<br/>';
          echo 'Description: '.$row['description']. '<br/>';
          echo '<img style="width: 200px;" src="movies/'.$row['photo'].'"'.'<br/>';
          echo '</p>';
        };
        // CLOSE CONNECTION TO DB
        mysqli_close($dbconnection);
        ?><br>
  </div><!-- End Container -->
  <?php include 'footer.php';?>
</body>
</html>