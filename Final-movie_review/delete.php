<?
require_once('superProtect.php');
$id = $_GET[id];
$image = 'img/' . $_GET[image];
require_once('vars.php');
//BUILD THE DATABASE CONNECTION WITH host, user, pass, database
$dbconnection = mysqli_connect(HOST,USER,PASSWORD,DB_NAME) or die ('connection failed');
// DELSETE SELECTED RECORD (IN FROM POST)
if ($id) {
  $query = "DELETE FROM movie WHERE id=$id";
  $result = mysqli_query($dbconnection, $query) or die ('delete query failed');
  @unlink($image);
  header("Location: index.php");
  exit;
};