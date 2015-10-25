<?php
	include 'database_open.php';

	// Get the ID
	$id = $_GET['id'];

	// Create prepared statement
	$stmt = $conn->prepare("SELECT id, fname, mname, lname FROM musicians WHERE id = ?");
	$stmt->bind_param("i", $id);
	$stmt->execute();

	// Get result
	$stmt->bind_result($db_id, $db_fname, $db_mname, $db_lname);

	while($stmt->fetch()) {
		echo $db_fname . ' ' . $db_mname . ' ' . $db_lname;
	}

	include 'database_close.php';
?>