<!DOCTYPE html>
<html>
<head>
	<title>Search Categories</title>
	 	<title>Show all Students</title>
 	<link href="styles.css" rel="stylesheet" type="text/css">
</head>
<body>
<?php include_once('nav.php'); ?>
<h1>Search</h1>

<form action="search.php" method="POST" encrypt="multipart/form-data">
	<fieldset>
		<legend>What categories are you looking for?</legend>

		<label><p>Caetegories:</p> <input type="text" name="hobby" value="" placeholder="Categories" required></label> seperate mulitple search terms with ,
	</fieldset>
	<input type="submit" name="submit" value="Search for Categories" class="submitBtn">
</form>

<?php 
if (isset($_POST['submit'])) {
	
	//LOAD THE POAST DATA INTO PHP VARIABLES AND MAKE IT LOWERCASE
	$hobbies = strtolower($_POST[hobby]);
	//REMOVE COMMAS FROM SEARCH TERMS
	$hobbyCleanUp = str_replace(',',' ',$hobbies);
	//TURN THE LIST INTO AN ARRAY BASED ON "A SPACE CHARACTER"
	$searchTerms = explode(' ',$hobbyCleanUp);
	foreach($searchTerms as $temp) {
		if(!empty($temp)){
			$searchArray[] = $temp;
		}//END IF
	}//END FOREACH
	//build a WHERE clause for the $query
	$whereList = array();
	foreach($searchArray as $temp) {
		$whereList[] = "hobbies LIKE '%$temp%'";
	}//END FOREACH
	//build the complete WHERE with OR between each term
	$whereClause = implode(' OR ',$whereList);

	//BUILD SEARCH QUERY
	$query = "SELECT * FROM hobbies";
	if(!empty($whereClause)) {
		$query .= " WHERE $whereClause";
	}//end if

	echo "<h2>Search Results for '$hobbyCleanUp'</h2>";

	//CONNECT TO THE DATABASE
$dbconnection = mysqli_connect('localhost','marchale_3760usr','s0l0w00k1E2000','marchale_3760') or die ('Connection to the database failed');

	//TRY AND TALK TO DATABASE
	$result = mysqli_query($dbconnection, $query) or die ('Query Failed');

	if (mysqli_num_rows($result) > 0) {
		while ($row = mysqli_fetch_array($result)) {
			echo '<h3>'.$row[name] .'</h3>';

		$myresults = strtolower($row[hobbies]);
		foreach($searchArray as $temp) {
			$insert    = '<***>'.$temp.'</***>';
			$myresults = str_replace($temp,$insert,$myresults);
		}//end foreach

		//put the span tags back in the results string
		$myresults = str_replace('***', 'span', $myresults);

			echo '<p class="searchResults">'.$myresults.'</p>';
		}//END WHILE

	} else {
		echo "No hobbies found matching <strong>$hobbies</strong>";
	}//close num rows count
}//End isset
mysql_close($dbconnection);
 ?>
<?php require_once('footer.php'); ?>

</body>
</html>