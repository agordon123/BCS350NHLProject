<?php
// website.php - Website Program, Includes other pages
// Written by:  Prof. Kaplan, November 2021

// Includes
	include('session.php');
	include('variables.php'); 
	include('bcs350_mysqli_connect.php');


// Input
	if(isset($_GET['p'])) 	$page = $_GET['p'];		else $page = 'home'; 
	if (!file_exists("$page.php"))	$page = 'home'; 
	
// Check Permissions
	if (in_array($page, $restricted) AND (!$logon)) $page = 'home';
	if (in_array($page, $role_pages) AND ($role != $role_value)) $page = 'home';
	if ($shutdown) $page = 'shutdown'; 
	
// Logon/Logoff is Needed Before Output 
	if (($page == 'logon') OR ($page == 'logoff')) include("$page.php"); 
	
// Output
	else {
		include('header.php');
		include('menubar.php');	
		include("$page.php"); 
		}
	include('footer.php');

?>