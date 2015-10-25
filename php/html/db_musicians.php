<?php
	/**
	 * Get musicians from the database using data in the query string.
	 */

	// Limit the number of returned items
	$limit = 20;
	if(isset($_GET['limit'])) {
		$limit = $_GET['limit'];
	}

	// Set the offset at which to start
	$offset = 0;
	if(isset($_GET['offset'])) {
		$offset = $_GET['offset'];
	}

	// Prepare the function array and query
	$mus_func_args = "";
	$mus_func_array = array();
	$mus_query = "SELECT * FROM musicians WHERE 1=1 ";

	// ID
	$mus_id = 0;
	if(isset($_GET['id'])) {
		$mus_id = $_GET['id'];
		$mus_func_args .= "i";
		$mus_func_array = array_merge($mus_func_array, array(&$mus_id));
		$mus_query .= "AND id = ? ";
	}

	// First name
	$mus_fname = "";
	if(isset($_GET['fname'])) {
		$mus_fname = $_GET['fname'];
		$mus_func_args .= "s";
		$mus_func_array = array_merge($mus_func_array, array(&$mus_fname));
		$mus_query .= "AND fname LIKE ? ";
	}

	// Middle name
	$mus_mname = "";
	if(isset($_GET['mname'])) {
		$mus_mname = $_GET['mname'];
		$mus_func_args .= "s";
		$mus_func_array = array_merge($mus_func_array, array(&$mus_mname));
		$mus_query .= "AND mname LIKE ? ";
	}

	// Last name
	$mus_lname = "";
	if(isset($_GET['lname'])) {
		$mus_lname = $_GET['lname'];
		$mus_func_args .= "s";
		$mus_func_array = array_merge($mus_func_array, array(&$mus_lname));
		$mus_query .= "AND lname LIKE ? ";
	}

	// Lower date
	$mus_ldate = "";
	if(isset($_GET['ldate'])) {
		$mus_ldate = $_GET['ldate'];
		$mus_func_args .= "s";
		$mus_func_array = array_merge($mus_func_array, array(&$mus_ldate));
		$mus_query .= "AND dob > ? ";
	}

	// Upper date
	$mus_udate = "";
	if(isset($_GET['udate'])) {
		$mus_udate = $_GET['udate'];
		$mus_func_args .= "s";
		$mus_func_array = array_merge($mus_func_array, array(&$mus_udate));
		$mus_query .= "AND dob < ? ";
	}

	// Finish off the query
	$mus_func_args .= "ii";
	$mus_func_array = array_merge(array($mus_func_args), $mus_func_array, array(&$offset, &$limit));
	$mus_query .= "LIMIT ?, ?;";

	// Create and bind prepared statement
	$mus_stmt = $conn->prepare($mus_query);
	call_user_func_array(array($mus_stmt, 'bind_param'), $mus_func_array);
	$mus_stmt->execute();
	$mus_stmt->bind_result($db_mus_id, $db_mus_fname, $db_mus_mname, $db_mus_lname, $db_mus_dob, $db_mus_dod);
?>