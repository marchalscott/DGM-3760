<?php
$page = 'admin';
require_once('auth.php');
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" type="text/css" href="style.css">

  <title>Admin</title>
  </head>
  <body>
  <?php include 'header.php';?>

    <div class="container">
    <h2>Admin</h2>
    <hr />
    <div>

        <div>
          <a href="addMovie.php" class="list-group-item">Add Movie</a>
          <a href="updateMovie.php" class="list-group-item">Update Movie</a>
        </div>

    </div>
    <br>
    <div class="filler-container"></div>
    </div> <!-- End Container -->
    <?php include 'footer.php';?>

  </body>

</html>