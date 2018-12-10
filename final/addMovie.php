<?php
$page = 'admin';
require_once('auth.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>

  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1, shrink-to-fit=no" name="viewport">
  <link href="style.css" rel="stylesheet" type="text/css">
  <title>Add Movie</title>
</head>
<body>
  <?php include 'header.php';?>
    <div class="container">
      <h1>Add Movie</h1>
    </div>

  <div class="container">
    <br>
    <h2>Add a New Movie</h2>
    <hr>
    <br>
    <form action='saveMovie.php' enctype='multipart/form-data' method='POST'>
      <fieldset>
        <legend>Movie Information</legend>


            <label>Title:</label> <input name="title" placeholder="Movie Name" required="true" type="text" value="">
            <legend>Rating</legend>

              <label>1-5 stars</label> <select name="rating">
                <option>
                  Please Select...
                </option>
                <option value="1">
                  1
                </option>
                <option value="2">
                  2
                </option>
                <option value="3">
                  3
                </option>
                <option value="4">
                  4
                </option>
                <option value="5">
                  5
                </option>
              </select>

            <label>Description</label>
            <input name="description" placeholder="Enter short description" required="true" type="text" value="">
      </fieldset>
      <fieldset>
        <legend>Image:</legend>
            <label>Choose a movie photo</label> <input name="photo" required="true" type="file"> <span><small><em>File must be .jpg or .png</em></small></span><br>
            <span><small><em>Image must be smaller than 900KB</em></small></span>
      </fieldset><button type="submit" value="submit">Add Movie</button> <a href="index.php">cancel</a>
    </form>
  </div><!-- End Container -->
  <?php include 'footer.php';?>
</body>
</html>