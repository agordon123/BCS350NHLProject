<?php
// variables.php - Website Variables
// Written by:  Prof. Kaplan, November 2021

// Variables
	$pgm 			= 'website.php'; 
	$pages			= array('home' 			=> 'lightblue', 
							'standings' 		=> 'white', 
							'teamstats' 		=> 'green', 
							'playerstats'		=> 'lightgreen',
							'logon' 		=> 'blue',
							'updatestandings'		=> 'pink'
							);

	$restricted		= array('updatestandings');
	$role_pages 	= array(NULL);
	$role_value 	= NULL;	
	$shutdown		= FALSE;
	$width			= '800'; 
	$landing		= TRUE;
// Appearance
	$title			= '<a HREF="https://hockey.fantasysports.yahoo.com/hockey/76581">Blood Sweat and Beers Fantasy Hockey 2021-2022</a>';
	$footer 		= "$title";
	$page_bgcolor 		= 'white';
	$page_style		= "background-color:$page_bgcolor;";
	$header_color	= 'blue'; 
	$header_bgcolor = 'white';
	$header_style	= "color:$header_color; background-color:$header_bgcolor; font-weight:bold;";
	$footer_color	= "green"; 
	$footer_bgcolor = 'white';	
	$footer_style	= "color:$footer_color; background-color:$footer_bgcolor; font-weight:bold;";
	$menu_style		= 'background-color:black;';
	$menu_color		= 'black';

?>