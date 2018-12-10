<?php
$page ='login';
require_once('variables.php');

$feedback = '<p>Not registered? <a style="text-decoration: underline;" href="signUp.php">Create an account</a></p>';
// If the user isn't logged in, try to log them in
if (isset($_POST['submit'])) {
//BUILD THE DATABASE CONNECTION
$dbconnection = mysqli_connect(HOST, USER, PASSWORD, DB_NAME) or die ('connection failed');
// GRAB USER LOG IN DATA
$username = mysqli_real_escape_string($dbconnection,trim($_POST['username']));
$password = mysqli_real_escape_string($dbconnection,trim($_POST['password']));
//LOOK UP USERNAME AND PASSWORD IN DATABASE
$query = "SELECT * FROM movie_users WHERE username = '$username' AND password = SHA('$password')";
$data = mysqli_query($dbconnection, $query) or die ('query failed');
if (mysqli_num_rows($data) == 1) {
$row = mysqli_fetch_array($data);

 //MAKE THE COOKIE
  setcookie('username', $row['username'], time() + (60*60*24*30)); //EXPIRATION
  setcookie('firstname', $row['firstname'], time() + (60*60*24*30)); //EXPIRATION
  setcookie('lastname', $row['lastname'], time() + (60*60*24*30)); //EXPIRATION
  header('Location: index.php');
    } else {
      $feedback = '<div role="alert">Could not find an account for '.$_POST['username'].'. Would you like to <a style="text-decoration: underline;" href="signUp.php">create a new account</a></div>';
    } // END IF
  } // END ISSET
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1, shrink-to-fit=no" name="viewport">
  <link href="style.css" rel="stylesheet" type="text/css">
  <title>Log In</title>
</head>
<body>
  <?php include 'header.php';?>
  <section>
    <div>
      <div>
        <div>
          <br>
        </div>
      </div>
    </div>
  </section>
  <div class="container">
    <h2>Log In</h2>
    <hr>
    <form action="login.php" method="post">
      <fieldset>
        <legend>Log in to an existing account</legend>
        <div>
          <div>
            <label>Username:</label> <input name="username" placeholder="Enter a Username" required="true" type="username">
          </div>
          <div>
            <label>Password:</label> <input name="password" placeholder="Create a New Password" required="true" type="password" value="">
          </div><?php echo $feedback; ?>
        </div>
      </fieldset><input name="submit" type="submit" value="Log In"> <a href="index.php">cancel</a>
    </form><br>
    <div></div>
  </div><!-- End Container -->
  <?php include 'footer.php';?>
</body>
</html>