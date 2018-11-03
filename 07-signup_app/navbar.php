<nav>
  <p>Hello,

<?php
if(isset($_COOKIE['username'])) {
  echo $_COOKIE['firstname'].' '.$_COOKIE['lastname'];
  echo ' | <a href="logout.php">signout</a>';
} else {
  echo '<a href="login.php">Login</a>';

}//end if

 ?>

  </p>
</nav>
