<?php
$page = 'admin';
include 'variables.php';

//$movie_id = $_GET['id'];

// BUILD THE DATABASE CONNECTION
$dbconnection = mysqli_connect(HOST, USER, PASSWORD, DB_NAME) or die ('connection failed');

    // BUILD THE QUERY TO DISPLAY ALL RECORDS
    $query = "SELECT * FROM movies";

    // TALK TO DATABASE
    $result = mysqli_query($dbconnection, $query) or die ('query failed');
    // ADD RESULTS TO VARIABLE
    $row = mysqli_fetch_array($result);
?>



<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" type="text/css" href="style.css">
  <title>Update Movie</title>
  </head>

  <body>
  <?php include 'header.php';?>
 <div>
    <div class="container">
    <h1>Update Movie</h1>
    </div>
  </div>
    <div class="container">
    <hr />
    <form action='updateDatabase.php' method='POST' enctype='multipart/form-data'>
      <fieldset>
        <legend>Movie Information</legend>
          <div>
            <label>Title:</label>
            <input type="text" name="title" value="<?php echo $row['title']; ?>" required="true" />
          </div>
          <div>
            <label for="last">Rating:</label>
            <input type="text" name="rating" value="<?php echo $row['rating']; ?>" required="true" />
          </div>
          <div class="form-group">
            <label for="email">Description</label>
            <input type="text" name="description" value="<?php echo $row['description']; ?>" required="true" />
          </div>
      </fieldset>
      <input type="hidden" name="id" value="<?php echo $row['id']; ?>">
      <button type="submit" value="submit" class="btn btn-secondary row">Update Movie</button>
      <a href="index.php">Cancel</a>
    </form>
    </div> <!-- End Container -->
    <?php include 'footer.php';?>
  </body>

</html>