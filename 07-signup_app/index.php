<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="main.css">
    <title>Section 7</title>
  </head>
  <body>
    <div id="container">
      <?php include_once('navbar.php'); ?>
      <h1>Log In</h1>
      <?php echo $feedback; ?>
      <form method="post" action="login.php">
        <fieldset>
          <legend>Current Outages</legend>
          <ul>
            <li>Long Horn road -<button><a href="login.php">VIEW DETAILS</a></button></li>
            <li>Raspberry Lane -<button><a href="login.php">VIEW DETAILS</a></button></li>
            <li>SR128 -<button><a href="login.php">VIEW DETAILS</a></button></li>
            <li>Substation 6 -<button><a href="login.php">VIEW DETAILS</a></button></li>
          </ul>

          <button><a href="login.php">Report a Problem</a></button>

        </fieldset>
        <button>
        <input type="submit" name="submit" value="Log In"/>
      </button>
      </form>

      <p><a href="index.php">Cancel</a></p>

    </div>
  </body>
</html>
