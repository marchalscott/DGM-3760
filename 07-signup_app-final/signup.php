<?php
//require_once('vars.php');


//CONNECT TO THE DATABASE
$dbconnection = mysqli_connect('localhost','marchale_3760usr','s0l0w00k1E2000','marchale_3760') or die ('Connection to the database failed');
if (isset($_POST['submit'])) {
  $firstname = mysqli_real_escape_string($dbconnection, trim($_POST['firstname']));
  $lastname = mysqli_real_escape_string($dbconnection, trim($_POST['lastname']));
  $username = mysqli_real_escape_string($dbconnection, trim($_POST['username']));
  $password1 = mysqli_real_escape_string($dbconnection, trim($_POST['password1']));
  $password2 = mysqli_real_escape_string($dbconnection, trim($_POST['password2']));


  if (!empty($username) && !empty($password1) && !empty($password2) && ($password1 == $password2)) {
    $query = "SELECT * FROM users WHERE username = '$username'";
    $alreadyexists = mysqli_query($dbconnection, $query) or die ('query failed');
    if (mysqli_num_rows($alreadyexists) == 0) {
      // INSERT the data
      $query = "INSERT INTO users (firstname, lastname, username, password, date_now) VALUES ('$firstname', '$lastname', '$username', SHA('$password1'), NOW() )";
      mysqli_query($dbconnection, $query) or die ('insert query failed');
      // CONFIRM MESSAGE
      $feedback = '<p class="name">Your new account has been successfully created.</p><p class="name">Return to the <a href="index.php">main page</a>.</p>';
      // Make the cookie
      setcookie('username', $username, time() + (60*60*24*30));
      setcookie('firstname', $firstname, time() + (60*60*24*30));
      setcookie('lastname', $lastname, time() + (60*60*24*30));
      // Close the connection
      mysqli_close($dbconnection);
      // exit the page
      // exit();
    } else {
      $feedback = '<p class="name">An account already exists for this username. Please use a different name.</p>';
    } // end else
  } else {
    $feedback = 'Please make sure passwords match and are not empty';
  } // end of empty check
} // end of the isset
?>

<!DOCTYPE html>
<html>
<?php require_once('header.php'); ?>
<body>
  <h1>Sign Up</h1>
  <?php
  echo $feedback;
  if ($feedback == '<p class="name">Your new account has been successfully created.</p><p>Return to the <a href="index.php">main page</a>.</p>') {
    exit();
  }
  ?>
  <form method="post" action="">

    <fieldset>
      <legend>Registration Info</legend>
      <label>
        <p>First Name:</p>
        <input type="text" name="firstname" required value="<?php if (!empty($firstname)) echo  $firstname; ?>" />
      </label>

      <label>
        <p>Last Name:</p>
        <input type="text" name="lastname" required value="<?php if (!empty($lastname)) echo  $lastname; ?>" />
      </label>

      <label>
        <p>Username:</p>
        <input type="text" name="username" required value="<?php if (!empty($username)) echo  $username; ?>" />
      </label>

      <label>
        <p>Password:</p>
        <input type="password" name="password1" required value="" />
      </label>

      <label>
        <p>Password (retype):</p>
        <input type="password" name="password2" required value="" />
      </label>
    </fieldset>
    <input type="submit" name="submit" value="Sign UP" />
  </form>
  <p><a class="btn" href="index.php">Cancel</a></p>
</body>
</html>