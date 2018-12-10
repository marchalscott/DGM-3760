<?php
$page ='signUp';

// DATABASE VARIABLES
include 'variables.php';

// BUILD THE DATABASE CONNECTION
$dbconnection = mysqli_connect(HOST, USER, PASSWORD, DB_NAME) or die ('connection failed');

if (isset($_POST['submit'])) {
$first = mysqli_real_escape_string($dbconnection,trim($_POST['first']));
$last = mysqli_real_escape_string($dbconnection,trim($_POST['last']));
$username = mysqli_real_escape_string($dbconnection,trim($_POST['username']));
$password = mysqli_real_escape_string($dbconnection,trim($_POST['password']));
$password2 = mysqli_real_escape_string($dbconnection,trim($_POST['password2']));
$date = date("Y-m-d");
// DOUBLE CHECK THAT WE HAVE VALUES
if($password != $password2) {
$feedback = '<div class="alert alert-danger" role="alert">
           Passwords do not match. Please Retype Password.
                </div>';
       }
if(!empty($username) && !empty($password) && !empty($password2) && ($password == $password2)) {
// MAKE SURE USER IS NOT IN DATABASE
$query = "SELECT * FROM movie_users WHERE username = '$username'";
$alreadyexists = mysqli_query($dbconnection, $query) or die ('query failed');
if (mysqli_num_rows($alreadyexists) == 0) {
// INSERT DATA
$query = "INSERT INTO movie_users (first, last, username, password, date) VALUES ('$first', '$last', '$username', SHA('$password'), NOW())";
mysqli_query($dbconnection, $query) or die ('insert query failed');
// CONFIRMATION MESSAGE
$feedback = '<div>Your new account has been successfully created</div><p>Return to the <a href="index.php">main page</a></p>';
// MAKE COOKIES
setcookie('username', $username, time() + (60*60*24*30), '', ''); // expires in 30 days
setcookie('first', $first, time() + (60*60*24*30), '/', ''); // expires in 30 days
setcookie('last', $last, time() + (60*60*24*30), '/', ''); // expires in 30 days
           
// REDIRECT
header('Location: index.php');

// CLOSE DATABASE CONNECTION
mysqli_close($dbconnection);
        } else {
          $feedback ='<div>
           An account already exists for this username. Please use a different username.
                </div>';
        }
      }
    } // end isset
    ?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1, shrink-to-fit=no" name="viewport">
  <link href="style.css" rel="stylesheet" type="text/css">
  <title>Sign Up</title>
</head>
<body>
  <?php include 'header.php';?>
  <div class="container">
    <h2>Sign Up</h2>
    <hr>
    <?php echo $feedback; ?>
    <form action="signUp.php" method="post">
      <fieldset>
        <legend>Registration Info</legend>
        <div>
          <div>
            <label>First Name:</label> <input name="first" placeholder="First Name" type="text" value="">
          </div>
          <div>
            <label>Last Name:</label> <input name="last" placeholder="Last Name" type="text" value="">
          </div>
          <div>
            <label>Username:</label> <input name="username" placeholder="Enter a Username" required="true" type="username">
          </div>
          <div>
            <label for="password">Password:</label> <input name="password" placeholder="Create a New Password" required="true" type="password" value="">
          </div>
          <div>
            <label>Password (retype):</label> <input name="password2" placeholder="Retype Password" required="true" type="password" value="">
          </div>
        </div>
      </fieldset><input name="submit" type="submit" value="Sign Up"> <a href="index.php">cancel</a>
    </form><br>
    <div></div>
  </div><!-- End Container -->
  <?php include 'footer.php';?>
</body>
</html>