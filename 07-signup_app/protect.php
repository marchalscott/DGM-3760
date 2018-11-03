<?php
//make sure user is logoed in before going any further
if(isset($_COOKIE['username'])) {
  echo '<p class="login">Please <a href="login.php">log in </a> to access this page</p>';
  exit();
}// end if
 ?>
