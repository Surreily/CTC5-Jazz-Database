<?php
	// Connect to the database
	$host = "localhost";
	$user = "bloke";
	$password = "password";
	$database = "jazz";

	$conn = new mysqli($host, $user, $password, $database);

	if ($conn->connect_error) {
		die("Error: " . $conn->connect_error);
	}
?>