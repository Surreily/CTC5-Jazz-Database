<?php
	/**
	 * Get instruments from the database using data in the query string.
	 * Uses $m_id
	 */

	// Prepare the function array and query
	$ins_query = "SELECT instruments.id, instruments.name
				  FROM instruments
				  INNER JOIN mus_to_ins
				  ON mus_to_ins.id = instruments.id
				  WHERE mus_to_ins.mus_id = ?;";

	// Create and bind prepared statement
	$ins_stmt = $conn->prepare($ins_query);
	echo $conn->error;
	$ins_stmt->bind_param("i", ($db_mus_id));
	$ins_stmt->execute();
	$ins_stmt->bind_result($db_ins_id, $db_ins_name);
?>