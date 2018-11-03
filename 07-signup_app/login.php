<?php
//require_once('vars.php');
//DEFAULT MESSAGE TO USERNAME
$feedback = '<p><a href="signup.php">Create an account</a></p>';

//IF THE USER ISN'T LOOFED IN TRY TO LOG THEM IN
if (isset($_POST['submit'])) {

//CONNECT TO THE DATABASE
//BUILD A DATABASE CONNECTION WITH host, user, pass, database
$dbconnection = mysqli_connect('localhost','marchale_3760usr','s0l0w00k1E2000','marchale_3760') or die ('Connection to the database failed');

$username = mysqli_real_escape_string($dbconnection, trim($_POST['username']));
$password = mysqli_real_escape_string($dbconnection, trim($_POST['password']));

//LOOK UP THE USERNAME IN THE database
$query = "SELECT * FROM users WHERE username = '$username' AND password = SHA('$password')";
$data  = mysqli_query($dbconnection, $query) or die ('Query Failed');

if(mysqli_num_rows($data) == 1) {
  $row = mysqli_fetch_array($data);

  //MAKE THE COOKIE
  setcookie('username', $row['username'], time() + (60*60*24*30)); //EXPIRATION
  setcookie('firstname', $row['firstname'], time() + (60*60*24*30)); //EXPIRATION
  setcookie('lastname', $row['lastname'], time() + (60*60*24*30)); //EXPIRATION
  header('Location: index.php');


  }else {

    $feedback = '<p>Could not find an account for '.$_POST['username'].'. Would you like to <a href="signup.php">create a new account?</p>';


  }//END IF
} //END POST

 ?>


<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="main.css">
    <title>Login</title>
  </head>
  <body>
    <div id="container">
      <h1>Log In</h1>
      <?php echo $feedback; ?>
      <form method="post" action="login.php">
        <fieldset>
          <legend>Log in to an exisitng account</legend>
          <label><p>Username:</p><input type="text" name="username" value="<?php if (!empty($username)) echo $username; ?>"/></label>
          <label><p>Password</p><input type="password" name="password"/></label>
        </fieldset>
        <button><input type="submit" name="submit" value="Log In"/></button>
      </form>

      <p><a href="index.php">Cancel</a></p>

    </div>
  </body>
</html>
