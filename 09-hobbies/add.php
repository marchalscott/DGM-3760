<?php

if (isset($_POST['submit'])) {
    //LOAD THE POST DATA INTO PHP VARIABLES
    $name    = $_POST[name];
    $hobbies = $_POST[hobbies];
    $day     = $_POST[day];
    $month   = $_POST[month];
    $year    = $_POST[year];

    $birthday = $day.'_'.$month.'_'.$year;

    //BUILD A DATABASE CONNECTION WITH host, user, pass, database
    $dbconnection = mysqli_connect('localhost','marchale_3760usr','s0l0w00k1E2000','marchale_3760') or die ('Connection to the database failed');

    //BUILD THE QUERRY
    $query = "INSERT INTO hobbies (name, birthday, hobbies) VALUE ('$name','$birthday','$hobbies')";

    //NOW TRY AND TALK TO THE DATABASE
    $results = mysqli_query($dbconnection, $query) or die ('Query Failed');

    //WE'RE DONE SO HANG UP
    mysqli_close($dbconnection);

    header('Location: index.php');
    exit;

} // END ISSET
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Newsletter Categories</title>
    <link href="styles.css" rel="stylesheet" type="text/css">
</head>
<body>
    <?php include_once('nav.php'); ?>
    <h1>Newsletter Categories</h1>

    <form action="add.php" method="POST" enctype="multipart/form-data" name="travelInfo">
    <fieldset>
    <legend>Required Information</legend>

    <label><p>Full Name</p><input type="text" name="name" value=""placeholder="full name" required">
    </label>

    <label><p>Date Added</p></label>
    <select name="day">
    <option>Day</option>
    <option>O1</option>
    <option>02</option>
    <option>03</option>
    <option>04</option>
    <option>05</option>
    <option>06</option>
    <option>08</option>
    <option>09</option>
    <option>10</option>
    <option>11</option>
    <option>12</option>
    <option>13</option>
    <option>14</option>
    <option>15</option>
    <option>16</option>
    <option>17</option>
    <option>18</option>
    <option>19</option>
    <option>20</option>
    <option>21</option>
    <option>22</option>
    <option>23</option>
    <option>24</option>
    <option>26</option>
    <option>27</option>
    <option>28</option>
    <option>29</option>
    <option>30</option>
    <option>31</option>
    </select>

    <select name="month">
    <option>month</option>
    <option>01</option>
    <option>02</option>
    <option>03</option>
    <option>04</option>
    <option>05</option>
    <option>06</option>
    <option>07</option>
    <option>08</option>
    <option>09</option>
    <option>10</option>
    <option>11</option>
    <option>12</option>
    </select>

    <input type="text" name="year" value="" placeholder="1989" pattern="[0-9]{4}" required class="year">
    <label><p>Please list a category for the community</p>
    <textarea name="hobbies"></textarea>
    </label>

    </fieldset>

    <input type="submit" name="submit" vlaue="Add Member" class="submitBtn">

    </form>
    <?php require_once('footer.php'); ?>
</body>
</html>