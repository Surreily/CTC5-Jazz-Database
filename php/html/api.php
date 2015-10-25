<?php
	include 'database_open.php';

	// Get the function
	$function = $_GET['function'];

	// Get the type to return (json only at the moment)
	$type = $_GET['type'];

	// Prepare the result
	$result = "";

	// Set the header
	if($_GET['type'] == 'xml') {
		//header('Content-Type: text/xml');
	}

	// Get the data
	if($function == 'get_musicians') {
		include 'api_musicians.php';
	}

	// Output the resulting string
	echo $result;

	include 'database_close.php';
?>