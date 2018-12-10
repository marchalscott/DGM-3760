<?php
// LOAD post data
$title = $_POST['title'];
$rating = $_POST['rating'];
$description = $_POST['description'];
$page = 'admin';
// Make photo path and name
$ext = pathinfo($_FILES['photo']['name'], PATHINFO_EXTENSION);
$filename = time().'.'.$ext;
$filepath = 'movies/';
// Verify Image
$validImage = true;
// if missing
if ($_FILES['photo']['size'] == 0) {
  echo 'Image not selected';
  $validImage = false;
};
// if too large
if ($_FILES['photo']['size'] > 904800) {
  echo 'Image is larger than 900kb';
  $validImage = false;
};
if ($_FILES['photo']['type'] == 'image/gif' || $_FILES['photo']['type'] == 'image/jpeg' || $_FILES['photo']['type'] == 'image/pjpeg' || $_FILES['photo']['type'] == 'image/png')  {
} else {
  echo 'Sorry Wrong Format';
  $validImage = false;
};
if ($validImage == true) {
  // UPLOAD FILE
  $tmp_name = $_FILES['photo']['tmp_name'];
  move_uploaded_file($tmp_name, "$filepath$filename");
  @unlink($_FILES['photo']['tmp_name']);
require_once('variables.php');
// BUILD THE DATABASE CONNECTION
$dbconnection = mysqli_connect(HOST, USER, PASSWORD, DB_NAME) or die ('connection failed');  
  // BUILD THE QUERY
  $query = "INSERT INTO movies (title, rating, description, photo) VALUES ('$title', '$rating', '$description', '$filename')";
  // SEND TO DATABASE
  $result = mysqli_query($dbconnection, $query) or die ('query failed');
  // CLOSE CONNECTION TO DATABASE
  mysqli_close($dbconnection);
} else {
  // TRY AGAIN
  echo '<br><a href="addMovie.php"> Please Try Again</a>';
};
?>

<!DOCTYPE html>

<html lang="en">

  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" type="text/css" href="style.css">
    <title>Uploaded</title>
  </head>

  <body>
  <?php include 'header.php';?>
  <div class="container">
  <h2><br />Movie Added Successfully</h2>
  <?php
  echo        '
              <img style="max-width: 200px" src="'.$filepath.$filename.'" alt="movie photo"/>
              <br>Title: '. $title .'
              <br>Rating - ' .$rating. ' 
              <br>Description - ' .$description. '<br/>'
  ?>

  <a href="addMovie.php">Add another Movie?</a>
  <br />
  <a href="index.php">Return Home</a>


  </div> <!-- End Container -->

  <?php include 'footer.php';?>

  </body>

</html>