<?php
	//session.php

use MTG\Controllers\Database;

	require __DIR__ . '/../../vendor/autoload.php';

	
	// Start the session
	session_start();

	// Function to check if a user is logged in
	function isLoggedIn() {
		global $db_info;
		$database = new Database($db_info);
		$conn = $database->getConnection();
		
		return isset($_SESSION['user_id']);
	}

	// Function to set a session variable
	function setSessionVariable($name, $value) {
		$_SESSION[$name] = $value;
	}

	// Function to retrieve a session variable
	function getSessionVariable($name) {
		return $_SESSION[$name] ?? null;
	}

	// ... Additional session-related functions and logic ...
?>