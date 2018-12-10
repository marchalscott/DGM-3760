<!DOCTYPE html>
<html>
<head>
  <title></title>
</head>
<body>
  <nav class="clearfix">
      <ul>
        <li>
          <a href="index.php">Movies</a>
        </li>
        <li>
          <a href="searchMovie.php">Search</a>
        </li>
        <li>
          <a href="review.php">Reviews</a>
        </li>
        <li>
          <a href="admin.php">Admin Page</a>
        </li>
      </ul>
  </nav>
        <form">
          <p class="clearfix">Hello, <?php 
                  if (isset($_COOKIE["username"])) {
                
                    echo $_COOKIE["first"].' '.$_COOKIE["last"];
                    echo '<button><a href="logout.php" class="login">Logout</a></button>';
                  } else {
              echo '<a href="login.php" class="login">Login</a>'; 
                  } // end if
                  ?></p>
      </form>
</body>
</html>