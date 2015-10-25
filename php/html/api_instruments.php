<?php
	// Get query string parameters

	// Start formatting
	if($type == 'xml') {
		$result .= '<instruments>';
	}

	// Include database call
	include 'db_instruments.php';

	// Create the result
	while($ins_stmt->fetch()) {
		if($type == 'xml') {
			$result .= '<instrument>';
			$result .= '<id>' . $db_ins_id . '</id>';
			$result .= '<name>' . $db_ins_name . '</name>';
			$result .= '</instrument>';
		}
	}

	// End formatting
	if($type == 'xml') {
		$result .= '</instruments>';
	}
?>