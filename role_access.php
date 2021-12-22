<?php


// Variables
	$role_value = array('commissioner');

// Check for Correct Role to Access Page, if not redirect to LOGON page
	if ($role != $role_value) {
		header('Location: logon.php');
		exit;
		}
?>