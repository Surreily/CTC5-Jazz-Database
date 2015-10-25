<?php
	// Get query string parameters

	// Start formatting
	if($type == 'xml') {
		$result .= '<musicians>';
	}

	// Include database call
	include 'db_musicians.php';

	// Create the result
	while($mus_stmt->fetch()) {
		if($type == 'xml') {
			$result .= '<musician>';
			$result .= '<id>' . $db_mus_id . '</id>';
			$result .= '<fname>' . $db_mus_fname . '</fname>';
			if($db_mus_mname != 'null') {
				$result .= '<mname>' . $db_mus_mname . '</mname>';
			}
			$result .= '<lname>' . $db_mus_lname . '</lname>';
			$result .= '<dob>' . $db_mus_dob . '</dob>';

			//include 'api_instruments.php';

			$result .= '</musician>';
		}
	}

	// End formatting
	if($type == 'xml') {
		$result .= '</musicians>';
	}
?>