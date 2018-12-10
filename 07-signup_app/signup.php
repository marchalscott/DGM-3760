<?php
require_once('vars.php');
//BUILD THE DATABASE CONNECTION WITH host, user, pass, database
$dbconnection = mysqli_connect(HOST, USER, PASS, DB_NAME) or die ('Connection to the database failed');

print_r($_POST);
//-----IF USER HAS FILLED OUT THE FORM AND CLICKED THE SUBMIT BUTTON THEN DO SOMETHING
if (isset($_POST['username'])) {

  $firstname  = mysqli_real_escape_string($dbconnection,trim($_POST['firstname']));
  $lastname   = mysqli_real_escape_string($dbconnection,trim($_POST['lastname']));
  $username   = mysqli_real_escape_string($dbconnection,trim($_POST['username']));
  $password1  = mysqli_real_escape_string($dbconnection,trim($_POST['password1']));
  $password2  = mysqli_real_escape_string($dbconnection,trim($_POST['password2']));

  //DOUBLE CHECK TO MAKE SURE THAT ALL THESE HAVE VALUES
  if (!empty($username) && !empty($password1) && !empty($password2) && ($password1 == $password2)) {

  //MAKE SURE SOMEONE HASN'T ALREADY REGISTERED USING A USERNAME IN THE DB
  $query = "SELECT * FROM users WHERE username = '$username'";
  $alreadyexists = mysqli_query($dbconnection, $query) or die ('Query Failed');

  if (mysqli_num_rows($alreadyexists) == 0){
    //INSERT THE DATA
    $query = "INSERT INTO users (firstname, lastname, username, password, date_now) VALUES ('$firstname','$lastname','$username', SHA('$password1'), NOW() )";
    mysqli_query($dbconnection, $query) or die ('insert query failed');

    //CONFIRM MESSAGE
    $feedback = '<p>Your new account has been successfully created.</p><p>Return to the <a href="index.php">main page</a>.</p>';

    //MAKE THE COOKIE
    setcookie('username', $username, time() + (60*60*24*30)); //EXPIRATION
    setcookie('firstname', $firstname, time() + (60*60*24*30)); //EXPIRATION
    setcookie('lastname', $lastname, time() + (60*60*24*30)); //EXPIRATION


    //CLOSE CONNECTION
    mysqli_close($dbconnection);


    //EXIT THE PAGE
    exit();


  }else {
  $feedback = '<p>Sorry, this username has been taken. Please choose a different username.</p>';


} //END OF DUPLICATE DATA CHECK
  } //END OF THE EMPTY CHECK
} //END OF ISSET
 ?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="main.css">
    </style>
    <title>Sign Up</title>
  </head>
  <body>
    <div id="container">
    <h1>Sign Up</h1>

    <?php echo $feedback; ?>

    <form action="" method="post">
       <fieldset>
         <legend>Registration Info</legend>
         <label><p> First Name: </p>
          <input type="text" name="firstname" required value="<?php if (!empty($firstname)) echo $firstname; ?>"/> </label>

        <label><p> Last Name: </p>
          <input type="text" name="lastname" required value="<?php if (!empty($lastname)) echo $lastname; ?>"/> </label>

        <label><p> Username: </p>
          <input type="text" name="username" required value="<?php if (!empty($username)) echo $username; ?>"/> </label>

        <label><p> Password: </p>
          <input type="password" name="password1" required /> </label>

        <label><p> Password: </p>
          <input type="password" name="password2" required /> </label>

       </fieldset>
       <button>
       <input type="submit" name="submit" value="Sign Up"/>
     </button>
     </form>
</div>
  </body>
</html>
