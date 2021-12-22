<?php
// home.php - Home Page 
//

// Output
	include('landing.php');
	include('image_resize.php');


	list($neww, $newh) = image_resize("logos/logo.jpg", 400, 400);
	echo "<p align='center'>
		  <img src='logos/logo.jpg' width='$neww' height='$newh'>
		  <p align='center'>Yahoo Fantasy Hockey
		  <br>Blood Sweat and Beers 21-22";
?>