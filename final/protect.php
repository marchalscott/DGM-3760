<?php
// MAKE SURE USER IS LOGGED IN
if (!isset($_COOKIE['username'])) {
  echo '<div>Please <a href="login.php"> log in</a> to access this page</div>';
  exit();
} // end if
?>