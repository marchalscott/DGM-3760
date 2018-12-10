<nav>
  <p>
    <span>Hello,</span>
    <?php
    if (isset($_COOKIE['username'])) {
      echo '<span class="name">'.$_COOKIE['firstname'] . ' ' . $_COOKIE['lastname'].' |'.'</span>';
      echo ' | <a class="signout" href="logout.php">Sign Out</a>';
    } else {
      echo '<a href="login.php">Login</a>';
    } // End if
    ?>
  </p>
</nav>