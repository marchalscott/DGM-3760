<?php
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
      if(!empty($username) && !empty($password) && !empty($password2) && ($password == $password2)) {
       // MAKE SURE USER IS NOT IN DATABASE
       $query = "SELECT * FROM users WHERE username = '$username'";
       $alreadyexists = mysqli_query($dbconnection, $query) or die ('query failed'); 
       if (mysqli_num_rows($alreadyexists) == 0) {

        // INSERT DATA
        $query = "INSERT INTO users (first, last, username, password, date) VALUES ('$first', '$last', '$username', SHA('$password'), NOW())";
        mysqli_query($dbconnection, $query) or die ('insert query failed');

        // CONFIRMATION MESSAGE
        echo '<p>Your new account has been successfully created</p>';
        echo '<p>Return to the <a href="index.php">main page</a></p>';

        // CLOSE DB CONNECTION
        mysqli_close($dbconnection);

        // EXIT PAGE
        exit;
        } else {
          echo '<p>An account already exists for this username. Please use a different username.</p>';
        };
      };
    }; // END ISSET
    ?>