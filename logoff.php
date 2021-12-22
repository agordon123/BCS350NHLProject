<?PHP
// logoff.php - Logoff
// Repurposed by Adam

// Includes
	include('image_resize.php');

// Logoff by Unsetting Session Variables and Destroying the Session ID
	session_unset();
	session_destroy();
	$logon = FALSE;
	$user = 'Guest'; 
	$role = NULL; 
  
// Output
	include('header.php');
	include('menubar.php');
	echo "<p>LOGOFF Successful";
?>