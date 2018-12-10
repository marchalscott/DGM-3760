<?php
$username = 'admin';
$password = 'test';
	
	if (!isset($_SERVER['PHP_AUTH_USER']) || !isset($_SERVER['PHP_AUTH_PW']) || ($_SERVER['PHP_AUTH_USER'] != $username) || ($_SERVER['PHP_AUTH_PW'] != $password) ) {
		header('HTTP/1.1 401 Unathorized');
		header('WWW-Authenticate: Basic realm="Updated"');
		exit(include 'index.php');
	}; //end if
?>