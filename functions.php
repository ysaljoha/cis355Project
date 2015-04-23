<?php
require_once 'config.php';


function authenticateUser($username, $password) {
	
	// get given user from db
	$query = "select * from customer where username='" . $username . "' and password='" . $password . "'";
	
	// create db connection
	$db = getConnection ();
	$result = executeQuery ( $db, $query );
	$authenticated = false;
	
	if ($result) {
		if ($result->num_rows > 0) {
			// read database result
			while ( $row = $result->fetch_array ( MYSQLI_ASSOC ) ) {
				$authenticated = true;
			}
			$result->close ();
		}
	} else {
		echo $db->error;
	}
	
	return $authenticated;
}

function isLoggedIn(){
	//if user is looged in
	if(isset($_SESSION) && isset($_SESSION["username"]) && $_SESSION["username"] != null){
		return true;
	}
	return false;
}

// create connection to database
function getConnection() {
	global $DB_URL;
	global $DB_USER;
	global $DB_PASSWORD;
	global $DB_NAME;
	
	$mysqli = new mysqli ( $DB_URL, $DB_USER, $DB_PASSWORD, $DB_NAME );
	
	/* check connection */
	if ($mysqli->connect_errno) {
		printf ( "Connect failed: %s\n", $mysqli->connect_error );
		exit ();
	}
	
	return $mysqli;
}

// execute database query
function executeQuery($mysqli, $sql) {
	// $mysqli = DatabaseHelper::getConnection();
	$result = $mysqli->query ( $sql );
	return $result;
}

?>