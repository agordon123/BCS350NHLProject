<?php
// pictures.php - Show Pictures in a Directory
// Written by: Charles Kaplan, November 2021

// Includes 
	include('image_resize.php'); 
	
// Variables	
	$dir 		= 'logos';
	$pgm2 		= 'website.php?p=pictures';
	$extns		= array('.jpg', '.jpeg', '.gif', '.png');
	$button 	= "style='text-decoration: none;'";
	
// Get Directory Listing and weed out non-image files and subdirectories
	$files = scandir($dir);
	foreach($files as $key => $value) {
		if (is_dir($value)) continue;
		$ext = trim(strtolower(strrchr($value, '.')));
		if (!in_array($ext, $extns)) continue;
		$files2[] = $value;
		}

// Input
	if (isset($_GET['r'])) $p = $_GET['r']; else $p = 0; 
	
// Set up Directional Buttons	
	if ($p == 0) $disabled = 'disabled'; 	else $disabled = NULL;
	$x = $p - 1; 
	$first 		= "<a href='$pgm2&r=0'  title='First'>   <button $button $disabled> << </button></a>";
	$previous 	= "<a href='$pgm2&r=$x' title='Previous'><button $button $disabled> <  </button></a>";	
	$count = count($files2) - 1;
	if ($p == $count) $disabled = 'disabled'; 	else $disabled = NULL;
	$x = $p + 1; 
	$next 		= "<a href='$pgm2&r=$x'		title='Next'><button $button $disabled> >  </button></a>";
	$last 		= "<a href='$pgm2&r=$count' title='Last'><button $button $disabled> >> </button></a>";
	
//Output		
	list($neww, $newh) = image_resize("$dir/$files2[$p]", 600, 600); 
	echo "<table align='center' cellpadding='5'><tr>
		  <td>$first</td>
		  <td>$previous</td>
		  <td><img src='$dir/$files2[$p]' width='$neww' height='$newh'></td>
		  <td>$next</td>
		  <td>$last</td>
		  </tr></table>";
		  
// Show Caption - captions have the same filename as an image, but with a ".txt" extension
	$pos = strpos("$dir/$files2[$p]", '.');
	$fn = substr("$dir/$files2[$p]", 0, $pos); 
	if (file_exists("$fn.txt"))
		echo "<b>" . file_get_contents("$fn.txt") . "</b>";
?>