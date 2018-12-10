 <nav>
      <a href="index.php">Home</a>
      <div>
        <ul>
          <li <?php echo ($page == 'index') ? '' : '';?>>
            <a href="index.php">Movies</a>
          </li>
          <li <?php echo ($page == 'searchMovies') ? '' : '';?>>
            <a href="searchMovies.php">Search</a>
          </li>
          <li <?php echo ($page == 'review') ? '' : '';?>>
            <a href="review.php">Review</a>
          </li>
          <li <?php echo ($page == 'admin') ? '' : '';?>>
            <a href="admin.php">Admin</a>
          </li>
        </ul>
        <form>
          <p>Hello,
          <?php 
          if (isset($_COOKIE["username"])) {
            echo $_COOKIE["first"].' '.$_COOKIE["last"];
            echo ' | <a href="logout.php" class="login">Logout</a>';
          } else {
			echo '<a href="login.php" class="login">Login</a>'; 
          } // END IF
          ?>
          </p>
        </form>
      </div>
</nav>