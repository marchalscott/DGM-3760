<?php
$page = 'review';
require_once('variables.php');
include_once ('protect.php')
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" type="text/css" href="style.css">
  <title>Review</title>
  </head>

  <body>
  <?php include 'header.php';?>
    <div>
    <h2>Review Movies</h2>
    <hr />

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
    echo '
        <div'.$row['id'].'>
            <a href="#collapseThree'.$row['id'].'">
              '. $row['title'] .'
            </a>
        </div>
        <div '.$row['id'].''.$row['id'].'">
              <div>
              <img style="width: 200px;" src="'.$filepath.$row['photo'].'" alt="movie photo"/>
              </div>
              <div>
              <br>Title - '. $row['title'] .'
              <br>Rating - ' .$row['rating']. ' 
              <br>Description - ' .$row['description']. '
			  <br><a href="reviewMovie.php?id='.$row['id'].'">Leave Review</a>
              <a style="color: red;" href="index.php">Cancel</a>
              </div>
        </div>';
    };
    // CLOSE CONNECTION TO DB
    mysqli_close($dbconnection);
    ?>

    </div> <!-- End Container -->

    <?php include 'footer.php';?>
  </body>
</html>