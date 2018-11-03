<?php include_once('protect.php'); ?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="main.css">
    <title>Report an Outage</title>
  </head>
  <body>
    <div id="container">
      <?php include_once('navbar.php') ?>
      <h1>Report and Outage</h1>
      <form action="#" method="POST" enctype="multipart/form-data">
        <fieldset>
          <legend>Your Information</legend>
          <label><p>Your Name</p> <input name="name" value="text" placeholder="location" pattern="[a-zA-Z ]{10,99}" required"</label>
          <label><p>Customer Account Number</p> <input name="number" type="number" value="" placeholder="" required"</label>
        </fieldset>

        <fieldset>
        </fieldset>

      </form>

    </div>
  </body>
</html>
