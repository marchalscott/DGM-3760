<?php
require_once('vars.php');
//BUILD THE DATABASE CONNECTION WITH host, user, pass, database
$dbconnection = mysqli_connect(HOST, USER, PASS, DB_NAME) or die ('Connection to the database failed');
//BUILD THE QUERY
$query = "SELECT id, photo, title, rating, description FROM movies ORDER BY title";
//NOW TRY AND TALK TO THE DATABASE
$result = mysqli_query($dbconnection, $query) or die ('query failed');
?>

<?php require_once('header.php'); ?>
<title>Movies</title>
</head>
<body>
  <?php require_once('hero.php'); ?>
  <div class="container">
    <h1>Movies</h1>
    <div class="flex">
      <?php
      while ($row = mysqli_fetch_array($result)) {
        echo '<div class="movie">';
          echo '<h2>' . $row['title'] . '</h2>';
          echo '<img src="img/' . $row['image'] . '" alt="Movie Cover" />';
          // Assign the user id to a variable to be used in the next query
          $theid = $row['id'];
          // Build the query for an inner join
          $query2 = "SELECT * FROM movies INNER JOIN rating ON (movies.rating = rating.rating_id) WHERE id = $theid";
          // Now try and talk to the database
          $resultRating = mysqli_query($dbconnection, $query2) or die ('Query failed');
          while ($row2 = mysqli_fetch_array($resultRating)) {
            echo '<p><span>Rating:</span> ' . $row2['value'] . '</p>';
          };
          echo '<a href="details.php?id=' . $row['id'] . '" ><div class="btn">More Info</div></a>';
        echo '</div>';
      }
      ?>
    </div>
  </div>
</body>
</html>