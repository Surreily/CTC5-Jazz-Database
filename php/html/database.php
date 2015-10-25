<?php
	// Connect to the database
	$host = "localhost";
	$user = "bloke";
	$password = "password";
	$database = "jazz";

	$link = mysqli_connect($host, $user, $password, $database);

	if (!$link) {
		echo '<h1 style="color: red;">Error connecting to MySQL!</h1>';
		echo 'Error number: ' . mysqli_connect_errno() . PHP_EOL;
		echo 'Details: ' . mysqli_connect_error() . PHP_EOL;
	}
?>