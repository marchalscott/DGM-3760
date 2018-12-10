<!DOCTYPE html>
<html>
  <?php include_once('header.php'); ?>
  
  <body>
    <div id="container">
      <?php include_once('navbar.php'); ?>
      <h1>Current Outages</h1>

      <ul>
        <li>Long Horn Road <a href="details.php">- View Details</a></li>
        <li>Rasberry Lane <a href="details.php">- View Details</a></li>
        <li>SR128 <a href="details.php">- View Details</a></li>
        <li>Substation 6 <a href="details.php">- View Details</a></li>
      </ul>

      <a href="report.php"><button class="btn">Report an outage</button></a>
    </div>
  </body>
</html>